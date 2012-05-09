<?php
/**
 * Popup page
 * Displays a list with modules
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

$user = JFactory::getUser();
if ($user->get('guest')) {
	JError::raiseError(403, JText::_("ALERTNOTAUTH"));
}

require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
$parameters = NNParameters::getInstance();
$params = $parameters->getPluginParams('modulesanywhere');

$app = JFactory::getApplication();
if ($app->isSite()) {
	if (!$params->enable_frontend) {
		JError::raiseError(403, JText::_("ALERTNOTAUTH"));
	}
}

$class = new plgButtonModulesAnywherePopup();
$class->render($params);

class plgButtonModulesAnywherePopup
{
	function render(&$params)
	{
		$app = JFactory::getApplication();

		// load the admin language file
		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('plg_system_modulesanywhere', JPATH_ADMINISTRATOR, 'en-GB');
		}
		$lang->load('plg_system_modulesanywhere', JPATH_ADMINISTRATOR, null, 1);
		// load the content language file
		$lang->load('com_modules', JPATH_ADMINISTRATOR);

		// Initialize some variables
		$db = JFactory::getDBO();
		$client = JApplicationHelper::getClientInfo(JRequest::getVar('client', '0', '', 'int'));
		$option = 'modulesanywhere';

		$filter_order = $app->getUserStateFromRequest($option.'filter_order', 'filter_order', 'm.position', 'cmd');
		$filter_order_Dir = $app->getUserStateFromRequest($option.'filter_order_Dir', 'filter_order_Dir', '', 'word');
		$filter_state = $app->getUserStateFromRequest($option.'filter_state', 'filter_state', '', 'word');
		$filter_position = $app->getUserStateFromRequest($option.'filter_position', 'filter_position', '', 'cmd');
		$filter_type = $app->getUserStateFromRequest($option.'filter_type', 'filter_type', '', 'cmd');
		$search = $app->getUserStateFromRequest($option.'search', 'search', '', 'string');
		$search = JString::strtolower($search);

		$limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'), 'int');
		$limitstart = $app->getUserStateFromRequest('modulesanywhere_limitstart', 'limitstart', 0, 'int');

		$where[] = 'm.client_id = '.( int ) $client->id;

		$joins[] = 'LEFT JOIN #__users AS u ON u.id = m.checked_out';
		$joins[] = 'LEFT JOIN #__viewlevels AS g ON g.id = m.access';
		$joins[] = 'LEFT JOIN #__modules_menu AS mm ON mm.moduleid = m.id';

		// used by filter
		if ($filter_position) {
			$where[] = 'm.position = '.$db->quote($filter_position);
		}
		if ($filter_type) {
			$where[] = 'm.module = '.$db->quote($filter_type);
		}
		if ($search) {
			$where[] = 'LOWER( m.title ) LIKE '.$db->quote('%'.$db->getEscaped($search, true).'%', false);
		}
		if ($filter_state) {
			if ($filter_state == 'P') {
				$where[] = 'm.published = 1';
			} else if ($filter_state == 'U') {
				$where[] = 'm.published = 0';
			}
		}

		$where = ' WHERE '.implode(' AND ', $where);
		$join = ' '.implode(' ', $joins);
		if ($filter_order == 'm.ordering') {
			$orderby = ' ORDER BY m.position, m.ordering '.$filter_order_Dir;
		} else {
			$orderby = ' ORDER BY '.$filter_order.' '.$filter_order_Dir.', m.ordering ASC';
		}

		// get the total number of records
		$query = 'SELECT COUNT( DISTINCT m.id )'
			.' FROM #__modules AS m'
			.$join
			.$where;
		$db->setQuery($query);
		$total = $db->loadResult();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination($total, $limitstart, $limit);

		$query = 'SELECT m.*, u.name AS editor, g.title AS groupname, MIN( mm.menuid ) AS pages'
			.' FROM #__modules AS m'
			.$join
			.$where
			.' GROUP BY m.id'
			.$orderby;
		$db->setQuery($query, $pageNav->limitstart, $pageNav->limit);
		$rows = $db->loadObjectList();
		if ($db->getErrorNum()) {
			echo $db->stderr();
			return false;
		}

		// get list of Positions for dropdown filter
		$query = 'SELECT m.position AS value, m.position AS text'
			.' FROM #__modules as m'
			.' WHERE m.client_id = '.( int ) $client->id
			.' GROUP BY m.position'
			.' ORDER BY m.position';
		$positions[] = JHtml::_('select.option', '0', '- '.JText::_('Select Position').' -');
		$db->setQuery($query);
		$positions = array_merge($positions, $db->loadObjectList());
		$lists['position'] = JHtml::_('select.genericlist', $positions, 'filter_position', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', "$filter_position");

		// get list of Positions for dropdown filter
		$query = 'SELECT module AS value, module AS text'
			.' FROM #__modules'
			.' WHERE client_id = '.( int ) $client->id
			.' GROUP BY module'
			.' ORDER BY module';
		$db->setQuery($query);
		$types[] = JHtml::_('select.option', '0', '- '.JText::_('Select Type').' -');
		$types = array_merge($types, $db->loadObjectList());
		$lists['type'] = JHtml::_('select.genericlist', $types, 'filter_type', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', "$filter_type");

		// state filter
		$lists['state'] = JHtml::_('grid.state', $filter_state);

		// table ordering
		$lists['order_Dir'] = $filter_order_Dir;
		$lists['order'] = $filter_order;

		// search filter
		$lists['search'] = $search;

		$this->outputHTML($params, $rows, $client, $pageNav, $lists);
	}

	function outputHTML(&$params, &$rows, &$client, &$page, &$lists)
	{
		$tag = explode(',', $params->module_tag);
		$tag = trim($tag['0']);
		$postag = explode(',', $params->modulepos_tag);
		$postag = trim($postag['0']);

		JHtml::_('behavior.tooltip');

		// Add scripts and styles
		$document = JFactory::getDocument();
		$script = "
			function modulesanywhere_jInsertEditorText( id, modulepos ) {
				f = document.getElementById( 'adminForm' );
				if ( modulepos ) {
					str = '{".$postag." '+id+'}';
				} else {
					var style = f.style.options[f.style.selectedIndex].value.trim();
					var showtitle = f.showtitle.options[f.showtitle.selectedIndex].value.trim();

					str = '{".$tag." '+id;
					if ( style && style != '".$params->style."' ) {
						str += '|'+style;
					}
					if ( showtitle === '0' || showtitle === '1' ) {
						str += '|showtitle='+showtitle;
					}
					str += '}';
				}


				window.parent.jInsertEditorText( str, '".JRequest::getString('name', 'text')."' );
				window.parent.SqueezeBox.close();
			}

			function toggleByCheckbox( id ) {
				el = document.getElementById( id );
				div = document.getElementById( id+'_div' );
				if ( el.checked ) {
					div.style.display = 'block';
				} else {
					div.style.display = 'none';
				}
			}
			window.addEvent('domready', function(){ toggleByCheckbox('div_enable'); });
		";
		$document->addScriptDeclaration($script);
		$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/popup.css');
		?>
	<div style="margin: 0;">
	<form action="" method="post" name="adminForm" id="adminForm">
	<fieldset>
		<div style="float: left">
			<h1><?php echo JText::_('MODULES_ANYWHERE'); ?></h1>
		</div>
		<div style="float: right">
			<div class="button2-left">
				<div class="blank hasicon cancel">
					<a rel="" onclick="window.parent.SqueezeBox.close();" href="javascript://"
					   title="<?php echo JText::_('JCANCEL') ?>"><?php echo JText::_('JCANCEL') ?></a>
				</div>
			</div>
		</div>
	</fieldset>

	<p><?php echo html_entity_decode(JText::_('MA_CLICK_ON_ONE_OF_THE_MODULES_LINKS'), ENT_COMPAT, 'UTF-8'); ?></p>

	<table class="adminform" cellspacing="2" style="width:auto;float:left;margin-right:10px;">
		<tr>
			<th>
				<?php echo JText::_('MA_MODULE_STYLE'); ?>:
			</th>
			<td>
				<select name="style" class="inputbox">
					<?php
					$style = JRequest::getCmd('style');
					if (!$style) {
						$style = $params->style;
					}
					?>
					<option <?php echo (($style == 'none') ? 'selected="selected" value=""' : 'value="none"'); ?>><?php echo JText::_('MA_NO_WRAPPING'); ?></option>
					<option <?php echo (($style == 'table') ? 'selected="selected" value=""' : 'value="table"'); ?>><?php echo JText::_('MA_TABLE'); ?></option>
					<option <?php echo (($style == 'horz') ? 'selected="selected" value=""' : 'value="horz"'); ?>><?php echo JText::_('MA_HORZ'); ?></option>
					<option <?php echo (($style == 'xhtml') ? 'selected="selected" value=""' : 'value="xhtml"'); ?>><?php echo JText::_('MA_XHTML'); ?></option>
					<option <?php echo (($style == 'rounded') ? 'selected="selected" value=""' : 'value="rounded"'); ?>><?php echo JText::_('MA_ROUNDED'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<th>
						<span class="hasTip"
							  title="<?php echo JText::_('COM_MODULES_FIELD_SHOWTITLE_LABEL').'::'.JText::_('COM_MODULES_FIELD_SHOWTITLE_DESC'); ?>">
							<?php echo JText::_('COM_MODULES_FIELD_SHOWTITLE_LABEL'); ?>:
						</span>
			</th>
			<td>
				<select name="showtitle" class="inputbox">
					<option value=""><?php echo JText::_('JDEFAULT'); ?></option>
					<option value="0"><?php echo JText::_('JNO'); ?></option>
					<option value="1"><?php echo JText::_('JYES'); ?></option>
				</select>
			</td>
		</tr>
	</table>


	<div style="clear:both;"></div>

	<table class="adminform" cellspacing="1">
		<tbody>
			<tr>
				<td>
					<?php echo JText::_('Filter'); ?>:
					<input type="text" name="search" id="search" value="<?php echo $lists['search'];?>"
						   class="text_area" onchange="this.form.submit();" />
					<button onclick="this.form.submit();"><?php echo JText::_('Go'); ?></button>
					<button onclick="
								document.getElementById( 'search' ).value='';
								document.getElementById( 'filter_position' ).value='0';
								document.getElementById( 'filter_type' ).value='0';
								document.getElementById( 'filter_state' ).value='';
								this.form.submit();"><?php echo JText::_('Reset'); ?></button>
				</td>
				<td style="text-align:right;">
					<?php
					echo $lists['position'];
					echo $lists['type'];
					echo $lists['state'];
					?>
				</td>
			</tr>
		</tbody>
	</table>

	<table class="adminlist" cellspacing="1">
		<thead>
			<tr>
				<th nowrap="nowrap" width="1%">
					<?php echo JHtml::_('grid.sort', 'ID', 'm.id', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
				<th class="title">
					<?php echo JHtml::_('grid.sort', 'Module Name', 'm.title', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
				<th nowrap="nowrap" width="7%">
					<?php echo JHtml::_('grid.sort', 'Position', 'm.position', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
				<th nowrap="nowrap" width="7%">
					<?php echo JHtml::_('grid.sort', 'Published', 'm.published', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
				<th nowrap="nowrap" width="1%">
					<?php echo JHtml::_('grid.sort', 'Order', 'm.ordering', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
				<?php if ($client->id == 0) { ?>
				<th nowrap="nowrap" width="7%">
					<?php echo JHtml::_('grid.sort', 'Access', 'groupname', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
				<?php } ?>
				<th nowrap="nowrap" width="5%">
					<?php echo JHtml::_('grid.sort', 'Pages', 'pages', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
				<th nowrap="nowrap" width="10%" class="title">
					<?php echo JHtml::_('grid.sort', 'Type', 'm.module', @$lists['order_Dir'], @$lists['order']); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="<?php echo ($client->id == 0) ? '8' : '7'; ?>">
					<?php echo $page->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
			$k = 0;
			for ($i = 0, $n = count($rows); $i < $n; $i++) {
				$row =& $rows[$i];

				if ($row->published) {
					$img = 'tick_l.png';
					$alt = JText::_('Published');
				} else {
					$img = 'publish_x_l.png';
					$alt = JText::_('Unpublished');
				}
				?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="right">
						<?php echo '<label class="hasTip" title="'.JText::_('MA_USE_ID_IN_TAG').'::{module '.$row->id.'}"><a href="javascript://" onclick="modulesanywhere_jInsertEditorText( \''.$row->id.'\' )">'.$row->id.'</a></label>';?>
					</td>
					<td>
						<?php echo '<label class="hasTip" title="'.JText::_('MA_USE_TITLE_IN_TAG').'::{module '.htmlspecialchars($row->title).'}"><a href="javascript://" onclick="modulesanywhere_jInsertEditorText( \''.addslashes(htmlspecialchars($row->title)).'\' )">'.htmlspecialchars($row->title).'</a></label>'; ?>
					</td>
					<td align="center">
						<?php echo '<label class="hasTip" title="'.JText::_('MA_USE_MODULE_POSITION_TAG').'::{modulepos '.$row->position.'}"><a href="javascript://" onclick="modulesanywhere_jInsertEditorText( \''.$row->position.'\', 1 )">'.$row->position.'</a></label>'; ?>
					</td>
					<td style="text-align:center;">
						<img src="<?php echo JURI::root(true).'/plugins/system/nnframework/images/'.$img; ?>"
							 width="16" height="16" border="0" alt="<?php echo $alt; ?>'" />
					</td>
					<td align="center">
						<?php echo $row->ordering; ?>
					</td>
					<?php if ($client->id == 0) { ?>
					<td align="center"><?php echo JText::_($row->groupname); ?></td>
					<?php } ?>
					<td align="center">
						<?php
						if (is_null($row->pages)) {
							echo JText::_('None');
						} else if ($row->pages > 0) {
							echo JText::_('Varies');
						} else {
							echo JText::_('All');
						}
						?>
					</td>
					<td>
						<?php echo $row->module ? $row->module : JText::_('User'); ?>
					</td>
				</tr>
				<?php
				$k = 1 - $k;
			}
			?>
		</tbody>
	</table>
	<input type="hidden" name="name" value="<?php echo JRequest::getString('name', 'text'); ?>" />
	<input type="hidden" name="client" value="<?php echo $client->id;?>" />
	<input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $lists['order_Dir']; ?>" />
	</form>
	</div>
	<?php
	}
}