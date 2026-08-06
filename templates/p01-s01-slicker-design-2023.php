<?php if( have_rows('repeater_gallery') ): ?>
<style>
	.image-gallery-p01 img{
		height: <?php echo get_field('image_height_77')?>px;
		width: 100%;
		object-fit: cover;
	}
	.gallery-item{
		position: relative;
	}
	.main-data-open-hide{
		padding-left: 12px;
		padding-right: 12px;
		position: absolute;
		bottom: 0px;
		left: 0px;
		width: 100%;
	}
	.whole-data-gallery{
		background: #242426;
		padding: 20px;
	}
	.d-flex-center{
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.pointer{
		cursor: pointer;
	}
	.fs-12{
		font-size: 12px;
	}
	.color-8D8D8D{
		color: #8D8D8D;
	}
	.w-40{
		width: 38%;
	}
	.w-60{
		width: 58%;
	}
	.variable-data-gallery{
	}
	.single-galery-row{
		display: flex;
		justify-content: space-between;
		padding-top: 12px;
		padding-bottom: 12px;
		border-bottom: 1px solid #868686;
	}
	.p01-s01-2023 .slick-slide{
		background: transparent!important;
	}
	.p01-s01-2023 .arrow-btn{
		border: 0px;
	}
	.item-hover-show .variable-data-gallery{
		display: none;
	}
	.item-hover-show:hover .variable-data-gallery{
		display: block;
	}
</style>
<div class="p01-s01-slicker p01-s01-2023">
    <div class="slicker-wrap">
        <div class="manufacturing-content-slicker" data-slick='{"slidesToShow": <?= get_field('number_of_slides_77');?>, "slidesToScroll": 1}'>
            <?php while( have_rows('repeater_gallery') ) : the_row(); ?>
				<div class="gallery-item item-hover-show">
					<div class="image-gallery-p01">
						<img class="w-100" src="<?php echo get_sub_field('image');?>">
					</div>
					<div class="main-data-open-hide">
						<div class="whole-data-gallery">
							<div class="heading-icon d-flex-center pointer toggle-sibling">
								<div class="color-white">
									<?php echo get_sub_field('name');?>
								</div>
								<div>
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M15.5938 1.125L10.6875 6H14H14.5V7H14H9.5H9V6.5V2V1.5H10V2V5.3125L14.875 0.40625L15.25 0.0625L15.9375 0.75L15.5938 1.125ZM0.375 14.9062L5.28125 10H2H1.5V9H2H6.5H7V9.5V14V14.5H6V14V10.7188L1.09375 15.625L0.75 15.9688L0.03125 15.25L0.375 14.9062Z" fill="#FBFBFB"/>
									</svg>
								</div>
							</div>
							<div class="variable-data-gallery fs-12">
								<?php if( have_rows('data') ): ?>
									<?php while( have_rows('data') ) : the_row(); ?>
										<div class="single-galery-row">
											<div class="w-40 color-8D8D8D">
												<?php echo get_sub_field('type');?>
											</div>
											<div class="w-60 color-white">
												<?php echo get_sub_field('description');?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
            <?php endwhile; ?>
        </div>
        <div class="mml-row">
            <div class="arrow-btn-wrap">
                <span class="arrow-btn arrow-left"><i class="fas fa-arrow-left"></i></span>
                <span class="arrow-btn arrow-right"><i class="fas fa-arrow-right"></i></span>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>