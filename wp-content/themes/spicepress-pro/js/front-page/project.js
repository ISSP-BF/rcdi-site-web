// HOMEPAGE PROJECT
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

jQuery(document).ready(function () {

    jQuery("#portfolio-carousel").owlCarousel({
        navigation: true, // Show next and prev buttons
        autoplay: 7000,
        autoplayTimeout: portfolio_settings.animationSpeed,
        autoplayHoverPause: true,

        loop: true, // loop is true up to 1199px screen.
        nav: true, // is true across all sizes
        margin: 30, // margin 10px till 960 breakpoint
        autoHeight: true,

        responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        //items: 3,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            100: {items: 1},
            480: {items: 1},
            600: {items: 2},
            768: {items: 3},
            1000: {items: 3}
        },
        rtl: jQuery.bol_return(portfolio_settings.rtl)
    });


});
