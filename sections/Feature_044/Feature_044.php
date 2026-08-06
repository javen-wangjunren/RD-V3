<?php

/*
	<?php
	?>
*/

class Feature_044  extends MML_Section_Base {
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
				position: relative;
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?>:before {
				content: '\20';
				position: absolute;
				right: 0; top: 0; bottom: 0;
				width: 50%;
				background: #f3f8ff;
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> h2 {
				color: #000;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 480px;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> .slicker {
				position: relative;
				box-sizing: border-box;
				width: 60%;
				max-width: 680px;
				padding-right: 20px;
			}
			.<?php $this->eid(); ?> .slicker .slick-list {
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .slick-dots {
				position: absolute;
				right: 0;
				top: 0;
				flex-direction: column;
				margin: 0;
			}
			.slick-dots .slick-active button {
				width: 8px;
				height: 30px;
				background: #5d6777;
			}
			.<?php $this->eid(); ?> .btn {
				background: #5d6777;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				border-color: #5d6777;
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #585f6b;
				color: #fff;
				border-color: transparent;
			}
			@media (max-width: 940px) {
				.<?php $this->eid(); ?>:before{
					display: none;
				}
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					margin: 0 0 30px;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .slicker {
					width: unset;
					margin: 0 auto;
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
			arrows: false,
			dots: true
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="mml-text">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						<div class="btns">
							<a href="javascript:;" class="btn">BUTTON 1</a>
							<a href="javascript:;" class="btn btn-reverse">BUTTON 2</a>
						</div>
					</div>
					<ul class="slicker">
						<li><img src="https://via.placeholder.com/580x428/585f6b/e9eef4?text=B" alt=""></li>
						<li><img src="https://via.placeholder.com/580x428/e9eef4/5d6777?text=C" alt=""></li>
						<li><img src="https://via.placeholder.com/580x428/585f6b/e9eef4?text=D" alt=""></li>
					</ul>
				</div>
			</div>
		<?php
	}
}
