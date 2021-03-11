<div class="swiper-container">
  <div class="swiper-wrapper">
    <!-- 슬라이드 영역 -->
    <?php 
    $args = array(
      'post_type' 	=> 'product',
      'product_cat' => 'jordan',
      'meta_key'  	=> 'total_sales',
      'orderby'   	=> 'meta_value_num',
      'order' 		=> 'desc',
      'posts_per_page'		=> 6
    );
    
    $popular_products = new WP_Query( $args );
    
    if ( $popular_products->have_posts() ){
      while ( $popular_products->have_posts() ) {
        $popular_products->the_post();
        ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink() ?>">
              <div class="img-area">
                <?php the_post_thumbnail();?>
              </div>
              <div class="text-area">
                <h4><?php the_title();?></h4>
                <p><?php the_excerpt() ?></p>
              </div>
            </a>
            
            
          </div>
        <?php
      }
    }
    ?>
  </div>
  <div class="swiper-scrollbar"></div>
</div>


<!-- swiper-slide'' => 'category-slug-here', -->