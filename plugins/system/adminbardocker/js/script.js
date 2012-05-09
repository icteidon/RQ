/**
 * Main Javascript file
 *
 * @package			AdminBar Docker
 * @version			2.1.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

var AdminBarDocker = new Class({
	texts: {},
	icons: {},
	docks: {},
	spacers: {},
	dock_state: 'docked',
	dock_pos: 'top',
	autohide: 0,
	hidetopbar: 0,
	ignorecookie: 0,
	count: 0,

	initialize: function(template, texts, hidetopbar, ignorecookie)
	{
		if (!$defined(abd_top) || !$defined(abd_toggle_top) || !$defined(abd_toggle_bottom) || !$defined(abd_bottom)) {
			return;
		}

		var self = this;
		this.bodyElement = document.getElement('body');
		this.scrollFx = new Fx.Scroll(window);

		this.initElements();

		/* Set Texts */
		this.texts.settings = texts[0];
		this.texts.undock = texts[1];
		this.texts.dock = texts[2];
		this.texts.reload = texts[3];
		this.texts.top = texts[4];
		this.texts.bottom = texts[5];

		/* Set Template */
		this.template = template;

		/* Set HideTopBar */
		this.hidetopbar = hidetopbar;

		/* Set IgnoreCookie */
		this.ignorecookie = ignorecookie;

		/* Set Iconset */
		this.iconset = new Element('div', { 'id': 'abd_icons' })
			.addClass('abd_icons')
			.inject(this.bodyElement);

		/* Set Icons */
		this.icons.undocked = new Element('div').setStyle('display', 'none').inject(this.iconset);

		this.icons.reload = this.createIcon('reload', this.texts.reload, this.icons.undocked).addEvent('click', function()
		{
			self.reload();
		});
		this.icons.top = this.createIcon('top', this.texts.top, this.icons.undocked).addEvent('click', function()
		{
			self.scroll('top');
		});
		this.icons.bottom = this.createIcon('bottom', this.texts.bottom, this.icons.undocked).addEvent('click', function()
		{
			self.scroll('bottom');
		});
		if (abd_settings_url) {
			this.icons.settings = this.createIcon('settings', this.texts.settings, this.icons.undocked).addEvent('click', function()
			{
				window.open(abd_settings_url);
			});
		}

		this.icons.toggle_dock_state = this.createIcon('undock', this.texts.undock, this.iconset).addEvent('click', function()
		{
			self.toggleDockState();
		});

		/* Set Docks */
		this.docks.top = new Element('div')
			.addClass('abd_dock')
			.addClass('abd_dock_top')
			.addClass('abd_hidden')
			.inject(this.bodyElement);
		this.docks.top_inner = new Element('div')
			.addClass('abd_dock_inner')
			.inject(this.docks.top);
		this.docks.top_top = new Element('div').inject(this.docks.top_inner);
		this.docks.top_slide = new Element('div').inject(
			new Element('div', { 'class': 'abd_dock_slide' }).inject(this.docks.top_inner)
		);
		this.docks.top_slide.fx = new Fx.Slide(this.docks.top_slide, { duration: 200 });


		/* Set Spacers */
		this.spacers.top = new Element('div')
			.addClass('abd_spacer')
			.addClass('abd_spacer_top')
			.addClass('abd_hidden')
			.injectTop(this.bodyElement);
		this.spacers.top_top = new Element('div').inject(this.spacers.top);
		this.spacers.top_slide = new Element('div').inject(this.spacers.top);
		this.spacers.top_slide.fx = new Fx.Slide(this.spacers.top_slide, { duration: 200 });


		if (document.getElement('#header-box')) {
			home_icon = new Element('div')
				.addClass('abd_home_icon')
				.addEvent('click', function() { window.location.href = 'index.php' })
				.injectTop(document.getElement('#header-box'));
		}

		this.initState();

		this.correctPosComboBox();
	},

	initState: function()
	{
		/* Set cookies to opposite, correct settings by calling toggle functions */
		if (( this.ignorecookie && this.dock_state == 'undocked' ) || ( !this.ignorecookie && Cookie.read('abd_dock_state') == 'undocked' )) {
			this.setDockState('docked');
		} else {
			this.setDockState('undocked');
		}
		this.toggleDockState();
	},

	setDockState: function(state)
	{
		this.dock_state = state;
		if (!this.ignorecookie) {
			Cookie.write('abd_dock_state', state);
		}
	},

	initElements: function()
	{
		var self = this;

		this.elements = { all: new Array(), top: new Array(), toggle_top: new Array(), toggle_bottom: new Array(), bottom: new Array() };

		abd_top.each(function(el)
		{
			if (el != null) {
				self.elements.all.include(el);
				self.elements.top.include(el);
			}
		});
		abd_toggle_top.each(function(el)
		{
			if (el != null) {
				self.elements.all.include(el);
				self.elements.toggle_top.include(el);
			}
		});
		abd_toggle_bottom.each(function(el)
		{
			if (el != null) {
				self.elements.all.include(el);
				self.elements.toggle_bottom.include(el);
			}
		});
		abd_bottom.each(function(el)
		{
			if (el != null) {
				self.elements.all.include(el);
				self.elements.bottom.include(el);
			}
		});
		this.elements.all.each(function(el)
		{
			var rel = ++self.count;
			el.setProperty('rel', 'abd_rel_'+rel);
			dummy = new Element('div', { 'id': 'abd_rel_'+rel }).setStyle('margin-right', el.getStyle('margin-right')).injectBefore(el);
		});

	},

	createIcon: function(alias, title, parent)
	{
		var icon = new Element('div')
			.setProperty('title', title)
			.addClass('abd_icon').addClass('abd_icon_'+alias).set('html', '<div></div>')
			.inject(parent);
		icon.fx = new Fx.Tween(icon, { duration: 200 }).set('opacity', 0.6);
		icon.addEvent('mouseenter', function()
		{
			this.addClass('abd_icon_hover');
			this.fx.cancel().start('opacity', 0.6, 1)
		})
			.addEvent('mouseleave', function()
			{
				this.removeClass('abd_icon_hover');
				this.fx.cancel().start('opacity', 1, 0.6)
			});
		return icon;
	},
	toggleDockState: function()
	{
		if (this.dock_state == 'docked') {
			this.setDockState('undocked');
			this.icons.undocked.setStyle('display', 'inline');
			this.icons.toggle_dock_state.setProperty('title', this.texts.dock).addClass('abd_icon_dock').removeClass('abd_icon_undock');
			if (this.hidetopbar && document.getElement('#border-top')) {
				document.getElement('#border-top').setStyle('display', 'none');
				if (document.getElement('#content-box')) {
					document.getElement('#content-box').setStyle('border-top', '1px solid #CCCCCC');
				}

			}
		} else {
			this.setDockState('docked');
			this.icons.undocked.setStyle('display', 'none');
			this.icons.toggle_dock_state.setProperty('title', this.texts.undock).addClass('abd_icon_undock').removeClass('abd_icon_dock');
			if (this.hidetopbar && document.getElement('#border-top')) {
				document.getElement('#border-top').setStyle('display', '');
				if (document.getElement('#content-box')) {
					document.getElement('#content-box').setStyle('border-top', 'none');
				}
			}
		}
		this.setElementsPositions();
	},
	reload: function()
	{
		window.location.reload(true);
	},
	scroll: function(to)
	{
		if (to == 'bottom') {
			this.scrollFx.toBottom();
		} else {
			this.scrollFx.toTop();
		}
	},
	setElementsPositions: function()
	{
		var self = this;
		this.elements.all.each(function(el, i)
		{
			dummy = document.getElement('#'+el.getProperty('rel'));
			if (i == 0) {
				el.setStyle('margin-right', dummy.getStyle('margin-right'));
			}
			el.injectAfter(dummy);
		});
		if (this.dock_state == 'undocked') {
			this.elements.top.each(function(el, i)
			{
				if (i == 0) {
					el.setStyle('margin-right', '');
					el.inject(self.docks.top_top);
					w = el.getStyle('margin-right').toInt()+self.iconset.getCoordinates().width-1;
					el.setStyle('margin-right', w+'px');
				} else {
					el.inject(self.docks.top_slide);
				}
			});

				this.elements.toggle_top.each(function(el)
				{
					el.inject(self.docks.top_slide);
				});

			this.docks.top.removeClass('abd_hidden');
			this.spacers.top.removeClass('abd_hidden');

			this.spacers.top_top.setStyle('height', this.docks.top_top.getCoordinates().height+'px');
			this.spacers.top_slide.setStyle('height', this.docks.top_slide.getCoordinates().height+'px');
			this.docks.top_slide.fx.show();
			this.spacers.top_slide.fx.show();
		} else {
			this.docks.top.addClass('abd_hidden');
			this.spacers.top.addClass('abd_hidden');
		}
	},
	correctPosComboBox: function()
	{
		if (document.combobox) {
			document.getElements('input.combobox').each(function(el)
			{
				if (el.name == 'position') {
					el.setStyle('top', '3px').setStyle('left', '3px');
					el.getParent().setStyle('position', 'absolute');
				}
			});
		}
	}
});

function ABD_setCookie(id, value)
{
	if (!Cookie.read(id)) {
		Cookie.write(id, value);
	}
}