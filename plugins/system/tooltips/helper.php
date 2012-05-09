<?php
/**
 * Plugin Helper File
 *
 * @package			Tooltips
 * @version			2.1.0
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
 * Plugin that replaces stuff
 */
class plgSystemTooltipsHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
		$this->params->hasitems = 0;

		$this->params->comment_start = '<!-- START: Tooltips -->';
		$this->params->comment_end = '<!-- END: Tooltips -->';

		$this->params->tag = preg_replace('#[^a-z0-9-_]#s', '', $this->params->tag);
		$this->params->regex = '#'
			.'\{'.preg_quote($this->params->tag, '#').'((?: |&nbsp;|&\#160;|<)(?:[^\}]*\{[^\}]*\})*[^\}]*)\}'
			.'(.*?)'
			.'\{/'.preg_quote($this->params->tag, '#').'\}'
			.'#s';
	}

	////////////////////////////////////////////////////////////////////
	// onAfterDispatch
	////////////////////////////////////////////////////////////////////
	function onAfterDispatch()
	{
		$document = JFactory::getDocument();
		$docType = $document->getType();

		// only in html
		if ($docType !== 'html' && $docType !== 'feed') {
			return;
		}

		$buffer = $document->getBuffer('component');

		if (empty($buffer) || is_array($buffer)) {
			return;
		}

		// do not load scripts/styles on print page
		if ($docType !== 'feed' && !JRequest::getInt('print') && !JRequest::getInt('noscript')) {
			JHtml::_('behavior.mootools');

			$version = '';
			if ($this->params->use_versioned_files) {
				require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
				$version = NoNumberVersions::getXMLVersion('tooltips', 'system', null, 1);
			}

			$document->addScriptDeclaration('/* START: Tooltips scripts */');
			$script = '
				var tooltips_max_width = '.(int) $this->params->max_width.';
				var tooltips_fade_in_speed = 0;
				var tooltips_fade_out_speed = 200;
			';
			$document->addScriptDeclaration(preg_replace('#\n\s*#s', ' ', trim($script)));

			$options = array();
			$options['maxTitleChars'] = 99999;
			$options['className'] = 'tooltips-tip';
			$options['onShow'] = "function(tip){ tooltips_show( tip ); }";
			$options['onHide'] = "function(tip){ tooltips_hide( tip ); }";

			JHtml::_('behavior.tooltip', '.tooltips-link', $options);
			$options['className'] = 'tooltips-img tooltips-tip';
			JHtml::_('behavior.tooltip', '.tooltips-link-img', $options);

			$document->addScriptDeclaration('/* END: Tooltips scripts */');

			$mtversion = '';
			$document->addScript(JURI::root(true).'/plugins/system/tooltips/js/script'.$mtversion.'.js'.$version);

			if ($this->params->load_stylesheet) {
				$document->addStyleSheet(JURI::root(true).'/plugins/system/tooltips/css/style.css'.$version);
			}

			$style = array();
			if ($this->params->underline) {
				$style[] = 'span.tooltips-link { border-bottom: 1px '.$this->params->underline.' #'.$this->params->underline_color.'; }';
			}
			if ($this->params->zindex) {
				$style[] = 'div.tooltips-tip, div.tooltips-tip.tool-tip, div.tooltips-tip-tip { z-index: '.(int) $this->params->zindex.' }';
			}
			$style[] = 'div.tooltips-tip div.tip, div.tooltips-tip-tip > div {';
			if ($this->params->text_color) {
				$style[] = 'color: #'.strtoupper($this->params->text_color).';';
			}
			$style[] = 'background-color: #'.strtoupper($this->params->bg_color).';';
			$style[] = 'border-color: #'.strtoupper($this->params->border_color).';';
			$style[] = 'border-width: '.(int) $this->params->border_width.'px;';
			if ($this->params->use_border_radius) {
				$style[] = '-webkit-border-radius: '.(int) $this->params->border_radius.'px;';
				$style[] = '-moz-border-radius: '.(int) $this->params->border_radius.'px;';
				$style[] = 'border-radius: '.(int) $this->params->border_radius.'px;';
			}
			$style[] = 'max-width: '.(int) $this->params->max_width.'px;';
			$style[] = '}';
			if ($this->params->link_color) {
				$style[] = 'div.tooltips-tip div.tip a, div.tooltips-tip-tip > div a {';
				$style[] = 'color: #'.strtoupper($this->params->link_color).';';
				$style[] = '}';
			}
			$document->addStyleDeclaration('/* START: Tooltips styles */ '.implode(' ', $style).' /* END: Tooltips styles */');
		}

		if (strpos($buffer, '{'.$this->params->tag) === false) {
			return;
		}

		$this->protect($buffer);
		$this->replaceTags($buffer);
		$this->unprotect($buffer);

		$document->setBuffer($buffer, 'component');
	}

	////////////////////////////////////////////////////////////////////
	// onAfterRender
	////////////////////////////////////////////////////////////////////
	function onAfterRender()
	{
		$document = JFactory::getDocument();
		$docType = $document->getType();

		// only in html
		if ($docType !== 'html' && $docType !== 'feed') {
			return;
		}

		$html = JResponse::getBody();
		if ($html == '') {
			return;
		}

		if (strpos($html, '{'.$this->params->tag) === false) {
			if (!$this->params->hasitems) {
				// remove style and script if no items are found
				$html = preg_replace('#\s*<'.'link [^>]*href="[^"]*/plugins/system/tooltips/css/style.css"[^>]* />#s', '', $html);
				$html = preg_replace('#\s*<'.'script [^>]*src="[^"]*/plugins/system/tooltips/js/script[^"]*\.js[^"]*"[^>]*></script>#s', '', $html);
				$html = preg_replace('#/\* START: Tooltips .*?/\* END: Tooltips [a-z]* \*/\s*#s', '', $html);
			}
		} else {
			if (!(strpos($html, '<body') === false) && !(strpos($html, '</body>') === false)) {
				$html_split = explode('<body', $html, 2);
				$body_split = explode('</body>', $html_split['1'], 2);

				// only do the handling inside the body
				$this->protect($body_split['0']);
				$this->replaceTags($body_split['0']);
				$this->unprotect($body_split['0']);

				$html_split['1'] = implode('</body>', $body_split);
				$html = implode('<body', $html_split);
			} else {
				$this->protect($html);
				$this->replaceTags($html);
				$this->unprotect($html);
			}
		}

		JResponse::setBody($html);
	}

	////////////////////////////////////////////////////////////////////
	// FUNCTIONS
	////////////////////////////////////////////////////////////////////
	function replaceTags(&$str)
	{
		if (strpos($str, '{/'.$this->params->tag) === false) {
			if (preg_match_all($this->params->regex, $str, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$str = str_replace($match['0'], $match['2'], $str);
				}
			}
			return;
		}
		if (preg_match_all($this->params->regex, $str, $matches, PREG_SET_ORDER) > 0) {
			$this->params->hasitems = 1;
			foreach ($matches as $match) {
				$tip = $match['1'];
				$text = $match['2'];

				$classes = str_replace('\|', '[:TT_BAR:]', $tip);
				$classes = explode('|', $classes);
				foreach ($classes as $i => $class) {
					$classes[$i] = trim(str_replace('[:TT_BAR:]', '|', $class));
				}
				$tip = array_shift($classes);

				array_unshift($classes, 'tooltips-link');

				if (preg_match_all('#href="([^"]*)"#si', $tip, $url_matches, PREG_SET_ORDER) > 0) {
					foreach ($url_matches as $url_match) {
						$url = 'href="'.JRoute::_($url_match['1']).'"';
						$tip = str_replace($url_match['0'], $url, $tip);
					}
				}
				if (preg_match_all('#src="([^"]*)"#si', $tip, $url_matches, PREG_SET_ORDER) > 0) {
					foreach ($url_matches as $url_match) {
						$url = $url_match['1'];
						if (strpos($url, 'http') !== 0) {
							$url = JURI::root().$url;
						}
						$url = 'src="'.$url.'"';
						$tip = str_replace($url_match['0'], $url, $tip);
					}
				}
				$tip = explode('::', $tip, 2);
				if (!isset($tip['1'])) {
					if (preg_match('#^\s*(&lt;|<)img [^>]*(&gt;|>)\s*$#', $tip['0'])) {
						$classes['0'] .= '-img';
					}
					$tip['1'] = ' ';
				}
				$tip = implode('::', $tip);
				$tip = str_replace(array('"', '<', '>'), array('&quot;', '&lt;', '&gt;'), $tip);
				if (preg_match('#^\s*<img [^>]*>\s*$#', $text)) {
					$classes[] = 'isimg';
				}
				$r = '<span class="'.implode(' ', $classes).'" title="'.$tip.'">'.$text.'</span>';
				$str = str_replace($match['0'], $r, $str);
			}
		}
	}

	/*
	 * Protect admin form
	 */
	function protect(&$str)
	{
		NNFrameworkFunctions::protectForm($str, array('{'.$this->params->tag, '{/'.$this->params->tag));
	}

	function unprotect(&$str)
	{
		NNFrameworkFunctions::unprotectForm($str, array('{'.$this->params->tag, '{/'.$this->params->tag));
	}
}