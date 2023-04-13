<?php
/************* Home portfolio custom post type ************************/		
function honeypress_project_type()
		{	register_post_type( 'honeypress_portfolio',
				array(
				'labels' => array(
				'name' => __('Projects', 'honeypress'),
				'add_new' => __('Add New', 'honeypress'),
                'add_new_item' => __('Add New Project','honeypress'),
				'edit_item' => __('Add New','honeypress'),
				'new_item' => __('New Link','honeypress'),
				'all_items' => __('All Projects','honeypress'),
				'view_item' => __('View Link','honeypress'),
				'search_items' => __('Search Links','honeypress'),
				'not_found' =>  __('No Links found','honeypress'),
				'not_found_in_trash' => __('No Links found in Trash','honeypress'), 
				
			),
				'supports' => array('title','thumbnail'),
				'show_in_nav_menus' => false,
				'public' => true,
				'rewrite' => array('slug' => 'honeypress_portfolio'),
				'menu_position' => 11,
				'public' => true,
				'menu_icon' => HONEYPRESS_PRO_TEMPLATE_DIR_URI . '/assets/images/portfolio.png',
			)
	);
}
add_action( 'init', 'honeypress_project_type' );
?>