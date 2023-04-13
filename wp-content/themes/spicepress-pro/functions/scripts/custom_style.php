<?php
/* TYPOGRAPHY */
$enable_top_widget_typography = get_theme_mod('enable_top_widget_typography',false);
$enable_header_typography = get_theme_mod('enable_header_typography',false);
$enable_banner_typography = get_theme_mod('enable_banner_typography',false);
$enable_section_title_typography = get_theme_mod('enable_section_title_typography',false);
$enable_content_typography = get_theme_mod('enable_content_typography',false);
$enable_post_typography = get_theme_mod('enable_post_typography',false);
$enable_meta_typography = get_theme_mod('enable_meta_typography',false);
$enable_shop_page_typography = get_theme_mod('enable_shop_page_typography',false);
$enable_sidebar_typography = get_theme_mod('enable_sidebar_typography',false);
$enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography',false);
$enable_footer_bar_typography = get_theme_mod('enable_footer_bar_typography',false);

/* COLOR AND BACKGROUND */
$enable_custom_typography = get_theme_mod('enable_custom_typography',false);
$enable_color_background = get_theme_mod('apply_menu_clr_enable',false);
$enable_header_bg_color_background = get_theme_mod('apply_header_bg_clr_enable',false);

/* ========== TOPBAR WIDGETS AREA =========== */

if($enable_top_widget_typography == true)
{
?>
<style>
/* Topbar Widget title */
.header-sidebar .section-header h3.widget-title, .header-widget-info h3.widget-title, .header-sidebar .widget_block .wp-block-group__inner-container h1, .header-sidebar .widget_block .wp-block-group__inner-container h2, .header-sidebar .widget_block .wp-block-group__inner-container h3, .header-sidebar .widget_block .wp-block-group__inner-container h4, .header-sidebar .widget_block .wp-block-group__inner-container h5, .header-sidebar .widget_block .wp-block-group__inner-container h6  {
	font-size:<?php echo get_theme_mod('topbar_widget_title_fontsize','24').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('topbar_widget_title_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('topbar_widget_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('topbar_widget_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('topbar_widget_title_text_transform','default'); ?> !important;
}
/* Topbar Widget Content */
.header-sidebar p, .header-sidebar a, .header-widget-info .contact-area, .header-widget-info .widget p, .header-widget-info .widget a {
	font-size:<?php echo get_theme_mod('top_widget_typography_fontsize','15').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('top_widget_typography_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('top_widget_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('top_widget_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('top_widget_typography_text_transform','default'); ?> !important;
}
</style>
<?php }



/* ========== HAEDER AREA =========== */

if($enable_header_typography == true)
{
?>
<style>
/* Site Title */
.site-title {
	font-size:<?php echo get_theme_mod('site_title_fontsize','30').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('site_title_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('site_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('site_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('site_title_text_transform','default'); ?> !important;
}
/* Site Tagline*/
.site-description {
	font-size:<?php echo get_theme_mod('site_tagline_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('site_tagline_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('site_tagline_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('site_tagline_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('site_tagline_text_transform','default'); ?> !important;
}
/* Menu */
.navbar-nav > li > a {
	font-size:<?php echo get_theme_mod('menu_title_fontsize','14').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('menu_title_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('menu_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('menu_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('menu_title_text_transform','default'); ?> !important;
}
/* Sub-menu */
.dropdown-menu > li > a {
	font-size:<?php echo get_theme_mod('submenu_title_fontsize','14').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('submenu_title_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('submenu_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('submenu_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('submenu_title_text_transform','default'); ?> !important;
}
</style>
<?php }




/* ========== BANNER AREA =========== */

if($enable_banner_typography == true)
{
?>
<style>
/* Page Title */
.page-title h1 {
	font-size:<?php echo get_theme_mod('banner_title_fontsize','32').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('banner_title_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('banner_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('banner_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('banner_title_text_transform','default'); ?> !important;
}
/* Breadcrumb Title */
.page-breadcrumb {
	font-size:<?php echo get_theme_mod('breadcrumb_title_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('breadcrumb_title_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('breadcrumb_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('breadcrumb_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('breadcrumb_title_text_transform','default'); ?> !important;
}
</style>
<?php }




/* ========== HOMEPAGE SECTION =========== */

if($enable_section_title_typography == true)
{
?>
<style>
/* Section Title */
.format-standard h1, .format-status h1, .video-content h1, .section-header h1 {
	font-size:<?php echo get_theme_mod('section_title_fontsize','32').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('section_title_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('section_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('section_title_fontstyle','Normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('section_title_text_transform','default'); ?> !important;
}
.section-header p {
   	font-size:<?php echo get_theme_mod('section_description_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('section_description_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('section_description_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('section_description_fontstyle','Normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('section_description_text_transform','default'); ?> !important;
}
.format-standard p, .format-status p, .format-aside p, .format-quote, .video-content p {
   	font-size:<?php echo get_theme_mod('section_description_fontsize','16') + 2 .'px'; ?> !important;
   	font-weight:<?php echo get_theme_mod('section_description_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('section_description_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('section_description_fontstyle','Normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('section_description_text_transform','default'); ?> !important;
}
</style>
<?php }




/* ========== CONTENT SECTION =========== */

if($enable_content_typography == true)
{
?>
<style>
/* Heading H1 */
.about-section h1, .entry-content h1, .slider-section h1, .cont-section h1  {
	font-size:<?php echo get_theme_mod('h1_typography_fontsize','32').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h1_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('h1_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h1_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h1_typography_text_transform','default'); ?> !important;
}
/* Heading H2 */
.about-section h2, .entry-content h2:not(.woocommerce-page .entry-content h2), .slider-section h2, .cont-section h2 {
	font-size:<?php echo get_theme_mod('h2_typography_fontsize','30').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h2_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('h2_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h2_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h2_typography_text_transform','default'); ?> !important;
}
/* Heading H3*/
.about-section h3, .entry-content h3:not(.woocommerce-page .entry-content h3), .slider-section h3, .cont-section h3, .comment-section h3, .comment-form-section h3, .single-spicepress_portfolio .entry-header h3, .products h3 {
	font-size:<?php echo get_theme_mod('h3_typography_fontsize','24') .'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h3_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('h3_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h3_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h3_typography_text_transform','default'); ?> !important;
}
/* Heading H4 */
.entry-content h4, .entry-header h4, .testmonial-area h4, .team-caption h4, .about-section h4, .entry-content h4, .slider-section h4, .cont-section h4, .sm-callout h4, .team-mambers h4,.testmonial-block h4 {
	font-size:<?php echo get_theme_mod('h4_typography_fontsize','20').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h4_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('h4_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h4_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h4_typography_text_transform','default'); ?> !important;
}
/* Heading H5 */
.about-section h5, .entry-content h5, .slider-section h5, .cont-section h5 {
	font-size:<?php echo get_theme_mod('h5_typography_fontsize','18').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h5_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('h5_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h5_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h5_typography_text_transform','default'); ?> !important;
}
/* Heading H6 */
.team-caption h6, .about-section h6, .entry-content h6, .slider-section h6, .cont-section h6, .blog-author h6, .comment-section h6 {
	font-size:<?php echo get_theme_mod('h6_typography_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h6_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('h6_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h6_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h6_typography_text_transform','default'); ?> !important;
}
/* Paragraph */
.entry-content p,.entry-content p .more-link, .testmonial-area p, .about-section p, .slider-section p, .cont-section p, .comment p, .comment-form-section p, .portfolio-tabs a, .woocommerce-product-details__short-description p, .error_404 p {
	font-size:<?php echo get_theme_mod('p_typography_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('p_typography_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('p_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('p_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('p_typography_text_transform','default'); ?> !important;
}
/* Button Text */
.slide-btn-sm, .format-status-btn-sm, .format-video-btn-sm, .sm-callout-btn a, .search-submit, .wpcf7-form .wpcf7-submit, .mx-auto a,  .woocommerce .button, .woocommerce .added_to_cart, .woocommerce-product-search button, button, .comment-reply-link, #commentform .form-submit,.wp-block-button__link,.blogdetail-btn {
	font-size:<?php echo get_theme_mod('button_text_typography_fontsize','14').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('button_text_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('button_text_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('button_text_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('button_text_typography_text_transform','default'); ?> !important;
}
</style>
<?php }




/* ========== BLOG/ARCHIVES/SINGLE POST =========== */

if($enable_post_typography == true)
{
?>
<style>
.blog-section .entry-header h3, .blog-section .entry-header .entry-title > a:not(#related-posts-carousel .entry-header .entry-title > a){
	font-size:<?php echo get_theme_mod('post-title_fontsize','36').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('post-title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('post-title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('post-title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('post-title_text_transform','default'); ?> !important;
}
</style>
<?php }




/* ========== POST META =========== */

if($enable_meta_typography == true)
{
?>
<style>
.entry-meta, .entry-meta span, .entry-meta a  {
	font-size:<?php echo get_theme_mod('meta_fontsize','14').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('meta_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('meta_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('meta_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('meta_text_transform','default'); ?> !important;
}
</style>
<?php }




/* ========== SHOP PAGE =========== */

if($enable_shop_page_typography == true)
{
?>
<style>
/* Heading H1 */
 .woocommerce div.product .product_title{
	font-size:<?php echo get_theme_mod('shop_h1_typography_fontsize','32').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('shop_h1_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('shop_h1_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('shop_h1_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('shop_h1_typography_text_transform','default'); ?> !important;
}
/* Heading H2 */
.woocommerce .products h2, .woocommerce .cart_totals h2, .woocommerce-Tabs-panel h2, .woocommerce .cross-sells h2{
	font-size:<?php echo get_theme_mod('shop_h2_typography_fontsize','18').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('shop_h2_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('shop_h2_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('shop_h2_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('shop_h2_typography_text_transform','default'); ?> !important;
}
/* Heading H3 */
.woocommerce .checkout h3 {
	font-size:<?php echo get_theme_mod('shop_h3_typography_fontsize','24').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('shop_h3_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('shop_h3_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('shop_h3_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('shop_h3_typography_text_transform','default'); ?> !important;
}
</style>
<?php }




/* ========== SIDEBAR WIDGETS =========== */

if($enable_sidebar_typography == true)
{
?>
<style>
/* Sidebar Widget Title */
.sidebar .widget-title, body .sidebar .wp-block-search .wp-block-search__label, body .sidebar .widget.widget_block h1, body .sidebar .widget.widget_block h2, body .sidebar .widget.widget_block h3, body .sidebar .widget.widget_block h4, body .sidebar .widget.widget_block h5, body .sidebar .widget.widget_block h6, body .sidebar .widget.widget_block .wc-block-product-search__label {
	font-size:<?php echo get_theme_mod('sidebar_fontsize','20').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('sidebar_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('sidebar_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('sidebar_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('sidebar_text_transform','default'); ?> !important;
}
/* Sidebar Widget Content */
.sidebar .widget_recent_entries a, .sidebar a, .sidebar p {
	font-size:<?php echo get_theme_mod('sidebar_widget_content_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('sidebar_widget_content_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('sidebar_widget_content_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('sidebar_widget_content_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('sidebar_widget_content_text_transform','default'); ?> !important;
}
</style>
<?php }



/* ========== FOOTER WIDGETS =========== */

/* Footer Widget */
if($enable_footer_widget_typography == true)
{
?>
<style>
/* Footer Widget Title */
.site-footer .widget-title, .footer-sidebar .wp-block-search__label, .footer-sidebar .widget_block h1, .footer-sidebar .widget_block h2, .footer-sidebar .widget_block h3, .footer-sidebar .widget_block h4, .footer-sidebar .widget_block h5, .footer-sidebar .widget_block h6  {
	font-size:<?php echo get_theme_mod('footer_widget_title_fontsize','24').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('footer_widget_title_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('footer_widget_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('footer_widget_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('footer_widget_title_text_transform','default'); ?> !important;
}
/* Footer Widget Content */
.footer-sidebar .widget_recent_entries a, .footer-sidebar a, .footer-sidebar p {
	font-size:<?php echo get_theme_mod('footer_widget_content_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('footer_widget_content_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('footer_widget_content_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('footer_widget_content_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('footer_widget_content_text_transform','default'); ?> !important;
}
</style>
<?php }



/* ========== FOOTER WIDGETS =========== */

if($enable_footer_bar_typography == true)
{
?>
<style>
.site-footer .site-info{
	font-size:<?php echo get_theme_mod('footer_bar_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('footer_bar_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('footer_bar_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('footer_bar_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('footer_bar_text_transform','default'); ?> !important;
}
</style>
<?php }






/*=============================================================*/
                  /* COLOR & BACKGROUND */
/*=============================================================*/
?>
<style type="text/css">
<?php
if($enable_color_background == true) :
?>
	/* Menu */
	ul.nav.navbar-nav.navbar-right li a,
    ul.nav.navbar-nav li a,
    .navbar5 ul.nav.navbar-nav li a,
    .navbar5 ul.nav.navbar-nav.navbar-right li a,
    .desktop-header .navbar-classic .navbar-nav.navbar-left > li > a,
    .header-center .navbar5 ul.nav.navbar-nav li a {
    	color: <?php echo get_theme_mod('menus_link_color','#061018'); ?>!important;
    }
    ul.nav.navbar-nav.navbar-right li a:hover,
    ul.nav.navbar-nav li a:hover,
    .navbar5 ul.nav.navbar-nav.navbar-right li a:hover,
    .navbar5 ul.nav.navbar-nav li a:hover,
    .desktop-header .navbar-classic .navbar-nav.navbar-left > li > a:hover,
    .desktop-header .navbar-classic .navbar-nav.navbar-left > li > a:focus,
    .header-center .navbar5 ul.nav.navbar-nav li a:hover,.header-center .navbar5 ul.nav.navbar-nav li a:focus {
    	color: <?php echo get_theme_mod('menus_link_hover_color','#ce1b28'); ?>!important;
    }
    ul.nav.navbar-nav.navbar-right li.active > a,ul.nav.navbar-nav li.active > a,
    .navbar-custom .navbar-nav > li.active > a,
    .navbar-custom .navbar-nav > li.active > a:hover,
    .navbar-custom .navbar-nav > li.active > a:focus,
    .navbar5 ul.nav.navbar-nav.navbar-right li.active a,
    .navbar5 ul.nav.navbar-nav li.active a,
    .navbar5 .navbar-custom .navbar-nav > li.active > a,
    .navbar-custom.navbar5.hp-hc .navbar-nav > li.active > a:focus, .navbar-custom.navbar5.hp-hc .navbar-nav > li.active > a:hover,
    .navbar-classic.navbar .navbar-nav > li.active > a, .navbar-classic.navbar .navbar-nav > li.active > a:hover, .navbar-classic.navbar .navbar-nav > li.active > a:focus,.header-center .navbar5 ul.nav.navbar-nav li.active a
   {
    	color: <?php echo esc_html(get_theme_mod('menus_link_active_color','#ffffff')); ?>!important;
    }
    .navbar-center-fullwidth .navbar-nav > li.active > a,
    .navbar-center-fullwidth .navbar-nav > li.active > a:hover,
    .navbar-center-fullwidth .navbar-nav > li.active > a:focus,
    .navbar5.navbar-center-fullwidth .navbar-nav > li.active > a,
    .navbar5.navbar-center-fullwidth .navbar-nav > li.active > a:hover,
    .navbar5.navbar-center-fullwidth .navbar-nav > li.active > a:focus{
        color: <?php echo esc_html(get_theme_mod('menus_link_active_color','#ffffff')); ?>!important;
    }

    /* Submenu */
    ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li,
    .navbar-custom .dropdown-menu > li > a,.open > a ,
    ul.nav.navbar-nav li.dropdown ul.dropdown-menu li,
    .navbar5 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li,
    .navbar5 .navbar-custom .dropdown-menu > li > a,.open > a,
    .navbar5 ul.nav.navbar-nav li.dropdown ul.dropdown-menu li
     {
    	background-color: <?php echo get_theme_mod('submenus_background_color','#282737'); ?>;
    }
    .navbar-custom .dropdown-menu .open > a:hover,.navbar-custom .dropdown-menu > li > a:hover,.navbar-custom .dropdown-menu .open > a, .navbar-custom .dropdown-menu .open > a:focus, .navbar-custom .dropdown-menu .open > a:hover {
        background-color: <?php echo get_theme_mod('submenus_background_hover_color','#282737'); ?>!important;
    }
    ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a ,
    ul.nav.navbar-nav li.dropdown ul.dropdown-menu li a {
    	color: <?php echo get_theme_mod('submenus_link_color','#d5d5d5'); ?>!important;
    }
    ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a:hover ,
    ul.nav.navbar-nav li.dropdown ul.dropdown-menu li a:hover {
    	color: <?php echo get_theme_mod('submenus_link_hover_color','#fff'); ?>!important;
    }
    .nav.navbar-nav .dropdown-item:focus, .nav.navbar-nav .dropdown-item:hover {
	    background-color: transparent!important;
    }
    ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li.active > a ,
    ul.nav.navbar-nav li.dropdown ul.dropdown-menu li.active > a,
    .navbar-custom .navbar-nav .open .dropdown-menu > .active > a,
    .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:hover,
    .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:focus,.header-sticky.stickymenu1 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li.active > a ,.header-sticky.shrink ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li.active > a {
		color: <?php echo get_theme_mod('submenus_link_active_color','#ce1b28'); ?>!important;
    }
<?php endif;

if($enable_header_bg_color_background == true) :
?>
	/* Header */
        <?php if(get_theme_mod('header_varition', 'standard') == 'classic'){ ?>
        .header-widget-info{
            background-color: <?php echo get_theme_mod('header_background_color1','rgba(0,0,0,0.2)'); ?> !important;
        }
        <?php } ?>

	nav.navbar.navbar-custom:not(.navbar5),.header-sticky.shrink,.header-sticky.shrink.shrink1 .index5,.header-center.header-sticky .index5 {
        background-color: <?php echo get_theme_mod('header_background_color1','rgba(0,0,0,0.2)'); ?> !important;
    }
    .site-title a{
        color: <?php echo get_theme_mod('site_title_link_color','#ce1b28'); ?>!important;
    }
    .site-title a:hover{
        color: <?php echo get_theme_mod('site_title_link_hover_color','#ce1b28'); ?>!important;
    }
    .site-description{
        color: <?php echo get_theme_mod('site_tagline_text_color','#64646d'); ?>!important;
    }
    .site-description:hover{
        color: <?php echo get_theme_mod('site_tagline_hover_color','#64646d'); ?>!important;
    }
<?php endif;?>
/* Banner */
.page-title-section .page-title h1 {
	color: <?php echo get_theme_mod('banner_text_color','#fff'); ?>;
}
/* Breadcrumb */
<?php
	$enable_brd_link_clr_setting=get_theme_mod('enable_brd_link_clr_setting',false);
	if($enable_brd_link_clr_setting==true): ?>
		.page-breadcrumb > li a, .page-breadcrumb > li.active a,.page-breadcrumb > li + li:before {
			color: <?php echo get_theme_mod('breadcrumb_title_link_color','#ffffff');?> !important;
	}
    .page-breadcrumb > li a:hover, .page-breadcrumb > li.active a:hover {
    	color: <?php echo get_theme_mod('breadcrumb_title_link_hover_color','#ffffff'); ?> !important;
    }
<?php endif;

$enable_content_clr_setting=get_theme_mod('apply_content_clr_enable',false);
if($enable_content_clr_setting==true): ?>
    /* Content */
    .product h1,.about-section h1,.entry-content h1, body .section-header h1.widget-title,.cont-section h1,.slider-content h1 {
        color: <?php echo get_theme_mod('h1_color','#061018'); ?> !important;
    }
    .section-header .section-header h2, body h2:not(.footer-sidebar h2){
        color: <?php echo get_theme_mod('h2_color','#061018'); ?>!important;
    }
    .entry-content h3,.products > h3 a,.about-section h3,.cont-section h3, .cont-section .sidebar .section-header .widget-title,.slider-content h3,.single-spicepress_portfolio h3,.comment-title h3 {
        color: <?php echo get_theme_mod('h3_color','#061018'); ?>!important;
    }
    .entry-header h4.entry-title a,.team-caption h4,.about-section h4,.cont-section h4,.slider-content h4,.entry-content h4,.error_404 h4,.team-mambers h4 {
        color: <?php echo get_theme_mod('h4_color','#061018'); ?>!important;
    }
    .product-price h5 > a,.blog-author h5, body .comment-detail h5,.about-section h5,.cont-section h5,.slider-content h5,.entry-content h5 {
        color: <?php echo get_theme_mod('h5_color','#061018'); ?>;
    }
    .section-header h6,.team-caption h6,.about-section h6,.cont-section h6,.slider-content h6,.entry-content h6,.media-body h6 {
        color: <?php echo get_theme_mod('h6_color','#061018'); ?>!important;
    }
    .section-header p:not(.testimonial-section p), .entry-content p:not(.testimonial-section p),.about-section p,.cont-section p,.slider-content p,.woocommerce-product-details__short-description p,.search p,.error_404 p {
        color: <?php echo get_theme_mod('p_color','#061018'); ?>!important;
    }
<?php endif;?>
/* Slider Section */
#slider-carousel .slide-text-bg1 h1,#slider-carousel .format-video h1,#slider-carousel .format-status h1{
    color: <?php echo get_theme_mod('home_slider_title_color','#ffffff');?>!important;
}
#slider-carousel .format-quote,#slider-carousel .format-aside p,.slide-text-bg1 p,#slider-carousel .format-video p,#slider-carousel .format-status p {
    color: <?php echo get_theme_mod('home_slider_subtitle_color','#ffffff'); ?>!important;
}
<?php if(get_theme_mod('apply_slider_clr_enable',false)==true):?>
	.slide-btn-sm,.format-status-btn-sm,.format-video-btn-sm {
		background: <?php echo get_theme_mod('slider_btn1_color','#ce1b28'); ?>!important;
	}
	.slide-btn-sm:hover,.format-video-btn-sm:hover,.format-status-btn-sm:hover {
		background: <?php echo get_theme_mod('slider_btn1_hover_color','#ce1b28'); ?>!important;
	}
	.slide-btn-sm,.format-status-btn-sm,.format-video-btn-sm {
		color: <?php echo get_theme_mod('slider_btn_text_color','#ffffff'); ?>!important;
	}
	.slide-btn-sm:hover,.format-video-btn-sm:hover,.format-status-btn-sm:hover {
		color: <?php echo get_theme_mod('slider_btn_text_hover_color','#ffffff'); ?>!important;
	}
<?php endif;?>

/* Testimonial Section */
<?php 
if((get_theme_mod('spicepress_color_skin','light')=='dark') && (get_theme_mod('apply_testimonial_dark_enable',false)==true)):?>
		.testimonial-section h1.white {
		    color: <?php echo get_theme_mod('home_testi_title_color','#ffffff'); ?> !important;
		}
		.testimonial-section p.white {
		    color: <?php echo get_theme_mod('home_testi_subtitle_color','#ffffff'); ?>!important;
		}
		.testimonial-section .author-box img {
		    border: 2px solid <?php echo get_theme_mod('home_testi_img_border_color','#ffffff'); ?>!important;
		}
		.testimonial-section .author-description p, .testimonial-section .testmonial-block .entry-content p,.dark .testimonial-section .author-description p {
		    color: <?php echo get_theme_mod('testimonial_description_color','#64646d'); ?>!important;
		}
		.testmonial-area .name a,.testmonial-area .name, .testimonial-section h4 a {
		    color: <?php echo get_theme_mod('testi_clients_name_color','#ffffff'); ?>!important;
		}
		.testmonial-area span.designation, .testimonial-section .designation{
		    color: <?php echo get_theme_mod('testi_clients_designation_color','#ffffff'); ?>!important;
		}
	<?php endif;
if(get_theme_mod('spicepress_color_skin','light')=='light'): ?>
	.testimonial-section h1.white {
	    color: <?php echo get_theme_mod('home_testi_title_color','#ffffff'); ?> !important;
	}
	.testimonial-section p.white {
	    color: <?php echo get_theme_mod('home_testi_subtitle_color','#ffffff'); ?>!important;
	}
	.testimonial-section .author-box img {
	    border: 2px solid <?php echo get_theme_mod('home_testi_img_border_color','#ffffff'); ?>!important;
	}
	.testimonial-section .author-description p, .testimonial-section .testmonial-block .entry-content p,.dark .testimonial-section .author-description p {
	    color: <?php echo get_theme_mod('testimonial_description_color','#64646d'); ?>!important;
	}
	.testmonial-area .name a,.testmonial-area .name, .testimonial-section h4 a {
	    color: <?php echo get_theme_mod('testi_clients_name_color','#ffffff'); ?>!important;
	}
	.testmonial-area span.designation, .testimonial-section .designation{
	    color: <?php echo get_theme_mod('testi_clients_designation_color','#ffffff'); ?>!important;
	}
<?php endif;?>
/* CTA SECTION */
<?php 
if((get_theme_mod('spicepress_color_skin','light')=='dark') && (get_theme_mod('apply_cta_dark_enable',false)==true)):?>
	.sm-callout h4, .sm-callout h4 abbr  {
	    color: <?php echo get_theme_mod('home_cta_title_color','#64646d'); ?>!important;
	}
<?php endif;
if(get_theme_mod('spicepress_color_skin','light')=='light'): ?>
	.sm-callout h4, .sm-callout h4 abbr  {
    color: <?php echo get_theme_mod('home_cta_title_color','#64646d'); ?>!important;
}
<?php endif;?>
.cta p {
    color: <?php echo get_theme_mod('home_cta_subtitle_color','#ffffff'); ?>;
}
<?php
if(get_theme_mod('apply_cta_clr_enable',false)==true):?>
    .sm-callout-btn a {
    	background: <?php echo get_theme_mod('home_cta_btn_color','#ce1b28'); ?>  !important;
    }
    .sm-callout-btn a:hover {
    	background: <?php echo get_theme_mod('home_cta_btn_hover_color','#ce1b28'); ?>  !important;
    }
    .sm-callout-btn a{
    	color: <?php echo get_theme_mod('home_cta_btn_text_color','#ffffff'); ?>  !important;
    }
    .sm-callout-btn a:hover{
    	color: <?php echo get_theme_mod('home_cta_btn_text_hover_color','#ffffff'); ?>  !important;
    }
<?php endif;

if((get_theme_mod('apply_blg_clr_enable',false)==true) && (!is_single())):?>
    .blog-section .entry-header .entry-title > a {
        color: <?php echo get_theme_mod('blog_post_page_title_color','#061018'); ?>!important;
    }
    .blog-section .entry-header .entry-title > a:hover {
        color: <?php echo get_theme_mod('blog_post_page_title_hover_color','#ce1b28'); ?>!important;
    }
    .home-news .author a,.home-news .cat-links a,.home-news span,.home-news .tag-links a,.blog-section .author a,.blog-section .cat-links a,.blog-section .tag-links a, .entry-meta .author, .entry-meta .cat-links, .entry-meta .tag-links {
        color: <?php echo get_theme_mod('blog_post_page_meta_link_color','#9f9f9f'); ?>!important;
    }
    .blog-section .entry-header .entry-meta a:hover,.home-news .author a:hover,.home-news .cat-links a:hover,.home-news .tag-links a:hover{
        color: <?php echo get_theme_mod('blog_post_page_meta_link_hover_color','#ce1b28'); ?>!important;
    }
    .section-module.blog .entry-meta .cat-links a, .section-module.blog .standard-view .entry-meta .author a, .section-module.blog .list-view .entry-meta .author a, .section-module.blog.grid-view .entry-meta .author a, .section-module.blog .entry-meta .comment-links a::before, .entry-meta .posted-on a, .entry-meta .comment-links a, .section-module.blog .entry-meta .comment-links a::before {
        color: <?php echo get_theme_mod('blog_post_page_meta_link_color','#061018'); ?>!important;
    }
    .section-module.blog .entry-meta .cat-links a:hover, .section-module.blog .standard-view .entry-meta .author a:hover, .section-module.blog .list-view .entry-meta .author a:hover, .section-module.blog .entry-meta .comment-links a:hover::before, .section-module.blog .entry-meta a:hover, .section-module.blog.grid-view .entry-meta .author a:hover {
        color: <?php echo get_theme_mod('blog_post_page_meta_link_hover_color','#2d6ef8'); ?>!important;
    }
<?php endif;?>

/* Single Post/Page */
<?php
if(get_theme_mod('apply_blg_single_clr_enable',false)==true && (is_single())):?>
	.single-post h3.entry-title {
	    color: <?php echo get_theme_mod('single_post_page_title_color','#061018'); ?>!important;
	}
	.single-post .author a,.single-post .cat-links a,.single-post .tag-links a,.entry-meta > span {
	    color: <?php echo get_theme_mod('single_post_page_meta_link_color','#061018'); ?>!important;
	}
	.single-post .author a:hover,.single-post .cat-links a:hover,.single-post .tag-links a:hover,.single-post .entry-meta .comment-links a:hover, .single-post .entry-meta .posted-on a:hover {
	    color: <?php echo get_theme_mod('single_post_page_meta_link_hover_color','#2d6ef8'); ?>!important;
	}
<?php endif;?>

/* Sidebar */
<?php 
if((get_theme_mod('spicepress_color_skin','light')=='dark') && (get_theme_mod('apply_sidebar_dark_enable',false)==true)):?>
	body .sidebar .section-header .widget-title, body .sidebar .wp-block-search .wp-block-search__label, body .sidebar .widget.widget_block h1, body .sidebar .widget.widget_block h2, body .sidebar .widget.widget_block h3, body .sidebar .widget.widget_block h4, body .sidebar .widget.widget_block h5, body .sidebar .widget.widget_block h6, body .sidebar .widget.widget_block .wc-block-product-search__label {
	    color: <?php echo get_theme_mod('sidebar_widget_title_color','#ffffff'); ?>!important;
	}
	body .sidebar p {
	    color: <?php echo get_theme_mod('sidebar_widget_text_color','#64646d'); ?>!important;
	}
	.sidebar a,body.dark .sidebar a,body.dark .sidebar .widget.widget_block a,body.dark .sidebar .tagcloud a, body.dark .sidebar .wp-block-tag-cloud a{
	    color: <?php echo get_theme_mod('sidebar_widget_link_color','#64646d'); ?>!important;
	}
 <?php endif;?>
<?php if(get_theme_mod('spicepress_color_skin','light')=='light'):?>
	body .sidebar .section-header .widget-title, body .sidebar .wp-block-search .wp-block-search__label, body .sidebar .widget.widget_block h1, body .sidebar .widget.widget_block h2, body .sidebar .widget.widget_block h3, body .sidebar .widget.widget_block h4, body .sidebar .widget.widget_block h5, body .sidebar .widget.widget_block h6, body .sidebar .widget.widget_block .wc-block-product-search__label {
    color: <?php echo get_theme_mod('sidebar_widget_title_color','#ffffff'); ?>!important;
	}
	body .sidebar p {
	    color: <?php echo get_theme_mod('sidebar_widget_text_color','#64646d'); ?>!important;
	}
	.sidebar a,body.dark .sidebar a,body.dark .sidebar .widget.widget_block a,body.dark .sidebar .tagcloud a, body.dark .sidebar .wp-block-tag-cloud a{
	    color: <?php echo get_theme_mod('sidebar_widget_link_color','#64646d'); ?>!important;
	}		
<?php endif;?>
<?php
	if(get_theme_mod('apply_sibar_link_hover_clr_enable',false)==true):?>
		body .sidebar.s-l-space .sidebar a:hover, body .sidebar .widget a:hover, .widget a:focus,body.dark .sidebar a:hover,body.dark .sidebar .widget.widget_block a:hover,body.dark .sidebar .tagcloud a:hover, body.dark .sidebar .wp-block-tag-cloud a:hover,body.dark .sidebar li a:hover {
	    	color: <?php echo get_theme_mod('sidebar_widget_link_hover_color','#2d6ef8'); ?>!important;
		}
	<?php endif;?>
/* Footer Widgets */
<?php
if(get_theme_mod('apply_ftrsibar_link_hover_clr_enable',false)==true) { ?>
    body .site-footer .widget-title, body .footer-sidebar .wp-block-search__label, body .footer-sidebar .widget_block h1, body .footer-sidebar .widget_block h2, body .footer-sidebar .widget_block h3, body .footer-sidebar .widget_block h4, body .footer-sidebar .widget_block h5, body .footer-sidebar .widget_block h6 {
        color: <?php echo get_theme_mod('footer_widget_title_color','#ffffff'); ?>;
    }
    body .footer-sidebar p,  body .footer-sidebar .widget, .sp-schemes .widget-address address,.sp-schemes .widget-address address abbr {
        color: <?php echo get_theme_mod('footer_widget_text_color','#ffffff'); ?>!important;
    }
    body .footer-sidebar .widget a, body .footer-sidebar .widget_recent_entries .post-date, body .footer-sidebar .widget.widget_block li a  {
        color: <?php echo get_theme_mod('footer_widget_link_color','#ffffff'); ?>;
    }
    body .footer-sidebar .widget a:hover {
        color: <?php echo get_theme_mod('footer_widget_link_hover_color','#2d6ef8'); ?>!important;
    }
    <?php }
else { ?>
    .site-footer p {
        color: #fff;
    }
<?php   }
if(get_theme_mod('apply_footer_bar_enable',false)==true):
?>
    /* Footer Bar */
    body .site-info p{
        color: <?php echo get_theme_mod('footer_bar_text_color','#bec3c7'); ?>;
    }
    body .site-info a {
        color: <?php echo get_theme_mod('footer_bar_link_color','#ffffff'); ?> ;
    }
    body .site-info a:hover {
        color: <?php echo get_theme_mod('footer_bar_link_hover_color','#2d6ef8'); ?>;
    }
<?php endif;?>

        /* Sticky Header Color shceme */
    <?php if (get_theme_mod('sticky_header_clr_enable', false) == true) : ?>
        nav.header-sticky.stickymenu1, nav.header-sticky.stickymenu, nav.header-sticky.shrink1,.header-sticky.stickymenu .header-widget-info,.header-sticky.stickymenu .navbar-classic,.header-sticky.shrink1 .header-widget-info,.header-sticky.shrink1 .navbar.navbar-custom:not(.navbar5),.header-sticky.shrink.shrink1 .index5,.header-sticky.shrink.shrink1.navbar.navbar-custom,nav.navbar.navbar-custom.header-sticky.stickymenu,.header-sticky.stickymenu nav.navbar.navbar-custom,.header-sticky.stickymenu1 .index5,.header-sticky.stickymenu1 .header-widget-info,.header-sticky.stickymenu1 .navbar-classic.navbar.navbar-custom:not(.navbar5),.header-sticky.stickymenu1.navbar.navbar-custom
        {
            background-color: <?php echo get_theme_mod('sticky_header_bg_color', '#ffffff'); ?> !important;
        }
        .header-sticky.stickymenu1 .site-title a, .header-sticky.stickymenu .site-title a, .header-sticky.shrink1 .site-title a
        {
            color: <?php echo get_theme_mod('sticky_header_title_color', '#ce1b28'); ?> !important;
        }
        .header-sticky.stickymenu1 .site-description, .header-sticky.stickymenu .site-description, .header-sticky.shrink1 .site-description
        {
            color: <?php echo get_theme_mod('sticky_header_subtitle_color', '#64646d'); ?> !important;
        }
        .navbar-custom.header-sticky.stickymenu .nav .page_item > a,
        .navbar-custom.header-sticky.stickymenu .nav .page_item > a,
        nav.header-sticky.shrink1 .nav .page_item > a,
        .navbar-custom.header-sticky.stickymenu1 .navbar-nav li > a,
        .navbar-custom.header-sticky.stickymenu .navbar-nav li > a,
        .header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li a,
        .header-sticky.stickymenu ul.nav.navbar-nav li a,
        nav.navbar5.hp-hc.stickymenu .navbar-nav li.dropdown.open > a,
        .navbar-classic .navbar-nav > li > a,
        .header-center.header-sticky.shrink1 .navbar5 ul.nav.navbar-nav li a,
        .navbar5 ul.nav.navbar-nav li a,
        .header-sticky.shrink1 ul.nav.navbar-nav.navbar-right li a,.desktop-header .header-sticky.shrink1.navbar-center-fullwidth ul.nav.navbar-nav li a{
            color: <?php echo get_theme_mod('sticky_header_menus_link_color', '#666666'); ?> !important;
        }
        .header-sticky.stickymenu1 .nav .page_item > a:hover, .header-sticky.stickymenu1 .navbar-nav li.current_page_item > a:hover, .header-sticky.stickymenu .nav .page_item > a :hover, .header-sticky.stickymenu .navbar-nav li.current_page_item > a:hover , .header-sticky.shrink1 .nav .page_item > a:hover, .header-sticky.shrink1 .navbar-nav li.current_page_item > a:hover,
        .header-sticky.stickymenu1 .navbar-nav li > a:hover,
        .navbar-custom.header-sticky.stickymenu  .navbar-nav li > a:hover,
        .header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li a:hover,.header-sticky.stickymenu1 ul.nav.navbar-nav.navbar-right li a:hover,.header-sticky.shrink.shrink1 ul.nav.navbar-nav.navbar-right li a:hover, .navbar5 ul.nav.navbar-nav li a:hover,.header-center.header-sticky.shrink1 .navbar5 ul.nav.navbar-nav li a:hover,.header-center.header-sticky.shrink1 .navbar5 ul.nav.navbar-nav li a:focus,.desktop-header .header-sticky.shrink1.navbar-center-fullwidth ul.nav.navbar-nav li a:hover,.desktop-header .header-sticky.shrink1.navbar-center-fullwidth ul.nav.navbar-nav li a:focus{
            color: <?php echo get_theme_mod('sticky_header_menus_link_hover_color', '#061018'); ?> !important;
        }
        .header-sticky.stickymenu1 .navbar-nav li.current_page_item > a, .header-sticky.stickymenu .navbar-nav li.current_page_item > a, .header-sticky.shrink1 .navbar-nav li.current_page_item > a,.navbar-custom.header-sticky.stickymenu ul.nav.navbar-nav li.active > a, .navbar-custom.header-sticky.stickymenu .navbar-nav > li.active > a,
        .header-sticky.stickymenu .navbar-classic .navbar-nav > li.active > a,
        .header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li.active > a,
        .header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li.active > a,
        .header-sticky.stickymenu ul.nav.navbar-nav li.dropdown ul.dropdown-menu li.active > a,.header-sticky.stickymenu1 ul.nav.navbar-nav.navbar-right li.active > a,.header-sticky.shrink.shrink1 ul.nav.navbar-nav.navbar-right li.active > a,.header-center.shrink1 .navbar5 ul.nav.navbar-nav li.active a,.desktop-header .header-sticky.shrink1.navbar-center-fullwidth ul.nav.navbar-nav li.active a{
            color: <?php echo get_theme_mod('sticky_header_menus_link_active_color', '#ce1b28'); ?> !important;
        }
        /* Sticky Header Submenus */
        .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-menu > li > a, .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-menu > li > a, .header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a, .header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a, .header-sticky.shrink1 .nav.navbar-nav .dropdown-menu > li > a, .header-sticky.shrink1 .nav.navbar-nav .dropdown-menu > li > a,
        .navbar-custom.header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li,
        .navbar-custom.header-sticky.stickymenu .navbar-custom .dropdown-menu > li > a, .open > a,
        .navbar-custom.header-sticky.stickymenu ul.nav.navbar-nav li.dropdown ul.dropdown-menu li,
        .navbar-custom.header-sticky.stickymenu .navbar5 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li,
        .navbar-custom.header-sticky.stickymenu .navbar5 .navbar-custom .dropdown-menu > li > a, .open > a,
        .navbar-custom.header-sticky.stickymenu .navbar5 ul.nav.navbar-nav li.dropdown ul.dropdown-menu li,
        .header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li,
        .header-sticky.stickymenu ul.nav.navbar-nav li.dropdown ul.dropdown-menu li,.header-sticky.stickymenu1 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li,.header-sticky.shrink.shrink1 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li,.header-sticky.shrink.shrink1 .navbar5 ul.nav.navbar-nav li.dropdown ul.dropdown-menu li,.desktop-header .header-sticky.shrink1.navbar-center-fullwidth ul.nav.navbar-nav li.dropdown ul.dropdown-menu li{
            background-color: <?php echo get_theme_mod('sticky_header_submenus_background_color', '#061018'); ?>;
        }
        .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-menu > li > a, .header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a, .header-sticky.shrink1 .nav.navbar-nav .dropdown-menu > li > a,
        .header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a,
        .header-sticky.stickymenu ul.nav.navbar-nav li.dropdown ul.dropdown-menu li a,
        body .navbar-custom.navbar5.hp-hc.header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a,.header-sticky.stickymenu1 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a,.header-sticky.shrink.shrink1 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a,.header-sticky.shrink1 .navbar-custom.navbar5 .nav.navbar-nav .dropdown-menu > li > a{
            color: <?php echo get_theme_mod('sticky_header_submenus_link_color', '#ffffff'); ?> !important;
        }
        .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-menu > li > a:hover, .header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a:hover,  .header-sticky.shrink1 .nav.navbar-nav .dropdown-menu > li > a:hover,
        .header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a:hover,
        .header-sticky.stickymenu ul.nav.navbar-nav li.dropdown ul.dropdown-menu li a:hover,
        body .navbar-custom.navbar5.hp-hc.header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a:hover,
        body .navbar-custom.navbar5.hp-hc.header-sticky.stickymenu .nav.navbar-nav .current-menu-ancestor.current_page_ancestor.dropdown.active.open .dropdown-menu a:hover,.header-sticky.stickymenu1 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a:hover,.header-sticky.shrink.shrink1 ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li a:hover,body .header-sticky.shrink.shrink1 .navbar5.hp-hc.header-sticky.shrink1 .nav.navbar-nav .dropdown-menu > li > a:hover{
            color: <?php echo get_theme_mod('sticky_header_submenus_link_hover_color', '#ce1b28'); ?> !important;
        }
        .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-menu > li > a:focus, .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-menu > li > a:hover, .header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a:focus, .header-sticky.stickymenu .nav.navbar-nav .dropdown-menu > li > a:hover, .header-sticky.shrink1 .nav.navbar-nav .dropdown-menu > li > a:focus, .header-sticky.shrink1 .nav.navbar-nav .dropdown-menu > li > a:hover
        {
            background-color: transparent;
        }

        .navbar-custom.header-sticky.stickymenu ul.nav.navbar-nav.navbar-right li.dropdown ul.dropdown-menu li.active > a,
        .navbar-custom.header-sticky.stickymenu ul.nav.navbar-nav li.dropdown ul.dropdown-menu li.active > a,
        .navbar-custom.header-sticky.stickymenu .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-custom.header-sticky.stickymenu .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-custom.header-sticky.stickymenu .navbar-nav .open .dropdown-menu > .active > a:focus,
        body .navbar-custom.navbar5.hp-hc.header-sticky.stickymenu .nav.navbar-nav .current-menu-ancestor.current_page_ancestor.dropdown.active.open > a,.header-sticky.shrink1 ul.nav.navbar-nav li.dropdown ul.dropdown-menu li.active > a{
        	color: <?php echo get_theme_mod('sticky_header_menus_link_active_color', '#ce1b28'); ?> !important;
        }

    <?php endif; ?>

        .header-sticky.stickymenu1, .header-sticky.stickymenu, .header-sticky.shrink
        {
            opacity: <?php echo get_theme_mod('sticky_header_opacity', '1.0'); ?>;
            <?php if (get_theme_mod('sticky_header_height', 0) > 0 && get_theme_mod('sticky_header_animation') != 'shrink'){ ?>;
                padding-top: <?php echo get_theme_mod('sticky_header_height', 0); ?>px;
                padding-bottom: <?php echo get_theme_mod('sticky_header_height', 0); ?>px;
            <?php } ?>
        }
        .header-sticky.shrink.shrink1{
        	padding-top: 0;
        }
        .header-sticky.shrink .page-title-section {
   			margin: 175px 0;
         }   
</style>
