<nav class="navbar navbar-expand-lg navbar-light navbar4 <?php if(get_theme_mod('sticky_header_clr_enable',false)==true):?>clr <?php endif;?><?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> <?php echo get_theme_mod('header_logo_placing','left');?>">
	<div class="container">
		<div class="col-lg-4 col-md-12 col-sm-12">
			<div class="header-lt">
				<?php the_custom_logo(); do_action('honeypress_sticky_header_logo');
				if ( display_header_text() ) : 
					if((get_option('blogname')!='') || (get_option('blogdescription')!='')):?>
						<div class="custom-logo-link-url"> 
						<?php if(get_option('blogname')!=''):?>
	    					<h1 class="site-title"><a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	    					</h1>
	    				<?php endif;
						$description = get_bloginfo( 'description', 'display' );
						if(get_option('blogdescription')!='')
						{
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html($description); ?></p>
						<?php endif; 
						}?>
						</div>
				<?php endif; endif;?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  		<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</div>
		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
               <div class="ml-auto">
				<?php get_template_part('inc/menu-search');?> 
			</div>
			</div>
		</div>
	</div>
</nav>