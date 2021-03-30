<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>



<div class="content">
	<div class="inner-content">
		<?php echo nl2br(get_post_meta(get_the_ID(), 'toc', true)) ?>
	</div>
	<button type="button" onclick="javascript:
		document.querySelector('.product-read-more').classList.add('on');
	">더 보기</button>
</div>

<div class="product-read-more">
		<button onclick="javascript:
			document.querySelector('.product-read-more').classList.remove('on');
		">x</button>
		<div class="container-3">
			<div class="prm-top">
				<?php the_post_thumbnail()?>
				<span><?php echo number_format($product->price); ?> 원</span>
			</div>
			<?php the_content() ?>
		</div>
		<?php do_action('custom_action_test') ?>
		
	</div>