<?php 
  get_header();
?>

<section class="cs-type-main-section container-4">
  <div class="cs-type-left">
    <?php 
    wp_nav_menu([
      "theme_location" => 'cs_frequently_menu',
      "container" => 'div',
      "container_class" => 'inner-cs-type-left',
      "menu_class" => 'cs-side-menu',
    ]);
  ?>
  </div>
  

  <div class="cs-type-center">
  <?php
  global $wp;
  $cat_slug = urldecode($wp -> query_vars["cs-type"]);
  $cate = get_term_by('slug', $cat_slug, 'cs-type');
  $cat_name = $cate -> name;
  // echo str_replace("-", " ", urldecode($wp -> query_vars["cs-type"]));

  // 
?>
    <div class="inner-cs-type-center">
      <div class="cs-type-center-tit">
        <h1><?php echo $cat_name; ?></h1>
        <button type="button">팔로우</button>
      </div>
      <div class="cs-type-center-content">
        <ul class="cs-type-center-content-list">
        <?php 
          if(have_posts()){
            while(have_posts()){
              the_post();
              ?>
              <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
              <?php
              
            }
          }
        ?>  
        </ul>
        
      </div>
      
    </div>

  
  </div>
  <div class="cs-type-right"></div>

</section>






<?php
  
  get_footer();
?>