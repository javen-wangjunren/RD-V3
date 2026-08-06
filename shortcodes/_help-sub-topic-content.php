<?php
	function help_sub_topic_content() { 
		ob_start();
		?>
		<section class="elementor-section elementor-section-boxed px-2">
			<div class="elementor-container elementor-column-gap-default align-start">
				<div class="elementor-column elementor-col-100 w-100" style="display:block;">
					<div class="px-50 py-50 w-100">
						<h1 class="fs-36">
							<?= the_title();?>
						</h1>
						<div>
							<div class="mt-50 ps-15 topic-content-area">
								<?php
									$search_args = array(
										'post_type' => 'answer',
										'posts_per_page'    => -1,
										'meta_key'      => 'related_sub_topic',
										'meta_value'    => get_the_ID()
									);
									$my_query = new WP_Query($search_args);
									while ($my_query->have_posts()) :  $my_query->the_post();
								?>
									<div class="fs-20 fw-600  mt-24">
		<!-- 								<div>
											<svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="3.5" cy="3" r="3" fill="#252525"/>
											</svg>
										</div> -->
										<a href="<?php the_permalink();?>" class="answer-que d-flex-all w-100 fs-18 justify-content-between">
											<h3>
												<?php the_title();?>
											</h3>
											<div class="visible-hover">
												<svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.75 3.75H0V5.41667H11.75L9.16667 8L10.3333 9.16667L14.9167 4.58333L10.4167 0L9.25 1.16667L11.75 3.75Z" fill="#EA543F"/>
												</svg>
											</div>
										</a>
									</div>
								<?php  endwhile;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('help-sub-topic-content', 'help_sub_topic_content');
?>