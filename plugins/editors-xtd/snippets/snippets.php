<?php
/**
 * Main Plugin File
 * Does all the magic!
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

// Import library dependencies
jimport('joomla.plugin.plugin');

/**
 ** Plugin that places the button
 */
class plgButtonSnippets extends JPlugin
{
	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function onDisplay($name)
	{
		// Only used for PRO version
		return;
	}
}