<?php 
    if(is_page('nike-cs')){
      ?>
      </div>

    <?php
    }

    if(is_tax('cs-type')){
      ?>
      </div>

    <?php
    }
    ?>
    
    </main>
    <footer class="footer">
    <?php 
      // var_dump(get_post_meta('216'));
      // function put_text_meta($postNumber, $metaname){
      //   if(!empty(get_post_meta( $postNumber, $metaname, true ))){
      //     echo get_post_meta( $postNumber, $metaname, true );
      //   } else{
      //     echo '-';
      //   }
      // }
    ?>
      <section class="inner-footer container-2">
        <div>
          <?php put_text_meta('216', 'comp_name'); ?> 대표 
          <?php put_text_meta('216', 'comp_owner'); ?> |
          <address style="display: inline-block;"><?php put_text_meta('216', 'comp_address'); ?></address> | 
          통신판매업신고번호 <?php put_text_meta('216', 'comp_tongsin'); ?> |
          등록번호 <?php put_text_meta('216', 'comp_saupja'); ?> | 
          고객센터 전화문의 <a href="tel:<?php put_text_meta('216', 'comp_cs_number'); ?>"><?php put_text_meta('216', 'comp_cs_number'); ?></a> | E-mail <?php put_text_meta('216', 'comp_email'); ?>
        </div>
        <div>
          <?php put_text_meta('216', 'comp_footer_notice'); ?>
        </div>
      </section>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>