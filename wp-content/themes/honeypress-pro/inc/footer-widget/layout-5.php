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
	<div class="col-lg-3 col-md-3 col-sm-12">
		<?php honeypress_footer_widget_area('footer-sidebar-1');?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12">
		<?php honeypress_footer_widget_area('footer-sidebar-2');?>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<?php honeypress_footer_widget_area('footer-sidebar-3');?>
	</div>	
</div>
