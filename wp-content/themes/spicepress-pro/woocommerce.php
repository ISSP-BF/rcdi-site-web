<?php
get_header();

global $woocommerce;
$theid = wc_get_page_id('shop');
$slider = get_post_meta( $theid, 'slider_chkbx', true );
if ($slider) :
    get_template_part('index','slider');
endif;

spicepress_overlap_bredcrumb();
?>
<!-- /Page Title Section -->
<div class="clearfix"></div>
<!-- Blog Section with Sidebar -->
<section class="blog-section">
	<div class="container<?php echo spicepress_container();?>">
		<div class="row">	
			<!--Blog Section-->
			<div class="col-md-<?php echo ( !is_active_sidebar( 'woocommerce' ) ? '12' :'8' ); ?> col-xs-12">
				<?php woocommerce_content(); ?>
			</div>	
			<!--/Blog Section-->
			<?php get_sidebar('woocommerce'); ?>
		</div>
	</div>
</section>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>