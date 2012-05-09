/**
 * Javascript file
 *
 * @package			Content Templater
 * @version			3.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

window.addEvent('domready', function()
{
	if (!CT_f) {
		CT_f = new CT_class();
	}
});

// prevent init from running more than once
if (typeof( window['CT_f'] ) == "undefined") {
	var CT_f = null;
}

var CT_class = new Class({
	// private property
	_keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
	_timer: null,

	initialize: function()
	{
		var self = this;
		if (CT_listtype != 'select') {
			if (CT_action == 'click') {
				this.overlay = new Element('div', {
					id: 'CT_overlay',
					styles: {
						display: 'none',
						opacity: 0.5,
						backgroundColor: 'white',
						position: 'fixed',
						left: 0,
						top: 0,
						width: '100%',
						height: '100%',
						zIndex: 4000
					}
				}).addEvent('click', function()
				{
					this.setStyle('display', 'none');
					document.getElements('div.contenttemplater_submenu').each(function(submenu)
					{
						submenu.setStyle('display', 'none');
					});
				});

				var client = nnScripts._getClient();
				if (client.isIE && !client.isIE7) {
					this.overlay.style.position = 'absolute';
					this.overlay.style.height = nnScripts._getDocHeight()+'px';
					this._fixTop();
					window.addEvent('scroll', function() { self._fixTop(); });
				}

				document.getElement('body').adopt(this.overlay);
			}

			document.getElements('div.contenttemplater').each(function(button)
			{
				button.submenu = button.getElement('div.contenttemplater_submenu');
				/*var pos = button.getPosition();
				 button.submenu.setStyles( { top: pos.y - 100, left: pos.x + 24, bottom: 'auto' } );
				 document.getElement( 'body' ).adopt( button.submenu );*/
				if (CT_action == 'click') {
					button.addEvent('click', function()
					{
						self.overlay.setStyle('display', 'block');
						button.submenu.setStyle('display', 'block');
					});
				} else {
					button.addEvent('mouseenter', function()
					{
						button.submenu.setStyle('display', 'block');
					});
					button.addEvent('mouseleave', function()
					{
						button.submenu.setStyle('display', 'none');
					});
				}
			});
		}
	},

	getXML: function(id, editorname, nocontent)
	{
		if (!editorname) {
			editorname = CT_editor;
		}
		if (!nocontent) {
			nocontent = 0;
		}
		var self = this;
		this._startLoad();

		var url = 'index.php?nn_qp=1&folder=plugins.editors-xtd.contenttemplater&file=contenttemplater.inc.php&id='+id+'&nocontent='+nocontent;
		nnScripts.loadajax(url, 'CT_f._insertTexts( data, \''+editorname+'\' )', 'CT_f._finishLoad()');
	},

	_fixTop: function()
	{
		this.overlay.style.top = document.documentElement.scrollTop+'px';
	},

	_insertTexts: function(data, editorname)
	{
		data = this._decode(data);
		data = data.split('[/CT]');

		var params = new Object;
		for (i = 0; i < data.length; i++) {
			if (data[i].indexOf('[CT]') != -1) {
				vals = data[i].split('[CT]');
				key = vals[1].trim();
				params[key] = new Object;
				params[key]['default'] = vals[2].trim();
				params[key]['value'] = vals[3].trim();
			}
		}

		var override = 0;
		var has_content = 0;

		// check if settings override is set and if template has content
		for (key in params) {
			param = params[key];
			if (key == 'override_settings') {
				override = param['value'];
			} else if (key == 'content' && param['value'].length != 0) {
				has_content = 1;
			}
		}

		// set all content settings
		for (key in params) {
			if (key != 'content') {
				param = params[key];
				field_val = this._getValue(key);
				if (field_val == null) {
					field_val = '';
				}
				pass = (field_val != null
					&& field_val != param['value']
					&& (override == 1
					|| field_val == param['default']
					)
					);
				if (pass == 1) {
					this._setValue(key, param['value']);
					if (key == 'sectionid' && document.adminForm && document.adminForm.sectionid && sectioncategories) {
						changeDynaList('catid', sectioncategories, document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].value, 0, 0);
					}
				}
			}
		}

		// insert content
		if (has_content) {
			for (key in params) {
				param = params[key];
				if (key == 'content' && param['value'].length) {
					if (param['value'].length) {
						this._jInsertEditorText(param['value'], editorname);
					}
				}
			}
		} else {
			this._finishLoad();
		}
	},

	_jInsertEditorText: function(value, editor, count)
	{
		var self = this;
		var ed = document.getElementById(editor);
		var count = ( count == null ) ? 1 : ++count;
		var succes = 0;
		// check id the editor is finished loading for max 17.5 seconds
		// 5 * 500ms
		// 5 * 1000ms
		// 5 * 2000ms
		if (count < 15) {
			var wait = ( count > 10 ) ? 2000 : ( count > 5 ) ? 1000 : 500;
			try {
				var text = value;
				if (ed) {
					if (ed.className != '' && ed.className == 'mce_editable'
						&& text.substr(0, 3) == '<p>' && text.substr(text.length-4, 4) == '</p>'
						) {
						text = text.substr(3, text.length-7);
					}
					jInsertEditorText(text, editor);
					if (typeof( window['tinyMCE'] ) != "undefined") {
						var ed = tinyMCE.get(editor);
						if (ed) {
							ed.hide();
							ed.show();
						}
					}
					succes = 1;
				}
			} catch (err) {
			}
			if (succes) {
				window.clearTimeout(this._timer);
				this._finishLoad();
			} else {
				this._timer = window.setTimeout(function()
				{
					self._jInsertEditorText(value, editor, count)
				}, wait);
			}
		} else {
			window.clearTimeout(this._timer);
			if (ed) {
				ed.value += value;
			} else {
				alert('Could not find the editor!');
			}
			this._finishLoad();
		}
	},

	_startLoad: function()
	{
		nnScripts.overlay.open(0.7, 'Loading Template');
	},

	_finishLoad: function()
	{
		nnScripts.overlay.close();
		if (CT_action == 'click') {
			var self = this;
			document.getElements('div.contenttemplater_submenu').each(function(submenu)
			{
				self.overlay.setStyle('display', 'none');
				submenu.setStyle('display', 'none');
			});
		}
	},

	_getValue: function(key)
	{
		element = document.getElementById(key);
		if (!element && typeof(document.adminForm) != "undefined" && typeof(document.adminForm.elements) != "undefined") {
			element = document.adminForm.elements[ key ];
		}
		if (!element) {
			return null;
		}
		var elementLength = element.length;
		if (element.type == 'select-one' || !elementLength) {
			if (element.type == 'checkbox' && !element.checked) {
				return '';
			}
			return element.value;
		} else {
			for (var i = 0; i < elementLength; i++) {
				if (( element.type == 'checkbox' && element[i].checked ) || ( element.type != 'checkbox' && element[i].selected )) {
					return element[i].value;
				}
			}
		}
		return '';
	},

	_setValue: function(key, value)
	{
		element = document.getElementById(key);
		if (!element && typeof(document.adminForm) != "undefined" && typeof(document.adminForm.elements) != "undefined") {
			element = document.adminForm.elements[ key ];
			if (!element) {
				element = document.adminForm.elements[ key+'[]' ];
			}

		}
		if (!element) {
			// Try frontend field names
			key = this._getFrontendKey(key);
			element = document.getElementById(key);
			if (!element && typeof(document.adminForm) != "undefined" && typeof(document.adminForm.elements) != "undefined") {
				element = document.adminForm.elements[ key ];
				if (!element) {
					element = document.adminForm.elements[ key+'[]' ];
				}
			}
		}

		if (!element) {
			return;
		}

		if (value == '-empty-') {
			value = '';
		}
		var elementLength = element.length;
		var valuesLength = 0;

		//alert(element.id + ' : ' + element.length + ' : ' + element.type + ' = ' + ( element.type == 'checkbox' ) );
		if (elementLength) {
			// select / radio fields
			values = value.split(',');
			valuesLength = values.length;
			for (var i = 0; i < elementLength; i++) {
				element[i].checked = false;
				element[i].selected = false;
				for (var j = 0; j < valuesLength; j++) {
					if (element[i].value == values[j].toString()) {
						element[i].checked = true;
						element[i].selected = true;
						if (element.id) {
							element.fireEvent('change').fireEvent('click').fireEvent('mouseup');
						}
					}
				}
			}
		} else if (element.type == 'checkbox') {
			// checkboxes
			values = value.split(',');
			valuesLength = values.length;
			element.checked = false;
			for (var i2 = 0; i2 < valuesLength; i2++) {
				if (element.value == values[i2].toString()) {
					element.checked = true;
					if (element.id) {
						element.fireEvent('change').fireEvent('click').fireEvent('mouseup');
					}
				}
			}
		} else {
			// text fields
			element.value = value.toString();
			if (element.id) {
				element.fireEvent('change').fireEvent('click').fireEvent('mouseup');
			}
		}
	},

	_getFrontendKey: function(key)
	{
		return key.replace('details', '');
	},

	_decode: function(input)
	{
		var output = "";
		var chr1, chr2, chr3;
		var enc1, enc2, enc3, enc4;
		var i = 0;

		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

		while (i < input.length) {
			enc1 = this._keyStr.indexOf(input.charAt(i++));
			enc2 = this._keyStr.indexOf(input.charAt(i++));
			enc3 = this._keyStr.indexOf(input.charAt(i++));
			enc4 = this._keyStr.indexOf(input.charAt(i++));

			chr1 = (enc1<<2) | (enc2>>4);
			chr2 = ((enc2 & 15)<<4) | (enc3>>2);
			chr3 = ((enc3 & 3)<<6) | enc4;

			output = output+String.fromCharCode(chr1);

			if (enc3 != 64) {
				output = output+String.fromCharCode(chr2);
			}
			if (enc4 != 64) {
				output = output+String.fromCharCode(chr3);
			}

		}

		output = this._utf8_decode(output);

		return output;
	},

	_utf8_decode: function(utftext)
	{
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while (i < utftext.length) {
			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if ((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31)<<6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15)<<12) | ((c2 & 63)<<6) | (c3 & 63));
				i += 3;
			}
		}

		return string;
	}
});