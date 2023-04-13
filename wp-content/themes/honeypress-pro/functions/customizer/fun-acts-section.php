<?php
/* funfact section */
	$wp_customize->add_setting('funfact_section_enabled',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));
	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'funfact_section_enabled',
		array(
			'label'    => __( 'Enable / Disable Funfact on homepage', 'honeypress' ),
			'section'  => 'funfact_section',
			'type'     => 'toggle',
			'priority' => 1,
		)
	));
	
	$wp_customize->add_section( 'funfact_section' , array(
		'title'      => __('Funfact settings', 'honeypress'),
		'panel'  => 'section_settings',
		'priority'   =>12,
	) );

	$wp_customize->add_setting( 'home_fun_section_title',array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
		'default' => __('Our Many Years of Experiance in Numbers','honeypress'),
		'transport'         => 'postMessage',
	));	

	$wp_customize->add_control( 'home_fun_section_title',array(
		'label'   => __('Title','honeypress'),
		'section' => 'funfact_section',
		'active_callback' => 'honeypress_fun_facts_callback',
		'type' => 'text',
	));
	
	if ( class_exists( 'honeypress_Repeater' ) ) 
	{
		$wp_customize->add_setting( 'honeypress_funfact_content', array() );

		$wp_customize->add_control( new honeypress_Repeater( $wp_customize, 'honeypress_funfact_content', array(
			'label'                             => esc_html__( 'Funfact content', 'honeypress' ),
			'section'                           => 'funfact_section',
			'active_callback' => 'honeypress_fun_facts_callback',
			'priority'                          => 10,
			'add_field_label'                   => esc_html__( 'Add new Funfact', 'honeypress' ),
			'item_name'                         => esc_html__( 'Funfact', 'honeypress' ),
			'customizer_repeater_icon_control'  => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_text_control'  => true,
		) ) );
	}	

	/**
	 * Add selective refresh for Front page funfact section controls.
	 */

    $wp_customize->selective_refresh->add_partial( 'home_fun_section_title', array(
		'selector'            => '.funfact .section-title-two',
		'settings'            => 'home_fun_section_title',
	) );
?>