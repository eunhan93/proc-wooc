<?php

get_header(); ?>


<div class="inner-main container-3">

<?php while ( have_posts() ) :
	 the_post();
	global $product;

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
		</div>
	</section>

		

		<?php endwhile; // end of the loop. ?>

	</div>
<?php
get_footer();
