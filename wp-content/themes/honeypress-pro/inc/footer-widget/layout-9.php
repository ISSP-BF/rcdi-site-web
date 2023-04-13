<?php
if ( ! is_user_logged_in() ) {
	if (
		! is_active_sidebar( 'footer-sidebar-1' ) &&
		! is_active_sidebar( 'footer-sidebar-2' ) &&
		! is_active_sidebar( 'footer-sidebar-3' ) &&
		! is_active_sidebar( 'footer-sidebar-4' )
	) {
		return;
	}
}


?>
<div class="row footer-sidebar">
	<div class="col-lg-4 col-md-4 col-sm-12">
		<?php honeypress_footer_widget_area('footer-sidebar-1');?>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-12">
		<?php honeypress_footer_widget_area('footer-sidebar-2');?>
	</div>
</div>
