<?php
$repeater_path = trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR ) . '/functions/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
require_once( $repeater_path );
}

$page_editor_path = trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR ) . 'functions/customizer/customizer-page-editor/customizer-page-editor.php';
if ( file_exists( $page_editor_path ) ) {
	require_once( $page_editor_path );
}
/**
 * Customize for taxonomy with dropdown, extend the WP customizer
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
return NULL;

function honeypress_sections_settings( $wp_customize ){
	
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

/* Sections Settings */
	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Homepage Section Settings', 'honeypress'),
	) );
}
add_action( 'customize_register', 'honeypress_sections_settings' );

function honeypress_home_page_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}



function honeypress_sanitize_radio( $input, $setting ){
         
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
     $input = sanitize_key($input);
 
     //get the list of possible radio box options 
     $choices = $setting->manager->get_control( $setting->id )->choices;
                             
     //return input if valid or return default option
     return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
}

/************************* Topbar Callback function *********************************/
   
    function honeypress_topbar_callback( $control ) 
    {
        if ( true == $control->manager->get_setting( 'topbar_enabled' )->value() ) {
            return true;
        } else {
            return false;
        }

    }

 /************************* Slider Callback function *********************************/

 	function honeypress_slider_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('home_page_slider_enabled')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}   

/************************* Service Callback function *********************************/

 	function honeypress_service_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('home_service_section_enabled')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}

/************************* Fun and Facts Callback function *********************************/

 	function honeypress_fun_facts_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('funfact_section_enabled')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	} 

/************************* Pofrtfolio Callback function *********************************/

 	function honeypress_portfolio_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('portfolio_section_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	} 	

/************************* testi Callback function *********************************/

 	function honeypress_testi_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('testimonial_section_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}

/************************* blog new Callback function *********************************/

 	function honeypress_blog_news_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('latest_news_section_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}

/************************* cta Callback function *********************************/

 	function honeypress_cta_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('cta_section_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}

/************************* Team Callback function *********************************/

 	function honeypress_team_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('team_section_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}

/************************* Shop Callback function *********************************/

 	function honeypress_shop_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('shop_section_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}

/************************* Client Callback function *********************************/

 	function honeypress_client_callback( $control ) 
 	{
 		if( true == $control->manager->get_setting ('client_section_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		}
 	}

/************************* Feature Callback function *********************************/

 	function honeypress_featured_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('honeypresse_enable_feature_section')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}

/************************* Footer Callback function *********************************/

 	function honeypress_footer_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('ftr_bar_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}

/************************* Related Post Callback function *********************************/

 	function honeypress_rt_post_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('honeypress_enable_related_post')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}

/************************* About Template Team Callback function *********************************/

 	function honeypress_abt_team_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('about_team_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}

/************************* About Template Testimonial Callback function *********************************/

 	function honeypress_abt_testi_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('about_testimonial_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	} 	

/************************* Search icon enable or disbale function *********************************/

 	function search_icon_hide_show_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('search_btn_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}
 	
/************************* Different Stick Header Logo *********************************/

 	function sticky_header_logo_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('sticky_header_logo')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	} 	

/************************* Breadcrumb  *********************************/

 	function breadcrumb_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('banner_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}

/************************* Ribbon Setting *********************************/

 	function ribbon_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('ribon_setting_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}
/************************* Scroll to top *********************************/

 	function scroll_top_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('scrolltotop_setting_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}
/************************* Footer WIdgets enable or disbale function *********************************/

 	function ftr_widgets_hide_show_callback ( $control ) 
 	{
		if( true == $control->manager->get_setting ('ftr_widgets_enable')->value()){
 			return true;
 		}
 		else {
 			return false;
 		} 		
 	}

/************************* Theme Customizer with Sanitize function *********************************/
function honeypress_theme_option( $wp_customize )
{
	function honeypress_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
	function honeypress_copyright_sanitize_text( $input ) 
	{
		return wp_kses_post( force_balance_tags( $input ) );
	}
	function honeypress_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	function honeypress_sanitize_select( $input, $setting ){
	         
	    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	    $input = sanitize_key($input);
	 
	    //get the list of possible radio box options 
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	                             
	    //return input if valid or return default option
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	             
	}

	if ( ! function_exists( 'honeypress_sanitize_number_range' ) ) :
	/**
	 * Sanitize number range.
	 *
	 * @since 1.0.0
	 *
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 *
	 * @param int  $input Number to check within the numeric range defined by the setting.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise, the setting default.
	 */
		function honeypress_sanitize_number_range( $input, $setting ) {

		// Ensure input is an absolute integer.
		$input = absint( $input );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get min.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

		// Get max.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

		// Get Step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the input is within the valid range, return it; otherwise, return the default.
		return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );
	}
	endif;


	function honeypress_sanitize_array( $value ){    
    	if ( is_array( $value ) ) {
   		 foreach ( $value as $key => $subvalue ) {
     		 $value[ $key ] = esc_attr( $subvalue );
    		}
    	return $value;
 		 }
  		return esc_attr( $value );    
	}
	$wp_customize->add_panel('honeypress_theme_panel',
		array(
			'priority' => 1,
			'capability' => 'edit_theme_options',
			'title' => esc_html__('Honeypress Theme Blog Option','honeypress')
		)
	);
}
add_action('customize_register','honeypress_theme_option');