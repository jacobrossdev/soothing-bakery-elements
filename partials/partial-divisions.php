<?php
// Template Divisions
?>
<section id="soothing-divisions">
	<div class="inner">
		<div id="division-slider">
			<?php $i = 1;
			foreach( $divisions as $p ): ?>
				<div class="division">
					<div class="division-image">
						<a href="<?php $link = vc_build_link($p['division_link']); echo isset($link['url']) ? $link['url'] : '#'; ?>">
							<img src="<?php echo soothing_get_image_url($p['division_image']);?>" alt="<?php echo $p['division_desc'];?>">
						</a>
					</div>	
					<div class="division-desc">
						<a href="<?php $link = vc_build_link($p['division_link']); echo isset($link['url']) ? $link['url'] : '#'; ?>">
							<?php echo $p['division_desc'];?>
						</a>
					</div>
				</div>
			<?php 
			if( $i % 3 == 0 ){
				echo '</div><div id="division-slider">';
				
				$i = 1;
			} else {
				$i++;
			}
			endforeach; ?>
		</div>
	</div>
</section>