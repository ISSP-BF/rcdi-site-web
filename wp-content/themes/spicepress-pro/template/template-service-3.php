<?php

/**
 * Template Name: Service Three
 */
get_header();

if (get_post_meta(get_the_ID(), 'slider_chkbx', true)) {

    get_template_part('index', 'slider');
}
spicepress_overlap_bredcrumb();
?>
<?php

$spicepress_service_content = get_theme_mod('spicepress_service_content');
$enable_service_section_service = get_theme_mod('enable_service_section_service', 'on');
if ($enable_service_section_service != 'off') {
    get_template_part('inc/home-section/service', 'content');
}
$enable_testimonial_section_service = get_theme_mod('enable_testimonial_section_service', 'on');
if ($enable_testimonial_section_service != 'off') {
    get_template_part('inc/home-section/testimonial', 'content');
}
$enable_client_section_service = get_theme_mod('enable_client_section_service', 'on');
if ($enable_client_section_service != 'off') {
    get_template_part('inc/home-section/client', 'content');
}
get_footer();
?>