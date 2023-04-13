<nav class="navbar navbar-expand-lg navbar-light custom center <?php if(get_theme_mod('sticky_header_clr_enable',false)==true):?>clr <?php endif;?><?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> <?php echo get_theme_mod('header_logo_placing','left');?>">
	<div class="container">
		<div class="row content-center">
			<div class="col-lg-12 col-md-12 col-xs-12">
		<?php the_custom_logo(); do_action('honeypress_sticky_header_logo');?>
		</div>
		<?php  if ( display_header_text() ) : ?>
			<?php if((get_option('blogname')!='') || (get_option('blogdescription')!='')):?>
			<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="custom-logo-link-url"> 
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
			<?php endif; }?></div></div>
		<?php endif; endif;?>
	
	<div class="col-lg-12 col-md-12 col-xs-12">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<div class="auto">
		<?php get_template_part('inc/menu-search');?> 
	        </div>
		</div>
		</div>
	</div>
	</div>
</nav>