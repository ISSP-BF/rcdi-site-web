<?php
/**
 * The header for our theme
 *
 * @package Honeypress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<style type="text/css">
.container.container_default{max-width: <?php echo get_theme_mod('container_width_pattern',1140);?>px;}
.container.slider-caption{max-width: <?php echo get_theme_mod('container_slider_width',1140);?>px;}
.honeypress-service-container.container{max-width: <?php echo get_theme_mod('container_service_width',1140);?>px;}
.honeypress-fun-container.container{max-width: <?php echo get_theme_mod('container_fun_fact_width',1140);?>px;}
.honeypress-portfolio-container.container{max-width: <?php echo get_theme_mod('container_portfolio_width',1140);?>px;}
.honeypress-tesi-container.container{max-width: <?php echo get_theme_mod('container_testimonial_width',1140);?>px;}
.honeypress-newz.container{max-width: <?php echo get_theme_mod('container_home_blog_width',1140);?>px;}
.honeypress-cta-container.container{max-width: <?php echo get_theme_mod('container_cta_width',1140);?>px;}
.honeypress-team-container.container{max-width: <?php echo get_theme_mod('container_team_width',1140);?>px;}
.honeypress-shop-container.container{max-width: <?php echo get_theme_mod('container_shop_width',1140);?>px;}
.honeypress-client-container.container{max-width: <?php echo get_theme_mod('container_clients_width',1140);?>px;}
</style>	
<?php wp_head();?>	
</head>
<?php
error_reporting(0);
	$layout_selector=get_theme_mod('honeypress_layout_style','wide');
	if($layout_selector == "boxed")
	{ $class="boxed"; }
	else
	{ $class="wide"; }
 ?>
<body <?php body_class($class." ".get_theme_mod('hp_color_skin','light')." theme-honeypress-pro" ); ?> >
<?php
global $template;
$col=explode("-",basename($template));
if (array_key_exists(1,$col))
{
	$column=$col[1];
}
else
{
	$column='';	
}
//Preloader
if(get_theme_mod('preloader_enable',false)==true && ($column!='portfolio')):
get_template_part('inc/preloader/preloader-'.get_theme_mod('preloader_style',1));
endif;

?>	
	<div id="wrapper">
	<?php
	//Top header Bar
	get_template_part('inc/topbar-header');
	honeypress_before_header_section_trigger();
	
	//Header Preset
	get_template_part('inc/header-preset/menu-with-'.get_theme_mod('header_logo_placing','left').'-logo');

	if(get_theme_mod('search_effect_style_setting','toogle')!='toogle'):?>
<div id="searchbar_fullscreen" <?php if(get_theme_mod('search_effect_style_setting','popup_light')=='popup_light'):?> class="bg-light" <?php endif;?>>
         <button type="button" class="close">×</button>
         <form method="get" id="searchform" autocomplete="off" class="search-form" action="<?php echo esc_url( home_url( '/' ));?>"><label><input type="search" class="search-field" placeholder="Search …" value="" name="s" id="s"></label><input type="submit" class="search-submit btn" value="<?php echo esc_html__('Search','honeypress');?>"></form>
      </div>
<?php endif; honeypress_after_header_section_trigger(); ?>
<?php do_action( 'honeypress_slider_sidebar' ); ?>