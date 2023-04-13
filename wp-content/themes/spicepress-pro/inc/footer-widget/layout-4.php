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
<?php
	
		echo '<div class="col-lg-3 col-md-3 col-sm-12">';
		spicepress_footer_widget_area('footer_widget_area_left');
		echo '</div>';
		
		echo '<div class="col-lg-3 col-md-3 col-sm-12">';
		spicepress_footer_widget_area('footer_widget_area_center');
		echo '</div>';

		echo '<div class="col-lg-3 col-md-3 col-sm-12">';
		spicepress_footer_widget_area('footer_widget_area_right');
		echo '</div>';

		echo '<div class="col-lg-3 col-md-3 col-sm-12">';
		spicepress_footer_widget_area('footer_widget_area_end_right');
		echo '</div>';
	?>
</div>
