<?php 
/**
 * Template Name: Service Six
 */
get_header();
honeypress_breadcrumbs();?>

<!-- Service Section -->
<?php if ( $post->post_content!=="" ) { ?>
	<section class="section-module service">
		<div class="container<?php echo honeypress_container();?>">
			<div class="row">
				<div class="col-md-12 col-sm-12">
				<?php 
				the_post();
				the_content(); ?>			
				</div>	
			</div>
		</div>
	</section>
<?php } ?>
<div class="clearfix"></div>
<!-- /End of Service Section -->

<?php if(get_theme_mod('services_enable',true) == true) { 
do_action( 'honeypress_advance_service' );	
get_template_part('inc/home-section/service','design4');?>
<div class="clearfix"></div>
<?php } ?>

<?php if(get_theme_mod('service_testimonial_enable',true) == true) {
get_template_part('inc/home-section/testimonial','content4'); ?>
<div class="clearfix"></div>
<?php } ?>

<?php if(get_theme_mod('service_funfact_enable',true) == true) { 
get_template_part('inc/home-section/fun','content'); ?>
<div class="clearfix"></div>
<?php } ?>

<?php if(get_theme_mod('service_callout_enable',true) == true) { 
get_template_part('inc/home-section/cta','content');?>
<div class="clearfix"></div>
<?php } ?>

<?php if(get_theme_mod('service_client_enable',true) == true) {
get_template_part('inc/home-section/client','content');	
?>
<?php } ?>
<div class="clearfix"></div>

<?php get_footer();?>