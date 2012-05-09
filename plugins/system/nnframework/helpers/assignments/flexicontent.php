<?php
/**
 * NoNumber Framework Helper File: Assignments: FlexiContent
 *
 * @package			NoNumber Framework
 * @version			12.5.1
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Assignments: FlexiContent
 */
class NNFrameworkAssignmentsFlexiContent
{
	var $_version = '12.5.1';

	/**
	 * passCategories_FC
	 *
	 * @param <object> $params
	 * inc_children
	 * inc_categories
	 * inc_items
	 * @param <array> $selection
	 * @param <string> $assignment
	 *
	 * @return <bool>
	 */
	function passCategories_FC(&$main, &$params, $selection = array(), $assignment = 'all', $article = 0)
	{
		if ($main->_params->option != 'com_flexicontent') {
			return ($assignment == 'exclude');
		}

		$pass = (
			($params->inc_categories && $main->_params->view == 'category')
				|| ($params->inc_items && $main->_params->view == 'items')
		);

		if (!$pass) {
			return ($assignment == 'exclude');
		}

		$selection = $main->makeArray($selection);

		if ($article && isset($article->catid)) {
			$cats = $article->catid;
		} else {
			switch ($main->_params->view) {
				case 'category':
					$cats = $main->_params->id;
					break;
				case 'items':
				default:
					$query = 'SELECT catid'
						.' FROM #__flexicontent_cats_item_relations'
						.' WHERE itemid = '.(int) $main->_params->id;
					$main->_db->setQuery($query);
					$cats = $main->_db->loadResultArray();
					break;
			}
		}
		$cats = $main->makeArray($cats, 1);

		$pass = $main->passSimple($cats, $selection, 'include');

		if ($pass && $params->inc_children == 2) {
			return ($assignment == 'exclude');
		} else if (!$pass && $params->inc_children) {
			foreach ($cats as $cat) {
				$cats = array_merge($cats, NNFrameworkAssignmentsFlexiContent::getCatParentIds($main, $cat));
			}
		}

		return $main->passSimple($cats, $selection, $assignment);
	}

	/**
	 * passTags_FC
	 *
	 * @param <object> $params
	 * @param <array> $selection
	 * @param <string> $assignment
	 *
	 * @return <bool>
	 */
	function passTags_FC(&$main, &$params, $selection = array(), $assignment = 'all')
	{
		if ($main->_params->option != 'com_flexicontent') {
			return ($assignment == 'exclude');
		}

		$pass = (
			($params->inc_tags && $main->_params->view == 'tags')
				|| ($params->inc_items && $main->_params->view == 'items')
		);

		if (!$pass) {
			return ($assignment == 'exclude');
		}

		$selection = $main->makeArray($selection);

		if ($params->inc_tags && $main->_params->view == 'tags') {
			$tag_id = trim(JRequest::getInt('id'));
			$query = 'SELECT t.name'
				.' FROM #__flexicontent_tags as t'
				.' WHERE t.id = '.$tag_id
				.' AND t.published = 1';
			$main->_db->setQuery($query);
			$tag = $main->_db->loadResult();
			$tags = array($tag);
		} else {
			$article_id = (int) $main->_params->id;
			$query = 'SELECT t.name'
				.' FROM #__flexicontent_tags_item_relations as x'
				.' LEFT JOIN #__flexicontent_tags as t'
				.' ON t.id = x.tid'
				.' WHERE x.itemid = '.$article_id
				.' AND t.published = 1';
			$main->_db->setQuery($query);
			$tags = $main->_db->loadResultArray();
		}

		return $main->passSimple($tags, $selection, $assignment, 1);
	}

	/**
	 * passTypes_FC
	 *
	 * @param <object> $params
	 * @param <array> $selection
	 * @param <string> $assignment
	 *
	 * @return <bool>
	 */
	function passTypes_FC(&$main, &$params, $selection = array(), $assignment = 'all')
	{
		if ($main->_params->option != 'com_flexicontent') {
			return ($assignment == 'exclude');
		}

		$pass = ($main->_params->view == 'items');

		if (!$pass) {
			return ($assignment == 'exclude');
		}

		$selection = $main->makeArray($selection);

		$article_id = (int) $main->_params->id;
		$query = 'SELECT x.type_id'
			.' FROM #__flexicontent_items_ext as x'
			.' WHERE x.item_id = '.$article_id;

		$main->_db->setQuery($query);
		$type = $main->_db->loadResult();

		$types = $main->makeArray($type, 1);

		return $main->passSimple($types, $selection, $assignment);
	}

	/**
	 * passItems_FC
	 *
	 * @param <object> $params
	 * @param <array> $selection
	 * @param <string> $assignment
	 *
	 * @return <bool>
	 */
	function passItems_FC(&$main, &$params, $selection = array(), $assignment = 'all')
	{
		if (!$main->_params->id || $main->_params->option != 'com_flexicontent' || $main->_params->view != 'items') {
			return ($assignment == 'exclude');
		}

		$selection = $main->makeArray($selection);

		return $main->passSimple(array($main->_params->id), $selection, $assignment);
	}

	function getCatParentIds(&$main, $id = 0)
	{
		return $main->getParentIds($id, 'categories', 'parent_id');
	}
}