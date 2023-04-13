<?php
	$home_call_out_title = get_theme_mod('home_call_out_title', __('Provide you the Highest Quality Business Solution <br>that Meets your Expectation.','honeypress'));
	$home_call_out_desc = get_theme_mod('home_call_out_desc',__('It is a long established fact that a reader will be distracted by the readable content of a page when looking <br> at its layout. The point of using Lorem ipsum dolor sit amet elit.','honeypress'));
	$home_call_out_btn_text = get_theme_mod('home_call_out_btn_text',__('Get In Touch','honeypress'));
	$callout_button_link  = get_theme_mod('home_call_out_btn_link','#');
	$home_call_out_btn_link_target = get_theme_mod('home_call_out_btn_link_target',false);
	?>	
	<!--Call to Action-->
	<?php $callout_callout_background = get_theme_mod('callout_callout_background',''); 	
 	if($callout_callout_background != '') 
 	{ ?>
		<section class="section-module cta"  style="background-image:url('<?php echo esc_url($callout_callout_background);?>'); background-repeat: no-repeat; background-position: top left; width: 100%;
		    background-size: cover;">
			<?php 
	} 
	else 
	{ ?>
		<section class="section-module cta" >
		<?php 
	} 
			$callout_overlay_section_color = get_theme_mod('callout_overlay_section_color','rgba(0, 11, 24, 0.80)');
			$callout_image_overlay = get_theme_mod('callout_image_overlay',true);
			?>
		    <?php if($callout_image_overlay != false) 
		    { ?>
				<div class="overlay" style="background-color:<?php echo $callout_overlay_section_color; ?>"></div>
			<?php } ?>
			<?php
			if(!empty($home_call_out_title) || (!empty($home_call_out_desc)) || (!empty($home_call_out_btn_text))):?>
			<div class="honeypress-cta-container container<?php //echo honeypress_container();?>">
				<div class="row">
					<div class="col-lg-12">
						<div class="cta-block text-center">
							<?php if(!empty($home_call_out_title)):?><h2 class="title text-white"><?php echo $home_call_out_title; ?></h2><?php endif;?>
							<?php if(!empty($home_call_out_desc)):?><p class="text-white"><?php echo $home_call_out_desc;?></p><?php endif;?>
							<?php if($home_call_out_btn_text!='')
								{?><div class="mx-auto mt-5">	
								
									<a <?php if($callout_button_link !='' ) { ?> href="<?php echo $callout_button_link; ?>" class="btn-small btn-light" <?php if($home_call_out_btn_link_target== true) { echo "target='_blank'"; } } ?>><?php echo $home_call_out_btn_text; ?></a>
								
							</div>
							<?php } ?>
						</div>
					</div>					
				</div>
			</div>
		<?php endif;?>
		</section>