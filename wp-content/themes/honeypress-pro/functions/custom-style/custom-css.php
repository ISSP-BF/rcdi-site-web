<?php
// define function for custom color setting
function custom_light() {

	$link_color = get_theme_mod('link_color');
	list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
	$r = $r - 50;
	$g = $g - 25;
	$b = $b - 40;

	if ( $link_color != '#ff0000' ) :
	?>
<style type="text/css">
blockquote {
	border-left: 4px solid <?php echo $link_color; ?> !important;
}
button,
input[type="button"],
input[type="submit"] {
	background-color: <?php echo $link_color; ?> !important;

}
.hero-section .btn-small.btn-default:hover {
    background: #fff ;
}
.scroll-up a {
    background: <?php echo $link_color; ?>;
}
.footer-social-links:before, .footer-social-links:after
{
 border-bottom: 30px solid rgba(<?php echo $r;?>, <?php echo $g;?>, <?php echo $b;?>, 0.79) ;
}
.btn-default { background: <?php echo $link_color; ?>; }
.btn-light:hover, .btn-light:focus { background: <?php echo $link_color; ?> ; }
.btn-default-dark { background: <?php echo $link_color; ?> ;  }
.btn-border {  border: 2px solid <?php echo $link_color; ?> ; }
.btn-border:hover, .btn-border:focus { background: <?php echo $link_color; ?> ;  border: 2px solid <?php echo $link_color; ?> ; }

.header-sidebar {
	background: <?php echo $link_color; ?> ;
}

.cart-header > a .cart-total {
	background: <?php echo $link_color; ?> ;
}

/*Slider Pointer*/
.pointer-scroll {
	background: <?php echo $link_color; ?> ;
}

.owl-carousel .owl-prev:hover,
.owl-carousel .owl-prev:focus {
	background-color: <?php echo $link_color; ?> ;
}
.owl-carousel .owl-next:hover,
.owl-carousel .owl-next:focus {
	background-color: <?php echo $link_color; ?> ;
}

.section-separator {
    background: <?php echo $link_color; ?> ;
}
.section-separator::before {
    background: <?php echo $link_color; ?> ;
}

.section-separator::after {
    background: <?php echo $link_color; ?> ;
}
.testimonial .section-separator {
    background: #ffffff ;
}
.testimonial .section-separator::before {
    background: #ffffff ;
}

.testimonial .section-separator::after {
    background: #ffffff ;
}
/*===================================================================================*/
/*	Mixed Classes
/*===================================================================================*/


.bg-default { background-color: <?php echo $link_color; ?> ; }
.text-default { color: <?php echo $link_color; ?> ; }
.entry-header .entry-title a:hover,
.entry-header .entry-title a:focus {
	color: <?php echo $link_color; ?> ;
}

.services .post-thumbnail a { position: relative; z-index: 1; color: <?php echo $link_color; ?> ; }
.services .post-thumbnail i.fa {
	background: <?php echo $link_color; ?> ;
	box-shadow: <?php echo $link_color; ?> 0px 0px 0px 1px ;
}

.services .post:hover .post-thumbnail i.fa {
	color: <?php echo $link_color; ?> ;
}

.funfact-icon { color: <?php echo $link_color; ?> ; }

.filter-tabs .nav-link:hover {
    color: <?php echo $link_color; ?> ;
}

.portfolio .post p { color: <?php echo $link_color; ?> ; }

.testmonial-block .avatar img {  box-shadow: <?php echo $link_color; ?> 0px 0px 0px 1px ;  }

.testmonial-block .entry-content.quote:before {
    color: <?php echo $link_color; ?> ;
}

.blog .standard-view .entry-meta .author a,
.blog .list-view .entry-meta .author a {
	color: <?php echo $link_color; ?> ;
}

.blog .standard-view .more-link,
.blog .list-view .more-link {
    border: 2px solid <?php echo $link_color; ?> ;
}

.blog .standard-view .more-link:hover,
.blog .standard-view .more-link:focus,
.blog .list-view .more-link:hover,
.blog .list-view .more-link:focus {
	background-color: <?php echo $link_color; ?> ;
    border: 2px solid <?php echo $link_color; ?> ;
}

.entry-meta a:hover, .entry-meta a:focus { color: <?php echo $link_color; ?> ; }
.entry-meta .cat-links a, .entry-meta .tag-links a { color: <?php echo $link_color; ?> ; }
.entry-meta .comment-links a::before { content: "\f0e5"; color: <?php echo $link_color; ?> ; }
.entry-meta .tag-links a:hover, .entry-meta .tag-links a:focus {
    background-color: <?php echo $link_color; ?> ;
    border: 1px solid <?php echo $link_color; ?> ;
}

/*More Link*/
.more-link {
	border-bottom: 2px solid <?php echo $link_color; ?> ;
}
.more-link:hover, .more-link:focus {
	color: <?php echo $link_color; ?> ;
}


.pagination a:hover, .pagination a.active { background-color: <?php echo $link_color; ?> ; border: 1px solid <?php echo $link_color; ?> ; }
.pagination .nav-links .page-numbers.current {background-color: <?php echo $link_color; ?> ; border: 1px solid <?php echo $link_color; ?> ;}

.reply a {
    color: <?php echo $link_color; ?> ;
}

.team-grid .position {  color: <?php echo $link_color; ?> ; }

.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{
    background: <?php echo $link_color; ?> ;
    border: 2px solid <?php echo $link_color; ?> ;
    background-color: <?php echo $link_color; ?> !important;
}

.woocommerce ul.products li.product .button, .owl-item .item .cart .add_to_cart_button {
    background: <?php echo $link_color; ?> ;
}

.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
    background-color: <?php echo $link_color; ?> !important;
}

.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.button, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit, .woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus, .woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus, .woocommerce input.button:hover, .woocommerce input.button:focus, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button {
    background: <?php echo $link_color; ?> ;
}
.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
    background-color: <?php echo $link_color; ?> ;
}
.woocommerce-message, .woocommerce-info {
    border-top-color: <?php echo $link_color; ?> ;
}
.woocommerce-message::before, .woocommerce-info::before {
    color: <?php echo $link_color; ?> ;
}
.woocommerce div.product .stock {
    color: <?php echo $link_color; ?> ;
}
.woocommerce p.stars a {
    color: <?php echo $link_color; ?> ;
}
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
    background-color: <?php echo $link_color; ?> !important;
}

.added_to_cart.wc-forward
{
background: <?php echo $link_color; ?> ;
}
.product-price > .woocommerce-loop-product__title a:hover,
.product-price > .woocommerce-loop-product__title a:focus {
	color: <?php echo $link_color; ?> ;
}

.navbar .nav .nav-item:hover .nav-link, .navbar .nav .nav-item.active .nav-link {
    color: <?php echo $link_color; ?> ;
}
.honeypress_header_btn {
    background-color: <?php echo $link_color; ?>;
}
.navbar .nav .nav-item.html:hover a, .navbar .nav .nav-item.html.active a {
    color: <?php echo $link_color; ?>;
}
.widget .widget-title:after {
	background: <?php echo $link_color; ?> ;
}
.widget_archive li:before, .widget_categories li:before, .widget_links li:before, .widget_meta li:before,
.widget_nav_menu li:before, .widget_pages li:before, .widget_recent_comments li:before, .widget_recent_entries li:before {
	color: <?php echo $link_color; ?> ;
}
.widget button[type="submit"] {
    background-color: <?php echo $link_color; ?> ;
	border-color: <?php echo $link_color; ?> ;
}
.widget .tagcloud a:hover, .widget .tagcloud a:focus {
    background-color: <?php echo $link_color; ?> ;
    border: 1px solid <?php echo $link_color; ?> ;
}

/*Address*/
address i {
	color: <?php echo $link_color; ?> ;
}

.footer-social-links {
	background: <?php echo $link_color; ?> ;
}

.footer-sidebar .widget a:focus {
	color: <?php echo $link_color; ?> ;
}

.site-info a:hover, .site-info a:focus { color: <?php echo $link_color; ?> ; }

.page-breadcrumb > li:first-child:before { color: <?php echo $link_color; ?> ; }

.trail-item.trail-end span {
    color: <?php echo $link_color; ?> ;
}

.page-breadcrumb > li a:hover,
.page-breadcrumb > li.active { color: <?php echo $link_color; ?> ; }

.company-info li:before { color: <?php echo $link_color; ?> ; }


.contact-icon i.fa { color: <?php echo $link_color; ?> ;  }
.contact-widget:hover .contact-icon i.fa { color: <?php echo $link_color; ?> ;  }

.contact-widget address a:hover { color: <?php echo $link_color; ?> ; }

.error-page .title i { color: <?php echo $link_color; ?> ; }



.team-grid .img-holder .overlay
{
 background-color: rgba(<?php echo $r;?>, <?php echo $g;?>, <?php echo $b;?>, 0.79) ;
}


.business .entry-header .entry-title a:hover, .entry-header .entry-title a:focus, .footer-sidebar .widget a:hover, .footer-sidebar .widget a:focus, .filter-tabs .nav-item.show .nav-link, .filter-tabs .nav-link.active, .filter-tabs .nav-link:hover,  .widget a:hover, .widget a:focus , .standard-view.blog-single a:hover{
    color: <?php echo $link_color;?> ;
}
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
    background-color: <?php echo $link_color;?> !important ;
}
.dropdown-item:focus, .dropdown-item:hover {
    color: <?php echo $link_color;?> !important ;
}
@media (min-width: 992px){
.navbar .nav .dropdown-menu {
    border-bottom: 3px solid <?php echo $link_color;?> !important;;
}
}
.testimonial.bg-default .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot.active span {
    background-color: <?php echo $link_color;?> ;
}

.page-breadcrumb > li a:hover,
.page-breadcrumb > li.active { color: <?php echo $link_color;?>; }

.portfolio .post .entry-title a:hover
{
  color: <?php echo $link_color;?>;
}

.page-breadcrumb > li:first-child:before { color: <?php echo $link_color; ?>; font-family: fontAwesome; content: "\f015"; padding: 0 0.625rem 0 0; }
.page-breadcrumb > li a:hover,
.page-breadcrumb > li.active { color: <?php echo $link_color; ?>; }
.page-breadcrumb.text-center span a:hover {
    color: <?php echo $link_color; ?>;

}
.page-breadcrumb.text-center .breadcrumb_last
{
    color: <?php echo $link_color; ?> !important;
}
.woocommerce-loop-product__title:hover
{
    color: <?php echo $link_color; ?> ;
}
.widget_layered_nav li a:before,.widget_product_categories li:before{
    color: <?php echo $link_color;?>;
   }
.woocommerce .star-rating span::before {
    color: <?php echo $link_color;?>;
}
.woocommerce .star-rating::before {
    color: <?php echo $link_color;?>;
  }
 .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
    background-color: <?php echo $link_color;?> !important;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
    background-color: <?php echo $link_color;?> !important;
}

.woocommerce ul.products li.product .onsale, .products span.onsale
{
   background: <?php echo $link_color;?>;
    border: 2px solid <?php echo $link_color;?>;
}
.woocommerce ul.product_list_widget li a:hover, .woocommerce ul.product_list_widget li a:focus, .woocommerce .posted_in a:hover, .woocommerce .posted_in a:focus {
   color: <?php echo $link_color;?>;
}
body .woocommerce #respond input#submit, body .woocommerce a.button, body .woocommerce button.button, body .woocommerce input.button
{
background-color: <?php echo $link_color;?>;
}
body .woocommerce #respond input#submit:hover, body .woocommerce a.button:hover, body .woocommerce button.button:hover, body .woocommerce input.button:hover
{
background-color: <?php echo $link_color;?>;
}
.navbar-nav .show .dropdown-menu > .active > a, .navbar-nav .show .dropdown-menu > .active > a:hover, .navbar-nav .show .dropdown-menu > .active > a:focus {
    background-color: transparent;
    color: <?php echo $link_color;?>;
}
.search-form input[type="submit"]
{
    background: <?php echo $link_color;?> none repeat scroll 0 0;
    border: 1px solid <?php echo $link_color;?>;
}
@media (max-width: 991px){
.navbar .nav .search-box-outer .dropdown-menu {
    border-bottom: 3px solid <?php echo $link_color;?> !important;
}
}


/** Service 2**/
.services3 .post-thumbnail i.fa, .services3 .post:hover
{
     background: <?php echo $link_color;?>;
}

.services2 .post::before {
    background-color: <?php echo $link_color;?>;
    }
.services2 .post-thumbnail i.fa, .services3 .post:hover .post-thumbnail i.fa, .services4 .post-thumbnail i.fa {
    color: <?php echo $link_color;?>;
}

/** Testimonial 2**/
#testimonial-carousel2 .testmonial-block {
    border-left: 4px solid <?php echo $link_color;?>;
}
#testimonial-carousel2 .testmonial-block:before {
    border-top: 25px solid <?php echo $link_color;?>;
}

/** Team  **/
 .team2 .team-grid .details .custom-social-icons li > a:hover, .team3 .team-grid .position,  .team3 .team-grid .details .custom-social-icons li > a:hover, .team4 .team-grid .overlay .custom-social-icons li > a:hover  {
    color: <?php echo $link_color;?>;
}

.honeypress-link-format .entry-content p
{
   color: <?php echo $link_color;?>;
}
.honeypress-link-format .entry-content p:hover
{
    color: #000000;
}
#loadMore:hover
{
  color: <?php echo $link_color;?>;
}


@media (min-width: 991px) {
    .navbar4 .header-lt::before {
         background-color: <?php echo $link_color;?>;
    }
    .navbar4 .header-lt::after {
         background-color: <?php echo $link_color;?>;
    }
    }
    @media (max-width: 991px) {
         .navbar4 .header-lt {
              background-color: <?php echo $link_color;?>;
         }
    }
.navbar5.navbar .nav .nav-item:hover .nav-link, .navbar5.navbar .nav .nav-item.active .nav-link {
    background: <?php echo $link_color;?>;
}
.navbar5.navbar .hw .honeypress_header_btn:hover, .navbar5.navbar .hw .honeypress_header_btn:focus {
    background: <?php echo $link_color;?>;
    color: #fff;
}
.navbar5.navbar .nav .nav-item.menu-html.menu-item:hover a, .navbar5.navbar .nav .nav-item.menu-html.menu-item.active a {
    background: <?php echo $link_color;?>;
}
.navbar.navbar6 .navbar-nav > li.active > a:after,
.navbar.navbar6 ul li > a:hover:after {
    background: <?php echo $link_color;?>;
}
.navbar.navbar6 .dropdown-item.active,.navbar.navbar6 .dropdown-item:active {
    color: <?php echo $link_color;?>;
}
.navbar.navbar7 .nav .nav-item:hover .nav-link, .navbar.navbar7 .nav .nav-item.active .nav-link {
    color: <?php echo $link_color;?>;
}
.services5 .post:hover{ border-bottom: 5px solid <?php echo $link_color;?>; }
.services5 .post .post-thumbnail{ border: 10px solid <?php echo $link_color;?>;}
.services5 .post .post-thumbnail:after{ background-color: <?php echo $link_color;?>;}
.services5 .post:hover .entry-header .entry-title{ color: <?php echo $link_color;?>; }
.services4.services6 .post{
    background: <?php echo $link_color;?>;
}
.services7 .post-thumbnail i.fa, .services7 .post-thumbnail img {
    background: <?php echo $link_color;?>;
    }
.services7 .post:hover {
    background-color: <?php echo $link_color;?>;
    transition: 0.3s all;
}
.services7 .post:hover .post-thumbnail i.fa {
    color: <?php echo $link_color;?>;
}
.services7 .post:hover .post-thumbnail i.fa, .services7 .post:hover .post-thumbnail img {
    background-color: #ffffff;
    box-shadow: 0px 0px 5px 0px #c0c0c0;
}
.navbar5 .nav-item .widget button[type="submit"]:hover, .navbar5 .nav-item .widget button[type="submit"]:focus {
    color: #fff;
    background-color: <?php echo $link_color;?> !important;
    border-color: <?php echo $link_color;?> !important;
}


.honeypress_header_btn {background-color: <?php echo $link_color;?>;}
.eight .honeypress_header_btn:hover {background-color: <?php echo $link_color;?>;}
.navbar.navbar7 .nav .nav-item.html:hover a, .navbar.navbar7 .nav .nav-item.html.active a {
    color: <?php echo $link_color;?>;
}
.navbar5.navbar .nav .nav-item.html:hover a, .navbar5.navbar .nav .nav-item.html.active a {
    background: <?php echo $link_color;?>;
}

.navbar .nav .nav-item.html:hover a, .navbar .nav .nav-item.html.active a {
    color: <?php echo $link_color;?>;
}
.hw .honeypress_header_btn:hover, .hw .honeypress_header_btn:focus {
    background: <?php echo $link_color;?>;
    color: <?php echo $link_color;?>;
}
.navbar5.navbar .nav .nav-item.menu-html.menu-item:hover a, .navbar5.navbar .nav .nav-item.menu-html.menu-item.active a {
    background: <?php echo $link_color;?>;
}
.navbar5 .nav-item .widget button[type="submit"]:hover, .navbar5 .nav-item .widget button[type="submit"]:focus {
    color: #fff;
    background-color: <?php echo $link_color;?> !important;
    border-color: <?php echo $link_color;?> !important;
}
.navbar6 .nav .nav-item.radix-html:hover a, .navbar6 .nav .nav-item.radix-html.active a{color: <?php echo $link_color;?>;}
.navbar.navbar5 .nav-item .widget a:hover{color: <?php echo $link_color;?>;}

.hp-preloader-cube .hp-cube:before {background: <?php echo $link_color;?>;}
#preloader2 .square{background: <?php echo $link_color;?>;}

/* Dark CSS */
body.dark .navbar .nav .nav-item .nav-link:hover, body.dark .navbar .nav .nav-item.active .nav-link {
    color: <?php echo $link_color;?>;
}
body.dark .dropdown-item:focus, body.dark .dropdown-item:hover {
    color: <?php echo $link_color;?> !important;
    background: #000000;
}
body.dark .text-dark {color: <?php echo $link_color;?> !important;}
body.dark .dropdown-menu {background-color: #141414;color: <?php echo $link_color;?> !important;}
body.dark .btn-light:hover , body.dark .btn-light:focus{
    background: <?php echo $link_color;?>;
    color: #ffffff;
}
body.dark .services3 .entry-header .entry-title a:hover {
    color: <?php echo $link_color;?> !important;
}
.entry-header .entry-title a:hover,
.entry-header .entry-title a:focus {
    color: <?php echo $link_color;?> !important;
}
body.dark .entry-meta .comment-links a::before { content: "\f0e5"; color: <?php echo $link_color;?>; }
body.dark .btn-default-dark {
    border: 2px solid <?php echo $link_color;?>;
    color: #ffffff;
    background: transparent;
}
body.dark .btn-default-dark:hover , body.dark .btn-default-dark:focus {
    color: #ffffff !important;
    background: <?php echo $link_color;?>;
}
body.dark .btn-default-dark:hover, body.dark .btn-default-dark:focus {background: <?php echo $link_color;?>; color: #ffffff !important;}
body.dark .services .post-thumbnail i.fa {
    box-shadow: <?php echo $link_color;?> 0px 0px 0px 2px;
}
body.dark .blog .standard-view .more-link:hover, body.dark .blog .list-view .more-link:hover {
    color: #ffffff;
    background: <?php echo $link_color;?>;
}
body.dark .navbar .nav .nav-item .nav-link:hover, body.dark .navbar .nav .nav-item.active .nav-link {
    color: <?php echo $link_color;?>;
}
body.dark .search-box-outer .dropdown a:hover{color:<?php echo $link_color;?> !important; }
body.dark .search-form input[type="submit"] {
    background-color: #ffffff !important;
    color: #000000;
}
body.dark .search-form input[type="submit"]:hover {
    background: <?php echo $link_color;?> !important;
    color: #ffffff;
}
body.dark mark, body.dark ins {
    background: transparent;
}
body.dark .header-sidebar.five {
    background: <?php echo $link_color;?>;
}
body.dark .services4.services6 .entry-header .entry-title a:hover, body.dark .services4.services6 .entry-header .entry-title a:focus {
    color: <?php echo $link_color;?> !important;
}
body.dark .pagination a:hover, body.dark .pagination a.active {
    background-color: <?php echo $link_color;?>;
    border: 1px solid <?php echo $link_color;?>;
    color: #fff;
}
body.dark input[type="submit"]:hover {
    background: <?php echo $link_color;?> !important;
    color: #ffffff;
}
body.dark .text-default { color: <?php echo $link_color;?> ; }
body.dark .entry-meta .tag-links a:hover {
    background-color: <?php echo $link_color;?>;
    border: 1px solid #363636;
    color: <?php echo $link_color;?>;
}
body.dark .open .search-form input[type="submit"] {
    background-color: <?php echo $link_color;?> !important;

}
body.dark .bg-light.open .search-form input[type="submit"]:hover {
    background-color: #000 !important;
}
body.dark .open .search-form input[type="submit"]:hover {
    background-color: #4e4a4a !important;
}
body.dark .woocommerce-Tabs-panel input[type="submit"]:hover {background-color: <?php echo $link_color;?> !important; }
body.dark .btn-border:hover, body.dark .btn-border:focus{background: <?php echo $link_color;?>;}
body.dark .navbar .nav .nav-item.html:hover a, body.dark .navbar .nav .nav-item.html.active a {
    color: <?php echo $link_color;?>;
}
body.dark .widget .tagcloud a:hover, body.dark .nav-item .widget .tagcloud a:focus{background:<?php echo $link_color;?> !important;}

/*=======  WORDPRESS 5.8 WIDGET CSS ========*/
.wp-block-search .wp-block-search__label:after,.widget h1:after,.widget h2:after,.widget h3:after,.widget h4:after,.widget h5:after,.widget h6:after {
    background: <?php echo $link_color;?>;
}
.widget li::before {
	color: <?php echo $link_color;?>;
}
.widget .tag-cloud-link:hover, .widget .tag-cloud-link:focus {
    background-color: <?php echo $link_color;?>;
    border: 1px solid <?php echo $link_color;?>;
}
.site-footer .widget .tag-cloud-link:hover { background-color: <?php echo $link_color;?>;}

</style>
<?php endif; } ?>
