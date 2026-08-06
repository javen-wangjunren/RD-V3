<?php

/*
	<?php
	?>
*/

class Clients_005  extends MML_Section_Base {
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
				overflow: hidden;
			}
			.<?php $this->eid(); ?> h2 {
				color:  #000;
			}
			.<?php $this->eid(); ?> > .container > p {
				margin: 10px auto;
				max-width: 780px;
			}
			.<?php $this->eid(); ?> .mml-box {
				margin-top: 40px;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> .slicker {
				position: relative;
				z-index: 1;
				width: 50%;
				max-width: 580px;
				background: #fff;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
			}
			.<?php $this->eid(); ?> .slick-slide {
				padding: 90px 20px;
			}
			.<?php $this->eid(); ?> .slick-slide p {
				margin: 10px auto;
				max-width: 420px;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover{
				color: #212121;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: 20px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: 20px;
			}
			.<?php $this->eid(); ?> h4 {
				color: #212121;
			}
			.<?php $this->eid(); ?> .gallery {
				position: relative;
				flex: 1 1 0;
				margin: 0 0 0 20px;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .gallery:before {
				content: '\20';
				position: absolute;
				left: -120px; right: -1200px;
				top: -20px; bottom: 0;
				background: #f7fafe;
				
			}
			.<?php $this->eid(); ?> .gallery > ul {
				position: relative; z-index: 1;
				margin: 0 -10px;
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .gallery li {
				margin: 0 10px 20px;
				width: calc(33.3333% - 20px);
			}
			@media (max-width: 960px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .slicker {
					width: unset;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .gallery {
					margin: 30px auto 0;
				}
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .slick-slide {
					padding: 40px 20px;
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
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<div class="mml-box">
						<ul class="slicker">
							<li>
								<h4>Keith Cadwallader, Contracts Manager</h4>
								<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>
							</li>
							<li>
								<h4>Keith Cadwallader, Contracts Manager</h4>
								<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>
							</li>
						</ul>

						<div class="gallery">
							<ul>
								<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
								<li><img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt=""></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
