<?php 
  get_header();
?>
<div class="inner-main container-1">
<?php 
    $home_top_query = new WP_Query([
      'post_type' => 'jordan',
      'posts_per_page' => 1,
      'meta_query' => [[
        'key' => 'jdc_top',
        'value' => 'true'
      ]]
    ]);

    if($home_top_query -> have_posts()){
      while($home_top_query -> have_posts()){
        $home_top_query -> the_post();
        ?>
        <section class="section section-coll">
          <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>" class="main-content-img">
            <?php the_post_thumbnail(); ?>
          </a>
          <div class="section-coll-text">
            <h3><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>">
              <button class="black-btn"><?php echo get_post_meta(get_the_ID(), 'collection_btn_name', true); ?></button>
            </a>
          </div>
          
        </section>
        <?php

      }
    }
    wp_reset_postdata();
  ?>



  <?php 
    $home_not_top_query = new WP_Query([
      'post_type' => 'jordan',
      'posts_per_page' => 6,
      'meta_query' => [[
        'key' => 'jdc_top',
        'value' => ''
      ]]
    ]);

    if($home_not_top_query -> have_posts()){
      while($home_not_top_query -> have_posts()){
        $home_not_top_query -> the_post();
        ?>
        <section class="section section-coll">
          <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>" class="main-content-img">
            <?php the_post_thumbnail(); ?>
          </a>
          <div class="section-coll-text">
            <h3><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>">
              <button class="black-btn"><?php echo get_post_meta(get_the_ID(), 'collection_btn_name', true); ?></button>
            </a>
          </div>
        </section>
        <?php

      }
    }
    wp_reset_postdata();
  ?>

    <section class="section section-slider">
      <h2>NOW IN FLIGHT</h2>
      <?php 
        include 'components/slider/main-slider.php';
      ?>
    </section>

    <section class="section section-last">
      
    </section>
</div>
<?php 
  get_footer();
?>