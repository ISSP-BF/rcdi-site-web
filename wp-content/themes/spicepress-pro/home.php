<?php 
get_header();
		if('page' == get_option('show_on_front')){ get_template_part('index');}
		else
		{
		$front_page = get_theme_mod('front_page_data','services,portfolio,testimonial,news,gallery,team,wooproduct,client,footer_callout');
		get_template_part('index','slider');
		
		$data =is_array($front_page) ? $front_page : explode(",",$front_page);
		
		if($data) 
		{
			foreach($data as $key=>$value)
			{
				switch($value) 
				{
					case 'services':
						get_template_part('index','services');
					break;
					
					case 'portfolio':
						get_template_part('index','portfolio');
					break;
					
					case 'testimonial':
						get_template_part('index','testimonial');
					break;
					
					case 'news';
						get_template_part('index','news');
					break;
					
					case 'gallery';
						get_template_part('index','gallery');
					break;
					
					case 'team';
						get_template_part('index','team');
					break;
					
					case 'wooproduct';
						get_template_part('index','wooproduct');
					break;
					
					case 'client';
						get_template_part('index','client');
					break;
					
					
					case 'footer_callout';
						get_template_part('index','footer_callout');
					break;
				}
			}
		}
	}
get_footer(); ?>