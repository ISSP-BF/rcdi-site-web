(function($) {
    $( function() {
       wp.customize('after_menu_multiple_option', function(control) {
		control.bind(function( after_menu ) {
			if(after_menu=='menu_btn')
			{
			$("#customize-control-after_menu_btn_txt").show();
    		$("#customize-control-after_menu_btn_link").show();
    		$("#customize-control-after_menu_btn_new_tabl").show();
    		$("#customize-control-after_menu_btn_border").show();
    		$("#customize-control-after_menu_html").hide();
    		$("#customize-control-after_menu_widget_area_section").hide();
			}
			else if(after_menu=='html')
			{
			$("#customize-control-after_menu_btn_txt").hide();
    		$("#customize-control-after_menu_btn_link").hide();
    		$("#customize-control-after_menu_btn_new_tabl").hide();
    		$("#customize-control-after_menu_btn_border").hide();
    		$("#customize-control-after_menu_widget_area_section").hide();
    		$("#customize-control-after_menu_html").show();	
			}
			else if(after_menu=='top_menu_widget')
			{
			$("#customize-control-after_menu_btn_txt").hide();
    		$("#customize-control-after_menu_btn_link").hide();
    		$("#customize-control-after_menu_btn_new_tabl").hide();
    		$("#customize-control-after_menu_btn_border").hide();
    		$("#customize-control-after_menu_html").hide();	
    		$("#customize-control-after_menu_widget_area_section").show();
			}
            else
            {
            $("#customize-control-after_menu_btn_txt").hide();
            $("#customize-control-after_menu_btn_link").hide();
            $("#customize-control-after_menu_btn_new_tabl").hide();
            $("#customize-control-after_menu_btn_border").hide();
            $("#customize-control-after_menu_html").hide(); 
            $("#customize-control-after_menu_widget_area_section").hide();
            }
		});
	});
        //Js for Home page Slide Variation
        wp.customize('slide_variation', function(control) {
        control.bind(function( slider_variation ) {
            if(slider_variation=='slide')
            {
            $("#customize-control-slide_video_upload").hide();
            $("#customize-control-slide_video_url").hide();
            }
            else
            {
            $("#customize-control-slide_video_upload").show();
            $("#customize-control-slide_video_url").show();
            }
            });
    });
    });
})(jQuery)