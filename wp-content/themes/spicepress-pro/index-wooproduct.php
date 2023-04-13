<?php spicepress_before_shop_section_trigger(); ?>
<?php
if ( class_exists( 'WooCommerce' ) ) {
$shop_section_enable = get_theme_mod('shop_section_enable','on');
if($shop_section_enable !='off')
{

$home_shop_animation_speed = get_theme_mod('home_shop_animation_speed', 3000);	
$isRTL = (is_rtl()) ? (bool) true : (bool) false;
$homeshopsettings=array('animationSpeed'=>$home_shop_animation_speed,'rtl'=>$isRTL);
	
wp_register_script('spicepress-wooproduct',get_template_directory_uri().'/js/front-page/wooproduct.js',array('jquery'));
wp_localize_script('spicepress-wooproduct','wooproduct_settings',$homeshopsettings);
wp_enqueue_script('spicepress-wooproduct');		
		
?>
<!-- Woocommerce Section -->
<section class="woocommerce-section">
	<div class="container<?php echo spicepress_container();?>">
		<?php 
		$home_shop_section_title = get_theme_mod('home_shop_section_title',__('Featured products','spicepress'));
		$home_shop_section_discription = get_theme_mod('home_shop_section_discription','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
		if(($home_shop_section_title) || ($home_shop_section_discription)!='' ) { 
		?>
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<h1 class="widget-title txt-white wow fadeInUp animated" style="color: #fff;" data-wow-duration="500ms" data-wow-delay="0ms"><?php echo $home_shop_section_title;  ?></h1>
					<div class="widget-separator"><span class="bg-white"></span></div>
					<p class=" txt-white wow fadeInDown animated" style="color: #fff;"><?php echo $home_shop_section_discription; ?></p>
				</div>
			</div>
		</div>
		<!-- /Section Title -->		
		<?php } ?>		
		<!-- Item Scroll -->
		<?php 
		$args                   = array(
			'post_type' => 'product',
		);
		/* Exclude hidden products from the loop */
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
			<div id="shop-carousel" class="owl-carousel owl-theme col-md-12 horizontal-nav">	
				<?php
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
				<div class="item <?php echo the_title(); ?>" data-profile="<?php echo $loop->post->ID; ?>">
					<div class="products">
						<div class="item-img">
							<?php the_post_thumbnail(); ?>
							<?php if ( $product->is_on_sale() ) : ?>

							<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'On Sale!', 'spicepress' ) . '</span>', $post, $product ); ?>
							<?php endif; ?>
							
							<div class="add-to-cart">
								<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
							</div>
							
						</div>
						<?php if ($average = $product->get_average_rating()) : ?>
						<ul class="woocommerce rating">
							<li>
								
								<?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'spicepress' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'spicepress' ).'</span></div>'; ?>
								
							</li>
						</ul>
						<?php endif; ?>
						
					<h3><a href="<?php the_permalink(); ?>" title="" tabindex="-1"><?php the_title(); ?></a></h3>
						<span class="price"><?php echo $product->get_price_html(); ?></span>
					</div>
				</div>
				<?php endwhile; ?>
				<?php  wp_reset_postdata(); ?>
			<!-- /Item Scroll -->
			</div>
		</div>
	</div>
</section>
<!-- /Woocommerce Section -->
<div class="clearfix"></div>
<?php } }?>
<?php spicepress_after_shop_section_trigger(); ?>