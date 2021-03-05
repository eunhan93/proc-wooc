<?php


global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));

global $wp_query;


?>

<section class="item-orderby-header">
  <h4><span><?php echo $wp_query -> query_vars["product_cat"];?></span>'s 조던</h4>
  <div class="order-by-filter">
    <button class="filter-btn">
      FILTER 
      <i class="fas fa-toggle-on"></i>
      <i class="fas fa-toggle-off"></i>
    </button>
    <div class="order-by-list">
      <p class="selected">
        <?php 
          $selected_sort = $_GET['sort'];
          if(!empty($selected_sort)){
            if($selected_sort === "price_desc"){
              echo '높은 가격순';
            } else {
              echo '낮은 가격순';
            }
          } else {
            echo '신상품순';
          }
        ?>
      </p>
      <div class="order-by-list-select">
        <a href="<?php echo $current_url;?>">신상품순</a>
        <a href="<?php echo $current_url . '/?sort=price_desc';?>">높은 가격순</a>
        <a href="<?php echo $current_url . '/?sort=price_asc';?>">낮은 가격순</a>
      </div>
    </div>
  </div>
</section>

