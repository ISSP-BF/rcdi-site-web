<?php
//Latest News Section
	$wp_customize->add_section('honeypress_latest_news_section',array(
			'title' => __('Latest News settings','honeypress'),
			'panel' => 'section_settings',
			'priority'       => 15,
			));

			// Enable news section
			$wp_customize->add_setting('latest_news_section_enable',
			array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

			$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'latest_news_section_enable',
			array(
			'label'    => __( 'Enable / Disable Home News section', 'honeypress' ),
			'section'  => 'honeypress_latest_news_section',
			'type'     => 'toggle',
			'priority' => 1,
				)
			));

		/******************** Blog Content *******************************/

		//Style Design
		$wp_customize->add_setting( 'home_news_design_layout', array( 'default' => 1) );
		$wp_customize->add_control(	'home_news_design_layout', 
		array(
			'label'    => __( 'Design Style', 'honeypress' ),
			'active_callback'=> 'honeypress_blog_news_callback',
			'section'  => 'honeypress_latest_news_section',
			'type'     => 'select',
			'choices'=>array(
				1=>__('Grid Style', 'honeypress'),
				2=>__('List Style', 'honeypress'),
				3=>__('Masonry Style', 'honeypress'),
				4=>__('Switcher Style', 'honeypress'),
				)
		));
		$wp_customize->add_setting('honeypress_homeblog_layout', 
		array(
		'default' 			=> 4,
		'sanitize_callback' => 'honeypress_sanitize_select'
		)
		);

		$wp_customize->add_control('honeypress_homeblog_layout', 
		array(		
		'label' 	=> esc_html__('Column Layout', 'honeypress'),		
		'section' 	=> 'honeypress_latest_news_section',
		'active_callback' => 'honeypress_blog_news_callback',
		'type' 		=> 'select',
		'choices' 	=>  array(
			6 	=> esc_html__('2 Column', 'honeypress'),
			4 	=> esc_html__('3 Column', 'honeypress'),
			3 	=> esc_html__('4 Column', 'honeypress'),
			)
		)
		);		

		$wp_customize->add_setting( 'honeypress_homeblog_counts',
		array(
		'default'           => 3,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_number_range',
		)
		);
		$wp_customize->add_control( 'honeypress_homeblog_counts',
		array(
		'label'       => esc_html__( 'No of Post', 'honeypress' ),
		'section'     => 'honeypress_latest_news_section',
		'active_callback' => 'honeypress_blog_news_callback',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 2, 'max' => 20, 'step' => 1, 'style' => 'width: 100%;' ),
	)
	);

		// News section title
		$wp_customize->add_setting( 'home_news_section_title',array(
		'capability'     => 'edit_theme_options',
		'default' => __('Latest News','honeypress'),
		'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_news_section_title',array(
		'label'   => __('Sub title','honeypress'),
		'section' => 'honeypress_latest_news_section',
		'active_callback' => 'honeypress_blog_news_callback',
		'type' => 'text',
		));	
		
		//News section discription
		$wp_customize->add_setting( 'home_news_section_discription',array(
		'default'=> __('From our blog','honeypress'),
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_news_section_discription',array(
		'label'   => __('Title','honeypress'),
		'section' => 'honeypress_latest_news_section',
		'active_callback' => 'honeypress_blog_news_callback',
		'type' => 'textarea',
		));	

		// Read More Button
		$wp_customize->add_setting( 'home_news_button_title',array(
		'capability'     => 'edit_theme_options',
		'default' => __('READ MORE','honeypress'),
		'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_news_button_title',array(
		'label'   => __('Read More Text','honeypress'),
		'section' => 'honeypress_latest_news_section',
		'active_callback' => 'honeypress_blog_news_callback',
		'type' => 'text',
		));	

		// enable / disable meta section 
		$wp_customize->add_setting(
			'home_meta_section_settings',
			array('capability'  => 'edit_theme_options',
			'default' => true,
			
			));
		$wp_customize->add_control(
			'home_meta_section_settings',
			array(
				'type' => 'checkbox',
				'label' => __('Enable post meta in blog section','honeypress'),
				'section' => 'honeypress_latest_news_section',
				'active_callback' => 'honeypress_blog_news_callback',
			)
		);

		 $wp_customize ->add_setting (
			'home_blog_more_btn',
			array( 
			'default' => __('View More Posts','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			) 
			);

			$wp_customize->add_control (
			'home_blog_more_btn',
			array (  
			'label' => __('View More Button Text','honeypress'),
			'section' => 'honeypress_latest_news_section',
			'active_callback' => 'honeypress_blog_news_callback',
			'type' => 'text',
			) );
			
			$wp_customize ->add_setting (
			'home_blog_more_btn_link',
			array( 
			'default' => '#',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			) );

			
			$wp_customize->add_control (
			'home_blog_more_btn_link',
			array (  
			'label' => __('View More Button Link','honeypress'),
			'section' => 'honeypress_latest_news_section',
			'active_callback' => 'honeypress_blog_news_callback',
			'type' => 'text',
			) );

			$wp_customize->add_setting(
				'home_blog_more_btn_link_target',
				array('sanitize_callback' => 'sanitize_text_field',
				));

			$wp_customize->add_control(
				'home_blog_more_btn_link_target',
				array(
					'type' => 'checkbox',
					'label' => __('Open link in new tab','honeypress'),
					'section' => 'honeypress_latest_news_section',
					'active_callback' => 'honeypress_blog_news_callback',
				)
			);

	/**
	 * Add selective refresh for Front page news section controls.
	 */

	$wp_customize->selective_refresh->add_partial( 'home_news_section_title', array(
		'selector'            => '.business-home-blog-sction .section-subtitle',
		'settings'            => 'home_news_section_title',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'home_news_section_discription', array(
		'selector'            => '.business-home-blog-sction .section-title',
		'settings'            => 'home_news_section_discription',	
	) );
?>