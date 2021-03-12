<?php 

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
  'posts_per_page' => 10,
  "paged" => $page_num
]);

// var_dump($s_query );
?>
<h3>"<?php echo $_GET['query']; ?>"에 대한 <?php echo $s_query -> found_posts; ?>개의 결과</h3>

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

<div class="test">
  <a href="<?php echo curPageURL() . '&page_num=2'; ?>">2</a>

</div>
