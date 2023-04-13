<div class="<?php if(get_theme_mod('sticky_header_clr_enable',false)==true):?>clr <?php endif;?><?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> <?php echo get_theme_mod('header_logo_placing','left');?>">
	<div class="header-logo index6">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-7">
					<?php the_custom_logo(); do_action('honeypress_sticky_header_logo');
					if ( display_header_text() ) : 
						if((get_option('blogname')!='') || (get_option('blogdescription')!='')):?>
							<div class="custom-logo-link-url"> 
							<?php if(get_option('blogname')!=''):?>
	    						<h1 class="site-title"><a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	    					<?php endif;
							$description = get_bloginfo( 'description', 'display' );
							if(get_option('blogdescription')!='')
								{
									if ( $description || is_customize_preview() ) : ?>
										<p class="site-description"><?php echo esc_html($description); ?></p>
							<?php endif; }?></div>
					<?php endif; endif;?>
				</div>
				<div class="col-lg-3 col-md-5">
					<?php get_template_part('inc/seprate-search-cart');?>
			    </div>
			</div>
		</div>
	</div>
	
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light navbar6">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<!-- Right Nav -->
				<?php 
				$honeypress_menu_button = '<ul class="nav navbar-nav mr-auto">%3$s';
            if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { $honeypress_menu_target="_blank";}
            else { $honeypress_menu_target="_self"; }
            if(!empty(get_theme_mod('after_menu_btn_txt')) && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
                $honeypress_menu_button .= '<li class="nav-item radix-btn menu-item"><a target='.$honeypress_menu_target.' class="honeypress_header_btn" href='.get_theme_mod('after_menu_btn_link','#').'>'.get_theme_mod('after_menu_btn_txt').'</a>';
            endif;
            if(!empty(get_theme_mod('after_menu_html')) && (get_theme_mod('after_menu_multiple_option')=='html')):
               $honeypress_menu_button .= '<li class="nav-item radix-btn menu-item radix-html">'.get_theme_mod('after_menu_html'); endif;  
            if(get_theme_mod('after_menu_multiple_option')=='top_menu_widget'):
          	ob_start();
        	$sidebar = honeypress_footer_widget_area( 'menu-widget-area' );
        	$sidebar = ob_get_contents();
      		$honeypress_menu_button .= '<li class="nav-item">'.$sidebar.'</li>';
      		ob_end_clean();
      		endif;
                        
            $honeypress_menu_button .= '</ul>';
            $menu_class='';
                $radix_multipurpose_menu_class = '';
				 wp_nav_menu( array
             (
             'theme_location'=> 'honeypress-primary',
             'container'  => '',
             'menu_class'    => 'nav navbar-nav mr-auto '.$menu_class.'',
             'items_wrap'  => $honeypress_menu_button,
             'fallback_cb'   => 'honeypress_fallback_page_menu',
             'walker'        => new honeypress_nav_walker()
             ));

				 if ( class_exists( 'Mega_Menu' ) ) {
  get_template_part('inc/mega-menu');
}
             ?>
			</div>
			
		</div>
	</nav>
</div>