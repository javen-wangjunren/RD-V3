<?php

/*
	<?php
	?>
*/

class V2_Gallery_003  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
	}

	public function style () {
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

			.<?php $this->eid(); ?> .title-wrap {
			max-width: 730px;
			margin: 0 auto;
			margin-bottom: 40px;
			}

			.<?php $this->eid(); ?> h2 {
			color: #333;
			}

			.<?php $this->eid(); ?> .img-wrap {
			max-width: 780px;
			margin: 0 auto;
			width: 90%;
			}

			.<?php $this->eid(); ?> .slider-nav {
			margin: 0px -5px;
			}

			.<?php $this->eid(); ?> .slider-nav .slick-slide {
			padding: 0px 5px;
			}

			.<?php $this->eid(); ?> .slider-nav .slicker-arrow {
			width: 40px;
			height: 40px;
			line-height: 38px;
			background-color: #ffffff;
			-webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.09);
					box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.09);
			-webkit-border-radius: 4px;
					border-radius: 4px;
			cursor: pointer;
			}

			.<?php $this->eid(); ?> .slider-nav .slicker-arrow:hover i {
			color: #333;
			}

			.<?php $this->eid(); ?> .slider-nav i {
			color: #e6e6e6;
			font-size: 14px;
			}

			.<?php $this->eid(); ?> .slider-nav .arrow-prev {
			left: -15px;
			}

			.<?php $this->eid(); ?> .slider-nav a.rrrow-next {
			right: -15px;
			}

			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
		var $ = jQuery;
		$(document).ready(function(){
			$('.<?php $this->eid(); ?> .slider-for').slick({
				arrows:false,
				asNavFor: '.<?php $this->eid(); ?> .slider-nav'
			});
			$('.<?php $this->eid(); ?> .slider-nav').slick({
				prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
				nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
				slidesToShow: 4,
				focusOnSelect: true,
				asNavFor: '.<?php $this->eid(); ?> .slider-for',
				responsive: [{
					breakpoint: 400,
					settings: { slidesToShow: 2 }
				}]
			});
			});
			
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<div class="title-wrap">
						<h2>Portfolios/Gallery </h2>
						<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>
					</div>
					<div class="img-wrap">
						<ul class="slider-for">
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
						</ul>
						<ul class="slider-nav">
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/780x500" alt="">
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
