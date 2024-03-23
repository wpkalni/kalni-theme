<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$single_cat = '';
$terms = get_the_terms( get_the_ID(), 'product_cat' );
if ( $terms && ! is_wp_error( $terms ) ) :
	if ( ! empty( $terms ) ) {
		$single_cat = $terms[0]->name;
	} 
endif;

// Stock quantity 
// $stock = get_post_meta( get_the_ID(), '_stock', true );

// Price 
$currency_symbol = get_woocommerce_currency_symbol();
if( $product->get_regular_price() ) : 
	$regular_price = $currency_symbol.$product->get_regular_price(); 
endif;
if( $product->get_price() ) : 
	$sale_price = $currency_symbol.$product->get_price(); 
endif;
	$wish =  '<div class="wishlist absolute right-0 flex justify-center align-center">
	'.do_shortcode( '[ti_wishlists_addtowishlist product_id="'.esc_attr( get_the_ID() ).'" variation_id="'.esc_attr( get_the_ID() ).'"]' ).'</div>';
	$quickview = '<div class="quickview absolute right-0">
	<a href="#" class="button yith-wcqv-button flex aling-center f-gap-20" data-product_id="'.esc_attr( get_the_ID() ).'" style="zoom: 1;"><span class="quickview-text">Quick View</span> 
		<i class="fa-solid fa-up-down-left-right"></i>
	</a></div>';
	$compare = '<div class="compare-wrap absolute right-0">
	<a href="'.esc_url( home_url( '/' ) ).'?action=yith-woocompare-add-product&amp;id='.esc_attr( get_the_ID() ).'" class="compare flex aling-center f-gap-20" data-product_id="'.esc_attr( get_the_ID() ).'" rel="nofollow"><span class="quickview-text">Compare</span>  <i class="fa-solid fa-shuffle"></i></a></div>';
?>
<div <?php wc_product_class( 'single-product-slide bg-white text-center br-12', $product ); ?>>
	<div class="product-thumb-wrap relative">
		<a href="<?php echo the_permalink( get_the_ID() ); ?>">
			<img src="<?php echo the_post_thumbnail_url('br-4'); ?>" alt="<?php echo esc_attr(the_title()); ?>">
		</a>
		<?php 
			if ( $product->get_featured() ) :
				$featured = esc_html( 'Featured' );
		?>
			<div class="featured-base bg-green clr-white justify-center align-center flex absolute top-0 left-0 fz-12 fw-500">
				<?php echo esc_html( $featured ); ?>
			</div>
		<?php
			else : 
				echo '';
			endif;
		?>
		<?php echo $wish; ?>
		<?php echo $quickview; ?>
		<?php echo $compare; ?>
	</div>
	<div class="product-slide-content text-left">

		<h4 class="product-card-title fz-16 fw-600 lh-21">
			<a class="clr-black" href="<?php echo the_permalink( get_the_ID() ); ?>">
				<?php echo esc_html( the_title() ); ?>
			</a>
		</h4>
		<div class="cat-name">
			<a class="fw-500" href="<?php echo get_category_link( get_the_ID() ); ?>">
				<?php echo esc_html( $single_cat ); ?>
			</a>
		</div>
		<div class="category-star-rating flex f-gap-5 align-center">
			<?php woocommerce_template_loop_rating(); ?>
		</div>

		<div class="product-price flex align-center f-gap-10">
			<?php if( !empty( $sale_price ) ) : ?>
				<div class="sale-price clr-blue fz-24 fw-600"><?php echo esc_html( $sale_price ); ?></div>
			<?php endif; 
			if( !empty( $regular_price ) ) : ?>
				<div class="regular-price clr-grey fz-16 fw-500"> <?php echo esc_html( $regular_price ); ?></div>
			<?php endif; 
			?>
		</div>

		<?php if ( $product->is_in_stock() ) { ?>
			<a href="<?php echo esc_url(home_url()); ?>/?add-to-cart=<?php echo esc_attr( get_the_ID() ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart flex align-center justify-center f-gap-5 bg-blue fw-500 clr-white fz-16 br-6" data-product_id="<?php echo esc_attr( get_the_ID() ); ?>" rel="nofollow">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
					<path d="M10.77 21C10.77 21.69 10.21 22.25 9.52002 22.25C8.83102 22.25 8.26501 21.69 8.26501 21C8.26501 20.31 8.82001 19.75 9.51001 19.75H9.52002C10.21 19.75 10.77 20.31 10.77 21ZM17.52 19.75H17.51C16.82 19.75 16.265 20.31 16.265 21C16.265 21.69 16.83 22.25 17.52 22.25C18.21 22.25 18.77 21.69 18.77 21C18.77 20.31 18.21 19.75 17.52 19.75ZM22.205 8.49197L21.191 14.658C20.928 16.104 20.274 17.75 17.5 17.75H9.23401C7.87501 17.75 6.70396 16.735 6.51196 15.389L5.00195 4.82397C4.91395 4.21197 4.38301 3.75098 3.76501 3.75098H3.5C3.086 3.75098 2.75 3.41498 2.75 3.00098C2.75 2.58698 3.086 2.25098 3.5 2.25098H3.76599C5.12499 2.25098 6.29604 3.26597 6.48804 4.61197L6.57996 5.25098H19.5C20.318 5.25098 21.0881 5.61097 21.6121 6.23897C22.1351 6.86597 22.352 7.68797 22.205 8.49197ZM20.459 7.19897C20.221 6.91397 19.871 6.74997 19.499 6.74997H6.79297L7.99695 15.177C8.08495 15.789 8.61601 16.25 9.23401 16.25H17.5C19.097 16.25 19.486 15.654 19.713 14.403L20.7271 8.23596C20.7961 7.85796 20.697 7.48397 20.459 7.19897ZM16 10.75H14.75V9.49997C14.75 9.08597 14.414 8.74997 14 8.74997C13.586 8.74997 13.25 9.08597 13.25 9.49997V10.75H12C11.586 10.75 11.25 11.086 11.25 11.5C11.25 11.914 11.586 12.25 12 12.25H13.25V13.5C13.25 13.914 13.586 14.25 14 14.25C14.414 14.25 14.75 13.914 14.75 13.5V12.25H16C16.414 12.25 16.75 11.914 16.75 11.5C16.75 11.086 16.414 10.75 16 10.75Z" fill="white"/>
				</svg> <?php esc_html_e( 'Add to cart', 'kalni' ); ?>
			</a>
		<?php } else { ?>
			<a href="<?php echo esc_url(home_url()); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart flex align-center justify-center f-gap-5 bg-red fw-500 clr-white fz-16 br-6">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M18 20.75H6C3.582 20.75 2.25 19.418 2.25 17V8C2.25 5.582 3.582 4.25 6 4.25H18C20.418 4.25 21.75 5.582 21.75 8V17C21.75 19.418 20.418 20.75 18 20.75ZM6 5.75C4.423 5.75 3.75 6.423 3.75 8V17C3.75 18.577 4.423 19.25 6 19.25H18C19.577 19.25 20.25 18.577 20.25 17V8C20.25 6.423 19.577 5.75 18 5.75H6ZM13.0291 13.179L17.9409 9.60699C18.2759 9.36399 18.35 8.89401 18.106 8.55901C17.863 8.22501 17.3951 8.149 17.0581 8.394L12.146 11.966C12.058 12.03 11.941 12.03 11.853 11.966L6.94092 8.394C6.60292 8.149 6.13607 8.22601 5.89307 8.55901C5.64907 8.89401 5.72311 9.36299 6.05811 9.60699L10.97 13.18C11.278 13.404 11.639 13.515 11.999 13.515C12.359 13.515 12.7221 13.403 13.0291 13.179Z" fill="white"/>
				</svg> <?php esc_html_e( 'Notify me', 'kalni' ); ?>
			</a>
		<?php } ?>

	</div>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' );
	?>
</div>
