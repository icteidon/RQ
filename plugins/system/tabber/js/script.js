/**
 * Main JavaScript file
 *
 * @package			Tabber
 * @version			2.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

window.addEvent('domready', function()
{
	// Only do stuff if tabber_nav is found
	if (document.getElements('div.tabber_nav').length && document.getElements('div.tabber_content').length) {
		(function() { Tabber = new Tabber(); }).delay(100);
	} else {
		// Try again 2 seconds later, because IE sometimes can't see object immediately
		(function()
		{
			if (document.getElements('div.tabber_nav').length && document.getElements('div.tabber_content').length) {
				Tabber = new Tabber();
			}
		}).delay(2000);
	}
});

var Tabber = new Class({
	initialize: function()
	{
		var self = this;
		this.docScroll = new Fx.Scroll(window);
		this.containers = new Array();

		var tabber_hash = '';
		if (tabber_use_hash && window.location.hash) {
			tabber_hash = window.location.hash.replace('#', '');
		}

		document.getElements('div.tabber_container').each(function(container)
		{
			if (typeof( container ) != "undefined") {
				container.removeClass('tabber_noscript');

				var c_id = container.id.replace('tabber_container_', '');
				var active = 0;

				container.getElements('div.tabber_content').each(function(el)
				{
					if (typeof( el ) != "undefined") {
						var set_id = el.id.replace('tabber_content_', '');
						if (set_id == c_id) {
							el.fx = new Fx.Tween(el, { property: 'height', 'duration': tabber_speed, onComplete: function() { self.autoHeight(el); } });
						}
					}
				});

				// add events on tabs
				var first = 1;
				var active_hash = 0;
				container.getElements('li.tabber_tab').each(function(el)
				{
					if (typeof( el ) != "undefined" && !el.hasClass('tabber_notab')) {
						var id = el.id.replace('tabber_tab_', '');
						var set_id = id.slice(0, id.indexOf('-'));
						if (set_id == c_id) {
							self.containers[id] = c_id;

							// set first tab as active or active tab
							if (( first && !el.hasClass('inactive') ) || el.hasClass('active')) {
								active = id;
							}
							if (tabber_use_hash && !active_hash && tabber_hash) {
								var alias = el.getFirst().className.slice(String('tabber_alias_').length);
								if (alias == tabber_hash) {
									active_hash = id;
								}
							}
								mode = 'click';
							el.addEvent(mode, function() { self.showTab(id, c_id); });
							first = 0;
						}
					}
					el.setStyle('display', 'block');
				});

				if (tabber_use_hash && active_hash) {
					active = active_hash;
				}

				// add fx
				container.getElements('div.tabber_item').each(function(el)
				{
					if (typeof( el ) != "undefined") {
						var id = el.id.replace('tabber_item_', '');
						var set_id = id.slice(0, id.indexOf('-'));
						if (set_id == c_id) {
							el.setStyle('display', 'block');
							el.fade_in = new Fx.Tween(el, { property: 'opacity', 'duration': tabber_fade_in_speed });
							el.fx = new Fx.Slide(el, { 'duration': 0, onComplete: function() { self.autoHeight(el.getParent()); } }).hide();
						}
					}
				});

				// hide content titles
				container.getElements('.tabber_title').each(function(el)
				{
					if (typeof( el ) != "undefined") {
						el.setStyle('display', 'none');
					}
				});

				// show only active tab
				self.showTab(active, c_id, 1, ( active === tabber_urlscroll ));

				// show tabs list
				container.getElements('div.tabber_nav').each(function(el)
				{
					if (typeof( el ) != "undefined") {
						el.setStyle('display', 'block');
					}
				});
			}
		});

		// add onclick events on tab links {tablink=...}
		document.getElements('a.tabber_tablink').each(function(el)
		{
			if (typeof( el ) != "undefined" && el.rel && typeof( self.containers[el.rel] ) != "undefined") {
				el.addEvent('click', function()
				{
					self.showTab(el.rel, self.containers[el.rel], 0, tabber_linkscroll);
				});
				el.href = 'javascript://';
			}
		});
	},

	showTab: function(id, c_id, first, scroll)
	{
		var container = document.id('tabber_container_'+c_id);
		var item = document.id('tabber_tab_'+id);
		var isactive = ( typeof( item ) != "undefined" && item && item.hasClass('active') );
		var content = null;

		// remove all active classes
		container.getElements('li.tabber_tab').each(function(el)
		{
			if (typeof( el ) != "undefined" && el && el.hasClass('active')) {
				var el_id = el.id.replace('tabber_tab_', '');
				var set_id = el_id.slice(0, el_id.indexOf('-'));
				if (set_id == c_id) {
					el.removeClass('active');
					content = document.id('tabber_item_'+el_id);
					if (content) {
						content.getParent().getParent().setStyle('height', parseInt(content.getStyle('height')));
					}
				}
			}
		});

		if (typeof( item ) != "undefined" && item) {
			item.addClass('active');
		}

		var el = document.id('tabber_item_'+id);

		// show active content block
		if (typeof( el ) != "undefined" && el && typeof( el.fx ) != "undefined") {
			el.removeClass('tabber_item_inactive');
			content = el.getParent().getParent();
			content.className = ( 'tabber_content '+( el.className.replace('tabber_item', '') ) ).trim();
			el.fx.cancel();

			// show active content block
			if (first) {
				el.fx.show();
				this.autoHeight(el.getParent(), 1);
				this.autoHeight(content, 1);
			} else if (!isactive) {
				el.fade_in.cancel();
				el.setStyle('opacity', 0);
				el.fx.show();
				this.autoHeight(el.getParent());
				el.fade_in.start(1);
				content.fx.cancel().start(parseInt(el.getStyle('height')));
			}
		}

		// hide all content block
		container.getElements('div.tabber_item').each(function(el)
		{
			if (id && typeof( el ) != "undefined" && el && el.id && el.id != 'tabber_item_'+id && typeof( el.fx ) != "undefined") {
				var el_id = el.id.replace('tabber_item_', '');
				var set_id = el_id.slice(0, el_id.indexOf('-'));
				if (set_id == c_id) {
					el.fx.hide();
				}
			}
		});
	},


	autoHeight: function(el, force)
	{
		if (typeof( el ) != "undefined" && el && el.getStyle('height') && ( force || parseInt(el.getStyle('height')) > 0 )) {
			el.setStyle('height', 'auto');
		}
	}
});