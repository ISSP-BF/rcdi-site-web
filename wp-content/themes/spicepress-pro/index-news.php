<?php spicepress_before_blog_section_trigger(); ?>	
<?php

$latest_news_section_enable = get_theme_mod('latest_news_section_enable', 'on');
if ($latest_news_section_enable != 'off') {
    get_template_part('inc/home-section/news', 'content' . get_theme_mod('home_news_design_layout', 1));
}
?>
<?php spicepress_after_blog_section_trigger(); ?>