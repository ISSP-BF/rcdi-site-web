<?php honeypress_before_team_section_trigger();
$team_section_enable = get_theme_mod('team_section_enable',true);
if($team_section_enable !=false)
{
get_template_part('inc/home-section/team','content'.get_theme_mod('home_team_design_layout',1));
}
honeypress_after_team_section_trigger(); ?>