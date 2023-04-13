<?php



if (get_page_template_slug() == 'template/template-service.php'|| get_page_template_slug() == 'template/template-testimonial-1.php') {
    testimonial_design_default();
} elseif (get_page_template_slug() == 'template/template-service-2.php'|| get_page_template_slug() == 'template/template-testimonial-2.php') {
    testimonial_design($design_id = 'testimonial-carousel2');
} elseif (get_page_template_slug() == 'template/template-service-3.php'|| get_page_template_slug() == 'template/template-testimonial-3.php') {
    testimonial_design($design_id = 'testimonial-carousel3');
} elseif (get_page_template_slug() == 'template/template-service-4.php'|| get_page_template_slug() == 'template/template-testimonial-4.php') {
    testimonial_design($design_id = 'testimonial-carousel4');
} elseif (get_page_template_slug() == 'template/template-service-5.php'|| get_page_template_slug() == 'template/template-testimonial-5.php') {
    testimonial_design($design_id = 'testimonial-carousel5');
} elseif (get_theme_mod('home_testimonial_design_layout', 1) == 1) {
    testimonial_design_default();
} elseif (get_theme_mod('home_testimonial_design_layout', 1) == 2) {
    testimonial_design($design_id = 'testimonial-carousel2');
} elseif (get_theme_mod('home_testimonial_design_layout', 1) == 3) {
    testimonial_design($design_id = 'testimonial-carousel3');
} elseif (get_theme_mod('home_testimonial_design_layout', 1) == 4) {
    testimonial_design($design_id = 'testimonial-carousel4');
} elseif (get_theme_mod('home_testimonial_design_layout', 1) == 5) {
    testimonial_design($design_id = 'testimonial-carousel5');
}