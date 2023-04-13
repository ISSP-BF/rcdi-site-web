<?php

function spicepress_about_template_customizer($wp_customize) {

    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';

//About Page Template panel 
    $wp_customize->add_panel('template_setting', array(
        'priority' => 920,
        'capability' => 'edit_theme_options',
        'title' => __('Template settings', 'spicepress'),
    ));

    // add section to manage About
    $wp_customize->add_section(
            'about_section_settings',
            array(
                'title' => __('About Us page settings', 'spicepress'),
                'panel' => 'template_setting',
                'priority' => 100,
            )
    );

    // enable/disable testimonial section from about page
    $wp_customize->add_setting(
            'about_testimonial_enable',
            array('capability' => 'edit_theme_options',
                'default' => true,
    ));

    $wp_customize->add_control(
            'about_testimonial_enable',
            array(
                'type' => 'checkbox',
                'label' => __('Enable Testimonial section', 'spicepress'),
                'section' => 'about_section_settings',
            )
    );


    // enable/disable team section from about page
    $wp_customize->add_setting(
            'about_team_enable',
            array('capability' => 'edit_theme_options',
                'default' => true,
    ));

    $wp_customize->add_control(
            'about_team_enable',
            array(
                'type' => 'checkbox',
                'label' => __('Enable team section', 'spicepress'),
                'section' => 'about_section_settings',
            )
    );


    // enable/disable Footer Callout Section
    $wp_customize->add_setting(
            'footer_callout_enable',
            array('capability' => 'edit_theme_options',
                'default' => true,
    ));

    $wp_customize->add_control(
            'footer_callout_enable',
            array(
                'type' => 'checkbox',
                'label' => __('Enable Footer Callout section', 'spicepress'),
                'section' => 'about_section_settings',
            )
    );

    /* Service settings */
    $wp_customize->add_section('service_template', array(
        'title' => __('Service page settings', 'spicepress'),
        'panel' => 'template_setting',
        'priority' => 200,
    ));


    // Enable Service Section
    $wp_customize->add_setting('enable_service_section_service', array('default' => 'on'));
    $wp_customize->add_control('enable_service_section_service', array(
        'label' => __('Enable Service section', 'spicepress'),
        'section' => 'service_template',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    // Enable Testimonial Section
    $wp_customize->add_setting('enable_testimonial_section_service', array('default' => 'on'));
    $wp_customize->add_control('enable_testimonial_section_service', array(
        'label' => __('Enable Testimonial section', 'spicepress'),
        'section' => 'service_template',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    // Enable Client Section
    $wp_customize->add_setting('enable_client_section_service', array('default' => 'on'));
    $wp_customize->add_control('enable_client_section_service', array(
        'label' => __('Enable Client section', 'spicepress'),
        'section' => 'service_template',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    // add section to manage portfolio
    $wp_customize->add_section(
            'portfolio_temp_setting',
            array(
                'title' => __('Portfolio page settings', 'spicepress'),
                'panel' => 'template_setting',
                'priority' => 400,
            )
    );


    // portfolio template title
    $wp_customize->add_setting('portfolio_tmp_title', array(
        'capability' => 'edit_theme_options',
        'default' => __('Portfolio Title', 'spicepress'),
        'sanitize_callback' => 'theme_slug_sanitize_html',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('portfolio_tmp_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'portfolio_temp_setting',
        'type' => 'text',
    ));

    // portfolio template description
    $wp_customize->add_setting('portfolio_tmp_desc', array(
        'capability' => 'edit_theme_options',
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'sanitize_callback' => 'spicepress_template_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('portfolio_tmp_desc', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'portfolio_temp_setting',
        'type' => 'text',
    ));

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
                'label' => __('Number of portfolio on portfolio templates', 'spicepress'),
                'section' => 'portfolio_temp_setting',
                'input_attrs' => array(
                    'min' => '1', 'step' => '1', 'max' => '50',
                ),
            )
    );
    
    //add section to manage Testimonial template
    $wp_customize->add_section('testimonial_template', array(
        'title' => __('Testimonial page settings', 'spicepress'),
        'panel' => 'template_setting',
        'priority' => 410,
    ));
    // Enable Testimonial Section
    $wp_customize->add_setting('enable_testimonial_section_testimonial', array('default' => 'on'));
    $wp_customize->add_control('enable_testimonial_section_testimonial', array(
        'label' => __('Enable Testimonial section', 'spicepress'),
        'section' => 'testimonial_template',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));
    // Enable Client Section
    $wp_customize->add_setting('enable_client_section_testimonial', array('default' => 'on'));
    $wp_customize->add_control('enable_client_section_testimonial', array(
        'label' => __('Enable Client section', 'spicepress'),
        'section' => 'testimonial_template',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    // add section to manage portfolio category
    $wp_customize->add_section(
            'portfolio_cat_setting',
            array(
                'title' => __('Portfolio category settings', 'spicepress'),
                'panel' => 'template_setting',
                'priority' => 500,
            )
    );


    // portfolio  category template title
    $wp_customize->add_setting('portfolio_cat_title', array(
        'capability' => 'edit_theme_options',
        'default' => __('Portfolio category title', 'spicepress'),
        'sanitize_callback' => 'theme_slug_sanitize_html',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('portfolio_cat_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'portfolio_cat_setting',
        'type' => 'text',
    ));

    // portfolio template description
    $wp_customize->add_setting('portfolio_cat_desc', array(
        'capability' => 'edit_theme_options',
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'sanitize_callback' => 'spicepress_template_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('portfolio_cat_desc', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'portfolio_cat_setting',
        'type' => 'text',
    ));

    // Number of portfolio column layout
    $wp_customize->add_setting('portfolio_cat_column_layout', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('portfolio_cat_column_layout', array(
        'type' => 'select',
        'label' => __('Select column layout', 'spicepress'),
        'section' => 'portfolio_cat_setting',
        'choices' => array(2 => 2, 3 => 3, 4 => 4),
    ));


    // add section to manage portfolio category
    $wp_customize->add_section(
            'post_type_slug_settings',
            array(
                'title' => __('Post type slug setting', 'spicepress'),
                'panel' => 'template_setting',
                'priority' => 600,
            )
    );

    //portofolio_slug
    $wp_customize->add_setting('project_slug', array(
        'default' => 'project_category',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('project_slug', array(
        'label' => __('Project slug', 'spicepress'),
        'section' => 'post_type_slug_settings',
        'type' => 'text',
    ));

    class spicepress_Customize_slug extends WP_Customize_Control {

        public function render_content() {
            ?>
            <h3><?php _e("After changing the slug, please do not forget to save the permalinks. Without saving, the old permalinks will not update.", "spicepress"); ?> 
            <?php
        }

    }

    $wp_customize->add_setting('spicepress_slug_setting', array(
        'default' => false,
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control(
            new spicepress_Customize_slug(
                    $wp_customize,
                    'spicepress_slug_setting',
                    array(
                'label' => __('SpicePress slug', 'spicepress'),
                'section' => 'post_type_slug_settings',
                'settings' => 'spicepress_slug_setting',
    )));

    class WP_slug_Customize_Control extends WP_Customize_Control {

        public $type = 'new_menu';

        /**
         * Render the control's content.
         */
        public function render_content() {
            ?>
                <a href="<?php bloginfo('url'); ?>/wp-admin/options-permalink.php" class="button"  target="_blank"><?php _e('Click here for permalinks settings', 'spicepress'); ?></a>
                <?php
            }

        }

        //Gallery template settings
        $wp_customize->add_section(
                'gallery_temp_setting',
                array(
                    'title' => __('Gallery page settings', 'spicepress'),
                    'panel' => 'template_setting',
                    'priority' => 700,
                )
        );


        // Number of Gallery column layout
        $wp_customize->add_setting('gallery_template_column_layout', array(
            'default' => 4,
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('gallery_template_column_layout', array(
            'type' => 'select',
            'label' => __('Select column layout', 'spicepress'),
            'section' => 'gallery_temp_setting',
            'choices' => array(2 => 2, 3 => 3, 4 => 4),
        ));


        // Gallery template title
        $wp_customize->add_setting('gallery_tmp_title', array(
            'capability' => 'edit_theme_options',
            'default' => __('Gallery title', 'spicepress'),
            'sanitize_callback' => 'spicepress_template_page_sanitize_text',
            'transport' => $selective_refresh,
        ));
        $wp_customize->add_control('gallery_tmp_title', array(
            'label' => __('Title', 'spicepress'),
            'section' => 'gallery_temp_setting',
            'type' => 'text',
        ));

        // Gallery template description
        $wp_customize->add_setting('gallery_tmp_desc', array(
            'capability' => 'edit_theme_options',
            'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
            'sanitize_callback' => 'spicepress_template_page_sanitize_text',
            'transport' => $selective_refresh,
        ));
        $wp_customize->add_control('gallery_tmp_desc', array(
            'label' => __('Description', 'spicepress'),
            'section' => 'gallery_temp_setting',
            'type' => 'text',
        ));



        $wp_customize->add_section(
                'breadcrumbs_setting',
                array(
                    'title' => __('Archive page title', 'spicepress'),
                    'description' => '',
                    'panel' => 'template_setting',
                    'priority' => 800,
                )
        );

        $wp_customize->add_setting(
                'archive_prefix',
                array(
                    'default' => __('Archive', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('archive_prefix', array(
            'label' => __('Archive', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));

        $wp_customize->add_setting(
                'category_prefix',
                array(
                    'default' => __('Category', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('category_prefix', array(
            'label' => __('Category', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));

        $wp_customize->add_setting(
                'author_prefix',
                array(
                    'default' => __('All posts by', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('author_prefix', array(
            'label' => __('Author', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));

        $wp_customize->add_setting(
                'tag_prefix',
                array(
                    'default' => __('Tag', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('tag_prefix', array(
            'label' => __('Tag', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));


        $wp_customize->add_setting(
                'search_prefix',
                array(
                    'default' => __('Search results for', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('search_prefix', array(
            'label' => __('Search', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));

        $wp_customize->add_setting(
                '404_prefix',
                array(
                    'default' => __('404', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('404_prefix', array(
            'label' => __('404', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));

        $wp_customize->add_setting(
                'project_prefix',
                array(
                    'default' => __('Project categories', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('project_prefix', array(
            'label' => __('Project categories', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));


        $wp_customize->add_setting(
                'shop_prefix',
                array(
                    'default' => __('Shop', 'spicepress'),
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'spicepress_template_page_sanitize_text',
                )
        );
        $wp_customize->add_control('shop_prefix', array(
            'label' => __('Shop', 'spicepress'),
            'section' => 'breadcrumbs_setting',
            'type' => 'text'
        ));

        // contact page section
        $wp_customize->add_section('contact_page_section', array(
            'title' => 'Contact page settings',
            'description' => '',
            'panel' => 'template_setting',
            'priority' => 900,
        ));


        // contact form title
        $wp_customize->add_setting('contact_form_title', array(
            'capability' => 'edit_theme_options',
            'default' => __('Get in touch with us', 'spicepress'),
            'sanitize_callback' => 'spicepress_template_page_sanitize_text',
            'transport' => $selective_refresh,
        ));
        $wp_customize->add_control('contact_form_title', array(
            'label' => __('Contact form title', 'spicepress'),
            'section' => 'contact_page_section',
            'type' => 'text',
        ));

        // contact form enable / disable
        $wp_customize->add_setting('contact_form_enable', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('contact_form_enable', array(
            'label' => __('Enable Contact form', 'spicepress'),
            'section' => 'contact_page_section',
            'type' => 'checkbox',
        ));

        // google map title
        $wp_customize->add_setting('google_map_title', array(
            'capability' => 'edit_theme_options',
            'default' => __('Find us on the map', 'spicepress'),
            'sanitize_callback' => 'spicepress_template_page_sanitize_text',
            'transport' => $selective_refresh,
        ));
        $wp_customize->add_control('google_map_title', array(
            'label' => __('Contact Google Map title', 'spicepress'),
            'section' => 'contact_page_section',
            'type' => 'text',
        ));

        // google map url
        $wp_customize->add_setting('contact_google_map_shortcode', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => $selective_refresh,
        ));
        $wp_customize->add_control('contact_google_map_shortcode', array(
            'label' => __('Google Map Shortcode', 'spicepress'),
            'section' => 'contact_page_section',
            'type' => 'textarea',
        ));

        // google map enable / disable
        $wp_customize->add_setting('google_map_enable', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('google_map_enable', array(
            'label' => __('Enable Google map', 'spicepress'),
            'section' => 'contact_page_section',
            'type' => 'checkbox',
        ));

        // contact info enable / disable
        $wp_customize->add_setting('contact_info_enable', array(
            'default' => true,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('contact_info_enable', array(
            'label' => __('Enable contact info', 'spicepress'),
            'section' => 'contact_page_section',
            'type' => 'checkbox',
        ));
    }

    add_action('customize_register', 'spicepress_about_template_customizer');

    function spicepress_register_template_section_partials($wp_customize) {


//Portfolio Template
        $wp_customize->selective_refresh->add_partial('portfolio_tmp_title', array(
            'selector' => '.page-template .padding-0 .section-header .widget-title',
            'settings' => 'portfolio_tmp_title',
            'render_callback' => 'portfolio_tmp_title_render_callback',
        ));

        $wp_customize->selective_refresh->add_partial('portfolio_tmp_desc', array(
            'selector' => '.page-template .padding-0 .section-header p',
            'settings' => 'portfolio_tmp_desc',
            'render_callback' => 'portfolio_tmp_desc_render_callback',
        ));

//Portfolio Category page
        $wp_customize->selective_refresh->add_partial('portfolio_cat_title', array(
            'selector' => '.portfolio_cat_page .section-header .widget-title',
            'settings' => 'portfolio_cat_title',
            'render_callback' => 'portfolio_cat_title_render_callback',
        ));

        $wp_customize->selective_refresh->add_partial('portfolio_cat_desc', array(
            'selector' => '.portfolio_cat_page .section-header p',
            'settings' => 'portfolio_cat_desc',
            'render_callback' => 'portfolio_cat_desc_render_callback',
        ));


//Gallery Template
        $wp_customize->selective_refresh->add_partial('gallery_tmp_title', array(
            'selector' => '.page-template-template-gallery .gallery-section .section-header .widget-title',
            'settings' => 'gallery_tmp_title',
            'render_callback' => 'gallery_tmp_title_render_callback',
        ));

        $wp_customize->selective_refresh->add_partial('gallery_tmp_desc', array(
            'selector' => '.page-template-template-gallery .gallery-section .section-header p',
            'settings' => 'gallery_tmp_desc',
            'render_callback' => 'gallery_tmp_desc_render_callback',
        ));

//Contact Form Heading
        $wp_customize->selective_refresh->add_partial('contact_form_title', array(
            'selector' => '.cont-section .contact_form_heading .section-title .widget-title',
            'settings' => 'contact_form_title',
            'render_callback' => 'contact_form_title_render_callback',
        ));

//Google Map Heading
        $wp_customize->selective_refresh->add_partial('google_map_title', array(
            'selector' => '.cont-section .map-section .section-title .widget-title',
            'settings' => 'google_map_title',
            'render_callback' => 'google_map_title_render_callback',
        ));

//Google Map Shortcode
        $wp_customize->selective_refresh->add_partial('contact_google_map_shortcode', array(
            'selector' => '.cont-section .map-section .cont-google-map',
            'settings' => 'contact_google_map_shortcode',
            'render_callback' => 'contact_google_map_shortcode_render_callback',
        ));
    }

    add_action('customize_register', 'spicepress_register_template_section_partials');

    function portfolio_tmp_title_render_callback() {
        return get_theme_mod('portfolio_tmp_title');
    }

    function portfolio_tmp_desc_render_callback() {
        return get_theme_mod('portfolio_tmp_desc');
    }

    function portfolio_cat_title_render_callback() {
        return get_theme_mod('portfolio_cat_title');
    }

    function portfolio_cat_desc_render_callback() {
        return get_theme_mod('portfolio_cat_desc');
    }

    function gallery_tmp_title_render_callback() {
        return get_theme_mod('gallery_tmp_title');
    }

    function gallery_tmp_desc_render_callback() {
        return get_theme_mod('gallery_tmp_desc');
    }

    function contact_form_title_render_callback() {
        return get_theme_mod('contact_form_title');
    }

    function google_map_title_render_callback() {
        return get_theme_mod('google_map_title');
    }

    function contact_google_map_shortcode_render_callback() {
        return get_theme_mod('contact_google_map_shortcode');
    }

    function spicepress_template_page_sanitize_text($input) {

        return wp_kses_post(force_balance_tags($input));
    }

    function theme_slug_sanitize_html($html) {
        return wp_filter_post_kses($html);
    }
    