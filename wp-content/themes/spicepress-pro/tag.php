<?php 
/**
 * Archive page template
 */
get_header(); 
spicepress_overlap_bredcrumb(); ?>
<!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container">
		<div class="row">	
			<!--Blog Section-->
			<div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'8' ); ?> col-xs-12">
				<?php 
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						// Include the post format-specific template for the content.
						get_template_part( 'content',get_post_format() );
					endwhile;
					
                    // pagination function
					$obj = new spicepress_pagination();
					$obj->spicepress_page();
				
					
				else :
				
				 // If no content found
				 get_template_part( 'content', '' );
				 
				endif;
				?>
			</div>	
			<!--/Blog Section-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->

<?php get_footer(); ?>