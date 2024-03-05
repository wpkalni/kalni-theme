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

    });

}(jQuery));	