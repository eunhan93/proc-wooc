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
  include 'components/cs/nike-cs-contact.php';
}

get_footer();

?>