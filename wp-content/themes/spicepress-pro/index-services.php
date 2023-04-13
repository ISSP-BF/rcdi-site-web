<?php

spicepress_before_service_section_trigger();
$home_service_section_enabled = get_theme_mod('home_service_section_enabled', 'on');
if ($home_service_section_enabled != 'off') {
    get_template_part('inc/home-section/service', 'content');
}
spicepress_after_service_section_trigger();
