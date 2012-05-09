<?php
/**
* @version 1.0 for Joomla! 1.6
* @copyright (C) 2010 JoomSpirit
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @Author name JoomSpirit 
* @Author website  http://www.joomspirit.com/
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$image_01 = trim( $params->get( 'image_01' ) );
$image_02 = trim( $params->get( 'image_02' ) );
$image_03 = trim( $params->get( 'image_03' ) );
$image_04 = trim( $params->get( 'image_04' ) );
$image_05 = trim( $params->get( 'image_05' ) );
$image_06 = trim( $params->get( 'image_06' ) );
$image_07 = trim( $params->get( 'image_07' ) );
$image_08 = trim( $params->get( 'image_08' ) );
$image_09 = trim( $params->get( 'image_09' ) );
$image_10 = trim( $params->get( 'image_10' ) );

require( JModuleHelper::getLayoutPath( 'mod_supersized' ) );