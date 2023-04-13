<?php
$client_options = get_theme_mod('honeypress_clients_content');
$clients_title=get_theme_mod('home_client_section_title',__('We Work With The Best Clients','honeypress'));
$client_subtitle=get_theme_mod('home_client_section_discription',__('It is a long established fact that a reader will be distracted by the readable content.','honeypress'));?>
<section class="section-module sponsors mb-2">
	<div class="honeypress-client-container container<?php //echo honeypress_container();?>">
		<div class="row">
			<?php if(!empty($clients_title) || !empty($client_subtitle)):?>
			<div class="col-lg-4 col-md-6 col-sm-12">		
				<div class="section-header">
					<div class="section-separator border-center-two"></div>
					<?php 
					if(!empty($clients_title)):?>
					<h2 class="section-title-two"><?php echo get_theme_mod('home_client_section_title',__('We Work With The Best Clients','honeypress'));?></h2>
					<?php endif;
					if(!empty($client_subtitle)):?>
					<p class="pt-2"><?php echo get_theme_mod('home_client_section_discription',__('It is a long established fact that a reader will be distracted by the readable content.','honeypress'));?></p>
				<?php endif;?>
				</div>  
			</div>
		<?php endif;
		if(empty($clients_title) && empty($client_subtitle))
		{
			echo '<div class="col-lg-12 col-md-12 col-sm-12">';
		}
		else
		{
			echo '<div class="col-lg-8 col-md-6 col-sm-12">';
		} ?>
				<div class="row">
					<?php
					$t=true;
					$client_options = json_decode($client_options);
					if( $client_options!='' )
					{
						foreach($client_options as $client_iteam){ 
							$client_image = ! empty( $client_iteam->image_url ) ? apply_filters( 'honeypress_translate_single_string', $client_iteam->image_url, 'Client section' ) : '';
							$client_link = ! empty( $client_iteam->link ) ? apply_filters( 'honeypress_translate_single_string', $client_iteam->link, 'Client section' ) : '';
							$open_new_tab = $client_iteam->open_new_tab;
						?>		
						<div class="col-lg-4 col-md-6 col-sm-12">		
							<figure <?php if($client_image !='') {?>class="logo-scroll"<?php }?>>
								<?php
								if(empty($client_link))
								{
								?>
								<img src="<?php echo $client_image; ?>" class="img-fluid" >
								<?php	
								}
								else
								{
								?>
								<a href="<?php echo $client_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
									<img src="<?php echo $client_image; ?>" class="img-fluid" >
								</a>
								<?php	
								}
								?>
							</figure>
						</div>		
			    		<?php } 
			    	} 
			    	else 
			    	{
			    		for ($i=1; $i <=6 ; $i++) { 	
			    	 ?> 	
						<div class="col-lg-4 col-md-6 col-sm-12">		
							<figure class="logo-scroll">
								<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/sponsors/logo<?php echo $i;?>.png" class="img-fluid" alt="Sponsors <?php echo $i;?>"></a>
							</figure>
						</div>
			  		<?php 
			  		} 
			  	}?>	
				</div>
			</div>
		</div>
	</div>
</section>