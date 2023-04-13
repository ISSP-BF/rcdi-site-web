<?php
//Shop Section
	$wp_customize->add_section('honeypress_shop_section',array(
			'title' => __('Home Shop settings','honeypress'),
			'panel' => 'section_settings',
			'priority'       => 18,
			));
		
			$wp_customize->add_setting('shop_section_enable',
			array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));
			$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'shop_section_enable',
			array(
			'label'    => __( 'Enable / Disable Home Shop section', 'honeypress' ),
			'section'  => 'honeypress_shop_section',
			'type'     => 'toggle',
			'priority' => 1,
			)
			));
			
			// Shop section title
			$wp_customize->add_setting( 'home_shop_section_title',array(
			'default' => __('Featured Products','honeypress'),
			'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
			));	
			$wp_customize->add_control( 'home_shop_section_title',array(
			'label'   => __('Sub title','honeypress'),
			'section' => 'honeypress_shop_section',
			'active_callback' => 'honeypress_shop_callback',
			'type' => 'text',
			));	
			
			//Shop section discription
			$wp_customize->add_setting( 'home_shop_section_discription',array(
			'default'=> __('Our amazing products','honeypress'),
			));	
			$wp_customize->add_control( 'home_shop_section_discription',array(
			'label'   => __('Title','honeypress'),
			'section' => 'honeypress_shop_section',
			'active_callback' => 'honeypress_shop_callback',
			'type' => 'textarea',
			));
		
			//Navigation Type
			$wp_customize->add_setting( 'shop_nav_style' , array( 'default' => 'bullets') );
			$wp_customize->add_control(	'shop_nav_style' , array(
					'label'    => __( 'Navigation Style', 'honeypress' ),
					'section'  => 'honeypress_shop_section',
					'active_callback' => 'honeypress_shop_callback',
					'type'     => 'radio',
					'priority' => 12,
					'choices' => array(
						'bullets'=>__('Bullets', 'honeypress'),
						'navigation'=>__('Navigation', 'honeypress'),
						'both'=>__('Both', 'honeypress'),
					)
			));

			// animation speed
			$wp_customize->add_setting( 'shop_animation_speed', array( 'default' => 3000) );
			$wp_customize->add_control(    'shop_animation_speed', 
				array(
					'label'    => __( 'Animation speed', 'honeypress' ),
					'section'  => 'honeypress_shop_section',
					'active_callback' => 'honeypress_shop_callback',
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
			$wp_customize->add_setting( 'shop_smooth_speed', array( 'default' => 1000) );
			$wp_customize->add_control(	'shop_smooth_speed', 
				array(
					'label'    => __( 'Smooth speed', 'honeypress' ),
					'section'  => 'honeypress_shop_section',
					'active_callback' => 'honeypress_shop_callback',
					'type'     => 'select',
					'choices' => array( '500'=>'0.5',
						'1000'=>'1.0',
						'1500'=>'1.5',
						'2000'=>'2.0',
						'2500'=>'2.5',
						'3000'=>'3.0')
			)); ?>