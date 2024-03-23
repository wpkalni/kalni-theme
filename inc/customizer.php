<?php
/**
 * Kalni Theme Customizer
 *
 * @package Kalni
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kalni_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector' => '.site-title a',
				'render_callback' => 'kalni_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector' => '.site-description',
				'render_callback' => 'kalni_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'kalni_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kalni_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kalni_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kalni_customize_preview_js()
{
	wp_enqueue_script('kalni-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'kalni_customize_preview_js');


/**
 * [sanitize_html description]
 * @param  [string] $input [input from textarea]
 * @return [string]        [sanitize all input no tags]
 */
function sanitize_addsetting_field($input)
{
	return wp_strip_all_tags($input);
}


/**
 * @param $wp_customize
 * global settings panel
 */
function kalni_panel_customize_register($wp_customize)
{
	$wp_customize->add_panel(
		'kalni_them_option_panel',
		array(
			'title' => 'Theme Options',
			'priority' => '20',
			'description' => 'this is a customize theme options panel'
		)
	);
}
add_action('customize_register', 'kalni_panel_customize_register');


/**
 * @param $wp_customize
 * Header section
 */
function kalni_header_section_customize_register($wp_customize)
{
	$wp_customize->add_section(
		'header_section',
		array(
			'title' => __('Header section', 'kalni'),
			'priority' => 5,
			'description' => __('Header section', 'kalni'),
			'panel' => 'kalni_them_option_panel',
		)
	);


	// address
	//add setting
	$wp_customize->add_setting(
		'hide_header_top',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'hide_header_top',
		array(
			'label' => 'Hide address top',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_top'
		)
	);

	// top content 
	//add setting
	$wp_customize->add_setting(
		'header_top_content1',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'header_top_content1',
		array(
			'label' => 'Add header top content 1',
			'type' => 'textarea',
			'section' => 'header_section',
			'settings' => 'header_top_content1'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'header_top_sliding',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'header_top_sliding',
		array(
			'label' => 'Switch right to left',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'header_top_sliding'
		)
	);
	
	// Search
	//add setting
	$wp_customize->add_setting(
		'hide_header_search',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'hide_header_search',
		array(
			'label' => 'Hide search form',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_search'
		)
	);

	// Login/account
	//add setting
	$wp_customize->add_setting(
		'hide_header_account',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'hide_header_account',
		array(
			'label' => 'Hide accounts',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_account'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'header_account_color',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh',
			'capability' => 'edit_theme_options'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_account_color',
		array(
			'label'    => __( 'User icon color', 'text-domain' ),
			'section'  => 'header_section',
			'settings' => 'header_account_color',
		)
	));

	
	// Wish
	//add setting
	$wp_customize->add_setting(
		'hide_header_wish',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'hide_header_wish',
		array(
			'label' => 'Hide wishlist',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_wish'
		)
	);
		
	//add setting
	$wp_customize->add_setting(
		'header_wish_color',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh',
			'capability' => 'edit_theme_options'
		)
	);

	//add control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_wish_color',
		array(
			'label'    => __( 'Wishes icon color', 'text-domain' ),
			'section'  => 'header_section',
			'settings' => 'header_wish_color',
		)
	));

	// Shuffle product
	//add setting
	$wp_customize->add_setting(
		'hide_header_product_list',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'hide_header_product_list',
		array(
			'label' => 'Hide compare',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_product_list'
		)
	);
	
	//add setting
	$wp_customize->add_setting(
		'header_shuffle_color',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh',
			'capability' => 'edit_theme_options'
		)
	);

	//add control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_shuffle_color',
		array(
			'label'    => __( 'compare icon color', 'text-domain' ),
			'section'  => 'header_section',
			'settings' => 'header_shuffle_color',
		)
	));

	// Login/account
	//add setting
	$wp_customize->add_setting(
		'hide_header_cart',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'hide_header_cart',
		array(
			'label' => 'Hide cart',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_cart'
		)
	);

		
	//add setting
	$wp_customize->add_setting(
		'header_cart_color',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh',
			'capability' => 'edit_theme_options'
		)
	);

	//add control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_cart_color',
		array(
			'label'    => __( 'Cart icon color', 'text-domain' ),
			'section'  => 'header_section',
			'settings' => 'header_cart_color',
		)
	));


	//add setting
	$wp_customize->add_setting(
		'hide_header_cats',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	

	//add control
	$wp_customize->add_control(
		'hide_header_cats',
		array(
			'label' => 'Hide header bottom categories',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_cats'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'hide_header_discount',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'hide_header_discount',
		array(
			'label' => 'Hide header bottom discount',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_discount'
		)
	);

	$wp_customize->add_setting(
		'dis_img',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	$wp_customize->add_setting('dis_img', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'kalni_customize_sanitize_header_image',
	)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'dis_image',
			array(
				'label' => 'Discount icon/image',
				'settings' => 'dis_img',
				'section' => 'header_section',
				'priority' => 30,
			)
		)
	);

	//add setting
	$wp_customize->add_setting(
		'dis_text',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'dis_text',
		array(
			'label' => 'Add discount text',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'dis_text'
		)
	);



}
add_action('customize_register', 'kalni_header_section_customize_register');


/**
 * @param $wp_customize
 *  footer section
 */
function kalni_footer_section_customize_register($wp_customize)
{
	$wp_customize->add_section(
		'footer_section',
		array(
			'title' => __('Footer', 'kalni'),
			'priority' => 7,
			'description' => __('Footer section', 'kalni'),
			'panel' => 'kalni_them_option_panel',
		)
	);

	// Socials
	//add setting
	$wp_customize->add_setting(
		'facebook_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);
	//add control
	$wp_customize->add_control(
		'facebook_link',
		array(
			'label' => 'Add facebook link',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'facebook_link'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'x_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);
	//add control
	$wp_customize->add_control(
		'x_link',
		array(
			'label' => 'Add X/twitter link',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'x_link'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'linkedin_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);
	//add control
	$wp_customize->add_control(
		'linkedin_link',
		array(
			'label' => 'Add linkedin link',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'linkedin_link'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'insta_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);
	//add control
	$wp_customize->add_control(
		'insta_link',
		array(
			'label' => 'Add instagram link',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'insta_link'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'youtube_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);
	//add control
	$wp_customize->add_control(
		'youtube_link',
		array(
			'label' => 'Add youtube link',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'youtube_link'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'pinterest_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);
	//add control
	$wp_customize->add_control(
		'pinterest_link',
		array(
			'label' => 'Add pinterest link',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'pinterest_link'
		)
	);
	

	// Footer contact information
	//add setting
	$wp_customize->add_setting(
		'hide_footer_contact',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'hide_footer_contact',
		array(
			'label' => 'Hide footer contact information',
			'type' => 'checkbox',
			'section' => 'footer_section',
			'settings' => 'hide_footer_contact'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'footer_contact_heading',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'footer_contact_heading',
		array(
			'label' => 'Add contact heading',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'footer_contact_heading'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'footer_contact_heading_sub',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'footer_contact_heading_sub',
		array(
			'label' => 'Add contact sub heading',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'footer_contact_heading_sub'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'footer_phone',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'footer_phone',
		array(
			'label' => 'Add phone number',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'footer_phone'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'footer_phone_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'footer_phone_link',
		array(
			'label' => 'Add phone link number',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'footer_phone_link'
		)
	);


	//add setting
	$wp_customize->add_setting(
		'footer_email',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'footer_email',
		array(
			'label' => 'Add email address',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'footer_email'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'footer_email_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'footer_email_link',
		array(
			'label' => 'Add email address',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'footer_email_link'
		)
	);


	// address
	//add setting
	$wp_customize->add_setting(
		'footer_address',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'footer_address',
		array(
			'label' => 'Add address',
			'type' => 'textarea',
			'section' => 'footer_section',
			'settings' => 'footer_address'
		)
	);


	// Footer bottom
	//add setting
	$wp_customize->add_setting(
		'hide_footer_bottom',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'hide_footer_bottom',
		array(
			'label' => 'Hide footer bottom',
			'type' => 'checkbox',
			'section' => 'footer_section',
			'settings' => 'hide_footer_bottom'
		)
	);

	// copyright
	//add setting
	$wp_customize->add_setting(
		'copyright',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'copyright',
		array(
			'label' => 'Add copiright text',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'copyright'
		)
	);
	
	//add setting
	$wp_customize->add_setting(
		'hide_cards',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'hide_cards',
		array(
			'label' => 'Hide footer cards',
			'type' => 'checkbox',
			'section' => 'footer_section',
			'settings' => 'hide_cards'
		)
	);

	// card1
	$wp_customize->add_setting(
		'footer_card1',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	$wp_customize->add_setting('footer_card1', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'kalni_customize_sanitize_footer_image',
	)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_card1_img',
			array(
				'label' => 'Footer card 1',
				'settings' => 'footer_card1',
				'section' => 'footer_section',
				'priority' => 20,
			)
		)
	);

	// card2
	$wp_customize->add_setting(
		'footer_card2',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	$wp_customize->add_setting('footer_card2', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'kalni_customize_sanitize_footer_image',
	)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_card2_img',
			array(
				'label' => 'Footer card 2',
				'settings' => 'footer_card2',
				'section' => 'footer_section',
				'priority' => 21,
			)
		)
	);

	// card1
	$wp_customize->add_setting(
		'footer_card3',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	$wp_customize->add_setting('footer_card3', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'kalni_customize_sanitize_footer_image',
	)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_card3_img',
			array(
				'label' => 'Footer card 3',
				'settings' => 'footer_card3',
				'section' => 'footer_section',
				'priority' => 22,
			)
		)
	);

	// card1
	$wp_customize->add_setting(
		'footer_card4',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	$wp_customize->add_setting('footer_card4', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'kalni_customize_sanitize_footer_image',
	)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_card4_img',
			array(
				'label' => 'Footer card 4',
				'settings' => 'footer_card4',
				'section' => 'footer_section',
				'priority' => 23,
			)
		)
	);

}
add_action('customize_register', 'kalni_footer_section_customize_register');


/**
 * Sanitize footer image
 *
 * @param $input
 *
 * @return string
 */
function kalni_customize_sanitize_header_image($input)
{
	return attachment_url_to_postid($input);
}

/**
 * Sanitize footer image
 *
 * @param $input
 *
 * @return string
 */
function kalni_customize_sanitize_footer_image($input)
{
	return attachment_url_to_postid($input);
}


