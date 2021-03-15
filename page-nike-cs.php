<?php 

get_header();
?>

<section class="nike-cs-2">
  <div class="inner-nike-cs-2 container-4 <?php if(!empty($_GET['query'])){
    echo 'search-result';
  } else {
    echo 'no-search';
  }?>">
    <?php 
      if(!empty($_GET['query'])){
    
      // <!-- 검색 상태 -->
      include 'components/cs/nike-cs-search.php';

      } else {
    
      // <!-- 검색하지 않은 기본 페이지 -->
      include 'components/cs/nike-cs-no-search.php';

      }
    ?>

  </div>
</section>
<?php 
if(empty($_GET['query'])){
?>

<section class="nike-cs-3">
  <div class="inner-nike-cs-3 container-4">
    <h3>contact us</h3>
    <ul class="nike-cs-3-contact">
      <li>
        <i class="fas fa-phone-alt"></i>
        <h6>전화문의</h6>
        <p>080-000-0000<br />월-일 오전 9시 ~ 오후 8시</p>
      </li>
      <li>
        <i class="fas fa-comment-dots"></i>
        <h6>1:1 채팅 문의</h6>
        <p>1:1 채팅 문의하기</p>
      </li>
      <li>
        <i class="fas fa-envelope"></i>
        <h6>1:1 Email 문의</h6>
        <p>Email 문의하기<br />문의내역확인</p>
      </li>
      <li>
        <i class="fas fa-map-marker-alt"></i>
        <h6>매장안내</h6>
        <p>가까운 나이키 매장찾기</p>
      </li>
    </ul>
  </div>

</section>


<?php
}

get_footer();

?>