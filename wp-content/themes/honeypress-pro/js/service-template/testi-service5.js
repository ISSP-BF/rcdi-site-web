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
	if(testimonial_settings.testimonial_nav_style=="bullets")
	{
		jQuery("#testimonial-carousel5").owlCarousel({
			//navigation : true, // Show next and prev buttons		
			autoplay: true,
			autoplayTimeout: testimonial_settings.animationSpeed,
			autoplayHoverPause: true,
			smartSpeed: testimonial_settings.testimonial_smooth_speed,

			loop:true, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:0, // margin 10px till 960 breakpoint
			autoHeight: true,
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			//items: 1,
			dots: true,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
			
			responsive:{ 
				100:{ items:1 },	
				480:{ items:1 },
				768:{ items:testimonial_settings.slideItem },
				1000:{ items:testimonial_settings.slideItem }				
				
			},
                        rtl: jQuery.bol_return(testimonial_settings.rtl)
		});
	}
	else if(testimonial_settings.testimonial_nav_style=="navigation")
	{
			jQuery("#testimonial-carousel5").owlCarousel({
			//navigation : true, // Show next and prev buttons		
			autoplay: true,
			autoplayTimeout: testimonial_settings.animationSpeed,
			autoplayHoverPause: true,
			smartSpeed: testimonial_settings.testimonial_smooth_speed,

			loop:true, // loop is true up to 1199px screen.
			nav:true, // is true across all sizes
			margin:0, // margin 10px till 960 breakpoint
			autoHeight: true,
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			//items: 1,
			dots: false,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
			
			responsive:{ 
				100:{ items:1 },	
				480:{ items:1 },
				768:{ items:testimonial_settings.slideItem },
				1000:{ items:testimonial_settings.slideItem }				
				
			},
                        rtl: jQuery.bol_return(testimonial_settings.rtl)
		});
	}
	else
	{
		jQuery("#testimonial-carousel5").owlCarousel({
			//navigation : true, // Show next and prev buttons		
			autoplay: true,
			autoplayTimeout: testimonial_settings.animationSpeed,
			autoplayHoverPause: true,
			smartSpeed: testimonial_settings.testimonial_smooth_speed,

			loop:true, // loop is true up to 1199px screen.
			nav:true, // is true across all sizes
			margin:0, // margin 10px till 960 breakpoint
			autoHeight: true,
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			//items: 1,
			dots: true,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
			
			responsive:{ 
				100:{ items:1 },	
				480:{ items:1 },
				768:{ items:testimonial_settings.slideItem },
				1000:{ items:testimonial_settings.slideItem }				
				
			},
                        rtl: jQuery.bol_return(testimonial_settings.rtl)
		});
	}




});