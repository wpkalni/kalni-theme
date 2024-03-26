(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {

		// product category carosel
		$(".pc-slider").slick({
			dots: true,
			loop: true,
			arrows: false,
			nextArrow: "<i class=\'fa fa-angle-right clr-black br-100 cursor-pointer lh-40 text-center absolute\'></i>",
			prevArrow: "<i class=\'fa fa-angle-left clr-black br-100 cursor-pointer lh-40 text-center absolute\'></i>",
			slidesToShow: 5,
			infinite: true,
			slidesToScroll: 1,
			autoplay: false,
			autoplaySpeed: 2000,
			speed: 2000,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: true,
						dots: false
					}
				}
			]
		});

		// product carosel
		$(".product-slider").slick({
			dots: false,
			loop: true,
			arrows: true,
			nextArrow: "<i class=\'fa fa-angle-right clr-black br-100 cursor-pointer lh-40 text-center absolute\'></i>",
			prevArrow: "<i class=\'fa fa-angle-left clr-black br-100 cursor-pointer lh-40 text-center absolute\'></i>",
			slidesToShow: 4,
			infinite: true,
			slidesToScroll: 1,
			autoplay: false,
			autoplaySpeed: 2000,
			speed: 2000,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				}
			]
		});

		// minicart js
		$(".kalni-minicart-dropdown, .add_to_cart_button, .single_add_to_cart_button").click(function () {
			$(".kalni-minicart-dropdown-menu").addClass("active-cart");
			$("body").addClass("active-cart-overlay");
		});
		$(".close-cart").click(function () {
			$(".kalni-minicart-dropdown-menu").removeClass("active-cart");
			$("body").removeClass("active-cart-overlay");
		});

		// all categories menu js
		$(".all-categories").click(function () {
			$(".cat-menus").addClass("cat-menus-active");
		});
		$(".close-cat-menus").click(function () {
			$(".cat-menus").removeClass("cat-menus-active");
		});

		// responsive menu js
		$(".responsive-menu svg").click(function () {
			$(".main-navigation").addClass("menus-active");
		});
		$(".responsive-menu-close").click(function () {
			$(".main-navigation").removeClass("menus-active");
		});


		$("input#keyword").keyup(function () {
			if ($(this).val().length > 2) {
				$("#datafetch").show();
			} else {
				$("#datafetch").hide();
			}
		});


		// product single js
		$('.product-big-imgs').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.product-small-imgs',
		});
		$('.product-small-imgs').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			asNavFor: '.product-big-imgs',
			dots: false,
			arrows: true,
			nextArrow: "<i class=\'fa-solid fa-angle-down clr-black br-100 cursor-pointer lh-40 text-center absolute\'></i>",
			prevArrow: "<i class=\'fa-solid fa-angle-up clr-black br-100 cursor-pointer lh-40 text-center absolute\'></i>",
			vertical: true,
			focusOnSelect: true,
		});
	});

}(jQuery));	