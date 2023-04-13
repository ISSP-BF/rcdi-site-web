<?php 
honeypress_before_service_section_trigger();
if(get_theme_mod('home_service_section_enabled',true) !=false)
{ 
	do_action( 'honeypress_advance_service' );
} 
honeypress_after_service_section_trigger(); ?>