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
    $hide_header_email = get_theme_mod( 'hide_header_email' );
    $setting['hide_header_email'] = strlen($hide_header_email) > 0 ? $hide_header_email : false;
    
    $header_email = get_theme_mod( 'header_email' );
    $setting['header_email'] = strlen($header_email) > 0 ? $header_email : false;
    
    // phone
    $hide_header_phone = get_theme_mod( 'hide_header_phone' );
    $setting['hide_header_phone'] = strlen($hide_header_phone) > 0 ? $hide_header_phone : false;
    
    $header_phone_text = get_theme_mod( 'header_phone_text' );
    $setting['header_phone_text'] = strlen($header_phone_text) > 0 ? $header_phone_text : false;
    
    $header_phone_number = get_theme_mod( 'header_phone_number' );
    $setting['header_phone_number'] = strlen($header_phone_number) > 0 ? $header_phone_number : false;
    
    // header langugage
    $hide_header_lang = get_theme_mod( 'hide_header_lang' );
    $setting['hide_header_lang'] = strlen($hide_header_lang) > 0 ? $hide_header_lang : false;
    
    // Header login
    $hide_header_login = get_theme_mod( 'hide_header_login' );
    $setting['hide_header_login'] = strlen($hide_header_login) > 0 ? $hide_header_login : false;
    // Header login text
    $header_login = get_theme_mod( 'header_login' );
    $setting['header_login'] = strlen($header_login) > 0 ? $header_login : false;
    // Header login link
    $header_login_link = get_theme_mod( 'header_login_link' );
    $setting['header_login_link'] = strlen($header_login_link) > 0 ? $header_login_link : false;
 
    

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