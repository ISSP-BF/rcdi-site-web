jQuery(document).ready(function() {

	/* Tabs in welcome page */
		function honeypress_welcome_page_tabs(event) {
			jQuery(event).parent().addClass("active");
		   jQuery(event).parent().siblings().removeClass("active");
		   var tab = jQuery(event).attr("href");
		   jQuery(".honeypress-tab-pane").not(tab).css("display", "none");
		   jQuery(tab).fadeIn();
		}
    
        jQuery(".honeypress-nav-tabs li").slice(0,1).addClass("active");

	    jQuery(".honeypress-nav-tabs a").click(function(event) {
		   event.preventDefault();
			honeypress_welcome_page_tabs(this);
	    });
	   

		jQuery(".hp-pro-custom-class").click(function(event){
       event.preventDefault();
       jQuery('.honeypress-nav-tabs li a[href="#one_click_demo"]').click();
    });
});