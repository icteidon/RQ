<?php
/**
 * Element: MenuItems
 * Display a menuitem field with a button
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
 * MenuItems Element
 */
class nnFieldMenuItems
{
	var $_version = '12.5.1';

	function getInput($name, $id, $value, $params, $children, $j15 = 0)
	{
		$this->params = $params;

		JHtml::_('behavior.modal', 'a.modal');

		$size = (int) $this->def('size');
		$multiple = $this->def('multiple', 1);
		$showinput = $this->def('showinput');
		$state = $this->def('state');
		$disable_types = $this->def('disable');

		$db = JFactory::getDBO();

		// load the list of menu types
		$query = 'SELECT menutype, title'
			.' FROM #__menu_types'
			.' ORDER BY title';
		$db->setQuery($query);
		$menuTypes = $db->loadObjectList();

		// load the list of menu items
		if ($state != '') {
			$where = 'WHERE published = '.(int) $state;
		} else {
			$where = 'WHERE published != -2';
		}
		if ($j15) {
			$query = 'SELECT id, parent, name, alias, menutype, type, published, home'
				.' FROM #__menu'
				.' '.$where
				.' ORDER BY menutype, parent, ordering';
		} else {
			$query = 'SELECT id, parent_id, title, alias, menutype, type, published, home'
				.', parent_id as parent, title as name'
				.' FROM #__menu'
				.' '.$where
				.' ORDER BY menutype, parent, ordering';
		}
		$db->setQuery($query);
		$menuItems = $db->loadObjectList();

		// establish the hierarchy of the menu
		$children = array();

		if ($menuItems) {
			// first pass - collect children
			foreach ($menuItems as $v) {
				if ($v->type != 'separator') {
					if ($j15) {
						if (preg_replace('#[^a-z0-9]#', '', strtolower($v->name)) !== preg_replace('#[^a-z0-9]#', '', $v->alias)) {
							$v->name .= ' ['.$v->alias.']';
						}
					} else {
						if (preg_replace('#[^a-z0-9]#', '', strtolower($v->title)) !== preg_replace('#[^a-z0-9]#', '', $v->alias)) {
							$v->title .= ' ['.$v->alias.']';
						}
					}
				}
				$pt = $v->parent;
				$list = @$children[$pt] ? $children[$pt] : array();
				array_push($list, $v);
				$children[$pt] = $list;
			}
		}

		// second pass - get an indent list of the items
		require_once JPATH_LIBRARIES.'/joomla/html/html/menu.php';
		$list = JHTMLMenu::treerecurse(0, '', array(), $children, 9999, 0, 0);

		// assemble into menutype groups
		$groupedList = array();
		foreach ($list as $k => $v) {
			$groupedList[$v->menutype][] =& $list[$k];
		}

		// assemble menu items to the array
		$options = array();

		$count = 0;
		foreach ($menuTypes as $type) {
			if (isset($groupedList[$type->menutype])) {
				if ($count > 0) {
					$options[] = JHtml::_('select.option', '-', '&nbsp;', 'value', 'text', true);
				}
				$count++;
				$options[] = JHtml::_('select.option', $type->menutype, '[ '.$type->title.' ]', 'value', 'text', true);
				$n = count($groupedList[$type->menutype]);
				for ($i = 0; $i < $n; $i++)
				{
					$item =& $groupedList[$type->menutype][$i];

					//If menutype is changed but item is not saved yet, use the new type in the list
					if (JRequest::getString('option', '', 'get') == 'com_menus') {
						$currentItemArray = JRequest::getVar('cid', array(0), '', 'array');
						$currentItemId = (int) $currentItemArray['0'];
						$currentItemType = JRequest::getString('type', $item->type, 'get');
						if ($currentItemId == $item->id && $currentItemType != $item->type) {
							$item->type = $currentItemType;
						}
					}

					$disable = strpos($disable_types, $item->type) !== false ? true : false;
					$item_id = $item->id;
					$item_name = '&nbsp;&nbsp;'.preg_replace('#^((&nbsp;)*)- #', '\1', str_replace('&#160;', '&nbsp;', $item->treename));

					if ($item->home) {
						$item_name .= ' ['.JText::_($j15 ? 'Default' : 'JDEFAULT').']';
					}
					if ($item->type == 'separator') {
						$item_name = '[[:font-weight:normal;font-style:italic;color:grey;:]]'.$item_name;
						if (!$item->children) {
							$disable = 1;
						}
					} else if ($item->published == 0 && !($state === 0)) {
						$item_name = '[[:font-style:italic;color:grey;:]]*'.$item_name.' ('.JText::_($j15 ? 'Unpublished' : 'JUNPUBLISHED').')';
					}
					if ($showinput) {
						$item_name .= ' ['.$item->id.']';
					}

					$options[] = JHtml::_('select.option', $item_id, $item_name, 'value', 'text', $disable);
				}
			}
		}

		if ($showinput) {
			array_unshift($options, JHtml::_('select.option', '-', '&nbsp;', 'value', 'text', true));
			array_unshift($options, JHtml::_('select.option', '-', '- '.JText::_('Select Item').' -'));

			if ($multiple) {
				$onchange = 'if ( this.value ) { if ( '.$id.'.value ) { '.$id.'.value+=\',\'; } '.$id.'.value+=this.value; } this.value=\'\';';
			} else {
				$onchange = 'if ( this.value ) { '.$id.'.value=this.value;'.$id.'_text.value=this.options[this.selectedIndex].innerHTML.replace( /^((&|&amp;|&#160;)nbsp;|-)*/gm, \'\' ).trim(); } this.value=\'\';';
			}
			$attribs = 'class="inputbox" onchange="'.$onchange.'"';

			$html = '<table cellpadding="0" cellspacing="0"><tr><td style="padding: 0px;">'."\n";
			if (!$multiple) {
				$val_name = $value;
				if ($value) {
					foreach ($menuItems as $item) {
						if ($item->id == $value) {
							$val_name = $item->name.' ['.$value.']';
							;
							break;
						}
					}
				}
				$html .= '<input type="text" id="'.$id.'_text" value="'.$val_name.'" class="inputbox" size="'.$size.'" disabled="disabled" />';
				$html .= '<input type="hidden" name="'.$name.'" id="'.$id.'" value="'.$value.'" />';
			} else {
				$html .= '<input type="text" name="'.$name.'" id="'.$id.'" value="'.$value.'" class="inputbox" size="'.$size.'" />';
			}
			$html .= '</td><td style="padding: 0px;"padding-left: 5px;>'."\n";
			$html .= JHtml::_('select.genericlist', $options, '', $attribs, 'value', 'text', '', '');
			$html .= '</td></tr></table>'."\n";
			return $html;
		} else {
			require_once JPATH_PLUGINS.'/system/nnframework/helpers/html.php';
			return nnHTML::selectlist($options, $name, $value, $id, $size, $multiple, '', $j15);
		}
	}

	private function def($val, $default = '')
	{
		return (isset($this->params[$val]) && (string) $this->params[$val] != '') ? (string) $this->params[$val] : $default;
	}
}

if (version_compare(JVERSION, '1.6.0', 'l')) {
	// For Joomla 1.5
	class JElementNN_MenuItems extends JElement
	{
		/**
		 * Element name
		 *
		 * @access	protected
		 * @var		string
		 */
		var $_name = 'MenuItems';

		function fetchElement($name, $value, &$node, $control_name)
		{
			$this->_nnfield = new nnFieldMenuItems();
			return $this->_nnfield->getInput($control_name.'['.$name.']', $control_name.$name, $value, $node->attributes(), $node->children(), 1);
		}
	}
} else {
	// For Joomla 1.6
	class JFormFieldNN_MenuItems extends JFormField
	{
		/**
		 * The form field type
		 *
		 * @var		string
		 */
		public $type = 'MenuItems';

		protected function getInput()
		{
			$this->_nnfield = new nnFieldMenuItems();
			return $this->_nnfield->getInput($this->name, $this->id, $this->value, $this->element->attributes(), $this->element->children());
		}
	}
}