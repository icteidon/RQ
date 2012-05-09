<?php
/**
 * Element: Block
 * Displays a block with optionally a title and description
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

// Load common functions
require_once JPATH_PLUGINS.'/system/nnframework/helpers/functions.php';

/**
 * Block Element
 *
 * Available extra parameters:
 * label			The title
 * description		The description
 * start			If no title or description, this defines that it is a start tag
 * end				Defines that it is a end tag
 */
class nnFieldBlock
{
	var $_version = '12.5.1';

	function getInput($name, $id, $value, $params, $children, $j15 = 0)
	{
		$this->params = $params;

		$title = $this->def('label');
		$description = $this->def('description');

		$start = $this->def('start', 0);
		$end = $this->def('end', 0);

		$hastitle = ($title || $description);

		$document = JFactory::getDocument();
		$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/style.css?v='.$this->_version);

		$html = array();

		if ($start || !$end) {
			$html[] = $this->getTitleBlock($title, $description, $start, $j15);
			if ($start || !$hastitle) {
				$class = 'panel nn_panel';
				if ($j15) {
					$class .= ' nn_panel_15';
				}
				$html[] = '<div class="'.$class.'"><div class="nn_block">';
			}
			if ($start) {
				if ($j15) {
					$html[] = '<table width="100%" class="paramlist admintable" cellspacing="1">';
					$html[] = '<tr><td colspan="2" class="paramlist_value">';
					$random = rand(100000, 999999);
					$html[] = '<div id="end-'.$random.'"></div><script type="text/javascript">NNFrameworkHideTD( "end-'.$random.'" );</script>';
				} else {
					$html[] = '<ul class="adminformlist"><li>';
				}
			}
		}
		if ($end || !$start) {
			if ($end) {
				if ($j15) {
					$random = rand(100000, 999999);
					$html[] = '<div id="end-'.$random.'"></div><script type="text/javascript">NNFrameworkHideTD( "end-'.$random.'" );</script>';
					$html[] = '</td></tr></table>';
				} else {
					$html[] = '<div style="clear: both;"></div></li></ul>';
				}
			}
			if ($end || !$hastitle) {
				$html[] = '<div style="clear: both;"></div>';
				$html[] = '</div></div>';
			}
		}

		return implode('', $html);
	}

	private function getTitleBlock($title = '', $description = '', $start = 0, $j15 = 0)
	{
		$nostyle = $this->def('nostyle', 0);

		if ($title) {
			$title = NNFrameworkFunctions::html_entity_decoder(JText::_($title));
		}

		if ($description) {
			// variables
			$v1 = $this->def('var1');
			$v2 = $this->def('var2');
			$v3 = $this->def('var3');
			$v4 = $this->def('var4');
			$v5 = $this->def('var5');

			$description = NNFrameworkFunctions::html_entity_decoder(trim(JText::sprintf($description, $v1, $v2, $v3, $v4, $v5)));
			$description = str_replace('span style="font-family:monospace;"', 'span class="nn_code"', $description);
		}

		$html = array();

		if ($title) {
			if ($nostyle) {
				$html[] = '<div style="clear:both;"><div>';
			} else {
				$class = 'panel nn_panel nn_panel_title';
				if ($j15) {
					$class .= ' nn_panel_15';
				}
				if ($start || $description) {
					$class .= ' nn_panel_top';
				}
				$html[] = '<div class="'.$class.'"><div class="nn_block nn_title">';
			}
			$html[] = $title;
			$html[] = '<div style="clear: both;"></div>';
			$html[] = '</div></div>';
		}

		if ($description) {
			if ($nostyle) {
				$html[] = '<div style="clear:both;"><div>';
			} else {
				$class = 'panel nn_panel nn_panel_description';
				if ($j15) {
					$class .= ' nn_panel_15';
				}
				if ($start) {
					$class .= ' nn_panel_top';
				}
				if ($title) {
					$class .= ' nn_panel_hastitle';
				}
				$html[] = '<div class="'.$class.'"><div class="nn_block nn_title">';
			}

			$html[] = $description;
			$html[] = '<div style="clear: both;"></div>';
			$html[] = '</div></div>';
		}

		return implode('', $html);
	}

	private function def($val, $default = '')
	{
		return (isset($this->params[$val]) && (string) $this->params[$val] != '') ? (string) $this->params[$val] : $default;
	}
}

if (version_compare(JVERSION, '1.6.0', 'l')) {
	// For Joomla 1.5
	class JElementNN_Block extends JElement
	{
		/**
		 * Element name
		 *
		 * @access	protected
		 * @var		string
		 */
		var $_name = 'Block';

		function fetchTooltip($label, $description, &$node, $control_name, $name)
		{
			$this->_nnfield = new nnFieldBlock();
			return;
		}

		function fetchElement($name, $value, &$node, $control_name)
		{
			return $this->_nnfield->getInput($control_name.'['.$name.']', $control_name.$name, $value, $node->attributes(), $node->children(), 1);
		}
	}
} else {
	// For Joomla 1.6
	class JFormFieldNN_Block extends JFormField
	{
		/**
		 * The form field type
		 *
		 * @var		string
		 */
		public $type = 'Block';

		protected function getLabel()
		{
			$this->_nnfield = new nnFieldBlock();
			return;
		}

		protected function getInput()
		{
			return $this->_nnfield->getInput($this->name, $this->id, $this->value, $this->element->attributes(), $this->element->children());
		}
	}
}