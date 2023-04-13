<?php 
$testimonial_options = get_theme_mod('honeypress_testimonial_content'); 
do_action( 'honeypress_homepage_testimonail_script' );
$testimonial_callout_background = get_theme_mod('testimonial_callout_background',''); 
if($testimonial_callout_background != '') { ?>
<section class="section-module testimonial bg-default testi-6"  style="background-image:url('<?php echo esc_url($testimonial_callout_background);?>'); background-repeat: no-repeat; width: 100%; background-size: cover;">
<?php } 
else { ?>
<section class="section-module testimonial bg-default testi-6" >
<?php 
} 
$testimonial_overlay_section_color = get_theme_mod('testimonial_overlay_section_color','rgba(0, 76, 236, 0.9)');
$testimonial_image_overlay = get_theme_mod('testimonial_image_overlay',true);
if($testimonial_image_overlay != false) { ?>
	<div class="overlay" style="background-color:<?php echo $testimonial_overlay_section_color; ?>"></div>
<?php } ?>
		<div class="honeypress-tesi-container container<?php //echo honeypress_container();?>">
			<?php do_action( 'honeypress_homepage_testimonial_title' ); ?>
			<div class="row" <?php if(get_page_template_slug()=="template/template-testimonial-content-12.php"):?>id="testimonial-carousel6"<?php endif;?>>
			<?php if(get_page_template_slug()!="template/template-testimonial-content-12.php"):?>
				<div id="testimonial-carousel6" class="owl-carousel owl-theme col-md-12">
				<?php endif;
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
						foreach($testimonial_options as $testimonial_iteam)
						{ 
							$title = ! empty( $testimonial_iteam->title ) ? apply_filters( 'honeypress_translate_single_string', $testimonial_iteam->title, 'Testimonial section' ) : '';
							$test_desc = ! empty( $testimonial_iteam->text ) ? apply_filters( 'honeypress_translate_single_string', $testimonial_iteam->text, 'Testimonial section' ) : '';
							$test_link = $testimonial_iteam->link;
							$open_new_tab = $testimonial_iteam->open_new_tab;	
							$designation = ! empty( $testimonial_iteam->designation ) ? apply_filters( 'honeypress_translate_single_string', $testimonial_iteam->designation, 'Testimonial section' ) : '';
							?>
							<div <?php if(get_page_template_slug()=="template/template-testimonial-content-12.php") { ?>class="col-lg-6 col-md-6 col-sm-12"<?php } else { ?> class="item" <?php } ?>>
								<article class="testmonial-block6">
									<?php if($testimonial_iteam->image_url != ''): ?>
										<figure class="avatar">
											<img src="<?php echo $testimonial_iteam->image_url; ?>" class="img-fluid" alt="img" >
										</figure>
									<?php endif; ?>
									<div class="testimonial-text">
									<div class="testmonial-content">
									<?php if(!empty($test_desc)):?>
										<div class="entry-content">
											<p class="text-white"><?php echo wp_kses( html_entity_decode( $test_desc ), $allowed_html ); ?></p>
										</div>									
									<?php endif; ?>	
									<?php if( $title != '' || $designation != '') 
									{?>	
										<figcaption <?php echo $test_link."-".$open_new_tab;?>>
											<?php if(!empty($title)):?>
												<a href="<?php if(empty($test_link)) { echo '#';} else { echo $test_link;} ?>" <?php if($open_new_tab=="yes") { ?> target="_blank"<?php } ?>>
												<cite class="name"><?php echo $title; ?></cite></a><?php endif;?>
											<?php if(!empty($designation)):?><span class="designation"><?php echo $designation; ?></span><?php endif;?>
										</figcaption>
									<?php } ?>
										</div>		
									</div>								
								</article>	
							</div>
						<?php
						}
					}
					else
					{
						$image = array('user1','user2','user3','user4','user5','user6');
						$name = array(__('Martin Wills','honeypress'),__('Amanda Smith','honeypress'),__('Travis Cullan','honeypress'),__('Victoria Wills','honeypress'),__('Danial Wilson','honeypress'),__('Sarah Culan','honeypress'));
						$desc =array(__('Developer','honeypress'), __('Team Leader','honeypress'), __('Volunteer','honeypress'), __('Marketing','honeypress'), __('Senior Manager','honeypress'), __('UI Developer','honeypress'));
						for($i=0; $i<=2; $i++) {
						?>
							<div <?php if(get_page_template_slug()=="template/template-testimonial-content-12.php") { ?>class="col-lg-6 col-md-6 col-sm-12"<?php } else { ?> class="item" <?php } ?>>
								<article class="testmonial-block6">
									<figure class="avatar">
										<img src="<?php echo get_template_directory_uri();?>/assets/images/<?php echo $image[$i]; ?>.jpg" class="img-fluid" alt="<?php echo $name[$i]; ?>" >
									</figure>
									<div class="testimonial-text">
									<div class="testmonial-content">
									<div class="entry-content">
										<p class="text-white"><?php echo esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem ipsum dolor sit amet, temp consectetur adipisicing elit.','honeypress');?></p>
									</div>
									<figcaption>
										<cite class="name"><?php echo $name[$i]; ?></cite>
										<span class="designation"><?php echo $desc[$i]; ?></span>
									</figcaption>
									</div>		
									</div>							
								</article>	
							</div>
						<?php
						}
					}
					?>	
					<?php if(get_page_template_slug()!="template/template-testimonial-content-12.php"):?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>