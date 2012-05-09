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

/**
 * @package		Joomla.Administrator
 * @subpackage	com_nonumbermanager
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

$task = JRequest::getCmd('task');

JHtml::_('behavior.mootools');

$app = JFactory::getApplication();
$app->set('_messageQueue', '');

$document = JFactory::getDocument();
$config = JComponentHelper::getParams('com_nonumbermanager');

$mtversion = '';
require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
$versions = NNVersions::getInstance();

$version = $versions->getXMLVersion(null, null, null, 1);
$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/style.css'.$version);
$document->addScript(JURI::root(true).'/plugins/system/nnframework/js/script.js'.$version);

$script = "
	/* NoNumber Extension Manager variable */
	var NNEM_IDS =   [ '".implode("', '", array_keys($this->items))."' ];
	var NNEM_TOKEN = '".JUtility::getToken()."';
";
$document->addScriptDeclaration($script);

$version = $versions->getXMLVersion('nonumbermanager', 'component', null, 1);
$document->addStyleSheet(JURI::root(true).'/administrator/components/com_nonumbermanager/css/process.css'.$version);
$document->addScript(JURI::root(true).'/administrator/components/com_nonumbermanager/js/process'.$mtversion.'.js'.$version);

$document->addStyleDeclaration('html, body{ height: auto !important; overflow-y: auto !important; }');
?>

<div class="titles">
	<div class="title pre">
		<a href="javascript://" onclick="nnManagerProcess.process('<?php echo $task; ?>');"
		   class="nonumbermanager_button">
			<?php echo JText::_('NNEM_TITLE_'.strtoupper($task)); ?> <small><?php echo JText::_('NNEM_CLICK'); ?></small>
		</a>
	</div>
	<div class="title processing" style="display:none;">
		<h1><?php echo JText::sprintf('NNEM_PROCESS_'.strtoupper($task), '...'); ?></h1>
	</div>
	<div class="title done" style="display:none;">
		<?php if ($task != 'uninstall') : ?>
		<div class="nnem_message"><?php echo JText::_('NNEM_CLEAN_CACHE'); ?></div>
		<?php endif; ?>
		<h1><?php echo JText::_('NNEM_TITLE_FINISHED'); ?></h1>
	</div>
	<div class="title failed" style="display:none;">
		<a href="javascript://" onclick="nnManagerProcess.process('<?php echo $task; ?>');"
		   class="nonumbermanager_button">
			<?php echo JText::_('NNEM_TITLE_RETRY'); ?>: <?php echo JText::_('NNEM_TITLE_'.strtoupper($task)); ?>
		</a>
	</div>
</div>

<table class="processlist">
	<tbody>
		<?php foreach ($this->items as $item) : ?>
		<tr id="row_<?php echo $item->id; ?>">
			<td width="1%" nowrap="nowrap" class="ext_name">
				<img width="16" height="16" alt=""
					 src="<?php echo JURI::base(); ?>components/com_nonumbermanager/images/icons/<?php echo $item->id; ?>.png">
				<?php echo JText::_($item->name); ?>
			</td>
			<td class="statuses">
				<input type="hidden" id="url_<?php echo $item->id; ?>" value="<?php echo $item->url; ?>" />

				<div id="queue_<?php echo $item->id; ?>" class="status queued">
					<span><?php echo JText::_('NNEM_QUEUED'); ?></span>
				</div>
				<div id="processing_<?php echo $item->id; ?>" class="status processing" style="display:none;">
					<span><progress><?php echo JText::sprintf('NNEM_PROCESS_'.strtoupper($task), '...'); ?></progress></span>
				</div>

				<div id="success_<?php echo $item->id; ?>" class="status success" style="display:none;">
					<span><?php echo JText::_(($task == 'uninstall') ? 'NNEM_UNINSTALLED' : 'NNEM_INSTALLED'); ?></span>
				</div>
				<div id="failed_<?php echo $item->id; ?>" class="status failed" style="display:none;">
					<span><?php echo JText::_('NNEM_INSTALLATION_FAILED'); ?></span>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>