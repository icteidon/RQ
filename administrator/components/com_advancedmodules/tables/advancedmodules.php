<?php
/**
 * Table class: advancedmodules
 *
 * @package			Advanced Module Manager
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access.
defined('_JEXEC') or die;

class AdvancedModulesTableAdvancedModules extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__advancedmodules', 'moduleid', $db);
	}
}