jQuery( document ).ready(function($) {
	// Change the width of logo
	wp.customize('honeypress_logo_length', function(control) {
		control.bind(function( controlValue ) {
			$('.custom-logo').css('max-width', '500px');
			$('.custom-logo').css('width', controlValue + 'px');
			$('.custom-logo').css('height', 'auto');
		});
	});

	// Change the border radius
	wp.customize('after_menu_btn_border', function(control) {
		control.bind(function( borderRadius ) {
		$('.honeypress_header_btn').css('border-radius', borderRadius + 'px');
			
		});
	});

	// Change the container width
	wp.customize('container_width_pattern', function(control) {
		control.bind(function( containerWidth ) {
		$('body .container.container_default').css('max-width', containerWidth + 'px');
		});
	});

	// Change Slider container width
		wp.customize('container_slider_width', function(control) {
		control.bind(function( slideWidth ) {
		$('body .container.slider-caption').css('max-width', slideWidth + 'px');
		});
	});

	// Change Service container width
	wp.customize('container_service_width', function(control) {
		control.bind(function( servicesWidth ) {
		$('body .honeypress-service-container.container').css('max-width', servicesWidth + 'px');
		});
	});

	// Change Funfact container width
	wp.customize('container_fun_fact_width', function(control) {
		control.bind(function( funWidth ) {
		$('body .honeypress-fun-container.container').css('max-width', funWidth + 'px');
		});
	});

	// Change Portfolio container width
	wp.customize('container_portfolio_width', function(control) {
		control.bind(function( portWidth ) {
		$('body .honeypress-portfolio-container.container').css('max-width', portWidth + 'px');
		});
	});

	// Change Testi container width
	wp.customize('container_testimonial_width', function(control) {
		control.bind(function( testiWidth ) {
		$('body .honeypress-tesi-container.container').css('max-width', testiWidth + 'px');
		});
	});

	//Change Homepage Newz Container width 
	wp.customize('container_home_blog_width', function(control) {
		control.bind(function( newzWidth ) {
		$('body .honeypress-newz.container').css('max-width', newzWidth + 'px');
		});
	});

	//Change Homepage Newz Container width
	wp.customize('container_cta_width', function(control) {
		control.bind(function( ctaWidth ) {
		$('body .honeypress-cta-container').css('max-width', ctaWidth + 'px');
		});
	});

	//Change Team Container width
	wp.customize('container_team_width', function(control) {
		control.bind(function( teamWidth ) {
		$('body .honeypress-team-container.container').css('max-width', teamWidth + 'px');
		});
	});

	//Change shop Container width
	wp.customize('container_shop_width', function(control) {
		control.bind(function( shopWidth ) {
		$('body .honeypress-shop-container.container').css('max-width', shopWidth + 'px');
		});
	});

	//Change client & partners Container width
	wp.customize('container_clients_width', function(control) {
		control.bind(function( clientWidth ) {
		$('body .honeypress-client-container.container').css('max-width', clientWidth + 'px');
		});
	});	

});
