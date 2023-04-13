<?php
/**
 * Functions to print post metaboxes
 */
add_action( 'add_meta_boxes', 'honeypress_ext_post_options_add_custom_boxes' );

function honeypress_ext_post_options_add_custom_boxes() {


	if ( function_exists( 'honeypress_honeypress_meta_box_post_format_gallery' ) ) {
		add_meta_box(
			'honeypress-meta-box-post-format-gallery',
			esc_html__( 'Gallery Format Options', 'honeypress-honeypress-vc-extension' ),
			'honeypress_honeypress_meta_box_post_format_gallery',
			'post'
		);
	}
	if ( function_exists( 'honeypress_honeypress_meta_box_post_format_link' ) ) {
		add_meta_box(
			'honeypress-meta-box-post-format-link',
			esc_html__( 'Link Format Options', 'honeypress-honeypress-vc-extension' ),
			'honeypress_honeypress_meta_box_post_format_link',
			'post'
		);
	}
	if ( function_exists( 'honeypress_honeypress_meta_box_post_format_quote' ) ) {
		add_meta_box(
			'honeypress-meta-box-post-format-quote',
			esc_html__( 'Quote Format Options', 'honeypress-honeypress-vc-extension' ),
			'honeypress_honeypress_meta_box_post_format_quote',
			'post'
		);
	}
	if ( function_exists( 'honeypress_honeypress_meta_box_post_format_video' ) ) {
		add_meta_box(
			'honeypress-meta-box-post-format-video',
			esc_html__( 'Video Format Options', 'honeypress-honeypress-vc-extension' ),
			'honeypress_honeypress_meta_box_post_format_video',
			'post'
		);
	}
	if ( function_exists( 'honeypress_honeypress_meta_box_post_format_audio' ) ) {
		add_meta_box(
			'honeypress-meta-box-post-format-audio',
			esc_html__( 'Audio Format Options', 'honeypress-honeypress-vc-extension' ),
			'honeypress_honeypress_meta_box_post_format_audio',
			'post'
		);
	}
	
}