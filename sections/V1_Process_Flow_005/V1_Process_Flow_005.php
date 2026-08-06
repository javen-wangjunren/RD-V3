<?php

/*
	<?php
	?>
*/

class V1_Process_Flow_005  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .navers {
				position: relative;
				flex-shrink: 0;
				margin-right: 20px;
				padding: 20px 0;
				display: flex;
				flex-direction: column;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .navers:before {
				content: '\20';
				position: absolute;
				left: 13px;
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
			.<?php $this->eid(); ?> .slicker {
				width: 80%;
				max-width: 800px;
				margin: 0 -10px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> h4 {
				color: #444;
			}
			.<?php $this->eid(); ?> .images {
				display: flex;
				flex-wrap: wrap;
				margin: 40px -10px 0;
			}
			.<?php $this->eid(); ?> .images > li {
				flex: 1 1 0;
				margin: 0 10px;
			}
			@media (max-width: 780px) {
				.<?php $this->eid(); ?> .navers {
					display: none;
				}
				.<?php $this->eid(); ?> .slicker {
					width: 100%;
					margin: 0;
				}
			}
			@media (max-width: 480px) {
				.<?php $this->eid(); ?> .images > li {
					margin: 10px;
					width: calc(50% - 20px);
					flex: none;
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

						<div class="navers">
							<a class="mml-active">
								<div class="circle"></div>
								<div class="line"></div>
								<span>Process 1</span>
							</a>
							<a>
								<div class="circle"></div>
								<div class="line"></div>
								<span>Process 2</span>
							</a>
							<a>
								<div class="circle"></div>
								<div class="line"></div>
								<span>Process 3</span>
							</a>
						</div>

						<ul class="slicker">
							<li>
								<h4>Process 1</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<ul class="images">
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
								</ul>
							</li>
							<li>
								<h4>Process 2</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<ul class="images">
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
								</ul>
							</li>
							<li>
								<h4>Process 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<ul class="images">
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
									<li><img src="https://via.placeholder.com/180x120/585f6b/585f6b?text=I" alt=""></li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</div>
		<?php
	}
}
