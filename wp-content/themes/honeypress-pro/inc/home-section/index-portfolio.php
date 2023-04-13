<?php 
honeypress_before_portfolio_section_trigger();
if(get_theme_mod('portfolio_section_enable',true) !=false)
{ 
	if(get_theme_mod('home_portfolio_design_layout',1)==1)
		{
			get_template_part('inc/home-section/portfolio','content1');	
		}	
	else
		{
			get_template_part('inc/home-section/portfolio','content2');		
		}
} 
honeypress_after_portfolio_section_trigger(); ?>