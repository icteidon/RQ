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

jimport('joomla.filesystem.file');

$lang = JFactory::getLanguage();
if ($lang->getTag() != 'en-GB') {
	// Loads English language file as fallback (for undefined stuff in other language file)
	$lang->load('com_advancedmodules', JPATH_ADMINISTRATOR, 'en-GB');
}
$lang->load('com_advancedmodules', JPATH_ADMINISTRATOR, null, 1);

$html = array();
$html[] = JHtml::_('sliders.panel', JText::_('AMM_MODULE_ASSIGNMENT'), 'assignment-options');
$html[] = '<fieldset class="panelform">';
$html[] = '<ul class="adminformlist">';

if ($this->config->show_mirror_module) {
	$html[] = $this->render($this->assignments, 'mirror_module');
	$html[] = '</ul>';
	$html[] = '<div style="clear: both;"></div>';
	$html[] = '<div id="'.rand(1000000, 9999999).'___mirror_module.0" class="nntoggler">';
	$html[] = '<ul class="adminformlist">';
}


if ($this->config->show_match_method
	&& ($this->config->show_assignto_content
		|| $this->config->show_assignto_components
		|| $this->config->show_assignto_urls
		|| $this->config->show_assignto_browser
		|| $this->config->show_assignto_date
		|| $this->config->show_assignto_usergrouplevels
		|| $this->config->show_assignto_languages
		|| $this->config->show_assignto_templates
	)
) {
	if ($this->config->show_match_method) {
		$html[] = $this->render($this->assignments, 'match_method');
	}
}

if ($this->config->show_show_ignores) {
	$str = $this->render($this->assignments, 'show_ignores');
	$def_val = $this->config->show_ignores ? '2' : '-1';
	$def_text = $this->config->show_ignores ? JText::_('JSHOW') : JText::_('JHIDE');
	$html[] = preg_replace('#(<input [^>]*id="advancedparams_show_ignores2"[^>]*value=)"2"([^>]*/>.*?)(</label>)#si', '\1"'.$def_val.'"\2 ('.$def_text.')\3', $str);
} else
{
	$html[] = '<input type="hidden" name="show_ignores" value="1" />';
}

$html[] = $this->render($this->assignments, 'assignto_menuitems');
if ($this->config->show_assignto_homepage) {
	$html[] = $this->render($this->assignments, 'assignto_homepage');
}

if ($this->config->show_assignto_content) {
	$html[] = $this->render($this->assignments, 'assignto_content');
}


if ($this->config->show_assignto_components) {
	$html[] = $this->render($this->assignments, 'assignto_components');
}
if ($this->config->show_assignto_urls) {
	$configuration = JFactory::getConfig();
	$use_sef = ($this->config->use_sef == 2) ? $configuration->getValue('config.sef') == 1 : $this->config->use_sef;
	$html[] = '<input type="hidden" name="use_sef" value="'.(int) $use_sef.'" />';
	$html[] = $this->render($this->assignments, 'assignto_urls');
}
if ($this->config->show_assignto_browsers) {
	$html[] = $this->render($this->assignments, 'assignto_browsers');
}
if ($this->config->show_assignto_date) {
	$html[] = $this->render($this->assignments, 'assignto_date');
}

$html[] = $this->render($this->assignments, 'assignto_users_open');

$html[] = '
<div class="panel nn_panel nn_panel_title nn_panel_top">
	<div class="nn_block nn_title">
		'.JText::_('NN_ACCESS_LEVELS').'
		<div style="clear: both;"></div>
	</div>
</div>
<div class="panel nn_panel">
	<div class="nn_block">
		<ul class="adminformlist">
			<li>
				'.$this->form->getLabel('access').'
				<fieldset class="radio">
					'.$this->form->getInput('access').'
				</fieldset>
			</li>
		</ul>
		<div style="clear: both;"></div>
	</div>
</div>';

if ($this->config->show_assignto_usergrouplevels) {
	$html[] = $this->render($this->assignments, 'assignto_usergrouplevels');
}
$html[] = $this->render($this->assignments, 'assignto_users_close');

if ($this->config->show_assignto_languages) {
	$html[] = $this->render($this->assignments, 'assignto_languages');
}
if ($this->config->show_assignto_templates) {
	$html[] = $this->render($this->assignments, 'assignto_templates');
}

if ($this->config->show_mirror_module) {
	$html[] = '</div>';
}

$html[] = '</ul>';
$html[] = '</fieldset>';

echo implode("\n\n", $html);