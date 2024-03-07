<?php
/**
 * Kalni functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kalni
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kalni_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Kalni, use a find and replace
		* to change 'kalni' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kalni', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kalni' ),
		)
	);
	register_nav_menus(
		array(
			'menu-2' => esc_html__( 'Category', 'kalni' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kalni_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 58,
			'width'       => 113,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kalni_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kalni_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kalni_content_width', 640 );
}
add_action( 'after_setup_theme', 'kalni_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kalni_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kalni' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kalni' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title tt-capitalize">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'kalni' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'kalni' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'kalni' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'kalni' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title fw-600 fz-24 clr-black tt-capitalize">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'kalni' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'kalni' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title fw-600 fz-24 clr-black tt-capitalize">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'WooCommerce sidebar', 'kalni' ),
			'id'            => 'woocommerce',
			'description'   => esc_html__( 'Add widgets here.', 'kalni' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title fz-14 fw-600 lh-24 clr-black tt-capitalize">',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'kalni_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kalni_scripts() {
	
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), 'all' );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap', array(), 'all' );
	wp_enqueue_style( 'default-style', get_template_directory_uri() . '/assets/css/default.css', array(), _S_VERSION, 'all' );
	wp_enqueue_style( 'kalni-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kalni-style', 'rtl', 'replace' );

	// wp_enqueue_script( 'kalni-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'kalni-script', get_template_directory_uri() . '/assets/js/kalni-script.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kalni_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer settings.
 */
require get_template_directory() . '/inc/kalni-settings.php';

/**
 * Theme shortcodes.
 */
require get_template_directory() . '/inc/theme-shortcodes/theme-shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * WooCommerce mini cart shortcode
 */
function kalni_mini_cart_shortcode($atts) { 

    echo '<a href="#" class="kalni-minicart-dropdown relative" data-toggle="dropdown"> ';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
				<path d="M8.4898 18.9998C8.0998 18.9998 7.7798 18.6998 7.7398 18.3098C7.6998 17.8998 8.00981 17.5298 8.41981 17.4998L19.3198 16.5898C22.3798 16.3298 22.8498 15.8798 23.1898 12.8198L23.9898 5.65978C24.0298 5.24978 24.3998 4.95978 24.8198 4.99978C25.2298 5.04978 25.5298 5.41978 25.4798 5.82978L24.6798 12.9898C24.2598 16.7698 23.2298 17.7698 19.4398 18.0898L8.5598 18.9998C8.5398 18.9998 8.5198 18.9998 8.4898 18.9998Z" fill="#354054"/>
				<path d="M26 6.5H6C5.59 6.5 5.25 6.16 5.25 5.75C5.25 5.34 5.58 5 6 5H26C26.41 5 26.75 5.34 26.75 5.75C26.75 6.16 26.41 6.5 26 6.5Z" fill="#354054"/>
				<path d="M6 26.5C4.21 26.5 2.75 25.04 2.75 23.25C2.75 21.46 4.2 20 6 20C7.8 20 9.25 21.46 9.25 23.25C9.25 25.04 7.79 26.5 6 26.5ZM6 21.5C5.04 21.5 4.25 22.29 4.25 23.25C4.25 24.21 5.03 25 6 25C6.97 25 7.75 24.21 7.75 23.25C7.75 22.29 6.96 21.5 6 21.5Z" fill="#354054"/>
				<path d="M19.75 26.5C17.96 26.5 16.5 25.04 16.5 23.25C16.5 21.46 17.96 20 19.75 20C21.54 20 23 21.46 23 23.25C23 25.04 21.54 26.5 19.75 26.5ZM19.75 21.5C18.79 21.5 18 22.29 18 23.25C18 24.21 18.79 25 19.75 25C20.71 25 21.5 24.21 21.5 23.25C21.5 22.29 20.71 21.5 19.75 21.5Z" fill="#354054"/>
				<path d="M17.25 24H8.5C8.09 24 7.75 23.66 7.75 23.25C7.75 22.84 8.09 22.5 8.5 22.5H17.25C17.66 22.5 18 22.84 18 23.25C18 23.66 17.66 24 17.25 24Z" fill="#354054"/>
				<path d="M6.78 21.5C6.62 21.5 6.46 21.45 6.32 21.34C5.99 21.09 5.93 20.62 6.18 20.29L7.38 18.74C7.71 18.32 7.82 17.79 7.68 17.28L3.97 2.83C3.77 2.05 3.04 1.5 2.2 1.5H1C0.59 1.5 0.25 1.16 0.25 0.75C0.25 0.34 0.58 0 1 0H2.21C3.74 0 5.06 1.01 5.43 2.46L9.15 16.91C9.4 17.87 9.19 18.87 8.58 19.66L7.38 21.21C7.23 21.4 7.01 21.5 6.78 21.5Z" fill="#354054"/>
			</svg>';
		echo '<span class="count-cart-items cart-count absolute bg-red clr-white br-100 text-center">';
			echo WC()->cart->get_cart_contents_count();
		echo '</span>';
    echo '</a>';
    echo '<ul class="kalni-minicart-dropdown-menu dropdown-menu-mini-cart list-unstyled">';
        echo '<li>';
            echo '<div class="widget_shopping_cart_content">';
                woocommerce_mini_cart();
            echo '</div>';
        echo '</li>';
    echo '</ul>';
}
add_shortcode( 'kalni_mini_cart', 'kalni_mini_cart_shortcode' );


