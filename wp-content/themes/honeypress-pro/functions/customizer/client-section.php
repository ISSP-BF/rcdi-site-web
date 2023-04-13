<?php
//Client Section

		$wp_customize->add_section('home_client_section',array(
		'title' => __('Clients settings','honeypress'),
		'panel' => 'section_settings',
		'priority'       => 19,
		));
	
			// Enable client section
			$wp_customize->add_setting('client_section_enable',
			array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));
			$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'client_section_enable',
			array(
			'label'    => __( 'Enable / Disable Home Client section', 'honeypress' ),
			'section'  => 'home_client_section',
			'type'     => 'toggle',
			'priority' => 1,
			)
			));
					
			// clients & partners section title
			$wp_customize->add_setting( 'home_client_section_title',array(
			'default' => __('We Work With The Best Clients','honeypress'),
			'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
			));	
			$wp_customize->add_control( 'home_client_section_title',array(
			'label'   => __('Title','honeypress'),
			'section' => 'home_client_section',
			'active_callback' => 'honeypress_client_callback',
			'type' => 'text',
			));	
			
			//clients & partners section discription
			$wp_customize->add_setting( 'home_client_section_discription',array(
			'default'=> __('It is a long established fact that a reader will be distracted by the readable content.','honeypress'),
			));	
			$wp_customize->add_control( 'home_client_section_discription',array(
			'label'   => __('Sub title','honeypress'),
			'section' => 'home_client_section',
			'active_callback' => 'honeypress_client_callback',
			'type' => 'textarea',
			));

			//Testimonial Background Overlay Color
			$wp_customize->add_setting( 'clt_bg_color', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => '#fff',
            ) );	
            
            $wp_customize->add_control(new honeypress_Customize_Alpha_Color_Control( $wp_customize,'clt_bg_color', array(
               'label'      => __('Client Section Background Color','honeypress' ),
                'palette' => true,
                'active_callback' => 'honeypress_client_callback',
                'section' => 'home_client_section')
            ) );

		if ( class_exists( 'honeypress_Repeater' ) ) {
			$wp_customize->add_setting(
				'honeypress_clients_content', array(
				)
			);

			$wp_customize->add_control(
				new honeypress_Repeater(
					$wp_customize, 'honeypress_clients_content', array(
						'label'                            => esc_html__( 'Clients content', 'honeypress' ),
						'section'                          => 'home_client_section',
						'active_callback' => 'honeypress_client_callback',
						'add_field_label'                  => esc_html__( 'Add new client', 'honeypress' ),
						'item_name'                        => esc_html__( 'Client', 'honeypress' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_checkbox_control' => true,
					)
				)
			);
		}
		
	/**
	 * Add selective refresh.
	 */
	$wp_customize->selective_refresh->add_partial( 'home_client_section_title', array(
		'selector'            => '.sponsors h2',
		'settings'            => 'home_client_section_title',
	) );
	$wp_customize->selective_refresh->add_partial( 'home_client_section_discription', array(
		'selector'            => '.sponsors p',
		'settings'            => 'home_client_section_discription',
	) );
?>