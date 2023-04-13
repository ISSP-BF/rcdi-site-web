<?php 
/**
 * Template Name: Blog right sidebar
 */
get_header(); 

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}

spicepress_overlap_bredcrumb(); ?>
<!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container<?php echo spicepress_blog_post_container();?>">
		<div class="row">	
			<!--Blog Section-->
			<div class="col-md-8 col-sm-7 col-xs-12">
				<?php
				if(get_theme_mod('post_nav_style_setting','pagination')=='pagination')
				{
				if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
				elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
				else { $paged = 1; }
				$args = array( 'post_type' => 'post','paged'=>$paged);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) :
					// Start the Loop.
					while ( $loop->have_posts() ) : $loop->the_post();
						// Include the post format-specific template for the content.
						get_template_part( 'content',get_post_format() );
					endwhile;
					
					// pagination function
					$obj = new spicepress_pagination();
					$obj->spicepress_page($loop);
				 
				endif;
			}else{
				echo do_shortcode('[ajax_posts]');
			}
				?>
			</div>	
			<!--/Blog Section-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->

<?php get_footer(); ?>