<?php

add_action('widgets_init', 'spicepress_widgets_init');

function spicepress_widgets_init() {

    $header_column = get_theme_mod('header_column_layout', __('3', 'spicepress'));
    $header_column_layout = 12 / $header_column;

    /* sidebar */

    register_sidebar(array(
        'name' => __('Sidebar widget area', 'spicepress'),
        'id' => 'sidebar_primary',
        'description' => __('Sidebar widget area', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header wow fadeInDown animated" data-wow-delay="0.4s"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));

    register_sidebar(array(
        'name' => __('Top header sidebar left area', 'spicepress'),
        'id' => 'home-header-sidebar_left',
        'description' => __('Top header sidebar left area', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header"><h3 class="widget-title">',
        'after_title' => '</h3><span></span></div>',
    ));

    register_sidebar(array(
        'name' => __('Top header sidebar right area', 'spicepress'),
        'id' => 'home-header-sidebar_right',
        'description' => __('Top header sidebar right area', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header"><h3 class="widget-title">',
        'after_title' => '</h3><span></span></div>',
    ));


    /* Top header widget sidebar */
    register_sidebar(array(
        'name' => __('Classic header widget area', 'spicepress'),
        'id' => 'header_widget_area',
        'description' => __('Classic header widget area', 'spicepress'),
        'before_widget' => '<div class="col-md-' . $header_column_layout . ' col-sm-6 col-xs-4"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<div class="section-header"><h3 class="widget-title">',
        'after_title' => '</h3><span></span></div>',
    ));


    register_sidebar(array(
        'name' => __('Footer Widget 1', 'spicepress'),
        'id' => 'footer_widget_area_left',
        'description' => __('Footer Widget 1', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header"><h3 class="widget-title">',
        'after_title' => '</h3><span></span></div>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 2', 'spicepress'),
        'id' => 'footer_widget_area_center',
        'description' => __('Footer Widget 2', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header"><h3 class="widget-title">',
        'after_title' => '</h3><span></span></div>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 3', 'spicepress'),
        'id' => 'footer_widget_area_right',
        'description' => __('Footer Widget 3', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header"><h3 class="widget-title">',
        'after_title' => '</h3><span></span></div>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 4', 'spicepress'),
        'id' => 'footer_widget_area_end_right',
        'description' => __('Footer Widget 4', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header"><h3 class="widget-title">',
        'after_title' => '</h3><span></span></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Bar 1', 'spicepress'),
        'id' => 'footer-bar-1',
        'description' => esc_html__('Footer Bar 1', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Bar 2', 'spicepress'),
        'id' => 'footer-bar-2',
        'description' => esc_html__('Footer Bar 2', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    // contact template page sidebar
    register_sidebar(array(
        'name' => __('Contact template sidebar', 'spicepress'),
        'id' => 'wdl_contact_page_sidebar',
        'description' => __('Contact template sidebar', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header wow fadeInDown animated" data-wow-delay="0.4s"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));

    register_sidebar(array(
        'name' => __('WooCommerce sidebar widget area', 'spicepress'),
        'id' => 'woocommerce',
        'description' => __('WooCommerce sidebar widget area', 'spicepress'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInDown animated" data-wow-delay="0.4s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="section-header wow fadeInDown animated" data-wow-delay="0.4s"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
}

?>