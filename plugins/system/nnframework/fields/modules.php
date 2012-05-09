<?php
/**
 * Element: Modules
 * Displays an article id field with a button
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
 * Modules Element
 */
class nnFieldModules
{
	var $_version = '12.5.1';

	function getInput($name, $id, $value, $params, $children, $j15 = 0)
	{
		$this->params = $params;

		JHtml::_('behavior.modal', 'a.modal');

		$size = (int) $this->def('size');
		$multiple = $this->def('multiple');
		$showtype = $this->def('showtype');
		$showid = $this->def('showid');
		$showinput = $this->def('showinput');

		$db = JFactory::getDBO();

		// load the list of modules
		$query = 'SELECT id, title, position, module, published'
			.' FROM #__modules'
			.' WHERE client_id = 0'
			.' ORDER BY position, ordering, id';
		$db->setQuery($query);
		$modules = $db->loadObjectList();

		// assemble menu items to the array
		$options = array();

		$p = 0;
		foreach ($modules as $item) {
			if ($p !== $item->position) {
				if ($j15) {
					$options[] = JHtml::_('select.option', '-', '[ '.$item->position.' ]', 'value', 'text', true);
				} else {
					$pos = $item->position;
					if ($pos == '') {
						$pos = ':: '.JText::_('JNONE').' ::';
					}
					$options[] = JHtml::_('select.option', '-', '[ '.$pos.' ]', 'value', 'text', true);
				}
			}
			$p = $item->position;

			$item_id = $item->id;
			$item_name = '&nbsp;&nbsp;'.$item->title;
			if ($showtype) {
				$item_name .= ' ['.$item->module.']';
			}
			if ($showinput || $showid) {
				$item_name .= ' ['.$item->id.']';
			}
			if ($item->published == 0) {
				$item_name = '[[:font-style:italic;:]]*'.$item_name.' ('.JText::_($j15 ? 'Unpublished' : 'JUNPUBLISHED').')';
			}
			$options[] = JHtml::_('select.option', $item_id, $item_name, 'value', 'text');
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
					foreach ($modules as $item) {
						if ($item->id == $value) {
							$val_name = $item->title;
							if ($showtype) {
								$val_name .= ' ['.$item->module.']';
							}
							$val_name .= ' ['.$value.']';
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
			return nnHTML::selectlist($options, $name, $value, $id, $size, $multiple, 'style="max-width:360px"', $j15);
		}
	}

	private function def($val, $default = '')
	{
		return (isset($this->params[$val]) && (string) $this->params[$val] != '') ? (string) $this->params[$val] : $default;
	}
}

if (version_compare(JVERSION, '1.6.0', 'l')) {
	// For Joomla 1.5
	class JElementNN_Modules extends JElement
	{
		/**
		 * Element name
		 *
		 * @access	protected
		 * @var		string
		 */
		var $_name = 'Modules';

		function fetchElement($name, $value, &$node, $control_name)
		{
			$this->_nnfield = new nnFieldModules();
			return $this->_nnfield->getInput($control_name.'['.$name.']', $control_name.$name, $value, $node->attributes(), $node->children(), 1);
		}
	}
} else {
	// For Joomla 1.6
	class JFormFieldNN_Modules extends JFormField
	{
		/**
		 * The form field type
		 *
		 * @var		string
		 */
		public $type = 'Modules';

		protected function getInput()
		{
			$this->_nnfield = new nnFieldModules();
			return $this->_nnfield->getInput($this->name, $this->id, $this->value, $this->element->attributes(), $this->element->children());
		}
	}
}