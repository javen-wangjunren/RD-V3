<?php

/*
	<?php
	?>
*/

class V1_Case_Studies_005  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .mml-text {
				padding-right: 100px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #000;
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 40px -10px 0;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> h4 {
				margin: 20px 0;
				color: #212121;
				transition: color .24s;
			}
			.<?php $this->eid(); ?> .slick-slide a:hover img{
				filter: brightness(.5);
			}
			.<?php $this->eid(); ?> .slick-slide a:hover h4{
				color: #03a67b;
			}
			.<?php $this->eid(); ?> .list > li{
				margin: 5px 0;
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .list > li:before {
				content: '\20';
				margin: .5em 8px 0 0;
				width: 8px;
				height: 8px;
				flex-shrink: 0;
				border-radius: 8px;
				background: #03a67b;
			}
			.<?php $this->eid(); ?> .slick-arrow {
				top: auto;
				bottom: 100%;
				line-height: 40px;
				width: 40px;
				background: #ccc;
				color: #fff;
				border-radius: 2px;
				text-align: center;
				transform: translate(0, -40px);
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: #03a67b;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto;
				right: 60px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: 10px;
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
			slidesToShow: 3,
			responsive: [{
				breakpoint: 850,
				settings: { slidesToShow: 2 }
			}, {
				breakpoint: 500,
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
					<div class="mml-text">
						<h2>Successful Cases</h2>
						<p>We bring impactful digital solutions.</p>
					</div>
					<ul class="slicker">
						<li>
							<a href="javascript:;">
								<img src="https://via.placeholder.com/380x285/e9eef4/5d6777?text=I" alt="">
								<h4>Case 1 - Location</h4>
							</a>
							<ul class="list">
								<li>Literally church-key raw denim.</li>
								<li>Shaman yr flexitarian occupy hot chicken lo-fi.</li>
								<li>Coloring book hammock vinyl</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
								<img src="https://via.placeholder.com/380x285/e9eef4/5d6777?text=I" alt="">
								<h4>Case 2 - Location</h4>
							</a>
							<ul class="list">
								<li>Literally church-key raw denim.</li>
								<li>Shaman yr flexitarian occupy hot chicken lo-fi.</li>
								<li>Coloring book hammock vinyl</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
								<img src="https://via.placeholder.com/380x285/e9eef4/5d6777?text=I" alt="">
								<h4>Case 3 - Location</h4>
							</a>
							<ul class="list">
								<li>Literally church-key raw denim.</li>
								<li>Shaman yr flexitarian occupy hot chicken lo-fi.</li>
								<li>Coloring book hammock vinyl</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
								<img src="https://via.placeholder.com/380x285/e9eef4/5d6777?text=I" alt="">
								<h4>Case 4 - Location</h4>
							</a>
							<ul class="list">
								<li>Literally church-key raw denim.</li>
								<li>Shaman yr flexitarian occupy hot chicken lo-fi.</li>
								<li>Coloring book hammock vinyl</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
