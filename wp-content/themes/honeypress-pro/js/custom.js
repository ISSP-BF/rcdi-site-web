// OWL SLIDER CUSTOM JS
( function ($) {
		

         $(document).ready(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1500);
    });



  /* Preloader */
  $(window).on('load', function() {
    var preloaderFadeOutTime = 500;
    function hidePreloader() {
      var preloader = $('.hp-loader');
      setTimeout(function() {
        preloader.fadeOut(preloaderFadeOutTime);
      }, 500);
    }
    hidePreloader();
  }); 
  
         $(".search-icon").click(function(e){
         	e.preventDefault();
         });

        function buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height($(window).height());
                } else {
                    homeSection.height($(window).height() * 0.85);
                }
            }
        }

        $('.custom-header-preset').click(function(e){
        	e.preventDefault();
        	 $(".custom-header-preset-panel").toggle();
        });
		
		
		/* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });

        $('a[href="#totop"]').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            return false;
        });
		
		
		// Tooltip Js
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});
	
		// Accodian Js
		function toggleIcon(e) {
			$(e.target)
			.prev('.panel-heading')
			.find(".more-less")
			.toggleClass('fa-plus-square-o fa-minus-square-o');
		}
		$('.panel-group').on('hidden.bs.collapse', toggleIcon);
		$('.panel-group').on('shown.bs.collapse', toggleIcon);
		
			$("#blog-masonry").mpmansory(
				{
					childrenClass: 'item', // default is a div
					columnClasses: 'padding', //add classes to items
					breakpoints:{					
						xl: 6,   //Change masonry column here like 2, 3, 4 column
						lg: 6,
						md: 6,
						sm: 12,
						xs: 12
						
						
					},
					distributeBy: { order: false, height: false, attr: 'data-order', attrOrder: 'asc' }, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
					onload: function (items) {
						//make somthing with items
					} 
				}
			);
			$("#blog-masonry2").mpmansory(
				{
					childrenClass: 'item', // default is a div
					columnClasses: 'padding', //add classes to items
					breakpoints:{					
					xl: 4,   //Change masonry column here like 2, 3, 4 column
					lg: 4,
					md: 6,
					sm: 12,
					xs: 12
						
						
					},
					distributeBy: { order: false, height: false, attr: 'data-order', attrOrder: 'asc' }, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
					onload: function (items) {
						//make somthing with items
					} 
				}
			);
			$("#blog-masonry3").mpmansory(
				{
					childrenClass: 'item', // default is a div
					columnClasses: 'padding', //add classes to items
					breakpoints:{					
					xl: 3,   //Change masonry column here like 2, 3, 4 column
					lg: 4,
					md: 6,
					sm: 12,
					xs: 12				
						
					},
					distributeBy: { order: false, height: false, attr: 'data-order', attrOrder: 'asc' }, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
					onload: function (items) {
						//make somthing with items
					} 
				}
			);
				
				
		$("#related-posts-carousel").owlCarousel({
			navigation : true, // Show next and prev buttons		
			autoplay: true,
			autoplayTimeout: 1500,
			autoplayHoverPause: true,
			smartSpeed: 1300,
		
			loop:true, // loop is true up to 1199px screen.
			nav:true, // is true across all sizes
			margin:30, // margin 10px till 960 breakpoint
			autoHeight: true,
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			//items: 3,
			dots: false,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
			responsive:{ 	
				480:{ items:1 },
				768:{ items:2 },
				1000:{ items:2 }			
			}
		});
		$(".post-gallery-format").owlCarousel({
			navigation : true, // Show next and prev buttons	
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			smartSpeed: 800,			
			singleItem:true,
			loop:true, // loop is true up to 1199px screen.
			nav:true, // is true across all sizes
			margin:0, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			items: 1,
			dots: false,
			navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"]
		});
				
	// Fullscreen Serach Box    
    $(function() {      
      $('a[href="#searchbar_fullscreen"]').on("click", function(event) {    
    
        event.preventDefault();
        $("#searchbar_fullscreen").addClass("open");
        $('#searchbar_fullscreen > form > input[type="search"]').focus();
      });

      $("#searchbar_fullscreen, #searchbar_fullscreen button.close").on("click keyup", function(event) {
        if (
          event.target == this ||
          event.target.className == "close" ||
          event.keyCode == 27
        ) {
          $(this).removeClass("open");
        }
      });

    });

     $('.grid').masonry({
             itemSelector: '.grid-item',
             transitionDuration: '0.2s',
             // horizontalOrder: true,
             });
		 
}) ( jQuery);