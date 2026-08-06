<?php

/*
	<?php
	?>
*/

class V2_Feature_012  extends MML_Section_Base
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
		$('.v2_feature_012 .slicker').slick({
		slidesToShow: 1,
		/* autoplay: true, */
		slidesToScroll: 1,
		prevArrow: ".v2_feature_012 .arrow-prev",
		nextArrow: ".v2_feature_012 .arrow-next",
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
				<h1>Beluga in Figuresss</h1>
				<div class="wrap">
					<div class="left-wrap">
						<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. </p>
						<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. </p>
						<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. </p>
						<a href="#" class="btn">Get Free Sample</a>
					</div>
					<div class="right-wrap">
						<div class="wrap2">
							<ul class="slicker">
								<li>
									<img src="https://dummyimage.com/600x364" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/600x364" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/600x364" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/600x364" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/600x364" alt="">
								</li>
							</ul>
							<div class="arrow-wrap">
								<div class="arrow-btn arrow-prev">
									<i class="fas fa-chevron-left slick-arrow"></i>
								</div>
								<div class="arrow-btn arrow-next">
									<i class="fas fa-chevron-right slick-arrow"></i>
								</div>
							</div>
						</div>

					</div>
				</div>


			</div>
			<!-- insert html end -->
		</div>
<?php
	}
}
