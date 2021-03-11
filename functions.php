<?php

include 'functions/admin/functions-adm.php';
include 'functions/customer/functions-cust.php';

function namespace_force_individual_cart_items( $cart_item_data, $product_id ) {
  $unique_cart_item_key = md5( microtime() . rand() );
  $cart_item_data['unique_key'] = $unique_cart_item_key;
  $add_time = time();
  $cart_item_data['add_time'] = $add_time;
  return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'namespace_force_individual_cart_items', 10, 2 );