<?php

/*
	<?php
	?>
*/

class V1_Case_Studies_007  extends MML_Section_Base {
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
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				align-items: center;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 380px;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> .pre-heading {
				color: #03a67b;
				font-size: 20px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #212121;
			}
			.<?php $this->eid(); ?> .slicker {
				max-width: 600px;
				margin: 0 auto;
				text-align: center;
				color: #666;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .case:hover img {
				filter: brightness(.5);
			}
			.<?php $this->eid(); ?> .case:hover{
				color: #03a67b;
			}
			.<?php $this->eid(); ?> .case img {
				margin-bottom: 20px;
			}
			.<?php $this->eid(); ?> .case + .case {
				margin-top: 40px;
				display: block;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				padding: 12px 15px;
				background: transparent;
				border-color: #03a67b;
				color: #03a67b;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #03a67b;
				color: #fff;
				border-color: transparent;
			}
			@media (max-width: 960px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					margin: 0 auto 30px;
					max-width: unset;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $slicker = $('.<?php $this->eid(); ?> .slicker');

		$slicker.slick({
			arrows: false,
			slidesToShow: 2,
			responsive: [{
				breakpoint: 400,
				settings: { slidesToShow: 1 }
			}]
		});

		$('.<?php $this->eid(); ?> .slick-prev').click(function(){
			$slicker.slick('slickPrev');
		});
		$('.<?php $this->eid(); ?> .slick-next').click(function(){
			$slicker.slick('slickNext');
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
						<b class="pre-heading">Real Projects</b>
						<h2>We Bring Impactful Digital Solutions</h2>
						<div class="btns">
							<a href="javascript:;" class="btn btn-reverse slick-prev"><i class='fas fa-chevron-left'></i></a>
							<a href="javascript:;" class="btn btn-reverse slick-next"><i class='fas fa-chevron-right'></i></a>
						</div>
					</div>
					<ul class="slicker">
						<li>
							<a href="javascript:;" class="case">
								<img src="https://via.placeholder.com/280x210/e9eef4/5d6777?text=I" alt="">
								<b>Project Name</b>
							</a>
							<a href="javascript:;" class="case">
								<img src="https://via.placeholder.com/280x210/e9eef4/5d6777?text=I" alt="">
								<b>Project Name</b>
							</a>
						</li>
						<li>
							<a href="javascript:;" class="case">
								<img src="https://via.placeholder.com/280x210/e9eef4/5d6777?text=I" alt="">
								<b>Project Name</b>
							</a>
							<a href="javascript:;" class="case">
								<img src="https://via.placeholder.com/280x210/e9eef4/5d6777?text=I" alt="">
								<b>Project Name</b>
							</a>
						</li>
						<li>
							<a href="javascript:;" class="case">
								<img src="https://via.placeholder.com/280x210/e9eef4/5d6777?text=I" alt="">
								<b>Project Name</b>
							</a>
							<a href="javascript:;" class="case">
								<img src="https://via.placeholder.com/280x210/e9eef4/5d6777?text=I" alt="">
								<b>Project Name</b>
							</a>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
