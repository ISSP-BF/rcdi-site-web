<div class="col-lg-6 col-md-6 col-sm-12 left">
<?php
 $foot_section_1 = get_theme_mod('footer_bar_sec1','custom_text');
switch ( $foot_section_1 )
      {
        case 'none':
        break;

        case 'footer_menu':
        echo spicepress_footer_bar_menu();
        break;

        case 'custom_text':
        echo get_theme_mod('footer_copyright_text',__( 'Copyright 2019 <a href="#"> SpiceThemes</a> All right reserved', 'spicepress' ));
        break;

        case 'widget':
        spicepress_footer_widget_area('footer-bar-1');
        break;
      }
?>
</div>	