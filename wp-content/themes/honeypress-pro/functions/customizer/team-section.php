<?php
//Team Section
	$wp_customize->add_section('honeypress_team_section',array(
			'title' => __('Team settings','honeypress'),
			'panel' => 'section_settings',
			'priority'       => 17,
			));

			$wp_customize->add_setting('team_section_enable',
			array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));
			$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'team_section_enable',
			array(
			'label'    => __( 'Enable / Disable Home Team section', 'honeypress' ),
			'section'  => 'honeypress_team_section',
			'type'     => 'toggle',
			'priority' 	=> 1,
			)
			));
			
			// Team section title
			$wp_customize->add_setting( 'home_team_section_title',array(
			'default' => __('The Team','honeypress'),
			'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'home_team_section_title',array(
			'label'   => __('Sub title','honeypress'),
			'section' => 'honeypress_team_section',
			'active_callback' => 'honeypress_team_callback',
			'type' => 'text',
			));	
			
			//Team section discription
			$wp_customize->add_setting( 'home_team_section_discription',array(
			'default'=> __('Meet Our Experts','honeypress'),
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'home_team_section_discription',array(
			'label'   => __('Title','honeypress'),
			'section' => 'honeypress_team_section',
			'active_callback' => 'honeypress_team_callback',
			'type' => 'textarea',
			));

			//Style Design
			$wp_customize->add_setting( 'home_team_design_layout', array( 'default' => 1) );
			$wp_customize->add_control(	'home_team_design_layout', 
			array(
			'label'    => __( 'Design Style', 'honeypress' ),
			'active_callback'=> 'honeypress_team_callback',
			'section'  => 'honeypress_team_section',
			'type'     => 'select',
			'choices'=>array(
				1=>__('Design 1', 'honeypress'),
				2=>__('Design 2', 'honeypress'),
				3=>__('Design 3', 'honeypress'),
				4=>__('Design 4', 'honeypress')
				)
			));
			
			
			if ( class_exists( 'honeypress_Repeater' ) ) {
			$wp_customize->add_setting(
				'honeypress_team_content', array(
				)
			);

			$wp_customize->add_control(
				new honeypress_Repeater(
					$wp_customize, 'honeypress_team_content', array(
						'label'                            => esc_html__( 'Team content', 'honeypress' ),
						'section'                          => 'honeypress_team_section',
						'active_callback' => 'honeypress_team_callback',
						'priority'                         => 15,
						'add_field_label'                  => esc_html__( 'Add new Team Member', 'honeypress' ),
						'item_name'                        => esc_html__( 'Team Member', 'honeypress' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_checkbox_control' => true,
						'customizer_repeater_repeater_control' => true,
						
					)
				)
			);
		} 
		
		// animation speed
		$wp_customize->add_setting( 'team_animation_speed', array( 'default' => 3000) );
		$wp_customize->add_control(	'team_animation_speed', 
			array(
				'label'    => __( 'Animation speed', 'honeypress' ),
				'section'  => 'honeypress_team_section',
				'active_callback' => 'honeypress_team_callback',
				'type'     => 'select',
				'priority' => 53,
				'choices'=>array(
					'2000'=>'2.0',
					'3000'=>'3.0',
					'4000'=>'4.0',
					'5000'=>'5.0',
					'6000'=>'6.0',
				)
		));
		
		//Navigation Type
		$wp_customize->add_setting( 'team_nav_style' , array( 'default' => 'bullets') );
			$wp_customize->add_control(	'team_nav_style' , array(
					'label'    => __( 'Navigation Style', 'honeypress' ),
					'section'  => 'honeypress_team_section',
					'active_callback' => 'honeypress_team_callback',
					'type'     => 'radio',
					'priority' => 17,
					'choices' => array(
						'bullets'=>__('Bullets', 'honeypress'),
						'navigation'=>__('Navigation', 'honeypress'),
						'both'=>__('Both', 'honeypress'),
					)
			));

			
	    // smooth speed
		$wp_customize->add_setting( 'team_smooth_speed', array( 'default' => 1000) );
		$wp_customize->add_control(	'team_smooth_speed', 
			array(
				'label'    => __( 'Smooth speed', 'honeypress' ),
				'section'  => 'honeypress_team_section',
				'active_callback' => 'honeypress_team_callback',
				'type'     => 'select',
				'priority' => 17,
			    'choices' => array( '500'=>'0.5',
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0')
		));

	/**
	 * Add selective refresh for Front page team section controls.
	 */

	$wp_customize->selective_refresh->add_partial( 'home_team_section_title', array(
		'selector'            => '.team-mambers .section-subtitle',
		'settings'            => 'home_team_section_title',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'home_team_section_discription', array(
		'selector'            => '.team-mambers .section-title',
		'settings'            => 'home_team_section_discription',
	) );
?>