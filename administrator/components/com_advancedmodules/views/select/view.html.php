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
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML View class for the Modules component
 *
 * @package		Joomla.Administrator
 * @subpackage	com_advancedmodules
 * @since		1.6
 */
class AdvancedModulesViewSelect extends JView
{
	protected $state;
	protected $items;

	/**
	 * Display the view
	 */
	function display($tpl = null)
	{
		$state = $this->get('State');
		$items = $this->get('Items');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->assignRef('state', $state);
		$this->assignRef('items', $items);

		parent::display($tpl);
	}
}
