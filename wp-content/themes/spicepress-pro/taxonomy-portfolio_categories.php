<?php
get_header();
spicepress_overlap_bredcrumb();
$portfolio_cat_title = get_theme_mod('portfolio_cat_title',__('Portfolio category title','spicepress'));
$portfolio_cat_desc = get_theme_mod('portfolio_cat_desc','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
$portfolio_cat_column_layout = get_theme_mod('portfolio_cat_column_layout',3);
?>
<section class="portfolio-section padding-0 portfolio_cat_page">
	<div class="container<?php echo spicepress_container();?>">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms"><?php echo esc_attr($portfolio_cat_title); ?></h1>
					<div class="widget-separator"><span></span></div>
					<p class="wow fadeInDown animated"><?php echo esc_attr($portfolio_cat_desc); ?></p>
				</div>
			</div>
		</div>
		<!-- /Section Title -->	
		<div class="tab-content" id="myTabContent">
			<?php $norecord=0;
				$args = array (
				'post_status' => 'publish');
				$portfolio_query = null;		
				$portfolio_query = new WP_Query($args);				
				if( have_posts() ) : ?>
				<div>
					<div class="row">
					<?php
							while ( have_posts()) : the_post();
								
								
									
									$portfolio_target = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true )); 
									
									if(get_post_meta( get_the_ID(),'portfolio_link', true )) { 
										$portfolio_link = get_post_meta( get_the_ID(),'portfolio_link', true );
									} 
									else 
									{
										$portfolio_link = '';
									} 
									
									$class = '';
									
									if($portfolio_cat_column_layout == 2) {
										$class = 'col-md-6 col-sm-6 col-xs-12';
									}
									
									if($portfolio_cat_column_layout == 3) {
										$class = 'col-md-4 col-sm-4 col-xs-12';
									}
									
									if($portfolio_cat_column_layout == 4) {
										$class = 'col-md-3 col-sm-3 col-xs-12';
									}
									
									echo '<div class="'.$class.'">';
									?>
										
										<article class="post">
											<figure class="post-thumbnail">
												<?php if($portfolio_cat_column_layout == 2) { 
												spicepress_image_thumbnail('','img-responsive');
												} ?>
												
												<?php if($portfolio_cat_column_layout == 3) {
												spicepress_image_thumbnail('','img-responsive');
												} ?>
												
												<?php if($portfolio_cat_column_layout == 4) { 
												spicepress_image_thumbnail('','img-responsive');
												} ?>

												<?php
												if(has_post_thumbnail())
												{ 
													$post_thumbnail_id = get_post_thumbnail_id();
													$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
												} 
												?>
												<div class="thumbnail-showcase-overlay">
												
													<div class="thumbnail-showcase-icons">
														
															<?php if(isset($post_thumbnail_url)){ ?>
															<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
															<?php } ?>
															<?php if(!empty($portfolio_link)) {?>
															<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> class="hover_thumb"><i class="fa fa-link"></i></a>
															<?php } ?>
														
													</div>
													
												</div>
												
											</figure>
											<header class="entry-header">
												<h4 class="entry-title"><?php if(!empty($portfolio_link)) {?>
													<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> class="hover_thumb"><?php the_title(); ?></a>
													<?php } else the_title();  ?>
												</h4>
											</header>
											<div class="entry-content">
												<?php if(get_post_meta( get_the_ID(), 'portfolio_title_description', true )){ ?>
												<p><?php echo get_post_meta( get_the_ID(), 'portfolio_title_description', true ); ?></p>
												<?php } ?>
											</div><!-- .portfolio-caption -->
										</article>
											<!-- .portfolio-image -->
											
											
							
									<?php echo '</div>'; ?>
									
									<?php 
									endwhile;
									
										$norecord=1; 
							wp_reset_query();
									?>
									
								<?php  ?>
							</div>
						</div>	
					<?php endif;?>
					
				
		</div>
	</div>
</section>	
<!-- /Portfolio Section -->
<?php get_footer(); ?>