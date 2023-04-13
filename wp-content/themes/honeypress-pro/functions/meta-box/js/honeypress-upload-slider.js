jQuery(document).ready(function($) {

	"use strict";

	var honeypressMediaSliderFrame;
	var honeypressMediaSliderContainer = $( "#honeypress-slider-container" );
	honeypressMediaSliderContainer.sortable();

	$(document).on("click",".honeypress-slider-item-delete-button",function() {
		$(this).parent().remove();
	});

	$(document).on("click",".honeypress-upload-slider-button",function() {

		if ( honeypressMediaSliderFrame ) {
			honeypressMediaSliderFrame.open();
			return;
		}

		honeypressMediaSliderFrame = wp.media.frames.honeypressMediaSliderFrame = wp.media({
			className: 'media-frame honeypress-media-slider-frame',
			frame: 'select',
			multiple: 'toggle',
			title: honeypress_upload_slider_texts.modal_title,
			library: {
				type: 'image'
			},
			button: {
				text:  honeypress_upload_slider_texts.modal_button_title
			}
		});
		honeypressMediaSliderFrame.on('select', function(){
			var selection = honeypressMediaSliderFrame.state().get('selection');
			var ids = selection.pluck('id');

			$('#honeypress-upload-slider-button-spinner').show();
			var dataParams = {
				action:'honeypress_get_slider_media',
				attachment_ids: ids.toString(),
				_honeypress_nonce: honeypress_upload_slider_texts.nonce_slider_media
			};
			$.post( honeypress_upload_slider_texts.ajaxurl, dataParams, function( mediaHtml ) {
				honeypressMediaSliderContainer.append(mediaHtml);
				$('#honeypress-upload-slider-button-spinner').hide();
			}).fail(function(xhr, status, error) {
				$('#honeypress-upload-slider-button-spinner').hide();
			});
		});
		honeypressMediaSliderFrame.on('ready', function(){
			$( '.media-modal' ).addClass( 'honeypress-media-no-sidebar' );
		});

		honeypressMediaSliderFrame.open();
	});

});