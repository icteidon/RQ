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

// No direct access.
defined('_JEXEC') or die;

if (version_compare(JVERSION, '2.5', 'l')) {
	require_once JPATH_COMPONENT.'/helpers/formhelper.php';
}

jimport('joomla.application.component.view');

/**
 * View to edit a module.
 *
 * @static
 * @package		Joomla.Administrator
 * @subpackage	com_advancedmodules
 * @since		1.6
 */
class AdvancedModulesViewModule extends JView
{
	protected $form;
	protected $item;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->state = $this->get('State');
		$this->getConfig();
		$this->getAssignments();

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Function that gets the config settings
	 *
	 * @return	Object
	 */
	protected function getConfig()
	{
		if (!isset($this->config)) {
			require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
			$parameters = NNParameters::getInstance();
			$this->config = $parameters->getComponentParams('advancedmodules');
		}
		return $this->config;
	}

	/**
	 * Function that gets the config settings
	 *
	 * @return	Object
	 */
	protected function getAssignments()
	{
		if (!isset($this->assignments)) {
			$xmlfile = JPATH_ADMINISTRATOR.'/components/com_advancedmodules/assignments.xml';
			$assignments = new JForm('assignments', array('control' => 'advancedparams'));
			$assignments->loadFile($xmlfile, 1, '//config');
			$assignments->bind($this->item->advancedparams);
			$this->assignments = $assignments;
		}
		return $this->assignments;
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		JRequest::setVar('hidemainmenu', true);

		$user = JFactory::getUser();
		$isNew = ($this->item->id == 0);
		$checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
		$canDo = AdvancedModulesHelper::getActions($this->state->get('filter.category_id'), $this->item->id);
		$item = $this->get('Item');

		$title = $this->item->module;
		if ($this->item->xml) {
			$title = JText::_((string) $this->item->xml->name).' ['.$title.']';
		}
		JToolBarHelper::title(JText::sprintf('AMM_MODULE_EDIT', $title), 'module.png');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit') || $canDo->get('core.create'))) {
			JToolBarHelper::apply('module.apply');
			JToolBarHelper::save('module.save');
		}
		if (!$checkedOut && $canDo->get('core.create')) {
			if (version_compare(JVERSION, '1.7.0', 'l')) {
				JToolBarHelper::custom('module.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			} else
			{
				JToolBarHelper::save2new('module.save2new');
			}
		}
		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create')) {
			if (version_compare(JVERSION, '1.7.0', 'l')) {
				JToolBarHelper::custom('module.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			} else
			{
				JToolBarHelper::save2copy('module.save2copy');
			}
		}
		if (empty($this->item->id)) {
			JToolBarHelper::cancel('module.cancel');
		} else {
			JToolBarHelper::cancel('module.cancel', 'JTOOLBAR_CLOSE');
		}

		$tmpl = JRequest::getCmd('tmpl');
		if ($tmpl != 'component') {
			if ($canDo->get('core.admin')) {
				require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
				$parameters = NNParameters::getInstance();
				$config = $parameters->getComponentParams('advancedmodules');
				if ($config->show_config_in_item) {
					JToolBarHelper::divider();
					JToolBarHelper::preferences('com_advancedmodules');
				}
			}

			// Get the help information for the menu item.
			$lang = JFactory::getLanguage();

			$help = $this->get('Help');
			if ($lang->hasKey($help->url)) {
				$debug = $lang->setDebug(false);
				$url = JText::_($help->url);
				$lang->setDebug($debug);
			}
			else {
				$url = null;
			}
			JToolBarHelper::divider();
			JToolBarHelper::help($help->key, false, $url);
		}
	}

	protected function render(&$form, $name = '')
	{
		$items = array();
		foreach ($form->getFieldset($name) as $field)
		{
			$items[] = $field->label.$field->input;
		}
		if (empty ($items)) {
			return '';
		}

		return '<li>'.implode('</li><li>', $items).'</li>';
	}
}
