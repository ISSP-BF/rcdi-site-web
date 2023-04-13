<?php 
/**
 * Template Name: Slider with content
 */
get_header();
get_template_part('index','slider');
if ( $post->post_content!=="" )
{
?>
<!-- Slider Section -->
<section class="slider-section">	
	<div class="container<?php echo spicepress_container();?>">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<article class="slider-content">
					<?php 
					the_post();
					the_content(); 
					wp_link_pages();?>
				</article>
			</div>	
		</div>
	</div>
</section>
<!-- /Slider Section -->
<?php } ?>
<?php get_footer(); ?>