<?php

spicepress_before_client_section_trigger();

$client_section_enable = get_theme_mod('client_section_enable', 'on');
if ($client_section_enable != 'off') {
    get_template_part('inc/home-section/client', 'content');
}
spicepress_after_client_section_trigger();
