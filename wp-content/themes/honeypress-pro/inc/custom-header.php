<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package honeypress
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses honeypress_header_style()
 */
function honeypress_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'honeypress_custom_header_args', array(
		'default-image'          => HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/assets/images/page-title.jpg',
		
		'width'                  => 1903,
		'height'                 => 350,
		'flex-height'            => true,

	) ) );
}
add_action( 'after_setup_theme', 'honeypress_custom_header_setup' );