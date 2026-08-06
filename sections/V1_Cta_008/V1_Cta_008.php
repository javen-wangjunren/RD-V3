<?php

/*
	<?php
	?>
*/

class V1_Cta_008  extends MML_Section_Base {
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
				color: #333;
				margin: 40px 0 20px;
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
			.<?php $this->eid(); ?> label {
				display: flex;
				align-items: baseline;
				color: #333;
			}
			.<?php $this->eid(); ?> label > span {
				flex: 1 1 0;
				margin-left: 15px;
			}
			.<?php $this->eid(); ?> input:not([type=submit]){
				border-bottom: 1px solid #ccc;
				padding: 10px 0;
			}
			.<?php $this->eid(); ?> input:not([type=submit])::-webkit-input-placeholder {
				color: #ccc;
			}
			.<?php $this->eid(); ?> .mml-formtip {
				margin: 20px 0 0;
				color: #999;
			}
			.<?php $this->eid(); ?> .wpcf7-submit {
				margin: 30px auto 0;
				width: 380px;
				max-width: 100%;
				background: #5d6777;
				color: #fff;
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .wpcf7-submit:hover {
				background: #585f6b;
				color: #fff;
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
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .mml-formrow {
					flex-wrap: wrap;
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
					<h3>Send An Inquiry</h3>
					<div class="mml-form">
						<?php echo do_shortcode('[contact-form-7 id="58" title="Cta_008"]'); ?>
					</div>
				</div>
			</div>
		<?php
	}
}
