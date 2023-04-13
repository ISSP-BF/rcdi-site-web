<?php 
/**
 * Template Name: Contact Four
 */
get_header();
honeypress_breadcrumbs();
do_action('content_contact'); ?>

<!-- Contact Details Section -->	
<section class="section-module contact">
	<div class="container<?php echo honeypress_container();?>">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="section-header text-center">
					<div class="section-separator border-center"></div>
					<p class="section-subtitle"><?php echo $contact_page_title; ?></p>
					<h2 class="section-title"><?php echo $contact_page_subtitle; ?></h2>
				</div>
			</div>
		</div>
    </div>
</section>
<section class="contact-form-map pb-5">
	<div class="container<?php echo honeypress_container();?>">
		<div class="row">
			<div class="col-lg-8 col-md-8 mb-lg-0 pb-lg-3 mb-4">
				<div class="title"><h3><?php echo $form_heading; ?></h3></div>
				<div>
					<?php
					if(get_theme_mod('contact_form_shortcode'))
					{
						echo do_shortcode(get_theme_mod('contact_form_shortcode')); 
					}
					?>	
				</div>
			</div>
			<div class="col-lg-4 col-md-4">   			
			    <?php $contact_data = json_decode($contact_data);
				if (!empty($contact_data))
					{ 
						foreach($contact_data as $contact_item)
							{ 
								$contact_title = ! empty( $contact_item->title ) ? apply_filters( 'honeypress_translate_single_string', $contact_item->title, 'Contact section' ) : '';
				
								$contact_text = ! empty( $contact_item->text ) ? apply_filters( 'honeypress_translate_single_string', $contact_item->text, 'Contact section' ) : '';
				
								$contact_icon = ! empty( $contact_item->icon_value ) ? apply_filters( 'honeypress_translate_single_string', $contact_item->icon_value, 'Contact section' ) : '';

								$contact_link = ! empty( $contact_item->link ) ? apply_filters( 'honeypress_translate_single_string', $contact_item->link, 'Contact section' ) : '';?>
								
			
								<aside class="contact-widget text-center">
									<figure class="contact-icon">	
										<?php
											if(empty($contact_link))
											{
											?>
											<i class="fa <?php echo $contact_icon; ?>"></i>
											<?php
											}
											else
											{
											?>
											<a href="<?php echo $contact_link;?>"><i class="fa <?php echo $contact_icon; ?>"></i></a>
											<?php
											}
											?>
									</figure>
									<h4 class="title"><?php echo $contact_title; ?></h4>
									<address>
										<?php echo $contact_text; ?>
									</address>
								</aside>			
						<?php } 
					} ?>	 						 
			</div>
    	</div>
		<div class="row">	
			<div class="col-lg-12 col-md-12 col-sm-12">	
			    <div class="title text-center"><h3><?php echo $map_heading; ?></h3>
			    </div>
				<div id="google-map">		
					<?php echo do_shortcode(get_theme_mod('contact_google_map_shortcode')); ?>
				</div>
			</div>	
	    </div>
	</div>
</section>

<?php get_footer();?>