<?php
/**
 * List View
 *
 * @package			Content Templater
 * @version			3.1.0
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
 * List View
 */
class ContentTemplaterViewList extends JView
{
	protected $enabled;
	protected $list;
	protected $pagination;
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

		$this->enabled = ContentTemplaterHelper::isEnabled();
		$this->list = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');
		$this->config = $this->parameters->getComponentParams('contenttemplater', $this->state->params);

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		parent::display($tpl);
		$this->addToolbar();
	}

	/**
	 * Add the page title and toolbar.
	 *
	 */
	protected function addToolbar()
	{
		$state = $this->get('State');
		$canDo = ContentTemplaterHelper::getActions();
		$comp_name = 'contenttemplater';

		$viewLayout = JRequest::getCmd('layout', 'default');

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';

		$document = JFactory::getDocument();
		$version = NoNumberVersions::getXMLVersion(null, null, null, 1);
		$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/style.css'.$version);
		$document->addStyleSheet(JURI::root(true).'/administrator/components/com_'.$comp_name.'/css/style.css');

		if ($viewLayout == 'import') {
			// Set document title
			$document->setTitle(JText::_('CONTENT_TEMPLATER').' : '.JText::_('NN_IMPORT_ITEMS'));
			// Set ToolBar title
			JToolBarHelper::title(JText::_('NN_IMPORT_ITEMS'), $comp_name.'.png');
			// Set toolbar items for the page
			JToolBarHelper::back();
		} else {
			// Set document title
			$document->setTitle(JText::_('CONTENT_TEMPLATER').' : '.JText::_('NN_LIST'));
			// Set ToolBar title
			JToolBarHelper::title(JText::_('NN_LIST'), $comp_name.'.png');
			// Set toolbar items for the page
			if ($canDo->get('core.create')) {
				JToolBarHelper::addNew('item.add');
				JToolBarHelper::custom('list.copy', 'copy.png', 'copy.png', 'JTOOLBAR_DUPLICATE', true);
			}
			if ($canDo->get('core.edit')) {
				JToolBarHelper::editList('item.edit');
			}
			if ($canDo->get('core.edit.state')) {
				if ($state->get('filter.state') != 2) {
					JToolBarHelper::divider();
					JToolBarHelper::publish('list.publish', 'JTOOLBAR_ENABLE', true);
					JToolBarHelper::unpublish('list.unpublish', 'JTOOLBAR_DISABLE', true);
				}
			}
			if ($canDo->get('core.create')) {
				JToolBarHelper::divider();
				JToolBarHelper::custom('list.export', 'export.png', 'export.png', 'NN_EXPORT');
				JToolBarHelper::custom('list.import', 'import.png', 'import.png', 'NN_IMPORT', false);
			}
			if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
				JToolBarHelper::divider();
				JToolBarHelper::deleteList('', 'list.delete', 'JTOOLBAR_EMPTY_TRASH');
			} else if ($canDo->get('core.edit.state')) {
				JToolBarHelper::divider();
				JToolBarHelper::trash('list.trash');
			}
			if ($canDo->get('core.admin')) {
				JToolBarHelper::divider();
				JToolBarHelper::preferences('com_'.$comp_name);
			}

			$bar = JToolBar::getInstance('toolbar');
			JToolBarHelper::divider();
			$bar->appendButton('Popup', 'help', 'Help', 'http://www.nonumber.nl/'.$comp_name.'?ml=1', 'window.getSize().x-100', 'window.getSize().y-100');
		}
	}

	function maxlen($string = '', $maxlen = 60)
	{
		if (JString::strlen($string) > $maxlen) {
			$string = JString::substr($string, 0, $maxlen - 3).'...';
		}
		return $string;
	}
}