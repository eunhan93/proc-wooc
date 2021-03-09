<?php

add_filter ( 'nav_menu_css_class', 'jordan_menu_css', 10, 3 );

function jordan_menu_css ( $classes, $item, $args ){
  // var_dump($args);
  if ( 'jordan_home_menu' === $args->theme_location ) {
    $classes[] = 'list';
    $classes[] = 'testtest';
  }

  return $classes;
}