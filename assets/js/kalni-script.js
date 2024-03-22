(function ($) {
	"use strict";

    jQuery(document).ready(function($){

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


		$("input#keyword").keyup(function() {
			if ($(this).val().length > 2) {
			  $("#datafetch").show();
			} else {
			  $("#datafetch").hide();
			}
		});


		$('body').on('added_to_cart',function(e,data) {
			if ($('#hidden_cart').length == 0) { 
				$(this).append('<a href="#TB_inline?width=300&height=550&inlineId=hidden_cart" id="show_hidden_cart" title="<h2>Cart</h2>" class="thickbox" style="display:none"></a>');
				$(this).append('<div id="hidden_cart" style="display:none">'+data['div.widget_shopping_cart_content']+'</div>');
			}
			$('#show_hidden_cart').click();
		});

    });

}(jQuery));	