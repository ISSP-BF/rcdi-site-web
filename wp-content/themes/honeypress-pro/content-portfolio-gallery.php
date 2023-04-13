<?php 
    $post_type = 'honeypress_portfolio';
	$posts_per_page = get_theme_mod('portfolio_numbers_options',4);
	$porfolio_page_title = get_theme_mod('porfolio_page_title',__('Our Portfolio','honeypress'));
	$porfolio_page_subtitle = get_theme_mod('porfolio_page_subtitle',__('Our Recent Works','honeypress'));
?>
<section class="section-module portfolio tem <?php if(is_page_template('template/template-portfolio-2-col-gallery.php') || is_page_template('template/template-portfolio-3-col-gallery.php') || is_page_template('template/template-portfolio-4-col-gallery.php')) {?>portfolio-gallery-template<?php } ?>">
	<div class="container<?php echo honeypress_container();?>">
		<?php if(!empty($porfolio_page_title) || !empty($porfolio_page_subtitle)):?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="section-header text-center">
					<div class="section-separator border-center"></div>
					<?php if(!empty($porfolio_page_title)):?><p class="section-subtitle"><?php echo $porfolio_page_title; ?></p><?php endif;?>
					<?php if(!empty($porfolio_page_subtitle)):?><h2 class="section-title"><?php echo $porfolio_page_subtitle;?></h2><?php endif;?>
				</div>
			</div>
		</div>
		<?php endif;

		global $paged;
		$curpage = $paged ? $paged : 1;
						
		$args = array (
		'post_type' => $post_type,
		'post_status' => 'publish',										
		'posts_per_page' => $posts_per_page,
		'paged' => $curpage,
		'orderby' => 'DESC',			
		);
		$portfolio_query = null;		
		$portfolio_query = new WP_Query($args);
			
		if( $portfolio_query->have_posts() ):?>			
			<div class="row">
				<?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
					$portfolio_target = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true )); 
					if(get_post_meta( get_the_ID(),'portfolio_link', true )) 
					{ 
						$portfolio_link = get_post_meta( get_the_ID(),'portfolio_link', true );
					} 
					else 
					{
						$portfolio_link = '';
					}
					$class = '';
					if(is_page_template('template/template-portfolio-2-col-gallery.php')) {
						$class = 'col-md-6 col-sm-6 col-xs-12 portfolio-gallery';
					}
					if(is_page_template('template/template-portfolio-3-col-gallery.php')) {
						$class = 'col-md-4 col-sm-4 col-xs-12 portfolio-gallery';
					}
					if(is_page_template('template/template-portfolio-4-col-gallery.php')) {
						$class = 'col-md-3 col-sm-3 col-xs-12 portfolio-gallery';
					}
					if(is_page_template('template/template-portfolio-2-col-non-filter.php')) {
						$class = 'col-md-6 col-sm-6 col-xs-12';
					}
					if(is_page_template('template/template-portfolio-3-col-non-filter.php')) {
						$class = 'col-md-4 col-sm-4 col-xs-12';
					}
					if(is_page_template('template/template-portfolio-4-col-non-filter.php')) {
						$class = 'col-md-3 col-sm-3 col-xs-12';
					}											
					echo '<div class="'.$class.'">';?>
					<article class="post">
						<figure class="portfolio-thumbnail">
							<?php the_post_thumbnail('full',array('class'=>'img-fluid'));
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
							</div>
						</figure>
						<?php  if(is_page_template('template/template-portfolio-2-col-non-filter.php') || is_page_template('template/template-portfolio-3-col-non-filter.php') || is_page_template('template/template-portfolio-4-col-non-filter.php') ) { ?>	
						<figcaption>
						    <header class="entry-header"><h4 class="entry-title">
								<?php if(!empty($portfolio_link)) {?>
									<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> ><?php the_title(); ?></a>
								<?php } else the_title();  ?></h4>
							</header>										
						</figcaption>
						<?php } ?>	
					</article>
					<?php echo '</div>'; ?>
				<?php endwhile; ?>
			</div>
			<?php
			$total = $portfolio_query->found_posts;
			$Webriti_pagination = new Webriti_pagination();
 			$Webriti_pagination->Webriti_page($curpage, $portfolio_query,$total,$posts_per_page);	
			wp_reset_query();
		endif; ?>		
	</div>		
</section>