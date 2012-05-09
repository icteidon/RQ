<?php
/**
 * Module Helper File
 *
 * @package			Better Preview
 * @version			2.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

class modBetterPreview
{
	function modBetterPreview()
	{
		// Load plugin parameters
		require_once JPATH_PLUGINS.'/system/nnframework/helpers/parameters.php';
		$parameters = NNParameters::getInstance();
		$this->params = $parameters->getPluginParams('betterpreview');
	}

	function render()
	{
		if (!isset($this->params->display_link)) {
			return;
		}

		// load the admin language file
		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('mod_betterpreview', JPATH_ADMINISTRATOR, 'en-GB');
		}
		$lang->load('mod_betterpreview', JPATH_ADMINISTRATOR, null, 1);

		JHtml::_('behavior.mootools');

		require_once JPATH_PLUGINS.'/system/nnframework/helpers/versions.php';
		$version = NoNumberVersions::getXMLVersion('betterpreview', 'module', 1, 1);
		$nn_version = NoNumberVersions::getXMLVersion(null, null, null, 1);

		$document = JFactory::getDocument();
		$document->addStyleSheet(JURI::root(true).'/plugins/system/nnframework/css/status.css'.$nn_version);
		$document->addStyleSheet(JURI::base(true).'/modules/mod_betterpreview/betterpreview/css/style.css'.$version);
		$script = "
			window.addEvent( 'domready', function() {
				var betterpreview_preview = $( 'betterpreview' );
				if ( betterpreview_preview ) {
					betterpreview_preview.addEvent( 'mouseenter', betterpreview_resize_tooltip );
					betterpreview_preview.addEvent( 'mouseleave', betterpreview_deresize_tooltip );
				}
			} );
			var betterpreview_timer = 0;
			var betterpreview_resize_tooltip = function() {
				$$( 'div.tool-tip' ).each( function( el ) {
					betterpreview_timer = \$clear( betterpreview_timer );
					el.setStyle( 'max-width', 500 );
				} );
			};
			var betterpreview_deresize_tooltip = function() {
				$$( 'div.tool-tip' ).each( function( el ) {
					betterpreview_timer = ( function(){ el.setStyle( 'max-width', '' ) } ).delay( 100 );
				} );
			};
		";
		$document->addScriptDeclaration($script);

		$text_ini = strtoupper(str_replace(' ', '_', $this->params->icon_text));
		$text = JText::_($text_ini);
		if ($text == $text_ini) {
			$text = JText::_($this->params->icon_text);
		}

		$title = $text;

		$link = $this->getNewLink();
		if ($link->url) {
			$class = 'active';
		} else {
			$class = 'inactive';
		}

		if ($this->params->display_link == 'text') {
			$class = 'no_icon';
		} else if ($this->params->display_link == 'icon') {
			$text = '';
			$class = 'no_text';
		}

		// Translates an internal Joomla URL to a humanly readible URL.
		//$link->url = JRoute::_( $link->url, true );

		if ($this->params->show_tooltip) {
			JHtml::_('behavior.tooltip');
			$class .= ' hasTip';

			$tooltip = ' ::';
			// if title is set
			if ($link->title) {
				$tooltip = htmlspecialchars($link->title, ENT_QUOTES).'::';
			} else if (!$link->url) {
				$tooltip = JText::_('URL').': '.JText::_('BP_HOMEPAGE').'::';
			}

			if ($link->url) {
				$tooltip .= '<span class=\'betterpreview_url\'>'.htmlspecialchars(html_entity_decode($link->url), ENT_QUOTES).'</span>';
			} else {
				$link->url = $this->params->homepage;
				$this->params->show_copy_icon = 0;
			}
			if ($link->menu) {
				$tooltip .= '<br /><br /><strong>'.JText::_('BP_ACTIVE_MENU_ITEM').':</strong> '.$link->menu;
			}
			if (count($link->notice)) {
				$tooltip .= '<br /><br /><strong>'.JText::_('Notice').':</strong>';
				$tooltip .= '<br />'.implode('<br />', $link->notice);
			}
			if ($this->params->show_copy_icon) {
				$tooltip .= '<br /><br /><em>'.JText::_('BP_CLICK_ON_THE_ICON_TO_COPY_URL_TO_CLIPBOARD').'</em>';
			}
			$tooltip .= '<div class=\'ol-textfont\' style=\'text-align:right;padding-top:5px;\'>'.JText::_('BETTER_PREVIEW').'</div>';

			$title = $tooltip;
		}

		$link->tag = '<a href="'.JURI::root().$link->url.'" target="_blank" onfocus="this.blur();" class="nn_status_link"><span class="nn_status_text '.$class.'" title="'.$title.'">'.$text.'</span></a>';

		if ($this->params->show_copy_icon) {
			$link->tag .= '<div id="betterpreview_clip"><img src="'.JURI::base(true).'/modules/mod_betterpreview/betterpreview/images/copy.png" width="12" height="12" /></div>';
			$link->tag .= '<input type="hidden" id="betterpreview_clip_text" value="'.$link->url.'"/>';
		}
		$link->tag = '<span class="betterpreview_status nn_status">'.$link->tag.'</span>';

		echo $link->tag;
	}

	function getNewLink()
	{
		$option = JRequest::getCmd('option');

		$components = $this->params->components;
		if (!is_array($components)) {
			$components = explode(',', $components);
		}
		// if component is disabled for Better Preview, return
		if (in_array($option, $components)) {
			$link = $this->initLink();
			$link->notice[] =
				JText::_('Component').' ('.str_replace('com_', '', $option).'): '.JText::_('Disabled').
					'<br /><em>('.JText::_('BP_SEE_BETTER_PREVIEW_MODULE_SETTINGS').')</em>';
			return $link;
		}

		$id = JRequest::getInt('id');
		if (!$id) {
			$cid = JRequest::getVar('cid', array(0), 'method', 'array');
			$cid = array((int) $cid['0']);
			$id = $cid['0'];
		}

		$view = 'article';
		switch ($option) {
			case 'com_categories':
				$option = 'com_content';
				$view = 'category';
				break;
			case 'com_content':
				$option = 'com_content';
				$view = 'article';
				break;
		}

		if ($option == 'com_menus') {
			// Menu items
			$link = $this->getLinkFromMenu($id);
		} else if ($option == 'com_content') {
			// Content
			$link = $this->getLinkByContent($id, $view);
		} else {
			// Other component
			$link = $this->getLinkFromMenuByComponent($option);
		}
		return $link;
	}

	function initLink()
	{
		$link = new stdClass();
		$link->title = '';
		$link->url = '';
		$link->notice = array();
		$link->menu = '';

		return $link;
	}

	function getMenuItemById($id)
	{
		// if no id is found, return
		if (!$id) {
			return 0;
		}

		$db = JFactory::getDBO();
		$query = 'SELECT id, link, title as name, menutype'
			.' FROM #__menu'
			.' WHERE id = '.(int) $id
			.' LIMIT 1';
		$db->setQuery($query);
		$menuitem = $db->loadObject();

		return $menuitem;
	}

	function getLinkFromMenu($id, $lang = '')
	{
		$link = $this->initLink();

		$menuitem = $this->getMenuItemById($id);

		if (isset($menuitem->link)) {
			$link->url = $menuitem->link;
			if ($link->url) {
				$link->title = JText::_('BP_MENU_ITEM').': '.$menuitem->name;
				$link->url .= '&Itemid='.(int) $menuitem->id;
				$link->menu .= $menuitem->name.' ('.$menuitem->menutype.')';
			}
		}

		if ($lang != '') {
			$link->url .= '&lang='.$lang;
		}

		return $link;
	}

	function getLinkByContent($id, $view = 'article', $lang = '')
	{
		$app = JFactory::getApplication();

		$link = $this->initLink();

		// if no id is found, try to find the selected category in the list view
		if (!$id) {
			$catid = JRequest::getVar('catid', 0);
			if ($view == 'article') {
				$catid = $app->getUserStateFromRequest('com_content.viewcontentcatid', 'catid', $catid, 'int');
			}
			if ($catid) {
				$view = 'category';
				$id = $catid;
			}
		}

		// if no id is found, return
		if (!$id || $id == -1) {
			return $link;
		}

		$db = JFactory::getDBO();
		$jnow = JFactory::getDate();
		$now = $jnow->toMySQL();
		$nullDate = $db->getNullDate();

		// Check if content is published
		if ($view == 'article') {
			$query = 'SELECT a.*,'
				.' cc.title as cattitle,'
				.' cc.published as catpub'
				.' FROM #__content AS a'
				.' LEFT JOIN #__categories AS cc ON cc.id = a.catid'
				.' WHERE a.id = '.(int) $id
				.' LIMIT 1';
			$db->setQuery($query);
			$article = $db->loadObject();

			$link->title = JText::_('Article').': '.$article->title;

			if (!$article->catpub && $article->catid) {
				// Category is NOT_PUBLISHED so return
				$link->notice[] =
					JText::_('URL').' => '.JText::_('Home').
						' ('.JText::_('Category').' '.strtolower(JText::_('BP_NOT_PUBLISHED')).')';
				$link->title = '';
				return $link;
			} else if (!(
				(
					$article->state == 1
						&& ($article->publish_up == $nullDate || $article->publish_up <= $now)
						&& ($article->publish_down == $nullDate || $article->publish_down >= $now)
				)
					|| ($article->state == -1)
			)
			) {
				// Article is NOT_PUBLISHED so try category
				$link->notice[] =
					JText::_('URL').' => '.JText::_('Category').
						' ('.JText::_('Article').' '.strtolower(JText::_('BP_NOT_PUBLISHED')).')';
				$view = 'category';
				$id = $article->catid;
				$link->title = JText::_('Category').': '.$article->cattitle;
			}
		} else if ($view == 'category') {
			$query = 'SELECT cc.*'
				.' FROM #__categories as cc'
				.' WHERE cc.id = '.(int) $id
				.' LIMIT 1';
			$db->setQuery($query);
			$category = $db->loadObject();

			$link->title = JText::_('Category').': '.$category->title;

			if (!$category->published) {
				// Category is NOT_PUBLISHED so return
				$link->notice[] =
					JText::_('URL').' => '.JText::_('Home').
						' ('.JText::_('Category').' '.strtolower(JText::_('BP_NOT_PUBLISHED')).')';
				$link->title = '';
				return $link;
			}
		}

		$query = 'SELECT id, link, title as name, menutype'
			.' FROM #__menu'
			.' WHERE CONCAT( link, "&" ) REGEXP "[^[:alnum:]]option=com_content[^[:alnum:]]"'
			.' AND CONCAT( link, "&" ) REGEXP "[^[:alnum:]]view='.$view.'[^[:alnum:]]"'
			.' AND CONCAT( link, "&" ) REGEXP "[^[:alnum:]]id='.(int) $id.'[^[:digit:]]"'
			.' AND published = 1'
			.' LIMIT 1';
		$db->setQuery($query);
		$menuitem = $db->loadObject();

		if (isset($menuitem->id)) {
			$link->url = $menuitem->link;
			$link->menu .= $menuitem->name.' ('.$menuitem->menutype.')';
			$Itemid = $menuitem->id;
		} else {
			$menu_view = $view;
			$menu_id = $id;
			$Itemid = 0;

			$link->menu .= '<br /><em>'.JText::_('BP_NO_MATCHING_MENU_ITEM_FOUND').'</em>';

			$link->url = 'index.php?option=com_content&view='.$view;
			if ($view != 'article') {
				$layout = ($this->params->list_layout == 'blog') ? 'blog' : 'default';
				$link->url .= '&layout='.$layout;
			}
			$link->url .= '&id='.(int) $id;
		}

		if ($Itemid) {
			$link->url .= '&Itemid='.$Itemid;
		}

		if ($lang != '') {
			$link->url .= '&lang='.$lang;
		}

		return $link;
	}


	function getPublishedParent($catid)
	{
		$db = JFactory::getDBO();

		$item = new stdClass();
		$item->id = $catid;
		$item->published = 0;
		$item->parent = $catid;
		$sql_item = $item;

		while ($sql_item->parent != 0) {
			$query = 'SELECT *'
				.' FROM #__js_res_category'
				.' WHERE id = '.(int) $sql_item->parent
				.' LIMIT 1';
			$db->setQuery($query);
			$sql_item = $db->loadObject();
			unset($sql_item->params);
			if (!$item->published && $sql_item->published) {
				$item = $sql_item;
			}
			if (!$sql_item->published) {
				$item = new stdClass();
				$item->published = 0;
			}
		}
		return $item;
	}

	function getLinkFromMenuByComponent($component)
	{
		$link = $this->initLink();

		// Only check for menuitem on components in both admin and frontend
		$components = $this->getComponentsArray();
		if (in_array($component, $components)) {
			$db = JFactory::getDBO();
			$query = 'SELECT id, link, title as name, menutype'
				.' FROM #__menu'
				.' WHERE link LIKE '.$db->quote('%option='.$component.'%')
				.' AND published = 1'
				.' AND `client_id` = 0'
				.' LIMIT 1';
			$db->setQuery($query);
			$menuitem = $db->loadObject();

			if (isset($menuitem->id)) {
				$query = 'SELECT name'
					.' FROM #__extensions'
					.' WHERE `type` = '.$db->quote('component')
					.' AND ( `element` = '.$db->quote($component).' OR `element` = '.$db->quote('com_'.$component).' )'
					.' LIMIT 1';
				$db->setQuery($query);
				$comp = $db->loadResult();
				$link->title = $comp;
				$link->url = $menuitem->link.'&Itemid='.$menuitem->id;
				$link->menu .= $menuitem->name.' ('.$menuitem->menutype.')';
			} else {
				$link->notice[] = JText::_('BP_NO_MATCHING_MENU_ITEM_FOUND');
			}
		}
		return $link;
	}

	function getComponents($frontend = 1, $admin = 1, $show_content = 0)
	{
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');

		$db = JFactory::getDBO();

		$from = '#__extensions';
		$where = 'type = '.$db->quote('component').' AND enabled = 1';
		$select_id = 'extension_id';
		$select_option = $db->nameQuote('element');

		if (!$frontend && !$admin) {
			$query = 'SELECT '.$select_option.' AS '.$db->nameQuote('option').', name'
				.' FROM '.$from
				.' WHERE '.$where;

			if (!$show_content) {
				$query .= ' AND '.$select_option.' <> "com_content"';
			}
			$query .= ' ORDER BY name';
			$db->setQuery($query);
			return $db->loadObjectList();
		} else {
			if ($frontend) {
				if (!$admin) {
					$query = 'SELECT '.$select_id.' AS id, name, element'
						.' FROM '.$from
						.' WHERE '.$where
						.' ORDER BY ordering, name';
					$db->setQuery($query);
					$component_ids = $db->loadObjectList('id');

					foreach ($component_ids as $id => $component) {
						$name = 'com_'.preg_replace('#^com_#', '', $component->element);
						$path = JPATH_SITE.'/components/'.$name;
						if (JFile::exists($path.'/metadata.xml')) {
							continue;
						}
						$pass = 0;
						if (JFolder::exists($path.'/views')) {
							$views = JFolder::folders($path.'/views');
							foreach ($views as $view) {
								$file = $path.'/views/'.$view.'/tmpl/default.xml';
								if (!JFile::exists($file)) {
									$file = $path.'/views/'.$view.'/metadata.xml';
									if (!JFile::exists($file)) {
										continue;
									}
								}
								$xml = simplexml_load_file($file);
								if (!$xml || (!isset($xml->layout) && !isset($xml->view))) {
									continue;
								}
								$view = isset($xml->layout) ? $xml->layout : $xml->view;
								if (isset($view->attributes()->hidden) && (string) $view->attributes()->hidden == 'true') {
									continue;
								}
								$pass = 1;
								break;
							}
						}

						if (!$pass) {
							unset($component_ids[$id]);
						}
					}
					$component_ids = array_keys($component_ids);
				}
			}

			if ($admin) {
				$query = 'SELECT '.$select_id.' AS id'
					.' FROM '.$from
					.' WHERE '.$where;
				$db->setQuery($query);
				if ($frontend && isset($component_ids)) {
					$component_ids = array_merge($component_ids, $db->loadResultArray());
				} else {
					$component_ids = $db->loadResultArray();
				}
			}

			$component_ids = array_unique($component_ids);
			$query = 'SELECT '.$select_option.' AS '.$db->nameQuote('option').', name'
				.' FROM '.$from
				.' WHERE '.$where;
			if (!empty($component_ids)) {
				$query .= ' AND '.$select_id.' IN ( '.implode(',', $component_ids).' )';
			}
			if (!$show_content) {
				$query .= ' AND '.$select_option.' <> "com_content"';
			}
			$query .= ' ORDER BY name';
			$db->setQuery($query);

			return $db->loadObjectList();
		}
	}

	function getComponentsArray($frontend = 1, $admin = 1, $show_content = 0)
	{
		$comps = $this->getComponents($frontend, $admin, $show_content);
		$components = array();
		foreach ($comps as $component) {
			$components[] = $component->option;
		}
		return $components;
	}
}