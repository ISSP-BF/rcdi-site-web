<?php

spicepress_before_team_section_trigger();


$team_section_enable = get_theme_mod('team_section_enable', 'on');
if ($team_section_enable != 'off') {
    get_template_part('inc/home-section/team', 'content');
}
spicepress_after_team_section_trigger();
