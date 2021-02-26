<?php


function proc_wooc_config(){
  register_nav_menus(array(
    "primary_menu_id" => "Primary Menu(Top Memu)",
    "secondary_menu_id" => "Sidebar Menu",
  ));

  add_theme_support("post-thumbnails");

  add_theme_support('woocommerce', [
    'thumbnail_image_width' => 150,
    'single_image_width' => 200,
    'product_grid' => [
      "default_columns" => 10,
      "min_columns" => 2,
      "max_columns" => 3,
    ]
  ]);
}

add_action('after_setup_theme', 'proc_wooc_config');
