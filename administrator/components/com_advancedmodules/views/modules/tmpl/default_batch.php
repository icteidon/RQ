<?php
/**
 * @package			Advanced Module Manager
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/**
 * @package     Joomla.Administrator
 * @subpackage  com_advancedmodules
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$clientId = $this->state->get('filter.client_id');
$published = $this->state->get('filter.published');
?>
<fieldset class="batch">
	<legend><?php echo JText::_('COM_MODULES_BATCH_OPTIONS');?></legend>
	<p><?php echo JText::_('COM_MODULES_BATCH_TIP'); ?></p>
	<?php echo JHtml::_('batch.access');?>
	<?php echo JHtml::_('batch.language'); ?>

	<?php if ($published >= 0) : ?>
	<?php echo JHtml::_('modules.positions', $clientId); ?>
	<?php endif; ?>

	<button type="submit" onclick="Joomla.submitbutton('module.batch');">
		<?php echo JText::_('JGLOBAL_BATCH_PROCESS'); ?>
	</button>
	<button type="button"
	        onclick="document.id('batch-position-id').value='';document.id('batch-access').value='';document.id('batch-language-id').value=''">
		<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>
	</button>
</fieldset>
