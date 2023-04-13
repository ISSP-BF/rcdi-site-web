<?php honeypress_before_testimonial_section_trigger(); 
$testimonial_section_enable = get_theme_mod('testimonial_section_enable',true);
if($testimonial_section_enable !=false)
{
	if(get_theme_mod('home_testimonial_design_layout','')=='')
	{
		$testimonial_layout=1;
	}
	else
	{
		$testimonial_layout=get_theme_mod('home_testimonial_design_layout','');
	}
	?>
	<input type="hidden" id="honeypress_home_testimonial_layout" value="<?php echo get_theme_mod('home_testimonial_design_layout','');?>">
	<?php get_template_part('inc/home-section/testimonial','content'.$testimonial_layout);	
} 
honeypress_after_testimonial_section_trigger(); ?>
