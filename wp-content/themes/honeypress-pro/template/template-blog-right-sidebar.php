<?php 
/**
 * Template Name: Blog right sidebar
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
				if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
				elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
				else { $paged = 1; }
				$args = array( 'post_type' => 'post','paged'=>$paged);
				$loop = new WP_Query( $args );
				if($loop->have_posts()): 
					while($loop->have_posts()): $loop->the_post();
						get_template_part( 'template-parts/blog/content-blog-template-format', get_post_format() );
					endwhile;
				else:
					get_template_part( 'template-parts/content-blog-template', 'none' );
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
			
			<div class="col-lg-4 col-md-5 col-sm-12">
				<div class="sidebar s-l-space">
					<?php dynamic_sidebar('sidebar-1');?>								
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>