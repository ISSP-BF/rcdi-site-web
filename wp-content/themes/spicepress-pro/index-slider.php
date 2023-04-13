<?php spicepress_before_slider_section_trigger(); ?>
<?php
$slide_options = get_theme_mod('spicepress_slider_content');

if(empty($slide_options))
{

    if(get_theme_mod('home_slider_title') != '' || get_theme_mod('home_slider_discription') != '' || get_theme_mod('home_slider_image') != '')
        {
			$home_slider_title = get_theme_mod('home_slider_title');
			$home_slider_discription = get_theme_mod('home_slider_discription');
			$home_slider_btn_target = get_theme_mod('home_slider_btn_target');
			$home_slider_btn_txt = get_theme_mod('home_slider_btn_txt');
			$home_slider_btn_link = get_theme_mod('home_slider_btn_link');
			$home_slider_image = get_theme_mod('home_slider_image');
	

				$slide_options = json_encode( array(
					array(
					'title'      => !empty($home_slider_title)? $home_slider_title:'Standard Format',
					'text'       => !empty($home_slider_discription)? $home_slider_discription :'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
					'button_text'      => !empty($home_slider_btn_txt)? $home_slider_btn_txt : 'Read more',
					'link'       => !empty($home_slider_btn_link)? $home_slider_btn_link : '#',
					'slide_format' => 'customizer_repeater_slide_format_standard',
					'image_url'  => !empty($home_slider_image)? $home_slider_image :  get_template_directory_uri().'/images/slide/slide01.jpg',
					'open_new_tab' => !empty($home_slider_btn_target)? $home_slider_btn_target : false,
					'id'         => 'customizer_repeater_56d7ea7f40b50',
					),
				) );

        }
		
}

$home_page_slider_enabled = get_theme_mod('home_page_slider_enabled','on');
if($home_page_slider_enabled !='off')
{
        	
$animation = get_theme_mod('animation', '');
$animation_speed = get_theme_mod('animation_speed', 3000);
$isRTL = (is_rtl()) ? (bool) true : (bool) false;
	
$settings=array('animation'=>$animation,'animationSpeed'=>$animation_speed,'rtl'=>$isRTL );
	
	
wp_register_script('spicepress-slider',get_template_directory_uri().'/js/front-page/slider.js',array('jquery'));
wp_localize_script('spicepress-slider','slider_settings',$settings);
wp_enqueue_script('spicepress-slider');
?>
<!-- Slider Section -->	
<section id="slider-carousel" class="owl-carousel owl-theme">
		<?php 
			$t=true;
			$slide_options = json_decode($slide_options);
			if( $slide_options!='' )
				{
			foreach($slide_options as $slide_iteam){ ?>
			<div id="post-<?php the_ID(); ?>" class="item" 
			<?php if($slide_iteam->image_url!=''){ 
			
			$slider_image = ! empty( $slide_iteam->image_url ) ? apply_filters( 'spicepress_translate_single_string', $slide_iteam->image_url, 'Slider section' ) : ''; 
			?>
			style="background-image:url(<?php echo $slider_image; ?>); width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0; ">
			<?php $slider_image_overlay = get_theme_mod('slider_image_overlay',true);
			$slider_overlay_section_color = get_theme_mod('slider_overlay_section_color','rgba(0,0,0,0.30)');
			if($slider_image_overlay != false) { ?>
			<div class="overlay" style="background-color:<?php echo $slider_overlay_section_color;?>"></div>
			<?php } } 
					$title = ! empty( $slide_iteam->title ) ? apply_filters( 'spicepress_translate_single_string', $slide_iteam->title, 'Slider section' ) : ''; 
					$img_description = ! empty( $slide_iteam->text ) ? apply_filters( 'spicepress_translate_single_string', $slide_iteam->text, 'Slider section' ) : '';
					
					$readmorelink = ! empty( $slide_iteam->link ) ? apply_filters( 'spicepress_translate_single_string', $slide_iteam->link, 'Slider section' ) : '';
					
					$readmore_button = ! empty( $slide_iteam->button_text ) ? apply_filters( 'spicepress_translate_single_string', $slide_iteam->button_text, 'Slider section' ) : '';
					
					$slide_format = $slide_iteam->slide_format;
					
					if($slide_format == 'customizer_repeater_slide_forma_video'):
						
					$video_url = $slide_iteam->video_url;
					
					endif;
					
                    $open_new_tab = $slide_iteam->open_new_tab;
			
				?>
				
				
				<?php if($slide_format == 'customizer_repeater_slide_format_standard'):?>
				
				<div class="container">
				
					<div class="format-standard">
						<?php if(($title!= '') || ($img_description)!='') { ?>
						<div class="slide-text-bg1">
							<h1><?php echo $title; ?></h1>
							<p><?php echo $img_description ;?></p>
						</div>
						<?php } if($readmore_button!='' ) { ?>
						<div class="slide-btn-area-sm">
							<a href="<?php echo $readmorelink ;?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="slide-btn-sm">
								<?php echo $readmore_button ?>
							</a>
						</div>
						<?php } ?>							
					</div>	
						
				</div>	
					
					
				<?php endif; ?>
				
				<?php if($slide_format == 'customizer_repeater_slide_format_status'):?>
				
		            <div class="format-status">
					<?php if($title!= '') { ?>
						<h1><?php echo $title; ?></h1>
						
						<?php } if($img_description!= '') { ?>
						<p><?php echo $img_description ;?></p>
						
						<?php } ?>
						<?php if($readmore_button!='' ) { ?>
						<a href="<?php echo $readmorelink ;?>" <?php if($open_new_tab== 'yes') { echo "target='_blank'"; } ?> class="format-status-btn-sm"><?php echo $readmore_button ?></a>	
                        <?php } ?>
						
				    </div>
					
				<?php endif; ?>
				
				<?php if($slide_format == 'customizer_repeater_slide_format_aside'):?>
				
					<div class="format-aside">
					
					<?php if($img_description!= '') { ?>
					
					   <p><?php echo $img_description ;?></p>
					   
					<?php } ?>
					   
				    </div>	
				
				<?php endif; ?>
				
				<?php if($slide_format == 'customizer_repeater_slide_format_quote'):?>
				
					<div class="format-quote">
					<?php if($img_description!= '') { ?>
						<?php echo $img_description ;?>	
					<?php } ?>
					<?php if($title!= '') { ?>
						<small><cite title="Source Title"><?php echo $title; ?></cite></small>
                    <?php } ?>						
					</div>
					
				<?php endif; ?>	
				
				<?php if($slide_format == 'customizer_repeater_slide_forma_video'):?>
				
					<div class="container format-video">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
							
									<?php 
			$width = '540';
			$height = '360';
			
			$parsedUrl  = parse_url($video_url);
			
			//specified condition for YouTube URL
			if($parsedUrl['host'] == 'www.youtube.com' || $parsedUrl['host'] == 'youtube.com')	{
			//get Youtube id from URL
			$embed = $parsedUrl['query'];
			parse_str($embed, $out);
			$embedUrl   = $out['v'];
			$embedUrl = explode('__',$embedUrl);
			$url = '//www.youtube.com/embed/'.$embedUrl[0] ;
			
			//echo the embed code for you tube
			echo '<div class="video-frame"><iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe></div>';
			}
			
			//specified condition for vimeo URL
			if($parsedUrl['host'] == 'www.vimeo.com' || $parsedUrl['host'] == 'vimeo.com') {
			//get vimeo id from URL	
			$urlid = $parsedUrl['path'];
			$number = preg_replace("/[^0-9]/", '', $urlid);
		    $url = '//player.vimeo.com/video/'.$number ;
		  
			//echo the embed code for Vimeo
			echo '<div class="video-frame"><iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe></div>';
			}
			?>
							
							
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="video-content">
								
								<?php if($title!= '') { ?>
									<h1><?php echo $title; ?></h1>
					
								<?php } if($img_description!= '') { ?>
									<p><?php echo $img_description ;?></p>
								<?php } ?>	
								<?php if($readmore_button!='' ) { ?>	
									<a href="<?php echo $readmorelink ;?>" <?php if($open_new_tab== 'yes') { echo "target='_blank'"; } ?> class="format-video-btn-sm"><?php echo $readmore_button ?></a>
								<?php } ?>	
								</div>
							</div>	
						</div>
					</div>
					
				<?php endif; ?>		
					
			
			</div>
			<?php 	}  
				}   else { ?>
			<div class="item" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/slide/slide01.jpg); width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;">
				<div class="container">
					<div class="format-standard">
						<div class="slide-text-bg1">
						<h1><?php _e('Standard format','spicepress'); ?></h1>
						<p><?php _e('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.','spicepress'); ?></p>
						</div>
						<div class="slide-btn-area-sm">						
						<a href="#" class="slide-btn-sm"><?php _e('Read More','spicepress'); ?></a>
						</div>		
					</div>	
				</div>	
			</div>
			<div class="item" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/slide/slide02.jpg); width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;">
				<div class="format-status">
					<h1><?php _e('Status format','spicepress'); ?></h1>
					<p><?php _e('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.','spicepress'); ?></p>
					<a href="#" class="format-status-btn-sm"><?php _e('Read More','spicepress'); ?></a>		
				</div>
			</div>  
			<div class="item" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/slide/slide03.jpg); width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;">
				<div class="format-aside">
					<p><?php _e('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.','spicepress'); ?></p>			
				</div>	
			</div>
			<div class="item" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/slide/slide04.jpg); width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;">
				<div class="format-quote">
					<?Php echo 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.'; ?>	
					<small><cite title="Source Title"><?php echo 'Martin Doe'; ?></cite></small>	
				</div>
			</div>
			<div class="item" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/slide/slide05.jpg); width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;">
				<div class="container format-video">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="video-frame">
								<iframe src="https://www.youtube.com/embed/sAWTZVpvPrQ"></iframe>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="video-content">
								<h1><?php _e('Video format','spicepress'); ?></h1>
								<p><?php _e('This is an example of a video post format displayed in the featured slider with an excerpt added.','spicepress'); ?></p>
								<a href="#" class="format-video-btn-sm"><?php _e('Read More','spicepress');?></a>
							</div>
						</div>	
					</div>
				</div>			
			</div>
		<?php } ?>
</section>
<!-- /Slider Section -->
<div class="clearfix"></div>
<?php } ?>
<?php spicepress_after_slider_section_trigger(); ?>