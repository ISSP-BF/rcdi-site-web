<?php honeypress_before_shop_section_trigger(); ?>
<?php
if ( class_exists( 'WooCommerce' ) ) 
{
	$shop_section_enable = get_theme_mod('shop_section_enable',true);
	if($shop_section_enable !=false)
	{
		$shop_animation_speed = get_theme_mod('shop_animation_speed', 3000);		
		$shop_smooth_speed = get_theme_mod('shop_smooth_speed', 1000);
		$shop_nav_style = get_theme_mod('shop_nav_style', 1000);
                $isRTL = (is_rtl()) ? (bool) true : (bool) false;
		$shopettings=array('shop_animation_speed'=>$shop_animation_speed,'shop_smooth_speed'=>$shop_smooth_speed,'shop_nav_style'=>$shop_nav_style,'rtl'=>$isRTL);
		wp_register_script('honeypress-shop',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/front-page/shop.js',array('jquery'));
		wp_localize_script('honeypress-shop','shop_settings',$shopettings);
		wp_enqueue_script('honeypress-shop');?>
		<section class="section-module shop bg-grey">
			<div class="honeypress-shop-container container<?php //echo honeypress_container();?>">
				<?php $home_shop_section_title = get_theme_mod('home_shop_section_title',__('Featured Products','honeypress'));
				$home_shop_section_discription = get_theme_mod('home_shop_section_discription',__('Our amazing products','honeypress')); 
				if((!empty($home_shop_section_title)) || (!empty($home_shop_section_discription)) ) 
				{ 
				?>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-xs-12">
							<div class="section-header text-center">
								<div class="section-separator border-center"></div>
								<?php if(!empty($home_shop_section_title)):?>
									<p class="section-subtitle"><?php echo $home_shop_section_title;  ?></p>
								<?php endif; if(!empty($home_shop_section_discription)):?>	
								<h2 class="section-title"><?php echo $home_shop_section_discription;  ?></h2><?php endif;?>
							</div>
						</div>						
					</div>	
				<?php 
				}
				$args	= array(
					'post_type' => 'product',
				);
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'exclude-from-catalog',
						'operator' => 'NOT IN',
					),
				);
				?>	
				<div class="row">
					<div id="shop-carousel" class="owl-carousel owl-theme col-md-12">	
						<?php
						$product_id=1;
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
							<div class="item <?php echo the_title(); ?>" data-profile="<?php echo $loop->post->ID; ?>">
								<div class="products">
									<div class="item-img">
										<?php the_post_thumbnail('full',array('class'=>'img-fluid')); ?>
									 	<?php if ( $product->is_on_sale() ) : ?>
	                            		<?php echo apply_filters( 'woocommerce_sale_flash', '<a href="#"><span class="onsale">' . esc_html__( 'On Sale!', 'honeypress' ) . '</span></a>', $product ); ?>
	                            		<?php endif; ?>
										<div class="add-to-cart">
											<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
										</div> 
									</div>
									<div class="product-price">
										<h5 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>" title="" tabindex="-1"><?php the_title(); ?></a></h5>
										<span class="woocommerce-Price-amount"><?php echo $product->get_price_html(); ?></span>
									</div>
								</div>
							</div>
						<?php $product_id++; 
						if($product_id>8)
						{
							break;
						}
					endwhile; ?>
						<?php  wp_reset_postdata(); ?>
					</div>									
				</div>	
			</div>
		</section>
	<?php } 
} ?>
<?php honeypress_after_shop_section_trigger(); ?>