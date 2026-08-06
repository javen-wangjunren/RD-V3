<?php

/*
	<?php
	?>
*/

class V1_Feature_058  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .mml-box {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> h2 {
				color: #222;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 580px;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> > .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> .slicker {
				width: 46%;
				max-width: 480px;
			}
			.<?php $this->eid(); ?> .slicker-arrow {
				margin: 0 10px;
				color: #fff;
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover {
				color: #00a978;
			}
			.<?php $this->eid(); ?> .mml-video {
				color: #fff;
			}
			.<?php $this->eid(); ?> .list {
				margin-top: 40px;
			}
			.<?php $this->eid(); ?> .list > li {
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .list img {
				margin: 10px 20px 0 0;
			}
			.<?php $this->eid(); ?> .text {
				flex: 1 1 0;
			}
			.<?php $this->eid(); ?> h4 {
				color: #444;
				margin-bottom: -10px;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-box .mml-text {
					max-width: unset;
					margin: 0 0 40px;
				}
				.<?php $this->eid(); ?> .slicker {
					margin: 0 auto;
					width: unset;
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
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="mml-box">
						<div class="mml-text">
							<h2>We Bring Impactful Digital Solutions</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
						</div>
						<ul class="slicker">
							<li>
								<div class="mml-video">
									<img src="https://via.placeholder.com/480x344/585f6b/e9eef4?text=I" alt="">
									<a href="javascript:;" class="vp-a"><i class="far fa-play-circle"></i></a>
								</div>
							</li>
							<li>
								<img src="https://via.placeholder.com/480x344/585f6b/e9eef4?text=I" alt="">
							</li>
						</ul>
					</div>

					<ul class="list mml-cols-3">
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<div class="text">
								<h4>Digital Branding</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<div class="text">
								<h4>Digital Branding</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<div class="text">
								<h4>Digital Branding</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<div class="text">
								<h4>Digital Branding</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<h4>Digital Branding</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
