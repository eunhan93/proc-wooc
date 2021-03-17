

<?php 
  get_header();
  ?>

<div class="inner-main container-4 login-page">
  <?php 

  if(have_posts()){
    while(have_posts()){
      the_post();
      ?>
      <section class="login-area">
        <div class="inner-login-area">
          <div class="login-area-tit">
              <img src="<?php echo get_post(get_post_meta('216', 'comp_logo_image', true)) -> guid; ?>" alt="<?php echo put_text_meta('216', 'comp_name');?>">
              <h1>나이키 로그인</h1>
          </div>
          <div class="login-form-area">
            <?php the_content();?>
          </div>
        </div>
      </section>


      
    <?php
    }
  }
  ?>
</div>


<?php 
  get_footer();
?>