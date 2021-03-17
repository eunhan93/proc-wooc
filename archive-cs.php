<?php 
  get_header();
?>

<?php 

  global $wp;

    // 슬러그 url decode
    $cat_slug = urldecode($wp -> query_vars["cs-type"]);

    // 슬러그로 term 정보 가져오기
    $cate = get_term_by('slug', $cat_slug, 'cs-type');

    // 가져온 정보 중 이름만 가져오기
    $cat_name = $cate -> name;

    // 가져온 정보 중 term id만 가져오기
    $cat_term_id = $cate -> term_id;

    // term 경로 - 부모 terms
    $cate_parents = get_term_parents_list($cat_term_id, 'cs-type', ['separator' => ' > ']);

    // 가져온 정보 중 term id로 해당 term의 자식 term 배열
    $cate_child_cate = get_term_children($cat_term_id, 'cs-type');

?>

<div class="inner-main cs-type">
  <section class="cs-type-1">
    <div class="inner-cs-type-1 container-4">

      <div class="cs-type-path">
        <a href="<?php echo home_url().'/nike-cs' ?>">Nike 고객센터</a> > 
        <?php echo substr($cate_parents, 0, -2); ?>
      </div>
      <?php 
        include 'cs-search-form.php';
      ?>
    </div>
    
  </section>
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
      <div class="inner-cs-type-center">
        <div class="cs-type-center-tit">
          <h1><?php echo $cat_name; ?></h1>
          <button type="button">팔로우</button>
        </div>
        <div class="cs-type-center-content">
          <!-- 자식 카테고리 여부 확인 후 진행 -->
          <ul class="cs-type-center-content-list <?php echo (count($cate_child_cate) > 0) ? 'yes-child-cat' : 'no-child-cat'; ?>">
          <?php 
            if(count($cate_child_cate) > 0){
              foreach($cate_child_cate as $c){ 
                ?>
                <li>
                <h3><a href="<?php echo get_term_link($c); ?>"><?php echo get_term($c) -> name ?></a></h3>
                  <ul class="cs-type-center-content-child-category">
                    <?php 
                      $post_of_term = new WP_Query([
                        'post_type' => 'cs',
                        'tax_query' => [[
                          'taxonomy' => 'cs-type',
                          'feild' => 'term_id',
                          'terms' => $c
                        ]]
                      ]);

                      if($post_of_term -> have_posts()){
                        while($post_of_term -> have_posts()){
                          $post_of_term -> the_post();
                          ?>
                            <li class="cs-type-center-content-list-tit"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
                          <?php
                        }
                      }
                    ?>
                  </ul>
                </li>
                <?php
              }
            } else {
              if(have_posts()){
                while(have_posts()){
                  the_post();
                  ?>
                  <li class="cs-type-center-content-list-tit"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
                  <?php
                }
              }
            }
          ?>  
          </ul>
        </div>
      </div>
    </div>
    <div class="cs-type-right">
      <?php include 'components/cs/nike-cs-contact.php'; ?>
    </div>
  </section>






<?php
  
  get_footer();
?>



