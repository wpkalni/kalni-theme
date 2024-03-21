<?php 

/*
  ==================
  * WooCommerce Ajax Product Search Code
 ======================	 
 */
 // ajax fetch function
 add_action( 'wp_footer', 'ajax_fetch' );
 function ajax_fetch() { ?>
	<script type="text/javascript">
	function kalni_fetch(){
	
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'data_fetch', keyword: jQuery('#keyword').val(), pcat: jQuery('#cat').val() },
			success: function(data) {
				jQuery('#datafetch').html( data );
			}
		});
	
	}
	</script>
 <?php
 }
 
 // the ajax function
 add_action('wp_ajax_data_fetch' , 'data_fetch');
 add_action('wp_ajax_nopriv_data_fetch','data_fetch');
 function data_fetch(){
	if ($_POST['pcat']) {
		$product_cat_id = array(esc_attr( $_POST['pcat'] ));
	}else {
		$terms = get_terms( 'product_cat' ); 
		$product_cat_id = wp_list_pluck( $terms, 'term_id' );
	}
	$the_query = new WP_Query( 
		array( 
			'posts_per_page' => -1, 
			's' => esc_attr( $_POST['keyword'] ), 
			'post_type' => array('product'),
			
			'tax_query' => array(
				array(
					'taxonomy'  => 'product_cat',
					'field'     => 'term_id',
					'terms'     => $product_cat_id,
					'operator'  => 'IN',
				)
		    )
		) 
	);
	if( $the_query->have_posts() ) :
		echo '<ul class="list-unstyled">';
		while( $the_query->have_posts() ): $the_query->the_post(); ?>
			<li>
                <a href="<?php echo esc_url( post_permalink() ); ?>">
                    <span>
                        <?php the_post_thumbnail('thumbnail')?>
                    </span>
                    <?php the_title();?>
                </a>
            </li>
		<?php endwhile;
	echo '</ul>';
		wp_reset_postdata();  
	endif;
 
    die();
}