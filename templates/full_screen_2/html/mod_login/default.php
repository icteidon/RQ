<?php
/**
 * @version		$Id: default.php 19657 2010-11-27 08:06:35Z chdemko $
 * @package		Joomla.Site
 * @subpackage	mod_login
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<?php if ($type == 'logout') : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" name="form-login" id="login-form">
<?php if ($params->get('greeting')) : ?>
	<div class="login-greeting">
	<?php if($params->get('name') == 0) : {
		echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('name'));
	} else : {
		echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('username'));
	} endif; ?>
	</div>
<?php endif; ?>
	<div class="logout-button">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
	</div>

	<input type="hidden" name="option" value="com_users" />
	<input type="hidden" name="task" value="user.logout" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
</form>
<?php else : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" name="form-login" id="login-form" >
	<div class="pretext">
	<?php echo $params->get('pretext'); ?>
	</div>
	<fieldset class="userdata">
	<p id="form-login-username">
		<input id="modlgn-username" type="text" name="username" class="inputbox"  alt="username" size="18" value="<?php echo JText::_('Username') ?>" />
	</p>
	<p id="form-login-password">
		<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18" alt="password" value="<?php echo JText::_('Password') ?>"  />
	</p>


	<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" style="float:left;width:76px;" id="submit_login" />
	<input type="hidden" name="option" value="com_users" />
	<input type="hidden" name="task" value="user.login" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
	<?php echo JHtml::_('form.token'); ?>
	
	<ul class="icon_login">
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
			<img src="templates/full_screen_2/images/lost-pwd.gif" alt="lost password" title="<?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?>" /></a>
		</li>
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
			<img src="templates/full_screen_2/images/lost-uname.gif" alt="lost uname" title="<?php echo JText::_('FORGOT_YOUR_USERNAME'); ?>" /></a>
		</li>
		<?php
		$usersConfig = JComponentHelper::getParams('com_users');
		if ($usersConfig->get('allowUserRegistration')) : ?>
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
			<img src="templates/full_screen_2/images/create-account.gif" alt="create account" title="<?php echo JText::_('REGISTER'); ?>" /></a>
		</li>
		<?php endif; ?>
	</ul>
	
	<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
	<p id="form-login-remember">
		<label for="modlgn-remember"><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?></label>
		<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"  alt="Remember Me" style="margin-left:5px;" />
	</p>
	<?php endif; ?>	
	
	</fieldset>
	
	<div class="posttext">
	<?php echo $params->get('posttext'); ?>
	</div>
</form>
<?php endif; ?>