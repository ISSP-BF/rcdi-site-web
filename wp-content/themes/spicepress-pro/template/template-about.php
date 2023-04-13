<?php
/**
 * Template Name: About Us
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
$about_testimonial_enable = get_theme_mod('about_testimonial_enable', true);
$about_team_enable = get_theme_mod('about_team_enable', true);
$footer_callout_enable = get_theme_mod('footer_callout_enable', true);
if ($about_testimonial_enable == true) {
    ?>
    <!-- Testimonial Section -->
    <?php get_template_part('inc/home-section/testimonial', 'content'); ?>
    <!-- /Testimonial Section -->
    <div class="clearfix"></div>
<?php } if ($about_team_enable == true) { ?>
    <!-- Team Section -->
    <?php get_template_part('inc/home-section/team', 'content'); ?>
    <div class="clearfix"></div>
    <!-- /Team Section -->
<?php } if ($footer_callout_enable == true) { ?>
    <!-- Callout Section -->
    <?php get_template_part('inc/home-section/footer_callout', 'content'); ?>
    <!-- /Callout Section -->
    <div class="clearfix"></div>
<?php } get_footer(); ?>