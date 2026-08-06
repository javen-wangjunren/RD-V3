<?php
function toogleable_multiple_tabs_shortcode() { 
	ob_start();
?>
<!-- Nav tabs -->
<div class="elementor-section mega-mat-tabs">
	<div class="elementor-container bg-white">
		<div class="elementor-column elementor-col-25 elementor-inner-column d-block bg-F1F1F1">
			<div class="w-100 bg-F1F1F1 ">
				<ul class="nav nav-tabs list-one" role="tablist">
					<?php if(get_field('plastic_only_tabs')){ ?>
					<div class="">
						<span class="type-pill">PLASTICS</span>
					</div>
					<?php }else{ ?>
					<div class="">
						<span class="type-pill">METALS</span>
					</div>
					<?php } ?>
					<?php if( have_rows('metal_tabs_8907op') ): 
	$tab1_rep = 0;
					?>
					<?php $plasticPos = get_field('plastic_start_position');?>
					<?php while( have_rows('metal_tabs_8907op') ): the_row(); ?>
					<li class="nav-item">
						<a class="nav-link <?php if($tab1_rep == 0){echo 'active';}?>" data-bs-toggle="tab" href="#metaltab-<?= $tab1_rep;?>"><?php the_sub_field('name')?></a>
					</li>
					<?php if($tab1_rep+1 == (int)$plasticPos){ ?>
					<br><hr class="opacity-25">
					<div class="">
						<span class="type-pill">PLASTICS</span>
					</div>
					<?php } ?>
					<?php $tab1_rep++; endwhile;?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="elementor-column elementor-col-75 elementor-inner-column d-block">
			<div class="tab-content tab-pane-pd-0">
				<?php if( have_rows('metal_tabs_8907op') ): 
	$tab1_rep = 0;
				?>
				<?php while( have_rows('metal_tabs_8907op') ): the_row(); ?>
				<div id="metaltab-<?= $tab1_rep;?>" class="container tab-pane <?php if($tab1_rep == 0){echo 'active';}?>">
					<ul class="nav nav-tabs list-two" role="tablist">
						<?php if( have_rows('sub_materials') ): 
	$tab2_rep = 0;
						?>
						<?php while( have_rows('sub_materials') ): the_row(); ?>
						<li class="nav-item">
							<a class="nav-link <?php if($tab2_rep == 0){echo 'active';}?>" data-bs-toggle="tab" href="#submattab-<?= $tab1_rep?>-<?= $tab2_rep;?>"><?php the_sub_field('sub_name')?></a>
						</li>
						<?php $tab2_rep++; endwhile;?>
						<?php endif; ?>
					</ul>
					<hr class="opacity-25">
					<div class="tab-content">
						<?php if( have_rows('sub_materials') ): 
	$tab2_rep = 0;
						?>
						<?php while( have_rows('sub_materials') ): the_row(); ?>
						<div id="submattab-<?= $tab1_rep?>-<?= $tab2_rep;?>" class="container tab-pane <?php if($tab2_rep == 0){echo 'active';}?>">
							<div class="elementor-container">
								<div class="elementor-column elementor-col-50 elementor-inner-column d-block p-24">
									<div class="tab-content zoooom-x">
										<?php if( have_rows('gallery') ): 
	$tab3_rep = 0;
										?>
										<?php while( have_rows('gallery') ): the_row(); ?>
										<div id="gallery-pu-<?= $tab1_rep?>-<?= $tab2_rep;?>-<?= $tab3_rep;?>" class="container tab-pane <?php if($tab3_rep == 0){echo 'active';}?>">
											<?php if(get_sub_field('related_youtube_video')){ ?>
											<?php 
											$video_url = get_sub_field('related_youtube_video');
											$matches = '';
											preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $video_url, $matches);
											$video_id = explode("?v=", get_sub_field('related_youtube_video'));
											$video_id = $matches[1];
											?>
											<iframe src="https://www.youtube.com/embed/<?= $video_id;?>?controls=1&modestbranding=1&rel=0&showinfo=0&enablejsapi=1" title="YouTube video player" frameborder="0" allow=" autoplay; encrypted-media;" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
											<?php }else{ ?>
											<img class="w-100 tab-img-tab" alt="<?php echo get_sub_field('image')['alt'];?>" src="<?php echo get_sub_field('image')['sizes']['large'];?>">
											<?php } ?>
										</div>
										<?php $tab3_rep++; endwhile;?>
										<?php endif; ?>
									</div>
									<ul class="nav nav-tabs list-three" role="tablist">
										<?php if( have_rows('gallery') ): 
	$tab3_rep = 0;
										?>
										<?php while( have_rows('gallery') ): the_row(); ?>
										<li class="nav-item">
											<a class="nav-link <?php if($tab3_rep == 0){echo 'active';}?>" data-bs-toggle="tab" href="#gallery-pu-<?= $tab1_rep?>-<?= $tab2_rep;?>-<?= $tab3_rep;?>">
												<img src="<?php echo get_sub_field('image')['sizes']['thumbnail'];?>" alt="<?php echo get_sub_field('image')['alt'];?>" width="80px" height="80px">
											</a>
										</li>
										<?php $tab3_rep++; endwhile;?>
										<?php endif; ?>
									</ul>
								</div>
								<div class="elementor-column elementor-col-50 elementor-inner-column d-block p-24 bleft-col">
									<h3>
										<?php the_sub_field('sub_name')?>
									</h3>
									<br>
									<p>
										<?php the_sub_field('sub_description')?>
									</p>
									<div class="tab-mat-cont">
										<table>
											<tbody>
												<tr>
													<td>
														<strong>Color: </strong>
													</td>
													<td>
														<div class="color-options">
															<?php if( have_rows('colors') ): ?>
															<?php while( have_rows('colors') ): the_row(); ?>
															<div class="color-pill">
																<span class="color-code" style="background: <?php the_sub_field('color_code')?>;"></span>
																<span class="opacity-75"><?php the_sub_field('name')?> &nbsp;</span>
															</div>
															<?php endwhile;?>
															<?php endif; ?>
														</div>
													</td>
												</tr>
												<?php if( have_rows('variable_data') ): ?>
												<?php while( have_rows('variable_data') ): the_row(); ?>
												<tr>
													<td>
														<strong><?php the_sub_field('title')?> </strong>
													</td>
													<td class="opacity-75">
														<?php the_sub_field('description')?>
													</td>
												</tr>
												<?php endwhile;?>
												<?php endif;?>
											</tbody>
										</table>
									</div>
									<?php if(get_sub_field('link')){ ?>
									<div class="">
										<a href="<?= get_sub_field('link')?>" class="material-link"><?= get_sub_field('link_text')?></a>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php $tab2_rep++; endwhile;?>
						<?php endif; ?>
					</div>
				</div>
				<?php $tab1_rep++; endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php
	return ob_get_clean();
}
// register shortcode
add_shortcode('nested-tabs', 'toogleable_multiple_tabs_shortcode');?>