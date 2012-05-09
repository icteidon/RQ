<?php
/**
 * Uninstallation File
 * Performs some extra tasks when uninstalling the component
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

$ext = 'rereplacer';

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

// Delete plugin files
$folder = JPATH_PLUGINS.'/system/'.$ext;
if (JFolder::exists($folder)) {
	JFolder::delete($folder);
}

// Delete plugin language files
$lang_folder = JPATH_ADMINISTRATOR.'/language';
$languages = JFolder::folders($lang_folder);
foreach ($languages as $lang) {
	$file = $lang_folder.'/'.$lang.'/'.$lang.'.plg_system_'.$ext.'.ini';
	if (JFile::exists($file)) {
		JFile::delete($file);
	}
	$file = $lang_folder.'/'.$lang.'/'.$lang.'.plg_system_'.$ext.'.sys.ini';
	if (JFile::exists($file)) {
		JFile::delete($file);
	}
}