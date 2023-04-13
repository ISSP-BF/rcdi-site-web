<?php honeypress_before_client_section_trigger(); ?>
<?php
$client_section_enable = get_theme_mod('client_section_enable',true);
if($client_section_enable !=false)
{ 
get_template_part('inc/home-section/client','content');
} ?>
<?php honeypress_after_client_section_trigger(); ?>