<section class="elementor-section elementor-section-boxed px-2">
	<div class="elementor-container elementor-column-gap-default flex-wrap">
		<?php
			$query_args = array('post_type' => 'topic', 'posts_per_page' => '-1');
			$query = new WP_Query( $query_args );?>
			<?php while( $query->have_posts()): $query->the_post();
				setup_postdata($post);
				?>
				<div class="elementor-column elementor-col-50 w-100 mt-24">
					<a href="<?= the_permalink();?>" class="hover-state-card w-100">
						<div class="d-flex-all mt-24">
							<div class="svg-icon m-30">
								<?php $img = get_field('iconimage_i89o');?>
								<img src="<?= $img['url'];?>" alt="<?= $img['alt'];?>" class="normal-image" width="100%">
								<?php $img2 = get_field('hover_iconimage_i89o');?>
								<img src="<?= $img2['url'];?>" alt="<?= $img2['alt'];?>" class="hover-image" width="100%">
							</div>
							<div class="">
								<h3 class="fs-36">
									<?= the_title();?>
								</h3>
								<div class="color-878787 fs-16 mt-20 max-width-490">
									<?= the_field('small_text_i89o');?>
								</div>
								<div class="fw-600 mt-20">
									Learn More 
									<span>
										<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12.25 3.75H0.5V5.41667H12.25L9.66667 8L10.8333 9.16667L15.4167 4.58333L10.9167 0L9.75 1.16667L12.25 3.75Z" fill="#252525"/>
										</svg>
									</span>
								</div>
							</div>
						</div>
						<div class="mt-24"></div>
					</a>
				</div>
			<?php endwhile;wp_reset_postdata();?>
	</div>
</section>