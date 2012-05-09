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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML View class for the Modules component
 *
 * @static
 * @package		Joomla.Administrator
 * @subpackage	com_advancedmodules
 * @since 1.6
 */
class AdvancedModulesViewPreview extends JView
{
	function display($tpl = null)
	{
		$editor = JFactory::getEditor();

		$this->assignRef('editor', $editor);

		parent::display($tpl);
	}
}