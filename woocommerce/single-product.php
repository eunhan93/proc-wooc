<?php

get_header(); 
$parentDir = dirname(__DIR__ . '..'); 

// var_dump(get_post('337'));
?>


<div class="inner-main container-3">

<?php while ( have_posts() ) :
	 the_post();
	global $product;

	$ch = new WC_Product_Variable(get_the_ID());

	
	// var_dump(wc_get_product(get_the_ID()));
	// var_dump(get_the_taxonomies(get_the_ID()));
	// var_dump(get_post_meta(get_the_ID(), "_product_attributes"));
	?>
	<section class="product-detail">
	<div class="product-images">
		<?php 
		foreach($product->gallery_image_ids as $imgId){
			?>
				<div class="product-image">
					<img src="<?php
						echo wp_get_attachment_image_url($imgId, 'large');
						?>" alt="<?php echo $product->name;?>" />
				</div>		
			<?php

		}
		
		?>
	
		</div>
		<div class="product-info">
			<h5><?php echo wc_get_product_tag_list( $product->get_id(), ' '); ?> <span><?php echo number_format($product->price); ?> 원</span></h5>
			<h1><?php echo $product -> name; ?></h1>
			<div class="product-colors">
				<?php 
					$postIdArr = get_post_meta(get_the_ID(), "g_items", true);
					foreach($postIdArr as $gi) {
						?>
						<a href="<?php echo get_the_permalink($gi)?>" class="<?php 
						
							if($gi == get_the_ID()){
								echo "this_product";
							}
						?>">
						<?php
						echo get_the_post_thumbnail($gi, "thumbnail", ["class" => "group-item-thumbnail"]);
						?>
						</a>
						<?php
					}
					
				?>

			</div>

			<form action="<?php echo home_url() . '/';?>" method="get" target="empty_iframe">
			<div class="product-siezes">
				<h4>사이즈 선택 <span>사이즈 가이드</span></h4>
				<ul>
					<?php 
					  $sizeOption = $ch ->get_children();
						$sizes = $product -> attributes['size']['options'];
						foreach($sizeOption as $s){
							$s_detail = get_post($s);
							// var_dump($s_detail);
							$s_tit = str_replace($product -> name .' - ', "", $s_detail -> post_title);
							// var_dump(get_post_meta($s, '_stock_status', true));
							?>
								<li>
									<input type="radio" name="add-to-cart" value="<?php echo $s_detail -> ID; ?>" id="size-<?php echo $s_tit; ?>" class="<?php echo get_post_meta($s, '_stock_status', true);?>">
									<label for="size-<?php echo $s_tit; ?>"><?php echo $s_tit;?></label>
								</li>
							<?php
						}
					?>

				</ul>
				
			</div>
			<p><a href="#"><i class="fas fa-comments"></i> <strong>NOTIFY ME</strong> 입고 알림 신청</a></p>
			<p>
				<label for="quantity">수량</label>
				<input type="number" name="quantity" id="quantity" min='1' max='10' value='1'>
				<button type="button" class="qty-minus">-</button>
				<button type="button" class="qty-plus">+</button>
				
			</p>
			<div class="btn-area">
				<button type="button" class="quickBuyBtn">바로구매</button>
				<p>
					<input type="submit" value="장바구니">
					<span>
						<input type="checkbox" id="wish_cb">
						<label for="wish_cb">위시리스트 </label>
					</span>
				</p>
				
			</div>
			
			</form>
			<div class="store-pick-up">
				<button type="button"><i class="fas fa-store"></i> 배송보다 빠른, 매장픽업 서비스</button>
				<p>지금 주문하고, 매장에서 바로 픽업하세요.
					<a href="https://www.nike.com/kr/ko_kr/reserveService">자세히 보기</a>
				</p>
			</div>
			<div class="content">
				<div class="inner-content">
					<?php echo nl2br(get_post_meta(get_the_ID(), 'toc', true)) ?>
				</div>
				<button type="button" onclick="javascript:
			document.querySelector('.product-read-more').classList.add('on');
			// document.body.addEventListener('scroll', function(e) {e.preventDefault()});
		">더 보기</button>
			</div>
		</div>
	</section>

	<div class="product-read-more">
		<button onclick="javascript:
			document.querySelector('.product-read-more').classList.remove('on');
			// document.body.removeEventListener('scroll', function(e) {e.preventDefault()});

		">x</button>
		<div class="container-3">
			<?php the_content() ?>
		</div>
		<?php do_action('custom_action_test') ?>
		
	</div>

	<iframe src="#" name="empty_iframe" style="width:1px; height:1px; border:0; visibility:hidden;"></iframe>



	<script>
		let out_of_stock = document.querySelectorAll('.outofstock');
		out_of_stock.forEach(el => {
			el.setAttribute('disabled', 'true');
		})
	</script>


		

		<?php endwhile; // end of the loop. ?>

		<?php
			$args = array(
        'post_type' 	=> array( 'product' ),
        'product_cat' => 'jordan',
        'orderby'   	=> 'rand',
        'posts_per_page'		=> 10
      ); 
			include $parentDir . '/components/slider/woo-rec-items.php'; 
		?>

</div>


<?php
get_footer();



// woocommerce_before_shop_loop_item