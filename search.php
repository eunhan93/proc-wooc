<?php 
  get_header();

?>
<div class="inner-main container-1">
<section class="section s-result">
  <?php

    $s_keyword = $_GET["s"];

    if($s_keyword !== ""){

      $args = [
        "post_type" => "product",
        "s" => $s_keyword
      ];
    
      $findQuery = new WP_Query($args);
      $total = $findQuery->found_posts;

      if($total !== 0){
        if($findQuery -> have_posts()){
          while($findQuery -> have_posts()){
            $findQuery -> the_post();
            ?>
                <?php the_post_thumbnail();?>
                <?php the_content();?>
            <?php
          }
        } 
      } else {
        ?>
          <p>검색어 "<?php echo $s_keyword?>"에 일치하는 정보를 찾지 못했습니다.</p>
        <?php
      }
    } else {
      ?>
        <p>검색어 "<?php echo $s_keyword?>"에 일치하는 정보를 찾지 못했습니다.</p>
      <?php
    }
  ?>

</section>

<section class="section s-slider">
<?php 
  include 'components/slider/s-rec-item-slider.php'
?>
</section>

</div>

<?php

  get_footer();
?>
