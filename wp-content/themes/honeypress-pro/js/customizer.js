/**
 * Main customize js file
 *
 */

/* global initializeAllElements */
( function( $ ) {

	//Slider title
	wp.customize(
		'home_slider_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.caption-content .title' ).text( newval );
				}
			);
		}
	);
	
	//Slider description
	wp.customize(
		'home_slider_discription', function( value ) {
			value.bind(
				function( newval ) {
					$( '.caption-content .subtitle' ).text( newval );
				}
			);
		}
	);
	
	//Slider button
	wp.customize(
		'home_slider_btn_txt', function( value ) {
			value.bind(
				function( newval ) {
					$( '.main-slider .btn-small' ).text( newval );
				}
			);
		}
	);
	
	
	// Service Heading
	wp.customize(
		'home_service_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.services .section-subtitle' ).text( newval );
				}
			);
		}
	);

	// Service Description
	wp.customize(
		'home_service_section_discription', function( value ) {
			value.bind(
				function( newval ) {
					$( '.services .section-header .section-title' ).text( newval );
				}
			);
		}
	);

	// project or portfolio Heading
	wp.customize(
		'home_portfolio_section_title', function( value ) {
			value.bind(
				function( newval ) {
					if(newval=='')
					{
						$('.home_project_title').hide();
					}
					else
					{
						$('.home_project_title').show();
					}
				$( '.portfolio .section-subtitle' ).text( newval );
				}
			);
		}
	);

	// project or portfolio Description
	wp.customize(
		'home_portfolio_section_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					if(newval=='')
					{
						$('.home_project_subtitle').hide();
					}
					else
					{
						$('.home_project_subtitle').show();
					}
					$( '.portfolio .section-title' ).text( newval );
				}
			);
		}
	);
	
	// Portfolio Heading
	wp.customize(
		'home_call_out_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.call-to-action-one h4' ).text( newval );
				}
			);
		}
	);

	
	// Pricing Heading
	wp.customize(
		'home_call_out_desc', function( value ) {
			value.bind(
				function( newval ) {
					$( '.call-to-action-one p' ).text( newval );
				}
			);
		}
	);

	// Pricing Description
	wp.customize(
		'home_call_out_btn_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.call-to-action-one .btn-small' ).text( newval );
				}
			);
		}
	);
	
	
	// Testimonial Heading
	wp.customize(
		'home_testimonial_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.testimonial-wrapper .section-subtitle' ).text( newval );
				}
			);
		}
	);

	// Testimonial Description
	wp.customize(
		'home_testimonial_section_discription', function( value ) {
			value.bind(
				function( newval ) {
					$( '.testimonial-wrapper .section-title' ).text( newval );
				}
			);
		}
	);
	
	
	// Feature Title
	wp.customize(
		'home_feature_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.features .features-content h1' ).text( newval );
				}
			);
		}
	);
	
	
	// Team Heading
	wp.customize(
		'home_team_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-members .section-subtitle' ).text( newval );
				}
			);
		}
	);

	// Team Description
	wp.customize(
		'home_team_section_discription', function( value ) {
			value.bind(
				function( newval ) {
					$( '.team-members .section-title' ).text( newval );
				}
			);
		}
	);
	
	
	
	 // Footer Copyright Text
	wp.customize(
		'footer_copyright_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.site-footer .site-info p' ).text( newval );
				}
			);
		}
	);
	
	// Home Shop Section Title
	wp.customize(
		'home_shop_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.shop .section-subtitle' ).text( newval );
				}
			);
		}
	);
	
	// Home Shop Section Title
	wp.customize(
		'home_shop_section_discription', function( value ) {
			value.bind(
				function( newval ) {
					$( '.shop .section-title' ).text( newval );
				}
			);
		}
	);
	
	
	// Latest News Heading
	wp.customize(
		'home_news_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-blog .section-header p' ).text( newval );
				}
			);
		}
	);

	// Latest News Description
	wp.customize(
		'home_news_section_discription', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-blog .section-header h1' ).text( newval );
				}
			);
		}
	);
	
	// Latest News button
	wp.customize(
		'home_news_button_title', function( value ) {
			value.bind(
				function( newval ) {
					//$( '.homeblog .btn-small.btn-default-dark' ).text( newval );
					$( '.homeblog .post .more-link' ).text( newval );
				}
			);
		}
	);

	// Latest News button
	wp.customize(
		'home_blog_more_btn', function( value ) {
			value.bind(
				function( newval ) {
					if(newval=='')
					{
						$('.index_extend_class').hide();
					}
					else
					{
						$('.index_extend_class').show();
					}
				//	$( '.homeblog .post .more-link' ).text( newval );
				$( '.business-view-more-post' ).text( newval );
				}
			);
		}
	);

	// Client & partner Heading
	wp.customize(
		'home_client_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.section-module .section-title-two' ).text( newval );
				}
			);
		}
	);

	// Client & partner Description
	wp.customize(
		'home_client_section_discription', function( value ) {
			value.bind(
				function( newval ) {
					$( '.section-module .pt-2' ).text( newval );
				}
			);
		}
	);

	// Contact Form Heading One
	wp.customize(
		'contact_form_title_one', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact .contact-form .subtitle' ).text( newval );
				}
			);
		}
	);
	
	// Contact Form Heading Two
	wp.customize(
		'contact_form_title_two', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact .contact-form .title' ).text( newval );
				}
			);
		}
	);
} )( jQuery );