<?php 
  get_header();
?>

<?php 

$user_id_or_ip = (!empty(wp_get_current_user() -> data -> user_login))?: $_SERVER['REMOTE_ADDR'];

if (get_post_type( $post->ID ) == 'cs' ){
  update_post_meta( $post->ID, '_last_viewed', current_time('mysql') );
  if(!empty($user_id)){
    update_post_meta( $post->ID, '_last_viewed_user_id_or_ip', $user_id_or_ip );
  } else {
    update_post_meta( $post->ID, '_last_viewed_user_id_or_ip', $user_id_or_ip );
  }
  
}
    


  global $wp;

    $post_term_id = wp_get_post_terms(get_the_ID(), 'cs-type')[0] -> term_id;
    // term 경로 - 부모 terms
    $cate_parents = get_term_parents_list($post_term_id, 'cs-type', ['separator' => ' > ']);

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
        <?php
        if(have_posts()){
          while(have_posts()){
            the_post();
            ?>
            <div class="cs-type-center-tit">
              <h1><?php the_title()?></h1>
              <?php the_date('', '<h2>업데이트일 : ', '</h2>');?>
            </div>
            <div class="cs-type-center-detail-content">
            <?php the_content();?>
            </div>

            <?php
          }
        }
        ?>

        <p class="cs-type-center-other">또 다른 질문이 있으십니까? <a href="<?php echo home_url() . '/personal_contact/'?>">문의 등록</a></p>
        

        <div class="cs-recently-viewed cs-list">
          <h3 class="cs-recently-viewed-tit">최근 본 문서</h3>
          <ul class="cs-recently-viewed-list">
            <?php
              $recentlyViewed = new WP_Query([
                'post_type' => 'cs',
                'posts_per_page' => 5,
                'orderby' => 'meta_value',
                'order' => 'DESC',
                'meta_query' => array(
                  'relation' => 'AND',
                  array(
                      'key' => '_last_viewed'
                  ),
                  array(
                      'key' => '_last_viewed_user_id_or_ip', 
                      'value' => $user_id_or_ip
                  ), 
              ),
              ]);

              if($recentlyViewed -> have_posts()){
                while($recentlyViewed -> have_posts()){
                  $recentlyViewed -> the_post();
                  ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
                  <?php
                }
              }
            ?>
          </ul>  
        </div>
        
        <div class="cs-connected-post cs-list">
          <h3 class="cs-connected-tit">관련 문서</h3>
          <ul class="cs-connected-list">
            <?php
              $p_term_id = get_term($post_term_id, 'cs-type') -> parent;
              $args = [
                'post_type' => 'cs',
                'posts_per_page' => 5,
                'orderby' => 'rand',
                'post__not_in' => array(get_the_ID()),
                'tax_query' => [[
                  'taxonomy' => 'cs-type',
                  'field' => 'term_id',
                  'terms' => $p_term_id
                ]]
              ];
              
              $connectedPosts = new WP_Query($args);

              if($connectedPosts -> have_posts()){
                while($connectedPosts -> have_posts()){
                  $connectedPosts -> the_post();
                  ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
                  <?php
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



