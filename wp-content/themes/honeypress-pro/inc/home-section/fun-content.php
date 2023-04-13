<?php $home_fun_title=get_theme_mod('home_fun_section_title',__('Our Many Years of Experiance in Numbers','honeypress'));
$funfact_data = get_theme_mod('honeypress_funfact_content');
if(empty($funfact_data))
{
	$funfact_data = json_encode( array(
	array(
		'icon_value' => 'fa-smile-o',
		'title'      => '4050',
		'text'       => esc_html__('Satisfied Clients','honeypress'),
		'id'         => 'customizer_repeater_56d7ea7f40b56',
	),
	array(
		'icon_value' => 'fa-handshake-o',
		'title'      => '150',
		'text'       => esc_html__('Finish Projects','honeypress'),
		'id'         => 'customizer_repeater_56d7ea7f40b66',
	),
	array(
		'icon_value' => 'fa-line-chart',
		'title'      => '90%',
		'text'       => esc_html__('Business Growth','honeypress'),
		'id'         => 'customizer_repeater_56d7ea7f40b86',
	),
	) );
}?>
	<section class="section-module funfact bg-grey">
		<div class="honeypress-fun-container container<?php //echo honeypress_container();?>">
			<div class="row ">
				<?php if(!empty($home_fun_title)):?>
				<div class="col-lg-4 col-md-6 col-sm-12">			
					<div class="section-header">
						<div class="section-separator border-center-two"></div>
						<h2 class="section-title-two"><?php echo $home_fun_title;?></h2>
					</div>  
				</div>
				<?php endif;
				$funfact_data = json_decode($funfact_data);
				if (!empty($funfact_data))
				{ 
					echo '<div class="col-lg-8 col-md-6 col-sm-12">';
					echo '<div class="row">';
					foreach($funfact_data as $funfact_iteam)
					{ 
						$funfact_title = ! empty( $funfact_iteam->title ) ? apply_filters( 'honeypress_translate_single_string', $funfact_iteam->title, 'Funfact section' ) : '';
						$funfact_text = ! empty( $funfact_iteam->text ) ? apply_filters( 'honeypress_translate_single_string', $funfact_iteam->text, 'Funfact section' ) : '';		
						$funfact_icon = ! empty( $funfact_iteam->icon_value ) ? apply_filters( 'honeypress_translate_single_string', $funfact_iteam->icon_value, 'Funfact section' ) : '';?>
						<?php if((!empty($funfact_icon)) || (!empty($funfact_title)) || (!empty($funfact_text))):?>
						<div class="col-lg-4 col-md-6 col-sm-12">			
							<div class="funfact-inner text-center">
								<?php if(!empty($funfact_icon)):?>
								<i class="fa <?php echo $funfact_icon; ?> funfact-icon"></i>
							<?php endif;?>
							<?php if(!empty($funfact_title)):?>
								<h2 class="funfact-title"><?php echo $funfact_title; ?></h2>
							<?php endif;?>
							<?php if(!empty($funfact_text)):?>
								<p class="description"><?php echo $funfact_text; ?></p>
							<?php endif;?>
							</div>  
						</div>
						<?php 
					endif;
					} 
					echo '</div>';
					echo '</div>';
				}?>
			</div>	 
		</div>
	</section>