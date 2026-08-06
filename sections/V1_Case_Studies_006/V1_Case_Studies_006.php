<?php

/*
	<?php
	?>
*/

class V1_Case_Studies_006  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> .slicker {
				width: 60%;
				max-width: 730px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				padding-left: 50px;
				position: relative;
			}
			.<?php $this->eid(); ?> .slick-slide img {
				position: relative;
				z-index: 1;
			}
			.<?php $this->eid(); ?> .slick-slide:before {
				content: '\20';
				position: absolute;
				top: 175px;
				left: 0;
				right: 50px;
				bottom: 0;
				background: #f5f5f5;
			}
			.<?php $this->eid(); ?> .text {
				position: relative;
				z-index: 1;
				margin-right: 50px;
				padding: 20px 80px 30px 0;
			}
			.<?php $this->eid(); ?> .slick-dots {
				position: absolute;
				z-index: 2;
				right: 14px;
				bottom: 50px;
				flex-direction: column;
			}
			.<?php $this->eid(); ?> .slick-dots .slick-active button {
				width: 8px;
				height: 30px;
				background: #03a67b;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin: 0 0 0 20px;
				flex: 1 1 0;
				max-width: 380px;
			}
			.<?php $this->eid(); ?> h3 {
				color: #212121;
			}
			.<?php $this->eid(); ?> h4 {
				color: #212121;
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
			@media (max-width: 980px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .slicker {
					width: unset;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .mml-text {
					margin: 30px auto 0;
					max-width: 730px;
				}
			}
			@media (max-width: 680px) {
				.<?php $this->eid(); ?> .slick-slide {
					padding-left: 0;
				}
				.<?php $this->eid(); ?> .text {
					padding: 20px 20px 30px;
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
			dots: true,
			fade: true
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<ul class="slicker">
						<li>
							<img src="https://via.placeholder.com/680x346/e9eef4/5d6777?text=I" alt="">
							<div class="text">
								<h4>CASE STUDY: TITLE</h4>
								<p>Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella. +1 you probably haven't heard of them health goth, enamel pin.</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/680x346/e9eef4/5d6777?text=I" alt="">
							<div class="text">
								<h4>CASE STUDY: TITLE</h4>
								<p>Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella. +1 you probably haven't heard of them health goth, enamel pin.</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/680x346/e9eef4/5d6777?text=I" alt="">
							<div class="text">
								<h4>CASE STUDY: TITLE</h4>
								<p>Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella. +1 you probably haven't heard of them health goth, enamel pin.</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/680x346/e9eef4/5d6777?text=I" alt="">
							<div class="text">
								<h4>CASE STUDY: TITLE</h4>
								<p>Food truck salvia roof party</p>
							</div>
						</li>
					</ul>
					<div class="mml-text">
						<h3>Brand Case Studies</h3>
						<p>Street art bushwick hammock live-edge woke direct trade. Yuccie mixtape neutra hell of. Vape brooklyn vegan try-hard.</p>
						<p>Ennui chartreuse cronut viral sartorial ethical truffaut chamb shoreditch. Wayfarers hell of lo-fi typewriter kinfolk.</p>
						<div class="btns">
							<a href="javascript:;" class="btn">BUTTON 1</a>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
