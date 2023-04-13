<?php
 	if(get_theme_mod('after_menu_btn_new_tabl',false)==true) 
 	{ 
 		$honeypress_target="_blank";
 	}
    else 
    { 
    	$honeypress_target="_self"; 
    }
     if(!empty(get_theme_mod('after_menu_btn_txt')) && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):?>
    <script type="text/javascript">
	jQuery(document).ready(function(){
 	jQuery("#mega-menu-honeypress-primary").append('<li class="mega-menu-item mega-search honey-btn main-header-btn 1 hw"><a target="<?php echo $honeypress_target;?>" href="<?php echo get_theme_mod('after_menu_btn_link');?>" title="Search" class="honeypress_header_btn" ><?php echo get_theme_mod('after_menu_btn_txt');?></a></li>');
	});
	</script>    	
	<?php endif;
      if(!empty(get_theme_mod('after_menu_html')) && (get_theme_mod('after_menu_multiple_option')=='html')):?> 
    <script type="text/javascript">
	jQuery(document).ready(function(){
 	jQuery("#mega-menu-honeypress-primary").append('<li class="mega-menu-item menu-html"><?php echo get_theme_mod('after_menu_html');?></li>');
	});
	</script>    	
      <?php endif;

if(get_theme_mod('header_logo_placing','left')!='seven'){
if ( class_exists( 'WooCommerce' ) ) {
	if(get_theme_mod('search_effect_style_setting','toogle')=='toogle' && get_theme_mod('search_btn_enable',true)==true)
	{
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
 	jQuery("#mega-menu-honeypress-primary").append('<li class="mega-menu-item mega-menu-item-has-children mega-menu-flyout mega-search"><a href="#" title="Search" class="mega-menu-link" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i><span class="sub-arrow"></span></a><ul class="mega-sub-menu pull-right search-panel" style="" role="group" aria-hidden="true" aria-expanded="false"><li class="mega-menu-item"><div class="form-container"><form role="search" method="get" autocomplete="off" class="search-form" action="<?php echo esc_url( home_url( '/' ));?>"><label><input type="search" class="search-field" placeholder="Search …" value="" name="s"></label><input type="submit" class="search-submit" value="<?php echo __('Search','honeypress');?>"></form></div></li></ul></li><?php
  	global $woocommerce;
  	$link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();?><li class="mega-menu-item mega-menu-item-has-children mega-menu-flyout mega-cart"><div class="cart-header "><a class="cart-icon" href="<?php echo $link;?>"><?php if ($woocommerce->cart->cart_contents_count == 0)
        { echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>'; }
        else
        {
         echo '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
        }?></a><a href="<?php echo $link;?>"><span class="cart-total"><?php echo sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'honeypress'), $woocommerce->cart->cart_contents_count);?></span></a></div></li>');
	});
	</script>
	<?php	
	}
	elseif(get_theme_mod('search_effect_style_setting','popup_light')=='popup_light' && get_theme_mod('search_btn_enable',true)==true || get_theme_mod('search_effect_style_setting','popup_dark')=='popup_dark'  && get_theme_mod('search_btn_enable',true)==true)
	{
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
 	jQuery("#mega-menu-honeypress-primary").append('<li class="mega-menu-item mega-search"><a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false"><i class="fa fa-search"></i></a></li><?php
  	global $woocommerce;
  	$link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();?><li class="mega-menu-item mega-menu-item-has-children mega-menu-flyout mega-cart"><div class="cart-header "><a class="cart-icon" href="<?php echo $link;?>"><?php if ($woocommerce->cart->cart_contents_count == 0)
        { echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>'; }
        else
        {
         echo '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
        }?></a><a href="<?php echo $link;?>"><span class="cart-total"><?php echo sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'honeypress'), $woocommerce->cart->cart_contents_count);?></span></a></div></li>');
	});
	</script>	
	<?php
	}
	}
else{
	if(get_theme_mod('search_effect_style_setting','toogle')=='toogle'  && get_theme_mod('search_btn_enable',true)==true)
	{
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
 	jQuery("#mega-menu-honeypress-primary").append('<li class="mega-menu-item mega-menu-item-has-children mega-menu-flyout mega-search"><a href="#" title="Search" class="mega-menu-link" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i><span class="sub-arrow"></span></a><ul class="mega-sub-menu pull-right search-panel" style="" role="group" aria-hidden="true" aria-expanded="false"><li class="mega-menu-item"><div class="form-container"><form role="search" method="get" autocomplete="off" class="search-form" action="<?php echo esc_url( home_url( '/' ));?>"><label><input type="search" class="search-field" placeholder="Search …" value="" name="s"></label><input type="submit" class="search-submit" value="<?php echo __('Search','honeypress');?>"></form></div></li></ul></li>');
	});
	</script>
	<?php	
	}
	elseif(get_theme_mod('search_effect_style_setting','popup_light')=='popup_light' && get_theme_mod('search_btn_enable',true)==true || get_theme_mod('search_effect_style_setting','popup_dark')=='popup_dark' && get_theme_mod('search_btn_enable',true)==true)
	{
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
 	jQuery("#mega-menu-honeypress-primary").append('<li class="mega-menu-item mega-search"><a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false"><i class="fa fa-search"></i></a></li>');
	});
	</script>
	<?php	
	}
} 
}?>