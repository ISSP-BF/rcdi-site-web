<?php 
/**
 * Template Name: Blog full width
 */
get_header();

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}

spicepress_overlap_bredcrumb();?>
<!-- Blog & Sidebar Section -->
<section class="blog-section">
	<div class="container<?php echo spicepress_blog_post_container();?>">
		<div class="row">
			
			<!--Blog Section-->
			<div class="col-md-12 col-xs-12">
			
			<?php
			if(get_theme_mod('post_nav_style_setting','pagination')=='pagination')
			{
			the_Post();
			
			$cc = get_the_content();
			
			if ( has_post_thumbnail() || $cc != '' ) : ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content-area wow fadeInDown animated' ); ?> data-wow-delay="0.4s">
				<?php 
					echo '<div class="blog-featured-img"><a class="post-thumbnail" href="'.get_the_permalink().'">';
				the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => get_the_title() ) );
				echo '</a></div>';
					 ?>
					<div class="post-content">		
						<div class="entry-content">
						<?php the_content( __('Read More','spicepress') );
							wp_link_pages();?>
						</div>							
					</div>
				</article>
				
			<?php endif; ?>
				
				<?php				
				if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
				elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
				else { $paged = 1; }
				
				if(get_theme_mod('blog_page_testimonial_enable',true)==false && get_theme_mod('blog_page_room_enable',true)==false):
					
					$client_arg = array();
					$client_opt = get_option('widget_wdl_feature_post_quote_widget');
					
					foreach($client_opt as $val){
						if($val['client_cat']!=''){
							$client_arg[] = $val['client_cat'];
						}						
					}
					
					$room_arg = array();
					$room_opt = get_option('widget_wdl_feature_post_standard_widget');
					
					foreach($room_opt as $value){
						if($value['blog_cat']!=''){
							$room_arg[] = $value['blog_cat'];
						}						
					}
					
					$cats = array_merge($client_arg, $room_arg);
					$args = array( 'post_type' => 'post','category__not_in'=>$cats,'paged'=>$paged);
					
				elseif(get_theme_mod('blog_page_testimonial_enable',true)==false):
					$cat_arg = array();
					$widget_opt = get_option('widget_wdl_feature_post_quote_widget');
					
					foreach($widget_opt as $val){
						if($val['client_cat']!=''){
							$cat_arg[] = $val['client_cat'];
						}						
					}
					
				   $args = array( 'post_type' => 'post','category__not_in'=>$cat_arg,'paged'=>$paged);
				   
				elseif(get_theme_mod('blog_page_room_enable',true)==false):
					$blog_arg = array();
					$room_widget_opt = get_option('widget_wdl_feature_post_standard_widget');
					
					foreach($room_widget_opt as $val){
						if($val['blog_cat']!=''){
							$blog_arg[] = $val['blog_cat'];
						}						
					}
					
				   $args = array( 'post_type' => 'post','category__not_in'=>$blog_arg,'paged'=>$paged);
				else:
					$args = array( 'post_type' => 'post','paged'=>$paged);
				endif;
				
						
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
			
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->

<?php get_footer(); ?>