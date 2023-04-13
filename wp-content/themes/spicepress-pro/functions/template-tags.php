<?php
if (!function_exists('spicepress_blog_meta_content')) :

    function spicepress_blog_meta_content() {
        if (get_theme_mod('spicepress_enable_blog_date', true) || get_theme_mod('spicepress_enable_blog_author', true) || get_theme_mod('spicepress_enable_blog_category', true)):
            ?>
            <div class="entry-meta">
                <?php if (get_theme_mod('spicepress_enable_blog_date', true) == true): ?>
                    <span class="entry-date">
                        <a href="<?php echo get_month_link(get_post_time('Y'), get_post_time('m')); ?>"><time datetime=""><?php echo get_the_date(); ?></time></a>
                    </span>
                </div>
                <?php
            endif;
        endif;
    }

endif;
if (!function_exists('spicepress_blog_category_content')) :

    function spicepress_blog_category_content() {
        if (get_theme_mod('spicepress_enable_blog_author', true) || get_theme_mod('spicepress_enable_blog_category', true)):
            ?>
            <div class="entry-meta">
                <?php if (get_theme_mod('spicepress_enable_blog_author', true) == true): ?>
                    <span class="author"><?php _e('By', 'spicepress'); ?> <a rel="tag" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                    </span>
                    <?php
                endif;
                if (get_theme_mod('spicepress_enable_blog_category', true) == true):
                    $cat_list = get_the_category_list();
                    if (!empty($cat_list)) {
                        ?>
                        <span class="cat-links">
                            <?php
                            $blog_cat = spicepress_blog_meta();
                            _e($blog_cat, 'spicepress');
                            ?>
                            <a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a>
                        </span>
                        <?php
                    } endif;
                if (get_theme_mod('spicepress_enable_blog_post_tag', true) == true):
                    $tag_list = get_the_tag_list();
                    if (!empty($tag_list)) {
                        ?>
                        <span class="tag-links"><?php _e('Tag', 'spicepress'); ?> <?php the_tags('', ', ', ''); ?></span>
                    <?php }
                endif;
                ?>
            </div>
            <?php
        endif;
    }

endif;

// avator class
function spicepress_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive img-circle", $class);
    return $class;
}

add_filter('get_avatar', 'spicepress_gravatar_class');

// spicepress author meta
function spicepress_author_meta() {
    ?>
    <article class="blog-author wow fadeInDown animated" data-wow-delay="0.4s">
        <div class="media">
            <div class="pull-left">
    <?php echo get_avatar(get_the_author_meta('ID'), 200); ?>
            </div>
            <div class="media-body">
                <h6><?php the_author_link(); ?></h6>
                <p><?php the_author_meta('description'); ?></p>
                <ul class="blog-author-social">
                    <?php
                    $facebook_profile = get_the_author_meta('facebook_profile');
                    if ($facebook_profile && $facebook_profile != ''):
                        ?>
                        <li class="facebook"><a href="<?php echo esc_url($facebook_profile); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php
                    $linkedin_profile = get_the_author_meta('linkedin_profile');
                    if ($linkedin_profile && $linkedin_profile != ''):
                        ?>
                        <li class="linkedin"><a href="<?php echo esc_url($linkedin_profile); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php endif; ?>
                    <?php
                    $twitter_profile = get_the_author_meta('twitter_profile');
                    if ($twitter_profile && $twitter_profile != ''):
                        ?>
                        <li class="twitter"><a href="<?php echo esc_url($twitter_profile); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </article>
    <?php
}

// author profile data
function spicepress_author_social_icons($contactmethods) {
    $contactmethods['facebook_profile'] = 'Facebook Profile URL';
    $contactmethods['twitter_profile'] = 'Twitter Profile URL';
    $contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
    return $contactmethods;
}

add_filter('user_contactmethods', 'spicepress_author_social_icons', 10, 1);

// blogs,pages and archive page title
function spicepress_archive_page_title() {
    if (is_archive()) {
        $archive_text = get_theme_mod('archive_prefix', __('Archives', 'spicepress'));

        echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>';

        if (is_day()) :

            printf(__('%1$s %2$s', 'spicepress'), $archive_text, get_the_date());

        elseif (is_month()) :

            printf(__('%1$s %2$s', 'spicepress'), $archive_text, get_the_date('F Y'));

        elseif (is_year()) :

            printf(__('%1$s %2$s', 'spicepress'), $archive_text, get_the_date('Y'));

        elseif (is_category()):

            $category_text = get_theme_mod('category_prefix', __('Category', 'spicepress'));

            printf(__('%1$s %2$s', 'spicepress'), $category_text, single_cat_title('', false));

        elseif (is_author()):

            $author_text = get_theme_mod('author_prefix', __('All posts by', 'spicepress'));

            printf(__('%1$s %2$s', 'spicepress'), $author_text, get_the_author());

        elseif (is_tag()):

            $tag_text = get_theme_mod('tag_prefix', __('Tag', 'spicepress'));

            printf(__('%1$s %2$s', 'spicepress'), $tag_text, single_tag_title('', false));

        elseif (class_exists('WooCommerce') && is_shop()):

            $shop_text = get_theme_mod('shop_prefix', __('Shop', 'spicepress'));

            printf(__('%1$s %2$s', 'spicepress'), $shop_text, single_tag_title('', false));

        elseif (is_archive()):
            the_archive_title('<h1>', '</h1>');

        endif;
        echo '</h1></div>';
    } elseif (is_search()) {
        $search_text = get_theme_mod('search_prefix', __('Search results for', 'spicepress'));

        echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>';

        printf(__('%1$s %2$s', 'spicepress'), $search_text, get_search_query());

        echo '</h1></div>';
    } elseif (is_404()) {
        $breadcrumbs_text = get_theme_mod('404_prefix', __('404', 'spicepress'));

        echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>';

        printf(__('%1$s ', 'spicepress'), $breadcrumbs_text);

        echo '</h1></div>';
    } else {
        echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>' . get_the_title() . '</h1></div>';
    }
}

// SpicePress post navigation
function spicepress_post_nav() {
    global $post;
    echo '<div style="text-align:center;">';
    posts_nav_link(' &#183; ', __('previous page', 'spicepress'), __('next page', 'spicepress'));
    echo '</div>';
}

//Hide Title of woocommerce shop page
add_filter('woocommerce_show_page_title', 'woo_hide_page_title');

function woo_hide_page_title() {
    return false;
}

function spicepress_overlap_bredcrumb() {
    $header_varition = get_theme_mod('header_varition', 'standard');
    if (($header_varition == 'standard') || ($header_varition == 'classic') || ($header_varition == 'center')) {
        spicepress_breadcrumbs();
    }
}

if (!function_exists('spicepress_image_thumbnail')) :

    function spicepress_image_thumbnail($preset, $class) {
        if (has_post_thumbnail()) {
            $defalt_arg = array('class' => $class);
            the_post_thumbnail($preset, $defalt_arg);
        }
    }

endif;

// Custom header function
if (!function_exists('spicepress_header_style')) :

    function spicepress_header_style() {
        $text_color = get_header_textcolor();

        // If no custom color for text is set, let's bail.
        if (display_header_text() && $text_color === get_theme_support('custom-header', 'default-text-color'))
            return;
        ?>
        <style type="text/css" id="spicepress-header-css">
        <?php
// Has the text been hidden?
        if (!display_header_text()) :
            ?> .site-title,
                .site-description {
                    clip: rect(1px 1px 1px 1px); /* IE7 */
                    clip: rect(1px, 1px, 1px, 1px);
                    position: absolute;
                }
            <?php
// If the user has set a custom color for the text, use that.
        elseif ($text_color != get_theme_support('custom-header', 'default-text-color')) :
            ?>
                .site-title a {
                    color: #<?php echo esc_attr($text_color); ?>;
                }
        <?php endif; ?>
        </style>
        <?php
    }

endif;
add_action('wp_footer', 'demo_store');

function demo_store() {
    if (class_exists('WooCommerce')) {
        $woocommerce_demo_store = get_option('woocommerce_demo_store', 'no');
        if ($woocommerce_demo_store != 'no') {
            ?>
            <style>
                .woocommerce-store-notice .demo_store, #wrapper {
                    margin-top: 50px !important;
                }
            </style>
            <?php
        }
    }
}

/* ----Custom Header & Footer Background color---- */

function spicepress_header_footer_bgcolor() {
    spicepress_custom_header_footer_bgcolor();
}

add_action('wp_footer', 'spicepress_header_footer_bgcolor');

/* ----Custom Header & Footer Background color---- */

function spicepress_custom_header_footer_bgcolor() {
    $header_background_color = get_theme_mod('header_background_color', '#21202e');
    $footer_background_color = get_theme_mod('footer_background_color', '#21202e');
    ?>
    <style type="text/css">
        .header-widget-info, .navbar-classic, .stiky-header{
            background: <?php echo esc_attr($header_background_color); ?>;
        }
        .site-footer{
            background: <?php echo esc_attr($footer_background_color); ?>;
        }
    </style>
    <?php
}

/* ----Function for the menu breakpoint---- */
add_action('wp_head', 'spicepress_custom_menu_breakpoint');

function spicepress_custom_menu_breakpoint() {

    $menu_breakpoint = get_theme_mod('menu_breakpoint', 1100);

    $theme_color = get_theme_mod('theme_color', 'default.css');

    if (get_theme_mod('custom_color_enable') == true) {
        $custom_color = get_theme_mod('link_color');
    } else {
        if ($theme_color == 'default.css') {
            $custom_color = '#ce1b28';
        }
        if ($theme_color == 'green.css') {
            $custom_color = '#7aa228';
        }
        if ($theme_color == 'blue-dark.css') {
            $custom_color = '#395ca3';
        }
        if ($theme_color == 'orange.css') {
            $custom_color = '#ee591f';
        }
        if ($theme_color == 'regal-blue.css') {
            $custom_color = '#173c54';
        }
        if ($theme_color == 'wordpress.css') {
            $custom_color = '#22a2c4';
        }
        if ($theme_color == 'pink.css') {
            $custom_color = '#ff3366';
        }
        if ($theme_color == 'jelly-bean.css') {
            $custom_color = '#D9534F';
        }
    }
    ?>
    <style type="text/css">
        @media (max-width: <?php echo $menu_breakpoint; ?>px) {
            .navbar-custom .dropdown-menu {
                border-top: none !important;
                border-bottom: none !important;
                box-shadow: none !important;
                border: none;
            }
            .navbar-classic .navbar-nav .nav .open > a,
            .navbar-classic .navbar-nav .nav .open > a:hover,
            .navbar-classic .navbar-nav .nav .open > a:focus {
                border-color: <?php echo $custom_color; ?>;
            }

        }

        @media (max-width: <?php echo $menu_breakpoint; ?>px) {
            .navbar-classic .navbar-nav > li > a:hover,
            .navbar-classic .navbar-nav > li > a:focus {
                background-color: transparent;
                color: <?php echo $custom_color; ?>;
            }
            .navbar-classic .navbar-nav > .open > a,
            .navbar-classic .navbar-nav > .open > a:hover,
            .navbar-classic .navbar-nav > .open > a:focus {
                background-color: transparent;
                color: <?php echo $custom_color; ?>;
            }
            .navbar-classic .navbar-nav > .active > a,
            .navbar-classic .navbar-nav > .active > a:hover,
            .navbar-classic .navbar-nav > .active > a:focus {
                background-color: transparent;
                color: <?php echo $custom_color; ?>;
                border-top: none !important;
            }
        }

        @media (min-width: 100px) and (max-width: <?php echo $menu_breakpoint; ?>px) {
            .navbar .navbar-nav > .active > a,
            .navbar .navbar-nav > .active > a:hover,
            .navbar .navbar-nav > .active > a:focus {
                color: <?php echo $custom_color; ?> !important;
                background-color: transparent !important;
            }
            .navbar .navbar-nav > .open > a,
            .navbar .navbar-nav > .open > a:hover,
            .navbar .navbar-nav > .open > a:focus {
                background-color: transparent;
                color: <?php echo $custom_color; ?>;
                border-bottom: 1px dotted #4c4a5f;
            }
        }

        /*===================================================================================*/
        /*	NAVBAR
        /*===================================================================================*/

        .navbar-custom {
            background-color: #fff;
            border: 0;
            border-radius: 0;
            z-index: 1000;
            font-size: 1.000rem;
            transition: background, padding 0.4s ease-in-out 0s;
            margin: 0;
            min-height: 90px;
        }
        .navbar a { transition: color 0.125s ease-in-out 0s; }
        .navbar-custom .navbar-brand {
            letter-spacing: 1px;
            font-weight: 600;
            font-size: 2.000rem;
            line-height: 1.5;
            color: #1b1b1b;
            margin-left: 0px !important;
            height: auto;
            padding: 26px 30px 26px 15px;
        }
        .site-branding-text { float: left; margin: 0; padding: 13px 50px 13px 0; }
        .site-title { height: auto; font-size: 1.875rem; line-height: 1.3; font-weight: 600; margin: 0; padding: 0px; }
        .site-description { padding: 0; margin: 0; }
        .navbar-custom .navbar-nav li { margin: 0px; padding: 0; }
        .navbar-custom .navbar-nav li > a {
            position: relative;
            color: #1b1b1b;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 35px 17px;
            transition: all 0.3s ease-in-out 0s;
        }
    <?php if (!is_rtl()) { ?>
            .navbar-custom .navbar-nav li > a > i {
                padding-left: 5px;
            }
    <?php } else { ?>
            .navbar-custom .navbar-nav li > a > i {
                padding-right: 5px;
            }
    <?php } ?>
        /*Dropdown Menu*/
        .navbar-custom .dropdown-menu {
            border-radius: 0;
            padding: 0;
            min-width: 200px;
            background-color: #21202e;
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.5);
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
        }
        .navbar-custom .dropdown-menu > li { padding: 0 10px; margin: 0; }
        .navbar-custom .dropdown-menu > li > a {
            color: #d5d5d5;
            border-bottom: 1px dotted #363544;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 12px 15px;
            transition: all 0.2s ease-in-out 0s;
            letter-spacing: 0.7px;
            white-space: normal;
        }
        .navbar-custom .dropdown-menu > li > a:hover,
        .navbar-custom .dropdown-menu > li > a:focus {
            padding: 12px 15px 12px 20px;
        }
        .navbar-custom .dropdown-menu > li > a:hover,
        .navbar-custom .dropdown-menu > li > a:focus {
            color: #ffffff;
            background-color: #282737;
        }
        .navbar-custom .dropdown-menu .dropdown-menu {
            left: 100%;
            right: auto;
            top: 0;
            margin-top: 0;
        }
        .navbar-custom .dropdown-menu.left-side .dropdown-menu {
            border: 0;
            right: 100%;
            left: auto;
        }
        .navbar-custom .dropdown-menu .open > a,
        .navbar-custom .dropdown-menu .open > a:focus,
        .navbar-custom .dropdown-menu .open > a:hover {
            background: #282737;
            color: #fff;
        }
        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus {
            border-color: #363544;
        }
        .navbar-custom .dropdown-menu > .active > a,
        .navbar-custom .dropdown-menu > .active > a:hover,
        .navbar-custom .dropdown-menu > .active > a:focus {
            color: #fff;
            background-color: transparent;
        }
        .navbar-custom .navbar-toggle .icon-bar { background: #121213; width: 40px; height: 2px; }
        .navbar-toggle .icon-bar + .icon-bar { margin-top: 8px; }


        /*--------------------------------------------------------------
                Navbar Overlapped & Stiky Header Css
        --------------------------------------------------------------*/

        body.page .header-overlapped ~ #slider-carousel,
        body.woocommerce-page .header-overlapped ~ #slider-carousel { margin: -70px 0 70px; }
        body.page-template.page-template-template-business .header-overlapped ~ #slider-carousel,
        body.blog .header-overlapped,
        body.page-template.page-template-template-overlapped .header-overlapped ~ #slider-carousel,body.page-template.page-template-template-overlaped .header-overlapped ~ #slider-carousel {
            margin: 0px;
        }
        body.home.blog .header-overlapped,
        body.page-template-template-business .header-overlapped,
        body.page-template-template-overlaped .header-overlapped {
            background-color: transparent;
            margin: 0;
            position: relative;
            z-index: 99;
        }
        .header-overlapped { margin: 0 0 70px; }
        .header-overlapped .page-title-section { background-color: transparent !important; }
        .navbar-overlapped {
            position: absolute;
            right: 0;
            left: 0;
            top: 0;
            z-index: 20;
            background-color: rgba(0,0,0,0.2);
        }
        @media (min-width:500px) {
            body.home.blog .navbar-overlapped,
            body.page-template-template-business .navbar-overlapped,body.page-template-template-overlaped .navbar-overlapped {
                position: absolute;
                right: 0;
                left: 0;
                top: 0;
                z-index: 20;
            }
        }
        .navbar-overlapped { min-height: 90px; position: relative; }
        .header-overlapped .page-seperate {display: none;}
        .navbar-overlapped .navbar-brand { padding: 20px 0px; color: #ffffff; }
        .navbar-overlapped .navbar-brand:hover,
        .navbar-overlapped .navbar-brand:focus {
            color: #ffffff;
        }
        .navbar-overlapped .site-title a,
        .navbar-overlapped .site-title a:hover,
        .navbar-overlapped .site-title a:focus,
        .navbar-overlapped .site-description {
            color: #fff;
        }
        .navbar-overlapped .navbar-nav > li > a {
            color: #fff;
            border-bottom: 2px solid transparent;
            padding: 34px 10px;
            margin-left: 5px;
            margin-right: 5px;
        }
        .navbar-overlapped .navbar-nav > li > a:hover,
        .navbar-overlapped .navbar-nav > li > a:focus {
            background-color: transparent;
            color: #fff;
            border-bottom: 2px solid rgba(255,255,255,1);
        }
        .navbar-overlapped .navbar-nav > .open > a,
        .navbar-overlapped .navbar-nav > .open > a:hover,
        .navbar-overlapped .navbar-nav > .open > a:focus {
            background-color: transparent;
            color: #fff;
            border-bottom: 2px solid transparent;
        }
        .navbar-overlapped .navbar-nav > .active > a,
        .navbar-overlapped .navbar-nav > .active > a:hover,
        .navbar-overlapped .navbar-nav > .active > a:focus {
            background-color: transparent !important;
            color: #fff;
            border-bottom: 2px solid rgba(255,255,255,1);
        }
        .navbar-overlapped .cart-header { width: 25px; height: 25px; margin: 33px 7px 32px 20px; }
        .navbar-overlapped .cart-header > a.cart-icon { color: #fff; border: 1px solid #ffffff; }
        .navbar-overlapped .cart-header > a.cart-icon { width: auto; height: auto; border: 0 none; padding: 0; }
        .navbar-overlapped .cart-header > a .cart-total { right: -11px; top: -4px; }

        /*Header Stiky Menu*/
        .stiky-header{
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: #21202e;
            transition: all 0.3s ease;
            min-height: 70px;
            box-shadow: 0 2px 3px rgba(0,0,0,.1)
        }
        .navbar-overlapped.stiky-header .navbar-brand { padding: 10px 0px; }
        .navbar-overlapped.stiky-header .site-branding-text { padding: 3px 50px 3px 15px; }
        .navbar-overlapped.stiky-header .navbar-nav > li > a { padding: 24px 10px; }
        .navbar-overlapped.stiky-header .cart-header { margin: 23px 7px 22px 20px; }

        /*--------------------------------------------------------------
                Navbar Classic Header Css
        --------------------------------------------------------------*/

        .mobile-header { display: none !important; }
        @media (max-width: <?php echo $menu_breakpoint; ?>px) {
            .desktop-header { display: none !important; }
            #wrapper .mobile-header { display: block !important; }
            .mobile-header .navbar-classic { background-color: #fff !important; }
        }
        .navbar-classic { z-index: 20; background-color: #21202e; }
        .navbar-classic { min-height: 60px; }
        .navbar-classic .navbar-nav { float: none !important; }
        .navbar-classic .navbar-nav > li > a { color: #fff; padding: 20px 25px; }
        .navbar-classic .navbar-collapse { border-top: 1px solid #434158; }
        .navbar-classic .cart-header { width: 25px; height: 25px; margin: 18px 10px 17px 20px; }
        .navbar-classic .cart-header > a.cart-icon { color: #fff; border: 1px solid #ffffff; }
        .navbar-classic .cart-header > a.cart-icon { width: auto; height: auto; border: 0 none; padding: 0; }
        .navbar-classic .cart-header > a .cart-total { right: -11px; top: -4px; }
        .header-widget-info .navbar-brand { height: auto; padding: 15px 0px; }

        @media (min-width: <?php echo $menu_breakpoint; ?>px) and (max-width: <?php echo $menu_breakpoint + 1; ?>px) {
            /*Navbar Classic*/
            .navbar-classic .navbar-nav > li > a { padding: 20px 25px; }
            .navbar-classic .navbar-nav .cart-header { margin: 18px 12px 18px 20px; }
        }

        /*--------------------------------------------------------------
                Menubar - Media Queries
        --------------------------------------------------------------*/

        @media (min-width: <?php echo $menu_breakpoint; ?>px){

            .navbar-collapse.collapse {
                display: block !important;
            }
            .navbar-nav {
                margin: 0;
            }
            .navbar-custom .navbar-nav > li {
                float: left;
            }
            .navbar-header {
                float: left;
            }
            .navbar-toggle {
                display: none;
            }
        }

        @media (min-width: 768px){
            .navbar-custom .navbar-brand {
                padding: 20px 50px 20px 0;
            }
            /* Navbar Classic */
            .navbar-classic .navbar-nav { float: none !important; }
        }
        @media (min-width: <?php echo $menu_breakpoint; ?>px) {
            .navbar-transparent { background: transparent; padding-bottom: 0px; padding-top: 0px; margin: 0; }
            .navbar-custom .open > .dropdown-menu { visibility: visible; opacity: 1; }
            .navbar-right .dropdown-menu { right: auto; left: 0; }
            .navbar-classic .navbar-collapse { padding-right: 5px; padding-left: 5px; }
        }
    <?php if ($menu_breakpoint < 991) { ?>
            @media (min-width: 200px) and (max-width: 991px) {
                .navbar-custom .container-fluid {
                    width: auto !important;
                }
            }
    <?php } ?>
        @media (min-width: <?php echo $menu_breakpoint + 1; ?>px) {
            .navbar-custom .container-fluid {
                width: 970px;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }


            .navbar-custom .dropdown-menu {
                border-top: 2px solid <?php echo $custom_color; ?> !important;
                border-bottom: 2px solid <?php echo $custom_color; ?> !important;
                position: absolute !important;
                display: block;
                visibility: hidden;
                opacity: 0;
            }
            .navbar-custom .dropdown-menu > li > a { padding: 12px 15px !important; }
            .navbar-custom .dropdown-menu > li > a:hover,
            .navbar-custom .dropdown-menu > li > a:focus {
                padding: 12px 15px 12px 20px !important;
            }
            .navbar-custom .open .dropdown-menu { background-color: #21202e !important; }
            .navbar-custom .dropdown-menu { position: absolute; display: block; visibility: hidden; opacity: 0; }
            .navbar-custom .dropdown-menu > li > a i {
                float: right;
            }

        }
        @media (min-width: 1200px) {
            .navbar-custom .container-fluid {
                width: 1170px;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
        }
        @media (min-width: 1200px) {
            .navbar-custom .container-fluid.fullwidth {
                width: auto !important;
            }
        }


        /** BELOW MAX-WIDTH MEDIA QUERIES **/

        @media (max-width: <?php echo $menu_breakpoint; ?>px) {
            /* Navbar */
            .navbar-custom .navbar-nav { letter-spacing: 0px; margin-top: 1px; margin-bottom: 0; }
            .navbar-custom .navbar-nav li { margin: 0 15px; padding: 0; }
            .navbar-custom .navbar-nav li > a { color: #bbb; padding: 12px 0px 12px 0px; }
            .navbar-custom .navbar-nav > li > a:focus,
            .navbar-custom .navbar-nav > li > a:hover {
                background: transparent;
                color: #fff;
            }
            .navbar-custom .dropdown-menu > li > a {
                display: block;
                clear: both;
                font-weight: normal;
            }
            .navbar-custom .dropdown-menu > li > a:hover,
            .navbar-custom .dropdown-menu > li > a:focus {
                background-color: #21202F;
                color: #fff;
                padding: 12px 0px 12px 0px;
            }
            .navbar-custom .open .dropdown-menu {
                position: static;
                float: none;
                width: auto;
                margin-top: 0;
                background-color: transparent;
                border: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .navbar-custom .open .dropdown-menu > li > a {
                line-height: 20px;
            }
            .navbar-custom .open .dropdown-menu .dropdown-header,
            .navbar-custom .open .dropdown-menu > li > a {
                padding: 12px 0px;
            }
            .navbar-custom .open .dropdown-menu .dropdown-menu .dropdown-header,
            .navbar-custom .open .dropdown-menu .dropdown-menu > li > a {
                padding: 12px 0px;
            }
            .navbar-custom li a,
            .navbar-custom .dropdown-search {
                border-bottom: 1px dotted #4c4a5f !important;
            }
            .navbar-header { padding: 0px 15px; float: none; }
            .navbar-custom .navbar-brand { padding: 20px 50px 20px 0px; }
            .navbar-toggle { display: block; margin: 24px 15px 24px 0; padding: 9px 0px; }
            .navbar-custom.navbar5.hp-hc .navbar-toggle { float: none; margin: 15px auto; }
            .site-branding-text { padding: 17px 50px 17px 15px; }
            .navbar-collapse { border-top: 1px solid transparent; box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1); }
            .navbar-collapse.collapse { display: none!important; }
            .navbar-custom .navbar-nav { background-color: #21202e; float: none!important; margin: 0px }
            .navbar-custom .navbar-nav > li { float: none; }
            .navbar-collapse.collapse.in { display: block!important; }
            .collapsing { overflow: hidden!important; }
            .navbar-collapse,
            .navbar-collapse.collapse.in {
                padding-right: 0px;
                padding-left: 0px;
            }

            .navbar-custom.hp-hc .navbar-nav > li {
                float: none;
                display: block;
            }
            .navbar-custom.hp-hc .navbar-nav {text-align: left;}
            .navbar5.navbar-custom .navbar-nav > .active > a:after {content: none;}


            /*Navbar Overlapped*/
            .navbar-overlapped.stiky-header .navbar-toggle {
                margin: 13px 15px 13px 0;
            }
            .navbar-overlapped.stiky-header .navbar-collapse.in {
                max-height: 500px;
                padding-right: 0px;
            }

        }
        @media (max-width: <?php echo $menu_breakpoint; ?>px) {
            .navbar-custom .dropdown a > i.fa {
                font-size: 0.938rem;
                position: absolute;
                right: 0;
                margin-top: -6px;
                top: 50%;
                padding-left: 7px;
            }
            /*Navbar Overlapped*/
            .navbar-overlapped.stiky-header .navbar-brand { padding: 20px 0px; }
            .navbar-overlapped.stiky-header .navbar-nav > li > a { padding: 12px 15px; }
            .navbar-overlapped .navbar-nav > li > a:hover,
            .navbar-overlapped .navbar-nav > li > a:focus {
                border-bottom: 1px dotted #4c4a5f;
            }
            .navbar-overlapped .navbar-nav > .active > a,
            .navbar-overlapped .navbar-nav > .active > a:hover,
            .navbar-overlapped .navbar-nav > .active > a:focus {
                border-bottom: 1px dotted #4c4a5f;
            }
            .navbar-overlapped .navbar-toggle { color: #fff; }
            .navbar-overlapped .navbar-toggle .icon-bar { background-color: #fff; }

        }
        @media (max-width: 768px) {
            .navbar-header { padding: 0 15px; }
            .navbar-collapse,
            .navbar-collapse.collapse.in { padding-right: 15px; padding-left: 15px; }
            .navbar-custom .navbar-brand { padding: 20px 50px 20px 15px; }
        }
        @media (max-width: 500px) {
            .navbar-custom .navbar-brand { float: none; display: block; text-align: center; padding: 25px 15px 12px 15px; }
            .navbar-custom .navbar-brand img { margin: 0 auto; }
            .site-branding-text { padding: 17px 15px 17px 15px; float: none; text-align: center; }
            .navbar-toggle { float: none; margin: 10px auto 25px; }
            /*Navbar Overlapped*/
            .navbar-overlapped { position: relative; background-color: #21202e; border-bottom: 1px solid #4c4a5f; }
            .navbar-overlapped .navbar-collapse.in { bottom: 0px; }
            .navbar-overlapped .navbar-collapse { bottom: 0px; }
            .navbar-overlapped.stiky-header .navbar-toggle { float: none; margin: 10px auto 25px; }
            .navbar-overlapped.stiky-header .site-branding-text {
                padding: 17px 15px 17px 15px;
                float: none;
                text-align: center;
            }
            body.blog .navbar-overlapped { position: relative; }

        }

        /*===================================================================================*/
        /*	CART ICON
        /*===================================================================================*/
        .cart-header {
            width: 40px;
            height: 40px;
            line-height: 1.6;
            text-align: center;
            background: transparent;
            position: relative;
            float: right;
            margin: 25px 7px 25px 20px;
        }
        .cart-header > a.cart-icon {
            -wekbit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            display: inline-block;
            font-size: 1.125rem;
            color: #202020;
            width: 100%;
            height: 100%;
            border: 1px solid #eaeaea;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            padding: 4px;
        }
        .cart-header > a .cart-total {
            font-family: 'Open Sans', Sans-serif;
            font-size: 0.688rem;
            line-height: 1.7;
            color: #ffffff;
            font-weight: 600;
            position: absolute;
            right: -7px;
            top: -7px;
            padding: 1px;
            width: 1.225rem;
            height: 1.225rem;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            -wekbit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
        @media (min-width: 100px) and (max-width: <?php echo $menu_breakpoint; ?>px) {
            .cart-header { float: left; margin: 20px 7px 20px 15px !important; }
            .cart-header > a.cart-icon { color: #fff; }
        }


        /*-------------------------------------------------------------------------
        /* Navbar - Logo Right Align with Menu
        -------------------------------------------------------------------------*/

        @media (min-width: <?php echo $menu_breakpoint + 1; ?>px) {
            .navbar-header.align-right {
                float: right;
            }
            .navbar-header.align-right ~ .navbar-collapse { padding-left: 0; }
        }
        @media (max-width: <?php echo $menu_breakpoint; ?>px) {
            .navbar-header.align-right .navbar-toggle {
                float: left;
                margin-left: 15px;
            }

        }
        .navbar-brand.align-right, .site-branding-text.align-right {
            float: right;
            margin-right: 0px;
            margin-left: 50px;
            padding-right: 0px;
        }
        @media (max-width: 768px) {
            .navbar-brand.align-right, .site-branding-text.align-right {
                padding-right: 15px;
            }
        }
        @media (max-width: 500px) {
            .navbar-brand.align-right{
                float: none;
                padding: 10px 15px 30px 15px;
            }
            .site-branding-text.align-right {
                float: none;
                padding: 10px 15px 30px 15px;
                margin-left: 0;
            }
            .navbar-header.align-right .navbar-toggle {
                float: none;
                margin: 30px auto 10px;
            }
        }
        .p-lef-right-0 { padding-left: 0; padding-right: 0; }


        /*-------------------------------------------------------------------------
        /* Navbar - Logo Center Align with Menu
        -------------------------------------------------------------------------*/

        .mobile-header { display: none; }
        @media (max-width: <?php echo $menu_breakpoint; ?>px){
            .desktop-header {
                display: none !important;
            }
            .mobile-header {
                display: block !important;
            }
        }
        .navbar-center-fullwidth .container-fluid {
            padding-left: 0px;
            padding-right: 0px;
            width: auto;
        }
        @media (min-width: <?php echo $menu_breakpoint + 1; ?>px) {
            .navbar-center-fullwidth .logo-area {
                margin: 0 auto;
                padding: 40px 0;
                text-align: center;
            }
            .navbar-brand.align-center, .site-branding-text.align-center{
                float: none;
                padding: 0px;
                display: inline-block;
            }
            .navbar-center-fullwidth .navbar-nav {
                float: none;
                margin: 0 auto;
                display: table;
            }
        }
        .navbar-center-fullwidth .navbar-collapse {
            border-top: 1px solid #e9e9e9;
            border-bottom: 1px solid #e9e9e9;
        }
        .navbar-center-fullwidth .navbar-nav > .active > a,
        .navbar-center-fullwidth .navbar-nav > .active > a:hover,
        .navbar-center-fullwidth .navbar-nav > .active > a:focus {
            color: <?php echo $custom_color; ?> !important;
            background-color: transparent !important;
        }
        .navbar-center-fullwidth .navbar-nav li > a {
            padding: 20px;
        }
        .navbar-center-fullwidth .dropdown-menu > li > a {
            padding: 12px 15px;
        }
        .navbar-center-fullwidth .sp-search-area {
            margin-top: 10px;
            margin-bottom: 8px;
        }
        @media (min-width: <?php echo $menu_breakpoint; ?>px) {
            .navbar-nav ul.dropdown-menu .fa-angle-down:before {
                content: "\f105";
                font-family: "FontAwesome";
                font-size: 12px;
            }
        }
        @media (min-width: <?php echo $menu_breakpoint + 1; ?>px) {
          .navbar-custom .dropdown-menu > li > a i {
              padding-top: 2px;
          }
        }
    </style>
    <?php
}

if (!function_exists('spicepress_button_title')) :

    /**
     * Display Button on Archive/Blog Page
     */
    function spicepress_button_title() {
        if (get_theme_mod('spicepress_enable_blog_read_button', true) == true):
            $blog_button = get_theme_mod('spicepress_blog_button_title', 'Read More');

            if (empty($blog_button)) {
                return;
            }
            echo '<a href = "' . esc_url(get_the_permalink()) . '" class="more-link">' . esc_html($blog_button) . '</a>';

        endif;
    }




endif;
