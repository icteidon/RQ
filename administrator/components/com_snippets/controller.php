<?php
/**
 * Controller
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
jimport('joomla.application.component.controller');

/**
 * Master Display Controller
 */
class SnippetsController extends JController
{
	/**
	 * @var		string	The default view.
	 */
	protected $default_view = 'list';

	/**
	 * Method to display a view
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/helper.php';

		// Load the submenu.
		SnippetsHelper::addSubmenu(JRequest::getCmd('view', 'list'));

		$view = JRequest::getCmd('view', 'list');
		$layout = JRequest::getCmd('layout', 'default');
		$id = JRequest::getInt('id');

		// redirect to list if view is invalid
		if ($view != 'list' && $view != 'item') {
			$this->setRedirect(JRoute::_('index.php?option=com_snippets', false));
			return false;
		}

		// Check for edit form.
		if ($view == 'item' && $layout == 'edit' && !$this->checkEditId('com_snippets.edit.item', $id)) {
			// Somehow the person just went to the form - we don't allow that.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_snippets', false));

			return false;
		}

		parent::display();
	}
}