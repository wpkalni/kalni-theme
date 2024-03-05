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
            'count' => '-1',
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
        <div class="product-slider">';

            while ( $q->have_posts() ) : 
                $q->the_post();
                global $product;
                $post_id = get_the_ID();
                $title = get_the_title( $post_id );

                $terms = get_the_terms( get_the_ID(), 'product_cat' );
                if ( $terms && ! is_wp_error( $terms ) ) :
                    if ( ! empty( $terms ) ) {
                        $single_cat = $terms[0]->name;
                    }
                endif;

                $stock = get_post_meta( $post_id, '_stock', true );

                $currency_symbol = get_woocommerce_currency_symbol();

                if( $product->get_regular_price() ) : 
                    $regular_price = $currency_symbol.$product->get_regular_price(); 
                endif;
                if( $product->get_price() ) : 
                    $sale_price = $currency_symbol.$product->get_price(); 
                endif;

                $html .= '
                <div class="single-product-slide bg-white text-center br-12">
                    <div class="product-thumb-wrap relative">
                        '.get_the_post_thumbnail($post_id, 'br-4').'';

                        if ( $product->get_featured() ) :
                            $featured = esc_html( 'Featured' );
                            $html .= '<div class="featured-base bg-green clr-white justify-center align-center flex absolute top-0 left-0 fz-12 fw-500">'.$featured.'</div>';
                        else : 
                            $html .= '';
                        endif;
                    $html .= '</div>
                    <div class="product-slide-content text-left">
                        <h4 class="fz-16 fw-600 lh-21 clr-black">'.esc_html($title).'</h4>
                        <div>'.$single_cat.'</div>';
                        
                        if ($average = $product->get_average_rating()) {
                            $html .= '<div class="category-star-rating flex f-gap-5 align-center"><div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div><span class="fz-16 fw-500 clr-grey">('.$product->get_review_count().')</span></div>';
                        }

                        if($stock > 0) {
                            $html .= '
                            <div class="product-stock"><span class="clr-green fw-500"><i class="fa-solid fa-check"></i> In stock:</span> <span class="fw-500 clr-black-light">'.$stock.'</span><span class="clr-grey fw-500"> Products</sapn></div>
                            ';
                        } else if($stock < 0) {
                            $html .= '
                            <div class="product-stock clr-red"><i class="fa-solid fa-xmark"></i> Out of stock</div>
                            ';
                        } else {
                            $html .= '';
                        }

                        $html .= '<div class="product-price flex align-center f-gap-10">';
                            if( !empty($sale_price) ) {
                                $html .= '<div class="sale-price clr-blue fz-24 fw-600">'.$sale_price.'</div>';
                            }
                            if( !empty($regular_price) ) {
                                $html .= '<div class="regular-price clr-grey fz-16 fw-500"> - ('.$regular_price.')</div>';
                            }
                        $html .= '</div>';

                        if($stock > 0) {
                            $html .= '
                            <a href="?add-to-cart='.get_the_ID().'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart d-block text-center bg-blue fw-500 clr-white fz-16 br-6" data-product_id="'.get_the_ID().'" rel="nofollow"><i class="fa-solid fa-cart-shopping"></i> Add to cart</a>
                            ';
                        } else if($stock < 0) {
                            $html .= '
                            <a href="#!" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart d-block text-center bg-red fw-500 clr-white fz-16 br-6"><i class="fa-regular fa-envelope"></i> Notify me</a>
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

        $terms = get_terms( 'product_cat', array( 'hide_empty' => false, 'parent' => 0 ) );

        $html = '
        <div class="pc-slider kalni-product-cat-box">';
        // pc-slider
            foreach ( $terms as $term )  {

                $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );

                $img = wp_get_attachment_url( $thumbnail_id );
                if($term->parent == 0) {
                    $html .= '
                    <div class="single-product-cat-box br-4 bg-white-grey text-center">
                        <a href="'.get_category_link( $term->term_id ).'">
                            <img class="d-inline-block" src="'.$img.'" width="150"/>
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
            }
        $html .= '</div>';

        return $html;
    }
    add_shortcode( 'product_cat_box', 'kalni_product_cat_box_slider' );

}


// Blog posts
function kalni_blog_posts($atts) {
    extract( shortcode_atts( array(
        'count' => '-1'
    ), $atts ));


    $q = new WP_Query( 
        array(
            'posts_per_page' => $count,
            'post_type'      => 'post',
            'orderby'        => 'menu_order',
            'order'          => 'DSC',
            'post_status'	=> 'publish',
        ) 
    );
        $html = '
        <div class="kalni-post-grid grid grid-4 align-center g-gap-30">';
            while ( $q->have_posts()) :
                $q->the_post();
                $post_id = get_the_ID();
                $link = get_the_permalink( $post_id );
                $thumb = get_the_post_thumbnail( $post_id, 'full' );
                $title = get_the_title( $post_id );
                $date = get_the_date( 'd.m.y', $post_id );
                $author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
                $author = get_the_author( $post_id );

                $html .= '
                    <div class="single-post-grid text-center bg-white br-12">
                        '.$thumb.'
                        
                        <div class="post-grid-content">
                            <div class="post-grid-meta flex align-center justify-center f-gap-10">
                                <span class="author-by fz-16 fw-400 lh-16 clr-grey">by</span>
                                <a class="fz-16 fw-400 lh-16 clr-black-light" href="'.esc_url( $author_link ).'" class="author-name">'.$author.'</a>
                                <a class="fz-16 fw-400 lh-16 clr-grey" href="'.esc_url( $link ).'" class="author-name"> - '.esc_html( $date ).'</a>
                            </div>
                            <a href="'.esc_url( $link ).'"><h3 class="fz-16 fw-500 lh-16 clr-black">'.esc_html( $title ).'</h3></a>
                            <a class="fz-16 fw-400 lh-16 clr-grey readmore-btn" href="'.esc_url( $link ).'" class="author-name">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                ';
            endwhile;
        '</div>';
    wp_reset_query();
    return $html;
        
}
add_shortcode( 'blog_posts', 'kalni_blog_posts' );