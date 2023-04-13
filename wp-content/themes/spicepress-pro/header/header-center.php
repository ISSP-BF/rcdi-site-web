<div class="header-center <?php if (get_theme_mod('sticky_header_enable', false) === true): ?>header-sticky<?php endif; ?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> ">
<div class="index-logo index5 ">
    <?php if(get_theme_mod('header_logo_placing','left')=='full_left')
    {
        echo '<div class="container-fluid header-center-full-width-var">';
    }
    else
    {
echo '<div class="container">';
    }
    if(get_theme_mod('header_logo_placing','left')=='left')
    {
the_custom_logo(); do_action('spicepress_sticky_header_logo');
    if (display_header_text()) : ?>
        <div class="navbar-brand">
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :?>
                  <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
<?php
    }
    elseif(get_theme_mod('header_logo_placing','left')=='right')
    {
 the_custom_logo(); do_action('spicepress_sticky_header_logo');
    if (display_header_text()) : ?>
        <div class="navbar-brand">
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :?>
                  <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>
    <?php endif;
    }
    elseif(get_theme_mod('header_logo_placing','left')=='full_left')
    {
     the_custom_logo(); do_action('spicepress_sticky_header_logo');
     if (display_header_text()) : ?>
        <div class="navbar-brand">
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :?>
                  <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
   <?php
    }
    else
    {
  ?>
     <?php the_custom_logo(); do_action('spicepress_sticky_header_logo'); ?>
    <?php if (display_header_text()) : ?>
        <div class="navbar-brand">
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :?>
                  <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
  <?php
    }
?>
	</div>
</div>
<nav class="navbar navbar-custom navbar5 hp-hc " role="navigation">
	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
		<span class="sr-only"><?php esc_attr_e('Toggle navigation', 'spicepress'); ?></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<div class="container-fluid p-l-r-0 <?php if(get_theme_mod('header_logo_placing','left')=='full_left') { echo 'header-center-full-width-var';} ?>">
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
    <a href="#searchbar_fullscreen" title="Search" class="nav-link popup-search search-iconaria-haspopup=" true"="" aria-expanded="false">
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
    <a href="#searchbar_fullscreen" title="Search" class="nav-link popup-search search-iconaria-haspopup=" true"="" aria-expanded="false">
        <i class="fa fa-search"></i>
    </a>
</li>';
                    }
                }
                $shop_button .= '</ul>';
                ?>
                 <div class="collapse navbar-collapse" id="custom-collapse">
                          <?php
                          wp_nav_menu(array(
                              'theme_location' => 'primary',
                              'container' => 'nav-collapse collapse navbar-inverse-collapse',
                              'menu_class' => 'nav navbar-nav ',
                              'fallback_cb' => 'spicepress_fallback_page_menu',
                              'items_wrap' => $shop_button,
                              'walker' => new spicepress_nav_walker()
                          ));
                          ?>
                </div>
	</div>
</nav>
</div>
<?php if (get_theme_mod('search_effect_style_setting', 'toogle') != 'toogle'): ?>
            <div id="searchbar_fullscreen" <?php if (get_theme_mod('search_effect_style_setting', 'popup_light') == 'popup_light'): ?> class="bg-light" <?php endif; ?>>
                <button type="button" class="close">×</button>
                <form method="get" id="searchform" autocomplete="off" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"><label><input type="search" class="search-field" placeholder="Search …" value="" name="s" id="s"></label><input type="submit" class="search-submit btn" value="<?php echo esc_html__('Search', 'spicepress'); ?>"></form>
            </div>
    <?php endif; ?>
<div class="clearfix"></div>
