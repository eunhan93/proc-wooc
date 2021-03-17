
<section class="nike-cs-3">
  <div class="inner-nike-cs-3 container-4">
    <h3>contact us</h3>
    <ul class="nike-cs-3-contact">
      <li>
        <i class="fas fa-phone-alt"></i>
        <h6>전화문의</h6>
        <?php 
        if(is_single() && 'cs' == get_post_type()){
          ?>
            <p><a href="tel:0800000000">080-000-0000</a><br />월-일 오전 9시 ~ 오후 8시</p>
          <?php
        } else if(is_tax('cs-type')){
          ?>
            <p><a href="tel:0800000000">080-000-0000</a><br />월-일 오전 9시 ~ 오후 8시</p>
          <?php
        } else {
          ?>
            <p>080-000-0000<br />월-일 오전 9시 ~ 오후 8시</p>
          <?php
        }
        ?>
        
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
