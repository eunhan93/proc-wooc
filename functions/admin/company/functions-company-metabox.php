<?php


function proc_meta_boxes_company() {


  add_meta_box('company-data', '회사 상세 정보', function(){
    include 'metabox/company-data.php';
  }, 'company');


  // add_meta_box('company-cover', '책 표지', function(){
  //   include 'meta-box/company-cover.php';
  // }, 'book');


}


add_action('add_meta_boxes_company', 'proc_meta_boxes_company');


add_action('edit_form_advanced', function () {
  if(get_current_screen() -> post_type === 'company'){

    include 'metabox/company-shop-info.php';

    // include 'meta-box/book-author-intro.php';
    
    // include 'meta-box/book-translator-intro.php';
  }
}); 