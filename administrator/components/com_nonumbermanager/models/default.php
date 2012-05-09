<?php
/**
 * @package			NoNumber Extension Manager
 * @version			3.1.1
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Default Model
 */
class NoNumberManagerModelDefault extends JModelList
{
	/**
	 * Get the extensions data
	 */
	public function getItems($ids = array())
	{
		$rows = $this->getItemsByXML();

		if (empty($rows)) {
			return array();
		}

		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('extension_id');
		$query->from('#__extensions');
		$query->where($db->quoteName('name').' = '.$db->quote('com_advancedmodules'));
		$query->where($db->quoteName('enabled').' = 1');
		$db->setQuery($query);
		$has_amm = $db->loadResult();

		$items = array();

		foreach ($rows as $row) {
			$item = $this->initItem();
			if (isset($row['name'])) {
				$item->name = $row['name'];
				$item->id = isset($row['id']) ? $row['id'] : preg_replace('#[^a-z\-]#', '', str_replace('?', '-', strtolower($item->name)));
				if (!empty($ids) && !in_array($item->id, $ids)) {
					continue;
				}
				$item->alias = isset($row['alias']) ? $row['alias'] : $item->id;
				$item->element = isset($row['element']) ? $row['element'] : $item->alias;
				$item->types = array();

				$types = array();
				if (isset($row['type'])) {
					$types = explode(',', $row['type']);
				}
				$this->checkInstalled($item, $types, $has_amm);

				$items[$item->id] = $item;
			}
		}
		return $items;
	}

	/**
	 * Return an object list with items from the xml file
	 */
	function getItemsByXML()
	{
		// Get a storage key.
		$store = $this->getStoreId();

		// Try to load the data from internal storage.
		if (isset($this->cache[$store])) {
			//return $this->cache[$store];
		}

		$items = array();

		jimport('joomla.filesystem.file');
		if (!JFile::exists(JPATH_COMPONENT.'/extensions.xml')) {
			return $items;
		}

		$file = JFile::read(JPATH_COMPONENT.'/extensions.xml');

		if (!$file) {
			return $items;
		}

		$xml_parser = xml_parser_create();
		xml_parse_into_struct($xml_parser, $file, $fields);
		xml_parser_free($xml_parser);

		foreach ($fields as $field) {
			if ($field['tag'] != 'EXTENSION'
				|| !isset($field['attributes'])) {
				continue;
			}

			$item = array();
			foreach ($field['attributes'] as $val => $key) {
				$item[strtolower($val)] = $key;
			}
			$items[] = $item;
		}

		// Add the items to the internal cache.
		$this->cache[$store] = $items;

		return $this->cache[$store];
	}

	/**
	 * Return an empty extension item object
	 */
	function initItem()
	{
		$item = new stdClass();
		$item->id = 0;
		$item->name = '';
		$item->alias = '';
		$item->element = '';
		$item->installed = '';
		$item->version = '';
		$item->pro = 0;
		$item->old = 1;
		$item->haspro = 1;
		$item->types = array();
		$item->missing = array();

		return $item;
	}

	/**
	 * Return an empty type object
	 */
	function initType()
	{
		$item = new stdClass();
		$item->id = 0;
		$item->type = '';
		$item->link = '';

		return $item;
	}

	/**
	 * Return an empty extension item
	 */
	function checkInstalled(&$item, $types = array(), $has_amm = 0)
	{
		jimport('joomla.filesystem.file');

		$file = '';
		$xml = '';

		foreach ($types as $type) {
			$el = $this->initType();
			$el->type = $type;
			$client_id = 1;
			switch ($type) {
				case 'com':
					$xml = '';
					if (JFile::exists(JPATH_ADMINISTRATOR.'/components/com_'.$item->element.'/'.$item->element.'.xml')) {
						$xml = JPATH_ADMINISTRATOR.'/components/com_'.$item->element.'/'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_SITE.'/components/com_'.$item->element.'/'.$item->element.'.xml')) {
						$client_id = 0;
						$xml = JPATH_SITE.'/components/com_'.$item->element.'/'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_ADMINISTRATOR.'/components/com_'.$item->element.'/com_'.$item->element.'.xml')) {
						$xml = JPATH_ADMINISTRATOR.'/components/com_'.$item->element.'/com_'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_SITE.'/components/com_'.$item->element.'/com_'.$item->element.'.xml')) {
						$client_id = 0;
						$xml = JPATH_SITE.'/components/com_'.$item->element.'/com_'.$item->element.'.xml';
					}
					break;
				case 'plg_system':
					$xml = '';
					if (JFile::exists(JPATH_PLUGINS.'/system/'.$item->element.'/'.$item->element.'.xml')) {
						$xml = JPATH_PLUGINS.'/system/'.$item->element.'/'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_PLUGINS.'/system/'.$item->element.'.xml')) {
						$xml = JPATH_PLUGINS.'/system/'.$item->element.'.xml';
					}
					break;
				case 'plg_editors-xtd':
					$xml = '';
					if (JFile::exists(JPATH_PLUGINS.'/editors-xtd/'.$item->element.'/'.$item->element.'.xml')) {
						$xml = JPATH_PLUGINS.'/editors-xtd/'.$item->element.'/'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_PLUGINS.'/editors-xtd/'.$item->element.'.xml')) {
						$xml = JPATH_PLUGINS.'/editors-xtd/'.$item->element.'.xml';
					}
					break;
				case 'mod':
					$xml = '';
					if (JFile::exists(JPATH_ADMINISTRATOR.'/modules/mod_'.$item->element.'/'.$item->element.'.xml')) {
						$xml = JPATH_ADMINISTRATOR.'/modules/mod_'.$item->element.'/'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_SITE.'/modules/mod_'.$item->element.'/'.$item->element.'.xml')) {
						$client_id = 0;
						$xml = JPATH_SITE.'/modules/mod_'.$item->element.'/'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_ADMINISTRATOR.'/modules/mod_'.$item->element.'/mod_'.$item->element.'.xml')) {
						$xml = JPATH_ADMINISTRATOR.'/modules/mod_'.$item->element.'/mod_'.$item->element.'.xml';
					} else if (JFile::exists(JPATH_SITE.'/modules/mod_'.$item->element.'/mod_'.$item->element.'.xml')) {
						$client_id = 0;
						$xml = JPATH_SITE.'/modules/mod_'.$item->element.'/mod_'.$item->element.'.xml';
					}
					break;
			}

			$el->client_id = $client_id;
			$el->link = $this->getURL($type, $item->element, $item->name, $client_id, $has_amm);
			if (!$xml) {
				$item->missing[] = $type;
			} else {
				$el->id = $this->getID($type, $item->element);
				if (!$file) {
					$file = $xml;
				}
			}
			$item->types[$type] = $el;
		}

		if (!$file) {
			$item->missing = array();
		} else {
			$xml = JApplicationHelper::parseXMLInstallFile($file);
			if ($xml && isset($xml['version'])) {
				$item->installed = 1;
				$item->version = str_replace(array('FREE', 'PRO'), '', $xml['version']);
				if (!(stripos($xml['version'], 'PRO') === false)) {
					$item->pro = 1;
					$item->old = 0;
				} else if (!(stripos($xml['version'], 'FREE') === false)) {
					$item->old = 0;
				}
				if (!$item->version) {
					$item->version = '0.0.0';
				}
			}
		}
	}

	/**
	 * Get the extension url
	 */
	function getURL($type, $element, $name, $client_id = 1, $has_amm = 0)
	{
		$db = JFactory::getDBO();

		list($type, $folder) = explode('_', $type.'_');

		$link = '';
		switch ($type) {
			case 'com';
				$link = 'option=com_'.$element;
				break;
			case 'mod';
				$link = 'option=com_'.($has_amm ? 'advanced' : '').'modules&filter_client_id='.$client_id.'&filter_module=mod_'.$element;
				break;
			case 'plg';
				$name = JText::_($name);
				$name = preg_replace('#^(.*?)\?.*$#', '\1', $name);
				$link = 'option=com_plugins&filter_folder='.$folder.'&filter_search='.$name;
				break;
		}

		return $link;
	}

	/**
	 * Get the extension id
	 */
	function getID($type, $element)
	{
		$db = JFactory::getDBO();

		list($type, $folder) = explode('_', $type.'_');

		$query = $db->getQuery(true);
		$query->from('#__extensions');
		$query->select('extension_id');

		switch ($type) {
			case 'com';
				$query->where($db->quoteName('type').' = '.$db->quote('component'));
				$query->where($db->quoteName('element').' = '.$db->quote('com_'.$element));
				break;
			case 'mod';
				$query->where($db->quoteName('type').' = '.$db->quote('module'));
				$query->where($db->quoteName('element').' = '.$db->quote('mod_'.$element));
				break;
			case 'plg';
				$query->where($db->quoteName('type').' = '.$db->quote('plugin'));
				$query->where($db->quoteName('element').' = '.$db->quote($element));
				$query->where($db->quoteName('folder').' = '.$db->quote($folder));
				break;
		}
		$db->setQuery($query);
		return $db->loadResult();
	}
}