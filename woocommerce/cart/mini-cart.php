<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				/**
				 * This filter is documented in woocommerce/templates/cart/cart.php.
				 *
				 * @since 2.1.0
				 */
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							/* translators: %s is the product name */
							esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
					<?php if ( empty( $product_permalink ) ) : ?>
						<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php else : ?>
						<a class="shopping-cart-content flex align-center" href="<?php echo esc_url( $product_permalink ); ?>">
							<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
					<?php endif; ?>
					<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>
	<div class="shopping-cart-bottom absolute bottom-0 left-0 right-0">
		<p class="woocommerce-mini-cart__total total">
			<?php
			/**
			 * Hook: woocommerce_widget_shopping_cart_total.
			 *
			 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
			 */
			do_action( 'woocommerce_widget_shopping_cart_total' );
			?>
		</p>

		<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		<p class="woocommerce-mini-cart__buttons buttons grid align-center"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

		<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
	</div>

<?php else : ?>
	<div class="empty-cart-wrap text-center">
		<div class="empty-cart-icon bg-white br-100">
			<svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
				<path d="M12.9065 29.7545C12.2958 29.7545 11.7946 29.2847 11.732 28.674C11.6694 28.0319 12.1548 27.4524 12.7969 27.4055L29.8667 25.9804C34.6588 25.5732 35.3948 24.8685 35.9273 20.0764L37.1801 8.86357C37.2428 8.2215 37.8222 7.76735 38.4799 7.82999C39.122 7.90829 39.5918 8.48772 39.5135 9.1298L38.2607 20.3426C37.603 26.2623 35.9899 27.8283 30.0547 28.3294L13.0162 29.7545C12.9848 29.7545 12.9535 29.7545 12.9065 29.7545Z" fill="#354054"/>
				<path d="M40.3234 10.1791H9.00265C8.36058 10.1791 7.82812 9.64668 7.82812 9.00461C7.82812 8.36253 8.34492 7.83008 9.00265 7.83008H40.3234C40.9655 7.83008 41.4979 8.36253 41.4979 9.00461C41.4979 9.64668 40.9655 10.1791 40.3234 10.1791Z" fill="#354054"/>
				<path d="M9.00564 41.5C6.20243 41.5 3.91602 39.2136 3.91602 36.4104C3.91602 33.6072 6.18677 31.3208 9.00564 31.3208C11.8245 31.3208 14.0953 33.6072 14.0953 36.4104C14.0953 39.2136 11.8088 41.5 9.00564 41.5ZM9.00564 33.6699C7.50224 33.6699 6.26507 34.907 6.26507 36.4104C6.26507 37.9138 7.48658 39.151 9.00564 39.151C10.5247 39.151 11.7462 37.9138 11.7462 36.4104C11.7462 34.907 10.509 33.6699 9.00564 33.6699Z" fill="#354054"/>
				<path d="M30.5369 41.5C27.7337 41.5 25.4473 39.2136 25.4473 36.4104C25.4473 33.6072 27.7337 31.3208 30.5369 31.3208C33.3401 31.3208 35.6265 33.6072 35.6265 36.4104C35.6265 39.2136 33.3401 41.5 30.5369 41.5ZM30.5369 33.6699C29.0335 33.6699 27.7963 34.907 27.7963 36.4104C27.7963 37.9138 29.0335 39.151 30.5369 39.151C32.0403 39.151 33.2775 37.9138 33.2775 36.4104C33.2775 34.907 32.0403 33.6699 30.5369 33.6699Z" fill="#354054"/>
				<path d="M26.6215 37.5849H12.9187C12.2766 37.5849 11.7441 37.0524 11.7441 36.4104C11.7441 35.7683 12.2766 35.2358 12.9187 35.2358H26.6215C27.2636 35.2358 27.796 35.7683 27.796 36.4104C27.796 37.0524 27.2636 37.5849 26.6215 37.5849Z" fill="#354054"/>
				<path d="M10.2262 33.6698C9.97566 33.6698 9.72509 33.5915 9.50585 33.4192C8.98906 33.0277 8.89509 32.2917 9.2866 31.7749L11.1658 29.3475C11.6826 28.6898 11.8549 27.8598 11.6357 27.0611L5.82566 4.43189C5.51245 3.21038 4.36924 2.34906 3.05377 2.34906H1.17453C0.532453 2.34906 0 1.8166 0 1.17453C0 0.532453 0.516792 0 1.17453 0H3.06943C5.46547 0 7.53264 1.5817 8.11208 3.85245L13.9377 26.4817C14.3292 27.9851 14.0004 29.5511 13.0451 30.7883L11.1658 33.2157C10.9309 33.5132 10.5864 33.6698 10.2262 33.6698Z" fill="#354054"/>
			</svg>
		</div>
		<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
		<a href="/shop" class="button fz-14 fw-700 tt-capitalize clr-white bg-blue br-3"><?php esc_html_e( 'Continue Shopping', 'kalni' ); ?></a>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
