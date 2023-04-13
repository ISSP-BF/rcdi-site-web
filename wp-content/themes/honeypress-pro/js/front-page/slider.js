//RLT check function
if (!jQuery.bol_return) {
    jQuery.extend({
        bol_return: function (tmp_vl) {
            if (tmp_vl == 1) {
                return true;
            }
            return false;
        }
    });
}

jQuery(document).ready(function() {
	if(slider_settings.slider_nav_style=="bullets")
	{
		jQuery("#slider-carousel").owlCarousel({
				navigation : true, // Show next and prev buttons
				slideSpeed : 300,
				animateIn: slider_settings.animateIn,
				animateOut: slider_settings.animateOut,
				autoplay: slider_settings.slideAutoplay,
				smartSpeed: slider_settings.smoothSpeed,
				autoplayTimeout: slider_settings.animationSpeed,
				autoplayHoverPause:true,
				singleItem:true,
				loop:slider_settings.slideLoop, // loop is true up to 1199px screen.
				rewind:slider_settings.slideRewind,
				nav:false, // is true across all sizes
				margin:0, // margin 10px till 960 breakpoint
				autoHeight: true,
				responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
				items: 1,
				dots: true,
				navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
                                rtl: jQuery.bol_return(slider_settings.rtl)
		});
	}
	else if(slider_settings.slider_nav_style=="navigation")
	{
		jQuery("#slider-carousel").owlCarousel({
				navigation : true, // Show next and prev buttons
				slideSpeed : 300,
				animateIn: slider_settings.animateIn,
				animateOut: slider_settings.animateOut,
				autoplay: slider_settings.slideAutoplay,
				smartSpeed: slider_settings.smoothSpeed,
				autoplayTimeout: slider_settings.animationSpeed,
				autoplayHoverPause:true,
				singleItem:true,
				loop:slider_settings.slideLoop, // loop is true up to 1199px screen.
				rewind:slider_settings.slideRewind,
				nav:true, // is true across all sizes
				margin:0, // margin 10px till 960 breakpoint
				autoHeight: true,
				responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
				items: 1,
				dots: false,
				navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
                                rtl: jQuery.bol_return(slider_settings.rtl)
		});
	}
	else
	{
jQuery("#slider-carousel").owlCarousel({
				navigation : true, // Show next and prev buttons
				slideSpeed : 300,
				animateIn: slider_settings.animateIn,
				animateOut: slider_settings.animateOut,
				autoplay: slider_settings.slideAutoplay,
				smartSpeed: slider_settings.smoothSpeed,
				autoplayTimeout: slider_settings.animationSpeed,
				autoplayHoverPause:true,
				singleItem:true,
				loop:slider_settings.slideLoop, // loop is true up to 1199px screen.
				rewind:slider_settings.slideRewind,
				nav:true, // is true across all sizes
				margin:0, // margin 10px till 960 breakpoint
				autoHeight: true,
				responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
				items: 1,
				dots: true,
				navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
                                rtl: jQuery.bol_return(slider_settings.rtl)
		});
	}


		jQuery(function(){
			jQuery(".video-player").mb_YTPlayer();
		});

		jQuery('#video-play').click(function(event) {
			event.preventDefault();
			if (jQuery(this).hasClass('fa-play')) {
			jQuery('.video-player').playYTP();
			} else {
			jQuery('.video-player').pauseYTP();
			}
			jQuery(this).toggleClass('fa-play fa-pause');
			return false;
		});

		jQuery('#video-volume').click(function(event) {
			event.preventDefault();
			if (jQuery(this).hasClass('fa-volume-off')) {
			jQuery('.video-player').YTPUnmute();
			} else {
			jQuery('.video-player').YTPMute();
			}
			jQuery(this).toggleClass('fa-volume-off fa-volume-up');
			return false;
		});
});