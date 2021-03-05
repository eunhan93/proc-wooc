<div class="jd-item">
  <a href="<?php the_permalink();?>">
    <?php the_post_thumbnail();?>
    <section class="jd-item-info">
      <h3 class="jd-item-name"><?php the_title();?></h3>
      <?php 
      if(!empty(get_the_terms(get_the_ID(), 'product_tag'))){
        ?><p class="jd-item-tag"><?php
        foreach(get_the_terms(get_the_ID(), 'product_tag') as $tag){
          echo $tag -> name;
        } ?>
        </p>
        <?php
      }
      ?>
      <?php 
        if(!empty(get_the_terms(get_the_ID(), "pa_color"))){
        ?>
          <p class="jd-item-color-opt"><?php echo count(get_the_terms(get_the_ID(), "pa_color")); ?> 컬러</p>
        <?php
        }
      ?>
      <div class="jd-item-price" data-sale="<?php echo
        (!empty(get_post_meta(get_the_ID(), "_sale_price", true))) ? 
          floor(((get_post_meta(get_the_ID(), "_regular_price", true) - get_post_meta(get_the_ID(), "_sale_price", true)) / get_post_meta(get_the_ID(), "_regular_price", true)) * 100) . '%'
        : "";
      ?>">
      <?php 
        if(!empty(get_post_meta(get_the_ID(), "_sale_price", true))){
          ?>
          <p><?php echo number_format(get_post_meta(get_the_ID(), "_sale_price", true));?> 원</p>
          <p class="before-price"><?php echo number_format(get_post_meta(get_the_ID(), "_regular_price", true));?> 원</p>
          <?php 
        } else if (!empty(get_post_meta(get_the_ID(), "_regular_price", true))){
          ?>
          <p><?php echo number_format(get_post_meta(get_the_ID(), "_regular_price", true));?> 원</p>
          <?php
        } else if(!empty(get_post_meta(get_the_ID(), "_price", true))) {
          ?>
          <p><?php echo number_format(get_post_meta(get_the_ID(), "_price", true));?> 원~</p>
          <!-- <p>가격정보를 제공하지 않습니다.</p> -->
          <?php
        }
        ?>
      </div>
    </section>
  </a>
</div>