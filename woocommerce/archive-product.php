<?php 
  get_header();
	$cat_slug = '';
	$parentDir = dirname(__DIR__ . '..'); 

?>
<div class="inner-main container">

	<?php 

	// do_action( 'woocommerce_before_main_content' );

	?>

	<?php
		include $parentDir . '/components/item-filter-order-header.php';
	?>

	<aside class="s-side">
		<div class="inner-s-side">
			<?php        
			wp_nav_menu([
				"theme_location" => 'jordan_home_menu',
				"menu_class" => 'jordan-menu',
			]);
		?>
		</div>
		
	</aside>

	<section class="section s-items">

		<?php if ( is_product_category() ){
			global $wp_query;

			// get the query object
			$cat = $wp_query->get_queried_object();

			// get the thumbnail id using the queried category term_id
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 

			// get the image URL
			$image = wp_get_attachment_url( $thumbnail_id ); 

			// get the category name
			$cat_name = $cat -> name;

			// print the IMG HTML
			if(!empty($image)){
				// echo "<img src='{$image}' alt='' />";
				?>
					<div class="cat-tit-area">
						<img src="<?php echo $image;?>" alt="<?php echo $cat_name; ?>">
						<h2>조던 <?php echo $cat_name; ?></h2>
					</div>
				<?php
			}


			$cat_slug = $cat -> slug;
			$cat_items = $wp_query -> posts;
		}
		?>




<?php 

$args = [
	'post_type'     => 'product', 
	'tax_query'     => array( 
			array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $cat_slug, 
			),
	),
];

if(!empty($_GET['sort'])){
	
	$args['orderby']   = 'meta_value_num';
	$args['meta_key']  = '_price';

	if($_GET['sort'] === 'price_desc'){
		$args["order"] = 'desc';

	} else if($_GET['sort'] === 'price_asc'){
		$args["order"] = 'asc';
	}
}


$cat_item_query = new WP_Query($args);

// var_dump($cat_item_query);

if($cat_item_query -> have_posts()){
	while($cat_item_query -> have_posts()){

		// global $cat_slug;

		$cat_item_query -> the_post();
		include $parentDir . '/components/product-item.php';
	}
}


?>

</section>




<?php


	// if ( wc_get_loop_prop( 'total' ) ) {
	// 	while ( have_posts() ) {
	// 		the_post();

	// 		/**
	// 		 * Hook: woocommerce_shop_loop.
	// 		 */
	// 		do_action( 'woocommerce_shop_loop' );

	// 		wc_get_template_part( 'content', 'product' );
	// 	}
	// }


?>

</div>



<?php
  get_footer();
?>