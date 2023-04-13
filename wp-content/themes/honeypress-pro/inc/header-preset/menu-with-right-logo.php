<nav class="navbar navbar-expand-lg navbar-light custom <?php if(get_theme_mod('sticky_header_clr_enable',false)==true):?>clr <?php endif;?><?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> <?php echo get_theme_mod('header_logo_placing','left');?>">
	<div class="container">
		<div class="header-rgt">
		<?php the_custom_logo(); do_action('honeypress_sticky_header_logo');?>
		<?php  if ( display_header_text() ) : ?>
			<?php if((get_option('blogname')!='') || (get_option('blogdescription')!='')):?>
			<div class="custom-logo-link-url <?php if(!has_custom_logo()):?>no-logo<?php endif;?>"> 
				<?php
				 if(get_option('blogname')!=''):?>
	    	<h1 class="site-title"><a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	    	</h1>
	    <?php endif;?>
	    	<?php
			$description = get_bloginfo( 'description', 'display' );
			if(get_option('blogdescription')!='')
			{
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html($description); ?></p>
			<?php endif; }?></div>
		<?php endif; endif;?>
	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<div class="mr-auto">
		<?php get_template_part('inc/menu-search');?> 
	        </div>
		</div>
		</div>
	</div>
</nav>