<?php spicepress_before_gallery_section_trigger(); ?>
<?php $gallery_options = get_theme_mod('spicepress_gallery_content'); 
$gallery_section_enable = get_theme_mod('gallery_section_enable','on');
if($gallery_section_enable !='off')
{
$gellary_animation_speed = get_theme_mod('gellary_animation_speed', 3000);	
$isRTL = (is_rtl()) ? (bool) true : (bool) false;
$gellarysettings=array('animationSpeed'=>$gellary_animation_speed,'rtl'=>$isRTL );

	
wp_register_script('spicepress-gellary',get_template_directory_uri().'/js/front-page/gallary.js',array('jquery'));
wp_localize_script('spicepress-gellary','gellary_settings',$gellarysettings);
wp_enqueue_script('spicepress-gellary');	
?>
<!-- Additional Section / Gallery -->
<section class="gallery-section bg-gallery top-bottom">		

		<!-- Section Title -->
		<?php  
		
		$home_gallery_section_title = get_theme_mod('home_gallery_section_title',__('Our work','spicepress'));
		$home_gallery_section_discription = get_theme_mod('home_gallery_section_discription','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
		if(($home_gallery_section_title) || ($home_gallery_section_discription)!='' ) { 
		?>
		 <!-- Section Title -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
						<?php if($home_gallery_section_title) {?>
						<h1 class="widget-title"><?php echo $home_gallery_section_title; ?></h1><?php } ?>
						<div class="widget-separator"><span></span></div>
						<?php if($home_gallery_section_discription) {?>
						<p class="wow fadeInDown animated"><?php echo $home_gallery_section_discription; ?></p><?php } ?>
					</div>
				</div>			
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
		
		
		

		<div id="gallery-carousel" class="owl-carousel owl-theme horizontal-nav">
				<?php 
				$gallery_options = json_decode($gallery_options);
					if( $gallery_options!='' )
				{
				foreach($gallery_options as $gallery_iteam){ ?>
				<?php 
				$title = ! empty( $gallery_iteam->title ) ? apply_filters( 'spicepress_translate_single_string', $gallery_iteam->title, 'Gallery section' ) : '';
				
				$test_link = ! empty( $gallery_iteam->link) ? apply_filters( 'spicepress_translate_single_string', $gallery_iteam->link, 'Gallery section' ) : ''; 
				
				$gallary_image = ! empty( $gallery_iteam->image_url) ? apply_filters( 'spicepress_translate_single_string', $gallery_iteam->image_url, 'Gallery section' ) : '';
				
				
				$open_new_tab = $gallery_iteam->open_new_tab;
				?>
				<?php  
					$gimage_url = $gallary_image;
					if(strstr($gimage_url, 'images/gallery'))
					{
						$gimage_title = $title;
						$gimage_alt = $title;
					}
					else
					{
						$exp = explode("-",$gimage_url);
						$last = end($exp);
						if(strstr($last,'x'))
						{
							$ext = explode(".",$last);
							$file_ext = $ext[1];
							$final_str = str_replace('-'.$last, '.'.$file_ext, $gimage_url);
							$gimage_id = attachment_url_to_postid($final_str);
						}
						else
						{
							$gimage_id = attachment_url_to_postid($gimage_url);
						}
						$gimage_alt = get_post_meta( $gimage_id, '_wp_attachment_image_alt', true );
						$gimage_title = get_the_title($gimage_id);
					}
				?>
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
						<?php if($gallery_iteam->image_url!=''){ ?>
							<img class="img-responsive" src="<?php echo $gallary_image; ?>" alt="<?php if(!empty($gimage_alt)){ echo $gimage_alt; } ?>" />
						<?php } ?>
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">

										<a href="<?php echo $gallery_iteam->image_url; ?>" title="<?php if(!empty($title)){ echo $title; } ?>" data-lightbox="image" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
										
										<?php if(!empty( $test_link )): ?>
										<a href="<?php echo $test_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> class="hover_thumb">
										<?php endif; ?>
										
										<i class="fa fa-link"></i>
										<?php if(!empty( $test_link )): ?>	
										</a>
										<?php endif; ?>
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
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" alt="Gallery 1" />
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
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery2.jpg" alt="Gallery 2" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery2.jpg" data-lightbox="image" title="Gallery 2" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery3.jpg" alt="Gallery 3" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery3.jpg" data-lightbox="image" title="Gallery 3" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery4.jpg" alt="Gallery 4" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery4.jpg" data-lightbox="image" title="Gallery 4" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery5.jpg" alt="Gallery 5" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery5.jpg" data-lightbox="image" title="Gallery 5" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery6.jpg" alt="Gallery 6" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery6.jpg" data-lightbox="image" title="Gallery 6" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery7.jpg" alt="Gallery 7" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery7.jpg" data-lightbox="image" title="Gallery 7" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery8.jpg" alt="Gallery 8" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery8.jpg" data-lightbox="image" title="Gallery 8" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery9.jpg" alt="Gallery 9" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery9.jpg" data-lightbox="image" title="Gallery 9" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery10.jpg" alt="Gallery 10"/>
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery10.jpg" data-lightbox="image" title="Gallery 10" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery11.jpg" alt="Gallery 11" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery11.jpg" data-lightbox="image" title="Gallery 11" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
									<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</figure>
					</article>
				</div>
				
				<div class="item">				
					<article class="gallery-image border0">
						<figure class="gallery-thumbnail">
							<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery12.jpg" alt="Gallery 12" />
							<div class="gallery-showcase-overlay">
								<div class="gallery-showcase-icons">
									<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery12.jpg" data-lightbox="image" title="Gallery 12" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
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
<?php } ?>
<?php spicepress_after_gallery_section_trigger(); ?>