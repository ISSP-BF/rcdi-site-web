<?php 
/**
 * The main template file
 */
get_header(); 
spicepress_overlap_bredcrumb(); ?>
<!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container<?php echo spicepress_single_post_container();?>">
		<div class="row">	
			<!--Blog Section-->
			<div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'8' ); ?> col-xs-12">
				<?php 
				// Start the Loop.
				while ( have_posts() ) : the_post();
					// Include the page
					get_template_part( 'content','single' );

				endwhile;

					// related post
					if(get_theme_mod('spicepress_enable_related_post',true ) ===true ):
					get_template_part('related-posts');
					endif;
					
					// author meta
					if(get_theme_mod('spicepress_enable_single_post_admin_details',true)===true):
					spicepress_author_meta();
					endif;
					// post navigation
					//spicepress_post_nav();
					
					comments_template( '', true ); // show comments 
				
					//get_template_part('author-details');
				
				?>
			</div>	
			<!--/Blog Section-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->

<?php get_footer(); ?>