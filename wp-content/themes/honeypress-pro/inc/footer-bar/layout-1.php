<div class="site-info text-center layout-1">
    <div class="container">
        <?php $foot_section_1 = get_theme_mod('footer_bar_sec1','custom_text');
              switch ( $foot_section_1 )
                {
                    case 'none':
                    break;

                    case 'footer_menu':
                    echo honeypress_footer_bar_menu();
                    break;

                    case 'custom_text':
                    echo get_theme_mod('footer_copyright',__( 'Copyright 2019 <a href="#"> SpiceThemes</a> All right reserved', 'honeypress' ));
                    break;

                    case 'widget':
                    honeypress_footer_widget_area('footer-bar-1');
                    break;
                }
        ?> 
    </div>
</div>
