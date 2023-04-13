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
if(portfolio_settings.portfolio_nav_style=="bullets")
{
	jQuery("#portfolio-carousel").owlCarousel({
			navigation : true, // Show next and prev buttons		
			autoplay: true,
			autoplayTimeout: 1500,
			autoplayHoverPause: true,
			smartSpeed: 1300,
		
			loop:true, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:0, // margin 10px till 960 breakpoint
			autoHeight: true,
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			//items: 3,
			dots: true,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
			responsive:{
				100:{ items:1 },
				480:{ items:1 },
				768:{ items:2 },
				1000:{ items:4 }
			},
                        rtl: jQuery.bol_return(portfolio_settings.rtl)
		});
}
else if(portfolio_settings.portfolio_nav_style=="navigation")
{
	jQuery("#portfolio-carousel").owlCarousel({
			navigation : true, 		
			autoplay: true,
			autoplayTimeout: 1500,
			autoplayHoverPause: true,
			smartSpeed: 1300,
            loop:true, 
			nav:true, 
			margin:0, 
			autoHeight: true,
			responsiveClass:true, 
			dots: false,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
			responsive:{
				100:{ items:1 },
				480:{ items:1 },
				768:{ items:2 },
				1000:{ items:4 }
			},
                        rtl: jQuery.bol_return(portfolio_settings.rtl)
		});
}
else
{
jQuery("#portfolio-carousel").owlCarousel({
			navigation : true, // Show next and prev buttons		
			autoplay: true,
			autoplayTimeout: 1500,
			autoplayHoverPause: true,
			smartSpeed: 1300,
		
			loop:true, // loop is true up to 1199px screen.
			nav:true, // is true across all sizes
			margin:0, // margin 10px till 960 breakpoint
			autoHeight: true,
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			//items: 3,
			dots: true,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
			responsive:{
				100:{ items:1 },
				480:{ items:1 },
				768:{ items:2 },
				1000:{ items:4 }
			},
                        rtl: jQuery.bol_return(portfolio_settings.rtl)
		});
}


	});	