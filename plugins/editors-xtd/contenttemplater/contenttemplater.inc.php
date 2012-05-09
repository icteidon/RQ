<?php
/**
 * Main Component File
 * Used for the editor button (template xml)
 *
 * @package			Content Templater
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

// Load common functions
require_once JPATH_PLUGINS.'/system/nnframework/helpers/functions.php';

$user = JFactory::getUser();
if ($user->get('guest')) {
	JError::raiseError(403, JText::_("ALERTNOTAUTH"));
}

$app = JFactory::getApplication();
if ($app->isSite()) {
	$params = JComponentHelper::getParams('com_contenttemplater');
	if (!$params->get('enable_frontend', 1)) {
		JError::raiseError(403, JText::_("ALERTNOTAUTH"));
	}
}

$class = new plgButtonContentTemplaterData();
$class->render();
die;

class plgButtonContentTemplaterData
{
	function render()
	{
		header('Content-Type: text/html; charset=utf-8');

		$id = JRequest::getInt('id');

		if (!$id) {
			return;
		}

		$nocontent = JRequest::getInt('nocontent', 0);
		$unprotected = (JFactory::getUser()->authorise('core.manage', 'com_contenttemplater')) ? JRequest::getInt('unprotect') : 0;

		require_once JPATH_ADMINISTRATOR.'/components/com_contenttemplater/models/item.php';

		// Create a new class of classname and set the default task: display
		$model = new ContentTemplaterModelItem();
		$item = $model->getItem($id);

		$output = array();

		$ignore = array(
			'view_state',
			'id',
			'ordering',
			'name',
			'description',
			'ordering',
			'published',
			'checked_out',
			'checked_out_time',
			'show_url_field_sef',
			'show_url_field'
		);

		foreach ($item as $key => $val) {
			if (is_string($val)
				&& $val != ''
				&& !isset($output[$key])
				&& !in_array($key, $ignore)
				&& strpos($key, '@') !== 0
				&& strpos($key, 'button_') !== 0
				&& strpos($key, 'load_') !== 0
				&& strpos($key, 'url_') !== 0
			) {
				if ($key == 'content' && $nocontent) {
					continue;
				}
					$default = '';
					if (isset($item->defaults->$key)) {
						$default = $item->defaults->$key;
					}
					if ($val != $default) {
						if (strpos($key, 'jform_') === 0 && $val == -2) {
							$val = '';
						}
						$output[$key] = $this->getStr($model, $key, $val, $default);
					}
			}
		}


		$str = implode("\n", $output);
		if (!$unprotected) {
			$str = base64_encode($str);
			$str = wordwrap($str, 80, "\n", 1);
		}
		echo $str;
	}

	function getStr(&$item, $key, $val, $default = '')
	{
		switch ($key) {
			case 'categories_k2':
				$key = 'catid';
				break;
			case 'categories_mr':
			case 'categories_zoo':
				$key = 'categories';
				break;
		}
		if ($key != 'content') {
			$this->makeSafeHtml($val);
		}
		$item->replaceVars($val);

		return '[CT]'.$key.'[CT]'.$default.'[CT]'.$val.'[/CT]';
	}

	function makeSafeHtml(&$str)
	{
		//return html_entity_decode( $str, ENT_QUOTES, 'UTF-8' );
		// TEST IF THIS WORKS ON ALL SETUPS!!!!
		// html_entity_decode GAVE TIMEOUTS ON SOME SETUPS?!?!

		if ($str == '') {
			return;
		}

		static $trans_tbl;

		// replace numeric entities
		$str = preg_replace('~&#x([0-9a-f]+);~ei', 'code2utf(hexdec("\1"))', $str);
		$str = preg_replace('~&#([0-9]+);~e', 'code2utf(\1)', $str);

		// replace literal entities
		if (!isset($trans_tbl)) {
			$trans_tbl = array();

			foreach (get_html_translation_table(HTML_ENTITIES) as $val => $key) {
				$trans_tbl[$key] = utf8_encode($val);
			}
		}

		$str = strtr($str, $trans_tbl);
	}
}