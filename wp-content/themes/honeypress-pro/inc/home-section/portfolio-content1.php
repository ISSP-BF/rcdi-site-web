<?php
	$team_animation_speed = get_theme_mod('team_animation_speed', 3000);		
	$team_smooth_speed = get_theme_mod('team_smooth_speed', 1000);	
	$portfolio_nav_style = get_theme_mod('portfolio_nav_style', 'navigation');	
        $isRTL = (is_rtl()) ? (bool) true : (bool) false;
	$portfoliosettings=array('portfolio_nav_style'=>$portfolio_nav_style,'rtl'=>$isRTL);
	wp_register_script('honeypress-portfolio',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/front-page/portfolio.js',array('jquery'));
	wp_localize_script('honeypress-portfolio','portfolio_settings',$portfoliosettings);
	wp_enqueue_script('honeypress-portfolio');
?>
<section class="section-module portfolio business" id="portfolio">
	<div class="container"><?php do_action ('honeypress_portfolio_home_title_subtitle' ); ?></div>
	<?php  
	$post_type = 'honeypress_portfolio';
	$tax = 'portfolio_categories'; 
	$term_args=array( 'hide_empty' => true,'orderby' => 'id');
	$tax_terms = get_terms($tax,$term_args);
	$honeypress_active=1;
	if ($tax_terms)
	{ ?>
		<div class="container-fluid <?php if(! wp_is_mobile()) { ?>pl-0 pr-0 <?php } ?>">	
			<div class="row">
				<div id="portfolio-carousel" class="owl-carousel owl-theme col-lg-12">
				<?php  
				$honeypress_in=1;
				//$args=array('post_type'=>$post_type,"$tax"=> $tax_term->slug,'post_status'=>'publish','posts_per_page'=>-1 ,);
				$args=array('post_type'=>$post_type,'post_status'=>'publish','posts_per_page'=>-1 ,);
				$home_project_query = null;
				$home_project_query = new WP_Query($args);
				if( $home_project_query->have_posts() )
				{
					$k=1; 
					while ($home_project_query->have_posts()) : $home_project_query->the_post();?>
						<div class="item">	
							<article class="post">
								<figure class="portfolio-thumbnail">
								<?php
								if(has_post_thumbnail())
								{ 
									the_post_thumbnail('full', array('class' => 'img-fluid') );
									$post_thumbnail_id = get_post_thumbnail_id();
									$post_thumbnail_url= wp_get_attachment_url($post_thumbnail_id);
								} ?>
								<?php 
								if(isset($post_thumbnail_url)){?>
									<div class="click-view"><a href="<?php echo $post_thumbnail_url; ?>" data-lightbox="image" title="<?php the_title(); ?>"><i>+</i></a></div>
								<?php }?>
								</figure>	
								<figcaption>
									<header class="entry-header">
										<h4 class="entry-title">
											<a href="<?php echo get_post_meta( get_the_ID(),'portfolio_link', true );?>" <?php if(get_post_meta( get_the_ID(),'portfolio_target', true )) { echo "target='_blank'"; } ?>> <?php the_title(); ?>
											</a>
										</h4>
									</header>
								</figcaption>
							</article>
						</div>
					<?php
					$k++; 
					endwhile; ?>	
				<?php 
				} wp_reset_query(); $honeypress_in++;
							?>
				</div>
			</div>
		</div>
	<?php
	}
	else
	{?>
		<div class="container-fluid<?php if(!wp_is_mobile()) {?> pl-0 pr-0 <?php } ?>">	
			<div class="row">
				<div id="portfolio-carousel" class="owl-carousel owl-theme col-lg-12">
				<?php
				$portfolio_name=array(__('Business Consultant','honeypress'),__('Shopify App Development','honeypress'),__('Graphics Design','honeypress'),__('Marketing Strategy','honeypress'),__('Business Consultant','honeypress'),__('Consultant Advise','honeypress'),__('Business Consultant','honeypress'));
				for($portfolio_id=0; $portfolio_id<=5; $portfolio_id++)
				{
					$portfolio_img_id=$portfolio_id+1;
					$port_img='item0'.$portfolio_img_id.'.jpg';?>
					<div class="item">	
						<article class="post">
							<figure class="portfolio-thumbnail">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/<?php echo $port_img;?>" class="img-fluid" alt="<?php echo $portfolio_name[$portfolio_id];?>">
								<div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/<?php echo $port_img;?>" data-lightbox="image" title="<?php echo $portfolio_name[$portfolio_id];?>"><i>+</i></a>
								</div>
							</figure>	
							<figcaption>
							<header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo $portfolio_name[$portfolio_id];?></a></h4></header>
							</figcaption>
						</article>
					</div>
				<?php
				}
				?>
				</div>
			</div>
		</div>
	<?php 
	}?>
</section>