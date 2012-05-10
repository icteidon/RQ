<?php
/**
 * @version		$Id: utilities.php 1544 2012-04-17 10:00:44Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class K2HelperUtilities {

	// Get user avatar
	function getAvatar($userID, $email = NULL, $width = 50) {

		jimport('joomla.filesystem.folder');
		jimport('joomla.application.component.model');
		$mainframe = &JFactory::getApplication();
		$params = &K2HelperUtilities::getParams('com_k2');
		
		if(K2_CB && $userID != 'alias') {
			$cbUser = CBuser::getInstance( (int) $userID );
			if(is_object($cbUser))
			{
				$avatar  = $cbUser->getField( 'avatar', null, 'csv', 'none', 'profile');
				return $avatar;
			}
		}

		/*
		 // JomSocial Avatar integration
		 if(JFolder::exists(JPATH_SITE.DS.'components'.DS.'com_community') && $userID>0){
		 $userInfo = &CFactory::getUser($userID);
		 return $userInfo->getThumbAvatar();
		 }
			*/
		
		// Check for placeholder overrides
		if(JFile::exists(JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'images'.DS.'placeholder'.DS.'user.png')) {
			$avatarPath = 'templates/'.$mainframe->getTemplate().'/images/placeholder/user.png';
		}
		else {
			$avatarPath = 'components/com_k2/images/placeholder/user.png';
		}
			
		// Continue with default K2 avatar determination
		if ($userID == 'alias') {
			$avatar = JURI::root(true).'/'.$avatarPath;
		}
		else if ($userID == 0) {
			if ($params->get('gravatar') && !is_null($email)) {
				$avatar = 'http://www.gravatar.com/avatar/'.md5($email).'?s='.$width.'&amp;default='.urlencode(JURI::root().$avatarPath);
			} 
			else {
				$avatar = JURI::root(true).'/'.$avatarPath;
			}
		} 
		else if (is_numeric($userID) && $userID > 0) {
			JModel::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'models');
			$model = &JModel::getInstance('Item', 'K2Model');
			$profile = $model->getUserProfile($userID);
			$avatar = (is_null($profile))?'':$profile->image;
			if ( empty($avatar)) {
				if ($params->get('gravatar') && !is_null($email)) {
					$avatar = 'http://www.gravatar.com/avatar/'.md5($email).'?s='.$width.'&amp;default='.urlencode(JURI::root().$avatarPath);
				} 
				else {
					$avatar = JURI::root(true).'/'.$avatarPath;
				}
			} 
			else {
				$avatar = JURI::root(true).'/media/k2/users/'.$avatar;
			}

		}

		if(!$params->get('userImageDefault') && $avatar == JURI::root(true).'/'.$avatarPath) {
			$avatar='';
		}

		return $avatar;
	}
	
	function getCategoryImage($image, $params) {

		jimport('joomla.filesystem.file');
		$mainframe = &JFactory::getApplication();
		$categoryImage = NULL;
		if (!empty($image)) {
			$categoryImage = JURI::root(true).'/media/k2/categories/'.$image;
		}
		else {
			if ($params->get('catImageDefault')) {
				if(JFile::exists(JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'images'.DS.'placeholder'.DS.'category.png')) {
					$categoryImage = JURI::root(true).'/templates/'.$mainframe->getTemplate().'/images/placeholder/category.png';
				}
				else {
					$categoryImage = JURI::root(true).'/components/com_k2/images/placeholder/category.png';
				}

			}
		}
		return $categoryImage;
	}

	// Word limit
	function wordLimit($str, $limit = 100, $end_char = '&#8230;') {
		if (trim($str) == '') return $str;

		// always strip tags for text
		$str = strip_tags($str);

		$find = array("/\r|\n/","/\t/","/\s\s+/");
		$replace = array(" "," "," ");
		$str = preg_replace($find,$replace,$str);

		preg_match('/\s*(?:\S*\s*){'.(int) $limit.'}/', $str, $matches);
		if (strlen($matches[0]) == strlen($str))
		$end_char = '';
		return rtrim($matches[0]).$end_char;
	}

	// Character limit
	function characterLimit($str, $limit = 150, $end_char = '...') {
		if (trim($str) == '') return $str;

		// always strip tags for text
		$str = strip_tags(trim($str));

		$find = array("/\r|\n/","/\t/","/\s\s+/");
		$replace = array(" "," "," ");
		$str = preg_replace($find,$replace,$str);

		if(strlen($str)>$limit){
			if(function_exists("mb_substr")) {
				$str = mb_substr($str, 0, $limit);
			} else {
				$str = substr($str, 0, $limit);
			}
			return rtrim($str).$end_char;
		} else {
			return $str;
		}

	}

	// Cleanup HTML entities
	function cleanHtml($text){
		return htmlentities($text, ENT_QUOTES, 'UTF-8');
	}

	// Gender
	function writtenBy($gender) {
		if (is_null($gender))
		return JText::_('K2_WRITTEN_BY');
		if ($gender == 'm')
		return JText::_('K2_WRITTEN_BY_MALE');
		if ($gender == 'f')
		return JText::_('K2_WRITTEN_BY_FEMALE');
	}

	function setDefaultImage(&$item, $view, $params = NULL) {
		if ($view == 'item') {
			$image = 'image'.$item->params->get('itemImgSize');
			$item->image = $item->$image;

			switch ($item->params->get('itemImgSize')) {

				case 'XSmall':
					$item->imageWidth = $item->params->get('itemImageXS');
					break;

				case 'Small':
					$item->imageWidth = $item->params->get('itemImageS');
					break;

				case 'Medium':
					$item->imageWidth = $item->params->get('itemImageM');
					break;

				case 'Large':
					$item->imageWidth = $item->params->get('itemImageL');
					break;

				case 'XLarge':
					$item->imageWidth = $item->params->get('itemImageXL');
					break;
			}
		}

		if ($view == 'itemlist') {
			$image = 'image'.$params->get($item->itemGroup.'ImgSize');
			$item->image = $item->$image;

			switch ($params->get($item->itemGroup.'ImgSize')) {

				case 'XSmall':
					$item->imageWidth = $item->params->get('itemImageXS');
					break;

				case 'Small':
					$item->imageWidth = $item->params->get('itemImageS');
					break;

				case 'Medium':
					$item->imageWidth = $item->params->get('itemImageM');
					break;

				case 'Large':
					$item->imageWidth = $item->params->get('itemImageL');
					break;

				case 'XLarge':
					$item->imageWidth = $item->params->get('itemImageXL');
					break;
			}
		}

		if ($view == 'latest') {
			$image = 'image'.$params->get('latestItemImageSize');
			$item->image = $item->$image;

			switch ($params->get('latestItemImageSize')) {

				case 'XSmall':
					$item->imageWidth = $item->params->get('itemImageXS');
					break;

				case 'Small':
					$item->imageWidth = $item->params->get('itemImageS');
					break;

				case 'Medium':
					$item->imageWidth = $item->params->get('itemImageM');
					break;

				case 'Large':
					$item->imageWidth = $item->params->get('itemImageL');
					break;

				case 'XLarge':
					$item->imageWidth = $item->params->get('itemImageXL');
					break;
			}
		}
		
		if ($view == 'relatedByTag' && $params->get('itemRelatedImageSize')) {
			
			$image = 'image'.$params->get('itemRelatedImageSize');
			$item->image = $item->$image;

			switch ($params->get('itemRelatedImageSize')) {

				case 'XSmall':
					$item->imageWidth = $item->params->get('itemImageXS');
					break;

				case 'Small':
					$item->imageWidth = $item->params->get('itemImageS');
					break;

				case 'Medium':
					$item->imageWidth = $item->params->get('itemImageM');
					break;

				case 'Large':
					$item->imageWidth = $item->params->get('itemImageL');
					break;

				case 'XLarge':
					$item->imageWidth = $item->params->get('itemImageXL');
					break;
			}
		}
		
	}
	
	function getParams($option){
		
		if(K2_JVERSION == '16'){
			$app = JFactory::getApplication('site');
    		$params =  & $app->getParams($option);
		}
		else {
			$params = &JComponentHelper::getParams($option);
		}
		return $params;
		
	}

} // End Class
