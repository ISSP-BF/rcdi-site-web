<?php
	//Callout Section
		$wp_customize->add_section('home_cta_page_section',array(
		'title' => __('Callout section settings','honeypress'),
		'panel' => 'section_settings',
		'priority'       => 16,
		));
		
			// Enable call to action section
			$wp_customize->add_setting('cta_section_enable',
			array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

			$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'cta_section_enable',
			array(
			'label'    => __( 'Enable / Disable Home Callout section', 'honeypress' ),
			'section'  => 'home_cta_page_section',
			'type'     => 'toggle',
			'priority' => 1,
			)
			));



			//callout Background Image
			$wp_customize->add_setting( 'callout_callout_background', array(
			  'sanitize_callback' => 'esc_url_raw',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'callout_callout_background', array(
			  'label'    => __( 'Background Image', 'honeypress' ),
			  'section'  => 'home_cta_page_section',
			  'active_callback' => 'honeypress_cta_callback',
			  'settings' => 'callout_callout_background',
			) ) );
			
		// Image overlay
		$wp_customize->add_setting( 'callout_image_overlay', array(
			'default' => true,
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control('callout_image_overlay', array(
			'label'    => __('Enable callout image overlay', 'honeypress' ),
			'section'  => 'home_cta_page_section',
			'active_callback' => 'honeypress_cta_callback',
			'type' => 'checkbox',
		) );
		
		
		//callout Background Overlay Color
		$wp_customize->add_setting( 'callout_overlay_section_color', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'rgba(0, 11, 24, 0.80)',
            ) );	
            
            $wp_customize->add_control(new honeypress_Customize_Alpha_Color_Control( $wp_customize,'callout_overlay_section_color', array(
               'label'      => __('callout image overlay color','honeypress' ),
               'active_callback' => 'honeypress_cta_callback',
                'palette' => true,
                'section' => 'home_cta_page_section')
            ) );

			$wp_customize->add_setting(
			'home_call_out_title',
			array(
				'default' => __('Provide you the Highest Quality Business Solution <br>that Meets your Expectation.','honeypress'),
				'transport'         => $selective_refresh,
				)
			);	
			$wp_customize->add_control( 'home_call_out_title',array(
			'label'   => __('Title','honeypress'),
			'section' => 'home_cta_page_section',
			'active_callback' => 'honeypress_cta_callback',
			 'type' => 'text',)  );
			 
			 $wp_customize->add_setting(
			'home_call_out_desc',
			array(
				'default' => __('It is a long established fact that a reader will be distracted by the readable content of a page when looking <br> at its layout. The point of using Lorem ipsum dolor sit amet elit.','honeypress'),
				'transport'         => $selective_refresh,
				)
			);	
			$wp_customize->add_control( 'home_call_out_desc',array(
			'label'   => __('Description','honeypress'),
			'section' => 'home_cta_page_section',
			'active_callback' => 'honeypress_cta_callback',
			 'type' => 'textarea',)  );
			 
			 
			 $wp_customize ->add_setting (
			'home_call_out_btn_text',
			array( 
			'default' => __('Get In Touch','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			
			) 
			);

			$wp_customize->add_control (
			'home_call_out_btn_text',
			array (  
			'label' => __('Button Text','honeypress'),
			'section' => 'home_cta_page_section',
			'active_callback' => 'honeypress_cta_callback',
			'type' => 'text',
			) );
			
			$wp_customize ->add_setting (
			'home_call_out_btn_link',
			array( 
			'default' => '#',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			) );

			
			$wp_customize->add_control (
			'home_call_out_btn_link',
			array (  
			'label' => __('Button Link','honeypress'),
			'section' => 'home_cta_page_section',
			'active_callback' => 'honeypress_cta_callback',
			'type' => 'text',
			) );

			$wp_customize->add_setting(
				'home_call_out_btn_link_target',
				array('sanitize_callback' => 'sanitize_text_field',
				));

			$wp_customize->add_control(
				'home_call_out_btn_link_target',
				array(
					'type' => 'checkbox',
					'label' => __('Open link in new tab','honeypress'),
					'section' => 'home_cta_page_section',
					'active_callback' => 'honeypress_cta_callback',
				)
			);

			
	/**
	 * Add selective refresh.
	 */
	
	//Callout
	$wp_customize->selective_refresh->add_partial( 'home_call_out_title', array(
		'selector'            => '.cta h2',
		'settings'            => 'home_call_out_title',	
	) );
	
	
	
	$wp_customize->selective_refresh->add_partial( 'home_call_out_desc', array(
		'selector'            => '.cta p',
		'settings'            => 'home_call_out_desc',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'home_call_out_btn_text', array(
		'selector'            => '.cta .btn-small',
		'settings'            => 'home_call_out_btn_text',	
	) );
?>