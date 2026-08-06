<?php

/*
	<?php
	?>
*/

class Banner_011  extends MML_Section_Base {
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
			.<?php $this->eid(); ?>:before {
				content: '\20';
				position: absolute;
				bottom: 0;
				left: 0;
				right: 0;
				height: 320px;
				background: #f1f1f1;
			}
			.<?php $this->eid(); ?> > .container {
				position: relative;
				z-index: 1;
				margin-top: 180px;
			}
			.<?php $this->eid(); ?> > .container > p {
				max-width: 580px;
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
				margin-top: 60px;
				position: relative;
				z-index: 1;
				display: flex;
				justify-content: space-between;
				color: #212121;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 400px;
				margin: 0 20px 0 0;
				display: flex;
				flex-direction: column;
			}
			.<?php $this->eid(); ?> .icon {
				display: inline-block;
				margin: 60px auto 30px 0;
			}
			.<?php $this->eid(); ?> h4 {
				color: #212121;
			}
			.<?php $this->eid(); ?> .line {
				margin-top: auto;
				width: 50px;
				height: 1px;
				background-color: #333;
			}
			.<?php $this->eid(); ?> .mml-video {
				position: relative;
				width: 60%;
				max-width: 680px;
			}
			.<?php $this->eid(); ?> .mml-video:hover img {
				filter: brightness(.86);
			}
			.<?php $this->eid(); ?> .vp-a > i {
				line-height: 64px;
				width: 64px;
				border: 2px solid #f8f3df;
				background: #d3cdb7;
				color: #fff;
				text-align: center;
				font-size: 24px;
				border-radius: 100px;
			}
			@media (max-width: 1024px) {
				.<?php $this->eid(); ?> > .container {
					margin-top: 80px;
				}
			}
			@media (max-width: 860px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
				}
				.<?php $this->eid(); ?> .icon {
					margin: 0 auto 30px 0;
				}
				.<?php $this->eid(); ?> .mml-video {
					width: unset;
					margin: 40px auto 0;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>

		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h1>Your diligent<br>supplier</h1>
					<p>Duis dignissim mi ut laoreet mollis. Nunc id tellus finibus, eleifend mi vel, maximus justo laoreet</p>
					<div class="btns">
						<a href="javascript:;" class="btn btn-reverse">BUTTON 1</a>
					</div>
					<div class="mml-box">
						<div class="mml-text">
							<div class="icon"><img src="https://via.placeholder.com/40x30/484848/d3cdb7?text=I" alt=""></div>
							<p>Each time, we aim to fine-tune eachdetail to perfection so that your  wedding party is perfect.</p>
							<h4>MICHAEL WILLIAMS, CEO</h4>
							<div class="line"></div>
						</div>
						<div class="mml-video">
							<img src="https://via.placeholder.com/680x354/4e4e4e/d3cdb7?text=I" alt="">
							<a href="javascript:;" class="vp-a"><i class="fas fa-caret-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
