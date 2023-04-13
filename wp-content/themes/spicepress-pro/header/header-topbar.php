<?php if( is_active_sidebar('home-header-sidebar_left') || is_active_sidebar('home-header-sidebar_right')) {?>
<!--/Top Header Detail-->
<section class="header-sidebar sp-schemes">
	<div class="container<?php if(get_theme_mod('header_logo_placing','left')=='full_left') {echo '-fluid';}?>">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				
				<?php 
				if( is_active_sidebar('home-header-sidebar_left') ) 
				{
						dynamic_sidebar( 'home-header-sidebar_left' ); 
				} 
				?>
				
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
			
				<?php 
				if( is_active_sidebar('home-header-sidebar_right') ) {
				dynamic_sidebar( 'home-header-sidebar_right' );
				} 
				?>
				
			</div>	
			
		</div>	
	</div>
</section>
<!--/Top Header Detail-->
<div class="clearfix"></div>
<?php } ?>