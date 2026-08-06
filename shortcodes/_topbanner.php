<?php
	function service_banner_cta_shortcode() { 
		ob_start();
		?>
		<a href="<?= get_field('button_url_98jhup')?>">
			<div class="service-banner-cta">
				<div class="image-section">
					<?php $imgSerPer = get_field('banner_image_98jhup');?>
					<img src="<?= $imgSerPer['url'];?>" width="100%" alt="<?= $imgSerPer['alt'];?>">
				</div>
				<div class="heading-section mt-24 text-center">
					<?= get_field('title_98jhup');?>
				</div>
				<div class="elementor-button-wrapper mt-24 text-center">
					<span class="elementor-button-link elementor-button elementor-size-lg button-shortcode" role="button">
						<span class="d-inline-block">
							<img src="/wp-content/uploads/2022/09/upload-icon.svg" width="24px" alt="upload cloud">
						</span> <?= get_field('button_text_98jhup');?>
					</span>
				</div>
				<div class="confidential-stuff mt-24 text-center">
					<span class="d-inline-block">
						<img src="/wp-content/uploads/2022/09/lock-icon.svg" width="8px" alt="lock icon">
					</span>
					All uploaded files are secure and confidential
					<br>

				</div>
			</div>
		</a>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('service-banner-cta', 'service_banner_cta_shortcode');
?>