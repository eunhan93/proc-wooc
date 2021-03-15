<?php 

function put_text_meta($postNumber, $metaname){
  if(!empty(get_post_meta( $postNumber, $metaname, true ))){
    echo get_post_meta( $postNumber, $metaname, true );
  } else{
    echo '-';
  }
}


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php echo bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo bloginfo('title'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="wrap">
    <header class="header">
      <div class="inner_header_1 ">
        <div class="container">
          <section class="jd_logo">
            <img src="http://localhost/wordpress/wp-content/uploads/2021/03/jd_logo.png" alt="조단">
          </section>
          <section>
            <?php 
            if ( is_user_logged_in() ){
              wp_nav_menu([
                "theme_location" => 'tertiary_menu_id',
                "menu_class" => 'login-menu gray-top-menu',
              ]);
              ?>
              <?php
            } else {
              wp_nav_menu([
                "theme_location" => 'secondary_menu_id',
                "menu_class" => 'before-login-menu gray-top-menu',
              ]);
            }
              
            ?>
          </section>
        </div>
      </div>
      <div class="inner_header_2 container">
        <section class="logo">
          <a href="<?php echo home_url();?>">
            <img src="<?php echo get_post(get_post_meta('216', 'comp_logo_image', true)) -> guid; ?>" alt="<?php echo put_text_meta('216', 'comp_name');?>">
          </a>
        </section>
        <section>
          <?php
              wp_nav_menu([
                "theme_location" => 'primary_menu_id',
                "container" => 'nav',
                "menu_class" => 'gnb',
              ]);
          ?>
        </section>
       <section class="search-heart-cart">

        <?php get_search_form (); ?>
        <a href="<?php
        if(is_user_logged_in()){
          echo home_url() . '/wish-list';
        } else {
          echo home_url() . '/login';
        }
        ?>" class="wish-list-page-icon">
          <i class="far fa-heart"></i>
        </a>
        <a href="<?php 
          if(is_user_logged_in()){
            echo home_url() . '/cart';
          } else {
            echo home_url() . '/login';
          }
        ?>" class="cart-page-icon">
          <i class="far fa-square"></i>
        </a>
       </section>
      </div>
      <?php
      if(is_home()){
      ?>
      <div class="inner_header_3 container-1">
        <section class="jd-fix-menu">
          <div class="inner-jd-fix-menu">
            <div class="jd-fix-logo">
              <img src="http://localhost/wordpress/wp-content/uploads/2021/02/jd_logo.jpg" alt="조단">
            </div>
            <?php 
              
                wp_nav_menu([
                  "theme_location" => 'jordan_home_menu',
                  "container" => 'nav',
                  "menu_class" => 'jordan-menu',
                ]);
             
            ?>
          </div>
        </section>
      </div>
      <?php  } ?>
    </header>
    <main>
    <?php 
    if(is_page('nike-cs')){
      ?>
      <div class="inner-main nike-cs">
        <section class="nike-cs-1">
          <div class="inner-nike-cs-1 container-4">
            <h1><a href="<?php echo get_post_permalink(get_page_by_path( '/nike-cs/', OBJECT, 'page' )); ?>">고객센터</a></h1>
            <?php 
              include 'cs-search-form.php';
            ?>
          </div>
          
        </section>

    <?php
      } 
      if(is_tax('cs-type')){
        ?>
        <div class="inner-main cs-type">
          <section class="cs-type-1">
            <div class="cs-type-1 container-4">
              <?php 
                include 'cs-search-form.php';
              ?>
            </div>
            
          </section>
  
      <?php
        } 
      
    ?>
