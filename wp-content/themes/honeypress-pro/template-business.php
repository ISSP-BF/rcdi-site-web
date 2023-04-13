<?php 
/**
 * Template Name: Business Template
*/
	get_header();

		$front_page = get_theme_mod('front_page_data','services,fun,portfolio,testimonial,news,cta,team,wooproduct,client');
		get_template_part('inc/home-section/index','slider');
		
		$data =is_array($front_page) ? $front_page : explode(",",$front_page);
		
		if($data) 
		{
			foreach($data as $key=>$value)
			{
				switch($value) 
				{
					case 'services':
						get_template_part('inc/home-section/index','services');
					break;
					case 'fun':
						get_template_part('inc/home-section/index','fun');
					break;
					case 'portfolio':
						get_template_part('inc/home-section/index','portfolio');
					break;
					
					case 'testimonial':
						get_template_part('inc/home-section/index','testimonial');
					break;
					
					case 'news';
						get_template_part('inc/home-section/index','news');
					break;
					
					case 'cta';
						get_template_part('inc/home-section/index','cta');
					break;
					
					case 'team';
						get_template_part('inc/home-section/index','team');
					break;
					
					case 'wooproduct';
						get_template_part('inc/home-section/index','wooproduct');
					break;
					
					case 'client';
						get_template_part('inc/home-section/index','client');
					break;
				}
			}
		}

get_footer(); ?>