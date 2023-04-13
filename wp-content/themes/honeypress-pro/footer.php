<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honeypress
 */
?>
<?php honeypress_before_footer_section_trigger(); 
$client_bg_clr=get_theme_mod('clt_bg_color','#fff');
$ribon_data = get_theme_mod('honeypress_ribon_content');
  if(empty($ribon_data))
    {
      $ribon_data = json_encode( array(
      array(
        'icon_value' => 'fa fa-facebook',
        'title'      => esc_html__( 'Facebook', 'honeypress' ),
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b76',
        ),
        array(
        'icon_value' => 'fa fa-twitter',
        'title'      => esc_html__( 'Twitter', 'honeypress' ),
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b77',
        ),
        array(
        'icon_value' => 'fa fa-linkedin',
        'title'      => esc_html__( 'LinkedIn', 'honeypress' ),
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b78',
        ),
        array(
        'icon_value' => 'fa fa-google-plus',
        'title'      => esc_html__( 'Google', 'honeypress' ),
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b79',
        ),
        array(
        'icon_value' => 'fa fa-instagram',
        'title'      => esc_html__( 'Instagram', 'honeypress' ),
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b80',
        ),
      ) );
    }
    ?>

<footer class="site-footer" <?php if(!empty(get_theme_mod('ftr_wgt_background_img'))):?> style="background-image: url(<?php echo get_theme_mod('ftr_wgt_background_img');?>);" <?php endif;?>>  
 <?php $fwidgets_overlay_section_color = get_theme_mod('honeypress_fwidgets_overlay_section_color','rgba(0, 0, 0, 0.7)');?>
  <div class="overlay" <?php if(!empty(get_theme_mod('ftr_wgt_background_img'))): if(get_theme_mod('honeypress_fwidgets_image_overlay',true)==true):?> style="background-color:<?php echo $fwidgets_overlay_section_color; ?>" <?php endif; endif;?>></div>
<?php if(get_theme_mod('ftr_widgets_enable',true)===true):?>
  <div class="container">
 
    <?php
        $ribon_title = get_theme_mod('ribon_title',__('Follow Us:','honeypress'));
          $ribon_enable = get_theme_mod('ribon_setting_enable',true);
          if($ribon_enable == true) { ?>
    	   <div class="footer-social-links">
    				<ul class="custom-social-icons text-center">
              <?php
              if(!empty($ribon_title)):?>
              <li class="text-white"><span><?php echo $ribon_title; ?></span></li>
              <?php
            endif;
              $ribon_data = json_decode($ribon_data);
                if (!empty($ribon_data))
                { 
                  foreach($ribon_data as $ribon_team)
                  { 
                    $ribon_icon = ! empty( $ribon_team->icon_value ) ? apply_filters( 'honeypress_translate_single_string', $ribon_team->icon_value, 'Ribon section' ) : '';
                    
                    $ribon_title = ! empty( $ribon_team->title ) ? apply_filters( 'honeypress_translate_single_string', $ribon_team->title, 'Ribon section' ) : '';
                    
                    $ribon_link = ! empty( $ribon_team->link ) ? apply_filters( 'honeypress_translate_single_string', $ribon_team->link, 'Ribon section' ) : '#';
                    ?>

                    <?php $exp = explode("fa-",$ribon_icon);
                    $a = $exp[1]; ?>
                    <?php
                    if(!empty($ribon_icon)):?>
                    <li>
                      <a class="<?php echo $a; ?>" <?php if($ribon_team->open_new_tab== 'yes'){echo "target='_blank'";} ?> href="<?php echo $ribon_link; ?>" ><i class="fa <?php echo $ribon_icon; ?>"></i><?php echo $ribon_title; ?></a>
                    </li>
    					     <?php endif;?>
                
                <?php } ?> 
              <?php } ?>
    				</ul>
  			</div>
      <?php } ?>

        <?php 
        $honeypress_footer_widget=get_theme_mod('footer_widgets_section',3);
        switch ( $honeypress_footer_widget )
        {   
          case 1:
          get_template_part('inc/footer-widget/layout-1');
          break;

          case 2:
          get_template_part('inc/footer-widget/layout-2');
          break;

          case 3:
          get_template_part('inc/footer-widget/layout-3');
          break;

          case 4:
          get_template_part('inc/footer-widget/layout-4');
          break;

          case 5:
          get_template_part('inc/footer-widget/layout-5');
          break;

          case 6:
          get_template_part('inc/footer-widget/layout-6');
          break;

          case 7:
          get_template_part('inc/footer-widget/layout-7');
          break;

          case 8:
          get_template_part('inc/footer-widget/layout-8');
          break;

          case 9:
          get_template_part('inc/footer-widget/layout-9');
          break;
        }
?>

  </div>

      <?php endif; if(get_theme_mod('ftr_bar_enable',true)==true):
      $advance_footer_bar_section=get_theme_mod('advance_footer_bar_section',1);
      switch ( $advance_footer_bar_section )
      {
        case 1:
        get_template_part('inc/footer-bar/layout-1');
        break;

        case 2:
        get_template_part('inc/footer-bar/layout-2');
        break;
      }
      ?>
    <?php endif;?>

</footer>
<?php honeypress_after_footer_section_trigger(); ?>
<?php
   $ribon_enable = get_theme_mod('scrolltotop_setting_enable',true);
    if($ribon_enable == true) { ?>
<div class="scroll-up custom <?php echo get_theme_mod('scroll_position_setting','right');?>"><a href="#totop"><i class="<?php echo get_theme_mod('honeypress_scroll_icon_class','fa fa-arrow-up');?>"></i></a></div>
    <?php } ?>

<style type="text/css">
  .scroll-up {
    <?php echo get_theme_mod('scroll_position_setting','right');?>: 30px !important;
}
 .scroll-up.custom a {
    border-radius: <?php echo get_theme_mod('honeypress_scroll_border_radius',50);?>px;
    }
<?php if(get_theme_mod('apply_scrll_top_clr_enable',false)==true):?>
    .scroll-up.custom a {
    background: <?php echo get_theme_mod('honeypress_scroll_bg_color','#2d6ef8');?>;
    color: <?php echo get_theme_mod('honeypress_scroll_icon_color','#fff');?>;
}
.scroll-up.custom a:hover,
.scroll-up.custom a:active {
    background: <?php echo get_theme_mod('honeypress_scroll_bghover_color','#fff');?>;
    color: <?php echo get_theme_mod('honeypress_scroll_iconhover_color','#2d6ef8');?>;
}
<?php endif;?>
</style>
<style type="text/css">
  .sponsors {
    background-color: <?php echo $client_bg_clr;?>;
}
</style>
<?php 
//Stick Header
if(get_theme_mod('sticky_header_enable',false)==true):
get_template_part('inc/sticky-header/sticky-with'.get_theme_mod('sticky_header_animation','').'-animation'); endif; 

//footer widget bg image
?>
<style type="text/css">
  .site-footer {
    background-repeat: <?php echo get_theme_mod('footer_widget_reapeat','no-repeat');?>;
    background-position: <?php echo get_theme_mod('footer_widget_position','left top');?>;
    background-size: <?php echo get_theme_mod('footer_widget_bg_size','cover');?>;
    background-attachment: <?php echo get_theme_mod('footer_widget_bg_attachment','scroll');?>;
}
</style>
<?php  ?>
</div>
<?php wp_footer();?>	
</body>
</html>