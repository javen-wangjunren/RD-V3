<?php
// =============================================================================
// TEMPLATE NAME: Notification Center
// -----------------------------------------------------------------------------
// =============================================================================
?>
<?php
//require('../../../wp-load.php' );
?>
	<?php 
		$is_flip = false;
		if(get_field('enable_notification', 'option') && get_field('enable_notification_flip', 'option')){
		$is_flip = true;
	 } ?>
	<style>.d-inline{display: inline;}</style>
	<div class="<?php if($is_flip){ echo 'flip-notification';}?> simple-flip-e-d">
		<?php if(get_field('enable_notification', 'option')){ ?>
			<div class="notify-center front-flip-notify py-1 <?php if(!$is_flip){ echo 'position-relative-imp';}?>" style="background: #EA543F;">
				<div class="notify-container d-flex-btw-ctr position-relative">
					<div class="notify-content color-black  <?php if(!get_field('help_center_link_890k', 'option')) { echo 'text-center-pp'; }?>" style="font-size:14px;color:white;">
						<?php the_field('notification_content', 'option')?> 
						<?php if(get_field('buttonlink_url', 'option')){?>
						<a href="<?php the_field('buttonlink_url', 'option')?>" class="ud22"><?php the_field('buttonlink_text', 'option')?></a>
						<?php } ?>
					</div>
<!-- 					<?php //if(get_field('help_center_link_890k', 'option')) {?>
						<a class="close color-white" href="<?php //get_field('help_center_link_890k', 'option');?>">
							<?php //get_field('help_center_text_890k', 'option');?>
						</a>
					<?php //} ?> -->
					<?php //if(is_user_logged_in()){ ?>
						<div class="switcher top-switch notranslate position-relative d-flex-btw-ctr d-flex-all">
							<?php if(get_field('help_center_link_890k', 'option')) {?>
								<div>
									<a class="close color-white" href="<?= get_field('help_center_link_890k', 'option');?>">
										<?= get_field('help_center_text_890k', 'option');?>
									</a>
								</div>
								<div>
									&nbsp;&nbsp;&nbsp;&nbsp;
								</div>
							<?php } ?>
							<div class="selected">
								<a href="#" onclick="gt_jquery_ready_custom(event); return false;">
									<span class="jkhui"><img src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/en-us.png" height="24" width="24" alt="en"> English </span> <span>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-down"></i></span></a>
							</div>
						</div>
					<?php //} ?>
				</div>
			</div>
		<?php } ?>
		<?php if(get_field('enable_notification_flip', 'option')){ ?>
			<div class="notify-center back-flip-notify back-flip-botify-v2 py-1 <?php if(!$is_flip){ echo 'position-relative-imp';}?>" style="background:#000;">
				<div class="notify-container d-flex-btw-ctr position-relative">
					<div class="notify-content color-white  <?php if(!get_field('help_center_link_890k', 'option')) { echo 'text-center-pp'; }?>" style="font-size:14px;">
						<?php the_field('notification_content_flip', 'option')?> 
						<?php if(get_field('buttonlink_url_flip', 'option')){?>
						<a href="<?php the_field('buttonlink_url_flip', 'option')?>" target="_blank" class="ud22"><?php the_field('buttonlink_text_flip', 'option')?></a>
						<?php } ?>
					</div>
<!-- 					<?php //if(get_field('help_center_link_890k', 'option')) {?>
						<a class="close color-white" href="<?php //get_field('help_center_link_890k', 'option');?>">
							<?php //get_field('help_center_text_890k', 'option');?>
						</a>
					<?php //} ?> -->
					<?php //if(is_user_logged_in()){ ?>
						<div class="switcher top-switch notranslate d-flex-btw-ctr d-flex-all position-relative">
							<?php if(get_field('help_center_link_890k', 'option')) {?>
								<div>
									<a class="close color-white" href="<?= get_field('help_center_link_890k', 'option');?>">
										<?= get_field('help_center_text_890k', 'option');?>
									</a>
								</div>
								<div>
									&nbsp;&nbsp;&nbsp;&nbsp;
								</div>
							<?php } ?>
							<div class="selected">
								<a href="#" onclick="gt_jquery_ready_custom(event); return false;">
									<span  class="jkhui"><img src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/en-us.png" height="24" width="24" alt="en"> English </span> <span>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-down"></i></span></a>
							</div>
						</div>
					<?php //} ?>
				</div>
			</div>
		<?php } ?>
		<?php if($is_flip){?>
			<div class="ghost-div py-1 position-relative">
				<div class="notify-content color-white <?php if(!get_field('help_center_link_890k', 'option')) { echo 'text-center'; }?>" style="font-size:14px;">
					<?php the_field('notification_content', 'option')?> 
					<?php if(get_field('buttonlink_url', 'option')){?>
					<a href="<?php the_field('buttonlink_url', 'option')?>" target="_blank" class="ud22"><?php the_field('buttonlink_text', 'option')?></a>
					<?php } ?>
				</div>
				<div class="d-block-below-980">
					<br>
				</div>
				<div class="switcher top-switch">
					<div class="selected">
						<a href="#" onclick="gt_jquery_ready_custom(event); return false;">
							<span  class="jkhui"><img src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/en-us.png" height="24" width="24" alt="en"> English </span> <span>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-down"></i></span></a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>


<?php //if(is_user_logged_in()){ ?>
<div class="notify-center">
	<div class="notify-container position-relative">
		<div class="switcher top-options notranslate">
			<div class="option-2">
				<a href="https://www.rapiddirect.com" onclick="doGTranslate('en|en');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="English" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/en-us.png" height="24" width="24" alt="en"> English</a><a href="https://www.rapiddirect.com/fr/" onclick="doGTranslate('en|fr');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="Français" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/fr.png" height="24" width="24" alt="fr"> Français</a><a href="https://www.rapiddirect.com/de/" onclick="doGTranslate('en|de');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="Deutsch" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/de.png" height="24" width="24" alt="de"> Deutsch</a><a href="https://www.rapiddirect.com/es/" onclick="doGTranslate('en|es');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="Español" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/es.png" height="24" width="24" alt="es"> Español</a><a href="https://www.rapiddirect.com/zh-CN/" onclick="doGTranslate('en|zh-CN');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="简体中文" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/zh-CN.png" height="24" width="24" alt="zh-CN"> 简体中文</a><a href="https://www.rapiddirect.com/ar/" onclick="doGTranslate('en|ar');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="العربية" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/ar.png" height="24" width="24" alt="ar"> العربية</a><a href="https://www.rapiddirect.com/hi/" onclick="doGTranslate('en|hi');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="हिन्दी" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/hi.png" height="24" width="24" alt="hi"> हिन्दी</a><a href="https://www.rapiddirect.com/ja/" onclick="doGTranslate('en|ja');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="日本語" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/ja.png" height="24" width="24" alt="ja"> 日本語</a><a href="https://www.rapiddirect.com/pt/" onclick="doGTranslate('en|pt');jQuery('div.switcher div.selected a .jkhui').html(jQuery(this).html());return false;" title="Português" class="nturl"><img data-gt-lazy-src="//www.rapiddirect.com/wp-content/plugins/gtranslate/flags/24/pt.png" height="24" width="24" alt="pt"> Português</a></div>
		</div>
	</div>
</div>
		<?php //} ?>