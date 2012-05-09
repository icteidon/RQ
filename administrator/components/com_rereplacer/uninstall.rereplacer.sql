--
-- Database query file
-- For uninstallation
--
-- @package			ReReplacer
-- @version			4.1.0
--
-- @author			Peter van Westen <peter@nonumber.nl>
-- @link			http://www.nonumber.nl
-- @copyright		Copyright © 2012 NoNumber All Rights Reserved
-- @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
--

DELETE FROM `#__extensions` WHERE `type` = 'plugin' AND `element` = 'rereplacer';