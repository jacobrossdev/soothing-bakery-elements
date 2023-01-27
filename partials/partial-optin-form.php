<?php
// Template Optin-Form
?>
<section id="soothing-optin-form">
	<div class="inner clearfix">
		
		<div class="optin-form-graphic">
			<img src="<?php echo soothing_get_image_url($atts['optin_image']);?>" alt="PurelySoothing.com Free E-Book">
		</div>	
		<div class="optin-form-content">
			
			<div class="form-heading">
				<h3><?php echo $atts['optin_header'];?></h3>
			</div>

			<div class="form-input">
				<form method="POST" action="">
					<div class="form-group">
						<div class="form-control btn">
							<input type="submit" name="soothing-optin-submit" value="Send">
						</div>
						<div class="form-control input">
							<input type="email" name="soothing-optin-email" value="" placeholder="Email Address">
						</div>
					</div>
				</form>
			</div>

			<div class="form-content">
				<p><?php echo $atts['optin_textarea'];?></p>
			</div>


		</div>

	</div>
</section>