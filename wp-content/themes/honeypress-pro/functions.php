<?php

if ( !function_exists( 'hp_fs' ) ) {
    // Create a helper function for easy SDK access.
    function hp_fs()
    {
        global  $hp_fs ;
        
        if ( !isset( $hp_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $hp_fs = fs_dynamic_init( array(
                'id'             => '10308',
                'slug'           => 'honeypress',
                'premium_slug'   => 'honeypress-pro',
                'type'           => 'theme',
                'public_key'     => 'pk_38baed8cd9bb017d576a6d3238917',
                'is_premium'     => true,
                'premium_suffix' => 'HoneyPress Pro Theme',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'honeypress-welcome',
                'support' => false,
                'parent'  => array(
                'slug' => 'themes.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $hp_fs;
    }
    
    // Init Freemius.
    hp_fs();
    // Signal that SDK was initiated.
    do_action( 'hp_fs_loaded' );
}

// Global variables define
define( 'HONEYPRESS_PRO_TEMPLATE_DIR_URI', get_template_directory_uri() );
define( 'HONEYPRESS_PRO_TEMPLATE_DIR', get_template_directory() );
define( 'HONEYPRESS_PRO_THEME_FUNCTIONS_PATH', HONEYPRESS_PRO_TEMPLATE_DIR . '/functions' );
//Admin customizer preview
if ( !function_exists( 'honeypress_customizer_preview_scripts' ) ) {
    function honeypress_customizer_preview_scripts()
    {
        wp_enqueue_script( 'honeypress-customizer-preview', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
    }

}
add_action( 'customize_preview_init', 'honeypress_customizer_preview_scripts' );
//honeypress plus sanitize callback
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/admin/functions.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/scripts/script.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/menu/honeypress_nav_walker.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/font/font.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/pagination/honeypress_pagination.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/widgets/sidebars.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/widgets/wdl_social_icon.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/widgets/wdl_topbar_info.php';
require HONEYPRESS_PRO_TEMPLATE_DIR . '/inc/custom-header.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/custom-style/custom-css.php';
// Adding customizer files
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/helper-function.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/custom-control.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer_sections_settings.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/blog-options.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/single-blog-options.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/template.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/footer-options.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/general_settings.php';
//Breadcrumb File
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/compatibility/class-breadcrumb-trail.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer_typography.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer_color_back_settings.php';
//Metabox
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/meta-box/meta-helper.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/meta-box/register-post-format.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/meta-box/save-meta-data.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/meta-box/admin/honeypress-admin-functions.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/meta-box/admin/honeypress-admin-media-functions.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/meta-box/honeypress-media-functions.php';
//tgmpa
require_once HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'honeypress_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function honeypress_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'               => 'Honeypress Blocks Pro',
            'slug'               => 'honeypress-blocks',
            'source'             => get_template_directory() . '/plugins/honeypress-blocks-pro.zip',
            'required'           => true,
            'version'            => '1.0',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),
        array(
            'name'     => 'One Click Demo Import',
            'slug'     => 'one-click-demo-import',
            'required' => true,
        ),
        array(
            'name'     => esc_html__( 'Spice Post Slider', 'honeypress' ),
            'slug'     => 'spice-post-slider',
            'required' => false,
        ),
    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );
    tgmpa( $plugins, $config );
}

//  honeypress plus customizer register function

if ( !function_exists( 'honeypress_plus_customize_register' ) ) {
    function honeypress_plus_customize_register( $wp_customize )
    {
        $sections_customizer_data = array(
            'slider',
            'services',
            'fun-acts',
            'portfolio',
            'testimonial',
            'news',
            'cta',
            'team',
            'client',
            'wooproduct'
        );
        $selective_refresh = ( isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh' );
        if ( !empty($sections_customizer_data) ) {
            foreach ( $sections_customizer_data as $section_customizer_data ) {
                require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/' . $section_customizer_data . '-section.php';
            }
        }
        //  customizer setting files including
        require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer_layout_manager.php';
        require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php';
    }
    
    add_action( 'customize_register', 'honeypress_plus_customize_register' );
}

require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/repeater-default-value.php';
//Alpha Color Control
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer-alpha-color-picker/class-honeypress-customize-alpha-color-control.php';
//Range Slider Control
require HONEYPRESS_PRO_TEMPLATE_DIR . '/inc/customizer/customizer-slider/customizer-slider.php';
//Customizer Page Editor
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer-page-editor/class/class-honeypress-page-editor.php';
//Customizer Subscriber tabs
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer-tabs/class/class-honeypress-customize-control-tabs.php';
//Subscriber Info
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/customizer/customizer-subscribe-info/class-honeypress-subscribe-info.php';
//Plugin Install
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/plugin-install/class-honeypress-plugin-install-helper.php';
// Adding hooks files
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/hooks/functions.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/hooks/honeypress-hooks-settings.php';
require HONEYPRESS_PRO_THEME_FUNCTIONS_PATH . '/hooks/honeypress-hooks.php';
// set default content width
if ( !isset( $content_width ) ) {
    $content_width = 696;
}
// Theme title
if ( !function_exists( 'honeypress_head_title' ) ) {
    function honeypress_head_title( $title, $sep )
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
            $title = "{$title} {$sep} " . sprintf( esc_html__( 'Page', 'honeypress' ), max( $paged, $page ) );
        }
        return $title;
    }

}
add_filter(
    'wp_title',
    'honeypress_head_title',
    10,
    2
);
if ( !function_exists( 'honeypress_theme_setup' ) ) {
    function honeypress_theme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'honeypress', HONEYPRESS_PRO_TEMPLATE_DIR . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        //Add selective refresh for sidebar widget
        add_theme_support( 'customize-selective-refresh-widgets' );
        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );
        // supports featured image
        add_theme_support( 'post-thumbnails' );
        // Post Formats
        add_theme_support( 'post-formats', array(
            'gallery',
            'link',
            'quote',
            'video',
            'audio'
        ) );
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'honeypress-primary' => esc_html__( 'Primary', 'honeypress' ),
            'footer_menu'        => esc_html__( 'Footer Menu', 'honeypress' ),
        ) );
        // woocommerce support
        add_theme_support( 'woocommerce' );
        //Custom background support
        add_theme_support( 'custom-background' );
        //Custom logo
        add_theme_support( 'custom-logo', array(
            'height'      => 45,
            'width'       => 280,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
    }

}
add_action( 'after_setup_theme', 'honeypress_theme_setup' );
function honeypress_logo_class( $html )
{
    $html = str_replace( 'custom-logo-link', 'navbar-brand custom-logo', $html );
    return $html;
}

add_filter( 'get_custom_logo', 'honeypress_logo_class' );
function honeypress_new_content_more( $more )
{
    global  $post ;
    return '<p><a href="' . esc_url( get_permalink() ) . "#more-{$post->ID}\" class=\"more-link btn-ex-small btn-border\">" . esc_html__( 'Read More', 'honeypress' ) . "</a></p>";
}

add_filter( 'the_content_more_link', 'honeypress_new_content_more' );
function honeypress_customizer_live_preview()
{
    wp_enqueue_script(
        'honeypress-customizer-preview',
        HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/js/customizer.js',
        array( 'jquery', 'customize-preview' ),
        999,
        true
    );
}

add_action( 'customize_preview_init', 'honeypress_customizer_live_preview' );
add_action( "customize_register", "honeypress_remove_defult_setting_customize_register" );
function honeypress_remove_defult_setting_customize_register( $wp_customize )
{
    $wp_customize->remove_control( "header_image" );
}

add_action( 'after_setup_theme', 'honeypress_theme_woocommerce_setup' );
function honeypress_theme_woocommerce_setup()
{
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

function honeypressp_home_page_sanitize_text( $input )
{
    return wp_kses_post( force_balance_tags( $input ) );
}

// custom background
function honeypress_custom_background_function()
{
    $page_bg_image_url = get_theme_mod( 'predefined_back_image', 'bg-img1.png' );
    if ( $page_bg_image_url != '' ) {
        echo  '<style>body.boxed{ background-image:url("' . HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/assets/images/bg-pattern/' . $page_bg_image_url . '");}</style>' ;
    }
}

add_action(
    'wp_head',
    'honeypress_custom_background_function',
    10,
    0
);
function alpha_remove_class( $wp_classes )
{
    unset( $wp_classes[array_search( "blog", $wp_classes )] );
    return $wp_classes;
}

add_filter( 'body_class', 'alpha_remove_class' );

if ( get_theme_mod( 'post_nav_style_setting', 'pagination' ) != "pagination" ) {
    /*
     * initial posts dispaly
     */
    function script_load_more( $args = array() )
    {
        //initial posts load
        global  $template ;
        $row = '';
        $row_template = array(
            "template-blog-grid-view-sidebar.php",
            "template-blog-grid-view.php",
            "template-blog-masonry-two-column.php",
            "template-blog-masonry-three-column.php",
            "template-blog-masonry-four-column.php"
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
        $paged = ( empty($_POST['page']) ? 0 : $_POST['page'] + 1 );
        // $paged = $_POST['page'] + 1;
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
                    echo  '<div class="col-lg-4 col-md-6 col-sm-12">' ;
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
                } elseif ( $page_template == 'template-blog-masonry-two-column.php' || basename( $template ) == 'template-blog-masonry-two-column.php' ) {
                    //include 'template-parts/ajax-masonary-content.php';
                    echo  '<div class="grid-item col-md-6">' ;
                    get_template_part( 'template-parts/masonry/content-format', get_post_format() );
                    echo  '</div>' ;
                } elseif ( $page_template == 'template-blog-masonry-three-column.php' || basename( $template ) == 'template-blog-masonry-three-column.php' ) {
                    //include 'template-parts/ajax-masonary-three-col-content.php';
                    echo  '<div class="grid-item col-md-4">' ;
                    get_template_part( 'template-parts/masonry/content-format', get_post_format() );
                    echo  '</div>' ;
                } elseif ( $page_template == 'template-blog-masonry-four-column.php' || basename( $template ) == 'template-blog-masonry-four-column.php' ) {
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
        if ( basename( $template ) == 'template-blog-full-width.php' || basename( $template ) == 'template-blog-grid-view-sidebar.php' || basename( $template ) == 'template-blog-grid-view.php' || basename( $template ) == 'template-blog-left-sidebar.php' || basename( $template ) == 'template-blog-list-view-sidebar.php' || basename( $template ) == 'template-blog-list-view.php' || basename( $template ) == 'template-blog-right-sidebar.php' || basename( $template ) == 'template-blog-masonry-two-column.php' || basename( $template ) == 'template-blog-masonry-three-column.php' || basename( $template ) == 'template-blog-masonry-four-column.php' || 'page' == get_option( 'show_on_front' ) && basename( $template ) == 'home.php' ) {
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

/* Typography Fonts */
if ( !function_exists( 'honeypress_typo_fonts' ) ) {
    function honeypress_typo_fonts()
    {
        return array(
            'ABeeZee'                  => 'ABeeZee',
            'Abel'                     => 'Abel',
            'Abril Fatface'            => 'Abril Fatface',
            'Aclonica'                 => 'Aclonica',
            'Acme'                     => 'Acme',
            'Actor'                    => 'Actor',
            'Adamina'                  => 'Adamina',
            'Advent Pro'               => 'Advent Pro',
            'Aguafina Script'          => 'Aguafina Script',
            'Akronim'                  => 'Akronim',
            'Aladin'                   => 'Aladin',
            'Aldrich'                  => 'Aldrich',
            'Alef'                     => 'Alef',
            'Alegreya'                 => 'Alegreya',
            'Alegreya SC'              => 'Alegreya SC',
            'Alegreya Sans'            => 'Alegreya Sans',
            'Alegreya Sans SC'         => 'Alegreya Sans SC',
            'Alex Brush'               => 'Alex Brush',
            'Alfa Slab One'            => 'Alfa Slab One',
            'Alice'                    => 'Alice',
            'Alike'                    => 'Alike',
            'Alike Angular'            => 'Alike Angular',
            'Allan'                    => 'Allan',
            'Allerta'                  => 'Allerta',
            'Allerta Stencil'          => 'Allerta Stencil',
            'Allura'                   => 'Allura',
            'Almendra'                 => 'Almendra',
            'Almendra Display'         => 'Almendra Display',
            'Almendra SC'              => 'Almendra SC',
            'Amarante'                 => 'Amarante',
            'Amaranth'                 => 'Amaranth',
            'Amatic SC'                => 'Amatic SC',
            'Amatica SC'               => 'Amatica SC',
            'Amethysta'                => 'Amethysta',
            'Amiko'                    => 'Amiko',
            'Amiri'                    => 'Amiri',
            'Amita'                    => 'Amita',
            'Anaheim'                  => 'Anaheim',
            'Andada'                   => 'Andada',
            'Andika'                   => 'Andika',
            'Angkor'                   => 'Angkor',
            'Annie Use Your Telescope' => 'Annie Use Your Telescope',
            'Anonymous Pro'            => 'Anonymous Pro',
            'Antic'                    => 'Antic',
            'Antic Didone'             => 'Antic Didone',
            'Antic Slab'               => 'Antic Slab',
            'Anton'                    => 'Anton',
            'Arapey'                   => 'Arapey',
            'Arbutus'                  => 'Arbutus',
            'Arbutus Slab'             => 'Arbutus Slab',
            'Architects Daughter'      => 'Architects Daughter',
            'Archivo Black'            => 'Archivo Black',
            'Archivo Narrow'           => 'Archivo Narrow',
            'Aref Ruqaa'               => 'Aref Ruqaa',
            'Arima Madurai'            => 'Arima Madurai',
            'Arimo'                    => 'Arimo',
            'Arizonia'                 => 'Arizonia',
            'Armata'                   => 'Armata',
            'Artifika'                 => 'Artifika',
            'Arvo'                     => 'Arvo',
            'Arya'                     => 'Arya',
            'Asap'                     => 'Asap',
            'Asar'                     => 'Asar',
            'Asset'                    => 'Asset',
            'Assistant'                => 'Assistant',
            'Astloch'                  => 'Astloch',
            'Asul'                     => 'Asul',
            'Athiti'                   => 'Athiti',
            'Atma'                     => 'Atma',
            'Atomic Age'               => 'Atomic Age',
            'Aubrey'                   => 'Aubrey',
            'Audiowide'                => 'Audiowide',
            'Autour One'               => 'Autour One',
            'Average'                  => 'Average',
            'Average Sans'             => 'Average Sans',
            'Averia Gruesa Libre'      => 'Averia Gruesa Libre',
            'Averia Libre'             => 'Averia Libre',
            'Averia Sans Libre'        => 'Averia Sans Libre',
            'Averia Serif Libre'       => 'Averia Serif Libre',
            'Bad Script'               => 'Bad Script',
            'Baloo'                    => 'Baloo',
            'Baloo Bhai'               => 'Baloo Bhai',
            'Baloo Da'                 => 'Baloo Da',
            'Baloo Thambi'             => 'Baloo Thambi',
            'Balthazar'                => 'Balthazar',
            'Bangers'                  => 'Bangers',
            'Basic'                    => 'Basic',
            'Battambang'               => 'Battambang',
            'Baumans'                  => 'Baumans',
            'Bayon'                    => 'Bayon',
            'Belgrano'                 => 'Belgrano',
            'Belleza'                  => 'Belleza',
            'BenchNine'                => 'BenchNine',
            'Bentham'                  => 'Bentham',
            'Berkshire Swash'          => 'Berkshire Swash',
            'Bevan'                    => 'Bevan',
            'Bigelow Rules'            => 'Bigelow Rules',
            'Bigshot One'              => 'Bigshot One',
            'Bilbo'                    => 'Bilbo',
            'Bilbo Swash Caps'         => 'Bilbo Swash Caps',
            'BioRhyme'                 => 'BioRhyme',
            'BioRhyme Expanded'        => 'BioRhyme Expanded',
            'Biryani'                  => 'Biryani',
            'Bitter'                   => 'Bitter',
            'Black Ops One'            => 'Black Ops One',
            'Bokor'                    => 'Bokor',
            'Bonbon'                   => 'Bonbon',
            'Boogaloo'                 => 'Boogaloo',
            'Bowlby One'               => 'Bowlby One',
            'Bowlby One SC'            => 'Bowlby One SC',
            'Brawler'                  => 'Brawler',
            'Bree Serif'               => 'Bree Serif',
            'Bubblegum Sans'           => 'Bubblegum Sans',
            'Bubbler One'              => 'Bubbler One',
            'Buda'                     => 'Buda',
            'Buenard'                  => 'Buenard',
            'Bungee'                   => 'Bungee',
            'Bungee Hairline'          => 'Bungee Hairline',
            'Bungee Inline'            => 'Bungee Inline',
            'Bungee Outline'           => 'Bungee Outline',
            'Bungee Shade'             => 'Bungee Shade',
            'Butcherman'               => 'Butcherman',
            'Butterfly Kids'           => 'Butterfly Kids',
            'Cabin'                    => 'Cabin',
            'Cabin Condensed'          => 'Cabin Condensed',
            'Cabin Sketch'             => 'Cabin Sketch',
            'Caesar Dressing'          => 'Caesar Dressing',
            'Cagliostro'               => 'Cagliostro',
            'Cairo'                    => 'Cairo',
            'Calligraffitti'           => 'Calligraffitti',
            'Cambay'                   => 'Cambay',
            'Cambo'                    => 'Cambo',
            'Candal'                   => 'Candal',
            'Cantarell'                => 'Cantarell',
            'Cantata One'              => 'Cantata One',
            'Cantora One'              => 'Cantora One',
            'Capriola'                 => 'Capriola',
            'Cardo'                    => 'Cardo',
            'Carme'                    => 'Carme',
            'Carrois Gothic'           => 'Carrois Gothic',
            'Carrois Gothic SC'        => 'Carrois Gothic SC',
            'Carter One'               => 'Carter One',
            'Catamaran'                => 'Catamaran',
            'Caudex'                   => 'Caudex',
            'Caveat'                   => 'Caveat',
            'Caveat Brush'             => 'Caveat Brush',
            'Cedarville Cursive'       => 'Cedarville Cursive',
            'Ceviche One'              => 'Ceviche One',
            'Changa'                   => 'Changa',
            'Changa One'               => 'Changa One',
            'Chango'                   => 'Chango',
            'Chathura'                 => 'Chathura',
            'Chau Philomene One'       => 'Chau Philomene One',
            'Chela One'                => 'Chela One',
            'Chelsea Market'           => 'Chelsea Market',
            'Chenla'                   => 'Chenla',
            'Cherry Cream Soda'        => 'Cherry Cream Soda',
            'Cherry Swash'             => 'Cherry Swash',
            'Chewy'                    => 'Chewy',
            'Chicle'                   => 'Chicle',
            'Chivo'                    => 'Chivo',
            'Chonburi'                 => 'Chonburi',
            'Cinzel'                   => 'Cinzel',
            'Cinzel Decorative'        => 'Cinzel Decorative',
            'Clicker Script'           => 'Clicker Script',
            'Coda'                     => 'Coda',
            'Coda Caption'             => 'Coda Caption',
            'Codystar'                 => 'Codystar',
            'Coiny'                    => 'Coiny',
            'Combo'                    => 'Combo',
            'Comfortaa'                => 'Comfortaa',
            'Coming Soon'              => 'Coming Soon',
            'Concert One'              => 'Concert One',
            'Condiment'                => 'Condiment',
            'Content'                  => 'Content',
            'Contrail One'             => 'Contrail One',
            'Convergence'              => 'Convergence',
            'Cookie'                   => 'Cookie',
            'Copse'                    => 'Copse',
            'Corben'                   => 'Corben',
            'Cormorant'                => 'Cormorant',
            'Cormorant Garamond'       => 'Cormorant Garamond',
            'Cormorant Infant'         => 'Cormorant Infant',
            'Cormorant SC'             => 'Cormorant SC',
            'Cormorant Unicase'        => 'Cormorant Unicase',
            'Cormorant Upright'        => 'Cormorant Upright',
            'Courgette'                => 'Courgette',
            'Cousine'                  => 'Cousine',
            'Coustard'                 => 'Coustard',
            'Covered By Your Grace'    => 'Covered By Your Grace',
            'Crafty Girls'             => 'Crafty Girls',
            'Creepster'                => 'Creepster',
            'Crete Round'              => 'Crete Round',
            'Crimson Text'             => 'Crimson Text',
            'Croissant One'            => 'Croissant One',
            'Crushed'                  => 'Crushed',
            'Cuprum'                   => 'Cuprum',
            'Cutive'                   => 'Cutive',
            'Cutive Mono'              => 'Cutive Mono',
            'Damion'                   => 'Damion',
            'Dancing Script'           => 'Dancing Script',
            'Dangrek'                  => 'Dangrek',
            'David Libre'              => 'David Libre',
            'Dawning of a New Day'     => 'Dawning of a New Day',
            'Days One'                 => 'Days One',
            'Dekko'                    => 'Dekko',
            'Delius'                   => 'Delius',
            'Delius Swash Caps'        => 'Delius Swash Caps',
            'Delius Unicase'           => 'Delius Unicase',
            'Della Respira'            => 'Della Respira',
            'Denk One'                 => 'Denk One',
            'Devonshire'               => 'Devonshire',
            'Dhurjati'                 => 'Dhurjati',
            'Didact Gothic'            => 'Didact Gothic',
            'Diplomata'                => 'Diplomata',
            'Diplomata SC'             => 'Diplomata SC',
            'Domine'                   => 'Domine',
            'Donegal One'              => 'Donegal One',
            'Doppio One'               => 'Doppio One',
            'Dorsa'                    => 'Dorsa',
            'Dosis'                    => 'Dosis',
            'Dr Sugiyama'              => 'Dr Sugiyama',
            'Droid Sans'               => 'Droid Sans',
            'Droid Sans Mono'          => 'Droid Sans Mono',
            'Droid Serif'              => 'Droid Serif',
            'Duru Sans'                => 'Duru Sans',
            'Dynalight'                => 'Dynalight',
            'EB Garamond'              => 'EB Garamond',
            'Eagle Lake'               => 'Eagle Lake',
            'Eater'                    => 'Eater',
            'Economica'                => 'Economica',
            'Eczar'                    => 'Eczar',
            'Ek Mukta'                 => 'Ek Mukta',
            'El Messiri'               => 'El Messiri',
            'Electrolize'              => 'Electrolize',
            'Elsie'                    => 'Elsie',
            'Elsie Swash Caps'         => 'Elsie Swash Caps',
            'Emblema One'              => 'Emblema One',
            'Emilys Candy'             => 'Emilys Candy',
            'Engagement'               => 'Engagement',
            'Englebert'                => 'Englebert',
            'Enriqueta'                => 'Enriqueta',
            'Erica One'                => 'Erica One',
            'Esteban'                  => 'Esteban',
            'Euphoria Script'          => 'Euphoria Script',
            'Ewert'                    => 'Ewert',
            'Exo'                      => 'Exo',
            'Exo 2'                    => 'Exo 2',
            'Expletus Sans'            => 'Expletus Sans',
            'Fanwood Text'             => 'Fanwood Text',
            'Farsan'                   => 'Farsan',
            'Fascinate'                => 'Fascinate',
            'Fascinate Inline'         => 'Fascinate Inline',
            'Faster One'               => 'Faster One',
            'Fasthand'                 => 'Fasthand',
            'Fauna One'                => 'Fauna One',
            'Federant'                 => 'Federant',
            'Federo'                   => 'Federo',
            'Felipa'                   => 'Felipa',
            'Fenix'                    => 'Fenix',
            'Finger Paint'             => 'Finger Paint',
            'Fira Mono'                => 'Fira Mono',
            'Fira Sans'                => 'Fira Sans',
            'Fjalla One'               => 'Fjalla One',
            'Fjord One'                => 'Fjord One',
            'Flamenco'                 => 'Flamenco',
            'Flavors'                  => 'Flavors',
            'Fondamento'               => 'Fondamento',
            'Fontdiner Swanky'         => 'Fontdiner Swanky',
            'Forum'                    => 'Forum',
            'Francois One'             => 'Francois One',
            'Frank Ruhl Libre'         => 'Frank Ruhl Libre',
            'Freckle Face'             => 'Freckle Face',
            'Fredericka the Great'     => 'Fredericka the Great',
            'Fredoka One'              => 'Fredoka One',
            'Freehand'                 => 'Freehand',
            'Fresca'                   => 'Fresca',
            'Frijole'                  => 'Frijole',
            'Fruktur'                  => 'Fruktur',
            'Fugaz One'                => 'Fugaz One',
            'GFS Didot'                => 'GFS Didot',
            'GFS Neohellenic'          => 'GFS Neohellenic',
            'Gabriela'                 => 'Gabriela',
            'Gafata'                   => 'Gafata',
            'Galada'                   => 'Galada',
            'Galdeano'                 => 'Galdeano',
            'Galindo'                  => 'Galindo',
            'Gentium Basic'            => 'Gentium Basic',
            'Gentium Book Basic'       => 'Gentium Book Basic',
            'Geo'                      => 'Geo',
            'Geostar'                  => 'Geostar',
            'Geostar Fill'             => 'Geostar Fill',
            'Germania One'             => 'Germania One',
            'Gidugu'                   => 'Gidugu',
            'Gilda Display'            => 'Gilda Display',
            'Give You Glory'           => 'Give You Glory',
            'Glass Antiqua'            => 'Glass Antiqua',
            'Glegoo'                   => 'Glegoo',
            'Gloria Hallelujah'        => 'Gloria Hallelujah',
            'Goblin One'               => 'Goblin One',
            'Gochi Hand'               => 'Gochi Hand',
            'Gorditas'                 => 'Gorditas',
            'Goudy Bookletter 1911'    => 'Goudy Bookletter 1911',
            'Graduate'                 => 'Graduate',
            'Grand Hotel'              => 'Grand Hotel',
            'Gravitas One'             => 'Gravitas One',
            'Great Vibes'              => 'Great Vibes',
            'Griffy'                   => 'Griffy',
            'Gruppo'                   => 'Gruppo',
            'Gudea'                    => 'Gudea',
            'Gurajada'                 => 'Gurajada',
            'Habibi'                   => 'Habibi',
            'Halant'                   => 'Halant',
            'Hammersmith One'          => 'Hammersmith One',
            'Hanalei'                  => 'Hanalei',
            'Hanalei Fill'             => 'Hanalei Fill',
            'Handlee'                  => 'Handlee',
            'Hanuman'                  => 'Hanuman',
            'Happy Monkey'             => 'Happy Monkey',
            'Harmattan'                => 'Harmattan',
            'Headland One'             => 'Headland One',
            'Heebo'                    => 'Heebo',
            'Henny Penny'              => 'Henny Penny',
            'Herr Von Muellerhoff'     => 'Herr Von Muellerhoff',
            'Hind'                     => 'Hind',
            'Hind Guntur'              => 'Hind Guntur',
            'Hind Madurai'             => 'Hind Madurai',
            'Hind Siliguri'            => 'Hind Siliguri',
            'Hind Vadodara'            => 'Hind Vadodara',
            'Holtwood One SC'          => 'Holtwood One SC',
            'Homemade Apple'           => 'Homemade Apple',
            'Homenaje'                 => 'Homenaje',
            'IM Fell DW Pica'          => 'IM Fell DW Pica',
            'IM Fell DW Pica SC'       => 'IM Fell DW Pica SC',
            'IM Fell Double Pica'      => 'IM Fell Double Pica',
            'IM Fell Double Pica SC'   => 'IM Fell Double Pica SC',
            'IM Fell English'          => 'IM Fell English',
            'IM Fell English SC'       => 'IM Fell English SC',
            'IM Fell French Canon'     => 'IM Fell French Canon',
            'IM Fell French Canon SC'  => 'IM Fell French Canon SC',
            'IM Fell Great Primer'     => 'IM Fell Great Primer',
            'IM Fell Great Primer SC'  => 'IM Fell Great Primer SC',
            'Iceberg'                  => 'Iceberg',
            'Iceland'                  => 'Iceland',
            'Imprima'                  => 'Imprima',
            'Inconsolata'              => 'Inconsolata',
            'Inder'                    => 'Inder',
            'Indie Flower'             => 'Indie Flower',
            'Inika'                    => 'Inika',
            'Inknut Antiqua'           => 'Inknut Antiqua',
            'Irish Grover'             => 'Irish Grover',
            'Istok Web'                => 'Istok Web',
            'Italiana'                 => 'Italiana',
            'Italianno'                => 'Italianno',
            'Itim'                     => 'Itim',
            'Jacques Francois'         => 'Jacques Francois',
            'Jacques Francois Shadow'  => 'Jacques Francois Shadow',
            'Jaldi'                    => 'Jaldi',
            'Jim Nightshade'           => 'Jim Nightshade',
            'Jockey One'               => 'Jockey One',
            'Jolly Lodger'             => 'Jolly Lodger',
            'Jomhuria'                 => 'Jomhuria',
            'Josefin Sans'             => 'Josefin Sans',
            'Josefin Slab'             => 'Josefin Slab',
            'Joti One'                 => 'Joti One',
            'Judson'                   => 'Judson',
            'Julee'                    => 'Julee',
            'Julius Sans One'          => 'Julius Sans One',
            'Junge'                    => 'Junge',
            'Jura'                     => 'Jura',
            'Just Another Hand'        => 'Just Another Hand',
            'Just Me Again Down Here'  => 'Just Me Again Down Here',
            'Kadwa'                    => 'Kadwa',
            'Kalam'                    => 'Kalam',
            'Kameron'                  => 'Kameron',
            'Kanit'                    => 'Kanit',
            'Kantumruy'                => 'Kantumruy',
            'Karla'                    => 'Karla',
            'Karma'                    => 'Karma',
            'Katibeh'                  => 'Katibeh',
            'Kaushan Script'           => 'Kaushan Script',
            'Kavivanar'                => 'Kavivanar',
            'Kavoon'                   => 'Kavoon',
            'Kdam Thmor'               => 'Kdam Thmor',
            'Keania One'               => 'Keania One',
            'Kelly Slab'               => 'Kelly Slab',
            'Kenia'                    => 'Kenia',
            'Khand'                    => 'Khand',
            'Khmer'                    => 'Khmer',
            'Khula'                    => 'Khula',
            'Kite One'                 => 'Kite One',
            'Knewave'                  => 'Knewave',
            'Kotta One'                => 'Kotta One',
            'Koulen'                   => 'Koulen',
            'Kranky'                   => 'Kranky',
            'Kreon'                    => 'Kreon',
            'Kristi'                   => 'Kristi',
            'Krona One'                => 'Krona One',
            'Kumar One'                => 'Kumar One',
            'Kumar One Outline'        => 'Kumar One Outline',
            'Kurale'                   => 'Kurale',
            'La Belle Aurore'          => 'La Belle Aurore',
            'Laila'                    => 'Laila',
            'Lakki Reddy'              => 'Lakki Reddy',
            'Lalezar'                  => 'Lalezar',
            'Lancelot'                 => 'Lancelot',
            'Lateef'                   => 'Lateef',
            'Lato'                     => 'Lato',
            'League Script'            => 'League Script',
            'Leckerli One'             => 'Leckerli One',
            'Ledger'                   => 'Ledger',
            'Lekton'                   => 'Lekton',
            'Lemon'                    => 'Lemon',
            'Lemonada'                 => 'Lemonada',
            'Libre Baskerville'        => 'Libre Baskerville',
            'Libre Franklin'           => 'Libre Franklin',
            'Life Savers'              => 'Life Savers',
            'Lilita One'               => 'Lilita One',
            'Lily Script One'          => 'Lily Script One',
            'Limelight'                => 'Limelight',
            'Linden Hill'              => 'Linden Hill',
            'Lobster'                  => 'Lobster',
            'Lobster Two'              => 'Lobster Two',
            'Londrina Outline'         => 'Londrina Outline',
            'Londrina Shadow'          => 'Londrina Shadow',
            'Londrina Sketch'          => 'Londrina Sketch',
            'Londrina Solid'           => 'Londrina Solid',
            'Lora'                     => 'Lora',
            'Love Ya Like A Sister'    => 'Love Ya Like A Sister',
            'Loved by the King'        => 'Loved by the King',
            'Lovers Quarrel'           => 'Lovers Quarrel',
            'Luckiest Guy'             => 'Luckiest Guy',
            'Lusitana'                 => 'Lusitana',
            'Lustria'                  => 'Lustria',
            'Macondo'                  => 'Macondo',
            'Macondo Swash Caps'       => 'Macondo Swash Caps',
            'Mada'                     => 'Mada',
            'Magra'                    => 'Magra',
            'Maiden Orange'            => 'Maiden Orange',
            'Maitree'                  => 'Maitree',
            'Mako'                     => 'Mako',
            'Mallanna'                 => 'Mallanna',
            'Mandali'                  => 'Mandali',
            'Marcellus'                => 'Marcellus',
            'Marcellus SC'             => 'Marcellus SC',
            'Marck Script'             => 'Marck Script',
            'Margarine'                => 'Margarine',
            'Marko One'                => 'Marko One',
            'Marmelad'                 => 'Marmelad',
            'Martel'                   => 'Martel',
            'Martel Sans'              => 'Martel Sans',
            'Marvel'                   => 'Marvel',
            'Mate'                     => 'Mate',
            'Mate SC'                  => 'Mate SC',
            'Maven Pro'                => 'Maven Pro',
            'McLaren'                  => 'McLaren',
            'Meddon'                   => 'Meddon',
            'MedievalSharp'            => 'MedievalSharp',
            'Medula One'               => 'Medula One',
            'Meera Inimai'             => 'Meera Inimai',
            'Megrim'                   => 'Megrim',
            'Meie Script'              => 'Meie Script',
            'Merienda'                 => 'Merienda',
            'Merienda One'             => 'Merienda One',
            'Merriweather'             => 'Merriweather',
            'Merriweather Sans'        => 'Merriweather Sans',
            'Metal'                    => 'Metal',
            'Metal Mania'              => 'Metal Mania',
            'Metamorphous',
            'Metrophobic'              => 'Metrophobic',
            'Michroma'                 => 'Michroma',
            'Milonga'                  => 'Milonga',
            'Miltonian'                => 'Miltonian',
            'Miltonian Tattoo'         => 'Miltonian Tattoo',
            'Miniver'                  => 'Miniver',
            'Miriam Libre'             => 'Miriam Libre',
            'Mirza'                    => 'Mirza',
            'Miss Fajardose'           => 'Miss Fajardose',
            'Mitr'                     => 'Mitr',
            'Modak'                    => 'Modak',
            'Modern Antiqua'           => 'Modern Antiqua',
            'Mogra'                    => 'Mogra',
            'Molengo'                  => 'Molengo',
            'Molle'                    => 'Molle',
            'Monda'                    => 'Monda',
            'Monofett'                 => 'Monofett',
            'Monoton'                  => 'Monoton',
            'Monsieur La Doulaise'     => 'Monsieur La Doulaise',
            'Montaga'                  => 'Montaga',
            'Montez'                   => 'Montez',
            'Montserrat'               => 'Montserrat',
            'Montserrat Alternates'    => 'Montserrat Alternates',
            'Montserrat Subrayada'     => 'Montserrat Subrayada',
            'Moul'                     => 'Moul',
            'Moulpali'                 => 'Moulpali',
            'Mountains of Christmas'   => 'Mountains of Christmas',
            'Mouse Memoirs'            => 'Mouse Memoirs',
            'Mr Bedfort'               => 'Mr Bedfort',
            'Mr Dafoe'                 => 'Mr Dafoe',
            'Mr De Haviland'           => 'Mr De Haviland',
            'Mrs Saint Delafield'      => 'Mrs Saint Delafield',
            'Mrs Sheppards'            => 'Mrs Sheppards',
            'Mukta Vaani'              => 'Mukta Vaani',
            'Muli'                     => 'Muli',
            'Mystery Quest'            => 'Mystery Quest',
            'NTR'                      => 'NTR',
            'Neucha'                   => 'Neucha',
            'Neuton'                   => 'Neuton',
            'New Rocker'               => 'New Rocker',
            'News Cycle'               => 'News Cycle',
            'Niconne'                  => 'Niconne',
            'Nixie One'                => 'Nixie One',
            'Nobile'                   => 'Nobile',
            'Nokora'                   => 'Nokora',
            'Norican'                  => 'Norican',
            'Nosifer'                  => 'Nosifer',
            'Nothing You Could Do'     => 'Nothing You Could Do',
            'Noticia Text'             => 'Noticia Text',
            'Noto Sans'                => 'Noto Sans',
            'Noto Serif'               => 'Noto Serif',
            'Nova Cut'                 => 'Nova Cut',
            'Nova Flat'                => 'Nova Flat',
            'Nova Mono'                => 'Nova Mono',
            'Nova Oval'                => 'Nova Oval',
            'Nova Round'               => 'Nova Round',
            'Nova Script'              => 'Nova Script',
            'Nova Slim'                => 'Nova Slim',
            'Nova Square'              => 'Nova Square',
            'Numans'                   => 'Numans',
            'Nunito'                   => 'Nunito',
            'Odor Mean Chey'           => 'Odor Mean Chey',
            'Offside'                  => 'Offside',
            'Old Standard TT'          => 'Old Standard TT',
            'Oldenburg'                => 'Oldenburg',
            'Oleo Script'              => 'Oleo Script',
            'Oleo Script Swash Caps'   => 'Oleo Script Swash Caps',
            'Open Sans'                => 'Open Sans',
            'Open Sans Condensed'      => 'Open Sans Condensed',
            'Oranienbaum'              => 'Oranienbaum',
            'Orbitron'                 => 'Orbitron',
            'Oregano'                  => 'Oregano',
            'Orienta'                  => 'Orienta',
            'Original Surfer'          => 'Original Surfer',
            'Oswald'                   => 'Oswald',
            'Over the Rainbow'         => 'Over the Rainbow',
            'Overlock'                 => 'Overlock',
            'Overlock SC'              => 'Overlock SC',
            'Ovo'                      => 'Ovo',
            'Oxygen'                   => 'Oxygen',
            'Oxygen Mono'              => 'Oxygen Mono',
            'PT Mono'                  => 'PT Mono',
            'PT Sans'                  => 'PT Sans',
            'PT Sans Caption'          => 'PT Sans Caption',
            'PT Sans Narrow'           => 'PT Sans Narrow',
            'PT Serif'                 => 'PT Serif',
            'PT Serif Caption'         => 'PT Serif Caption',
            'Pacifico'                 => 'Pacifico',
            'Palanquin'                => 'Palanquin',
            'Palanquin Dark'           => 'Palanquin Dark',
            'Paprika'                  => 'Paprika',
            'Parisienne'               => 'Parisienne',
            'Passero One'              => 'Passero One',
            'Passion One'              => 'Passion One',
            'Pathway Gothic One'       => 'Pathway Gothic One',
            'Patrick Hand'             => 'Patrick Hand',
            'Patrick Hand SC'          => 'Patrick Hand SC',
            'Pattaya'                  => 'Pattaya',
            'Patua One'                => 'Patua One',
            'Pavanam'                  => 'Pavanam',
            'Paytone One'              => 'Paytone One',
            'Peddana'                  => 'Peddana',
            'Peralta'                  => 'Peralta',
            'Permanent Marker'         => 'Permanent Marker',
            'Petit Formal Script'      => 'Petit Formal Script',
            'Petrona'                  => 'Petrona',
            'Philosopher'              => 'Philosopher',
            'Piedra'                   => 'Piedra',
            'Pinyon Script'            => 'Pinyon Script',
            'Pirata One'               => 'Pirata One',
            'Plaster'                  => 'Plaster',
            'Play'                     => 'Play',
            'Playball'                 => 'Playball',
            'Playfair Display'         => 'Playfair Display',
            'Playfair Display SC'      => 'Playfair Display SC',
            'Podkova'                  => 'Podkova',
            'Poiret One'               => 'Poiret One',
            'Poller One'               => 'Poller One',
            'Poly'                     => 'Poly',
            'Pompiere'                 => 'Pompiere',
            'Pontano Sans'             => 'Pontano Sans',
            'Poppins'                  => 'Poppins',
            'Port Lligat Sans'         => 'Port Lligat Sans',
            'Port Lligat Slab'         => 'Port Lligat Slab',
            'Pragati Narrow'           => 'Pragati Narrow',
            'Prata'                    => 'Prata',
            'Preahvihear'              => 'Preahvihear',
            'Press Start 2P'           => 'Press Start 2P',
            'Pridi'                    => 'Pridi',
            'Princess Sofia'           => 'Princess Sofia',
            'Prociono'                 => 'Prociono',
            'Prompt'                   => 'Prompt',
            'Prosto One'               => 'Prosto One',
            'Proza Libre'              => 'Proza Libre',
            'Puritan'                  => 'Puritan',
            'Purple Purse'             => 'Purple Purse',
            'Quando'                   => 'Quando',
            'Quantico'                 => 'Quantico',
            'Quattrocento'             => 'Quattrocento',
            'Quattrocento Sans'        => 'Quattrocento Sans',
            'Questrial'                => 'Questrial',
            'Quicksand'                => 'Quicksand',
            'Quintessential'           => 'Quintessential',
            'Qwigley'                  => 'Qwigley',
            'Racing Sans One'          => 'Racing Sans One',
            'Radley'                   => 'Radley',
            'Rajdhani'                 => 'Rajdhani',
            'Rakkas'                   => 'Rakkas',
            'Raleway'                  => 'Raleway',
            'Raleway Dots'             => 'Raleway Dots',
            'Ramabhadra'               => 'Ramabhadra',
            'Ramaraja'                 => 'Ramaraja',
            'Rambla'                   => 'Rambla',
            'Rammetto One'             => 'Rammetto One',
            'Ranchers'                 => 'Ranchers',
            'Rancho'                   => 'Rancho',
            'Ranga'                    => 'Ranga',
            'Rasa'                     => 'Rasa',
            'Rationale'                => 'Rationale',
            'Redressed'                => 'Redressed',
            'Reem Kufi'                => 'Reem Kufi',
            'Reenie Beanie'            => 'Reenie Beanie',
            'Revalia'                  => 'Revalia',
            'Rhodium Libre'            => 'Rhodium Libre',
            'Ribeye'                   => 'Ribeye',
            'Ribeye Marrow'            => 'Ribeye Marrow',
            'Righteous'                => 'Righteous',
            'Risque'                   => 'Risque',
            'Roboto'                   => 'Roboto',
            'Roboto Condensed'         => 'Roboto Condensed',
            'Roboto Mono'              => 'Roboto Mono',
            'Roboto Slab'              => 'Roboto Slab',
            'Rochester'                => 'Rochester',
            'Rock Salt'                => 'Rock Salt',
            'Rokkitt'                  => 'Rokkitt',
            'Romanesco'                => 'Romanesco',
            'Ropa Sans'                => 'Ropa Sans',
            'Rosario'                  => 'Rosario',
            'Rosarivo'                 => 'Rosarivo',
            'Rouge Script'             => 'Rouge Script',
            'Rozha One'                => 'Rozha One',
            'Rubik'                    => 'Rubik',
            'Rubik Mono One'           => 'Rubik Mono One',
            'Rubik One'                => 'Rubik One',
            'Ruda'                     => 'Ruda',
            'Rufina'                   => 'Rufina',
            'Ruge Boogie'              => 'Ruge Boogie',
            'Ruluko'                   => 'Ruluko',
            'Rum Raisin'               => 'Rum Raisin',
            'Ruslan Display'           => 'Ruslan Display',
            'Russo One => Russo One',
            'Ruthie'                   => 'Ruthie',
            'Rye'                      => 'Rye',
            'Sacramento'               => 'Sacramento',
            'Sahitya'                  => 'Sahitya',
            'Sail'                     => 'Sail',
            'Salsa'                    => 'Salsa',
            'Sanchez'                  => 'Sanchez',
            'Sancreek'                 => 'Sancreek',
            'Sansita One'              => 'Sansita One',
            'Sarala'                   => 'Sarala',
            'Sarina'                   => 'Sarina',
            'Sarpanch'                 => 'Sarpanch',
            'Satisfy'                  => 'Satisfy',
            'Scada'                    => 'Scada',
            'Scheherazade'             => 'Scheherazade',
            'Schoolbell'               => 'Schoolbell',
            'Scope One'                => 'Scope One',
            'Seaweed Script'           => 'Seaweed Script',
            'Secular One'              => 'Secular One',
            'Sevillana'                => 'Sevillana',
            'Seymour One'              => 'Seymour One',
            'Shadows Into Light'       => 'Shadows Into Light',
            'Shadows Into Light Two'   => 'Shadows Into Light Two',
            'Shanti'                   => 'Shanti',
            'Share'                    => 'Share',
            'Share Tech'               => 'Share Tech',
            'Share Tech Mono'          => 'Share Tech Mono',
            'Shojumaru'                => 'Shojumaru',
            'Short Stack'              => 'Short Stack',
            'Shrikhand'                => 'Shrikhand',
            'Siemreap'                 => 'Siemreap',
            'Sigmar One'               => 'Sigmar One',
            'Signika'                  => 'Signika',
            'Signika Negative'         => 'Signika Negative',
            'Simonetta'                => 'Simonetta',
            'Sintony'                  => 'Sintony',
            'Sirin Stencil'            => 'Sirin Stencil',
            'Six Caps'                 => 'Six Caps',
            'Skranji'                  => 'Skranji',
            'Slabo 13px'               => 'Slabo 13px',
            'Slabo 27px'               => 'Slabo 27px',
            'Slackey'                  => 'Slackey',
            'Smokum'                   => 'Smokum',
            'Smythe'                   => 'Smythe',
            'Sniglet'                  => 'Sniglet',
            'Snippet'                  => 'Snippet',
            'Snowburst One'            => 'Snowburst One',
            'Sofadi One'               => 'Sofadi One',
            'Sofia'                    => 'Sofia',
            'Sonsie One'               => 'Sonsie One',
            'Sorts Mill Goudy'         => 'Sorts Mill Goudy',
            'Source Code Pro'          => 'Source Code Pro',
            'Source Sans Pro'          => 'Source Sans Pro',
            'Source Serif Pro'         => 'Source Serif Pro',
            'Space Mono'               => 'Space Mono',
            'Special Elite'            => 'Special Elite',
            'Spicy Rice'               => 'Spicy Rice',
            'Spinnaker'                => 'Spinnaker',
            'Spirax'                   => 'Spirax',
            'Squada One'               => 'Squada One',
            'Sree Krushnadevaraya'     => 'Sree Krushnadevaraya',
            'Sriracha'                 => 'Sriracha',
            'Stalemate'                => 'Stalemate',
            'Stalinist One'            => 'Stalinist One',
            'Stardos Stencil'          => 'Stardos Stencil',
            'Stint Ultra Condensed'    => 'Stint Ultra Condensed',
            'Stint Ultra Expanded'     => 'Stint Ultra Expanded',
            'Stoke'                    => 'Stoke',
            'Strait'                   => 'Strait',
            'Sue Ellen Francisco'      => 'Sue Ellen Francisco',
            'Suez One'                 => 'Suez One',
            'Sumana'                   => 'Sumana',
            'Sunshiney'                => 'Sunshiney',
            'Supermercado One'         => 'Supermercado One',
            'Sura'                     => 'Sura',
            'Suranna'                  => 'Suranna',
            'Suravaram'                => 'Suravaram',
            'Suwannaphum'              => 'Suwannaphum',
            'Swanky and Moo Moo'       => 'Swanky and Moo Moo',
            'Syncopate'                => 'Syncopate',
            'Tangerine'                => 'Tangerine',
            'Taprom'                   => 'Taprom',
            'Tauri'                    => 'Tauri',
            'Taviraj'                  => 'Taviraj',
            'Teko'                     => 'Teko',
            'Telex'                    => 'Telex',
            'Tenali Ramakrishna'       => 'Tenali Ramakrishna',
            'Tenor Sans'               => 'Tenor Sans',
            'Text Me One'              => 'Text Me One',
            'The Girl Next Door'       => 'The Girl Next Door',
            'Tienne'                   => 'Tienne',
            'Tillana'                  => 'Tillana',
            'Timmana'                  => 'Timmana',
            'Tinos'                    => 'Tinos',
            'Titan One'                => 'Titan One',
            'Titillium Web'            => 'Titillium Web',
            'Trade Winds'              => 'Trade Winds',
            'Trirong'                  => 'Trirong',
            'Trocchi'                  => 'Trocchi',
            'Trochut'                  => 'Trochut',
            'Trykker'                  => 'Trykker',
            'Tulpen One'               => 'Tulpen One',
            'Ubuntu'                   => 'Ubuntu',
            'Ubuntu Condensed'         => 'Ubuntu Condensed',
            'Ubuntu Mono'              => 'Ubuntu Mono',
            'Ultra'                    => 'Ultra',
            'Uncial Antiqua'           => 'Uncial Antiqua',
            'Underdog'                 => 'Underdog',
            'Unica One'                => 'Unica One',
            'UnifrakturCook'           => 'UnifrakturCook',
            'UnifrakturMaguntia'       => 'UnifrakturMaguntia',
            'Unkempt'                  => 'Unkempt',
            'Unlock'                   => 'Unlock',
            'Unna'                     => 'Unna',
            'VT323'                    => 'VT323',
            'Vampiro One'              => 'Vampiro One',
            'Varela'                   => 'Varela',
            'Varela Round'             => 'Varela Round',
            'Vast Shadow'              => 'Vast Shadow',
            'Vesper Libre'             => 'Vesper Libre',
            'Vibur'                    => 'Vibur',
            'Vidaloka'                 => 'Vidaloka',
            'Viga'                     => 'Viga',
            'Voces'                    => 'Voces',
            'Volkhov'                  => 'Volkhov',
            'Vollkorn'                 => 'Vollkorn',
            'Voltaire'                 => 'Voltaire',
            'Waiting for the Sunrise'  => 'Waiting for the Sunrise',
            'Wallpoet'                 => 'Wallpoet',
            'Walter Turncoat'          => 'Walter Turncoat',
            'Warnes'                   => 'Warnes',
            'Wellfleet'                => 'Wellfleet',
            'Wendy One'                => 'Wendy One',
            'Wire One'                 => 'Wire One',
            'Work Sans'                => 'Work Sans',
            'Yanone Kaffeesatz'        => 'Yanone Kaffeesatz',
            'Yantramanav'              => 'Yantramanav',
            'Yatra One'                => 'Yatra One',
            'Yellowtail'               => 'Yellowtail',
            'Yeseva One'               => 'Yeseva One',
            'Yesteryear'               => 'Yesteryear',
            'Yrsa'                     => 'Yrsa',
            'Zeyada'                   => 'Zeyada',
        );
    }

}
//About Theme
$theme = wp_get_theme();
// gets the current theme
if ( 'Honeypress Pro' == $theme->name || 'Honeypress Pro Child' == $theme->name ) {
    if ( is_admin() ) {
        require HONEYPRESS_PRO_TEMPLATE_DIR . '/admin/admin-init.php';
    }
}
function honeypress_slide_sidebars()
{
    ?>
    <div style="display: none">
        <?php 
    if ( is_customize_preview() ) {
        dynamic_sidebar( 'slider-widget-area' );
    }
    ?>
    </div>
    <?php 
}

add_action( 'honeypress_slider_sidebar', 'honeypress_slide_sidebars' );