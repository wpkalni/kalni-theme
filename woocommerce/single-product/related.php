<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
if ( $related_products ) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'You may also like', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2 class="flex justify-between align-center bg-white br-8 fz-24 fw-600 lh-40 clr-black">
				<?php echo esc_html( $heading ); ?> 
				<a class="clr-black fz-16 fw-500" href="<?php echo esc_url( $shop_page_url ); ?>">
					<?php esc_html_e( 'View All Products ', 'kalni' ); ?>
					<i class="fa fa-angle-right"></i>
				</a> 
			</h2>
		<?php endif; ?>
		<div class="related-products">
			<?php //woocommerce_product_loop_start(); ?>

				<?php //foreach ( $related_products as $related_product ) : ?>

						<?php
						// $post_object = get_post( $related_product->get_id() );

						//setup_postdata( $GLOBALS['post'] =& $post_object ); 
						// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

						//wc_get_template_part( 'content', 'product' );
						?>

				<?php //endforeach; ?>

			<?php //woocommerce_product_loop_end(); ?>
			<?php echo do_shortcode( '[product_card_slider]' ); ?>
		</div>
	</section>
	<?php
endif;

wp_reset_postdata();
