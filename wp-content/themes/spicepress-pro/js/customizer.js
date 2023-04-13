/**
 * Main customize js file
 *
 */

/* global initializeAllElements */
(function ($) {

    // Service Heading
    wp.customize(
            'home_service_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.service-section .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Service Description
    wp.customize(
            'home_service_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.service-section .section-header p').text(newval);
                        }
                );
            }
    );


    // Portfolio Heading
    wp.customize(
            'home_portfolio_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.portfolio-section .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Portfolio Description
    wp.customize(
            'home_portfolio_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.portfolio-section .section-header p').text(newval);
                        }
                );
            }
    );


    // Testimonial Heading
    wp.customize(
            'home_testimonial_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.testimonial-section .section-header h1').text(newval);
                        }
                );
            }
    );

    // Testimonial Description
    wp.customize(
            'home_testimonial_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.testimonial-section .section-header p').text(newval);
                        }
                );
            }
    );


    // Latest News Heading
    wp.customize(
            'home_news_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.home-news .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Latest News Description
    wp.customize(
            'home_news_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.home-news .section-header p').text(newval);
                        }
                );
            }
    );

    // Latest News button
    wp.customize(
            'home_news_button_title', function (value) {
                value.bind(
                        function (newval) {
                            //$( '.homeblog .btn-small.btn-default-dark' ).text( newval );
                            $('.home-news .more-link').text(newval);
                        }
                );
            }
    );

    // Latest News button
    wp.customize(
            'home_blog_more_btn', function (value) {
                value.bind(
                        function (newval) {
                            if (newval == '')
                            {
                                $('.view-more-posts-row').hide();
                            } else
                            {
                                $('.view-more-posts-row').show();
                            }
                            //	$( '.homeblog .post .more-link' ).text( newval );
                            $('.business-view-more-post').text(newval);
                        }
                );
            }
    );


    // Gallary Heading
    wp.customize(
            'home_gallery_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.gallery-section .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Gallary Description
    wp.customize(
            'home_gallery_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.gallery-section .section-header p').text(newval);
                        }
                );
            }
    );

    // Team Heading
    wp.customize(
            'home_team_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.homepage-team-section .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Team Description
    wp.customize(
            'home_team_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.homepage-team-section .section-header p').text(newval);
                        }
                );
            }
    );

    // Client Heading
    wp.customize(
            'home_client_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.clients-section .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Client Description
    wp.customize(
            'home_client_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.clients-section .section-header p').text(newval);
                        }
                );
            }
    );


    // Footer Callout Heading
    wp.customize(
            'home_call_out_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.callout-section .sm-callout h4').text(newval);
                        }
                );
            }
    );

    // Footer Callout Button
    wp.customize(
            'home_call_out_btn_text', function (value) {
                value.bind(
                        function (newval) {
                            $('.callout-section .sm-callout .sm-callout-btn a').text(newval);
                        }
                );
            }
    );


    // Footer Copyright Text
    wp.customize(
            'footer_copyright_text', function (value) {
                value.bind(
                        function (newval) {
                            $('.site-footer .site-info p').text(newval);
                        }
                );
            }
    );

    // Portfolio Template Heading
    wp.customize(
            'portfolio_tmp_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.page-template .padding-0 .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Portfolio Template Description
    wp.customize(
            'portfolio_tmp_desc', function (value) {
                value.bind(
                        function (newval) {
                            $('.page-template .padding-0 .section-header p').text(newval);
                        }
                );
            }
    );


    // Portfolio Category Page Template Heading
    wp.customize(
            'portfolio_cat_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.portfolio_cat_page .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Portfolio Category Page Template Description
    wp.customize(
            'portfolio_cat_desc', function (value) {
                value.bind(
                        function (newval) {
                            $('.portfolio_cat_page .section-header p').text(newval);
                        }
                );
            }
    );


    // Gallary Template Heading
    wp.customize(
            'gallery_tmp_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.page-template-template-gallery .gallery-section .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Gallary Template Description
    wp.customize(
            'gallery_tmp_desc', function (value) {
                value.bind(
                        function (newval) {
                            $('.page-template-template-gallery .gallery-section .section-header p').text(newval);
                        }
                );
            }
    );


    // Contact Form Heading
    wp.customize(
            'contact_form_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.cont-section .contact_form_heading .section-title .widget-title').text(newval);
                        }
                );
            }
    );

    // Google Map Heading
    wp.customize(
            'google_map_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.cont-section .map-section .section-title .widget-title').text(newval);
                        }
                );
            }
    );


    // Google Map Shortcode
    wp.customize(
            'contact_google_map_shortcode', function (value) {
                value.bind(
                        function (newval) {
                            $('.cont-section .map-section .cont-google-map').text(newval);
                        }
                );
            }
    );

    // Home Shop Section Title
    wp.customize(
            'home_shop_section_title', function (value) {
                value.bind(
                        function (newval) {
                            $('.woocommerce-section .section-header .widget-title').text(newval);
                        }
                );
            }
    );

    // Home Shop Section Title
    wp.customize(
            'home_shop_section_discription', function (value) {
                value.bind(
                        function (newval) {
                            $('.woocommerce-section .section-header p').text(newval);
                        }
                );
            }
    );

})(jQuery);