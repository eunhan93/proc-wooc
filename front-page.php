<?php 
  get_header();
?>

<?php 
    $home_top_query = new WP_Query([
      'post_type' => 'jordan',
      'posts_per_page' => 1,
      'meta_query' => [
        'key' => 'jdc_top',
        'value' => 'true',
        'compare' => '='
      ]
    ]);

    if($home_top_query -> have_posts()){
      while($home_top_query -> have_posts()){
        $home_top_query -> the_post();
        ?>
        <section class="section">
          <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
          <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>">
            <button class="black-btn"><?php echo get_post_meta(get_the_ID(), 'collection_btn_name', true); ?></button>
          </a>
        </section>
        <?php

      }
    }
  ?>



  <?php 
    $home_not_top_query = new WP_Query([
      'post_type' => 'jordan',
      'posts_per_page' => 6,
      'meta_query' => [
        'key' => 'jdc_top',
        'value' => 'false',
        'compare' => '='
      ]
    ]);

    if($home_not_top_query -> have_posts()){
      while($home_not_top_query -> have_posts()){
        $home_not_top_query -> the_post();
        ?>
        <section class="section">
          <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
          <a href="<?php echo get_post_meta(get_the_ID(), 'collection_link', true); ?>">
            <button class="black-btn"><?php echo get_post_meta(get_the_ID(), 'collection_btn_name', true); ?></button>
          </a>
        </section>
        <?php

      }
    }
  ?>



<?php 
  get_footer();
?>