<?php
/* Shortcode for frontpage section
Service section:	[spicepress_service]
Portfolio section: 	[spicepress_portfolio]
Testimonial section:[spicepress_testimonial]
Gallery section: 	[spicepress_gallery]
Team section: 		[spicepress_team]
Shop section: 		[spicepress_shop]
Client section: 	[spicepress_client]
Callout section: 	[spicepress_callout]
*/

/* Shortcode for Service Section */
function spicepress_service_shortcode() {
ob_start();
$spicepress_service_content  = get_theme_mod( 'spicepress_service_content');
?>
<!-- Service Section -->
<section class="service-section" id="service-section">
	<div class="col-md-12">

	<div class="row">
		<?php
	
		if ( ! empty( $spicepress_service_content ) ) {
		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$spicepress_service_content = json_decode( $spicepress_service_content );
		foreach ( $spicepress_service_content as $features_item ) {
			$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'spicepress_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
			$title = ! empty( $features_item->title ) ? apply_filters( 'spicepress_translate_single_string', $features_item->title, 'Features section' ) : '';
			$text = ! empty( $features_item->text ) ? apply_filters( 'spicepress_translate_single_string', $features_item->text, 'Features section' ) : '';
			$link = ! empty( $features_item->link ) ? apply_filters( 'spicepress_translate_single_string', $features_item->link, 'Features section' ) : '';
			$image = ! empty( $features_item->image_url ) ? apply_filters( 'spicepress_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			$choice = ! empty( $features_item->choice ) ? $features_item->choice : 'customizer_repeater_icon';
			
			$open_new_tab = $features_item->open_new_tab;

			?>
			<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="post text-center wow flipInX animated" data-wow-delay=".5s">
			
						<?php if($choice == 'customizer_repeater_image'){ 
						if ( ! empty( $image ) ) : ?>
					<figure class="post-thumbnail">	
							<?php if ( ! empty( $link ) ) : ?>
											<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
									<?php endif; ?>
									<img class="services_cols_mn_icon"
										src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
										
									<?php if ( ! empty( $link ) ) : ?>
									</a>
									<?php endif; ?>
							
					</figure>
					<?php endif; ?>
						<?php }?>
			<?php if($choice == 'customizer_repeater_icon'){ ?>
							
				<?php if ( ! empty( $icon ) ) :?>
				
					<figure class="post-thumbnail">	
						<?php if ( ! empty( $link ) ) : ?>
						<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> >
						<?php endif; ?>
						
							<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
							
						<?php if ( ! empty( $link ) ) : ?>
							</a>
						<?php endif; ?>
					
					</figure>
				<?php endif; 
			} ?>
				
				<?php if ( ! empty( $title ) ) : ?>
				
				<?php if ( ! empty( $link ) ) : ?>
						<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> >
							<?php endif; ?>
							
								<div class="entry-header">
								<h4 class="entry-title"><?php echo esc_html( $title ); ?></h4>
								</div>
									<?php if ( ! empty( $link ) ) : ?>
								</a>
					<?php endif; ?>
								
							<?php endif; ?>
							
			<?php if ( ! empty( $text ) ) : ?>
			
							<div class="entry-content">
							<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
							</div>
			
							
						<?php endif; ?>
			</div>
			</div>
			<?php
			} }
			else
			{
				
			$icon = array('fa fa-laptop','fa fa-cogs','fa fa-mobile');
			$title = array (__('Easy to use','spicepress'), __('Multi-purpose','spicepress'), __('Responsive Design','spicepress'));
			for($i=0; $i<=2; $i++) {		
			?>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="post text-center wow flipInX animated" data-wow-delay=".5s">
					<figure class="post-thumbnail">
					<a href="#"><i class="<?php echo $icon[$i]; ?> txt-pink"></i></a></figure>
					<div class="entry-header">
						<h4 class="entry-title"><a href="#"><?php echo $title[$i]; ?></a></h4>
					</div>
					<div class="entry-content">
						<p><?php echo 'Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor a sit amet est. In eu rutrum ante. Nullam id lorem fermentum, accumsan enim non auctor neque.'; ?></p>
					</div>	
				</div>
			</div>
			<?php 
			} } 
			?>
		</div>
	</div>
</section>		
<!-- /Service Section -->
<?php
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_service', 'spicepress_service_shortcode');

/* Shortcode for Portfolio Section */

function spicepress_portfolio_shortcode() {

ob_start();
$portfolio_animation_speed = get_theme_mod('portfolio_animation_speed', 3000);		
$projectsettings=array('animationSpeed'=>$portfolio_animation_speed);

	
wp_register_script('spicepress-project',get_template_directory_uri().'/js/front-page/project.js',array('jquery'));
wp_localize_script('spicepress-project','portfolio_settings',$projectsettings);
wp_enqueue_script('spicepress-project');		
?>
<!-- Portfolio Section -->
<section class="portfolio-section" id="portfolio-section">
	
	<!-- Item Scroll -->
	<div class="wow fadeInUp animated col-md-12" data-wow-delay="100ms" data-wow-duration="300ms">
		<div class="row">
			<div id="portfolio-carousel" class="owl-carousel owl-theme col-md-12 horizontal-nav">
			<?php
				$post_type = 'spicepress_portfolio';
	
					$args = array (
						'post_type' => $post_type,
						'tax_query' => array(
												array(
													'taxonomy' => 'portfolio_categories',
													'field'    => 'id',
													'terms'    => get_theme_mod('portfolio_selected_category_id', 2),
													//'operator' => 'NOT IN',
												),
											),
					//'posts_per_page' => $project_setting['portfolio_list'],
					'post_status' => 'publish');
					$j=1;
					$portfolio_query = null;		
					$portfolio_query = new WP_Query($args);				
					if( $portfolio_query->have_posts() )
					{ 
					while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
					$portfolio_title_description =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_title_description', true ));
					$portfolio_link =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_link', true ));
					$portfolio_target = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true ));
				?>
				
				<div class="item">					
					<article class="post">
							<figure class="post-thumbnail">
								<?php
								if(has_post_thumbnail())
								{ 
								$class=array('class'=>'img-responsive');
								the_post_thumbnail('', $class);
								$post_thumbnail_id = get_post_thumbnail_id();
								$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
								}
								?>
								<div class="thumbnail-showcase-overlay">
									<div class="thumbnail-showcase-icons">
										<?php if(isset($post_thumbnail_url)){ ?>
										<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
										<?php } ?>
										<?php if(!empty($portfolio_link)) {?>
										<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> class="hover_thumb"><i class="fa fa-link"></i></a>
										<?php } ?>
									</div>
								</div>
							</figure>
							<header class="entry-header">
								<h4 class="entry-title"><?php if(!empty($portfolio_link)) {?>
								<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> class="hover_thumb"><?php the_title(); ?></a>
								<?php } else the_title();  ?>
								</h4>
							</header>	
								<?php  if(get_post_meta( get_the_ID(),'portfolio_title_description', true ))
								{ ?>
								<div class="entry-content">
								<p><?php echo get_post_meta( get_the_ID(),'portfolio_title_description', true ); ?></p>
								</div>
							<?php } ?>
						</article>
				</div>
				<?php $j++; endwhile; } ?>					
			</div>			
		</div>
	</div>
	<!-- /Item Scroll -->		
	
</section>
<!-- /Portfolio Section -->
<?php
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_portfolio', 'spicepress_portfolio_shortcode');

/*Shortcode for Testimonial Section */

function spicepress_testimonial_shortcode() {
ob_start();?>
<!-- Testimonial Section -->
<?php
$testimonial_options = get_theme_mod('spicepress_testimonial_content');

if(empty($testimonial_options))
{

    if( get_theme_mod('home_testimonial_title') != '' || get_theme_mod('home_testimonial_designation') != '' || get_theme_mod('home_testimonial_thumb') != '' || get_theme_mod('home_testimonial_desc') != ''){
		
				$home_testimonial_title = get_theme_mod('home_testimonial_title');
				$home_testimonial_desc = get_theme_mod('home_testimonial_desc');
				$designation = get_theme_mod('designation');
				$home_testimonial_thumb = get_theme_mod('home_testimonial_thumb');

				$testimonial_options = json_encode( array(
			        array(
					'title'      => !empty($home_testimonial_title)? $home_testimonial_title:'Alice Culan',
					'text'       => !empty($home_testimonial_desc)? $home_testimonial_desc :'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
					'designation'      => !empty($designation)? $designation : 'UI Developer',
					'link'       => '#',
					'image_url'  => !empty($home_testimonial_thumb)? $home_testimonial_thumb :  get_template_directory_uri().'/images/item7.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b51',
					),
				) );

    }
	
}


$testimonial_animation = get_theme_mod('testimonial_animation', '');
            $testimonial_animation_speed = get_theme_mod('testimonial_animation_speed', 3000);
            $design_id = '#testimonial-carousel';
            $slide_items = get_theme_mod('home_testimonial_slide_item', 1);
            $testimonial_nav_style = get_theme_mod('testimonial_nav_style', 'bullets');
            $testimonial_smooth_speed = get_theme_mod('testimonial_smooth_speed', 1000);

            $isRTL = (is_rtl()) ? (bool) true : (bool) false;
            $testimonialsettings = array('testimonial_nav_style' => $testimonial_nav_style, 'smoothSpeed' => $testimonial_smooth_speed, 'slide_items' => $slide_items, 'design_id' => $design_id, 'animation' => $testimonial_animation, 'animationSpeed' => $testimonial_animation_speed, 'rtl' => $isRTL);

            wp_register_script('spicepress-testimonial', get_template_directory_uri() . '/js/front-page/testimonial.js', array('jquery'));
            wp_localize_script('spicepress-testimonial', 'testimonial_settings', $testimonialsettings);
            wp_enqueue_script('spicepress-testimonial');
	
	
$testimonial_callout_background = get_theme_mod('testimonial_callout_background',''); 	
 if($testimonial_callout_background != '') { ?>
<section class="testimonial-section" style="background-image:url('<?php echo esc_url($testimonial_callout_background);?>'); background-repeat: no-repeat; background-position: top left;">
	<?php } else { ?>
<section class="testimonial-section">
<?php } ?>

	<div class="overlay" style="background-color:rgba(0,0,0,0.85)">
		<div class="col-md-12">
		
			<!-- Testimonial -->
			<div class="row">
				<div id="testimonial-carousel" class="owl-carousel owl-theme col-md-12"> 
					<?php
					$testimonial_options = json_decode($testimonial_options);
					if( $testimonial_options!='' )
						{
						$allowed_html = array(
								'br'     => array(),
								'em'     => array(),
								'strong' => array(),
								'b'      => array(),
								'i'      => array(),
								);	
							
					foreach($testimonial_options as $testimonial_iteam){ 
					
							$title = ! empty( $testimonial_iteam->title ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->title, 'Testimonial section' ) : '';
							$test_desc = ! empty( $testimonial_iteam->text ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->text, 'Testimonial section' ) : '';
							$test_link = $testimonial_iteam->link;
							$open_new_tab = $testimonial_iteam->open_new_tab;
							
							$designation = ! empty( $testimonial_iteam->designation ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->designation, 'Testimonial section' ) : '';
					?>
					<div class="item">
						<div class="media testmonial-area"> 
							<?php $default_arg =array('class' => "img-circle"); ?>
							<div class="author-box">
							<a href="<?php echo $test_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
							<img alt="img" class="img-responsive img-circle" src="<?php echo $testimonial_iteam->image_url; ?>" draggable="false">
							</a>
							</div>
							<div class="media-body">
								<div class="description-box">
									<div class="author-description">
										<p><?php echo wp_kses( html_entity_decode( $test_desc ), $allowed_html ); ?></p>
									</div>
								</div>
								<h4 class="name"> <a href="<?php echo $test_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>><?php echo $title; ?> </a> -<span class="designation"><?php echo $designation; ?></span></h4>
							</div>
						</div>
					</div>
					<?php } } else 
					{
					$image = array('item7','item8','item9');
					$name = array('Alice Culan','Bella Swan','Jenifer Doe');
					$desc = array('UI Developer','Manager','Designer');
					for($i=0; $i<=2; $i++) { ?>
					<div class="item">
						<div class="media testmonial-area">
							<div class="author-box">
								<img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $image[$i]; ?>.jpg" class="img-circle" alt="img">
							</div>
							<div class="media-body">
								<div class="description-box">
									<div class="author-description">
									<p><?php esc_attr_e('Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.','spicepress'); ?>
									</p>
									</div>									
								</div>
								<h4 class="name"><?php echo $name[$i]; ?> -<span class="designation"><?php echo $desc[$i]; ?></span></h4>
							</div>
						</div>	
					</div>
					
					<?php  } } ?>
				</div>
			</div>
			<!-- /Testimonial -->	
			
		</div>	
	</div>	
</section>
<!-- /Testimonial Section -->
<div class="clearfix"></div>
<?php
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_testimonial', 'spicepress_testimonial_shortcode');

/* Shortcode for Gallery Section */

function spicepress_gallery_shortcode() {
ob_start();
$gallery_options = get_theme_mod('spicepress_gallery_content'); 

$gellary_animation_speed = get_theme_mod('gellary_animation_speed', 3000);		
$gellarysettings=array('animationSpeed'=>$gellary_animation_speed);

	
wp_register_script('spicepress-gellary',get_template_directory_uri().'/js/front-page/gallary.js',array('jquery'));
wp_localize_script('spicepress-gellary','gellary_settings',$gellarysettings);
wp_enqueue_script('spicepress-gellary');	
?>
<!-- Additional Section / Gallery -->
<section class="gallery-section bg-gallery top-bottom" id="gallery-section">		

		<div id="gallery-carousel" class="owl-carousel owl-theme col-md-12 horizontal-nav">
				<?php 
				$gallery_options = json_decode($gallery_options);
					if( $gallery_options!='' )
				{
				foreach($gallery_options as $gallery_iteam){ ?>
				<?php 
				$title = ! empty( $gallery_iteam->title ) ? apply_filters( 'spicepress_translate_single_string', $gallery_iteam->title, 'Gallery section' ) : ''; 
				$test_link = $gallery_iteam->link;
				$open_new_tab = $gallery_iteam->open_new_tab;
				
				
				
				?>
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
						<?php if($gallery_iteam->image_url!=''){ ?>
							<img class="img-responsive" src="<?php echo $gallery_iteam->image_url; ?>"/>
						<?php } ?>
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<div class="gallery-showcase-icons">

										<a href="<?php echo $gallery_iteam->image_url; ?>" title="<?php echo $title; ?>" data-lightbox="image" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
										
										<?php if(!empty( $test_link )): ?>
										<a href="<?php echo $test_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> class="hover_thumb">
										<?php endif; ?>
										
										<i class="fa fa-link"></i>
										<?php if(!empty( $test_link )): ?>	
										</a>
										<?php endif; ?>
										
										
									</div>
								</div>
							</div>
						 </figure>	
					</article>
				</div>
					
				<?php }  
				} else { ?>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>

				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery2.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery3.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery4.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery5.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery6.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery7.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery8.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery9.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery10.jpg" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<?php } ?>
		</div>	
</section>
<!-- /Additional Section / Gallery  -->
<div class="clearfix"></div>
<?php
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_gallery', 'spicepress_gallery_shortcode');

/*Shortcode for Team Section */

function spicepress_team_shortcode() {
ob_start();
$team_options = get_theme_mod('spicepress_team_content');
?>
<!-- Homepage Team Section  -->	
<section class="homepage-team-section" id="homepage-team-section">
	<div class="col-md-12">
	
		<!-- Team Area -->
		<div class="row">
		<?php
			
					$team_options = json_decode($team_options);
					if( $team_options!='' )
					{
					foreach($team_options as $team_item){
				
				
					$image    = ! empty( $team_item->image_url ) ? apply_filters( 'spicepress_translate_single_string', $team_item->image_url, 'Team section' ) : '';
					$title    = ! empty( $team_item->title ) ? apply_filters( 'spicepress_translate_single_string', $team_item->title, 'Team section' ) : '';
					$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'spicepress_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
					$link     = ! empty( $team_item->link ) ? apply_filters( 'spicepress_translate_single_string', $team_item->link, 'Team section' ) : '';
					$open_new_tab = $team_item->open_new_tab;
		?>
			<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="team-area wow fadeInDown animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
								<div class="team-image">
									<?php if ( ! empty( $image ) ) : ?>
										<?php
										if ( ! empty( $link ) ) :
											$link_html = '<a href="' . esc_url( $link ) . '"';
											if ( function_exists( 'spicepress_is_external_url' ) ) {
												$link_html .= spicepress_is_external_url( $link );
											}
											$link_html .= '>';
											echo wp_kses_post( $link_html );
										endif;
										echo '<img class="img" src="' . esc_url( $image ) . '"';
										if ( ! empty( $title ) ) {
											echo 'alt="' . esc_attr( $title ) . '" title="' . esc_attr( $title ) . '"';
										}
										echo '/>';
										if ( ! empty( $link ) ) {
											echo '</a>';
										}
										?>
									<?php endif; ?>
								
								<div class="team-showcase-overlay">
									<div class="team-showcase-overlay-inner">
								
										<div class="team-showcase-icons">
										<?php if ( ! empty( $team_item->social_repeater ) ) :
										$icons         = html_entity_decode( $team_item->social_repeater );
										$icons_decoded = json_decode( $icons, true );
										if ( ! empty( $icons_decoded ) ) : ?>
										<?php
														foreach ( $icons_decoded as $value ) {
															$social_icon = ! empty( $value['icon'] ) ? apply_filters( 'spicepress_translate_single_string', $value['icon'], 'Team section' ) : '';
															$social_link = ! empty( $value['link'] ) ? apply_filters( 'spicepress_translate_single_string', $value['link'], 'Team section' ) : '';

															if ( ! empty( $social_icon ) ) {
																
															?>	
																
																
														<a <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> href="<?php echo esc_url( $social_link ); ?>" class="btn btn-just-icon btn-simple"><i class="fa <?php echo esc_attr( $social_icon ); ?> "></i></a>
															
															<?php
															
															
															}
															
															
														}
														?>
										</div>
								</div>
							</div>	
										<?php
										endif;
									endif;
									?>
							</div>
							<div class="team-caption"><?php if ( ! empty( $title ) ) : ?>
							
							        <?php if ( ! empty( $link ) ) : ?>
							        <a href="<?php echo $link ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
									<?php endif; ?>
										<h4 class="card-title"><?php echo esc_html( $title ); ?></h4>
									<?php if ( ! empty( $link ) ) : ?>	
									</a>
									<?php endif; ?>
										
									<?php endif; ?><?php if ( ! empty( $subtitle ) ) : ?>
										<h6 class="category text-muted"><?php echo esc_html( $subtitle ); ?></h6>
									<?php endif; ?>
							</div>
					</div>
				</div>
			<?php } } else {
			$image = array('team1.jpg','team2.jpg','team3.jpg', 'team4.jpg');
			$name = array('John Doe','Sarah Culan','Chao Kang','Megan Sheryl');
			for($i=0; $i<=3; $i++) {
			?>
			<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="team-area wow fadeInDown animated" data-wow-delay="0.4s">
				<div class="team-image">
					<img src="<?php echo get_template_directory_uri(); ?>/images/team/<?php echo $image[$i]; ?>" class="img" alt="img">
					<div class="team-showcase-overlay">
						<div class="team-showcase-overlay-inner">
							<div class="team-showcase-icons">
								<a href="#" title="Facebook" class="hover_thumb"><i class="fa fa-facebook"></i></a>
								<a href="#" title="Twitter" class="hover_thumb"><i class="fa fa-twitter"></i></a>
								<a href="#" title="Linkedin" class="hover_thumb"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="team-caption"><h4><?php echo $name[$i]; ?></h4><h6><?php esc_attr_e('Developer','spicepress'); ?></h6></div>
			</div>
			</div>
			<?php } } ?>
		</div>
		<!-- /Team Area -->
	</div>
</section>
<!-- /Homepage Team Section -->

<div class="clearfix"></div>
<?php
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_team', 'spicepress_team_shortcode');



/*Shortcode for Shop Section */

function spicepress_shop_shortcode() {
ob_start();?>


<?php
if ( class_exists( 'WooCommerce' ) ) {

$home_shop_animation_speed = get_theme_mod('home_shop_animation_speed', 3000);		
$homeshopsettings=array('animationSpeed'=>$home_shop_animation_speed);
	
wp_register_script('spicepress-wooproduct',get_template_directory_uri().'/js/front-page/wooproduct.js',array('jquery'));
wp_localize_script('spicepress-wooproduct','wooproduct_settings',$homeshopsettings);
wp_enqueue_script('spicepress-wooproduct');		
		
?>
<!-- Woocommerce Section -->
<section class="woocommerce-section">
	<div class="col-md-12">
	
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

							<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'On Sale!', 'spicepress' ) . '</span>', $product ); ?>
							<?php endif; ?>
							
							<div class="add-to-cart">
								<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
							</div>
							
						</div>
						<ul class="woocommerce rating">
							<li>
								<?php if ($average = $product->get_average_rating()) : ?>
								<?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'spicepress' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'spicepress' ).'</span></div>'; ?>
								<?php endif; ?>
							</li>
						</ul>
						
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

<?php }
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_shop', 'spicepress_shop_shortcode');


/* Shortcode for Client Section */

function spicepress_client_shortcode() {
ob_start();
$client_options = get_theme_mod('spicepress_clients_content'); 

$client_animation_speed = get_theme_mod('client_animation_speed', 3000);		
$clientsettings=array('animationSpeed'=>$client_animation_speed);

	
wp_register_script('spicepress-client',get_template_directory_uri().'/js/front-page/client.js',array('jquery'));
wp_localize_script('spicepress-client','client_settings',$clientsettings);
wp_enqueue_script('spicepress-client');
?>
<!--Our Clients-->
<section class="clients-section" id="clients-section">
	<div class="col-md-12">
		
		<div class="row">
			<div id="clients-carousel" class="owl-carousel owl-theme col-md-12 horizontal-nav">
			
			<?php
					$t=true;
					$client_options = json_decode($client_options);
					if( $client_options!='' )
						{
					foreach($client_options as $client_iteam){ 
					
							$title = ! empty( $client_iteam->title ) ? apply_filters( 'spicepress_translate_single_string', $client_iteam->title, 'Client section' ) : '';
							$link = ! empty( $client_iteam->link ) ? apply_filters( 'spicepress_translate_single_string', $client_iteam->link, 'Client section' ) : '';
							$client_link = $client_iteam->link;
							$open_new_tab = $client_iteam->open_new_tab;
							
					?>
					
					
					<div class="item">
						<figure class="clients-item">
							<a href="<?php echo $client_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
							<img src="<?php echo $client_iteam->image_url; ?>" class="img-responsive" >
							</a>
						</figure>
					</div>
					
					
					
					
				<?php } } else { ?> 	

				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client1.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client2.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client3.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client4.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client5.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client1.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client2.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client3.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client4.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
				<div class="item">
					<figure class="clients-item">
						<a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/client5.png" class="img-responsive" alt="client" /></a>
					</figure>
				</div>
				
            <?php } ?>
				
			</div>
			
			<!-- Project Scroll -->
		</div>

	</div>
</section>	
<!--/Our Clients-->
<div class="clearfix"></div>
<?php
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_client', 'spicepress_client_shortcode');
/* Shortcode for Callout Section */
function spicepress_callout_shortcode() {
ob_start();
$home_call_out_title = get_theme_mod('home_call_out_title','The Fastest Way to Great Customer Support by phone: 1-800-123-4567- 34 &nbsp; <abbr>info@spicepress.com</abbr>');
$home_call_out_btn_text = get_theme_mod('home_call_out_btn_text',__('Contact Us','spicepress'));
$home_call_out_btn_link = get_theme_mod('home_call_out_btn_link','#');
$home_call_out_btn_link_target = get_theme_mod('home_call_out_btn_link_target',false);
?>
<!-- Callout Section -->
<section class="callout-section" id="callout-section">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class="sm-callout">
					<h4 class="wow bounceInLeft animated" data-wow-delay="0.4s"><?php echo $home_call_out_title; ?></h4>
					<div class="sm-callout-btn wow bounceInRight animated" data-wow-delay="0.4s"><a href="<?php echo $home_call_out_btn_link; ?>" <?php if($home_call_out_btn_link_target== true) { echo "target='_blank'"; } ?>><?php echo $home_call_out_btn_text; ?></a></div>
				</div>
				<div class="sm-seperate"></div>
			</div>
		</div>
	</div>
</section>
<!-- /Callout Section -->
<div class="clearfix"></div>	
<?php
$stringa = ob_get_contents();
ob_end_clean();
return $stringa;
}
add_shortcode('spicepress_callout', 'spicepress_callout_shortcode');
?>