<?php

function proc_cust_scripts(){
  wp_enqueue_style('original', get_stylesheet_uri());
  wp_enqueue_style('cust-style', get_template_directory_uri() . '/assets/customer/css/style.css');



  if(is_front_page()){
  wp_enqueue_script('jd-home', get_template_directory_uri() . '/assets/customer/js/jd-home-header.js', [], '1.0', true);

    wp_enqueue_style('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', [], '1.0', true);
    wp_enqueue_script('jd-slider', get_template_directory_uri() . '/assets/customer/js/jd-slider.js', [], '1.0', true);
  }

  if(is_product_category()){
    wp_enqueue_script('filter-on-off', get_template_directory_uri() . '/assets/customer/js/filter-on-off.js', [], '1.0', true);
  }

  if(is_search()){
    wp_enqueue_style('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', [], '1.0', true);
    wp_enqueue_script('jd-slider', get_template_directory_uri() . '/assets/customer/js/jd-slider.js', [], '1.0', true);

    wp_enqueue_script('filter-on-off', get_template_directory_uri() . '/assets/customer/js/filter-on-off.js', [], '1.0', true);
  }

  if(is_product()){
    wp_enqueue_script('single-product', get_template_directory_uri() . '/assets/customer/js/single-product.js', [], '1.0', true);

  }

}

add_action('wp_enqueue_scripts', 'proc_cust_scripts');