<?php

/*
	<?php
	?>
*/

class Feature_041  extends MML_Section_Base {
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
			}
			.<?php $this->eid(); ?> .mml-reading{
				display: flex !important;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 668px;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> .pre-heading{
				font-size: 20px;
				color: #212121;
			}
			.<?php $this->eid(); ?> h2 {
				color: #000;
			}
			.<?php $this->eid(); ?> .inline {
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px 0 0 0;
				display: flex;
				align-items: center;
				color: #212121;
			}
			.<?php $this->eid(); ?> .inline > li {
				padding-right: 20px;
			}
			.<?php $this->eid(); ?> .list img {
				margin: 0 10px 0 0;
			}
			.<?php $this->eid(); ?> .btn {
				background: #5d6777;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				border-color: #5d6777;
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #585f6b;
				color: #fff;
				border-color: transparent;
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 42%;
				max-width: 480px;
			}
			.<?php $this->eid(); ?> .slicker-thumbs {
				margin: 50px -10px 0;
			}
			.<?php $this->eid(); ?> .slicker-thumbs .slick-track {
				margin: 0;
			}
			.<?php $this->eid(); ?> .slicker-thumbs .slick-slide {
				margin: 0 10px;
			}
			@media (max-width: 860px) {
				.<?php $this->eid(); ?> .mml-reading {
					display: block !important;
				}
				.<?php $this->eid(); ?> .mml-text {
					margin: 0 0 30px;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
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
			arrows: false,
			fade: true,
			asNavFor: '.<?php $this->eid(); ?> .slicker-thumbs'
		});

		$('.<?php $this->eid(); ?> .slicker-thumbs').slick({
			arrows: false,
			asNavFor: '.<?php $this->eid(); ?> .slicker',
			slidesToShow: 4,
			slidesToScroll: 2,
			focusOnSelect: true,
			responsive: [{
				breakpoint: 860,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 600,
				settings: { slidesToShow: 2 }
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
					<div class="slicker">

						<div class="mml-reading">
							<div class="mml-text">
								<b class="pre-heading">MML DIGITAL</b>
								<h2>We Bring Impactful Digital Solutions</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>

								<!-- .inline 类控制是否换行 -->
								<ul class="list inline">
									<li>
										<img src="https://via.placeholder.com/20x20/e9eef4/5d6777?text=I" alt="">
										<span>Digital Branding</span>
									</li>
									<li>
										<img src="https://via.placeholder.com/20x20/e9eef4/5d6777?text=I" alt="">
										<span>Digital Branding</span>
									</li>
									<li>
										<img src="https://via.placeholder.com/20x20/e9eef4/5d6777?text=I" alt="">
										<span>Digital Branding</span>
									</li>
								</ul>
								<div class="btns">
									<a href="javascript:;" class="btn">BUTTON 1</a>
									<a href="javascript:;" class="btn btn-reverse">BUTTON 2</a>
								</div>
							</div>
							<div class="mml-image"><img src="https://via.placeholder.com/480x354/e9eef4/5d6777?text=I" alt=""></div>
						</div>

						<div class="mml-reading">
							<div class="mml-text">
								<b class="pre-heading">MML DIGITAL 2</b>
							</div>
						</div>
						<div class="mml-reading">
							<div class="mml-text">
								<b class="pre-heading">MML DIGITAL 3</b>
							</div>
						</div>

					</div>

					<div class="slicker-thumbs">
						<div><img src="https://via.placeholder.com/480x354/e9eef4/5d6777?text=I" alt=""></div>
						<div><img src="https://via.placeholder.com/480x354/e9eef4/5d6777?text=I" alt=""></div>
						<div><img src="https://via.placeholder.com/480x354/e9eef4/5d6777?text=I" alt=""></div>
					</div>

				</div>
			</div>
		<?php
	}
}
