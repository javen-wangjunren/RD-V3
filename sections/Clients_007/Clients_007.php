<?php

/*
	<?php
	?>
*/

class Clients_007  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2 {
				color:  #000;
			}
			.<?php $this->eid(); ?> > .container > p {
				margin: 10px auto;
				max-width: 780px;
			}
			.<?php $this->eid(); ?> .slicker-logo{
				margin: 40px 0 60px;
			}
			.<?php $this->eid(); ?> .slick-list,
			.<?php $this->eid(); ?> .slick-slide{
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .mml-video {
				position: relative;
			}
			.<?php $this->eid(); ?> .vp-a{
				color: #fff;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover{
				color: #212121;
			}
			.<?php $this->eid(); ?> .slick-dots {
				margin-top: 30px;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .slick-active button {
				background: #5d6777;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker-logo').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			slidesToShow: 6,
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
		$('.<?php $this->eid(); ?> .slicker-pictures').slick({
			arrows: false,
			dots: true,
			autoplay: true,
			slidesToShow: 2,
			responsive: [{
				breakpoint: 600,
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<ul class="slicker-logo">
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
					</ul>
					<ul class="slicker-pictures">
						<li>
							<div class="mml-video">
								<img src="https://via.placeholder.com/580x357/e9eef4/5d6777?text=I" alt="">
								<a href="javascript:;" class="vp-a"><i class=" fa-play-circle"></i></a>
							</div>
						</li>
						<li><img src="https://via.placeholder.com/580x357/e9eef4/5d6777?text=I" alt=""></li>
						<li><img src="https://via.placeholder.com/580x357/e9eef4/5d6777?text=I" alt=""></li>
					</ul>
				</div>
			</div>
		<?php
	}
}
