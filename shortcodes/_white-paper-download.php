<?php
	function service_download_file_shortcode() { 
		ob_start();
		?>
		<?php if(get_field('turn_on_banner_white')){?>
			<div class="download-white-paper">
				<div class="image-section">
					<?php $imgSerPer = get_field('banner_image_98jhup_white');?>
					<img src="<?= $imgSerPer['url'];?>" width="100%" alt="<?= $imgSerPer['alt'];?>">
				</div>
				<div class="extra-space-white-paper">

				</div>
				<div class="download-data-other">
					<div class="heading-white-paper">
						<?= get_field('title_98jhup_white');?>
					</div>
					<div class="description-white-paper">
						<?= get_field('description_98jhup_white');?>
					</div>
					<div class="button-white-paper">
						<a href="<?= get_field('button_url_98jhup_white');?>" class="elementor-button-link elementor-button elementor-size-lg button-shortcode" role="button" target="_blank">
							<?= get_field('button_text_98jhup_white');?>				
						</a>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('download-white-paper', 'service_download_file_shortcode');
?>