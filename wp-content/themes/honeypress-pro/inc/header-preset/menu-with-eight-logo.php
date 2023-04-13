<?php
$arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];
 
$agent = $_SERVER['HTTP_USER_AGENT'];
 
$user_browser = '';
foreach ($arr_browsers as $browser) {
    if (strpos($agent, $browser) !== false) {
        $user_browser = $browser;
        break;
    }   
}
  
switch ($user_browser) {
    case 'MSIE':
        $user_browser = 'Internet Explorer';
        break;
  
    case 'Trident':
        $user_browser = 'Internet Explorer';
        break;
  
    case 'Edg':
        $user_browser = 'Microsoft Edge';
        break;
}?>
<nav class="navbar navbar-expand-lg navbar-dark navbar7 <?php if(get_theme_mod('sticky_header_clr_enable',false)==true):?>clr <?php endif;?><?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?> <?php if(get_theme_mod('sticky_header_animation','')=='shrink'): echo 'shrink'; endif;?> <?php echo get_theme_mod('header_logo_placing','left');?>">
		<div class="container">
			<?php if($user_browser=="Internet Explorer") { ?><div class="col-md-4"><?php } ?>
			<div class="header-rgt">
	            <?php the_custom_logo(); do_action('honeypress_sticky_header_logo');?>
				
				<?php  if ( display_header_text() ) : ?>
			<?php if((get_option('blogname')!='') || (get_option('blogdescription')!='')):?>
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
			<?php endif; }?></div>
		<?php endif; endif;?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>

            </div>
		<?php if($user_browser=="Internet Explorer") { echo '</div>';}?>
		<?php if($user_browser=="Internet Explorer") { echo '<div class="col-md-8">';}?>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<!-- Right Nav -->
				<?php get_template_part('inc/menu-search');?>
			</div>
			<?php if($user_browser=="Internet Explorer ") { echo '</div>';}?>
		</div>
	</nav>