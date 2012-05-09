<?php
/**
 * @package			NoNumber Extension Manager
 * @version			3.1.1
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

JHtml::_('behavior.modal');
JHtml::_('behavior.tooltip');

$ids = array();
foreach ($this->items as $item) {
	$ids[] = $item->id;
}

$config = JComponentHelper::getParams('com_nonumbermanager');
$check_data = $config->get('check_data', 1);
$hide_notinstalled = 0;
$has_not_installed = 0;
foreach ($this->items as $item) {
	if (!$item->installed) {
		$has_not_installed = 1;
		break;
	}
}

if (version_compare(PHP_VERSION, '5.3.0', 'l')) {
	$app = JFactory::getApplication();
	$app->enqueueMessage(JText::sprintf('NNEM_NOT_COMPATIBLE_PHP', PHP_VERSION, '5.3'), 'notice');
}

$document = JFactory::getDocument();

$mtversion = '';
require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
$versions = NNVersions::getInstance();

$version = $versions->getXMLVersion(null, null, null, 1);
$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/style.css'.$version);
$document->addScript(JURI::root(true).'/plugins/system/nnframework/js/script.js'.$version);

$key = trim($config->get('key'));
if ($key) {
	$key = strtolower(substr($key, 0, 8).md5(substr($key, 8)));
}
$script = "
	/* NoNumber Extension Manager variable */
	var NNEM_IDS =           [ '".implode("', '", $ids)."' ];
	var NNEM_NOINSTALL =     '".addslashes(JText::_('NNEM_ALERT_NO_ITEMS_TO_INSTALL'))."';
	var NNEM_NOUPDATE =      '".addslashes(JText::_('NNEM_ALERT_NO_ITEMS_TO_UPDATE'))."';
	var NNEM_NONESELECTED =  '".addslashes(JText::_('NNEM_ALERT_NO_ITEMS_SELECTED'))."';
	var NNEM_FAIL =          '".addslashes(JText::_('NNEM_ALERT_FAIL'))."';
	var NNEM_CHANGELOG =     '".addslashes(JText::_('NNEM_CHANGELOG'))."';
	var NNEM_TOKEN =         '".JUtility::getToken()."';
	var NNEM_KEY =           '".$key."';
";
$document->addScriptDeclaration($script);

$version = $versions->getXMLVersion('nonumbermanager', 'component', null, 1);
$document->addStyleSheet(JURI::root(true).'/administrator/components/com_nonumbermanager/css/style.css'.$version);
$document->addScript(JURI::root(true).'/administrator/components/com_nonumbermanager/js/script'.$mtversion.'.js'.$version);

$onload = array();
if ($check_data) {
	$onload[] = 'nnManager.refreshData();';
}
if (!empty($onload)) {
	$script = "
		window.addEvent( 'domready', function() {
			".implode("\n\t\t", $onload)."
		});
	";
	$document->addScriptDeclaration($script);
}

// Version check
$version = $versions->getXMLVersion('nonumbermanager', 'component');
echo $versions->getMessage('nonumberextensionmanager', '', $version);
?>
<a id="nnem_modal" href=""></a>
<div id="nnem">
<form action="" name="adminForm" id="adminForm">
<div class="nnem_main_buttons">
	<p style="float: right;"><em><?php echo JText::_('NNEM_ACCESS_TO_PRO'); ?></em></p>
	<?php
	echo makeElement('', 'data', 'refresh', JText::_('NNEM_CHECK_DATA'), JText::_('NNEM_REFRESH_DESC'), 0, $check_data);
	echo makeElement('', 'refresh', 'refresh', JText::_('NNEM_REFRESH'), JText::_('NNEM_REFRESH_DESC'), 0, !$check_data);
	if ($has_not_installed) {
		echo makeElement('', 'all_ghosted', '', JText::_('NNEM_HIDE_NOTINSTALLED'), JText::_('NN_ONLY_AVAILABLE_IN_PRO'), 'none');
	}
	?>
	<div class="clr"></div>
	<?php
	echo makeElement('', 'all_ghosted', 'installselected', 0, JText::_('NNEM_INSTALL_SELECTED'), 'none');
	echo makeElement('', 'all', 'installselected', JText::_('NNEM_INSTALL_SELECTED'), JText::_('NNEM_INSTALL_SELECTED_DESC'), 0, 1);
	echo makeElement('', 'all_ghosted', 'installall', 0, JText::_('NNEM_INSTALL_ALL'), 'none');
	echo makeElement('', 'all', 'installall', JText::_('NNEM_INSTALL_ALL'), JText::_('NNEM_INSTALL_ALL_DESC'), 0, 1);
	echo makeElement('', 'all_ghosted', 'updateall', 0, JText::_('NNEM_UPDATE_ALL'), 'none');
	echo makeElement('', 'all', 'updateall', JText::_('NNEM_UPDATE_ALL'), JText::_('NNEM_UPDATE_ALL_DESC'), 0, 1);
	?>
</div>
<table class="adminlist<?php echo $hide_notinstalled ? ' hide_not_installed' : ''; ?>">
	<thead>
		<tr>
			<th width="1%">
				<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
			</th>
			<th width="5%" class="left" nowrap="nowrap">
				<?php echo JText::_('NNEM_EXTENSION'); ?>
			</th>
			<th width="1%">&nbsp;</th>
			<th width="2%" class="left" nowrap="nowrap">
				<?php echo JText::_('NNEM_TYPE'); ?>
			</th>
			<th width="5%" class="left" nowrap="nowrap">
				<?php echo JText::_('NNEM_INSTALLED'); ?>
			</th>
			<th width="5%" class="left" nowrap="nowrap">
				<?php echo JText::_('NNEM_AVAILABLE'); ?>
			</th>
			<th width="1%">&nbsp;</th>
			<th width="5%" class="left buttons" nowrap="nowrap">
				<?php echo JText::_('NNEM_INSTALL_UPDATE'); ?>
			</th>
			<th width="1%">&nbsp;</th>
			<th class="left" nowrap="nowrap">
				<?php echo JText::_('NNEM_COMMENT'); ?>
			</th>
			<th width="5%" class="left">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->items as $i => $item) : ?>
		<tr id="row_<?php echo $item->id; ?>" class="<?php
			if ($item->installed) {
				echo 'installed'
					.($item->old ? ' old' : ($item->pro ? ' pro_installed' : ' free_installed'))
					.(empty($item->missing) ? '' : ' has_missing');
			} else {
				echo 'not_installed';
			}
			?>">
			<td class="center checkbox">
				<div class="checkbox_container">
							<span class="group_data select" style="display:none;">
								<?php echo JHtml::_('grid.id', $i, $item->id); ?>
							</span>
				</div>
			</td>
			<td nowrap="nowrap" class="ext_name">
				<input type="hidden" id="url_<?php echo $item->id; ?>" value="" />
						<span class="hasTip"
							  title="<?php echo JText::_('JGLOBAL_DESCRIPTION').'::'.JText::_($item->name.'_DESC'); ?>">
							<img
								src="<?php echo JURI::base(); ?>components/com_nonumbermanager/images/icons/<?php echo $item->alias; ?>.png"
								alt="" width="16" height="16" /> <?php echo JText::_($item->name); ?>
						</span>
			</td>
			<td class="ext_website">
				<a href="http://www.nonumber.nl/<?php echo $item->id; ?>" target="_blank">
							<span class="hasTip"
								  title="<?php echo JText::_('NNEM_WEBSITE'); ?>::http://www.nonumber.nl/<?php echo $item->alias; ?>">
								<img src="<?php echo JURI::base(); ?>components/com_nonumbermanager/images/link.png"
									 alt=""
									 width="16" height="16" />
							</span>
				</a>
			</td>
			<td nowrap="nowrap" class="ext_types">
						<span class="not_installed">
							<?php
							foreach ($item->types as $type) {
								$tip = JText::_('NN_'.strtoupper($type->type)).':: ';
								$icon = '<img src="'.JURI::base().'components/com_nonumbermanager/images/ext_'.$type->type.'.png" alt="'.$tip.'" style="margin:0 1px;" width="16" height="16" />';
								echo '<label class="hasTip" title="'.$tip.'">'.$icon.'</label>';
							}
							?>
						</span>
						<span class="installed">
							<?php
							foreach ($item->types as $type) {
								$tip = JText::_('NN_'.strtoupper($type->type)).'::'.JText::_('NNEM_GO_TO_EXTENSION');
								$icon = '<img src="'.JURI::base().'components/com_nonumbermanager/images/ext_'.$type->type.'.png" alt="'.$tip.'" style="margin:0 1px;" width="16" height="16" />';
								$icon = '<a href="index.php?'.$type->link.'" target="_blank">'.$icon.'</a>';
								echo '<label class="hasTip" title="'.$tip.'">'.$icon.'</label>';
							}
							?>
						</span>
			</td>
			<td nowrap="nowrap" class="">
				<?php
				echo makeElement($item->id, 'version_loading data', 'loading', 0, 0, 0, 1);
				?>
				<span class="installed">
							<?php
					echo makeElement($item->id, '', 'current_version', 0, $item->version, 0, 0);
					echo makeElement($item->id, '', 'free_installed', 0, 'FREE', 0, 1);
					echo makeElement($item->id, '', 'pro_installed', 0, 'PRO', 0, 1);
					?>
					<div class="clr"></div>
						</span>
			</td>
			<td nowrap="nowrap" class="">
				<?php
				echo makeElement('', 'data', 'refresh', JText::_('NNEM_CHECK_DATA'), JText::_('NNEM_REFRESH_DESC'), 0, $check_data);
				echo makeElement($item->id, 'data', 'loading', 0, 0, 0, 1);
				?>
				<span class="hide_uptodate">
							<?php
					echo makeElement($item->id, 'data', 'new_version', 0, '&nbsp;', 0, 1);
					echo makeElement($item->id, 'data', 'pro_no_access', 0, 'FREE', 0, 1);
					echo makeElement($item->id, 'data', 'pro_access', 0, 'PRO', 0, 1);
					?>
						</span>
			</td>
			<td class="center ext_changelog">
				<?php
				echo makeElement($item->id, 'data', 'changelog', 0, JText::_('NNEM_CHANGELOG'), 'http://www.nonumber.nl/'.$item->id.'#changelog', 1);
				?>
			</td>
			<td nowrap="nowrap" class="buttons">
				<?php
				echo makeElement($item->id, 'data', 'update', JText::_('NNEM_TITLE_UPDATE'), 0, 0, 1);
				echo makeElement($item->id, 'data', 'install', JText::_('NNEM_TITLE_INSTALL'), 0, 0, 1);
				echo makeElement($item->id, 'data', 'reinstall', JText::_('NNEM_TITLE_REINSTALL'), 0, 0, 1);
				echo makeElement($item->id, 'data', 'downgrade', JText::_('NNEM_TITLE_DOWNGRADE'), 0, 0, 1);
				?>
			</td>
			<td nowrap="nowrap" class="buttons">
						<span class="pro_not_installed"><span class="pro_available"><span class="pro_no_access">
							<?php
							echo makeElement($item->id, '', 'buy', JText::_('NNEM_BUY_PRO_VERSION'), 0, 'http://www.nonumber.nl/go-pro/subscribe?ext='.$item->id);
							?>
						</span></span></span>
						<span class="pro_installed"><span class="pro_no_access">
							<?php
							echo makeElement($item->id, '', 'nopro', JText::_('NNEM_RENEW_SUBSCRIPTION'), 0, 'http://www.nonumber.nl/subsciptions/subscriptions?ext='.$item->id);
							?>
						</span>
			</td>
			<td class="comments">
				<?php
				echo makeElement($item->id, 'comment', 'uptodate', 0, JText::_('NNEM_COMMENT_UPTODATE'), 0, 1);
				echo makeElement($item->id, 'comment', 'update', 0, JText::_('NNEM_COMMENT_UPDATE'), 0, 1);
				echo makeElement($item->id, 'comment', 'downgrade', 0, JText::_('NNEM_COMMENT_DOWNGRADE'), 0, 1);
				echo makeElement($item->id, 'comment', 'pro_no_access', 0, JText::_('NNEM_COMMENT_NO_PRO'), 0, 1);
				echo makeElement($item->id, 'comment', 'old', 0, JText::sprintf('NNEM_COMMENT_OLD', JText::_($item->name)), 0, 1);
				$missing = '';
				if ($item->installed && !empty($item->missing)) {
					$missing = array();
					foreach ($item->missing as $m) {
						$missing[] = JText::_('NN_'.strtoupper($m));
					}
					$missing = JText::sprintf('NNEM_MISSING_EXTENSIONS', implode(',', $missing));
				}
				echo makeElement($item->id, 'comment', 'missing', 0, $missing, 0, (!$missing));
				?>
			</td>
			<td nowrap="nowrap" class="ext_uninstall buttons">
				<?php if ($item->id != 'nonumberextensionmanager') : ?>
				<span class="installed">
							<?php
					echo makeElement($item->id, 'all_ghosted', 'uninstall', JText::_('NNEM_TITLE_UNINSTALL'), JText::_('NN_ONLY_AVAILABLE_IN_PRO'), 'none');
					?>
						</span>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>
</div>
<?php
// PRO Check
require_once JPATH_PLUGINS.'/system/nnframework/helpers/licenses.php';
$licenses = NNLicenses::getInstance();
echo $licenses->getMessage('NONUMBER_EXTENSION_MANAGER');

// Copyright
echo $versions->getCopyright(JText::_('NONUMBER_EXTENSION_MANAGER'), $version);

function makeElement($alias, $group, $type, $button = 0, $tip = 0, $link = 0, $hide = 0)
{
	$class = array();

	$id = '';
	if ($alias) {
		$id = $alias.'_'.$type;
	}
	if ($group != 'comment') {
		$class[] = $type;
	}
	if ($group) {
		if ($alias) {
			$id = $alias.'_'.$group.'_'.$type;
		}
		$class[] = 'group_'.$group;
		$class[] = $group.'_'.$type;
	}

	$txt = $tip;
	if ($button) {
		$txt = $button;
	} else {
		$tip = 0;
	}

	if ($tip) {
		$class[] = 'hasTip';
	} else {
		$tip = 0;
	}

	if ($group == 'comment') {
		$split = explode('<br />', $txt, 2);
		$txt = $split['0'];
		if (isset($split['1'])) {
			$txt .= ' <span class="readmore">'.JText::_('NN_MORE_INFO').'</span><span class="readmore_text"><br />'.$split['1'].'</span>';
		}
	}

	$img = '';
	if ($type == 'loading') {
		$txt = '<progress class="loading">'.JText::sprintf('NNEM_PROCESS_LOADING', '...').'</progress>';
		$id = '';
	} else if ($type == 'changelog') {
		$img = 'changelog.png';
	}
	$html = array();
	$html[] = '<span'.($id ? ' id="'.str_replace(' ', '_', $id).'"' : '').' class="'.implode(' ', $class).'"'.($tip ? ' title="'.$tip.':: "' : '').($hide ? ' style="display:none;"' : '').'>';

	if ($link === 'none') {
		$html[] = '<a class="nolink">';
	} else if ($button && $link) {
		$html[] = '<a href="'.$link.'" target="_blank">';
	} else if ($button) {
		$html[] = '<a href="javascript://" onclick="nnem_function(\''.$type.'\', \''.$alias.'\');" class="nnem_link">';
	} else if ($link) {
		$html[] = '<a href="'.$link.'" target="_blank">';
	}

	$class = array();

	if ($type == 'loading') {
		$html[] = $txt;
	} else if ($img) {
		$html[] = '<img src="'.JURI::base().'components/com_nonumbermanager/images/'.$img.'" alt="'.JText::_('NNEM_'.strtoupper($type)).'" width="16" height="16" />';
	} else if ($txt !== 0) {
		$html[] = '<span class="nnem_button">';
		$html[] = $txt;
		$html[] = '</span>';
	}

	if ($link || $button) {
		$html[] = '</a>';
	}

	$html[] = '</span>';

	return implode('', $html);
}