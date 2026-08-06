<?php

/*
	<?php
	?>
*/

class Testimonials_007  extends MML_Section_Base {
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
				width: 780px;
			}
			.<?php $this->eid(); ?> .panel {
				margin-top: 70px;
				padding: 0 20px;
				background: #fff;
				box-shadow: 0px 0px 21px 0px rgba(34, 34, 34, 0.09);
				border-radius: 4px;
			}
			.<?php $this->eid(); ?> h2{
				color: #000;
			}
			.<?php $this->eid(); ?> .split {
				max-width: 700px;
				margin: 40px auto;
				
				border-bottom: 1px solid #dadada;
			}
			.<?php $this->eid(); ?> h3 {
				color: #212121;
			}
			.<?php $this->eid(); ?> .position {
				color: #c6c6c6;
			}
			.<?php $this->eid(); ?> .slicker {
				position: relative;
				top: -60px;
				text-align: center;
			}
			.<?php $this->eid(); ?> .mml-image {
				margin-bottom: 20px;
				height: 120px;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .mml-image img {
				border-radius: 12px;
			}
			.<?php $this->eid(); ?> .panel p {
				margin: 10px auto;
				max-width: 560px;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			fade: true,
			arrows: false,
			autoplay: true
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h2>Testimonials</h2>
					<div class="panel">
						<ul class="slicker">
							<li>
								<div class="mml-image"><img src="https://via.placeholder.com/120x120/e9eef4/5d6777?text=I" alt=""></div>
								<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
								<div class="split"></div>
								<h3>Adrian Harmon</h3>
								<p class="position">CEO, Wholesale Brand</p>
							</li>
							<li>
								<div class="mml-image"><img src="https://via.placeholder.com/120x120/e9eef4/5d6777?text=I" alt=""></div>
								<p>2</p>
								<div class="split"></div>
								<h3>Adrian Harmon</h3>
								<p class="position">CEO, Wholesale Brand</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
