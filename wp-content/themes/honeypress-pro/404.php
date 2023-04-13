<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package honeypress
 */
get_header();
    global $post;
		$homeLink = home_url();
		$hide_show_banner = get_theme_mod('banner_enable',true);
		if($hide_show_banner == true)
		{
	?>
<section class="page-title-section" <?php if ( !empty(get_theme_mod('error_background_img')) ){ ?> style="background:#17212c url('<?php echo get_theme_mod('error_background_img');?>')"  <?php } ?>>		
	<?php $breadcrumb_overlay=get_theme_mod('breadcrumb_overlay_section_color','rgba(0,0,0,0.8)');?>
	<style type="text/css">
		.page-title-section .overlay
		{

		    background-color: <?php echo $breadcrumb_overlay;?>;
		}
	</style>
	<?php
	if(get_theme_mod('breadcrumb_image_overlay',true)==true):?>
		<div class="overlay"></div>		
	<?php endif;?>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
                          <?php 
                          include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                          if (is_home() || is_front_page()) { 
                          	 	if(get_option('show_on_front')=='posts')
                          	 	{
                          	 	?>
                          	 	<div class="page-title text-center text-white">
									<h1 class="text-white"><?php esc_html_e('Home', 'honeypress') ?></h1>
								</div> 
                          	 	<?php
                          	 	}
                          	 	else
                          	 	{
                          	 	?>
                          	 		<div class="page-title text-center text-white">
									<h1 class="text-white"><?php echo get_the_title( get_option('page_for_posts', true) ); ?> </h1>
									</div> 
                          	 		<?php
                          	 	}                          	 	                          	
						 } 
						else 
						{ ?>                   
							<div class="page-title text-center text-white">
								<?php
								echo '<h1 class="text-white">'. esc_html__('Error 404','honeypress') .'</h1>';					
			                    
			                	
			                    ?>
			                </div>	
						<?php } 
						$breadcrumb_enable = get_theme_mod('breadcrumb_setting_enable',true);
						if($breadcrumb_enable == true) 
						{ 
							if ( function_exists('yoast_breadcrumb') ) {
								$wpseo_titles=get_option('wpseo_titles');
								if($wpseo_titles['breadcrumbs-enable']==true){

								echo '<ul class="page-breadcrumb text-center">';
									echo '<li>';
									echo '</li>';
								$breadcrumbs = yoast_breadcrumb("","",false);
								echo $breadcrumbs;
								echo '</ul>';
								}	
							}
						}
						?>
                        </div>
					</div>
				</div>	
		</section>
	<?php }
?>
<section class="error-page">
	<div class="container<?php echo honeypress_container();?>">			
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="text-center">
					<h2 class="title"><?php esc_html_e('4','honeypress');?><i class="fa fa-frown-o"></i><?php esc_html_e('4','honeypress');?></h2>
					<h1><?php esc_html_e("Ooops, Page Not Found..!","honeypress");?></h1>
					<p><?php esc_html_e("The page you are looking for can't be found","honeypress");?></p>
					<div class="mx-auto pt-4">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-small btn-border"><i class="fa fa-arrow-left pr-2"></i><?php esc_html_e('Go Back','honeypress');?></a>
					</div>
				</div>
			</div>
		</div>			
	</div>
</section>
<?php get_footer();?>