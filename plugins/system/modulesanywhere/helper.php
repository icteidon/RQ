<?php
/**
 * Plugin Helper File
 *
 * @package			Modules Anywhere
 * @version			2.1.0
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

// Load common functions
require_once JPATH_PLUGINS.'/system/nnframework/helpers/functions.php';

/**
 * Plugin that places modules
 */
class plgSystemModulesAnywhereHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
		$this->params->comment_start = '<!-- START: Modules Anywhere -->';
		$this->params->comment_end = '<!-- END: Modules Anywhere -->';
		$this->params->message_start = '<!--  Modules Anywhere Message: ';
		$this->params->message_end = ' -->';

		$tags = array();
		$tags[] = preg_quote($this->params->module_tag, '#');
		$tags[] = preg_quote($this->params->modulepos_tag, '#');
		if ($this->params->handle_loadposition) {
			$tags[] = 'loadposition';
		}
		$tags = '('.implode('|', $tags).')';
		$this->params->tags = $tags;

		$bts = '((?:<p(?: [^>]*)?>)?)((?:\s*<br ?/?>)?\s*)';
		$bte = '(\s*(?:<br ?/?>\s*)?)((?:</p>)?)';
		$this->params->regex = '#'
			.$bts.'((?:\{div(?: [^\}]*)\})?)(\s*)'
			.'\{'.$tags.' ((?:[^\}]*?\{[^\}]*?\})*[^\}]*?)\}'
			.'(\s*)((?:\{/div\})?)'.$bte
			.'#s';

		$user = JFactory::getUser();
		$this->params->aid = $user->getAuthorisedViewLevels();
	}

	////////////////////////////////////////////////////////////////////
	// onContentPrepare
	////////////////////////////////////////////////////////////////////

	function onContentPrepare(&$article)
	{
		$message = '';

		if (isset($article->created_by) && !empty($this->params->articles_security_level) && is_array($this->params->articles_security_level) && !in_array('-1', $this->params->articles_security_level)) {
			// Lookup group level of creator
			$user_groups = new JAccess();
			$user_groups = $user_groups->getGroupsByUser($article->created_by);

			// Set if security is passed
			// passed = creator is equal or higher than security group level
			$pass = 0;
			foreach ($user_groups as $group) {
				if (in_array($group, $this->params->articles_security_level)) {
					$pass = 1;
					break;
				}
			}
			if (!$pass) {
				$message = JText::_('MA_OUTPUT_REMOVED_SECURITY');
			}
		}

		if (isset($article->text)) {
			$this->processModules($article->text, 'articles', $message);
		}
		if (isset($article->description)) {
			$this->processModules($article->description, 'articles', $message);
		}
		if (isset($article->title)) {
			$this->processModules($article->title, 'articles', $message);
		}
		if (isset($article->created_by_alias)) {
			$this->processModules($article->created_by_alias, 'articles', $message);
		}
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
			// Still to do for Joomla 1.7
			return;
		}

		if (($docType == 'feed' || JRequest::getCmd('option') == 'com_acymailing') && isset($document->items)) {
			$itemids = array_keys($document->items);
			foreach ($itemids as $i) {
				$this->onContentPrepare($document->items[$i]);
			}
		}

		$buffer = $document->getBuffer('component');
		if (!empty($buffer)) {
			if (is_array($buffer)) {
				if (isset($buffer['component']) && isset($buffer['component'][''])) {
					$this->tagArea($buffer['component'][''], 'MODA', 'component');
				}
			} else {
				$this->tagArea($buffer, 'MODA', 'component');
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
		if ($html == '') {
			return;
		}

		if ($docType != 'html') {
			$this->replaceTags($html);
		} else {
			if (!(strpos($html, '<body') === false) && !(strpos($html, '</body>') === false)) {
				$html_split = explode('<body', $html, 2);
				$body_split = explode('</body>', $html_split['1'], 2);

				// only do stuff in body
				$this->protect($body_split['0']);
				$this->replaceTags($body_split['0']);

				$html_split['1'] = implode('</body>', $body_split);
				$html = implode('<body', $html_split);
			} else {
				$this->protect($html);
				$this->replaceTags($html);
			}
		}

		$this->cleanLeftoverJunk($html);
		$this->unprotect($html);

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
		if ($docType == 'feed' || JRequest::getCmd('option') == 'com_acymailing') {
			$s = '#(<item[^>]*>)#s';
			$str = preg_replace($s, '\1<!-- START: MODA_COMPONENT -->', $str);
			$str = str_replace('</item>', '<!-- END: MODA_COMPONENT --></item>', $str);
		}
		if (strpos($str, '<!-- START: MODA_COMPONENT -->') === false) {
			$this->tagArea($str, 'MODA', 'component');
		}

		$message = '';

		$components = $this->getTagArea($str, 'MODA', 'component');

		foreach ($components as $component) {
			$this->processModules($component['1'], 'components', $message);
			$str = str_replace($component['0'], $component['1'], $str);
		}

		// EVERYWHERE
		$this->processModules($str, 'other');
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

	function processModules(&$string, $area = 'articles', $message = '')
	{

		if (preg_match('#\{'.$this->params->tags.'#', $string)) {
			jimport('joomla.application.module.helper');
			JPluginHelper::importPlugin('content');

			$regex = $this->params->regex;
			if (@preg_match($regex.'u', $string)) {
				$regex .= 'u';
			}

			$matches = array();
			$count = 0;
			while ($count++ < 10 && preg_match('#\{'.$this->params->tags.'#', $string) && preg_match_all($regex, $string, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$this->processMatch($string, $match, $message);
				}
				$matches = array();
			}
		}
	}

	function processMatch(&$string, &$match, &$message)
	{
		$html = '';
		if ($message != '') {
			if ($this->params->place_comments) {
				$html = $this->params->message_start.$message.$this->params->message_end;
			}
		} else {
			$p_start = $match['1'];
			$br1a = $match['2'];
			$div_start = $match['3'];
			$br2a = $match['4'];
			$type = trim($match['5']);
			$id = trim($match['6']);
			$br2a = $match['7'];
			$div_end = $match['8'];
			$br2b = $match['9'];
			$p_end = $match['10'];

			$type = trim($type);
			$id = trim($id);

			$style = $this->params->style;
			$overrides = array();

			if ($this->params->override_style || $this->params->override_settings) {
				$vars = str_replace('\|', '[:MA_BAR:]', $id);
				$vars = explode('|', $vars);
				$id = array_shift($vars);
				foreach ($vars as $var) {
					$var = trim(str_replace('[:MA_BAR:]', '|', $var));
					if (!$var) {
						continue;
					}
					if (strpos($var, '=') === false) {
						if ($this->params->override_style) {
							$style = $var;
						}
					} else {
						if ($this->params->override_settings && $type == $this->params->module_tag) {
							list($key, $val) = explode('=', $var, 2);
							$val = str_replace(array('\{', '\}'), array('{', '}'), $val);
							$overrides[$key] = $val;
						}
					}
				}
			}

			if ($type == $this->params->module_tag) {
				// module
				$html = $this->processModule($id, $style, $overrides);
			} else {
				// module position
				$html = $this->processPosition($id, $style);
			}

			if ($p_start && $p_end) {
				$p_start = '';
				$p_end = '';
			}

			$html = $br1a.$br2a.$html.$br2a.$br2b;

				$html = $p_start.$html.$p_end;

			$html = preg_replace('#((?:<p(?: [^>]*)?>\s*)?)((?:<br ?/?>)?\s*<div(?: [^>]*)?>.*?</div>\s*(?:<br ?/?>)?)((?:\s*</p>)?)#', '\3\2\1', $html);
			$html = preg_replace('#(<p(?: [^>]*)?>\s*)<p(?: [^>]*)?>#', '\1', $html);
			$html = preg_replace('#(</p>\s*)</p>#', '\1', $html);
		}

		if ($this->params->place_comments) {
			$html = $this->params->comment_start.$html.$this->params->comment_end;
		}

		$string = str_replace($match['0'], $html, $string);
		unset($match);
	}

	function processPosition($position, $style = 'none')
	{
		$document = JFactory::getDocument();
		$renderer = $document->loadRenderer('module');

		$html = '';
		foreach (JModuleHelper::getModules($position) as $mod) {
			$html .= $renderer->render($mod, array('style'=> $style));
		}
		return $html;
	}

	function processModule($module, $style = 'none', $overrides = array())
	{
		$db = JFactory::getDBO();

		$where = ' AND ( title='.$db->quote(NNFrameworkFunctions::html_entity_decoder($module)).'';
		if (is_numeric($module)) {
			$where .= ' OR id='.$module;
		}
		$where .= ' ) ';
		if (!$this->params->ignore_state) {
			$where .= ' AND published = 1';
		}

		$query =
			'SELECT *'
				.' FROM #__modules'
				.' WHERE client_id = 0'
				.' AND access IN ('.implode(',', $this->params->aid).')'
				.$where
				.' ORDER BY ordering'
				.' LIMIT 1';

		$db->setQuery($query);
		$module = $db->loadObject();

		$html = '';
		if ($module) {
			//determine if this is a custom module
			$module->user = (substr($module->module, 0, 4) == 'mod_') ? 0 : 1;

			// set style
			$module->style = $style;


			$document = clone(JFactory::getDocument());
			$document->_type = 'html';
			$renderer = $document->loadRenderer('module');
			$html = $renderer->render($module, array('style'=> $style, 'name' => ''));
		}
		return $html;
	}

	function protect(&$str)
	{
		NNFrameworkFunctions::protectForm($str, array('{'.$this->params->module_tag, '{'.$this->params->modulepos_tag, '{loadposition'));
	}

	function unprotect(&$str)
	{
		NNFrameworkFunctions::unprotectForm($str, array('{'.$this->params->module_tag, '{'.$this->params->modulepos_tag, '{loadposition'));
	}

	function cleanLeftoverJunk(&$str)
	{
		if (!(strpos($str, '{/'.$this->params->module_tag.'}') === false)) {
			$regex = $this->params->regex;
			if (@preg_match($regex.'u', $str)) {
				$regex .= 'u';
			}
			$str = preg_replace($regex, '', $str);
		}
		$str = preg_replace('#<\!-- (START|END): MODA_[^>]* -->#', '', $str);
		if (!$this->params->place_comments) {
			$str = str_replace(array(
				$this->params->comment_start, $this->params->comment_end,
				htmlentities($this->params->comment_start), htmlentities($this->params->comment_end),
				urlencode($this->params->comment_start), urlencode($this->params->comment_end)
			), '', $str);
			$str = preg_replace('#'.preg_quote($this->params->message_start, '#').'.*?'.preg_quote($this->params->message_end, '#').'#', '', $str);
		}
	}
}