<?php
// Typography
$enable_top_widget_typography = get_theme_mod('enable_top_widget_typography',false);
$enable_header_typography = get_theme_mod('enable_header_typography',false);
$enable_banner_typography = get_theme_mod('enable_banner_typography',false);
$enable_section_title_typography = get_theme_mod('enable_section_title_typography',false);
$enable_slider_title_typography = get_theme_mod('enable_slider_title_typography',false);
$enable_content_typography = get_theme_mod('enable_content_typography',false);
$enable_post_typography = get_theme_mod('enable_post_typography',false);
$enable_meta_typography = get_theme_mod('enable_meta_typography',false);
$enable_shop_page_typography = get_theme_mod('enable_shop_page_typography',false);
$enable_sidebar_typography = get_theme_mod('enable_sidebar_typography',false);
$enable_footer_bar_typography = get_theme_mod('enable_footer_bar_typography',false);
$enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography',false);
$enable_after_btn_typography= get_theme_mod('enable_after_btn_typography',false);


/* Top Widget Area */
if($enable_top_widget_typography == true)
{
?>
<style>
.header-sidebar .widgettitle {
	font-size:<?php echo get_theme_mod('topbar_widget_title_fontsize','30').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('topbar_widget_title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('topbar_widget_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('topbar_widget_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('topbar_widget_title_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('topbar_widget_title_line_height','45').'px'; ?> !important;

}
.head-contact-info li, .head-contact-info li a, .header-sidebar .custom-social-icons li > a, .header-sidebar p, .header-sidebar a {
	font-size:<?php echo get_theme_mod('top_widget_typography_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('top_widget_typography_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('top_widget_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('top_widget_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('top_widget_typography_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('topbar_widget_content_line_height','30').'px'; ?> !important;
}
</style>
<?php }


/* Site title and tagline */
if($enable_header_typography == true)
{
?>
<style>
.site-title {
	font-size:<?php echo get_theme_mod('site_title_fontsize','36').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('site_title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('site_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('site_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('site_title_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('site_title_line_height','39').'px'; ?> !important;
}

.site-description {
	font-size:<?php echo get_theme_mod('site_tagline_fontsize','20').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('site_tagline_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('site_tagline_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('site_tagline_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('site_tagline_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('site_tagline_line_height','30').'px'; ?> !important;
}

.navbar .nav > li > a {
	font-size:<?php echo get_theme_mod('menu_title_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('menu_title_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('menu_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('menu_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('menu_title_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('menu_line_height','30').'px'; ?> !important;
}

.dropdown-menu .dropdown-item{
	font-size:<?php echo get_theme_mod('submenu_title_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('submenu_title_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('submenu_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('submenu_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('submenu_title_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('submenu_line_height','30').'px'; ?> !important;
}
</style>
<?php }


/* After Title */
if($enable_after_btn_typography == true)
{
?>
<style>
.navbar .nav > li > a.honeypress_header_btn {
	font-size:<?php echo get_theme_mod('after_btn_fontsize','15').'px'; ?> !important;
	line-height:<?php echo get_theme_mod('after_btn_lheight','1').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('after_btn_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('after_btn_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('after_btn_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('after_btn_text_transform','default'); ?> !important;
}
</style>
<?php }

/* Banner Title */
if($enable_banner_typography == true)
{
?>
<style>
.page-title h1 {
	font-size:<?php echo get_theme_mod('banner_title_fontsize','36').'px'; ?> !important;
	line-height:<?php echo get_theme_mod('banner_title_fontsize','36') + 5 .'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('banner_title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('banner_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('banner_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('banner_title_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('banner_titl_line_height','41').'px'; ?> !important;
}

/* Breadcrumb Title */
.page-breadcrumb a, .page-breadcrumb span {
	font-size:<?php echo get_theme_mod('breadcrumb_title_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('breadcrumb_title_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('breadcrumb_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('breadcrumb_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('breadcrumb_title_text_transform','default'); ?> !important;
	line-height:<?php echo get_theme_mod('breadcrumb_line_height','30').'px'; ?> !important;
}
</style>
<?php }


/* Section Title */
if($enable_section_title_typography == true)
{
?>
<style>
 .section-header p {
	font-size:<?php echo get_theme_mod('section_description_fontsize','16').'px'; ?> !important;
	line-height:<?php echo get_theme_mod('section_description_fontsize','16') + 5 .'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('section_description_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('section_description_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('section_description_fontstyle','Normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('section_description_text_transform','default'); ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('section_description_line_height','30')).'px'; ?> !important;
}

.section-header h2, .contact .section-header h2 {
   font-size:<?php echo get_theme_mod('section_title_fontsize','36').'px'; ?> !important;
	line-height:<?php echo get_theme_mod('section_title_fontsize','36') + 5 .'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('section_title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('section_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('section_title_fontstyle','Normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('section_title_text_transform','default'); ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('section_title_line_height','54')).'px'; ?> !important;
}

</style>
<?php }


/* Slider Title */
if($enable_slider_title_typography == true)
{
?>
<style>
.slider-caption h1  {
	font-size:<?php echo get_theme_mod('slider_title_fontsize','65').'px'; ?> !important;
	line-height:<?php echo get_theme_mod('slider_title_fontsize','65') + 5 .'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('slider_title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('slider_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('slider_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('slider_title_text_transform','default'); ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('slider_line_height','85')).'px'; ?> !important;
}
</style>
<?php }


/* Content */
if($enable_content_typography == true)
{
?>
<style>
/* Heading H1 */
.about h1, .entry-content h1, .service h1, .contact h1, .error-page h1 , .nav-item.html h1, .navbar5 .nav-item h1, .nav-item.radix-html h1 {
	font-size:<?php echo get_theme_mod('h1_typography_fontsize','36').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h1_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('h1_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h1_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h1_typography_text_transform','default'); ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('h1_line_height','54')).'px'; ?> !important;;
}

/* Heading H2 */
.entry-content h2, .cta-block h2, .error-page h2, .about h2, .service h2, .contact h2, .nav-item.html h2, .navbar5 .nav-item h2, .nav-item.radix-html h2{
	font-size:<?php echo get_theme_mod('h2_typography_fontsize','30').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('h2_line_height','45')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h2_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('h2_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h2_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h2_typography_text_transform','default'); ?> !important;
}

/* Heading H3 */
.entry-content h3, .related-posts h3, .entry-header h3, .about h3, .service h3, .contact h3, .contact-form-map .title h3 , .nav-item.html h3, .navbar5 .nav-item h3, .nav-item.radix-html h3{
	font-size:<?php echo get_theme_mod('h3_typography_fontsize','24').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('h3_line_height','36')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h3_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('h3_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h3_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h3_typography_text_transform','default'); ?> !important;
}
.comment-title h3{
	font-size:<?php echo get_theme_mod('h3_typography_fontsize','24') + 4 .'px'; ?> !important;
	line-height:<?php echo get_theme_mod('h3_typography_fontsize','24') + 4 + 5 .'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h3_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('h3_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h3_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h3_typography_text_transform','default'); ?> !important;
}

/* Heading H4 */
.entry-content h4, .entry-header h4, .team-grid h4, .entry-header h4 a, .contact-widget h4, .about h4, .testimonial .testmonial-block .name, .service h4, .contact h4, .nav-item.html h4, .navbar5 .nav-item h4, .nav-item.radix-html h4 {
	font-size:<?php echo get_theme_mod('h4_typography_fontsize','20').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('h4_line_height','30')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h4_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('h4_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h4_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h4_typography_text_transform','default'); ?> !important;
}

/* Heading H5 */
.product-price h5, .blog-author h5, .comment-detail h5, .entry-content h5, .about h5, .service h5, .contact h5, .nav-item.html h5, .navbar5 .nav-item h5, .nav-item.radix-html h5 {
	font-size:<?php echo get_theme_mod('h5_typography_fontsize','18').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('h5_line_height','24')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h5_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('h5_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h5_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h5_typography_text_transform','default'); ?> !important;
}

/* Heading H6 */
.entry-content h6, .about h6, .service h6, .contact h6 , .nav-item.html h6, .navbar5 .nav-item h6, .nav-item.radix-html h6{
	font-size:<?php echo get_theme_mod('h6_typography_fontsize','14').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('h6_line_height','21')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('h6_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('h6_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('h6_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('h6_typography_text_transform','default'); ?> !important;
}

/* Paragraph */
.entry-content p, .cta-block p, .about-content p, .funfact p, .woocommerce-product-details__short-description p, .wpcf7 .wpcf7-form p label, .testimonial .testmonial-block .designation, .about p, .entry-content li, .contact address, .contact p, .service p, .contact p, .nav-item.html p, .navbar5 .nav-item p, .nav-item.radix-html p{
	font-size:<?php echo get_theme_mod('p_typography_fontsize','16').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('p_line_height','30')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('p_typography_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('p_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('p_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('p_typography_text_transform','default'); ?> !important;
}
.slider-caption p{
	font-size:<?php echo get_theme_mod('p_typography_fontsize','16') + 2 .'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('p_line_height','30')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('p_typography_fontweight','400'); ?> !important;
	font-family:<?php echo get_theme_mod('p_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('p_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('p_typography_text_transform','default'); ?> !important;
}
.portfolio .tab a, .portfolio .nav-item a{
	font-size:<?php echo get_theme_mod('p_typography_fontsize','16').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('p_line_height','30')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('p_typography_fontweight','400')+ 200; ?> !important;
	font-family:<?php echo get_theme_mod('p_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('p_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('p_typography_text_transform','default'); ?> !important;
}


/* Button Text */
.btn-combo a, .mx-auto a, .pt-3 a, .wpcf7-form .wpcf7-submit,  .woocommerce .button, .widget.widget_search button, .widget .wp-block-search button {
	font-size:<?php echo get_theme_mod('button_text_typography_fontsize','16').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('button_line_height','30')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('button_text_typography_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('button_text_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('button_text_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('button_text_typography_text_transform','default'); ?> !important;
}
</style>
<?php }

/* Blog / Archive / Single Post */
if($enable_post_typography == true)
{
?>
<style>
.entry-header h2{
	font-size:<?php echo get_theme_mod('post-title_fontsize','36').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('post-title_line_height','54')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('post-title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('post-title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('post-title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('post-title_text_transform','default'); ?> !important;

}
</style>
<?php }

/* Post Meta */
if($enable_meta_typography == true)
{
?>
<style>
.entry-meta{
	font-size:<?php echo get_theme_mod('meta_fontsize','16').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('meta_line_height','28')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('meta_fontweight','500'); ?> !important;
	font-family:<?php echo get_theme_mod('meta_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('meta_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('meta_text_transform','default'); ?> !important;
}
</style>
<?php }


/* Shop Page */
if($enable_shop_page_typography == true)
{
?>
<style>
/* Heading H1 */
 .woocommerce div.product .product_title{
	font-size:<?php echo get_theme_mod('shop_h1_typography_fontsize','36').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('shop_h1_line_height','54')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('shop_h1_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('shop_h1_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('shop_h1_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('shop_h1_typography_text_transform','default'); ?> !important;
}

/* Heading H2 */
.woocommerce .products h2, .woocommerce .cart_totals h2, .woocommerce-Tabs-panel h2, .woocommerce .cross-sells h2{
	font-size:<?php echo get_theme_mod('shop_h2_typography_fontsize','18').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('shop_h2_line_height','30')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('shop_h2_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('shop_h2_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('shop_h2_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('shop_h2_typography_text_transform','default'); ?> !important;
}

/* Heading H3 */
 .woocommerce .checkout h3 {
	font-size:<?php echo get_theme_mod('shop_h3_typography_fontsize','24').'px'; ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('shop_h3_line_height','36')).'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('shop_h3_typography_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('shop_h3_typography_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('shop_h3_typography_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('shop_h3_typography_text_transform','default'); ?> !important;
}
</style>
<?php }


/* Sidebar widgets */
if($enable_sidebar_typography == true)
{
?>
<style>
.sidebar .widget-title, .sidebar .wp-block-search .wp-block-search__label, .sidebar .widget h1, .sidebar .widget h2, .sidebar .widget h3, .sidebar .widget h4, .sidebar .widget h5, .sidebar .widget h6 {
	font-size:<?php echo get_theme_mod('sidebar_fontsize','24').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('sidebar_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('sidebar_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('sidebar_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('sidebar_text_transform','default'); ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('sidebar_line_height','36')).'px'; ?> !important;
}
/* Sidebar Widget Content */
.sidebar .widget_recent_entries a, .sidebar a, .sidebar p {
	font-size:<?php echo get_theme_mod('sidebar_widget_content_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('sidebar_widget_content_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('sidebar_widget_content_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('sidebar_widget_content_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('sidebar_widget_content_text_transform','default'); ?> !important;
	line-height:<?php echo esc_html(get_theme_mod('sidebar_widget_content_line_height','30')).'px'; ?> !important;
}
</style>
<?php }


/* Footer Bar */
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
	line-height:<?php echo esc_html(get_theme_mod('fbar_line_height','28')).'px'; ?> !important;
}
</style>
<?php }


/* Footer Widget */
if($enable_footer_widget_typography == true)
{
?>
<style>
/* Footer Ribbon Text */
.footer-social-links .custom-social-icons span, .footer-social-links .custom-social-icons a {
	font-size:<?php echo get_theme_mod('ribbon_text_fontsize','20').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('ribbon_text_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('ribbon_text_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('ribbon_text_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('ribbon_text_transform','default'); ?> !important;
}

/* Footer Widget Title */
.site-footer .widget-title, .site-footer .wp-block-search .wp-block-search__label, .site-footer .widget h1, .site-footer .widget h2, .site-footer .widget h3, .site-footer .widget h4, .site-footer .widget h5, .site-footer .widget h6  {
	font-size:<?php echo get_theme_mod('footer_widget_title_fontsize','24').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('footer_widget_title_fontweight','700'); ?> !important;
	font-family:<?php echo get_theme_mod('footer_widget_title_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('footer_widget_title_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('footer_widget_title_text_transform','default'); ?> !important;
	 line-height:<?php echo esc_html(get_theme_mod('footer_widget_title_line_height','36')).'px'; ?> !important;
}
/* Footer Widget Content */
.footer-sidebar .widget_recent_entries a, .footer-sidebar a, .footer-sidebar p {
	font-size:<?php echo get_theme_mod('footer_widget_content_fontsize','16').'px'; ?> !important;
	font-weight:<?php echo get_theme_mod('footer_widget_content_fontweight','600'); ?> !important;
	font-family:<?php echo get_theme_mod('footer_widget_content_fontfamily','Open Sans'); ?> !important;
	font-style:<?php echo get_theme_mod('footer_widget_content_fontstyle','normal'); ?> !important;
	text-transform:<?php echo get_theme_mod('footer_widget_content_text_transform','default'); ?> !important;
	 line-height:<?php echo esc_html(get_theme_mod('footer_widget_content_line_height','30')).'px'; ?> !important;
}
</style>
<?php } ?>



<?php
// -----------------Colors & Background----------------------
?>



<style>
	<?php
	if(get_theme_mod('nav_header_clr_enable',false)==true) :?>
	/* Header Background */
	.navbar,.header-rgt.index5{
		background-color: <?php echo get_theme_mod('header_background_color','#ffffff'); ?> !important;

	}
	/* Site Title & Tagline */
	body.theme-honeypress-pro .site-title a, body.theme-honeypress-pro .header-logo.index6 .site-title{
		color: <?php echo get_theme_mod('site_title_link_color','#061018'); ?>;
	}
	body.theme-honeypress-pro .site-title a:hover, body.theme-honeypress-pro .header-logo.index6 .site-title{
		color: <?php echo get_theme_mod('site_title_link_hover_color','#061018'); ?>;
	}
	body.theme-honeypress-pro .site-description{
		color: <?php echo get_theme_mod('site_tagline_text_color','#333333'); ?>;
	}
	body.theme-honeypress-pro .site-description:hover{
		color: <?php echo get_theme_mod('site_tagline_hover_color','#333333'); ?>;
	}
	<?php endif;?>
	/* Sticky Header Color shceme */
	<?php
	if(get_theme_mod('sticky_header_clr_enable',false)==true) :?>
	.header-sticky.stickymenu1, .header-sticky.stickymenu, .header-sticky.shrink1, .header-sticky.stickymenu1 .bg-light, .header-sticky.stickymenu .bg-light, .header-sticky.shrink1 .bg-light
	{
		background-color: <?php echo get_theme_mod('sticky_header_bg_color','#061018');?> !important;
	}
	.header-sticky.stickymenu1 .site-title a, .header-sticky.stickymenu .site-title a , .header-sticky.shrink1 .site-title a
	{
		color: <?php echo get_theme_mod('sticky_header_title_color','#ffffff');?> !important;
	}
	.header-sticky.stickymenu1 .site-description, .header-sticky.stickymenu .site-description, .header-sticky.shrink1 .site-description
	{
		color: <?php echo get_theme_mod('sticky_header_subtitle_color','#ffffff');?> !important;
	}
	.header-sticky.stickymenu1 .nav .nav-item .nav-link, .header-sticky.stickymenu .nav .nav-item .nav-link, .header-sticky.shrink1 .nav .nav-item .nav-link {
    	color: <?php echo get_theme_mod('sticky_header_menus_link_color','#ffffff'); ?> !important;
    }
    .header-sticky.stickymenu1 .nav .nav-item:hover .nav-link, .header-sticky.stickymenu1 .navbar.custom .nav .nav-item.active .nav-link:hover, .header-sticky.stickymenu .nav .nav-item:hover .nav-link, .header-sticky.stickymenu .navbar.custom .nav .nav-item.active .nav-link:hover , .header-sticky.shrink1 .nav .nav-item:hover .nav-link, .header-sticky.shrink1 .navbar.custom .nav .nav-item.active .nav-link:hover{
    	color: <?php echo get_theme_mod('sticky_header_menus_link_hover_color','#2d6ef8'); ?> !important;
    }
    .header-sticky.stickymenu1 .nav .nav-item.active .nav-link, .header-sticky.stickymenu .nav .nav-item.active .nav-link, .header-sticky.shrink1 .nav .nav-item.active .nav-link {
    	color: <?php echo get_theme_mod('sticky_header_menus_link_active_color','#2d6ef8'); ?> !important;
    }
    /* Sticky Header Submenus */
    .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-item, .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-menu, .header-sticky.stickymenu .nav.navbar-nav .dropdown-item, .header-sticky.stickymenu .nav.navbar-nav .dropdown-menu, .header-sticky.shrink1 .nav.navbar-nav .dropdown-item, .header-sticky.shrink1 .nav.navbar-nav .dropdown-menu {
    	background-color: <?php echo get_theme_mod('sticky_header_submenus_background_color','#061018'); ?>;
    }
    .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-item, .header-sticky.stickymenu .nav.navbar-nav .dropdown-item, .header-sticky.shrink1 .nav.navbar-nav .dropdown-item {
    	color: <?php echo get_theme_mod('sticky_header_submenus_link_color','#ffffff'); ?>;
    }
    .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-item:hover, .header-sticky.stickymenu .nav.navbar-nav .dropdown-item:hover,  .header-sticky.shrink1 .nav.navbar-nav .dropdown-item:hover {
    	color: <?php echo get_theme_mod('sticky_header_submenus_link_hover_color','#2d6ef8'); ?>;
    }
    .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-item:focus, .header-sticky.stickymenu1 .nav.navbar-nav .dropdown-item:hover, .header-sticky.stickymenu .nav.navbar-nav .dropdown-item:focus, .header-sticky.stickymenu .nav.navbar-nav .dropdown-item:hover, .header-sticky.shrink1 .nav.navbar-nav .dropdown-item:focus, .header-sticky.shrink1 .nav.navbar-nav .dropdown-item:hover
    {
    	    background-color: transparent;
    }
<?php endif;?>

	/* Primary Menu */
	<?php
	if(get_theme_mod('apply_menu_clr_enable',false)==true) :?>
	body.theme-honeypress-pro .navbar.custom .nav .nav-item .nav-link, body.theme-honeypress-pro .navbar .nav .nav-item .nav-link , body.theme-honeypress-pro .navbar .nav .nav-item.html a, body.theme-honeypress-pro .navbar5 .nav-item.menu-html a, .nav-item.radix-html a,body.dark .cart-header > a.cart-icon{
    	color: <?php echo get_theme_mod('menus_link_color','#061018'); ?> !important;
    }
    body.theme-honeypress-pro .navbar.custom .nav .nav-item:hover .nav-link, body.theme-honeypress-pro .navbar.custom .nav .nav-item.active .nav-link:hover, body.theme-honeypress-pro .navbar .nav .nav-item:hover .nav-link , body.theme-honeypress-pro .navbar .nav .nav-item.html:hover a , body.theme-honeypress-pro .navbar5 .nav-item.menu-html:hover a, body.theme-honeypress-pro .nav-item.radix-html:hover a{
    	color: <?php echo get_theme_mod('menus_link_hover_color','#2d6ef8'); ?> !important;
    }
    body.theme-honeypress-pro .navbar.custom .nav .nav-item.active .nav-link, body.theme-honeypress-pro .navbar .nav .nav-item.active .nav-link, body.theme-honeypress-pro .navbar5 .nav-item.menu-html.active a {
    	color: <?php echo get_theme_mod('menus_link_active_color','#2d6ef8'); ?> !important;
    	display: block;
    }
    /* Submenus */
    body.theme-honeypress-pro .nav.navbar-nav .dropdown-item, body.theme-honeypress-pro .nav.navbar-nav .dropdown-menu {
    	background-color: <?php echo get_theme_mod('submenus_background_color','#ffffff'); ?> !important;
    }
    body.theme-honeypress-pro .nav.navbar-nav .dropdown-item {
    	color: <?php echo get_theme_mod('submenus_link_color','#212529'); ?> !important;
    }
    body.theme-honeypress-pro .nav.navbar-nav .dropdown-item:hover {
    	color: <?php echo get_theme_mod('submenus_link_hover_color','#2d6ef8'); ?> !important;
    }
    body.theme-honeypress-pro .nav.navbar-nav .dropdown-item:focus, body.theme-honeypress-pro .nav.navbar-nav .dropdown-item:hover
    {
    	    background-color: transparent;
    }
<?php endif;?>

    /* Banner */
    .page-title h1, body.dark .page-title h1{
    	color: <?php echo get_theme_mod('banner_text_color','#fff'); ?>;
    }

    /* Breadcrumb */
    <?php
    $enable_brd_link_clr_setting=get_theme_mod('enable_brd_link_clr_setting',false);
    if($enable_brd_link_clr_setting==true): ?>
    .page-breadcrumb.text-center span, .page-breadcrumb.text-center span a {
    color: <?php echo get_theme_mod('breadcrumb_title_link_color','#ffffff');?> !important;
	}
    .page-breadcrumb.text-center span a:hover {
    	color: <?php echo get_theme_mod('breadcrumb_title_link_hover_color','#2d6ef8'); ?> !important;
    }
	<?php endif;?>

	/* After Menu Button */
	 <?php
    $enable_after_menu_btn_clr_setting=get_theme_mod('enable_after_menu_btn_clr_setting',false);
    if($enable_after_menu_btn_clr_setting==true): ?>
    #wrapper .honeypress_header_btn {
    background-color: <?php echo get_theme_mod('after_menu_btn_bg_clr','#2d6ef8');?>
	}
	#wrapper .honeypress_header_btn {
    color: <?php echo get_theme_mod('after_menu_btn_txt_clr','#ffffff');?>
	}
	#wrapper .honeypress_header_btn:hover {
   background-color: <?php echo get_theme_mod('after_menu_btn_hover_clr','#000000');?>
	}
    <?php endif;?>

     /* Content */
     <?php
	if(get_theme_mod('cont_clr_enable',false)==true) :?>
  body h1, body.dark li.html h1  {
    	color: <?php echo get_theme_mod('h1_color','#061018'); ?> ;
    }
    body .section-header h2, body .funfact h2, body h2, body.dark li.html h2, body.dark .section-header h2.section-title, body.dark .section-header h2.section-title-two, body.dark .funfact-inner h2.funfact-title{
    	color: <?php echo get_theme_mod('h2_color','#061018'); ?>;
    }
    body h3, body.dark li.html h3,body.dark .comment-title h3, body.dark h3.comment-reply-title, body.dark .contact-form-map h3 {
    	color: <?php echo get_theme_mod('h3_color','#061018'); ?>;
    }
    body .entry-header h4 > a, body h4, body.dark li.html h4, body.dark .team-mambers h4, body.dark .blog-author .name, body.dark  h4.title{
    	color: <?php echo get_theme_mod('h4_color','#061018'); ?>;
    }
    body .product-price h5 > a, body .blog-author h5, body .comment-detail h5, body h5, body.dark li.html h5, body.dark h5.comment-detail-title {
    	color: <?php echo get_theme_mod('h5_color','#061018'); ?>;
    }
    body h6, body.dark li.html h6 {
    	color: <?php echo get_theme_mod('h6_color','#061018'); ?>;
    }
     p, body.dark li.html p, body.dark .entry-content p, body.dark .funfact-inner p,body.dark .section-header p, body .services5 .post .entry-content p, body.dark .section-module p {
    	color: <?php echo get_theme_mod('p_color','#061018'); ?>;
    }
    <?php endif;?>
    /* Slider Section */
    .hero-section .slider-caption h1{
     	color: <?php echo get_theme_mod('home_slider_title_color','#ffffff');?>;
     }
     .hero-section .slider-caption .description
     {
     	color: <?php echo get_theme_mod('home_slider_subtitle_color','#ffffff'); ?>;
     }
    <?php if(get_theme_mod('apply_slider_clr_enable',false)==true):?>
    .hero-section .btn-small.btn-default {
    background: <?php echo get_theme_mod('slider_btn1_color','#2d6ef8'); ?>;
	}
	.hero-section #slider-carousel .btn-small.btn-default:hover {
    background: <?php echo get_theme_mod('slider_btn1_hover_color','#ffffff'); ?>;
	}
	.hero-section .btn-light {
    background: <?php echo get_theme_mod('slider_btn2_color','#ffffff'); ?>;
	}
	.hero-section #slider-carousel .btn-light:hover {
    background: <?php echo get_theme_mod('slider_btn2_hover_color','#2d6ef8'); ?>;
	}
	<?php endif;?>
	/* Testimonial Section */
	.testimonial .section-subtitle
	{
		color: <?php echo get_theme_mod('home_testi_title_color','#ffffff'); ?> !important;
	}
	.testimonial .section-header .section-title.text-white {
    	color: <?php echo get_theme_mod('home_testi_subtitle_color','#ffffff'); ?>;
	}
	.testmonial-block .avatar img
	{
		border: 5px solid <?php echo get_theme_mod('home_testi_img_border_color','#ffffff'); ?>;
	}
	.testimonial .entry-content .text-white, .testi-3 .testmonial-block .entry-content:before
	{
		color: <?php echo get_theme_mod('testimonial_description_color','#ffffff'); ?>;
	}
	.testimonial .testmonial-block .name, body .testmonial-block6 .name, body .testi-5 .testmonial-block5 .name
	{
		color: <?php echo get_theme_mod('testi_clients_name_color','#ffffff'); ?>;
	}
	.testimonial .testmonial-block .designation, body .testmonial-block6 .designation, body .testi-5 .testmonial-block5 figcaption, body.dark .testmonial-block figcaption .designation
	{
		color: <?php echo get_theme_mod('testi_clients_designation_color','#ffffff'); ?>;
	}

	/* CTA SECTION */
	.cta .title.text-white {
    	color: <?php echo get_theme_mod('home_cta_title_color','#ffffff'); ?>;
	}
	.cta p,body.dark .cta p {
    	color: <?php echo get_theme_mod('home_cta_subtitle_color','#ffffff'); ?>;
	}
		<?php
	if(get_theme_mod('apply_cta_clr_enable',false)==true):?>
	.cta .btn-light {
    background: <?php echo get_theme_mod('home_cta_btn_color','#ffffff'); ?>  !important;
	}

	.cta .btn-light:hover {
    background: <?php echo get_theme_mod('home_cta_btn_hover_color','#2d6ef8'); ?>  !important;
	}
<?php endif;?>

     /* Blog Page */
   <?php
   if((get_theme_mod('apply_blg_clr_enable',false)==true) && (!is_single())):?>
	.standard-view .entry-title a, .entry-title.template-blog-grid-view a, .entry-title.template-blog-grid-view-sidebar a, .entry-title.template-blog-list-view a, .list-view .entry-title a, .entry-title.blog-masonry-two-col a, .entry-title.blog-masonry-three-col a, .entry-title.blog-masonry-four-col a{
    	color: <?php echo get_theme_mod('blog_post_page_title_color','#061018'); ?>;
    }
    .blog .entry-header .entry-title a:hover {
    	color: <?php echo get_theme_mod('blog_post_page_title_hover_color','#2d6ef8'); ?> !important;
    }
    .blog .entry-header .entry-meta a, .blog .entry-meta > span, .blog .entry-meta a{
    	color: <?php echo get_theme_mod('blog_post_page_meta_link_color','#061018'); ?>;
    }
    .blog .entry-header .entry-meta a:hover{
    	color: <?php echo get_theme_mod('blog_post_page_meta_link_hover_color','#2d6ef8'); ?>;
    }

    .section-module.blog .entry-meta .cat-links a, .section-module.blog .standard-view .entry-meta .author a, .section-module.blog .list-view .entry-meta .author a, .section-module.blog.grid-view .entry-meta .author a, .section-module.blog .entry-meta .comment-links a::before, .entry-meta .posted-on a, .entry-meta .comment-links a, .section-module.blog .entry-meta .comment-links a::before
    {
    	color: <?php echo get_theme_mod('blog_post_page_meta_link_color','#061018'); ?>;
    }
     .section-module.blog .entry-meta .cat-links a:hover, .section-module.blog .standard-view .entry-meta .author a:hover, .section-module.blog .list-view .entry-meta .author a:hover, .section-module.blog .entry-meta .comment-links a:hover::before, .section-module.blog .entry-meta a:hover, .section-module.blog.grid-view .entry-meta .author a:hover
    {
    	color: <?php echo get_theme_mod('blog_post_page_meta_link_hover_color','#2d6ef8'); ?>;
    }
    <?php endif;?>

    /* Single Post/Page */
    <?php
    if(get_theme_mod('apply_blg_single_clr_enable',false)==true && (is_single())):?>
	.single-post .standard-view .entry-title a {
    	color: <?php echo get_theme_mod('single_post_page_title_color','#061018'); ?>;
    }
    .single-post .standard-view .entry-title a:hover {
    	color: <?php echo get_theme_mod('single_post_page_title_hover_color','#2d6ef8'); ?> !important;
    }
    .single-post .entry-meta a, .blog-single .entry-meta .cat-links a, .section-module.blog .standard-view .entry-meta .author a, .section-module.blog .list-view .entry-meta .author a, .blog-single .entry-meta .comment-links a::before{
    	color: <?php echo get_theme_mod('single_post_page_meta_link_color','#061018'); ?>;
    }
    .single-post .entry-meta a:hover, .single-post .entry-meta .comment-links a:hover, .single-post .entry-meta .posted-on a:hover, .blog-single .entry-meta .cat-links a:hover, .section-module.blog .standard-view .entry-meta .author a:hover, .section-module.blog .list-view .entry-meta .author a:hover, .blog-single .entry-meta .comment-links a:hover::before{
    	color: <?php echo get_theme_mod('single_post_page_meta_link_hover_color','#2d6ef8'); ?>;
    }
	<?php endif;?>

    /* Sidebar */
    <?php
    if(get_theme_mod('apply_sibar_link_hover_clr_enable',false)==true):?>
    body .sidebar .widget-title, body .sidebar .wp-block-search .wp-block-search__label, body .sidebar .widget h1, body .sidebar .widget h2, body .sidebar .widget h3, body .sidebar .widget h4, body .sidebar .widget h5, body .sidebar .widget h6 {
    	color: <?php echo get_theme_mod('sidebar_widget_title_color','#061018'); ?>;
    }
    body .sidebar p {
    	color: <?php echo get_theme_mod('sidebar_widget_text_color','#061018'); ?> !important;
    }
    body .sidebar a,body.dark .sidebar a {
    	color: <?php echo get_theme_mod('sidebar_widget_link_color','#061018'); ?>;
    }
    body .sidebar.s-l-space .sidebar a:hover, body .widget a:hover, .widget a:focus {
    	color: <?php echo get_theme_mod('sidebar_widget_link_hover_color','#2d6ef8'); ?>;
    }
<?php endif;?>

    /* Footer Widgets */
    <?php
    if(get_theme_mod('apply_ftrsibar_link_hover_clr_enable',false)==true){?>
    body .site-footer {
    	background-color: <?php echo get_theme_mod('footer_widget_background_color','#061018'); ?>;
    }
     body .site-footer .widget-title, body .site-footer .wp-block-search .wp-block-search__label, body .site-footer .widget h1, body .site-footer .widget h2, body .site-footer .widget h3, body .site-footer .widget h4, body .site-footer .widget h5, body .site-footer .widget h6 {
    	color: <?php echo get_theme_mod('footer_widget_title_color','#ffffff'); ?>;
    }
    body .footer-sidebar p,  body .footer-sidebar .widget, body.dark .footer-sidebar p {
    	color: <?php echo get_theme_mod('footer_widget_text_color','#ffffff'); ?>;
    }
    body .footer-sidebar .widget a, body .footer-sidebar .widget_recent_entries .post-date  {
    	color: <?php echo get_theme_mod('footer_widget_link_color','#ffffff'); ?>;
    }
    body .footer-sidebar .widget a:hover{
    	color: <?php echo get_theme_mod('footer_widget_link_hover_color','#2d6ef8'); ?>;
    }
	<?php } else { ?>
		.site-footer p {
			color: #fff;
		}
<?php	}?>

    /* Footer Bar */


    body .site-info {
    	background-color: <?php echo get_theme_mod('footer_bar_background_color','#020508'); ?>;
    	border-top: <?php echo get_theme_mod('footer_bar_border',0);?>px <?php echo get_theme_mod('footer_border_style','solid');?> <?php echo get_theme_mod('honeypress_footer_border_clr','#fff');?>
    }
    body .site-info .widget-title{
    	color: <?php echo get_theme_mod('advance_footer_bar_title_color','#fff'); ?>;
    }
    body .site-info p, body .site-info .container, body .site-info .widget{
    	color: <?php echo get_theme_mod('footer_bar_text_color','#bec3c7'); ?>;
    }
    body .site-info a {
    	color: <?php echo get_theme_mod('footer_bar_link_color','#ffffff'); ?> ;
    }
    <?php
    if(get_theme_mod('apply_foot_hover_anchor_enable',false)==true):
    ?>
    body .site-info a:hover {
    	color: <?php echo get_theme_mod('footer_bar_link_hover_color','#2d6ef8'); ?>;
    }
<?php endif;?>
.header-sticky.stickymenu1, .header-sticky.stickymenu, .header-sticky.shrink1
{
	opacity: <?php echo get_theme_mod('sticky_header_opacity','1.0');?>;
	<?php if(get_theme_mod('sticky_header_height',0) > 0):?>;
	padding-top: <?php echo get_theme_mod('sticky_header_height',0);?>px;
	padding-bottom: <?php echo get_theme_mod('sticky_header_height',0);?>px;
<?php endif;?>
}
.custom-logo{width: <?php echo esc_html(get_theme_mod('honeypress_logo_length',''));?>px; height: auto;}
body .navbar-brand.sticky-logo img{width: <?php echo esc_html(get_theme_mod('honeypress_logo_length',''));?>px; height: auto !important;}
body .navbar-brand.sticky-logo-mbl img{width: <?php echo esc_html(get_theme_mod('honeypress_logo_length',''));?>px; height: auto !important;}
.honeypress_header_btn{ -webkit-border-radius: <?php echo esc_html(get_theme_mod('after_menu_btn_border',0));?>px;border-radius: <?php echo esc_html(get_theme_mod('after_menu_btn_border',0));?>px;}
</style>
