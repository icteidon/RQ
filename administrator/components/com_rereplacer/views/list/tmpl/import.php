<?php
/**
 * List View Template: Import
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
?>
<form onsubmit="return submitform();" action="<?php echo JRoute::_('index.php?option=com_rereplacer&view=list'); ?>"
	  method="post" enctype="multipart/form-data" name="adminForm" id="adminForm">
	<table class="adminlist">
		<tr>
			<td><?php echo JText::_('RR_CHOOSE_FILE'); ?>: &nbsp;<input type="file" name="file"></td>
		</tr>
		<tr>
			<td>
				<?php echo JText::_('RR_PUBLISH_ITEMS'); ?>
				<input type="radio" name="publish_all" id="publish_all0" value="0" />
				<label for="publish_all0"><?php echo JText::_('JNO'); ?></label>
				<input type="radio" name="publish_all" id="publish_all1" value="1" />
				<label for="publish_all1"><?php echo JText::_('JYES'); ?></label>
				<input type="radio" name="publish_all" id="publish_all2" value="2" checked="checked" />
				<label for="publish_all2"><?php echo JText::_('NN_AS_EXPORTED'); ?></label>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="<?php echo JText::_('Upload'); ?>"></td>
		</tr>
	</table>

	<input type="hidden" name="task" value="list.import" />
	<?php echo JHtml::_('form.token'); ?>
</form>

<script language="javascript" type="text/javascript">
	/**
	 * Submit the admin form
	 *
	 * small hack: let task decides where it comes
	 */
	function submitform()
	{
		var form = document.adminForm;
		var file = form.file.value;
		if (file) {
			var dot = file.lastIndexOf(".");
			if (dot != -1) {
				var ext = file.substr(dot, file.length);
				if (ext == '.rrbak') {
					return true;
				}
			}
		}
		alert('<?php echo JText::_('RR_PLEASE_CHOOSE_A_VALID_FILE'); ?>');
		return false;
	}
</script>