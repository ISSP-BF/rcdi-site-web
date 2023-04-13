jQuery.noConflict($);
/* Ajax functions */
jQuery(document).ready(function($) {
    var btn_class=$('#loadMore').attr('class').split("=");
    if((btn_class[1]=='template-blog-masonry-two-column.php') || (btn_class[1]=='template-blog-masonry-three-column.php') || (btn_class[1]=='template-blog-masonry-four-column.php')) 
    {
    $('#ajax-content').masonry({
    itemSelector: '.grid-item',
    percentPosition: true
    }).masonry( 'reloadItems' ); 
    }
    //Triggered when post navigation setting will be Infinite Scroll 
    if(btn_class[0]=='infinite')
    {
    $('#loadMore').hide();
     //find scroll position
    $(window).scroll(function() {
        //init
        var that = $('#loadMore');
        var page = $('#loadMore').data('page');
        var newPage = page + 1;
        var ajaxurl = $('#loadMore').data('url');
        var ajaxPage_template = btn_class[1];
        //check
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
 
            //ajax call
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    ajaxPage_template: ajaxPage_template,
                    page: page,
                    action: 'ajax_script_load_more'
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    //check
                    if (response == 0) {
                        //check
                        if ($("#no-more").length == 0) {
                            $('#ajax-content2').append('<div id="no-more" class="col-md-12 blog-not-found text-center"><h3>You reached the end of the line!</h3><p>No more posts to load.</p></div>');
                        }
                        $('#loadMore').hide();
                    } else {
                        $('#loadMore').data('page', newPage);
                        if((btn_class[1]=='template-blog-masonry-two-column.php') || (btn_class[1]=='template-blog-masonry-three-column.php') || (btn_class[1]=='template-blog-masonry-four-column.php'))
                    {
                     $('#ajax-content').append(response).masonry( 'reloadItems' );
                     if($('.post_format_slider').hasClass('post-gallery-format')) 
                            {
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
                      }
                      $('#ajax-content').imagesLoaded().progress( function() {
                      $('#ajax-content').masonry('layout');
                    });   

                    }
                        else
                        {
                          $('#ajax-content').append(response);
                          if($('.post_format_slider').hasClass('post-gallery-format')) 
                            {
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
                      }  
                        }
                        
                     
                    }
                }
            });
        }
    });
    }
    else
    {  

    //Triggered when post navigation setting will be Load More Button
    $("#loadMore").on('click', function(e) {
        //init
        event.preventDefault();
        $("#loadMore").hide();
        var that = $(this);
        var page = $(this).data('page');
        var newPage = page + 1;
        var ajaxurl = that.data('url');
        var ajaxPage_template = btn_class[1];
        //ajax call
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                ajaxPage_template: ajaxPage_template,
                page: page,
                action: 'ajax_script_load_more'

            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                //check
                if (response == 0) {
                    $('#ajax-content2').append('<div class="col-md-12 blog-not-found text-center"><h3>You reached the end of the line!</h3><p>No more posts to load.</p></div>');
                    $('#loadMore').hide();
                } else {
                    that.data('page', newPage);
                    if((btn_class[1]=='template-blog-masonry-two-column.php') || (btn_class[1]=='template-blog-masonry-three-column.php') || (btn_class[1]=='template-blog-masonry-four-column.php'))
                    {
                     $('#ajax-content').append(response).masonry( 'reloadItems' );
                     if($('.post_format_slider').hasClass('post-gallery-format')) 
                      {
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
                      }
                      $('#ajax-content').imagesLoaded().progress( function() {
                      $('#ajax-content').masonry('layout');
                    });   
                    }
                    else
                    {
                       
                      $('#ajax-content').append(response);  
                     if($('.post_format_slider').hasClass('post-gallery-format')) 
                      {
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
                      }
                      
                    }
                    $("#loadMore").show();
                }
            }
        });
    });
}
});