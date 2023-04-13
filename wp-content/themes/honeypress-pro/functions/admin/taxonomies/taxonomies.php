<?php
//register portfolio custom post type taxonomy
function honeypress_portfolio_taxonomy() {
	
	$project_prefix = get_theme_mod('project_prefix',__('Project categories','honeypress'));
	$project_category = get_theme_mod('project_category','project_category');
	
	register_taxonomy('portfolio_categories', 'honeypress_portfolio',
    array(  'hierarchical' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array('slug' => $project_category ),
            'label' => $project_prefix,
            'query_var' => true));
	if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
		wp_update_term($_POST['tax_ID'], 'honeypress_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug']
		));
	} 
	else 
	{
	$myterms = get_terms( 'portfolio_categories',array('hide_empty'=>false) );
		if(empty($myterms)){
			$defaultterm=wp_insert_term('Show All','portfolio_categories', array('description'=> 'Default Category','slug' => 'show-all'));
			update_option('honeypress_default_term_id', $defaultterm['term_id']);
		}
	}
	//update category
	if(isset($_POST['action']) && isset($_POST['taxonomy']) )
	{	wp_update_term($_POST['tag_ID'], 'portfolio_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug'],
		  'description' =>$_POST['description']
		));
	}
	// Delete default category
	if(isset($_POST['action']) && isset($_POST['tag_ID']) )
	{	if(($_POST['tag_ID'] == $defualt_tex_id) &&$_POST['action']	 =="delete-tag")
		{	
			delete_option('custom_texo_honeypress'); 
		} 
	}	
	
}
add_action( 'init', 'honeypress_portfolio_taxonomy' );
?>