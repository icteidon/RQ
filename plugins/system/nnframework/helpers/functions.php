<?php
/**
 * NoNumber Framework Helper File: Functions
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
 * Functions
 */
class NNFunctions
{
	public static $instance = null;

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new NNFrameworkFunctions;
		}

		return self::$instance;
	}

	public static function getFunctions()
	{
		// backward compatibility
		return self::getInstance();
	}
}

class NNFrameworkFunctions
{
	var $_version = '12.5.1';

	static function getJSVersion()
	{
		if (defined('JVERSION')
			&& version_compare(JVERSION, '1.5', '>=')
			&& version_compare(JVERSION, '1.6', '<')
		) {
			$app = JFactory::getApplication();
			if ($app->get('MooToolsVersion', '1.11') != '1.11') {
				return '_1.2';
			} else {
				return '';
			}
		} else {
			return '';
		}
	}

	static function getMooToolsVersion($force = 0)
	{
		switch ($force) {
			case 1:
				$version = '_mt11';
				break;
			case 2:
				$version = '';
				break;
			default:
				$version = '_mt11';
				if (defined('JVERSION')
					&& version_compare(JVERSION, '1.6', '<')
				) {
					$app = JFactory::getApplication();
					if ($app->get('MooToolsVersion', '1.11') != '1.11') {
						$version = '';
					}
				}
				break;
		}
		return $version;
	}

	static function dateToDateFormat($dateFormat)
	{
		$caracs = array(
			// Day
			'%d'  => 'd',
			'%a'  => 'D',
			'%#d' => 'j',
			'%A'  => 'l',
			'%u'  => 'N',
			'%w'  => 'w',
			'%j'  => 'z',
			// Week
			'%V'  => 'W',
			// Month
			'%B'  => 'F',
			'%m'  => 'm',
			'%b'  => 'M',
			// Year
			'%G'  => 'o',
			'%Y'  => 'Y',
			'%y'  => 'y',
			// Time
			'%P'  => 'a',
			'%p'  => 'A',
			'%l'  => 'g',
			'%I'  => 'h',
			'%H'  => 'H',
			'%M'  => 'i',
			'%S'  => 's',
			// Timezone
			'%z'  => 'O',
			'%Z'  => 'T',
			// Full Date / Time
			'%s'  => 'U'
		);
		return strtr((string) $dateFormat, $caracs);
	}

	static function dateToStrftimeFormat($dateFormat)
	{
		$caracs = array(
			// Day - no strf eq : S
			'd'  => '%d',
			'D'  => '%a',
			'jS' => '%#d[TH]',
			'j'  => '%#d',
			'l'  => '%A',
			'N'  => '%u',
			'w'  => '%w',
			'z'  => '%j',
			// Week - no date eq : %U, %W
			'W'  => '%V',
			// Month - no strf eq : n, t
			'F'  => '%B',
			'm'  => '%m',
			'M'  => '%b',
			// Year - no strf eq : L; no date eq : %C, %g
			'o'  => '%G',
			'Y'  => '%Y',
			'y'  => '%y',
			// Time - no strf eq : B, G, u; no date eq : %r, %R, %T, %X
			'a'  => '%P',
			'A'  => '%p',
			'g'  => '%l',
			'h'  => '%I',
			'H'  => '%H',
			'i'  => '%M',
			's'  => '%S',
			// Timezone - no strf eq : e, I, P, Z
			'O'  => '%z',
			'T'  => '%Z',
			// Full Date / Time - no strf eq : c, r; no date eq : %c, %D, %F, %x
			'U'  => '%s'
		);
		return strtr((string) $dateFormat, $caracs);
	}

	static function html_entity_decoder($given_html, $quote_style = ENT_QUOTES, $charset = 'UTF-8')
	{
		if (is_array($given_html)) {
			foreach ($given_html as $i => $html) {
				$given_html[$i] = self::html_entity_decoder($html);
			}
			return $given_html;
		}
		return html_entity_decode($given_html, $quote_style, $charset);
	}

	static function cleanTitle($str, $striptags = 0)
	{
		// remove comment tags
		$str = preg_replace('#<\!--.*?-->#s', '', $str);

		if ($striptags) {
			// remove html tags
			$str = preg_replace('#</?[a-z][^>]*>#usi', '', $str);
		}

		return trim($str);
	}

	static function setSurroundingTags($pre, $post, $tags = 0)
	{
		if ($tags == 0) {
			$tags = array('div', 'p', 'span', 'pre', 'a',
				'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
				'strong', 'b', 'em', 'i', 'u', 'big', 'small', 'font'
			);
		}
		$a = explode('<', $pre);
		$b = explode('</', $post);
		if (count($b) > 1 && count($a) > 1) {
			$a = array_reverse($a);
			$a_pre = array_pop($a);
			$b_pre = array_shift($b);
			$a_tags = $a;
			foreach ($a_tags as $i => $a_tag) {
				$a[$i] = '<'.trim($a_tag);
				$a_tags[$i] = preg_replace('#^([a-z0-9]+).*$#', '\1', trim($a_tag));
			}
			$b_tags = $b;
			foreach ($b_tags as $i => $b_tag) {
				$b[$i] = '</'.trim($b_tag);
				$b_tags[$i] = preg_replace('#^([a-z0-9]+).*$#', '\1', trim($b_tag));
			}
			foreach ($b_tags as $i => $b_tag) {
				if ($b_tag && in_array($b_tag, $tags)) {
					foreach ($a_tags as $j => $a_tag) {
						if ($b_tag == $a_tag) {
							$a_tags[$i] = '';
							$b[$i] = trim(preg_replace('#^</'.$b_tag.'.*?>#', '', $b[$i]));
							$a[$j] = trim(preg_replace('#^<'.$a_tag.'.*?>#', '', $a[$j]));
							break;
						}
					}
				}
			}
			foreach ($a_tags as $i => $tag) {
				if ($tag && in_array($tag, $tags)) {
					array_unshift($b, trim($a[$i]));
					$a[$i] = '';
				}
			}
			$a = array_reverse($a);
			list($pre, $post) = array(implode('', $a), implode('', $b));
		}
		return array(trim($pre), trim($post));
	}

	static function isEditPage()
	{
		return (
			in_array(JRequest::getCmd('task'), array('edit', 'form', 'submission'))
				|| in_array(JRequest::getCmd('do'), array('edit', 'form'))
				|| in_array(JRequest::getCmd('view'), array('edit', 'form'))
				|| in_array(JRequest::getCmd('layout'), array('edit', 'form', 'write'))
				|| in_array(JRequest::getCmd('option'), array('com_contentsubmit', 'com_cckjseblod'))
		);
	}

	static function getFormRegex($regex_format = 0)
	{
		$regex = '(<'.'form [^>]*(id|name)="(adminForm|postform|submissionForm|default_action_user)")';

		if ($regex_format) {
			$regex = '#'.$regex.'#si';
		}

		return $regex;
	}

	// Protect complete adminForm (to prevent articles from being created when editing articles and such)
	static function protectForm(&$string, $tags = array(), $protected = array())
	{
		if (!NNFrameworkFunctions::isEditPage()) {
			return;
		}

		if (!is_array($tags)) {
			$tags = array($tags);
		}

		if (empty ($protected)) {
			$protected = array();
			foreach ($tags as $i => $tag) {
				$protected[$i] = base64_encode($tag);
			}
		}

		$string = preg_replace(NNFrameworkFunctions::getFormRegex(1), '<!-- TMP_START_EDITOR -->\1', $string);
		$string = explode('<!-- TMP_START_EDITOR -->', $string);

		foreach ($string as $i => $str) {
			if (!empty($str) != '' && fmod($i, 2)) {
				$pass = 0;
				foreach ($tags as $tag) {
					if (!(strpos($str, $tag) === false)) {
						$pass = 1;
						break;
					}
				}
				if ($pass) {
					$str = explode('</form>', $str, 2);
					// protect tags only inside form fields
					if (preg_match_all('#(<textarea[^>]*>.*?<\/textarea>|<input[^>]*>)#si', $str['0'], $matches, PREG_SET_ORDER) > 0) {
						foreach ($matches as $match) {
							$field = str_replace($tags, $protected, $match['0']);
							$str['0'] = str_replace($match['0'], $field, $str['0']);
						}
					}
					$string[$i] = implode('</form>', $str);
				}
			}
		}

		$string = implode('', $string);
	}

	// Replace any protected tags to original
	static function unprotectForm(&$string, $tags = array(), $protected = array())
	{
		if (!is_array($tags)) {
			$tags = array($tags);
		}

		if (empty ($protected)) {
			$protected = array();
			foreach ($tags as $i => $tag) {
				$protected[$i] = base64_encode($tag);
			}
		}

		$string = str_replace($protected, $tags, $string);
	}
}