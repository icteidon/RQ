<?php
/**
 * @version		$Id: k2.php 1563 2012-05-04 16:09:39Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if(K2_JVERSION=='16'){
	$user = &JFactory::getUser();
	if($user->authorise('core.admin', 'com_k2')){
		$user->gid = 1000;
	}
	else {
		$user->gid = 1;
	}
}

JLoader::register('K2HelperRoute', JPATH_COMPONENT.DS.'helpers'.DS.'route.php');
JLoader::register('K2HelperPermissions', JPATH_COMPONENT.DS.'helpers'.DS.'permissions.php');
JLoader::register('K2HelperUtilities', JPATH_COMPONENT.DS.'helpers'.DS.'utilities.php');

K2HelperPermissions::setPermissions();
K2HelperPermissions::checkPermissions();

$controller = JRequest::getWord('view', 'itemlist');
$task = JRequest::getWord('task');

if($controller == 'media') {
	$controller = 'item';
	if($task != 'connector') {
		$task = 'media';
	}
}

if($controller == 'users') {
	$controller = 'item';
	$task = 'users';
}

jimport('joomla.filesystem.file');
jimport('joomla.html.parameter');

if (JFile::exists(JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php')) {
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
	$classname = 'K2Controller'.$controller;
	$controller = new $classname();
	$controller->execute($task);
	$controller->redirect();
}
else {
	JError::raiseError(404, JText::_('K2_NOT_FOUND'));
}

if(JRequest::getCmd('format') != 'json')
{
    echo "\n<!-- JoomlaWorks \"K2\" (v2.5.7) | Learn more about K2 at http://getk2.org -->\n\n";
}

