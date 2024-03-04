<?php 

if ( ! defined('ABSPATH')) {
    exit;
}


/**
 * WooCommerce Widgets.
 */

if ( class_exists( 'WooCommerce' ) ) {

// Product cards/slider 
function kalni_product_card_slider($atts) {
    extract( shortcode_atts( array(
        'count' => '4',
    ), $atts ));

    $q = new WP_Query(
        array(
            'post_type'      => 'product',
            'posts_per_page' => $count,
            'orderby'        => 'menu_order',
            'order'          => 'DSC'    
        )
    );

    $html = '
    <div class="product-slider grid grid-4 g-gap-30">';

        while ( $q->have_posts() ) : 
            $q->the_post();
            global $product;
            $post_id = get_the_ID();
            $title = get_the_title( $post_id );

            $terms = get_terms('product_cat', array('hide_empty' => 0));
            
            // echo $current_cat->name;

            // $product = wc_get_product( $post_id );
            // $rating  = $product->get_average_rating();
            // $count   = $product->get_rating_count();

            // $ratings =  wc_get_rating_html( $rating, $count );
            // $category = get_the_category(); 
            $featured_product_ids = wc_get_featured_product_ids();

            $stock = get_post_meta( $post_id, '_stock', true );

            $html .= '
            <div class="single-product-slide bg-white text-center br-12">
                '.get_the_post_thumbnail($post_id, 'br-4').'
                <div class="product-slide-content text-left">
                    <h4 class="fz-16 fw-600 lh-21 clr-black">'.esc_html($title).'</h4>';
                    foreach($terms as $term  ) { 
                        $html .= '<p class="fz-16 fw-500 clr-black-light">'.$term->name.'</p>';
                    }
                    
                    $html .= ' 
                    ';
                    if ($average = $product->get_average_rating()) {
                        $html .= '<div class="category-star-rating"><div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div></div>';
                    }

                    if($stock > 0) {
                        $html .= '
                        <div class="product-stock clr-green"> <i class="fa-solid fa-check"></i> In stock: '.$stock.' Products</div>
                        ';
                    } else if($stock < 0) {
                        $html .= '
                        <div class="product-stock clr-red"><i class="fa-solid fa-xmark"></i> Out of stock</div>
                        ';
                    } else {
                        $html .= '';
                    }

                    $html .= '
                    <div class="product-price">'.$product->get_price_html().'</div>';

                    if($stock > 0) {
                        $html .= '
                        <a href="?add-to-cart='.get_the_ID().'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart  bg-blue fw-500 clr-white fz-16 br-6" data-product_id="'.get_the_ID().'" rel="nofollow"><i class="fa-solid fa-cart-shopping"></i> Add to cart</a>
                        ';
                    } else if($stock < 0) {
                        $html .= '
                        <a href="#!" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart bg-red fw-500 clr-white fz-16 br-6"><i class="fa-regular fa-envelope"></i> Notify me</a>
                        ';
                    } else {
                        $html .= '';
                    }

                    $html .= '
                </div>
            </div>
            ';
        endwhile;
    '</div>
    ';
    
    wp_reset_query();
    return $html;
}
add_shortcode( 'product_card_slider', 'kalni_product_card_slider' );




// Product category list 
function kalni_product_cat_box_slider($atts) {
	extract(shortcode_atts( array(
		'count'	=> '5',
	), $atts ));

	$terms = get_terms('product_cat', array('hide_empty' => 0));

    $html = '
    <div class="kalni-product-cat-box grid grid-'.esc_attr( $count ).' g-gap-30 align-center">';
    // pc-slider
        foreach ( $terms as $term )  {

            $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );

            $img = wp_get_attachment_url( $thumbnail_id );

            $html .= '
            <div class="single-product-cat-box br-4 bg-white-grey text-center">
                <a href="'.get_category_link( $term->term_id ).'">
                    <img src="'.$img.'" width="150"/>
                    <div class="cat-box-content flex justify-between f-gap-20 align-center text-left">
                        <div>
                            <h5 class="fz-16 fw-600 clr-black">'.$term->name.'</h5>
                            <span class="fz-14 fw-500 clr-black-light">'.$term->count.' items</span>
                        </div>
                        <i class="fa fa-arrow-right clr-black-light lh-33 text-center br-100"></i>
                    </div>
                    
                </a>
            </div>  
            
            ';
        }
	$html .= '</div>';

    return $html;
}
add_shortcode( 'product_cat_box', 'kalni_product_cat_box_slider' );




}