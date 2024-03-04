(function ($) {
	"use strict";

    jQuery(document).ready(function($){

		// testimonial carosel
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

    });

}(jQuery));	