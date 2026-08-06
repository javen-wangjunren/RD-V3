<?php

/*
	<?php
	?>
*/

class Banner_009  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> > .container {
				width: 1320px;
			}
			.<?php $this->eid(); ?> > .container > p {
				margin: 10px auto;
				max-width: 810px;
				font-size: 24px;
			}
			.<?php $this->eid(); ?> h1 {
				color: #000;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				background: #dfd7b8;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				border-color: #dfd7b8;
				color: #dfd7b8;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #ece0ae;
				color: #fff;
				border-color: transparent;
			}
			.<?php $this->eid(); ?> .mml-box {
				margin: 60px 0 0;
				padding: 40px 60px 0;
				position: relative;
				display: flex;
				align-items: flex-end;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .mml-box:before {
				content: '\20';
				position: absolute;
				left: 0; top: 0;
				width: 1041px;
				height: 304px;
				background-color: #f3f8ff;
			}
			.<?php $this->eid(); ?> .mml-text {
				position: relative;
				z-index: 1;
				text-align: left;
				max-width: 280px;
			}
			.<?php $this->eid(); ?> .line {
				margin: 30px 0;
				width: 5px;
				height: 128px;
				background-color: #828282;
			}
			.<?php $this->eid(); ?> .mml-text .btn {
				margin: 30px 0 0;
			}
			.<?php $this->eid(); ?> .slicker {
				position: relative;
				z-index: 1;
				flex: 1 1 0;
				max-width: 900px;
			}
			.<?php $this->eid(); ?> .slick-arrow {
				box-sizing: border-box;
				line-height: 56px;
				width: 60px;
				border-radius: 60px;
				background: #bcb6a2;
				border: 2px solid #f8f3df;
				color: #f8f3df;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: #bbae83;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: -20px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: -20px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				position: relative;
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-slide li {
				display: block !important;
			}
			.<?php $this->eid(); ?> .text {
				position: absolute;
				bottom: 0; left: 0; right: 0;
				padding: 25px 60px;
				font-weight: 600;
				transition: all .24s;
				color: #fff;
			}
			.<?php $this->eid(); ?> .slick-slide:hover .text{
				background: #d3cdb7;
				color: #fff;
			}
			@media (max-width: 1280px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
					padding: 40px 20px 0;
					margin-top: 0;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: 960px;
					margin-bottom: 40px;
				}
				.<?php $this->eid(); ?> .line {
					display: none;
				}
				.<?php $this->eid(); ?> .slicker {
					margin: 0 auto;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-caret-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-caret-right'></i></a>",
			slidesToShow: 3,
			responsive: [{
				breakpoint: 800,
				settings: { slidesToShow: 2 }
			}, {
				breakpoint: 480,
				settings: { slidesToShow: 1 }
			}]
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h1>Your diligent supplier</h1>
					<p>Duis dignissim mi ut laoreet mollis. Nunc id tellus finibus, eleifend mi vel, maximus justo laoreet</p>
					<div class="btns">
						<a href="javascript:;" class="btn btn-reverse">BUTTON 1</a>
					</div>
					<div class="mml-box">
						<div class="mml-text">
							<h2>Our offer</h2>
							<p>We have been on the market since 1989 condimentum maximus tristique. Maecenas non laoreet</p>
							<div class="line"></div>
							<p>Vivamus in diam turpis. In condimentum maximus tristique. Maecenas non laoreet</p>
							<a href="javascript:;" class="btn">BUTTON 2</a>
						</div>
						<ul class="slicker">
							<li>
								<a href="javascript:;">
									<img src="https://via.placeholder.com/280x435/484848/d3cdb7?text=I" alt="">
									<div class="text">Always fresh vegetables</div>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img src="https://via.placeholder.com/280x435/484848/d3cdb7?text=I" alt="">
									<div class="text">Seasonal products for home</div>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img src="https://via.placeholder.com/280x435/484848/d3cdb7?text=I" alt="">
									<div class="text">Always fresh vegetables</div>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<img src="https://via.placeholder.com/280x435/484848/d3cdb7?text=I" alt="">
									<div class="text">Products for restaurants</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
