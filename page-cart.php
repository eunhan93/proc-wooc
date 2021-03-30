<?php 
  get_header();
?>
<div class="inner-main container-4">
<?php

  if(have_posts()){
    while(have_posts()){
      the_post();

      // var_dump(get_post_taxonomies(get_the_ID()))
      ?>

        
        
          <?php the_content();?>
        
      <?php
      
    }
  } ?>
</div>
<pre>
<?php
// foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ){
//   var_dump($cart_item);
//   echo '<br /><br /><br />';
// }
 



?>
</pre>
 <?php
// foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {

//   echo $cart_item_key;
//   if($cart_item['product_id'] == $your_product_id_to_remove ){
//      //remove single product
//   }
//  } 

  get_footer();
?>