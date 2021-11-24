jQuery(document).ready(function ($) {
    h = $(window).height();

    $("body").scroll(function () {
        if ($("body").scrollTop() > h) {
            $("nav").removeClass("nav-hidden");
        } else {
            $("nav").addClass("nav-hidden");
        }
    });

    console.log(h);

    $(window).resize(function () {
        h = $(window).height();
    });
});
