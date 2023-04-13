<?php 
/**
 * Template Name: Blog masonry 3 Col
 */
get_header();

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}
spicepress_overlap_bredcrumb(); ?>
<!-- Blog Section -->
<section class="blog-section">
	<div class="container<?php echo spicepress_blog_post_container();?>">
	<?php
	if(get_theme_mod('post_nav_style_setting','pagination')=='pagination')
	{?>
		<div class="row">		
			<?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
				elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
				else { $paged = 1; }
			$args = array( 'post_type' => 'post','paged'=>$paged);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) :?>
			<div id="blog-masonry">
				<?php
				// Start the Loop.
				while ( $loop->have_posts() ) : $loop->the_post();
				echo '<div class="item">';
					// Include the post format-specific template for the content.
					get_template_part( 'content',get_post_format() );
				echo '</div>';
				endwhile;?>
			</div>
			<?php endif;?>
		</div>
		<div class="row">
			<?php
			// pagination function
			$obj = new spicepress_pagination();
			$obj->spicepress_page($loop);
			?>
		</div>
	<?php 
	}
	if(get_theme_mod('post_nav_style_setting','pagination')!="pagination")
	{
		echo do_shortcode('[ajax_posts]');
	}?>
	</div>
</section>
<!-- /Blog Section -->
<?php get_footer(); ?>