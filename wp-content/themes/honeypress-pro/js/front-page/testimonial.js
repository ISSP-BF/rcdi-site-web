$("#testimonial-carousel").owlCarousel({
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
				768:{ items:1 },
				1000:{ items:1 }				
				
			}
		});