<?php


// 조던 카테고리 - post type : product
function proc_save_post_product($post_id) {
  
  if(!empty($_POST['meta'])){  //$_POST['meta'] 값이 있을 때만
    foreach($_POST['meta'] as $k => $v) {
      update_post_meta($post_id, $k, $v);
    }
  }
}

// add_action('save_post_product', 'proc_save_post_product');


// 조던 컬렉션 - post type : jordan


function proc_save_post_jordan($post_id) {
  
  if(!empty($_POST['meta'])){  //$_POST['meta'] 값이 있을 때만
    foreach($_POST['meta'] as $k => $v) {
      update_post_meta($post_id, $k, $v);
    }
  }
}

add_action('save_post_jordan', 'proc_save_post_jordan');
