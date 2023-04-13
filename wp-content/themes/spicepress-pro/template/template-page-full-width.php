<?php 
/**
 * Template name:Full-width page
 */
get_header(); 

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}

spicepress_overlap_bredcrumb(); ?>
<!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container<?php echo spicepress_container();?>">
		<div class="row">	
			<!--Blog Section-->
			<div class="col-md-12 col-xs-12">
				<?php 
				// Start the Loop.
				while ( have_posts() ) : the_post();
				// Include the page
				?>
				<article class="post" id="post-<?php the_ID(); ?>" <?php post_class( 'post-content-area wow fadeInDown animated' ); ?> data-wow-delay="0.4s">

					<?php 
						echo '<figure class="post-thumbnail" href="'.esc_url(get_the_permalink()).'">';
						the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => get_the_title() ) );
						echo '</figure>';
					?>
					
					<div class="post-content">
					<div class="entry-content">
						<?php the_content( __('Read More','spicepress') );
							wp_link_pages();?>
						</div>							
					</div>
				</article>
					 <?php
					
					comments_template( '', true ); // show comments 
					
				endwhile;
				?>
			</div>	
			<!--/Blog Section-->
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->
<?php get_footer(); ?>