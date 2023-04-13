<?php 
    $post_type = 'honeypress_portfolio';
	$tax = 'portfolio_categories'; 
	$term_args=array( 'hide_empty' => true,'orderby' => 'id');
	$tax_terms = get_terms($tax, $term_args);
	$defualt_tex_id = get_option('honeypress_default_term_id');
	$j=1;
if(empty($tax_terms))
{
	do_action( 'honeypress_portfolio_home_dummy_content' );
}
else
{?>
	<section class="section-module portfolio">
		<div class="honeypress-portfolio-container container">
			<?php do_action ('honeypress_portfolio_home_title_subtitle' ); ?>	
			<!-- Portfolio Filter -->
			<div class="row">
				<div class="col-md-12">
					<ul id="tabs" class="nav filter-tabs justify-content-center" role="tablist">
						<?php foreach ($tax_terms  as $tax_term) { ?>
						<li class="nav-item"><a id="tab-<?php echo rawurldecode($tax_term->slug); ?>" href="#<?php echo rawurldecode($tax_term->slug); ?>" class="nav-link <?php if($tab==''){if($j==1){echo 'active';$j=2;}}else if($tab==rawurldecode($tax_term->slug)){echo 'active';}?>" data-toggle="tab" role="tab"><?php echo $tax_term->name; ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<!-- /Portfolio Filter -->
			<div id="content" class="tab-content" role="tablist">
				<?php global $paged;
				$curpage = $paged ? $paged : 1;
				$is_active=true;
				if ($tax_terms) 
				{
				foreach ($tax_terms  as $tax_term)
				{
					$args = array (
					'post_type' => $post_type,
					'post_status' => 'publish',					
					'portfolio_categories' => $tax_term->slug,
					'paged' => $curpage,
					'orderby' => 'menu_order',
					);
					$portfolio_query = null;		
					$portfolio_query = new WP_Query($args);	
					if( $portfolio_query->have_posts() ):?>
						<div id="<?php echo rawurldecode($tax_term->slug); ?>" class="tab-pane fade show <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==rawurldecode($tax_term->slug)){echo 'active';} ?>" role="tabpanel" aria-labelledby="tab-<?php echo rawurldecode($tax_term->slug); ?>">
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
										if(get_theme_mod('home_portfolio_design_layout',2)==2) {
											$class = 'col-lg-6 col-md-6 col-sm-12';
										}
										if(get_theme_mod('home_portfolio_design_layout',3)==3) {
											$class = 'col-lg-4 col-md-6 col-sm-12';
										}
										if(get_theme_mod('home_portfolio_design_layout',4)==4) {
											$class = 'col-lg-3 col-md-6 col-sm-12';
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
												<figcaption>
												   <header class="entry-header"><h4 class="entry-title">
													<?php if(!empty($portfolio_link)) {?>
														<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> ><?php the_title(); ?></a>
													<?php } else the_title();  ?>
													</header>
													</h4>
												</figcaption>
											</article>
										</div>
								<?php endwhile; ?>		
							</div>
						</div>	
						<?php
					endif;
				}
			}
			?>
			</div>
		</div>
	</section>
<?php } ?>