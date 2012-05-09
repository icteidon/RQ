<?php
/**
* CHRONOFORMS version 4.0
* Copyright (c) 2006 - 2011 Chrono_Man, ChronoEngine.com. All rights reserved.
* Author: Chrono_Man (ChronoEngine.com)
* @license		GNU/GPL
* Visit http://www.ChronoEngine.com for regular updates and information.
**/
class CfactionShowHtmlHelper{
	function loadAction($form, $actiondata){
		$params = new JParameter($actiondata->params);
		$output = '';
		$mainframe =& JFactory::getApplication();
		$uri =& JFactory::getURI();
		$document =& JFactory::getDocument();
		//set form's HTML name and ID
		$form->html_form_name = isset($form->html_form_name) ? $form->html_form_name : $form->form_name;
		$form->html_form_id = isset($form->html_form_id) ? $form->html_form_id : 'chronoform_'.$form->form_name;
		//check the assets files to be loaded
		if((int)$form->form_params->get('load_files', 1) > 0){
			//load form css files
			if((bool)$form->form_params->get('tight_layout', 0) === false){
				$document->addStyleSheet($uri->root().'components/com_chronoforms/css/frontforms.css');
			}else{
				$document->addStyleSheet($uri->root().'components/com_chronoforms/css/frontforms_tight.css');
			}
		}
		if(($form->form_params->get('enable_jsvalidation', 1) || (strpos($form->form_details->content, 'validate[') !== false && $form->form_params->get('auto_detect_settings', 1))) && (int)$form->form_params->get('load_files', 1) > 0){
			//load js validation code
			$this->_loadValidationScripts($form);
		}
		$datetime_picker_selector = $form->form_params->get('datepicker_config', '');
		if((!empty($datetime_picker_selector) || strpos($form->form_details->content, 'cf_date_picker') !== false || strpos($form->form_details->content, 'cf_time_picker') !== false || strpos($form->form_details->content, 'cf_datetime_picker') !== false) && (int)$form->form_params->get('load_files', 1) > 0){
			//load js for the date time picker
			$jversion = new JVersion();
			if(($jversion->RELEASE > 1.5) && $form->form_params->get('datepicker_type', 0) == 1){
				$this->_loadDatePickerScripts_moo($form);
			}else{
				$this->_loadDatePickerScripts($form);
			}
		}
		
		if((strpos($form->form_details->content, 'tooltipimg') !== false) && (int)$form->form_params->get('load_files', 1) > 0){
			//load the tooltips files
			$this->_loadToolTip($form);
		}
		
		if(!empty($form->validation_errors) && (int)$form->form_params->get('load_files', 1) > 0){
			//add the validation style
			$this->_loadSSValidation($form);
		}
		
		//check if form tags should be added or not
		if($form->form_params->get('add_form_tags', 1)){
			$output .= "<form ";
			$form_tag_array = array();
			if(trim($form->form_params->get('action_url', ''))){
				$form_tag_array[] = 'action="'.$form->form_params->get('action_url', '').'"';
			}else{
				$action_url = 'index.php?option=com_chronoforms&amp;chronoform='.$form->form_name;
				if($form->form_params->get('relative_url', 1) == 1){
					$action_url = $this->selfURL();
					if((bool)$form->disguised === true){
						//disguise mode, the event will be used as a task for the parent app
						preg_match_all('/(&*)task=([^&]+)/is', $action_url, $chronoform_matches);
						$action_url = str_replace($chronoform_matches[0], '', $action_url);
						$separator = $this->_getURLSeparator($action_url);
						if(isset($form->data['task']) && !empty($form->data['task']) && strpos($action_url, $form->data['task']) !== false){
							//this is propably a SEF URL
							$action_url = str_replace($form->data['task'], $params->get('submit_event', 'submit'), $action_url);
						}else{
							$action_url .= $separator.'task='.$params->get('submit_event', 'submit');
						}
					}else{
						preg_match_all('/(&*)event=([^&]+)/is', $action_url, $event_matches);
						$action_url = str_replace($event_matches[0], '', $action_url);
						//strip the form name if exists and add own form name
						preg_match_all('/(&*)chronoform=([^&]+)/is', $action_url, $chronoform_matches);
						$action_url = str_replace($chronoform_matches[0], '', $action_url);
						$separator = $this->_getURLSeparator($action_url);										
						$action_url .= $separator.'chronoform='.$form->form_name;
					}
				}
				if((bool)$form->disguised === false){
					$separator = $this->_getURLSeparator($action_url);
					$action_url .= $separator.'event='.$params->get('submit_event', 'submit');
				}
				//attach the itemid if exists
				$item_id = JRequest::getVar('Itemid', '');
				if(!empty($item_id) && stripos($this->selfURL(), 'Itemid') !== false && strpos($action_url, 'Itemid') === false){
					$separator = $this->_getURLSeparator($action_url);
					$action_url .= $separator.'Itemid='.$item_id;
				}
				//attach the session id if it exists in the data array
				$session_key_param = $form->form_params->get('session_key_param', 'cf_sid');
				//if(isset($form->data[$session_key_param]) && !empty($form->data[$session_key_param])){
				if(isset($form->session_token) && !empty($form->session_token)){
					preg_match_all('/(&*)'.$session_key_param.'=([^&]+)/is', $action_url, $session_key_param_matches);
					$action_url = str_replace($session_key_param_matches[0], '', $action_url);
					$separator = $this->_getURLSeparator($action_url);
					$action_url .= $separator.$session_key_param.'='.$form->session_token;
				}
				//fix the ampersand
				$action_url = str_replace('&amp;', '&', $action_url);
				$action_url = str_replace('&&', '&', $action_url);
				$action_url = str_replace('&', '&amp;', $action_url);
				//add the action URL to the form tag pieces array
				$form_tag_array[] = 'action="'.$action_url.'"';
			}
			$form_tag_array[] = 'name="'.$form->html_form_name.'"';
			$form_tag_array[] = 'id="'.$form->html_form_id.'"';
			$enctype = '';
			$method = $form->form_params->get('form_method', 'post');
			if($method == 'file' || ($form->form_params->get('auto_detect_settings', 1) && (stripos($form->form_details->content, 'type="file"') !== false || stripos($form->form_details->content, "type='file'") !== false))){
				$method = 'post';
				$enctype = 'enctype="multipart/form-data"';
			}
			//add the form method
			$form_tag_array[] = 'method="'.$method.'"';
			//add the enctype if exists
			$form_tag_array[] = $enctype;
			//add the form class
			$form_tag_array[] = 'class="Chronoform"';
			//add any attachments
			if(trim($form->form_params->get('form_tag_attach', ''))){
				$form_tag_array[] = $form->form_params->get('form_tag_attach', '');
			}
			//build the form tag
			$output .= implode(" ", array_filter($form_tag_array)).'>';
		}
		
		//show error messages
		$this->_showErrors($form);
		//echo $output;
		ob_start();
		eval('?>'.$form->form_details->content);
		$temp_output = ob_get_clean();
		//check the page to view
		if(preg_match("/<!--_CHRONOFORMS_PAGE_BREAK_-->/i", $temp_output)){
			$form_pages = explode("<!--_CHRONOFORMS_PAGE_BREAK_-->", $temp_output);
			$active_page_index = (int)$params->get('page_number', 1) - 1;
			$output .= $form_pages[$active_page_index];
		}else{
			$output .= $temp_output;
		}
		//add any extra content
		$output .= $form->extra_content;
		//Load any form data
		if((int)$params->get('data_republish', 1) == 1){
			include_once(JPATH_SITE.DS.'components'.DS.'com_chronoforms'.DS.'libraries'.DS.'includes'.DS.'data_republish.php');
			$HTMLFormPostDataLoad = new HTMLFormPostDataLoad();
			//$HTMLFormPostDataLoad->validation_errors = $form->validation_errors;
			if(isset($form->data['chrono_verification']) && !empty($form->data['chrono_verification'])){
				$form->data['chrono_verification'] = '';
			}
			$output = $HTMLFormPostDataLoad->load($output, $form->data);
		}
		//Display any form errors
		if((int)$params->get('display_errors', 1) == 1){
			include_once(JPATH_SITE.DS.'components'.DS.'com_chronoforms'.DS.'libraries'.DS.'includes'.DS.'display_errors.php');
			$HTMLFormPostDisplayErrors = new HTMLFormPostDisplayErrors();
			$HTMLFormPostDisplayErrors->validation_errors = $form->validation_errors;
			$output = $HTMLFormPostDisplayErrors->load($output, $form->data);
		}
		//Replace curly fields names
		if((int)$params->get('curly_replacer', 1) == 1){
			$output = $form->curly_replacer($output, $form->data);
		}
		//load token if enabled
		if((int)$params->get('load_token', 1) == 1){
			$output .= JHTML::_('form.token');
		}
		//load keep alive if enabled
		if((int)$params->get('keep_alive', 0) == 1){
			JHTML::_('behavior.keepalive');
		}
		
		
		//check if form tags should be added or not
		if($form->form_params->get('add_form_tags', 1)){
			$output .= "</form>";
		}
		echo $output;
	}
	
	function _getURLSeparator($url = ''){
		$separator = '';
		$action_url = $url;
		if(strpos($action_url, '?') !== false && substr($action_url, -1) != '?'){
			$separator = '&amp;';
		}
		if(strpos($action_url, '?') === false){
			$separator = '?';
		}
		return $separator;
	}
	
	function _showErrors($form){
		if(!empty($form->validation_errors) && $form->form_params->get('show_top_errors', 1)){
			$mainframe =& JFactory::getApplication();
			$uri =& JFactory::getURI();
			$document =& JFactory::getDocument();
			$document->addStyleSheet($uri->root().'components/com_chronoforms/css/error.css');
			echo '<span class="cf_alert"><ol><li>'.implode('</li><li>', $this->_normalize($form->validation_errors)).'</li></ol></span>';
		}
	}
	
	function _normalize($array = array()){
		$return = array();
		foreach($array as $k => $v){
			if(is_array($v)){
				$return = array_merge($this->_normalize($v), $return);
			}else{
				$return[] = $v;
			}
		}
		return $return;
	}
	
	
    function _loadValidationScripts($form){
		if($form->loaded_validation === false){
			$document =& JFactory::getDocument();
			JHTML::_('behavior.mootools');
			$mainframe =& JFactory::getApplication();
			$uri =& JFactory::getURI();
			$form->html_form_name = isset($form->html_form_name) ? $form->html_form_name : $form->form_name;
			$form->html_form_id = isset($form->html_form_id) ? $form->html_form_id : 'chronoform_'.$form->form_name;
			$document->addStyleSheet($uri->root().'components/com_chronoforms/css/formcheck/theme/'.$form->form_params->get('jsvalidation_theme', 'classic').'/formcheck.css');
			$document->addStyleSheet($uri->root().'components/com_chronoforms/css/formcheck_fix.css');
			$document->addScript($uri->root().'components/com_chronoforms/js/formcheck/formcheck-yui.js');
			$document->addScript($uri->root().'components/com_chronoforms/js/formcheck/formcheck-max.js');
			$validationClass = "FormCheck";
			//check for JPanes existance
			if(strpos($form->form_details->content, 'jimport("joomla.html.pane");') !== false){
				//load jpanes validation fix
				$document->addScript($uri->root().'components/com_chronoforms/js/formcheck/formcheck-jpane.js');
				$validationClass = "FormCheckJPane";
			}
			if(((bool)$form->form_params->get('jsvalidation_errors', 1) === true) && ($validationClass == "FormCheck")){
				$validationClass = "FormCheckMax";
			}
			$document->addScript($uri->root().'components/com_chronoforms/js/formcheck/lang/'.$form->form_params->get('jsvalidation_lang', 'en').'.js');
			ob_start();
			?>
			window.addEvent('domready', function() {
				$('<?php echo $form->html_form_id; ?>').addClass('hasValidation');
				formCheck_<?php echo str_replace("-", "_", $form->html_form_name); ?> = new <?php echo $validationClass; ?>('<?php echo $form->html_form_id; ?>', {
					onValidateSuccess: <?php echo $form->form_params->get('jsvalidation_onValidateSuccess', "\$empty"); ?>,
					display : {
						showErrors : <?php echo $form->form_params->get('jsvalidation_showErrors', 0); ?>,
						errorsLocation: <?php echo $form->form_params->get('jsvalidation_errorsLocation', 1); ?>
					}
				});										
			});
			<?php
			$script = ob_get_clean();
			if((bool)$form->form_params->get('dynamic_files', 0) === false){
				$document->addScriptDeclaration("//<![CDATA["."\n".$script."\n"."//]]>");
			}else{
				//load the action class
				$form->loadActionHelper('load_js');
				$CfactionLoadJsHelper = new CfactionLoadJsHelper();
				$JSactiondata = new stdClass();
				$JSactiondata->content1 = $script;
				$JSParams = new JParameter('');
				$JSParams->set('dynamic_file', $form->form_params->get('dynamic_files', 0));
				$JSactiondata->params = $JSParams->toString();
				$CfactionLoadJsHelper->load($form, $JSactiondata);
			}
			//set validation loaded
			$form->loaded_validation = true;
		}
    }
	
	function _loadDatePickerScripts($form){
		$document =& JFactory::getDocument();
		JHTML::_('behavior.mootools');
		$mainframe =& JFactory::getApplication();
		$uri =& JFactory::getURI();
		$document->addStyleSheet($uri->root().'components/com_chronoforms/css/datepicker/datepicker_dashboard.css');
		$document->addScript($uri->root().'components/com_chronoforms/js/datepicker/datepicker.js');
		$settings = array(
						"'.cf_date_picker', {pickerClass: 'datepicker_dashboard', format: 'Y-m-d', inputOutputFormat: 'Y-m-d', allowEmpty: true", 
						"'.cf_datetime_picker', {pickerClass: 'datepicker_dashboard', inputOutputFormat: 'Y-m-d H:i:s', timePicker: true, allowEmpty: true, format: 'd-m-Y H:i:s'", 
						"'.cf_time_picker', {pickerClass: 'datepicker_dashboard', inputOutputFormat: 'H:i:s', timePickerOnly: true, allowEmpty: true, format: 'H:i:s'"
						);
		//$selector = 'dateTimePicker';
		$datepicker_ext = $form->form_params->get('datepicker_config', '');
		
		ob_start();
		?>
			window.addEvent('load', function() {
				<?php
				foreach($settings as $setting):
					if(!empty($datepicker_ext)){
						$setting .= ", ".$datepicker_ext;
						$setting .= "}";
					}else{
						$setting .= "}";
					}
				?>
				new DatePicker(<?php echo $setting; ?>);<?php echo "\n"; ?>
				<?php endforeach; ?>
			});
		<?php
		$script = ob_get_clean();
		if((bool)$form->form_params->get('dynamic_files', 0) === false){
			$document->addScriptDeclaration("//<![CDATA["."\n".$script."\n"."//]]>");
		}else{
			//load the action class
			$form->loadActionHelper('load_js');
			$CfactionLoadJsHelper = new CfactionLoadJsHelper();
			$JSactiondata = new stdClass();
			$JSactiondata->content1 = $script;
			$JSParams = new JParameter('');
			$JSParams->set('dynamic_file', $form->form_params->get('dynamic_files', 0));
			$JSactiondata->params = $JSParams->toString();
			$CfactionLoadJsHelper->load($form, $JSactiondata);
		}
	}
	
	function _loadDatePickerScripts_moo($form){
		$document =& JFactory::getDocument();
		JHTML::_('behavior.mootools');
		$mainframe =& JFactory::getApplication();
		$uri =& JFactory::getURI();
		$cf_url = $uri->root();//($mainframe->isSite()) ? JURI::Base() : $uri->root();
		$cf_url .= 'components/com_chronoforms/js/datepicker_moo/';

		// you can change the uncommented line here to change the style
		$datepicker_style = $form->form_params->get('datepicker_moo_style', 'datepicker_dashboard');
		//$datepicker_style = 'datepicker_jqui';
		//$datepicker_style = 'datepicker_vista';
		$document->addStyleSheet($cf_url.$datepicker_style.'/'.$datepicker_style.'.css');
		$document->addScript($cf_url.'Locale.en-US.DatePicker.js');
		$document->addScript($cf_url.'Picker.js');
		$document->addScript($cf_url.'Picker.Attach.js');
		$document->addScript($cf_url.'Picker.Date.js');

		$settings = array();

		// Settings for standard date picker
		$settings[1]['class'] = '.cf_date_picker';
		$settings[1]['options'] = array(
			"pickerClass: '{$datepicker_style}'",
			"format: '%Y-%m-%d'",
			"allowEmpty: true",
			"useFadeInOut: !Browser.ie"
		);

		// Settings for standard date + time picker
		$settings[2]['class'] = '.cf_datetime_picker';
		$settings[2]['options'] = array(
			"pickerClass: '{$datepicker_style}'",
			"format: '%d-%m-%Y %H:%M:%S'",
			"timePicker: true",
			"allowEmpty: true",
			"useFadeInOut: !Browser.ie"
		);

		// Settings for standard time picker
		$settings[3]['class'] = '.cf_time_picker';
		$settings[3]['options'] = array(
			"pickerClass: '{$datepicker_style}'",
			"format: '%H:%M:%S'",
			"pickOnly: 'time'",
			"allowEmpty: true",
			"useFadeInOut: !Browser.ie"
		);

		$datepicker_ext = $form->form_params->get('datepicker_config', '');
		$script = "";
		foreach($settings as $s){
			$options = implode(', ', $s['options']);
			if($datepicker_ext){
				$options .= ', '.$datepicker_ext;
			}
			$script .= "
			new Picker.Date($$('{$s['class']}'), {
			{$options}
			});
			";
		}
		$script = "
		window.addEvent('load', function() {
		{$script}
		});
		";

		if((bool)$form->form_params->get('dynamic_files', 0) === false){
			$document->addScriptDeclaration($script);
		}else{
			//load the action class
			$form->loadActionHelper('load_js');
			$CfactionLoadJsHelper = new CfactionLoadJsHelper();
			$JSactiondata = new stdClass();
			$JSactiondata->content1 = $script;
			$JSParams = new JParameter('');
			$JSParams->set('dynamic_file', $form->form_params->get('dynamic_files', 0));
			$JSactiondata->params = $JSParams->toString();
			$CfactionLoadJsHelper->load($form, $JSactiondata);
		}
	}
	
	function _loadSSValidation($form){
		$document =& JFactory::getDocument();
		JHTML::_('behavior.mootools');
		ob_start();
		?>
			window.addEvent('domready', function() {
				$$('.error-message').each(function(element){
					if($chk(element.getParent('.ccms_form_element'))){
						element.getParent('.ccms_form_element').addClass('form-error');
					}
				});									
			});
		<?php
		$script = ob_get_clean();
		if((bool)$form->form_params->get('dynamic_files', 0) === false){
			$document->addScriptDeclaration("//<![CDATA["."\n".$script."\n"."//]]>");
		}else{
			//load the action class
			$form->loadActionHelper('load_js');
			$CfactionLoadJsHelper = new CfactionLoadJsHelper();
			$JSactiondata = new stdClass();
			$JSactiondata->content1 = $script;
			$JSParams = new JParameter('');
			$JSParams->set('dynamic_file', $form->form_params->get('dynamic_files', 0));
			$JSactiondata->params = $JSParams->toString();
			$CfactionLoadJsHelper->load($form, $JSactiondata);
		}
	}
    
    function _loadToolTip($form){
		$mainframe =& JFactory::getApplication();
		$uri =& JFactory::getURI();
    	$document =& JFactory::getDocument();
		JHTML::_('behavior.mootools');
		echo '<link href="'.$uri->root().'components/com_chronoforms/css/tooltip.css" rel="stylesheet" type="text/css" />';
		//JHTML::_('behavior.tooltip', '.tooltipimg');
		ob_start();
		?>
			window.addEvent('domready', function(){
				//create the tooltips
				var tipz = new Tips($$('div.tooltipimg'),{
					className: 'tooltipbox',
					fixed: true,
					hideDelay: 0,
					showDelay: 0
				});
			});
		<?php
		$script = ob_get_clean();
		if((bool)$form->form_params->get('dynamic_files', 0) === false){
			$document->addScriptDeclaration("//<![CDATA["."\n".$script."\n"."//]]>");
		}else{
			//load the action class
			$form->loadActionHelper('load_js');
			$CfactionLoadJsHelper = new CfactionLoadJsHelper();
			$JSactiondata = new stdClass();
			$JSactiondata->content1 = $script;
			$JSParams = new JParameter('');
			$JSParams->set('dynamic_file', $form->form_params->get('dynamic_files', 0));
			$JSactiondata->params = $JSParams->toString();
			$CfactionLoadJsHelper->load($form, $JSactiondata);
		}
    }
	
	function selfURL() {
		$uri =& JURI::getInstance();
		$inbetween = '';
		if($uri->getQuery())$inbetween = '?';
		//php4
		// Now we need to clean what we got since we can't trust the server var
		$theURI = $uri->getQuery();
		$theURI = urldecode($theURI);
		$theURI = str_replace('"', '&quot;',$theURI);
		$theURI = str_replace('<', '&lt;',$theURI);
		$theURI = str_replace('>', '&gt;',$theURI);
		$theURI = preg_replace('/eval\((.*)\)/', '', $theURI);
		$theURI = preg_replace('/[\\\"\\\'][\\s]*javascript:(.*)[\\\"\\\']/', '""', $theURI);
		//php5 for later
		//$theURI = filter_var($uri->getQuery(), FILTER_SANITIZE_STRING);
		
		return $uri->current().$inbetween.$theURI;
	}
	
	function generateURL($url = '', $addvars = array()){
		if(empty($url)){
			return $this->selfURL();
		}else{
			if(!empty($addvars)){
				foreach($addvars as $addvar => $varval){
					//strip the var name if exists
					preg_match_all('/(&*)'.$addvar.'=([^&]+)/is', $url, $matches);
					$url = str_replace($matches[0], '', $url);
					$separator = $this->_getURLSeparator($url);										
					$url .= $separator.$addvar.'='.$varval;
				}
			}
			return $url;
		}
	}
}
?>