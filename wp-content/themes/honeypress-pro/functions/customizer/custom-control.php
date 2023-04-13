<?php
if( ! function_exists( 'honeypress_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function honeypress_register_custom_controls( $wp_customize ) {
    require_once get_template_directory() . '/inc/customizer/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/customizer/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/customizer/toggle/class-toggle-control.php';
    require_once get_template_directory() . '/inc/customizer/sortable/class-sortable-control.php';
    require_once get_template_directory() . '/inc/customizer/slider/class-slider-control.php';
    require_once get_template_directory() . '/inc/customizer/slider/class-opacity-control.php';
    require_once get_template_directory() . '/inc/customizer/slider/container-width-control.php';
    $wp_customize->register_control_type( 'honeypress_Toggle_Control' );
    $wp_customize->register_control_type( 'honeypress_Control_Sortable' );
    $wp_customize->register_control_type( 'honeypress_Slider_Control' );
    $wp_customize->register_control_type( 'honeypress_Opacity_Control' );
    $wp_customize->register_control_type( 'honeypress_Container_Control' );
}
endif;
add_action( 'customize_register', 'honeypress_register_custom_controls' );