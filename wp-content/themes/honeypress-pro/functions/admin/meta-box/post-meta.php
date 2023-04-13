<?php
// define portfolio custom post type metabox
add_action('admin_init','honeypress_plus_init');
function honeypress_plus_init()
	{
		add_meta_box('home_project_meta', __('Project Details','honeypress'), 'honeypress_meta_portfolio', 'honeypress_portfolio', 'normal', 'high');
		
		add_action('save_post','honeypress_plus_meta_save');
	}	
	
// code for portfolio description
	function honeypress_meta_portfolio()
	{	global $post ;
		
		$portfolio_link =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_link', true ));
		$portfolio_target =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true ));
		$portfolio_title_description =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_title_description', true ));
	?>	<p><h4 class="heading"><?php esc_attr_e('Link','honeypress');?></h4></p>
		<p><input style="width:600px;" name="portfolio_link" id="portfolio_link" placeholder="<?php esc_attr_e('Link','honeypress');?>" type="text" value="<?php if (!empty($portfolio_link)) echo esc_attr($portfolio_link);?>"> </p>
		<p><input type="checkbox" id="portfolio_target" name="portfolio_target" <?php if($portfolio_target) echo "checked"; ?> > <?php esc_attr_e('Open link in new tab','honeypress'); ?></p>
		<p style="display: none;"><h4 class="heading"><?php //esc_attr_e('Description','honeypress');?></h4>
		<p style="display: none;"><textarea name="portfolio_title_description" id="portfolio_title_description" style="width: 480px; height: 56px; padding: 0px;" placeholder="<?php esc_attr_e('Description','honeypress');?>"  rows="3" cols="10" ><?php if (!empty($portfolio_title_description)) echo esc_attr($portfolio_title_description);?></textarea></p>	
<?php }
function honeypress_plus_meta_save($post_id) 
{	 
	if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
		
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{   return ;	} 
		
	if(isset( $_POST['post_ID']))
	{ 	
		$post_ID = $_POST['post_ID'];				
		$post_type=get_post_type($post_ID);
		
		if($post_type=='honeypress_portfolio')
		{	
			update_post_meta($post_ID, 'portfolio_title_description', sanitize_text_field($_POST['portfolio_title_description']));
			update_post_meta($post_ID, 'portfolio_link', sanitize_text_field($_POST['portfolio_link']));	
			update_post_meta($post_ID, 'portfolio_target', sanitize_text_field($_POST['portfolio_target']));								
		}			
	}				
}
?>