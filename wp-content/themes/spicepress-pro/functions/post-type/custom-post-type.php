<?php
/************* Home portfolio custom post type ************************/		
function spicepress_project_type()
		{	register_post_type( 'spicepress_portfolio',
				array(
				'labels' => array(
				'name' => __('Projects', 'spicepress'),
				'add_new' => __('Add New', 'spicepress'),
                'add_new_item' => __('Add New Project','spicepress'),
				'edit_item' => __('Add New','spicepress'),
				'new_item' => __('New Link','spicepress'),
				'all_items' => __('All Projects','spicepress'),
				'view_item' => __('View Link','spicepress'),
				'search_items' => __('Search Links','spicepress'),
				'not_found' =>  __('No Links found','spicepress'),
				'not_found_in_trash' => __('No Links found in Trash','spicepress'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => 'portfolio'),
				'menu_position' => 11,
				'public' => true,
				'menu_icon' => ST_TEMPLATE_DIR_URI . '/images/portfolio.png',
			)
	);
}
add_action( 'init', 'spicepress_project_type' );
?>