<?php 
/**
 * Template Name: Blog list view
 */
get_header();
honeypress_breadcrumbs();
$blog_temp_type=get_theme_mod('honeypress_blog_content','excerpt');
?>
<section class="section-module blog <?php if($blog_temp_type=='content') { echo 'blog-list-view-full'; } ?>">
	<div class="container<?php echo honeypress_blog_post_container();?>">
		<div class="row">				
			<div class="col-lg-12 col-md-12 col-sm-12 list-view">
				<?php
				if(get_theme_mod('post_nav_style_setting','pagination')=='pagination')
				{
				if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
				elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
				else { $paged = 1; }
				$args = array( 'post_type' => 'post','paged'=>$paged);
				$loop = new WP_Query( $args );
				if($loop->have_posts()): 
					while($loop->have_posts()): $loop->the_post();
					get_template_part( 'template-parts/list-view/content-format', get_post_format() );
					endwhile;
				endif;	
				// pagination function
				$obj = new honeypress_pagination();
				$obj->honeypress_page($loop);
				}
				else
				{
				echo do_shortcode('[ajax_posts]');	
				}
				?>
			</div>	
		</div>
	</div>
</section>
<?php get_footer(); ?>