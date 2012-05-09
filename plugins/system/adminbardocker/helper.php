<?php
/**
 * Plugin Helper File
 *
 * @package			AdminBar Docker
 * @version			2.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Plugin that docks the admin toolbars
 */
class plgSystemAdminBarDockerHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
	}

	/*
	 * Place scripts and styles and load language
	 */
	function onAfterDispatch()
	{
		JHtml::_('behavior.mootools');

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
		$version = NoNumberVersions::getXMLVersion('adminbardocker', 'system', null, 1);

		$app = JFactory::getApplication();
		$this->template = $app->getTemplate();
		if (!file_exists(JPATH_PLUGINS.'/system/adminbardocker/templates/'.$this->template.'/script.js'.$version)) {
			// if template folder does not exist, fall back on default template bluestork
			$this->template = 'bluestork';
		}

		$ignorecookie = 0;
		if ($this->params->showonpopups != 1) {
			$tmpl = JRequest::getCmd('tmpl', 'index');
			if (!in_array($tmpl, array('index', 'cpanel')) || JRequest::getInt('nn_qp')) {
				if ($this->params->showonpopups == 2) {
					$this->params->dock_state = 'docked';
					$ignorecookie = 1;
				} else {
					return;
				}
			}
		}

		$mtversion = '';

		$document = JFactory::getDocument();
		$document->addScript(JURI::root(true).'/plugins/system/adminbardocker/templates/'.$this->template.'/script.js'.$version);
		$document->addScript(JURI::root(true).'/plugins/system/adminbardocker/js/script'.$mtversion.'.js'.$version);
		$document->addStyleSheet(JURI::root(true).'/plugins/system/adminbardocker/css/style.css'.$version);
		$document->addStyleSheet(JURI::root(true).'/plugins/system/adminbardocker/templates/'.$this->template.'/style.css'.$version);


		$set_cookies = array();
		if ($this->params->dock_state == 'undocked') {
			$set_cookies[] = 'ABD_setCookie( \'abd_dock_state\', \'undocked\' );';
		}

		$settings_url = '';
		if (JFactory::getUser()->authorise('core.admin')) {
			$db = JFactory::getDBO();
			$query = 'SELECT extension_id
				FROM #__extensions
				WHERE type = '.$db->quote('plugin').'
				AND element = '.$db->quote('adminbardocker').'
				AND folder = '.$db->quote('system').'
				LIMIT 1';
			$db->setQuery($query);
			$pluginid = (int) $db->loadResult();
			if ($pluginid) {
				$settings_url = JURI::base().'index.php?option=com_plugins&task=plugin.edit&extension_id='.$pluginid;
			} else {
				$settings_url = JURI::base().'index.php?option=com_plugins&filter_search=system%20-%20adminbar%20docker';
			}
		}
		$script = "
			var abd_top = new Array();
			var abd_toggle_top = new Array();
			var abd_toggle_bottom = new Array();
			var abd_bottom = new Array();
			var abd_settings_url = '".$settings_url."';
			window.addEvent( 'domready', function() {
				".implode("\n\t\t\t\t", $set_cookies)."
				new AdminBarDocker(
					'".$this->template."',
				 	[
				 		'".addslashes(JText::_('ABD_SETTINGS'))."',
						'".addslashes(JText::_('ABD_UNDOCK'))."',
						'".addslashes(JText::_('ABD_DOCK'))."',
						'".addslashes(JText::_('ABD_RELOAD'))."',
						'".addslashes(JText::_('ABD_TO_TOP'))."',
						'".addslashes(JText::_('ABD_TO_BOTTOM'))."',
					],
					".$this->params->hidetopbar.",
					".$ignorecookie."
				);
			});
		";
		$document->addScriptDeclaration(preg_replace("#\s+#s", ' ', $script));
	}
}