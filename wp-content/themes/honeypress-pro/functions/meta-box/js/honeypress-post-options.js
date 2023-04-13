jQuery(document).ready(function($) {

	"use strict";

	$(document).on("change","#honeypress-post-type-video-mode",function() {

		$( '.honeypress-post-video-embed' ).hide();
		$( '.honeypress-post-video-html5' ).hide();

		if( 'html5' == $(this).val() ) {
			$( '.honeypress-post-video-html5' ).stop( true, true ).fadeIn(500);
		} else {
			$( '.honeypress-post-video-embed' ).stop( true, true ).fadeIn(500);
		}

    });

	$(document).on("change","#honeypress-post-type-audio-mode",function() {

		$( '.honeypress-post-audio-embed' ).hide();
		$( '.honeypress-post-audio-html5' ).hide();

		if( 'html5' == $(this).val() ) {
			$( '.honeypress-post-audio-html5' ).stop( true, true ).fadeIn(500);
		} else {
			$( '.honeypress-post-audio-embed' ).stop( true, true ).fadeIn(500);
		}

    });

	$(document).on("change",".editor-post-format select",function() {
		var format = $(this).val();
		$( '#wpbody-content div[id^=honeypress-meta-box-post-format-]' ).hide();
		$( '#wpbody-content #honeypress-meta-box-post-format-' + format ).stop( true, true ).fadeIn(500);

	});

	$(document).on("change","#post-formats-select input",function() {
		var format = $('#post-formats-select input:checked').attr('value');
		if(typeof format != 'undefined') {

			if( '0' == format || 'image' == 'format' ) {
				format = 'standard';
			}

			$( '#post-body div[id^=honeypress-meta-box-post-format-]' ).hide();
			$( '#post-body #honeypress-meta-box-post-format-' + format ).stop( true, true ).fadeIn(500);

		}
	});

	$(document).on("change","#honeypress-post-title-bg-mode",function() {

		$( '.honeypress-post-title-bg' ).hide();

		if ( 'featured' == $(this).val() ) {
			$( '.honeypress-post-title-bg-position' ).stop( true, true ).fadeIn(500);
			$( '.honeypress-post-title-bg-height' ).stop( true, true ).fadeIn(500);
		} else if ( 'custom' == $(this).val() ) {
			$( '.honeypress-post-title-bg-position' ).stop( true, true ).fadeIn(500);
			$( '.honeypress-post-title-bg-height' ).stop( true, true ).fadeIn(500);
			$( '.honeypress-post-title-bg-image' ).stop( true, true ).fadeIn(500);
		}

    });

	$(document).on("change","#honeypress-post-gallery-mode",function() {

		$( '.honeypress-post-media-item' ).hide();

		if ( 'slider' == $(this).val() ) {
			$( '#honeypress-post-gallery-image-mode-section' ).stop( true, true ).fadeIn(500);
			$( '#honeypress-post-media-slider-speed' ).stop( true, true ).fadeIn(500);
			$( '#honeypress-post-media-slider-direction-nav' ).stop( true, true ).fadeIn(500);
		}

    });

	$(window).on('load',function () {
		$('#honeypress-post-type-video-mode').change();
		$('#honeypress-post-type-audio-mode').change();
		$('.editor-post-format select').change();
		$('#post-formats-select input').change();
		$('#honeypress-post-title-bg-mode').change();
		$('#honeypress-post-gallery-mode').change();
	});

	if ( $( '#wpbody-content #honeypress-meta-box-post-format-standard').length ) {
		var format = $('#honeypress-post-format-value').val();
		$( '#wpbody-content div[id^=honeypress-meta-box-post-format-]' ).hide();
		$( '#wpbody-content #honeypress-meta-box-post-format-' + format ).stop( true, true ).fadeIn(500);
	}

});