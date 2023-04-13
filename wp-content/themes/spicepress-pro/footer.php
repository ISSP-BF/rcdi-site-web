<?php
/**
 * Template file for footer area
 */
?>
<div class="clearfix"></div>

<?php spicepress_before_footer_section_trigger(); ?>
<!-- Footer Section -->
<footer class="site-footer sp-schemes" <?php if (!empty(get_theme_mod('ftr_wgt_background_img'))): ?> style="background-image: url(<?php echo get_theme_mod('ftr_wgt_background_img'); ?>);" <?php endif; ?>>		
    <?php $fwidgets_overlay_section_color = get_theme_mod('spicepress_fwidgets_overlay_section_color', 'rgba(0, 0, 0, 0.7)'); ?>
    <div class="overlay" <?php if (!empty(get_theme_mod('ftr_wgt_background_img'))): if (get_theme_mod('spicepress_fwidgets_image_overlay', true) == true): ?> style="background-color:<?php echo $fwidgets_overlay_section_color; ?>" <?php
        endif;
    endif;
    ?>>
        <div class="container">
            <?php
            spicepress_footer_widget_layout_section();
            spicepress_footer_bar_section();
            ?>
        </div>
    </div>
</footer>
<!-- /Footer Section -->
<?php spicepress_after_footer_section_trigger(); ?>
<div class="clearfix"></div>
</div><!--Close of wrapper-->
<!--Scroll To Top--> 
<?php
$scroll_up_enable = get_theme_mod('scrolltotop_setting_enable', true);
if ($scroll_up_enable == true) {
    ?>
    <a href="#" class="hc_scrollup custom <?php echo get_theme_mod('scroll_position_setting', 'right'); ?>"><i class="<?php echo get_theme_mod('spicepress_scroll_icon_class', 'fa fa-chevron-up'); ?>"></i></a>
<?php } ?>

<style>
    a.hc_scrollup.custom {
        border-radius: <?php echo get_theme_mod('spicepress_scroll_border_radius', 0); ?>%;
    }

    <?php if (get_theme_mod('apply_scrll_top_clr_enable', false) == true): ?>
        a.hc_scrollup.custom {
            background: <?php echo get_theme_mod('spicepress_scroll_bg_color', '#ce1b28'); ?>;
            color: <?php echo get_theme_mod('spicepress_scroll_icon_color', '#fff'); ?>;
        }
        a.hc_scrollup.custom:hover,
        a.hc_scrollup.custom:active {
            background: <?php echo get_theme_mod('spicepress_scroll_bghover_color', '#fff'); ?>;
            color: <?php echo get_theme_mod('spicepress_scroll_iconhover_color', '#ce1b28'); ?>;
        }
    <?php endif; ?>
</style>
<style type="text/css">
    .site-footer {
        background-repeat: <?php echo get_theme_mod('footer_widget_reapeat', 'no-repeat'); ?> !important;
        background-position: <?php echo get_theme_mod('footer_widget_position', 'left top'); ?> !important;
        background-size: <?php echo get_theme_mod('footer_widget_bg_size', 'cover'); ?> !important;
        background-attachment: <?php echo get_theme_mod('footer_widget_bg_attachment', 'scroll'); ?> !important;
    }

<?php if (get_theme_mod('ftr_widgets_enable', true) === true): ?>
    .site-info {
        border-top: <?php echo get_theme_mod('footer_bar_border', 1); ?>px <?php echo get_theme_mod('footer_border_style', 'solid'); ?> <?php echo get_theme_mod('spicepress_footer_border_clr', '#403f4e'); ?>;
        padding: 25px 0px;
    }
<?php endif; ?>
</style>
<!--/Scroll To Top--> 

<?php 
//Stick Header
if(get_theme_mod('sticky_header_enable',false)==true):
get_template_part('inc/sticky-header/sticky-with'.get_theme_mod('sticky_header_animation','').'-animation'); endif; ?>

<?php
if(is_rtl()){
    if(get_theme_mod('header_logo_placing', 'left')=='left'){
        echo '<style>@media(min-width:1100px){.nav.navbar-nav.navbar-right{display: flex;}}</style>';
    }
    if(get_theme_mod('header_logo_placing')=='right'){
        echo '<style>@media(min-width:1100px){.nav.navbar-nav.navbar-left{display: flex;}}</style>';
    } 
    if(get_theme_mod('header_logo_placing', 'left')=='center'){
        echo '<style>@media(min-width:1200px){.collapse.navbar-collapse{text-align:center;}.nav.navbar-nav{display: inline-flex;}}.nav:before {display: block !important;}</style>';
    } 
}else{
    if(get_theme_mod('header_logo_placing', 'left')=='left'){
    }
}
?>

<?php
do_action('spicepress_demo_switcher');

wp_footer();
?>
</body>
</html>