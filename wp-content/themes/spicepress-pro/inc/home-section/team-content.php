<?php
if (is_page_template('template/template-team-1.php')) {
team_design_default();
} elseif (is_page_template('template/template-team-2.php')) {
team_design($design_class='team2');
} elseif (is_page_template('template/template-team-3.php')) {
team_design($design_class='team3');
} elseif (is_page_template('template/template-team-4.php')) {
team_design($design_class='team4');
}elseif(get_theme_mod('home_team_design_layout', 1) == 1){
team_design_default();
}elseif(get_theme_mod('home_team_design_layout', 1) == 2){
	team_design($design_class='team2');
}
elseif(get_theme_mod('home_team_design_layout', 1) == 3){
	team_design($design_class='team3');
}elseif(get_theme_mod('home_team_design_layout', 1) == 4){
	team_design($design_class='team4');
}
?>