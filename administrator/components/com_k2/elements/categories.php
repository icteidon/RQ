<?php
/**
 * @version		$Id: categories.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if(K2_JVERSION=='16'){
	jimport('joomla.form.formfield');
	class JFormFieldCategories extends JFormField {

		var	$type = 'categories';

		function getInput(){
			return JElementCategories::fetchElement($this->name, $this->value, $this->element, $this->options['control']);
		}
	}
}

jimport('joomla.html.parameter.element');

class JElementCategories extends JElement
{

	var	$_name = 'categories';

	function fetchElement($name, $value, &$node, $control_name) {
		$db = &JFactory::getDBO();

		$query = 'SELECT m.* FROM #__k2_categories m WHERE trash = 0 ORDER BY parent, ordering';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		$children = array();
		if ( $mitems )
		{
			foreach ( $mitems as $v )
			{
				if(K2_JVERSION=='16'){
					$v->title = $v->name;
					$v->parent_id = $v->parent;
				}
				$pt = $v->parent;
				$list = @$children[$pt] ? $children[$pt] : array();
				array_push( $list, $v );
				$children[$pt] = $list;
			}
		}
		$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0 );
		$mitems = array();
		$mitems [] = JHTML::_ ( 'select.option', '0', JText::_('K2_NONE_ONSELECTLISTS'));
		
		foreach ( $list as $item ) {
			$item->treename = JString::str_ireplace('&#160;', ' -', $item->treename);
			$mitems[] = JHTML::_('select.option',  $item->id, $item->treename );
		}

		$attributes = 'class="inputbox"';
		if(K2_JVERSION == '16'){
			if($node->getAttribute('multiple')){
				$attributes.=' multiple="multiple" style="width:90%;" size="10"';
			}
		}
		else {
			if($node->attributes('multiple')){
				$attributes.=' multiple="multiple" style="width:90%;" size="10"';
			}
		}
		
		if(K2_JVERSION=='16'){
			$fieldName = $name;
		}
		else {
			$fieldName = $control_name.'['.$name.']';
			if($node->attributes('multiple')){
				$fieldName .= '[]';
			}
		}

		return JHTML::_('select.genericlist',  $mitems, $fieldName, $attributes, 'value', 'text', $value );
	}

}
