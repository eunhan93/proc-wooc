<div class="custom-group">


<!-- 
<table>
 -->

<div class="options_group">
		<p class="form-field">
			<label for="group-item"><?php esc_html_e( 'Grouped products', 'woocommerce' ); ?></label>
			<select class="wc-product-search add-group-item" multiple="multiple" style="width: 50%;" id="group-item" name="group_item[]" data-sortable="true" data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'woocommerce' ); ?>" data-action="woocommerce_json_search_products" data-exclude="<?php echo intval( $post->ID ); ?>">
				<?php
				// $product_ids = $product_object->get_children( 'edit' )?: array();

				foreach ( $product_ids as $product_id ) {
					$product = wc_get_product( $product_id );
					if ( is_object( $product ) ) {
						echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . esc_html( wp_strip_all_tags( $product->get_formatted_name() ) ) . '</option>';
					}
				}
				?>
			</select>
			<button type="button" id="addGroupItemBtn">확인</button> <?php echo wc_help_tip( __( 'This lets you choose which products are part of this group.', 'woocommerce' ) ); // WPCS: XSS ok. ?>
		</p>
	</div>
</div>

<?php

$g_items = get_post_meta(get_the_ID(), "g_items", true);

?>

<!-- </table> -->


<!-- <input type="hidden" id="get_the_post_id" name="meta[selected_group_item]" value="<?php echo (get_post_meta(get_the_ID(), 'selected_group_item', true)); ?>"> -->
<div class="group_post_id">
<!-- <script>

</script> -->
 <?php
 if(!empty($g_items)){
		foreach($g_items as $gi){
			?>
			<div>
			
				<input type="hidden" value="<?php echo $gi; ?>" name="meta[g_items][]" id="product-<?php echo $gi; ?>" />
				<label for="product-<?php echo $gi; ?>">
				<?php
				
				echo '<p>' . get_the_post_thumbnail($gi, 'thumbnail') . '</p>';
				echo '<p>' . get_the_excerpt($gi) . '</p>';

				?>
				</label>
				<button type="button" onclick="javascript: this.parentNode.parentNode.removeChild(this.parentNode)">제거</button>
			</div>
			<?php
		}
	
 }
 
 
 ?>

</div>
<div class="group_post_id_thumbnail">
	<?php 

		if(!empty($g_items)){
			foreach($g_items as $p_id){
				?>
				<div>
				<?php
				
				// echo '<p>' . get_the_post_thumbnail($p_id, 'thumbnail') . '</p>';
				// echo '<p>' . get_the_excerpt($p_id) . '</p>';

				?>
				</div>
				<?php
			}
		}


	?>

</div>

</div>