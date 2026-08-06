<?php

/*
	<?php
	?>
*/

class V1_Process_Flow_004  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2 {
				color: #222;
			}
			.<?php $this->eid(); ?> > .container > p {
				max-width: 860px;
			}
			.<?php $this->eid(); ?> .mml-box {
				margin-top: 30px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .slicker {
				width: 88%;
				max-width: 1000px;
				margin: 0 -10px;
			}
			.<?php $this->eid(); ?> .slick-list {
				padding: 20px 0;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-item {
				display: flex !important;
				align-items: center;
				background: #fff;
				box-shadow: 0px 4px 12px 0px rgba(0, 0, 0, 0.16);
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 50%;
				max-width: 500px;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 360px;
				padding: 20px 50px;
				color: #555;
			}
			.<?php $this->eid(); ?> h4 {
				color: #444;
			}
			.<?php $this->eid(); ?> .navers {
				position: relative;
				flex-shrink: 0;
				margin-left: 20px;
				padding: 20px 0;
				display: flex;
				flex-direction: column;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .navers:before {
				content: '\20';
				position: absolute;
				right: 13px;
				top: 0; bottom: 0;
				width: 1px;
				background: #5f6977;
			}
			.<?php $this->eid(); ?> .navers > a {
				position: relative;
				z-index: 1;
				flex: 1 1 0;
				display: flex;
				align-items: center;
				flex-direction: row-reverse;
				margin: 20px 0;
				color: #5f6977;
				background: #fff;
				cursor:pointer;
			}
			.<?php $this->eid(); ?> .navers > .mml-active .circle {
				border-color: #5f6977;
			}
			.<?php $this->eid(); ?> .navers > .mml-active .line {
				background: #5f6977;
			}
			.<?php $this->eid(); ?> .circle {
				flex-shrink: 0;
				width: 10px;
				height: 10px;
				border: 8px solid #e5ebf2;
				border-radius: 50%;
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .line {
				margin: 0 12px;
				width: 40px;
				height: 1px;
				background: #e5ebf2;
				transition: all .24s;
			}
			@media (max-width: 940px) {
				.<?php $this->eid(); ?> .slicker {
					margin-top: 0;
					width: 80%;
				}
				.<?php $this->eid(); ?> .slick-item {
					display: block !important;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
					max-width: unset;
					padding: 30px 20px 0;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
					margin: 0 auto;
					padding: 20px;
				}
			}
			@media (max-width: 640px) {
				.<?php $this->eid(); ?> .navers {
					display: none;
				}
				.<?php $this->eid(); ?> .slicker {
					width: 100%;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $navs = $('.<?php $this->eid(); ?> .navers > a');
		var $slicker = $('.<?php $this->eid(); ?> .slicker').slick({
			arrows: false,
			speed: 400
		}).on('afterChange', function(a, b, c){
			$navs.removeClass('mml-active')[c].classList.add('mml-active');
		});
		$navs.on('click', function(){
			$slicker.slick('slickGoTo', $(this).index());
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
							<li class="slick-item">
								<div class="mml-image"><img src="https://via.placeholder.com/500x400/585f6b/585f6b?text=I" alt=""></div>
								<div class="mml-text">
									<h4>Process 1</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								</div>
							</li>
							<li class="slick-item">
								<div class="mml-image"><img src="https://via.placeholder.com/500x400/585f6b/585f6b?text=I" alt=""></div>
								<div class="mml-text">
									<h4>Process 2</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								</div>
							</li>
							<li class="slick-item">
								<div class="mml-image"><img src="https://via.placeholder.com/500x400/585f6b/585f6b?text=I" alt=""></div>
								<div class="mml-text">
									<h4>Process 3</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								</div>
							</li>
						</ul>
						<div class="navers">
							<a class="mml-active">
								<div class="circle"></div>
								<div class="line"></div>
								<span>01</span>
							</a>
							<a>
								<div class="circle"></div>
								<div class="line"></div>
								<span>02</span>
							</a>
							<a>
								<div class="circle"></div>
								<div class="line"></div>
								<span>03</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
