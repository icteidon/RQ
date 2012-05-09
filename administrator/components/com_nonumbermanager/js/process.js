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
	nnManagerProcess = new nnManagerProcess();
});

var NNEM_NNEM = 0;
var NNEM_IDS_FAILED = [];
var NNEM_TASK = 'install';

var nnManagerProcess = new Class({
	process: function(task)
	{
		this.toggleByIds('.title', 0);
		this.toggleByIds('.titles .processing', 1);


		var sb = window.parent.SqueezeBox;
		sb.overlay['removeEvent']('click', sb.bound.close);
		if (NNEM_IDS[0] == 'nonumberextensionmanager') {
			NNEM_NNEM = 1;
			sb.setOptions({onClose: function() { window.parent.location.href = window.parent.location; }});
		} else {
			sb.setOptions({onClose: function() { window.parent.nnManager.refreshData(); }});
		}

		this.processNextStep(0);
	},

	processNextStep: function(step)
	{
		var id = NNEM_IDS[step];

		if (!id) {
			var sb = window.parent.SqueezeBox;
			this.toggleByIds('.title', 0);
			if (NNEM_IDS_FAILED.length) {
				this.toggleByIds('.titles .failed', 1);
				NNEM_IDS = NNEM_IDS_FAILED;
				NNEM_IDS_FAILED = [];
			} else {
				this.toggleByIds('.titles .done', 1);
				if (!NNEM_NNEM) {
					window.parent.nnManager.refreshData();
					sb.removeEvents();
				}
			}
			sb.overlay['addEvent']('click', sb.bound.close);
		} else {
			this.install(step)
		}
	},

	install: function(step)
	{
		var id = NNEM_IDS[step];

		this.toggleByIds('tr#row_'+id+' .status', 0);
		this.toggleByIds('#processing_'+id, 1);

		task = NNEM_TASK;
		var url = 'index.php?option=com_nonumbermanager&view=process&tmpl=component&action='+NNEM_TASK+'&id='+id;
		if (task != 'uninstall') {
			ext_url = document.getElement('#url_'+id).get('value');
			url += '&url='+escape(ext_url);
		}
		nnScripts.loadajax(url, 'nnManagerProcess.processResult( data.trim(), '+step+' )', 'nnManagerProcess.processResult( 0, '+step+' )', NNEM_TOKEN+'=1');
	},

	processResult: function(data, step)
	{
		var id = NNEM_IDS[step];

		this.toggleByIds('tr#row_'+id+' .status', 0);
		if (!data || ( data !== '1' && data.indexOf('<dd class="message') == -1 ) ) {
			NNEM_IDS_FAILED.push(id);
			this.toggleByIds('#failed_'+id, 1);
		} else {
			this.toggleByIds('#success_'+id, 1);
		}
		this.processNextStep(++step);
	},

	toggleByIds: function(ids, show, parent)
	{
		if (!parent) {
			parent = document;
		}

		parent.getElements(ids).setStyle('display', (show) ? '' : 'none');
	}
});