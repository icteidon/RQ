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

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_nonumbermanager')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$lang = JFactory::getLanguage();
$lang->load('com_modules', JPATH_ADMINISTRATOR);
if ($lang->getTag() != 'en-GB') {
	// Loads English language file as fallback (for undefined stuff in other language file)
	$lang->load('com_nonumbermanager', JPATH_ADMINISTRATOR, 'en-GB');
}
$lang->load('com_nonumbermanager', JPATH_ADMINISTRATOR, null, 1);

jimport('joomla.filesystem.file');
$app = JFactory::getApplication();

// return if NoNumber Framework plugin is not installed
if (!JFile::exists(JPATH_PLUGINS.'/system/nnframework/nnframework.php')) {
	$app->set('_messageQueue', '');
	$msg = JText::_('NNEM_NONUMBER_FRAMEWORK_NOT_INSTALLED');
	$msg .= ' '.JText::sprintf('NNEM_EXTENSION_CAN_NOT_FUNCTION', JText::_('COM_NONUMBERMANAGER'));
	$app->enqueueMessage($msg, 'error');
	return;
}

// give notice if NoNumber Framework plugin is not enabled
$nnep = JPluginHelper::getPlugin('system', 'nnframework');
if (!isset($nnep->name)) {
	$app->set('_messageQueue', '');
	$msg = JText::_('NNEM_NONUMBER_FRAMEWORK_NOT_ENABLED');
	$msg .= ' '.JText::sprintf('NNEM_EXTENSION_MAY_NOT_FUNCTION', JText::_('COM_NONUMBERMANAGER'));
	$app->enqueueMessage($msg, 'notice');
}

// load the NoNumber Framework language file
if ($lang->getTag() != 'en-GB') {
	// Loads English language file as fallback (for undefined stuff in other language file)
	$lang->load('plg_system_nnframework', JPATH_ADMINISTRATOR, 'en-GB');
}
$lang->load('plg_system_nnframework', JPATH_ADMINISTRATOR, null, 1);

// Include dependancies
jimport('joomla.application.component.controller');

$controller = JController::getInstance('NoNumberManager');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();