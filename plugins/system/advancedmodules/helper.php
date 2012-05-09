<?php
/**
 * Plugin Helper File
 *
 * @package			Advanced Module Manager
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Plugin that gives advanced features for modules
 */
class plgSystemAdvancedModulesHelper
{
	/*
	 * Replace links to com_modules with com_advancedmodules
	 */
	function onAfterRender()
	{
		JResponse::setBody(preg_replace('#(option=com_)(modules[^a-z-_])#', '\1advanced\2', JResponse::getBody()));
	}
}