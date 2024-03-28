<?php

if (!defined('ABSPATH')) {
    exit;
}


/**
 * WooCommerce Widgets.
 */

if (class_exists('WooCommerce')) {
    // Product cards/slider 
    function kalni_product_card_slider($atts)
    {
        extract(shortcode_atts(
            array(
                'count' => '-1',
            ), $atts));

        $q = new WP_Query(
            array(
                'post_type' => 'product',
                'posts_per_page' => $count,
                'orderby' => 'menu_order',
                'order' => 'DSC'
            )
        );

        $html = '
        <div class="product-slider">';
            while ($q->have_posts()):
                $q->the_post();
                global $product;
                $post_id = get_the_ID();
                $permalink = get_the_permalink($post_id);
                $title = get_the_title($post_id);

                $terms = get_the_terms(get_the_ID(), 'product_cat');
                if ($terms && !is_wp_error($terms)):
                    if (!empty ($terms)) {
                        $single_cat = $terms[0]->name;
                        $single_cat_link = get_category_link($terms[0]->term_id);
                    }
                endif;

                $currency_symbol = get_woocommerce_currency_symbol();

                if ($product->get_regular_price()):
                    $regular_price = $currency_symbol . $product->get_regular_price();
                endif;
                if ($product->get_price()):
                    $sale_price = $currency_symbol . $product->get_price();
                endif;


                $html .= '
                <div class="single-product-slide bg-white text-center br-12">
                    <div class="product-thumb-wrap relative">
                        <a href="'.get_the_permalink( get_the_ID() ).'">' . get_the_post_thumbnail($post_id, 'br-4') . '</a>';
                        if ($product->get_featured()):
                            $featured = esc_html('Featured');
                            $html .= '
                            <div class="featured-base bg-green clr-white justify-center align-center flex absolute top-0 left-0 fz-12 fw-500">
                            ' . $featured . '
                            </div>';
                        else:
                            $html .= '';
                        endif;
                        $html .= '
                        <div class="wishlist absolute right-0 flex justify-center align-center">
                            '.do_shortcode( '[ti_wishlists_addtowishlist product_id="'.esc_attr( get_the_ID() ).'" variation_id="'.esc_attr( get_the_ID() ).'"]' ).'
                        </div>
                        <div class="quickview absolute right-0">
                            <a href="#" class="button yith-wcqv-button flex aling-center f-gap-20" data-product_id="'.esc_attr( get_the_ID() ).'" style="zoom: 1;">
                                <span class="quickview-text">Quick View</span> 
                                <i class="fa-solid fa-up-down-left-right"></i>
                            </a>
                        </div>
                        <div class="compare-wrap absolute right-0">
                            <a href="'.esc_url( home_url( '/' ) ).'?action=yith-woocompare-add-product&amp;id='.esc_attr( get_the_ID() ).'" class="compare flex aling-center f-gap-20" data-product_id="'.esc_attr( get_the_ID() ).'" rel="nofollow">
                                <span class="quickview-text">Compare</span>  <i class="fa-solid fa-shuffle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-slide-content text-left">
                        <h4 class="product-card-title fz-16 fw-600 lh-21">
                            <a class="clr-black" href="' . esc_url($permalink) . '">' . esc_html($title) . '</a>
                        </h4>
                        <div class="cat-name">
                            <a class="fw-500" href="' . esc_url($single_cat_link) . '">' . esc_html($single_cat) . '</a>
                        </div>';

                        if ($average = $product->get_average_rating()) {
                            if ( $product->get_review_count() <= 1 ) {
                                $review_text = " review";
                            } else if ( $product->get_review_count() > 1 ) {
                                $review_text = " reviews";
                            } else {
                                $review_text = "";
                            }
                            $html .= '<div class="category-star-rating flex f-gap-5 align-center"><div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), $average) . '"><span style="width:' . (($average / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') . '</span></div><span class="fz-16 fw-500 clr-grey">(' . $product->get_review_count() . ''.esc_html($review_text).')</span></div>';
                        }

                        $html .= '<div class="product-price flex align-center f-gap-10">';
                        if (!empty ($sale_price)) {
                            $html .= '<div class="sale-price clr-blue fz-24 fw-600">' . $sale_price . '</div>';
                        }
                        if (!empty ($regular_price)) {
                            $html .= '<div class="regular-price clr-grey fz-16 fw-500"> ' . $regular_price . '</div>';
                        }
                    $html .= '
                    </div>';

                    if ($product->is_in_stock()) {
                        $html .= '
                        <a href="' . esc_url(home_url()) . '/?add-to-cart=' . esc_attr($post_id) . '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart flex align-center justify-center f-gap-5 bg-blue fw-500 clr-white fz-16 br-6" data-product_id="' . esc_attr($post_id) . '" rel="nofollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                <path d="M10.77 21C10.77 21.69 10.21 22.25 9.52002 22.25C8.83102 22.25 8.26501 21.69 8.26501 21C8.26501 20.31 8.82001 19.75 9.51001 19.75H9.52002C10.21 19.75 10.77 20.31 10.77 21ZM17.52 19.75H17.51C16.82 19.75 16.265 20.31 16.265 21C16.265 21.69 16.83 22.25 17.52 22.25C18.21 22.25 18.77 21.69 18.77 21C18.77 20.31 18.21 19.75 17.52 19.75ZM22.205 8.49197L21.191 14.658C20.928 16.104 20.274 17.75 17.5 17.75H9.23401C7.87501 17.75 6.70396 16.735 6.51196 15.389L5.00195 4.82397C4.91395 4.21197 4.38301 3.75098 3.76501 3.75098H3.5C3.086 3.75098 2.75 3.41498 2.75 3.00098C2.75 2.58698 3.086 2.25098 3.5 2.25098H3.76599C5.12499 2.25098 6.29604 3.26597 6.48804 4.61197L6.57996 5.25098H19.5C20.318 5.25098 21.0881 5.61097 21.6121 6.23897C22.1351 6.86597 22.352 7.68797 22.205 8.49197ZM20.459 7.19897C20.221 6.91397 19.871 6.74997 19.499 6.74997H6.79297L7.99695 15.177C8.08495 15.789 8.61601 16.25 9.23401 16.25H17.5C19.097 16.25 19.486 15.654 19.713 14.403L20.7271 8.23596C20.7961 7.85796 20.697 7.48397 20.459 7.19897ZM16 10.75H14.75V9.49997C14.75 9.08597 14.414 8.74997 14 8.74997C13.586 8.74997 13.25 9.08597 13.25 9.49997V10.75H12C11.586 10.75 11.25 11.086 11.25 11.5C11.25 11.914 11.586 12.25 12 12.25H13.25V13.5C13.25 13.914 13.586 14.25 14 14.25C14.414 14.25 14.75 13.914 14.75 13.5V12.25H16C16.414 12.25 16.75 11.914 16.75 11.5C16.75 11.086 16.414 10.75 16 10.75Z" fill="white"/>
                            </svg> Add to cart
                        </a>';
                    } else {
                        $html .= '
                        <a href="' . esc_url(home_url()) . '/?add-to-cart=' . esc_attr($post_id) . '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart flex align-center justify-center f-gap-5 bg-red fw-500 clr-white fz-16 br-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M18 20.75H6C3.582 20.75 2.25 19.418 2.25 17V8C2.25 5.582 3.582 4.25 6 4.25H18C20.418 4.25 21.75 5.582 21.75 8V17C21.75 19.418 20.418 20.75 18 20.75ZM6 5.75C4.423 5.75 3.75 6.423 3.75 8V17C3.75 18.577 4.423 19.25 6 19.25H18C19.577 19.25 20.25 18.577 20.25 17V8C20.25 6.423 19.577 5.75 18 5.75H6ZM13.0291 13.179L17.9409 9.60699C18.2759 9.36399 18.35 8.89401 18.106 8.55901C17.863 8.22501 17.3951 8.149 17.0581 8.394L12.146 11.966C12.058 12.03 11.941 12.03 11.853 11.966L6.94092 8.394C6.60292 8.149 6.13607 8.22601 5.89307 8.55901C5.64907 8.89401 5.72311 9.36299 6.05811 9.60699L10.97 13.18C11.278 13.404 11.639 13.515 11.999 13.515C12.359 13.515 12.7221 13.403 13.0291 13.179Z" fill="white"/>
                            </svg> Notify me
                        </a>';
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
    add_shortcode('product_card_slider', 'kalni_product_card_slider');




    // Product category list 
    function kalni_product_cat_box_slider($atts)
    {
        extract(shortcode_atts(
            array(
                'count' => '5',
            ), $atts));

        $terms = get_terms('product_cat', array('hide_empty' => true, 'parent' => 0));

        $html = '
        <div class="pc-slider kalni-product-cat-box">';
        // pc-slider
        foreach ($terms as $term) {

            $thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);

            $img = wp_get_attachment_url($thumbnail_id);
            if ($term->parent == 0) {
                $html .= '
                    <div class="single-product-cat-box br-4 bg-white-grey text-center">
                        <a href="' . get_category_link($term->term_id) . '">
                            <img class="d-inline-block" src="' . $img . '" width="150"/>
                            <div class="cat-box-content flex justify-between f-gap-20 align-center text-left">
                                <div>
                                    <h5 class="fz-16 fw-600 clr-black">' . $term->name . '</h5>
                                    <span class="fz-14 fw-500 clr-black-light">' . $term->count . ' items</span>
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
    add_shortcode('product_cat_box', 'kalni_product_cat_box_slider');

    /**
     * WooCommerce mini cart shortcode
     */
    function kalni_mini_cart_shortcode($atts) { 

        $theme_settings = kalni_get_theme_settings();
        if(!empty($theme_settings['header_cart_color']) ) : 
            $cart_clr = esc_attr( $theme_settings['header_cart_color'] );
        else: 
            $cart_clr = esc_attr( '#354054' );
        endif;
        echo '<div class="kalni-minicart-dropdown relative" data-toggle="dropdown"> ';
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                    <path d="M8.4898 18.9998C8.0998 18.9998 7.7798 18.6998 7.7398 18.3098C7.6998 17.8998 8.00981 17.5298 8.41981 17.4998L19.3198 16.5898C22.3798 16.3298 22.8498 15.8798 23.1898 12.8198L23.9898 5.65978C24.0298 5.24978 24.3998 4.95978 24.8198 4.99978C25.2298 5.04978 25.5298 5.41978 25.4798 5.82978L24.6798 12.9898C24.2598 16.7698 23.2298 17.7698 19.4398 18.0898L8.5598 18.9998C8.5398 18.9998 8.5198 18.9998 8.4898 18.9998Z" fill="'.$cart_clr.'"/>
                    <path d="M26 6.5H6C5.59 6.5 5.25 6.16 5.25 5.75C5.25 5.34 5.58 5 6 5H26C26.41 5 26.75 5.34 26.75 5.75C26.75 6.16 26.41 6.5 26 6.5Z" fill="'.$cart_clr.'"/>
                    <path d="M6 26.5C4.21 26.5 2.75 25.04 2.75 23.25C2.75 21.46 4.2 20 6 20C7.8 20 9.25 21.46 9.25 23.25C9.25 25.04 7.79 26.5 6 26.5ZM6 21.5C5.04 21.5 4.25 22.29 4.25 23.25C4.25 24.21 5.03 25 6 25C6.97 25 7.75 24.21 7.75 23.25C7.75 22.29 6.96 21.5 6 21.5Z" fill="'.$cart_clr.'"/>
                    <path d="M19.75 26.5C17.96 26.5 16.5 25.04 16.5 23.25C16.5 21.46 17.96 20 19.75 20C21.54 20 23 21.46 23 23.25C23 25.04 21.54 26.5 19.75 26.5ZM19.75 21.5C18.79 21.5 18 22.29 18 23.25C18 24.21 18.79 25 19.75 25C20.71 25 21.5 24.21 21.5 23.25C21.5 22.29 20.71 21.5 19.75 21.5Z" fill="'.$cart_clr.'"/>
                    <path d="M17.25 24H8.5C8.09 24 7.75 23.66 7.75 23.25C7.75 22.84 8.09 22.5 8.5 22.5H17.25C17.66 22.5 18 22.84 18 23.25C18 23.66 17.66 24 17.25 24Z" fill="'.$cart_clr.'"/>
                    <path d="M6.78 21.5C6.62 21.5 6.46 21.45 6.32 21.34C5.99 21.09 5.93 20.62 6.18 20.29L7.38 18.74C7.71 18.32 7.82 17.79 7.68 17.28L3.97 2.83C3.77 2.05 3.04 1.5 2.2 1.5H1C0.59 1.5 0.25 1.16 0.25 0.75C0.25 0.34 0.58 0 1 0H2.21C3.74 0 5.06 1.01 5.43 2.46L9.15 16.91C9.4 17.87 9.19 18.87 8.58 19.66L7.38 21.21C7.23 21.4 7.01 21.5 6.78 21.5Z" fill="'.$cart_clr.'"/>
                </svg>';
            echo '<span class="count-cart-items cart-count absolute bg-red clr-white br-100 text-center">';
                echo WC()->cart->get_cart_contents_count();
            echo '</span>';
        echo '</div>';
        echo '<ul class="kalni-minicart-dropdown-menu dropdown-menu-mini-cart list-unstyled"><div class="opened-cart-top flex align-center justify-between bg-white"><h3>Shopping Cart</h3><div class="close-cart">&#10005;</div></div>';
            echo '<li>';
                echo '<div class="widget_shopping_cart_content">';
                    woocommerce_mini_cart();
                echo '</div>';
            echo '</li>';
        echo '</ul>';
    }
    add_shortcode( 'kalni_mini_cart', 'kalni_mini_cart_shortcode' );

}


// Blog posts
function kalni_blog_posts($atts)
{
    extract(shortcode_atts(
        array(
            'count' => '-1',
            'post_type' => 'post',
            'cat_id' => ''
        ), $atts));


    $q = new WP_Query(
        array(
            'posts_per_page' => $count,
            'post_type' => $post_type,
            'orderby' => 'menu_order',
            'order' => 'DSC',
            'post_status' => 'publish',
            'post__not_in' => get_option("sticky_posts"),
            'cat' => $cat_id
        )
    );
    $html = '
        <div class="kalni-post-grid grid grid-4 align-center g-gap-30">';
    while ($q->have_posts()):
        $q->the_post();
        $post_id = get_the_ID();
        $link = get_the_permalink($post_id);
        $thumb = get_the_post_thumbnail($post_id, 'full');
        $title = get_the_title($post_id);
        $date = get_the_date('d.m.y', $post_id);
        $author_link = get_author_posts_url(get_the_author_meta('ID'));
        $author = get_the_author($post_id);

        $html .= '
                    <div class="single-post-grid text-center bg-white br-12">
                        ' . $thumb . '
                        <div class="post-grid-content">
                            <div class="post-grid-meta flex align-center justify-center f-gap-10">
                                <span class="author-by fz-16 fw-400 lh-16 clr-grey">by</span>
                                <a class="author-name fz-16 fw-400 lh-16 clr-black-light" href="' . esc_url($author_link) . '">' . $author . '</a>
                                <a class="post-date fz-16 fw-400 lh-16 clr-grey" href="' . esc_url($link) . '"> - ' . esc_html($date) . '</a>
                            </div>
                            <a href="' . esc_url($link) . '"><h3 class="fz-16 fw-500 lh-24 clr-black">' . esc_html($title) . '</h3></a>
                            <a class="fz-16 fw-400 lh-16 clr-grey readmore-btn" href="' . esc_url($link) . '">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                ';
    endwhile;
    '</div>';
    wp_reset_query();
    return $html;

}
add_shortcode('blog_posts', 'kalni_blog_posts');

// Recent posts
function kalni_recent_posts_shortcode($atts)
{
    extract(shortcode_atts(
        array(
            'count' => '-1',
            'post_type' => 'post',
            'cat_id' => ''
        ), $atts));


    $q = new WP_Query(
        array(
            'posts_per_page' => $count,
            'post_type' => $post_type,
            'orderby' => 'menu_order',
            'order' => 'DSC',
            'post_status' => 'publish',
            'post__not_in' => get_option("sticky_posts"),
            'cat' => $cat_id
        )
    );
    $html = '
        <div class="kalni-recent-post-grid grid g-gap-30">';
    while ($q->have_posts()):
        $q->the_post();
        $post_id = get_the_ID();
        $link = get_the_permalink($post_id);
        $thumb = get_the_post_thumbnail($post_id, 'full');
        $title = get_the_title($post_id);
        $date = get_the_date('d.m.y', $post_id);
        $author_link = get_author_posts_url(get_the_author_meta('ID'));
        $author = get_the_author($post_id);

        $html .= '
                    <div class="single-recent-post-grid grid grid-1-4 align-center g-gap-10">
                        ' . $thumb . '
                        <div class="recent-post-grid-content grid g-gap-8">
                            <a href="' . esc_url($link) . '"><h4 class="fz-16 fw-500 lh-24 clr-black">' . esc_html($title) . '</h4></a>
                            <div class="post-grid-meta flex align-center f-gap-5">
                                <span class="author-by fz-11 fw-400 lh-11 clr-grey">by</span>
                                <a class="author-name fz-11 fw-500 lh-11 clr-black" href="' . esc_url($author_link) . '">' . $author . '</a>
                                <a class="post-date fz-11 fw-400 lh-11 clr-grey" href="' . esc_url($link) . '"> - ' . esc_html($date) . '</a>
                            </div>
                        </div>
                    </div>
                ';
    endwhile;
    '</div>';
    wp_reset_query();
    return $html;

}
add_shortcode('recent_posts', 'kalni_recent_posts_shortcode');


