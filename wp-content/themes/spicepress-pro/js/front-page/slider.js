// HOMEPAGE SLIDER
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
    jQuery("#slider-carousel").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        animateIn: slider_settings.animation,
        autoplay: 7000,
        autoplayTimeout: slider_settings.animationSpeed,
        autoplayHoverPause: true,
        singleItem: true,
        loop: true, // loop is true up to 1199px screen.
        nav: true, // is true across all sizes
        margin: 0, // margin 10px till 960 breakpoint
        autoHeight: true,
        responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
        items: 1,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        rtl: jQuery.bol_return(slider_settings.rtl)
    });

});
