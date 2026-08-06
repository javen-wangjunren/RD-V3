<?php

/*
	<?php
	?>
*/

class Clients_006  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2 {
				color:  #000;
			}
			.<?php $this->eid(); ?> > .container > p {
				margin: 10px auto;
				max-width: 780px;
			}
			.<?php $this->eid(); ?> h4 {
				margin-top: 20px;
				color: #212121;
			}
			.<?php $this->eid(); ?> .slicker-quote {
				margin: 40px auto;
				max-width: 1000px;
			}
			.<?php $this->eid(); ?> .slicker-quote p{
				margin: 10px auto;
				max-width: 880px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover{
				color: #212121;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker-quote').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>"
		});
		$('.<?php $this->eid(); ?> .slicker-logo').slick({
			arrows: false,
			slidesToShow: 6,
			autoplay: true,
			responsive: [{
				breakpoint: 1000,
				settings: { slidesToShow: 5 }
			}, {
				breakpoint: 800,
				settings: { slidesToShow: 4 }
			}, {
				breakpoint: 560,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 400,
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<ul class="slicker-quote">
						<li>
							<img src="https://via.placeholder.com/140x140/e9eef4/5d6777?text=I" alt="">
							<h4>Keith Cadwallader, Contracts Manager</h4>
							<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>
						</li>
						<li>
							<img src="https://via.placeholder.com/140x140/e9eef4/5d6777?text=I" alt="">
							<h4>Keith Cadwallader, Contracts Manager</h4>
							<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>
						</li>
					</ul>
					<ul class="slicker-logo">
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
					</ul>
				</div>
			</div>
		<?php
	}
}
