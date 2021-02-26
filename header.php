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
      <div class="inner_header container-1">
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
       <section></section>
      </div>
    </header>
    <main>