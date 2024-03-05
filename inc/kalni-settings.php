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
    
    // phone
    $hide_header_wish = get_theme_mod( 'hide_header_wish' );
    $setting['hide_header_wish'] = strlen($hide_header_wish) > 0 ? $hide_header_wish : false;

    $hide_header_product_list = get_theme_mod( 'hide_header_product_list' );
    $setting['hide_header_product_list'] = strlen($hide_header_product_list) > 0 ? $hide_header_product_list : false;
    
    $hide_header_cart = get_theme_mod( 'hide_header_cart' );
    $setting['hide_header_cart'] = strlen($hide_header_cart) > 0 ? $hide_header_cart : false;

    
    $hide_header_cats = get_theme_mod( 'hide_header_cats' );
    $setting['hide_header_cats'] = strlen($hide_header_cats) > 0 ? $hide_header_cats : false;
    
    // header 
    $hide_header_discount = get_theme_mod( 'hide_header_discount' );
    $setting['hide_header_discount'] = strlen($hide_header_discount) > 0 ? $hide_header_discount : false;



    // Footer
    $footer_logo = get_theme_mod( 'footer_logo' );
    $footer_logo_image = wp_get_attachment_image_src( $footer_logo , 'full' );
    $setting['footer_logo'] = $footer_logo_image ? $footer_logo_image[0] : false;

    // Footer contact information
    $hide_footer_contact = get_theme_mod( 'hide_footer_contact' );
    $setting['hide_footer_contact'] = strlen($hide_footer_contact) > 0 ? $hide_footer_contact : false;
    
    // phone
    $footer_phone = get_theme_mod( 'footer_phone' );
    $setting['footer_phone'] = strlen($footer_phone) > 0 ? $footer_phone : false;
    // email
    $footer_email = get_theme_mod( 'footer_email' );
    $setting['footer_email'] = strlen($footer_email) > 0 ? $footer_email : false;

    
    // Address info heading
    $hide_footer_address = get_theme_mod( 'hide_footer_address' );
    $setting['hide_footer_address'] = strlen($hide_footer_address) > 0 ? $hide_footer_address : false;

    $footer_address_heading = get_theme_mod( 'footer_address_heading' );
    $setting['footer_address_heading'] = strlen($footer_address_heading) > 0 ? $footer_address_heading : false;

    // Address
    $footer_address = get_theme_mod( 'footer_address' );
    $setting['footer_address'] = strlen($footer_address) > 0 ? $footer_address : false;

    // copyright text
    $hide_footer_bottom = get_theme_mod( 'hide_footer_bottom' );
    $setting['hide_footer_bottom'] = strlen($hide_footer_bottom) > 0 ? $hide_footer_bottom : false;
    // End footer

    return $setting;
}