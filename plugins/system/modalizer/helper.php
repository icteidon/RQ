<?php
/**
 * Plugin Helper File
 *
 * @package			Modalizer
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

// Import library dependencies
jimport('joomla.plugin.plugin');

/**
 * Plugin that places articles
 */
class plgSystemModalizerHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
		$this->params->class = 'modalizer_link';
		$this->params->group = 'modalizer_group';

		$this->params->pass = 1;
		if (!(
			($this->params->enable_classnames && $this->params->classnames)
				|| ($this->params->enable_target && ($this->params->target_internal || $this->params->target_external))
				|| ($this->params->enable_syntax && $this->params->syntax)
		)
		) {
			$this->params->pass = 0;
			return;
		}

		// allow in component?
		if ($this->params->disable_components && $this->params->disable_components != 'x') {
			$option = JRequest::getCmd('option');
			if (!is_array($this->params->disable_components)) {
				$this->params->disable_components = explode('|', $this->params->disable_components);
			}
			if (in_array($option, $this->params->disable_components)) {
				$this->params->pass = 0;
				return;
			}
		}

		$this->params->imagetypes = array('png', 'jpg', 'gif', 'bmp', 'jpeg');

		if (JRequest::getInt('ml', 0)) {
			$_REQUEST['tmpl'] = $this->params->tmpl;
			$this->params->pass = 2;
			if ($this->params->modal_tmpl_links
				&& (
					($this->params->modal_iframe
					)
				)
			) {
				$this->params->pass = 3;
			}
		}

		$this->params->sizes = $this->initSizes();

	}

	////////////////////////////////////////////////////////////////////
	// AFTER RENDER
	////////////////////////////////////////////////////////////////////
	function onAfterRender()
	{
		if (!$this->params->pass) {
			return;
		}

		$document = JFactory::getDocument();
		$docType = $document->getType();

		// only in html
		if ($docType != 'html') {
			return;
		}

		$html = JResponse::getBody();

		if ($this->params->pass > 1) {
			$this->removeCloseLinks($html);
			if ($this->params->pass == 3) {
				$this->tmplLinks($html);
			}
		} else {
			$this->handleLinks($html);
		}
		if ($this->params->enable_syntax) {
			$this->handleSyntax($html);
		}

		JResponse::setBody($html);
	}

	////////////////////////////////////////////////////////////////////
	// PLACE SCRIPTS
	////////////////////////////////////////////////////////////////////
	function placeScripts()
	{
		if ($this->params->add_redirect
			&& $this->params->pass > 1
			&& $this->params->modal_iframe
		) {
			$document = JFactory::getDocument();
			$script = "
				if( parent.location.href === window.location.href ) {
					parent.location.href = window.location.href.replace( /[\?&]ml=1/, '' );
				}
			";
			$document->addScriptDeclaration($script);
		}

		if ($this->params->pass !== 1) {
			return;
		}

		switch ($this->params->modal_type) {
			case 'colorbox':
				$this->placeScriptsJQuery();
				break;
			default:
				$this->placeScriptsMooTools();
				break;
		}

		switch ($this->params->modal_type) {
			case 'colorbox':
				$this->placeScriptsColorBox();
				break;
			default:
				$this->placeScriptsCore();
				break;
		}
	}

	function placeScriptsMooTools()
	{
		JHtml::_('behavior.modal');
	}

	function placeScriptsJQuery()
	{
		$document = JFactory::getDocument();
		if ($this->params->load_jquery) {
			$document->addScript(JURI::root(true).'/plugins/system/modalizer/modals/jquery.min.js');
		} else {
			$document->addScriptDeclaration('$j = jQuery.noConflict();');
		}
	}

	function placeScriptsCore()
	{
		$document = JFactory::getDocument();
		$classnames = '';
		if ($this->params->enable_classnames && $this->params->classnames) {
			$classnames = explode(',', $this->params->classnames);
			$classnames = 'a.'.implode(',a.', $classnames);
		}

		$e = array();
		$e[] = "parse:'rel'";

		$script = "
			window.addEvent('domready', function() {
				SqueezeBox.initialize({});
				SqueezeBox.assign($$('a.".$this->params->class.",".$classnames."'), {
					".implode(',', $e)."
				});
			});
		";
		$document->addScriptDeclaration($script);
	}

	function placeScriptsColorBox()
	{
		$document = JFactory::getDocument();
		$document->addScript(JURI::root(true).'/plugins/system/modalizer/modals/colorbox/jquery.colorbox-min.js');
		if (is_int($this->params->modal_colorbox_style)) {
			$this->params->modal_colorbox_style = 'style'.$this->params->modal_colorbox_style;
		}
		$document->addStyleSheet(JURI::root(true).'/plugins/system/modalizer/modals/colorbox/'.$this->params->modal_colorbox_style.'/colorbox.css');

		$classnames = '';
		if ($this->params->enable_classnames && $this->params->classnames) {
			$classnames = explode(',', $this->params->classnames);
			$classnames = 'a.'.implode(',a.', $classnames);
		}

		$s = $this->params->sizes;

		$e = array();
		$e_img = array();
		$e_ext = array();

		$e_ext[] = 'width:'.($s->w_ext ? (ctype_digit($s->w_ext) ? $s->w_ext : '\''.$s->w_ext.'\'') : '\'80%\'');
		$e_ext[] = 'height:'.($s->h_ext ? (ctype_digit($s->h_ext) ? $s->h_ext : '\''.$s->h_ext.'\'') : '\'80%\'');
		$e_ext[] = 'iframe:true';
		if ($this->params->modal_iframe) {
			$e = $e_ext;
		} else {
			if ($s->w) {
				$e[] = 'width:'.(ctype_digit($s->w) ? $s->w : '\''.$s->w.'\'');
			}
			if ($s->h) {
				$e[] = 'height:'.(ctype_digit($s->h) ? $s->h : '\''.$s->h.'\'');
			}
		}
		if ($this->params->modal_colorbox_transition) {
			$e[] = '\'transition\':\''.$this->params->modal_colorbox_transition.'\'';
		}

		if (!$this->params->modal_click_outside) {
			$e[] = 'overlayClose:0';
			$e_img[] = 'overlayClose:0';
			$e_ext[] = 'overlayClose:0';
		}

		$script = "
			\$j(document).ready(function(){
				\$j('a.".$this->params->class.",".$classnames."').colorbox({".implode(',', $e)."});
				\$j('a.".$this->params->class."_image').colorbox({".implode(',', $e_img)."});
				\$j('a.".$this->params->class."_external').colorbox({".implode(',', $e_ext)."});
			});
		";
		$document->addScriptDeclaration($script);

		$css = "#cboxLoadedContent{background-color:#fff;}";
		$document->addStyleDeclaration($css);
	}


	////////////////////////////////////////////////////////////////////
	// IN POPUP
	////////////////////////////////////////////////////////////////////
	function removeCloseLinks(&$html)
	{
		// Remove all close window links
		if (!(strpos($html, 'window.close(') === false)) {
			$html = preg_replace('#<(a|button|div|span) [^>]*window.close\(.*?</\1>#si', '', $html);
		}
	}

	function tmplLinks(&$html)
	{
		// handle all links inside window to add tmpl
		if (preg_match_all('#<a\s.*?</a>#si', $html, $links, PREG_SET_ORDER) > 0) {
			foreach ($links as $link) {
				$newlink = $this->tmplLink($link['0']);
				if ($newlink != $link['0']) {
					$html = str_replace($link['0'], $newlink, $html);
				}
			}
		}
	}

	function tmplLink($link)
	{
		if (preg_match('#href="(\#[^"]*)"#si', $link, $u)) {
			$link = str_replace($u['0'], 'href="'.JRequest::getURI().$u['1'].'"', $link);
			return $link;
		}
		if (!preg_match('#href="([^"]*?)((\#[^"]*)?)"#si', $link, $u)) {
			return $link;
		}
		if (!preg_match('#\starget="_self"#si', $link) && preg_match('#\starget="(.*?)"#si', $link)) {
			return $link;
		}

		$url = $u['1'];

		$params = new stdClass();
		$params->filetype = $this->getFiletype($url);
		$params->isexternal = $this->isExternal($url);

		$isindex = ($params->isexternal) ? 0 : ($params->filetype == '' || in_array($params->filetype, array('php', 'html', 'htm')));
		if (!$isindex) {
			return $link;
		}

		$this->addML($url);

		$url .= $u['2'];

		$link = str_replace($u['0'], 'href="'.$url.'"', $link);

		return $link;
	}

	////////////////////////////////////////////////////////////////////
	// HANDLE LINKS
	////////////////////////////////////////////////////////////////////
	function handleLinks(&$html)
	{
		// handle all links that should be modalized
		if (preg_match_all('#<a\s.*?</a>#si', $html, $links, PREG_SET_ORDER) > 0) {
			foreach ($links as $link) {
				$newlink = $this->handleLink($link['0']);
				if ($newlink != $link['0']) {
					$html = str_replace($link['0'], $newlink, $html);
				}
			}
		}
	}

	function handleLink($link)
	{
		if (!preg_match('#href="(.*?)"#si', $link, $u)) {
			return $link;
		}
		$url = $u['1'];

		$hasclass = preg_match('#\sclass="(.*?)"#si', $link, $c);
		$hastarget = preg_match('#\starget="(.*?)"#si', $link, $t);
		$hasrel = preg_match('#\srel="(.*?)"#si', $link, $r);

		$params = new stdClass();
		$params->filetype = $this->getFiletype($url);
		$params->isexternal = $this->isExternal($url);
		$params->ismedia = in_array($params->filetype, $this->params->imagetypes);

		$class = $hasclass ? $c['1'] : '';
		$rel = '';

		$ismodal = 0;

		// is a special Modalizer link
		if ($hasclass && in_array($this->params->class, explode(' ', $c['1']))) {
			$ismodal = 1;
		}

		// enable_classnames?
		if (!$ismodal && $hasclass && $this->params->enable_classnames && $this->params->classnames) {
			$classnames = explode(' ', $c['1']);
			$p_classnames = explode(',', $this->params->classnames);
			foreach ($classnames as $i => $classname) {
				if (in_array($classname, $p_classnames)) {
					if ($ismodal) {
						unset($classnames[$i]);
					}
					$ismodal = 1;
				}
			}
			if ($ismodal) {
				$class = implode(' ', $classnames);
			}
		}


		// enable_target?
		if (!$ismodal && $hastarget && $this->params->enable_target && ($this->params->target_internal || $this->params->target_external)) {
			if (
				$t['1'] == '_blank'
				&& (
					($this->params->target_internal && !$params->isexternal)
					|| ($this->params->target_external && $params->isexternal)
				)
			) {
				$ismodal = 1;
				if ($this->params->target_disablefiletypes) {
					$params->filetype = $this->getFiletype($url);
					if ($params->filetype && in_array($params->filetype, explode(',', $this->params->target_disablefiletypes))) {
						$ismodal = 0;
					}
				}
			}
		}

		if ($ismodal) {
			$isindex = ($params->isexternal) ? 0 : ($params->filetype == '' || in_array($params->filetype, array('php', 'html', 'htm')));
			if ($isindex) {
				$this->addML($url);
				$link = str_replace($u['0'], 'href="'.$url.'"', $link);
			}

			// remove onclick actions
			$link = preg_replace('#\sonclick=".*?"#si', '', $link);

			if ($hastarget) {
				$link = str_replace($t['0'], ' target="_blank"', $link);
			} else {
				$link = str_replace('<a ', '<a target="_blank" ', $link);
			}

			$this->getClassAndRel($class, $rel, $params);

			if (!$class) {
				$class = $this->params->class;
				if ($hasclass) {
					$class .= ' '.$c['1'];
				}
			}

			if ($rel) {
				if ($hasrel) {
					$link = str_replace($r['0'], ' rel="'.trim($rel).'"', $link);
				} else {
					$link = str_replace('<a ', '<a rel="'.trim($rel).'" ', $link);
				}
			}

			if ($hasclass) {
				$link = str_replace($c['0'], ' class="'.trim($class).'"', $link);
			} else {
				$link = str_replace('<a ', '<a class="'.trim($class).'" ', $link);
			}
		}

		return $link;
	}

	function handleSyntax(&$html)
	{
		// first handle modal tags within other links (like in menu items)
		$regex = '#<a\s([^>]*)>\s*((?:<img [^>]*>\s*)*)((?:</?span[^>]*>\s*)*\{'.preg_quote($this->params->syntax, '#').'((?:\s+[^\}]*)?)\}'.'.*?\{/'.preg_quote($this->params->syntax, '#').'\}(?:\s*</?span[^>]*>)*)((?:\s*<img [^>]*>\s*)*)\s*</a>#s';
		if (preg_match_all($regex, $html, $tags, PREG_SET_ORDER) > 0) {
			foreach ($tags as $tag) {
				$link = $this->handleTagInLink($tag);
				$html = str_replace($tag['0'], $link, $html);
			}
		}

		// handle all modal tags
		$regex = '#\{'.preg_quote($this->params->syntax, '#').'\s+([^\}]*)\}'.'(.*?)\{/'.preg_quote($this->params->syntax, '#').'\}#s';
		if (preg_match_all($regex, $html, $tags, PREG_SET_ORDER) > 0) {
			foreach ($tags as $tag) {
				$link = $this->handleTag($tag);
				$html = str_replace($tag['0'], $link, $html);
			}
		}
	}

	function handleTagInLink($tag)
	{
		$regex = '#\{'.preg_quote($this->params->syntax, '#').'(?:\s+[^\}]*)?\}'.'(.*?)\{/'.preg_quote($this->params->syntax, '#').'\}#s';
		$text = $tag['2'].preg_replace($regex, '\1', $tag['3']).$tag['5'];

		$link_params = $this->getLinkParams(trim($tag['1']));
		$tag_params = $this->getTagParams(trim($tag['4']));

		if (!$tag_params->url && isset($link_params->href)) {
			$tag_params->url = $link_params->href;
		}
		if (isset($link_params->class)) {
			$tag_params->class = trim($tag_params->class.' '.$link_params->class);
		}
		if (!$tag_params->title && isset($link_params->title)) {
			$tag_params->title = $link_params->title;
		}

		$params = array();
		foreach ($tag_params as $key => $val) {
			if ($val != '') {
				$params[] = $key.'='.$val;
			}
		}
		$newtag = '{'.$this->params->syntax.' '.implode('|', $params).'}'.$text.'{/'.$this->params->syntax.'}';

		return $newtag;
	}

	function handleTag($tag)
	{
		$tagparams = $this->getTagParams($tag['1']);
		if (!$tagparams->url) {
			return '';
		}

		$params = new stdClass();
		$params->filetype = $this->getFiletype($tagparams->url);
		$params->isexternal = $this->isExternal($tagparams->url);
		$params->ismedia = in_array($params->filetype, $this->params->imagetypes);

		$isindex = ($params->isexternal) ? 0 : ($params->filetype == '' || in_array($params->filetype, array('php', 'html', 'htm')));
		if ($isindex) {
			$this->addML($tagparams->url);
		}

		$link = '<a href="'.$tagparams->url.'"';

		if ($this->params->pass != 2) {
			$class = '';
			$rel = '';

			$this->getClassAndRel($class, $rel, $params, $tagparams);

			if (!$class) {
				$class = $this->params->class;
			}
			if ($tagparams->class) {
				$class .= ' '.$tagparams->class;
			}
			$link .= ' class="'.trim($class).'" ';
			if ($rel) {
				$link .= ' rel="'.trim($rel).'"';
			}
		}

		if ($tagparams->title) {
			$link .= ' title="'.$tagparams->title.'"';
		}

		$link .= '>'.$tag['2'].'</a>';

		return $link;
	}

	function getLinkParams($str)
	{
		$p = new stdClass();

		if (!$str) {
			return $p;
		}

		$regex = '#([a-z0-9_-]+)="([^\"]*)"#si';
		if (preg_match_all($regex, $str, $params, PREG_SET_ORDER) > 0) {
			foreach ($params as $param) {
				$p->$param['1'] = $param['2'];
			}
		}

		return $p;
	}

	function getTagParams($str)
	{
		$p = new stdClass();
		$p->url = '';
		$p->width = '';
		$p->height = '';
		$p->title = '';
		$p->group = '';
		$p->class = '';

		if (!$str) {
			return $p;
		}

		$regex = '#([a-z0-9_-]+)=([^\|]*)#si';
		if (preg_match_all($regex, $str, $params, PREG_SET_ORDER) > 0) {
			foreach ($params as $param) {
				$p->$param['1'] = $param['2'];
			}
		}

		if (isset($p->href)) {
			$p->url = $p->href;
		} else if (isset($p->link)) {
			$p->url = $p->href;
		}
		if (isset($p->w)) {
			$p->width = $p->w;
		}
		if (isset($p->h)) {
			$p->height = $p->h;
		}
		if (isset($p->set)) {
			$p->group = $p->set;
		} else if (isset($p->gallery)) {
			$p->group = $p->gallery;
		}
		if (isset($p->classname)) {
			$p->class = $p->classname;
		}

		return $p;
	}

	function isExternal($url)
	{
		$external = 0;
		if (!(strpos($url, '://') === false)) {
			// hostname: give preference to SERVER_NAME, because this includes subdomains
			$hostname = ($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
			$external = !(strpos(preg_replace('#^.*?://#', '', $url), $hostname) === 0);
		}
		return $external;
	}

	function getFiletype($url)
	{
		$url = preg_replace('#^.*?://#', '', $url);
		if (preg_match('#^[^\?]*/[^\/\?]*\.([^\/\?]*?)(\?.*)?$#', $url, $match)) {
			return strtolower($match['1']);
		}
		return '';
	}

	function getClassAndRel(&$class, &$rel, &$params, $tag = '')
	{
		$c = '';

		if ($tag && $tag->width) {
			$width = $tag->width;
		} else if ($params->ismedia) {
			$width = $this->params->sizes->w_img;
		} else if ($params->isexternal) {
			$width = $this->params->sizes->w_ext;
		} else {
			$width = $this->params->sizes->w;
		}

		if ($tag && $tag->height) {
			$height = $tag->height;
		} else if ($params->ismedia) {
			$height = $this->params->sizes->h_img;
		} else if ($params->isexternal) {
			$height = $this->params->sizes->h_ext;
		} else {
			$height = $this->params->sizes->h;
		}


		// CLASS
		switch ($this->params->modal_type) {
			case 'colorbox':
				if ($params->ismedia) {
					$c = $this->params->class.'_image';
				} else if ($params->isexternal) {
					$c = $this->params->class.'_external';
				} else {
					$c = $this->params->class;
				}
				break;
		}

		// REL
		switch ($this->params->modal_type) {
			case 'colorbox':
				if ($tag && $tag->group) {
					$rel = $tag->group;
				}
				break;
			case 'core':
				$r = array();
				if (!$params->ismedia && ($params->isexternal || $this->params->modal_iframe)) {
					$r[] = 'handler:\'iframe\'';
				}
				if (!$params->ismedia && ($width || $height)) {
					$r[] = 'size:{'
						.($width ? 'x:\''.(int) $width.'\',' : '')
						.($height ? 'y:\''.(int) $height.'\'' : '')
						.'}';
				}
				if (!empty($r)) {
					$rel = '{'.implode(',', $r).'}';
				}
				break;
		}
		$class = trim($class.' '.$c);
	}

	function initSizes()
	{
		$s = new stdClass();
		$s->w = 0;
		$s->h = 0;
		$s->w_ext = 0;
		$s->h_ext = 0;
		$s->w_img = 0;
		$s->h_img = 0;

		$usepx = in_array($this->params->modal_type, array('core', 'lytebox', 'shadowbox'));

		if ($this->params->modal_size) {
			if ($usepx) {
				$s->w = (int) $this->params->modal_width_px;
				$s->h = (int) $this->params->modal_height_px;
			} else {
				$s->w = $this->params->modal_width;
				$s->h = $this->params->modal_height;
			}
		}

		if ($this->params->modal_ext_size == 2) {
			$s->w_ext = $s->w;
			$s->h_ext = $s->h;
		} else if ($this->params->modal_ext_size) {
			if ($usepx) {
				$s->w_ext = (int) $this->params->modal_ext_width_px;
				$s->h_ext = (int) $this->params->modal_ext_height_px;
			} else {
				$s->w_ext = $this->params->modal_ext_width;
				$s->h_ext = $this->params->modal_ext_height;
			}
		}

		if ($this->params->modal_type != 'shadowbox' || $this->params->modal_img_size == 2) {
			$s->w_img = $s->w;
			$s->h_img = $s->h;
		} else if ($this->params->modal_img_size) {
			if ($usepx) {
				$s->w_img = (int) $this->params->modal_img_width_px;
				$s->h_img = (int) $this->params->modal_img_height_px;
			} else {
				$s->w_img = $this->params->modal_img_width;
				$s->h_img = $this->params->modal_img_height;
			}
		}

		return $s;
	}

	function addML(&$url)
	{
		$url = explode('#', $url, 2);
		if (strpos($url['0'], '?') === false) {
			$url['0'] .= '?ml=1';
		} else {
			$url['0'] .= '&amp;ml=1';
		}
		$url = implode('#', $url);
	}
}