<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<style type="text/css">
		.container.container_default
		{
		    max-width: <?php echo get_theme_mod('container_width_pattern',1140);?>px !important;
		}
	</style>
	<?php wp_head(); ?>
</head>
	<?php 
	$layout_selector=get_theme_mod('spicepress_layout_style','wide');
	if($layout_selector == "boxed")
	{ $class="boxed"; }
	else
	{ $class="wide"; }
 ?>
<body <?php body_class($class." ".get_theme_mod('spicepress_color_skin','light')); ?> >
<div id="wrapper">
	
<?php 
$header_one_name = get_theme_mod('header_one_name','');
$header_one_text = get_theme_mod('header_one_text','');
if ( get_header_image() != '') {?>
<header class="custom-header">	
	
	<div class="wp-custom-header">
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	</div>
	
	<div class="container header-content">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="">
					<?php if($header_one_name != '') { ?>
					<h1><?php echo $header_one_name;?></h1>
					<?php }  if($header_one_text != '') { ?>
					<h3><?php echo $header_one_text ;?></h3>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	
</header>
<?php } 	
$header_varition = get_theme_mod( 'header_varition', 'standard' );
get_template_part('header/header-topbar');
if($header_varition=='center')
{
get_template_part('header/header-center'); 
}
else
{
get_template_part('header/header-navbar'); 	
}
?>