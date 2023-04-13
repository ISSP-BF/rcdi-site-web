(function ($) {

$(".search-icon").click(function(e){
            e.preventDefault();
         });

    $(document).ready(function () {
        $(".search-icon").click(function () {
            $(this).parent().toggleClass('open');
        });
    });

    $(function () {
        $('a[href="#searchbar_fullscreen"]').on("click", function (event) {
            event.preventDefault();
            $("#searchbar_fullscreen").addClass("open");
            $('#searchbar_fullscreen input[type="search"]').focus();
        });
        $("#searchbar_fullscreen, #searchbar_fullscreen button.close").on("click keyup", function (event) {
            if (
                    event.target == this ||
                    event.target.className == "close" ||
                    event.keyCode == 27
                    ) {
                $(this).removeClass("open");
            }
        });
    });
})(jQuery);