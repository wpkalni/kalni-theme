(function ($) {
	"use strict";

    jQuery(document).ready(function($){

		// product category carosel
		$(".pc-slider").slick({
			dots: true,
			loop: true,
			arrows: false,
			nextArrow: "<i class=\'fa fa-arrow-right\'></i>",
			prevArrow: "<i class=\'fa fa-arrow-left\'></i>",
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
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
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
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				  }
				}
			  ]
		});


		// minicart js
		$(".kalni-minicart-dropdown").click(function() {
			$(".kalni-minicart-dropdown-menu").addClass("active-cart");
		});
		$(".close-cart").click(function() {
			$(".kalni-minicart-dropdown-menu").removeClass("active-cart");
		});

		// all categories menu js
		$(".all-categories").click(function() {
			$(".cat-menus").addClass("cat-menus-active");
		});
		$(".close-cat-menus").click(function() {
			$(".cat-menus").removeClass("cat-menus-active");
		});

		// responsive menu js
		$(".responsive-menu svg").click(function() {
			$(".main-navigation").addClass("menus-active");
		});
		$(".responsive-menu-close").click(function() {
			$(".main-navigation").removeClass("menus-active");
		});

    });

}(jQuery));	