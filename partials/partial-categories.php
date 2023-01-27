<?php
//Template Categories
?>

<section id="soothing-categories">
	<div class="inner">
		<div class="soothing-section-header"><h2>SHOP BY CATEGORY</h2></div>
	</div>
	<div class="inner">
		<div class="row">
			<?php foreach($categories as $c):?>
				<div class="category">
					<div class="category-image">
						<a href="<?php $link = vc_build_link($c['category_link']); echo isset($link['url']) ? $link['url'] : '#';?>">
							<img src="<?php echo soothing_get_image_url($c['category_image']);?>" alt="<?php echo $c['category_image'];?>">
						</a>
					</div>
					<div class="category-link"><a href="<?php $link = vc_build_link($c['category_link']); echo isset($link['url']) ? $link['url'] : '#';?>"><?php echo $c['category_name']?></a></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
