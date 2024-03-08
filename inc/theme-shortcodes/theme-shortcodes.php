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
                $permalink = get_the_permalink( $post_id );
                $title = get_the_title( $post_id );

                $terms = get_the_terms( get_the_ID(), 'product_cat' );
                if ( $terms && ! is_wp_error( $terms ) ) :
                    if ( ! empty( $terms ) ) {
                        $single_cat = $terms[0]->name;
                        $single_cat_link = get_category_link( $terms[0]->term_id );
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
                        <a href="'.esc_url( $permalink ).'"><h4 class="fz-16 fw-600 lh-21 clr-black">'.esc_html($title).'</h4></a>
                        <div><a href="'.esc_url( $single_cat_link ).'">'.esc_html( $single_cat ).'</a></div>';
                        
                        if ($average = $product->get_average_rating()) {
                            $html .= '<div class="category-star-rating flex f-gap-5 align-center"><div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div><span class="fz-16 fw-500 clr-grey">('.$product->get_review_count().')</span></div>';
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
                            <div class="product-stock"><span class="clr-green fw-500"><i class="fa-solid fa-check"></i> In stock:</span> <span class="fw-500 clr-black-light">'.$stock.'</span><span class="clr-grey fw-500"> Products</sapn></div>
                            ';
                        } else if($stock < 0) {
                            $html .= '
                            <div class="product-stock clr-red"><i class="fa-solid fa-xmark"></i> Out of stock</div>
                            ';
                        } else {
                            $html .= '';
                        }

                        if($stock > 0) {
                            $html .= '
                            <a href="'.esc_url(home_url()).'/?add-to-cart='.esc_attr( $post_id ).'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart flex align-center justify-center f-gap-5 bg-blue fw-500 clr-white fz-16 br-6" data-product_id="'.esc_attr( $post_id ).'" rel="nofollow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                    <path d="M10.77 21C10.77 21.69 10.21 22.25 9.52002 22.25C8.83102 22.25 8.26501 21.69 8.26501 21C8.26501 20.31 8.82001 19.75 9.51001 19.75H9.52002C10.21 19.75 10.77 20.31 10.77 21ZM17.52 19.75H17.51C16.82 19.75 16.265 20.31 16.265 21C16.265 21.69 16.83 22.25 17.52 22.25C18.21 22.25 18.77 21.69 18.77 21C18.77 20.31 18.21 19.75 17.52 19.75ZM22.205 8.49197L21.191 14.658C20.928 16.104 20.274 17.75 17.5 17.75H9.23401C7.87501 17.75 6.70396 16.735 6.51196 15.389L5.00195 4.82397C4.91395 4.21197 4.38301 3.75098 3.76501 3.75098H3.5C3.086 3.75098 2.75 3.41498 2.75 3.00098C2.75 2.58698 3.086 2.25098 3.5 2.25098H3.76599C5.12499 2.25098 6.29604 3.26597 6.48804 4.61197L6.57996 5.25098H19.5C20.318 5.25098 21.0881 5.61097 21.6121 6.23897C22.1351 6.86597 22.352 7.68797 22.205 8.49197ZM20.459 7.19897C20.221 6.91397 19.871 6.74997 19.499 6.74997H6.79297L7.99695 15.177C8.08495 15.789 8.61601 16.25 9.23401 16.25H17.5C19.097 16.25 19.486 15.654 19.713 14.403L20.7271 8.23596C20.7961 7.85796 20.697 7.48397 20.459 7.19897ZM16 10.75H14.75V9.49997C14.75 9.08597 14.414 8.74997 14 8.74997C13.586 8.74997 13.25 9.08597 13.25 9.49997V10.75H12C11.586 10.75 11.25 11.086 11.25 11.5C11.25 11.914 11.586 12.25 12 12.25H13.25V13.5C13.25 13.914 13.586 14.25 14 14.25C14.414 14.25 14.75 13.914 14.75 13.5V12.25H16C16.414 12.25 16.75 11.914 16.75 11.5C16.75 11.086 16.414 10.75 16 10.75Z" fill="white"/>
                                </svg> Add to cart
                            </a>
                            ';
                        } else if($stock < 0) {
                            $html .= '
                            <a href="'.esc_url(home_url()).'/?add-to-cart='.esc_attr( $post_id ).'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart flex align-center justify-center f-gap-5 bg-red fw-500 clr-white fz-16 br-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 20.75H6C3.582 20.75 2.25 19.418 2.25 17V8C2.25 5.582 3.582 4.25 6 4.25H18C20.418 4.25 21.75 5.582 21.75 8V17C21.75 19.418 20.418 20.75 18 20.75ZM6 5.75C4.423 5.75 3.75 6.423 3.75 8V17C3.75 18.577 4.423 19.25 6 19.25H18C19.577 19.25 20.25 18.577 20.25 17V8C20.25 6.423 19.577 5.75 18 5.75H6ZM13.0291 13.179L17.9409 9.60699C18.2759 9.36399 18.35 8.89401 18.106 8.55901C17.863 8.22501 17.3951 8.149 17.0581 8.394L12.146 11.966C12.058 12.03 11.941 12.03 11.853 11.966L6.94092 8.394C6.60292 8.149 6.13607 8.22601 5.89307 8.55901C5.64907 8.89401 5.72311 9.36299 6.05811 9.60699L10.97 13.18C11.278 13.404 11.639 13.515 11.999 13.515C12.359 13.515 12.7221 13.403 13.0291 13.179Z" fill="white"/>
                                </svg> Notify me
                            </a>
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