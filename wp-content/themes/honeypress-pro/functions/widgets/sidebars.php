<?php	
add_action( 'widgets_init', 'honeypress_widgets_init');
function honeypress_widgets_init() {
	
   /*sidebar*/
	
	register_sidebar( array(
		'name' => esc_html__('Sidebar widget area','honeypress'),
		'id' => 'sidebar-1',
		'description' => esc_html__('Sidebar widget area','honeypress'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
	register_sidebar( array(
		'name' => esc_html__( 'Footer Widget 1', 'honeypress' ),
		'id' => 'footer-sidebar-1',
		'description' => esc_html__( 'Footer Widget 1', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Widget 2', 'honeypress' ),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__( 'Footer Widget 2', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Widget 3', 'honeypress' ),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__( 'Footer Widget 3', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Widget 4', 'honeypress' ),
		'id' => 'footer-sidebar-4',
		'description' => esc_html__( 'Footer Widget 4', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Bar 1', 'honeypress' ),
		'id' => 'footer-bar-1',
		'description' => esc_html__( 'Footer Bar 1', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Bar 2', 'honeypress' ),
		'id' => 'footer-bar-2',
		'description' => esc_html__( 'Footer Bar 2', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Header Social Icon Sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Top header sidebar left area', 'honeypress' ),
		'id' => 'home-header-sidebar_left',
		'description' => esc_html__('Social media menu lateral area', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="right-widgets %2$s">',
		'after_widget' => '</aside>',
	));
	
	// Subscribe Sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Top header sidebar Right area', 'honeypress' ),
		'id' => 'home-header-sidebar_right',
		'description' => esc_html__('Subscriber section widget area', 'honeypress' ),
		'before_widget' => '<aside id="%1$s" class="left-widgets %2$s">',
		'after_widget' => '</aside>',
	));
	
	//register Menu sidebar
	register_sidebar( array(
	'name' => esc_html__('After Menu widget area', 'honeypress' ),
	'id' => 'menu-widget-area',
	'description' => esc_html__( 'After Menu widget area', 'honeypress' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );

	//register Slider Widgets
	register_sidebar( array(
	'name' => esc_html__('Slider widgets', 'honeypress' ),
	'id' => 'slider-widget-area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );

	register_sidebar( array(
	'name' => esc_html__('WooCommerce sidebar widget area', 'honeypress' ),
	'id' => 'woocommerce',
	'description' => esc_html__( 'WooCommerce sidebar widget area', 'honeypress' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
		
}