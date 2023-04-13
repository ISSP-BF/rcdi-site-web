<?php honeypress_before_slider_section_trigger();
$slider_data = get_theme_mod('honeypress_slider_content');
if(empty($slider_data))
{		
	if(get_theme_mod('home_slider_title') != '' || get_theme_mod('home_slider_discription') != '' || get_theme_mod('home_slider_image') != '')
	{
		$home_slider_title = get_theme_mod('home_slider_title');
		$home_slider_discription = get_theme_mod('home_slider_discription');
		$home_slider_btn_target = get_theme_mod('home_slider_btn_target');
		$home_slider_btn_txt = get_theme_mod('home_slider_btn_txt');
		$home_slider_btn_txt2 = get_theme_mod('home_slider_btn_txt2');
		$home_slider_btn_link = get_theme_mod('home_slider_btn_link');
		$home_slider_btn_link2 = get_theme_mod('home_slider_btn_link2');
		$home_slider_image = get_theme_mod('home_slider_image');
		$slider_data = json_encode( array(
							array(
								'title'      => !empty($home_slider_title)? $home_slider_title:'We provide solutions to <br> grow your business',
								'text'       => !empty($home_slider_discription)? $home_slider_discription :'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua.',
								'button_text'      => !empty($home_slider_btn_txt)? $home_slider_btn_txt : 'Learn More',
								'abtbutton_text'      => !empty($home_slider_btn_txt2)? $home_slider_btn_txt2 : 'About Us',
								'link'       => !empty($home_slider_btn_link)? $home_slider_btn_link : '#',
								'abtlink'       => !empty($home_slider_btn_link2)? $home_slider_btn_link2 : '#',
								'image_url'  => !empty($home_slider_image)? $home_slider_image :  HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-1.jpg',
								'open_new_tab' => !empty($home_slider_btn_target)? $home_slider_btn_target : false,
								'id'         => 'customizer_repeater_56d7ea7f40b50',
								'home_slider_caption' => 'customizer_repeater_slide_caption_left',
								),
						) );
	}
	else
	{
		$slider_data = json_encode( array(
						array(
						'title'      => __('We provide solutions to <br> grow your business', 'honeypress' ),
						'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua.', 'honeypress' ),
						'button_text'      => __('Learn More','honeypress'),
						'link'       => '#',
						'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-1.jpg',
						'open_new_tab' => 'yes',
						'abtbutton_text'      => __('About Us','honeypress'),
						'abtlink'       => '#',
						'abtopen_new_tab' => 'yes',
						'home_slider_caption' => 'customizer_repeater_slide_caption_left',
						'sidebar_check' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						),
						array(
						'title'      => __('We create stunning <br>WordPress themes', 'honeypress' ),
						'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua.', 'honeypress' ),
						'button_text'      => __('Learn More','honeypress'),
						'link'       => '#',
						'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-2.jpg',
						'open_new_tab' => 'yes',
						'abtbutton_text'      => __('About Us','honeypress'),
						'abtlink'       => '#',
						'abtopen_new_tab' => 'yes',
						'home_slider_caption' => 'customizer_repeater_slide_caption_left',
						'sidebar_check' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b97',
						),
						array(
						'title'      => __( 'We provide solutions to <br> grow your business', 'honeypress' ),
						'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua.', 'honeypress' ),
						'button_text'      => __('Learn More','honeypress'),
						'link'       => '#',
						'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-3.jpg',
						'open_new_tab' => 'yes',
						'abtbutton_text'      => __('About Us','honeypress'),
						'abtlink'       => '#',
						'abtopen_new_tab' => 'yes',
						'home_slider_caption' => 'customizer_repeater_slide_caption_left',
						'sidebar_check' => 'no',
						'id'         => 'customizer_repeater_56d7ea7f40b98',
						),
			) );
		}
}
$home_page_slider_enabled = get_theme_mod('home_page_slider_enabled',true);		
if($home_page_slider_enabled !=false)
{
$video_upload = get_theme_mod('slide_video_upload');
$video_upload = wp_get_attachment_url( $video_upload);
$video_youtub = get_theme_mod('slide_video_url');	
// Below Script will run for only video slide		
if((!empty($video_upload) || !empty($video_youtub) ) && (get_theme_mod('slide_variation','slide')=='video')){ ?>
	<section class="video-slider home-section home-full-height hero-section" id="totop" data-background="assets/images/section-5.jpg">
	<?php if(!empty($video_youtub)){?>
		<div class="video-player" data-property="{videoURL:'<?php echo $video_youtub;?>', containment:'.home-section', mute:false, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
	<?php } else if(!empty($video_upload)){?>
		<video autoplay="" muted="" loop="" id="video_slider">
            <source src="<?php echo $video_upload; ?>" type="video/mp4">
         </video>
     <?php }?>
        <div id="slider-carousel" class="owl-carousel owl-theme" id="home">
		<?php $slider_data = json_decode($slider_data);
		if($slider_data!='')
		{
			foreach($slider_data as $slide_iteam )
			{  
				$slider_text = ! empty( $slide_iteam->text ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->text, 'Slider section' ) : '';
				$slider_title = ! empty( $slide_iteam->title ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->title, 'Slider section' ) : '';
				$slider_link = ! empty( $slide_iteam->link ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->link, 'Slider section' ) : '';
				$slider_link_two = ! empty( $slide_iteam->abtlink ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->abtlink, 'Slider section' ) : '';
				$slider_button_text = ! empty( $slide_iteam->button_text ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->button_text, 'Slider section' ) : '';
				$slider_button_two_text = ! empty( $slide_iteam->abtbutton_text ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->abtbutton_text, 'Slider section' ) : '';
				$slider_align_split=explode('_',$slide_iteam->home_slider_caption);
				?> 
				<div class="item <?php echo $slide_iteam->sidebar_check;?>">
					<div class="container slider-caption <?php echo $slide_iteam->sidebar_check;?>">
					<?php if(($slide_iteam->sidebar_check=='yes') && ($slider_align_split[4]!='center'))
					{?>
						<div class="row">
						<?php if($slider_align_split[4]=='left'):?>
							<div class="col-md-7">
								<div class="caption-content <?php echo 'text-'.$slider_align_split[4];?>">
								<?php if($slider_title!=''){ ?>
									<h1 class="title"><?php echo $slider_title; ?></h1>
								<?php } 
								if($slider_text!=''){ ?>
									<p class="description"><?php echo $slider_text; ?></p>
								<?php }
								if(($slider_button_text !=null) || ($slider_button_two_text !=null)) { ?>
									<div class="btn-combo mt-5">
									<?php if($slider_button_text !=null): ?>
										<a href="<?php echo $slider_link; ?>"  <?php if($slide_iteam->open_new_tab == 'yes'){ echo "target='_blank'"; } ?> class="btn-small btn-default"> <?php echo $slider_button_text; ?> </a>
									<?php endif;
									if($slider_button_two_text !=null): ?>
										<a href="<?php echo $slider_link_two; ?>" <?php if($slide_iteam->abtopen_new_tab == 'yes'){ echo "target='_blank'";  } ?> class="btn-small btn-light"><?php echo $slider_button_two_text; ?></a>
									<?php endif;?>
									</div>
								<?php } ?>						
								</div>
							</div>
							<div class="col-md-5">
								<?php dynamic_sidebar('slider-widget-area');?>
							</div>
						<?php endif;

						if($slider_align_split[4]=='right'):?>
							<div class="col-md-5">
								<?php dynamic_sidebar('slider-widget-area');?>
							</div>
							<div class="col-md-7">
								<div class="caption-content <?php echo 'text-'.$slider_align_split[4];?>">
								<?php if($slider_title!=''){ ?>
									<h1 class="title"><?php echo $slider_title; ?></h1>
								<?php } 
								if($slider_text!=''){ ?>
									<p class="description"><?php echo $slider_text; ?></p>
								<?php }
								if(($slider_button_text !=null) || ($slider_button_two_text !=null)) { ?>
									<div class="btn-combo mt-5">
									<?php if($slider_button_text !=null): ?>
										<a href="<?php echo $slider_link; ?>"  <?php if($slide_iteam->open_new_tab == 'yes'){ echo "target='_blank'"; } ?> class="btn-small btn-default"> <?php echo $slider_button_text; ?> </a>
									<?php endif;
									if($slider_button_two_text !=null): ?>
										<a href="<?php echo $slider_link_two; ?>" <?php if($slide_iteam->abtopen_new_tab == 'yes'){ echo "target='_blank'";  } ?> class="btn-small btn-light"><?php echo $slider_button_two_text; ?></a>
										<?php endif;?>
									</div>
								<?php } ?>						
								</div>
							</div>
						<?php endif;?>	
									
						</div>
					<?php
					}
					else
					{?>
						<div class="caption-content <?php echo 'text-'.$slider_align_split[4];?>">
						<?php if($slider_title!=''){ ?>
							<h1 class="title"><?php echo $slider_title; ?></h1>
						<?php } 
						if($slider_text!=''){ ?>
							<p class="description"><?php echo $slider_text; ?></p>
						<?php }
						if(($slider_button_text !=null) || ($slider_button_two_text !=null)) { ?>
							<div class="btn-combo mt-5">
							<?php if($slider_button_text !=null): ?>
								<a href="<?php echo $slider_link; ?>"  <?php if($slide_iteam->open_new_tab == 'yes'){ echo "target='_blank'"; } ?> class="btn-small btn-default"> <?php echo $slider_button_text; ?> </a>
							<?php endif;											
							if($slider_button_two_text !=null): ?>
								<a href="<?php echo $slider_link_two; ?>" <?php if($slide_iteam->abtopen_new_tab == 'yes'){ echo "target='_blank'";  } ?> class="btn-small btn-light"><?php echo $slider_button_two_text; ?></a>
							<?php endif;?>
							</div>
						<?php } ?>						
						</div>
								
					<?php
					}?>		 
					</div>
					<?php $slider_image_overlay = get_theme_mod('slider_image_overlay',true);
					$slider_overlay_section_color = get_theme_mod('slider_overlay_section_color','rgba(0,0,0,0.6)');
					if($slider_image_overlay != false) { ?>
						<div class="overlay" style="background-color:<?php echo $slider_overlay_section_color;?>"></div>
					<?php } ?>
            	</div>
				<?php 
				}
			} ?>	
		</div>
    </section>    
<!-- /Video Slider Section -->
<?php } 
else {?>
<!-- Below script will run with only image slider -->	
<section class="hero-section">
	<div id="slider-carousel" class="owl-carousel owl-theme" id="home">
	<?php $slider_data = json_decode($slider_data);
	if($slider_data!='')
	{
		foreach($slider_data as $slide_iteam )
		{  
			$slider_image = ! empty( $slide_iteam->image_url ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->image_url, 'Slider section' ) : '';
			$slider_text = ! empty( $slide_iteam->text ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->text, 'Slider section' ) : '';
			$slider_title = ! empty( $slide_iteam->title ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->title, 'Slider section' ) : '';
			$slider_link = ! empty( $slide_iteam->link ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->link, 'Slider section' ) : '';
			$slider_link_two = ! empty( $slide_iteam->abtlink ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->abtlink, 'Slider section' ) : '';
			$slider_button_text = ! empty( $slide_iteam->button_text ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->button_text, 'Slider section' ) : '';
			$slider_button_two_text = ! empty( $slide_iteam->abtbutton_text ) ? apply_filters( 'honeypress_translate_single_string', $slide_iteam->abtbutton_text, 'Slider section' ) : '';
			$slider_align_split=explode('_',$slide_iteam->home_slider_caption);
			?> 
			<div class="item <?php echo $slide_iteam->sidebar_check;?>" <?php if($slider_image!='') { ?>style="background-image:url( <?php echo $slider_image; ?> );" <?php } ?>>
				<div class="container slider-caption <?php echo $slide_iteam->sidebar_check;?>">
				<?php if(($slide_iteam->sidebar_check=='yes') && ($slider_align_split[4]!='center'))
				{?>
					<div class="row">
					<?php if($slider_align_split[4]=='left'){?>
						<div class="col-md-7">
							<div class="caption-content <?php echo 'text-'.$slider_align_split[4];?>">
							<?php if($slider_title!=''){ ?>
								<h1 class="title"><?php echo $slider_title; ?></h1>
							<?php } 
							if($slider_text!=''){ ?>
								<p class="description"><?php echo $slider_text; ?></p>
							<?php }
							if(($slider_button_text !=null) || ($slider_button_two_text !=null)) { ?>
								<div class="btn-combo mt-5">
								<?php if($slider_button_text !=null): ?>
									<a href="<?php echo $slider_link; ?>"  <?php if($slide_iteam->open_new_tab == 'yes'){ echo "target='_blank'"; } ?> class="btn-small btn-default"> <?php echo $slider_button_text; ?> </a>
								<?php endif;											
								if($slider_button_two_text !=null): ?>
									<a href="<?php echo $slider_link_two; ?>" <?php if($slide_iteam->abtopen_new_tab == 'yes'){ echo "target='_blank'";  } ?> class="btn-small btn-light"><?php echo $slider_button_two_text; ?></a>
								<?php endif;?>
								</div>
							<?php } ?>						
							</div>
						</div>
						<div class="col-md-5">
							<?php dynamic_sidebar('slider-widget-area');?>
						</div>
					<?php }


					if($slider_align_split[4]=='right'){?>
						<div class="col-md-5">
							<?php dynamic_sidebar('slider-widget-area');?>
						</div>
						<div class="col-md-7">
							<div class="caption-content <?php echo 'text-'.$slider_align_split[4];?>">
							<?php if($slider_title!=''){ ?>
								<h1 class="title"><?php echo $slider_title; ?></h1>
							<?php } 
							if($slider_text!=''){ ?>
								<p class="description"><?php echo $slider_text; ?></p>
							<?php }
							if(($slider_button_text !=null) || ($slider_button_two_text !=null)) { ?>
								<div class="btn-combo mt-5">
								<?php if($slider_button_text !=null): ?>
									<a href="<?php echo $slider_link; ?>"  <?php if($slide_iteam->open_new_tab == 'yes'){ echo "target='_blank'"; } ?> class="btn-small btn-default"> <?php echo $slider_button_text; ?> </a>
								<?php endif;
								if($slider_button_two_text !=null): ?>
									<a href="<?php echo $slider_link_two; ?>" <?php if($slide_iteam->abtopen_new_tab == 'yes'){ echo "target='_blank'";  } ?> class="btn-small btn-light"><?php echo $slider_button_two_text; ?></a>
								<?php endif;?>
								</div>
							<?php } ?>						
							</div>
						</div>
					<?php } ?>
					</div>
				<?php
				}
				else
				{?>
					<div class="caption-content <?php echo 'text-'.$slider_align_split[4];?>">
					<?php if($slider_title!=''){ ?>
						<h1 class="title"><?php echo $slider_title; ?></h1>
					<?php } 
					if($slider_text!=''){ ?>
						<p class="description"><?php echo $slider_text; ?></p>
					<?php }
					if(($slider_button_text !=null) || ($slider_button_two_text !=null)) { ?>
						<div class="btn-combo mt-5">
						<?php if($slider_button_text !=null): ?>
							<a href="<?php echo $slider_link; ?>"  <?php if($slide_iteam->open_new_tab == 'yes'){ echo "target='_blank'"; } ?> class="btn-small btn-default"> <?php echo $slider_button_text; ?> </a>
						<?php endif;
						if($slider_button_two_text !=null): ?>
							<a href="<?php echo $slider_link_two; ?>" <?php if($slide_iteam->abtopen_new_tab == 'yes'){ echo "target='_blank'";  } ?> class="btn-small btn-light"><?php echo $slider_button_two_text; ?></a>
						<?php endif;?>
						</div>
					<?php } ?>						
					</div>
				<?php
				}?>
				</div>
				<?php $slider_image_overlay = get_theme_mod('slider_image_overlay',true);
				$slider_overlay_section_color = get_theme_mod('slider_overlay_section_color','rgba(0,0,0,0.6)');
				if($slider_image_overlay != false) { ?>
					<div class="overlay" style="background-color:<?php echo $slider_overlay_section_color;?>"></div>
				<?php } ?>
            </div>
		<?php 
		}
	} ?>	
	</div>		
</section>
<?php } ?>
<div class="clearfix"></div>
<?php 
}
honeypress_after_slider_section_trigger(); ?>