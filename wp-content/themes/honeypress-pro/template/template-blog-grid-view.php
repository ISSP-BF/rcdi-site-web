<?php 
/**
 * Template Name: Blog grid view
 */
get_header();
honeypress_breadcrumbs();
$blog_temp_type=get_theme_mod('honeypress_blog_content','excerpt');
?>
<section class="section-module blog grid-view <?php if($blog_temp_type=='content') { echo 'blog-grid-view-full'; } ?>">
	<div class="container<?php echo honeypress_blog_post_container();?>">
		<?php
		if(get_theme_mod('post_nav_style_setting','pagination')=='pagination')
					{ ?>
		<div class="row">
			<?php
			if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
			elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
			else { $paged = 1; }
			$args = array( 'post_type' => 'post','paged'=>$paged);
			$loop = new WP_Query( $args );
			if($loop->have_posts()): 
				while($loop->have_posts()): $loop->the_post();
				echo '<div class="col-lg-4 col-md-6 col-sm-12">';
				get_template_part( 'template-parts/blog-grid-view/content-format', get_post_format() );
				echo '</div>';	
				endwhile;
			endif; ?>
		</div>
		<?php
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
</section>
<?php get_footer(); ?>