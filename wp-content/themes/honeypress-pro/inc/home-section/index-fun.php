<?php honeypress_before_gallery_section_trigger();	
$funfact_section_enabled = get_theme_mod('funfact_section_enabled',true);
if($funfact_section_enabled !=false)
{ 
get_template_part('inc/home-section/fun','content');
} ?>
<?php honeypress_after_gallery_section_trigger(); ?>