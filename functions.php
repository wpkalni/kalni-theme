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
	add_image_size( 'blog-img', 306, 196, true );
	add_image_size( 'blog-single-img', 922, 489, true );

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

	if (is_woocommerce()) {
		wp_enqueue_script( 'added-popup-js', get_template_directory_uri() . '/assets/js/kalni-script.js', array("jquery"));
		add_thickbox();
	}

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
 * Neumeric pagination.
 */
require get_template_directory() . '/inc/neumeric-pagination.php';

/**
 * Next prev post link
 */
require get_template_directory() . '/inc/next-prev-post.php';

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

/*
  ==================
  * WooCommerce Ajax Product Search Code
 ======================	 
 */
 // ajax fetch function
 add_action( 'wp_footer', 'kalni_ajax_fetch' );
 function kalni_ajax_fetch() { ?>
	<script type="text/javascript">
	function kalni_fetch(){
	
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'kalni_data_fetch', keyword: jQuery('#keyword').val(), pcat: jQuery('#cat').val() },
			success: function(data) {
				jQuery('#datafetch').html( data );
			}
		});
	
	}
	</script>
 <?php
 }
 
 // the ajax function
 add_action('wp_ajax_kalni_data_fetch' , 'kalni_data_fetch');
 add_action('wp_ajax_nopriv_kalni_data_fetch','kalni_data_fetch');
 function kalni_data_fetch(){
	if ($_POST['pcat']) {
		$product_cat_id = array(esc_attr( $_POST['pcat'] ));
	}else {
		$terms = get_terms( 'product_cat' ); 
		$product_cat_id = wp_list_pluck( $terms, 'term_id' );
	}
	$the_query = new WP_Query( 
		array( 
			'posts_per_page' => -1, 
			's' => esc_attr( $_POST['keyword'] ), 
			'post_type' => array('product'),
			
			'tax_query' => array(
				array(
					'taxonomy'  => 'product_cat',
					'field'     => 'term_id',
					'terms'     => $product_cat_id,
					'operator'  => 'IN',
				)
		    )
		) 
	);
	if( $the_query->have_posts() ) :
		echo '<ul class="list-unstyled">';
		while( $the_query->have_posts() ): $the_query->the_post(); ?>
			<li>
                <a href="<?php echo esc_url( post_permalink() ); ?>">
                    <span>
                        <?php the_post_thumbnail('thumbnail')?>
                    </span>
                    <?php the_title();?>
                </a>
            </li>
		<?php endwhile;
	echo '</ul>';
		wp_reset_postdata();  
	endif;
	
    die();
}