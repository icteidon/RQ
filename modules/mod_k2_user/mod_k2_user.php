<?php
/**
 * @version		$Id: mod_k2_user.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if(K2_JVERSION == '16'){
	$language = &JFactory::getLanguage();
	$language->load('mod_k2.j16', JPATH_ADMINISTRATOR, null, true);
}

require_once (dirname( __FILE__ ).DS.'helper.php');

$moduleclass_sfx = $params->get('moduleclass_sfx','');
$userGreetingText = $params->get('userGreetingText','');
$userAvatarWidthSelect = $params->get('userAvatarWidthSelect','custom');
$userAvatarWidth = $params->get('userAvatarWidth',50);

// Legacy params
$greeting = 0;

JHTML::_('behavior.mootools');
JHTML::_('behavior.modal');

$type 	= modK2UserHelper::getType();
$return	= modK2UserHelper::getReturnURL($params, $type);
$user		= &JFactory::getUser();

// User avatar
if($userAvatarWidthSelect=='inherit'){
	$componentParams = &JComponentHelper::getParams('com_k2');
	$avatarWidth = $componentParams->get('userImageWidth');
} else {
	$avatarWidth = $userAvatarWidth;
}

// Load the right template
if ($user->guest){
	// OpenID stuff (do not edit)
	if(JPluginHelper::isEnabled('authentication', 'openid')){
		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
		$langScript = '
			var JLanguage = {};
			JLanguage.WHAT_IS_OPENID = \''.JText::_('K2_WHAT_IS_OPENID').'\';
			JLanguage.LOGIN_WITH_OPENID = \''.JText::_('K2_LOGIN_WITH_OPENID').'\';
			JLanguage.NORMAL_LOGIN = \''.JText::_('K2_NORMAL_LOGIN').'\';
			var modlogin = 1;
		';
		$document = &JFactory::getDocument();
		$document->addScriptDeclaration( $langScript );
		JHTML::_('script', 'openid.js');
	}
	
	// Get user stuff (do not edit)
	$usersConfig = &JComponentHelper::getParams( 'com_users' );

	require(JModuleHelper::getLayoutPath('mod_k2_user', 'login'));
} else {
	$user->profile = modK2UserHelper::getProfile($params);
	$user->numOfComments = modK2UserHelper::countUserComments($user->id);
	$menu = modK2UserHelper::getMenu($params);
	require(JModuleHelper::getLayoutPath('mod_k2_user', 'userblock'));
}
