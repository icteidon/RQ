<?php
/**
 * @version		$Id: view.html.php 1579 2012-05-09 14:19:31Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class K2ViewLatest extends JView {

	function display($tpl = null) {
		$mainframe = &JFactory::getApplication();
		$params = &K2HelperUtilities::getParams('com_k2');
		$document = &JFactory::getDocument();
		$user = &JFactory::getUser();
		$cache = &JFactory::getCache('com_k2_extended');
		$limit = $params->get('latestItemsLimit');
		$limitstart = JRequest::getInt('limitstart');
		$model = &$this->getModel('itemlist');
		$itemModel = &$this->getModel('item');
		$theme = $params->get('theme');

		if($params->get('source')){
			$categoryIDs = $params->get('categoryIDs');
			if(is_string($categoryIDs) && !empty($categoryIDs)){
				$categoryIDs = array();
				$categoryIDs[]=$params->get('categoryIDs');
			}
			$categories = array();
			JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_k2'.DS.'tables');
			if(is_array($categoryIDs)){
				foreach($categoryIDs as $categoryID){
					$category = & JTable::getInstance('K2Category', 'Table');
					$category->load($categoryID);
					$languageCheck = true;
					if(K2_JVERSION == '16'){
						$accessCheck = in_array($category->access, $user->authorisedLevels());
						if($mainframe->getLanguageFilter()) {
							$languageTag = &JFactory::getLanguage()->getTag();
							$languageCheck = in_array($category->language, array($languageTag, '*'));
						}
					}
					else {
						$accessCheck = $category->access <= $user->get('aid', 0);
					}

					if ($category->published && $accessCheck && $languageCheck) {

						//Merge params
						$cparams = new JParameter($category->params);
						if ($cparams->get('inheritFrom')) {
							$masterCategory = &JTable::getInstance('K2Category', 'Table');
							$masterCategory->load($cparams->get('inheritFrom'));
							$cparams = new JParameter($masterCategory->params);
						}
						$params->merge($cparams);

						//Category image
						$category->image = K2HelperUtilities::getCategoryImage($category->image, $params);

						//Category plugins
						$dispatcher = &JDispatcher::getInstance();
						JPluginHelper::importPlugin('content');
						$category->text = $category->description;
						
                        if(K2_JVERSION=='16')
                        {
                            $dispatcher->trigger('onContentPrepare', array ('com_k2.category', &$category, &$params, $limitstart));
                        }
                        else {
                            $dispatcher->trigger('onPrepareContent', array ( & $category, &$params, $limitstart));
                        }
						$category->description = $category->text;

						//Category K2 plugins
						$category->event->K2CategoryDisplay = '';
						JPluginHelper::importPlugin('k2');
						$results = $dispatcher->trigger('onK2CategoryDisplay', array(&$category, &$params, $limitstart));
						$category->event->K2CategoryDisplay = trim(implode("\n", $results));
						$category->text = $category->description;
						$dispatcher->trigger('onK2PrepareContent', array ( & $category, &$params, $limitstart));
						$category->description = $category->text;

						//Category link
						$link = urldecode(K2HelperRoute::getCategoryRoute($category->id.':'.urlencode($category->alias)));
						$category->link = JRoute::_($link);
						$category->feed = JRoute::_($link.'&format=feed');

						JRequest::setVar('view', 'itemlist');
						JRequest::setVar('task', 'category');
						JRequest::setVar('id', $category->id);
						JRequest::setVar('featured', 1);
						JRequest::setVar('limit', $limit);
						JRequest::setVar('clearFlag', true);

						$category->name = htmlspecialchars($category->name, ENT_QUOTES);
						if($limit){
							$category->items = $model->getData('rdate');

							JRequest::setVar('view', 'latest');
							JRequest::setVar('task', '');

							for ($i = 0; $i < sizeof($category->items); $i++) {

								$hits = $category->items[$i]->hits;
								$category->items[$i]->hits = 0;
								$category->items[$i] = $cache->call(array('K2ModelItem', 'prepareItem'), $category->items[$i], 'latest', '');
								$category->items[$i]->hits = $hits;
								$category->items[$i] = $itemModel->execPlugins($category->items[$i], 'latest', '');

								//Trigger comments counter event
								$dispatcher = &JDispatcher::getInstance();
								JPluginHelper::importPlugin ('k2');
								$results = $dispatcher->trigger('onK2CommentsCounter', array ( & $category->items[$i], &$params, $limitstart));
								$category->items[$i]->event->K2CommentsCounter = trim(implode("\n", $results));

							}
						}
						else {
							$category->items = array();
						}
						$categories[]=$category;
					}


				}
			}
			$source = 'categories';
			$this->assignRef('blocks', $categories);

		} else {

			$usersIDs = $params->get('userIDs');
			if(is_string($usersIDs) && !empty($usersIDs)){
				$usersIDs = array();
				$usersIDs[]=$params->get('userIDs');
			}

			$users = array();
			if(is_array($usersIDs)){
				foreach($usersIDs as $userID){

					$userObject = JFactory::getUser($userID);
					if (!$userObject->block) {

						//User profile
						$userObject->profile = $model->getUserProfile($userID);

						//User image
						$userObject->avatar = K2HelperUtilities::getAvatar($userObject->id, $userObject->email, $params->get('userImageWidth'));

						//User K2 plugins
						$userObject->event->K2UserDisplay = '';
						if (is_object($userObject->profile) && $userObject->profile->id > 0) {
							$dispatcher = &JDispatcher::getInstance();
							JPluginHelper::importPlugin('k2');
							$results = $dispatcher->trigger('onK2UserDisplay', array(&$userObject->profile, &$params, $limitstart));
							$userObject->event->K2UserDisplay = trim(implode("\n", $results));
						}

						$link = K2HelperRoute::getUserRoute($userObject->id);
						$userObject->link = JRoute::_($link);
						$userObject->feed = JRoute::_($link.'&format=feed');
						$userObject->name = htmlspecialchars($userObject->name, ENT_QUOTES);
						if($limit){
							$userObject->items = $model->getAuthorLatest(0,$limit,$userID);

							for ($i = 0; $i < sizeof($userObject->items); $i++) {
								$hits = $userObject->items[$i]->hits;
								$userObject->items[$i]->hits = 0;
								$userObject->items[$i] = $cache->call(array('K2ModelItem', 'prepareItem'), $userObject->items[$i], 'latest', '');
								$userObject->items[$i]->hits = $hits;

								//Plugins
								$userObject->items[$i] = $itemModel->execPlugins($userObject->items[$i], 'latest', '');
									
								//Trigger comments counter event
								$dispatcher = &JDispatcher::getInstance();
								JPluginHelper::importPlugin ('k2');
								$results = $dispatcher->trigger('onK2CommentsCounter', array ( & $userObject->items[$i], &$params, $limitstart));
								$userObject->items[$i]->event->K2CommentsCounter = trim(implode("\n", $results));
							}
						}
						else {
							$userObject->items = array();
						}
						$users[]=$userObject;
					}

				}
			}
			$source = 'users';
			$this->assignRef('blocks', $users);
		}

		// Set menu metadata for Joomla! 1.6/1.7
		if(K2_JVERSION == '16') {
			if ($params->get('menu-meta_description')) {
				$document->setDescription($params->get('menu-meta_description'));
			}
			
			if ($params->get('menu-meta_keywords')) {
				$document->setMetadata('keywords', $params->get('menu-meta_keywords'));
			}
	
			if ($params->get('robots')) {
				$document->setMetadata('robots', $params->get('robots'));
			}
			
			// Menu page display options
			if($params->get('page_heading')) {
				$params->set('page_title', $params->get('page_heading'));
			}
			$params->set('show_page_title', $params->get('show_page_heading'));
		}

		//Look for template files in component folders
		$this->_addPath('template', JPATH_COMPONENT.DS.'templates');
		$this->_addPath('template', JPATH_COMPONENT.DS.'templates'.DS.'default');

		//Look for overrides in template folder (K2 template structure)
		$this->_addPath('template', JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.'com_k2'.DS.'templates');
		$this->_addPath('template', JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.'com_k2'.DS.'templates'.DS.'default');

		//Look for overrides in template folder (Joomla! template structure)
		$this->_addPath('template', JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.'com_k2'.DS.'default');
		$this->_addPath('template', JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.'com_k2');
		
		// Look for specific K2 theme files
		if ($theme) {
			$this->_addPath('template', JPATH_COMPONENT.DS.'templates'.DS.$theme);
			$this->_addPath('template', JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.'com_k2'.DS.'templates'.DS.$theme);
			$this->_addPath('template', JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.'com_k2'.DS.$theme);
		}

		//Assign params
		$this->assignRef('params', $params);
		$this->assignRef('source', $source);

		//Set layout
		$this->setLayout('latest');

		//Display
		parent::display($tpl);
	}

}
