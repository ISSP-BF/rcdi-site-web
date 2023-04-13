<?php 
/**
 * Template Name: Blog Grid View Sidebar
 */
get_header(); 

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}

spicepress_overlap_bredcrumb(); ?>
<!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container<?php echo spicepress_blog_post_container();?>">
		<div class="row blog-grid-layout">	
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
						echo'<div class="col-md-6 col-sm-6 col-xs-12">';
						?>
						<article class="post" <?php post_class( 'post-content-area wow fadeInDown animated' ); ?> data-wow-delay="0.4s">				
							
							<header class="entry-header">
								<?php
								spicepress_blog_meta_content();  ?>
								<?php if ( is_single() ) :
								the_title( '<h3 class="entry-title">', '</h3>' );
								else :
								the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
								endif; 
								spicepress_blog_category_content();
								?>
							</header>				
							<?php 
							if(has_post_thumbnail()){
							if ( is_single() ) {
							echo '<figure class="post-thumbnail">';
							the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => get_the_title() ) );
							echo '</figure>';
							}else{
							echo '<figure class="post-thumbnail"><a class="post-thumbnail" href="'.esc_url(get_the_permalink()).'">';
							the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => get_the_title() ) );
							echo '</a></figure>';
							} } ?>
							<div class="entry-content">
								<?php spicepress_posted_content();?>
								<?php
							 	if(get_theme_mod('spicepress_enable_blog_read_button',true)===true):
							 		if(get_theme_mod('spicepress_blog_content','excerpt')=='excerpt'){?>
								<p>
									<?php spicepress_button_title();?>
								</p>
								<?php } endif;?>
							</div>						
						</article>
						<?php
						echo'</div>';
					endwhile;
					
					// pagination function
					echo'<div class="col-md-12 col-sm-12 col-xs-12">';
					$obj = new spicepress_pagination();
					$obj->spicepress_page($loop);
				 	echo'</div>';

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
