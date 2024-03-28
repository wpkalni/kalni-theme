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



// New script for product

add_action('generate_inside_site_container', 'japs_prev_next_product', 1000);
function japs_prev_next_product() {
   if ( is_product() ) {
   global $post;
   $terms = get_the_terms( !empty($product->id), 'product_cat' );  
   foreach ($terms as $term) {
   if ($term->ID == !empty($category->cat_ID)) {
   $all_posts = new WP_Query(
      array(
         'post_type' => 'product',
         'meta_key' => '_price', 
         'orderby' => 'meta_value_num',
         'order' => 'ASC',
         'post_status' => 'publish',
         'posts_per_page' => -1,
         'meta_query' => array(
            array(
                'key' => '_stock_status',
                'value' => 'outofstock',
                'compare' => '!=',
            )
         ),      
         'tax_query' => array(
                array(
                        'taxonomy' => 'product_cat',
                        'field'      => 'term_id',
                        'terms'    => $terms[0]->term_id
                     )
         )
      )
   );
       if ( $all_posts->post_count <= 1) {
           return;
       }
       break;
   }
   }
   foreach ($all_posts->posts as $key => $value) {
      if ($value->ID == $post->ID) {
         $nextID = $all_posts->posts[$key + 1]->ID;
         $prevID = $all_posts->posts[$key - 1]->ID;
         break;
      }
   }
   echo '<div>';
         if ($prevID) : ?>
            
            <a href="<?= get_the_permalink($prevID) ?>" rel="prev" class="prev" title="<?= get_the_title($prevID) ?>"><?= esc_attr__('Previous product') ?>
            </a>
   <?php endif; ?>
   <?php if ($nextID) : ?>
            <a href="<?= get_the_permalink($nextID) ?>" rel="next" class="next" title="<?= get_the_title($nextID) ?>"><?= esc_attr__('Next product') ?>
            </a>
   <?php endif; ?>
   <?php

   echo '</div>';
   }
}