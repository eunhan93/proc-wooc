<?php


function proc_meta_boxes_product() {


  // add_meta_box('jordan-checkbox', '조던 메인페이지 추가', function(){
  //   include 'metabox/jordan-checkbox.php';
  // }, 'product');


  // add_meta_box('product-cover', '책 표지', function(){
  //   include 'meta-box/product-cover.php';
  // }, 'book');

  add_meta_box('jordan-group', '그룹상품', function(){
      include 'metabox/group-items.php';
    }, 'product');
}


add_action('add_meta_boxes_product', 'proc_meta_boxes_product');


add_action('edit_form_advanced', function () {
  if(get_current_screen() -> post_type === 'product'){
    include 'metabox/jordan-textarea.php';
  }
});

function proc_meta_boxes_jordan() {

  add_meta_box('jordan-collection', '조던 메인페이지 추가', function(){
    include 'metabox/jordan-collection.php';
  }, 'jordan');

}


add_action('add_meta_boxes_jordan', 'proc_meta_boxes_jordan');

