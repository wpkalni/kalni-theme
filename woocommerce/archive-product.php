<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

if ( is_active_sidebar( 'woocommerce' ) ) :
	$grid_count = esc_attr( ' grid-1-3' );
else :
	$grid_count = esc_attr( ' grid-1' );
endif;

?>

	<div class="woo-main-grid grid<?php echo $grid_count ?> g-gap-32">
		<?php if ( is_active_sidebar( 'woocommerce' ) ) : ?>
			<aside id="secondary" class="kalni-woo-sidebar">
				<?php dynamic_sidebar( 'woocommerce' ); ?>
			</aside>
		<?php endif; ?>
		<div class="woo-products-wrap">
			<div class="product-wrap-top flex justify-between align-center bg-white br-3">
				<header class="woocommerce-products-header">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="woocommerce-products-header__title page-title fz-22 fw-600 lh-26 clr-black-dark"><?php woocommerce_page_title();?></h1>
					<?php endif; ?>
					<div class="order-count-notice fz-14 lh-30 fw-400 clr-black-light">
						<?php 
							woocommerce_result_count();
							woocommerce_output_all_notices();
						?>
					</div>
					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>
				</header>
				<?php
				if ( woocommerce_product_loop() ) {
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					// do_action( 'woocommerce_before_shop_loop' );
				?>
				<div class="orderby-form flex align-center f-gap-5 fz-14 fw-400 lh-24 clr-black-dark"><?php esc_html_e( 'Sort by:', 'kalni' ); woocommerce_catalog_ordering(); ?></div>
			</div>
				
				<?php

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
			?>
		</div>
	</div>

<?php get_footer( 'shop' ); ?>
