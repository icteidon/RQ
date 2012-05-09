<?php
/**
 * Item View Template: Edit
 *
 * @package			Snippets
 * @version			2.1.1
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.keepalive');

JPlugin::loadLanguage('com_content');

?>

<form action="<?php echo JRoute::_('index.php?option=com_snippets&id='.( int ) $this->item->id); ?>"
	  method="post" name="adminForm" id="item-form">
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>

	<div class="clr"></div>

	<p style="margin: 1em 1em 0 1em;"><?php echo html_entity_decode(JText::_('SNP_ITEM_INFORMATION'), ENT_COMPAT, 'UTF-8'); ?></p>

	<div class="clr"></div>

	<div class="col" style="width:100%;">
		<?php echo $this->render($this->item->form, 'details', JText::_('JDETAILS')); ?>
	</div>

	<div class="clr"></div>
	<div class="col" style="width:100%;">
		<?php echo $this->render($this->item->form, '-content', JText::_('NN_CONTENT')); ?>
	</div>

	<div class="clr"></div>
</form>

<script language="javascript" type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		var form = document.adminForm;
		if (task == 'item.cancel') {
			Joomla.submitform(task);
			return;
		}

		// do field validation
		if (form['jform[name]'].value.trim() == "") {
			alert("<?php echo JText::_('SNP_THE_ITEM_MUST_HAVE_A_NAME', true); ?>");
		} else if (form['jform[alias]'].value.trim() == "") {
			alert("<?php echo JText::_('SNP_THE_ITEM_MUST_HAVE_AN_ID', true); ?>");
		} else {
			Joomla.submitform(task);
		}
	}
</script>