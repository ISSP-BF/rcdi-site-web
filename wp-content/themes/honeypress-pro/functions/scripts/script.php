<?php
function honeypress_enqueue_script()
	{

	if(get_theme_mod('custom_color_enable') == true) {
				custom_light();
				}
				else
				{
				$class = get_theme_mod('theme_color','default.css');
				wp_enqueue_style('honeypressp-default', HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/css/'.$class);
				}

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	require_once('custom_style.php');
	wp_enqueue_style('bootstrap', HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/css/bootstrap' . $suffix . '.css',array(),'4.0.0');
    wp_style_add_data( 'bootstrap', 'rtl', 'replace' );
	wp_enqueue_style('honeypress-style', get_stylesheet_uri() );
    wp_style_add_data( 'honeypress-style', 'rtl', 'replace' );
	wp_enqueue_style('jquery-starrtment', HONEYPRESS_PRO_TEMPLATE_DIR_URI. '/css/jquery.smartmenus.bootstrap-4.css');
    wp_style_add_data( 'jquery-starrtment', 'rtl', 'replace' );
	wp_enqueue_style('font-awesome', HONEYPRESS_PRO_TEMPLATE_DIR_URI. '/css/font-awesome/css/font-awesome' . $suffix . '.css',array(),'');
	wp_enqueue_style('animate', HONEYPRESS_PRO_TEMPLATE_DIR_URI. '/css/animate.css');
	wp_enqueue_style('owl', HONEYPRESS_PRO_TEMPLATE_DIR_URI. '/css/owl.carousel.css');
	wp_enqueue_style('lightbox', HONEYPRESS_PRO_TEMPLATE_DIR_URI. '/css/lightbox.css');
	if(get_theme_mod('hp_color_skin','light')=='dark')
	{
	wp_enqueue_style('customize-css', HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/css/dark.css');
	}

	//js file
	wp_enqueue_script('bootstrap', get_template_directory_uri(). '/js/bootstrap' . $suffix . '.js',array('jquery'), '', true);
	wp_enqueue_script('jquery-menu', get_template_directory_uri().'/js/smartmenus/jquery.smartmenus.js',array('jquery'), '', true);
	wp_enqueue_script('jquery-menu-bootstrap', get_template_directory_uri().'/js/smartmenus/jquery.smartmenus.bootstrap-4.js',array('jquery'), '', true);
	wp_enqueue_script('wow', get_template_directory_uri().'/js/wow.js',array('jquery'), '', true);
	wp_enqueue_script('owl', get_template_directory_uri().'/js/owl.carousel' . $suffix . '.js',array('jquery'), '', true);
	//wp_enqueue_script('masonry', get_template_directory_uri().'/js/masonry/mp.mansory.js',array('jquery'), '', true);
	wp_enqueue_script('honeypress-mp-masonry-js', HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/js/masonry/mp.mansory.js');
	wp_enqueue_script('grid-masonary', get_template_directory_uri().'/js/grid-mansory.js', array('jquery'), '', true);
	wp_enqueue_script('honeypress-custom-js', get_template_directory_uri().'/js/custom.js', array('jquery'), '', true);
	wp_enqueue_script('lightbox', get_template_directory_uri().'/js/lightbox/lightbox-2.6.min.js', array('jquery'), '', true);
	wp_enqueue_script('imgLoad', get_template_directory_uri().'/js/img-loaded.js', array('jquery'), '', true);
	wp_enqueue_script('honeypress-video-slider-js', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	}
	add_action('wp_enqueue_scripts','honeypress_enqueue_script');

function honeypress_plus_enqueue_scripts(){
	wp_enqueue_style('customize-css', HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/css/customize.css');
}
add_action( 'admin_enqueue_scripts', 'honeypress_plus_enqueue_scripts' );


// slider custom script
function add_theme_scripts() {
	$animation = get_theme_mod('animation', '');

	if($animation == ''){
		$animate_In = '';
		$animate_Out = '';
	}else{
		$animate_In = 'fadeIn';
		$animate_Out = 'fadeOut';
	}
	$animation_speed = get_theme_mod('animation_speed', 3000);
    $slider_smooth_speed = get_theme_mod('slider_smooth_speed', 1000);

    $slider_autoplay = get_theme_mod('slider_autoplay', true);
    $slider_loop = get_theme_mod('slider_loop', true);
    $slider_rewind = get_theme_mod('slider_rewind', true);
    $slider_nav_style = get_theme_mod('slider_nav_style', 'navigation');
    $isRTL = (is_rtl()) ? (bool) true : (bool) false;
    $settings=array('animateIn'=>$animate_In,'animateOut'=>$animate_Out,'animationSpeed'=>$animation_speed,'smoothSpeed'=>$slider_smooth_speed,'slideAutoplay'=>$slider_autoplay,'slideLoop'=>$slider_loop,'slideRewind'=>$slider_rewind,'slider_nav_style'=>$slider_nav_style,'rtl'=>$isRTL);

	wp_register_script('honeypress-slider',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/front-page/slider.js',array('jquery'),'',true);
	wp_localize_script('honeypress-slider','slider_settings',$settings);
	wp_enqueue_script('honeypress-slider');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


add_action('wp_footer','honeypress_custom_script');

function honeypress_custom_script()
{
	$col =6;

if(is_page_template('template/template-blog-masonry-two-column.php'))
{

	$col =6;
}
elseif(is_page_template('template/template-blog-masonry-three-column.php'))
{

	$col =4;
}
elseif(is_page_template('template/template-blog-masonry-four-column.php'))
{

	$col =3;
}
?>
<script>
jQuery(document).ready(function ( jQuery ) {
	jQuery("#blog-masonry").mpmansory(
		{
			childrenClass: 'item', // default is a div
			columnClasses: 'padding', //add classes to items
			breakpoints:{
				lg: <?php echo $col; ?>, //Change masonry column here like 2, 3, 4 column
				md: 6,
				sm: 6,
				xs: 12
			},
			distributeBy: { order: false, height: false, attr: 'data-order', attrOrder: 'asc' }, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
			onload: function (items) {
				//make somthing with items
			}
		}
	);
});
</script>
<?php
}

function honeypress_custom_team_script()
{
if(is_page_template('template/template-team-content-1.php') || is_page_template('template/template-team-content-2.php') || is_page_template('template/template-team-content-3.php') || is_page_template('template/template-team-content-4.php') || is_page_template('template/template-team-content-5.php') || is_page_template('template/template-team-content-6.php') || is_page_template('template/template-team-content-7.php') || is_page_template('template/template-team-content-8.php'))
{
?>
<script>
jQuery(document).ready(function ( jQuery ) {
	jQuery(".page-template-template-team-content-1 .sponsors").addClass('bg-grey');
	jQuery(".page-template-template-team-content-2 .sponsors").addClass('bg-grey');
	jQuery(".page-template-template-team-content-3 .sponsors").addClass('bg-grey');
	jQuery(".page-template-template-team-content-4 .sponsors").addClass('bg-grey');
	jQuery(".page-template-template-team-content-5 .sponsors").addClass('bg-grey');
	jQuery(".page-template-template-team-content-6 .sponsors").addClass('bg-grey');
	jQuery(".page-template-template-team-content-7 .sponsors").addClass('bg-grey');
	jQuery(".page-template-template-team-content-8 .sponsors").addClass('bg-grey');
});
</script>
<?php
}else
{
?>
<script>
jQuery(document).ready(function ( jQuery ) {
	jQuery(".section-module .sponsors").removeClass('bg-grey');
});
</script>
<?php
}
}
add_action('wp_footer','honeypress_custom_team_script');

//Load script at admin side
function honeypress_admin_scripts() {
 wp_enqueue_script( 'honeypress-admin-script', HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/js/admin.js', array('jquery'));
}
add_action( 'customize_controls_enqueue_scripts', 'honeypress_admin_scripts');
