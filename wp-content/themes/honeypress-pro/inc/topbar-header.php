<?php if( is_active_sidebar('home-header-sidebar_left') || is_active_sidebar('home-header-sidebar_right')) {?>
<header class="header-sidebar <?php echo get_theme_mod('header_logo_placing','left');?>">
	<div class="container<?php if(get_theme_mod('header_logo_placing','left')=='full'):?>-fluid<?php endif;?> ">
		<div class="row">
			<div class="col-lg-9 col-md-7">
				<?php 
				if( is_active_sidebar('home-header-sidebar_left') ) 
				{
					dynamic_sidebar( 'home-header-sidebar_left' ); 
				} 
				?>
			</div>
			<div class="col-lg-3 col-md-5">
				<?php 
				if( is_active_sidebar('home-header-sidebar_right') ) {
				dynamic_sidebar( 'home-header-sidebar_right' );
				} 
				?>
			</div>
		</div>
	</div>
</header>
<?php } ?>