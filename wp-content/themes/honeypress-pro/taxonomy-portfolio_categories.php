<?php 
get_header();
honeypress_breadcrumbs();
$portfolio_cat_title = get_theme_mod('porfolio_category_page_title',__('Portfolio Category Title','honeypress'));
$portfolio_cat_desc = get_theme_mod('porfolio_category_page_desc',__('Morbi facilisis, ipsum ut ullamcorper venenatis, nisi diam placerat turpis, at auctor nisi magna cursus arcu.', 'honeypress'));
$portfolio_cat_column_layout = get_theme_mod('portfolio_cat_column_layout',3);
?>
<section class="section-module portfolio">
	<div class="container<?php echo honeypress_container();?>">
	<?php if(!empty($portfolio_cat_title) || !empty($portfolio_cat_desc)):?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="section-header text-center">
					<div class="section-separator border-center"></div>
					<?php if(!empty($portfolio_cat_desc)):?><p class="section-subtitle"><?php echo $portfolio_cat_desc; ?></p><?php endif;?>
					<?php if(!empty($portfolio_cat_title)):?><h2 class="section-title"><?php echo $portfolio_cat_title; ?></h2><?php endif;?>
				</div>
			</div>
		</div>
	<?php endif;?>
		<div id="content" class="tab-content" role="tablist">
		<?php $norecord=0;
		$args = array ('post_status' => 'publish');
		$portfolio_query = null;		
		$portfolio_query = new WP_Query($args);	
		if( have_posts() ): ?>
			<div class="row">
				<?php while (have_posts()) : the_post();
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
								<figure class="portfolio-thumbnail">
								<?php if($portfolio_cat_column_layout == 2) { 
									the_post_thumbnail('full',array('class'=>'img-fluid'));
								} 
												
								if($portfolio_cat_column_layout == 3) {
									the_post_thumbnail('full',array('class'=>'img-fluid'));
								}
												
								if($portfolio_cat_column_layout == 4) { 
									the_post_thumbnail('full',array('class'=>'img-fluid'));
								} 

								if(has_post_thumbnail())
								{ 
									$post_thumbnail_id = get_post_thumbnail_id();
									$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
								} 
								?>
									<div class="click-view">
									<?php if(isset($post_thumbnail_url)){ ?>
										<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" ><i>+</i></a>
									<?php } ?>
									<?php if(!empty($portfolio_link)) {?>
										<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> ></a>
									<?php } ?>

								</figure>	
								<figcaption>
									<header class="entry-header"><h4 class="entry-title"><?php if(!empty($portfolio_link)) {?>
										<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> ><?php the_title(); ?></a>
													<?php } else the_title();  ?></h4>
									</header>
								</figcaption>
							</article>
						<?php echo '</div>'; 
					
				 endwhile; 
				$norecord=1;
			wp_reset_query();?>									
		</div>
		<?php endif; ?>
		</div>
	</div>		
</section>
<?php get_footer(); ?>