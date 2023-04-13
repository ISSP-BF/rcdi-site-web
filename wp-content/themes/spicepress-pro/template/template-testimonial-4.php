<?php 
/**
 * Template Name: Testimonial Template 4
*/
get_header();

if (get_post_meta(get_the_ID(), 'slider_chkbx', true)) {

    get_template_part('index', 'slider');
}

spicepress_overlap_bredcrumb();

if ($post->post_content !== "") {
    ?>
    <!-- About Section -->
    <section class="about-section">		
        <div class="container<?php echo spicepress_container();?>">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="row">
    <?php
    the_post();
    the_content();
    wp_link_pages();
    ?>
                    </div>				
                </div>	
            </div>
        </div>
    </section>
    <!-- /About Section -->
<?php } ?>
<div class="clearfix"></div>
<?php
$testimonial_enable = get_theme_mod('enable_testimonial_section_testimonial', 'on');
$enable_client_section_service = get_theme_mod('enable_client_section_testimonial', 'on');
if ($testimonial_enable  != 'off') {
    ?>
    <!-- Testimonial Section -->
    <?php get_template_part('inc/home-section/testimonial', 'content'); ?>
    <!-- /Testimonial Section -->
    <div class="clearfix"></div>
<?php }
if ($enable_client_section_service != 'off') {
    ?>
    <!-- Client Section -->
    <?php get_template_part('inc/home-section/client', 'content');?>
    <!-- Client Section -->
    <div class="clearfix"></div>
<?php }
get_footer(); ?>