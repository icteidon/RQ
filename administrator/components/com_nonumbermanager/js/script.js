/**
 * Main JavaScript file
 *
 * @package			NoNumber Extension Manager
 * @version			3.1.1
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

window.addEvent('domready', function()
{
	nnManager = new nnManager();
});

var nnManager = new Class({
	refreshData: function()
	{
		var div = document.getElement('div#nnem');
		div.className = '';

		var table = div.getElement('table');

		// lock width of table columns
		$each(table.getElements('th'), function(th)
		{
			w = th.getScrollSize().x
				-th.getStyle('padding-left').toInt()-th.getStyle('padding-right').toInt()
				-th.getStyle('border-left-width').toInt()-th.getStyle('border-right-width').toInt();
			th.setStyle('min-width', w);
		});

		$each(table.getElements('tbody tr'), function(tr)
		{
			// lock height of table rows
			td = tr.getElement('td.checkbox');
			if (td) {
				h = td.getSize().y;
				if (!Browser.firefox) {
					// not in FireFox
					h = h-td.getStyle('padding-top').toInt()-td.getStyle('padding-bottom').toInt()
						-td.getStyle('border-top-width').toInt()-td.getStyle('border-bottom-width').toInt();
				}
				td.setStyle('height', h);
			}

			// reset table row classes
			if (tr.hasClass('installed')) {
				tr.className = 'installed';
			} else {
				tr.className = 'not_installed';
			}
			tr.addClass('loading');
		});

		// hide data & show loading images
		this.toggleByIds('.group_data,.group_comment', 0);
		this.toggleByIds('.data_loading,.group_refresh', 1);

		var url = 'index.php?option=com_nonumbermanager&task=update';
		nnScripts.loadajax(url, 'nnManager.setData( data.trim() )', 'nnManager.setData( 0 )', NNEM_TOKEN+'=1');
	},

	setData: function(data)
	{
		var xml = nnScripts.getObjectFromXML(data);
		if (!xml) {
			return;
		}

		for (var i = 0; i < NNEM_IDS.length; i++) {
			var extension = NNEM_IDS[i];
			var dat = 0;
			if (typeof(xml[extension]) !== 'undefined') {
				dat = xml[extension];
			}

			tr = document.getElement('tbody tr#row_'+extension);

			// Versions
			if (tr) {
				tr.addClass('not_installed').removeClass('installed');
				el = tr.getElement('.current_version');
				if (el) {
					span = el.getElement('span');
					if (span) {
						span.set('text', '');
					}
				}
				if (dat && typeof(dat['version']) !== 'undefined' && dat['version']) {
					if (el && span) {
						span.set('text', dat['version']);
					}
					tr.addClass('installed').removeClass('not_installed');
					if (dat['pro'] == 1) {
						tr.addClass('pro_installed');
					} else if (dat['old'] == 1) {
						tr.addClass('old');
					} else {
						tr.addClass('free_installed');
					}
					if (dat['missing']) {
						tr.addClass('has_missing');
						tr.getElement('.comment_missing span').set('text', dat['missing']);
					}
				}
				tr.removeClass('loading');
			}
			this.toggleByIds('.version_loading', 0, tr);
		}
		this.refreshExternalData();
	},

	refreshExternalData: function()
	{
		var url = 'download.nonumber.nl/extensions.php';
		if (NNEM_KEY) {
			url += '?k='+NNEM_KEY;
		}
		nnScripts.loadajax(url, 'nnManager.setExternalData(data.trim())', 'nnManager.setExternalData(0)');
	},

	setExternalData: function(data)
	{
		var xml = nnScripts.getObjectFromXML(data);
		if (!xml) {
			alert(NNEM_FAIL);

			this.toggleByIds('.data_loading,.group_refresh', 0);
			this.toggleByIds('.data_refresh', 1);
			return;
		}

		div = document.getElement('div#nnem');

		for (var i = 0; i < NNEM_IDS.length; i++) {
			var extension = NNEM_IDS[i];
			var dat = 0;

			if (typeof(xml[extension]) !== 'undefined') {
				dat = xml[extension];
			}

			tr = div.getElement('tbody tr#row_'+extension);

			// Changelog
			el = tr.getElement('.changelog');
			if (el && dat && typeof(dat['changelog']) !== 'undefined' && dat['changelog'] != '') {
				changelog = dat['changelog'];
				el.set('title', NNEM_CHANGELOG+'::'+changelog)
					.store('tip:title', NNEM_CHANGELOG)
					.store('tip:text', changelog)
					.setStyle('display', '');
				JTooltips = new Tips(el, { fixed: 1, className: 'changlog-tip tool' });
			}

			// Install buttons
			if (dat && typeof(dat['version']) !== 'undefined' && dat['version'] != '') {
				v_new = String(dat['version']).trim();

				if (!v_new || v_new == '0') {
					this.toggleByIds('.data_refresh', 1, tr);
				} else {
					v_old = String(tr.getElement('.current_version span').get('text')).trim();
					is_old = ( tr.id == 'row_nonumberextensionmanager' ) ? 0 : tr.hasClass('old');

					pro_installed = tr.hasClass('pro_installed');

					pro_access = (dat['pro'] == 1);
					if (pro_access) {
						tr.addClass('pro_access');
						document.getElement('#url_'+extension).set('value', dat['downloadurl_pro']);
					} else {
						tr.addClass('pro_no_access');
						document.getElement('#url_'+extension).set('value', dat['downloadurl']);
					}

					pro_available = (dat['has_pro'] == 1);
					if (pro_available) {
						tr.addClass('pro_available');
					} else {
						tr.addClass('pro_not_available');
					}

					tr.getElement('.new_version span').set('text', v_new);
					tr.getElement('.new_version').setStyle('display', '');
					tr.getElement('.pro_access').setStyle('display', '');
					tr.getElement('.pro_no_access').setStyle('display', '');

					if (!v_old || v_old == '0' || tr.hasClass('has_missing')) {
						div.addClass('has_install');
						tr.addClass('selectable');
						this.toggleByIds('.install', 1, tr);
						if (tr.hasClass('has_missing')) {
							tr.getElement('.comment_missing').setStyle('display', '');
						}
					} else if (is_old && pro_available && !pro_access) {
						tr.addClass('update').addClass('old');
						tr.getElement('.comment_old').setStyle('display', '');
					} else if (pro_available && pro_installed && !pro_access) {
						tr.addClass('pro_no_access');
						tr.getElement('.comment_pro_no_access').setStyle('display', '');
					} else {
						compare = nnScripts.compareVersions(v_old, v_new);
						if (compare == '>') {
							this.toggleByIds('.downgrade', 1, tr);
							tr.getElement('.comment_downgrade').setStyle('display', '');
						} else if (compare == '<' || (!pro_installed && pro_access)) {
							div.addClass('has_update');
							tr.addClass('selectable').addClass('update');
							this.toggleByIds('.update', 1, tr);
							tr.getElement('.comment_update').setStyle('display', '');
						} else {
							tr.addClass('uptodate');
							this.toggleByIds('.reinstall', 1, tr);
							tr.getElement('.comment_uptodate').setStyle('display', '');
						}
					}
				}
			}

			this.toggleByIds('.data_loading', 0, tr);
		}

		this.updateCheckboxes();

		// unlock height of table rows
		div.getElements('table td.checkbox').each(function(td)
		{
			td.setStyle('height', '');
		});

		// unlock width of table columns
		div.getElements('table th').each(function(th)
		{
			th.setStyle('min-width', '');
		});
	},


	updateCheckboxes: function()
	{
		// hide select boxes
		this.toggleByIds('.select', 0);


		// show select boxes of selectable rows
		this.toggleByIds('.selectable .select', 1);
	},

	install: function(task, id)
	{
		var url = document.getElement('#url_'+id).get('value');
		this.openModal(task, [id], [url]);
	},

	installMultiple: function(task)
	{
		var ids = new Array();
		var urls = new Array();

		switch (task) {
			case 'updateall':
				type = 'update';
				msg = NNEM_NOUPDATE;
				break;
			case 'installall':
				type = 'install';
				msg = NNEM_NOINSTALL;
				break;
			default:
				type = 'install';
				msg = NNEM_NONESELECTED;
				break;
		}

		$each(document.getElements('div#nnem table tbody tr.selectable'), function(tr)
		{
			var el = tr.getElement('td.checkbox input');
			if (el) {
				var pass = 0;
				switch (task) {
					case 'installall':
						pass = ( tr.hasClass('not_installed') || tr.hasClass('has_missing') );
						break;
					case 'updateall':
						pass = tr.hasClass('update');
						break;
					default:
						pass = el.checked;
						break;
				}

				if (pass) {
					id = el.get('value');
					url = document.getElement('#url_'+id).get('value');
					ids.push(id);
					urls.push(url);
				}
			}
		});

		if (!ids.length) {
			alert(msg);
		} else {
			this.openModal(type, ids, urls);
		}
	},
	openModal: function(task, ids, urls)
	{
		a = new Array();
		for (var i = 0; i < ids.length; i++) {
			a.push('ids[]='+escape(ids[i]))
		}

		width = 480;
		height = 90+(a.length*26);
		min = 116;
		max = window.getSize().y-60;
		if (height > max) {
			height = max;
			width += 16;
		}
		if (height < min) {
			height = min;
		}

		a = a.join('&');

		b = new Array();
		for (var j = 0; j < urls.length; j++) {
			url = urls[j].replace('http://', '');
			b.push('urls[]='+escape(url));
		}
		b = b.join('&');

		url = 'index.php?option=com_nonumbermanager&view=process&tmpl=component&task='+task+'&'+a+'&'+b;
		SqueezeBox.open(url, {handler: 'iframe', size: {x: width, y: height}, classWindow: 'nnem_modal'});
	},

	toggleByIds: function(ids, show, parent)
	{
		if (!parent) {
			parent = document;
		}

		parent.getElements(ids).setStyle('display', (show) ? '' : 'none');
	}
});

function nnem_function(task, id)
{
	if (!task) {
		return;
	}
	switch (task) {
		case 'refresh':
			nnManager.refreshData();
			break;
		case 'toggle':
			nnManager.toggle(id);
			break;
		case 'installall':
		case 'updateall':
		case 'installselected':
			nnManager.installMultiple(task);
			break;
		case 'install':
		case 'update':
		case 'reinstall':
		case 'downgrade':
			nnManager.install(task, id);
			break;
	}
}
