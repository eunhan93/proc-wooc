<?php


function proc_adm_scripts(){

  if(get_current_screen() -> id === 'company'){
    wp_enqueue_script(
      'comp_media', 
      get_template_directory_uri() . '/assets/admin/js/add_logo.js', 
      ['media-views'],  // [] = deps 의존, 다른 스크립트의 handle 값(첫번째 인자값). 여기에 값이 들어가면 해당 값 다음에 입력됨.
      '2021-02-25', true);
  }
  // var_dump(get_current_screen());
  if(get_current_screen() -> id === 'jordan'){
    
    wp_enqueue_script(
      'jordan_cb', 
      get_template_directory_uri() . '/assets/admin/js/jordan_cb.js', 
      [],  // [] = deps 의존, 다른 스크립트의 handle 값(첫번째 인자값). 여기에 값이 들어가면 해당 값 다음에 입력됨.
      '2021-02-26', true);
  }

}

add_action('admin_enqueue_scripts', 'proc_adm_scripts');