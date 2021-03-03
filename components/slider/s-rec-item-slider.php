<div class="container-3">
          <h4>추천 상품</h4>

<div class="swiper-container">
  <div class="swiper-wrapper">
    <!-- 슬라이드 영역 -->
    <?php 
    $args = array(
      'post_type' 	=> array( 'product' ),
      'product_cat' => 'jd-rec',
      'orderby'   	=> 'rand',
      'posts_per_page'		=> 10
    );
    
    $rec_products = new WP_Query( $args );
    
    if ( $rec_products->have_posts() ){
      while ( $rec_products->have_posts() ) {
        $rec_products->the_post();
        ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink() ?>">
              <div class="img-area">
                <?php the_post_thumbnail();?>
              </div>
              <div class="text-area">
                <h4><?php the_title();?></h4>

                <?php 
                if(!empty(get_the_terms(get_the_ID(), "pa_color"))){
                  ?>
                  <p class="color_opt_count"><?php echo count(get_the_terms(get_the_ID(), "pa_color")); ?> 컬러</p>
                  <?php
                }
                
                ?>


                <!-- 가격 -->
                <?php 
                if(!empty(get_post_meta(get_the_ID(), "_sale_price", true))){
                  ?>
                  <p><?php echo number_format(get_post_meta(get_the_ID(), "_sale_price", true));?>원 </p>
                  <p style="text-decoration: line-through;"><?php echo number_format(get_post_meta(get_the_ID(), "_regular_price", true));?>원 </p>
                  <?php 
                } else if (!empty(get_post_meta(get_the_ID(), "_regular_price", true))){
                  ?>
                  <p><?php echo number_format(get_post_meta(get_the_ID(), "_regular_price", true));?>원 </p>
                  <?php
                } else if(!empty(get_post_meta(get_the_ID(), "_price", true))) {
                  ?>
                  <p><?php echo number_format(get_post_meta(get_the_ID(), "_price", true));?>원 ~</p>
                  <!-- <p>가격정보를 제공하지 않습니다.</p> -->
                  <?php
                }
                ?>
                
              </div>
            </a>
            
            
          </div>
        <?php
      }
    }
    ?>
  </div>
  <div class="swiper-pagination"></div>
</div>

</div>

<!-- 


                  // var_dump(get_the_terms(get_the_ID(), "pa_color"));

 -->