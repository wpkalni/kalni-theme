<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Kalni
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function kalni_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 500,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'kalni_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function kalni_woocommerce_scripts() {
	wp_enqueue_style( 'kalni-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'kalni-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'kalni_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function kalni_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'kalni_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function kalni_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'kalni_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'kalni_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function kalni_woocommerce_wrapper_before() {
		?>
			<?php if (is_single()) :	?>
				<div class="single-product-breadcrumb bg-white">
					<div class="container-85">
						<?php woocommerce_breadcrumb(); ?>
					</div>
				</div>
			<?php endif; ?>
			<main id="primary" class="site-main kalni-woo-wrapper">
				<div class="container-85">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'kalni_woocommerce_wrapper_before' );

if ( ! function_exists( 'kalni_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function kalni_woocommerce_wrapper_after() {
		?>
				</div>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'kalni_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'kalni_woocommerce_header_cart' ) ) {
			kalni_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'kalni_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function kalni_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		kalni_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'kalni_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'kalni_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function kalni_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'kalni' ); ?>">
				<?php
				$item_count_text = sprintf(
					/* translators: number of items in the mini cart. */
					_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'kalni' ),
					WC()->cart->get_cart_contents_count()
				);
				?>
			</span>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'kalni_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function kalni_woocommerce_header_cart() {
	
		?>

		<div id="site-header-cart" class="site-header-cart">
		<i class="fa fa-shopping-cart clr-grey fz-18" aria-hidden="true"></i>
				<?php kalni_woocommerce_cart_link(); ?>
		</div>	
		<div class="mini-cart-content">
			<div id="site-header-cart" class="site-header-cart">
				<?php
					$instance = array(
						'title' => '',
					);
					the_widget( 'WC_Widget_Cart', $instance );
				?>
			</div>
		</div>
		
		<?php
	}
}

add_action( 'woocommerce_single_product_summary', 'kalni_product_sold_count', 11 );
  
function kalni_product_sold_count() {
   global $product;
   $units_sold = $product->get_total_sales();
   if ( $units_sold ) echo '<span class="fz-13 fw-400 lh-26 clr-black-light">' . sprintf( __( 'Sold: %s', 'woocommerce' ), $units_sold ) . '</span>';
}


// Plus minus in product 
// 1. Show plus minus buttons
add_action( 'woocommerce_after_quantity_input_field', 'metiro_display_quantity_plus' ); 
function metiro_display_quantity_plus() {
   echo '<button type="button" class="plus" >+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'metiro_display_quantity_minus' ); 
function metiro_display_quantity_minus() {
   echo '<button type="button" class="minus" >-</button>';
}
  
// 2. Trigger update quantity script
add_action( 'wp_footer', 'kalni_add_cart_quantity_plus_minus' );
function kalni_add_cart_quantity_plus_minus() {
   if ( ! is_product() && ! is_cart() ) return; 
   wc_enqueue_js( "          
      $('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max );
            } else {
               qty.val( val + step );
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min );
            } else if ( val > 1 ) {
               qty.val( val - step );
            }
         }
 
      });
        
   " );
} 

// Add buy now button in product page 
add_action( 'woocommerce_after_shop_loop_item', 'cssigniter_buy_now_button', 15 );
add_action( 'woocommerce_after_add_to_cart_button', 'cssigniter_buy_now_button' );
function cssigniter_buy_now_button() {
	global $product;

	if ( 'simple' !== $product->get_type()
	|| ! $product->is_purchasable()
	|| ! $product->is_in_stock() ) {
		return;
	}

	$id = $product->get_ID();

	$classes = implode(
		' ',
		array_filter(
			array(
				'button',
				'product_type_' . $product->get_type(),
				'add_to_cart_button',
			)
		)
	);

	ob_start();

	?>
	<a
	href="<?php echo esc_url( wc_get_checkout_url() ); ?>?add-to-cart=<?php echo absint( $id ); ?>"
	class="<?php echo esc_attr( $classes ); ?> bg-blue clr-white fz-14 fw-700 lh-42 tt-capitalize"
	rel="nofollow">
	<?php echo esc_html_e( 'Buy Now', 'kalni' ); ?>
	</a>

	<?php

	echo ob_get_clean();
}


// Display product attributes in product 
add_action( 'woocommerce_single_product_summary', 'kalni_display_product_attributes', 25 );
function kalni_display_product_attributes(){
    // HERE define the desired product attributes to be displayed
    $defined_attributes = array('fyllighet', 'carrier', 'billing-e-number');

    global $product;
    $attributes = $product->get_attributes();

    if ( ! $attributes ) {
        return;
    }

    $out = '<ul class="kalni-attributes">';

    foreach ( $attributes as $attribute ) {

        // Get the product attribute slug from the taxonomy
        $attribute_slug = str_replace( 'pa_', '', $attribute->get_name() );

        // skip all non desired product attributes
        if ( ! in_array($attribute_slug, $defined_attributes) ) {
            continue;
        }

        // skip variations
        if ( $attribute->get_variation() ) {
            continue;
        }

        $name = $attribute->get_name();

        if ( $attribute->is_taxonomy() ) {

            $terms = wp_get_post_terms( $product->get_id(), $name, 'all' );
            // get the taxonomy
            $tax = $terms[0]->taxonomy;
            // get the tax object
            $tax_object = get_taxonomy($tax);
            // get tax label
            if ( isset ( $tax_object->labels->singular_name ) ) {
                $tax_label = $tax_object->labels->singular_name;
            } elseif ( isset( $tax_object->label ) ) {
                $tax_label = $tax_object->label;
                // Trim label prefix since WC 3.0
                if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                   $tax_label = substr( $tax_label, 8 );
                }                
            }

            $out .= '<li class="' . esc_attr( $name ) . '">';
            $out .= '<p class="attribute-label">' . esc_html( $tax_label ) . ': </p> ';
            $tax_terms = array();

            foreach ( $terms as $term ) {
                $single_term = esc_html( $term->name );
                // Insert extra code here if you want to show terms as links.
                array_push( $tax_terms, $single_term );
            }

            $out .= '<span class="attribute-value">' . implode(', ', $tax_terms) . '</span><progress value="' . implode(', ', $tax_terms) .
            '" max="10"><div class="progress-bar"><span style="width:'
            . implode(', ', $tax_terms) . '0%">'
            . implode(', ', $tax_terms) . '</span></div></progress></li>';

        } else {
            $value_string = implode( ', ', $attribute->get_options() );
            $out .= '<li class="' . sanitize_title($name) . ' ' . sanitize_title( $value_string ) . '">';
            $out .= '<p class="attribute-label">' . $name . ': </p> ';
            $out .= '<progress value="' . esc_html( $value_string ) . '" max="10"></progress></li>';
        }
    }

    $out .= '</ul>';

    echo $out;
}


// Customer Registration
function kalni_wc_registration_form() {
   if ( is_user_logged_in() ) return '<p>You are already registered</p>';
   ob_start();
   do_action( 'woocommerce_before_customer_login_form' );
   $html = wc_get_template_html( 'myaccount/form-login.php' );
   $dom = new DOMDocument();
   $dom->encoding = 'utf-8';
   $dom->loadHTML( utf8_decode( $html ) );
   $xpath = new DOMXPath( $dom );
   $form = $xpath->query( '//form[contains(@class,"register")]' );
   $form = $form->item( 0 );
   echo $dom->saveXML( $form );
   return ob_get_clean();
}
add_shortcode( 'kalni_wc_reg_form', 'kalni_wc_registration_form' );

// Customer Login
add_shortcode( 'kalni_wc_login_form', 'kalni_wc_login_form' );
function kalni_wc_login_form() {
   if ( is_user_logged_in() ) return '<p>You are already logged in</p>'; 
   ob_start();
   do_action( 'woocommerce_before_customer_login_form' );
   woocommerce_login_form( array( 'redirect' => wc_get_page_permalink( 'myaccount' ) ) );
   return ob_get_clean();
}