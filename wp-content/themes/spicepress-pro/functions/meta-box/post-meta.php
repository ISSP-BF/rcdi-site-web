<?php
add_action('admin_init','spicepress_init');
function spicepress_init()
	{
		add_meta_box('home_project_meta', __('Project Details','spicepress'), 'spicepress_meta_portfolio', 'spicepress_portfolio', 'normal', 'high');
		add_meta_box('spicepress_page', __('Enable slider on the page','spicepress'), 'spicepress_meta_slider', 'page', 'normal', 'high');
		add_action('save_post','spicepress_meta_save');
	}
	
function spicepress_meta_slider()
	{
		global $post ;
		$slider_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_chkbx', true ));
	
		?>
		<input type="checkbox" name="slider_chkbx" id="slider_chkbx" <?php if($slider_chkbx){echo "checked='checked'";}?> /><?php _e('Allow Slider on the page','spicepress'); ?>
		<?php
	}	
	
// code for portfolio description
	function spicepress_meta_portfolio()
	{	global $post ;
		
		$portfolio_link =esc_url( get_post_meta( get_the_ID(), 'portfolio_link', true ));
		$portfolio_target =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true ));
		$portfolio_title_description =sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_title_description', true ));
	?>	<p><h4 class="heading"><?php esc_attr_e('Link','spicepress');?></h4></p>
		<p><input style="width:600px;" name="portfolio_link" id="portfolio_link" placeholder="<?php esc_attr_e('Link','spicepress');?>" type="text" value="<?php if (!empty($portfolio_link)) echo esc_attr($portfolio_link);?>"> </p>
		<p><input type="checkbox" id="portfolio_target" name="portfolio_target" <?php if($portfolio_target) echo "checked"; ?> > <?php esc_attr_e('Open link in new tab','spicepress'); ?></p>
		<p><h4 class="heading"><?php esc_attr_e('Description','spicepress');?></h4>
		<p><textarea name="portfolio_title_description" id="portfolio_title_description" style="width: 480px; height: 56px; padding: 0px;" placeholder="<?php esc_attr_e('Description','spicepress');?>"  rows="3" cols="10" ><?php if (!empty($portfolio_title_description)) echo esc_attr($portfolio_title_description);?></textarea></p>	
<?php }
function spicepress_meta_save($post_id) 
{	 
	if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
		
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{   return ;	} 
		
	if(isset( $_POST['post_ID']))
	{ 	
		$post_ID = $_POST['post_ID'];				
		$post_type=get_post_type($post_ID);
		
		
		if($post_type=='spicepress_portfolio')
		{	
			update_post_meta($post_ID, 'portfolio_title_description', sanitize_text_field($_POST['portfolio_title_description']));
			update_post_meta($post_ID, 'portfolio_link', esc_url($_POST['portfolio_link']));	
			update_post_meta($post_ID, 'portfolio_target', sanitize_text_field($_POST['portfolio_target']));								
		}
		elseif($post_type=='page')
		{	
			update_post_meta($post_ID, 'slider_chkbx', sanitize_text_field(isset($_POST['slider_chkbx'])));
							
		}
					
	}				
}
?>