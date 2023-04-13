<?php 
/**
 * Template Name: About Us
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
if(get_theme_mod('about_funfact_enable',true) == true) 
{ 
	get_template_part('inc/home-section/fun','content');
}  
if(get_theme_mod('about_team_enable',true) == true) 
{ 
	get_template_part('inc/home-section/team','content'.get_theme_mod('about_team_design_layout',1));

} 
if(get_theme_mod('about_testimonial_enable',true) == true) 
{ 
	get_template_part('inc/home-section/testimonial','content'.get_theme_mod('about_testimonial_design_layout',1));
}
if(get_theme_mod('about_client_enable',true) == true) 
{
	get_template_part('inc/home-section/client','content');
} 
get_footer();?>