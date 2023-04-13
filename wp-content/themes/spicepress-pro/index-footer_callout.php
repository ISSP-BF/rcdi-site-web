<?php

spicepress_before_callout_section_trigger();

$cta_section_enable = get_theme_mod('cta_section_enable', 'on');
if ($cta_section_enable != 'off') {
    get_template_part('inc/home-section/footer_callout', 'content');
} spicepress_after_callout_section_trigger();
