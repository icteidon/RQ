<?php
/**
 * @version		$Id: view.html.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class K2ViewCategory extends JView
{

	function display($tpl = null)
	{
	
		JRequest::setVar('hidemainmenu', 1);
		$model = & $this->getModel();
		$category = $model->getData();
		if(K2_JVERSION=='15'){
		    JFilterOutput::objectHTMLSafe( $category );
		}
		else {
		    JFilterOutput::objectHTMLSafe( $category, ENT_QUOTES, array('params', 'plugins') );
		}
		if(!$category->id)
			$category->published=1;
		$this->assignRef('row', $category);
		$wysiwyg = & JFactory::getEditor();
		$editor = $wysiwyg->display('description', $category->description, '100%', '250px', '', '', array('pagebreak', 'readmore'));
		$this->assignRef('editor', $editor);
		
		$document = &JFactory::getDocument();
		$js ="
		var K2SitePath = '".JURI::root(true)."/';
		var K2BasePath = '".JURI::base(true)."/';
		";
		$document->addScriptDeclaration($js);
		
		$lists = array ();
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $category->published);
		$lists['access'] = JHTML::_('list.accesslevel', $category);
		$query = 'SELECT ordering AS value, name AS text FROM #__k2_categories ORDER BY ordering';
		$lists['ordering'] = JHTML::_('list.specificordering', $category, $category->id, $query);
		$categories[] = JHTML::_('select.option', '0', JText::_('K2_NONE_ONSELECTLISTS'));
		
		require_once (JPATH_COMPONENT.DS.'models'.DS.'categories.php');
		$categoriesModel = new K2ModelCategories;
		$tree=$categoriesModel->categoriesTree($category, true, false);
		$categories = array_merge($categories,$tree);
		$lists['parent'] = JHTML::_('select.genericlist', $categories, 'parent', 'class="inputbox"', 'value', 'text', $category->parent);
		
		require_once (JPATH_COMPONENT.DS.'models'.DS.'extrafields.php');
		$extraFieldsModel = new K2ModelExtraFields;
		$groups = $extraFieldsModel->getGroups();
		$group [] = JHTML::_ ( 'select.option', '0', JText::_ ( 'K2_NONE_ONSELECTLISTS' ), 'id', 'name' );
		$group = array_merge ( $group, $groups );
		$lists['extraFieldsGroup'] = JHTML::_ ( 'select.genericlist', $group, 'extraFieldsGroup', 'class="inputbox" size="1" ', 'id', 'name', $category->extraFieldsGroup );
	
		if(version_compare( JVERSION, '1.6.0', 'ge' )) {
			$languages = JHTML::_('contentlanguage.existing', true, true);
			$lists['language'] = JHTML::_('select.genericlist', $languages, 'language', '', 'value', 'text', $category->language);
		}
		
		JPluginHelper::importPlugin ( 'k2' );
		$dispatcher = &JDispatcher::getInstance ();
		$K2Plugins=$dispatcher->trigger('onRenderAdminForm', array (&$category, 'category' ) );
		$this->assignRef('K2Plugins', $K2Plugins);
	
	
		$params = & JComponentHelper::getParams('com_k2');
		$this->assignRef('params', $params);
		
		if(version_compare( JVERSION, '1.6.0', 'ge' )){
			jimport('joomla.form.form');
			$form = JForm::getInstance('categoryForm', JPATH_COMPONENT_ADMINISTRATOR.DS.'models'.DS.'category.xml');
			$values = array('params'=>json_decode($category->params));
			$form->bind($values);
			$inheritFrom = (isset($values['params']->inheritFrom))? $values['params']->inheritFrom: 0;
		}
		else {
			$form = new JParameter('', JPATH_COMPONENT_ADMINISTRATOR.DS.'models'.DS.'category.xml');
			$form->loadINI($category->params);
			$inheritFrom = $form->get('inheritFrom');
		}
		$this->assignRef('form', $form);
		
		$categories[0] = JHTML::_('select.option', '0', JText::_('K2_NONE_ONSELECTLISTS'));
		$lists['inheritFrom'] = JHTML::_('select.genericlist', $categories, 'params[inheritFrom]', 'class="inputbox"', 'value', 'text', $inheritFrom);
		
		$this->assignRef('lists', $lists);
		(JRequest::getInt('cid'))? $title = JText::_('K2_EDIT_CATEGORY') : $title = JText::_('K2_ADD_CATEGORY');
		JToolBarHelper::title($title, 'k2.png');
		JToolBarHelper::save();
		JToolBarHelper::custom('saveAndNew','save.png','save_f2.png','K2_SAVE_AND_NEW', false);
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
		
		// ACE ACL integration
		$definedConstants = get_defined_constants();
		if (!empty($definedConstants['ACEACL']) && AceaclApi::authorize('permissions', 'com_aceacl')) {
			$aceAclFlag = true;
		}
		else {
			$aceAclFlag = false;
		}
		$this->assignRef('aceAclFlag', $aceAclFlag);
	
		parent::display($tpl);
	}

}
