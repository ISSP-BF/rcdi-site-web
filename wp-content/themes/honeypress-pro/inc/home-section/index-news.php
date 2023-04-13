<?php 
honeypress_before_blog_section_trigger();
$latest_news_section_enable = get_theme_mod('latest_news_section_enable',true);
if($latest_news_section_enable !=false)
{ 
get_template_part('inc/home-section/news','content'.get_theme_mod('home_news_design_layout',1));
 }
honeypress_after_blog_section_trigger(); ?>