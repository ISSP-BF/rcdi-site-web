<?php 
   $shop_button = '<ul class="nav navbar-nav mr-auto">%3$s';
   //Hence This condition only work when woocommerce plugin will be activate
   if ( class_exists( 'WooCommerce' ) ) {
    if(get_theme_mod('header_logo_placing','left')=='six')
    {
       if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { $honeypress_target="_blank";}
      else { $honeypress_target="_self"; }
      if(!empty(get_theme_mod('after_menu_btn_txt')) && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
        $shop_button .= '<li class="nav-item menu-item honey-btn main-header-btn 1 hw"><a target='.$honeypress_target.' class="honeypress_header_btn" href='.get_theme_mod('after_menu_btn_link','#').'>'.get_theme_mod('after_menu_btn_txt').'</a>';
      endif;
      if(!empty(get_theme_mod('after_menu_html')) && (get_theme_mod('after_menu_multiple_option')=='html')):
        $shop_button .= '<li class="nav-item menu-html menu-item 1">'.get_theme_mod('after_menu_html'); 
      endif;
      if(get_theme_mod('after_menu_multiple_option')=='top_menu_widget'):
          ob_start();
        $sidebar = honeypress_footer_widget_area( 'menu-widget-area' );
        $sidebar = ob_get_contents();
      $shop_button .= '<li class="nav-item">'.$sidebar.'</li>';
      ob_end_clean();
      endif;
      $shop_button .= '</ul> <div class="header-module">';
    }
    else
    {
      if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { $honeypress_target="_blank";}
      else { $honeypress_target="_self"; }
      if(!empty(get_theme_mod('after_menu_btn_txt')) && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
        $shop_button .= '<li class="nav-item menu-item main-header-btn 2"><a target='.$honeypress_target.' class="honeypress_header_btn" href='.get_theme_mod('after_menu_btn_link','#').'>'.get_theme_mod('after_menu_btn_txt').'</a>';
      endif;
      if(!empty(get_theme_mod('after_menu_html')) && (get_theme_mod('after_menu_multiple_option')=='html')):
        $shop_button .= '<li class="nav-item html menu-item 2">'.get_theme_mod('after_menu_html'); 
      endif;
       if(get_theme_mod('after_menu_multiple_option')=='top_menu_widget'):
        //$shop_button .= '<li class="nav-item html menu-item">'.honeypress_footer_widget_area('menu-widget-area'); 
          ob_start();
        $sidebar = honeypress_footer_widget_area( 'menu-widget-area' );
        $sidebar = ob_get_contents();
      $shop_button .= '<li class="nav-item">'.$sidebar.'</li>';
      ob_end_clean();
      endif;
      $shop_button .= '<li class="nav-item"> <div class="header-module">';
    }
   
   if(get_theme_mod('search_effect_style_setting','toogle')=='toogle' && get_theme_mod('search_btn_enable',true)==true)
      {
        if(get_theme_mod('header_logo_placing','left')=='six')
    {
       $shop_button .='<div class="nav-search nav-light-search wrap">
                       <div class="search-box-outer dropdown">
                       <div class="dropdown">
                      <a href="#" title="Search" class="search-icon dropdown-toggle" data-toggle="dropdown">
                   <i class="fa fa-search"></i></a>
                 <ul class="dropdown-menu pull-right search-panel" role="menu" aria-hidden="true" aria-expanded="false">
                  <li class="dropdown-item panel-outer">
                             <div class="form-container">
                                <form role="search" method="get" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' )).'">
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
    else
    {
      $shop_button .='<div class="nav-search nav-light-search wrap">
                        <div class="search-box-outer">
                       <div class="dropdown">
                      <a href="#" title="Search" class="nav-link search-icon condition has-submenu" aria-haspopup="true" aria-expanded="false">
                   <i class="fa fa-search"></i>
                 <span class="sub-arrow"></span></a>
                  <ul class="dropdown-menu pull-right search-panel"  role="group" aria-hidden="true" aria-expanded="false" >
                             <li class="panel-outer">
                             <div class="form-container">
                                <form role="search" method="get" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' )).'">
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

       
          } 
   elseif(get_theme_mod('search_effect_style_setting','popup_light')=='popup_light' && get_theme_mod('search_btn_enable',true)==true || get_theme_mod('search_effect_style_setting','popup_dark')=='popup_dark'  && get_theme_mod('search_btn_enable',true)==true)
          {
            $shop_button .=' <div class="nav-search nav-light-search wrap">
                   <div class="search-box-outer">
                   <div class="dropdown">
                <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
                  <i class="fa fa-search"></i>
                </a>
                        </div>
                      </div>
                    </div>';
          } 

     //This will work if cart icon setting is enable     
    if(get_theme_mod('cart_btn_enable',false)==true){
      if(get_theme_mod('search_btn_enable',true)==true)
      {
        $search_woo='search-woo';
      }
      else
      {
        $search_woo;
      }
    $shop_button .='<div class="cart-header '.$search_woo.'">';
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
          }
    }

    //Else condition will run if woocommerce plugin is deactived
    else
    {
      if(get_theme_mod('header_logo_placing','left')=='six')
      {
        $hw='hw';
        $html='menu-html';
      }
      else
      {
        $hw='';
        $html='html';
      }
      if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { $honeypress_target="_blank";}
      else { $honeypress_target="_self"; }
      if(!empty(get_theme_mod('after_menu_btn_txt')) && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
        $shop_button .= '<li class="nav-item menu-item main-header-btn '.$hw.' 3"><a target='.$honeypress_target.' class="honeypress_header_btn" href='.get_theme_mod('after_menu_btn_link','#').'>'.get_theme_mod('after_menu_btn_txt').'</a>';
      endif;
      if(!empty(get_theme_mod('after_menu_html')) && (get_theme_mod('after_menu_multiple_option')=='html')):
        $shop_button .= '<li class="nav-item '.$html.'  menu-item 3">'.get_theme_mod('after_menu_html'); 
      endif;
       if(get_theme_mod('after_menu_multiple_option')=='top_menu_widget'):
        //$shop_button .= '<li class="nav-item html menu-item">'.honeypress_footer_widget_area('menu-widget-area'); 
          ob_start();
        $sidebar = honeypress_footer_widget_area( 'menu-widget-area' );
        $sidebar = ob_get_contents();
      $shop_button .= '<li class="nav-item">'.$sidebar.'</li>';
      ob_end_clean();
      endif;

      if(get_theme_mod('search_effect_style_setting','toogle')=='toogle'  && get_theme_mod('search_btn_enable',true)==true)
      {
   
    if(get_theme_mod('header_logo_placing','left')=='six')
    {
      $shop_button .= '</ul> <div class="header-module">';
      $shop_button .= '<div class="nav-search nav-light-search wrap">
                           <div class="search-box-outer dropdown">
                            <div class="dropdown">
                <a href="#" title="Search" class="search-icon dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-search"></i></a>
              <ul class="dropdown-menu pull-right search-panel" role="menu" aria-hidden="true" aria-expanded="false">
                           <li class="dropdown-item panel-outer">
                             <div class="form-container">
                                <form role="search" method="get" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' )).'">
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
                   </div>
        
      </div>';
    }
    else
    {
      $shop_button .= '<li class="nav-item"> <div class="header-module">';
      $shop_button .= '<div class="nav-search nav-light-search wrap">
                           <div class="search-box-outer">
                            <div class="dropdown">
                  <a href="#" title="Search" class="nav-link search-icon condition has-submenu" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-search"></i>
             <span class="sub-arrow"></span></a>
              <ul class="dropdown-menu pull-right search-panel"  role="group" aria-hidden="true" aria-expanded="false">
                             <li class="panel-outer">
                             <div class="form-container">
                                <form role="search" method="get" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' )).'">
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
                   </div>
        
      </div>';
    }
         
    }
    elseif(get_theme_mod('search_effect_style_setting','popup_light')=='popup_light' && get_theme_mod('search_btn_enable',true)==true || get_theme_mod('search_effect_style_setting','popup_dark')=='popup_dark' && get_theme_mod('search_btn_enable',true)==true)
          {
            if(get_theme_mod('header_logo_placing','left')=='six')
    {
      $shop_button .= '</ul> <div class="header-module">';
    }
    else
    {
      $shop_button .= '<li class="nav-item"> <div class="header-module">';
    }
              $shop_button .= '   <div class="nav-search nav-light-search wrap">
                   <div class="search-box-outer">
                   <div class="dropdown">
                <a href="#searchbar_fullscreen" title="Search" class="nav-link search-iconaria-haspopup=" true"="" aria-expanded="false">
                  <i class="fa fa-search"></i>
                </a>
                        </div>
                      </div>
                    </div>
      </div>';
          }
    }
   $shop_button .= '</ul>';
   
   $menu_class='';
   if(get_theme_mod('header_logo_placing','left')=='six')
   {
            wp_nav_menu( array
             (
             'theme_location'=> 'honeypress-primary', 
             'container'  => '',
             'menu_class'    => 'nav navbar-nav mr-auto '.$menu_class.'',
           'items_wrap'  => $shop_button,
             'fallback_cb'   => 'honeypress_fallback_page_menu',
             'walker'        => new honeypress_nav_walker()
             ));     

     
   }
   elseif(get_theme_mod('header_logo_placing','left')=='seven')
   {
            wp_nav_menu( array
             (
             'theme_location'=> 'honeypress-primary', 
             'container'  => '',
             'menu_class'    => 'nav navbar-nav mr-auto '.$menu_class.'',
             'fallback_cb'   => 'honeypress_fallback_page_menu',
             'walker'        => new honeypress_nav_walker()
             ));     

     
   }
   else
   {
    wp_nav_menu( array
             (
             'theme_location'=> 'honeypress-primary', 
             'menu_class'    => 'nav navbar-nav mr-auto '.$menu_class.'',
            'items_wrap'  => $shop_button,
             'fallback_cb'   => 'honeypress_fallback_page_menu',
             'walker'        => new honeypress_nav_walker()
             ));

   }
            
         ?>
<?php 
if ( class_exists( 'Mega_Menu' ) ) {
  get_template_part('inc/mega-menu');
} ?>