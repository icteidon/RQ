<?php
/**
 * Plugin Helper File
 *
 * @package			Content Templater
 * @version			3.1.0
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
class plgButtonContentTemplaterHelper
{
	function __construct(&$params)
	{
		$this->params = $params;

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
		$this->parameters = NNParameters::getInstance();
		$this->config = $this->parameters->getComponentParams('contenttemplater');
	}

	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function render($name)
	{
		JHtml::_('behavior.modal');

		$app = JFactory::getApplication();

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/assignments.php';
		$this->assignments = new NNFrameworkAssignmentsHelper;

		$button = new JObject();
		$button->set('text', '');

		$button_style = 'contenttemplater';
		if (!$this->params->button_icon) {
			$button_style .= ' blank contenttemplater_noicon';
		} else {
			$button_style .= ' contenttemplater_icon';
		}
		$button->set('name', $button_style);

		require_once JPATH_ADMINISTRATOR.'/components/com_contenttemplater/models/list.php';
		$list = new ContentTemplaterModelList();
		$items = $list->getItems(1);

		$options = array();
		$extra_buttons = array();
		$styles = array();
		$css = array();

		if ($this->params->list_as_select) {
			$jsaction_insert = 'CT_f.getXML( this.value, \''.$name.'\' );';
		} else {
			$jsaction_insert = 'CT_f.getXML( this.rel, \''.$name.'\' );';
		}
		if ($this->params->show_confirm) {
			$jsaction_insert = 'if( confirm(\''.sprintf(JText::_('CT_ARE_YOU_SURE', true), '\n').'\') ) { '.$jsaction_insert.' };';
		}
		$jsaction = $jsaction_insert;

		foreach ($items as $item) {
			// not enabled if: not published
			if (!$item->published) {
				continue;
			}

			$pass = $this->passChecks($item);

			if ($pass) {
				if ($item->button_enabled == 2) {
					// template should be displayed as a button
					$style = str_replace('.png', '', $item->button_image);
					if ($style == -1) {
						$style = '';
					}
					$styles[] = $style;
					$onclick = 'CT_f.getXML( \''.$item->id.'\', \''.$name.'\' );';
					if ($this->params->show_confirm) {
						$onclick = 'if( confirm(\''.sprintf(JText::_('CT_ARE_YOU_SURE', true), '\n').'\') ) { '.$onclick.' };';
					}
					if (!strlen($item->button_name)) {
						$item->button_name = $item->name;
					}
					$extra_buttons[] =
						'"></a></div></div>'."\n"
							.'<div class="button2-left"><div class="blank '.$style.'">'
							.'<a title="'.$item->button_name.'" onclick="'.$onclick.'">'.$item->button_name.'</a><a style="display:none;';
				} else {
					// template should be displayed in select list
					if ($this->params->list_as_select) {
						$options[] = '<option value="'.$item->id.'">'
							.$item->name
							.'</option>';
					} else {
						$options[] = '<li title="'.$item->name.'"><a href="javascript://" onclick="'.$jsaction_insert.'" rel="'.$item->id.'"><span>'
							.$item->name
							.'</span></a></li>';
					}
				}
			}
		}

		$show_list = 1;
		if (empty($options)) {
			if ($app->isAdmin() && $this->params->show_empty) {
				if ($this->params->list_as_select) {
					array_unshift($options, '<option value="" selected="selected">- '.JText::_('CT_NO_TEMPLATES_AVAILABLE').' -</option>');
				} else {
					array_unshift($options, '<li><span>- '.JText::_('CT_NO_TEMPLATES_AVAILABLE').' -</span></li>');
				}
			} else {
				$button->set('name', '" style="display: none;');
				$show_list = 0;
			}
		}

		if ($this->params->show_create_new && $app->isAdmin()) {
			require_once JPATH_ADMINISTRATOR.'/components/com_contenttemplater/helpers/helper.php';
			$canDo = ContentTemplaterHelper::getActions();
			if ($canDo->get('core.create')) {
				$jsaction_new =
					'if( confirm(\''.JText::_('CT_OPEN_IN_NEW_WINDOW').'\') ) {'
						.'window.open(\'index.php?option=com_contenttemplater&view=item&layout=edit\');'
						.'} else if( confirm(\''.JText::_('CT_ARE_YOU_SURE_NEW').'\') ) {'
						.'window.location.href=\'index.php?option=com_contenttemplater&view=item&layout=edit\';'
						.'};';
				if (!empty($options) && !$this->params->list_as_select) {
					array_unshift($options, '<li><span>&nbsp;</span></li>');
				}
				if ($this->params->list_as_select) {
					array_unshift($options, '<option value="-1">- '.JText::_('CT_CREATE_NEW_TEMPLATE').' -</option>');
				} else {
					array_unshift($options,
						'<li><a href="javascript://" onclick="'.$jsaction_new.'"><span>'
							.'- '.JText::_('CT_CREATE_NEW_TEMPLATE').' -'
							.'</span></a></li>'
					);
				}
				$jsaction = 'if( this.value == -1) {'.$jsaction_new.'} else {'.$jsaction_insert.'}';
			}
		}

		$extra_html = '">';

		$text_ini = strtoupper(str_replace(' ', '_', $this->params->button_text));
		$text = JText::_($text_ini);
		if ($text == $text_ini) {
			$text = JText::_($this->params->button_text);
		}

		if ($this->params->list_as_select) {
			array_unshift($options, '<option value="" selected="selected">- '.$text.' -</option>');
		} else {
			$extra_html .= $text;
		}

		$extra_html .= '</a><script type="text/javascript">var CT_editor = "'.$name.'";</script>';

		if (!$this->params->list_as_select && $this->params->split_list) {
			$cols = ceil((count($options)) / (int) $this->params->split_list);
			if ($cols > 1) {
				for ($i = 1; $i < $cols; $i++) {
					if (isset($options[$i * $this->params->split_list])) {
						$options[$i * $this->params->split_list] = '</ul><ul>'.$options[$i * $this->params->split_list];
					}
				}
				$w = $cols * 200;
				$css[] = 'div.contenttemplater_submenu { width: '.$w.'px }';

				$filler = ($cols * $this->params->split_list) - count($options);
				for ($i = 1; $i <= $filler; $i++) {
					$options[] = '<li><span>&nbsp;</span></li>';
				}
			}
		}

		if ($show_list) {
			if ($this->params->list_as_select) {
				$extra_html .= '<select class="contenttemplater" onchange="'.$jsaction.'this.options[0].selected=true;return false;">';
				$extra_html .= implode('', $options);
				$extra_html .= '</select><span></span>';
				$extra_html = '" style="display:none;"'.$extra_html;
			} else {
				$extra_html .= '<div class="contenttemplater_submenu" style="display:none;"><ul>';
				$extra_html .= implode('', $options);
				$extra_html .= '</ul></div>';
				$extra_html = '" href="javascript://" onfocus="this.blur();" class="contenttemplater_button'.$extra_html;
			}
		}
		$extra_html .= '<a style="display:none;';

		$extra_html .= implode('', $extra_buttons);

		$button->set('text', '');
		$button->set('link', '');
		$button->set('options', $extra_html);

		if (count($styles)) {
			$excl_styles = array('', '-1', 'blank');
			$styles = array_map('trim', $styles);
			$styles = array_unique($styles);
			$styles = array_diff($styles, $excl_styles);
			if (count($styles)) {
				// clean styles
				foreach ($styles as $style) {
					$css[] =
						'.button2-left .'.$style.' a {
							background: transparent url('.JURI::root(true).'/plugins/editors-xtd/contenttemplater/images/buttons/'.$style.'.png) 100% 3px no-repeat;
							padding-right: 19px !important;
							margin-right: 3px;
						}';
				}
			}
		}

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';

		$document = JFactory::getDocument();
		$script = array();
		$script[] = 'var CT_root = "'.JURI::root().'";';
		$script[] = 'var CT_listtype = "'.($this->params->list_as_select ? 'select' : 'div').'";';
		$script[] = 'var CT_action = "'.($this->params->button_action).'";';
		$document->addScriptDeclaration(implode('', $script));
		$version = NoNumberVersions::getXMLVersion(null, null, null, 1);
		$document->addScript(JURI::root(true).'/plugins/system/nnframework/js/script.js'.$version);
		$version = NoNumberVersions::getXMLVersion('contenttemplater', 'component', null, 1);
		$document->addScript(JURI::root(true).'/plugins/editors-xtd/contenttemplater/js/script.js'.$version);
		$document->addStyleSheet(JURI::root(true).'/plugins/editors-xtd/contenttemplater/css/style.css'.$version);
		if ($this->params->show_list_below) {
			$css[] = 'div.contenttemplater_submenu { bottom: auto; top: 0; }';
		}
		if (!empty($css)) {
			$document->addStyleDeclaration(implode('', $css));
		}

		return $button;
	}

	function passChecks(&$item, $type = 'button')
	{
		if (!$item->{$type.'_enabled'}) {
			return 0;
		}

		$app = JFactory::getApplication();

		// not enabled if: not active in this area (frontend/backend)
		if (
			($app->isAdmin() && $item->{$type.'_enable_in_frontend'} == 2)
			|| ($app->isSite() && $item->{$type.'_enable_in_frontend'} == 0)
		) {
			return 0;
		}

		$pass = 1;

		return $pass;
	}
}