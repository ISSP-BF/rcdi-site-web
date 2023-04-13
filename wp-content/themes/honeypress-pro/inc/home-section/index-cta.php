<?php honeypress_before_callout_section_trigger(); ?>
<?php 
$cta_section_enable  = get_theme_mod('cta_section_enable',true);
if($cta_section_enable !=false) 
{
get_template_part('inc/home-section/cta','content');
} ?>
<?php honeypress_after_callout_section_trigger(); ?>