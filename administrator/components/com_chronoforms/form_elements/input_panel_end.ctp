<div class="dragable" id="input_panel_end">Panel End</div>
<div class="element_code" id="input_panel_end_element">
	<label id="input_panel_end_{n}_label" class="panel_end_label">Panel End</label>
	<?php //echo $HtmlHelper->input('chronofield[{n}][input_panel_end_{n}_tab_key]', array('type' => 'hidden', 'id' => 'input_panel_end_{n}_tab_key', 'value' => $element_params['tab_key'])); ?>
	
	<input type="hidden" id="chronofield_id_{n}" name="chronofield_id" value="{n}" />
    <input type="hidden" name="chronofield[{n}][tag]" value="input" />
    <input type="hidden" name="chronofield[{n}][type]" value="panel_end" />
</div>
<div class="element_config" id="input_panel_end_element_config">
	<?php echo $PluginTabsHelper->Header(array('settings' => 'Settings', 'help' => 'Help'), 'input_panel_end_element_config_{n}'); ?>
	<?php echo $PluginTabsHelper->tabStart('settings'); ?>
		<?php //echo $HtmlHelper->input('input_panel_end_{n}_tab_key_config', array('type' => 'text', 'label' => 'Tab Key', 'class' => 'small_input', 'smalldesc' => 'Your tab key which should exist in the tabs list in the "Tab Pane" element.')); ?>
	<?php echo $PluginTabsHelper->tabEnd(); ?>
	
	<?php echo $PluginTabsHelper->tabStart('help'); ?>
		This element will close an opened panel.
	<?php echo $PluginTabsHelper->tabEnd(); ?>
</div>