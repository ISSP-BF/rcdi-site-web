<?php 
/**
 * Template Name: Testimonial Grid Style Four
*/
get_header();
honeypress_breadcrumbs();?>

<?php if ( $post->post_content!=="" ) { ?>
<section class="section-module about">
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
<?php } 
if(get_theme_mod('testimonial_enable',true) == true) 
{ 
	get_template_part('inc/home-section/testimonial','content4');
}
if(get_theme_mod('testimonial_client_enable',true) == true) 
{
	get_template_part('inc/home-section/client','content');
} 
get_footer();?>