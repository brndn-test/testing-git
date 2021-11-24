jQuery(window).on("load", function () {
    function loader() {
        jQuery("#loader").fadeOut("500");
    }
    setTimeout(loader, 1000);
});

jQuery(document).ready(function ($) {
    $("#menu-button").on("click", function () {
        $("body").toggleClass("menu-open");
    });

    $(".grid").masonry({
        itemSelector: ".accordion",
        gutter: 16,
        percentPosition: true,
    });

    setInterval(function () {
        $(".grid").masonry();
    }, 100);

    $(".accordion > a").addClass("active");

    $(".accordion > a").on("click", function () {
        event.preventDefault();
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).siblings(".accordion-content").slideUp();
            $(this).find("ion-icon").attr("name", "add");
        } else {
            $(this).find("ion-icon").attr("name", "remove");
            $(this).addClass("active");
            $(this).siblings(".accordion-content").slideDown();
        }
    });

    $("#am-toggle").on("click", function () {
        event.preventDefault();
        $(".accordion.am > a").addClass("active");
        $(".accordion.am .accordion-content").slideDown();
        $(".accordion.am-and-pm > a").addClass("active");
        $(".accordion.am-and-pm .accordion-content").slideDown();
        $(".accordion.pm .accordion-content").slideUp();
        $(".accordion.pm > a").removeClass("active");
        $(".accordion.bar .accordion-content").slideUp();
        $(".accordion.bar > a").removeClass("active");
    });

    $("#pm-toggle").on("click", function () {
        event.preventDefault();
        $(".accordion.pm > a").addClass("active");
        $(".accordion.pm .accordion-content").slideDown();
        $(".accordion.am-and-pm > a").addClass("active");
        $(".accordion.am-and-pm .accordion-content").slideDown();
        $(".accordion.am .accordion-content").slideUp();
        $(".accordion.am > a").removeClass("active");
        $(".accordion.bar .accordion-content").slideUp();
        $(".accordion.bar > a").removeClass("active");
    });

    $("#bar-toggle").on("click", function () {
        event.preventDefault();
        $(".accordion.bar > a").addClass("active");
        $(".accordion.bar .accordion-content").slideDown();
        $(".accordion.am-and-pm > a").removeClass("active");
        $(".accordion.am-and-pm .accordion-content").slideUp();
        $(".accordion.am .accordion-content").slideUp();
        $(".accordion.am > a").removeClass("active");
        $(".accordion.pm .accordion-content").slideUp();
        $(".accordion.pm > a").removeClass("active");
    });
});
