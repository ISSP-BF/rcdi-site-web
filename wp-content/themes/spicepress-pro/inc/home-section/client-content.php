<?php
$client_options = get_theme_mod('spicepress_clients_content'); 

$client_animation_speed = get_theme_mod('client_animation_speed', 3000);
$isRTL = (is_rtl()) ? (bool) true : (bool) false;
$clientsettings=array('animationSpeed'=>$client_animation_speed,'rtl'=>$isRTL );

	
wp_register_script('spicepress-client',get_template_directory_uri().'/js/front-page/client.js',array('jquery'));
wp_localize_script('spicepress-client','client_settings',$clientsettings);
wp_enqueue_script('spicepress-client');
?>
<!--Our Clients-->
<section class="clients-section">
	<div class="container<?php echo spicepress_container();?>">
		<!-- /Section Title -->
		<?php  
		$home_client_section_title = get_theme_mod('home_client_section_title',__('Meet our clients','spicepress'));
		$home_client_section_discription = get_theme_mod('home_client_section_discription','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
		if(($home_client_section_title) || ($home_client_section_discription)!='' ) {
		?>
	    <!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
					<?php if($home_client_section_title) {?>
					<h1 class="widget-title">
					<?php echo esc_html($home_client_section_title); ?>
					</h1>
					<?php } ?>
					<div class="widget-separator"><span></span></div>
					<?php if($home_client_section_discription) {?>
					<p class="wow fadeInDown animated">
					<?php echo esc_html($home_client_section_discription); ?>
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
		
		
		
		
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
							$client_link = ! empty( $client_iteam->link ) ? apply_filters( 'spicepress_translate_single_string', $client_iteam->link, 'Client section' ) : '';
							$open_new_tab = $client_iteam->open_new_tab;
							$image_url = ! empty( $client_iteam->image_url ) ? apply_filters( 'spicepress_translate_single_string', $client_iteam->image_url, 'Client section' ) : '';
							
					?>
					<?php  
					$cimage_url = $image_url;

					if(strstr($cimage_url, 'images/clients'))
					{
						$cimage_alt = '';
					}
					else
					{
						$exp = explode("-",$cimage_url);
						$last = end($exp);
						if(strstr($last,'x'))
						{
							$ext = explode(".",$last);
							$file_ext = $ext[1];
							$final_str = str_replace('-'.$last, '.'.$file_ext, $cimage_url);
							$cimage_id = attachment_url_to_postid($final_str);
						}
						else
						{
							$cimage_id = attachment_url_to_postid($cimage_url);
						}
						$cimage_alt = get_post_meta( $cimage_id, '_wp_attachment_image_alt', true );
					}
				    ?>
					
					<div class="item">
						<figure class="clients-item">
							<a href="<?php echo $client_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
							<?php if($client_iteam->image_url!=''){ ?>
							<img src="<?php echo $image_url; ?>" class="img-responsive" alt="<?php if(!empty($cimage_alt)){ echo $cimage_alt; } ?>" >
							<?php } ?>
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
<div class="clearfix"></div>
<!--/Our Clients-->