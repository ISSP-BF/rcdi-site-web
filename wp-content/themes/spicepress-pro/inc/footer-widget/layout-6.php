<?php
/**
 * 
 * @package Spicepress PRO
 * @since   Spicepress PRO 3.0
 */

/**
 * Hide advanced footer markup if:
 *
 * - User is not logged in. [AND]
 * - All widgets are not active.
 */
if ( ! is_user_logged_in() ) {
	if (
		! is_active_sidebar( 'footer_widget_area_left' ) &&
		! is_active_sidebar( 'footer_widget_area_center' ) &&
		! is_active_sidebar( 'footer_widget_area_right' ) &&
		! is_active_sidebar( 'footer_widget_area_end_right' )
	) {
		return;
	}
}


?>
<div class="row footer-sidebar">
	<div class="col-lg-3 col-md-3 col-sm-12">
		<?php spicepress_footer_widget_area('footer_widget_area_left');?>
	</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
		<?php spicepress_footer_widget_area('footer_widget_area_center');?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12">
		<?php spicepress_footer_widget_area('footer_widget_area_right');?>
	</div>
	
</div>
