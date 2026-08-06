<section class="elementor-section elementor-section-boxed px-2 fs-16">
	<div class="elementor-container elementor-column-gap-default align-start">
		<ul class="pp-breadcrumbs pp-breadcrumbs-powerpack">        
			<li class="pp-breadcrumbs-item pp-breadcrumbs-item-home">
				<a class="pp-breadcrumbs-crumb pp-breadcrumbs-crumb-link pp-breadcrumbs-crumb-home" href="/help-center">
					<span class="pp-breadcrumbs-text">
						Help Center				
					</span>
				</a>
			</li>
			<li class="pp-breadcrumbs-separator">                
				<span class="pp-separator-icon pp-icon">	
					<i class="fas fa-chevron-right"></i>
				</span>
			</li>
			<?php
				foreach($args as $arg){
			?>
				<li class="pp-breadcrumbs-item pp-breadcrumbs-item-parent pp-breadcrumbs-item-parent-13049">
					<a class="pp-breadcrumbs-crumb pp-breadcrumbs-crumb-link pp-breadcrumbs-crumb-parent pp-breadcrumbs-crumb-parent-13049" href="<?= $arg['url'];?>"><?= $arg['title'];?></a>
				</li>
				<li class="pp-breadcrumbs-separator">                
					<span class="pp-separator-icon pp-icon">
						<i class="fas fa-chevron-right"></i>				
					</span>
				</li>
			<?php } ?>
			<li class="pp-breadcrumbs-item pp-breadcrumbs-item-current pp-breadcrumbs-item-44 fw-500">
				<span class="pp-breadcrumbs-crumb pp-breadcrumbs-crumb-current pp-breadcrumbs-crumb-44 orange"><?= the_title();?></span>
			</li>

		</ul>
	</div>
</section>