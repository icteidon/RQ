<?php
/**
 * @version		$Id: move.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$document = & JFactory::getDocument();
$document->addScriptDeclaration("
	Joomla.submitbutton = function(pressbutton) {
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		if (\$K2.trim(\$K2('#category').val()) == '') {
			alert( '".JText::_('K2_YOU_MUST_SELECT_A_TARGET_CATEGORY', true)."' );
		} else {
			submitform( pressbutton );
		}
	}
");

?>

<form action="index.php" method="post" id="adminForm" name="adminForm">
	<fieldset>
		<legend><?php echo JText::_('K2_TARGET_CATEGORY'); ?></legend>
		<?php echo $this->lists['categories']; ?>
	</fieldset>
	<fieldset>
		<legend><?php echo JText::_('K2_ITEMS_BEING_MOVED'); ?></legend>
		<ol>
			<?php foreach ($this->rows as $row): ?>
			<li><?php echo $row->title; ?><input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" /></li>
			<?php endforeach; ?>
		</ol>
	</fieldset>
	<input type="hidden" name="option" value="com_k2" />
	<input type="hidden" name="view" value="<?php echo JRequest::getVar('view'); ?>" />
	<input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />
</form>
