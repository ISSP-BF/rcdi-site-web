<?php 
/**
 * The main template file
 */
get_header();
spicepress_overlap_bredcrumb(); ?>
<!-- 404 Error Section -->
<section class="404-section">		
	<div class="container<?php echo spicepress_container();?>">
		<div class="row">
			<div class="col-md-12">
				<div class="error_404 wow flipInX animated" data-wow-delay=".5s">
					<h4><?php esc_attr_e('Oops! Page not found','spicepress'); ?></h4>
					<h1><?php esc_attr_e('4','spicepress'); ?><i class="fa fa-frown-o"></i><?php esc_attr_e('4','spicepress'); ?> </h1>
					<p><?php esc_attr_e("We are sorry, but the page you are looking for does not exist.","spicepress"); ?> <a href="<?php echo esc_html(site_url());?>"><?php esc_attr_e('Home Page','spicepress'); ?></a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /404 Error Section -->
<div class="clearfix"></div>
<?php get_footer(); ?>