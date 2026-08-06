<?php

/*
	<?php
	?>
*/

class V1_Process_Flow_002  extends MML_Section_Base {
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
				padding: 0 0 80px;
				text-align: center;
			}
			.<?php $this->eid(); ?> > .mml-text {
				padding: 70px 0 100px;
				background: #5f6977;
				color: #fff;
			}
			.<?php $this->eid(); ?> .slicker {
				margin-top: -50px;
			}
			.<?php $this->eid(); ?> .slick-list {
				padding: 10px 0 120px;
			}
			.<?php $this->eid(); ?> .slick-arrow {
				width: 54px;
				line-height: 54px;
				top: auto;
				bottom: 0;
				background: rgba(0,0,0,.2);
				color: #fff;
				border-radius: 4px;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto; right: 50%;
				transform: translate(-10px, 0);
			}
			.<?php $this->eid(); ?> .arrow-next {
				left: 50%; right: auto;
				transform: translate(10px, 0);
			}
			.<?php $this->eid(); ?> .slick-arrow{
				cursor:pointer;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: #535c6c;
			}
			.<?php $this->eid(); ?> .number {
				box-sizing: border-box;
				margin: 0 auto;
				width: 80px;
				line-height: 78px;
				border-radius: 80px;
				border: 1px solid #535c6c;
				background: #e5ebf2;
				color: #666;
				text-align: center;
				font-size: 24px;
				font-weight: 600;
				box-shadow: 0 0 0 10px #fff;
			}
			.<?php $this->eid(); ?> h4 {
				margin-top: 30px;
				color: #444;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			slidesToShow: 4,
			responsive: [{
				breakpoint: 840,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 640,
				settings: { slidesToShow: 2 }
			}, {
				breakpoint: 400,
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
				<div class="mml-text">
					<div class="container">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					</div>
				</div>
				<div class="container">
					<ul class="slicker">
						<li>
							<div class="number">01</div>
							<h4>Heading 4</h4>
						</li>
						<li>
							<div class="number">02</div>
							<h4>Heading 4</h4>
						</li>
						<li>
							<div class="number">03</div>
							<h4>Heading 4</h4>
						</li>
						<li>
							<div class="number">04</div>
							<h4>Heading 4</h4>
						</li>
						<li>
							<div class="number">05</div>
							<h4>Heading 4</h4>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
