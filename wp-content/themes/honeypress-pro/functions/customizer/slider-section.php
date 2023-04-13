<?php
	/* Sections Settings */
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/* Slider Section */
	$wp_customize->add_section( 'slider_section' , array(
		'title'      => __('Slider settings', 'honeypress'),
		'panel'  => 'section_settings',
		'priority'   => 10,
   	) );

	// Enable slider
	$wp_customize->add_setting('home_page_slider_enabled',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'home_page_slider_enabled',
		array(
			'label'    => __( 'Enable / Disable Slider Section', 'honeypress' ),
			'section'  => 'slider_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));


	class WP_Slider_Widgets_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Add Widgets Slider','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'slide_widget_content',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( new WP_Slider_Widgets_Customize_Control( $wp_customize, 'slide_widget_content', array(
		'section' => 'slider_section',
		'setting' => 'slide_widget_content',
    ))
);

	$top_bar_sidebar = $wp_customize->get_section( 'sidebar-widgets-slider-widget-area' );  // getting the Slider Widget sidebar.
	if ( ! empty( $top_bar_sidebar ) ) {
		$top_bar_sidebar->panel = 'section_settings';  //  adding the already registered panel
	}

	// Slider Background Type
	$wp_customize->add_setting( 'slide_variation', array( 'default' => 'slide') );
	$wp_customize->add_control(	'slide_variation',
		array(
			'label'    => __( 'Slider Background Type', 'honeypress' ),
			'section'  => 'slider_section',
			'active_callback' => 'honeypress_slider_callback',
			'type'     => 'select',
			'choices'=>array(
				'slide'=>__('Image', 'honeypress'),
				'video'=>__('Video', 'honeypress')
				)
	));

	// Slider Video Section
		$wp_customize->add_setting( 'slide_video_upload',
		   array(
			  'default' => '',
			  'transport' => 'refresh',
			  'sanitize_callback' => 'absint'
		   )
		);
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'slide_video_upload',
		   array(
			  'label' => __( 'Slider video' ),
			  'description' => esc_html__( 'Upload your video in .mp4 format and minimize its file size for best results. For this theme the recommended size is 1150 × 2000 pixels.','innofit' ),
			  'section' => 'slider_section',
			  'mime_type' => 'video',  // Required. Can be image, audio, video, application, text
			  'button_labels' => array( // Optional
				 'select' => __( 'Select File' ),
				 'change' => __( 'Change File' ),
				 'default' => __( 'Default' ),
				 'remove' => __( 'Remove' ),
				 'placeholder' => __( 'No file selected' ),
				 'frame_title' => __( 'Select File' ),
				 'frame_button' => __( 'Choose File' ),

			  )
		   )
		) );

		//Slider video url
		$wp_customize->add_setting( 'slide_video_url',array(
		'capability'     => 'edit_theme_options',
		'default' => '',
		'sanitize_callback' => '',
		'transport'         => $selective_refresh,
		));
		$wp_customize->add_control( 'slide_video_url',array(
		'label'   => __('Or, enter a YouTube URL:','honeypress'),
		'section' => 'slider_section',
		'type' => 'text',
		));

	if ( class_exists( 'honeypress_Repeater' ) )
	{
		$wp_customize->add_setting( 'honeypress_slider_content', array() );

		$wp_customize->add_control( new honeypress_Repeater( $wp_customize, 'honeypress_slider_content', array(
		'label'                             => esc_html__( 'Slider Content', 'honeypress' ),
		'section'                           => 'slider_section',
		'active_callback'					=> 'honeypress_slider_callback',
		'add_field_label'                   => esc_html__( 'Add new slide', 'honeypress' ),
		'item_name'                         => esc_html__( 'Slide', 'honeypress' ),
		'customizer_repeater_title_control' => true,
		'customizer_repeater_text_control'  => true,
		'customizer_repeater_slider_caption_aligment_control'  => true,
		'customizer_repeater_sidebarcheckbox_control' => true,
		'customizer_repeater_button_text_control' => true,
		'customizer_repeater_link_control'  => true,
		'customizer_repeater_image_control' => true,
		'customizer_repeater_checkbox_control' => true,
		'customizer_repeater_abtbutton_text_control' =>true,
		'customizer_repeater_abtlink_control' =>true,
		'customizer_repeater_abtcheckbox_control' => true,
				) ) );
	}

	class WP_Slider_Widget_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php _e('To add widgets, Go back >> Slider Widgets','honeypress');?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'hp_slide_widget_area_section',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new WP_Slider_Widget_Customize_Control( $wp_customize, 'hp_slide_widget_area_section', array(
			'section' => 'slider_section',
			'setting' => 'hp_slide_widget_area_section',
			'active_callback' => 'honeypress_slider_callback',
	    ))
	);

	// Image overlay
	$wp_customize->add_setting( 'slider_image_overlay', array(
		'default' => true,
		'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('slider_image_overlay', array(
		'label'    => __('Enable slider image overlay', 'honeypress' ),
		'section'  => 'slider_section',
		'active_callback' => 'honeypress_slider_callback',
		'type' => 'checkbox',
		)
	);

	//Slider Background Overlay Color
	$wp_customize->add_setting( 'slider_overlay_section_color', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'rgba(0,0,0,0.6)',
        )
	);

    $wp_customize->add_control(new honeypress_Customize_Alpha_Color_Control( $wp_customize,'slider_overlay_section_color', array(
        'label'      => __('Slider image overlay color','honeypress' ),
        'palette' => true,
        'active_callback' => 'honeypress_slider_callback',
        'section' => 'slider_section')
    ) );


	//Navigation Type
		$wp_customize->add_setting( 'slider_nav_style' , array( 'default' => 'navigation') );
			$wp_customize->add_control(	'slider_nav_style' , array(
					'label'    => __( 'Navigation Style', 'honeypress' ),
					'section'  => 'slider_section',
					'active_callback' => 'honeypress_slider_callback',
					'type'     => 'radio',
					'priority' => 10,
					'choices' => array(
						'bullets'=>__('Bullets', 'honeypress'),
						'navigation'=>__('Navigation', 'honeypress'),
						'both'=>__('Both', 'honeypress'),
					)
			));

	// animation
	$wp_customize->add_setting( 'animation', array( 'default' => '') );
	$wp_customize->add_control(	'animation',
		array(
			'label'    => __( 'Animation', 'honeypress' ),
			'section'  => 'slider_section',
			'active_callback' => 'honeypress_slider_callback',
			'type'     => 'select',
			'choices'=>array(
				''=>__('slide', 'honeypress'),
				'fadeIn'=>__('fade', 'honeypress')
				)
	));


	// animation speed
	$wp_customize->add_setting( 'animation_speed', array( 'default' => 3000) );
	$wp_customize->add_control(	'animation_speed',
		array(
			'label'    => __( 'Animation speed', 'honeypress' ),
			'section'  => 'slider_section',
			'active_callback' => 'honeypress_slider_callback',
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
	$wp_customize->add_setting( 'slider_smooth_speed', array( 'default' => 1000) );
	$wp_customize->add_control(	'slider_smooth_speed',
		array(
			'label'    => __( 'Smooth speed', 'honeypress' ),
			'section'  => 'slider_section',
			'active_callback' => 'honeypress_slider_callback',
			'type'     => 'select',
			   'choices' => array( '500'=>'0.5',
				'1000'=>'1.0',
				'1500'=>'1.5',
				'2000'=>'2.0',
				'2500'=>'2.5',
				'3000'=>'3.0')
	));

	// slider_autoplay
	$wp_customize->add_setting('slider_autoplay',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'slider_autoplay',
		array(
			'label'    => __( 'Enable/Disable Slider Autoplay', 'honeypress' ),
			'section'  => 'slider_section',
			'type'     => 'toggle',
		)
	));

	// Loop
	$wp_customize->add_setting('slider_loop',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'slider_loop',
		array(
			'label'    => __( 'Enable/Disable Slider Loop', 'honeypress' ),
			'description' => __( 'Note: If you want to add the video through URL in the Video widget, Disable it.', 'honeypress' ),
			'section'  => 'slider_section',
			'type'     => 'toggle',
		)
	));

	// Rewind
		$wp_customize->add_setting('slider_rewind',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'slider_rewind',
		array(
			'label'    => __( 'Enable/Disable Slider Rewind', 'honeypress' ),
			'description' => __( 'Note: This setting will work when the loop is disabled.', 'honeypress' ),
			'section'  => 'slider_section',
			'type'     => 'toggle',
		)
	));

	class WP_Slider_Note_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php _e('To know more about how the above settings are work','honeypress');?>, <a target="_blank" href="https://helpdoc.spicethemes.com/honeypress-pro/how-to-setup-slider-in-honeypress-pro/"><?php _e('Click here','honeypress');?></a></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'hp_slide_note_section',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control( new WP_Slider_Note_Customize_Control( $wp_customize, 'hp_slide_note_section', array(
			'section' => 'slider_section',
			'setting' => 'hp_slide_note_section',
			'active_callback' => 'honeypress_slider_callback',
	    ))
	);


	/**
	 * Add selective refresh for Front page Slider section controls.
	 */
	$wp_customize->selective_refresh->add_partial( 'honeypress_slider_content', array(
		'selector'            => '#slider-carousel .slider-caption .caption-content .title',
		'settings'            => 'honeypress_slider_content',

	) );
	    //Slider video
    $wp_customize->selective_refresh->add_partial( 'slide_video_url', array(
        'selector'            => '.video-slider',
        'settings'            => 'slide_video_url',

    ) );
