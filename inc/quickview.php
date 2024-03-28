<?php 
/**
 * QuickView
 */

function kalni_quickview() {
    if ( is_product() ) :
        global $product;
    

        $q = new WP_Query(
            array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'DSC'
            )
        );
        ?>


    <?php endif;


}
