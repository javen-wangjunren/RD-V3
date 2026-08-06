<?php

/*
	<?php
	?>
*/

class Banner_008  extends MML_Section_Base {
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
				padding: 100px 10px;
				min-height: 850px;
				display: flex;
			}
			.<?php $this->eid(); ?> > .container {
				position: relative;
			}
			.<?php $this->eid(); ?> > .container:before {
				content: '\20';
				position: absolute;
				bottom: -80px;
				left: -180px;
				right: -180px;
				height: 350px;
				background: #bdc4d0;
			}
			.<?php $this->eid(); ?> .mml-text {
				position: relative;
				z-index: 1;
			}
			.<?php $this->eid(); ?> h1 {
				color: #000;
			}
			.<?php $this->eid(); ?> h3 {
				color: #434343;
			}
			.<?php $this->eid(); ?> p {
				max-width: 300px;
			}
			.<?php $this->eid(); ?> .btn {
				background: #5d6777;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #585f6b;
				color: #fff;
				border-color: transparent;
			}
			.<?php $this->eid(); ?> .viewmore {
				margin: 100px 0 0;
				writing-mode: vertical-lr;
				color: #585f6b;
			}
			.<?php $this->eid(); ?> .viewmore:hover {
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .mml-image-a{
				position: absolute;
				right: -180px; top: -100px;
			}
			.<?php $this->eid(); ?> .mml-image-b {
				position: absolute;
				bottom: -150px;
				left: 40%;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function ($) {
	$(document).ready(function () {
		$('.<?php $this->eid(); ?> .viewmore').on('click', function(){
			window.scrollTo(0, document.querySelector('.<?php $this->eid(); ?>').offsetHeight);
		});
	})
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="mml-image-a"><img src="https://via.placeholder.com/1061x752/e9eef4/5d6777?text=I" alt=""></div>
					<div class="mml-image-b"><img src="https://via.placeholder.com/400x487/585f6b/5d6777?text=I" alt=""></div>
					<div class="mml-text">
						<h1>We make<br>memoravle videos</h1>
						<h3>Wild Iceland in the<br>winter in 10 days</h3>
						<p>Duis dignissim mi ut laoreet mollis. Nunc id tellus finibus, eleifend mi vel, maximus justo laoreet</p>
						<div class="btns">
							<a href="javascript:;" class="btn">BUTTON</a>
						</div>
						<a href="javascript:;" class="viewmore">View More &gt;&gt;</a>
					</div>
				</div>
			</div>
		<?php
	}
}
