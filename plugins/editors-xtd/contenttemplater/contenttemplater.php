<?php
/**
 * Main Plugin File
 * Does all the magic!
 *
 * @package			Content Templater
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

// Import library dependencies
jimport('joomla.plugin.plugin');

/**
 ** Plugin that places the button
 */
class plgButtonContentTemplater extends JPlugin
{
	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function onDisplay($name)
	{
		jimport('joomla.filesystem.file');

		// return if component is not installed
		if (!JFile::exists(JPATH_ADMINISTRATOR.'/components/com_contenttemplater/models/list.php')) {
			return;
		}

		// return if NoNumber Framework plugin is not installed
		if (!JFile::exists(JPATH_PLUGINS.'/system/nnframework/nnframework.php')) {
			return;
		}

		$app = JFactory::getApplication();

		// Load component parameters
		require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
		$parameters = NNParameters::getInstance();
		$params = $parameters->getComponentParams('contenttemplater');

		if (($app->isAdmin() && $params->enable_frontend == 2)
			|| ($app->isSite() && $params->enable_frontend == 0)
		) {
			return;
		}

		// load the admin language file
		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('plg_'.$this->_type.'_'.$this->_name, JPATH_ADMINISTRATOR, 'en-GB');
		}
		$lang->load('plg_'.$this->_type.'_'.$this->_name, JPATH_ADMINISTRATOR, null, 1);

		// Include the Helper
		require_once JPATH_PLUGINS.'/'.$this->_type.'/'.$this->_name.'/helper.php';
		$class = get_class($this).'Helper';
		$this->helper = new $class($params);

		return $this->helper->render($name);
	}
}