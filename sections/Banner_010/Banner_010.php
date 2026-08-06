<?php

/*
	<?php
	?>
*/

class Banner_010  extends MML_Section_Base {
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
				overflow: hidden;
			}
			.<?php $this->eid(); ?> h1 {
				color: #000;
			}
			.<?php $this->eid(); ?> .btn {
				background: #dfd7b8;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				border-color: #dfd7b8;
				color: #dfd7b8;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #ece0ae;
				color: #fff;
				border-color: transparent;
			}
			.<?php $this->eid(); ?> .mml-box {
				padding: 180px 0 100px;
				display: flex;
				justify-content: space-between;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				box-sizing: border-box;
				max-width: 580px;
				padding: 30px 0;
				margin: 0 50px 0 0;
			}
			.<?php $this->eid(); ?> .mml-image {
				position: relative;
				width: 45%;
				max-width: 480px;
			}
			.<?php $this->eid(); ?> .mml-image:before {
				content: '\20';
				position: absolute;
				width: 100%;
				height: 100%;
				left: -30px; top: -30px;
				bottom: 30px;
				background: #d3cdb7;
			}
			.<?php $this->eid(); ?> .mml-image img {
				position: relative;
				z-index: 1;
			}
			.<?php $this->eid(); ?> .sliders {
				align-items: flex-start;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .sliders > li {
				position: relative;
				margin: 10px 10px 30px;
				padding: 30px 20px 20px;
				background-color: #fff;
				border: solid 1px #4e4e4e;
			}
			.<?php $this->eid(); ?> .sliders img {
				margin: 60px auto;
			}
			.<?php $this->eid(); ?> h4 {
				color: #000;
				text-align: center;
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .sliders p {
				margin: 0;
				height: 0;
				overflow: hidden;
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .mml-active p {
				height: unset;
				margin: 10px auto;
			}
			.<?php $this->eid(); ?> .slide-down {
				position: absolute;
				bottom: 0; left: 50%;
				transform: translate(-50%, 50%);
				width: 40px;
				line-height: 38px;
				box-sizing: border-box;
				border: 1px solid #848484;
				border-radius: 40px;
				text-align: center;
				background: #fff;
			}
			.<?php $this->eid(); ?> .mml-active .slide-down {
				transform: translate(-50%, 50%) rotate(180deg);
			}
			.<?php $this->eid(); ?> .mml-active h4 {
				text-align: left;
			}
			@media (max-width: 890px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
					padding-bottom: 0;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
					margin: 0;
				}
				.<?php $this->eid(); ?> .mml-image {
					margin: 40px auto;
					width: 480px;
					max-width: 100%;
				}
				.<?php $this->eid(); ?> .sliders img {
					margin: 20px auto;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .sliders').on('click', '.slide-down', function(){
			var p = this.parentNode;
			if( p.classList.contains('mml-active') ){
				$(p).removeClass('mml-active');
			} else {
				$('.<?php $this->eid(); ?> .mml-active').removeClass('mml-active');
				p.classList.add('mml-active');
			}

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
							<h1>Your diligent<br>supplier</h1>
							<p>Duis dignissim mi ut laoreet mollis. Nunc id tellus finibus, eleifend mi vel, maximus justo laoreet</p>
							<div class="btns">
								<a href="javascript:;" class="btn btn-reverse">BUTTON 1</a>
							</div>
						</div>
						<div class="mml-image"><img src="https://via.placeholder.com/480x345/484848/d3cdb7?text=I" alt=""></div>
					</div>
					<ul class="sliders mml-cols-4">
						<li class="mml-active">
							<img src="https://via.placeholder.com/55x55/484848/d3cdb7?text=I" alt="">
							<h4>Document Translation</h4>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia.</p>
							<a class="slide-down" href="javascript:;"><i class="fas fa-caret-down"></i></a>
						</li>
						<li>
							<img src="https://via.placeholder.com/55x55/484848/d3cdb7?text=I" alt="">
							<h4>Document Translation</h4>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia.</p>
							<a class="slide-down" href="javascript:;"><i class="fas fa-caret-down"></i></a>
						</li>
						<li>
							<img src="https://via.placeholder.com/55x55/484848/d3cdb7?text=I" alt="">
							<h4>Document Translation</h4>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia.</p>
							<a class="slide-down" href="javascript:;"><i class="fas fa-caret-down"></i></a>
						</li>
						<li>
							<img src="https://via.placeholder.com/55x55/484848/d3cdb7?text=I" alt="">
							<h4>Document Translation</h4>
							<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia.</p>
							<a class="slide-down" href="javascript:;"><i class="fas fa-caret-down"></i></a>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
