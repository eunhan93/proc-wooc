<div>
  <!-- <?php var_dump(get_post_meta(get_the_ID(), 'jordan_main_up') ); ?> -->
  <table>
    <tbody>
      <tr>
        <th><label for="jordan_main_up">조던 메인페이지에 추가</label></th>
        <td>
          <input type="hidden" name="meta[jordan_main_up]" id="jordan_main_up" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'jordan_main_up', true)); ?>" />
          <input type="checkbox" name="j_m_u_cb" id="j_m_u_cb" 
          <?php 
          
          if(esc_attr(get_post_meta(get_the_ID(), 'jordan_main_up', true)) === 'true'){
            echo "checked='true'";
          }
          ?>
          />
        </td>
      </tr>
    </tbody>
  </table>
</div>