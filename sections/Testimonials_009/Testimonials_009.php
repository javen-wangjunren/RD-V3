<?php

/*
	<?php
	?>
*/

class Testimonials_009  extends MML_Section_Base {
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
				padding: 80px 0;
				text-align: center;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> > .container {
				width: 1920px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #212121;
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 20px 0;
				padding-bottom: 40px;
			}
			.<?php $this->eid(); ?> .slick-track {
				padding: 20px 0;
			}
			.<?php $this->eid(); ?> .slick-list {
				margin: 0 -50px;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				top: 100%;
				color: #5d6777;
				transform: none;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto; right: 50%;
				margin-left: -30px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				left: 50%; right: auto;
				margin-left: 30px;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover{
				color: #212121;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
				padding: 40px 20px;
				background-color: #fff;
				box-shadow: 0px 0px 21px 0px rgba(34, 34, 34, 0.09);
				border-radius: 4px;
			}
			.<?php $this->eid(); ?> .quote {
				margin-bottom: 20px;
			}
			.<?php $this->eid(); ?> .split {
				max-width: 340px;
				margin: 20px auto 30px;
				border-top: 1px solid #e6e6e6;
			}
			.<?php $this->eid(); ?> .client {
				display: flex;
				align-items: center;
				text-align: left;
				margin: 0 auto;
				max-width: 250px;
			}
			.<?php $this->eid(); ?> .avatar {
				margin: 0 20px 0 0;
				border-radius: 50%;
			}
			.<?php $this->eid(); ?> .name {
				color: #000;
			}
			.<?php $this->eid(); ?> .position {
				color: #c6c6c6;
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
			slidesToShow: 5,
			centerMode: true,
			responsive: [{
				breakpoint: 1600,
				settings: { slidesToShow: 4 }
			}, {
				breakpoint: 1200,
				settings: { slidesToShow: 3 }
			}, {
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
					<h2>Testimonials</h2>
					<ul class="slicker">
						<li>
							<img src="https://via.placeholder.com/65x46/e9eef4/5d6777?text=I" alt="" class="quote">
							<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
							<div class="split"></div>
							<div class="client">
								<img src="https://via.placeholder.com/50x50/e9eef4/5d6777?text=I" alt="" class="avatar">
								<div>
									<div class="name">Ariana</div>
									<span class="position">CEO</span>
								</div>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/65x46/e9eef4/5d6777?text=I" alt="" class="quote">
							<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
							<div class="split"></div>
							<div class="client">
								<img src="https://via.placeholder.com/50x50/e9eef4/5d6777?text=I" alt="" class="avatar">
								<div>
									<div class="name">Ariana</div>
									<span class="position">CEO</span>
								</div>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/65x46/e9eef4/5d6777?text=I" alt="" class="quote">
							<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
							<div class="split"></div>
							<div class="client">
								<img src="https://via.placeholder.com/50x50/e9eef4/5d6777?text=I" alt="" class="avatar">
								<div>
									<div class="name">Ariana</div>
									<span class="position">CEO</span>
								</div>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/65x46/e9eef4/5d6777?text=I" alt="" class="quote">
							<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
							<div class="split"></div>
							<div class="client">
								<img src="https://via.placeholder.com/50x50/e9eef4/5d6777?text=I" alt="" class="avatar">
								<div>
									<div class="name">Ariana</div>
									<span class="position">CEO</span>
								</div>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/65x46/e9eef4/5d6777?text=I" alt="" class="quote">
							<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
							<div class="split"></div>
							<div class="client">
								<img src="https://via.placeholder.com/50x50/e9eef4/5d6777?text=I" alt="" class="avatar">
								<div>
									<div class="name">Ariana</div>
									<span class="position">CEO</span>
								</div>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/65x46/e9eef4/5d6777?text=I" alt="" class="quote">
							<p>"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."</p>
							<div class="split"></div>
							<div class="client">
								<img src="https://via.placeholder.com/50x50/e9eef4/5d6777?text=I" alt="" class="avatar">
								<div>
									<div class="name">Ariana</div>
									<span class="position">CEO</span>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
