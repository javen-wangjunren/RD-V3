<?php

/*
	<?php
	?>
*/

class V1_Cta_009  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .mml-text {
				max-width: 680px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #222;
			}
			.<?php $this->eid(); ?> h3 {
				width: 220px;
				color: #03a57b;
				margin-right: 20px;
			}
			.<?php $this->eid(); ?> .line {
				margin: 40px 0;
				border-top: 1px solid #e9e9e9;
			}
			.<?php $this->eid(); ?> .list {
				flex: 1 1 0;
				max-width: 780px;
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				width: 25%;
				padding: 10px 20px 10px 0;
				display: flex;
				align-items: center;
				transition: all .24s;
				color: #999;
			}
			.<?php $this->eid(); ?> .list > li > i {
				margin: 0 10px 0 0;
				width: 8px;
				height: 8px;
				border-radius: 50%;
				flex-shrink: 0;
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .list > li:hover {
				color: #03a57b;
			}
			.<?php $this->eid(); ?> .list > li:hover > i {
				background: #03a57b;
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
			@media (max-width: 800px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
				}
				.<?php $this->eid(); ?> .btn {
					margin: 30px auto 0;
				}
				.<?php $this->eid(); ?> .list {
					margin-top: 30px;
				}
			}
			@media (max-width: 660px) {
				.<?php $this->eid(); ?> .list > li {
					width: 50%;
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
					<div class="mml-box">
						<div class="mml-text">
							<h2>We Bring Impactful Digital Solutions</h2>
							<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>
						</div>
						<a href="javascript:;" class="btn">BUTTON 1</a>
					</div>
					<div class="line"></div>
					<div class="mml-box">
						<h3>Explore Your Digital Solutions</h3>
						<ul class="list">
							<li>
								<i></i>
								<span>Digital Solutions</span>
							</li>
							<li>
								<i></i>
								<span>Digital Solutions</span>
							</li>
							<li>
								<i></i>
								<span>Digital Solutions</span>
							</li>
							<li>
								<i></i>
								<span>Digital Solutions</span>
							</li>
							<li>
								<i></i>
								<span>Digital Solutions</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
