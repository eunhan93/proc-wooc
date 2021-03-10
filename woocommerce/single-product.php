<?php

get_header(); 

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
			<p>
				<label for="quantity">수량</label>
				<input type="number" name="quantity" id="quantity" min='1' max='10' value='1'>
				<button type="button" class="qty-minus">-</button>
				<button type="button" class="qty-plus">+</button>
				
			</p>
			
			<input type="submit" value="장바구니">
			<button type="button" class="quickBuyBtn">바로구매</button>
			</form>
		</div>
	</section>

	<iframe src="#" name="empty_iframe" style="width:1px; height:1px; border:0; visibility:hidden;"></iframe>



	<script>
		let out_of_stock = document.querySelectorAll('.outofstock');
		out_of_stock.forEach(el => {
			el.setAttribute('disabled', 'true');
		})
	</script>


	
		

		<?php endwhile; // end of the loop. ?>

	</div>
<?php
get_footer();
