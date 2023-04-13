<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package honeypress
 */

get_header();
honeypress_breadcrumbs();?>	
<section class="section-module blog">
	<div class="container<?php echo honeypress_blog_post_container();?>">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-12 standard-view">
			<?php
			if(get_theme_mod('post_nav_style_setting','pagination')=='pagination')
			{
			 if(have_posts()): while(have_posts()): the_post();
					//get_template_part( 'template-parts/content', get_post_type() );
					get_template_part( 'template-parts/blog/content-blog-template-format', get_post_format() );
					
				endwhile;
				else:
					//get_template_part( 'template-parts/content', 'none' );
					get_template_part( 'template-parts/content-blog-template', 'none' );
				endif;		
				do_action('honeypress_post_navigation');
			}
			else
			{
				echo do_shortcode('[ajax_posts]');
			}?>		
			</div>	
		
			<div class="col-lg-4 col-md-5 col-sm-12">
				<div class="sidebar s-l-space">
					<?php dynamic_sidebar('sidebar-1');?>								
				</div>
			</div>
		
		</div>
	</div>
</section>   
<?php get_footer();?>