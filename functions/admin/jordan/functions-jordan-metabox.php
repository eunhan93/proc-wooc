<?php


function proc_meta_boxes_product() {


  add_meta_box('jordan-checkbox', '조던 메인페이지 추가', function(){
    include 'metabox/jordan-checkbox.php';
  }, 'product');


  // add_meta_box('product-cover', '책 표지', function(){
  //   include 'meta-box/product-cover.php';
  // }, 'book');


}


add_action('add_meta_boxes_product', 'proc_meta_boxes_product');


add_action('edit_form_advanced', function () {
  if(get_current_screen() -> post_type === 'product'){
    echo "<pre>";
    var_dump(get_post_meta(get_the_ID())); //_regular_price, _sale_price
    echo "</pre>";
  }
}); 



function proc_meta_boxes_jordan() {

  add_meta_box('jordan-collection', '조던 메인페이지 추가', function(){
    include 'metabox/jordan-collection.php';
  }, 'jordan');

}


add_action('add_meta_boxes_jordan', 'proc_meta_boxes_jordan');

