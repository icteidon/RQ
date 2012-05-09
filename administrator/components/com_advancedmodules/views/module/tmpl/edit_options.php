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
 * @package		Joomla.Administrator
 * @subpackage	com_advancedmodules
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$fieldSets = $this->form->getFieldsets('params');

foreach ($fieldSets as $name => $fieldSet) :
	$label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_MODULES_'.$name.'_FIELDSET_LABEL';
	echo JHtml::_('sliders.panel', JText::_($label), $name.'-options');
	if (isset($fieldSet->description) && trim($fieldSet->description)) :
		echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
	endif;
	?>
<fieldset class="panelform">
	<?php $hidden_fields = ''; ?>
	<ul class="adminformlist">
		<?php foreach ($this->form->getFieldset($name) as $field) : ?>
		<?php if (!$field->hidden) : ?>
			<li>
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</li>
			<?php else : $hidden_fields .= $field->input; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php if ($name == 'basic' && $this->config->show_extra) : ?>
		<?php for ($i = 1; $i <= 5; $i++) : ?>
			<?php if (isset($this->config->{'extra'.$i}) && $this->config->{'extra'.$i} != '') : ?>
				<?php
				$label = explode('|', $this->config->{'extra'.$i}, 2);
				$tooltip = isset($label['1']) ? JText::_($label['1']) : '';
				$label = JText::_($label['0']);
				?>
				<li>
					<label id="advancedparams_extra<?php echo $i; ?>-lbl" for="advancedparams_extra<?php echo $i; ?>"
						<?php echo $tooltip ? 'class="hasTip" title="'.$label.'::'.$tooltip.'"' : ''; ?>>
						<?php echo $label; ?>
					</label>
					<?php echo $this->assignments->getInput('extra'.$i); ?></li>
				<?php endif; ?>
			<?php endfor; ?>
		<?php endif; ?>
	</ul>
	<?php echo $hidden_fields; ?>
</fieldset>
<?php endforeach; ?>
