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
 * @package     Joomla.Administrator
 * @subpackage  com_advancedmodules
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Module model.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_advancedmodules
 * @since       1.6
 */
class AdvancedModulesModelModule extends JModelAdmin
{
	/**
	 * @var    string  The prefix to use with controller messages.
	 * @since  1.6
	 */
	protected $text_prefix = 'COM_MODULES';

	/**
	 * @var    string  The help screen key for the module.
	 * @since  1.6
	 */
	protected $helpKey = 'JHELP_EXTENSIONS_MODULE_MANAGER_EDIT';

	/**
	 * @var    string  The help screen base URL for the module.
	 * @since  1.6
	 */
	protected $helpURL;

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('administrator');

		// Load the User state.
		if (!($pk = (int) JRequest::getInt('id'))) {
			if ($extensionId = (int) $app->getUserState('com_advancedmodules.add.module.extension_id')) {
				$this->setState('extension.id', $extensionId);
			}
		}
		$this->setState('module.id', $pk);

		// Load the parameters.
		$params = JComponentHelper::getParams('com_advancedmodules');
		$this->setState('params', $params);
	}

	/**
	 * Method to perform batch operations on a set of modules.
	 *
	 * @param   array  $commands  An array of commands to perform.
	 * @param   array  $pks       An array of item ids.
	 * @param   array  $contexts  An array of item contexts.
	 *
	 * @return  boolean  Returns true on success, false on failure.
	 *
	 * @since   1.7
	 */
	public function batch($commands, $pks, $contexts)
	{
		// Sanitize user ids.
		$pks = array_unique($pks);
		JArrayHelper::toInteger($pks);

		// Remove any values of zero.
		if (array_search(0, $pks, true)) {
			unset($pks[array_search(0, $pks, true)]);
		}

		if (empty($pks)) {
			$this->setError(JText::_('JGLOBAL_NO_ITEM_SELECTED'));
			return false;
		}

		$done = false;

		if (!empty($commands['position_id'])) {
			$cmd = JArrayHelper::getValue($commands, 'move_copy', 'c');

			if (!empty($commands['position_id'])) {
				if ($cmd == 'c') {
					$result = $this->batchCopy($commands['position_id'], $pks, $contexts);
					if (is_array($result)) {
						$pks = $result;
					}
					else
					{
						return false;
					}
				}
				elseif ($cmd == 'm' && !$this->batchMove($commands['position_id'], $pks, $contexts))
				{
					return false;
				}
				$done = true;
			}
		}

		if (!empty($commands['assetgroup_id'])) {
			if (!$this->batchAccess($commands['assetgroup_id'], $pks, $contexts)) {
				return false;
			}

			$done = true;
		}

		if (!empty($commands['language_id'])) {
			if (!$this->batchLanguage($commands['language_id'], $pks, $contexts)) {
				return false;
			}

			$done = true;
		}

		if (!$done) {
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_INSUFFICIENT_BATCH_INFORMATION'));
			return false;
		}

		// Clear the cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Batch copy modules to a new position or current.
	 *
	 * @param   integer  $value      The new value matching a module position.
	 * @param   array    $pks        An array of row IDs.
	 * @param   array    $contexts   An array of item contexts.
	 *
	 * @return  boolean  True if successful, false otherwise and internal error is set.
	 *
	 * @since   11.1
	 */
	protected function batchCopy($value, $pks, $contexts)
	{
		// Set the variables
		$user = JFactory::getUser();

		// Access checks.
		if (!$user->authorise('core.create', 'com_advancedmodules')) {
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_CANNOT_CREATE'));
			return false;
		}

		$db = $this->getDbo();
		$table = $this->getTable();
		$table_a = JTable::getInstance('AdvancedModules', 'AdvancedModulesTable');
		$i = 0;

		foreach ($pks as $pk)
		{
			$table->reset();
			$table->load($pk);

			// Set the new position
			if ($value == 'noposition') {
				$position = '';
			}
			elseif ($value == 'nochange')
			{
				$position = $table->position;
			}
			else
			{
				$position = $value;
			}
			$table->position = $position;

			// Alter the title if necessary
			$data = $this->generateNewTitle(0, $table->title, $table->position);
			$table->title = $data['0'];

			// Reset the ID because we are making a copy
			$table->id = 0;

			// Unpublish the new module
			$table->published = 0;

			if (!$table->store()) {
				$this->setError($table->getError());
				return false;
			}

			// Get the new item ID
			$newId = $table->get('id');

			// Add the new ID to the array
			$newIds[$i] = $newId;
			$i++;

			// Now we need to handle the module assignments
			$query = $db->getQuery(true);
			$query->select($db->quoteName('menuid'));
			$query->from($db->quoteName('#__modules_menu'));
			$query->where($db->quoteName('moduleid').' = '.$pk);
			$db->setQuery($query);
			$menus = $db->loadColumn();

			// Insert the new records into the table
			foreach ($menus as $menu)
			{
				$query->clear();
				$query->insert($db->quoteName('#__modules_menu'));
				$query->columns(array($db->quoteName('moduleid'), $db->quoteName('menuid')));
				$query->values($newId.', '.$menu);
				$db->setQuery($query);
				$db->query();
			}

			if ($table->id && !$table_a->load($table->id)) {
				$table_a->moduleid = $table->id;
				$db->insertObject($table_a->getTableName(), $table_a, $table_a->getKeyName());
			}

			if ($table_a->load($pk, true)) {
				$table_a->moduleid = $table->id;

				if (!$table_a->check() || !$table_a->store()) {
					$this->setError($table->getError());
					return false;
				}
			}
		}

		// Clean the cache
		$this->cleanCache();

		return $newIds;
	}

	/**
	 * Batch move modules to a new position or current.
	 *
	 * @param   integer  $value      The new value matching a module position.
	 * @param   array    $pks        An array of row IDs.
	 * @param   array    $contexts   An array of item contexts.
	 *
	 * @return  boolean  True if successful, false otherwise and internal error is set.
	 *
	 * @since   11.1
	 */
	protected function batchMove($value, $pks, $contexts)
	{
		// Set the variables
		$user = JFactory::getUser();
		$table = $this->getTable();
		$i = 0;

		foreach ($pks as $pk)
		{
			if ($user->authorise('core.edit', 'com_advancedmodules')) {
				$table->reset();
				$table->load($pk);

				// Set the new position
				if ($value == 'noposition') {
					$position = '';
				}
				elseif ($value == 'nochange')
				{
					$position = $table->position;
				}
				else
				{
					$position = $value;
				}
				$table->position = $position;

				// Alter the title if necessary
				$data = $this->generateNewTitle(0, $table->title, $table->position);
				$table->title = $data['0'];

				// Unpublish the moved module
				$table->published = 0;

				if (!$table->store()) {
					$this->setError($table->getError());
					return false;
				}
			}
			else
			{
				$this->setError(JText::_('JLIB_APPLICATION_ERROR_BATCH_CANNOT_EDIT'));
				return false;
			}
		}

		// Clean the cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Method to delete rows.
	 *
	 * @param   array  &$pks  An array of item ids.
	 *
	 * @return  boolean  Returns true on success, false on failure.
	 *
	 * @since   1.6
	 */
	public function delete(&$pks)
	{
		// Initialise variables.
		$pks = (array) $pks;
		$user = JFactory::getUser();
		$table = $this->getTable();

		// Iterate the items to delete each one.
		foreach ($pks as $i => $pk)
		{
			if ($table->load($pk)) {
				// Access checks.
				if (!$user->authorise('core.delete', 'com_advancedmodules') || $table->published != -2) {
					JError::raiseWarning(403, JText::_('JERROR_CORE_DELETE_NOT_PERMITTED'));
					//	throw new Exception(JText::_('JERROR_CORE_DELETE_NOT_PERMITTED'));
					return;
				}

				if (!$table->delete($pk)) {
					throw new Exception($table->getError());
				}
				else
				{
					// Delete the menu assignments
					$db = $this->getDbo();
					$query = $db->getQuery(true);
					$query->delete();
					$query->from('#__modules_menu');
					$query->where('moduleid='.(int) $pk);
					$db->setQuery((string) $query);
					$db->query();

					$query = $db->getQuery(true);
					$query->delete();
					$query->from('#__advancedmodules');
					$query->where('moduleid='.(int) $pk);
					$db->setQuery((string) $query);
					$db->query();
				}

				// Clear module cache
				parent::cleanCache($table->module, $table->client_id);
			}
			else
			{
				throw new Exception($table->getError());
			}
		}

		// Clear modules cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Method to duplicate modules.
	 *
	 * @param   array  &$pks  An array of primary key IDs.
	 *
	 * @return  boolean  True if successful.
	 *
	 * @since   1.6
	 * @throws  Exception
	 */
	public function duplicate(&$pks)
	{
		// Initialise variables.
		$user = JFactory::getUser();

		// Access checks.
		if (!$user->authorise('core.create', 'com_advancedmodules')) {
			throw new Exception(JText::_('JERROR_CORE_CREATE_NOT_PERMITTED'));
		}

		$db = $this->getDbo();
		$table = $this->getTable();
		$table_a = JTable::getInstance('AdvancedModules', 'AdvancedModulesTable');
		foreach ($pks as $pk)
		{
			if ($table->load($pk, true)) {
				// Reset the id to create a new record.
				$table->id = 0;

				// Alter the title.
				$m = null;
				if (preg_match('#\((\d+)\)$#', $table->title, $m)) {
					$table->title = preg_replace('#\(\d+\)$#', '('.($m[1] + 1).')', $table->title);
				}
				else
				{
					$table->title .= ' (2)';
				}
				// Unpublish duplicate module
				$table->published = 0;

				if (!$table->check() || !$table->store()) {
					throw new Exception($table->getError());
				}

				// $query = 'SELECT menuid'
				//	. ' FROM #__modules_menu'
				//	. ' WHERE moduleid = '.(int) $pk
				//	;

				$query = $db->getQuery(true);
				$query->select('menuid');
				$query->from('#__modules_menu');
				$query->where('moduleid='.(int) $pk);

				$this->_db->setQuery((string) $query);
				$rows = $this->_db->loadColumn();

				foreach ($rows as $menuid)
				{
					$tuples[] = '('.(int) $table->id.','.(int) $menuid.')';
				}

				if ($table->id && !$table_a->load($table->id)) {
					$table_a->moduleid = $table->id;
					$db->insertObject($table_a->getTableName(), $table_a, $table_a->getKeyName());
				}

				if ($table_a->load($pk, true)) {
					$table_a->moduleid = $table->id;

					if (!$table_a->check() || !$table_a->store()) {
						throw new Exception($table_a->getError());
					}
				}
			}
			else
			{
				throw new Exception($table->getError());
			}
		}

		if (!empty($tuples)) {
			// Module-Menu Mapping: Do it in one query
			$query = 'INSERT INTO #__modules_menu (moduleid,menuid) VALUES '.implode(',', $tuples);
			$this->_db->setQuery($query);

			if (!$this->_db->query()) {
				return JError::raiseWarning(500, $this->_db->getErrorMsg());
			}
		}

		// Clear modules cache
		$this->cleanCache();

		return true;
	}

	/**
	 * Method to change the title.
	 *
	 * @param   integer $category_id  The id of the category. Not used here.
	 * @param   string  $title     The title.
	 * @param   string  $position  The position.
	 *
	 * @return	array  Contains the modified title.
	 *
	 * @since	2.5
	 */
	protected function generateNewTitle($category_id, $title, $position)
	{
		// Alter the title & alias
		$table = $this->getTable();
		while ($table->load(array('position' => $position,
		                          'title'    => $title)))
		{
			$title = JString::increment($title);
		}

		return array($title);
	}

	/**
	 * Method to get the client object
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	function &getClient()
	{
		return $this->_client;
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  JForm  A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// The folder and element vars are passed when saving the form.
		if (empty($data)) {
			$item = $this->getItem();
			$clientId = $item->client_id;
			$module = $item->module;
		}
		else
		{
			$clientId = JArrayHelper::getValue($data, 'client_id');
			$module = JArrayHelper::getValue($data, 'module');
		}

		// These variables are used to add data from the plugin XML files.
		$this->setState('item.client_id', $clientId);
		$this->setState('item.module', $module);

		// Get the form.
		$form = $this->loadForm('com_advancedmodules.module', 'module', array('control'   => 'jform',
		                                                                      'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		$form->setFieldAttribute('position', 'client', $this->getState('item.client_id') == 0 ? 'site' : 'administrator');

		// Modify the form based on access controls.
		if (!$this->canEditState((object) $data)) {
			// Disable fields for display.
			$form->setFieldAttribute('ordering', 'disabled', 'true');
			$form->setFieldAttribute('published', 'disabled', 'true');
			$form->setFieldAttribute('publish_up', 'disabled', 'true');
			$form->setFieldAttribute('publish_down', 'disabled', 'true');

			// Disable fields while saving.
			// The controller has already verified this is a record you can edit.
			$form->setFieldAttribute('ordering', 'filter', 'unset');
			$form->setFieldAttribute('published', 'filter', 'unset');
			$form->setFieldAttribute('publish_up', 'filter', 'unset');
			$form->setFieldAttribute('publish_down', 'filter', 'unset');
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		$app = JFactory::getApplication();

		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_advancedmodules.edit.module.data', array());

		if (empty($data)) {
			$data = $this->getItem();

			// This allows us to inject parameter settings into a new module.
			$params = $app->getUserState('com_advancedmodules.add.module.params');
			if (is_array($params)) {
				$data->set('params', $params);
			}
		}

		return $data;
	}

	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  mixed  Object on success, false on failure.
	 *
	 * @since   1.6
	 */
	public function getItem($pk = null)
	{
		// Initialise variables.
		$pk = (!empty($pk)) ? (int) $pk : (int) $this->getState('module.id');
		$db = $this->getDbo();

		if (!isset($this->_cache[$pk])) {
			$false = false;

			// Get a row instance.
			$table = $this->getTable();

			// Attempt to load the row.
			$return = $table->load($pk);

			// Check for a table object error.
			if ($return === false && $error = $table->getError()) {
				$this->setError($error);
				return $false;
			}

			// Check if we are creating a new extension.
			if (empty($pk)) {
				if ($extensionId = (int) $this->getState('extension.id')) {
					$query = $db->getQuery(true);
					$query->select('element, client_id');
					$query->from('#__extensions');
					$query->where('extension_id = '.$extensionId);
					$query->where('type = '.$db->quote('module'));
					$db->setQuery($query);

					$extension = $db->loadObject();
					if (empty($extension)) {
						if ($error = $db->getErrorMsg()) {
							$this->setError($error);
						}
						else
						{
							$this->setError('COM_MODULES_ERROR_CANNOT_FIND_MODULE');
						}
						return false;
					}

					// Extension found, prime some module values.
					$table->module = $extension->element;
					$table->client_id = $extension->client_id;
				}
				else
				{
					$app = JFactory::getApplication();
					$app->redirect(JRoute::_('index.php?option=com_advancedmodules&view=modules', false));
					return false;
				}
			}

			// Convert to the JObject before adding other data.
			$properties = $table->getProperties(1);
			$this->_cache[$pk] = JArrayHelper::toObject($properties, 'JObject');

			// Convert the params field to an array.
			$registry = new JRegistry;
			$registry->loadString($table->params);
			$this->_cache[$pk]->params = $registry->toArray();

			// Advanced parameters
			// Get a row instance.
			$table_a = $this->getTable('AdvancedModules', 'AdvancedModulesTable');

			// Attempt to load the row.
			$table_a->load($pk);

			// Convert the params field to an array.
			$registry = new JRegistry;
			$registry->loadString($table_a->params);
			$this->_cache[$pk]->advancedparams = $registry->toArray();

			if (!isset($this->_cache[$pk]->advancedparams['assignto_menuitems'])) {
				$this->_cache[$pk]->advancedparams = $this->initAssignments($pk, $this->_cache[$pk]);
			}

			$assigned = array();
			$assignment = 0;
			if (isset($this->_cache[$pk]->advancedparams['assignto_menuitems']) && isset($this->_cache[$pk]->advancedparams['assignto_menuitems_selection'])) {
				$assigned = $this->_cache[$pk]->advancedparams['assignto_menuitems_selection'];
				if ($this->_cache[$pk]->advancedparams['assignto_menuitems'] == 1 && empty($this->_cache[$pk]->advancedparams['assignto_menuitems_selection'])) {
					$assignment = '-';
				} else if ($this->_cache[$pk]->advancedparams['assignto_menuitems'] == 1) {
					$assignment = '1';
				} else if ($this->_cache[$pk]->advancedparams['assignto_menuitems'] == 2) {
					$assignment = '-1';
				}
			}

			$this->_cache[$pk]->assigned = $assigned;
			$this->_cache[$pk]->assignment = $assignment;

			// Get the module XML.
			$client = JApplicationHelper::getClientInfo($table->client_id);
			$path = JPath::clean($client->path.'/modules/'.$table->module.'/'.$table->module.'.xml');

			if (file_exists($path)) {
				$this->_cache[$pk]->xml = simplexml_load_file($path);
			}
			else
			{
				$this->_cache[$pk]->xml = null;
			}
		}

		return $this->_cache[$pk];
	}

	/**
	 * Get the necessary data to load an item help screen.
	 *
	 * @return  object  An object with key, url, and local properties for loading the item help screen.
	 *
	 * @since   1.6
	 */
	public function getHelp()
	{
		return (object) array('key' => $this->helpKey,
		                      'url' => $this->helpURL);
	}

	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param   string  $type    The table type to instantiate
	 * @param   string  $prefix  A prefix for the table class name. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A database object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'Module', $prefix = 'JTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Prepare and sanitise the table prior to saving.
	 *
	 * @param   JTable  &$table  The database object
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function prepareTable(&$table)
	{
		$date = JFactory::getDate();
		$user = JFactory::getUser();

		$table->title = htmlspecialchars_decode($table->title, ENT_QUOTES);

		if (empty($table->id)) {
			// Set the values
			//$table->created	= $date->toSql();
		}
		else
		{
			// Set the values
			//$table->modified	= $date->toSql();
			//$table->modified_by	= $user->get('id');
		}
	}

	/**
	 * Method to preprocess the form
	 *
	 * @param   JForm   $form   A form object.
	 * @param   mixed   $data   The data expected for the form.
	 * @param   string  $group  The name of the plugin group to import (defaults to "content").
	 *
	 * @return  void
	 *
	 * @since   1.6
	 * @throws  Exception if there is an error loading the form.
	 */
	protected function preprocessForm(JForm $form, $data, $group = 'content')
	{
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');

		// Initialise variables.
		$lang = JFactory::getLanguage();
		$clientId = $this->getState('item.client_id');
		$module = $this->getState('item.module');

		$client = JApplicationHelper::getClientInfo($clientId);
		$formFile = JPath::clean($client->path.'/modules/'.$module.'/'.$module.'.xml');

		// Load the core and/or local language file(s).
		$lang->load($module, $client->path, null, false, false)
			|| $lang->load($module, $client->path.'/modules/'.$module, null, false, false)
			|| $lang->load($module, $client->path, $lang->getDefault(), false, false)
			|| $lang->load($module, $client->path.'/modules/'.$module, $lang->getDefault(), false, false);

		if (file_exists($formFile)) {
			// Get the module form.
			if (!$form->loadFile($formFile, false, '//config')) {
				throw new Exception(JText::_('JERROR_LOADFILE_FAILED'));
			}

			// Attempt to load the xml file.
			if (!$xml = simplexml_load_file($formFile)) {
				throw new Exception(JText::_('JERROR_LOADFILE_FAILED'));
			}

			// Get the help data from the XML file if present.
			$help = $xml->xpath('/extension/help');
			if (!empty($help)) {
				$helpKey = trim((string) $help[0]['key']);
				$helpURL = trim((string) $help[0]['url']);

				$this->helpKey = $helpKey ? $helpKey : $this->helpKey;
				$this->helpURL = $helpURL ? $helpURL : $this->helpURL;
			}
		}

		// Trigger the default form events.
		parent::preprocessForm($form, $data, $group);
	}

	/**
	 * Loads ContentHelper for filters before validating data.
	 *
	 * @param   object  $form  The form to validate against.
	 * @param   array   $data  The data to validate.
	 *
	 * @return  mixed  Array of filtered data if valid, false otherwise.
	 *
	 * @since   1.1
	 */
	function validate($form, $data, $group = null)
	{
		require_once JPATH_ADMINISTRATOR.'/components/com_content/helpers/content.php';

		return parent::validate($form, $data, $group);
	}

	/**
	 * Applies the text filters to arbitrary text as per settings for current user groups
	 *
	 * @param   text  $text  The string to filter
	 *
	 * @return  string  The filtered string
	 */
	function filterText($text)
	{
		if (version_compare(JVERSION, '2.5', 'l')) {
			require_once JPATH_ADMINISTRATOR.'/components/com_content/helpers/content.php';
			return ContentHelper::filterText($text);
		} else {
			return JComponentHelper::filterText($text);
		}
	}

	/**
	 * Method to save the form data.
	 *
	 * @param   array  $data  The form data.
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   1.6
	 */
	public function save($data)
	{
		$advancedparams = JRequest::getVar('advancedparams', array(), 'post', 'array');

		// Initialise variables;
		$dispatcher = JDispatcher::getInstance();
		$table = $this->getTable();
		$pk = (!empty($data['id'])) ? $data['id'] : (int) $this->getState('module.id');
		$isNew = true;

		// Include the content modules for the onSave events.
		JPluginHelper::importPlugin('extension');

		// Load the row if saving an existing record.
		if ($pk > 0) {
			$table->load($pk);
			$isNew = false;
		}

		// Alter the title and published state for Save as Copy
		if (JRequest::getVar('task') == 'save2copy') {
			$orig_data = JRequest::getVar('jform', array(), 'post', 'array');
			$orig_table = clone($this->getTable());
			$orig_table->load((int) $orig_data['id']);

			if ($data['title'] == $orig_table->title) {
				$data['title'] .= ' '.JText::_('JGLOBAL_COPY');
				$data['published'] = 0;
			}
		}

		// correct the publish date details
		if (isset($advancedparams['assignto_date'])) {
			$publish_up = 0;
			$publish_down = 0;
			if ($advancedparams['assignto_date'] == 2) {
				$publish_up = $advancedparams['assignto_date_publish_down'];
			} else if ($advancedparams['assignto_date'] == 1) {
				$publish_up = $advancedparams['assignto_date_publish_up'];
				$publish_down = $advancedparams['assignto_date_publish_down'];
			}

			$data['publish_up'] = $publish_up;
			$data['publish_down'] = $publish_down;
		}

		$lang = '*';
		if (isset($advancedparams['assignto_languages'])
			&& $advancedparams['assignto_languages'] == 1
			&& count($advancedparams['assignto_languages_selection']) === 1
		) {
			$lang = $advancedparams['assignto_languages_selection']['0'];
		}
		$data['language'] = $lang;

		// Bind the data.
		if (!$table->bind($data)) {
			$this->setError($table->getError());
			return false;
		}

		// Prepare the row for saving
		$this->prepareTable($table);

		// Check the data.
		if (!$table->check()) {
			$this->setError($table->getError());
			return false;
		}

		// Trigger the onExtensionBeforeSave event.
		$result = $dispatcher->trigger('onExtensionBeforeSave', array('com_advancedmodules.module', &$table, $isNew));
		if (in_array(false, $result, true)) {
			$this->setError($table->getError());
			return false;
		}

		// Store the data.
		if (!$table->store()) {
			$this->setError($table->getError());
			return false;
		}

		$table_adv = JTable::getInstance('AdvancedModules', 'AdvancedModulesTable');

		$table_adv->moduleid = $table->id;
		if ($table_adv->moduleid && !$table_adv->load($table_adv->moduleid)) {
			$db = $table_adv->getDbo();
			$db->insertObject($table_adv->getTableName(), $table_adv, $table_adv->getKeyName());
		}

		$registry = new JRegistry;
		$registry->loadArray($advancedparams);
		$table_adv->params = (string) $registry;

		// Check the row
		$table_adv->check();

		// Store the row
		if (!$table_adv->store()) {
			$this->setError($table_adv->getError());
		}

		//
		// Process the menu link mappings.
		//
		$data['assignment'] = '0';
		$data['assigned'] = array();
		if (isset($advancedparams['assignto_menuitems'])) {
			$empty = 0;
			if (isset($advancedparams['assignto_menuitems_selection'])) {
				$data['assigned'] = $advancedparams['assignto_menuitems_selection'];
				$empty = empty($advancedparams['assignto_menuitems_selection']);
			} else
			{
				$empty = 1;
			}
			if ($advancedparams['assignto_menuitems'] == 1 && $empty) {
				$data['assignment'] = '-';
			} else if ($advancedparams['assignto_menuitems'] == 1) {
				$data['assignment'] = '1';
			} else if ($advancedparams['assignto_menuitems'] == 2 && $empty) {
				$data['assignment'] = '0';
			} else if ($advancedparams['assignto_menuitems'] == 2) {
				$data['assignment'] = '-1';
			}
		}

		$assignment = $data['assignment'];

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->delete();
		$query->from('#__modules_menu');
		$query->where('moduleid = '.(int) $table->id);
		$db->setQuery((string) $query);
		$db->query();

		if (!$db->query()) {
			$this->setError($db->getErrorMsg());
			return false;
		}

		// If the assignment is numeric, then something is selected (otherwise it's none).
		if (is_numeric($assignment)) {
			// Variable is numeric, but could be a string.
			$assignment = (int) $assignment;

			// Logic check: if no module excluded then convert to display on all.
			if ($assignment == -1 && empty($data['assigned'])) {
				$assignment = 0;
			}

			// Check needed to stop a module being assigned to `All`
			// and other menu items resulting in a module being displayed twice.
			if ($assignment === 0) {
				// assign new module to `all` menu item associations
				// $this->_db->setQuery(
				//	'INSERT INTO #__modules_menu'.
				//	' SET moduleid = '.(int) $table->id.', menuid = 0'
				// );

				$query->clear();
				$query->insert('#__modules_menu');
				$query->columns(array($db->quoteName('moduleid'), $db->quoteName('menuid')));
				$query->values((int) $table->id.', 0');
				$db->setQuery((string) $query);
				if (!$db->query()) {
					$this->setError($db->getErrorMsg());
					return false;
				}
			}
			elseif (!empty($data['assigned']))
			{
				// Get the sign of the number.
				$sign = $assignment < 0 ? -1 : +1;

				// Preprocess the assigned array.
				$tuples = array();
				foreach ($data['assigned'] as &$pk)
				{
					$tuples[] = '('.(int) $table->id.','.(int) $pk * $sign.')';
				}

				$this->_db->setQuery(
					'INSERT INTO #__modules_menu (moduleid, menuid) VALUES '.
						implode(',', $tuples)
				);

				if (!$db->query()) {
					$this->setError($db->getErrorMsg());
					return false;
				}
			}
		}

		// Trigger the onExtensionAfterSave event.
		$dispatcher->trigger('onExtensionAfterSave', array('com_advancedmodules.module', &$table, $isNew));

		// Compute the extension id of this module in case the controller wants it.
		$query = $db->getQuery(true);
		$query->select('extension_id');
		$query->from('#__extensions AS e');
		$query->leftJoin('#__modules AS m ON e.element = m.module');
		$query->where('m.id = '.(int) $table->id);
		$db->setQuery($query);

		$extensionId = $db->loadResult();

		if ($error = $db->getErrorMsg()) {
			JError::raiseWarning(500, $error);
			return;
		}

		$this->setState('module.extension_id', $extensionId);
		$this->setState('module.id', $table->id);

		// Clear modules cache
		$this->cleanCache();

		// Clean module cache
		parent::cleanCache($table->module, $table->client_id);

		return true;
	}

	/**
	 * Method to save the advanced parameters.
	 *
	 * @param	array	$data	The form data.
	 *
	 * @return	boolean	True on success.
	 * @since	1.6
	 */
	public function saveAdvancedParams($data, $id = 0)
	{
		if (!$id) {
			$id = JRequest::getInt('id');
		}

		if (!$id) {
			return true;
		}

		require_once JPATH_ADMINISTRATOR.'/components/com_advancedmodules/tables/advancedmodules.php';
		$table = JTable::getInstance('AdvancedModules', 'AdvancedModulesTable');
		$table->moduleid = $id;

		if ($id && !$table->load($id)) {
			$db = $table->getDbo();
			$db->insertObject($table->getTableName(), $table, $table->getKeyName());
		}

		$registry = new JRegistry;
		$registry->loadArray($data);
		$table->params = (string) $registry;

		// Check the row
		$table->check();

		// Store the data.
		if (!$table->store()) {
			$this->setError($table->getError());
			return false;
		}

		return true;
	}

	/**
	 * Method to get and save the module core menu assignments
	 *
	 * @param	int	$id	The module id.
	 *
	 * @return	boolean	True on success.
	 * @since	1.6
	 */
	public function initAssignments($id, &$module, $params = array())
	{
		if (!$id) {
			$id = JRequest::getInt('id');
		}

		$params = array();

		$assign = 0;
		$menuitems = array();
		if (!empty($id)) {
			$db = $this->getDbo();
			// Determine the page assignment mode.
			$db->setQuery(
				'SELECT menuid'.
					' FROM #__modules_menu'.
					' WHERE moduleid = '.$id
			);
			$menuitems = $db->loadResultArray();

			$assign = 1;
			if (!empty($menuitems)) {
				if ($menuitems['0'] == 0) {
					$assign = 0;
					$menuitems = array();
				} else if ($menuitems['0'] < 0) {
					$assign = 2;
				}
				foreach ($menuitems as $i => $menuitem)
				{
					if ($menuitem < 0) {
						$menuitems[$i] = $menuitem * -1;
					}
				}
			}

			if ((isset($module->publish_up) && (int) $module->publish_up)
				|| (isset($module->publish_down) && (int) $module->publish_down)
			) {
				$params['assignto_date'] = 1;
				$params['assignto_date_publish_up'] = isset($module->publish_up) ? $module->publish_up : '';
				$params['assignto_date_publish_down'] = isset($module->publish_down) ? $module->publish_down : '';
			}

			if (isset($module->language) && $module->language && $module->language != '*') {
				$params['assignto_languages'] = 1;
				$params['assignto_languages_selection'] = array($module->language);
			}
		}

		$params['assignto_menuitems'] = $assign;
		$params['assignto_menuitems_selection'] = $menuitems;

		foreach ($params as $key => $val)
		{
			$params[$key] = $val;
		}

		AdvancedModulesModelModule::saveAdvancedParams($params, $id);

		return $params;
	}

	/**
	 * A protected method to get a set of ordering conditions.
	 *
	 * @param   object  $table  A record object.
	 *
	 * @return  array  An array of conditions to add to add to ordering queries.
	 *
	 * @since   1.6
	 */
	protected function getReorderConditions($table)
	{
		$condition = array();
		$condition[] = 'client_id = '.(int) $table->client_id;
		$condition[] = 'position = '.$this->_db->Quote($table->position);

		return $condition;
	}

	/**
	 * Custom clean cache method for different clients
	 *
	 * @return  void
	 *
	 * @since	1.6
	 */
	protected function cleanCache($group = null, $client_id = 0)
	{
		parent::cleanCache('com_advancedmodules', $this->getClient());
	}
}