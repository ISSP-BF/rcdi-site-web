<?php 
/**
 *  Template Name: Blog Masonry 3 Column
 */
get_header();
honeypress_breadcrumbs();?>
<?php $exc_length=get_theme_mod('honeypress_blog_content','excerpt');?>
<section class="masonry section-module blog grid-view <?php if($exc_length!='excerpt') { echo 'threemasonary-full-width'; }?>">
	<div class="container<?php echo honeypress_blog_post_container();?>">
		<?php
		if(get_theme_mod('post_nav_style_setting','pagination')=="pagination")
		{ ?>
		<div class="grid">
			<?php
			if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
			elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
			else { $paged = 1; }
			$args = array( 'post_type' => 'post','paged'=>$paged);
			$loop = new WP_Query( $args );
			if($loop->have_posts()): 
				while($loop->have_posts()): $loop->the_post();
				get_template_part('template-parts/ajax-masonary-three-col-content');
				endwhile;
			endif;	?>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<hr class="b-space">
				<?php
					// pagination function
					$obj = new honeypress_pagination();
					$obj->honeypress_page($loop);
				?>
			</div>
		</div>
		<?php
		}
		if(get_theme_mod('post_nav_style_setting','pagination')!="pagination")
		{
			echo do_shortcode('[ajax_posts]');
		}	
		?>
	</div>
</section>
<?php get_footer(); ?>