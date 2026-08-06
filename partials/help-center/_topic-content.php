<section class="elementor-section elementor-section-boxed px-2">
	<div class="elementor-container elementor-column-gap-default align-start">
		<div class="elementor-column elementor-col-30 w-100 pe-100">
			<div class="w-100">
				<?php include_once "_topic-sidebar.php" ?>
			</div>
		</div>
		<div class="elementor-column elementor-col-70 w-100">
			<div class="px-50-no w-100">
				<h1 class="fs-36 orange">
					<?= the_title();?>
				</h1>
				<div class="mt-24">
					<div class="hr-help"></div>
				</div>
				<div>
					<div class="ps-15">
						<?php
							$topicID = get_the_ID();
							$search_args = array(
								'post_type' => 'sub_topic',
								'posts_per_page'    => -1,
								'meta_key'      => 'related_topic',
								'meta_value'    => $topicID
							);
							$my_query = new WP_Query($search_args);
							while ($my_query->have_posts()) :  $my_query->the_post();
							$permalink = get_the_permalink();
						?>
							<div class="mt-50">
								<h2 class="fs-24 fw-700">
									<?php the_title();?>
								</h2>	
							</div>
							<div>
								<div class="mt-24">
									
								</div>
							</div>
							<?php
								$subTopicID = get_the_ID();
								$search_args2 = array(
									'post_type' => 'answer',
									'posts_per_page'    => 10,
									'meta_key'      => 'related_sub_topic',
									'meta_value'    => $subTopicID
								);
								$my_query2 = new WP_Query($search_args2);
								while ($my_query2->have_posts()) :  $my_query2->the_post();
							?>
							<div class="fs-20 fw-600 d-flex-all align-items-center mt-24 ps-15">
								<a href="<?php the_permalink();?>" class="answer-que d-flex-all w-100 fs-18 justify-content-between align-items-center">
									<div>
										<?php the_title();?>
									</div>
									<div class="visible-hover">
										<svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.75 3.75H0V5.41667H11.75L9.16667 8L10.3333 9.16667L14.9167 4.58333L10.4167 0L9.25 1.16667L11.75 3.75Z" fill="#EA543F"/>
										</svg>
									</div>
								</a>
							</div>
							<?php endwhile; wp_reset_postdata();?>
							<?php if($my_query2->max_num_pages > 1){ ?>
								<div class="mt-50 ps-15">
									<a href="<?= $permalink; ?>" class="fw-600 hover-orange" style="padding-left: 22px;">
										Learn More 
										<span>
											<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12.25 3.75H0.5V5.41667H12.25L9.66667 8L10.8333 9.16667L15.4167 4.58333L10.9167 0L9.75 1.16667L12.25 3.75Z" fill="#252525"></path>
											</svg>
										</span>
									</a>
								</div>
							<?php } ?>
						<?php endwhile;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
