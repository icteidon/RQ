-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2012 at 01:00 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rq`
--

-- --------------------------------------------------------

--
-- Table structure for table `rq_advancedmodules`
--

CREATE TABLE `rq_advancedmodules` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`moduleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_advancedmodules`
--

INSERT INTO `rq_advancedmodules` VALUES(1, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"17","match_method":"and","show_ignores":"2","assignto_menuitems":"2","assignto_menuitems_selection":["101"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(17, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"2","assignto_menuitems_selection":["101"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(16, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"0","assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(84, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"1","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["101"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(85, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"84","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["101"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(86, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"86","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["119","120","121","122","123","124","125","151","152","153","154","155","156","157","158","159","160","161","162","163","164","101","106","107","108","109","110","111","112","113","116","115","117","118","137","138","141","142","143","139","140","144","145","146","147","148","149","150","126","127","128","129","130","131","132","133","134","135","136"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(87, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"86","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["101"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(88, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"86","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["101"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(89, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"84","match_method":"and","show_ignores":"2","assignto_menuitems":"2","assignto_menuitems_selection":["101"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(99, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["119","120","121","122","123","124","125","106","112"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(100, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["107","113","126","127","128","129","130","131","132","133","134","135","136"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(101, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["108","116","137","138","141","142","143","139","140"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(102, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["109","117","144","145","146","147","148","149","150"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(103, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["151","152","153","111","115"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');
INSERT INTO `rq_advancedmodules` VALUES(104, '{"hideempty":"0","color":"FFFFFF","mirror_module":"0","mirror_moduleid":"90","match_method":"and","show_ignores":"2","assignto_menuitems":"1","assignto_menuitems_selection":["154","155","156","157","158","159","160","161","162","163","164","110","118"],"assignto_menuitems_inc_children":"0","assignto_menuitems_inc_noitemid":"0","assignto_homepage":"0","assignto_cats":"0","assignto_cats_inc":["inc_cats","inc_arts","x"],"assignto_cats_inc_children":"0","assignto_articles":"0","assignto_articles_selection":"","assignto_articles_keywords":"","assignto_components":"0","assignto_urls":"0","show_url_field_sef":"0","assignto_urls_selection_sef":"","show_url_field":"0","assignto_urls_selection":"","assignto_browsers":"0","assignto_date":"0","assignto_date_publish_up":"0000-00-00 00:00","assignto_date_publish_down":"0000-00-00 00:00","assignto_usergrouplevels":"0","assignto_languages":"0","assignto_templates":"0"}');

-- --------------------------------------------------------

--
-- Table structure for table `rq_assets`
--

CREATE TABLE `rq_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `level` int(10) unsigned NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_asset_name` (`name`),
  KEY `idx_lft_rgt` (`lft`,`rgt`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `rq_assets`
--

INSERT INTO `rq_assets` VALUES(1, 0, 1, 169, 0, 'root.1', 'Root Asset', '{"core.login.site":{"6":1,"2":1},"core.login.admin":{"6":1},"core.login.offline":{"6":1},"core.admin":{"8":1},"core.manage":{"7":1},"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}');
INSERT INTO `rq_assets` VALUES(2, 1, 1, 2, 1, 'com_admin', 'com_admin', '{}');
INSERT INTO `rq_assets` VALUES(3, 1, 3, 6, 1, 'com_banners', 'com_banners', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(4, 1, 7, 8, 1, 'com_cache', 'com_cache', '{"core.admin":{"7":1},"core.manage":{"7":1}}');
INSERT INTO `rq_assets` VALUES(5, 1, 9, 10, 1, 'com_checkin', 'com_checkin', '{"core.admin":{"7":1},"core.manage":{"7":1}}');
INSERT INTO `rq_assets` VALUES(6, 1, 11, 12, 1, 'com_config', 'com_config', '{}');
INSERT INTO `rq_assets` VALUES(7, 1, 13, 16, 1, 'com_contact', 'com_contact', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(8, 1, 17, 120, 1, 'com_content', 'com_content', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(9, 1, 121, 122, 1, 'com_cpanel', 'com_cpanel', '{}');
INSERT INTO `rq_assets` VALUES(10, 1, 123, 124, 1, 'com_installer', 'com_installer', '{"core.admin":[],"core.manage":{"7":0},"core.delete":{"7":0},"core.edit.state":{"7":0}}');
INSERT INTO `rq_assets` VALUES(11, 1, 125, 126, 1, 'com_languages', 'com_languages', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(12, 1, 127, 128, 1, 'com_login', 'com_login', '{}');
INSERT INTO `rq_assets` VALUES(13, 1, 129, 130, 1, 'com_mailto', 'com_mailto', '{}');
INSERT INTO `rq_assets` VALUES(14, 1, 131, 132, 1, 'com_massmail', 'com_massmail', '{}');
INSERT INTO `rq_assets` VALUES(15, 1, 133, 134, 1, 'com_media', 'com_media', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":{"5":1}}');
INSERT INTO `rq_assets` VALUES(16, 1, 135, 136, 1, 'com_menus', 'com_menus', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(17, 1, 137, 138, 1, 'com_messages', 'com_messages', '{"core.admin":{"7":1},"core.manage":{"7":1}}');
INSERT INTO `rq_assets` VALUES(18, 1, 139, 140, 1, 'com_modules', 'com_modules', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(19, 1, 141, 144, 1, 'com_newsfeeds', 'com_newsfeeds', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(20, 1, 145, 146, 1, 'com_plugins', 'com_plugins', '{"core.admin":{"7":1},"core.manage":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(21, 1, 147, 148, 1, 'com_redirect', 'com_redirect', '{"core.admin":{"7":1},"core.manage":[]}');
INSERT INTO `rq_assets` VALUES(22, 1, 149, 150, 1, 'com_search', 'com_search', '{"core.admin":{"7":1},"core.manage":{"6":1}}');
INSERT INTO `rq_assets` VALUES(23, 1, 151, 152, 1, 'com_templates', 'com_templates', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(24, 1, 153, 156, 1, 'com_users', 'com_users', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(25, 1, 157, 160, 1, 'com_weblinks', 'com_weblinks', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(26, 1, 161, 162, 1, 'com_wrapper', 'com_wrapper', '{}');
INSERT INTO `rq_assets` VALUES(27, 8, 18, 21, 2, 'com_content.category.2', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(28, 3, 4, 5, 2, 'com_banners.category.3', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(29, 7, 14, 15, 2, 'com_contact.category.4', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(30, 19, 142, 143, 2, 'com_newsfeeds.category.5', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(31, 25, 158, 159, 2, 'com_weblinks.category.6', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(32, 24, 154, 155, 1, 'com_users.notes.category.7', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(33, 1, 163, 164, 1, 'com_finder', 'com_finder', '{"core.admin":{"7":1},"core.manage":{"6":1}}');
INSERT INTO `rq_assets` VALUES(34, 8, 22, 37, 2, 'com_content.category.8', 'About Us', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(35, 8, 38, 61, 2, 'com_content.category.9', 'Services', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(36, 8, 62, 71, 2, 'com_content.category.10', 'Our Open Innovation Structure', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(37, 8, 72, 87, 2, 'com_content.category.11', 'Projects & Events', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(38, 8, 88, 95, 2, 'com_content.category.12', 'Contact Us', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(39, 8, 96, 119, 2, 'com_content.category.13', 'Job Opportunities', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(40, 27, 19, 20, 3, 'com_content.article.1', 'Underconstruction', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}');
INSERT INTO `rq_assets` VALUES(41, 34, 23, 24, 3, 'com_content.category.14', 'Mission', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(42, 34, 25, 30, 3, 'com_content.category.15', 'Governance', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(43, 42, 26, 27, 4, 'com_content.category.16', 'Organization Chart', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(44, 42, 28, 29, 4, 'com_content.category.17', 'Organizational model 231/2001', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(45, 34, 31, 32, 3, 'com_content.category.18', 'Corporate responsability', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(46, 34, 33, 34, 3, 'com_content.category.19', 'Key Assigments', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(47, 34, 35, 36, 3, 'com_content.category.20', 'Internationalization', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(48, 35, 39, 50, 3, 'com_content.category.21', 'Technology Services', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(49, 48, 40, 41, 4, 'com_content.category.22', 'Technology Scouting', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(50, 48, 42, 43, 4, 'com_content.category.23', 'Technology Brokerage', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(51, 48, 44, 45, 4, 'com_content.category.24', 'Technology Testing', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(52, 48, 46, 47, 4, 'com_content.category.25', 'Market potential assessment and commercial exploitation', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(53, 48, 48, 49, 4, 'com_content.category.26', 'R&D results valorizations and IPR Strategies', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(54, 35, 51, 52, 3, 'com_content.category.27', 'R&D Project Financing', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(55, 35, 55, 56, 3, 'com_content.category.28', 'Innovation Policy Studies', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(56, 35, 57, 58, 3, 'com_content.category.29', 'Training', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(57, 35, 53, 54, 3, 'com_content.category.30', 'Innovation Management', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(58, 35, 59, 60, 3, 'com_content.category.31', 'Technology Incubator Invesment', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(59, 36, 63, 64, 3, 'com_content.category.32', 'Our Network', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(60, 36, 65, 66, 3, 'com_content.category.33', 'Our Partners', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(61, 36, 67, 68, 3, 'com_content.category.34', 'Key Assigments', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(62, 36, 69, 70, 3, 'com_content.category.35', 'Customers', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(63, 37, 73, 74, 3, 'com_content.category.36', 'EU - Funded Projects', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(64, 37, 75, 76, 3, 'com_content.category.37', 'National Projects', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(65, 37, 77, 78, 3, 'com_content.category.38', 'News & Events', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(66, 37, 79, 86, 3, 'com_content.category.39', 'Publications', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(67, 66, 80, 81, 4, 'com_content.category.40', 'Benchamarking studies', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(68, 66, 82, 83, 4, 'com_content.category.41', 'Reference catalogues', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(69, 66, 84, 85, 4, 'com_content.category.42', 'Business models development', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(70, 38, 89, 90, 3, 'com_content.category.43', 'Send us your mail', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(71, 38, 91, 92, 3, 'com_content.category.44', 'Where We are located', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(72, 38, 93, 94, 3, 'com_content.category.45', 'Send us your CV', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(73, 39, 97, 98, 3, 'com_content.category.46', 'Send us your CV', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(74, 39, 99, 118, 3, 'com_content.category.47', 'Recruitment Job Offers', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(75, 74, 100, 109, 4, 'com_content.category.48', 'Careers', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(76, 75, 101, 102, 5, 'com_content.category.49', 'Integration', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(77, 75, 103, 104, 5, 'com_content.category.50', 'Development', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(78, 75, 105, 106, 5, 'com_content.category.51', 'Training', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(79, 75, 107, 108, 5, 'com_content.category.52', 'Mobility', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(80, 74, 110, 117, 4, 'com_content.category.53', 'Specific Roles', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(81, 80, 111, 112, 5, 'com_content.category.54', 'Consultants', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(82, 80, 113, 114, 5, 'com_content.category.55', 'Managers', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(83, 80, 115, 116, 5, 'com_content.category.56', 'Partnerships', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}');
INSERT INTO `rq_assets` VALUES(84, 1, 165, 166, 1, 'com_chronoforms', 'chronoforms', '{}');
INSERT INTO `rq_assets` VALUES(85, 1, 167, 168, 1, 'com_k2', 'k2', '{}');

-- --------------------------------------------------------

--
-- Table structure for table `rq_associations`
--

CREATE TABLE `rq_associations` (
  `id` varchar(50) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.',
  PRIMARY KEY (`context`,`id`),
  KEY `idx_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_associations`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_banners`
--

CREATE TABLE `rq_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `custombannercode` varchar(2048) NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `params` text NOT NULL,
  `own_prefix` tinyint(1) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`),
  KEY `idx_banner_catid` (`catid`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_banners`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_banner_clients`
--

CREATE TABLE `rq_banner_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `idx_own_prefix` (`own_prefix`),
  KEY `idx_metakey_prefix` (`metakey_prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_banner_clients`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_banner_tracks`
--

CREATE TABLE `rq_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  KEY `idx_track_date` (`track_date`),
  KEY `idx_track_type` (`track_type`),
  KEY `idx_banner_id` (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_banner_tracks`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_categories`
--

CREATE TABLE `rq_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`extension`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `rq_categories`
--

INSERT INTO `rq_categories` VALUES(1, 0, 0, 0, 111, 0, '', 'system', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '', 0, '2009-10-18 16:07:09', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(2, 27, 1, 1, 2, 1, 'uncategorised', 'com_content', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:26:37', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(3, 28, 1, 3, 4, 1, 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":"","foobar":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:27:35', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(4, 29, 1, 5, 6, 1, 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:27:57', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(5, 30, 1, 7, 8, 1, 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:15', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(6, 31, 1, 9, 10, 1, 'uncategorised', 'com_weblinks', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:33', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(7, 32, 1, 11, 12, 1, 'uncategorised', 'com_users.notes', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:33', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(8, 34, 1, 13, 28, 1, 'about-us', 'com_content', 'About Us', 'about-us', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-03 10:20:43', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(9, 35, 1, 29, 52, 1, 'services', 'com_content', 'Services', 'services', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-03 10:21:53', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(10, 36, 1, 53, 62, 1, 'our-open-innovation-structure', 'com_content', 'Our Open Innovation Structure', 'our-open-innovation-structure', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-03 10:22:15', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(11, 37, 1, 63, 78, 1, 'projects-events', 'com_content', 'Projects & Events', 'projects-events', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-03 10:22:24', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(12, 38, 1, 79, 86, 1, 'contact-us', 'com_content', 'Contact Us', 'contact-us', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-03 10:22:33', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(13, 39, 1, 87, 110, 1, 'job-opportunities', 'com_content', 'Job Opportunities', 'job-opportunities', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-03 10:22:49', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(14, 41, 8, 14, 15, 2, 'about-us/mission', 'com_content', 'Mission', 'mission', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:08:35', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(15, 42, 8, 16, 21, 2, 'about-us/governance', 'com_content', 'Governance', 'governance', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:08:50', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(16, 43, 15, 17, 18, 3, 'about-us/governance/organization-chart', 'com_content', 'Organization Chart', 'organization-chart', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:09:06', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(17, 44, 15, 19, 20, 3, 'about-us/governance/organizational-model-231-2001', 'com_content', 'Organizational model 231/2001', 'organizational-model-231-2001', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:09:27', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(18, 45, 8, 22, 23, 2, 'about-us/corporate-responsability', 'com_content', 'Corporate responsability', 'corporate-responsability', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:09:47', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(19, 46, 8, 24, 25, 2, 'about-us/key-assigments', 'com_content', 'Key Assigments', 'key-assigments', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:10:04', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(20, 47, 8, 26, 27, 2, 'about-us/internationalization', 'com_content', 'Internationalization', 'internationalization', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:10:20', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(21, 48, 9, 30, 41, 2, 'services/technology-services', 'com_content', 'Technology Services', 'technology-services', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:10:41', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(22, 49, 21, 31, 32, 3, 'services/technology-services/technology-scouting', 'com_content', 'Technology Scouting', 'technology-scouting', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:10:54', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(23, 50, 21, 33, 34, 3, 'services/technology-services/technology-brokerage', 'com_content', 'Technology Brokerage', 'technology-brokerage', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:11:17', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(24, 51, 21, 35, 36, 3, 'services/technology-services/technology-testing', 'com_content', 'Technology Testing', 'technology-testing', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:11:42', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(25, 52, 21, 37, 38, 3, 'services/technology-services/market-potential-assessment-and-commercial-exploitation', 'com_content', 'Market potential assessment and commercial exploitation', 'market-potential-assessment-and-commercial-exploitation', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:13:32', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(26, 53, 21, 39, 40, 3, 'services/technology-services/r-d-results-valorizations-and-ipr-strategies', 'com_content', 'R&D results valorizations and IPR Strategies', 'r-d-results-valorizations-and-ipr-strategies', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:22:54', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(27, 54, 9, 42, 43, 2, 'services/r-d-project-financing', 'com_content', 'R&D Project Financing', 'r-d-project-financing', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:25:11', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(28, 55, 9, 44, 45, 2, 'services/innovation-policy-studies', 'com_content', 'Innovation Policy Studies', 'innovation-policy-studies', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:25:53', 42, '2012-05-08 09:27:41', 0, '*');
INSERT INTO `rq_categories` VALUES(29, 56, 9, 48, 49, 2, 'services/training', 'com_content', 'Training', 'training', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:26:09', 42, '2012-05-08 09:27:59', 0, '*');
INSERT INTO `rq_categories` VALUES(30, 57, 9, 50, 51, 2, 'services/innovation-management', 'com_content', 'Innovation Management', 'innovation-management', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:26:42', 42, '2012-05-08 09:26:48', 0, '*');
INSERT INTO `rq_categories` VALUES(31, 58, 9, 46, 47, 2, 'services/technology-incubator-invesment', 'com_content', 'Technology Incubator Invesment', 'technology-incubator-invesment', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:29:10', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(32, 59, 10, 54, 55, 2, 'our-open-innovation-structure/our-network', 'com_content', 'Our Network', 'our-network', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:38:21', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(33, 60, 10, 56, 57, 2, 'our-open-innovation-structure/our-partners', 'com_content', 'Our Partners', 'our-partners', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:39:27', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(34, 61, 10, 58, 59, 2, 'our-open-innovation-structure/key-assigments', 'com_content', 'Key Assigments', 'key-assigments', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:39:45', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(35, 62, 10, 60, 61, 2, 'our-open-innovation-structure/customers', 'com_content', 'Customers', 'customers', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:40:02', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(36, 63, 11, 64, 65, 2, 'projects-events/eu-funded-projects', 'com_content', 'EU - Funded Projects', 'eu-funded-projects', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:40:30', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(37, 64, 11, 66, 67, 2, 'projects-events/national-projects', 'com_content', 'National Projects', 'national-projects', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:40:46', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(38, 65, 11, 68, 69, 2, 'projects-events/news-events', 'com_content', 'News & Events', 'news-events', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:41:01', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(39, 66, 11, 70, 77, 2, 'projects-events/publications', 'com_content', 'Publications', 'publications', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:41:21', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(40, 67, 39, 71, 72, 3, 'projects-events/publications/benchamarking-studies', 'com_content', 'Benchamarking studies', 'benchamarking-studies', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:41:46', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(41, 68, 39, 73, 74, 3, 'projects-events/publications/reference-catalogues', 'com_content', 'Reference catalogues', 'reference-catalogues', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:42:04', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(42, 69, 39, 75, 76, 3, 'projects-events/publications/business-models-development', 'com_content', 'Business models development', 'business-models-development', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:42:21', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(43, 70, 12, 80, 81, 2, 'contact-us/send-us-your-mail', 'com_content', 'Send us your mail', 'send-us-your-mail', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:42:43', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(44, 71, 12, 82, 83, 2, 'contact-us/where-we-are-located', 'com_content', 'Where We are located', 'where-we-are-located', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:43:07', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(45, 72, 12, 84, 85, 2, 'contact-us/send-us-your-cv', 'com_content', 'Send us your CV', 'send-us-your-cv', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:43:20', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(46, 73, 13, 88, 89, 2, 'job-opportunities/send-us-your-cv', 'com_content', 'Send us your CV', 'send-us-your-cv', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:43:36', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(47, 74, 13, 90, 109, 2, 'job-opportunities/recruitment-job-offers', 'com_content', 'Recruitment Job Offers', 'recruitment-job-offers', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:43:54', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(48, 75, 47, 91, 100, 3, 'job-opportunities/recruitment-job-offers/careers', 'com_content', 'Careers', 'careers', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:44:18', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(49, 76, 48, 92, 93, 4, 'job-opportunities/recruitment-job-offers/careers/integration', 'com_content', 'Integration', 'integration', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:44:33', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(50, 77, 48, 94, 95, 4, 'job-opportunities/recruitment-job-offers/careers/development', 'com_content', 'Development', 'development', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:44:45', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(51, 78, 48, 96, 97, 4, 'job-opportunities/recruitment-job-offers/careers/training', 'com_content', 'Training', 'training', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:45:01', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(52, 79, 48, 98, 99, 4, 'job-opportunities/recruitment-job-offers/careers/mobility', 'com_content', 'Mobility', 'mobility', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:45:15', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(53, 80, 47, 101, 108, 3, 'job-opportunities/recruitment-job-offers/specific-roles', 'com_content', 'Specific Roles', 'specific-roles', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:45:30', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(54, 81, 53, 102, 103, 4, 'job-opportunities/recruitment-job-offers/specific-roles/consultants', 'com_content', 'Consultants', 'consultants', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:45:44', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(55, 82, 53, 104, 105, 4, 'job-opportunities/recruitment-job-offers/specific-roles/managers', 'com_content', 'Managers', 'managers', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:46:24', 0, '0000-00-00 00:00:00', 0, '*');
INSERT INTO `rq_categories` VALUES(56, 83, 53, 106, 107, 4, 'job-opportunities/recruitment-job-offers/specific-roles/partnerships', 'com_content', 'Partnerships', 'partnerships', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 42, '2012-05-08 09:46:51', 0, '0000-00-00 00:00:00', 0, '*');

-- --------------------------------------------------------

--
-- Table structure for table `rq_chronoforms`
--

CREATE TABLE `rq_chronoforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `form_type` tinyint(1) NOT NULL,
  `content` longtext NOT NULL,
  `wizardcode` longtext,
  `events_actions_map` longtext,
  `params` longtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `app` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_chronoforms`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_chronoform_actions`
--

CREATE TABLE `rq_chronoform_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chronoform_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `params` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `content1` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_chronoform_actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_contact_details`
--

CREATE TABLE `rq_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  `sortname1` varchar(255) NOT NULL,
  `sortname2` varchar(255) NOT NULL,
  `sortname3` varchar(255) NOT NULL,
  `language` char(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_contact_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_content`
--

CREATE TABLE `rq_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `title_alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT 'Deprecated in Joomla! 3.0',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(10) unsigned NOT NULL DEFAULT '0',
  `mask` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rq_content`
--

INSERT INTO `rq_content` VALUES(1, 40, 'Underconstruction', 'underconstruction', '', '<p><img src="images/site/under.png" border="0" alt="" style="display: block; margin-left: auto; margin-right: auto;" /></p>', '', 1, 0, 0, 2, '2012-05-03 10:36:27', 42, '', '2012-05-10 09:33:23', 42, 0, '0000-00-00 00:00:00', '2012-05-03 10:36:27', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":null,"urlatext":"","targeta":"","urlb":null,"urlbtext":"","targetb":"","urlc":null,"urlctext":"","targetc":""}', '{"show_title":"0","link_titles":"0","show_intro":"0","show_category":"0","link_category":"0","show_parent_category":"0","link_parent_category":"0","show_author":"0","link_author":"0","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"0","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 3, 0, 0, '', '', 1, 167, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', '');

-- --------------------------------------------------------

--
-- Table structure for table `rq_contenttemplater`
--

CREATE TABLE `rq_contenttemplater` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `params` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_contenttemplater`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_content_frontpage`
--

CREATE TABLE `rq_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_content_frontpage`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_content_rating`
--

CREATE TABLE `rq_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_content_rating`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_core_log_searches`
--

CREATE TABLE `rq_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_core_log_searches`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_extensions`
--

CREATE TABLE `rq_extensions` (
  `extension_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `element` varchar(100) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `client_id` tinyint(3) NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  `access` int(10) unsigned NOT NULL DEFAULT '1',
  `protected` tinyint(3) NOT NULL DEFAULT '0',
  `manifest_cache` text NOT NULL,
  `params` text NOT NULL,
  `custom_data` text NOT NULL,
  `system_data` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`extension_id`),
  KEY `element_clientid` (`element`,`client_id`),
  KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  KEY `extension` (`type`,`element`,`folder`,`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10064 ;

--
-- Dumping data for table `rq_extensions`
--

INSERT INTO `rq_extensions` VALUES(1, 'com_mailto', 'component', 'com_mailto', '', 0, 1, 1, 1, '{"legacy":false,"name":"com_mailto","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MAILTO_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(2, 'com_wrapper', 'component', 'com_wrapper', '', 0, 1, 1, 1, '{"legacy":false,"name":"com_wrapper","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(3, 'com_admin', 'component', 'com_admin', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_admin","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_ADMIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(4, 'com_banners', 'component', 'com_banners', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_banners","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_BANNERS_XML_DESCRIPTION","group":""}', '{"purchase_type":"3","track_impressions":"0","track_clicks":"0","metakey_prefix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(5, 'com_cache', 'component', 'com_cache', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_cache","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CACHE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(6, 'com_categories', 'component', 'com_categories', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_categories","type":"component","creationDate":"December 2007","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(7, 'com_checkin', 'component', 'com_checkin', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_checkin","type":"component","creationDate":"Unknown","author":"Joomla! Project","copyright":"(C) 2005 - 2008 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CHECKIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(8, 'com_contact', 'component', 'com_contact', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_contact","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONTACT_XML_DESCRIPTION","group":""}', '{"show_contact_category":"hide","show_contact_list":"0","presentation_style":"sliders","show_name":"1","show_position":"1","show_email":"0","show_street_address":"1","show_suburb":"1","show_state":"1","show_postcode":"1","show_country":"1","show_telephone":"1","show_mobile":"1","show_fax":"1","show_webpage":"1","show_misc":"1","show_image":"1","image":"","allow_vcard":"0","show_articles":"0","show_profile":"0","show_links":"0","linka_name":"","linkb_name":"","linkc_name":"","linkd_name":"","linke_name":"","contact_icons":"0","icon_address":"","icon_email":"","icon_telephone":"","icon_mobile":"","icon_fax":"","icon_misc":"","show_headings":"1","show_position_headings":"1","show_email_headings":"0","show_telephone_headings":"1","show_mobile_headings":"0","show_fax_headings":"0","allow_vcard_headings":"0","show_suburb_headings":"1","show_state_headings":"1","show_country_headings":"1","show_email_form":"1","show_email_copy":"1","banned_email":"","banned_subject":"","banned_text":"","validate_session":"1","custom_reply":"0","redirect":"","show_category_crumb":"0","metakey":"","metadesc":"","robots":"","author":"","rights":"","xreference":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(9, 'com_cpanel', 'component', 'com_cpanel', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_cpanel","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CPANEL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10, 'com_installer', 'component', 'com_installer', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_installer","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_INSTALLER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(11, 'com_languages', 'component', 'com_languages', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_languages","type":"component","creationDate":"2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_LANGUAGES_XML_DESCRIPTION","group":""}', '{"administrator":"en-GB","site":"en-GB"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(12, 'com_login', 'component', 'com_login', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_login","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(13, 'com_media', 'component', 'com_media', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_media","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MEDIA_XML_DESCRIPTION","group":""}', '{"upload_extensions":"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS","upload_maxsize":"10","file_path":"images","image_path":"images","restrict_uploads":"1","allowed_media_usergroup":"3","check_mime":"1","image_extensions":"bmp,gif,jpg,png","ignore_extensions":"","upload_mime":"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip","upload_mime_illegal":"text\\/html","enable_flash":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(14, 'com_menus', 'component', 'com_menus', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_menus","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MENUS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(15, 'com_messages', 'component', 'com_messages', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_messages","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MESSAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(16, 'com_modules', 'component', 'com_modules', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_modules","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MODULES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(17, 'com_newsfeeds', 'component', 'com_newsfeeds', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_newsfeeds","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"show_feed_image":"1","show_feed_description":"1","show_item_description":"1","feed_word_count":"0","show_headings":"1","show_name":"1","show_articles":"0","show_link":"1","show_description":"1","show_description_image":"1","display_num":"","show_pagination_limit":"1","show_pagination":"1","show_pagination_results":"1","show_cat_items":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(18, 'com_plugins', 'component', 'com_plugins', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_plugins","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_PLUGINS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(19, 'com_search', 'component', 'com_search', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_search","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_SEARCH_XML_DESCRIPTION","group":""}', '{"enabled":"0","show_date":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(20, 'com_templates', 'component', 'com_templates', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_templates","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_TEMPLATES_XML_DESCRIPTION","group":""}', '{"template_positions_display":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(21, 'com_weblinks', 'component', 'com_weblinks', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_weblinks","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_WEBLINKS_XML_DESCRIPTION","group":""}', '{"show_comp_description":"1","comp_description":"","show_link_hits":"1","show_link_description":"1","show_other_cats":"0","show_headings":"0","show_numbers":"0","show_report":"1","count_clicks":"1","target":"0","link_icons":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(22, 'com_content', 'component', 'com_content', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_content","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONTENT_XML_DESCRIPTION","group":""}', '{"article_layout":"_:default","show_title":"1","link_titles":"1","show_intro":"0","show_category":"0","link_category":"0","show_parent_category":"0","link_parent_category":"0","show_author":"0","link_author":"0","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_vote":"0","show_readmore":"0","show_readmore_title":"0","readmore_limit":"100","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_hits":"0","show_noauth":"0","urls_position":"0","show_publishing_options":"1","show_article_options":"1","show_urls_images_frontend":"0","show_urls_images_backend":"1","targeta":0,"targetb":0,"targetc":0,"float_intro":"left","float_fulltext":"left","category_layout":"_:blog","show_category_title":"0","show_description":"0","show_description_image":"0","maxLevel":"1","show_empty_categories":"0","show_no_articles":"1","show_subcat_desc":"1","show_cat_num_articles":"0","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_num_articles_cat":"1","num_leading_articles":"1","num_intro_articles":"4","num_columns":"2","num_links":"4","multi_column_order":"0","show_subcategory_content":"0","show_pagination_limit":"1","filter_field":"hide","show_headings":"1","list_show_date":"0","date_format":"","list_show_hits":"1","list_show_author":"1","orderby_pri":"order","orderby_sec":"rdate","order_date":"published","show_pagination":"2","show_pagination_results":"1","show_feed_link":"1","feed_summary":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(23, 'com_config', 'component', 'com_config', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_config","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONFIG_XML_DESCRIPTION","group":""}', '{"filters":{"1":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"6":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"7":{"filter_type":"NONE","filter_tags":"","filter_attributes":""},"2":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"3":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"4":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"5":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"10":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"12":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"8":{"filter_type":"NONE","filter_tags":"","filter_attributes":""}}}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(24, 'com_redirect', 'component', 'com_redirect', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_redirect","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(25, 'com_users', 'component', 'com_users', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_users","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_USERS_XML_DESCRIPTION","group":""}', '{"allowUserRegistration":"1","new_usertype":"2","useractivation":"1","frontend_userparams":"1","mailSubjectPrefix":"","mailBodySuffix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(27, 'com_finder', 'component', 'com_finder', '', 1, 1, 0, 0, '{"legacy":false,"name":"com_finder","type":"component","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_FINDER_XML_DESCRIPTION","group":""}', '{"show_description":"1","description_length":255,"allow_empty_query":"0","show_url":"1","show_advanced":"1","expand_advanced":"0","show_date_filters":"0","highlight_terms":"1","opensearch_name":"","opensearch_description":"","batch_size":"50","memory_table_limit":30000,"title_multiplier":"1.7","text_multiplier":"0.7","meta_multiplier":"1.2","path_multiplier":"2.0","misc_multiplier":"0.3","stemmer":"snowball"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(28, 'com_joomlaupdate', 'component', 'com_joomlaupdate', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_joomlaupdate","type":"component","creationDate":"February 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.2","description":"COM_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(100, 'PHPMailer', 'library', 'phpmailer', '', 0, 1, 1, 1, '{"legacy":false,"name":"PHPMailer","type":"library","creationDate":"2008","author":"PHPMailer","copyright":"Copyright (C) PHPMailer.","authorEmail":"","authorUrl":"http:\\/\\/phpmailer.codeworxtech.com\\/","version":"2.5.0","description":"LIB_PHPMAILER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(101, 'SimplePie', 'library', 'simplepie', '', 0, 1, 1, 1, '{"legacy":false,"name":"SimplePie","type":"library","creationDate":"2008","author":"SimplePie","copyright":"Copyright (C) 2008 SimplePie","authorEmail":"","authorUrl":"http:\\/\\/simplepie.org\\/","version":"1.0.1","description":"LIB_SIMPLEPIE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(102, 'phputf8', 'library', 'phputf8', '', 0, 1, 1, 1, '{"legacy":false,"name":"phputf8","type":"library","creationDate":"2008","author":"Harry Fuecks","copyright":"Copyright various authors","authorEmail":"","authorUrl":"http:\\/\\/sourceforge.net\\/projects\\/phputf8","version":"2.5.0","description":"LIB_PHPUTF8_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(103, 'Joomla! Web Application Framework', 'library', 'joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"Joomla! Web Application Framework","type":"library","creationDate":"2008","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"2.5.0","description":"LIB_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(200, 'mod_articles_archive', 'module', 'mod_articles_archive', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_archive","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters.\\n\\t\\tAll rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(201, 'mod_articles_latest', 'module', 'mod_articles_latest', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LATEST_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(202, 'mod_articles_popular', 'module', 'mod_articles_popular', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_articles_popular","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(203, 'mod_banners', 'module', 'mod_banners', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_banners","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_BANNERS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(204, 'mod_breadcrumbs', 'module', 'mod_breadcrumbs', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_breadcrumbs","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_BREADCRUMBS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(205, 'mod_custom', 'module', 'mod_custom', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(206, 'mod_feed', 'module', 'mod_feed', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(207, 'mod_footer', 'module', 'mod_footer', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_footer","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FOOTER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(208, 'mod_login', 'module', 'mod_login', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_login","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(209, 'mod_menu', 'module', 'mod_menu', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_menu","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(210, 'mod_articles_news', 'module', 'mod_articles_news', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_articles_news","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(211, 'mod_random_image', 'module', 'mod_random_image', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_random_image","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_RANDOM_IMAGE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(212, 'mod_related_items', 'module', 'mod_related_items', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_related_items","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_RELATED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(213, 'mod_search', 'module', 'mod_search', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_search","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SEARCH_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(214, 'mod_stats', 'module', 'mod_stats', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_stats","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_STATS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(215, 'mod_syndicate', 'module', 'mod_syndicate', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_syndicate","type":"module","creationDate":"May 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SYNDICATE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(216, 'mod_users_latest', 'module', 'mod_users_latest', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_users_latest","type":"module","creationDate":"December 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_USERS_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(217, 'mod_weblinks', 'module', 'mod_weblinks', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_weblinks","type":"module","creationDate":"July 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WEBLINKS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(218, 'mod_whosonline', 'module', 'mod_whosonline', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_whosonline","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WHOSONLINE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(219, 'mod_wrapper', 'module', 'mod_wrapper', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_wrapper","type":"module","creationDate":"October 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(220, 'mod_articles_category', 'module', 'mod_articles_category', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_category","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(221, 'mod_articles_categories', 'module', 'mod_articles_categories', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_categories","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(222, 'mod_languages', 'module', 'mod_languages', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_languages","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LANGUAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(223, 'mod_finder', 'module', 'mod_finder', '', 0, 1, 0, 0, '{"legacy":false,"name":"mod_finder","type":"module","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FINDER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(300, 'mod_custom', 'module', 'mod_custom', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(301, 'mod_feed', 'module', 'mod_feed', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(302, 'mod_latest', 'module', 'mod_latest', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(303, 'mod_logged', 'module', 'mod_logged', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_logged","type":"module","creationDate":"January 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGGED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(304, 'mod_login', 'module', 'mod_login', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_login","type":"module","creationDate":"March 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(305, 'mod_menu', 'module', 'mod_menu', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_menu","type":"module","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(307, 'mod_popular', 'module', 'mod_popular', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_popular","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(308, 'mod_quickicon', 'module', 'mod_quickicon', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_quickicon","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_QUICKICON_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(309, 'mod_status', 'module', 'mod_status', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_status","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_STATUS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(310, 'mod_submenu', 'module', 'mod_submenu', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_submenu","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SUBMENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(311, 'mod_title', 'module', 'mod_title', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_title","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_TITLE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(312, 'mod_toolbar', 'module', 'mod_toolbar', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_toolbar","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_TOOLBAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(313, 'mod_multilangstatus', 'module', 'mod_multilangstatus', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_multilangstatus","type":"module","creationDate":"September 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MULTILANGSTATUS_XML_DESCRIPTION","group":""}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(314, 'mod_version', 'module', 'mod_version', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_version","type":"module","creationDate":"January 2012","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_VERSION_XML_DESCRIPTION","group":""}', '{"format":"short","product":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(400, 'plg_authentication_gmail', 'plugin', 'gmail', 'authentication', 0, 0, 1, 0, '{"legacy":false,"name":"plg_authentication_gmail","type":"plugin","creationDate":"February 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_GMAIL_XML_DESCRIPTION","group":""}', '{"applysuffix":"0","suffix":"","verifypeer":"1","user_blacklist":""}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(401, 'plg_authentication_joomla', 'plugin', 'joomla', 'authentication', 0, 1, 1, 1, '{"legacy":false,"name":"plg_authentication_joomla","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_AUTH_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(402, 'plg_authentication_ldap', 'plugin', 'ldap', 'authentication', 0, 0, 1, 0, '{"legacy":false,"name":"plg_authentication_ldap","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LDAP_XML_DESCRIPTION","group":""}', '{"host":"","port":"389","use_ldapV3":"0","negotiate_tls":"0","no_referrals":"0","auth_method":"bind","base_dn":"","search_string":"","users_dn":"","username":"admin","password":"bobby7","ldap_fullname":"fullName","ldap_email":"mail","ldap_uid":"uid"}', '', '', 0, '0000-00-00 00:00:00', 3, 0);
INSERT INTO `rq_extensions` VALUES(404, 'plg_content_emailcloak', 'plugin', 'emailcloak', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_emailcloak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION","group":""}', '{"mode":"1"}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(405, 'plg_content_geshi', 'plugin', 'geshi', 'content', 0, 0, 1, 0, '{"legacy":false,"name":"plg_content_geshi","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"","authorUrl":"qbnz.com\\/highlighter","version":"2.5.0","description":"PLG_CONTENT_GESHI_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0);
INSERT INTO `rq_extensions` VALUES(406, 'plg_content_loadmodule', 'plugin', 'loadmodule', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_loadmodule","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LOADMODULE_XML_DESCRIPTION","group":""}', '{"style":"xhtml"}', '', '', 0, '2011-09-18 15:22:50', 0, 0);
INSERT INTO `rq_extensions` VALUES(407, 'plg_content_pagebreak', 'plugin', 'pagebreak', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_pagebreak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION","group":""}', '{"title":"1","multipage_toc":"1","showall":"1"}', '', '', 0, '0000-00-00 00:00:00', 4, 0);
INSERT INTO `rq_extensions` VALUES(408, 'plg_content_pagenavigation', 'plugin', 'pagenavigation', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_pagenavigation","type":"plugin","creationDate":"January 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_PAGENAVIGATION_XML_DESCRIPTION","group":""}', '{"position":"1"}', '', '', 0, '0000-00-00 00:00:00', 5, 0);
INSERT INTO `rq_extensions` VALUES(409, 'plg_content_vote', 'plugin', 'vote', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_vote","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_VOTE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0);
INSERT INTO `rq_extensions` VALUES(410, 'plg_editors_codemirror', 'plugin', 'codemirror', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_codemirror","type":"plugin","creationDate":"28 March 2011","author":"Marijn Haverbeke","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"1.0","description":"PLG_CODEMIRROR_XML_DESCRIPTION","group":""}', '{"linenumbers":"0","tabmode":"indent"}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(411, 'plg_editors_none', 'plugin', 'none', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_none","type":"plugin","creationDate":"August 2004","author":"Unknown","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"2.5.0","description":"PLG_NONE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0);
INSERT INTO `rq_extensions` VALUES(412, 'plg_editors_tinymce', 'plugin', 'tinymce', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_tinymce","type":"plugin","creationDate":"2005-2012","author":"Moxiecode Systems AB","copyright":"Moxiecode Systems AB","authorEmail":"N\\/A","authorUrl":"tinymce.moxiecode.com\\/","version":"3.4.9","description":"PLG_TINY_XML_DESCRIPTION","group":""}', '{"mode":"1","skin":"0","compressed":"0","cleanup_startup":"0","cleanup_save":"2","entity_encoding":"raw","lang_mode":"0","lang_code":"en","text_direction":"ltr","content_css":"1","content_css_custom":"","relative_urls":"1","newlines":"0","invalid_elements":"script,applet,iframe","extended_elements":"","toolbar":"top","toolbar_align":"left","html_height":"550","html_width":"750","element_path":"1","fonts":"1","paste":"1","searchreplace":"1","insertdate":"1","format_date":"%Y-%m-%d","inserttime":"1","format_time":"%H:%M:%S","colors":"1","table":"1","smilies":"1","media":"1","hr":"1","directionality":"1","fullscreen":"1","style":"1","layer":"1","xhtmlxtras":"1","visualchars":"1","nonbreaking":"1","template":"1","blockquote":"1","wordcount":"1","advimage":"1","advlink":"1","autosave":"1","contextmenu":"1","inlinepopups":"1","safari":"0","custom_plugin":"","custom_button":""}', '', '', 0, '0000-00-00 00:00:00', 3, 0);
INSERT INTO `rq_extensions` VALUES(413, 'plg_editors-xtd_article', 'plugin', 'article', 'editors-xtd', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors-xtd_article","type":"plugin","creationDate":"October 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_ARTICLE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(414, 'plg_editors-xtd_image', 'plugin', 'image', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_image","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_IMAGE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0);
INSERT INTO `rq_extensions` VALUES(415, 'plg_editors-xtd_pagebreak', 'plugin', 'pagebreak', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_pagebreak","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0);
INSERT INTO `rq_extensions` VALUES(416, 'plg_editors-xtd_readmore', 'plugin', 'readmore', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_readmore","type":"plugin","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_READMORE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0);
INSERT INTO `rq_extensions` VALUES(417, 'plg_search_categories', 'plugin', 'categories', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_categories","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CATEGORIES_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(418, 'plg_search_contacts', 'plugin', 'contacts', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_contacts","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CONTACTS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(419, 'plg_search_content', 'plugin', 'content', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_content","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CONTENT_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(420, 'plg_search_newsfeeds', 'plugin', 'newsfeeds', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_newsfeeds","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(421, 'plg_search_weblinks', 'plugin', 'weblinks', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_weblinks","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_WEBLINKS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(422, 'plg_system_languagefilter', 'plugin', 'languagefilter', 'system', 0, 0, 1, 1, '{"legacy":false,"name":"plg_system_languagefilter","type":"plugin","creationDate":"July 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(423, 'plg_system_p3p', 'plugin', 'p3p', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_p3p","type":"plugin","creationDate":"September 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_P3P_XML_DESCRIPTION","group":""}', '{"headers":"NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"}', '', '', 0, '0000-00-00 00:00:00', 2, 0);
INSERT INTO `rq_extensions` VALUES(424, 'plg_system_cache', 'plugin', 'cache', 'system', 0, 0, 1, 1, '{"legacy":false,"name":"plg_system_cache","type":"plugin","creationDate":"February 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CACHE_XML_DESCRIPTION","group":""}', '{"browsercache":"0","cachetime":"15"}', '', '', 0, '0000-00-00 00:00:00', 9, 0);
INSERT INTO `rq_extensions` VALUES(425, 'plg_system_debug', 'plugin', 'debug', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_debug","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_DEBUG_XML_DESCRIPTION","group":""}', '{"profile":"1","queries":"1","memory":"1","language_files":"1","language_strings":"1","strip-first":"1","strip-prefix":"","strip-suffix":""}', '', '', 0, '0000-00-00 00:00:00', 4, 0);
INSERT INTO `rq_extensions` VALUES(426, 'plg_system_log', 'plugin', 'log', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_log","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LOG_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0);
INSERT INTO `rq_extensions` VALUES(427, 'plg_system_redirect', 'plugin', 'redirect', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_redirect","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0);
INSERT INTO `rq_extensions` VALUES(428, 'plg_system_remember', 'plugin', 'remember', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_remember","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_REMEMBER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0);
INSERT INTO `rq_extensions` VALUES(429, 'plg_system_sef', 'plugin', 'sef', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_sef","type":"plugin","creationDate":"December 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEF_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 8, 0);
INSERT INTO `rq_extensions` VALUES(430, 'plg_system_logout', 'plugin', 'logout', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_logout","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0);
INSERT INTO `rq_extensions` VALUES(431, 'plg_user_contactcreator', 'plugin', 'contactcreator', 'user', 0, 0, 1, 1, '{"legacy":false,"name":"plg_user_contactcreator","type":"plugin","creationDate":"August 2009","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTACTCREATOR_XML_DESCRIPTION","group":""}', '{"autowebpage":"","category":"34","autopublish":"0"}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(432, 'plg_user_joomla', 'plugin', 'joomla', 'user', 0, 1, 1, 0, '{"legacy":false,"name":"plg_user_joomla","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2009 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_USER_JOOMLA_XML_DESCRIPTION","group":""}', '{"autoregister":"1"}', '', '', 0, '0000-00-00 00:00:00', 2, 0);
INSERT INTO `rq_extensions` VALUES(433, 'plg_user_profile', 'plugin', 'profile', 'user', 0, 0, 1, 1, '{"legacy":false,"name":"plg_user_profile","type":"plugin","creationDate":"January 2008","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_USER_PROFILE_XML_DESCRIPTION","group":""}', '{"register-require_address1":"1","register-require_address2":"1","register-require_city":"1","register-require_region":"1","register-require_country":"1","register-require_postal_code":"1","register-require_phone":"1","register-require_website":"1","register-require_favoritebook":"1","register-require_aboutme":"1","register-require_tos":"1","register-require_dob":"1","profile-require_address1":"1","profile-require_address2":"1","profile-require_city":"1","profile-require_region":"1","profile-require_country":"1","profile-require_postal_code":"1","profile-require_phone":"1","profile-require_website":"1","profile-require_favoritebook":"1","profile-require_aboutme":"1","profile-require_tos":"1","profile-require_dob":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(434, 'plg_extension_joomla', 'plugin', 'joomla', 'extension', 0, 1, 1, 1, '{"legacy":false,"name":"plg_extension_joomla","type":"plugin","creationDate":"May 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(435, 'plg_content_joomla', 'plugin', 'joomla', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_joomla","type":"plugin","creationDate":"November 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(436, 'plg_system_languagecode', 'plugin', 'languagecode', 'system', 0, 0, 1, 0, '{"legacy":false,"name":"plg_system_languagecode","type":"plugin","creationDate":"November 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 10, 0);
INSERT INTO `rq_extensions` VALUES(437, 'plg_quickicon_joomlaupdate', 'plugin', 'joomlaupdate', 'quickicon', 0, 1, 1, 1, '{"legacy":false,"name":"plg_quickicon_joomlaupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(438, 'plg_quickicon_extensionupdate', 'plugin', 'extensionupdate', 'quickicon', 0, 1, 1, 1, '{"legacy":false,"name":"plg_quickicon_extensionupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(439, 'plg_captcha_recaptcha', 'plugin', 'recaptcha', 'captcha', 0, 1, 1, 0, '{"legacy":false,"name":"plg_captcha_recaptcha","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION","group":""}', '{"public_key":"","private_key":"","theme":"clean"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(440, 'plg_system_highlight', 'plugin', 'highlight', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_highlight","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0);
INSERT INTO `rq_extensions` VALUES(441, 'plg_content_finder', 'plugin', 'finder', 'content', 0, 0, 1, 0, '{"legacy":false,"name":"plg_content_finder","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_FINDER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(442, 'plg_finder_categories', 'plugin', 'categories', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_categories","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CATEGORIES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0);
INSERT INTO `rq_extensions` VALUES(443, 'plg_finder_contacts', 'plugin', 'contacts', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_contacts","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CONTACTS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0);
INSERT INTO `rq_extensions` VALUES(444, 'plg_finder_content', 'plugin', 'content', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_content","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CONTENT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0);
INSERT INTO `rq_extensions` VALUES(445, 'plg_finder_newsfeeds', 'plugin', 'newsfeeds', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_newsfeeds","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0);
INSERT INTO `rq_extensions` VALUES(446, 'plg_finder_weblinks', 'plugin', 'weblinks', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_weblinks","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_WEBLINKS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0);
INSERT INTO `rq_extensions` VALUES(500, 'atomic', 'template', 'atomic', '', 0, 1, 1, 0, '{"legacy":false,"name":"atomic","type":"template","creationDate":"10\\/10\\/09","author":"Ron Severdia","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"contact@kontentdesign.com","authorUrl":"http:\\/\\/www.kontentdesign.com","version":"2.5.0","description":"TPL_ATOMIC_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(502, 'bluestork', 'template', 'bluestork', '', 1, 1, 1, 0, '{"legacy":false,"name":"bluestork","type":"template","creationDate":"07\\/02\\/09","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"TPL_BLUESTORK_XML_DESCRIPTION","group":""}', '{"useRoundedCorners":"1","showSiteName":"0","textBig":"0","highContrast":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(503, 'beez_20', 'template', 'beez_20', '', 0, 1, 1, 0, '{"legacy":false,"name":"beez_20","type":"template","creationDate":"25 November 2009","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"2.5.0","description":"TPL_BEEZ2_XML_DESCRIPTION","group":""}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","templatecolor":"nature"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(504, 'hathor', 'template', 'hathor', '', 1, 1, 1, 0, '{"legacy":false,"name":"hathor","type":"template","creationDate":"May 2010","author":"Andrea Tarr","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"hathor@tarrconsulting.com","authorUrl":"http:\\/\\/www.tarrconsulting.com","version":"2.5.0","description":"TPL_HATHOR_XML_DESCRIPTION","group":""}', '{"showSiteName":"0","colourChoice":"0","boldText":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(505, 'beez5', 'template', 'beez5', '', 0, 1, 1, 0, '{"legacy":false,"name":"beez5","type":"template","creationDate":"21 May 2010","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"2.5.0","description":"TPL_BEEZ5_XML_DESCRIPTION","group":""}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","html5":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(600, 'English (United Kingdom)', 'language', 'en-GB', '', 0, 1, 1, 1, '{"legacy":false,"name":"English (United Kingdom)","type":"language","creationDate":"2008-03-15","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"en-GB site language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(601, 'English (United Kingdom)', 'language', 'en-GB', '', 1, 1, 1, 1, '{"legacy":false,"name":"English (United Kingdom)","type":"language","creationDate":"2008-03-15","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"en-GB administrator language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(700, 'files_joomla', 'file', 'joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"files_joomla","type":"file","creationDate":"April 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2012 Open Source Matters. All rights reserved","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.4","description":"FILES_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(800, 'PKG_JOOMLA', 'package', 'pkg_joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"PKG_JOOMLA","type":"package","creationDate":"2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"2.5.0","description":"PKG_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10000, 'COM_NONUMBERMANAGER', 'component', 'com_nonumbermanager', '', 1, 1, 0, 0, '{"legacy":false,"name":"COM_NONUMBERMANAGER","type":"component","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.1FREE","description":"COM_NONUMBERMANAGER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10002, 'MOD_ADDTOMENU', 'module', 'mod_addtomenu', '', 1, 1, 2, 0, '{"legacy":true,"name":"MOD_ADDTOMENU","type":"module","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.2.0FREE","description":"MOD_ADDTOMENU_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10004, 'PLG_SYSTEM_ADMINBARDOCKER', 'plugin', 'adminbardocker', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_ADMINBARDOCKER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_ADMINBARDOCKER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10006, 'PLG_SYSTEM_ARTICLESANYWHERE', 'plugin', 'articlesanywhere', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_ARTICLESANYWHERE","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_ARTICLESANYWHERE_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10007, 'PLG_EDITORS-XTD_ARTICLESANYWHERE', 'plugin', 'articlesanywhere', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_EDITORS-XTD_ARTICLESANYWHERE","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_EDITORS-XTD_ARTICLESANYWHERE_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10009, 'PLG_SYSTEM_BETTERPREVIEW', 'plugin', 'betterpreview', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_BETTERPREVIEW","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_BETTERPREVIEW_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10010, 'MOD_BETTERPREVIEW', 'module', 'mod_betterpreview', '', 1, 1, 1, 0, '{"legacy":true,"name":"MOD_BETTERPREVIEW","type":"module","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"MOD_BETTERPREVIEW_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10012, 'PLG_SYSTEM_CACHECLEANER', 'plugin', 'cachecleaner', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_CACHECLEANER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_CACHECLEANER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10013, 'MOD_CACHECLEANER', 'module', 'mod_cachecleaner', '', 1, 1, 1, 0, '{"legacy":true,"name":"MOD_CACHECLEANER","type":"module","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"MOD_CACHECLEANER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10015, 'COM_CONTENTTEMPLATER', 'component', 'com_contenttemplater', '', 1, 1, 0, 0, '{"legacy":false,"name":"COM_CONTENTTEMPLATER","type":"component","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"COM_CONTENTTEMPLATER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10016, 'PLG_SYSTEM_CONTENTTEMPLATER', 'plugin', 'contenttemplater', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_CONTENTTEMPLATER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"PLG_SYSTEM_CONTENTTEMPLATER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10017, 'PLG_EDITORS-XTD_CONTENTTEMPLATER', 'plugin', 'contenttemplater', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_EDITORS-XTD_CONTENTTEMPLATER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"PLG_EDITORS-XTD_CONTENTTEMPLATER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10019, 'PLG_SYSTEM_MODALIZER', 'plugin', 'modalizer', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_MODALIZER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"PLG_SYSTEM_MODALIZER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10021, 'PLG_SYSTEM_MODULESANYWHERE', 'plugin', 'modulesanywhere', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_MODULESANYWHERE","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_MODULESANYWHERE_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10022, 'PLG_EDITORS-XTD_MODULESANYWHERE', 'plugin', 'modulesanywhere', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_EDITORS-XTD_MODULESANYWHERE","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_EDITORS-XTD_MODULESANYWHERE_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10024, 'COM_REREPLACER', 'component', 'com_rereplacer', '', 1, 1, 0, 0, '{"legacy":false,"name":"COM_REREPLACER","type":"component","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"4.1.0FREE","description":"COM_REREPLACER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10025, 'PLG_SYSTEM_REREPLACER', 'plugin', 'rereplacer', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_REREPLACER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"4.1.0FREE","description":"PLG_SYSTEM_REREPLACER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10027, 'PLG_SYSTEM_SLIDER', 'plugin', 'slider', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_SLIDER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_SLIDER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10028, 'PLG_EDITORS-XTD_SLIDER', 'plugin', 'slider', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_EDITORS-XTD_SLIDER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_EDITORS-XTD_SLIDER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10030, 'COM_SNIPPETS', 'component', 'com_snippets', '', 1, 1, 0, 0, '{"legacy":false,"name":"COM_SNIPPETS","type":"component","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.1FREE","description":"COM_SNIPPETS_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10031, 'PLG_SYSTEM_SNIPPETS', 'plugin', 'snippets', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_SNIPPETS","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.1FREE","description":"PLG_SYSTEM_SNIPPETS_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10032, 'PLG_EDITORS-XTD_SNIPPETS', 'plugin', 'snippets', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_EDITORS-XTD_SNIPPETS","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.1FREE","description":"PLG_EDITORS-XTD_SNIPPETS_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10034, 'PLG_SYSTEM_SOURCERER', 'plugin', 'sourcerer', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_SOURCERER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"PLG_SYSTEM_SOURCERER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10035, 'Button - Sourcerer', 'plugin', 'sourcerer', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"Button - Sourcerer","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"PLG_EDITORS-XTD_SOURCERER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10037, 'PLG_SYSTEM_TABBER', 'plugin', 'tabber', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_TABBER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_TABBER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10038, 'PLG_EDITORS-XTD_TABBER', 'plugin', 'tabber', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_EDITORS-XTD_TABBER","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_EDITORS-XTD_TABBER_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10040, 'PLG_SYSTEM_TOOLTIPS', 'plugin', 'tooltips', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_TOOLTIPS","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_SYSTEM_TOOLTIPS_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10041, 'PLG_EDITORS-XTD_TOOLTIPS', 'plugin', 'tooltips', 'editors-xtd', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_EDITORS-XTD_TOOLTIPS","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"2.1.0FREE","description":"PLG_EDITORS-XTD_TOOLTIPS_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10043, 'COM_ADVANCEDMODULES', 'component', 'com_advancedmodules', '', 1, 1, 0, 0, '{"legacy":false,"name":"COM_ADVANCEDMODULES","type":"component","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"COM_ADVANCEDMODULES_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10044, 'PLG_SYSTEM_ADVANCEDMODULES', 'plugin', 'advancedmodules', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_ADVANCEDMODULES","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"3.1.0FREE","description":"PLG_SYSTEM_ADVANCEDMODULES_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10045, 'PLG_SYSTEM_NNFRAMEWORK', 'plugin', 'nnframework', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"PLG_SYSTEM_NNFRAMEWORK","type":"plugin","creationDate":"May 2012","author":"NoNumber (Peter van Westen)","copyright":"Copyright \\u00a9 2012 NoNumber All Rights Reserved","authorEmail":"peter@nonumber.nl","authorUrl":"http:\\/\\/www.nonumber.nl","version":"12.5.1","description":"PLG_SYSTEM_NNFRAMEWORK_DESC","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10046, 'full_screen_2', 'template', 'full_screen_2', '', 0, 1, 1, 0, '{"legacy":true,"name":"full_screen_2","type":"template","creationDate":"15\\/09\\/2010","author":"JoomSpirit","copyright":"Copyright 2010 JoomSpirit","authorEmail":"contact@joomspirit.com","authorUrl":"http:\\/\\/www.joomspirit.com","version":"1.0","description":"<h2>IMPORTANT : Read the settings for this template<\\/h2>\\n\\t<h3>\\n\\t<span style=\\"font-weight:bold;color:red;\\">All informations is in your zip template in \\"help\\" directory : you must just open the manual.html<\\/span> <br \\/>\\n\\tYou will find in <span style=\\"color:blue;\\">how to configure the template, use the typography, the module positions for your modules, how to display tooltips, or another mootools effect of this template.<\\/span> <br \\/>\\n\\t<\\/h3>\\n\\t","group":""}', '{"width":"95%","width_content":"980px","width_left":"200px","width_right":"200px","user1_width":"30%","user3_width":"30%","user4_width":"30%","user6_width":"30%","height_container":"500","separator":"60","color_link":"#336699","font":"Yanone+Kaffeesatz:200","font_content":"Trebuchet ms","fontSize":"12px","one_slide":"1","slide_interval":"8000","slide_transition":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10047, 'supersized', 'module', 'mod_supersized', '', 0, 1, 0, 0, '{"legacy":false,"name":"supersized","type":"module","creationDate":"august 2010","author":"JoomSpirit","copyright":"JoomSpirit","authorEmail":"contact@joomspirit.com","authorUrl":"http:\\/\\/www.joomspirit.com","version":"1.0","description":"Module for display Supersized slideshow. Work only with the appropriate JoomSpirit template.","group":""}', '{"image_01":"","image_02":"","image_03":"","image_04":"","image_05":"","image_06":"","image_07":"","image_08":"","image_09":"","image_10":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10048, 'chronoforms', 'component', 'com_chronoforms', '', 1, 1, 0, 0, '{"legacy":false,"name":"ChronoForms","type":"component","creationDate":"6.April.2012","author":"Chronoman","copyright":"ChronoEngine.com 2011","authorEmail":"webmaster@chronoengine.com","authorUrl":"www.chronoengine.com","version":"4.0 RC3.3","description":"Create everytype of Forms with whatever features you like!!","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10049, 'ChronoForms', 'module', 'mod_chronoforms', '', 0, 1, 0, 0, '{"legacy":false,"name":"ChronoForms","type":"module","creationDate":"26 Dec 2011","author":"ChronoEngine.com","copyright":"Copyright (C) 2006 - 2011 ChronoEngine.com. All rights reserved.","authorEmail":"webmaster@chronoengine.com","authorUrl":"www.chronoengine.com","version":"V4 RC3.0","description":"Show a Chronoform, works on J1.6 and with ChronoForms V4","group":""}', '{"cache":"0","chronoform":"","moduleclass_sfx":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10050, 'chronoforms', 'plugin', 'chronoforms', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"chronoforms","type":"plugin","creationDate":"26 Dec 2011","author":"ChronoEngine.com","copyright":"(C) ChronoEngine.com","authorEmail":"webmaster@chronoengine.com","authorUrl":"www.chronoengine.com","version":"V4 RC3.0","description":"\\n\\tThis plugin must have ChronoForms component in order for it to work.\\n\\tYou just need to put the name of the form you want to show between : {chronoforms}&{\\/chronoforms}, Example: {chronoforms}form1{\\/chronoforms} where form1 is the form name which will be displayed!!\\n\\t","group":""}', '{"after_text_forms":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10051, 'K2 Comments', 'module', 'mod_k2_comments', '', 0, 1, 0, 0, '{"legacy":true,"name":"K2 Comments","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"MOD_K2_COMMENTS_DESCRIPTION","group":""}', '{"moduleclass_sfx":"","module_usage":"","":"K2_TOP_COMMENTERS","catfilter":"0","category_id":"","comments_limit":"5","comments_word_limit":"10","commenterName":"1","commentAvatar":"1","commentAvatarWidthSelect":"custom","commentAvatarWidth":"50","commentDate":"1","commentDateFormat":"absolute","commentLink":"1","itemTitle":"1","itemCategory":"1","feed":"1","commenters_limit":"5","commenterNameOrUsername":"1","commenterAvatar":"1","commenterAvatarWidthSelect":"custom","commenterAvatarWidth":"50","commenterLink":"1","commenterCommentsCounter":"1","commenterLatestComment":"1","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10052, 'K2 Content', 'module', 'mod_k2_content', '', 0, 1, 0, 0, '{"legacy":true,"name":"K2 Content","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_MOD_K2_CONTENT_DESCRIPTION","group":""}', '{"moduleclass_sfx":"","getTemplate":"Default","source":"filter","":"K2_OTHER_OPTIONS","catfilter":"0","category_id":"","getChildren":"0","itemCount":"5","itemsOrdering":"","FeaturedItems":"1","popularityRange":"","videosOnly":"0","item":"","items":"","itemTitle":"1","itemAuthor":"1","itemAuthorAvatar":"1","itemAuthorAvatarWidthSelect":"custom","itemAuthorAvatarWidth":"50","userDescription":"1","itemIntroText":"1","itemIntroTextWordLimit":"","itemImage":"1","itemImgSize":"Small","itemVideo":"1","itemVideoCaption":"1","itemVideoCredits":"1","itemAttachments":"1","itemTags":"1","itemCategory":"1","itemDateCreated":"1","itemHits":"1","itemReadMore":"1","itemExtraFields":"0","itemCommentsCounter":"1","feed":"1","itemPreText":"","itemCustomLink":"0","itemCustomLinkTitle":"","itemCustomLinkURL":"http:\\/\\/","itemCustomLinkMenuItem":"","K2Plugins":"1","JPlugins":"1","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10053, 'K2 Login', 'module', 'mod_k2_login', '', 0, 1, 0, 0, '{"legacy":true,"name":"K2 Login","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_LOGIN_DESCRIPTION","group":""}', '{"moduleclass_sfx":"","pretext":"","":"K2_LOGIN_LOGOUT_REDIRECTION","name":"1","userAvatar":"1","userAvatarWidthSelect":"custom","userAvatarWidth":"50","menu":"","login":"","logout":"","usesecure":"0","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10054, 'K2 Tools', 'module', 'mod_k2_tools', '', 0, 1, 0, 0, '{"legacy":true,"name":"K2 Tools","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_TOOLS","group":""}', '{"moduleclass_sfx":"","module_usage":"0","":"K2_CUSTOM_CODE_SETTINGS","archiveItemsCounter":"1","archiveCategory":"","authors_module_category":"","authorItemsCounter":"1","authorAvatar":"1","authorAvatarWidthSelect":"custom","authorAvatarWidth":"50","authorLatestItem":"1","calendarCategory":"","home":"","seperator":"","root_id":"","end_level":"","categoriesListOrdering":"","categoriesListItemsCounter":"1","root_id2":"","catfilter":"0","category_id":"","getChildren":"0","liveSearch":"","width":"20","text":"","button":"","imagebutton":"","button_text":"","min_size":"75","max_size":"300","cloud_limit":"30","cloud_category":"0","cloud_category_recursive":"0","customCode":"","parsePhp":"0","K2Plugins":"0","JPlugins":"0","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10055, 'K2 Users', 'module', 'mod_k2_users', '', 0, 1, 0, 0, '{"legacy":true,"name":"K2 Users","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_MOD_K2_USERS_DESCRTIPTION","group":""}', '{"moduleclass_sfx":"","getTemplate":"Default","source":"0","":"K2_DISPLAY_OPTIONS","filter":"1","K2UserGroup":"","ordering":"1","limit":"4","userIDs":"","userName":"1","userAvatar":"1","userAvatarWidthSelect":"custom","userAvatarWidth":"50","userDescription":"1","userDescriptionWordLimit":"","userURL":"1","userEmail":"0","userFeed":"1","userItemCount":"1","cache":"1","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10056, 'K2 User', 'module', 'mod_k2_user', '', 0, 1, 0, 0, '{"legacy":true,"name":"K2 User","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_MOD_K2_USER_DESCRIPTION","group":""}', '{"moduleclass_sfx":"","pretext":"","":"K2_LOGIN_LOGOUT_REDIRECTION","name":"1","userAvatar":"1","userAvatarWidthSelect":"custom","userAvatarWidth":"50","menu":"","login":"","logout":"","usesecure":"0","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10057, 'K2 Quick Icons (admin)', 'module', 'mod_k2_quickicons', '', 1, 1, 2, 0, '{"legacy":true,"name":"K2 Quick Icons (admin)","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_QUICKICONS_FOR_USE_IN_THE_JOOMLA_CONTROL_PANEL_DASHBOARD_PAGE","group":""}', '{"modCSSStyling":"1","modLogo":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10058, 'K2 Stats (admin)', 'module', 'mod_k2_stats', '', 1, 1, 2, 0, '{"legacy":true,"name":"K2 Stats (admin)","type":"module","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_STATS_FOR_USE_IN_THE_K2_DASHBOARD_PAGE","group":""}', '{"latestItems":"1","popularItems":"1","mostCommentedItems":"1","latestComments":"1","statistics":"1","cache":"0","cache_time":"900"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10059, 'plg_finder_k2', 'plugin', 'k2', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_k2","type":"plugin","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"PLG_FINDER_K2_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10060, 'Search - K2', 'plugin', 'k2', 'search', 0, 1, 1, 0, '{"legacy":true,"name":"Search - K2","type":"plugin","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_THIS_PLUGIN_EXTENDS_THE_DEFAULT_JOOMLA_SEARCH_FUNCTIONALITY_TO_K2_CONTENT","group":""}', '{"search_limit":"50","search_tags":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10061, 'System - K2', 'plugin', 'k2', 'system', 0, 1, 1, 0, '{"legacy":true,"name":"System - K2","type":"plugin","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_THE_K2_SYSTEM_PLUGIN_IS_USED_TO_ASSIST_THE_PROPER_FUNCTIONALITY_OF_THE_K2_COMPONENT_SITE_WIDE_MAKE_SURE_ITS_ALWAYS_PUBLISHED_WHEN_THE_K2_COMPONENT_IS_INSTALLED","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10062, 'User - K2', 'plugin', 'k2', 'user', 0, 1, 1, 0, '{"legacy":true,"name":"User - K2","type":"plugin","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"K2_A_USER_SYNCHRONIZATION_PLUGIN_FOR_K2","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);
INSERT INTO `rq_extensions` VALUES(10063, 'k2', 'component', 'com_k2', '', 1, 1, 0, 0, '{"legacy":true,"name":"K2","type":"component","creationDate":"May 9th, 2012","author":"JoomlaWorks","copyright":"Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.","authorEmail":"contact@joomlaworks.net","authorUrl":"www.joomlaworks.net","version":"2.5.7","description":"Thank you for installing K2 by JoomlaWorks, the powerful content extension for Joomla!","group":""}', '{"enable_css":"1","jQueryHandling":"1.7remote","backendJQueryHandling":"remote","userName":"1","userImage":"1","userDescription":"1","userURL":"1","userEmail":"0","userFeedLink":"1","userFeedIcon":"1","userItemCount":"10","userItemTitle":"1","userItemTitleLinked":"1","userItemDateCreated":"1","userItemImage":"1","userItemIntroText":"1","userItemCategory":"1","userItemTags":"1","userItemCommentsAnchor":"1","userItemReadMore":"1","userItemK2Plugins":"1","tagItemCount":"10","tagItemTitle":"1","tagItemTitleLinked":"1","tagItemDateCreated":"1","tagItemImage":"1","tagItemIntroText":"1","tagItemCategory":"1","tagItemReadMore":"1","tagItemExtraFields":"0","tagOrdering":"","tagFeedLink":"1","tagFeedIcon":"1","genericItemCount":"10","genericItemTitle":"1","genericItemTitleLinked":"1","genericItemDateCreated":"1","genericItemImage":"1","genericItemIntroText":"1","genericItemCategory":"1","genericItemReadMore":"1","genericItemExtraFields":"0","genericFeedLink":"1","genericFeedIcon":"1","feedLimit":"10","feedItemImage":"1","feedImgSize":"S","feedItemIntroText":"1","feedTextWordLimit":"","feedItemFullText":"1","feedItemTags":"0","feedItemVideo":"0","feedItemGallery":"0","feedItemAttachments":"0","feedBogusEmail":"","introTextCleanup":"0","introTextCleanupExcludeTags":"","introTextCleanupTagAttr":"","fullTextCleanup":"0","fullTextCleanupExcludeTags":"","fullTextCleanupTagAttr":"","xssFiltering":"0","linkPopupWidth":"900","linkPopupHeight":"600","imagesQuality":"100","itemImageXS":"100","itemImageS":"200","itemImageM":"400","itemImageL":"600","itemImageXL":"900","itemImageGeneric":"300","catImageWidth":"100","catImageDefault":"1","userImageWidth":"100","userImageDefault":"1","commenterImgWidth":"48","onlineImageEditor":"splashup","imageTimestamp":"0","imageMemoryLimit":"","socialButtonCode":"","twitterUsername":"","facebookImage":"Small","comments":"1","commentsOrdering":"DESC","commentsLimit":"10","commentsFormPosition":"below","commentsPublishing":"1","commentsReporting":"2","commentsReportRecipient":"","inlineCommentsModeration":"0","gravatar":"1","recaptcha":"0","commentsFormNotes":"1","commentsFormNotesText":"","frontendEditing":"1","showImageTab":"1","showImageGalleryTab":"1","showVideoTab":"1","showExtraFieldsTab":"1","showAttachmentsTab":"1","showK2Plugins":"1","sideBarDisplayFrontend":"0","mergeEditors":"1","sideBarDisplay":"1","attachmentsFolder":"","hideImportButton":"0","taggingSystem":"1","lockTags":"0","showTagFilter":"0","googleSearch":"0","googleSearchContainer":"k2Container","K2UserProfile":"1","K2UserGroup":"","redirect":"","adminSearch":"simple","cookieDomain":"","recaptcha_public_key":"","recaptcha_private_key":"","recaptcha_theme":"clean","recaptchaOnRegistration":"0","showItemsCounterAdmin":"1","showChildCatItems":"1","disableCompactOrdering":"0","metaDescLimit":"150","SEFReplacements":"","sh404SefLabelCat":"","sh404SefLabelUser":"blog","sh404SefLabelItem":"2","sh404SefTitleAlias":"alias","sh404SefModK2ContentFeedAlias":"feed","cbIntegration":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_filters`
--

CREATE TABLE `rq_finder_filters` (
  `filter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL,
  `created_by_alias` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `map_count` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `params` mediumtext,
  PRIMARY KEY (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_finder_filters`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links`
--

CREATE TABLE `rq_finder_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `indexdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `state` int(5) DEFAULT '1',
  `access` int(5) DEFAULT '0',
  `language` varchar(8) NOT NULL,
  `publish_start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_price` double unsigned NOT NULL DEFAULT '0',
  `sale_price` double unsigned NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `object` mediumblob NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `idx_type` (`type_id`),
  KEY `idx_title` (`title`),
  KEY `idx_md5` (`md5sum`),
  KEY `idx_url` (`url`(75)),
  KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_finder_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms0`
--

CREATE TABLE `rq_finder_links_terms0` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms0`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms1`
--

CREATE TABLE `rq_finder_links_terms1` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms1`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms2`
--

CREATE TABLE `rq_finder_links_terms2` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms2`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms3`
--

CREATE TABLE `rq_finder_links_terms3` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms3`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms4`
--

CREATE TABLE `rq_finder_links_terms4` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms4`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms5`
--

CREATE TABLE `rq_finder_links_terms5` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms5`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms6`
--

CREATE TABLE `rq_finder_links_terms6` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms6`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms7`
--

CREATE TABLE `rq_finder_links_terms7` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms7`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms8`
--

CREATE TABLE `rq_finder_links_terms8` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms8`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_terms9`
--

CREATE TABLE `rq_finder_links_terms9` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_terms9`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_termsa`
--

CREATE TABLE `rq_finder_links_termsa` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_termsa`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_termsb`
--

CREATE TABLE `rq_finder_links_termsb` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_termsb`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_termsc`
--

CREATE TABLE `rq_finder_links_termsc` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_termsc`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_termsd`
--

CREATE TABLE `rq_finder_links_termsd` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_termsd`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_termse`
--

CREATE TABLE `rq_finder_links_termse` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_termse`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_links_termsf`
--

CREATE TABLE `rq_finder_links_termsf` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`term_id`),
  KEY `idx_term_weight` (`term_id`,`weight`),
  KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_links_termsf`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_taxonomy`
--

CREATE TABLE `rq_finder_taxonomy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `state` (`state`),
  KEY `ordering` (`ordering`),
  KEY `access` (`access`),
  KEY `idx_parent_published` (`parent_id`,`state`,`access`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rq_finder_taxonomy`
--

INSERT INTO `rq_finder_taxonomy` VALUES(1, 0, 'ROOT', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_taxonomy_map`
--

CREATE TABLE `rq_finder_taxonomy_map` (
  `link_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`link_id`,`node_id`),
  KEY `link_id` (`link_id`),
  KEY `node_id` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_taxonomy_map`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_terms`
--

CREATE TABLE `rq_finder_terms` (
  `term_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `soundex` varchar(75) NOT NULL,
  `links` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `idx_term` (`term`),
  KEY `idx_term_phrase` (`term`,`phrase`),
  KEY `idx_stem_phrase` (`stem`,`phrase`),
  KEY `idx_soundex_phrase` (`soundex`,`phrase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_finder_terms`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_terms_common`
--

CREATE TABLE `rq_finder_terms_common` (
  `term` varchar(75) NOT NULL,
  `language` varchar(3) NOT NULL,
  KEY `idx_word_lang` (`term`,`language`),
  KEY `idx_lang` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_terms_common`
--

INSERT INTO `rq_finder_terms_common` VALUES('a', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('about', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('after', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('ago', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('all', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('am', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('an', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('and', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('ani', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('any', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('are', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('aren''t', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('as', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('at', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('be', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('but', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('by', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('for', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('from', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('get', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('go', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('how', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('if', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('in', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('into', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('is', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('isn''t', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('it', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('its', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('me', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('more', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('most', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('must', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('my', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('new', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('no', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('none', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('not', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('noth', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('nothing', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('of', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('off', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('often', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('old', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('on', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('onc', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('once', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('onli', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('only', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('or', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('other', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('our', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('ours', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('out', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('over', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('page', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('she', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('should', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('small', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('so', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('some', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('than', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('thank', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('that', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('the', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('their', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('theirs', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('them', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('then', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('there', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('these', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('they', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('this', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('those', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('thus', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('time', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('times', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('to', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('too', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('true', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('under', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('until', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('up', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('upon', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('use', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('user', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('users', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('veri', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('version', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('very', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('via', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('want', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('was', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('way', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('were', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('what', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('when', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('where', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('whi', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('which', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('who', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('whom', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('whose', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('why', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('wide', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('will', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('with', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('within', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('without', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('would', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('yes', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('yet', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('you', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('your', 'en');
INSERT INTO `rq_finder_terms_common` VALUES('yours', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_tokens`
--

CREATE TABLE `rq_finder_tokens` (
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '1',
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  KEY `idx_word` (`term`),
  KEY `idx_context` (`context`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_tokens`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_tokens_aggregate`
--

CREATE TABLE `rq_finder_tokens_aggregate` (
  `term_id` int(10) unsigned NOT NULL,
  `map_suffix` char(1) NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `term_weight` float unsigned NOT NULL,
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `context_weight` float unsigned NOT NULL,
  `total_weight` float unsigned NOT NULL,
  KEY `token` (`term`),
  KEY `keyword_id` (`term_id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_finder_tokens_aggregate`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_finder_types`
--

CREATE TABLE `rq_finder_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_finder_types`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_jf_content`
--

CREATE TABLE `rq_jf_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `reference_id` int(11) NOT NULL DEFAULT '0',
  `reference_table` varchar(100) NOT NULL DEFAULT '',
  `reference_field` varchar(100) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `original_value` varchar(255) DEFAULT NULL,
  `original_text` mediumtext NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `combo` (`reference_id`,`reference_field`,`reference_table`),
  KEY `jfContent` (`language_id`,`reference_id`,`reference_table`),
  KEY `jfContentLanguage` (`reference_id`,`reference_field`,`reference_table`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_jf_content`
--


-- --------------------------------------------------------

--
-- Stand-in structure for view `rq_jf_languages`
--
CREATE TABLE `rq_jf_languages` (
`lang_id` int(11) unsigned
,`lang_code` char(7)
,`title` varchar(50)
,`title_native` varchar(50)
,`sef` varchar(50)
,`description` varchar(512)
,`published` int(11)
,`image` varchar(50)
,`image_ext` varchar(100)
,`fallback_code` varchar(20)
,`params` text
,`ordering` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `rq_jf_languages_ext`
--

CREATE TABLE `rq_jf_languages_ext` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_ext` varchar(100) DEFAULT NULL,
  `fallback_code` varchar(20) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_jf_languages_ext`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_jf_tableinfo`
--

CREATE TABLE `rq_jf_tableinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joomlatablename` varchar(100) NOT NULL DEFAULT '',
  `tablepkID` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_jf_tableinfo`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_attachments`
--

CREATE TABLE `rq_k2_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleAttribute` text NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_attachments`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_categories`
--

CREATE TABLE `rq_k2_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) DEFAULT '0',
  `extraFieldsGroup` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`published`,`access`,`trash`),
  KEY `parent` (`parent`),
  KEY `ordering` (`ordering`),
  KEY `published` (`published`),
  KEY `access` (`access`),
  KEY `trash` (`trash`),
  KEY `language` (`language`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_comments`
--

CREATE TABLE `rq_k2_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `commentDate` datetime NOT NULL,
  `commentText` text NOT NULL,
  `commentEmail` varchar(255) NOT NULL,
  `commentURL` varchar(255) NOT NULL,
  `published` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `itemID` (`itemID`),
  KEY `userID` (`userID`),
  KEY `published` (`published`),
  KEY `latestComments` (`published`,`commentDate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_extra_fields`
--

CREATE TABLE `rq_k2_extra_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  KEY `published` (`published`),
  KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_extra_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_extra_fields_groups`
--

CREATE TABLE `rq_k2_extra_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_extra_fields_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_items`
--

CREATE TABLE `rq_k2_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `video` text,
  `gallery` varchar(255) DEFAULT NULL,
  `extra_fields` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `extra_fields_search` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL,
  `checked_out` int(10) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL,
  `publish_down` datetime NOT NULL,
  `trash` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `featured` smallint(6) NOT NULL DEFAULT '0',
  `featured_ordering` int(11) NOT NULL DEFAULT '0',
  `image_caption` text NOT NULL,
  `image_credits` varchar(255) NOT NULL,
  `video_caption` text NOT NULL,
  `video_credits` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `params` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `metakey` text NOT NULL,
  `plugins` text NOT NULL,
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item` (`published`,`publish_up`,`publish_down`,`trash`,`access`),
  KEY `catid` (`catid`),
  KEY `created_by` (`created_by`),
  KEY `ordering` (`ordering`),
  KEY `featured` (`featured`),
  KEY `featured_ordering` (`featured_ordering`),
  KEY `hits` (`hits`),
  KEY `created` (`created`),
  KEY `language` (`language`),
  FULLTEXT KEY `search` (`title`,`introtext`,`fulltext`,`extra_fields_search`,`image_caption`,`image_credits`,`video_caption`,`video_credits`,`metadesc`,`metakey`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_rating`
--

CREATE TABLE `rq_k2_rating` (
  `itemID` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_k2_rating`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_tags`
--

CREATE TABLE `rq_k2_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `published` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_tags_xref`
--

CREATE TABLE `rq_k2_tags_xref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagID` (`tagID`),
  KEY `itemID` (`itemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_tags_xref`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_users`
--

CREATE TABLE `rq_k2_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `gender` enum('m','f') NOT NULL DEFAULT 'm',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `plugins` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `group` (`group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_k2_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_k2_user_groups`
--

CREATE TABLE `rq_k2_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rq_k2_user_groups`
--

INSERT INTO `rq_k2_user_groups` VALUES(1, 'Registered', '{"comment":"1","frontEdit":"0","add":"0","editOwn":"0","editAll":"0","publish":"0","inheritance":0,"categories":"all"}');
INSERT INTO `rq_k2_user_groups` VALUES(2, 'Site Owner', '{"comment":"1","frontEdit":"1","add":"1","editOwn":"1","editAll":"1","publish":"1","inheritance":1,"categories":"all"}');

-- --------------------------------------------------------

--
-- Table structure for table `rq_languages`
--

CREATE TABLE `rq_languages` (
  `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_code` char(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_native` varchar(50) NOT NULL,
  `sef` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `sitename` varchar(1024) NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  UNIQUE KEY `idx_sef` (`sef`),
  UNIQUE KEY `idx_image` (`image`),
  UNIQUE KEY `idx_langcode` (`lang_code`),
  KEY `idx_ordering` (`ordering`),
  KEY `idx_access` (`access`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rq_languages`
--

INSERT INTO `rq_languages` VALUES(1, 'en-GB', 'English (UK)', 'English (UK)', 'en', 'en', '', '', '', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rq_menu`
--

CREATE TABLE `rq_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `ordering` int(11) NOT NULL DEFAULT '0' COMMENT 'The relative ordering of the menu item in the tree.',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`,`language`),
  KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  KEY `idx_menutype` (`menutype`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_path` (`path`(255)),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `rq_menu`
--

INSERT INTO `rq_menu` VALUES(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 203, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(2, 'menu', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 0, 1, 1, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 1, 10, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(3, 'menu', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 2, 3, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(4, 'menu', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&extension=com_banners', 'component', 0, 2, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-cat', 0, '', 4, 5, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(5, 'menu', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-clients', 0, '', 6, 7, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(6, 'menu', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-tracks', 0, '', 8, 9, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(7, 'menu', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 0, 1, 1, 8, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 11, 16, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(8, 'menu', 'com_contact', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact', 'component', 0, 7, 2, 8, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 12, 13, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(9, 'menu', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&extension=com_contact', 'component', 0, 7, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact-cat', 0, '', 14, 15, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(10, 'menu', 'com_messages', 'Messaging', '', 'Messaging', 'index.php?option=com_messages', 'component', 0, 1, 1, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages', 0, '', 17, 22, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(11, 'menu', 'com_messages_add', 'New Private Message', '', 'Messaging/New Private Message', 'index.php?option=com_messages&task=message.add', 'component', 0, 10, 2, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-add', 0, '', 18, 19, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(12, 'menu', 'com_messages_read', 'Read Private Message', '', 'Messaging/Read Private Message', 'index.php?option=com_messages', 'component', 0, 10, 2, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-read', 0, '', 20, 21, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(13, 'menu', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 1, 1, 17, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 23, 28, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(14, 'menu', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 13, 2, 17, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 24, 25, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(15, 'menu', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&extension=com_newsfeeds', 'component', 0, 13, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds-cat', 0, '', 26, 27, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(16, 'menu', 'com_redirect', 'Redirect', '', 'Redirect', 'index.php?option=com_redirect', 'component', 0, 1, 1, 24, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:redirect', 0, '', 43, 44, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(17, 'menu', 'com_search', 'Basic Search', '', 'Basic Search', 'index.php?option=com_search', 'component', 0, 1, 1, 19, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:search', 0, '', 35, 36, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(18, 'menu', 'com_weblinks', 'Weblinks', '', 'Weblinks', 'index.php?option=com_weblinks', 'component', 0, 1, 1, 21, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 37, 42, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(19, 'menu', 'com_weblinks_links', 'Links', '', 'Weblinks/Links', 'index.php?option=com_weblinks', 'component', 0, 18, 2, 21, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 38, 39, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(20, 'menu', 'com_weblinks_categories', 'Categories', '', 'Weblinks/Categories', 'index.php?option=com_categories&extension=com_weblinks', 'component', 0, 18, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks-cat', 0, '', 40, 41, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(21, 'menu', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 0, 1, 1, 27, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:finder', 0, '', 33, 34, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(22, 'menu', 'com_joomlaupdate', 'Joomla! Update', '', 'Joomla! Update', 'index.php?option=com_joomlaupdate', 'component', 0, 1, 1, 28, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:joomlaupdate', 0, '', 31, 32, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(101, 'mainmenu', 'Home', 'home', '', 'home', 'index.php?option=com_content&view=featured', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 7, '{"featured_categories":[""],"layout_type":"blog","num_leading_articles":"1","num_intro_articles":"3","num_columns":"3","num_links":"0","multi_column_order":"1","orderby_pri":"","orderby_sec":"front","order_date":"","show_pagination":"2","show_pagination_results":"1","show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","show_feed_link":"1","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 29, 30, 1, '*', 0);
INSERT INTO `rq_menu` VALUES(102, 'menu', 'COM_NONUMBERMANAGER', 'nonumbermanager', '', 'nonumbermanager', 'index.php?option=com_nonumbermanager', 'component', 1, 1, 1, 10000, 0, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_nonumbermanager/images/icon-nonumbermanager.png', 0, '', 45, 46, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(103, 'menu', 'COM_CONTENTTEMPLATER', 'contenttemplater', '', 'contenttemplater', 'index.php?option=com_contenttemplater', 'component', 1, 1, 1, 10015, 0, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_contenttemplater/images/icon-contenttemplater.png', 0, '', 47, 48, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(104, 'menu', 'COM_REREPLACER', 'rereplacer', '', 'rereplacer', 'index.php?option=com_rereplacer', 'component', 1, 1, 1, 10024, 0, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_rereplacer/images/icon-rereplacer.png', 0, '', 49, 50, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(105, 'menu', 'COM_SNIPPETS', 'snippets', '', 'snippets', 'index.php?option=com_snippets', 'component', 1, 1, 1, 10030, 0, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_snippets/images/icon-snippets.png', 0, '', 51, 52, 0, '*', 1);
INSERT INTO `rq_menu` VALUES(106, 'mainmenu', 'About Us', 'about-us', '', 'about-us', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 53, 54, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(107, 'mainmenu', 'Services', 'services', '', 'services', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 55, 56, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(108, 'mainmenu', 'Our Open Innovation Structure', 'our-open-innovation-structure', '', 'our-open-innovation-structure', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 57, 58, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(109, 'mainmenu', 'Projects & Events', 'projects-events', '', 'projects-events', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 59, 60, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(110, 'mainmenu', 'Job Opportunities', 'job-opportunities', '', 'job-opportunities', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 61, 62, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(111, 'mainmenu', 'Contact Us', 'contact-us', '', 'contact-us', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 63, 64, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(112, 'menu-left', 'About Us ', 'about-us-2', '', 'about-us-2', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 65, 66, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(113, 'menu-left', 'Services', 'services-2', '', 'services-2', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 67, 68, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(114, 'menu-right', 'Our Open Innovation Structure', 'our-open-innovation-structure-2', '', 'our-open-innovation-structure-2', 'index.php?option=com_content&view=article&id=1', 'component', -2, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 69, 70, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(115, 'menu-right', 'Contact Us ', 'contact-us-2', '', 'contact-us-2', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 77, 78, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(116, 'menu-left', 'Our Open Innovation Structure', 'our-open-innovation-structure-3', '', 'our-open-innovation-structure-3', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 71, 72, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(117, 'menu-right', 'Projects & Events', 'projects-events-2', '', 'projects-events-2', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 73, 74, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(118, 'menu-right', 'Job Opportunities', 'job-opportunities-2', '', 'job-opportunities-2', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 75, 76, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(119, 'about-us', 'Mission', 'mission', '', 'mission', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 79, 80, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(120, 'about-us', 'Governance', 'governance', '', 'governance', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 81, 86, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(121, 'about-us', 'Organization Chart', 'organization-chart', '', 'governance/organization-chart', 'index.php?option=com_content&view=article&id=1', 'component', 1, 120, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 82, 83, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(122, 'about-us', 'Organizational model 231/2001', 'organizational-model-231-2001', '', 'governance/organizational-model-231-2001', 'index.php?option=com_content&view=article&id=1', 'component', 1, 120, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 84, 85, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(123, 'about-us', 'Corporate responsability', 'corporate-responsability', '', 'corporate-responsability', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 87, 88, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(124, 'about-us', 'Key Assigments', 'key-assigments', '', 'key-assigments', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 89, 90, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(125, 'about-us', 'Internationalization', 'internationalization', '', 'internationalization', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 91, 92, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(126, 'services', 'R&D Project Financing', 'r-d-project-financing', '', 'r-d-project-financing', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 105, 106, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(127, 'services', 'Innovation Policy Studies', 'innovation-policy-studies', '', 'innovation-policy-studies', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 107, 108, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(128, 'services', 'Technology Incubator Invesment', 'technology-incubator-invesment', '', 'technology-incubator-invesment', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 109, 110, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(129, 'services', 'Training', 'training', '', 'training', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 111, 112, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(130, 'services', 'Innovation Management', 'innovation-management', '', 'innovation-management', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 113, 114, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(131, 'services', 'Technology Services', 'technology-services', '', 'technology-services', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 93, 104, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(132, 'services', 'Technology Scouting', 'technology-scouting', '', 'technology-services/technology-scouting', 'index.php?option=com_content&view=article&id=1', 'component', 1, 131, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 94, 95, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(133, 'services', 'Technology Brokerage', 'technology-brokerage', '', 'technology-services/technology-brokerage', 'index.php?option=com_content&view=article&id=1', 'component', 1, 131, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 96, 97, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(134, 'services', 'Technology Testing', 'technology-testing', '', 'technology-services/technology-testing', 'index.php?option=com_content&view=article&id=1', 'component', 1, 131, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 98, 99, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(135, 'services', 'Market potential assessment and commercial exploitation', 'market-potential-assessment-and-commercial-exploitation', '', 'technology-services/market-potential-assessment-and-commercial-exploitation', 'index.php?option=com_content&view=article&id=1', 'component', 1, 131, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 100, 101, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(136, 'services', 'R&D results valorizations and IPR Strategies', 'r-d-results-valorizations-and-ipr-strategies', '', 'technology-services/r-d-results-valorizations-and-ipr-strategies', 'index.php?option=com_content&view=article&id=1', 'component', 1, 131, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 102, 103, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(137, 'our-open-innovation-stru', 'Our Networks', 'our-networks', '', 'our-networks', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 115, 116, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(138, 'our-open-innovation-stru', 'Our Partners', 'our-partners', '', 'our-partners', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 117, 124, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(139, 'our-open-innovation-stru', 'Key Assigment', 'key-assigment', '', 'key-assigment', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 125, 126, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(140, 'our-open-innovation-stru', 'Customers', 'customers', '', 'customers', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 127, 128, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(141, 'our-open-innovation-stru', 'Academic Partnership', 'academic-partnership', '', 'our-partners/academic-partnership', 'index.php?option=com_content&view=article&id=1', 'component', 1, 138, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 118, 119, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(142, 'our-open-innovation-stru', 'Technological Partnership', 'technological-partnership', '', 'our-partners/technological-partnership', 'index.php?option=com_content&view=article&id=1', 'component', 1, 138, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 120, 121, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(143, 'our-open-innovation-stru', 'Business Partnership', 'business-partnership', '', 'our-partners/business-partnership', 'index.php?option=com_content&view=article&id=1', 'component', 1, 138, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 122, 123, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(144, 'project-events', 'EU - Funded Projects', 'eu-funded-projects', '', 'eu-funded-projects', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 129, 130, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(145, 'project-events', 'National Projects', 'national-projects', '', 'national-projects', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 131, 132, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(146, 'project-events', 'News & Events', 'news-events', '', 'news-events', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 133, 134, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(147, 'project-events', 'Publications', 'publications', '', 'publications', 'index.php?option=com_content&view=category&layout=blog&id=39', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"layout_type":"blog","show_category_title":"","show_description":"","show_description_image":"","maxLevel":"","show_empty_categories":"","show_no_articles":"","show_subcat_desc":"","show_cat_num_articles":"","page_subheading":"","num_leading_articles":"1","num_intro_articles":"4","num_columns":"2","num_links":"4","multi_column_order":"","show_subcategory_content":"","orderby_pri":"","orderby_sec":"rdate","order_date":"created","show_pagination":"","show_pagination_results":"","show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","show_feed_link":"","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 135, 142, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(148, 'project-events', 'Benchamarking studies', 'benchamarking-studies', '', 'publications/benchamarking-studies', 'index.php?option=com_content&view=category&layout=blog&id=40', 'component', 1, 147, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"layout_type":"blog","show_category_title":"","show_description":"","show_description_image":"","maxLevel":"","show_empty_categories":"","show_no_articles":"","show_subcat_desc":"","show_cat_num_articles":"","page_subheading":"","num_leading_articles":"","num_intro_articles":"","num_columns":"","num_links":"","multi_column_order":"","show_subcategory_content":"","orderby_pri":"","orderby_sec":"","order_date":"","show_pagination":"","show_pagination_results":"","show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","show_feed_link":"","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 136, 137, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(149, 'project-events', 'Reference catalogues', 'reference-catalogues', '', 'publications/reference-catalogues', 'index.php?option=com_content&view=category&layout=blog&id=41', 'component', 1, 147, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"layout_type":"blog","show_category_title":"","show_description":"","show_description_image":"","maxLevel":"","show_empty_categories":"","show_no_articles":"","show_subcat_desc":"","show_cat_num_articles":"","page_subheading":"","num_leading_articles":"","num_intro_articles":"","num_columns":"","num_links":"","multi_column_order":"","show_subcategory_content":"","orderby_pri":"","orderby_sec":"","order_date":"","show_pagination":"","show_pagination_results":"","show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","show_feed_link":"","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 138, 139, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(150, 'project-events', 'Business models development', 'business-models-development', '', 'publications/business-models-development', 'index.php?option=com_content&view=category&layout=blog&id=42', 'component', 1, 147, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"layout_type":"blog","show_category_title":"","show_description":"","show_description_image":"","maxLevel":"","show_empty_categories":"","show_no_articles":"","show_subcat_desc":"","show_cat_num_articles":"","page_subheading":"","num_leading_articles":"","num_intro_articles":"","num_columns":"","num_links":"","multi_column_order":"","show_subcategory_content":"","orderby_pri":"","orderby_sec":"","order_date":"","show_pagination":"","show_pagination_results":"","show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","show_feed_link":"","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 140, 141, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(151, 'contact-us', 'Send us your mail', 'send-us-your-mail', '', 'send-us-your-mail', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 143, 144, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(152, 'contact-us', 'Where We are located', 'where-we-are-located', '', 'where-we-are-located', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 145, 146, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(153, 'contact-us', 'Send us your CV', 'send-us-your-cv', '', 'send-us-your-cv', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 147, 148, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(154, 'job-opportunities', 'Insert CV', 'insert-cv', '', 'insert-cv', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 149, 150, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(155, 'job-opportunities', 'Recruitment Job Offers', 'recruitment-job-offers', '', 'recruitment-job-offers', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 151, 170, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(156, 'job-opportunities', 'Careers', 'careers', '', 'recruitment-job-offers/careers', 'index.php?option=com_content&view=article&id=1', 'component', 1, 155, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 152, 161, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(157, 'job-opportunities', 'Integration', 'integration', '', 'recruitment-job-offers/careers/integration', 'index.php?option=com_content&view=article&id=1', 'component', 1, 156, 3, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 153, 154, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(158, 'job-opportunities', 'Development', 'development', '', 'recruitment-job-offers/careers/development', 'index.php?option=com_content&view=article&id=1', 'component', 1, 156, 3, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 155, 156, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(159, 'job-opportunities', 'Training', 'training', '', 'recruitment-job-offers/careers/training', 'index.php?option=com_content&view=article&id=1', 'component', 1, 156, 3, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 157, 158, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(160, 'job-opportunities', 'Mobility', 'mobility', '', 'recruitment-job-offers/careers/mobility', 'index.php?option=com_content&view=article&id=1', 'component', 1, 156, 3, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 159, 160, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(161, 'job-opportunities', 'Specific Roles', 'specific-roles', '', 'recruitment-job-offers/specific-roles', 'index.php?option=com_content&view=article&id=1', 'component', 1, 155, 2, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 162, 169, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(162, 'job-opportunities', 'Consultants', 'consultants', '', 'recruitment-job-offers/specific-roles/consultants', 'index.php?option=com_content&view=article&id=1', 'component', 1, 161, 3, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 163, 164, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(163, 'job-opportunities', 'Manager', 'manager', '', 'recruitment-job-offers/specific-roles/manager', 'index.php?option=com_content&view=article&id=1', 'component', 1, 161, 3, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 165, 166, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(164, 'job-opportunities', 'Partnerships', 'partnerships', '', 'recruitment-job-offers/specific-roles/partnerships', 'index.php?option=com_content&view=article&id=1', 'component', 1, 161, 3, 22, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 167, 168, 0, '*', 0);
INSERT INTO `rq_menu` VALUES(165, 'main', 'COM_CHRONOFORMS', 'com-chronoforms', '', 'com-chronoforms', 'index.php?option=com_chronoforms', 'component', 0, 1, 1, 10048, 0, 0, '0000-00-00 00:00:00', 0, 1, 'components/com_chronoforms/CF.png', 0, '', 171, 180, 0, '', 1);
INSERT INTO `rq_menu` VALUES(166, 'main', 'COM_CHRONOFORMS_FORMS_MANAGER', 'com-chronoforms-forms-manager', '', 'com-chronoforms/com-chronoforms-forms-manager', 'index.php?option=com_chronoforms', 'component', 0, 165, 2, 10048, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 172, 173, 0, '', 1);
INSERT INTO `rq_menu` VALUES(167, 'main', 'COM_CHRONOFORMS_WIZARD', 'com-chronoforms-wizard', '', 'com-chronoforms/com-chronoforms-wizard', 'index.php?option=com_chronoforms&task=form_wizard', 'component', 0, 165, 2, 10048, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 174, 175, 0, '', 1);
INSERT INTO `rq_menu` VALUES(168, 'main', 'COM_CHRONOFORMS_EASY_WIZARD', 'com-chronoforms-easy-wizard', '', 'com-chronoforms/com-chronoforms-easy-wizard', 'index.php?option=com_chronoforms&task=form_wizard&wizard_mode=easy', 'component', 0, 165, 2, 10048, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 176, 177, 0, '', 1);
INSERT INTO `rq_menu` VALUES(169, 'main', 'COM_CHRONOFORMS_VALIDATE', 'com-chronoforms-validate', '', 'com-chronoforms/com-chronoforms-validate', 'index.php?option=com_chronoforms&task=validatelicense', 'component', 0, 165, 2, 10048, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 178, 179, 0, '', 1);
INSERT INTO `rq_menu` VALUES(181, 'main', 'COM_K2', 'com-k2', '', 'com-k2', 'index.php?option=com_k2', 'component', 0, 1, 1, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/k2/assets/images/system/k2_16x16.png', 0, '', 181, 202, 0, '', 1);
INSERT INTO `rq_menu` VALUES(182, 'main', 'K2_ITEMS', 'k2-items', '', 'com-k2/k2-items', 'index.php?option=com_k2&view=items', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 182, 183, 0, '', 1);
INSERT INTO `rq_menu` VALUES(183, 'main', 'K2_CATEGORIES', 'k2-categories', '', 'com-k2/k2-categories', 'index.php?option=com_k2&view=categories', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 184, 185, 0, '', 1);
INSERT INTO `rq_menu` VALUES(184, 'main', 'K2_TAGS', 'k2-tags', '', 'com-k2/k2-tags', 'index.php?option=com_k2&view=tags', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 186, 187, 0, '', 1);
INSERT INTO `rq_menu` VALUES(185, 'main', 'K2_COMMENTS', 'k2-comments', '', 'com-k2/k2-comments', 'index.php?option=com_k2&view=comments', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 188, 189, 0, '', 1);
INSERT INTO `rq_menu` VALUES(186, 'main', 'K2_USERS', 'k2-users', '', 'com-k2/k2-users', 'index.php?option=com_k2&view=users', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 190, 191, 0, '', 1);
INSERT INTO `rq_menu` VALUES(187, 'main', 'K2_USER_GROUPS', 'k2-user-groups', '', 'com-k2/k2-user-groups', 'index.php?option=com_k2&view=usergroups', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 192, 193, 0, '', 1);
INSERT INTO `rq_menu` VALUES(188, 'main', 'K2_EXTRA_FIELDS', 'k2-extra-fields', '', 'com-k2/k2-extra-fields', 'index.php?option=com_k2&view=extrafields', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 194, 195, 0, '', 1);
INSERT INTO `rq_menu` VALUES(189, 'main', 'K2_EXTRA_FIELD_GROUPS', 'k2-extra-field-groups', '', 'com-k2/k2-extra-field-groups', 'index.php?option=com_k2&view=extrafieldsgroups', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 196, 197, 0, '', 1);
INSERT INTO `rq_menu` VALUES(190, 'main', 'K2_MEDIA_MANAGER', 'k2-media-manager', '', 'com-k2/k2-media-manager', 'index.php?option=com_k2&view=media', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 198, 199, 0, '', 1);
INSERT INTO `rq_menu` VALUES(191, 'main', 'K2_INFORMATION', 'k2-information', '', 'com-k2/k2-information', 'index.php?option=com_k2&view=info', 'component', 0, 181, 2, 10063, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 200, 201, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rq_menu_types`
--

CREATE TABLE `rq_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(24) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_menutype` (`menutype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `rq_menu_types`
--

INSERT INTO `rq_menu_types` VALUES(1, 'mainmenu', 'Main Menu', 'The main menu for the site');
INSERT INTO `rq_menu_types` VALUES(2, 'menu-left', 'menu_left', '');
INSERT INTO `rq_menu_types` VALUES(3, 'menu-right', 'menu_right', '');
INSERT INTO `rq_menu_types` VALUES(4, 'about-us', 'About Us', '');
INSERT INTO `rq_menu_types` VALUES(5, 'services', 'Services', '');
INSERT INTO `rq_menu_types` VALUES(6, 'our-open-innovation-stru', 'Our Open Innovation Structure', '');
INSERT INTO `rq_menu_types` VALUES(7, 'project-events', 'Project & Events', '');
INSERT INTO `rq_menu_types` VALUES(8, 'contact-us', 'Contact Us', '');
INSERT INTO `rq_menu_types` VALUES(9, 'job-opportunities', 'Job Opportunities', '');

-- --------------------------------------------------------

--
-- Table structure for table `rq_messages`
--

CREATE TABLE `rq_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_messages_cfg`
--

CREATE TABLE `rq_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_messages_cfg`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_modules`
--

CREATE TABLE `rq_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT '',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `rq_modules`
--

INSERT INTO `rq_modules` VALUES(1, 'Main Menu', '', '', 3, 'menu_right', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 0, '{"menutype":"mainmenu","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"menu_left","class_sfx":"","window_open":"","layout":"_:default","moduleclass_sfx":"_menu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(2, 'Login', '', '', 1, 'login', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(3, 'Popular Articles', '', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_popular', 3, 1, '{"count":"5","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*');
INSERT INTO `rq_modules` VALUES(4, 'Recently Added Articles', '', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_latest', 3, 1, '{"count":"5","ordering":"c_dsc","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*');
INSERT INTO `rq_modules` VALUES(8, 'Toolbar', '', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_toolbar', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(9, 'Quick Icons', '', '', 1, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_quickicon', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(10, 'Logged-in Users', '', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_logged', 3, 1, '{"count":"5","name":"1","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*');
INSERT INTO `rq_modules` VALUES(12, 'Admin Menu', '', '', 1, 'menu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 3, 1, '{"layout":"","moduleclass_sfx":"","shownew":"1","showhelp":"1","cache":"0"}', 1, '*');
INSERT INTO `rq_modules` VALUES(13, 'Admin Submenu', '', '', 1, 'submenu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_submenu', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(14, 'User Status', '', '', 2, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_status', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(15, 'Title', '', '', 1, 'title', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_title', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(16, 'Login Form', '', '', 1, 'right', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_login', 1, 1, '{"pretext":"","posttext":"","login":"","logout":"","greeting":"1","name":"0","usesecure":"0","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 0, '*');
INSERT INTO `rq_modules` VALUES(17, 'Breadcrumbs', '', '', 1, 'breadcrumb', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 1, 0, '{"showHere":"0","showHome":"1","homeText":"","showLast":"1","separator":"|","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(79, 'Multilanguage status', '', '', 1, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_multilangstatus', 3, 1, '{"layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*');
INSERT INTO `rq_modules` VALUES(80, 'Joomla Version', '', '', 1, 'footer', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_version', 3, 1, '{"format":"short","product":"1","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*');
INSERT INTO `rq_modules` VALUES(81, 'Add to Menu', '', '', 3, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_addtomenu', 2, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(82, 'Better Preview', '', '', 4, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_betterpreview', 2, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(83, 'Cache Cleaner', '', '', 5, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_cachecleaner', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(84, 'frontpage', '', '', 0, 'frontpage', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 0, '{"prepare_content":"1","backgroundimage":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static"}', 0, '*');
INSERT INTO `rq_modules` VALUES(85, 'logo', '', '<p><img src="images/site/rq.png" border="0" alt="" /></p>', 1, 'logo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 1, '{"prepare_content":"1","backgroundimage":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static"}', 0, '*');
INSERT INTO `rq_modules` VALUES(86, 'supersized', '', '', 1, 'supersized', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_supersized', 1, 1, '{"image_01":"site\\/bg\\/bg1.jpg","image_02":"","image_03":"","image_04":"","image_05":"","image_06":"","image_07":"","image_08":"","image_09":"","image_10":""}', 0, '*');
INSERT INTO `rq_modules` VALUES(87, 'menu_left', '', '', 2, 'menu_left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 0, '{"menutype":"menu-left","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"menu_left","class_sfx":"","window_open":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(88, 'menu_right', '', '', 1, 'menu_right', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 0, '{"menutype":"menu-right","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"menu_right","class_sfx":"","window_open":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(89, 'logo (2)', '', '<p><img src="images/site/rq.png" border="0" alt="" width="180px" style="float: left;" /></p>', 1, 'logo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_custom', 1, 0, '{"prepare_content":"1","backgroundimage":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static"}', 0, '*');
INSERT INTO `rq_modules` VALUES(90, 'ChronoForms', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_chronoforms', 1, 1, '', 0, '*');
INSERT INTO `rq_modules` VALUES(91, 'K2 Comments', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_k2_comments', 1, 1, '', 0, '*');
INSERT INTO `rq_modules` VALUES(92, 'K2 Content', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_k2_content', 1, 1, '', 0, '*');
INSERT INTO `rq_modules` VALUES(93, 'K2 Login', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_k2_login', 1, 1, '', 0, '*');
INSERT INTO `rq_modules` VALUES(94, 'K2 Tools', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_k2_tools', 1, 1, '', 0, '*');
INSERT INTO `rq_modules` VALUES(95, 'K2 Users', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_k2_users', 1, 1, '', 0, '*');
INSERT INTO `rq_modules` VALUES(96, 'K2 User', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', -2, 'mod_k2_user', 1, 1, '', 0, '*');
INSERT INTO `rq_modules` VALUES(97, 'K2 Quick Icons (admin)', '', '', 99, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_k2_quickicons', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(98, 'K2 Stats (admin)', '', '', 0, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_k2_stats', 3, 1, '', 1, '*');
INSERT INTO `rq_modules` VALUES(99, 'About Us', '', '', 1, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"about-us","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"submenu","window_open":"","layout":"_:default","moduleclass_sfx":" submenu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(100, 'Services', '', '', 1, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"services","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"submenu","window_open":"","layout":"_:default","moduleclass_sfx":" submenu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(101, 'Our Open Innovation Structure', '', '', 1, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"our-open-innovation-stru","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"submenu","window_open":"","layout":"_:default","moduleclass_sfx":" submenu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(102, 'Projects & Events', '', '', 1, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"project-events","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"submenu","window_open":"","layout":"_:default","moduleclass_sfx":" submenu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(103, 'Contact Us', '', '', 1, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"contact-us","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"submenu","window_open":"","layout":"_:default","moduleclass_sfx":" submenu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');
INSERT INTO `rq_modules` VALUES(104, 'Job Opportunities', '', '', 1, 'left', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"job-opportunities","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"submenu","window_open":"","layout":"_:default","moduleclass_sfx":" submenu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*');

-- --------------------------------------------------------

--
-- Table structure for table `rq_modules_menu`
--

CREATE TABLE `rq_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_modules_menu`
--

INSERT INTO `rq_modules_menu` VALUES(1, -101);
INSERT INTO `rq_modules_menu` VALUES(2, 0);
INSERT INTO `rq_modules_menu` VALUES(3, 0);
INSERT INTO `rq_modules_menu` VALUES(4, 0);
INSERT INTO `rq_modules_menu` VALUES(6, 0);
INSERT INTO `rq_modules_menu` VALUES(7, 0);
INSERT INTO `rq_modules_menu` VALUES(8, 0);
INSERT INTO `rq_modules_menu` VALUES(9, 0);
INSERT INTO `rq_modules_menu` VALUES(10, 0);
INSERT INTO `rq_modules_menu` VALUES(12, 0);
INSERT INTO `rq_modules_menu` VALUES(13, 0);
INSERT INTO `rq_modules_menu` VALUES(14, 0);
INSERT INTO `rq_modules_menu` VALUES(15, 0);
INSERT INTO `rq_modules_menu` VALUES(16, 0);
INSERT INTO `rq_modules_menu` VALUES(17, -101);
INSERT INTO `rq_modules_menu` VALUES(79, 0);
INSERT INTO `rq_modules_menu` VALUES(80, 0);
INSERT INTO `rq_modules_menu` VALUES(81, 0);
INSERT INTO `rq_modules_menu` VALUES(82, 0);
INSERT INTO `rq_modules_menu` VALUES(83, 0);
INSERT INTO `rq_modules_menu` VALUES(84, 101);
INSERT INTO `rq_modules_menu` VALUES(85, 101);
INSERT INTO `rq_modules_menu` VALUES(86, 101);
INSERT INTO `rq_modules_menu` VALUES(86, 106);
INSERT INTO `rq_modules_menu` VALUES(86, 107);
INSERT INTO `rq_modules_menu` VALUES(86, 108);
INSERT INTO `rq_modules_menu` VALUES(86, 109);
INSERT INTO `rq_modules_menu` VALUES(86, 110);
INSERT INTO `rq_modules_menu` VALUES(86, 111);
INSERT INTO `rq_modules_menu` VALUES(86, 112);
INSERT INTO `rq_modules_menu` VALUES(86, 113);
INSERT INTO `rq_modules_menu` VALUES(86, 115);
INSERT INTO `rq_modules_menu` VALUES(86, 116);
INSERT INTO `rq_modules_menu` VALUES(86, 117);
INSERT INTO `rq_modules_menu` VALUES(86, 118);
INSERT INTO `rq_modules_menu` VALUES(86, 119);
INSERT INTO `rq_modules_menu` VALUES(86, 120);
INSERT INTO `rq_modules_menu` VALUES(86, 121);
INSERT INTO `rq_modules_menu` VALUES(86, 122);
INSERT INTO `rq_modules_menu` VALUES(86, 123);
INSERT INTO `rq_modules_menu` VALUES(86, 124);
INSERT INTO `rq_modules_menu` VALUES(86, 125);
INSERT INTO `rq_modules_menu` VALUES(86, 126);
INSERT INTO `rq_modules_menu` VALUES(86, 127);
INSERT INTO `rq_modules_menu` VALUES(86, 128);
INSERT INTO `rq_modules_menu` VALUES(86, 129);
INSERT INTO `rq_modules_menu` VALUES(86, 130);
INSERT INTO `rq_modules_menu` VALUES(86, 131);
INSERT INTO `rq_modules_menu` VALUES(86, 132);
INSERT INTO `rq_modules_menu` VALUES(86, 133);
INSERT INTO `rq_modules_menu` VALUES(86, 134);
INSERT INTO `rq_modules_menu` VALUES(86, 135);
INSERT INTO `rq_modules_menu` VALUES(86, 136);
INSERT INTO `rq_modules_menu` VALUES(86, 137);
INSERT INTO `rq_modules_menu` VALUES(86, 138);
INSERT INTO `rq_modules_menu` VALUES(86, 139);
INSERT INTO `rq_modules_menu` VALUES(86, 140);
INSERT INTO `rq_modules_menu` VALUES(86, 141);
INSERT INTO `rq_modules_menu` VALUES(86, 142);
INSERT INTO `rq_modules_menu` VALUES(86, 143);
INSERT INTO `rq_modules_menu` VALUES(86, 144);
INSERT INTO `rq_modules_menu` VALUES(86, 145);
INSERT INTO `rq_modules_menu` VALUES(86, 146);
INSERT INTO `rq_modules_menu` VALUES(86, 147);
INSERT INTO `rq_modules_menu` VALUES(86, 148);
INSERT INTO `rq_modules_menu` VALUES(86, 149);
INSERT INTO `rq_modules_menu` VALUES(86, 150);
INSERT INTO `rq_modules_menu` VALUES(86, 151);
INSERT INTO `rq_modules_menu` VALUES(86, 152);
INSERT INTO `rq_modules_menu` VALUES(86, 153);
INSERT INTO `rq_modules_menu` VALUES(86, 154);
INSERT INTO `rq_modules_menu` VALUES(86, 155);
INSERT INTO `rq_modules_menu` VALUES(86, 156);
INSERT INTO `rq_modules_menu` VALUES(86, 157);
INSERT INTO `rq_modules_menu` VALUES(86, 158);
INSERT INTO `rq_modules_menu` VALUES(86, 159);
INSERT INTO `rq_modules_menu` VALUES(86, 160);
INSERT INTO `rq_modules_menu` VALUES(86, 161);
INSERT INTO `rq_modules_menu` VALUES(86, 162);
INSERT INTO `rq_modules_menu` VALUES(86, 163);
INSERT INTO `rq_modules_menu` VALUES(86, 164);
INSERT INTO `rq_modules_menu` VALUES(87, 101);
INSERT INTO `rq_modules_menu` VALUES(88, 101);
INSERT INTO `rq_modules_menu` VALUES(89, -101);
INSERT INTO `rq_modules_menu` VALUES(97, 0);
INSERT INTO `rq_modules_menu` VALUES(98, 0);
INSERT INTO `rq_modules_menu` VALUES(99, 106);
INSERT INTO `rq_modules_menu` VALUES(99, 112);
INSERT INTO `rq_modules_menu` VALUES(99, 119);
INSERT INTO `rq_modules_menu` VALUES(99, 120);
INSERT INTO `rq_modules_menu` VALUES(99, 121);
INSERT INTO `rq_modules_menu` VALUES(99, 122);
INSERT INTO `rq_modules_menu` VALUES(99, 123);
INSERT INTO `rq_modules_menu` VALUES(99, 124);
INSERT INTO `rq_modules_menu` VALUES(99, 125);
INSERT INTO `rq_modules_menu` VALUES(100, 107);
INSERT INTO `rq_modules_menu` VALUES(100, 113);
INSERT INTO `rq_modules_menu` VALUES(100, 126);
INSERT INTO `rq_modules_menu` VALUES(100, 127);
INSERT INTO `rq_modules_menu` VALUES(100, 128);
INSERT INTO `rq_modules_menu` VALUES(100, 129);
INSERT INTO `rq_modules_menu` VALUES(100, 130);
INSERT INTO `rq_modules_menu` VALUES(100, 131);
INSERT INTO `rq_modules_menu` VALUES(100, 132);
INSERT INTO `rq_modules_menu` VALUES(100, 133);
INSERT INTO `rq_modules_menu` VALUES(100, 134);
INSERT INTO `rq_modules_menu` VALUES(100, 135);
INSERT INTO `rq_modules_menu` VALUES(100, 136);
INSERT INTO `rq_modules_menu` VALUES(101, 108);
INSERT INTO `rq_modules_menu` VALUES(101, 116);
INSERT INTO `rq_modules_menu` VALUES(101, 137);
INSERT INTO `rq_modules_menu` VALUES(101, 138);
INSERT INTO `rq_modules_menu` VALUES(101, 139);
INSERT INTO `rq_modules_menu` VALUES(101, 140);
INSERT INTO `rq_modules_menu` VALUES(101, 141);
INSERT INTO `rq_modules_menu` VALUES(101, 142);
INSERT INTO `rq_modules_menu` VALUES(101, 143);
INSERT INTO `rq_modules_menu` VALUES(102, 109);
INSERT INTO `rq_modules_menu` VALUES(102, 117);
INSERT INTO `rq_modules_menu` VALUES(102, 144);
INSERT INTO `rq_modules_menu` VALUES(102, 145);
INSERT INTO `rq_modules_menu` VALUES(102, 146);
INSERT INTO `rq_modules_menu` VALUES(102, 147);
INSERT INTO `rq_modules_menu` VALUES(102, 148);
INSERT INTO `rq_modules_menu` VALUES(102, 149);
INSERT INTO `rq_modules_menu` VALUES(102, 150);
INSERT INTO `rq_modules_menu` VALUES(103, 111);
INSERT INTO `rq_modules_menu` VALUES(103, 115);
INSERT INTO `rq_modules_menu` VALUES(103, 151);
INSERT INTO `rq_modules_menu` VALUES(103, 152);
INSERT INTO `rq_modules_menu` VALUES(103, 153);
INSERT INTO `rq_modules_menu` VALUES(104, 110);
INSERT INTO `rq_modules_menu` VALUES(104, 118);
INSERT INTO `rq_modules_menu` VALUES(104, 154);
INSERT INTO `rq_modules_menu` VALUES(104, 155);
INSERT INTO `rq_modules_menu` VALUES(104, 156);
INSERT INTO `rq_modules_menu` VALUES(104, 157);
INSERT INTO `rq_modules_menu` VALUES(104, 158);
INSERT INTO `rq_modules_menu` VALUES(104, 159);
INSERT INTO `rq_modules_menu` VALUES(104, 160);
INSERT INTO `rq_modules_menu` VALUES(104, 161);
INSERT INTO `rq_modules_menu` VALUES(104, 162);
INSERT INTO `rq_modules_menu` VALUES(104, 163);
INSERT INTO `rq_modules_menu` VALUES(104, 164);

-- --------------------------------------------------------

--
-- Table structure for table `rq_newsfeeds`
--

CREATE TABLE `rq_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(10) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(10) unsigned NOT NULL DEFAULT '3600',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`published`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_newsfeeds`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_overrider`
--

CREATE TABLE `rq_overrider` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `constant` varchar(255) NOT NULL,
  `string` text NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_overrider`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_redirect_links`
--

CREATE TABLE `rq_redirect_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) NOT NULL,
  `referer` varchar(150) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_link_old` (`old_url`),
  KEY `idx_link_modifed` (`modified_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_redirect_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_rereplacer`
--

CREATE TABLE `rq_rereplacer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `search` text NOT NULL,
  `replace` text NOT NULL,
  `area` text NOT NULL,
  `params` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_rereplacer`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_schemas`
--

CREATE TABLE `rq_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) NOT NULL,
  PRIMARY KEY (`extension_id`,`version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_schemas`
--

INSERT INTO `rq_schemas` VALUES(700, '2.5.4-2012-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `rq_session`
--

CREATE TABLE `rq_session` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `guest` tinyint(4) unsigned DEFAULT '1',
  `time` varchar(14) DEFAULT '',
  `data` mediumtext,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) DEFAULT '',
  `usertype` varchar(50) DEFAULT '',
  PRIMARY KEY (`session_id`),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_session`
--

INSERT INTO `rq_session` VALUES('17a8b6e224dc83b4445dd91eed9ed98b', 1, 0, '1336647481', '__default|a:8:{s:22:"session.client.browser";s:120:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.168 Safari/535.19";s:15:"session.counter";i:40;s:8:"registry";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":4:{s:11:"application";O:8:"stdClass":1:{s:4:"lang";s:0:"";}s:13:"com_templates";O:8:"stdClass":2:{s:6:"styles";O:8:"stdClass":1:{s:10:"limitstart";i:0;}s:4:"edit";O:8:"stdClass":2:{s:5:"style";O:8:"stdClass":2:{s:2:"id";a:0:{}s:4:"data";N;}s:6:"source";O:8:"stdClass":2:{s:2:"id";s:24:"MTAwNDY6Y3NzL21haW4uY3Nz";s:4:"data";N;}}}s:19:"com_advancedmodules";O:8:"stdClass":3:{s:7:"modules";O:8:"stdClass":1:{s:6:"filter";O:8:"stdClass":1:{s:18:"client_id_previous";i:0;}}s:4:"edit";O:8:"stdClass":1:{s:6:"module";O:8:"stdClass":2:{s:2:"id";a:0:{}s:4:"data";N;}}s:3:"add";O:8:"stdClass":1:{s:6:"module";O:8:"stdClass":2:{s:12:"extension_id";N;s:6:"params";N;}}}s:6:"editor";O:8:"stdClass":1:{s:6:"source";O:8:"stdClass":1:{s:6:"syntax";s:3:"css";}}}}s:4:"user";O:5:"JUser":23:{s:9:"\0*\0isRoot";b:1;s:2:"id";s:2:"42";s:4:"name";s:10:"Super User";s:8:"username";s:9:"webmaster";s:5:"email";s:19:"munoz.ict@gmail.com";s:8:"password";s:65:"8c3cbfbed18da09c800beb7a57432b17:vSnEbaqiX7abBbnRBKv5uHCzGIsGpUrd";s:14:"password_clear";s:0:"";s:8:"usertype";s:10:"deprecated";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:12:"registerDate";s:19:"2012-05-02 10:51:12";s:13:"lastvisitDate";s:19:"2012-05-10 09:52:03";s:10:"activation";s:1:"0";s:6:"params";s:0:"";s:6:"groups";a:1:{i:8;s:1:"8";}s:5:"guest";i:0;s:10:"\0*\0_params";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":0:{}}s:14:"\0*\0_authGroups";a:2:{i:0;i:1;i:1;i:8;}s:14:"\0*\0_authLevels";a:4:{i:0;i:1;i:1;i:1;i:2;i:2;i:3;i:3;}s:15:"\0*\0_authActions";N;s:12:"\0*\0_errorMsg";N;s:10:"\0*\0_errors";a:0:{}s:3:"aid";i:0;}s:13:"session.token";s:32:"9ac77a09f2fb6ceca95abf33ea88b10b";s:19:"session.timer.start";i:1336646576;s:18:"session.timer.last";i:1336647481;s:17:"session.timer.now";i:1336647481;}', 42, 'webmaster', '');
INSERT INTO `rq_session` VALUES('6645746b51ea8b3debf17a311cdd1b4e', 0, 1, '1336647458', '__default|a:8:{s:15:"session.counter";i:81;s:19:"session.timer.start";i:1336643634;s:18:"session.timer.last";i:1336647456;s:17:"session.timer.now";i:1336647458;s:22:"session.client.browser";s:120:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.168 Safari/535.19";s:8:"registry";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":0:{}}s:4:"user";O:5:"JUser":23:{s:9:"\0*\0isRoot";b:0;s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:6:"groups";a:0:{}s:5:"guest";i:1;s:10:"\0*\0_params";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":0:{}}s:14:"\0*\0_authGroups";a:1:{i:0;i:1;}s:14:"\0*\0_authLevels";a:2:{i:0;i:1;i:1;i:1;}s:15:"\0*\0_authActions";N;s:12:"\0*\0_errorMsg";N;s:10:"\0*\0_errors";a:0:{}s:3:"aid";i:0;}s:13:"session.token";s:32:"adc65576d440711368cb856d6936c13a";}', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rq_snippets`
--

CREATE TABLE `rq_snippets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `params` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_snippets`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_template_styles`
--

CREATE TABLE `rq_template_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `home` char(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_template` (`template`),
  KEY `idx_home` (`home`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rq_template_styles`
--

INSERT INTO `rq_template_styles` VALUES(2, 'bluestork', 1, '1', 'Bluestork - Default', '{"useRoundedCorners":"1","showSiteName":"0"}');
INSERT INTO `rq_template_styles` VALUES(3, 'atomic', 0, '0', 'Atomic - Default', '{}');
INSERT INTO `rq_template_styles` VALUES(4, 'beez_20', 0, '0', 'Beez2 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/joomla_black.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","templatecolor":"personal","html5":"0"}');
INSERT INTO `rq_template_styles` VALUES(5, 'hathor', 1, '0', 'Hathor - Default', '{"showSiteName":"0","colourChoice":"","boldText":"0"}');
INSERT INTO `rq_template_styles` VALUES(6, 'beez5', 0, '0', 'Beez5 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/sampledata\\/fruitshop\\/fruits.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","html5":"0"}');
INSERT INTO `rq_template_styles` VALUES(7, 'full_screen_2', 0, '1', 'RQ International Theme', '{"width":"95%","width_content":"90%","width_left":"200px","width_right":"200px","user1_width":"30%","user3_width":"30%","user4_width":"30%","user6_width":"30%","height_container":"500","separator":"5","color_link":"#336699","font":"JosefinSansStdLight","font_content":"Verdana","fontSize":"12px","one_slide":"0","slide_interval":"9000","slide_transition":"1"}');

-- --------------------------------------------------------

--
-- Table structure for table `rq_updates`
--

CREATE TABLE `rq_updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `update_site_id` int(11) DEFAULT '0',
  `extension_id` int(11) DEFAULT '0',
  `categoryid` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `description` text NOT NULL,
  `element` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `folder` varchar(20) DEFAULT '',
  `client_id` tinyint(3) DEFAULT '0',
  `version` varchar(10) DEFAULT '',
  `data` text NOT NULL,
  `detailsurl` text NOT NULL,
  `infourl` text NOT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Available Updates' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rq_updates`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_update_categories`
--

CREATE TABLE `rq_update_categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '',
  `description` text NOT NULL,
  `parent` int(11) DEFAULT '0',
  `updatesite` int(11) DEFAULT '0',
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Update Categories' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_update_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_update_sites`
--

CREATE TABLE `rq_update_sites` (
  `update_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `location` text NOT NULL,
  `enabled` int(11) DEFAULT '0',
  `last_check_timestamp` bigint(20) DEFAULT '0',
  PRIMARY KEY (`update_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Update Sites' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rq_update_sites`
--

INSERT INTO `rq_update_sites` VALUES(1, 'Joomla Core', 'collection', 'http://update.joomla.org/core/list.xml', 1, 1336643528);
INSERT INTO `rq_update_sites` VALUES(2, 'Joomla Extension Directory', 'collection', 'http://update.joomla.org/jed/list.xml', 1, 1336643528);
INSERT INTO `rq_update_sites` VALUES(3, 'K2 Updates', 'extension', 'http://getk2.org/update.xml', 1, 1336643528);

-- --------------------------------------------------------

--
-- Table structure for table `rq_update_sites_extensions`
--

CREATE TABLE `rq_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`update_site_id`,`extension_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Links extensions to update sites';

--
-- Dumping data for table `rq_update_sites_extensions`
--

INSERT INTO `rq_update_sites_extensions` VALUES(1, 700);
INSERT INTO `rq_update_sites_extensions` VALUES(2, 700);
INSERT INTO `rq_update_sites_extensions` VALUES(3, 10063);

-- --------------------------------------------------------

--
-- Table structure for table `rq_usergroups`
--

CREATE TABLE `rq_usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `title` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  KEY `idx_usergroup_title_lookup` (`title`),
  KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rq_usergroups`
--

INSERT INTO `rq_usergroups` VALUES(1, 0, 1, 20, 'Public');
INSERT INTO `rq_usergroups` VALUES(2, 1, 6, 17, 'Registered');
INSERT INTO `rq_usergroups` VALUES(3, 2, 7, 14, 'Author');
INSERT INTO `rq_usergroups` VALUES(4, 3, 8, 11, 'Editor');
INSERT INTO `rq_usergroups` VALUES(5, 4, 9, 10, 'Publisher');
INSERT INTO `rq_usergroups` VALUES(6, 1, 2, 5, 'Manager');
INSERT INTO `rq_usergroups` VALUES(7, 6, 3, 4, 'Administrator');
INSERT INTO `rq_usergroups` VALUES(8, 1, 18, 19, 'Super Users');

-- --------------------------------------------------------

--
-- Table structure for table `rq_users`
--

CREATE TABLE `rq_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `idx_block` (`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `rq_users`
--

INSERT INTO `rq_users` VALUES(42, 'Super User', 'webmaster', 'munoz.ict@gmail.com', '8c3cbfbed18da09c800beb7a57432b17:vSnEbaqiX7abBbnRBKv5uHCzGIsGpUrd', 'deprecated', 0, 1, '2012-05-02 10:51:12', '2012-05-10 10:42:56', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `rq_user_notes`
--

CREATE TABLE `rq_user_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_category_id` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_user_notes`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_user_profiles`
--

CREATE TABLE `rq_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table';

--
-- Dumping data for table `rq_user_profiles`
--


-- --------------------------------------------------------

--
-- Table structure for table `rq_user_usergroup_map`
--

CREATE TABLE `rq_user_usergroup_map` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rq_user_usergroup_map`
--

INSERT INTO `rq_user_usergroup_map` VALUES(42, 8);

-- --------------------------------------------------------

--
-- Table structure for table `rq_viewlevels`
--

CREATE TABLE `rq_viewlevels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_assetgroup_title_lookup` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rq_viewlevels`
--

INSERT INTO `rq_viewlevels` VALUES(1, 'Public', 0, '[1]');
INSERT INTO `rq_viewlevels` VALUES(2, 'Registered', 1, '[6,2,8]');
INSERT INTO `rq_viewlevels` VALUES(3, 'Special', 2, '[6,3,8]');

-- --------------------------------------------------------

--
-- Table structure for table `rq_weblinks`
--

CREATE TABLE `rq_weblinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if link is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`),
  KEY `idx_language` (`language`),
  KEY `idx_xreference` (`xreference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rq_weblinks`
--


-- --------------------------------------------------------

--
-- Structure for view `rq_jf_languages`
--
DROP TABLE IF EXISTS `rq_jf_languages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`administrator`@`localhost` SQL SECURITY DEFINER VIEW `rq_jf_languages` AS select `l`.`lang_id` AS `lang_id`,`l`.`lang_code` AS `lang_code`,`l`.`title` AS `title`,`l`.`title_native` AS `title_native`,`l`.`sef` AS `sef`,`l`.`description` AS `description`,`l`.`published` AS `published`,`l`.`image` AS `image`,`lext`.`image_ext` AS `image_ext`,`lext`.`fallback_code` AS `fallback_code`,`lext`.`params` AS `params`,`lext`.`ordering` AS `ordering` from (`rq_languages` `l` left join `rq_jf_languages_ext` `lext` on((`l`.`lang_id` = `lext`.`lang_id`))) order by `lext`.`ordering`;
