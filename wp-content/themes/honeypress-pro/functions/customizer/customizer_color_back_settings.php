<?php
function honeypress_color_back_settings_customizer( $wp_customize ){

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

/* Home Page Panel */
	$wp_customize->add_panel( 'colors_back_settings', array(
		'priority'       => 102,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Colors & Background','honeypress'),
	) );

	$wp_customize->add_section("background_image", array(
		'title' => esc_html__('Background Image', 'honeypress'),
		'panel' => 'colors_back_settings',
	));

	$wp_customize->add_section("colors", array(
		'title' => esc_html__('Background Color', 'honeypress'),
		'panel' => 'colors_back_settings',
	));

	/* ------------------------------------------------*/
	/* Header Color Settings */
	$wp_customize->add_section( 'header_color_settings', array(
		'title' => esc_html__('Header', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	
	$wp_customize->add_setting(
		'nav_header_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'nav_header_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Click Here To Apply Settings','honeypress'),
			'section' => 'header_color_settings',
		)
	);

	//Header background color
	$wp_customize->add_setting('header_background_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'header_background_color', array(
		'label'      => esc_html__('Header Background Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'header_background_color',) 
	) );

	class WP_Sitetitle_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Site Title','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'site_title_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Sitetitle_Color_Customize_Control( $wp_customize, 'site_title_color', array(	
			'section' => 'header_color_settings',
			'setting' => 'site_title_color',
	    ))
	);

	//Site title link color
	$wp_customize->add_setting('site_title_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_title_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'site_title_link_color',) 
	) );

	//Site title link hover color
	$wp_customize->add_setting('site_title_link_hover_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_title_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'site_title_link_hover_color',) 
	) );

	class WP_Sitetagline_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Site Tagline','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'site_tagline_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Sitetagline_Color_Customize_Control( $wp_customize, 'site_tagline_color', array(	
			'section' => 'header_color_settings',
			'setting' => 'site_tagline_color',
	    ))
	);

	//Site tagline text color
	$wp_customize->add_setting('site_tagline_text_color', array(
	'default' => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_tagline_text_color', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'site_tagline_text_color',) 
	) );

	//Site tagline text hover color
	$wp_customize->add_setting('site_tagline_hover_color', array(
	'default' => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_tagline_hover_color', array(
		'label'      => esc_html__('Text Hover Color', 'honeypress' ),
		'section'    => 'header_color_settings',
		'settings'   => 'site_tagline_hover_color',) 
	) );

/* ------------------------------------------------*/
	/* Sticky Header Color Settings */
	$wp_customize->add_section( 'sticky_header_color_settings', array(
		'title' => esc_html__('Sticky Header', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		

	class WP_Sticky_Header_Menus_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Sticky Header','honeypress'); ?></h3>
	    <?php
	    }
	}


	$wp_customize->add_setting(
	    'sticky_header_menus_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Sticky_Header_Menus_Color_Customize_Control( $wp_customize, 'sticky_header_menus_color', array(	
			'section' => 'sticky_header_color_settings',
			'setting' => 'sticky_header_menus_color',
	    ))
	);


	// Sticky Header enable/disable 
	$wp_customize->add_setting(
		'sticky_header_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'sticky_header_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Click Here To Apply Settings','honeypress'),
			'section' => 'sticky_header_color_settings',
		)
	);

	//Sticky Header Title Color
	$wp_customize->add_setting('sticky_header_title_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_title_color', array(
		'label'      => esc_html__('Site Title Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_title_color',) 
	) );

	//Sticky Header SubTitlte Color
	$wp_customize->add_setting('sticky_header_subtitle_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_subtitle_color', array(
		'label'      => esc_html__('Site Tagline Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_subtitle_color',) 
	) );

	//Sticky Header Backgound Color
	$wp_customize->add_setting('sticky_header_bg_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_bg_color', array(
		'label'      => esc_html__('Backgound Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_bg_color',) 
	) );

	//Sticky Header Menus text/link color
	$wp_customize->add_setting('sticky_header_menus_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_menus_link_color', array(
		'label'      => esc_html__('Text/Link Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_menus_link_color',) 
	) );

	//Sticky Header Menus text/link hover color
	$wp_customize->add_setting('sticky_header_menus_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_menus_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_menus_link_hover_color',) 
	) );

	//Sticky Header Menus text/link active color
	$wp_customize->add_setting('sticky_header_menus_link_active_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_menus_link_active_color', array(
		'label'      => esc_html__('Active Link Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_menus_link_active_color',) 
	) );

	class WP_Sticky_Header_Submenus_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Submenus','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'sticky_header_submenus_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Sticky_Header_Submenus_Color_Customize_Control( $wp_customize, 'sticky_header_submenus_color', array(	
			'section' => 'sticky_header_color_settings',
			'setting' => 'sticky_header_submenus_color',
	    ))
	);

	//Sticky Header Submenus Background color
	$wp_customize->add_setting('sticky_header_submenus_background_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_submenus_background_color', array(
		'label'      => esc_html__('Background Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_submenus_background_color',) 
	) );

	//Sticky Header Submenus text/link color
	$wp_customize->add_setting('sticky_header_submenus_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_submenus_link_color', array(
		'label'      => esc_html__('Text/Link Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_submenus_link_color',) 
	) );

	//Sticky Header Submenus text/link hover color
	$wp_customize->add_setting('sticky_header_submenus_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sticky_header_submenus_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'sticky_header_color_settings',
		'settings'   => 'sticky_header_submenus_link_hover_color',) 
	) );



	/* ------------------------------------------------*/
	/* Primary Menu Color Settings */
	$wp_customize->add_section( 'primary_menu_color_settings', array(
		'title' => esc_html__('Primary Menu', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		

	class WP_Menus_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Menus','honeypress'); ?></h3>
	    <?php
	    }
	}
	
	$wp_customize->add_setting(
	    'menus_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Menus_Color_Customize_Control( $wp_customize, 'menus_color', array(	
			'section' => 'primary_menu_color_settings',
			'setting' => 'menus_color',
	    ))
	);


	// enable/disable 
	$wp_customize->add_setting(
		'apply_menu_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_menu_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Click Here To Apply Menu Settings','honeypress'),
			'description' => __('Menu color setting will not work with Max Mega Menu Plugin','honeypress'),
			'section' => 'primary_menu_color_settings',
		)
	);

	//Menus text/link color
	$wp_customize->add_setting('menus_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_color', array(
		'label'      => esc_html__('Text/Link Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'menus_link_color',) 
	) );

	//Menus text/link hover color
	$wp_customize->add_setting('menus_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'menus_link_hover_color',) 
	) );

	//Menus text/link active color
	$wp_customize->add_setting('menus_link_active_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_active_color', array(
		'label'      => esc_html__('Active Link Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'menus_link_active_color',) 
	) );

	class WP_Submenus_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Submenus','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'submenus_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Submenus_Color_Customize_Control( $wp_customize, 'submenus_color', array(	
			'section' => 'primary_menu_color_settings',
			'setting' => 'submenus_color',
	    ))
	);

	//Submenus Background color
	$wp_customize->add_setting('submenus_background_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_background_color', array(
		'label'      => esc_html__('Background Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'submenus_background_color',) 
	) );

	//Submenus text/link color
	$wp_customize->add_setting('submenus_link_color', array(
	'default' => '#212529',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_link_color', array(
		'label'      => esc_html__('Text/Link Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'submenus_link_color',) 
	) );

	//Submenus text/link hover color
	$wp_customize->add_setting('submenus_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'primary_menu_color_settings',
		'settings'   => 'submenus_link_hover_color',) 
	) );



/* ------------------------------------------------*/
	/* After Menu Button CLR Settings */
	$wp_customize->add_section( 'after_menu_btn_color_settings', array(
		'title' => esc_html__('After Menu Button', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		

	// Enable After Menu Button Color Setting
	$wp_customize->add_setting( 'enable_after_menu_btn_clr_setting', array(
			'default' => false,
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control('enable_after_menu_btn_clr_setting', array(
			'label'    => __('Enable to apply below color setting', 'honeypress' ),
			'section'  => 'after_menu_btn_color_settings',
			'type' => 'checkbox',
		) );
	
	//After Menu Button BG color
	$wp_customize->add_setting('after_menu_btn_bg_clr', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'after_menu_btn_bg_clr', array(
		'label'      => esc_html__('Background Color', 'honeypress' ),
		'section'    => 'after_menu_btn_color_settings',
		'settings'   => 'after_menu_btn_bg_clr',) 
	) );

	//After Menu Button Text color
	$wp_customize->add_setting('after_menu_btn_txt_clr', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'after_menu_btn_txt_clr', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'after_menu_btn_color_settings',
		'settings'   => 'after_menu_btn_txt_clr',) 
	) );

	//After Menu Button Hover color
	$wp_customize->add_setting('after_menu_btn_hover_clr', array(
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'after_menu_btn_hover_clr', array(
		'label'      => esc_html__('Button Hover Color', 'honeypress' ),
		'section'    => 'after_menu_btn_color_settings',
		'settings'   => 'after_menu_btn_hover_clr',) 
	) );


	/* ------------------------------------------------*/
	/* Banner Color Settings */
	$wp_customize->add_section( 'banner_color_settings', array(
		'title' => esc_html__('Banner', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		

	class WP_Banner_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Banner Title','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'banner_title_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Banner_Color_Customize_Control( $wp_customize, 'banner_title_color', array(	
			'section' => 'banner_color_settings',
			'setting' => 'banner_title_color',
	    ))
	);

	//Banner title color
	$wp_customize->add_setting('banner_text_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'banner_text_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'banner_color_settings',
		'settings'   => 'banner_text_color',) 
	) );


	class WP_Breadcrumb_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Breadcrumb Title','honeypress'); ?></h3>
	    <?php
	    }
	}
		// Image overlay
		$wp_customize->add_setting( 'enable_brd_link_clr_setting', array(
			'default' => false,
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control('enable_brd_link_clr_setting', array(
			'label'    => __('Enable to apply below color setting', 'honeypress' ),
			'section'  => 'banner_color_settings',
			'type' => 'checkbox',
		) );
	$wp_customize->add_setting(
	    'breadcrumb_title_color',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Breadcrumb_Color_Customize_Control( $wp_customize, 'breadcrumb_title_color', array(	
			'section' => 'banner_color_settings',
			'setting' => 'breadcrumb_title_color',
	    ))
	);

	//Breadcrumb title link color
	$wp_customize->add_setting('breadcrumb_title_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'breadcrumb_title_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'banner_color_settings',
		'settings'   => 'breadcrumb_title_link_color',) 
	) );

	//Breadcrumb title link hover color
	$wp_customize->add_setting('breadcrumb_title_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'breadcrumb_title_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'banner_color_settings',
		'settings'   => 'breadcrumb_title_link_hover_color',) 
	) );


	/* ------------------------------------------------*/
	/* Content Color Settings */
	$wp_customize->add_section( 'content_color_settings', array(
		'title' => esc_html__('Content', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );

	$wp_customize->add_setting(
		'cont_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'cont_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Click Here To Apply Settings','honeypress'),
			'section' => 'content_color_settings',
		)
	);
	
   	//H1 color
	$wp_customize->add_setting('h1_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h1_color', array(
		'label'      => esc_html__('H1 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h1_color',) 
	) );

	//H2 color
	$wp_customize->add_setting('h2_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h2_color', array(
		'label'      => esc_html__('H2 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h2_color',) 
	) );

	//H3 color
	$wp_customize->add_setting('h3_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h3_color', array(
		'label'      => esc_html__('H3 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h3_color',) 
	) );

	//H4 color
	$wp_customize->add_setting('h4_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h4_color', array(
		'label'      => esc_html__('H4 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h4_color',) 
	) );

	//H5 color
	$wp_customize->add_setting('h5_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h5_color', array(
		'label'      => esc_html__('H5 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h5_color',) 
	) );

	//H6 color
	$wp_customize->add_setting('h6_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'h6_color', array(
		'label'      => esc_html__('H6 Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'h6_color',) 
	) );

	//P color
	$wp_customize->add_setting('p_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'p_color', array(
		'label'      => esc_html__('Paragraph Text Color', 'honeypress' ),
		'section'    => 'content_color_settings',
		'settings'   => 'p_color',) 
	) );



	/* ------------------------------------------------*/
	/* Slider Color Settings */
	$wp_customize->add_section( 'home_slider_page_color_settings', array(
		'title' => esc_html__('Slider Section', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );	

   	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_slider_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_slider_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Click Here To Use Button Color Setting','honeypress'),
			'section' => 'home_slider_page_color_settings',
		)
	);

	
	//Slider title color
	$wp_customize->add_setting('home_slider_title_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_slider_title_color', array(
		'label'      => esc_html__('Slider Title Color', 'honeypress' ),
		'section'    => 'home_slider_page_color_settings',
		'settings'   => 'home_slider_title_color',) 
	) );

	//Slider Subtitle color
	$wp_customize->add_setting('home_slider_subtitle_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_slider_subtitle_color', array(
		'label'      => esc_html__('Slider Subtitle Color', 'honeypress' ),
		'section'    => 'home_slider_page_color_settings',
		'settings'   => 'home_slider_subtitle_color',) 
	) );

	//SLider Button 1 color
	$wp_customize->add_setting('slider_btn1_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'slider_btn1_color', array(
		'label'      => esc_html__('Button 1 Color', 'honeypress' ),
		'section'    => 'home_slider_page_color_settings',
		'settings'   => 'slider_btn1_color',) 
	) );

	//SLider Button 1 Hover color
	$wp_customize->add_setting('slider_btn1_hover_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'slider_btn1_hover_color', array(
		'label'      => esc_html__('Button 1 Color Hover Color', 'honeypress' ),
		'section'    => 'home_slider_page_color_settings',
		'settings'   => 'slider_btn1_hover_color',) 
	) );

	//SLider Button 2 color
	$wp_customize->add_setting('slider_btn2_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'slider_btn2_color', array(
		'label'      => esc_html__('Button 2 Color', 'honeypress' ),
		'section'    => 'home_slider_page_color_settings',
		'settings'   => 'slider_btn2_color',) 
	) );

	//SLider Button 2 Hover color
	$wp_customize->add_setting('slider_btn2_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'slider_btn2_hover_color', array(
		'label'      => esc_html__('Button 2 Hover Color', 'honeypress' ),
		'section'    => 'home_slider_page_color_settings',
		'settings'   => 'slider_btn2_hover_color',) 
	) );


	/* ------------------------------------------------*/
	/* Testimonial Color Settings */
	$wp_customize->add_section( 'testimonial_page_color_settings', array(
		'title' => esc_html__('Testimonial Section', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	
	//Testimonial title color
	$wp_customize->add_setting('home_testi_title_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_testi_title_color', array(
		'label'      => esc_html__('Testimonial Title', 'honeypress' ),
		'section'    => 'testimonial_page_color_settings',
		'settings'   => 'home_testi_title_color',) 
	) );

	//Testimonial Subtitle color
	$wp_customize->add_setting('home_testi_subtitle_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_testi_subtitle_color', array(
		'label'      => esc_html__('Testimonial Subtitle', 'honeypress' ),
		'section'    => 'testimonial_page_color_settings',
		'settings'   => 'home_testi_subtitle_color',) 
	) );


	//Testimonial Image Border color
	$wp_customize->add_setting('home_testi_img_border_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_testi_img_border_color', array(
		'label'      => esc_html__('Testimonial Image Border', 'honeypress' ),
		'section'    => 'testimonial_page_color_settings',
		'settings'   => 'home_testi_img_border_color',) 
	) );

	//Testimonial Description color
	$wp_customize->add_setting('testimonial_description_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'testimonial_description_color', array(
		'label'      => esc_html__('Testimonial Description', 'honeypress' ),
		'section'    => 'testimonial_page_color_settings',
		'settings'   => 'testimonial_description_color',) 
	) );

	//Testimonial Client Name Hover color
	$wp_customize->add_setting('testi_clients_name_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'testi_clients_name_color', array(
		'label'      => esc_html__('Testimonial Name', 'honeypress' ),
		'section'    => 'testimonial_page_color_settings',
		'settings'   => 'testi_clients_name_color',) 
	) );

	//Testimonial Designation color
	$wp_customize->add_setting('testi_clients_designation_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'testi_clients_designation_color', array(
		'label'      => esc_html__('Testimonial Designation', 'honeypress' ),
		'section'    => 'testimonial_page_color_settings',
		'settings'   => 'testi_clients_designation_color',) 
	) );
















/* ------------------------------------------------*/
	/* CTA Color Settings */
	$wp_customize->add_section( 'cta_page_color_settings', array(
		'title' => esc_html__('CTA Section', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	
	//CTA title color
	$wp_customize->add_setting('home_cta_title_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_cta_title_color', array(
		'label'      => esc_html__('CTA Title', 'honeypress' ),
		'section'    => 'cta_page_color_settings',
		'settings'   => 'home_cta_title_color',) 
	) );

	//CTA Subtitle color
	$wp_customize->add_setting('home_cta_subtitle_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_cta_subtitle_color', array(
		'label'      => esc_html__('CTA Subtitle', 'honeypress' ),
		'section'    => 'cta_page_color_settings',
		'settings'   => 'home_cta_subtitle_color',) 
	) );

	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_cta_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_cta_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable To Apply This Setting','honeypress'),
			'section' => 'cta_page_color_settings',
		)
	);

	//CTA Button color
	$wp_customize->add_setting('home_cta_btn_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_cta_btn_color', array(
		'label'      => esc_html__('CTA Button', 'honeypress' ),
		'section'    => 'cta_page_color_settings',
		'settings'   => 'home_cta_btn_color',) 
	) );



	//CTA Button Hover color
	$wp_customize->add_setting('home_cta_btn_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'home_cta_btn_hover_color', array(
		'label'      => esc_html__('CTA Button Hover', 'honeypress' ),
		'section'    => 'cta_page_color_settings',
		'settings'   => 'home_cta_btn_hover_color',) 
	) );

	






	/* ------------------------------------------------*/
	/* Blog Page/Archive Color Settings */
	$wp_customize->add_section( 'blog_post_page_color_settings', array(
		'title' => esc_html__('Blog Page/Archive', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	

		// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_blg_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_blg_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable To Apply These Color Setting','honeypress'),
			'section' => 'blog_post_page_color_settings',
		)
	);


	//Blog Post/Page title color
	$wp_customize->add_setting('blog_post_page_title_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'blog_post_page_title_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'blog_post_page_color_settings',
		'settings'   => 'blog_post_page_title_color',) 
	) );

	//Blog Post/Page title hover color
	$wp_customize->add_setting('blog_post_page_title_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'blog_post_page_title_hover_color', array(
		'label'      => esc_html__('Title Hover Color', 'honeypress' ),
		'section'    => 'blog_post_page_color_settings',
		'settings'   => 'blog_post_page_title_hover_color',) 
	) );

	//Blog Post Meta link color
	$wp_customize->add_setting('blog_post_page_meta_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'blog_post_page_meta_link_color', array(
		'label'      => esc_html__('Meta Link Color', 'honeypress' ),
		'section'    => 'blog_post_page_color_settings',
		'settings'   => 'blog_post_page_meta_link_color',) 
	) );

	//Blog Post Meta link hover color
	$wp_customize->add_setting('blog_post_page_meta_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'blog_post_page_meta_link_hover_color', array(
		'label'      => esc_html__('Meta Link Hover Color', 'honeypress' ),
		'section'    => 'blog_post_page_color_settings',
		'settings'   => 'blog_post_page_meta_link_hover_color',) 
	) );


	/* ------------------------------------------------*/
	/* Single Post/Page Color Settings */
	$wp_customize->add_section( 'single_post_page_color_settings', array(
		'title' => esc_html__('Single Post', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	
	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_blg_single_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_blg_single_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable To Apply These Color Setting','honeypress'),
			'section' => 'single_post_page_color_settings',
		)
	);

	//Single Post/Page title color
	$wp_customize->add_setting('single_post_page_title_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'single_post_page_title_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'single_post_page_color_settings',
		'settings'   => 'single_post_page_title_color',) 
	) );

	//Single Post/Page title hover color
	$wp_customize->add_setting('single_post_page_title_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'single_post_page_title_hover_color', array(
		'label'      => esc_html__('Title Hover Color', 'honeypress' ),
		'section'    => 'single_post_page_color_settings',
		'settings'   => 'single_post_page_title_hover_color',) 
	) );

	//Single Post Meta link color
	$wp_customize->add_setting('single_post_page_meta_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'single_post_page_meta_link_color', array(
		'label'      => esc_html__('Meta Link Color', 'honeypress' ),
		'section'    => 'single_post_page_color_settings',
		'settings'   => 'single_post_page_meta_link_color',) 
	) );

	//Single Post Meta link hover color
	$wp_customize->add_setting('single_post_page_meta_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'single_post_page_meta_link_hover_color', array(
		'label'      => esc_html__('Meta Link Hover Color', 'honeypress' ),
		'section'    => 'single_post_page_color_settings',
		'settings'   => 'single_post_page_meta_link_hover_color',) 
	) );


	/* ------------------------------------------------*/
	/* Sidebar Widget Color Settings */
	$wp_customize->add_section( 'sidebar_widget_color_settings', array(
		'title' => esc_html__('Sidebar', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	
	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_sibar_link_hover_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_sibar_link_hover_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable To Apply These Color Setting','honeypress'),
			'section' => 'sidebar_widget_color_settings',
		)
	);
	
	//Sidebar widget title color
	$wp_customize->add_setting('sidebar_widget_title_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_title_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_title_color',) 
	) );

	//Sidebar widget text color
	$wp_customize->add_setting('sidebar_widget_text_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_text_color', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_text_color',) 
	) );

	//Sidebar widget link color
	$wp_customize->add_setting('sidebar_widget_link_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_link_color',) 
	) );


	//Sidebar widget link hover color
	$wp_customize->add_setting('sidebar_widget_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'sidebar_widget_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'sidebar_widget_color_settings',
		'settings'   => 'sidebar_widget_link_hover_color',) 
	) );


	/* ------------------------------------------------*/
	/* Footer Widget Color Settings */
	$wp_customize->add_section( 'footer_widget_color_settings', array(
		'title' => esc_html__('Footer Widget', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	
	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_ftrsibar_link_hover_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_ftrsibar_link_hover_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable To Apply These Color Setting','honeypress'),
			'section' => 'footer_widget_color_settings',
		)
	);

	//Footer widget background color
	$wp_customize->add_setting('footer_widget_background_color', array(
	'default' => '#061018',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_background_color', array(
		'label'      => esc_html__('Background Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_background_color',) 
	) );

	//Footer widget title color
	$wp_customize->add_setting('footer_widget_title_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_title_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_title_color',) 
	) );

	//Footer widget text color
	$wp_customize->add_setting('footer_widget_text_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_text_color', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_text_color',) 
	) );

	//Footer widget link color
	$wp_customize->add_setting('footer_widget_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_link_color',) 
	) );

	//Footer widget link hover color
	$wp_customize->add_setting('footer_widget_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'footer_widget_color_settings',
		'settings'   => 'footer_widget_link_hover_color',) 
	) );


	/* ------------------------------------------------*/
	/* Footer Bar Color Settings */
	$wp_customize->add_section( 'footer_bar_color_settings', array(
		'title' => esc_html__('Footer Bar', 'honeypress'),
		'panel' => 'colors_back_settings',
   	) );		
	
	//Footer bar background color
	$wp_customize->add_setting('footer_bar_background_color', array(
	'default' => '#020508',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bar_background_color', array(
		'label'      => esc_html__('Background Color', 'honeypress' ),
		'section'    => 'footer_bar_color_settings',
		'settings'   => 'footer_bar_background_color',) 
	) );

	//Footer widget title color
	$wp_customize->add_setting('advance_footer_bar_title_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'advance_footer_bar_title_color', array(
		'label'      => esc_html__('Title Color', 'honeypress' ),
		'section'    => 'footer_bar_color_settings',
		'settings'   => 'advance_footer_bar_title_color',) 
	) );

	//Footer bar text color
	$wp_customize->add_setting('footer_bar_text_color', array(
	'default' => '#bec3c7',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bar_text_color', array(
		'label'      => esc_html__('Text Color', 'honeypress' ),
		'section'    => 'footer_bar_color_settings',
		'settings'   => 'footer_bar_text_color',) 
	) );

	//Footer bar link color
	$wp_customize->add_setting('footer_bar_link_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bar_link_color', array(
		'label'      => esc_html__('Link Color', 'honeypress' ),
		'section'    => 'footer_bar_color_settings',
		'settings'   => 'footer_bar_link_color',) 
	) );

	// enable/disable 
	$wp_customize->add_setting(
		'apply_foot_hover_anchor_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_foot_hover_anchor_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Click Here To Apply Link Hover Color Settings','honeypress'),
			'section' => 'footer_bar_color_settings',
		)
	);

	//Footer bar link hover color
	$wp_customize->add_setting('footer_bar_link_hover_color', array(
	'default' => '#2d6ef8',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bar_link_hover_color', array(
		'label'      => esc_html__('Link Hover Color', 'honeypress' ),
		'section'    => 'footer_bar_color_settings',
		'settings'   => 'footer_bar_link_hover_color',) 
	) );

}
add_action( 'customize_register', 'honeypress_color_back_settings_customizer' );