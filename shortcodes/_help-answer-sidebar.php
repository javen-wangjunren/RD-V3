<?php
	function help_answer_sidebar() { 
		ob_start();
		?>
		<div class="w-100">
				<div class="fs-20 fw-700">
					<?= get_the_title(get_field('related_sub_topic'))?>
				</div>
				<div class="star-article-container">
					
				</div>
				<?php
					$search_args = array(
						'post_type' => 'answer',
						'posts_per_page'    => -1,
						'meta_key'      => 'related_sub_topic',
						'meta_value'    => get_field('related_sub_topic')
					);
					$cuurentID = get_the_ID();
					$my_query = new WP_Query($search_args);
					while ($my_query->have_posts()) :  $my_query->the_post();
					?>
				<div class="mt-24 side-ques <?php if($cuurentID == get_the_ID()){ echo 'activee'; }?> <?php if(get_field('is_important_topic')){ echo 'star-article'; }?>">
					<a href="<?= the_permalink();?>" class="d-flex-all">
						<?php if(get_field('is_important_topic')){ ?>
							<div class="star">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.99958 0.580078C4.34883 0.580078 0.580078 4.34883 0.580078 8.99958C0.580078 13.6492 4.34995 17.4191 8.99958 17.4191C13.6492 17.4191 17.4191 13.6481 17.4191 8.99958C17.4191 4.34883 13.6492 0.580078 8.99958 0.580078ZM11.8897 13.4467L8.99958 11.9291L6.10945 13.4478L6.66183 10.2303L4.32295 7.94995L7.55508 7.48083L8.99958 4.55133L10.4452 7.4797L13.6762 7.94883L11.3373 10.2281L11.8897 13.4467Z" fill="#EA543F"/>
								</svg>
							</div>
						<?php } ?>
						<div class="ps-6" style="padding-left:8px;">
							<?php the_title();?>
						</div>
					</a>
				</div>
				<?php  endwhile;?>
				<?php wp_reset_postdata(); ?>
			</div>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('help-answer-sidebar', 'help_answer_sidebar');
?>