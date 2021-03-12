<form role="search" method="get" id="cs-searchform" class="cs-searchform" action="<?php echo home_url() . '/nike-cs/'?>">
  <div>
    <label class="screen-reader-text" for="query">검색어:</label>
    <i class="fab fa-sistrix"></i>
    <input type="hidden" name="utf8" value="✓">
    <input type="text" value="" name="query" id="query" placeholder="<?php 
      if(is_single('cs')){
        echo '검색';
      } else if(is_page('nike-cs')){
        echo '무엇을 도와드릴까요?';
      }
    ?>"/>
    <!-- <button type="submit" id="searchsubmit"><i class="fab fa-sistrix"></i></button> -->
  </div>
</form>

