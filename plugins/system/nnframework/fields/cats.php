<?php
/**
 * Element: Categories
 * Displays a (multiple) selectbox of available sections and categories
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
 * Categories Element
 */
class nnFieldCats
{
	var $_version = '12.5.1';

	function getInput($name, $id, $value, $params, $children, $j15 = 0)
	{
		$this->params = $params;

		$size = (int) $this->def('size');
		$multiple = $this->def('multiple');
		$show_ignore = $this->def('show_ignore');
		$auto_select_cats = $this->def('auto_select_cats', 1);

		$db = JFactory::getDBO();

		if (!is_array($value)) {
			$value = explode(',', $value);
		}

		// assemble items to the array
		$options = array();
		if ($show_ignore) {
			if (in_array('-1', $value)) {
				$value = array('-1');
			}
			$options[] = JHtml::_('select.option', '-1', '- '.JText::_('NN_IGNORE').' -', 'value', 'text', 0);
		}
		$items = JHtml::_('category.options', 'com_content');
		foreach ($items as $item) {
			$item->text = str_replace('- ', '&nbsp;&nbsp;', str_replace('&#160;', '&nbsp;', $item->text));
			$options[] = $item;
		}

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/html.php';
		return nnHTML::selectlist($options, $name, $value, $id, $size, $multiple, '', $j15);
	}

	private function def($val, $default = '')
	{
		return (isset($this->params[$val]) && (string) $this->params[$val] != '') ? (string) $this->params[$val] : $default;
	}
}

if (version_compare(JVERSION, '1.6.0', 'l')) {
	// For Joomla 1.5
	class JElementNN_Cats extends JElement
	{
		/**
		 * Element name
		 *
		 * @access	protected
		 * @var		string
		 */
		var $_name = 'Cats';

		function fetchElement($name, $value, &$node, $control_name)
		{
			$this->_nnfield = new nnFieldCats();
			return $this->_nnfield->getInput($control_name.'['.$name.']', $control_name.$name, $value, $node->attributes(), $node->children(), 1);
		}
	}
} else {
	// For Joomla 1.6
	class JFormFieldNN_Cats extends JFormField
	{
		/**
		 * The form field type
		 *
		 * @var		string
		 */
		public $type = 'Cats';

		protected function getInput()
		{
			$this->_nnfield = new nnFieldCats();
			return $this->_nnfield->getInput($this->name, $this->id, $this->value, $this->element->attributes(), $this->element->children());
		}
	}
}