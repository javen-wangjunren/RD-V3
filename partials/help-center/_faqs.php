<section class="elementor-section elementor-section-boxed px-2">
	<div class="elementor-container elementor-column-gap-default flex-wrap">
		<div class="elementor-column elementor-col-100 w-100">
			<h2 class="fs-36 fw-700 text-center w-100"><?= get_field('faqs_heading_poiu7')?></h2>
		</div>
		<div class="elementor-column elementor-col-100 w-100">
			<div>
				<?php while( have_rows('faqs_poiu7') ) : the_row();?>
				<div class="accordion fs-24 fw-600 mt-40"><?= get_sub_field('question');?></div>
				<div class="panel fs-16">
					<div class="p-20-30">
						<p><?= get_sub_field('answer');?></p>
						<div class="fw-600 mt-20 text-end">
							<a class="hover-orange" href="<?= get_sub_field('link');?>">
								Learn More 
								<span>
									<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12.25 3.75H0.5V5.41667H12.25L9.66667 8L10.8333 9.16667L15.4167 4.58333L10.9167 0L9.75 1.16667L12.25 3.75Z" fill="#252525"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<script>
	var acc = document.getElementsByClassName("accordion");
	var i;
	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			} 
		});
	}
</script>