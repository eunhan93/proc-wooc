<?php 
  get_header();

?>
<div class="inner-main container-1">

  <?php

    // 검색 키워드
    $s_keyword = get_search_query();

    // 키워드가 빈값인지 확인
    if($s_keyword !== ""){

      // 키워드 검색
      // 키워드 검색 쿼리
      $searchKeywordQuery = new WP_Query([
        "post_type" => "product",
        "s" => "$s_keyword",
      ]);

      // 키워드 검색 결과 개수
      $totalSearchKeyword = $searchKeywordQuery->found_posts;





      // 태그 검색

      // 키워드 검색 결과값을 제외 - 중복값을 제외하기 위한 조건
      // 추후 다른 방법을 찾으면 업데이트할 예정

      // 태그 검색 wp_query의 "post__not_in"에 넣을 배열
      $keywordResultArr = array();

      // "post__not_in"에는 해당 post id가 필요하다.
      foreach($searchKeywordQuery->posts as $i){
        // foreach를 이용하여 값을 배열에 넣는다.
        $keywordResultArr[] = $i -> ID;
      }

      // 태그 검색 쿼리 - tax_query
      $searchTagQuery= new WP_Query([
        "post_type" => "product",
        "post__not_in" => $keywordResultArr, // 키워드 검색 결과값의 해당 post id 배열
        "tax_query" => [[
          'taxonomy' => 'product_tag',
          'field' => 'name',
          'terms' => $s_keyword
        ]],
        
      ]);

      // 태그 검색 결과 개수
      $totalSearchTag = $searchTagQuery -> found_posts;
      

      // 검색 결과 유무 확인 - 키워드, 태그 검색 둘 중 하나라도 있으면 검색 결과를 보여준다.
      if(($totalSearchKeyword + $totalSearchTag) > 0){
        ?>
        <section class="section s-result">
        <?php
        if($totalSearchKeyword > 0){
          if($searchKeywordQuery-> have_posts()){
            while($searchKeywordQuery-> have_posts()){
              $searchKeywordQuery-> the_post();
              ?>
                <?php include 'components/searchPage/searchItem.php' ; ?>
              <?php
            }
            ?>

          
            <?php
          }
        }
        
        if($totalSearchTag > 0){
          if($searchTagQuery-> have_posts()){
            // echo "<pre>";
            // var_dump($searchKeywordQuery);
            // echo "</pre>";
          while($searchTagQuery-> have_posts()){
            $searchTagQuery-> the_post();
            ?>
              <?php include 'components/searchPage/searchItem.php' ; ?>
            <?php
          }
          ?>

          <?php
          } 
        }
        ?>
        </section>
        <?php
      } else {
        ?>
        <section class="section s-no-result">
          <h5>검색어 "<span><?php echo $s_keyword?></span>"에 일치하는 정보를 찾지 못했습니다.</h5>
          <p>
            단어의 철자나 띄어쓰기가 정확한지 확인해주세요.<br />
            한글을 영어로 혹은 영어를 한글로 입력했는지 확인해주세요.<br />
            특수문자를 제외하고 검색해보세요.
          </p>
        </section>

        <section class="section s-slider">
          <?php 
            include 'components/slider/s-rec-item-slider.php'
          ?>
        </section>

        <?php
      }
    } else {
      ?>
      <section class="section s-no-result">
        <h5>검색어 "<span><?php echo $s_keyword?></span>"에 일치하는 정보를 찾지 못했습니다.</h5>
        <p>
          단어의 철자나 띄어쓰기가 정확한지 확인해주세요.<br />
          한글을 영어로 혹은 영어를 한글로 입력했는지 확인해주세요.<br />
          특수문자를 제외하고 검색해보세요.
        </p>
      </section>

      <section class="section s-slider">
        <?php 
          include 'components/slider/s-rec-item-slider.php'
        ?>
      </section>
      <?php
    }
  ?>
</div>

<?php
  get_footer();
?>