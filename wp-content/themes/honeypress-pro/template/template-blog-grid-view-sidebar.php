<?php 
/**
 * Template Name: Blog grid view sidebar
 */
get_header();
honeypress_breadcrumbs();?>
<?php $exc_length=get_theme_mod('honeypress_blog_content','excerpt');?>

<section class="section-module blog grid-view <?php if($exc_length!='excerpt') { echo 'full-width'; }?> bgv-sidebar">
	<div class="container<?php echo honeypress_blog_post_container();?>">
		<div class="row">			
			<div class="col-lg-8 col-md-7 col-sm-12 ">
				<?php if(get_theme_mod('post_nav_style_setting','pagination')=='pagination') { ?>
				<div class="row">
					<?php
					if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
					else { $paged = 1; }
					$args = array( 'post_type' => 'post','paged'=>$paged);
					$loop = new WP_Query( $args );
					if($loop->have_posts()): 
						while($loop->have_posts()): $loop->the_post();?>
					<div class="col-lg-6 col-md-6 col-sm-12">
					<?php get_template_part( 'template-parts/blog-grid-view/content-format', get_post_format() );?>	
					</div>
				<?php
					endwhile;
				endif;	?>
				</div>
				<?php // pagination function
				$obj = new honeypress_pagination();
				$obj->honeypress_page($loop); } else { echo do_shortcode('[ajax_posts]'); } ?> 
			</div>	
			<!--Sidebar Widgets-->
			<div class="col-lg-4 col-md-5 col-sm-12">
				<div class="sidebar s-l-space">
					<?php dynamic_sidebar('sidebar-1');?>	
				</div>
			</div>
			<!--/Sidebar Widgets-->	
		</div>
	</div>
</section>
<?php get_footer(); ?>