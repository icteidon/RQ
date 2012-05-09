<?php
/**
 * @package			Advanced Module Manager
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/**
 * @package		Joomla.Administrator
 * @subpackage	com_advancedmodules
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Administrator
 * @subpackage	com_advancedmodules
 */
class AdvancedModulesHelperXML
{
	function parseXMLModuleFile(&$rows)
	{
		foreach ($rows as $i => $row)
		{
			if ($row->module == '') {
				$rows[$i]->name = 'custom';
				$rows[$i]->module = 'custom';
				$rows[$i]->descrip = 'Custom created module, using Module Manager New function';
			}
			else
			{
				$data = JApplicationHelper::parseXMLInstallFile($row->path.'/'.$row->file);

				if ($data['type'] == 'module') {
					$rows[$i]->name = $data['name'];
					$rows[$i]->descrip = $data['description'];
				}
			}
		}
	}
}