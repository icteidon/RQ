<?php
/**
 * Plugin Helper File
 *
 * @package			Slider
 * @version			2.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

/**
 ** Plugin that places the button
 */
class plgButtonSliderHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
	}

	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function render($name)
	{
		$app = JFactory::getApplication();

		$button = new JObject();

		if ($app->isSite()) {
			$enable_frontend = $this->params->enable_frontend;
			if (!$enable_frontend) {
				return $button;
			}
		}

		$this->params->tag_open = preg_replace('#[^a-z0-9-_]#s', '', $this->params->tag_open);
		$this->params->tag_close = preg_replace('#[^a-z0-9-_]#s', '', $this->params->tag_close);
		$this->params->tag_delimiter = ($this->params->tag_delimiter == 'space') ? ' ' : '=';

		if ($this->params->button_use_custom_code && $this->params->button_custom_code) {
			$text = trim($this->params->button_custom_code);
			$text = str_replace(array("\r", "\n"), array('', '</p>\n<p>'), trim($text)).'</p>';
			$text = preg_replace('#^(.*?)</p>#', '\1', $text);
		} else {
			$text = '{'.$this->params->tag_open.$this->params->tag_delimiter.JText::_('SLD_TITLE').' 1}\n'.
				'<p>'.JText::_('SLD_TEXT').'</p>\n'.
				'<p>{'.$this->params->tag_open.$this->params->tag_delimiter.JText::_('SLD_TITLE').' 2}</p>\n'.
				'<p>'.JText::_('SLD_TEXT').'</p>\n'.
				'<p>{/'.$this->params->tag_close.'}</p>';
		}
		$text = str_replace('\\\\n', '\\n', addslashes($text));
		$text = str_replace('{', '{\'+\'', $text);

		$document = JFactory::getDocument();
		$js = "
			function insertSlider(editor) {
				jInsertEditorText('".$text."', editor);
			}
		";
		$document->addScriptDeclaration($js);

		$button_style = 'slider';
		if (!$this->params->button_icon) {
			$button_style = 'blank blank_slider';
		}
		$document->addStyleSheet(JURI::root(true).'/plugins/editors-xtd/slider/css/style.css');

		$text_ini = strtoupper(str_replace(' ', '_', $this->params->button_text));
		$text = JText::_($text_ini);
		if ($text == $text_ini) {
			$text = JText::_($this->params->button_text);
		}

		$button->set('modal', false);
		$button->set('link', '#');
		$button->set('onclick', 'insertSlider(\''.$name.'\');return false;');
		$button->set('text', $text);
		$button->set('name', $button_style);

		return $button;
	}
}