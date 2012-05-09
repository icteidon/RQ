<?php
/**
 * Plugin Helper File
 *
 * @package			ReReplacer
 * @version			4.1.0
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
class plgSystemReReplacerHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
		$this->params->protect_start = '<!-- START: RR_PROTECT -->';
		$this->params->protect_end = '<!-- END: RR_PROTECT -->';

		$this->params->counter = array();
		$this->article_items = 0;

		$this->params->user = null;
		$this->params->contact = null;

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/assignments.php';
		$this->params->assignments = new NNFrameworkAssignmentsHelper;

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
		$this->parameters = NNParameters::getInstance();
		$this->config = $this->parameters->getComponentParams('rereplacer');

		$sourcerer_params = $this->parameters->getPluginParams('sourcerer');
		$this->sourcerer_tag = '';
		if (!empty($sourcerer_params) && isset($sourcerer_params->syntax_word)) {
			$this->sourcerer_tag = $sourcerer_params->syntax_word;
		}
	}

	////////////////////////////////////////////////////////////////////
	// onContentPrepare
	////////////////////////////////////////////////////////////////////

	function onContentPrepare(&$article, $params = '')
	{
		if (!isset($this->article_items) || !is_array($this->article_items)) {
			$this->article_items = $this->getItems('articles');
		}
		$items = $this->article_items;
		$items = $this->filterItems($items, $article);

		foreach ($items as $item) {
			if (isset($article->text)) {
				$this->replace($article->text, $item);
			}
			if (isset($article->description)) {
				$this->replace($article->description, $item);
			}
			if (isset($article->title) && $item->enable_in_title) {
				$this->replace($article->title, $item);
			}
			if (isset($article->author) && $item->enable_in_author) {
				if (isset($article->author->name)) {
					$this->replace($article->author->name, $item);
				} else if (is_string($article->author)) {
					$this->replace($article->author, $item);
				}
			}
		}
	}

	////////////////////////////////////////////////////////////////////
	// onAfterDispatch
	////////////////////////////////////////////////////////////////////

	function onAfterDispatch()
	{
		$document = JFactory::getDocument();
		$docType = $document->getType();

		// FEED
		if (($docType == 'feed' || JRequest::getCmd('option') == 'com_acymailing') && isset($document->items)) {
			for ($i = 0; $i < count($document->items); $i++) {
				$this->onContentPrepare($document->items[$i]);
			}
		}

		unset($this->article_items);

		// PDF
		if ($docType == 'pdf') {
			$buffer = $document->getBuffer('component');
			if (is_array($buffer)) {
				if (isset($buffer['component']) && isset($buffer['component'][''])) {
					$this->replaceTags($buffer['component']['']);
				}
			} else {
				$this->replaceTags($buffer);
			}
			$document->setBuffer($buffer, 'component');
			return;
		}

		$buffer = $document->getBuffer('component');
		if (!empty($buffer)) {
			if (is_array($buffer)) {
				if (isset($buffer['component']) && isset($buffer['component'][''])) {
					$this->tagArea($buffer['component'][''], 'RR', 'component');
				}
			} else {
				$this->tagArea($buffer, 'RR', 'component');
			}
			$document->setBuffer($buffer, 'component');
		}
	}

	////////////////////////////////////////////////////////////////////
	// onAfterRender
	////////////////////////////////////////////////////////////////////
	function onAfterRender()
	{
		$document = JFactory::getDocument();
		$docType = $document->getType();

		// not in pdf's
		if ($docType == 'pdf') {
			return;
		}

		$html = JResponse::getBody();
		$this->replaceTags($html);

		$this->cleanLeftoverJunk($html);

		JResponse::setBody($html);
	}

	function replaceTags(&$str)
	{
		if ($str == '') {
			return;
		}

		$document = JFactory::getDocument();
		$docType = $document->getType();

		// COMPONENT
		$items = $this->getItems('component');
		if (!empty($items)) {
			if ($docType == 'feed' || JRequest::getCmd('option') == 'com_acymailing') {
				$s = '#(<item[^>]*>)#s';
				$str = preg_replace($s, '\1<!-- START: RR_COMPONENT -->', $str);
				$str = str_replace('</item>', '<!-- END: RR_COMPONENT --></item>', $str);
			}
			if (strpos($str, '<!-- START: RR_COMPONENT -->') === false) {
				$this->tagArea($str, 'RR', 'component');
			}
			$components = $this->getTagArea($str, 'RR', 'component');
			foreach ($components as $component) {
				foreach ($items as $item) {
					$this->replace($component['1'], $item);
				}
				$str = str_replace($component['0'], $component['1'], $str);
			}
			unset($components);
		}

		// BODY

		$items = $this->getItems('body');
		if (!empty($items)) {
			if (!(strpos($str, '</body>') === false)) {
				$s = '#(<body[^>]*>)#s';
				$str = preg_replace($s, '\1<!-- START: RR_BODY -->', $str);
				$str = str_replace('</body>', '<!-- END: RR_BODY --></body>', $str);
			}
			if (strpos($str, '<!-- START: RR_BODY -->') === false) {
				$s = '#(<item[^>]*>)#s';
				$str = preg_replace($s, '\1<!-- START: RR_BODY -->', $str);
				$str = str_replace('</item>', '<!-- END: RR_BODY --></item>', $str);
			}
			if (strpos($str, '<!-- START: RR_BODY -->') === false) {
				$this->tagArea($str, 'RR', 'body');
			}
			$bodies = $this->getTagArea($str, 'RR', 'body');
			foreach ($bodies as $body) {
				foreach ($items as $item) {
					$this->replace($body['1'], $item);
				}
				$str = str_replace($body['0'], $body['1'], $str);
			}
			unset($bodies);
		}

		// EVERYWHERE
		$items = $this->getItems('everywhere');
		if (!empty($items)) {
			foreach ($items as $item) {
				$this->replace($str, $item);
			}
		}
	}

	function tagArea(&$str, $ext = 'EXT', $area = '')
	{
		if ($str && $area) {
			$str = '<!-- START: '.strtoupper($ext).'_'.strtoupper($area).' -->'.$str.'<!-- END: '.strtoupper($ext).'_'.strtoupper($area).' -->';
			if ($area == 'article_text') {
				$str = preg_replace('#(<hr class="system-pagebreak".*?/>)#si', '<!-- END: '.strtoupper($ext).'_'.strtoupper($area).' -->\1<!-- START: '.strtoupper($ext).'_'.strtoupper($area).' -->', $str);
			}
		}
	}

	function getTagArea(&$str, $ext = 'EXT', $area = '')
	{
		$matches = array();
		if ($str && $area) {
			$start = '<!-- START: '.strtoupper($ext).'_'.strtoupper($area).' -->';
			$end = '<!-- END: '.strtoupper($ext).'_'.strtoupper($area).' -->';
			$matches = explode($start, $str);
			array_shift($matches);
			foreach ($matches as $i => $match) {
				list($text) = explode($end, $match, 2);
				$matches[$i] = array(
					$start.$text.$end,
					$text
				);
			}
		}
		return $matches;
	}

	function replace(&$str, &$item)
	{
		if (empty($str)) {
			return;
		}
		if (is_array($str)) {
			foreach ($str as $key => $val) {
				$str[$key] = $this->replaceReturn($val, $item);
			}
		} else {
			$this->protectVariables($str);
			if ($item->regex) {
				$this->replaceRegEx($str, $item);
			} else {
				$this->replaceString($str, $item);
			}
			$this->replaceVariables($str);
		}
	}

	function replaceReturn($str, &$item)
	{
		$this->replace($str, $item);
		return $str;
	}

	function replaceRegEx(&$str, &$item)
	{
		$str = str_replace(chr(194).chr(160), ' ', $str);
		$str_array = $this->stringToProtectedArray($str, $item);

		$search = $item->search;
		$this->cleanString($search);
		$search = '#'.$search.'#';
		if ($item->s_modifier) {
			$search .= 's';
		} // . (dot) also matches newlines
		if (!$item->casesensitive) {
			$search .= 'i';
		} // case-insensitive pattern matching

		$replace = $item->replace;
		$this->cleanStringReplace($replace, 1);
		$this->replaceInArray($str_array, $search, $replace, $item->thorough);

		$str = implode('', $str_array);
	}

	function replaceString(&$str, &$item)
	{
		$str_array = $this->stringToProtectedArray($str, $item);

		if ($item->treat_as_list) {
			$search_array = explode(',', $item->search);
			$replace_array = explode(',', $item->replace);
		} else {
			$search_array = array($item->search);
			$replace_array = array($item->replace);
		}
		$replace_count = count($replace_array);

		foreach ($search_array as $key => $search) {
			if ($search != '') {
				$this->cleanString($search);
				$search = preg_quote($search, "#");
				if ($item->word_search) {
					$search = '(?<!\p{L})('.$search.')(?!\p{L})';
				}

				$search = '#'.$search.'#';
				$search .= 's'; // . (dot) also matches newlines
				if (!$item->casesensitive) {
					$search .= 'i';
				} // case-insensitive pattern matching

				$replace = ($replace_count > $key) ? $replace_array[$key] : $replace_array['0'];
				$this->cleanStringReplace($replace);

				$this->replaceInArray($str_array, $search, $replace, $item->thorough);
			}
		}

		$str = implode('', $str_array);
	}

	function replaceInArray(&$array, $search, $replace, $thorough = 0)
	{
		foreach ($array as $key => $val) {
			// only do something if string is not empty
			// or on uneven count = not yet protected
			if (trim($val) != '' && !fmod($key, 2)) {
				$this->replacer($array[$key], $search, $replace, $thorough);
			}
		}
	}

	function replacer(&$str, $search, $replace, $thorough = 0)
	{
		if (@preg_match($search.'u', $str)) {
			$search .= 'u';
		}
		if (preg_match($search, $str)) {
			// Counter is used to make it possible to use \# in the replacement to refer to the incremental counter
			$counter_name = base64_encode($search.$replace);
			if (!isset($this->params->counter[$counter_name])) {
				$this->params->counter[$counter_name] = 0;
			}

			$offset = 0;
			$thorough_count = 1; // prevents the thorough search to repeat endlessly
			while (preg_match($search, $str, $matches, PREG_OFFSET_CAPTURE, $offset)) {
				$match = $matches['0'];
				// Replace \# with the incremental counter
				$replace_c = str_replace(array('\#', '[[counter]]'), ++$this->params->counter[$counter_name], $replace);

				if (!$thorough || $thorough_count == 1) {
					$prev_str_length = strlen($str);
					$match_length = strlen($match['0']);
					$match_offset = $match['1'];
				}

				$str_part1 = substr($str, 0, $offset);
				$str_part2 = substr($str, $offset);
				$str = $str_part1.preg_replace($search, $replace_c, $str_part2, 1);
				$thorough_count++;

				if (!$thorough || $thorough_count >= 100) {
					$offset = $match_offset + $match_length + (strlen($str) - $prev_str_length);
					$thorough_count = 1;
					$prev_str_length = strlen($str);
				}
			}
		}
	}

	function protect($str, $protect = 1)
	{
		if (!$protect) {
			return $this->params->protect_end.$str.$this->params->protect_start;
		} else {
			return $this->params->protect_start.$str.$this->params->protect_end;
		}
	}

	function stringToProtectedArray($str, &$item, $onlyform = 0)
	{
		$str_array = array($str);

		if (NNFrameworkFunctions::isEditPage()) {
			// Protect complete adminForm (to prevent ReReplacer messing stuff up when editing articles and such)
			$regex = NNFrameworkFunctions::getFormRegex();
			$regex = '('.$regex.'.*?</textarea>.*?</form>)';
			$this->arrayProtectByRegex($str_array, $regex, '', 1);
		}

		if ($onlyform) {
			return $str_array;
		}


		// Protect everything between the {noreplace} tags
		$s = '(\{noreplace\}.*?\{/noreplace\})';
		// Protect search result
		$this->arrayProtectByRegex($str_array, $s, '', 1);


		return $str_array;
	}

	function arrayProtectByRegex(&$array, $search = '', $replace = '', $protect = 1, $convert = 1)
	{
		$search = '#'.$search.'#si';
		if (!$replace) {
			$replace = '\1';
		}

		$is_array = is_array($array);
		if (!$is_array) {
			$array = array($array);
		}

		foreach ($array as $key => $val) {
			// only do something if string is not empty
			// or on uneven count = not yet protected
			if (trim($val) != '' && !fmod($key, 2)) {
				$s = $search;
				if (@preg_match($search.'u', $val)) {
					$s = $search.'u';
				}
				if (preg_match($s, $val)) {
					if ($protect) {
						$val = preg_replace($s, $this->protect($replace), $val);
					} else {
						$val = $this->protect(preg_replace($s, $this->protect($replace, 0), $val));
					}
				}
				$this->cleanProtected($val);
				$array[$key] = $val;
			}
		}

		if (!$is_array) {
			$array = $array['0'];
		}

		if ($convert) {
			$array = $this->arrayProtect($array);
		}
	}

	function arrayProtectByTags(&$array, &$tags, $convert = 1)
	{
		foreach ($array as $key => $val) {
			// only do something if string is not empty
			// or on uneven count = not yet protected
			if (trim($val) != '' && !fmod($key, 2)) {
				// First: protect all tags
				$s = '(</?[a-zA-Z][^>]*>)';
				$this->arrayProtectByRegex($val, $s, '', 1, 0);

				foreach ($tags as $tag_name => $tag_params) {
					if ($tag_name == '*') {
						$tag_name = '[a-zA-Z][^> ]*';
					}
					if (count($tag_params)) {
						// only unprotect the parameter values
						foreach ($tag_params as $tag_param) {
							$s = '(<'.$tag_name.' [^>]*'.$tag_param.'=")([^"]*)("[^>]*>)';
							$s = '#'.$s.'#si';
							if (@preg_match($s.'u', $val)) {
								$s .= 'u';
							}
							if (preg_match($s, $val)) {
								$replace = '\1'.$this->protect('\2', 0).'\3';
								$val = preg_replace($s, $replace, $val);
							}
							$this->cleanProtected($val);
						}
					} else {
						// unprotect the whole tag
						$s = '(</?'.$tag_name.'( [^>]*)?>)';
						$this->arrayProtectByRegex($val, $this->protect($s, 0), '', 1, 0);
					}
				}
				$array[$key] = $val;
			}
		}

		if ($convert) {
			$array = $this->arrayProtect($array);
		}
	}

	function cleanProtect(&$str)
	{
		$str = str_replace(array($this->params->protect_start, $this->params->protect_end), '', $str);
	}

	function cleanLeftoverJunk(&$str)
	{
		$str = preg_replace('#<\!-- (START|END): RR_[^>]* -->#', '', $str);
		$this->cleanProtect($str);

		// Remove any leftover protection strings (shouldn't be necessary, but just in case)
		$this->cleanProtect($str);

		// Remove any leftover protection tags
		if (!(strpos($str, '{noreplace}') === false)) {
			$item = null;
			$str_array = $this->stringToProtectedArray($str, $item, 1);
			$this->replaceInArray($str_array, '#\{noreplace\}#', '');
			$this->replaceInArray($str_array, '#\{/noreplace\}#', '');
			$str = implode('', $str_array);
		}
	}

	function cleanProtected(&$str)
	{
		while (!(strpos($str, $this->params->protect_start.$this->params->protect_start) === false)) {
			$str = str_replace($this->params->protect_start.$this->params->protect_start, $this->params->protect_start, $str);
		}
		while (!(strpos($str, $this->params->protect_end.$this->params->protect_end) === false)) {
			$str = str_replace($this->params->protect_end.$this->params->protect_end, $this->params->protect_end, $str);
		}
		while (!(strpos($str, $this->params->protect_end.$this->params->protect_start) === false)) {
			$str = str_replace($this->params->protect_end.$this->params->protect_start, '', $str);
		}
	}

	function arrayProtect($array)
	{
		$new_array = array();

		foreach ($array as $key => $val) {
			// only do something if string is not empty
			// and is uneven count = not yet protected
			// and has protect start string
			if (fmod($key, 2)) {
				// string is already protected
				$item_array = $this->protectStringToArray($val, 1);
			} else {
				// string is not yet protected
				$item_array = $this->protectStringToArray($val);
			}
			foreach ($item_array as $item_array_item) {
				$new_array[] = $item_array_item;
			}
		}
		return $new_array;
	}

	function protectStringToArray($str, $protected = 0)
	{
		if ($protected) {
			// If already protected, just clean string and place in an array
			$this->cleanProtect($str);
			$array = array($str);
		} else {
			// Return an array with 1 or 3 items.
			// 1) first part to protector start (if found) (= unprotected)
			// 2) part between the first protector start and its matching end (= protected)
			// 3) Rest of the string (= unprotected)

			$array = array();
			// Devide sting on protector start
			$str_array = explode($this->params->protect_start, $str);
			// Add first element to the string ( = even = unprotected)
			$this->cleanProtect($str_array['0']);
			$array[] = $str_array['0'];

			$count = count($str_array);
			if ($count > 1) {
				for ($i = 1; $i < $count; $i++) {
					$substr = $str_array[$i];
					$protect_count = 1;

					// Add the next string if not enough protector ends are found
					while (
						substr_count($substr, $this->params->protect_end) < $protect_count
						&& $i < ($count - 1)
					) {
						$protect_count++;
						$substr .= $str_array[++$i];
					}

					// Devide sting on protector end
					$substr_array = explode($this->params->protect_end, $substr);

					$protect_part = '';
					// Add as many parts to the string as there are protector starts
					for ($protect_i = 0; $protect_i < $protect_count; $protect_i++) {
						$protect_part .= array_shift($substr_array);
						if (!count($substr_array)) {
							break;
						}
					}

					// This part is protected (uneven)
					$this->cleanProtect($protect_part);
					$array[] = $protect_part;

					// The rest of the string is unprotected (even)
					$unprotect_part = implode('', $substr_array);
					$this->cleanProtect($unprotect_part);
					$array[] = $unprotect_part;
				}
			}
		}
		return $array;
	}

	function cleanString(&$str)
	{
		$str = str_replace(array('[:space:]', '\[\:space\:\]', '[[space]]', '\[\[space\]\]'), ' ', $str);
		$str = str_replace(array('[:comma:]', '\[\:comma\:\]', '[[comma]]', '\[\[comma\]\]'), ',', $str);
		$str = str_replace(array('[:newline:]', '\[\:newline\:\]', '[[newline]]', '\[\[newline\]\]'), "\n", $str);
		$str = str_replace('[:REGEX_ENTER:]', '\\n', $str);
	}

	function cleanStringReplace(&$str, $is_regex = 0)
	{
		if (!$is_regex) {
			$str = str_replace('\\', '\\\\', $str);
			$str = str_replace('\\\\#', '\\#', $str);
			$str = str_replace('$', '\\$', $str);
		}
		$this->cleanString($str);
	}

	function protectVariables(&$str)
	{
		$str = str_replace(array('[[random:', '[[user:', '[[date:', '[[escape]]', '[[/escape]]'), array('[[xrandom:', '[[xuser:', '[[xdate:', '[[xescape]]', '[[/xescape]]'), $str);
	}

	function replaceVariables(&$str)
	{
		if (!(strpos($str, '[[user:') === false)) {
			if (preg_match_all('#\[\[user\:([^\]]+)\]\]#', $str, $matches, PREG_SET_ORDER) > 0) {
				if (!$this->params->user) {
					$this->params->user = JFactory::getUser();
				}
				foreach ($matches as $match) {
					if ($match['1'] == 'password' || $match['1']['0'] == '_') {
						$str = str_replace($match['0'], '', $str);
					} else if (isset($this->params->user->{$match['1']})) {
						$str = str_replace($match['0'], $this->params->user->{$match['1']}, $str);
					} else {
						if (!$this->params->contact) {
							$db = JFactory::getDBO();
							$sql = "SELECT * FROM #__".$this->params->contact_table."
								WHERE user_id = ".(int) $this->params->user->id."
								LIMIT 1";
							$db->setQuery($sql);
							$this->params->contact = $db->loadObject();
						}
						if (isset($this->params->contact->{$match['1']})) {
							$str = str_replace($match['0'], $this->params->contact->{$match['1']}, $str);
						} else {
							$str = str_replace($match['0'], '', $str);
						}
					}
				}
			}
		}
		if (!(strpos($str, '[[date:') === false)) {
			if (preg_match_all('#\[\[date\:([^\]]+)\]\]#', $str, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$format = $match['1'];
					if ($format && !(strpos($format, '%') === false)) {
						$format = NNFrameworkFunctions::dateToDateFormat($format);
					}
					$replace = JHtml::_('date', strtotime($str), $format);
					if (!(strpos($str, '[TH]') === false)) {
						if (preg_match_all('#([0-9]+)\[TH\]#si', $str, $date_matches, PREG_SET_ORDER) > 0) {
							foreach ($date_matches as $date_match) {
								$suffix = 'th';
								switch ($date_match['1']) {
									case 1:
									case 21:
									case 31:
										$suffix = 'st';
										break;
									case 2:
									case 22:
									case 32:
										$suffix = 'rd';
										break;
									case 3:
									case 23:
										$suffix = 'rd';
										break;
								}
								$replace = str_replace($date_match['0'], $date_match['1'].$suffix, $replace);
							}
						}
						$replace = str_replace('[TH]', 'th', $replace);
					}
					$str = str_replace($match['0'], $replace, $str);
				}
			}
		}
		if (!(strpos($str, '[[random:') === false)) {
			while (preg_match('#\[\[random\:([0-9]+)-([0-9]+)\]\]#', $str, $match)) {
				$search = '#'.preg_quote($match['0'], "#").'#';
				$replace = rand((int) $match['1'], (int) $match['2']);
				$str = preg_replace($search, $replace, $str, 1);
			}
		}
		if (!(strpos($str, '[[escape]]') === false)) {
			if (preg_match_all('#\[\[escape\]\](.*?)\[\[/escape\]\]#s', $str, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$replace = addslashes($match['1']);
					$str = str_replace($match['0'], $replace, $str);
				}
			}
		}
		$str = str_replace(array('[[xrandom:', '[[xuser:', '[[xdate:', '[[xescape]]', '[[/xescape]]'), array('[[random:', '[[user:', '[[date:', '[[escape]]', '[[/escape]]'), $str);
	}

	function getItems($area = 'articles')
	{
		$db = JFactory::getDBO();
		$query = "SELECT * FROM #__rereplacer"
			.' WHERE published = 1'
			.' AND area = '.$db->quote($area)
			.' ORDER BY ordering, id';
		$db->setQuery($query);
		$rows = $db->loadObjectList();

		$items = array();

		if (empty($rows)) {
			return $items;
		}

		$xmlfile = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_rereplacer'.DS.'item_params.xml';
		jimport('joomla.filesystem.file');
		foreach ($rows as $row) {
			if (!((substr($row->params, 0, 1) != '{') && (substr($row->params, -1, 1) != '}'))) {
				$row->params = NNFrameworkFunctions::html_entity_decoder($row->params);
			}

			$params = $this->parameters->getParams($row->params, $xmlfile);

			unset($row->params);
			foreach ($row as $key => $val) {
				$params->$key = $val;
			}

				if (strlen($params->search) < 3) {
					continue;
				}

			$item = 0;

				$item = $params;
				if ($this->sourcerer_tag) {
					// fix usage of non-protected {source} tags
					$item->replace = str_replace('{'.$this->sourcerer_tag.'}', '{'.$this->sourcerer_tag.' 0}', $item->replace);
				}
			if ($item) {
				$items[] = $item;
			}
		}

		if ($area != 'articles') {
			$items = $this->filterItems($items);
		}

		return $items;
	}

	function filterItems($items, $article = 0)
	{
		$app = JFactory::getApplication();

		$document = JFactory::getDocument();
		$docType = $document->getType();

		$newitems = array();

		foreach ($items as $item) {
			if (
				($app->isAdmin() && $item->enable_in_admin == 0)
				|| ($app->isSite() && $item->enable_in_admin == 2)
				|| ($docType == 'feed' && $item->enable_in_feeds == 0)
				|| ($docType != 'feed' && $item->enable_in_feeds == 2)
			) {
				continue;
			}

			if ($item) {
				$newitems[] = $item;
			}
		}
		return $newitems;
	}

}