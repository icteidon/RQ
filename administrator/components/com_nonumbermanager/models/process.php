<?php
/**
 * @package			NoNumber Extension Manager
 * @version			3.1.1
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');

/**
 * Process Model
 */
class NoNumberManagerModelProcess extends JModelItem
{
	/**
	 * Get the extensions data
	 */
	public function getItems()
	{
		$ids = JRequest::getVar('ids', array(), 'get', 'array');
		$urls = JRequest::getVar('urls', array(), 'get', 'array');

		if (empty($ids) || empty($urls)) {
			return array();
		}

		$model = JModel::getInstance('Default', 'NoNumberManagerModel');
		$this->items = $model->getItems($ids);
		foreach ($ids as $i => $id) {
			if (isset($urls[$i])) {
				$this->items[$id]->url = $urls[$i];
			} else {
				unset($this->items[$id]);
			}
		}

		return $this->items;
	}

	/**
	 * Download and install
	 */
	function install($id, $url)
	{
		if (!is_string($url)) {
			return JText::_('NNEM_ERROR_NO_VALID_URL');
		}

		$config = JFactory::getConfig();

		$url = 'http://'.str_replace('http://', '', $url);
		$target = $config->getValue('config.tmp_path').'/'.uniqid($id).'.zip';

		jimport('joomla.filesystem.file');
		JPlugin::loadLanguage('com_installer', JPATH_ADMINISTRATOR);

		if (!(function_exists('curl_init') && function_exists('curl_exec')) && !ini_get('allow_url_fopen')) {
			return JText::_('NNEM_ERROR_CANNOT_DOWNLOAD_FILE');
		} else if (function_exists('curl_init') && function_exists('curl_exec')) {
			/* USE CURL */
			$ch = curl_init();
			$options = array(
				CURLOPT_URL			=> $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_TIMEOUT		=> 30
			);
			$params = JComponentHelper::getParams('com_nonumbermanager');
			if ($params->get('use_proxy') && $params->get('proxy_host')) {
				$options[CURLOPT_PROXY] = $params->get('proxy_host').($params->get('proxy_port') ? ':'.$params->get('proxy_port') : '');
				$options[CURLOPT_PROXYUSERPWD] = $params->get('proxy_login').':'.$params->get('proxy_password');
			}
			curl_setopt_array($ch, $options);
			$content = curl_exec($ch);
			curl_close($ch);
		} else {
			/* USE FOPEN */
			$handle = @fopen($url, 'r');
			if (!$handle) {
				return JText::_('SERVER_CONNECT_FAILED');
			}

			$content = '';
			while (!feof($handle)) {
				$content .= fread($handle, 4096);
				if ($content === false) {
					return JText::_('NNEM_ERROR_FAILED_READING_FILE');
				}
			}
			fclose($handle);
		}

		if (empty($content)) {
			return JText::_('NNEM_ERROR_CANNOT_DOWNLOAD_FILE');
		}

		// Write buffer to file
		JFile::write($target, $content);

		jimport('joomla.installer.installer');
		jimport('joomla.installer.helper');

		// Get an installer instance
		$installer = JInstaller::getInstance();

		// Unpack the package
		$package = JInstallerHelper::unpack($target);

		// Cleanup the install files
		if (!is_file($package['packagefile'])) {
			$config = JFactory::getConfig();
			$package['packagefile'] = $config->get('tmp_path').'/'.$package['packagefile'];
		}
		JInstallerHelper::cleanupInstall($package['packagefile'], $package['packagefile']);

		// Install the package
		if (!$installer->install($package['dir'])) {
			// There was an error installing the package
			return JText::sprintf('COM_INSTALLER_INSTALL_ERROR', JText::_('COM_INSTALLER_TYPE_TYPE_'.strtoupper($package['type'])));
		}

		return true;
	}

}