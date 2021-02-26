<?php

function proc_cust_scripts(){
  wp_enqueue_style('original', get_stylesheet_uri());
  wp_enqueue_style('cust-style', get_template_directory_uri() . '/assets/customer/css/style.css');
}

add_action('wp_enqueue_scripts', 'proc_cust_scripts');