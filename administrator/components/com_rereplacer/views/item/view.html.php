<?php
/**
 * Item View
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

jimport('joomla.application.component.view');

/**
 * Item View
 */
class ReReplacerViewItem extends JView
{
	protected $item;
	protected $form;
	protected $state;
	protected $config;
	protected $parameters;

	/**
	 * Display the view
	 *
	 */
	public function display($tpl = null)
	{
		require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
		$this->parameters = NNParameters::getInstance();

		$this->form = $this->get('Form');
		$this->item = $this->_models['item']->getItem(null, 1);
		$this->state = $this->get('State');
		$this->config = $this->parameters->getComponentParams('rereplacer', $this->state->params);

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 */
	protected function addToolbar()
	{
		$user = JFactory::getUser();
		$isNew = ($this->item->id == 0);
		$canDo = ReReplacerHelper::getActions();
		$comp_name = 'rereplacer';

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';

		$document = JFactory::getDocument();
		$version = NoNumberVersions::getXMLVersion(null, null, null, 1);
		$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/style.css'.$version);
		$document->addStyleSheet(JURI::root(true).'/administrator/components/com_'.$comp_name.'/css/style.css');

		JRequest::setVar('hidemainmenu', true);

		// Set document title
		$document->setTitle(JText::_('REREPLACER').' : '.JText::_('NN_ITEM'));
		// Set ToolBar title
		JToolBarHelper::title(JText::_('NN_ITEM'), $comp_name.'.png');

		// If not checked out, can save the item.
		if ($canDo->get('core.edit')) {
			JToolBarHelper::apply('item.apply');
			JToolBarHelper::save('item.save');
		}

		if ($canDo->get('core.edit') && $canDo->get('core.create')) {
			if (version_compare(JVERSION, '1.7.0', 'l')) {
				JToolBarHelper::custom('item.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			} else {
				JToolBarHelper::save2new('item.save2new');
			}
		}
		if (!$isNew && $canDo->get('core.create')) {
			if (version_compare(JVERSION, '1.7.0', 'l')) {
				JToolBarHelper::custom('item.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			} else {
				JToolBarHelper::save2copy('item.save2copy');
			}
		}

		if (empty($this->item->id)) {
			JToolBarHelper::cancel('item.cancel');
		} else {
			JToolBarHelper::cancel('item.cancel', 'JTOOLBAR_CLOSE');
		}

		$bar = JToolBar::getInstance('toolbar');
		JToolBarHelper::divider();
		$bar->appendButton('Popup', 'help', 'JHELP', 'http://www.nonumber.nl/'.$comp_name.'?ml=1', 'window.getSize().x-100', 'window.getSize().y-100');
	}

	protected function render(&$form, $name = '', $title = '')
	{
		$items = array();
		foreach ($form->getFieldset($name) as $field) {
			$items[] = $field->label.$field->input;
		}
		if (empty ($items)) {
			return '';
		}

		$html = array();
		if ($title) {
			$html[] = '<fieldset class="adminform">';
			$html[] = '<legend>'.$title.'</legend>';
		} else {
			$html[] = '<fieldset class="panelform">';
		}
		$html[] = '<ul class="adminformlist"><li>'.implode('</li><li>', $items).'</li></ul>';
		$html[] = '</fieldset>';

		return implode('', $html);
	}
}
