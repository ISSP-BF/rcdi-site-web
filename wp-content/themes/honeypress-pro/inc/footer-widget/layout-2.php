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
<?php
	for($i=1; $i<=2; $i++)
	{
		echo '<div class="col-lg-6 col-md-6 col-sm-12">';
		honeypress_footer_widget_area('footer-sidebar-'.$i);
		echo '</div>';
	}
	?>
</div>
