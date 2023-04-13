<?php
/* Testimonial Section */
	$wp_customize->add_section( 'testimonial_section' , array(
			'title'      => __('Testimonials settings', 'honeypress'),
			'panel'  => 'section_settings',
			'priority'   => 14,
		) );
		
		// Enable testimonial section
		$wp_customize->add_setting('testimonial_section_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));
		$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'testimonial_section_enable',
			array(
			'label'    => __( 'Enable / Disable Home Testimonial section', 'honeypress' ),
			'section'  => 'testimonial_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
			)
		));

		

		//Testimonial Background Image
			$wp_customize->add_setting( 'testimonial_callout_background', array(
			  'sanitize_callback' => 'esc_url_raw',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonial_callout_background', array(
			  'label'    => __( 'Background Image', 'honeypress' ),
			  'section'  => 'testimonial_section',
			  'active_callback' => 'honeypress_testi_callback',
			  'settings' => 'testimonial_callout_background',
			) ) );
			
		// Image overlay
		$wp_customize->add_setting( 'testimonial_image_overlay', array(
			'default' => true,
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control('testimonial_image_overlay', array(
			'label'    => __('Enable testimonial image overlay', 'honeypress' ),
			'section'  => 'testimonial_section',
			'active_callback' => 'honeypress_testi_callback',
			'type' => 'checkbox',
		) );
		
		
		//Testimonial Background Overlay Color
		$wp_customize->add_setting( 'testimonial_overlay_section_color', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'rgba(0, 76, 236, 0.9)',
            ) );	
            
            $wp_customize->add_control(new honeypress_Customize_Alpha_Color_Control( $wp_customize,'testimonial_overlay_section_color', array(
               'label'      => __('Testimonial image overlay color','honeypress' ),
               'active_callback' => 'honeypress_testi_callback',
                'palette' => true,
                'section' => 'testimonial_section')
            ) );
			
		
		// testimonial section title
		$wp_customize->add_setting( 'home_testimonial_section_title',array(
		'capability'     => 'edit_theme_options',
		'default' => __('Testimonials','honeypress'),
		'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_testimonial_section_title',array(
		'label'   => __('Sub title','honeypress'),
		'section' => 'testimonial_section',
		'active_callback' => 'honeypress_testi_callback',
		'type' => 'text',
		));	
		
		//testimonial section discription
		$wp_customize->add_setting( 'home_testimonial_section_discription',array(
		'capability'     => 'edit_theme_options',
		'default'=> __('What Clients Are Say','honeypress'),
		'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_testimonial_section_discription',array(
		'label'   => __('Title','honeypress'),
		'section' => 'testimonial_section',
		'active_callback' => 'honeypress_testi_callback',
		'type' => 'textarea',
		));	
		
		if ( class_exists( 'honeypress_Repeater' ) ) {
			$wp_customize->add_setting( 'honeypress_testimonial_content', array(
			) );

			$wp_customize->add_control( new honeypress_Repeater( $wp_customize, 'honeypress_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial content', 'honeypress' ),
				'section'                           => 'testimonial_section',
				'active_callback' => 'honeypress_testi_callback',
				'add_field_label'                   => esc_html__( 'Add new Testimonial', 'honeypress' ),
				'item_name'                         => esc_html__( 'Testimonial', 'honeypress' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_designation_control' => true,
				) ) );
		}
		
		//Navigation Type
		$wp_customize->add_setting( 'testimonial_nav_style' , array( 'default' => 'bullets') );
			$wp_customize->add_control(	'testimonial_nav_style' , array(
					'label'    => __( 'Navigation Style', 'honeypress' ),
					'section'  => 'testimonial_section',
					'active_callback' => 'honeypress_testi_callback',
					'type'     => 'radio',
					'priority' => 17,
					'choices' => array(
						'bullets'=>__('Bullets', 'honeypress'),
						'navigation'=>__('Navigation', 'honeypress'),
						'both'=>__('Both', 'honeypress'),
					)
			));
			
		//Style Design
		$wp_customize->add_setting( 'home_testimonial_design_layout', array( 'default' => '') );
		$wp_customize->add_control(	'home_testimonial_design_layout', 
		array(
			'label'    => __( 'Design Style', 'honeypress' ),
			'active_callback'=> 'honeypress_testi_callback',
			'section'  => 'testimonial_section',
			'type'     => 'select',
			'choices'=>array(
				''=>__('Design 1', 'honeypress'),
				2=>__('Design 2', 'honeypress'),
				3=>__('Design 3', 'honeypress'),
				4=>__('Design 4', 'honeypress'),
				5=>__('Design 5', 'honeypress'),
				6=>__('Design 6', 'honeypress')
				)
		));
		//Slide Item
		$wp_customize->add_setting( 'home_testimonial_slide_item', array( 'default' => 1) );
		$wp_customize->add_control(	'home_testimonial_slide_item', 
		array(
			'label'    => __( 'Slide Item', 'honeypress' ),
			'active_callback'=> 'honeypress_testi_callback',
			'section'  => 'testimonial_section',
			'type'     => 'select',
			'choices'=>array(
				1=>__('One', 'honeypress'),
				2=>__('Two', 'honeypress'),
				3=>__('Three', 'honeypress'),
				)
		));
					
		// animation speed
		$wp_customize->add_setting( 'testimonial_animation_speed', array( 'default' => 3000) );
		$wp_customize->add_control(	'testimonial_animation_speed', 
			array(
				'label'    => __( 'Animation speed', 'honeypress' ),
				'section'  => 'testimonial_section',
				'active_callback' => 'honeypress_testi_callback',
				'type'     => 'select',
				'choices'=>array(
					'2000'=>'2.0',
					'3000'=>'3.0',
					'4000'=>'4.0',
					'5000'=>'5.0',
					'6000'=>'6.0',
				)
		));
		
		// smooth speed
		$wp_customize->add_setting( 'testimonial_smooth_speed', array( 'default' => 1000) );
		$wp_customize->add_control(	'testimonial_smooth_speed', 
			array(
				'label'    => __( 'Smooth speed', 'honeypress' ),
				'section'  => 'testimonial_section',
				'active_callback' => 'honeypress_testi_callback',
				'type'     => 'select',
			    'choices' => array( '500'=>'0.5',
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0')
		));	


	/**
	 * Add selective refresh for Front page testimonial section controls.
	 */

	$wp_customize->selective_refresh->add_partial( 'home_testimonial_section_title', array(
		'selector'            => '.testimonial .section-subtitle',
		'settings'            => 'home_testimonial_section_title',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'home_testimonial_section_discription', array(
		'selector'            => '.testimonial .section-title',
		'settings'            => 'home_testimonial_section_discription',
	
	) );
?>