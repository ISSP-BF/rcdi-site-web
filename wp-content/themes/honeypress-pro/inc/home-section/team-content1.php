<?php 
$team_options = get_theme_mod('honeypress_team_content'); 
$team_animation_speed = get_theme_mod('team_animation_speed', 3000);		
$team_smooth_speed = get_theme_mod('team_smooth_speed', 1000);	
$team_nav_style = get_theme_mod('team_nav_style', 'bullets');	
$isRTL = (is_rtl()) ? (bool) true : (bool) false;
$teamsettings=array('team_animation_speed'=>$team_animation_speed,'team_smooth_speed'=>$team_smooth_speed,'team_nav_style'=>$team_nav_style, 'rtl'=>$isRTL);
wp_register_script('honeypress-team',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/front-page/team.js',array('jquery'));
wp_localize_script('honeypress-team','team_settings',$teamsettings);
wp_enqueue_script('honeypress-team');	?>
<section class="section-module team-mambers business-home-team-sction">
	<div class="honeypress-team-container container<?php //echo honeypress_container();?>">
	<?php do_action( 'honeypress_team_section_title');?>
		<div class="row">
			<?php if(get_page_template_slug()!="template/template-team-content-5.php"):?>
			<div id="team-carousel" class="owl-carousel owl-theme col-lg-12">
				<?php endif; $team_options = json_decode($team_options);
				if( $team_options!='' )
				{
					foreach($team_options as $team_item){
						$image    = ! empty( $team_item->image_url ) ? apply_filters( 'honeypress_translate_single_string', $team_item->image_url, 'Team section' ) : '';
						$title    = ! empty( $team_item->title ) ? apply_filters( 'honeypress_translate_single_string', $team_item->title, 'Team section' ) : '';
						$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'honeypress_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
						$link     = ! empty( $team_item->link ) ? apply_filters( 'honeypress_translate_single_string', $team_item->link, 'Team section' ) : '';
						$open_new_tab = $team_item->open_new_tab; ?>
						<div <?php if(get_page_template_slug()=="template/template-team-content-5.php") { ?>class="col-lg-4 col-md-6 col-sm-12"<?php } else { ?> class="item" <?php } ?>>
							<div class="team-grid text-center">
				   				<div class="img-holder">
				   				<?php if ( ! empty( $image ) ) : ?>
									<?php
										if ( ! empty( $link ) ) :
											$link_html = '<a href="' . esc_url( $link ) . '"';
											if ( function_exists( 'honeypress_is_external_url' ) ) {
												$link_html .= honeypress_is_external_url( $link );
											}
											$link_html .= '>';
											echo wp_kses_post( $link_html );
										endif;
										echo '<img class="img-fluid" src="' . esc_url( $image ) . '"';
										if ( ! empty( $title ) ) {
											echo 'alt="' . esc_attr( $title ) . '" title="' . esc_attr( $title ) . '"';
										}
										echo '/>';
										if ( ! empty( $link ) ) {
											echo '</a>';
										}
										?>
										<?php endif; ?>
											<?php
											$icons         = html_entity_decode( $team_item->social_repeater );
											$icons_decoded = json_decode( $icons, true );
											//$socails_counts= count($icons_decoded);
											if ( ! empty( $icons_decoded ) ) :
											echo '<div class="overlay">';
												if ( ! empty( $icons_decoded ) ) : ?>
													<ul class="custom-social-icons">
													<?php
														foreach ( $icons_decoded as $value ) 
														{
															$social_icon = ! empty( $value['icon'] ) ? apply_filters( 'honeypress_translate_single_string', $value['icon'], 'Team section' ) : '';
															$social_link = ! empty( $value['link'] ) ? apply_filters( 'honeypress_translate_single_string', $value['link'], 'Team section' ) : '';
															if ( ! empty( $social_icon ) ) 
															{	
															?>							
																<li><a <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> href="<?php echo esc_url( $social_link ); ?>" class="btn btn-just-icon btn-simple"><i class="fa <?php echo esc_attr( $social_icon ); ?> "></i></a></li>
															<?php				
															}	
														} 
														?>
														</ul>
												</div>
											<?php
										endif;
									endif;	
								?>		
					  		</div>
						   			<figcaption class="details">
								   		<?php if ( ! empty( $title ) ) : ?>
									        <?php if ( ! empty( $link ) ) : ?>
									        	<a href="<?php echo $link ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
											<?php endif; ?>
											<h4 class="name"><?php echo esc_html( $title ); ?></h4>
											<?php if ( ! empty( $link ) ) : ?>	
												</a>
											<?php endif; ?>	
										<?php endif; ?>
										<?php if ( ! empty( $subtitle ) ) : ?>
												<span class="position"><?php echo esc_html( $subtitle ); ?></span>
										<?php endif; ?>
						   			</figcaption>
				   				</div>
							</div>
					<?php } 
					} 
					else 
					{ 
						for($team_id=0; $team_id <=4; $team_id++)
						{
						$team_img_id=$team_id+1;
						$team_img='team'.$team_img_id.'.jpg';	
						$team= array( __('Danial Wilson','honeypress'), __('Amanda Smith','honeypress'), __('Victoria Wills','honeypress'), __('Travis Marcus','honeypress'), __('Adriel Harlyn','honeypress'));
						$team_post = array( __('Senior Manager','honeypress'), __('Founder & CEO','honeypress'), __('Web Master','honeypress'), __('UI Developer','honeypress'), __('Founder','honeypress') );?>
						<div <?php if(get_page_template_slug()=="template/template-team-content-5.php") { ?>class="col-lg-4 col-md-6 col-sm-12"<?php } else { ?> class="item" <?php } ?>>					
							<div class="team-grid text-center">
								<div class="img-holder">
									<img src="<?php echo get_template_directory_uri();?>/assets/images/team/<?php echo $team_img;?>" class="img-fluid" alt="<?php echo $team[$team_img_id-1];?>">
									<div class="overlay">
										<ul class="custom-social-icons">
											<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a class="behance" href="#"><i class="fa fa-behance "></i></a></li>
										</ul>
									</div>
								</div>
								<figcaption class="details">
									<h4 class="name"><?php echo $team[$team_id];?></h4>
									<span class="position"><?php echo $team_post[$team_id];?></span>
								</figcaption>
						</div>
					</div>	
				<?php } } ?>
				<?php if(get_page_template_slug()!="template/template-team-content-5.php"):?>
			</div>
		<?php endif;?>
		</div>
	</div>	
</section>	