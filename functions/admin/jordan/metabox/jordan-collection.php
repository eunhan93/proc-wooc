<div>
  <table>
    <tbody>
      <tr>
        <th><label for="collection_link">조던 컬렉션 카테고리 링크</label></th>
        <td><input type="text" class="regular-text" name="meta[collection_link]" id='collection_link' value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'collection_link', true));  ?>"/></td>
      </tr>
      <tr>
        <th><label for="collection_btn_name">버튼 이름</label></th>
        <td><input type="text" class="regular-text" name="meta[collection_btn_name]" id='collection_btn_name' value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'collection_btn_name', true));  ?>"/></td>
      </tr>
      <tr>
        <th><label for="jdc_top">조던 메인페이지에 추가</label></th>
        <td>
          <input type="hidden" name="meta[jdc_top]" id="jdc_top" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'jdc_top', true)); ?>" />
          <input type="checkbox" name="jdc_top_cb" id="jdc_top_cb" 
          <?php 
          
          if(esc_attr(get_post_meta(get_the_ID(), 'jdc_top', true)) === 'true'){
            echo "checked='true'";
          }
          ?>
          />
        </td>
      </tr>
    </tbody>
  </table>
</div>