<?php

function proc_register_post_type(){
  $company_labels = array(
    'name'                  => '회사정보',
    'singular_name'         => '회사정보',
    'menu_name'             => '회사정보',
    'name_admin_bar'        => '회사정보',
    'add_new'               => '새 회사정보 추가',
    'add_new_item'          => '새 회사정보를 추가합니다',
    'new_item'              => '새 회사정보',
    'edit_item'             => '회사정보 수정',
    'view_item'             => '회사정보 보기',
    'all_items'             => '회사정보 목록',
    'search_items'          => '회사정보 검색',
    'parent_item_colon'     => '상위 회사정보:',
    'not_found'             => '현재 입력한 회사정보가 없습니다.',
    'not_found_in_trash'    => '휴지통에 회사정보가 없습니다.',
    
  );

  $company_args = array (
    'has_archive' => true,
    'public' => true,
    'labels' => $company_labels,
    'menu_position' => 3,
    'menu_icon' => 'dashicons-info-outline',
    // 'menu_icon' => get_template_directory_uri() . '/image/iconmonstr-book-17-32.png',
    'supports' => array('title')
  );
  register_post_type('company', $company_args);

}

add_action('init', 'proc_register_post_type');