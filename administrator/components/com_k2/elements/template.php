<?php
/**
 * @version		$Id: template.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if(K2_JVERSION=='16'){
	jimport('joomla.form.formfield');
	class JFormFieldTemplate extends JFormField {

		var	$type = 'template';

		function getInput(){
			return JElementTemplate::fetchElement($this->name, $this->value, $this->element, $this->options['control']);
		}
	}
}

jimport('joomla.html.parameter.element');

class JElementTemplate extends JElement
{

	var $_name = 'template';

	function fetchElement($name, $value, & $node, $control_name) {

		jimport('joomla.filesystem.folder');
		$mainframe = &JFactory::getApplication();
		$fieldName = (K2_JVERSION=='16')? $name : $control_name.'['.$name.']';
		$componentPath = JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'templates';
		$componentFolders = JFolder::folders($componentPath);
		$db =& JFactory::getDBO();
		if(K2_JVERSION=='16'){
			$query = "SELECT template FROM #__template_styles WHERE client_id = 0 AND home = 1";
		}
		else {
			$query = "SELECT template FROM #__templates_menu WHERE client_id = 0 AND menuid = 0";
		}
		$db->setQuery($query);
		$defaultemplate = $db->loadResult();

		if(JFolder::exists(JPATH_SITE.DS.'templates'.DS.$defaultemplate.DS.'html'.DS.'com_k2'.DS.'templates')){
			$templatePath = JPATH_SITE.DS.'templates'.DS.$defaultemplate.DS.'html'.DS.'com_k2'.DS.'templates';
		} else {
			$templatePath = JPATH_SITE.DS.'templates'.DS.$defaultemplate.DS.'html'.DS.'com_k2';
		}

		if (JFolder::exists($templatePath)){
			$templateFolders = JFolder::folders($templatePath);
			$folders = @array_merge($templateFolders, $componentFolders);
			$folders = @array_unique($folders);
		}
		else {
			$folders = $componentFolders;
		}

		$exclude = 'default';
		$options = array ();
		foreach ($folders as $folder) {
			if (preg_match(chr(1).$exclude.chr(1), $folder)) {
				continue ;
			}
			$options[] = JHTML::_('select.option', $folder, $folder);
		}

		array_unshift($options, JHTML::_('select.option', '', '-- '.JText::_('K2_USE_DEFAULT').' --'));

		return JHTML::_('select.genericlist', $options, $fieldName, 'class="inputbox"', 'value', 'text', $value, $control_name.$name);

	}

}
