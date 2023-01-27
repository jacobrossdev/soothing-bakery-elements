<?php
// Template Hero Banner
?>
<section id="soothing-hero-banner" class="fullwidth">
	<div class="hero-banner-bg" style="background-image: url('<?php echo soothing_get_image_url($atts['hero_banner_bg'])?>')">
		<div class="inner">
			<div class="hero-banner-header"><?php echo $header; ?></div>
			<div class="hero-banner-graphic">
				<a href="<?php $link = vc_build_link($p['top_product_link']); echo isset($link['url']) ? $link['url'] : '#'; ?>"><img src="<?php echo soothing_get_image_url($atts['hero_banner_graphic'])?>" alt="PurelySoothing.com - Hero Banner"></a>
			</div>
		</div>
	</div>
</section>