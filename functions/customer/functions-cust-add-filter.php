<?php 

// echo apply_filters( 
//   'woocommerce_order_button_html', 
//   '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine 


// add_filter('woocommerce_order_button_html', function(){
//   if(!empty($_GET['item'])){
//     foreach(WC()->cart->get_cart() as $cart_item_key => $cart_item){
//       if($cart_item_key == $_GET['item']){
//         echo number_format($cart_item['line_subtotal']);
//         // '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' )
//       }
//     }
//   }
// });