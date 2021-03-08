<?php


global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));

global $wp_query;

$p_cat = $wp_query -> query["product_cat"];



?>

<section class="item-orderby-header">
  <div class="inner-orderby-header container">
    <h4>
      <?php 
      
      if(strpos($p_cat, "jordan-collection") === 0){
        echo  $wp_query -> queried_object -> name ;
      } else if ($wp_query -> query_vars["product_cat"] === "jordan-shoes"){
        echo "조던 신발";
      } else if ($wp_query -> query_vars["product_cat"] === "jordan-clothing"){
        echo "조던 의류";
      } else if ($wp_query -> query_vars["product_cat"] === "jordan-accessories"){
        echo "조던 용품";
      } else if ($wp_query -> query_vars["product_cat"] === "air-jordan-retro"){
        echo "Men's 에어 조던 레트로";
      } else {
        echo "<span>" . $wp_query -> query_vars["product_cat"] . "</span>'s 조던";
      }
    ?>
      
    </h4>
    <div class="order-by-filter">
      <button class="filter-btn">
        FILTER
        <span class="filter-on">
          <i class="fas fa-toggle-on"></i>
        </span>
        <span class="filter-off">
          <i class="fas fa-toggle-off"></i>
        </span>
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
          <i class="fas fa-chevron-down"></i>
        </p>
        <div class="order-by-list-select">
          <a href="<?php echo $current_url . '/';?>">신상품순</a>
          <a href="<?php echo $current_url . '/?sort=price_desc';?>">높은 가격순</a>
          <a href="<?php echo $current_url . '/?sort=price_asc';?>">낮은 가격순</a>
        </div>
      </div>
    </div>
  </div>

</section>