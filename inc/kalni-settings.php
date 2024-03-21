<?php

/**
 * get Theme Settings
 * @return array
 */
function kalni_get_theme_settings(){
    $setting = array();

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $setting['logo'] = $image ? $image[0] : false;
    // Header settings
    // Header top
    
    // Header top
    $hide_header_top = get_theme_mod( 'hide_header_top');
    $setting['hide_header_top'] = strlen( $hide_header_top ) > 0 ? $hide_header_top : false;
    
    $header_top_content1 = get_theme_mod( 'header_top_content1' );
    $setting['header_top_content1'] = strlen($header_top_content1) > 0 ? $header_top_content1 : false;
    
    $header_top_content2 = get_theme_mod( 'header_top_content2' );
    $setting['header_top_content2'] = strlen($header_top_content2) > 0 ? $header_top_content2 : false;
    
    $header_top_content3 = get_theme_mod( 'header_top_content3' );
    $setting['header_top_content3'] = strlen($header_top_content3) > 0 ? $header_top_content3 : false;
    
    $header_top_content4 = get_theme_mod( 'header_top_content4' );
    $setting['header_top_content4'] = strlen($header_top_content4) > 0 ? $header_top_content4 : false;
    
    // email
    $hide_header_search = get_theme_mod( 'hide_header_search' );
    $setting['hide_header_search'] = strlen($hide_header_search) > 0 ? $hide_header_search : false;
    
    $hide_header_account = get_theme_mod( 'hide_header_account' );
    $setting['hide_header_account'] = strlen($hide_header_account) > 0 ? $hide_header_account : false;
    
    $header_account_color = get_theme_mod( 'header_account_color' );
    $setting['header_account_color'] = strlen($header_account_color) > 0 ? $header_account_color : false;
    
    // phone
    $hide_header_wish = get_theme_mod( 'hide_header_wish' );
    $setting['hide_header_wish'] = strlen($hide_header_wish) > 0 ? $hide_header_wish : false;

    $header_wish_color = get_theme_mod( 'header_wish_color' );
    $setting['header_wish_color'] = strlen($header_wish_color) > 0 ? $header_wish_color : false;

    $hide_header_product_list = get_theme_mod( 'hide_header_product_list' );
    $setting['hide_header_product_list'] = strlen($hide_header_product_list) > 0 ? $hide_header_product_list : false;

    $header_shuffle_color = get_theme_mod( 'header_shuffle_color' );
    $setting['header_shuffle_color'] = strlen($header_shuffle_color) > 0 ? $header_shuffle_color : false;
    
    $hide_header_cart = get_theme_mod( 'hide_header_cart' );
    $setting['hide_header_cart'] = strlen($hide_header_cart) > 0 ? $hide_header_cart : false;
    
    $header_cart_color = get_theme_mod( 'header_cart_color' );
    $setting['header_cart_color'] = strlen($header_cart_color) > 0 ? $header_cart_color : false;

    
    $hide_header_cats = get_theme_mod( 'hide_header_cats' );
    $setting['hide_header_cats'] = strlen($hide_header_cats) > 0 ? $hide_header_cats : false;
    
    // header 
    $hide_header_discount = get_theme_mod( 'hide_header_discount' );
    $setting['hide_header_discount'] = strlen($hide_header_discount) > 0 ? $hide_header_discount : false;

    $dis_img = get_theme_mod( 'dis_img' );
    $discount_img = wp_get_attachment_image_src( $dis_img , 'full' );
    $setting['dis_img'] = $discount_img ? $discount_img[0] : false;

    $dis_text = get_theme_mod( 'dis_text' );
    $setting['dis_text'] = strlen($dis_text) > 0 ? $dis_text : false;



    // ======================
    // Footer

    // socials
    $facebook_link = get_theme_mod( 'facebook_link' );
    $setting['facebook_link'] = strlen($facebook_link) > 0 ? $facebook_link : false;

    $x_link = get_theme_mod( 'x_link' );
    $setting['x_link'] = strlen($x_link) > 0 ? $x_link : false;

    $linkedin_link = get_theme_mod( 'linkedin_link' );
    $setting['linkedin_link'] = strlen($linkedin_link) > 0 ? $linkedin_link : false;

    $insta_link = get_theme_mod( 'insta_link' );
    $setting['insta_link'] = strlen($insta_link) > 0 ? $insta_link : false;

    $youtube_link = get_theme_mod( 'youtube_link' );
    $setting['youtube_link'] = strlen($youtube_link) > 0 ? $youtube_link : false;

    $pinterest_link = get_theme_mod( 'pinterest_link' );
    $setting['pinterest_link'] = strlen($pinterest_link) > 0 ? $pinterest_link : false;


    // Footer contact information
    $hide_footer_contact = get_theme_mod( 'hide_footer_contact' );
    $setting['hide_footer_contact'] = strlen($hide_footer_contact) > 0 ? $hide_footer_contact : false;
    
    $footer_contact_heading = get_theme_mod( 'footer_contact_heading' );
    $setting['footer_contact_heading'] = strlen($footer_contact_heading) > 0 ? $footer_contact_heading : false;

    $footer_contact_heading_sub = get_theme_mod( 'footer_contact_heading_sub' );
    $setting['footer_contact_heading_sub'] = strlen($footer_contact_heading_sub) > 0 ? $footer_contact_heading_sub : false;
    
    // phone
    $footer_phone = get_theme_mod( 'footer_phone' );
    $setting['footer_phone'] = strlen($footer_phone) > 0 ? $footer_phone : false;

    $footer_phone_link = get_theme_mod( 'footer_phone_link' );
    $setting['footer_phone_link'] = strlen($footer_phone_link) > 0 ? $footer_phone_link : false;

    // email
    $footer_email = get_theme_mod( 'footer_email' );
    $setting['footer_email'] = strlen($footer_email) > 0 ? $footer_email : false;

    $footer_email_link = get_theme_mod( 'footer_email_link' );
    $setting['footer_email_link'] = strlen($footer_email_link) > 0 ? $footer_email_link : false;

    // Address
    $footer_address = get_theme_mod( 'footer_address' );
    $setting['footer_address'] = strlen($footer_address) > 0 ? $footer_address : false;

    // Footer bottom
    $hide_footer_bottom = get_theme_mod( 'hide_footer_bottom' );
    $setting['hide_footer_bottom'] = strlen($hide_footer_bottom) > 0 ? $hide_footer_bottom : false;

    // copyright text
    $copyright = get_theme_mod( 'copyright' );
    $setting['copyright'] = strlen($copyright) > 0 ? $copyright : false;


    // Cards
    $hide_cards = get_theme_mod( 'hide_cards' );
    $setting['hide_cards'] = strlen($hide_cards) > 0 ? $hide_cards : false;
    
    $footer_card1 = get_theme_mod( 'footer_card1' );
    $footer_card1_image = wp_get_attachment_image_src( $footer_card1 , 'full' );
    $setting['footer_card1'] = $footer_card1_image ? $footer_card1_image[0] : false;
    
    $footer_card2 = get_theme_mod( 'footer_card2' );
    $footer_card2_image = wp_get_attachment_image_src( $footer_card2 , 'full' );
    $setting['footer_card2'] = $footer_card2_image ? $footer_card2_image[0] : false;

    $footer_card3 = get_theme_mod( 'footer_card3' );
    $footer_card3_image = wp_get_attachment_image_src( $footer_card3 , 'full' );
    $setting['footer_card3'] = $footer_card3_image ? $footer_card3_image[0] : false;

    $footer_card4 = get_theme_mod( 'footer_card4' );
    $footer_card4_image = wp_get_attachment_image_src( $footer_card4 , 'full' );
    $setting['footer_card4'] = $footer_card4_image ? $footer_card4_image[0] : false;

    // End footer

    return $setting;
}