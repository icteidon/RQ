<?php
/**
 * Element Include: VersionCheck
 * Methods to check if current version is the latest
 *
 * @package			NoNumber Framework
 * @version			12.5.1
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Version Check Class (Include file)
 * Is an old file, so for backward compatibility
 */
class NoNumberVersionCheck
{
	function setMessage($current_version = '0', $version_file = '')
	{
		require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
		$versions = NNVersions::getInstance();

		if (version_compare(JVERSION, '1.6.0', 'l')) {
			echo $versions->getMessage(str_replace('version_', '', $version_file), '', $current_version, 1);
		} else {
			echo $versions->getMessage(str_replace('version_', '', $version_file), '', $current_version);		
		}
	}
}