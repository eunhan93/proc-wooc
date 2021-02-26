<div>
  <table>
    <tbody>
      <tr>
        <th><label for="comp_name">회사이름</label></th>
        <td><input type="text" id="comp_name" name="meta[comp_name]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_name', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_logo_image">회사이름</label></th>
        <td>
          <input type="hidden" id="comp_logo_image" name="meta[comp_logo_image]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_logo_image', true)); ?>"/>
          <button type="button" class="add_logo_img_btn">로고 이미지 추가</button>
          <div class="logo_img_check"></div>
          <button type="button" class="remove_logo_img_btn">이미지 삭제</button>
        </td>
      </tr>
      <tr>
        <th><label for="comp_owner">대표명</label></th>
        <td><input type="text" id="comp_owner" name="meta[comp_owner]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_owner', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_address">회사주소</label></th>
        <td><input type="text" id="comp_address" name="meta[comp_address]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_address', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_saupja">사업자등록번호</label></th>
        <td><input type="text" id="comp_saupja" name="meta[comp_saupja]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_saupja', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_tongsin">통신판매업 신고</label></th>
        <td><input type="text" id="comp_tongsin" name="meta[comp_tongsin]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_tongsin', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_cs_number">고객센터</label></th>
        <td><input type="text" id="comp_cs_number" name="meta[comp_cs_number]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_cs_number', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_Responsibility">개인정보 책임자</label></th>
        <td><input type="text" id="comp_Responsibility" name="meta[comp_Responsibility]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_Responsibility', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_email">이메일</label></th>
        <td><input type="text" id="comp_email" name="meta[comp_email]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_email', true)); ?>"/></td>
      </tr>
      <tr>
        <th><label for="comp_footer_notice">푸터 알림글</label></th>
        <td><input type="text" id="comp_footer_notice" name="meta[comp_footer_notice]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'comp_footer_notice', true)); ?>"/></td>
      </tr>
    </tbody>
  </table>
</div>


