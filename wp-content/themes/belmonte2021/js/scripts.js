(function ($, root, undefined) {
	$(function () {
		"use strict";
		// DOM ready, take it away

		// HEADER
		var headerHeight = $("header").outerHeight();
		var footer2 = $("footer").outerHeight();
		var alert1 = $(".alert-newsletter").outerHeight();
		$("#bodyHeight").css({ height: "calc(100vh - " + footer2 + "px)", "min-height": "490px" });
		$("body").css({ "padding-top": headerHeight, "padding-bottom": alert1 });

		$(window).on("resize", function () {
			var headerHeight = $("header").outerHeight();
			var footer2 = $("footer").outerHeight();
			var alert1 = $(".alert-newsletter").outerHeight();
			$("#bodyHeight").css({ height: "calc(100vh - " + footer2 + "px)", "min-height": "490px" });
			$("body").css({ "padding-top": headerHeight, "padding-bottom": alert1 });
		});

		$("#tab-conferencia > div > div:nth-child(3)").after('<div class="bg-white c-blue p-3 w-100 mb-md-5 mb-4 txt32 NeuLeon-Light"><span class="mr-5">11:10</span> <span class="mr-5">|</span> BREAK</div>');

		$("#tab-conferencia > div > div:nth-child(7)").after('<div class="bg-white c-blue p-3 w-100 mb-md-5 mb-4 txt32 NeuLeon-Light"><span class="mr-5">13:45</span> <span class="mr-5">|</span> COMIDA</div>');

		$("#tab-conferencia > div > div:nth-child(11)").after('<div class="bg-white c-blue p-3 w-100 mb-md-5 mb-4 txt32 NeuLeon-Light"><span class="mr-5">16:50</span> <span class="mr-5">|</span> BREAK</div>');

		$("#tab-conferencia > div > div:last-child").after('<div class="bg-white c-blue p-3 w-100 mb-md-5 mb-4 txt32 NeuLeon-Light"><span class="mr-5">19:00</span> <span class="mr-5">|</span> CIERRE</div>');

		//POST SLIDER
		$(".post-slider").slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			dots: false,
			adaptiveHeight: true,
		});

		//SLICK SLIDER
		$(".hero-slider-arrows").slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			dots: true,
			adaptiveHeight: true,
		});

		// $slideshow = $('.slider').slick({
		// 	dots:true,
		// 	autoplay:true,
		// 	arrows:true,
		// 	prevArrow:'<button type="button" class="slick-prev"></button>',
		// 	nextArrow:'<button type="button" class="slick-next"></button>',
		// 	slidesToShow:1,
		// 	slidesToScroll:1
		// });

		// $('.slide').click(function() {
		// 	$slideshow.slick('slickNext');
		// });

		$(".slider-for").each(function (key, item) {
			var sliderIdName = "slider" + key;
			var sliderNavIdName = "sliderNav" + key;

			this.id = sliderIdName;
			$(".slider-nav")[key].id = sliderNavIdName;

			var sliderId = "#" + sliderIdName;
			var sliderNavId = "#" + sliderNavIdName;

			$(sliderId).slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				fade: true,
				dots: true,
				adaptiveHeight: true,
				asNavFor: sliderNavId,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							dots: false,
						},
					},
				],
			});

			$(sliderNavId).slick({
				slidesToShow: 7,
				slidesToScroll: 1,
				asNavFor: sliderId,
				focusOnSelect: true,
			});
		});

		// SLIDER TABS
		$(".slider-for2").slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			draggable: false,
			fade: true,
			dots: false,
			asNavFor: ".slider-nav2",
			adaptiveHeight: true,
		});

		$(".slider-nav2").slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			asNavFor: ".slider-for2",
			focusOnSelect: true,
		});

		// TABS
		$(function () {
			$(".tab-menu li a").click(function (event) {
				event.preventDefault();
				$(this).parent().addClass("current");
				$(this).parent().siblings().removeClass("current");
				var tab = $(this).attr("href");
				$(".tab-content").not(tab).css({ visibility: "hidden", overflow: "hidden", opacity: "0", height: "0" });
				$(tab).css({ visibility: "visible", overflow: "auto", opacity: "1", height: "auto" });
			});
		});

		$("#has-tab-content .tab-content:first-child").css({ visibility: "visible", opacity: "1", height: "auto" });
		$("#tab-00").css({ visibility: "visible", opacity: "1", height: "auto" });
		$(".tab-menu li:first-child").addClass("current");

		// TABS2
		$("ul.tab-menu2 li").click(function (event) {
			event.preventDefault();
			var tab_id = $(this).attr("data-tab");

			$("ul.tab-menu2 li").removeClass("current");
			$(".tab-content2").removeClass("current");

			$(this).addClass("current");
			$("#" + tab_id).addClass("current");
		});

		$("section#tab-0").addClass("current");
		$(".tab-menu2 li:first-child").addClass("current");

		$(".slider-for .slick-prev").click(function () {
			move("left");
		});

		$(".slider-for .slick-next").click(function () {
			move("right");
		});

		function move(to) {
			var current = $("li.current").index();
			var total = $(".tab-menu2 .slick-slide").length;
			var add;
			switch (to) {
				case "left":
					add = -1;
					break;
				case "right":
					add = 1;
					break;
			}
			$(".tab-menu2 li.slick-slide")
				.eq((current + add) % total)
				.click();
		}

		// HERO MENU
		$("#triggerMenu").click(function (event) {
			event.preventDefault();
			$(".hero-nav").toggleClass("show");
			$("body").addClass("overflow-active");
			$("html").addClass("html-overflow-active");
			$("#aside-menu").addClass("aside-overflow-active");
		});

		$(".hero-nav-close").click(function (event) {
			event.preventDefault();
			$(".hero-nav").removeClass("show");
			$("body").removeClass("overflow-active");
			$("html").removeClass("html-overflow-active");
			$("#aside-menu").removeClass("aside-overflow-active");
		});

		// $(".st-menu a").click(function(event) {
		// 	event.preventDefault();
		// 	$(".hero-nav").removeClass("show");
		// 	$("body").removeClass("overflow-active");
		// 	$("html").removeClass("html-overflow-active");
		// 	$("#aside-menu").removeClass("aside-overflow-active");
		// });

		// MODAL INDEX
		$("#btn1").click(function (event) {
			event.preventDefault();
			$("#block1").addClass("hide");
			$("#block2").addClass("show");
		});

		$("#btn2").click(function (event) {
			event.preventDefault();
			$("#block2").removeClass("show");
			$("#block3").addClass("show");
		});

		$("#btn3").click(function (event) {
			event.preventDefault();
			$("#block3").removeClass("show");
			$("#block4").addClass("show");
		});

		$("#btn4").click(function (event) {
			event.preventDefault();
			$("#block4").removeClass("show");
			$("#block5").addClass("show");
		});

		$("#btn5").click(function (event) {
			event.preventDefault();
			$("#block5").removeClass("show");
			$("#block6").addClass("show");
		});

		// #1 .acf-field-5cf7011c01e5a
		// #2 .acf-field-5cf7f7a55e108
		// #3 .acf-field-5cf7f7d129c32
		// #4 .acf-field-5cf7f7edaaabd

		// INPUTS
		// #1 .acf-field-5cf8181742a72
		// #2 .acf-field-5cf818af31ef1
		// #3 .acf-field-5cf818b831ef2

		// MODAL GENERATE POST
		$("#button1 .acf-input-append, .acf-field-5cfea20301dc1").click(function (event) {
			event.preventDefault();
			$(".acf-field-5cf7011c01e5a").addClass("hide"); //#1
			$(".acf-field-5cf8181742a72").addClass("hide"); //#1
			$(".acf-field-5cfea20301dc1").addClass("hide"); //#1
			$(".acf-field-5cf7f7a55e108").addClass("show"); //#2
			$(".acf-field-5cf818af31ef1").addClass("show"); //#2
			$(".acf-field-5cfea8187b659").addClass("show"); //#2
		});

		$("#button2 .acf-input-append, .acf-field-5cfea8187b659").click(function (event) {
			event.preventDefault();
			$(".acf-field-5cf7f7a55e108").removeClass("show"); //#2
			$(".acf-field-5cf818af31ef1").removeClass("show"); //#2
			$(".acf-field-5cfea8187b659").removeClass("show"); //#2
			$(".acf-field-5cf7f7d129c32").addClass("show"); //#3
			$(".acf-field-5cf818b831ef2").addClass("show"); //#3
			$(".acf-field-5cfeb2e7d6806").addClass("show"); //#3
		});

		$("#button3 .acf-input-append, .acf-field-5cfeb2e7d6806").click(function (event) {
			event.preventDefault();
			$(".acf-field-5cf7f7d129c32").removeClass("show"); //#3
			$(".acf-field-5cf818b831ef2").removeClass("show"); //#3
			$(".acf-field-5cfeb2e7d6806").removeClass("show"); //#3
			$(".acf-field-5cf7f7edaaabd").addClass("show"); //#4
			$(".acf-form-submit").addClass("show");
		});

		$("#button4 .acf-input-append").click(function (event) {
			event.preventDefault();
			$(".acf-field-5cf7f7edaaabd").removeClass("show"); //#4
			$("#block5").addClass("show");
		});

		$("#btn5 .acf-input-append").click(function (event) {
			event.preventDefault();
			$("#block5").removeClass("show");
			$("#block6").addClass("show");
		});

		// HIDE NEWSLETTER NOTIFICATION
		const showMsg = sessionStorage.getItem("showMsg");

		if (showMsg === "false") {
			$(".alert-newsletter").hide();
			$(".alert-newsletter").css({ opacity: "0" });
			$("footer").removeClass("footerAlert");
		} else {
			$(".alert-newsletter").css({ opacity: "1" });
		}

		$(".alert-newsletter-closebtn").on("click", function () {
			$(".alert-newsletter").css({ display: "none" });
			$("footer").removeClass("footerAlert");
			sessionStorage.setItem("showMsg", "false");
		});

		// HIDE MODAL NOTIFICATION
		const showModal = sessionStorage.getItem("showModal");

		if (showModal === "false") {
			$("#exampleModalHome").hide();
			$("#exampleModalHome").css({ opacity: "0", display: "none!important" });
			$(".modal-backdrop.show").css({ opacity: "0" });
			$("body").removeClass("modalActive");
			$("body").removeClass("modal-open");
			$("body").addClass("modalHide");
		} else {
			$("#exampleModalHome").css({ opacity: "1" });
			$(".modal-backdrop.show").css({ opacity: "1" });
		}

		$("#exampleModalHome button.close").on("click", function () {
			$("#exampleModalHome").css({ display: "none" });
			$(".modal-backdrop.show").css({ opacity: "0" });
			$("body").removeClass("modalActive");
			$("body").removeClass("modal-open");
			sessionStorage.setItem("showModal", "false");
		});

		// LOADING WRAP
		$(document).ready(function () {
			$("#loading_wrap").fadeOut("slow");
		});

		// Wrap any selects that should be replaced
		$("select#incertidumbre-select").wrap('<div class="select-replacement-wrapper"></div>');

		// Replace placeholder text with select's initial value
		$(".select-replacement-wrapper").each(function () {
			$(this).prepend('<a id="selectText">Contaminación del medio ambiente ↓</a>');
		});

		// Update placeholder text with updated select value
		$("select#incertidumbre-select").change(function (event) {
			$(this).siblings("a").text($("option:selected", this).text());
		});

		//ENABLE TOOLTIP
		$('[data-toggle="tooltip"]').tooltip();
		//$('.tooltip').tooltip('show');
		$("body").tooltip({ selector: "[data-toggle=tooltip]" });

		// MUSEOGRAFIA: VIDEO MAGIC
		/* var cip = $(".video-mask").hover( hoverVideo, hideVideo );

			function hoverVideo(e) {
				$('video', this).get(0).play();
			}


			function hideVideo(e) {
				$('video', this).get(0).pause();
				// $('video', this).pause();
				$('video', this).currentTime = 0;
				$('video', this).get(0).load();
			} */

		// MUSEOGRAFÍA: FILTER HACKS
		$("#profesional-input-radio").click(function (e) {
			e = e || event;
			var isCheckbox = $(e.target).is(":checkbox");
			if (isCheckbox) {
				var checkbox = $(this).find(":checkbox");
				checkbox.attr("checked", !checkbox.attr("checked"));

				$("#container_profesional").toggleClass("active");
			}
			if ($("#container_estudiantil.active").length > 0 && $("#container_profesional.active").length > 0) {
				$(".convocatoria-dropdown").toggleClass("active");
				console.log("existe ");
			}
		});

		$("#estudiantil-input-radio").click(function (e) {
			e = e || event;
			var isCheckbox = $(e.target).is(":checkbox");
			if (isCheckbox) {
				var checkbox = $(this).find(":checkbox");
				checkbox.attr("checked", !checkbox.attr("checked"));

				$("#container_estudiantil").toggleClass("active");
			}
			if ($("#container_estudiantil.active").length > 0 && $("#container_profesional.active").length > 0) {
				$(".convocatoria-dropdown").toggleClass("active");
				console.log("existe ");
			}
		});

		$('#exampleModalHome').modal('show');

		// CUSTOM SCROLLBAR
		var scroll = $('.mcs-horizontal');
		if (scroll.length) {
			$(".mcs-horizontal").mCustomScrollbar({
				axis:"x",
				theme:"inset-3"
			});

			$(window).on("load resize",function(){
				var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				if(winWidth > 640){
					$(".mcs-horizontal").mCustomScrollbar();
				}else{
					$(".mcs-horizontal").mCustomScrollbar("destroy");
				}
			});
		}

		//CONCURSO POST SLIDER
		$(".concurso-slider").slick({
			slidesToShow: 6,
			slidesToScroll: 6,
			arrows: true,
			fade: false,
			dots: false,
			adaptiveHeight: true,
			responsive: [
			{
			breakpoint: 1280,
				settings: {
				   slidesToShow: 5,
				   slidesToScroll: 5
				}
			},
			{
			breakpoint: 1080,
				settings: {
				   slidesToShow: 4,
				   slidesToScroll: 4
				}
			},
			{
			breakpoint: 992,
				settings: {
				   slidesToShow: 2,
				   slidesToScroll: 2
				}
			},
			{
			breakpoint: 600,
				settings: {
				   slidesToShow: 1,
				   slidesToScroll: 1
				}
			}
			]
		});



	// COPY TO CLIPBOARD
	// $(".copiar").click(function(){
	// 	$(".url").css({ display: "block" });
	// 	$(".url").select();
	// });

	$( ".copiar" ).each(function(index) {
		$(this).on("click", function(){

			$(this).siblings(".url").css({ display: "block" });
			$(this).siblings(".url").select();

			// // For the boolean value
			// var boolKey = $(this).data('selected');
			// // For the mammal value
			// var mammalKey = $(this).attr('id');
		});
	});


	});
})(jQuery, this);
