<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php echo bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo bloginfo('title'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class()?>>
  <section class="notice404">
    <img src="http://localhost/wordpress/wp-content/uploads/2021/02/nike_PNG18-e1614240873626.png" alt="나이키 로고">
    <h1>서비스 이용에 불편을 드려서 죄송합니다.</h1>
    <p>(404-NOT-FOUND)<br />현재 서비스에 일시적인 오류가 발생했습니다.<br />이용에 불편을 드린 점 진심으로 사과 드리며, 고객 여러분의 양해 부탁드립니다.</p>
    <div>
      관련문의사항은 고객센터에 문의해주시면 친절히 안내해드리겠습니다.<br />고객상담전화 : 000-000-0000<br /><a href="<?php echo home_url(); ?>">홈페이지</a>
    </div>
  </section>
</body>
</html>