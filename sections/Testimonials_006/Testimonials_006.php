<?php

/*
	<?php
	?>
*/

class Testimonials_006  extends MML_Section_Base {
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
				width: 772px;
			}
			.<?php $this->eid(); ?> .panel {
				margin-top: 30px;
				padding: 80px 20px 50px;
				background: #fff;
				box-shadow: 0px 0px 21px 0px rgba(34, 34, 34, 0.09);
			}
			.<?php $this->eid(); ?> h2{
				color: #000;
			}
			.<?php $this->eid(); ?> h5 {
				color: #212121;
				text-align: right;
			}
			.<?php $this->eid(); ?> .position {
				margin: 0;
				color: #c6c6c6;
				text-align: right;
			}
			.<?php $this->eid(); ?> .slicker-quote {
				margin: 0 auto 30px;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .slicker-avatar {
				margin: 0 auto;
				max-width: 620px;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover{
				color: #212121;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slicker-avatar img {
				filter: grayscale(1);
				border-radius: 4px;
			}
			.<?php $this->eid(); ?> .slick-current img {
				filter: grayscale(0);
				box-shadow: 0px 0px 21px 0px rgba(34, 34, 34, 0.22);
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker-quote').slick({
			fade: true,
			arrows: false,
			asNavFor: '.<?php $this->eid(); ?> .slicker-avatar',
			autoplay: true
		});
		$('.<?php $this->eid(); ?> .slicker-avatar').slick({
			arrows: false,
			asNavFor: '.<?php $this->eid(); ?> .slicker-quote',
			slidesToShow: 5,
			focusOnSelect: true,
			responsive: [{
				breakpoint: 600,
				settings: { slidesToShow: 3 }
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
					<h2>Testimonials</h2>
					<div class="panel">
						<ul class="slicker-quote">
							<li>
								<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
								<h5>Advantage Harm</h5>
								<p class="position">CEO, Wholesale Brand</p>
							</li>
							<li>
								<p>2</p>
								<h5>Adrian Harmon</h5>
								<p class="position">CEO, Wholesale Brand</p>
							</li>
							<li>
								<p>3</p>
								<h5>Adrian Harmon</h5>
								<p class="position">CEO, Wholesale Brand</p>
							</li>
							<li>
								<p>4</p>
								<h5>Adrian Harmon</h5>
								<p class="position">CEO, Wholesale Brand</p>
							</li>
							<li>
								<p>5</p>
								<h5>Adrian Harmon</h5>
								<p class="position">CEO, Wholesale Brand</p>
							</li>
						</ul>
						<ul class="slicker-avatar">
							<li><img src="https://via.placeholder.com/56x56/03a57b/fff?text=I" alt=""></li>
							<li><img src="https://via.placeholder.com/56x56/03a57b/fff?text=I" alt=""></li>
							<li><img src="https://via.placeholder.com/56x56/03a57b/fff?text=I" alt=""></li>
							<li><img src="https://via.placeholder.com/56x56/03a57b/fff?text=I" alt=""></li>
							<li><img src="https://via.placeholder.com/56x56/03a57b/fff?text=I" alt=""></li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
