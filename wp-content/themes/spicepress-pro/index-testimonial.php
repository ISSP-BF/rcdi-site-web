<?php

spicepress_before_testimonial_section_trigger();

$testimonial_section_enable = get_theme_mod('testimonial_section_enable', 'on');
if ($testimonial_section_enable != 'off') {
    get_template_part('inc/home-section/testimonial', 'content');
}

spicepress_after_testimonial_section_trigger();
