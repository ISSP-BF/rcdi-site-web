<?php
	$wp_customize->add_section( 'services_section' , array(
		'title'      => __('Services settings', 'honeypress'),
		'panel'  => 'section_settings',
		'priority'   => 11,
	) );
		
	// Enable service more btn
	$wp_customize->add_setting('home_service_section_enabled',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'home_service_section_enabled',
		array(
			'label'    => __( 'Enable / Disable Services on homepage', 'honeypress' ),
			'section'  => 'services_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));
		
	// Service section title
	$wp_customize->add_setting( 'home_service_section_title',array(
		'capability'     => 'edit_theme_options',
		'default' => __('Our Services','honeypress'),
		'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
	
	$wp_customize->add_control( 'home_service_section_title',array(
		'label'   => __('Sub title','honeypress'),
		'section' => 'services_section',
		'active_callback' => 'honeypress_service_callback',
		'type' => 'text',
		));	
		
	//Service section discription
	$wp_customize->add_setting( 'home_service_section_discription',array(
		'capability'     => 'edit_theme_options',
		'default' => __('Why Choose Us','honeypress'),
		'transport'         => $selective_refresh,
		));	
		
		
	$wp_customize->add_control( 'home_service_section_discription',array(
		'label'   => __('Title','honeypress'),
		'section' => 'services_section',
		'active_callback' => 'honeypress_service_callback',
		'type' => 'textarea',
		));	

	//Style Design
		$wp_customize->add_setting( 'home_serive_design_layout', array( 'default' => 1) );
		$wp_customize->add_control(	'home_serive_design_layout', 
		array(
			'label'    => __( 'Design Style', 'honeypress' ),
			'active_callback'=> 'honeypress_service_callback',
			'section'  => 'services_section',
			'type'     => 'select',
			'choices'=>array(
				1=>__('Design 1', 'honeypress'),
				2=>__('Design 2', 'honeypress'),
				3=>__('Design 3', 'honeypress'),
				4=>__('Design 4', 'honeypress'),
				5=>__('Design 5', 'honeypress'),
				6=>__('Design 6', 'honeypress'),
				7=>__('Design 7', 'honeypress')
				)
		));
		
	if ( class_exists( 'honeypress_Repeater' ) ) 
	{
		$wp_customize->add_setting( 'honeypress_service_content', array() );

		$wp_customize->add_control( new honeypress_Repeater( $wp_customize, 'honeypress_service_content', array(
			'label'                             => esc_html__( 'Services content', 'honeypress' ),
			'section'                           => 'services_section',
			'active_callback' => 'honeypress_service_callback',
			'priority'                          => 10,
			'add_field_label'                   => esc_html__( 'Add new Service', 'honeypress' ),
			'item_name'                         => esc_html__( 'Service', 'honeypress' ),
			'customizer_repeater_icon_control'  => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_text_control'  => true,
			'customizer_repeater_link_control'  => true,
			'customizer_repeater_checkbox_control' => true,
			'customizer_repeater_image_control' => true,
		) ) );
	}

	/**
	 * Add Partial.
	 */
	//For Sub Title
	$wp_customize->selective_refresh->add_partial( 'home_service_section_title', array(
		'selector'            => '.section-module.services .section-header .section-subtitle',
		'settings'            => 'home_service_section_title',
	) );

	//For Title
	$wp_customize->selective_refresh->add_partial( 'home_service_section_discription', array(
		'selector'            => '.section-module.services .section-header .section-title',
		'settings'            => 'home_service_section_discription',
	) );