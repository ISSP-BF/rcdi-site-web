<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package honeypress
 */
get_header();
$classes = get_body_class();
if (in_array('date',$classes)) {
    global $post;
		$homeLink = home_url();
		$hide_show_banner = get_theme_mod('banner_enable',true);
		if($hide_show_banner == true)
		{
	?>
<section class="page-title-section" <?php if ( !empty(get_theme_mod('date_background_img')) ){ ?> style="background:#17212c url('<?php echo get_theme_mod('date_background_img');?>')"  <?php } ?>>		
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
								if (is_search())
								{
									echo '<h1 class="text-white">'. get_search_query() .'</h1>';
								}
								else if(is_404())
								{
									echo '<h1 class="text-white">'. esc_html__('Error 404','honeypress') .'</h1>';	
								}
								else if(is_category())
								{
									echo '<h1 class="text-white">'. esc_html__('Category : '.single_cat_title( '', false ),'honeypress') .'</h1>';	
								}
								else if ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() )
								{ 
									if ( class_exists( 'WooCommerce' ) ) 
									{
	                        			if(is_shop())
	                        			{ ?>
	                        				<h1 class="text-white"><?php woocommerce_page_title(); ?></h1>
	                    				<?php 
	                    				}   
	                   				 }
		                		}
		                		elseif( is_tag() )
		                		{
		                			echo '<h1 class="text-white">'. esc_html__('Tag : '.single_tag_title( '', false ),'honeypress')       .'</h1>';
		                		}
		                		else if(is_archive())
								{	
								the_archive_title( '<h1 class="text-white">', '</h1>' ); 
								}
			                    else
			                    { ?>
			                    	<h1 class="text-white"><?php the_title(''); ?></h1>
			                    <?php 
			                	}
			                	
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
} 
elseif (in_array('author',$classes)) {
    global $post;
		$homeLink = home_url();
		$hide_show_banner = get_theme_mod('banner_enable',true);
		if($hide_show_banner == true)
		{
	?>
<section class="page-title-section" <?php if ( !empty(get_theme_mod('author_background_img')) ){ ?> style="background:#17212c url('<?php echo get_theme_mod('author_background_img');?>')"  <?php } ?>>		
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
								if (is_search())
								{
									echo '<h1 class="text-white">'. get_search_query() .'</h1>';
								}
								else if(is_404())
								{
									echo '<h1 class="text-white">'. esc_html__('Error 404','honeypress') .'</h1>';	
								}
								else if(is_category())
								{
									echo '<h1 class="text-white">'. esc_html__('Category : '.single_cat_title( '', false ),'honeypress') .'</h1>';	
								}
								else if ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() )
								{ 
									if ( class_exists( 'WooCommerce' ) ) 
									{
	                        			if(is_shop())
	                        			{ ?>
	                        				<h1 class="text-white"><?php woocommerce_page_title(); ?></h1>
	                    				<?php 
	                    				}   
	                   				 }
		                		}
		                		elseif( is_tag() )
		                		{
		                			echo '<h1 class="text-white">'. esc_html__('Tag : '.single_tag_title( '', false ),'honeypress')       .'</h1>';
		                		}
		                		else if(is_archive())
								{	
								the_archive_title( '<h1 class="text-white">', '</h1>' ); 
								}
			                    else
			                    { ?>
			                    	<h1 class="text-white"><?php the_title(''); ?></h1>
			                    <?php 
			                	}
			                	
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
}
else {
    honeypress_breadcrumbs();;
}
?>
<section class="section-module blog">
	<div class="container<?php echo honeypress_blog_post_container();?>">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-12 standard-view">	
				<?php if(have_posts()): while(have_posts()): the_post();
					get_template_part( 'template-parts/blog/content-blog-template-format', get_post_format() );
				endwhile;
				else:
					get_template_part( 'template-parts/content-blog-template', 'none' );
				endif;		
				do_action('honeypress_post_navigation');?>		
			</div>	
						
			<div class="col-lg-4 col-md-5 col-sm-12">
				<div class="sidebar s-l-space">
					<?php dynamic_sidebar('sidebar-1');?>								
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>