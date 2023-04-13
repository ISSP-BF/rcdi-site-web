<?php 
/**
 * Template Name: Team Template 4
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
$team_enable = get_theme_mod('enable_team_section_team', 'on');
$enable_client_section_team = get_theme_mod('enable_client_section_team', 'on');
if ($team_enable  != 'off') {
    ?>
    <!-- Testimonial Section -->
    <?php get_template_part('inc/home-section/team', 'content'); ?>
    <!-- /Testimonial Section -->
    <div class="clearfix"></div>
<?php }
if ($enable_client_section_team != 'off') {
    ?>
    <!-- Client Section -->
    <?php get_template_part('inc/home-section/client', 'content');?>
    <!-- Client Section -->
    <div class="clearfix"></div>
<?php }
get_footer(); ?>