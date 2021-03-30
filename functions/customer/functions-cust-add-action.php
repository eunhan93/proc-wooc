
<?php
	$parentDir = dirname(__DIR__ . '..'); 

add_action('woocommerce_checkout_order_review', 'buy_now_checkout_order_review_action', 8);

function buy_now_checkout_order_review_action(){

  if(!empty($_GET['item'])){
		

    include 'checkout/review-order-thead.php';

		
?>

    <tbody>
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			if($cart_item_key == $_GET['item']){
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-name">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</td>
						<td class="product-total">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</td>
					</tr>
					<?php
				}
			}
		}
		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>

	<?php
		include 'checkout/review-order-tfoot.php';
		remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review');
		
  } 
	else {
		remove_action( 'woocommerce_checkout_order_review', 'buy_now_checkout_order_review_action');
	}
}



add_action('kboard_skin_header', function (){
	echo '<div class="inner-main container-3">';
}, 10);

add_action('kboard_skin_footer', function (){
	echo '</div>';
}, 10);



add_action('rtml_render_form', function (){
	echo 'test';
});



add_action('woocommerce_product_thumbnails', function(){
	echo '<div class="product-images">';
	global $product;
	foreach($product->gallery_image_ids as $imgId){
		echo '<div class="product-image">';
		echo '<img src = "' . wp_get_attachment_image_url($imgId, 'large') . '" alt="' . $product->name . '" />';
		echo '</div>';
	}
	echo '</div>';
});


add_action('woocommerce_variable_add_to_cart', function(){
	if(!empty(get_post_meta(get_the_ID(), "g_items", true))){
		echo '<div class="product-colors">';
			$postIdArr = get_post_meta(get_the_ID(), "g_items", true);
			foreach($postIdArr as $gi) {
				$tag__ = '<a href = "';
				$tag__ .= get_the_permalink($gi);
				$tag__ .= '" ';
				$tag__ .= ($gi == get_the_ID()) ? ' class="this_product">' : ">";
				$tag__ .= get_the_post_thumbnail($gi, "thumbnail", ["class" => "group-item-thumbnail"]);
				$tag__ .= '</a>';
				echo $tag__;
			}
		echo '</div>';
	}
	
});


add_action('woocommerce_single_product_summary', function(){
	global $product;
	echo '<div class="single-title">';

	echo wc_get_product_tag_list( $product->get_id(), ' ');
}, 4);

add_action('woocommerce_single_product_summary', function(){
	echo '</div>';
}, 15);


add_action('woocommerce_before_add_to_cart_button', function(){
	echo '<p class="notifyme"><a href="#"><i class="fas fa-comments"></i> <strong>NOTIFY ME</strong> 입고 알림 신청</a></p>';
});


add_action('woocommerce_after_add_to_cart_quantity', function(){
	echo '<div class="single-product-btn-area">';
}, 5);


add_action(' woocommerce_after_single_variation', function(){
	echo '</div>';
}, 5);


add_action('woocommerce_before_single_product_summary ', function(){
	echo '<div class="test" style="display:flex">';
}, 5);

add_action('woocommerce_after_single_product_summary', function(){
	echo '</div>';
}, 5);


add_action('woocommerce_before_quantity_input_field', function() {
	if(is_single() && 'product' == get_post_type()){
		echo '<span>수량</span>';
	}
	
},10);

add_action('woocommerce_after_quantity_input_field', function(){
	if(is_single() && 'product' == get_post_type()){
		
	echo '<button type="button" class="qty-minus">-</button>';
	echo '<button type="button" class="qty-plus">+</button>';
	}
}, 10);

add_action('woocommerce_after_add_to_cart_form', function(){
	echo '<div class="store-pick-up">
				<button type="button"><i class="fas fa-store"></i> 배송보다 빠른, 매장픽업 서비스</button>
				<p>지금 주문하고, 매장에서 바로 픽업하세요.
					<a href="https://www.nike.com/kr/ko_kr/reserveService">자세히 보기</a>
				</p>
			</div>';
}, 10);