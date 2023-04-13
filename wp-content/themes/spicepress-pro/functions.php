<?php

//added freemious code snippet

if ( !function_exists( 'sp_fs' ) ) {
    // Create a helper function for easy SDK access.
    function sp_fs()
    {
        global  $sp_fs ;
        
        if ( !isset( $sp_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $sp_fs = fs_dynamic_init( array(
                'id'             => '10307',
                'slug'           => 'spicepress-pro',
                'type'           => 'theme',
                'public_key'     => 'pk_f5ba3b4e2e6dced9648d73555ed61',
                'is_premium'     => true,
                'premium_suffix' => 'SpicePress Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'support' => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $sp_fs;
    }
    
    // Init Freemius.
    sp_fs();
    // Signal that SDK was initiated.
    do_action( 'sp_fs_loaded' );
}

// Global variables define
define( 'ST_TEMPLATE_DIR_URI', get_template_directory_uri() );
define( 'ST_TEMPLATE_DIR', get_template_directory() );
define( 'ST_THEME_FUNCTIONS_PATH', ST_TEMPLATE_DIR . '/functions' );
// Theme functions file including
require ST_THEME_FUNCTIONS_PATH . '/scripts/script.php';
require ST_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php';
require ST_THEME_FUNCTIONS_PATH . '/menu/st_nav_walker.php';
require ST_THEME_FUNCTIONS_PATH . '/font/font.php';
require ST_THEME_FUNCTIONS_PATH . '/pagination/spicepress_pagination.php';
require ST_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php';
require ST_THEME_FUNCTIONS_PATH . '/template-tags.php';
require ST_THEME_FUNCTIONS_PATH . '/excerpt/excerpt.php';
require ST_THEME_FUNCTIONS_PATH . '/widgets/sidebars.php';
require ST_THEME_FUNCTIONS_PATH . '/post-type/custom-post-type.php';
require ST_THEME_FUNCTIONS_PATH . '/meta-box/post-meta.php';
require ST_THEME_FUNCTIONS_PATH . '/taxonomies/taxonomies.php';
require ST_THEME_FUNCTIONS_PATH . '/widgets/wdl_header_topbar_info_widget.php';
require ST_THEME_FUNCTIONS_PATH . '/widgets/wdl_contact_info_widget.php';
require ST_THEME_FUNCTIONS_PATH . '/widgets/wdl_social_icon.php';
require ST_THEME_FUNCTIONS_PATH . '/widgets/wdl_featured_latest_news.php';
require ST_THEME_FUNCTIONS_PATH . '/widgets/wdl_header_topbar_info_ct_widget.php';
require ST_TEMPLATE_DIR . '/css/custom-css.php';
require ST_THEME_FUNCTIONS_PATH . '/shortcode/shortcode.php';
// Adding customizer files
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_blog_option_settings.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_layout_manager.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer-template.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_sections_settings.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_header_image.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_general_settings.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_typography.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer_color_back_settings.php';
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer.php';
//Alpha Color Control
require ST_THEME_FUNCTIONS_PATH . '/customizer/customizer-alpha-color-picker/class-spicepress-customize-alpha-color-control.php';
// WPML Pll Files
require ST_THEME_FUNCTIONS_PATH . '/wpml-pll/functions.php';
// Adding hooks files
require ST_THEME_FUNCTIONS_PATH . '/hooks/functions.php';
require ST_THEME_FUNCTIONS_PATH . '/hooks/spicepress-hooks-settings.php';
require ST_THEME_FUNCTIONS_PATH . '/spicepress-hooks.php';
require ST_THEME_FUNCTIONS_PATH . '/helper-functions.php';
// set default content width
if ( !isset( $content_width ) ) {
    $content_width = 696;
}
// Theme title
if ( !function_exists( 'spicepress_head_title' ) ) {
    function spicepress_head_title( $title, $sep )
    {
        global  $paged, $page ;
        if ( is_feed() ) {
            return $title;
        }
        // Add the site name
        $title .= get_bloginfo( 'name' );
        // Add the site description for the home / front page
        $site_description = get_bloginfo( 'description' );
        if ( $site_description && (is_home() || is_front_page()) ) {
            $title = "{$title} {$sep} {$site_description}";
        }
        // Add a page number if necessary.
        if ( ($paged >= 2 || $page >= 2) && !is_404() ) {
            $title = "{$title} {$sep} " . sprintf( __( 'Page', 'spicepress' ), max( $paged, $page ) );
        }
        return $title;
    }

}
add_filter(
    'wp_title',
    'spicepress_head_title',
    10,
    2
);
if ( !function_exists( 'spicepress_theme_setup' ) ) {
    function spicepress_theme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'spicepress', get_template_directory() . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        //Add selective refresh for sidebar widget
        add_theme_support( 'customize-selective-refresh-widgets' );
        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );
        // post format support
        add_theme_support( 'post-formats', array(
            'aside',
            'quote',
            'status',
            'video'
        ) );
        // supports featured image
        add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary'     => __( 'Primary Menu', 'spicepress' ),
            'footer_menu' => esc_html__( 'Footer Menu', 'spicepress' ),
        ) );
        // woocommerce support
        add_theme_support( 'woocommerce' );
        // Woocommerce Gallery Support
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        //Custom Header support
        add_theme_support( 'custom-header' );
        //Custom background support
        add_theme_support( 'custom-background' );
        //Custom logo
        add_theme_support( 'custom-logo', array(
            'height'      => 49,
            'width'       => 210,
            'flex-height' => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
        // Custom-header
        add_theme_support( 'custom-header', apply_filters( 'spicepress_custom_header_args', array(
            'default-text-color' => '333',
            'width'              => 1600,
            'height'             => 200,
            'flex-height'        => true,
            'wp-head-callback'   => 'spicepress_header_style',
        ) ) );
    }

}
add_action( 'after_setup_theme', 'spicepress_theme_setup' );
function spicepress_logo_class( $html )
{
    $header_logo_placing = get_theme_mod( 'header_logo_placing', 'left' );
    if ( $header_logo_placing == 'left' || $header_logo_placing == 'full_left' ) {
        $logo_class = '';
    }
    if ( $header_logo_placing == 'right' ) {
        $logo_class = 'align-right';
    }
    $header_varition = get_theme_mod( 'header_varition', 'standard' );
    
    if ( $header_varition == 'standard' ) {
        if ( $header_logo_placing == 'center' ) {
            $logo_class = 'align-center';
        }
    } else {
        if ( $header_logo_placing == 'center' ) {
            $logo_class = '';
        }
    }
    
    $html = str_replace( 'custom-logo-link', 'navbar-brand custom-logo ' . $logo_class . '', $html );
    return $html;
}

add_filter( 'get_custom_logo', 'spicepress_logo_class' );
// custom background
function spicepress_custom_background_function()
{
    $page_bg_image_url = get_theme_mod( 'predefined_back_image', 'bg-img1.png' );
    if ( $page_bg_image_url != '' ) {
        echo  '<style>body.boxed{ background-image:url("' . ST_TEMPLATE_DIR_URI . '/images/bg-pattern/' . $page_bg_image_url . '");}</style>' ;
    }
}

add_action(
    'wp_head',
    'spicepress_custom_background_function',
    10,
    0
);
//function spicepress_registers() {
//
//	wp_enqueue_script( 'graphite_script', get_template_directory_uri() . '/js/spicepress.js', array("jquery"), '20120206', true  );
//}
//add_action( 'customize_controls_enqueue_scripts', 'spicepress_registers' );
function spicepress_customizer_live_preview()
{
    wp_enqueue_script(
        'spicepress-customizer-preview',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'jquery', 'customize-preview' ),
        999,
        true
    );
}

add_action( 'customize_preview_init', 'spicepress_customizer_live_preview' );
/*
 * Import customizer options from Lite version
 */
add_action( 'after_switch_theme', 'spicepress_get_lite_options' );
/**
 * Import lite options.
 */
function spicepress_get_lite_options()
{
    $spicepress_mods = get_option( 'theme_mods_spicepress' );
    if ( !empty($spicepress_mods) ) {
        foreach ( $spicepress_mods as $spicepress_mod_k => $spicepress_mod_v ) {
            set_theme_mod( $spicepress_mod_k, $spicepress_mod_v );
        }
    }
}

/* Get Project data form lite */

if ( get_theme_mod( 'portfolio_one_title' ) != '' || get_theme_mod( 'portfolio_two_title' ) != '' || get_theme_mod( 'portfolio_three_title' ) != '' ) {
    $status = get_option( 'spicepress-migration-status', 'no' );
    
    if ( $status == 'no' ) {
        $portfolio_one_title = get_theme_mod( 'portfolio_one_title' );
        
        if ( !empty($portfolio_one_title) ) {
            $post_id = wp_insert_post( array(
                'post_type'   => 'spicepress_portfolio',
                'post_title'  => get_theme_mod( 'portfolio_one_title' ),
                'post_status' => 'publish',
            ) );
            $filename = get_theme_mod( 'portfolio_one_thumb' );
            $filetype = wp_check_filetype( basename( $filename ), null );
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type' => $filetype['type'],
                'post_title'     => preg_replace( '/\\.[^.]+$/', '', basename( $filename ) ),
                'post_content'   => '',
                'post_status'    => 'inherit',
            );
            $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
            set_post_thumbnail( $post_id, $attach_id );
            update_post_meta( $post_id, 'portfolio_title_description', sanitize_text_field( get_theme_mod( 'portfolio_one_desc' ) ) );
            $table_name = $wpdb->prefix . "term_relationships";
            $wpdb->insert( $table_name, array(
                'object_id'        => $post_id,
                'term_taxonomy_id' => 2,
                'term_order'       => 0,
            ) );
        }
        
        $portfolio_two_title = get_theme_mod( 'portfolio_two_title' );
        
        if ( !empty($portfolio_two_title) ) {
            $post_id = wp_insert_post( array(
                'post_type'   => 'spicepress_portfolio',
                'post_title'  => get_theme_mod( 'portfolio_two_title' ),
                'post_status' => 'publish',
            ) );
            $filename = get_theme_mod( 'portfolio_two_thumb' );
            $filetype = wp_check_filetype( basename( $filename ), null );
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type' => $filetype['type'],
                'post_title'     => preg_replace( '/\\.[^.]+$/', '', basename( $filename ) ),
                'post_content'   => '',
                'post_status'    => 'inherit',
            );
            $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
            set_post_thumbnail( $post_id, $attach_id );
            update_post_meta( $post_id, 'portfolio_title_description', sanitize_text_field( get_theme_mod( 'portfolio_two_desc' ) ) );
            $table_name = $wpdb->prefix . "term_relationships";
            $wpdb->insert( $table_name, array(
                'object_id'        => $post_id,
                'term_taxonomy_id' => 2,
                'term_order'       => 0,
            ) );
        }
        
        $portfolio_three_title = get_theme_mod( 'portfolio_three_title' );
        
        if ( !empty($portfolio_three_title) ) {
            $post_id = wp_insert_post( array(
                'post_type'   => 'spicepress_portfolio',
                'post_title'  => get_theme_mod( 'portfolio_three_title' ),
                'post_status' => 'publish',
            ) );
            $filename = get_theme_mod( 'portfolio_three_thumb' );
            $filetype = wp_check_filetype( basename( $filename ), null );
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type' => $filetype['type'],
                'post_title'     => preg_replace( '/\\.[^.]+$/', '', basename( $filename ) ),
                'post_content'   => '',
                'post_status'    => 'inherit',
            );
            $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
            set_post_thumbnail( $post_id, $attach_id );
            update_post_meta( $post_id, 'portfolio_title_description', sanitize_text_field( get_theme_mod( 'portfolio_three_desc' ) ) );
            $table_name = $wpdb->prefix . "term_relationships";
            $wpdb->insert( $table_name, array(
                'object_id'        => $post_id,
                'term_taxonomy_id' => 2,
                'term_order'       => 0,
            ) );
        }
        
        update_option( 'spicepress-migration-status', 'yes' );
    }

}

//Set default texonomy for portfolio
function spicepress_default_object_terms( $post_id, $post )
{
    
    if ( 'publish' === $post->post_status && $post->post_type === 'spicepress_portfolio' ) {
        $defaults = array(
            'portfolio_categories' => array( 'Show All' ),
        );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty($terms) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }

}

add_action(
    'save_post',
    'spicepress_default_object_terms',
    0,
    2
);
add_action( 'after_switch_theme', 'spicepress_import_theme_mods_from_spicethemes_child_themes' );
/**
* Import theme mods when switching from a SpiceThemes SpicePress child theme to SpicePress
*/
function spicepress_import_theme_mods_from_spicethemes_child_themes()
{
    // Get the name of the previously active theme.
    $previous_theme = strtolower( get_option( 'theme_switched' ) );
    if ( !in_array( $previous_theme, array(
        'rockers',
        'content',
        'certify',
        'stacy',
        'spicepress-child-theme',
        'spicepress-pro-child-theme',
        'chilly',
        'spiceblue'
    ) ) ) {
        return;
    }
    // Get the theme mods from the previous theme.
    $previous_theme_content = get_option( 'theme_mods_' . $previous_theme );
    if ( !empty($previous_theme_content) ) {
        foreach ( $previous_theme_content as $previous_theme_mod_k => $previous_theme_mod_v ) {
            set_theme_mod( $previous_theme_mod_k, $previous_theme_mod_v );
        }
    }
}

function header_layout_setting_for_center_varient()
{
    $header_varition = get_theme_mod( 'header_varition', 'standard' );
    
    if ( $header_varition == 'center' ) {
        $header_layout = get_theme_mod( 'header_logo_placing', 'left' );
        
        if ( $header_layout == 'left' ) {
            ?>
			<style type="text/css">
				@media (min-width: 1100px){
					.index5{text-align: justify;}
				}
				@media (min-width: 991px){
				.navbar-custom.hp-hc .navbar-nav{float: left;}}
				@media (max-width: 491px){
					.index5 { text-align: center; }
				}
			</style>
		<?php 
        } elseif ( $header_layout == 'right' ) {
            ?>
			<style type="text/css">
				@media (min-width: 1100px){
					.index5{text-align: right;}
					.index5 .navbar-brand.align-right { float: none;}
					.index5 .site-title {text-align: justify;}
				}
				@media (min-width: 991px){
				.navbar-custom.hp-hc .navbar-nav{float: right;}}
				@media (max-width: 491px){
					.index5 { text-align: center; }
					.index5 .navbar-brand.align-right { margin: 0;}
				}
				@media (max-width: 1024px){
					.index5 .navbar-brand.align-right {
						float: none;
					}
					.index5 .navbar-brand.align-right { margin: 0;}
				}
			</style>
		<?php 
        } elseif ( $header_layout == 'full_left' ) {
            ?>
			<style type="text/css">
			@media (min-width: 1100px){
				.index5{text-align: justify;}
			}
			@media (max-width: 1024px){
			 .index5 .header-center-full-width-var .navbar-brand { float: none;}
		 }
			</style>
		<?php 
        } else {
            ?>
			<style type="text/css">
				.index5{text-align: center;}
				@media (min-width: 991px){
				.navbar-custom.hp-hc .navbar-nav{float: none;}}
			</style>
		<?php 
        }
    
    }

}

add_action( 'wp_head', 'header_layout_setting_for_center_varient' );
// Pagination style

if ( get_theme_mod( 'post_nav_style_setting', 'pagination' ) != "pagination" ) {
    /*
     * initial posts dispaly
     */
    function script_load_more( $args = array() )
    {
        //initial posts load
        global  $template ;
        //echo basename($template);
        $row = '';
        $row_template = array(
            "template-blog-grid-view.php",
            "template-blog-grid-view-sidebar.php",
            "template-blog-masonry-2-col.php",
            "template-blog-masonry-3-col.php",
            "template-blog-masonry-4-col.php"
        );
        if ( in_array( basename( $template ), $row_template ) ) {
            $row = 'row';
        }
        echo  '<div id="ajax-content" class="' . $row . ' content-area">' ;
        ajax_script_load_more( $args );
        echo  '</div>' ;
        echo  '<span id="ajax-content2" >' ;
        echo  '</span>' ;
        echo  '<a href="#" id="loadMore" class="' . get_theme_mod( 'post_nav_style_setting', 'pagination' ) . '=' . basename( $template ) . '" data-page="1" data-url="' . admin_url( "admin-ajax.php" ) . '" >Load More</a>' ;
    }
    
    /*
     * create short code.
     */
    add_shortcode( 'ajax_posts', 'script_load_more' );
    /*
     * load more script call back
     */
    function ajax_script_load_more( $args )
    {
        global  $template ;
        //init ajax
        $ajax = false;
        //check ajax call or not
        if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
            $ajax = true;
        }
        //number of posts per page default
        $num = get_option( 'posts_per_page' );
        //page number
        // $paged = $_POST['page'] + 1;
        $paged = ( empty($_POST['page']) ? 0 : $_POST['page'] + 1 );
        //args
        $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $num,
            'paged'          => $paged,
        );
        $page_template = ( empty($_POST['ajaxPage_template']) ? '' : $_POST['ajaxPage_template'] );
        //query
        $query = new WP_Query( $args );
        //check
        
        if ( $query->have_posts() ) {
            //loop articales
            while ( $query->have_posts() ) {
                $query->the_post();
                //include articles template
                
                if ( $page_template == 'template-blog-full-width.php' || basename( $template ) == 'template-blog-full-width.php' ) {
                    //include 'template-parts/ajax-content.php';
                    get_template_part( 'template-parts/blog/content-blog-template-format', get_post_format() );
                } elseif ( $page_template == 'template-blog-grid-view-sidebar.php' || basename( $template ) == 'template-blog-grid-view-sidebar.php' ) {
                    //include 'template-parts/ajax-blog-grid-content.php';
                    echo  '<div class="col-lg-6 col-md-6 col-sm-12">' ;
                    get_template_part( 'template-parts/blog-grid-view/content-format', get_post_format() );
                    echo  '</div>' ;
                } elseif ( $page_template == 'template-blog-grid-view.php' || basename( $template ) == 'template-blog-grid-view.php' ) {
                    //include 'template-parts/ajax-blog-grid-view-content.php';
                    echo  '<div class="col-lg-6 col-md-6 col-sm-12">' ;
                    get_template_part( 'template-parts/blog-grid-view/content-format', get_post_format() );
                    echo  '</div>' ;
                } elseif ( $page_template == 'template-blog-left-sidebar.php' || basename( $template ) == 'template-blog-left-sidebar.php' ) {
                    //include 'template-parts/ajax-content.php';
                    get_template_part( 'template-parts/blog/content-blog-template-format', get_post_format() );
                } elseif ( $page_template == 'template-blog-list-view-sidebar.php' || basename( $template ) == 'template-blog-list-view-sidebar.php' ) {
                    //include 'template-parts/ajax-list-view-sidebar-content.php';
                    get_template_part( 'template-parts/list-view/content-format', get_post_format() );
                } elseif ( $page_template == 'template-blog-list-view.php' || basename( $template ) == 'template-blog-list-view.php' ) {
                    //include 'template-parts/ajax-list-view-content.php';
                    get_template_part( 'template-parts/list-view/content-format', get_post_format() );
                } elseif ( $page_template == 'template-blog-right-sidebar.php' || basename( $template ) == 'template-blog-right-sidebar.php' ) {
                    //include 'template-parts/ajax-content.php';
                    get_template_part( 'template-parts/blog/content-blog-template-format', get_post_format() );
                } elseif ( $page_template == 'template-blog-masonry-2-col.php' || basename( $template ) == 'template-blog-masonry-2-col.php' ) {
                    //include 'template-parts/ajax-masonary-content.php';
                    echo  '<div class="grid-item col-md-6">' ;
                    get_template_part( 'template-parts/masonry/content-format', get_post_format() );
                    echo  '</div>' ;
                } elseif ( $page_template == 'template-blog-masonry-3-col.php' || basename( $template ) == 'template-blog-masonry-3-col.php' ) {
                    //include 'template-parts/ajax-masonary-three-col-content.php';
                    echo  '<div class="grid-item col-md-4">' ;
                    get_template_part( 'template-parts/masonry/content-format', get_post_format() );
                    echo  '</div>' ;
                } elseif ( $page_template == 'template-blog-masonry-4-col.php' || basename( $template ) == 'template-blog-masonry-4-col.php' ) {
                    //include 'template-parts/ajax-masonary-four-col-content.php';
                    echo  '<div class="grid-item col-md-3">' ;
                    get_template_part( 'template-parts/masonry/content-format', get_post_format() );
                    echo  '</div>' ;
                } elseif ( $page_template == 'home.php' || basename( $template ) == 'home.php' ) {
                    //include 'template-parts/content.php';
                    get_template_part( 'template-parts/blog/content-blog-template-format', get_post_format() );
                }
            
            }
        } else {
            echo  0 ;
        }
        
        //reset post data
        wp_reset_postdata();
        //check ajax call
        if ( $ajax ) {
            die;
        }
    }
    
    /*
     * load more script ajax hooks
     */
    add_action( 'wp_ajax_nopriv_ajax_script_load_more', 'ajax_script_load_more' );
    add_action( 'wp_ajax_ajax_script_load_more', 'ajax_script_load_more' );
    /*
     * enqueue js script
     */
    add_action( 'wp_enqueue_scripts', 'ajax_enqueue_script' );
    /*
     * enqueue js script call back
     */
    function ajax_enqueue_script()
    {
        global  $template ;
        if ( basename( $template ) == 'template-blog-full-width.php' || basename( $template ) == 'template-blog-grid-view-sidebar.php' || basename( $template ) == 'template-blog-grid-view.php' || basename( $template ) == 'template-blog-left-sidebar.php' || basename( $template ) == 'template-blog-list-view-sidebar.php' || basename( $template ) == 'template-blog-list-view.php' || basename( $template ) == 'template-blog-right-sidebar.php' || basename( $template ) == 'template-blog-masonry-2-col.php' || basename( $template ) == 'template-blog-masonry-3-col.php' || basename( $template ) == 'template-blog-masonry-4-col.php' || 'page' == get_option( 'show_on_front' ) && basename( $template ) == 'home.php' ) {
            wp_enqueue_script(
                'script_ajax',
                get_theme_file_uri( '/js/script_ajax.js' ),
                array( 'jquery' ),
                '1.0',
                true
            );
        }
    }

}
