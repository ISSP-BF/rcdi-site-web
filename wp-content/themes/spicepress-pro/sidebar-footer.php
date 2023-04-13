<?php if ( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' ) ||  is_active_sidebar( 'footer-sidebar-3' )) : ?>

			<div class="col-md-4">
			<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) :  
					dynamic_sidebar( 'footer-sidebar-1' ); 
				  endif; ?>
			</div>
			
			<div class="col-md-4">		
			<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : 
						dynamic_sidebar( 'footer-sidebar-2' ); 
				   endif; ?>			
			</div>
			
			<div class="col-md-4">		
			<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : 
						dynamic_sidebar( 'footer-sidebar-3' ); 
					endif;?>		
			</div>
			
<?php endif; ?>