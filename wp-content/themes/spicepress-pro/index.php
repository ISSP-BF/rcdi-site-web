<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package WordPress
 * @subpackage Spicepress
 */
 
get_header();
$header_varition = get_theme_mod( 'header_varition', 'standard' );
if($header_varition == 'overlap') {
spicepress_breadcrumbs();
}
else
{ 
	spicepress_overlap_bredcrumb(); 
}

?>
<!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container<?php echo spicepress_blog_post_container();?>">
		<div class="row">	
			<!--Blog Section-->
			<div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'8' ); ?> col-sm-7 col-xs-12">
			<?php 
			if(get_theme_mod('post_nav_style_setting','pagination')=='pagination')
			{
					if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						// Include the post format-specific template for the content. get_post_format
						get_template_part( 'content','' );
					endwhile;
					
					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );
				
				endif;
			}else{
				echo do_shortcode('[ajax_posts]');
			}?>
			</div>	
			<!--/Blog Section-->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->
<?php get_footer(); ?>