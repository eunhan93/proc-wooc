<div class="postbox">
  <h2 class="postbox-header">교환 정보</h2>
  <div class="inside">
    <?php
    $comp_exchange_info = get_post_meta(get_the_ID(), 'comp_exchange_info', true);
    wp_editor($comp_exchange_info, 'comp_exchange_info', [
      'textarea_name' => 'meta[comp_exchange_info]',
      'textarea_rows' => 7,
    ]);
    ?>
  </div>
</div>
<div class="postbox">
  <h2 class="postbox-header">환불 정보</h2>
  <div class="inside">
    <?php
    $comp_refund_info = get_post_meta(get_the_ID(), 'comp_refund_info', true);
    wp_editor($comp_refund_info, 'comp_refund_info', [
      'textarea_name' => 'meta[comp_refund_info]',
      'textarea_rows' => 7,
    ]);
    ?>
  </div>
</div>
<div class="postbox">
  <h2 class="postbox-header">주의사항</h2>
  <div class="inside">
    <?php
    $comp_shop_notice = get_post_meta(get_the_ID(), 'comp_shop_notice', true);
    wp_editor($comp_shop_notice, 'comp_shop_notice', [
      'textarea_name' => 'meta[comp_shop_notice]',
      'textarea_rows' => 7,
    ]);
    ?>
  </div>
</div>

