<?php

/*
	<?php
	?>
*/

class Testimonials_008  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> > .container {
				width: 820px;
			}
			.<?php $this->eid(); ?> h2{
				color: #000;
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 10px 0 0;
			}
			.<?php $this->eid(); ?> .slick-list {
				padding: 20px;
			}
			.<?php $this->eid(); ?> .quote {
				padding: 50px 100px;
				background: #fff;
				border-radius: 4px;
				box-shadow: 0px 0px 21px 0px rgba(34, 34, 34, 0.09);
			}
			.<?php $this->eid(); ?> .greenbar {
				width: 4px;
				height: 50px;
				margin: 20px auto;
				background: #50d89d;
				border-radius: 2px;
			}
			.<?php $this->eid(); ?> .mml-image {
				margin: 0 auto;
				height: 90px;
				width: 90px;
				display: flex;
				border-radius: 90px;
				border: 5px solid #50d89d;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> h5 {
				margin-top: 10px;
				color: #000;
			}
			.<?php $this->eid(); ?> .position{
				color: #c6c6c6;
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .quote {
					padding: 30px 20px;
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
					<ul class="slicker">
						<li>
							<div class="quote">"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</div>
							<div class="greenbar"></div>
							<div class="mml-image"><img src="https://via.placeholder.com/120x120/e9eef4/5d6777?text=I" alt=""></div>
							<h5>Ben</h5>
							<span class="position">CEO, Wholesale Brand</span>
						</li>
						<li>
							<div class="quote">"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</div>
							<div class="greenbar"></div>
							<div class="mml-image"><img src="https://via.placeholder.com/120x120/e9eef4/5d6777?text=I" alt=""></div>
							<h5>Kevin</h5>
							<span class="position">CEO, Wholesale Brand</span>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
