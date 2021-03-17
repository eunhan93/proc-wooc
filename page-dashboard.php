

<?php 
  get_header();

  ?>

<div class="inner-main container-4">
  <?php 

  if(have_posts()){
    while(have_posts()){
      the_post();

      the_content();
    }
  }
  ?>
</div>


<?php 
  get_footer();
?>