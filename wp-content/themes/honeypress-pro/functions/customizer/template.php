<?php
/**
 * Template Options Customizer
 *
 * @package honeypress
 */
function honeypress_template_customizer ( $wp_customize )
{
	$wp_customize->add_panel('honeypress_template_settings',
		array(
			'priority' => 920,
			'capability' => 'edit_theme_options',
			'title' => __('Template Settings','honeypress')
		)
	);
	
	
	// add section to manage About us page settings
	$wp_customize->add_section(
        'about_page_section',
        array(
            'title' =>__('About Us page settings','honeypress'),
			'panel'  => 'honeypress_template_settings',
			'priority'   => 100,
			)
    );

	// enable/disable Funfact section from about page
	$wp_customize->add_setting('about_funfact_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'about_funfact_enable',
		array(
			'label'    => __( 'Enable / Disable Funfact section', 'honeypress' ),
			'section'  => 'about_page_section',
			'type'     => 'toggle',
		)
	));

	// enable/disable Team section from about page
	$wp_customize->add_setting('about_team_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'about_team_enable',
		array(
			'label'    => __( 'Enable / Disable Team section', 'honeypress' ),
			'section'  => 'about_page_section',
			'type'     => 'toggle',
		)
	));

	//Team Design for about template
		$wp_customize->add_setting( 'about_team_design_layout', array( 'default' => 1) );
		$wp_customize->add_control(	'about_team_design_layout', 
		array(
			'label'    => __( 'Team Design', 'honeypress' ),
			'active_callback'=> 'honeypress_abt_team_callback',
			'section'  => 'about_page_section',
			'type'     => 'select',
			'choices'=>array(
				1=>__('Design 1', 'honeypress'),
				2=>__('Design 2', 'honeypress'),
				3=>__('Design 3', 'honeypress'),
				4=>__('Design 4', 'honeypress')
				)
		));

	// enable/disable Testimonial section from about page
	$wp_customize->add_setting('about_testimonial_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'about_testimonial_enable',
		array(
			'label'    => __( 'Enable / Disable Testimonial section', 'honeypress' ),
			'section'  => 'about_page_section',
			'type'     => 'toggle',
		)
	));
	//Testimonial Design
		$wp_customize->add_setting( 'about_testimonial_design_layout', array( 'default' => 1) );
		$wp_customize->add_control(	'about_testimonial_design_layout', 
		array(
			'label'    => __( 'Testimonial Design', 'honeypress' ),
			'active_callback'=> 'honeypress_abt_testi_callback',
			'section'  => 'about_page_section',
			'type'     => 'select',
			'choices'=>array(
				1=>__('Design 1', 'honeypress'),
				2=>__('Design 2', 'honeypress'),
				3=>__('Design 3', 'honeypress'),
				4=>__('Design 4', 'honeypress'),
				5=>__('Design 5', 'honeypress'),
				6=>__('Design 6', 'honeypress')
				)
		));
	
	// enable/disable Client Section
	$wp_customize->add_setting('about_client_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'about_client_enable',
		array(
			'label'    => __( 'Enable / Disable Client section', 'honeypress' ),
			'section'  => 'about_page_section',
			'type'     => 'toggle',
		)
	));


	
	// Add section to manage Service page settings
	$wp_customize->add_section(
        'service_page_section',
        array(
            'title' => esc_html__('Service page settings','honeypress'),
			'panel'  => 'honeypress_template_settings',
			'priority'   => 200,
			)
    );

	// enable/disable Service section from service page
	$wp_customize->add_setting('services_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'services_enable',
		array(
			'label'    => __( 'Enable / Disable Service section', 'honeypress' ),
			'section'  => 'service_page_section',
			'type'     => 'toggle',
		)
	));

	// enable/disable Testimonial section from service page
	$wp_customize->add_setting('service_testimonial_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'service_testimonial_enable',
		array(
			'label'    => __( 'Enable / Disable Testimonial section', 'honeypress' ),
			'section'  => 'service_page_section',
			'type'     => 'toggle',
		)
	));	
	
	// enable/disable Funfact section from service page
	$wp_customize->add_setting('service_funfact_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'service_funfact_enable',
		array(
			'label'    => __( 'Enable / Disable Funfact section', 'honeypress' ),
			'section'  => 'service_page_section',
			'type'     => 'toggle',
		)
	));	

	// enable/disable Callout section from service page
	$wp_customize->add_setting('service_callout_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'service_callout_enable',
		array(
			'label'    => __( 'Enable / Disable Callout section', 'honeypress' ),
			'section'  => 'service_page_section',
			'type'     => 'toggle',
		)
	));
	
	 // enable/disable Client Section from service page
	$wp_customize->add_setting('service_client_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'service_client_enable',
		array(
			'label'    => __( 'Enable / Disable Client section', 'honeypress' ),
			'section'  => 'service_page_section',
			'type'     => 'toggle',
		)
	));	


	// Add section to manage Portfolio page settings
	$wp_customize->add_section(
        'porfolio_page_section',
        array(
            'title' => __('Portfolio page settings','honeypress'),
			'panel'  => 'honeypress_template_settings',
			'priority'   => 300,
			)
    );

	// Add section to manage Testimonial page settings
	$wp_customize->add_section(
        'testimonial_page_section',
        array(
            'title' => esc_html__('Testimonial page settings','honeypress'),
			'panel'  => 'honeypress_template_settings',
			'priority'   => 310,
			)
    );

	// enable/disable Testimonial section from testimonial page
	$wp_customize->add_setting('testimonial_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'testimonial_enable',
		array(
			'label'    => __( 'Enable / Disable Testimonial section', 'honeypress' ),
			'section'  => 'testimonial_page_section',
			'type'     => 'toggle',
		)
	));

	 // enable/disable Client Section from testimonial page
	$wp_customize->add_setting('testimonial_client_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'testimonial_client_enable',
		array(
			'label'    => __( 'Enable / Disable Client section', 'honeypress' ),
			'section'  => 'testimonial_page_section',
			'type'     => 'toggle',
		)
	));	   

	// Add section to manage Team page settings
	$wp_customize->add_section(
        'team_page_section',
        array(
            'title' => esc_html__('Team page settings','honeypress'),
			'panel'  => 'honeypress_template_settings',
			'priority'   => 320,
			)
    );

	// enable/disable Testimonial section from testimonial page
	$wp_customize->add_setting('team_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'team_enable',
		array(
			'label'    => __( 'Enable / Disable Team section', 'honeypress' ),
			'section'  => 'team_page_section',
			'type'     => 'toggle',
		)
	));

	 // enable/disable Client Section from testimonial page
	$wp_customize->add_setting('team_client_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'team_client_enable',
		array(
			'label'    => __( 'Enable / Disable Client section', 'honeypress' ),
			'section'  => 'team_page_section',
			'type'     => 'toggle',
		)
	));	   

     // Portfolio page title
	$wp_customize->add_setting(
		'porfolio_page_title', array(
		'default' => __('Our Portfolio', 'honeypress'),
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'porfolio_page_title',
		array(
			'type' => 'text',
			'label' => __('Title','honeypress'),
			'section' => 'porfolio_page_section',
		)
	);

	// Portfolio page subtitle
	$wp_customize->add_setting(
		'porfolio_page_subtitle', array(
		'default' => __('Our Recent Works', 'honeypress'),
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'porfolio_page_subtitle',
		array(
			'type' => 'text',
			'label' => __('Sub Title','honeypress'),
			'section' => 'porfolio_page_section',
		)
	);

	// Number of Portfolio in Portfolio's template
	$wp_customize->add_setting(
    'portfolio_numbers_options',
    array(
       'default' => 4,
	   'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control('portfolio_numbers_options',
		array(
	 'type' => 'number',
	 'label'   => __('Number of portfolio on portfolio templates','honeypress'),
    'section' => 'porfolio_page_section',
	'input_attrs' => array(
            'min' => '1', 'step' => '1', 'max' => '50',
          ),
		)
	);


	// Add section to manage Portfolio category page settings
    $wp_customize->add_section(
       'porfolio_category_page_section',
       array(
           'title' => __('Portfolio Category page settings','honeypress'),
            'panel'  => 'honeypress_template_settings',
            'priority'   => 400,
            )
   );
    // Portfolio category page title
    $wp_customize->add_setting(
        'porfolio_category_page_title', array(
        'default' => __('Portfolio Category Title', 'honeypress'),
        'sanitize_callback' => 'sanitize_text_field',
        ));
    $wp_customize->add_control(
        'porfolio_category_page_title',
        array(
            'type' => 'text',
            'label' => __('Title','honeypress'),
            'section' => 'porfolio_category_page_section',
        )
    );
    // Portfolio category page subtitle
    $wp_customize->add_setting(
        'porfolio_category_page_desc', array(
        'default' => __('Morbi facilisis, ipsum ut ullamcorper venenatis, nisi diam placerat turpis, at auctor nisi magna cursus arcu.', 'honeypress'),
        'sanitize_callback' => 'sanitize_text_field',
        ));
    $wp_customize->add_control(
        'porfolio_category_page_desc',
        array(
            'type' => 'text',
            'label' => __('Description','honeypress'),
            'section' => 'porfolio_category_page_section',
        )
    );
    // Number of portfolio column layout
        $wp_customize->add_setting('portfolio_cat_column_layout',array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control('portfolio_cat_column_layout',array(
        'type' => 'select',
        'label' => __('Select column layout','honeypress'),
        'section' => 'porfolio_category_page_section',
        'choices' => array(2=>2,3=>3,4=>4),
        ) );
 
	// Add section to manage Contact page settings
	$wp_customize->add_section(
        'contact_page_section',
        array(
            'title' => __('Contact page setting','honeypress'),
			'panel'  => 'honeypress_template_settings',
			'priority'   => 500,
			)
    );

     // Conatct page title
	$wp_customize->add_setting(
		'contact_page_title', array(
		'default' => __('Contact Info', 'honeypress'),
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'contact_page_title',
		array(
			'type' => 'text',
			'label' => __('Title','honeypress'),
			'section' => 'contact_page_section',
		)
	);

	// Conatct page subtitle
	$wp_customize->add_setting(
		'contact_page_subtitle', array(
		'default' => __('Get In Touch With Us', 'honeypress'),
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'contact_page_subtitle',
		array(
			'type' => 'text',
			'label' => __('Sub Title','honeypress'),
			'section' => 'contact_page_section',
		)
	);

	if ( class_exists( 'honeypress_Repeater' ) ) 
	{
		$wp_customize->add_setting( 'honeypress_contact_content', array() );

		$wp_customize->add_control( new honeypress_Repeater( $wp_customize, 'honeypress_contact_content', array(
			'label'                             => esc_html__( 'Contact Details', 'honeypress' ),
			'section'                           => 'contact_page_section',
			'priority'                          => 10,
			'add_field_label'                   => esc_html__( 'Add new Contact', 'honeypress' ),
			'item_name'                         => esc_html__( 'Contact', 'honeypress' ),
			'customizer_repeater_icon_control'  => true,
			'customizer_repeater_link_control'  => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_text_control'  => true,
		) ) );
	}	

	// Map heading
	$wp_customize->add_setting(
		'contact_page_map_heading', array(
		'default' => __('Find Us On The Map', 'honeypress'),
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'contact_page_map_heading',
		array(
			'type' => 'text',
			'label' => __('Map Heading','honeypress'),
			'section' => 'contact_page_section',
		)
	);

	// google map shortcode
		$wp_customize->add_setting('contact_google_map_shortcode',array(
		'capability'  => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control('contact_google_map_shortcode',array(
		'label' => __('Google Map Shortcode','honeypress'),
		'section' => 'contact_page_section',
		'type' => 'textarea',
		));


	// Contact form heading
	$wp_customize->add_setting(
		'contact_page_form_heading', array(
		'default' => __('Drop Us A Line', 'honeypress'),
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'contact_page_form_heading',
		array(
			'type' => 'text',
			'label' => __('Contact Form Heading','honeypress'),
			'section' => 'contact_page_section',
		)
	);

	// Contact form 7 shortcode
		$wp_customize->add_setting('contact_form_shortcode',array(
		'capability'  => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control('contact_form_shortcode',array(
		'label' => esc_html__('Contact Form shortcode','honeypress'),
		'section' => 'contact_page_section',
		'type' => 'textarea',
		));

	}


	add_action( 'customize_register', 'honeypress_template_customizer' );
	
?>