<?php 


$p_id = $_GET['product_id'];
$v_id = $_GET['variation_id'];
$c_qty = $_GET['quantity'];
$a_time = $_GET['add_time'];
$key = array();
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
  if($cart_item['product_id'] == $p_id && $cart_item['variation_id'] == $v_id && $cart_item["quantity"] == $c_qty && $cart_item['add_time'] == $a_time){

    $key['key'] = $cart_item_key;

  }
}

// var_dump($key);

// header('Content-type: application/json'); 
// echo json_encode(['key' => $key]);

header('Access-Control-Allow-Origin: *'); 
header('Content-type: application/json'); 
echo json_encode($key);
