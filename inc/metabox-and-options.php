<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


//Admin FrameWork

if( class_exists( 'CSF' ) ) {

    $prefix = 'msitheme';



    CSF::createOptions( $prefix, array(
        'framework_title' => 'Theme Options <small>by msitheme</small>',
        'framework_class' => '',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
    ) );


    CSF::createSection( $prefix, array(
        'title'  => 'Header Area',
        'fields' => array(
            array(
                'id'            => 'header_top_bg',
                'type'          => 'color',
                'title'         => 'Header top area background color',
            ),
            array(
                'id'            => 'top_email',
                'type'          => 'text',
                'title'         => 'Email',
            ),
            array(
                'id'            => 'top_number',
                'type'          => 'text',
                'title'         => 'Phone number',
            ),
            array(
                'id'            => 'header_icon',
                'type'          => 'repeater',
                'title'         => 'Choose social icon',
                'fields'        => array(
                    array(
                        'id'    => 'social_icon',
                        'type'  => 'icon',
                        'title' => 'Choose Icon'
                    ),
                    array(
                        'id'    => 'social_url',
                        'type'  => 'text',
                        'title' => 'Social Url'
                    ),
                    array(
                        'id'    => 'icon_bg',
                        'type'  => 'color',
                        'title' => 'Icon background color'
                    ),
                    array(
                        'id'    => 'icon_color',
                        'type'  => 'color',
                        'title' => 'Icon color'
                    ),
                ),
            ),
            array(
                'id'            => 'black_logo',
                'type'          => 'media',
                'title'         => 'Header Black Logo',
            ),  
        )
    ) );



    CSF::createSection( $prefix, array(
        'title'  => 'Footer Area',
        'fields' => array(
            array(
                'id'            => 'footer_top_bg',
                'type'          => 'color',
                'title'         => 'Footer top area background color',
            ),
            array(
                'id'            => 'form_heading',
                'type'          => 'text',
                'title'         => 'Footer form title',
            ),
            array(
                'id'            =>  'form_shortcode',
                'type'          =>  'text',
                'title'         =>  'Form shortcode',
                'placeholder'   =>  '[gravityform id="1" title="false" description="false" ajax="true"]'
            ),
            array(
                'id'            => 'footer_logo',
                'type'          => 'media',
                'title'         => 'Footer Logo',
            ),          
            array(
                'id'            => 'footer_social_title',
                'type'          => 'text',
                'title'         => 'Footer social title',
            ),          
            array(
                'id'            => 'footer_icon',
                'type'          => 'repeater',
                'title'         => 'Choose social icon',
                'fields'        => array(
                    array(
                        'id'    => 'social_icon',
                        'type'  => 'icon',
                        'title' => 'Choose Icon'
                    ),
                    array(
                        'id'    => 'social_url',
                        'type'  => 'text',
                        'title' => 'Social Url'
                    ),
                    array(
                        'id'    => 'icon_bg',
                        'type'  => 'color',
                        'title' => 'Icon background color'
                    ),
                    array(
                        'id'    => 'icon_color',
                        'type'  => 'color',
                        'title' => 'Icon color'
                    ),
                ),
            ),
            array(
                'id'            =>  'footer_contact_title',
                'type'          =>  'text',
                'title'         =>  'Contact info title',
                'placeholder'   =>  'Contact'
            ),
            array(
                'id'            => 'footer_contact_info',
                'type'          => 'repeater',
                'title'         => 'Contact Information',
                'fields'        => array(
                    array(
                        'id'    => 'social_icon',
                        'type'  => 'icon',
                        'title' => 'Choose Icon'
                    ),
                    array(
                        'id'    => 'icon_color',
                        'type'  => 'color',
                        'title' => 'Choose Icon color'
                    ),
                    array(
                        'id'    => 'url',
                        'type'  => 'text',
                        'title' => 'Url'
                    ),
                    array(
                        'id'    => 'label',
                        'type'  => 'text',
                        'title' => 'Label'
                    ),
                ),
            ),
            array(
                'id'            => 'footer_bottom_bg',
                'type'          => 'color',
                'title'         => 'Footer bottom area background color',
            ),
            array(
                'id'            => 'msi_copyright',
                'type'          => 'text',
                'title'         => 'Type copyright text',
                'placeholder'   =>  'Type your copyright text here.'
            ),
            array(
                'id'            =>  'copyright_menu',
                'type'          =>  'select',
                'title'         =>  'Choose footer menu',
                'placeholder'   =>  'Choose a menu',
                'options'       =>  'menus'
            )
        )
    ) );


}




//Metabox Options
if( class_exists( 'CSF' ) ) {


    //Page Metabox
    $prefix = 'msi_page';

    CSF::createMetabox( $prefix, array(
        'title'     => 'Page Options',
        'post_type' => 'page',
    ) );

    CSF::createSection( $prefix, array(
        'fields' => array(
            array(
                'id'    => 'logo_type',
                'type'  => 'select',
                'default' => 'white',
                'title' => esc_html__('Logo Type', 'msitheme'),
                'options'  => array(
                    'white'  => esc_html__('White Logo', 'msitheme'),
                    'black'  => esc_html__('Black Logo', 'msitheme'),
                ),
            ),
            array(
                'id'    => 'enable_breadcrumb',
                'type'  => 'switcher',
                'default' => false,
                'title' => esc_html__('Enable Breadcrumb', 'msitheme'),
            ),
            array(
                'id'        => 'bread_title',
                'type'      => 'text',
                'title'     => 'Page Title',
                'dependency' => array( 'enable_breadcrumb', '==', 'true' ),
            ),
            array(
                'id'        => 'bread_color',
                'type'      => 'color',
                'title'     => 'Color',
                'subtitle'  => 'Choose breadcrumb background color.',
                'default'   => '#c4af91',
                'dependency' => array( 'enable_breadcrumb', '==', 'true' ),
            ),
        )
    ) );

}



























