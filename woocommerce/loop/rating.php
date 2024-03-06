<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}
if ( $product->get_review_count() == 1 ) {
	$review = esc_html( '('.$product->get_review_count().' review)' );
} else if ( $product->get_review_count() > 1 ) {
	$review = esc_html( '('.$product->get_review_count().' reviews)' );
} else {
	$review = '';
}

echo wc_get_rating_html( $product->get_average_rating() ); // WordPress.XSS.EscapeOutput.OutputNotEscaped.
?>
<span class="fz-16 fw-500 clr-grey"><?php echo $review;?></span>
