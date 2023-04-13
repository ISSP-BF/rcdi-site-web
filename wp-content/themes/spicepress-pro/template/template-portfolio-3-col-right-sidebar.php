<?php 
/**
 * Template Name: Portfolio 3 Columns Right Sidebar
 */
get_header();

if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}
 
spicepress_overlap_bredcrumb();
?>
<!-- Portfolio Section -->
<?php get_template_part('content','portfolio'); ?>
<!-- /Portfolio Section -->
<?php get_footer(); ?>