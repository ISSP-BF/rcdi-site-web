<div class="col-lg-6 col-md-6 col-sm-12 right">
<?php
$foot_section_2 = get_theme_mod('footer_bar_sec2','none');
switch ( $foot_section_2 )
      {
        case 'none':
        break;

        case 'footer_menu':
        echo spicepress_footer_bar_menu();
        break;

        case 'custom_text':
        echo get_theme_mod('footer_copyright_2',__( 'Copyright 2019 <a href="#"> SpiceThemes</a> All right reserved', 'spicepress' ));
        break;

        case 'widget':
        spicepress_footer_widget_area('footer-bar-2');
        break;
      }
?>
</div>	