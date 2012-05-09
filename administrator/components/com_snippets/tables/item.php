<?php
/**
 * Item Table
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

/**
 * Item Table
 */
class SnippetsTableItem extends JTable
{
	/**
	 * Constructor
	 *
	 * @param	object	Database object
	 *
	 * @return	void
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__snippets', 'id', $db);
	}

	/**
	 * Overloaded check function
	 *
	 * @return boolean
	 */
	public function check()
	{
		$this->name = trim($this->name);

		// Check for valid name
		if (empty($this->name)) {
			$this->setError(JText::_('SNP_THE_ITEM_MUST_HAVE_A_NAME'));
			return 0;
		} else if (empty($this->alias)) {
			$this->_error = JText::_('SNP_THE_ITEM_MUST_HAVE_AN_ID');
			return 0;
		}

		return 1;
	}
}