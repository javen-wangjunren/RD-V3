<?php
function toogleable_icon_tabs_shortcode() { 
	ob_start();
?>
<?php if( have_rows('icons_tabs_image_with_text') ): 
	$tab1_rep = 0;
?>
<div class="container">
	<div class="elementor-section mega-mat-tabs">
		<div class="elementor-container-xx">
			<div class="d-block position-relative">
				<div class="special-line-icon-tabs">
					
				</div>
				<div class="w-100 position-relative">
					<ul class="nav nav-tabs list-three icon-tabs-p0 justify-center" role="tablist">
						<?php if( have_rows('icons_tabs_image_with_text') ): 
						$tab1_rep = 0;
						?>
						<?php while( have_rows('icons_tabs_image_with_text') ): the_row(); ?>
						<li class="nav-item">
							<a class="nav-link <?php if($tab1_rep == 0){echo 'active';}?>" data-bs-toggle="tab" href="#icontab-<?= $tab1_rep;?>">
								<div class="text-center">
									<img src="<?= the_sub_field('icon');?>" class="d-inline-block non-active-image" width="64px" alt="icon for <?= the_sub_field('title');?>">
									<img src="<?= the_sub_field('icon_copy');?>" class="d-inline-block active-image" width="64px" alt="active icon for <?= the_sub_field('title');?>">
								</div>
								<div class="mt-3 fs-14">
									<?= the_sub_field('title');?>
								</div>
							</a>
						</li>
						<?php $tab1_rep++; endwhile;?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="d-block">
				<div class="tab-content tab-pane-pd-0 mt-40">
					<?php if( have_rows('icons_tabs_image_with_text') ): 
						$tab1_rep = 0;
						?>
					<?php while( have_rows('icons_tabs_image_with_text') ): the_row(); ?>
					<div id="icontab-<?= $tab1_rep;?>" class="container tab-pane <?php if($tab1_rep == 0){echo 'active';}?>">
						<h3 class="color-orange fw-700">
							<?= the_sub_field('title');?>
						</h3>
						<div class="mt-3">
							<?= the_sub_field('description');?>
						</div>
						<div class="mt-40 elementor-container">
							<div class="elementor-column elementor-col-30 elementor-inner-column d-block">
								<img class="w-100" src="<?= get_sub_field('image')['url'];?>" alt="<?= get_sub_field('image')['alt'];?>">
							</div>
							<div class="elementor-column elementor-col-70 elementor-inner-column d-block ps-40">
								<div class="special-ul-text check-ul ul-mb-4">
									<?= the_sub_field('text');?>
								</div>
								<?php if(get_sub_field('button_link')){ ?>
								<div class="">
									<a href="<?= the_sub_field('button_link');?>" class="uael-trigger elementor-button-link elementor-button elementor-clickable elementor-size-sm" data-modal="a9c8f72" style="margin-left: 30px; background: black;">
										<span class="elementor-button-content-wrapper">

											<span class="elementor-align-icon- elementor-button-icon">
											</span>
											<span class="elementor-button-text elementor-inline-editing" data-elementor-setting-key="btn_text" data-elementor-inline-editing-toolbar="none"><?= the_sub_field('button_text');?></span>
										</span>
									</a>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php $tab1_rep++; endwhile;?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php
	return ob_get_clean();
}
// register shortcode
add_shortcode('icon-tabs', 'toogleable_icon_tabs_shortcode');?>