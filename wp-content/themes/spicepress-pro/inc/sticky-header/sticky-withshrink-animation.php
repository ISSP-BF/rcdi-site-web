<?php
if(get_theme_mod('sticky_header_device_enable','desktop')=='desktop' && get_theme_mod('sticky_header_logo',false)==true)
{
?>
<script>
jQuery(document).ready(function ( jQuery ) {
 jQuery(window).bind('scroll', function () {
      if (window.matchMedia("(max-width: 767px)").matches)  
        { 
             //console.log("This is a mobile device."); 
            jQuery('.navbar-light.custom').removeClass('shrink1');
            jQuery('.navbar-brand.custom-logo').show();
            jQuery(".navbar-brand.sticky-logo").hide();
        } else { 
            // The viewport is at least 768 pixels wide 
       if (jQuery(window).scrollTop() > 30) {
                jQuery('.header-sticky').addClass('shrink1');
                jQuery(".navbar-brand.sticky-logo").show();
                jQuery(".navbar-brand.custom-logo").hide();
            } else {
                jQuery('.header-sticky').removeClass('shrink1');
                jQuery(".navbar-brand.sticky-logo").hide();
                jQuery(".navbar-brand.custom-logo").show();
            }
        } 
        });
});
</script>
<?php 
}
elseif(get_theme_mod('sticky_header_device_enable','desktop')=='mobile' && get_theme_mod('sticky_header_logo',false)==true)
{
?>
<script>
jQuery(document).ready(function ( jQuery ) {
 jQuery(window).bind('scroll', function () {
      if (window.matchMedia("(max-width: 767px)").matches)  
        { 
        //this script call only mobile device
         if (jQuery(window).scrollTop() > 30) {
                jQuery('.header-sticky').addClass('shrink1');
                jQuery(".navbar-brand.sticky-logo-mbl").show();
                jQuery(".navbar-brand.custom-logo").hide();
            } else {
                jQuery('.header-sticky').removeClass('shrink1');
                jQuery(".navbar-brand.sticky-logo-mbl").hide();
                jQuery(".navbar-brand.custom-logo").show();
            }
        } else { 
            // This script call only for Desktop Device 
          jQuery('.navbar-light.custom').removeClass('shrink1');
          jQuery(".navbar-brand.sticky-logo-mbl").hide();
          jQuery(".navbar-brand.custom-logo").show();
        }
        });
});
</script>
<?php  
}
elseif(get_theme_mod('sticky_header_device_enable','desktop')=='both' && get_theme_mod('sticky_header_logo',false)==true)
{
?>
<script>
jQuery(document).ready(function ( jQuery ) {
 jQuery(window).bind('scroll', function () {
      if (window.matchMedia("(max-width: 767px)").matches)  
        { 
        //this script call only mobile device
         if (jQuery(window).scrollTop() > 30) {
                jQuery('.header-sticky').addClass('shrink1');
                jQuery(".navbar-brand.sticky-logo-mbl").show();
                jQuery(".navbar-brand.sticky-logo").hide();
                jQuery(".navbar-brand.custom-logo").hide();
            } 
            else
            {
              jQuery('.header-sticky').removeClass('shrink1');
                jQuery(".navbar-brand.sticky-logo-mbl").hide();
                jQuery(".navbar-brand.sticky-logo").hide();
                jQuery(".navbar-brand.custom-logo").show();
            }
        } else { 
            // This script call only for Desktop Device 
         if (jQuery(window).scrollTop() > 30) {
                jQuery('.header-sticky').addClass('shrink1');
                jQuery(".navbar-brand.sticky-logo-mbl").hide();
                jQuery(".navbar-brand.sticky-logo").show();
                jQuery(".navbar-brand.custom-logo").hide();
            } 
            else
            {
                jQuery('.header-sticky').removeClass('shrink1');
                jQuery(".navbar-brand.sticky-logo-mbl").hide();
                jQuery(".navbar-brand.sticky-logo").hide();
                jQuery(".navbar-brand.custom-logo").show();
                jQuery('.header-sticky').attr('style','');
            }
        } 
        });
});
</script>
<?php  
}
elseif(get_theme_mod('sticky_header_device_enable','desktop')=='desktop' && get_theme_mod('sticky_header_logo',false)==false)
{
 ?>
 <script type="text/javascript">
 jQuery(document).ready(function ( jQuery ) {
 jQuery(window).bind('scroll', function () {
      if (window.matchMedia("(max-width: 767px)").matches)  
        { 
             //console.log("This is a mobile device."); 
            jQuery('.navbar-light.custom').removeClass('shrink1');
           
        } else { 
            // The viewport is at least 768 pixels wide 
       if (jQuery(window).scrollTop() > 30) {
                jQuery('.header-sticky').addClass('shrink1');
            } else {
                jQuery('.header-sticky').removeClass('shrink1');
            }
        } 
        });
});  
 </script>
 <?php 
}
elseif(get_theme_mod('sticky_header_device_enable','desktop')=='mobile' && get_theme_mod('sticky_header_logo',false)==false)
{
?>
<script>
jQuery(document).ready(function ( jQuery ) {
 jQuery(window).bind('scroll', function () {
      if (window.matchMedia("(max-width: 767px)").matches)  
        { 
        //this script call only mobile device
         if (jQuery(window).scrollTop() > 30) {
                jQuery('.header-sticky').addClass('shrink1');
            } else {
                jQuery('.header-sticky').removeClass('shrink1');
            }
        } else { 
            // This script call only for Desktop Device 
          jQuery('.navbar-light.custom').removeClass('shrink1'); 
          //console.log("This is a tablet or desktop.");
        }
        });
});
</script>
<?php
}
elseif(get_theme_mod('sticky_header_device_enable','desktop')=='both' && get_theme_mod('sticky_header_logo',false)==false)
{
?>
<script>
jQuery(document).ready(function ( jQuery ) {
   jQuery(window).bind('scroll', function () {
                 if (jQuery(window).scrollTop() > 30) {
                jQuery('.header-sticky').addClass('shrink1');
            } else {
                jQuery('.header-sticky').removeClass('shrink1');
            }
        });
});
</script>
<?php } ?>