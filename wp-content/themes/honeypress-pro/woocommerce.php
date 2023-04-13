<?php
get_header();
global $woocommerce;
honeypress_breadcrumbs();?>
<div class="clearfix"></div>
<section class="section-module blog woocommerce">
	<div class="container<?php echo honeypress_container();?>">
		<div class="row">	
			<div class="col-lg-<?php echo ( !is_active_sidebar( 'woocommerce' ) ? '12' :'8' ); ?> col-md-<?php echo ( !is_active_sidebar( 'woocommerce' ) ? '12' :'7' ); ?> col-xs-12">
				<?php woocommerce_content(); ?>
			</div>	
			<?php get_sidebar('woocommerce'); ?>
		</div>
	</div>
</section>
<?php get_footer();?>