<?php 
  get_header();
?>
<div class="inner-main container-1">
<?php

  if(have_posts()){
    while(have_posts()){
      the_post();

      // var_dump(get_post(get_the_ID()))
      ?>

        
        
          <?php the_content();?>
        
      <?php
      
    }
  } ?>
</div>

<?php
// var_dump(WC()->checkout());
// foreach ( WC()->cart->get_tax_totals() as $code => $tax ){
//   var_dump($tax);
//   echo 'test';
// }

// foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
//   $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
//   var_dump( WC()->cart->get_cart());
// }


// foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {

//   echo $cart_item_key . ' / ';
//   if($cart_item['product_id'] == $your_product_id_to_remove ){
//      //remove single product
//   }
//  } 

  get_footer();
?>