/**
 * Main JavaScript file
 *
 * @package			Add to Menu
 * @version			2.2.0
 *
 * @author			Peter van Westen <peter@nonumber.nl>
 * @link			http://www.nonumber.nl
 * @copyright		Copyright © 2012 NoNumber All Rights Reserved
 * @license			http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

window.addEvent('domready', function()
{
	new Element('span', {
		'id': 'addtomenu_msg',
		'styles': { 'opacity': 0 }
	})
		.inject(document.body)
		.addEvent('click', function() { addtomenu_show_end() });
	addtomenu_fx = new Fx.Morph(document.id('addtomenu_msg'), {wait: false});
	addtomenu_delay = false;
});

var addtomenu_show_start = function(msg, class_name)
{
	document.id('addtomenu_msg')
		.removeClass('success').removeClass('failure')
		.addClass('visible')
		.addClass(class_name)
		.set('text', msg);

	$clear(addtomenu_delay);
	addtomenu_fx.stop();
	addtomenu_fx.start({
		'opacity': 0.8,
		'duration': 400
	});
};

var addtomenu_show_end = function(delay)
{
	if (delay) {
		addtomenu_delay = ( function() { addtomenu_show_end(); } ).delay(delay);
	} else {
		$clear(addtomenu_delay);
		addtomenu_fx.stop();
		addtomenu_fx.start({
			'opacity': 0,
			'duration': 1600
		});
	}
};

var addtomenu_setMessage = function(msg, succes)
{
	SqueezeBox.close();
	if (succes) {
		addtomenu_show_start(msg, 'success');
		addtomenu_show_end(2000);
	} else {
		addtomenu_show_start(msg, 'failure');
		addtomenu_show_end(5000);
	}
};