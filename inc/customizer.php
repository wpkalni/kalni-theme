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
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_top_content1'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'header_top_content2',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'header_top_content2',
		array(
			'label' => 'Add header top content 2',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_top_content2'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'header_top_content3',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'header_top_content3',
		array(
			'label' => 'Add header top content 3',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_top_content3'
		)
	);
	//add setting
	$wp_customize->add_setting(
		'header_top_content4',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'header_top_content4',
		array(
			'label' => 'Add header top content 4',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_top_content4'
		)
	);



	// Email
	//add setting
	$wp_customize->add_setting(
		'hide_header_email',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'hide_header_email',
		array(
			'label' => 'Hide email',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_email'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'header_email',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'header_email',
		array(
			'label' => 'Add email address',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_email'
		)
	);

	// Phone
	//add setting
	$wp_customize->add_setting(
		'hide_header_phone',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'hide_header_phone',
		array(
			'label' => 'Hide header top phone',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_phone'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'header_phone_text',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'header_phone_text',
		array(
			'label' => 'Add phone text',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_phone_text'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'header_phone_number',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'header_phone_number',
		array(
			'label' => 'Add phone number',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_phone_number'
		)
	);

	// Language 
	//add control
	$wp_customize->add_setting(
		'hide_header_lang',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);
	$wp_customize->add_control(
		'hide_header_lang',
		array(
			'label' => 'Hide header language',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_lang'
		)
	);


	// Login 
	$wp_customize->add_setting(
		'hide_header_login',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'hide_header_login',
		array(
			'label' => 'Hide header top login',
			'type' => 'checkbox',
			'section' => 'header_section',
			'settings' => 'hide_header_login'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'header_login',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);


	//add control
	$wp_customize->add_control(
		'header_login',
		array(
			'label' => 'Add login text',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_login'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'header_login_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'header_login_link',
		array(
			'label' => 'Add login link',
			'type' => 'text',
			'section' => 'header_section',
			'settings' => 'header_login_link'
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

	$wp_customize->add_setting(
		'footer_logo',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	$wp_customize->add_setting('footer_logo', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'kalni_customize_sanitize_footer_image',
	)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'my_footer_image',
			array(
				'label' => 'Footer logo',
				'settings' => 'footer_logo',
				'section' => 'footer_section',
				'priority' => 3,
			)
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


	// address
	//add setting
	$wp_customize->add_setting(
		'hide_footer_address',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'hide_footer_address',
		array(
			'label' => 'Hide footer contact information',
			'type' => 'checkbox',
			'section' => 'footer_section',
			'settings' => 'hide_footer_address'
		)
	);

	//add setting
	$wp_customize->add_setting(
		'footer_address_heading',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_addsetting_field',
			'transport' => 'refresh'
		)
	);

	//add control
	$wp_customize->add_control(
		'footer_address_heading',
		array(
			'label' => 'Add address heading',
			'type' => 'text',
			'section' => 'footer_section',
			'settings' => 'footer_address_heading'
		)
	);

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

	// copyright
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
	// $wp_customize->add_setting('footer_copyright_text', array(
	// 	'sanitize_callback' => 'sanitize_addsetting_field',
	// 	'type' => 'theme_mod',
	// 	'transport' => 'refresh',
	// ));

	// $wp_customize->add_control( new WP_Customize_Control( 
	// $wp_customize, 'footer_copyright_text_desc', 
	// 	array(
	// 		'type' => 'textarea',
	// 		'priority' => 20,
	// 		'section' => 'footer_section', 
	// 		'label' => 'Copyright text',
	// 		'settings' => 'footer_copyright_text',
	// 	) 
	// ) );
}
add_action('customize_register', 'kalni_footer_section_customize_register');


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


