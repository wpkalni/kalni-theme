<?php 
// Product
// add_action( 'woocommerce_before_single_product', 'kalni_prev_next_product' );
// add_action( 'woocommerce_after_single_product', 'kalni_prev_next_product' );
function kalni_prev_next_product() {
echo '<div class="prev_next_buttons flex align-center f-gap-20">';
    $previous = previous_post_link('%link', 'Previous', TRUE, ' ', 'product_cat');
    $next = next_post_link('%link', 'Next', TRUE, ' ', 'product_cat');
    echo $previous;
    echo $next;
    echo '</div>';        
}

// Post
function kalni_prev_next_post() {
echo '<div class="prev_next_buttons flex align-center f-gap-20">';
    $previous = previous_post_link('%link', 'Previous', TRUE, ' ', 'category');
    $next = next_post_link('%link', 'Next', TRUE, ' ', 'category');
    echo $previous;
    echo $next;
    echo '</div>';        
}