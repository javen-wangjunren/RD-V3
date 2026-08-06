<?php

/*
	<?php
	?>
*/

class V2_Feature_010_1  extends MML_Section_Base
{
	function __construct($id, $style, $content)
	{
		parent::__construct($id, $style, $content);
	}

	public function set_default_value()
	{
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
	}

	public function style()
	{
?>
		/* insert style start */
		.<?php $this->eid(); ?> {
		<?php $this->css_margin_top(); ?>
		<?php $this->css_padding_top(); ?>
		<?php $this->css_padding_bottom(); ?>
		<?php $this->css_margin_bottom(); ?>
		<?php $this->css_bg_color(); ?>
		<?php $this->css_bg_image(); ?>
		<?php $this->css_attr_color('desc_color'); ?>
		text-align: center;
		}
		.<?php $this->eid(); ?>.mml-section {
		/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
		}
		/* insert style end */
	<?php
		$this->css_custom();
	}

	public function script()
	{
	?>
		(function($){
		$(document).ready(function(){
			$('.v2_feature_010_1 .slicker-left').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				prevArrow: ".v2_feature_010_1 .arrow-prev",
				nextArrow: ".v2_feature_010_1 .arrow-next",
				asNavFor: '.v2_feature_010_1 .slicker-right'
			});

			$('.v2_feature_010_1 .slicker-right').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows:false,
				asNavFor: '.v2_feature_010_1 .slicker-left',
				responsive: [
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
						}
					}
					
				]
			});
		});
		})(jQuery);
	<?php
	}

	public function html()
	{
	?>
		<div class="<?php $this->echo_default_classes(); ?>">
			<!-- insert html start -->
			<div class="container">
				<div class="header">
					<h2>We Bring Impactful Digital Solutions</h2>
					<div class="icon-wrap">
						<a href="javascript:;">
							<i class="fas fa-link"></i>
							<span>Get Inspired</span>
							<i class="fas fa-arrow-right"></i>
						</a>
					</div>
				</div>

				<div class="wrap">
					<div class="left-wrap">
						<ul class="slicker-left">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">01</div>
								<h5 class="title">Heading 3</h5>
								<p>Solid surfaces for kitchen worktops, kitchen sinks, and panels.</p>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">02</div>
								<h5 class="title">Heading 3</h5>
								<p>Solid surfaces for kitchen worktops, kitchen sinks, and panels.</p>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">03</div>
								<h5 class="title">Heading 3</h5>
								<p>Solid surfaces for kitchen worktops, kitchen sinks, and panels.</p>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">04</div>
								<h5 class="title">Heading 3</h5>
								<p>Solid surfaces for kitchen worktops, kitchen sinks, and panels.</p>
							</li>
						</ul>
						<div class="btns-wrap">
							<div class="arrow-btn arrow-prev  slick-arrow" style="display: flex;">
								<i class="fas fa-chevron-left"></i>
							</div>
							<div class="arrow-btn arrow-next slick-arrow" style="display: flex;">
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>

					<div class="right-wrap">
						<ul class="slicker-right">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">02</div>
								<h5 class="title">Heading 3</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">03</div>
								<h5 class="title">Heading 3</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">04</div>
								<h5 class="title">Heading 3</h5>
							</li>

							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/380x450" alt="">
								</div>
								<div class="number">01</div>
								<h5 class="title">Heading 3</h5>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- insert html end -->
		</div>
<?php
	}
}
