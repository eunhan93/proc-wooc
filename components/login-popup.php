<section class="login-popup">
   <div class="inner-login-popup">
    <button type="button" class="login-popup-close">x</button>
    <div class="login-popup-tit">
        <img src="<?php echo get_post(get_post_meta('216', 'comp_logo_image', true)) -> guid; ?>" alt="<?php echo put_text_meta('216', 'comp_name');?>">
        <h1>나이키 로그인</h1>
    </div>
    <div class="login-form-area">
      <?php echo do_shortcode('[theme-my-login action="login"]')?>
    </div>
  </div>
</section>
<section class="login-popup-background">
</section>

 
<script>
    document.querySelector('.login-popup-close').addEventListener('click', () => {
        document.querySelector('.login-popup').classList.remove('on');
        document.querySelector('.login-popup-background').classList.remove('on');
    })

    // document.querySelector('.login-popup input[name=redirect_to]').setAttribute('value', window.location.origin) <- 
    document.querySelector('.login-popup input[name=redirect_to]').setAttribute('value', `${window.location.origin}/wordpress`)
    // console.log(document.querySelector('.login-popup input[name=redirect_to]'))
</script>