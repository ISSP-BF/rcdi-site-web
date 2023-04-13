<?php spicepress_before_portfolio_section_trigger(); ?>	
<?php

$portfolio_section_enable = get_theme_mod('portfolio_section_enable', 'on');
if ($portfolio_section_enable != 'off') {
    if (get_theme_mod('home_portfolio_design_layout', 1) == 1) {
        get_template_part('inc/home-section/portfolio', 'content1');
    } else {
        get_template_part('inc/home-section/portfolio', 'content2');
    }
}
?>
<?php spicepress_after_portfolio_section_trigger(); ?>	