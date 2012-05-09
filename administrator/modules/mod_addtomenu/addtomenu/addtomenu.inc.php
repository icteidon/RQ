<?php
/**
 * Popup include page
 * Displays a list with modules
 *
 * @package			Add to Menu
 * @version			2.2.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$user = JFactory::getUser();
if (!$app->isSite() && $user->get('guest') || !$user->authorise('core.create', 'com_menus')) {
	JError::raiseError(403, JText::_("ALERTNOTAUTH"));
}

$vars = JRequest::getVar('vars');
$option = $vars['option'];
$comp_file = JRequest::getVar('comp');

$folder = JPATH_ADMINISTRATOR.'/components/'.$option.'/addtomenu';
if (!JFolder::exists($folder)) {
	$folder = JPATH_ADMINISTRATOR.'/modules/mod_addtomenu/addtomenu/components/'.$option;
}
if (!JFolder::exists($folder)) {
	return;
}

$file = $folder.'/'.$comp_file.'.xml';

$template = '';
$xml = JFactory::getXMLParser('Simple');
$xml->loadFile($file);
if (isset($xml->document) && isset($xml->document->_children)) {
	require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
	$parameters = NNParameters::getInstance();
	$xml_template = $parameters->getObjectFromXML($xml->document->_children);
	if (isset($xml_template->params) && isset($xml_template->params->required)) {
		require_once dirname(__FILE__).'/helper.php';
		if (!is_object($xml_template->params->required) || modAddToMenu::checkRequiredFields($xml_template->params->required, $vars)) {
			$template = $xml_template->params;
			if (!isset($template->dbselect) || !is_object($template->dbselect)) {
				$template->dbselect = new stdClass();
			}
			if (!isset($template->extras) || !is_object($template->extras)) {
				$template->extras = new stdClass();
			}
			if (!isset($template->urlparams) || !is_object($template->urlparams)) {
				$template->urlparams = new stdClass();
			}
			if (!isset($template->menuparams) || !is_object($template->menuparams)) {
				$template->menuparams = new stdClass();
			}
		}
	}
}

if (!$template) {
	return;
}

if ($option == 'com_categories') {
	$option = isset($vars['extension']) ? $vars['extension'] : 'com_content';
}
$lang = JFactory::getLanguage();
if ($lang->getTag() != 'en-GB') {
	// Loads English language file as fallback (for undefined stuff in other language file)
	$lang->load('mod_addtomenu', JPATH_ADMINISTRATOR, 'en-GB');
	$lang->load('com_menus', JPATH_ADMINISTRATOR, 'en-GB');
	$lang->load($option, JPATH_ADMINISTRATOR, 'en-GB');
	$lang->load($option.'.sys', JPATH_ADMINISTRATOR, 'en-GB');
}
$lang->load('mod_addtomenu', JPATH_ADMINISTRATOR, null, 1);
$lang->load('com_menus', JPATH_ADMINISTRATOR, null, 1);
$lang->load($option, JPATH_ADMINISTRATOR, null, 1);
$lang->load($option.'.sys', JPATH_ADMINISTRATOR, null, 1);

$insert = JRequest::getVar('insert');
if ($insert) {
	insertMenuItem($template, $vars, $parameters);
} else {
	renderHTML($template);
}

function insertMenuItem(&$template, &$vars, &$parameters)
{
	$db = JFactory::getDBO();

	$item = JTable::getInstance('menu');

	$item->title = JRequest::getVar('name', '');
	$item->alias = JRequest::getVar('alias', '');
	if (!strlen($item->alias)) {
		$item->alias = $item->name;
	}
	$item->alias = filterAlias($item->alias);

	$item->published = JRequest::getVar('published', 0);
	$menuitem = JRequest::getVar('menuitem', 'mainmenu::0');
	$menuitem = explode('::', $menuitem);
	$item->menutype = $menuitem['0'];
	$item->parent_id = (int) $menuitem['1'];
	$item->client_id = 0;
	$item->language = '*';

	$item->level = 1;
	$item->path = $item->alias;

	if ($item->parent_id) {
		$query = 'SELECT `path`, `level`'
			.' FROM #__menu'
			.' WHERE id = '.$item->parent_id
			.' LIMIT 1';
		$db->setQuery($query);
		$parent = $db->loadObject();
		$item->level = (int) $parent->level;
		$item->level++;
		$item->path = $parent->path.'/'.$item->path;
	}

	$query = 'SELECT `ordering`'
		.' FROM #__menu'
		.' WHERE menutype = '.$db->quote($item->menutype)
		.' AND parent_id = '.$item->parent_id
		.' ORDER BY `ordering` DESC'
		.' LIMIT 1';
	$db->setQuery($query);
	$item->ordering = (int) $db->loadResult();
	$item->ordering++;

	$item->type = 'component';

	$query = 'SELECT `extension_id`'
		.' FROM `#__extensions`'
		.' WHERE `type` = '.$db->quote('component')
		.' AND `element` = '.$db->quote($template->urlparams->option)
		.' LIMIT 1';
	$db->setQuery($query);
	$item->component_id = $db->loadResult();

	$item->link = 'index.php?';
	$urlparams = array();
	foreach ($template->urlparams as $key => $val) {
		$val = getVar($val);
		if (strlen($val)) {
			$urlparams[] = $key.'='.$val;
		}
	}
	$item->link .= implode('&', $urlparams);

	$menuparams = array();
	foreach ($template->menuparams as $key => $val) {
		$val = getVar($val);
		if (strlen($val)) {
			$menuparams[$key] = $val;
		}
	}
	$registry = new JRegistry();
	$registry->loadArray($menuparams);
	$item->params = $registry->toObject();

	$option = $vars['option'];
	$view = isset($vars['view']) ? $vars['view'] : (isset($vars['task']) ? $vars['task'] : '');
	// add default view settings
	$path = JPath::clean(JPATH_SITE.'/components/'.$option.'/views/'.$view.'/tmpl/default.xml');
	if (JFile::exists($path)) {
		$xml = simplexml_load_file($path);
		$xml = $xml->xpath('fields[2]/fieldset/field');
		foreach ($xml as $param) {
			$name = (string) $param->attributes()->name;
			if (!isset($item->params->{$name}) || $item->params->{$name} == '') {
				$item->params->{$name} = (string) $param->attributes()->default;
			}
		}
	} else {
		// add default component settings
		$path = JPath::clean(JPATH_ADMINISTRATOR.'/components/'.$option.'/config.xml');
		if (JFile::exists($path)) {
			$item->params = $parameters->getParams($item->params, $path);
		}
	}

	// add default menu settings
	$path = JPath::clean(JPATH_ADMINISTRATOR.'/components/com_menus/models/forms/item_component.xml');
	if (JFile::exists($path)) {
		$item->params = $parameters->getParams($item->params, $path);
	}

	$registry->loadObject($item->params);
	$item->params = $registry->toString();

	// Set the new location in the tree for the node.
	$item->setLocation($item->parent_id, 'last-child');
	$error = '';

	if (!$item->check()) {
		$error = $item->getError();
	}

	if (!$item->store()) {
		$error = $item->getError();
	}

	if ($error) {
		$error = str_replace('<br />', ' :: ', $item->getError());
		$error = explode('SQL=', $error);
		$error = trim($error['0']);

		if (!(strpos($error, 'Duplicate entry') === false)) {
			$error = JText::_('JLIB_DATABASE_ERROR_MENU_UNIQUE_ALIAS');
		}

		$error = JText::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $error);

		JError::raiseWarning('1', $error);
		renderHTML($template);
	} else {
		echo "<script> window.parent.addtomenu_setMessage( '".addslashes(JText::_('COM_MENUS_MENU_ITEM_SAVE_SUCCESS'))."', 1 ); </script>\n";
	}
}

function renderHTML(&$template)
{
	if (isset($template->dbselect->table)) {
		if (!isset($template->dbselect->alias)) {
			$template->dbselect->alias = $template->dbselect->name;
		}

		$db = JFactory::getDBO();
		$where = array();
		foreach ($template->dbselect->where as $key => $val) {
			$val = getVar($val);
			$where[] = '`'.$key.'` = '.$db->quote($val);
		}

		$query = 'SELECT '
			.'`'.$template->dbselect->name.'` as name, '
			.'`'.$template->dbselect->alias.'` as alias'
			.' FROM '.$template->dbselect->table
			.' WHERE '.implode(' AND ', $where)
			.' LIMIT 1';
		$db->setQuery($query);
		$item = $db->loadObject();
	} else {
		$item = new stdClass();
		$item->name = JText::_($template->dbselect->name);
		if (!isset($template->dbselect->alias)) {
			$item->alias = $item->name;
		} else {
			$item->alias = $template->dbselect->alias;
		}
	}
	$item->alias = filterAlias($item->alias);

	$width = '100%';
	$elements = array();
	$elements[] = el(
		'COM_MENUS_ITEM_FIELD_TITLE_LABEL',
		'<input class="inputbox" type="text" name="name" style=width:'.$width.';" maxlength="255" value="'.str_replace('"', '&quot;', $item->name).'" />'
	);
	$elements[] = el(
		'JFIELD_ALIAS_LABEL',
		'<input class="inputbox" type="text" name="alias" style=width:'.$width.';" maxlength="255" value="'.str_replace('"', '&quot;', $item->alias).'" />'
	);
	$elements[] = el(
		'JSTATUS',
		'<input type="radio" name="published" value="1" checked="checked"  />
		<label for="published1">'.JText::_('JPUBLISHED').'</label>
		<input type="radio" name="published" value="0"  />
		<label for="published0">'.JText::_('JUNPUBLISHED').'</label>'
	);
	$elements[] = el(
		'COM_MENUS_ITEM_FIELD_PARENT_LABEL',
		getMenuItems('menuitem', $width)
	);
	if (isset($template->extras->extra)) {
		if (!is_array($template->extras->extra)) {
			$template->extras->extra = array($template->extras->extra);
		}
		$extra_elements = array();
		foreach ($template->extras->extra as $element) {
			if ($element->type == 'toggler') {
				if (isset($element->param)) {
					if (!isset($element->value)) {
						$element->value = '';
					}
					$set_groups = explode('|', $element->param);
					$set_values = explode('|', $element->value);
					$ids = array();
					foreach ($set_groups as $i => $group) {
						$count = $i;
						if ($count >= count($set_values)) {
							$count = 0;
						}
						$values = explode(',', $set_values[$count]);
						foreach ($values as $val) {
							$ids[] = $group.'.'.$val;
						}
					}
					$el = '</table><div id="'.rand(1000000, 9999999).'___'.implode('___', $ids).'" class="nntoggler nntoggler_horizontal"><table width="100%" class="paramlist admintable" cellspacing="1">';
				} else {
					$el = '</table></div><table width="100%" class="paramlist admintable" cellspacing="1">';
				}
				$extra_elements[] = el(
					'',
					$el
				);
				continue;
			}
			if (!isset($element->name) || !isset($element->type)) {
				continue;
			}
			if ($element->type == 'title') {
				$extra_elements[] = el(
					'@spacer',
					JText::_($element->name)
				);
				continue;
			}

			if (!isset($element->param)) {
				continue;
			}

			if ($element->name == '') {
				$element->name = $element->param;
			}
			if ($element->param == '') {
				$element->param = strtolower($element->name);
			}

			if (!isset($element->value)) {
				$element->value = '';
			}
			if (!isset($element->values)) {
				$element->values = new stdClass();
				$element->values->value = $element->value;
			}
			if (!isset($element->default)) {
				$element->default = '';
			}

			$style = '';
			if (isset($element->style)) {
				$style = $element->style;
			}
			if (in_array( $element->type, array( 'radio', 'select', 'list'))) {
				$options = array();
				if (!is_array($element->values->value)) {
					$element->values->value = array($element->values->value);
				}
				foreach ($element->values->value as $val) {
					$options[] = JHtml::_('select.option', $val->value, JText::_($val->name), 'value', 'text');
				}
			}
			switch ($element->type) {
				case 'select':
				case 'list':
					$el = JHtml::_('select.genericlist', $options, 'params['.$element->param.']', 'class="inputbox" style="'.$style.'"', 'value', 'text', $element->default, $element->param);
					break;
				case 'radio':
					$el = JHtml::_('select.radiolist', $options, 'params['.$element->param.']', 'class="inputbox" style="'.$style.'"', 'value', 'text', $element->default);
					// add breaks between each radio element
					$el = preg_replace('#(</label>)(\s*<input )#i', '\1<br />\2', $el);
					break;
				case 'textarea':
					$el = '<textarea style="width:'.$width.';height:100px;'.$style.'" name="params['.$element->param.']">'.$element->values->value.'</textarea>';
					break;
				case 'hidden':
					$el = '<input type="hidden" style="'.$style.'" name="params['.$element->param.']" value="'.str_replace('"', '&quot;', $element->values->value).'" />';
					break;
				case 'text':
				default:
					$el = '<input type="text" name="params['.$element->param.']" style="width:'.$width.';'.$style.'" value="'.str_replace('"', '&quot;', $element->values->value).'" />';
					break;
			}
			$extra_elements[] = el(
				$element->name,
				$el
			);
		}
		if (!empty($extra_elements)) {
			$elements[] = el(
				'@spacer',
				'<strong>'.JText::_('ATM_EXTRA_OPTIONS').'</strong>'
			);
			$elements = array_merge($elements, $extra_elements);
		}
	}

	outputHTML($template, $elements);
}

function el($name, $element)
{
	$el = new stdClass();
	$el->name = $name;
	$el->element = $element;
	return $el;
}

function getMenuItems($name, $width = '100%')
{
	$db = JFactory::getDBO();

	// load the list of menu types
	$query = 'SELECT menutype, title'
		.' FROM #__menu_types'
		.' ORDER BY id';
	$db->setQuery($query);
	$menuTypes = $db->loadObjectList();

	// load the list of menu items
	$query = 'SELECT id, parent_id, title, menutype, type, published'
		.' FROM #__menu'
		.' WHERE published != '.$db->quote('-2')
		.' ORDER BY menutype, parent_id, ordering';
	$db->setQuery($query);
	$menuItems = $db->loadObjectList();

	// establish the hierarchy of the menu
	// TODO: use node model
	$children = array();

	if ($menuItems) {
		// first pass - collect children
		foreach ($menuItems as $v)
		{
			$pt = $v->parent_id;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push($list, $v);
			$children[$pt] = $list;
		}
	}

	// second pass - get an indent list of the items
	$list = JHtml::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0);

	// assemble into menutype groups
	$groupedList = array();
	foreach ($list as $k => $v) {
		$groupedList[$v->menutype][] =& $list[$k];
	}

	// assemble menu items to the array
	$options = array();

	foreach ($menuTypes as $count => $type)
	{
		if ($count) {
			$options[] = JHtml::_('select.option', '-', '&nbsp;', 'value', 'text', true);
		} else {
			$selected = $type->menutype.'::0';
		}

		$options[] = JHtml::_('select.option', $type->menutype.'::0', '[ '.$type->title.' ]');

		if (isset($groupedList[$type->menutype])) {
			$n = count($groupedList[$type->menutype]);
			for ($i = 0; $i < $n; $i++)
			{
				$item =& $groupedList[$type->menutype][$i];

				//If menutype is changed but item is not saved yet, use the new type in the list
				if (JRequest::getString('option', '', 'get') == 'com_menus') {
					$currentItemArray = JRequest::getVar('cid', array(0), '', 'array');
					$currentItemId = (int) $currentItemArray['0'];
					$currentItemType = JRequest::getString('type', $item->type, 'get');
					if ($currentItemId == $item->id && $currentItemType != $item->type) {
						$item->type = $currentItemType;
					}
				}
				if ($item->published == 0) {
					$item->treename .= ' ('.JText::_('Unpublished').')';
				}
				$options[] = JHtml::_('select.option', $type->menutype.'::'.$item->id, '&nbsp;&nbsp;&nbsp;'.$item->treename);
			}
		}
	}

	$attribs = 'class="inputbox" style=width:'.$width.';"';
	$attribs .= ' size="'.((count($options) > 10) ? 10 : count($options)).'"';

	return JHtml::_('select.genericlist', $options, $name, $attribs, 'value', 'text', $selected);
}

function getVar($var)
{
	if ($var['0'] == '$') {
		$var = getVal(substr($var, 1));
	}
	return $var;
}

function getVal($val)
{
	$vars = JRequest::getVar('vars');
	$extra = JRequest::getVar('params');

	if (isset($extra[$val])) {
		$value = $extra[$val];
	} else if (isset($vars[$val])) {
		$value = $vars[$val];
	} else {
		$value = JRequest::getVar($val);
	}

	if (is_array($value)) {
		$value = $value['0'];
	}

	return $value;
}

function filterAlias($alias)
{
	$alias = JFilterOutput::stringURLSafe($alias);
	if (trim(str_replace('-', '', $alias)) == '') {
		$datenow = JFactory::getDate();
		$alias = $datenow->toFormat("%Y-%m-%d-%H-%M-%S");
	}
	return $alias;
}

function outputHTML(&$template, &$elements)
{
	JHtml::_('behavior.tooltip');

	require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
	$version = NoNumberVersions::getXMLVersion(null, null, null, 1);

	$document = JFactory::getDocument();
	$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/popup.css'.$version);
	$document->addScript(JURI::root(true).'/plugins/system/nnframework/js/script.js'.$version);
	$document->addScript(JURI::root(true).'/plugins/system/nnframework/fields/toggler.js'.$version);

	$uri = JURI::getInstance();
	?>
<form action="<?php echo $uri->toString(); ?>" method="post" name="adminForm" id="adminForm">
	<input type="hidden" name="insert" value="1" />

	<div id="toolbar-box" class="nn-toolbar-box">
		<div class="m">
			<div id="toolbar" class="toolbar-list">
				<ul>
					<li id="toolbar-save" class="button">
						<a class="toolbar" onclick="document.getElementById('adminForm').submit();"
						   href="javascript://">
							<span class="icon-32-save">
							</span>
							<?php echo JText::_('JAPPLY') ?>
						</a>
					</li>
					<li id="toolbar-cancel" class="button">
						<a class="toolbar" onclick="window.parent.SqueezeBox.close();" href="javascript://">
							<span class="icon-32-cancel">
							</span>
							<?php echo JText::_('JCANCEL') ?>
						</a>
					</li>
				</ul>
				<div class="clr"></div>
			</div>
			<div class="pagetitle">
				<?php echo JText::_('ADD_TO_MENU'); ?>
				<h2><?php echo JText::_($template->name); ?></h2>
			</div>
		</div>
	</div>

	<table width="100%" class="paramlist admintable" cellspacing="1">
		<tbody>
			<?php
			foreach ($elements as $element) {
				if (!$element->name) {
					?>
					<?php echo $element->element; ?>
					<?php
				} else if ($element->name == '@spacer') {
					?>
					<tr>
						<td colspan="2"><?php echo $element->element; ?></td>
					</tr>
					<?php } else { ?>
					<tr>
						<td class="paramlist_key"><?php echo JText::_($element->name); ?></td>
						<td><?php echo $element->element; ?></td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>
</form>
<?php
}