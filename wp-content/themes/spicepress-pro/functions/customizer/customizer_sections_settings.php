<?php
$repeater_path = trailingslashit(get_template_directory()) . '/functions/customizer-repeater/functions.php';
if (file_exists($repeater_path)) {
    require_once( $repeater_path );
}
/**
 * Customize for taxonomy with dropdown, extend the WP customizer
 */
if (!class_exists('WP_Customize_Control'))
    return NULL;

function spicepress_column_callback($control) {
    if ($control->manager->get_setting('home_news_design_layout')->value() == '2') {
        return false;
    }
    return true;
}

function spicepress_proj_col_callback($control) {
    if ($control->manager->get_setting('home_portfolio_design_layout')->value() == '1') {
        return false;
    }
    return true;
}

function spicepress_animation_callback($control) {
    if ($control->manager->get_setting('home_testimonial_slide_item')->value() == '1') {
        return true;
    }
    return false;
}

function spicepress_team_callback($control) {
    if ($control->manager->get_setting('home_team_design_layout')->value() == '1') {
        return false;
    }
    return true;
}

class Taxonomy_Dropdown_Custom_Control extends WP_Customize_Control {

    private $options = false;

    public function __construct($manager, $id, $args = array(), $options = array()) {
        $this->options = $options;

        parent::__construct($manager, $id, $args);
    }

    /**
     * Render the control's content.
     *
     * Allows the content to be overriden without having to rewrite the wrapper.
     *
     * @since   11/14/2012
     * @return  void
     */
    public function render_content() {
        // call wp_dropdown_cats to get data and add to select field
        add_action('wp_dropdown_cats', array($this, 'wp_dropdown_cats'));

        // Set defaults
        $this->defaults = array(
            'show_option_none' => __('None', 'spicepress'),
            'orderby' => 'name',
            'hide_empty' => 0,
            'id' => $this->id,
            'selected' => $this->value(),
            'taxonomy' => 'portfolio_categories'
        );

        // parse defaults and user data
        /* $cats = wp_parse_args(
          $this->options,
          $this->defaults
          ); */
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php //print_r($cats);  ?>
            <?php wp_dropdown_categories(Array('show_option_none' => 'None', 'orderby' => 'name', 'hide_empty' => 0, 'id' => 'tax_project', 'taxonomy' => 'portfolio_categories')); ?>
        </label>
        <?php
    }

    /**
     * Replace WP default dropdown
     *
     * @since   11/14/2012
     * @return  String $output
     */
    public function wp_dropdown_cats($output) {

        $output = str_replace('<select', '<select multiple ' . $this->get_link(), $output);
        return $output;
    }

}

function spicepress_sections_settings($wp_customize) {

    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';

    /* Sections Settings */
    $wp_customize->add_panel('section_settings', array(
        'priority' => 126,
        'capability' => 'edit_theme_options',
        'title' => __('Homepage section settings', 'spicepress'),
    ));

    /* Slider Section */
    $wp_customize->add_section('slider_section', array(
        'title' => __('Slider settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 1,
    ));

    // Enable slider
    $wp_customize->add_setting('home_page_slider_enabled', array('default' => 'on'));
    $wp_customize->add_control('home_page_slider_enabled', array(
        'label' => __('Enable slider', 'spicepress'),
        'section' => 'slider_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));



    if (class_exists('Spicepress_Repeater')) {
        $wp_customize->add_setting('spicepress_slider_content', array(
        ));

        $wp_customize->add_control(new Spicepress_Repeater($wp_customize, 'spicepress_slider_content', array(
                    'label' => esc_html__('Slider Content', 'spicepress'),
                    'section' => 'slider_section',
                    'add_field_label' => esc_html__('Add new slide', 'spicepress'),
                    'item_name' => esc_html__('Slide', 'spicepress'),
                    'customizer_repeater_slide_format' => true,
                    'customizer_repeater_title_control' => true,
                    'customizer_repeater_text_control' => true,
                    'customizer_repeater_button_text_control' => true,
                    'customizer_repeater_link_control' => true,
                    'customizer_repeater_image_control' => true,
                    'customizer_repeater_checkbox_control' => true,
                    'customizer_repeater_video_url_control' => true,
        )));
    }

    // Image overlay
    $wp_customize->add_setting('slider_image_overlay', array(
        'default' => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('slider_image_overlay', array(
        'label' => __('Enable slider image overlay', 'spicepress'),
        'section' => 'slider_section',
        'type' => 'checkbox',
    ));

    //Slider Background Overlay Color
    $wp_customize->add_setting('slider_overlay_section_color', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'rgba(0,0,0,0.30)',
    ));

    $wp_customize->add_control(new SpicePress_Customize_Alpha_Color_Control($wp_customize, 'slider_overlay_section_color', array(
                'label' => __('Slider image overlay color', 'spicepress'),
                'palette' => true,
                'section' => 'slider_section')
    ));



    // animation
    $wp_customize->add_setting('animation', array('default' => ''));
    $wp_customize->add_control('animation',
            array(
                'label' => __('Animation', 'spicepress'),
                'section' => 'slider_section',
                'type' => 'select',
                'choices' => array(
                    '' => __('slide', 'spicepress'),
                    'fadeIn' => __('fade', 'spicepress')
                )
    ));


    // animation speed
    $wp_customize->add_setting('animation_speed', array('default' => 3000));
    $wp_customize->add_control('animation_speed',
            array(
                'label' => __('Animation speed', 'spicepress'),
                'section' => 'slider_section',
                'type' => 'select',
                'choices' => array(
                    '2000' => '2.0',
                    '3000' => '3.0',
                    '4000' => '4.0',
                    '5000' => '5.0',
                    '6000' => '6.0',
                )
    ));

    /* Services section */
    $wp_customize->add_section('services_section', array(
        'title' => __('Services settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 1,
    ));


    // Enable service more btn
    $wp_customize->add_setting('home_service_section_enabled', array('default' => 'on'));
    $wp_customize->add_control('home_service_section_enabled', array(
        'label' => __('Enable Services on homepage', 'spicepress'),
        'section' => 'services_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));


    // Service section title
    $wp_customize->add_setting('home_service_section_title', array(
        'capability' => 'edit_theme_options',
        'default' => __('What we offer', 'spicepress'),
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_service_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'services_section',
        'type' => 'text',
    ));

    //room section discription
    $wp_customize->add_setting('home_service_section_discription', array(
        'capability' => 'edit_theme_options',
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_service_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'services_section',
        'type' => 'textarea',
    ));

    //Style Design
    $wp_customize->add_setting('home_serive_design_layout', array('default' => 1));
    $wp_customize->add_control('home_serive_design_layout',
            array(
                'label' => __('Design Style', 'spicepress'),
                'section' => 'services_section',
                'type' => 'select',
                'choices' => array(
                    1 => __('Design 1', 'spicepress'),
                    2 => __('Design 2', 'spicepress'),
                    3 => __('Design 3', 'spicepress'),
                    4 => __('Design 4', 'spicepress'),
                    5 => __('Design 5', 'spicepress')
                )
    ));


    if (class_exists('Spicepress_Repeater')) {
        $wp_customize->add_setting('spicepress_service_content', array(
        ));

        $wp_customize->add_control(new Spicepress_Repeater($wp_customize, 'spicepress_service_content', array(
                    'label' => esc_html__('Services content', 'spicepress'),
                    'section' => 'services_section',
                    'priority' => 10,
                    'add_field_label' => esc_html__('Add new Service', 'spicepress'),
                    'item_name' => esc_html__('Service', 'spicepress'),
                    'customizer_repeater_icon_control' => true,
                    'customizer_repeater_title_control' => true,
                    'customizer_repeater_text_control' => true,
                    'customizer_repeater_link_control' => true,
                    'customizer_repeater_checkbox_control' => true,
                    'customizer_repeater_image_control' => true,
        )));
    }


    /* Portfolio Section */
    $wp_customize->add_section('portfolio_section', array(
        'title' => __('Portfolio settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 4,
    ));

    // Enable portfolio more btn
    $wp_customize->add_setting('portfolio_section_enable', array('default' => 'on'));
    $wp_customize->add_control('portfolio_section_enable', array(
        'label' => __('Enable Home Portfolio section', 'spicepress'),
        'section' => 'portfolio_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    //Style Design
    $wp_customize->add_setting('home_portfolio_design_layout', array('default' => 1));
    $wp_customize->add_control('home_portfolio_design_layout',
            array(
                'label' => __('Design Style', 'spicepress'),
//                'active_callback' => 'spicepress_portfolio_callback',
                'section' => 'portfolio_section',
                'type' => 'select',
                'choices' => array(
                    1 => __('Slider style', 'spicepress'),
                    2 => __('Column style', 'spicepress'),
//                    3 => __('Design 3', 'spicepress'),
//                    4 => __('Design 4', 'spicepress')
                )
    ));

    $wp_customize->add_setting('spicepress_project_column_layout',
            array(
                'default' => 4,
                'sanitize_callback' => 'spicepress_sanitize_select'
            )
    );

    $wp_customize->add_control('spicepress_project_column_layout',
            array(
                'label' => esc_html__('Column Layout', 'spicepress'),
                'section' => 'portfolio_section',
                'type' => 'select',
                'active_callback' => 'spicepress_proj_col_callback',
                'choices' => array(
                    6 => esc_html__('2 Column', 'spicepress'),
                    4 => esc_html__('3 Column', 'spicepress'),
                    3 => esc_html__('4 Column', 'spicepress'),
                )
            )
    );

    // room section title
    $wp_customize->add_setting('home_portfolio_section_title', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'default' => __('Our Portfolio', 'spicepress'),
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_portfolio_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'portfolio_section',
        'type' => 'text',
    ));

    //room section discription
    $wp_customize->add_setting('home_portfolio_section_discription', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_portfolio_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'portfolio_section',
        'type' => 'textarea',
    ));


    $wp_customize->add_setting(
            'portfolio_selected_category_id', array('default' => 2),
            array(
                'capability' => 'edit_theme_options',
            )
    );
    $wp_customize->add_control(new Taxonomy_Dropdown_Custom_Control($wp_customize, 'portfolio_selected_category_id', array(
                'label' => __('Select category for portfolio', 'spicepress'),
                'section' => 'portfolio_section',
                'settings' => 'portfolio_selected_category_id',
                'sanitize_callback' => 'sanitize_text_field',
    )));

    // Number project in each Portfolio category of homepage
    $wp_customize->add_setting(
            'home_portfolio_numbers_options',
            array(
                'default' => 4,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('home_portfolio_numbers_options',
            array(
                'type' => 'number',
                'label' => __('Number of project display on each category', 'spicepress'),
                'section' => 'portfolio_section',
                'input_attrs' => array(
                    'min' => '1', 'step' => '1', 'max' => '50',
                ),
            )
    );

    // animation speed
    $wp_customize->add_setting('portfolio_animation_speed', array('default' => 3000));
    $wp_customize->add_control('portfolio_animation_speed',
            array(
                'label' => __('Animation speed', 'spicepress'),
                'section' => 'portfolio_section',
                'type' => 'select',
                'choices' => array(
                    '2000' => '2.0',
                    '3000' => '3.0',
                    '4000' => '4.0',
                    '5000' => '5.0',
                    '6000' => '6.0',
                )
    ));

    //link
    class WP_client_Customize_Control extends WP_Customize_Control {

        public $type = 'new_menu';

        /**
         * Render the control's content.
         */
        public function render_content() {
            ?>
            <a href="<?php bloginfo('url'); ?>/wp-admin/edit.php?post_type=spicepress_portfolio" class="button"  target="_blank"><?php _e('Click here to add project', 'spicepress'); ?></a>
            <?php
        }

    }

    $wp_customize->add_setting(
            'pro_project',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control(new WP_client_Customize_Control($wp_customize, 'pro_project', array(
                'section' => 'portfolio_section',
                    ))
    );



    /* Testimonial Section */
    $wp_customize->add_section('testimonial_section', array(
        'title' => __('Testimonials settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 7,
    ));

    // Enable testimonial section
    $wp_customize->add_setting('testimonial_section_enable', array('default' => 'on'));
    $wp_customize->add_control('testimonial_section_enable', array(
        'label' => __('Enable Home Testimonial section', 'spicepress'),
        'section' => 'testimonial_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));




    //Testimonial Background Image
    $wp_customize->add_setting('testimonial_callout_background', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'testimonial_callout_background', array(
                'label' => __('Background Image', 'spicepress'),
                'section' => 'testimonial_section',
                'settings' => 'testimonial_callout_background',
    )));

    // Image overlay
    $wp_customize->add_setting('testimonial_image_overlay', array(
        'default' => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('testimonial_image_overlay', array(
        'label' => __('Enable testimonial image overlay', 'spicepress'),
        'section' => 'testimonial_section',
        'type' => 'checkbox',
    ));


    //Testimonial Background Overlay Color
    $wp_customize->add_setting('testimonial_overlay_section_color', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'rgba(0,0,0,0.85)',
    ));

    $wp_customize->add_control(new SpicePress_Customize_Alpha_Color_Control($wp_customize, 'testimonial_overlay_section_color', array(
                'label' => __('Testimonial image overlay color', 'spicepress'),
                'palette' => true,
                'section' => 'testimonial_section')
    ));






    // testimonial section title
    $wp_customize->add_setting('home_testimonial_section_title', array(
        'capability' => 'edit_theme_options',
        'default' => __('What our clients say', 'spicepress'),
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_testimonial_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'testimonial_section',
        'type' => 'text',
    ));

    //testimonial section discription
    $wp_customize->add_setting('home_testimonial_section_discription', array(
        'capability' => 'edit_theme_options',
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_testimonial_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'testimonial_section',
        'type' => 'textarea',
    ));

    if (class_exists('Spicepress_Repeater')) {
        $wp_customize->add_setting('spicepress_testimonial_content', array(
        ));

        $wp_customize->add_control(new Spicepress_Repeater($wp_customize, 'spicepress_testimonial_content', array(
                    'label' => esc_html__('Testimonial content', 'spicepress'),
                    'section' => 'testimonial_section',
                    'add_field_label' => esc_html__('Add new Testimonial', 'spicepress'),
                    'item_name' => esc_html__('Testimonial', 'spicepress'),
                    'customizer_repeater_title_control' => true,
                    'customizer_repeater_text_control' => true,
                    'customizer_repeater_link_control' => true,
                    'customizer_repeater_checkbox_control' => true,
                    'customizer_repeater_image_control' => true,
                    'customizer_repeater_designation_control' => true,
        )));
    }

    //Style Design
    $wp_customize->add_setting('home_testimonial_design_layout', array('default' => 1));
    $wp_customize->add_control('home_testimonial_design_layout',
            array(
                'label' => __('Design Style', 'spicepress'),
//                'active_callback' => 'spicepress_testi_callback',
                'section' => 'testimonial_section',
                'type' => 'select',
                'choices' => array(
                    1 => __('Design 1', 'spicepress'),
                    2 => __('Design 2', 'spicepress'),
                    3 => __('Design 3', 'spicepress'),
                    4 => __('Design 4', 'spicepress'),
                    5 => __('Design 5', 'spicepress')
                )
    ));

    //Slide Item
    $wp_customize->add_setting('home_testimonial_slide_item', array('default' => 1));
    $wp_customize->add_control('home_testimonial_slide_item',
            array(
                'label' => __('Slide Item', 'spicepress'),
//                'active_callback' => 'spicepress_testi_callback',
                'section' => 'testimonial_section',
                'type' => 'select',
                'choices' => array(
                    1 => __('One', 'spicepress'),
                    2 => __('Two', 'spicepress'),
                    3 => __('Three', 'spicepress'),
                )
    ));

    // animation
    $wp_customize->add_setting('testimonial_animation', array('default' => ''));
    $wp_customize->add_control('testimonial_animation',
            array(
                'label' => __('Animation', 'spicepress'),
                'section' => 'testimonial_section',
                'active_callback' => 'spicepress_animation_callback',
                'type' => 'select',
                'choices' => array(
                    '' => __('slide', 'spicepress'),
                    'fadeIn' => __('fade', 'spicepress')
                )
    ));


    // animation speed
    $wp_customize->add_setting('testimonial_animation_speed', array('default' => 3000));
    $wp_customize->add_control('testimonial_animation_speed',
            array(
                'label' => __('Animation speed', 'spicepress'),
                'section' => 'testimonial_section',
                'type' => 'select',
                'choices' => array(
                    '2000' => '2.0',
                    '3000' => '3.0',
                    '4000' => '4.0',
                    '5000' => '5.0',
                    '6000' => '6.0',
                )
    ));

    // smooth speed
    $wp_customize->add_setting('testimonial_smooth_speed', array('default' => 1000));
    $wp_customize->add_control('testimonial_smooth_speed',
            array(
                'label' => __('Smooth speed', 'spicepress'),
                'section' => 'testimonial_section',
                'type' => 'select',
                'choices' => array(
                    '500' => '0.5',
                    '1000' => '1.0',
                    '1500' => '1.5',
                    '2000' => '2.0',
                    '3000' => '3.0',)
    ));

    //Navigation Type
    $wp_customize->add_setting('testimonial_nav_style', array('default' => 'bullets'));
    $wp_customize->add_control('testimonial_nav_style', array(
        'label' => __('Navigation Style', 'spicepress'),
        'section' => 'testimonial_section',
        'type' => 'radio',
        'choices' => array(
            'bullets' => __('Bullets', 'spicepress'),
            'navigation' => __('Navigation', 'spicepress'),
            'both' => __('Both', 'spicepress'),
        )
    ));

    //Latest News Section
    $wp_customize->add_section('spicepress_latest_news_section', array(
        'title' => __('Latest News settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 8,
    ));


    // Enable news section
    $wp_customize->add_setting('latest_news_section_enable', array('default' => 'on'));
    $wp_customize->add_control('latest_news_section_enable', array(
        'label' => __('Enable Home News section', 'spicepress'),
        'section' => 'spicepress_latest_news_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    $wp_customize->add_setting('home_news_design_layout', array('default' => 1));
    $wp_customize->add_control('home_news_design_layout',
            array(
                'label' => __('Design Style', 'spicepress'),
                'section' => 'spicepress_latest_news_section',
                'type' => 'select',
                'choices' => array(
                    1 => __('Grid Style', 'spicepress'),
                    2 => __('List Style', 'spicepress'),
                    3 => __('Masonry Style', 'spicepress'),
                )
    ));

    $wp_customize->add_setting('spicepress_homeblog_layout',
            array(
                'default' => 4,
                'sanitize_callback' => 'spicepress_sanitize_select'
            )
    );

    $wp_customize->add_control('spicepress_homeblog_layout',
            array(
                'label' => esc_html__('Column Layout', 'spicepress'),
                'section' => 'spicepress_latest_news_section',
                'type' => 'select',
                'active_callback' => 'spicepress_column_callback',
                'choices' => array(
                    6 => esc_html__('2 Column', 'spicepress'),
                    4 => esc_html__('3 Column', 'spicepress'),
                    3 => esc_html__('4 Column', 'spicepress'),
                )
            )
    );

    //Select number of latest news on front page
    $wp_customize->add_setting('spicepress_post_display_count', array('default' => 3));
    $wp_customize->add_control('spicepress_post_display_count',
            array(
                'label' => __('Select the Number of Posts', 'spicepress'),
                'section' => 'spicepress_latest_news_section',
                'type' => 'number',
                'input_attrs' => array('min' => 2, 'max' => 20, 'step' => 1, 'style' => 'width: 100%;'),
    ));

    // News section title
    $wp_customize->add_setting('home_news_section_title', array(
        'capability' => 'edit_theme_options',
        'default' => __('Latest News', 'spicepress'),
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_news_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'spicepress_latest_news_section',
        'type' => 'text',
    ));

    //News section discription
    $wp_customize->add_setting('home_news_section_discription', array(
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_news_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'spicepress_latest_news_section',
        'type' => 'textarea',
    ));

    // Read More Button
    $wp_customize->add_setting('home_news_button_title', array(
        'capability' => 'edit_theme_options',
        'default' => __('Read More', 'spicepress'),
//		'sanitize_callback' => 'spicepressp_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_news_button_title', array(
        'label' => __('Read More Text', 'spicepress'),
        'section' => 'spicepress_latest_news_section',
        'type' => 'text',
    ));

    // enable / disable meta section 
    $wp_customize->add_setting(
            'home_meta_section_settings',
            array('capability' => 'edit_theme_options',
                'default' => true,
    ));
    $wp_customize->add_control(
            'home_meta_section_settings',
            array(
                'type' => 'checkbox',
                'label' => __('Enable post meta', 'spicepress'),
                'section' => 'spicepress_latest_news_section',
            )
    );

    $wp_customize->add_setting(
            'home_blog_more_btn',
            array(
                'default' => __('View More Posts', 'spicepress'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => $selective_refresh,
            )
    );

    $wp_customize->add_control(
            'home_blog_more_btn',
            array(
                'label' => __('View More Button Text', 'spicepress'),
                'section' => 'spicepress_latest_news_section',
                'type' => 'text',
    ));

    $wp_customize->add_setting(
            'home_blog_more_btn_link',
            array(
                'default' => '#',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
    ));


    $wp_customize->add_control(
            'home_blog_more_btn_link',
            array(
                'label' => __('View More Button Link', 'spicepress'),
                'section' => 'spicepress_latest_news_section',
                'type' => 'text',
    ));

    $wp_customize->add_setting(
            'home_blog_more_btn_link_target',
            array('sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
            'home_blog_more_btn_link_target',
            array(
                'type' => 'checkbox',
                'label' => __('Open link in new tab', 'spicepress'),
                'section' => 'spicepress_latest_news_section',
            )
    );

    //Gallery Section
    $wp_customize->add_section('spicepress_gellary_section', array(
        'title' => __('Gallery settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 9,
    ));

    // Enable gallery section
    $wp_customize->add_setting('gallery_section_enable', array('default' => 'on'));
    $wp_customize->add_control('gallery_section_enable', array(
        'label' => __('Enable Home Gallery section', 'spicepress'),
        'section' => 'spicepress_gellary_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));


    // Gallery section title
    $wp_customize->add_setting('home_gallery_section_title', array(
        'default' => __('Our work', 'spicepress'),
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_gallery_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'spicepress_gellary_section',
        'type' => 'text',
    ));

    //Gallery section discription
    $wp_customize->add_setting('home_gallery_section_discription', array(
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_gallery_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'spicepress_gellary_section',
        'type' => 'textarea',
    ));


    if (class_exists('Spicepress_Repeater')) {
        $wp_customize->add_setting(
                'spicepress_gallery_content', array(
                )
        );

        $wp_customize->add_control(
                new Spicepress_Repeater(
                        $wp_customize, 'spicepress_gallery_content', array(
                    'label' => esc_html__('Gallery', 'spicepress'),
                    'section' => 'spicepress_gellary_section',
                    'add_field_label' => esc_html__('Add new gallery', 'spicepress'),
                    'item_name' => esc_html__('Gallery Image', 'spicepress'),
                    'customizer_repeater_title_control' => true,
                    'customizer_repeater_image_control' => true,
                    'customizer_repeater_link_control' => true,
                    'customizer_repeater_checkbox_control' => true,
                        )
                )
        );
    }


    // animation speed
    $wp_customize->add_setting('gellary_animation_speed', array('default' => 3000));
    $wp_customize->add_control('gellary_animation_speed',
            array(
                'label' => __('Animation speed', 'spicepress'),
                'section' => 'spicepress_gellary_section',
                'type' => 'select',
                'choices' => array(
                    '2000' => '2.0',
                    '3000' => '3.0',
                    '4000' => '4.0',
                    '5000' => '5.0',
                    '6000' => '6.0',
                )
    ));


    //Team Section
    $wp_customize->add_section('spicepress_team_section', array(
        'title' => __('Team settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 10,
    ));

    $wp_customize->add_setting('team_section_enable', array('default' => 'on'));
    $wp_customize->add_control('team_section_enable', array(
        'label' => __('Enable Home Team section', 'spicepress'),
        'section' => 'spicepress_team_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    // Team section title
    $wp_customize->add_setting('home_team_section_title', array(
        'default' => __('Meet The Team', 'spicepress'),
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_team_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'spicepress_team_section',
        'type' => 'text',
    ));

    //Team section discription
    $wp_customize->add_setting('home_team_section_discription', array(
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_team_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'spicepress_team_section',
        'type' => 'textarea',
    ));


    //Style Design
    $wp_customize->add_setting('home_team_design_layout', array('default' => 1));
    $wp_customize->add_control('home_team_design_layout',
            array(
                'label' => __('Design Style', 'spicepress'),
                'section' => 'spicepress_team_section',
                'type' => 'select',
                'choices' => array(
                    1 => __('Design 1', 'spicepress'),
                    2 => __('Design 2', 'spicepress'),
                    3 => __('Design 3', 'spicepress'),
                    4 => __('Design 4', 'spicepress')
                )
    ));

    if (class_exists('Spicepress_Repeater')) {
        $wp_customize->add_setting(
                'spicepress_team_content', array(
                )
        );

        $wp_customize->add_control(
                new Spicepress_Repeater(
                        $wp_customize, 'spicepress_team_content', array(
                    'label' => esc_html__('Team content', 'spicepress'),
                    'section' => 'spicepress_team_section',
//                    'priority' => 15,
                    'add_field_label' => esc_html__('Add new Team Member', 'spicepress'),
                    'item_name' => esc_html__('Team Member', 'spicepress'),
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


    //Navigation Type
    $wp_customize->add_setting('team_nav_style', array('default' => 'bullets'));
    $wp_customize->add_control('team_nav_style', array(
        'label' => __('Navigation Style', 'spicepress'),
        'section' => 'spicepress_team_section',
        'active_callback' => 'spicepress_team_callback',
        'type' => 'radio',
        'choices' => array(
            'bullets' => __('Bullets', 'spicepress'),
            'navigation' => __('Navigation', 'spicepress'),
            'both' => __('Both', 'spicepress'),
        )
    ));


    // smooth speed
    $wp_customize->add_setting('team_smooth_speed', array('default' => 1000));
    $wp_customize->add_control('team_smooth_speed',
            array(
                'label' => __('Smooth speed', 'spicepress'),
                'section' => 'spicepress_team_section',
                'active_callback' => 'spicepress_team_callback',
                'type' => 'select',
//				'priority' => 17,
                'choices' => array('500' => '0.5',
                    '1000' => '1.0',
                    '1500' => '1.5',
                    '2000' => '2.0',
                    '2500' => '2.5',
                    '3000' => '3.0')
    ));
    
    // animation speed
    $wp_customize->add_setting('team_animation_speed', array('default' => 3000));
    $wp_customize->add_control('team_animation_speed',
            array(
                'label' => __('Animation speed', 'spicepress'),
                'section' => 'spicepress_team_section',
                'active_callback' => 'spicepress_team_callback',
                'type' => 'select',
//				'priority' => 53,
                'choices' => array(
                    '2000' => '2.0',
                    '3000' => '3.0',
                    '4000' => '4.0',
                    '5000' => '5.0',
                    '6000' => '6.0',
                )
    ));

    //Shop Section
    $wp_customize->add_section('spicepress_shop_section', array(
        'title' => __('Home Shop settings', 'spicepress'),
        'panel' => 'section_settings',
        'priority' => 10,
    ));

    $wp_customize->add_setting('shop_section_enable', array('default' => 'on'));
    $wp_customize->add_control('shop_section_enable', array(
        'label' => __('Enable Home Shop section', 'spicepress'),
        'section' => 'spicepress_shop_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    // Shop section title
    $wp_customize->add_setting('home_shop_section_title', array(
        'default' => __('Featured products', 'spicepress'),
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_shop_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'spicepress_shop_section',
        'type' => 'text',
    ));

    //Shop section discription
    $wp_customize->add_setting('home_shop_section_discription', array(
        'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_shop_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'spicepress_shop_section',
        'type' => 'textarea',
    ));

    // animation speed
    $wp_customize->add_setting('home_shop_animation_speed', array('default' => 3000));
    $wp_customize->add_control('home_shop_animation_speed',
            array(
                'label' => __('Animation speed', 'spicepress'),
                'section' => 'spicepress_shop_section',
                'type' => 'select',
                'choices' => array(
                    '2000' => '2.0',
                    '3000' => '3.0',
                    '4000' => '4.0',
                    '5000' => '5.0',
                    '6000' => '6.0',
                )
    ));



    $wp_customize->add_section('home_client_section', array(
        'title' => __('Clients settings', 'spicepress'),
        'panel' => 'section_settings',
    ));

    // Enable client section
    $wp_customize->add_setting('client_section_enable', array('default' => 'on'));
    $wp_customize->add_control('client_section_enable', array(
        'label' => __('Enable Home Client section', 'spicepress'),
        'section' => 'home_client_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));

    // client section title
    $wp_customize->add_setting('home_client_section_title', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'transport' => $selective_refresh,
        'default' => __('Meet our clients', 'spicepress')
    ));
    $wp_customize->add_control('home_client_section_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'home_client_section',
        'type' => 'text',
    ));

    //client section discription
    $wp_customize->add_setting('home_client_section_discription', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
        'default' => __('We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.', 'spicepress'),
        'transport' => $selective_refresh,
    ));
    $wp_customize->add_control('home_client_section_discription', array(
        'label' => __('Description', 'spicepress'),
        'section' => 'home_client_section',
        'type' => 'textarea',
    ));


    if (class_exists('Spicepress_Repeater')) {
        $wp_customize->add_setting(
                'spicepress_clients_content', array(
                )
        );

        $wp_customize->add_control(
                new Spicepress_Repeater(
                        $wp_customize, 'spicepress_clients_content', array(
                    'label' => esc_html__('Clients content', 'spicepress'),
                    'section' => 'home_client_section',
                    'add_field_label' => esc_html__('Add new client', 'spicepress'),
                    'item_name' => esc_html__('Client', 'spicepress'),
                    'customizer_repeater_image_control' => true,
                    'customizer_repeater_link_control' => true,
                    'customizer_repeater_checkbox_control' => true,
                        )
                )
        );
    }

    // animation speed
    $wp_customize->add_setting('client_animation_speed', array('default' => 3000));
    $wp_customize->add_control('client_animation_speed',
            array(
                'label' => __('Animation speed', 'spicepress'),
                'section' => 'home_client_section',
                'type' => 'select',
                'choices' => array(
                    '2000' => '2.0',
                    '3000' => '3.0',
                    '4000' => '4.0',
                    '5000' => '5.0',
                    '6000' => '6.0',
                )
    ));



    //Callout Section
    $wp_customize->add_section('home_cta_page_section', array(
        'title' => __('Callout section settings', 'spicepress'),
        'panel' => 'section_settings',
    ));

    // Enable call to action section
    $wp_customize->add_setting('cta_section_enable', array('default' => 'on'));
    $wp_customize->add_control('cta_section_enable', array(
        'label' => __('Enable Home Callout section', 'spicepress'),
        'section' => 'home_cta_page_section',
        'type' => 'radio',
        'choices' => array(
            'on' => __('ON', 'spicepress'),
            'off' => __('OFF', 'spicepress')
        )
    ));


    $wp_customize->add_setting(
            'home_call_out_title',
            array(
                'default' => __('Great Customer Support fast! By phone: 1-555-123-4567, &nbsp; <abbr>by email: info@example.com</abbr>', 'spicepress'),
                'transport' => $selective_refresh,
            )
    );
    $wp_customize->add_control('home_call_out_title', array(
        'label' => __('Title', 'spicepress'),
        'section' => 'home_cta_page_section',
        'type' => 'text',));


    $wp_customize->add_setting(
            'home_call_out_btn_text',
            array(
                'default' => __('Contact Us', 'spicepress'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => $selective_refresh,
            )
    );

    $wp_customize->add_control(
            'home_call_out_btn_text',
            array(
                'label' => __('Button Text', 'spicepress'),
                'section' => 'home_cta_page_section',
                'type' => 'text',
    ));

    $wp_customize->add_setting(
            'home_call_out_btn_link',
            array(
                'default' => '#',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
    ));


    $wp_customize->add_control(
            'home_call_out_btn_link',
            array(
                'label' => __('Button Link', 'spicepress'),
                'section' => 'home_cta_page_section',
                'type' => 'text',
    ));

    $wp_customize->add_setting(
            'home_call_out_btn_link_target',
            array('sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
            'home_call_out_btn_link_target',
            array(
                'type' => 'checkbox',
                'label' => __('Open link in new tab', 'spicepress'),
                'section' => 'home_cta_page_section',
            )
    );
}

add_action('customize_register', 'spicepress_sections_settings');

/**
 * Add selective refresh for Front page section section controls.
 */
function spicepress_register_home_section_partials($wp_customize) {


    //Service section
    $wp_customize->selective_refresh->add_partial('home_service_section_title', array(
        'selector' => '.service-section .section-header .widget-title, .services2 .section-header .widget-title, .services3 .section-header .widget-title, .services4 .section-header .widget-title',
        'settings' => 'home_service_section_title',
        'render_callback' => 'home_service_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_service_section_discription', array(
        'selector' => '.service-section .section-header p, .services2 .section-header p, .services3 .section-header p, .services4 .section-header p',
        'settings' => 'home_service_section_discription',
        'render_callback' => 'home_service_section_discription_render_callback',
    ));

    //Portfolio section
    $wp_customize->selective_refresh->add_partial('home_portfolio_section_title', array(
        'selector' => '.portfolio-section .section-header .widget-title',
        'settings' => 'home_portfolio_section_title',
        'render_callback' => 'home_portfolio_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_portfolio_section_discription', array(
        'selector' => '.portfolio-section .section-header p',
        'settings' => 'home_portfolio_section_discription',
        'render_callback' => 'home_portfolio_section_discription_render_callback',
    ));

    //Testimonial
    $wp_customize->selective_refresh->add_partial('home_testimonial_section_title', array(
        'selector' => '.testimonial-section .section-header h1',
        'settings' => 'home_testimonial_section_title',
        'render_callback' => 'home_testimonial_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_testimonial_section_discription', array(
        'selector' => '.testimonial-section .section-header p',
        'settings' => 'home_testimonial_section_discription',
        'render_callback' => 'home_testimonial_section_discription_render_callback',
    ));

    //News
    $wp_customize->selective_refresh->add_partial('home_news_section_title', array(
        'selector' => '.home-news .section-header .widget-title',
        'settings' => 'home_news_section_title',
        'render_callback' => 'home_news_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_news_section_discription', array(
        'selector' => '.home-news .section-header p',
        'settings' => 'home_news_section_discription',
        'render_callback' => 'home_news_section_discription_render_callback',
    ));


    //Gallery
    $wp_customize->selective_refresh->add_partial('home_gallery_section_title', array(
        'selector' => '.gallery-section .section-header .widget-title',
        'settings' => 'home_gallery_section_title',
        'render_callback' => 'home_gallery_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_gallery_section_discription', array(
        'selector' => '.gallery-section .section-header p',
        'settings' => 'home_gallery_section_discription',
        'render_callback' => 'home_gallery_section_discription_render_callback',
    ));

    //Team
    $wp_customize->selective_refresh->add_partial('home_team_section_title', array(
        'selector' => '.homepage-team-section .section-header .widget-title, .team2 .section-header .widget-title, .team3 .section-header .widget-title, .team4 .section-header .widget-title',
        'settings' => 'home_team_section_title',
        'render_callback' => 'home_team_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_team_section_discription', array(
        'selector' => '.homepage-team-section .section-header p, .team2 .section-header p, .team3 .section-header p, .team4 .section-header p',
        'settings' => 'home_team_section_discription',
        'render_callback' => 'home_team_section_discription_render_callback',
    ));

    //Shop

    $wp_customize->selective_refresh->add_partial('home_shop_section_title', array(
        'selector' => '.woocommerce-section .section-header .widget-title',
        'settings' => 'home_shop_section_title',
        'render_callback' => 'home_shop_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_shop_section_discription', array(
        'selector' => '.woocommerce-section .section-header p',
        'settings' => 'home_shop_section_discription',
        'render_callback' => 'home_shop_section_discription_render_callback',
    ));



    //Client
    $wp_customize->selective_refresh->add_partial('home_client_section_title', array(
        'selector' => '.clients-section .section-header .widget-title',
        'settings' => 'home_client_section_title',
        'render_callback' => 'home_client_section_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_client_section_discription', array(
        'selector' => '.clients-section .section-header p',
        'settings' => 'home_client_section_discription',
        'render_callback' => 'home_client_section_discription_render_callback',
    ));

    //Footer callout
    $wp_customize->selective_refresh->add_partial('home_call_out_title', array(
        'selector' => '.callout-section .sm-callout h4',
        'settings' => 'home_call_out_title',
        'render_callback' => 'home_call_out_title_render_callback',
    ));

    $wp_customize->selective_refresh->add_partial('home_call_out_btn_text', array(
        'selector' => '.callout-section .sm-callout .sm-callout-btn a',
        'settings' => 'home_call_out_btn_text',
        'render_callback' => 'home_call_out_btn_text_render_callback',
    ));
}

add_action('customize_register', 'spicepress_register_home_section_partials');

function home_service_section_title_render_callback() {
    return get_theme_mod('home_service_section_title');
}

function home_service_section_discription_render_callback() {
    return get_theme_mod('home_service_section_discription');
}

function home_portfolio_section_title_render_callback() {
    return get_theme_mod('home_portfolio_section_title');
}

function home_portfolio_section_discription_render_callback() {
    return get_theme_mod('home_portfolio_section_discription');
}

function home_testimonial_section_title_render_callback() {
    return get_theme_mod('home_testimonial_section_title');
}

function home_testimonial_section_discription_render_callback() {
    return get_theme_mod('home_testimonial_section_discription');
}

function home_news_section_title_render_callback() {
    return get_theme_mod('home_news_section_title');
}

function home_news_section_discription_render_callback() {
    return get_theme_mod('home_news_section_discription');
}

function home_gallery_section_title_render_callback() {
    return get_theme_mod('home_gallery_section_title');
}

function home_gallery_section_discription_render_callback() {
    return get_theme_mod('home_gallery_section_discription');
}

function home_team_section_title_render_callback() {
    return get_theme_mod('home_team_section_title');
}

function home_team_section_discription_render_callback() {
    return get_theme_mod('home_team_section_discription');
}

function home_shop_section_title_render_callback() {
    return get_theme_mod('home_shop_section_title');
}

function home_shop_section_discription_render_callback() {
    return get_theme_mod('home_shop_section_discription');
}

function home_client_section_title_render_callback() {
    return get_theme_mod('home_client_section_title');
}

function home_client_section_discription_render_callback() {
    return get_theme_mod('home_client_section_discription');
}

function home_call_out_title_render_callback() {
    return get_theme_mod('home_call_out_title');
}

function home_call_out_btn_text_render_callback() {
    return get_theme_mod('home_call_out_btn_text');
}

function spicepress_home_page_sanitize_text($input) {

    return wp_kses_post(force_balance_tags($input));
}
