<?php
	function help_search() { 
		ob_start();
		?>
		<?php if(isset($_GET['s'])) { ?>
		<div>
			<div class="max-width-1k" style="margin-top: 50px;">
				<?php
				$query_args = array( 's' => $_GET['s'], 'post_type' => 'answer', 'posts_per_page' => '-1');
				$query = new WP_Query( $query_args );
				?>
				<div class="d-flex-btw-ctr">
					<div>
						<span class="color-878787">Search results for:</span> <strong><?= $_GET['s'];?></strong>
					</div>
					<div class="color-252525 fs-500">
						<?= $query->found_posts; ?> results found
					</div>
				</div>
				<div class="hr-help" style="margin-top:24px;"></div>
				<?php if ( $query->have_posts() ) : ?>
				<div class="listall">
					<?php while( $query->have_posts()): $query->the_post();
					setup_postdata($post);
					?>
					<a class="single-ques" href="<?= the_permalink();?>">
						<div class="help-search-box mt-50">
							<h3 class="fs-20 fw-700">
								<?= the_title();?>
							</h3>
							<div class="help-exc color-878787">
								<?= the_excerpt();?>
							</div>
							<div class="d-flex-btw-ctr mt-24">
								<div class="fw-500">
									<?= get_the_date();?>
								</div>
								<div class="fw-600 hover-orange orange">

									Read More &nbsp;&nbsp;<span><i class="fas fa-arrow-right"></i></span>

								</div>
							</div>
						</div>
					</a>
					<div style="margin: 20px 0px;"><hr/></div>
					<?php endwhile;wp_reset_postdata();?>
				</div>
				<div class="max-width-1k pagination fs-20 fw-700 text-end d-flex-all justify-end mt-40 fs-20 fw-700">

				</div>
				<?php else: ?>
				<div class="help-search-box mt-50">
					<h3 class="fs-20 fw-700">
						No record Found, please try some other keyword or visit <a href="/help-center" class="orange">Help Center</a>
					</h3>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php } ?>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('help-search', 'help_search');
?>