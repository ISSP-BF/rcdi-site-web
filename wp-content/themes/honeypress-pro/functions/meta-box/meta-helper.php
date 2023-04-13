<?php
/**
 * Enqueue scripts and styles for the back end.
 */
function honeypress_backend_scripts( $hook ) {
	global $post;

	wp_register_style( 'honeypress-page-feature-section', get_template_directory_uri() . '/functions/meta-box/css/honeypress-page-feature-section.css', array(), time() );

	$honeypress_upload_slider_texts = array(
		'modal_title' => __( 'Insert Images', 'honeypress' ),
		'modal_button_title' => __( 'Insert Images', 'honeypress' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce_feature_slider_media' => wp_create_nonce( 'honeypress-get-feature-slider-media' ),
		'nonce_slider_media' => wp_create_nonce( 'honeypress-get-slider-media' ),
	);

	wp_register_script( 'honeypress-upload-slider-script', get_template_directory_uri() . '/functions/meta-box/js/honeypress-upload-slider.js', array( 'jquery'), time(), false );
	wp_localize_script( 'honeypress-upload-slider-script', 'honeypress_upload_slider_texts', $honeypress_upload_slider_texts );

	wp_register_script( 'honeypress-post-options-script', get_template_directory_uri() . '/functions/meta-box/js/honeypress-post-options.js', array( 'jquery'), time(), false );


	if ( $hook == 'post-new.php' || $hook == 'post.php' ) {

        if ( 'post' === $post->post_type ) {
            wp_enqueue_style( 'honeypress-page-feature-section' );
			wp_enqueue_script( 'honeypress-upload-slider-script' );
			wp_enqueue_script( 'honeypress-post-options-script' );

        } 
    }

}
add_action( 'admin_enqueue_scripts', 'honeypress_backend_scripts', 10, 1 );


/**
 * Helper function to get array value with fallback
 */
function honeypress_array_value( $input_array, $id, $fallback = false, $param = false ) {

	if ( $fallback == false ) $fallback = '';
	$output = ( isset($input_array[$id]) && $input_array[$id] !== '' ) ? $input_array[$id] : $fallback;
	if ( !empty($input_array[$id]) && $param ) {
		$output = ( isset($input_array[$id][$param]) && $input_array[$id][$param] !== '' ) ? $input_array[$id][$param] : $fallback;
	}
	return $output;
}
/**
 * Helper function to get custom fields with fallback
 */
function honeypress_post_meta( $id, $fallback = false ) {
	global $post;
	$post_id = $post->ID;
	if ( $fallback == false ) $fallback = '';
	$post_meta = get_post_meta( $post_id, $id, true );
	$output = ( $post_meta !== '' ) ? $post_meta : $fallback;
	return $output;
}

 /**
 * Prints post link
 */
function honeypress_print_post_link( $post_format = 'standard') {
	global $post;
	$post_id = $post->ID;

	$honeypress_link = get_permalink();
	$honeypress_target = '_self';

	if ( 'link' == $post_format ) {
		$honeypress_link = get_post_meta( $post_id, 'honeypress_post_link_url', true );
		$new_window = get_post_meta( $post_id, 'honeypress_post_link_new_window', true );

		if( empty( $honeypress_link ) ) {
			$honeypress_link = get_permalink();
		}

		if( !empty( $new_window ) ) {
			$honeypress_target = '_blank';
		}
	}

	return 'href="' . esc_url( $honeypress_link ) . '" target="' . $honeypress_target . '"';

}

/**
 * Prints audio shortcode of post format audio
 */
function honeypress_print_post_audio() {
	global $wp_embed;

	$audio_mode = honeypress_post_meta( 'honeypress_post_type_audio_mode' );
	$audio_mp3 = honeypress_post_meta( 'honeypress_post_audio_mp3' );
	$audio_ogg = honeypress_post_meta( 'honeypress_post_audio_ogg' );
	$audio_wav = honeypress_post_meta( 'honeypress_post_audio_wav' );
	$audio_embed = honeypress_post_meta( 'honeypress_post_audio_embed' );

	if( empty( $audio_mode ) && !empty( $audio_embed ) ) {
		echo '<div class="honeypress-media">' . $audio_embed . '</div>';
	} else {
		if ( !empty( $audio_mp3 ) || !empty( $audio_ogg ) || !empty( $audio_wav ) ) {
			$audio_output = '';
			$audio_output .= '[audio ';

			if ( !empty( $audio_mp3 ) ) {
				$audio_output .= 'mp3="'. esc_url( $audio_mp3 ) .'" ';
			}
			if ( !empty( $audio_ogg ) ) {
				$audio_output .= 'ogg="'. esc_url( $audio_ogg ) .'" ';
			}
			if ( !empty( $audio_wav ) ) {
				$audio_output .= 'wav="'. esc_url( $audio_wav ) .'" ';
			}

			$audio_output .= ']';

			echo '<div class="honeypress-media">' . do_shortcode( $audio_output ) . '</div>';
		}
	}

}