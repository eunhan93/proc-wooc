<?php 
  get_header();

?>
<div class="inner-main container">

<?php 

do_action( 'woocommerce_before_main_content' );

?>

<div class="test">

<?php if ( is_product_category() ){
	global $wp_query;

	// get the query object
	$cat = $wp_query->get_queried_object();

	// get the thumbnail id using the queried category term_id
	$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 

	// get the image URL
	$image = wp_get_attachment_url( $thumbnail_id ); 

	// print the IMG HTML
	if(!empty($image)){
		echo "<img src='{$image}' alt='' />";
	}
}
?>
</div>

<?php 

if(have_posts()){
	while(have_posts()){
		the_post();

		the_title();
	}
}


?>

<?php


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


?>

</div>



<?php
  get_footer();
?>