<?php 
/**
 * Template Name: Contact page 4
 */
get_header(); 

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}

spicepress_overlap_bredcrumb(); ?>

<!-- Contact Section -->
<section class="cont-section contact">
	<div class="container<?php echo spicepress_container();?>">
	
		<?php if( has_post_thumbnail() ): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="post-featured-area">
					<div class="blog-featured-img">
					<?php $arg = array( 'class'=>'img-responsive' ); the_post_thumbnail( '',$arg ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
				<!--Google Map-->
		<?php 
		$google_map_title = get_theme_mod('google_map_title',__('Find us on the map','spicepress'));
		if( get_theme_mod('google_map_enable',true) == true ):?>
		<div class="row">
			<div class="col-md-<?php echo ( is_active_sidebar( 'wdl_contact_page_sidebar' ) ? '8' :'12' ); ?> col-xs-12 map-section1 wow flipInX animated animated" data-wow-delay=".5s">
				<?php if($google_map_title !='') { ?>
				<div class="sidebar">
					<div class="section-title wow fadeInDown animated" style="margin: 0;" data-wow-delay="0.4s">
						<div data-wow-delay="0.4s" class="section-header wow fadeInDown animated animated" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
						<h3 class="widget-title"><?php echo $google_map_title;  ?></h3>
						</div>
					</div>
				</div>
				<?php }
				if( get_theme_mod('contact_google_map_shortcode'))
				{
				?>

				<div class="cont-google-map map-section2">			
					<?php
					if( get_theme_mod('contact_google_map_shortcode') !='' ) {
					echo  do_shortcode(get_theme_mod('contact_google_map_shortcode')); 
					}
					?>	
					
				</div>
				<?php } ?>
				<!--Contact Form Section-->
				<?php if( get_theme_mod('contact_form_enable',true) == true ): ?>
				
						<?php 
						// Start the Loop.
						while ( have_posts() ) : the_post();
							// Include the page
							get_template_part( 'content','contact' );
							
							comments_template( '', true ); // show comments 
							
						endwhile;
						?>	
				<?php endif; ?>
			<!--/Contact Form Section-->
			</div>
		<?php endif; ?>
		<!--/Google Map-->
		
			<!--Contact Info-->
			<?php if( get_theme_mod('contact_info_enable',true) == true ):?>
			<div class="col-md-<?php echo ( is_active_sidebar( 'wdl_contact_page_sidebar' ) ? '4' :'12' ); ?> col-xs-12">
					
				<?php 
				if( is_active_sidebar('wdl_contact_page_sidebar') ) :
					echo '<div class="sidebar">';
					dynamic_sidebar( 'wdl_contact_page_sidebar' ); 
					echo '</div>';
				endif;
				?>
				
			</div>
			<?php endif; ?>
			<!--Contact Info-->	                     
		</div>
		

		
	</div>
</section>
<!-- /Contact Section -->

<?php get_footer(); ?>