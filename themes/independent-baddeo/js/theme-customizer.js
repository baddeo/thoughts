/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */
(function ($) {

	// Update the site title in real time
	wp.customize('blogname', function (value) {
		value.bind(function (newval) {
			$('#site-title a').html(newval);
		});
	});

	// Update the site description in real time
	wp.customize('blogdescription', function (value) {
		value.bind(function (newval) {
			$('.site-description').html(newval);
		});
	});

	// Update site title color in real time
	wp.customize('header_textcolor', function (value) {
		value.bind(function (newval) {
			$('#site-title a').css('color', newval);
		});
	});

	// Update site background color in real time
	wp.customize('background_color', function (value) {
		value.bind(function (newval) {
			$('body').css('background-color', newval);
			$('.site').css('background-color', newval);
		});
	});

	// Update comment form background color in real time
	wp.customize('comment_form_background_color', function (value) {
		value.bind(function (newval) {
			$('#commentform-top').css('background-color', newval);
			$('#commentform-bottom').css('background-color', newval);
			$('.comment-respond').css('background-color', newval);
		});
	});

	// Update text color in real time
	wp.customize('text_color', function (value) {
		value.bind(function (newval) {
			$('body').css('color', newval);
			$('button').css('color', newval);
			$('input').css('color', newval);
			$('select').css('color', newval);
			$('textarea').css('color', newval);
			$('.format-aside .entry-content a').css('color', newval);
			$('.format-aside .entry-content a:hover').css('color', newval);
			$('.format-aside .entry-content a:focus').css('color', newval);
			$('.format-aside .entry-content a:active').css('color', newval);
			$('.format-aside .entry-content a:visited').css('color', newval);
		});
	});

	// Update link color in real time
	wp.customize('link_color', function (value) {
		value.bind(function (newval) {
			$('.main-navigation a').css('color', newval);
			$('.widget-area ul li a').css('color', newval);
			$('.no-post-excerpts .format-standard .entry-content a').css('color', newval);
			$('.no-post-excerpts .format-standard .entry-content a:hover').css('color', newval);
			$('.no-post-excerpts .format-standard .entry-content a:focus').css('color', newval);
			$('.no-post-excerpts .format-standard .entry-content a:active').css('color', newval);
			$('.no-post-excerpts .format-standard .entry-content a:visited').css('color', newval);
			$('.enhan