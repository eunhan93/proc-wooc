<?php 

$postsPerPage = 10;

function curPageURL() {
  $pageURL = 'http';
  if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
  }
?>
<?php 
$page_num = (!empty($_GET['page_num'])) ? $_GET['page_num'] : 1;
$s_query = new WP_Query([
  "post_type" => 'cs',
  's' => $_GET['query'],
  'posts_per_page' => $postsPerPage,
  "paged" => $page_num
]);

// var_dump($s_query );
?>
<?php 
  if($s_query -> found_posts >= 1){
    ?>
    <h3>"<?php echo $_GET['query']; ?>"에 대한 <?php echo $s_query -> found_posts; ?>개의 결과</h3>
    <?php
  } else {
    ?>
    <h3>‘<?php echo $_GET['query']; ?>’에 대한 검색 결과가 없습니다.</h3>
    <div class="result-0">
      <h4>검색결과가 없습니다.</h4>
      <p>
        단어의 철자나 띄어쓰기가 정확한지 확인해주세요.<br />한글을 영어로 혹은 영어를 한글로입력했는지 확인해주세요.<br />특수문자를 제외하고 검색해보세요.
      </p>
      <a href="javascript:alert('준비중입니다');">CONTACT US</a>
    </div>
    <?php
  }

?>


<?php
echo $_GET['page'];
if($s_query -> have_posts()){
  while($s_query -> have_posts()){
    $s_query -> the_post();
    ?>
    <a href="<?php the_permalink(); ?>">
      <h2><?php the_title();?></h2>
      <p><?php the_excerpt();?></p>
    </a>
    <?php
  }
}

?>

<?php 
if($s_query -> found_posts >= 1){
  ?>

  

<div class="cs-pagination">
  <?php
  
  $current_p_num = $_GET['page_num'];

  $c_page = str_replace('&page_num=' . $current_p_num, '', curPageURL());

  $tot_pages = ceil(($s_query -> found_posts)/$postsPerPage);

  // var_dump();
  
  
  ?>
  <a href="<?php 
    if(!empty($_GET['page_num']) && (int)$_GET['page_num'] > 1 && (int)$_GET['page_num'] - 1 > 1){
      echo $c_page . '&page_num=' . ((int)$_GET['page_num'] - 1);
    } else if(!empty($_GET['page_num']) && (int)$_GET['page_num'] > 1 && (int)$_GET['page_num'] - 1 === 1) {
      echo $c_page;
    } else {
      echo 'javascript:;';
    }
  ?>">이전</a>
  <?php

  // echo $c_page;
  for($i = 1; $i <= $tot_pages; $i++){
    if($i === 1){
    ?>
      <a href="<?php echo  $c_page;?>"><?php echo $i?></a>

    <?php
    } else {
    ?>
      <a href="<?php echo  $c_page . '&page_num=' . $i; ?>"><?php echo $i?></a>
    <?php
    }
  }
?>
  <a href="<?php 
    if(!empty($_GET['page_num']) && (int)$_GET['page_num'] < $tot_pages){
      echo $c_page . '&page_num=' . ((int)$_GET['page_num'] + 1);
    } else if(!empty($_GET['page_num']) && $_GET['page_num'] == $tot_pages) {
      echo 'javascript:;';
    } else {
      // 첫번째 페이지인 경우
      echo $c_page . '&page_num=2';
    }
  ?>">다음</a>

</div>

<?php
}
