<?php
/**
 * Shows breadcrumb
 *
 * @package cenote
 */

// If we are front page or blog page, return.
if ( is_front_page() || is_home() ) {
	return;
}

// If file is not already loaded, loaded it now.
if ( ! function_exists( 'breadcrumb_trail' ) ) {
	include get_template_directory() . '/functions/compatibility/breadcrumb.php';
}
$hide_show_banner = get_theme_mod('banner_enable',true);
		if($hide_show_banner == true)
		{
?>
<section class="page-title-section" <?php if ( get_header_image() ){ ?> style="background:#17212c url('<?php header_image(); ?>')"  <?php } ?>>	
	<?php
	$breadcrumb_overlay=get_theme_mod('breadcrumb_overlay_section_color','rgba(0,0,0,0.8)');
	?>
	<style type="text/css">
		.page-title-section .overlay
		{
		    background-color: <?php echo $breadcrumb_overlay;?>;
		}
	</style>
	<?php
	if(get_theme_mod('breadcrumb_image_overlay',true)==true):?>
		<div class="overlay"></div>		
	<?php endif;?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<?php
				breadcrumb_trail( array(
					'container'   => 'div',
					'before'      => '<div class="page-title text-center text-white">',
					'after'       => '</div>',
					'show_browse' => false,
				) );
				?>                    
			</div>
		</div>
	</div>	
</section>
<?php } ?>