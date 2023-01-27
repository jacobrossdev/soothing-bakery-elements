<?php
// Template Top Products
?>
<section id="soothing-top-products">
	<div class="inner">
		<div class="soothing-section-header"><h2>TOP PRODUCTS</h2></div>
	</div>
	<div class="inner">
		<div id="top-product-slider">
			<?php $i = 1;
			foreach( $products as $p ): ?>
				<div class="top-product">
					<div class="top-product-image">
						<a href="<?php $link = vc_build_link($p['top_product_link']); echo isset($link['url']) ? $link['url'] : '#'; ?>">
							<img src="<?php echo soothing_get_image_url($p['top_product_image']);?>" alt="<?php echo $p['top_product_desc'];?>">
						</a>
					</div>	
					<div class="top-product-desc"><?php echo $p['top_product_desc'];?></div>
					<div class="top-product-link">
						<a class="btn" href="<?php $link = vc_build_link($p['top_product_link']); echo isset($link['url']) ? $link['url'] : '#'; ?>">BUY NOW</a>
					</div>
				</div>
			<?php 
			if( $i % 3 == 0 ){
				echo '</div><div id="top-product-slider">';
				
				$i = 1;
			} else {
				$i++;
			}
			endforeach; ?>
		</div>
	</div>
</section>