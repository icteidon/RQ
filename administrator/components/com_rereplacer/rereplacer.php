<?php
/**
 * Main Admin file
 *
 * @package			ReReplacer
 * @version			4.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_rereplacer')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$lang = JFactory::getLanguage();
if ($lang->getTag() != 'en-GB') {
	// Loads English language file as fallback (for undefined stuff in other language file)
	$lang->load('com_rereplacer', JPATH_ADMINISTRATOR, 'en-GB');
}
$lang->load('com_rereplacer', JPATH_ADMINISTRATOR, null, 1);

jimport('joomla.filesystem.file');
$app = JFactory::getApplication();

// return if NoNumber Framework plugin is not installed
if (!JFile::exists(JPATH_PLUGINS.'/system/nnframework/nnframework.php')) {
	$app->set('_messageQueue', '');
	$msg = JText::_('RR_NONUMBER_FRAMEWORK_NOT_INSTALLED');
	$msg .= ' '.JText::sprintf('RR_EXTENSION_CAN_NOT_FUNCTION', JText::_('COM_REREPLACER'));
	$app->enqueueMessage($msg, 'error');
	return;
}

// give notice if NoNumber Framework plugin is not enabled
$nnep = JPluginHelper::getPlugin('system', 'nnframework');
if (!isset($nnep->name)) {
	$app->set('_messageQueue', '');
	$msg = JText::_('RR_NONUMBER_FRAMEWORK_NOT_ENABLED');
	$msg .= ' '.JText::sprintf('RR_EXTENSION_MAY_NOT_FUNCTION', JText::_('COM_REREPLACER'));
	$app->enqueueMessage($msg, 'notice');
}

// load the NoNumber Framework language file
if ($lang->getTag() != 'en-GB') {
	// Loads English language file as fallback (for undefined stuff in other language file)
	$lang->load('plg_system_nnframework', JPATH_ADMINISTRATOR, 'en-GB');
}
$lang->load('plg_system_nnframework', JPATH_ADMINISTRATOR, null, 1);

// Version check
require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
$versions = NNVersions::getInstance();
$version = '';
$xml = JApplicationHelper::parseXMLInstallFile(JPATH_ADMINISTRATOR.'/components/com_rereplacer/rereplacer.xml');
if ($xml && isset($xml['version'])) {
	$version = $xml['version'];
}
$versions->setMessage($version, 'version_rereplacer', 'http://www.nonumber.nl/versions', 'http://www.nonumber.nl/rereplacer/download');

// Include dependancies
jimport('joomla.application.component.controller');

$controller = JController::getInstance('ReReplacer');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();

// PRO Check
require_once JPATH_PLUGINS.'/system/nnframework/helpers/licenses.php';
$licenses = NNLicenses::getInstance();
echo $licenses->getMessage('REREPLACER');

// Copyright
require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
$versions = NNVersions::getInstance();
$version = $versions->getXMLVersion('rereplacer', 'component');
echo $versions->getCopyright(JText::_('REREPLACER'), $version);