<?php
/**
 * Item Controller
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

jimport('joomla.application.component.controllerform');

/**
 * Item Controller
 */
class SnippetsControllerItem extends JControllerForm
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 */
	protected $text_prefix = 'NN';
	// Parent class access checks are sufficient for this controller.
}
