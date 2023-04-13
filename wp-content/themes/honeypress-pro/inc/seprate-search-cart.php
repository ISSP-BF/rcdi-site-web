<?php
$shop_button='';
if ( class_exists( 'WooCommerce' ) ) {
	if(get_theme_mod('search_effect_style_setting','toogle')=='toogle' && get_theme_mod('search_btn_enable',true)==true)
      {
      	$shop_button .='<div class="header-module">
		                <div class="nav-search nav-light-search wrap">
	                        <div class="search-box-outer">  
								    <a href="#" class="search-icon  custom-header-preset">
								    <i class="fa fa-search"></i>
								    <span class="sub-arrow"></span></a>
								    <ul class="dropdown-menu search-panel custom-header-preset-panel">
		                             <li class="panel-outer">
		                             <div class="form-container">
		                                <form role="search" method="get" class="search-form" action="'.esc_url( home_url( '/' )).'">
		                                 <label>
		                                  <input type="search" class="search-field" placeholder="Search …" value="" name="s">
		                                 </label>
		                                 <input type="submit" class="search-submit" value="'.__('Search','honeypress').'">
		                                </form>                   
		                               </div>
		                             </li>
		                            </ul>
		                      
		                    </div>
		                </div>';
			
      }

elseif(get_theme_mod('search_effect_style_setting','popup_light')=='popup_light' && get_theme_mod('search_btn_enable',true)==true || get_theme_mod('search_effect_style_setting','popup_dark')=='popup_dark'  && get_theme_mod('search_btn_enable',true)==true)
          {

          	$shop_button .='<div class="header-module">
          	<div class="nav-search nav-light-search wrap">
                   <div class="search-box-outer">
                   <div class="dropdown">
                <a href="#searchbar_fullscreen" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
                  <i class="fa fa-search"></i>
                </a>
                        </div>
                      </div>
                    </div>';
         

}
if(get_theme_mod('cart_btn_enable',false)==true)
  {
if(get_theme_mod('search_btn_enable',true)==true)
{
$shop_button .='<div class="cart-header search-woo">';
}
else
{
  $shop_button .='<div class="header-module"><div class="cart-header ">';
}
   
      global $woocommerce; 
      $link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
      $shop_button .= '<a class="cart-icon" href="'.$link.'" >';
      
      if ($woocommerce->cart->cart_contents_count == 0){
          $shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
        }
        else
        {
          $shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
        }
           
        $shop_button .= '</a>';
        
        $shop_button .= '<a href="'.$link.'" ><span class="cart-total">
          '.sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'honeypress'), $woocommerce->cart->cart_contents_count).'</span></a>';
          $shop_button .='</div></div>';
        }
        else
        {
          $shop_button .='</div>';
        }
	}



















	//Below Condition will run whenever Woocommerce plugin is deactivated
	else
	{
		if(get_theme_mod('search_effect_style_setting','toogle')=='toogle'  && get_theme_mod('search_btn_enable',true)==true)
      {
      	$shop_button .= '<div class="header-module">
		                <div class="nav-search nav-light-search wrap">
	                        <div class="search-box-outer">
								    <a href="#" class="search-icon dropdown-toggle custom-header-preset" >
								    <i class="fa fa-search"></i>
								    <span class="sub-arrow"></span></a>
								    <ul class="dropdown-menu search-panel custom-header-preset-panel">
		                             <li class="panel-outer">
		                             <div class="form-container">
		                                <form role="search" method="get" class="search-form" action="'.esc_url( home_url( '/' )).'">
		                                 <label>
		                                  <input type="search" class="search-field" placeholder="Search …" value="" name="s">
		                                 </label>
		                                 <input type="submit" class="search-submit" value="'.__('Search','honeypress').'">
		                                </form>                   
		                               </div>
		                             </li>
		                            </ul>
		                    </div>
		                </div>
					</div>';
      }
      elseif(get_theme_mod('search_effect_style_setting','popup_light')=='popup_light' && get_theme_mod('search_btn_enable',true)==true || get_theme_mod('search_effect_style_setting','popup_dark')=='popup_dark' && get_theme_mod('search_btn_enable',true)==true)
          {
          	$shop_button .='<div class="header-module">
          	<div class="nav-search nav-light-search wrap">
                   <div class="search-box-outer">
                   <div class="dropdown">
                <a href="#searchbar_fullscreen" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
                  <i class="fa fa-search"></i>
                </a>
                        </div>
                      </div>
                    </div>
                    </div>';
          }
	}
echo $shop_button;	
?>