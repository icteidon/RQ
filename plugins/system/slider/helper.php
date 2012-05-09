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

// Load common functions
require_once JPATH_PLUGINS.'/system/nnframework/helpers/functions.php';

/**
 * Plugin that replaces stuff
 */
class plgSystemSliderHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
		$this->params->hasitems = 0;

		$this->name = 'Slider';
		$this->alias = 'slider';
		$this->item = 'slide';

		$this->params->comment_start = '<!-- START: '.$this->name.' -->';
		$this->params->comment_end = '<!-- END: '.$this->name.' -->';

		$bts = '((?:<[a-zA-Z][^>]*>\s*){0,3})'; // break tags start
		$bte = '((?:\s*<(?:/[a-zA-Z]|br|BR)[^>]*>){0,3})'; // break tags end

		$this->params->tag_open = preg_replace('#[^a-z0-9-_]#si', '', $this->params->tag_open);
		$this->params->tag_close = preg_replace('#[^a-z0-9-_]#si', '', $this->params->tag_close);
		$this->params->tag_link = preg_replace('#[^a-z0-9-_]#si', '', $this->params->tag_slidelink);
		$this->params->tag_delimiter = ($this->params->tag_delimiter == 'space') ? ' ' : '=';

		$this->params->regex = '#'
			.$bts
			.'\{('.preg_quote($this->params->tag_open, '#').'s?((?:-[a-z0-9-_]*)?)'
			.preg_quote($this->params->tag_delimiter, '#')
			.'((?:[^\}]*?\{[^\}]*?\})*[^\}]*?)|/'.preg_quote($this->params->tag_close, '#')
			.'(?:-[a-z0-9-_]*)?)\}'
			.$bte
			.'#s';
		$this->params->regex_end = '#'
			.$bts
			.'\{/'.preg_quote($this->params->tag_close, '#')
			.'(?:-[a-z0-9-_]*)?\}'
			.$bte
			.'#s';
		$this->params->regex_link = '#'
			.'\{'.preg_quote($this->params->tag_link, '#')
			.'(?:-[a-z0-9-_]*)?'.preg_quote($this->params->tag_delimiter, '#')
			.'([^\}]*)\}'
			.'(.*?)'
			.'\{/'.preg_quote($this->params->tag_link, '#').'\}'
			.'#s';

		$this->allitems = array();
		$this->setcount = 0;

	}

	////////////////////////////////////////////////////////////////////
	// onAfterDispatch
	////////////////////////////////////////////////////////////////////
	function onAfterDispatch()
	{
		$document = JFactory::getDocument();
		$docType = $document->getType();

		// PDF
		if ($docType == 'pdf') {
			$buffer = $document->getBuffer('component');
			if (is_array($buffer)) {
				if (isset($buffer['component']) && isset($buffer['component'][''])) {
					$this->replaceTags($buffer['component'][''], 0);
				}
			} else {
				$this->replaceTags($buffer, 0);
			}
			$document->setBuffer($buffer, 'component');
			return;
		}

		// only in html
		if ($docType !== 'html' && $docType !== 'feed') {
			return;
		}

		$buffer = $document->getBuffer('component');

		if (empty($buffer) || is_array($buffer)) {
			return;
		}

		// do not load scripts/styles on print page
		if ($docType !== 'feed' && !JRequest::getInt('print')) {
			if ($this->params->load_mootools) {
				JHtml::_('behavior.mootools');
			}

			$version = '';
			if ($this->params->use_versioned_files) {
				require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
				$version = NoNumberVersions::getXMLVersion($this->alias, 'system', null, 1);
			}
			$mtversion = '';

			$script = '
				var '.$this->alias.'_speed = 500;
				var '.$this->alias.'_fade_in_speed = 1000;
				var '.$this->alias.'_fade_out_speed = 400;
				var '.$this->alias.'_linkscroll = 0;
				var '.$this->alias.'_url = \'\';
				var '.$this->alias.'_urlscroll = \'\';
				var '.$this->alias.'_use_hash = '.(int) $this->params->use_hash.';
			';
			$document->addScriptDeclaration('/* START: '.$this->name.' scripts */ '.preg_replace('#\n\s*#s', ' ', trim($script)).' /* END: '.$this->name.' scripts */');
			$document->addScript(JURI::root(true).'/plugins/system/'.$this->alias.'/js/script'.$mtversion.'.js'.$version);
			if ($this->params->load_stylesheet) {
				$document->addStyleSheet(JURI::root(true).'/plugins/system/'.$this->alias.'/css/style.css'.$version);
			}
			$style = '';
			$css_c = 'div.'.$this->alias.'_container';
			$css_i = 'div.'.$this->alias.'_'.$this->item;
			if ($this->params->rounded && $this->params->rounded_radius && (int) $this->params->rounded_radius != 10) {
				$r = (int) $this->params->rounded_radius;
				$style .= '
					'.$css_c.'.rounded '.$css_i.' a,
					'.$css_c.'.rounded '.$css_i.' a:hover {
						-webkit-border-radius: '.$r.'px;
						-moz-border-radius: '.$r.'px;
						border-radius: '.$r.'px;
					}
					'.$css_c.'.rounded '.$css_i.'.active a,
					'.$css_c.'.rounded '.$css_i.'.active a:hover {
						-webkit-border-radius: '.$r.'px '.$r.'px 0 0;
						-moz-border-radius: '.$r.'px '.$r.'px 0 0;
						border-radius: '.$r.'px '.$r.'px 0 0;
					}
					'.$css_c.'.rounded div.'.$this->alias.'_content_wrapper div.'.$this->alias.'_content {
						-webkit-border-radius: 0 0 '.$r.'px '.$r.'px;
						-moz-border-radius: 0 0 '.$r.'px '.$r.'px;
						border-radius: 0 0 '.$r.'px '.$r.'px;
					}
					'.$css_i.'.indent,
					'.$css_i.'.indenttitle {
						padding: 0 '.$r.'px;
					}
					'.$css_c.'.rounded '.$css_i.'.indentcontent.active a,
					'.$css_c.'.rounded '.$css_i.'.indentcontent.active a:hover {
						-webkit-border-radius: '.$r.'px;
						-moz-border-radius: '.$r.'px;
						border-radius: '.$r.'px;
					}
					div.'.$this->alias.'_content_wrapper.indent,
					div.'.$this->alias.'_content_wrapper.indentcontent{
						padding: 0 '.$r.'px;
					}
					'.$css_c.'.rounded div.'.$this->alias.'_content_wrapper.indenttitle div.'.$this->alias.'_content {
						-webkit-border-radius: '.$r.'px;
						-moz-border-radius: '.$r.'px;
						border-radius: '.$r.'px;
					}
				';
			}

			$this->params->line_color = ($this->params->outline ? '#'.$this->params->line_color : 'transparent');
			if ($this->params->line_color != '#B4B4B4') {
				$style .= '
					'.$css_i.' a,
					'.$css_i.' a:hover,
					div.'.$this->alias.'_content_wrapper div.'.$this->alias.'_content {
						border-color: '.$this->params->line_color.';
					}
				';
			}
			if ($style) {
				$document->addStyleDeclaration('/* START: '.$this->name.' styles */ '.preg_replace('#\n\s*#s', ' ', trim($style)).' /* END: '.$this->name.' styles */');
			}
		}

		if (strpos($buffer, '{'.$this->params->tag_open) === false) {
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

		// only in html and feeds
		if ($docType !== 'html' && $docType !== 'feed') {
			return;
		}

		$html = JResponse::getBody();
		if ($html == '') {
			return;
		}

		if (strpos($html, '{'.$this->params->tag_open) === false) {
			if (!$this->params->hasitems) {
				// remove style and script if no items are found
				$html = preg_replace('#\s*<'.'link [^>]*href="[^"]*/plugins/system/'.$this->alias.'/css/style\.css[^"]*"[^>]* />#s', '', $html);
				$html = preg_replace('#\s*<'.'script [^>]*src="[^"]*/plugins/system/'.$this->alias.'/js/script[^"]*\.js[^"]*"[^>]*></script>#s', '', $html);
				$html = preg_replace('#/\* START: '.$this->name.' .*?/\* END: '.$this->name.' [a-z]* \*/\s*#s', '', $html);
			}
		} else {
			if (!(strpos($html, '<body') === false) && !(strpos($html, '</body>') === false)) {
				$html_split = explode('<body', $html, 2);
				$body_split = explode('</body>', $html_split['1'], 2);

				// only do stuff in body
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
	function replaceTags(&$str, $shownav = 1)
	{
		$url = JFactory::getURI();
		$shownav = $shownav ? (!JRequest::getInt('print')) : 0;

		if (!$shownav || (strpos($str, '{/'.$this->params->tag_close) === false && strpos($str, 'class="'.$this->alias.'_container') === false)) {
			if (preg_match_all($this->params->regex, $str, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$title = NNFrameworkFunctions::cleanTitle($match['4']);
					if (!(strpos($title, '|') === false)) {
						list($title, $extra) = explode('|', $title, 2);
					}
					$title = trim($title);
					$name = NNFrameworkFunctions::cleanTitle($title, 1);
					$replace = '<a name="'.$name.'"></a><'.$this->params->title_tag.' class="'.$this->alias.'_title">'.$title.'</'.$this->params->title_tag.'>';
					$str = str_replace($match['0'], $replace, $str);
				}
			}
			if (preg_match_all($this->params->regex_end, $str, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$str = str_replace($match['0'], '', $str);
				}
			}
			if (preg_match_all($this->params->regex_link, $str, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$url->setFragment($match['1']);
					$link = '<a href="'.JRoute::_($url->toString()).'">'.$match['2'].'</a>';
					$str = str_replace($match['0'], $link, $str);
				}
			}
			return;
		}

		$sets = array();
		$setids = array();

		if (preg_match_all($this->params->regex, $str, $matches, PREG_SET_ORDER) > 0) {
			$this->params->hasitems = 1;
			foreach ($matches as $match) {
				if ($match['2']['0'] == '/') {
					array_pop($setids);
					continue;
				}
				end($setids);
				$item = new stdClass();
				$item->orig = $match['0'];
				$item->setid = trim(str_replace('-', '_', $match['3']));
				if (empty($setids) || current($setids) != $item->setid) {
					$this->setcount++;
					$setids[$this->setcount.'_'] = $item->setid;
				}
				$item->set = str_replace('__', '_', array_search($item->setid, array_reverse($setids)).$item->setid);
				$item->title = NNFrameworkFunctions::cleanTitle($match['4']);
				list($item->pre, $item->post) = NNFrameworkFunctions::setSurroundingTags($match['1'], $match['5']);
				if (!isset($sets[$item->set])) {
					$sets[$item->set] = array();
				}
				$sets[$item->set][] = $item;
			}
		}

		$urlitem = JRequest::getString($this->item, '', 'default', 1);
		$urlitem = trim($urlitem);
		if (is_numeric($urlitem)) {
			$urlitem = '1-'.$urlitem;
		}
		$active_url = '';


		foreach ($sets as $set_id => $items) {
			$rand = '___'.rand(100, 999).'___';
			$active_by_url = '';
			$active_by_cookie = '';
			$active = 0;
			foreach ($items as $i => $item) {
				$item->alias = '';
				$item->class = '';
				$item->active = 0;

				if (!(strpos($item->title, '|') === false)) {
					list($item->title, $extra) = explode('|', $item->title, 2);
					$item->title = trim($item->title);
					$extra = explode('|', $extra);
					foreach ($extra as $e) {
						if (strpos($e, 'alias:') === 0) {
							$item->alias = substr($e, 6);
							continue;
						}
						switch ($e) {
							case 'active':
							case 'opened':
							case 'open':
								$active = $i;
								break;
							case 'inactive':
							case 'closed':
							case 'close':
								if ($active == $i) {
									$active = '';
								}
								break;
							default:
								$item->class = trim($item->class.' '.$e);
								break;
						}
					}
				}

				$item->set = $set_id.$rand;
				$item->setname = $set_id;
				$item->count = $i + 1;
				$item->id = $item->set.'-'.$item->count;
				$item->haslink = preg_match('#<a [^>]*>.*?</a>#usi', $item->title);


				$item->title_full = $item->title;
				$item->title = NNFrameworkFunctions::cleanTitle($item->title, 1);
				if ($item->title == '') {
					$item->title = $this->getAttribute('title', $item->title_full);
					if ($item->title == '') {
						$item->title = $this->getAttribute('alt', $item->title_full);
					}
				}
				$item->title = str_replace(array('&nbsp;', '&#160;'), ' ', $item->title);
				$item->title = preg_replace('#\s+#', ' ', $item->title);

				$item->alias = $this->createAlias($item->alias ? $item->alias : $item->title);

				$item->matches = $this->createMatches(array($item->alias, $item->title));
				$item->matches[] = ($i + 1).'';
				$item->matches[] = ((int) $item->set).'-'.($i + 1);

				$item->alias = JString::strtolower($item->alias);

				if ($urlitem != '' && (in_array($urlitem, $item->matches, 1) || in_array(strtolower($urlitem), $item->matches, 1))) {
					if (!$item->haslink) {
						$active_by_url = $i;
					}
				}
				if ($active == $i && $item->haslink) {
					$active++;
				}

				$sets[$set_id][$i] = $item;
				$this->allitems[] = $item;
			}

			if ($active_by_url !== '' && isset($sets[$set_id][$active_by_url])) {
				$sets[$set_id][$active_by_url]->active = 1;
				$active_url = $sets[$set_id][$active_by_url]->id;
			}
			else if ($active !== '' && isset($sets[$set_id][(int) $active])) {
				$sets[$set_id][(int) $active]->active = 1;
			}
		}

		if (preg_match($this->params->regex_end, $str)) {
			$script_set = 0;
			foreach ($sets as $items) {
				$first = key($items);
				end($items);
				$last = key($items);
				foreach ($items as $i => $item) {
					$s = '#'.preg_quote($item->orig, '#').'#';
					if (@preg_match($s.'u', $str)) {
						$s .= 'u';
					}
					if (preg_match($s, $str, $match)) {
						$html = array();
						$html[] = $item->post;
						$html[] = $item->pre;
						if ($item->active) {
							$html[] = '<script type="text/javascript">document.write( '
								.'String.fromCharCode(60)+\'style type="text/css">'
								.'div#'.$this->alias.'_'.$this->item.'_'.$item->id.' { display: block !important; }'
								.'\'+String.fromCharCode(60)+\'/style>'
								.'\' );</script>';
						}
						if ($i == $first) {
							if (!$script_set) {
								$html[] = '<script type="text/javascript">document.write( \''
									.'\'+String.fromCharCode(60)+\'style type="text/css">'
									.'div.'.$this->alias.'_content_inactive { display: none; }'
									.'.'.$this->alias.'_title { display: none !important; }'
									.'\'+String.fromCharCode(60)+\'/style>'
									.'\' );</script>';
								$script_set = 1;
							}
							$html[] = '<div class="'.trim($this->alias.'_container '.$this->alias.'_container_'.$item->setname.' '.$this->alias.'_noscript '.(($this->params->rounded && $this->params->rounded_radius) ? 'rounded' : '')).'" id="'.$this->alias.'_container_'.$item->set.'">';
						} else {
							$html[] = '<div style="clear:both;"></div>';
							$html[] = '</div></div></div>';
						}

						$item->class = ($item->active == 1 ? ' active' : '').' '.$item->class;
						if (strpos($item->class, 'indent') === false) {
							$item->class .= ' '.$this->params->indent;
						}

						if ($item->haslink && preg_match('#(<a [^>]*>)(.*?)(</a>)#usi', $item->title_full, $match)) {
							$link = str_replace($match['0'], $match['1'].'<span>'.$match['2'].'</span>'.$match['3'], $item->title_full);
							$item->class .= ' '.$this->alias.'_no'.$this->item;
						} else {
							if ($this->params->use_hash) {
								$url->setFragment($item->alias);
								$href = JRoute::_($url->toString());
							} else {
								$href = 'javascript: // '.$item->title;
							}
							$link = '<a href="'.$href.'"><span>'.$item->title_full.'</span></a>';
						}

						$html[] = '<div style="display:none;" class="'.trim($this->alias.'_'.$this->item.' '.$this->alias.'_count_'.$item->count.' '.trim($item->class)).'" id="'.$this->alias.'_'.$this->item.'_'.$item->id.'"><span class="'.$this->alias.'_alias_'.$item->alias.'">'.$link.'</span></div>';
						$html[] = '<div class="'.trim($this->alias.'_content_wrapper '.$this->alias.'_count_'.$item->count.' '.trim($item->class)).' '.$this->alias.'_content_'.($item->active ? '' : 'in').'active" id="'.$this->alias.'_content_'.$item->id.'">';
						$html[] = '<div class="'.trim($this->alias.'_content '.trim($item->class)).'">';
						$html[] = '<div class="'.$this->alias.'_item" id="'.$this->alias.'_item_'.$item->id.'">';
						$html[] = '<a name="'.$item->id.'"></a><'.$this->params->title_tag.' class="'.$this->alias.'_title">'.$item->title_full.'</'.$this->params->title_tag.'>';

						if ($i == $last) {
							$html[] = '<script type="text/javascript">'
								."document.getElementById('".$this->alias."_container_".$item->set."').setAttribute( 'class', document.getElementById('".$this->alias."_container_".$item->set."').className.replace(/\b".$this->alias."_noscript\b/,'') );"
								.'</script>';
						}

						$html = implode("\n", $html);
						$str = preg_replace('#'.preg_quote($match['0'], '#').'#s', $html, $str, 1);
					}
				}
			}
		}

		// closing html
		if (preg_match_all($this->params->regex_end, $str, $matches, PREG_SET_ORDER) > 0) {
			$html = array();
			$html[] = '<div style="clear:both;"></div>';
			$html[] = '</div></div></div>';
			$html[] = '<div style="height:1px;"></div>';
			$html[] = '</div>';
			if ($active_url) {
				$html[] = '<script type="text/javascript">';
				$html[] = $this->alias.'_url = \''.$active_url.'\';';
				$html[] = '</script>';
			}
			$html = implode("\n", $html);
			foreach ($matches as $match) {
				$m_html = $html;
				list($pre, $post) = NNFrameworkFunctions::setSurroundingTags($match['1'], $match['2']);
				$m_html = $pre.$m_html.$post;
				$str = str_replace($match['0'], $m_html, $str);
			}
		}

		// link tag
		if (preg_match_all($this->params->regex_link, $str, $matches, PREG_SET_ORDER) > 0) {
			foreach ($matches as $match) {
				$link = $match['2'];
				$linkitem = 0;
				$names = $this->createMatches(array($match['1']));
				foreach ($names as $name) {
					if (is_numeric($name)) {
						foreach ($this->allitems as $item) {
							if (in_array($name, $item->matches, 1) || in_array((int) $name, $item->matches, 1)) {
								$linkitem = $item;
								break;
							}
						}
					} else {
						foreach ($this->allitems as $item) {
							if (in_array($name, $item->matches, 1) || in_array(strtolower($name), $item->matches, 1)) {
								$linkitem = $item;
								break;
							}
						}
					}
					if ($linkitem) {
						break;
					}
				}
				if ($linkitem) {
					$url->setFragment($linkitem->id);
					$link = '<a href="'.JRoute::_($url->toString()).'" class="'.$this->alias.'_'.$this->item.'link" rel="'.$linkitem->id.'">'.$link.'</a>';
				} else {
					$url->setFragment($name);
					$link = '<a href="'.JRoute::_($url->toString()).'">'.$link.'</a>';
				}
				$str = str_replace($match['0'], $link, $str);
			}
		}
	}

	function getAttribute($attrib, $str)
	{
		// get attribute from string
		$re = '#'.preg_quote($attrib, '#').'="([^"]*)"#si';
		if (preg_match($re, $str, $match)) {
			return $match['1'];
		}
		return '';
	}

	function protect(&$str)
	{
		NNFrameworkFunctions::protectForm($str, array('{'.$this->params->tag_open, '{/'.$this->params->tag_close, '{'.$this->params->tag_link));
	}

	function unprotect(&$str)
	{
		NNFrameworkFunctions::unprotectForm($str, array('{'.$this->params->tag_open, '{/'.$this->params->tag_close, '{'.$this->params->tag_link));
	}

	/* Based on stringURLUnicodeSlug method from the unicode slug plugin by infograf768 */
	function createAlias($str)
	{
		// Convert html entities
		$str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');

		// Replace double byte whitespaces by single byte (East Asian languages)
		$str = preg_replace('/\xE3\x80\x80/', ' ', $str);

		// Remove any '-' from the string as they will be used as concatenator.
		// Would be great to let the spaces in but only Firefox is friendly with this
		$str = str_replace('-', ' ', $str);

		// Replace forbidden characters by whitespaces
		$str = preg_replace('#[:\#\*"@+=;!&\.%()\]\/\'\\\\|\[]#', "\x20", $str);

		// Delete all '?'
		$str = str_replace('?', '', $str);

		// Trim white spaces at beginning and end of alias and make lowercase
		$str = trim($str);

		// Remove any duplicate whitespace and replace whitespaces by hyphens
		$str = preg_replace('#\x20+#', '-', $str);

		return $str;
	}

	function createMatches($titles = array())
	{
		$matches = array();
		foreach ($titles as $title) {
			$matches[] = $title;
			$matches[] = JString::strtolower($title);
		}

		$matches = array_unique($matches);

		foreach ($matches as $title) {
			$matches[] = htmlspecialchars(html_entity_decode($title, ENT_COMPAT, 'UTF-8'));
		}

		$matches = array_unique($matches);

		foreach ($matches as $title) {
			$matches[] = urlencode($title);
			$matches[] = utf8_decode($title);
			$matches[] = str_replace(' ', '', $title);
			$matches[] = trim(preg_replace('#[^a-z0-9]#i', '', $title));
			$matches[] = trim(preg_replace('#[^a-z]#i', '', $title));
		}

		$matches = array_unique($matches);

		foreach ($matches as $i => $title) {
			$matches[$i] = trim(str_replace('?', '', $title));
		}

		$matches = array_diff(array_unique($matches), array('', '-'));

		return $matches;
	}
}