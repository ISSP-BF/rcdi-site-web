<?php

function spicepress_general_settings_customizer($wp_customize) {


    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';

    /**
     * Register Custom Slider Controls
     */
    require_once ST_TEMPLATE_DIR . '/inc/customizer/slider/class-slider-control.php';
    require_once ST_TEMPLATE_DIR . '/inc/customizer/slider/container-width-control.php';
    require_once ST_TEMPLATE_DIR . '/inc/customizer/slider/class-opacity-control.php';
    require_once ST_TEMPLATE_DIR . '/inc/customizer/toggle/class-toggle-control.php';
    $wp_customize->register_control_type('spicepress_Slider_Control');
    $wp_customize->register_control_type('spicepress_Toggle_Control');
    $wp_customize->register_control_type('spicepress_Opacity_Control');

    class Spicepress_Header_Logo_Customize_Control_Radio_Image extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since 1.1.24
         * @var   string
         */
        public $type = 'radio-image';

        /**
         * Displays the control content.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function render_content() {
            /* If no choices are provided, bail. */
            if (empty($this->choices)) {
                return;
            }
            ?>

            <?php if (!empty($this->label)) : ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php endif; ?>

            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>

            <div id="<?php echo esc_attr("input_{$this->id}"); ?>">

                <?php foreach ($this->choices as $value => $args) : ?>

                    <input type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr("_customize-radio-{$this->id}"); ?>" id="<?php echo esc_attr("{$this->id}-{$value}"); ?>" <?php $this->link(); ?> <?php checked($this->value(), $value); ?> />

                    <label for="<?php echo esc_attr("{$this->id}-{$value}"); ?>">
                        <?php if (!empty($args['label'])) { ?>
                            <span class="screen-reader-text"><?php echo esc_html($args['label']); ?></span>
                            <?php
                        }
                        ?>
                        <img class="wp-ui-highlight" src="<?php echo esc_url(sprintf($args['url'], get_template_directory_uri(), get_stylesheet_directory_uri())); ?>"
                        <?php
                        if (!empty($args['label'])) {
                            echo 'alt="' . esc_attr($args['label']) . '"';
                        }
                        ?>
                             />
                    </label>

                <?php endforeach; ?>

            </div><!-- .image -->

            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#<?php echo esc_attr("input_{$this->id}"); ?>').buttonset();
                });
            </script>
            <?php
        }

        /**
         * Loads the jQuery UI Button script and hooks our custom styles in.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script('jquery-ui-button');
            add_action('customize_controls_print_styles', array($this, 'print_styles'));
        }

        /**
         * Outputs custom styles to give the selected image a visible border.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function print_styles() {
            ?>

            <style type="text/css" id="hybrid-customize-radio-image-css">
                .customize-control-radio-image .ui-buttonset {
                    text-align: center;
                }

                .customize-control-radio-image label {
                    display: inline-block;
                    max-width: 49% !important;
                    padding: 3px;
                    font-size: inherit;
                    line-height: inherit;
                    height: auto;
                    cursor: pointer;
                    border-width: 0;
                    -webkit-appearance: none;
                    -webkit-border-radius: 0;
                    border-radius: 0;
                    white-space: nowrap;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    color: inherit;
                    background: none;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    vertical-align: inherit;
                }

                .customize-control-radio-image label:first-of-type {
                    float: left;
                }
                .customize-control-radio-image label:nth-of-type(n + 3){
                    /*float: right;*/
                }

                .customize-control-radio-image label:hover {
                    background: none;
                    border-color: inherit;
                    color: inherit;
                }

                .customize-control-radio-image label:active {
                    background: none;
                    border-color: inherit;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    -webkit-transform: none;
                    -ms-transform: none;
                    transform: none;
                }

                .customize-control-radio-image img { border: 1px solid transparent; }
                .customize-control-radio-image .ui-state-active img {
                    border-color: #5b9dd9;
                    -webkit-box-shadow: 0 0 3px rgba(0,115,170,.8);
                    box-shadow: 0 0 3px rgba(0,115,170,.8);
                }
            </style>
            <?php
        }

    }

    class Spicepress_Customize_Control_Radio_Image extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since 1.1.24
         * @var   string
         */
        public $type = 'radio-image';

        /**
         * Displays the control content.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function render_content() {
            /* If no choices are provided, bail. */
            if (empty($this->choices)) {
                return;
            }
            ?>

            <?php if (!empty($this->label)) : ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php endif; ?>

            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>

            <div id="<?php echo esc_attr("input_{$this->id}"); ?>">

                <?php foreach ($this->choices as $value => $args) : ?>

                    <input type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr("_customize-radio-{$this->id}"); ?>" id="<?php echo esc_attr("{$this->id}-{$value}"); ?>" <?php $this->link(); ?> <?php checked($this->value(), $value); ?> />

                    <label for="<?php echo esc_attr("{$this->id}-{$value}"); ?>">
                        <?php if (!empty($args['label'])) { ?>
                            <span class="screen-reader-text"><?php echo esc_html($args['label']); ?></span>
                            <?php
                        }
                        ?>
                        <img src="<?php echo esc_url(sprintf($args['url'], get_template_directory_uri(), get_stylesheet_directory_uri())); ?>"
                        <?php
                        if (!empty($args['label'])) {
                            echo 'alt="' . esc_attr($args['label']) . '"';
                        }
                        ?>
                             />
                    </label>

                <?php endforeach; ?>

            </div><!-- .image -->

            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#<?php echo esc_attr("input_{$this->id}"); ?>').buttonset();
                });
            </script>
            <?php
        }

        /**
         * Loads the jQuery UI Button script and hooks our custom styles in.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script('jquery-ui-button');
            add_action('customize_controls_print_styles', array($this, 'print_styles'));
        }

        /**
         * Outputs custom styles to give the selected image a visible border.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function print_styles() {
            ?>

            <style type="text/css" id="hybrid-customize-radio-image-css">
                .customize-control-radio-image .ui-buttonset {
                    text-align: center;
                }

                .customize-control-radio-image label {
                    display: inline-block;
                    max-width: 33.3%;
                    padding: 3px;
                    font-size: inherit;
                    line-height: inherit;
                    height: auto;
                    cursor: pointer;
                    border-width: 0;
                    -webkit-appearance: none;
                    -webkit-border-radius: 0;
                    border-radius: 0;
                    white-space: nowrap;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    color: inherit;
                    background: none;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    vertical-align: inherit;
                }

                .customize-control-radio-image label:first-of-type {
                    float: left;
                }
                .customize-control-radio-image label:nth-of-type(n + 3){
                    /*float: right;*/
                }

                .customize-control-radio-image label:hover {
                    background: none;
                    border-color: inherit;
                    color: inherit;
                }

                .customize-control-radio-image label:active {
                    background: none;
                    border-color: inherit;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    -webkit-transform: none;
                    -ms-transform: none;
                    transform: none;
                }

                .customize-control-radio-image img { border: 1px solid transparent; }
                .customize-control-radio-image .ui-state-active img {
                    border-color: #5b9dd9;
                    -webkit-box-shadow: 0 0 3px rgba(0,115,170,.8);
                    box-shadow: 0 0 3px rgba(0,115,170,.8);
                }
            </style>
            <?php
        }

    }

    /* Home Page Panel */
    $wp_customize->add_panel('general_settings', array(
        'priority' => 125,
        'capability' => 'edit_theme_options',
        'title' => __('General settings', 'spicepress'),
    ));


    /* Header layout logo placing setting */
    $wp_customize->add_section('header_layout_logo_placing_setting', array(
        'title' => esc_html__('Header layout', 'spicepress'),
        'panel' => 'general_settings',
    ));


    if (class_exists('Spicepress_Header_Logo_Customize_Control_Radio_Image')) {
        $wp_customize->add_setting(
                'header_logo_placing', array(
            'default' => 'left',
                )
        );

        $wp_customize->add_control(
                new Spicepress_Header_Logo_Customize_Control_Radio_Image(
                        $wp_customize, 'header_logo_placing', array(
                    'label' => esc_html__('Header layout with logo placing', 'spicepress'),
                    'description' => esc_html__('Note: The third layout option from the left will work for the Standard header variation and Center header variation.', 'spicepress'),
                    'priority' => 6,
                    'section' => 'header_layout_logo_placing_setting',
                    'choices' => array(
                        'left' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/header-left.png',
                        ),
                        'right' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/header-right.png',
                        ),
                        'center' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/header-center.png',
                        ),
                        'full_left' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/container-left.png',
                        ),
                    ),
                        )
                )
        );
    }


    /* Menu breakpoint settings */
    $wp_customize->add_section('spicepress_menu_breakpoint', array(
        'title' => esc_html__('Menu breakpoint Settings', 'spicepress'),
        'panel' => 'general_settings',
    ));

    $wp_customize->add_setting('menu_breakpoint', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'spicepress_sanitize_number_absint',
        'default' => 1100,
    ));

    $wp_customize->add_control('menu_breakpoint', array(
        'type' => 'number',
        'section' => 'spicepress_menu_breakpoint', // Add a default or your own section
        'label' => __('Menu breakpoint', 'spicepress'),
        'description' => __('Enter the Min. Size 200px and Max Size 6000px'),
    ));

    function spicepress_sanitize_number_absint($number, $setting) {
        // Ensure $number is an absolute integer (whole number, zero or greater).
        $number = absint($number);

        if ($number < 200 || $number > 6000) {

        } else {

            // If the input is an absolute integer, return it; otherwise, return the default
            return ( $number ? $number : $setting->default );
        }
    }

    /* Remove for desktop animation */
    $wp_customize->add_section('remove_wow_animation_setting', array(
        'title' => __('Animation Settings', 'spicepress'),
        'panel' => 'general_settings',
    ));


    // Reservation Title
    $wp_customize->add_setting('remove_wow_desktop_animation', array(
        'capability' => 'edit_theme_options',
        'default' => false,
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
    ));
    $wp_customize->add_control('remove_wow_desktop_animation', array(
        'label' => __('Disable animation effect in desktop', 'spicepress'),
        'section' => 'remove_wow_animation_setting',
        'type' => 'checkbox',
    ));


    // Reservation Title
    $wp_customize->add_setting('remove_wow_mobile_animation', array(
        'capability' => 'edit_theme_options',
        'default' => false,
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
    ));
    $wp_customize->add_control('remove_wow_mobile_animation', array(
        'label' => __('Disable animation effect in small devices like mobiles, ipads etc', 'spicepress'),
        'section' => 'remove_wow_animation_setting',
        'type' => 'checkbox',
    ));


    /* Header backgrund color settings */
    $wp_customize->add_section('header_background_color_settings', array(
        'title' => __('Header background color settings', 'spicepress'),
        'panel' => 'general_settings',
    ));


    //Header background color
    $wp_customize->add_setting('header_background_color', array(
        'default' => '#21202e',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
                'label' => __('Header background color', 'spicepress'),
                'description' => __('Appling on classic header'),
                'section' => 'header_background_color_settings',
                'settings' => 'header_background_color',)
    ));


    /* Remove animation */
    $wp_customize->add_section('header_variation_setting', array(
        'title' => __('Header variant settings', 'spicepress'),
        'panel' => 'general_settings',
    ));

    // Site Intro Column Layout
    $wp_customize->add_setting('header_column_layout', array('default' => 3));
    $wp_customize->add_control('header_column_layout',
            array(
                'label' => __('For classic header, select column layout', 'spicepress'),
                'section' => 'header_variation_setting',
                'type' => 'select',
                'choices' => array(
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                )
    ));





    //Spicepress Header variation
    if (class_exists('Spicepress_Customize_Control_Radio_Image')) {
        $wp_customize->add_setting(
                'header_varition', array(
            'default' => 'standard',
                )
        );

        $wp_customize->add_control(
                new Spicepress_Customize_Control_Radio_Image(
                        $wp_customize, 'header_varition', array(
                    'label' => esc_html__('Header layout', 'spicepress'),
                    'priority' => 6,
                    'section' => 'header_variation_setting',
                    'choices' => array(
                        'standard' => array(
                            'url' => trailingslashit(get_template_directory_uri()) . 'images/header-standard.png',
                        ),
                        'overlap' => array(
                            'url' => trailingslashit(get_template_directory_uri()) . 'images/header-overlap.png',
                        ),
                        'classic' => array(
                            'url' => trailingslashit(get_template_directory_uri()) . 'images/header-classic.png',
                        ),
                        'center' => array(
                            'url' => trailingslashit(get_template_directory_uri()) . 'images/header-centers.png',
                        ),
                    ),
                        )
                )
        );
    }

    // Sticky Header
    $wp_customize->add_section(
            'sticky_header_section',
            array(
                'title' => __('Sticky Header', 'spicepress'),
                'panel' => 'general_settings',
                'priority' => 99,
            )
    );

    $wp_customize->add_setting('sticky_header_enable',
            array(
                'default' => false,
                'sanitize_callback' => 'spicepress_sanitize_checkbox'
            )
    );

    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'sticky_header_enable',
                    array(
                'label' => __('Enable / Disable Stick Header', 'spicepress'),
                'section' => 'sticky_header_section',
                'type' => 'toggle',
                'priority' => 1,
                    )
    ));


    //Differet logo for sticky header
    $wp_customize->add_setting('sticky_header_logo',
            array(
                'default' => false,
                'sanitize_callback' => 'spicepress_sanitize_checkbox'
            )
    );

    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'sticky_header_logo',
                    array(
                'label' => __('Differet logo for sticky header', 'spicepress'),
                'section' => 'sticky_header_section',
                'type' => 'toggle',
                'priority' => 2,
                    )
    ));

    // Stick Header logo for Desktop
    $wp_customize->add_setting('sticky_header_logo_desktop', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sticky_header_logo_desktop', array(
                'label' => __('Logo for desktop view', 'spicepress'),
                'section' => 'sticky_header_section',
                'settings' => 'sticky_header_logo_desktop',
                'active_callback' => 'sticky_header_logo_callback',
                'priority' => 3,
    )));

    // Stick Header logo for Mobile
    $wp_customize->add_setting('sticky_header_logo_mbl', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sticky_header_logo_mbl', array(
                'label' => __('Logo for mobile view', 'spicepress'),
                'section' => 'sticky_header_section',
                'settings' => 'sticky_header_logo_mbl',
                'active_callback' => 'sticky_header_logo_callback',
                'priority' => 4,
    )));

    //Sticky Header Animation Effect
    $wp_customize->add_setting('sticky_header_animation', array('default' => ''));
    $wp_customize->add_control('sticky_header_animation',
            array(
                'label' => __('Animation Effect', 'spicepress'),
                'section' => 'sticky_header_section',
                'type' => 'select',
                'choices' => array(
                    '' => __('None', 'spicepress'),
                    'slide' => __('Slide', 'spicepress'),
                    'fade' => __('Fade', 'spicepress'),
                    'shrink' => __('Shrink', 'spicepress'),
                )
    ));

    //Sticky Header Enable
    $wp_customize->add_setting('sticky_header_device_enable', array('default' => 'desktop'));
    $wp_customize->add_control('sticky_header_device_enable',
            array(
                'label' => __('Enable', 'spicepress'),
                'section' => 'sticky_header_section',
                'type' => 'select',
                'choices' => array(
                    'desktop' => __('Desktop', 'spicepress'),
                    'mobile' => __('Mobile', 'spicepress'),
                    'both' => __('Desktop + Mobile', 'spicepress')
                )
    ));

    //Sticky Header Opacity
    $wp_customize->add_setting('sticky_header_device_enable', array('default' => 'desktop'));
    $wp_customize->add_control('sticky_header_device_enable',
            array(
                'label' => __('Enable', 'spicepress'),
                'section' => 'sticky_header_section',
                'type' => 'select',
                'choices' => array(
                    'desktop' => __('Desktop', 'spicepress'),
                    'mobile' => __('Mobile', 'spicepress'),
                    'both' => __('Desktop + Mobile', 'spicepress')
                )
    ));

    $wp_customize->add_setting('sticky_header_opacity',
            array(
                'default' => 1.0,
                'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new spicepress_Opacity_Control($wp_customize, 'sticky_header_opacity',
                    array(
                'label' => __('Sticky Opacity', 'spicepress'),
                'section' => 'sticky_header_section',
                'type' => 'slider',
                'min' => 0.1,
                'max' => 1.0,
                    )
    ));

    //Sticky Header Height
    $wp_customize->add_setting('sticky_header_height',
            array(
                'default' => 0,
                'capability' => 'edit_theme_options',
            )
    );

    $wp_customize->add_control(new spicepress_Slider_Control($wp_customize, 'sticky_header_height',
                    array(
                'label' => __('Sticky Height', 'spicepress'),
                'description'    => esc_html__( 'Note: Sticky Height will not work with shrink effect', 'spicepress' ),
                'section' => 'sticky_header_section',
                'type' => 'slider',
                'min' => 0,
                'max' => 50,
                    )
    ));

    // Container Setting
    $wp_customize->add_section(
        'container_width_section',
        array(
            'title' =>__('Container Settings','spicepress'),
            'panel'  => 'general_settings',
            'priority'   => 102,

            )
    );
    //Footer Bar Border
    $wp_customize->add_setting('container_width_pattern',
        array(
            'default' => 1140,
            'capability'     => 'edit_theme_options',
            )
    );

    $wp_customize->add_control(new Spicepress_Container_Control( $wp_customize, 'container_width_pattern',
        array(
            'label'    => __( 'Container Width', 'spicepress' ),
            'section'  => 'container_width_section',
            'type'     => 'slider',
            'min'   => 0,
            'max'   => 1600,
        )
    ));
    $wp_customize->add_setting( 'page_container_setting', array( 'default' => 'default') );
        $wp_customize->add_control( 'page_container_setting',
        array(
            'label'    => __( 'Page layout', 'spicepress' ),
            'priority' => 103,
            'section'  => 'container_width_section',
            'type'     => 'select',
            'choices'=>array(
                'default'=>__('Default', 'spicepress'),
                'full_width_fluid'=>__('Full Width / Container Fluid', 'spicepress'),
                'full_width_streched'=>__('Full Width / Streatched', 'spicepress'),
                )
        ));
        $wp_customize->add_setting( 'post_container_setting', array( 'default' => 'default') );
        $wp_customize->add_control( 'post_container_setting',
        array(
            'label'    => __( 'Blog layout', 'spicepress' ),
            'priority' => 104,
            'section'  => 'container_width_section',
            'type'     => 'select',
            'choices'=>array(
                'default'=>__('Default', 'spicepress'),
                'full_width_fluid'=>__('Full Width / Container Fluid', 'spicepress'),
                'full_width_streched'=>__('Full Width / Streatched', 'spicepress'),
                )
        ));
        $wp_customize->add_setting( 'single_post_container_setting', array( 'default' => 'default') );
        $wp_customize->add_control( 'single_post_container_setting',
        array(
            'label'    => __( 'single Post layout', 'spicepress' ),
            'priority' => 105,
            'section'  => 'container_width_section',
            'type'     => 'select',
            'choices'=>array(
                'default'=>__('Default', 'spicepress'),
                'full_width_fluid'=>__('Full Width / Container Fluid', 'spicepress'),
                'full_width_streched'=>__('Full Width / Streatched', 'spicepress'),
                )
        ));

// Post Navigation effect
    $wp_customize->add_section(
        'post_navigation_section',
        array(
            'title' =>__('Post Navigation Style','spicepress'),
            'panel'  => 'general_settings',
            'priority'   => 102,

            )
    );
    $wp_customize->add_setting('post_nav_style_setting',
    array(
        'default'           => 'pagination',
        'sanitize_callback' => 'spicepress_sanitize_select'
        )
    );

    $wp_customize->add_control('post_nav_style_setting',
    array(
        'label'     => esc_html__('Choose Position', 'spicepress'),
        'section'   => 'post_navigation_section',
        'type'      => 'radio',
        'choices'   =>  array(
            'pagination'    => esc_html__('Pagination', 'spicepress'),
            'load_more'     => esc_html__('Load More', 'spicepress'),
            'infinite'  => esc_html__('Infinite Scroll', 'spicepress'),
            )
        )
    );
    /* Scrollbar Setting */

    $wp_customize->add_section('scrolltotop_setting_section', array(
        'title' => __('Scroll to Top settings', 'spicepress'),
        'panel' => 'general_settings',
    ));

    $wp_customize->add_setting('scrolltotop_setting_enable', array(
        'capability' => 'edit_theme_options',
        'default' => true,
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
    ));
    $wp_customize->add_control('scrolltotop_setting_enable', array(
        'label' => __('Enable / Disable Scroll to Setting', 'spicepress'),
        'section' => 'scrolltotop_setting_section',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('scroll_position_setting',
            array(
                'default' => 'right',
                'sanitize_callback' => 'spicepress_sanitize_select'
            )
    );

    $wp_customize->add_control('scroll_position_setting',
            array(
                'label' => esc_html__('Choose Position', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
                'type' => 'radio',
                'choices' => array(
                    'right' => esc_html__('Right', 'spicepress'),
                    'left' => esc_html__('Left', 'spicepress'),
                )
            )
    );

    $wp_customize->add_setting('spicepress_scroll_icon_class',
            array(
                'default' => esc_html__('fa fa-chevron-up', 'spicepress'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('spicepress_scroll_icon_class',
            array(
                'label' => esc_html__('Icon Class Name', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting('spicepress_scroll_border_radius',
            array(
                'default' => 0,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'spicepress_sanitize_number_range',
            )
    );
    $wp_customize->add_control('spicepress_scroll_border_radius',
            array(
                'label' => esc_html__('Border Radius', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
                'type' => 'number',
                'input_attrs' => array('min' => 0, 'max' => 50, 'step' => 1, 'style' => 'width: 100%;'),
            )
    );

    // enable/disable color settings
    $wp_customize->add_setting(
            'apply_scrll_top_clr_enable',
            array('capability' => 'edit_theme_options',
                'default' => false,
    ));

    $wp_customize->add_control(
            'apply_scrll_top_clr_enable',
            array(
                'type' => 'checkbox',
                'label' => __('Enable To Apply Color Setting', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
            )
    );

    $wp_customize->add_setting(
            'spicepress_scroll_bg_color', array(
        'capability' => 'edit_theme_options',
        'default' => '#ce1b28'
    ));

    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'spicepress_scroll_bg_color',
                    array(
                'label' => __('Background color', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
                'settings' => 'spicepress_scroll_bg_color',
    )));


    $wp_customize->add_setting(
            'spicepress_scroll_icon_color', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff'
    ));

    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'spicepress_scroll_icon_color',
                    array(
                'label' => __('Icon color', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
                'settings' => 'spicepress_scroll_icon_color',
    )));


    $wp_customize->add_setting(
            'spicepress_scroll_bghover_color', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff'
    ));

    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'spicepress_scroll_bghover_color',
                    array(
                'label' => __('Background Hover color', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
                'settings' => 'spicepress_scroll_bghover_color',
    )));


    $wp_customize->add_setting(
            'spicepress_scroll_iconhover_color', array(
        'capability' => 'edit_theme_options',
        'default' => '#ce1b28'
    ));

    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'spicepress_scroll_iconhover_color',
                    array(
                'label' => __('Icon Hover color', 'spicepress'),
                'section' => 'scrolltotop_setting_section',
                'settings' => 'spicepress_scroll_iconhover_color',
    )));
    /* Scrollbar Setting END */

    /* Footer Layout Start */

    class Spicepress_Footer_Widgets_Customize_Control_Radio_Image extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since 1.1.24
         * @var   string
         */
        public $type = 'radio-image';

        /**
         * Displays the control content.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function render_content() {
            /* If no choices are provided, bail. */
            if (empty($this->choices)) {
                return;
            }
            ?>

            <?php if (!empty($this->label)) : ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php endif; ?>

            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>

            <div id="<?php echo esc_attr("input_{$this->id}"); ?>">

                <?php foreach ($this->choices as $value => $args) : ?>

                    <input type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr("_customize-radio-{$this->id}"); ?>" id="<?php echo esc_attr("{$this->id}-{$value}"); ?>" <?php $this->link(); ?> <?php checked($this->value(), $value); ?> />

                    <label for="<?php echo esc_attr("{$this->id}-{$value}"); ?>" class="<?php echo esc_attr("{$this->id}-{$value}"); ?>">
                        <?php if (!empty($args['label'])) { ?>
                            <span class="screen-reader-text"><?php echo esc_html($args['label']); ?></span>
                            <?php
                        }
                        ?>
                        <img class="wp-ui-highlight" src="<?php echo esc_url(sprintf($args['url'], get_template_directory_uri(), get_stylesheet_directory_uri())); ?>"
                        <?php
                        if (!empty($args['label'])) {
                            echo 'alt="' . esc_attr($args['label']) . '"';
                        }
                        ?>
                             />
                    </label>

                <?php endforeach; ?>

            </div><!-- .image -->
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#<?php echo esc_attr("input_{$this->id}"); ?>').buttonset();
                });
            </script>

            <?php
        }

        /**
         * Loads the jQuery UI Button script and hooks our custom styles in.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script('jquery-ui-button');
            add_action('customize_controls_print_styles', array($this, 'print_styles'));
        }

        /**
         * Outputs custom styles to give the selected image a visible border.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function print_styles() {
            ?>

            <style type="text/css" id="hybrid-customize-radio-image-css">
                #customize-control-footer_widgets_section label {
                    display: inline-block;
                    max-width: 20% !important;
                    padding: 3px;
                    font-size: inherit;
                    line-height: inherit;
                    height: auto;
                    cursor: pointer;
                    border-width: 0;
                    -webkit-appearance: none;
                    -webkit-border-radius: 0;
                    border-radius: 0;
                    white-space: nowrap;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    color: inherit;
                    background: none;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    vertical-align: inherit;
                }


                #customize-control-footer_widgets_section .ui-buttonset
                {
                    text-align: left !important;
                }


            </style>
            <?php
        }

    }

    // Footer Widgets Section
    $wp_customize->add_section(
            'spicepress_fwidgets_setting_section',
            array(
                'title' => __('Footer Widgets Layout', 'spicepress'),
                'panel' => 'general_settings',
            )
    );

    //Enable/Disable Footer Widgets
    $wp_customize->add_setting(
            'ftr_widgets_enable',
            array('capability' => 'edit_theme_options',
                'default' => true,
    ));

    $wp_customize->add_control(
            'ftr_widgets_enable',
            array(
                'type' => 'checkbox',
                'label' => __('Enable / Disable Footer Layout', 'spicepress'),
                'section' => 'spicepress_fwidgets_setting_section',
            )
    );

    if (class_exists('Spicepress_Footer_Widgets_Customize_Control_Radio_Image')) {
        $wp_customize->add_setting(
                'footer_widgets_section', array(
            'default' => '3',
                )
        );

        $wp_customize->add_control(
                new Spicepress_Footer_Widgets_Customize_Control_Radio_Image(
                        $wp_customize, 'footer_widgets_section', array(
                    'label' => esc_html__('Footer widget layout', 'spicepress'),
                    'section' => 'spicepress_fwidgets_setting_section',
                    'choices' => array(
                        '1' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/1.png',
                        ),
                        '2' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/2.png',
                        ),
                        '3' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/3.png',
                        ),
                        '4' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/4.png',
                        ),
                        '5' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/3-3-6.png',
                        ),
                        '6' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/3-6-3.png',
                        ),
                        '7' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/6-3-3.png',
                        ),
                        '8' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/8-4.png',
                        ),
                        '9' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-widgets/4-8.png',
                        ),
                    ),
                        )
                )
        );
    }

    //Footer Background Image
    $wp_customize->add_setting('ftr_wgt_background_img', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ftr_wgt_background_img', array(
                'label' => __('Footer Widgets Background Image', 'spicepress'),
                'section' => 'spicepress_fwidgets_setting_section',
                'settings' => 'ftr_wgt_background_img',
    )));

    //Footer Widget Repeat
    $wp_customize->add_setting('footer_widget_reapeat', array('default' => 'no-repeat'));
    $wp_customize->add_control('footer_widget_reapeat',
            array(
                'label' => __('Background Image Repeat', 'spicepress'),
                'section' => 'spicepress_fwidgets_setting_section',
                'type' => 'select',
                'choices' => array(
                    'no-repeat' => __('No Repeat', 'spicepress'),
                    'repeat' => __('Repeat All', 'spicepress'),
                    'repeat-x' => __('Repeat Horizontally', 'spicepress'),
                    'repeat-y' => __('Repeat Vertically', 'spicepress'),
                )
    ));

    //Footer Widget position
    $wp_customize->add_setting('footer_widget_position', array('default' => 'left top'));
    $wp_customize->add_control('footer_widget_position',
            array(
                'label' => __('Background Image Position', 'spicepress'),
                'section' => 'spicepress_fwidgets_setting_section',
                'type' => 'select',
                'choices' => array(
                    'left top' => __('Left Top', 'spicepress'),
                    'left center' => __('Left Center', 'spicepress'),
                    'left bottom' => __('left bottom', 'spicepress'),
                    'right top' => __('Right Top', 'spicepress'),
                    'right center' => __('Right Center', 'spicepress'),
                    'right bottom' => __('Right Bottom', 'spicepress'),
                    'center top' => __('Center Top', 'spicepress'),
                    'center center' => __('Center Center', 'spicepress'),
                    'center bottom' => __('Center Bottom', 'spicepress'),
                )
    ));

    //Footer Widget Size
    $wp_customize->add_setting('footer_widget_bg_size', array('default' => 'cover'));
    $wp_customize->add_control('footer_widget_bg_size',
            array(
                'label' => __('Background Size', 'spicepress'),
                'section' => 'spicepress_fwidgets_setting_section',
                'type' => 'select',
                'choices' => array(
                    'cover' => __('Cover', 'spicepress'),
                    'contain' => __('Contain', 'spicepress'),
                    'auto' => __('Auto', 'spicepress'),
                )
    ));

    //Footer Widget Background Attachment
    $wp_customize->add_setting('footer_widget_bg_attachment', array('default' => 'scroll'));
    $wp_customize->add_control('footer_widget_bg_attachment',
            array(
                'label' => __('Background Attachment', 'spicepress'),
                'description' => __('Note: Background Image Repeat and Background Image Position will not work with Background Attachment Fixed property', 'spicepress'),
                'section' => 'spicepress_fwidgets_setting_section',
                'type' => 'select',
                'choices' => array(
                    'scroll' => __('Scroll', 'spicepress'),
                    'fixed' => __('Fixed', 'spicepress'),
                )
    ));

    // Image overlay
    $wp_customize->add_setting('spicepress_fwidgets_image_overlay', array(
        'default' => true,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('spicepress_fwidgets_image_overlay', array(
        'label' => __('Enable Footer Widgets image overlay', 'spicepress'),
        'section' => 'spicepress_fwidgets_setting_section',
        'type' => 'checkbox',
    ));

    //Testimonial Background Overlay Color
    $wp_customize->add_setting('spicepress_fwidgets_overlay_section_color', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'rgba(0, 0, 0, 0.7)',
    ));

    $wp_customize->add_control(new Spicepress_Customize_Alpha_Color_Control($wp_customize, 'spicepress_fwidgets_overlay_section_color', array(
                'label' => __('Footer Widgets image overlay color', 'spicepress'),
                'palette' => true,
                'section' => 'spicepress_fwidgets_setting_section')
    ));


    /* Footer Layout */

    /* Footer Bar */

    //Only For Footer Bar
    class Spicepress_Footer_Bar_Customize_Control_Radio_Image extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since 1.1.24
         * @var   string
         */
        public $type = 'radio-image';

        /**
         * Displays the control content.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function render_content() {
            /* If no choices are provided, bail. */
            if (empty($this->choices)) {
                return;
            }
            ?>

            <?php if (!empty($this->label)) : ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php endif; ?>

            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>

            <div id="<?php echo esc_attr("input_{$this->id}"); ?>">

                <?php foreach ($this->choices as $value => $args) : ?>

                    <input type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr("_customize-radio-{$this->id}"); ?>" id="<?php echo esc_attr("{$this->id}-{$value}"); ?>" <?php $this->link(); ?> <?php checked($this->value(), $value); ?> />

                    <label for="<?php echo esc_attr("{$this->id}-{$value}"); ?>" class="<?php echo esc_attr("{$this->id}-{$value}"); ?>">
                        <?php if (!empty($args['label'])) { ?>
                            <span class="screen-reader-text"><?php echo esc_html($args['label']); ?></span>
                            <?php
                        }
                        ?>
                        <img class="wp-ui-highlight" src="<?php echo esc_url(sprintf($args['url'], get_template_directory_uri(), get_stylesheet_directory_uri())); ?>"
                        <?php
                        if (!empty($args['label'])) {
                            echo 'alt="' . esc_attr($args['label']) . '"';
                        }
                        ?>
                             />
                    </label>

                <?php endforeach; ?>

            </div><!-- .image -->
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#<?php echo esc_attr("input_{$this->id}"); ?>').buttonset();

                    //This Script for Home
                    if (jQuery('#_customize-input-home_portfolio_design_layout').val() == 1)
                    {
                        jQuery('#customize-control-portfolio_nav_style').show();
                    } else
                    {
                        jQuery('#customize-control-portfolio_nav_style').hide();
                    }
                    wp.customize('home_portfolio_design_layout', function (value) {
                        value.bind(
                                function (newval) {
                                    if (newval == 1)
                                    {
                                        jQuery('#customize-control-portfolio_nav_style').show();
                                    } else
                                    {
                                        jQuery('#customize-control-portfolio_nav_style').hide();
                                    }
                                }
                        );
                    }
                    );

                    //Home page news section
                    if (jQuery('#_customize-input-home_news_design_layout').val() == 2)
                    {
                        jQuery('#customize-control-spicepress_homeblog_layout').hide();
                    } else
                    {
                        jQuery('#customize-control-spicepress_homeblog_layout').show();
                    }
                    wp.customize('home_news_design_layout', function (value) {
                        value.bind(
                                function (newval) {
                                    if (newval == 2)
                                    {
                                        jQuery('#customize-control-spicepress_homeblog_layout').hide();
                                    } else
                                    {
                                        jQuery('#customize-control-spicepress_homeblog_layout').show();
                                    }
                                }
                        );
                    }
                    );


                    if ((jQuery('#_customize-input-footer_bar_sec1').val() == "custom_text"))
                    {
                        jQuery('#customize-control-footer_copyright').show();
                    } else
                    {
                        jQuery('#customize-control-footer_copyright').hide();
                    }
                    if ((jQuery('#_customize-input-footer_bar_sec2').val() == "custom_text"))
                    {
                        jQuery('#customize-control-footer_copyright_2').show();
                    } else
                    {
                        jQuery('#customize-control-footer_copyright_2').hide();
                    }


                    wp.customize('footer_bar_sec1', function (value) {
                        value.bind(
                                function (newval) {
                                    if (newval == "custom_text")
                                    {
                                        jQuery('#customize-control-footer_copyright').show();
                                    } else
                                    {
                                        jQuery('#customize-control-footer_copyright').hide();
                                    }
                                }
                        );
                    }
                    );
                    wp.customize('footer_bar_sec2', function (value) {
                        value.bind(
                                function (newval) {
                                    if (newval == "custom_text")
                                    {
                                        jQuery('#customize-control-footer_copyright_2').show();
                                    } else
                                    {
                                        jQuery('#customize-control-footer_copyright_2').hide();
                                    }
                                }
                        );
                    }
                    );
                });
            </script>

            <?php
        }

        /**
         * Loads the jQuery UI Button script and hooks our custom styles in.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script('jquery-ui-button');
            add_action('customize_controls_print_styles', array($this, 'print_styles'));
        }

        /**
         * Outputs custom styles to give the selected image a visible border.
         *
         * @since  1.1.24
         * @access public
         * @return void
         */
        public function print_styles() {
            ?>

            <style type="text/css" id="hybrid-customize-radio-image-css">
                #customize-control-footer_widgets_section label {
                    display: inline-block;
                    max-width: 20% !important;
                    padding: 3px;
                    font-size: inherit;
                    line-height: inherit;
                    height: auto;
                    cursor: pointer;
                    border-width: 0;
                    -webkit-appearance: none;
                    -webkit-border-radius: 0;
                    border-radius: 0;
                    white-space: nowrap;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    color: inherit;
                    background: none;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    vertical-align: inherit;
                }


                #customize-control-footer_widgets_section .ui-buttonset
                {
                    text-align: left !important;
                }


            </style>
            <?php
        }

    }

    $wp_customize->add_section('footer_section',
            array(
                'title' => esc_html__('Footer Bar', 'spicepress'),
                'panel' => 'general_settings',
            )
    );

    $wp_customize->add_setting('ftr_bar_enable', array(
        'capability' => 'edit_theme_options',
        'default' => true,
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
    ));
    $wp_customize->add_control('ftr_bar_enable', array(
        'label' => __('Enable / Disable Footer Bar', 'spicepress'),
        'section' => 'footer_section',
        'type' => 'checkbox',
    ));

    if (class_exists('Spicepress_Footer_Bar_Customize_Control_Radio_Image')) {
        $wp_customize->add_setting(
                'advance_footer_bar_section', array(
            'default' => '1',
                )
        );

        $wp_customize->add_control(
                new Spicepress_Footer_Bar_Customize_Control_Radio_Image(
                        $wp_customize, 'advance_footer_bar_section', array(
                    'label' => esc_html__('Footer Bar layout', 'spicepress'),
                    'section' => 'footer_section',
                    'choices' => array(
                        '1' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-bar/footer-layout-1-76x48.png',
                        ),
                        '2' => array(
                            'url' => trailingslashit(ST_TEMPLATE_DIR_URI) . 'images/footer-bar/footer-layout-2-76x48.png',
                        ),
                    ),
                        )
                )
        );
    }

    //Footer bar section 1
    $wp_customize->add_setting('footer_bar_sec1', array('default' => 'custom_text'));
    $wp_customize->add_control('footer_bar_sec1',
            array(
                'label' => __('Section 1', 'spicepress'),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    'none' => __('None', 'spicepress'),
                    'footer_menu' => __('Footer Menu', 'spicepress'),
                    'custom_text' => __('Custom Text', 'spicepress'),
                    'widget' => __('Widget', 'spicepress')
                )
    ));

    /*     * *********************** Copyright Section 1******************************** */
    $wp_customize->add_setting('footer_copyright_text',
            array(
                'default' => '<p>' . __('Copyright © 2018 SpiceThemes. All right reserved', 'spicepress') . '</p>',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'spicepress_copyright_sanitize_text',
            )
    );

    $wp_customize->add_control('footer_copyright_text',
            array(
                'label' => __('Copyright Section 1', 'spicepress'),
                'section' => 'footer_section',
                'type' => 'textarea',
            )
    );

    //Footer bar section 2
    $wp_customize->add_setting('footer_bar_sec2', array('default' => 'none'));
    $wp_customize->add_control('footer_bar_sec2',
            array(
                'label' => __('Section 2', 'spicepress'),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    'none' => __('None', 'spicepress'),
                    'footer_menu' => __('Footer Menu', 'spicepress'),
                    'custom_text' => __('Custom Text', 'spicepress'),
                    'widget' => __('Widget', 'spicepress')
                )
    ));

    /*     * *********************** Copyright Section 2******************************** */
    $wp_customize->add_setting('footer_copyright_2',
            array(
                'default' => '<p>' . __('Copyright 2019 <a href="#"> SpiceThemes</a> All right reserved', 'spicepress') . ' </p>',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'spicepress_copyright_sanitize_text',
            )
    );

    $wp_customize->add_control('footer_copyright_2',
            array(
                'label' => __('Copyright Section 2', 'spicepress'),
                'section' => 'footer_section',
                'type' => 'textarea',
            )
    );


    //Footer Bar Border
    $wp_customize->add_setting('footer_bar_border',
            array(
                'default' => 1,
                'capability' => 'edit_theme_options',
            )
    );

    $wp_customize->add_control(new spicepress_Slider_Control($wp_customize, 'footer_bar_border',
                    array(
                'label' => __('Footer Bar Border', 'spicepress'),
                'section' => 'footer_section',
                'type' => 'slider',
                'min' => 0,
                'max' => 30,
                    )
    ));

    //Footer Bar Border Color
    $wp_customize->add_setting(
            'spicepress_footer_border_clr', array(
        'capability' => 'edit_theme_options',
        'default' => '#403f4e'
    ));

    $wp_customize->add_control(
            new WP_Customize_Color_Control(
                    $wp_customize,
                    'spicepress_footer_border_clr',
                    array(
                'label' => __('Border Color', 'spicepress'),
                'section' => 'footer_section',
                'settings' => 'spicepress_footer_border_clr',
    )));

    //Footer Bar border Style
    $wp_customize->add_setting('footer_border_style', array('default' => 'solid'));
    $wp_customize->add_control('footer_border_style',
            array(
                'label' => __('Border Style', 'spicepress'),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    'solid' => __('Solid', 'spicepress'),
                    'dotted' => __('Dotted', 'spicepress'),
                    'dashed' => __('Dashed', 'spicepress'),
                    'double' => __('Double', 'spicepress'),
                    'groove' => __('Groove', 'spicepress'),
                    'ridge' => __('Ridge', 'spicepress'),
                    'inset' => __('Inset', 'spicepress'),
                    'outset' => __('Outset', 'spicepress')
                )
    ));
    /* Footer Bar */

    /* Search Setting */
    $wp_customize->add_section('search_effect_setting_section', array(
        'title' => __('Search settings', 'spicepress'),
        'panel' => 'general_settings',
    ));

    $wp_customize->add_setting('search_btn_enable', array(
        'capability' => 'edit_theme_options',
        'default' => true,
        'sanitize_callback' => 'spicepress_home_page_sanitize_text',
    ));
    $wp_customize->add_control('search_btn_enable', array(
        'label' => __('Enable / Disable Search Icon', 'spicepress'),
        'section' => 'search_effect_setting_section',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('search_effect_style_setting',
            array(
                'default' => 'toogle',
                'sanitize_callback' => 'spicepress_sanitize_select'
            )
    );
    $wp_customize->add_control('search_effect_style_setting',
            array(
                'label' => esc_html__('Choose Position', 'spicepress'),
                'section' => 'search_effect_setting_section',
                'type' => 'radio',
                'choices' => array(
                    'toogle' => esc_html__('Toggle', 'spicepress'),
                    'popup_light' => esc_html__('Pop up light', 'spicepress'),
                    'popup_dark' => esc_html__('Pop up dark', 'spicepress'),
                )
            )
    );
    /* Search Setting END */

    /* Footer backgrund color settings */
    $wp_customize->add_section('footer_background_color_settings', array(
        'title' => __('Footer background color settings', 'spicepress'),
        'panel' => 'general_settings',
    ));


    //Footer background color
    $wp_customize->add_setting('footer_background_color', array(
        'default' => '#21202e',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array(
                'label' => __('Footer background color', 'spicepress'),
                'section' => 'footer_background_color_settings',
                'settings' => 'footer_background_color',)
    ));

    function spicepress_copyright_sanitize_text($input) {
        return wp_kses_post(force_balance_tags($input));
    }

    if (!function_exists('spicepress_sanitize_number_range')) :

        /**
         * Sanitize number range.
         *
         * @since 1.0.0
         *
         * @see absint() https://developer.wordpress.org/reference/functions/absint/
         *
         * @param int  $input Number to check within the numeric range defined by the setting.
         * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
         * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise, the setting default.
         */
        function spicepress_sanitize_number_range($input, $setting) {

            // Ensure input is an absolute integer.
            $input = absint($input);

            // Get the input attributes associated with the setting.
            $atts = $setting->manager->get_control($setting->id)->input_attrs;

            // Get min.
            $min = ( isset($atts['min']) ? $atts['min'] : $input );

            // Get max.
            $max = ( isset($atts['max']) ? $atts['max'] : $input );

            // Get Step.
            $step = ( isset($atts['step']) ? $atts['step'] : 1 );

            // If the input is within the valid range, return it; otherwise, return the default.
            return ( $min <= $input && $input <= $max && is_int($input / $step) ? $input : $setting->default );
        }

    endif;

    function spicepress_sanitize_select($input, $setting) {

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options
        $choices = $setting->manager->get_control($setting->id)->choices;

        //return input if valid or return default option
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

    function sticky_header_logo_callback($control) {
        if (true == $control->manager->get_setting('sticky_header_logo')->value()) {
            return true;
        } else {
            return false;
        }
    }

    function spicepress_sanitize_checkbox($checked) {
        // Boolean check.
        return ( ( isset($checked) && true == $checked ) ? true : false );
    }

}

add_action('customize_register', 'spicepress_general_settings_customizer');

function spicepress_register_copyright_section_partials($wp_customize) {

    $wp_customize->selective_refresh->add_partial('footer_copyright_text', array(
        'selector' => '.site-footer .site-info p',
        'settings' => 'footer_copyright_text',
        'render_callback' => 'footer_copyright_text_render_callback',
    ));
}

add_action('customize_register', 'spicepress_register_copyright_section_partials');

function footer_copyright_text_render_callback() {
    return get_theme_mod('footer_copyright_text');
}
