<?php


function cs_taxonomy(){
  
  register_taxonomy('cs_subject', 'cs', [
    'labels' => [
        'name'              => '주제',
        'singular_name'     => '주제',
        'search_items'      => '주제 검색',
        'all_items'         => '전체 주제',
        'parent_item'       => '상위 주제',
        'parent_item_colon' => '상위 주제:',
        'edit_item'         => '주제 편집',
        'update_item'       => '주제 수정',
        'add_new_item'      => '새 주제',
        'new_item_name'     => '새 주제 이름',
        'menu_name'         => '주제',
    ],
    'show_admin_column' => true,
    'hierarchical' => true,
  ]);


}

add_action('init', 'cs_taxonomy');