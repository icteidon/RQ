<?php
/**
 * @version		$Id: default.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$document = & JFactory::getDocument();
$document->addScriptDeclaration("
	Joomla.submitbutton = function(pressbutton){
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		if (\$K2.trim(\$K2('#name').val()) == '') {
			alert( '".JText::_('K2_GROUP_NAME_CANNOT_BE_EMPTY', true)."' );
		} else {
			submitform( pressbutton );
		}
	}
");

?>

<form action="index.php" enctype="multipart/form-data" method="post" name="adminForm" id="adminForm">
	<table class="admintable">
		<tr>
			<td class="key"><?php echo JText::_('K2_GROUP_NAME'); ?></td>
			<td><input class="text_area k2TitleBox" type="text" name="name" id="name" value="<?php echo $this->row->name; ?>" size="50" maxlength="250" /></td>
		</tr>
	</table>
	<input type="hidden" name="option" value="com_k2" />
	<input type="hidden" name="view" value="extrafieldsgroup" />
	<input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>
