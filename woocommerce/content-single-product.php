<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

defined('ABSPATH') || exit;

global $product;

$attribute = $product->get_attribute('brand');

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="kalni-woo-single-grid grid grid-3-4 g-gap-30 bg-white br-8">
		<div class="kalni-product-image-wrap">
			<?php $attachment_ids = $product->get_gallery_image_ids(); if(!empty($attachment_ids)) : ?>
				
				<div class="product-gallery-wrap">
					<div class="product-small-imgs">
						<?php foreach ( $attachment_ids as $s_img ) : ?>
							<div class="small-img-gallery">
								<img width="75" src="<?php echo wp_get_attachment_image_url( $s_img, 'thumbnail' ); ?>" alt="<?php echo get_the_title(); ?>">
							</div>
						<?php endforeach; ?>
					</div>
					<div class="product-big-imgs">
						<?php foreach ( $attachment_ids as $b_img ) : ?>
							<div class="big-img-gallery">
								<img src="<?php echo wp_get_attachment_image_url( $b_img, 'full' ); ?>" alt="<?php echo get_the_title(); ?>">
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php else : the_post_thumbnail('large'); endif; ?>
		</div>
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		// do_action( 'woocommerce_before_single_product_summary' );
		// woocommerce_show_product_images();
		?>
		<div class="summary entry-summary">
			<?php
			woocommerce_template_single_title();
			woocommerce_template_single_rating();
			woocommerce_template_single_price();
			woocommerce_template_single_excerpt();
			woocommerce_template_single_add_to_cart();
			woocommerce_template_single_meta();
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			// do_action( 'woocommerce_single_product_summary' );
			

			echo kalni_display_product_attributes();

			echo '<li class="list-unstyled fz-14 lh-36 clr-black-dark fw-400 text-left">' . $attribute . '';

			woocommerce_template_single_sharing();
			?>
		</div>
	</div>
		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
		?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
