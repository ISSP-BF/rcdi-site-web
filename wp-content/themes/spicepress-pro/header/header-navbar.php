<?php
spicepress_before_header_section_trigger();
$header_logo_placing = get_theme_mod('header_logo_placing', 'left');
if ($header_logo_placing == 'full_left') {
    $containorFull = 'fullwidth';
} else {
    $containorFull = '';
}

$header_varition = get_theme_mod('header_varition', 'standard');
if ($header_varition == 'standard') {

    $header_logo_placing = get_theme_mod('header_logo_placing', 'left');
    if ($header_logo_placing == 'full_left') {
        $containorFull = 'fullwidth';
    } else {
        $containorFull = '';
    }
    if ($header_logo_placing == 'center') {
        ?>
        <header class="desktop-header">
        <?php } ?>
        <!--Logo & Menu Section-->	
        <nav class="<?php
        if ($header_logo_placing == 'center') {
            echo 'navbar-center-fullwidth';
        }
        ?> navbar navbar-custom <?php if (get_theme_mod('sticky_header_enable', false) === true): ?>header-sticky<?php endif; ?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> " role="navigation">
            <div class="container-fluid <?php echo $containorFull; ?> p-l-r-0">
            <!--<div class="container-fluid <?php echo $containorFull; ?> p-l-r-0">-->
                <!-- Brand and toggle get grouped for better mobile display -->

                <?php
                if ($header_logo_placing == 'left' || $header_logo_placing == 'full_left') {
                    $menu_class = 'navbar-right';
                }
                if ($header_logo_placing == 'right') {
                    $menu_class = 'navbar-left';
                }
                if ($header_logo_placing == 'center') {
                    $menu_class = '';
                }
                if ($header_logo_placing == 'left' || $header_logo_placing == 'full_left') {
                    ?>
                    <div class="navbar-header">
                        <?php the_custom_logo();
                        do_action('spicepress_sticky_header_logo'); ?>

        <?php if (display_header_text()) : ?>
                            <div class="site-branding-text">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                            </div>
        <?php endif; ?>
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php echo esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
    <?php } if ($header_logo_placing == 'right') { ?>

                    <div class="navbar-header align-right">	
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php echo esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php // the_custom_logo(); do_action('spicepress_sticky_header_logo');?>
        <?php if (display_header_text()) : ?>
                            <div class="site-branding-text align-right">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                            </div>
                        <?php endif; ?>
        <?php the_custom_logo();
        do_action('spicepress_sticky_header_logo'); ?>
                    </div>

    <?php } if ($header_logo_placing == 'center') { ?>


                    <div class="logo-area">
        <?php the_custom_logo();
        do_action('spicepress_sticky_header_logo'); ?>
                            <?php if (display_header_text()) : ?>
                            <div class="site-branding-text align-center">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
                            </div>
        <?php endif; ?>
                    </div>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                        <span class="sr-only"><?php echo esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                <?php } ?>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
                $shop_button = '<ul class="%2$s">%3$s';
                if (class_exists('WooCommerce')) {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                    $shop_button .= '<div class="cart-header">';
                    global $woocommerce;
                    $link = function_exists('wc_get_cart_url') ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
                    $shop_button .= '<a class="cart-icon" href="' . $link . '" >';

                    if ($woocommerce->cart->cart_contents_count == 0) {
                        $shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                    } else {
                        $shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
                    }

                    $shop_button .= '</a>';

                    $shop_button .= '<a href="' . $link . '" ><span class="cart-total">
							' . sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'spicepress'), $woocommerce->cart->cart_contents_count) . '</span></a>';
                } else {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                }
                $shop_button .= '</ul>';
                ?>


                <div  class="collapse navbar-collapse" <?php
                      if ($header_logo_placing != 'center') {
                          echo 'id="custom-collapse"';
                      }
                      ?>>
                          <?php
                          wp_nav_menu(array(
                              'theme_location' => 'primary',
                              'container' => 'nav-collapse collapse navbar-inverse-collapse',
                              'menu_class' => 'nav navbar-nav ' . $menu_class . '',
                              'fallback_cb' => 'spicepress_fallback_page_menu',
                              'items_wrap' => $shop_button,
                              'walker' => new spicepress_nav_walker()
                          ));
                          ?>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

    <?php if ($header_logo_placing == 'center') { ?>
        
        </header>
    <?php } ?>


    <?php if ($header_logo_placing == 'center') { ?>
        <header class="mobile-header">

            <!--Logo & Menu Section-->	
            <nav class="navbar navbar-custom <?php if (get_theme_mod('sticky_header_enable', false) === true): ?>header-sticky<?php endif; ?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> " role="navigation">
                <div class="container-fluid <?php echo $containorFull; ?> p-l-r-0">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
        <?php the_custom_logo();
        do_action('spicepress_sticky_header_logo'); ?>

                            <?php if (display_header_text()) : ?>
                            <div class="site-branding-text">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
                            </div>
        <?php endif; ?>
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php echo esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php
                    $shop_button = '<ul class="%2$s">%3$s';
                    if (class_exists('WooCommerce')) {
                        if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                            $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                        } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                            $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                        }
                        $shop_button .= '<div class="cart-header">';
                        global $woocommerce;
                        $link = function_exists('wc_get_cart_url') ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
                        $shop_button .= '<a class="cart-icon" href="' . $link . '" >';

                        if ($woocommerce->cart->cart_contents_count == 0) {
                            $shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                        } else {
                            $shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
                        }

                        $shop_button .= '</a>';

                        $shop_button .= '<a href="' . $link . '" ><span class="cart-total">
							' . sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'spicepress'), $woocommerce->cart->cart_contents_count) . '</span></a>';
                    } else {
                        if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                            $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                        } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                            $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                        }
                    }
                    $shop_button .= '</ul>';
                    ?>


                    <div  class="collapse navbar-collapse" id="custom-collapse">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => 'nav-collapse collapse navbar-inverse-collapse',
                            'menu_class' => 'nav navbar-nav navbar-right',
                            'fallback_cb' => 'spicepress_fallback_page_menu',
                            'items_wrap' => $shop_button,
                            'walker' => new spicepress_nav_walker()
                        ));
                        ?>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>	
            

        </header>
    <?php } ?>
<!--/Logo & Menu Section-->

            <?php if (get_theme_mod('search_effect_style_setting', 'toogle') != 'toogle'): ?>
                <div id="searchbar_fullscreen" <?php if (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light'): ?> class="bg-light" <?php endif; ?>>
                    <button type="button" class="close">×</button>
                    <form method="get" id="searchform" autocomplete="off" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"><label><input autofocus type="search" class="search-field" placeholder="Search" value="" name="s" id="s" autofocus></label><input type="submit" class="search-submit btn" value="<?php echo esc_html__('Search', 'spicepress'); ?>"></form>
                </div>
        <?php endif; ?>


    <?php
} else if ($header_varition == 'overlap') {

    $header_logo_placing_overlap = get_theme_mod('header_logo_placing', 'left');

    if ($header_logo_placing_overlap == 'left' || $header_logo_placing_overlap == 'center' || $header_logo_placing_overlap == 'full_left') {
        $menu_class = 'navbar-right';
    }
    if ($header_logo_placing_overlap == 'right') {
        $menu_class = 'navbar-left';
    }
    ?> 
    <!--Logo & Menu Section-->	

    <header class="header-overlapped">


        <nav class="navbar-overlapped navbar navbar-custom navigation <?php if (get_theme_mod('sticky_header_enable', false) === true): ?>header-sticky<?php endif; ?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> " role="navigation">
            <div class="container-fluid <?php echo $containorFull; ?> p-l-r-0">
                    <?php if ($header_logo_placing_overlap == 'left' || $header_logo_placing_overlap == 'center' || $header_logo_placing_overlap == 'full_left') { ?> 
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                            <?php the_custom_logo();
                            do_action('spicepress_sticky_header_logo'); ?>

                            <?php if (display_header_text()) : ?>
                            <div class="site-branding-text">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
                            </div>
        <?php endif; ?>
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
    <?php } ?>
    <?php if ($header_logo_placing_overlap == 'right') { ?> 

                    <div class="navbar-header align-right">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                            <?php // the_custom_logo(); do_action('spicepress_sticky_header_logo'); ?>
                            <?php if (display_header_text()) : ?>
                            <div class="site-branding-text align-right">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                            </div>
        <?php endif; ?>
        <?php the_custom_logo();
        do_action('spicepress_sticky_header_logo'); ?>
                    </div>

                <?php } ?>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
                $shop_button = '<ul class="%2$s">%3$s';
                if (class_exists('WooCommerce')) {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                    $shop_button .= '<div class="cart-header">';
                    global $woocommerce;
                    $link = function_exists('wc_get_cart_url') ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
                    $shop_button .= '<a class="cart-icon" href="' . $link . '" >';

                    if ($woocommerce->cart->cart_contents_count == 0) {
                        $shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                    } else {
                        $shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
                    }

                    $shop_button .= '</a>';

                    $shop_button .= '<a href="' . $link . '" ><span class="cart-total">
							' . sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'spicepress'), $woocommerce->cart->cart_contents_count) . '</span></a>';
                } else {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                }
                $shop_button .= '</ul>';
                ?>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div  class="collapse navbar-collapse" id="custom-collapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'nav-collapse collapse navbar-inverse-collapse',
                        'menu_class' => 'nav navbar-nav ' . $menu_class . '',
                        'fallback_cb' => 'spicepress_fallback_page_menu',
                        'items_wrap' => $shop_button,
                        'walker' => new spicepress_nav_walker()
                    ));
                    ?>

                </div><!-- /.navbar-collapse -->
                <!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <?php if (get_theme_mod('search_effect_style_setting', 'toogle') != 'toogle'): ?>
            <div id="searchbar_fullscreen" <?php if (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light'): ?> class="bg-light" <?php endif; ?>>
                <button type="button" class="close">×</button>
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"><label><input type="search" class="search-field" placeholder="Search …" value="" name="s" id="s"></label><input type="submit" class="search-submit btn" value="<?php echo esc_html__('Search', 'spicepress'); ?>"></form>
            </div>
    <?php endif; ?>
    <?php
    if (!is_home() && !is_page_template('template-business.php')) {
        spicepress_breadcrumbs();
    }
    ?>
    </header>
    <!--/Logo & Menu Section-->	

    <?php
} else if ($header_varition == 'classic') {

    $header_logo_placing_classic = get_theme_mod('header_logo_placing', 'left');

    if ($header_logo_placing_classic == 'left' || $header_logo_placing_classic == 'center' || $header_logo_placing_classic == 'full_left') {
        $menu_class = 'navbar-right';
    }
    if ($header_logo_placing_classic == 'right') {
        $menu_class = 'navbar-left';
    }
    ?>

    <!--Desktop Header Section-->
    <header class="desktop-header <?php if (get_theme_mod('sticky_header_enable', false) === true): ?>header-sticky<?php endif; ?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?>">

        <!--Header Contact Widget-->
        <section class="header-widget-info sp-schemes">
            <div class="<?php echo ($containorFull!='fullwidth') ? 'container' : 'container-fluid'; ?>">
                <div class="row">
                            <?php if ($header_logo_placing_classic == 'left' || $header_logo_placing_classic == 'center' || $header_logo_placing_classic == 'full_left') { ?>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                                <?php the_custom_logo();
                                do_action('spicepress_sticky_header_logo'); ?>

                                <?php if (display_header_text()) : ?>
                                <div class="site-branding-text">
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                        <p class="site-description"><?php echo $description; ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                        </div>

                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="row">
                        <?php
                        if (is_active_sidebar('header_widget_area')) :
                            dynamic_sidebar('header_widget_area');
                        endif;
                        ?>
                            </div>				
                        </div>	

                            <?php }if ($header_logo_placing_classic == 'right') { ?>

                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="row">
        <?php
        if (is_active_sidebar('header_widget_area')) :
            dynamic_sidebar('header_widget_area');
        endif;
        ?>
                            </div>				
                        </div>	

                        <div class="col-md-4 col-sm-5 col-xs-12 align-right">
                                <?php the_custom_logo();
                                do_action('spicepress_sticky_header_logo'); ?>

                                <?php if (display_header_text()) : ?>
                                <div class="site-branding-text align-right">
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
                ?>
                                        <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
                                </div>
        <?php endif; ?>
                        </div>

    <?php } ?>

                </div>	
            </div>
        </section>
        <!--/Header Contact Widget-->

        <!--Menu Section-->	
        <nav class="navbar-classic navbar navbar-custom " role="navigation">
            <div class="container-fluid <?php echo $containorFull; ?> p-l-r-0">		
                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
                $shop_button = '<ul class="%2$s">%3$s';
                if (class_exists('WooCommerce')) {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                    $shop_button .= '<div class="cart-header">';
                    global $woocommerce;
                    $link = function_exists('wc_get_cart_url') ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
                    $shop_button .= '<a class="cart-icon" href="' . $link . '" >';

                    if ($woocommerce->cart->cart_contents_count == 0) {
                        $shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                    } else {
                        $shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
                    }

                    $shop_button .= '</a>';

                    $shop_button .= '<a href="' . $link . '" ><span class="cart-total">
							' . sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'spicepress'), $woocommerce->cart->cart_contents_count) . '</span></a>';
                } else {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                }
                $shop_button .= '</ul>';
                ?>
                <div class="collapse navbar-collapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'nav-collapse collapse navbar-inverse-collapse',
                        'menu_class' => 'nav navbar-nav ' . $menu_class . '',
                        'fallback_cb' => 'spicepress_fallback_page_menu',
                        'items_wrap' => $shop_button,
                        'walker' => new spicepress_nav_walker()
                    ));
                    ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>	
        <!--/Menu Section-->

    </header>

    <!--Mobile Header Section-->
    <header class="mobile-header <?php if (get_theme_mod('sticky_header_enable', false) === true): ?>header-sticky<?php endif; ?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?>">
        <!--Logo & Menu Section-->	
        <nav class="navbar-classic navbar navbar-custom  " role="navigation">
            <div class="container-fluid <?php echo $containorFull; ?> p-l-r-0">
                        <?php if ($header_logo_placing_classic == 'left' || $header_logo_placing_classic == 'center' || $header_logo_placing_classic == 'full_left') { ?>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                            <?php the_custom_logo();
                            do_action('spicepress_sticky_header_logo'); ?>

                        <?php if (display_header_text()) : ?>
                            <div class="site-branding-text">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
                ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                            </div>
        <?php endif; ?>
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php echo esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <?php } if ($header_logo_placing_classic == 'right') { ?>

                    <div class="navbar-header align-right">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php echo esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                            <?php the_custom_logo();
                            do_action('spicepress_sticky_header_logo'); ?>
                        <?php if (display_header_text()) : ?>
                            <div class="site-branding-text align-right">
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
                ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                            </div>
                    <?php endif; ?>

                    </div>



                <?php } ?>		
                <?php
                $shop_button = '<ul class="%2$s">%3$s';
                if (class_exists('WooCommerce')) {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                    $shop_button .= '<div class="cart-header">';
                    global $woocommerce;
                    $link = function_exists('wc_get_cart_url') ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
                    $shop_button .= '<a class="cart-icon" href="' . $link . '" >';

                    if ($woocommerce->cart->cart_contents_count == 0) {
                        $shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
                    } else {
                        $shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
                    }

                    $shop_button .= '</a>';

                    $shop_button .= '<a href="' . $link . '" ><span class="cart-total">
							' . sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'spicepress'), $woocommerce->cart->cart_contents_count) . '</span></a>';
                } else {
                    if (get_theme_mod('search_effect_style_setting', 'toogle') == 'toogle' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li>
    <a href="#" title="Search" class="search-icon" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
    <ul class="dropdown-menu pull-right search-panel" role="menu">
        <li>   <div class="form-container">
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' ) ).'"><label><input type="search" class="search-field" placeholder="Search" value="" name="s" id="s"></label><input type="submit" class="search-submit" value="Search"></form>
            </div></li>
    </ul>
</li>';
                    } elseif (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light' && get_theme_mod('search_btn_enable', true) == true || get_theme_mod('search_effect_style_setting', 'popup_dark') == 'popup_dark' && get_theme_mod('search_btn_enable', true) == true) {
                        $shop_button .= '<li class="dropdown">
    <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                }
                $shop_button .= '</ul>';
                ?>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="custom-collapse">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'nav-collapse collapse navbar-inverse-collapse',
        'menu_class' => 'nav navbar-nav ' . $menu_class . '',
        'fallback_cb' => 'spicepress_fallback_page_menu',
        'items_wrap' => $shop_button,
        'walker' => new spicepress_nav_walker()
    ));
    ?>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>	
        <!--Header Contact Widget-->
    <?php if (is_active_sidebar('header_widget_area')) : ?>

            <section class="header-widget-info sp-schemes">
                <div class="container">
                    <div class="row">

        <?php
        dynamic_sidebar('header_widget_area');
        ?>

                    </div>	
                </div>
            </section>
            <!--/Header Contact Widget-->

    <?php endif; ?>

    </header>
    <!--/Logo & Menu Section-->	
    <?php if (get_theme_mod('search_effect_style_setting', 'toogle') != 'toogle'): ?>
        <div id="searchbar_fullscreen" <?php if (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light'): ?> class="bg-light" <?php endif; ?>>
            <button type="button" class="close">×</button>
            <form method="get" id="searchform" autocomplete="off" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"><label><input autofocus type="search" class="search-field" placeholder="Search" value="" name="s" id="s" autofocus></label><input type="submit" class="search-submit btn" value="<?php echo esc_html__('Search', 'spicepress'); ?>"></form>
        </div>
    <?php endif; ?>
    <!--/Mobile Header Section-->	
    <!--/Desktop Header Section-->
<?php } ?>	
<div class="clearfix"></div>
<?php spicepress_after_header_section_trigger(); ?>