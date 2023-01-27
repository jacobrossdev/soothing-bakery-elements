<?php
// Template testimonials
?>
<section id="soothing-testimonials">
	<div class="inner">
		<div class="soothing-section-header"><h2>Testimonials</h2></div>
	</div>
	<div class="inner slider">
		<div id="testimonial-slider">
			<?php foreach($testimonials as $t) :?>
				<div class="testimonial">
					<div class="testimonial-image"><img src="<?php 
						if( !empty($t["testimonial_image"]) ){
							echo soothing_get_image_url($t['testimonial_image']);
						} else {
							echo dirname(plugin_dir_url(__FILE__)) . '/assets/img/person-image.jpg';
						}
					?>" alt="PurelySoothing.com Free E-Book"></div>
					<div class="testimonial-name"><?php echo $t['testimonial_name']; ?></div>
					<div class="testimonial-location"><?php echo $t['testimonial_location']; ?></div>
					<div class="testimonial-text"><p><?php echo $t['testimonial_text']; ?></p></div>

				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<script>
	jQuery(document).ready(function($){

		if ($(window).width() <= 821) {
			var testimonial_slider_opts = {
		  	
			    minSlides: 1,
			  	maxSlides: 1,
				infiniteLoop: true,
				shrinkItems: true,
				responsive: true,
				pager: false,
				moveSlides: 1,
				controls: false
			}

		} else {

			var testimonial_slider_opts = {
				useCSS: false,
				mode:'horizontal',
				minSlides: 1,
				maxSlides: 3,
				slideWidth: 345,
				slideMargin: 65,
				moveSlides: 1,
				infiniteLoop: true,
				shrinkItems: true,
				responsive: true,
				pager: false,
				controls: false
			}

		}

		var testimonial_slider = $('#testimonial-slider').bxSlider(testimonial_slider_opts);

	});
</script>