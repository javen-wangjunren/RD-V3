<?php

/*
<?php mtf_section('V1_Banner_005', 'banner_005', [
	'background_image' => 'https://via.placeholder.com/1920x700/f1f1f1/fafafa?text=Image',
	'class' => '',
	'bg_color' => '',
	'bg_image' => '',
	'background_attachment' => '', // 如果需要视差效果，请赋值 fixed
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'subtitle_color' => '#666',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'form_shortcode' => '',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
]); ?>


Contact Form 7 的表单代码如下:

<div class="mml-formrow">
<label> [text* your-name placeholder 'Name*'] </label>
</div>
<div class="mml-formrow">
<label> [email* your-email placeholder 'Email*'] </label>
</div>
<div class="mml-formrow">
<label> [textarea your-message placeholder 'Message'] </label>
</div>
<div class="mml-formtip">*We respect your confidentiality and all informations are protected.</div>
<div class="mml-formrow">[submit "Send"]</div>

*/

class V1_Banner_005  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		// $this->set_default_style('class', '');

		$this->set_default_content('form_shortcode', '');
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
				position: relative;
				background-size: cover;
			}
			.<?php $this->eid(); ?> .container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> .mml-text {
				width: 50%;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .pre-heading {
				font-size: 24px;
				<?php $this->css_attr_color('subtile_color'); ?>
			}
			.<?php $this->eid(); ?> h1 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-form {
				flex: 1 1 0;
				box-sizing: border-box;
				max-width: 480px;
				padding: 40px 30px 60px;
				margin: 0 0 0 20px;
				background: #03a57b;
				color: #fff;
			}
			.<?php $this->eid(); ?> .mml-form h2 {
				text-align: center;
			}
			.<?php $this->eid(); ?> input,
			.<?php $this->eid(); ?> textarea {
				background: transparent;
				color: #fff;
				border: 2px solid #fff;
				border-radius: 6px;
			}
			.<?php $this->eid(); ?> input::placeholder,
			.<?php $this->eid(); ?> textarea::placeholder{
				color: #fff;
			}
			.<?php $this->eid(); ?> .wpcf7-submit {
				width: 100%;
				background: #fff;
				color: #03a57b;
			}
			.<?php $this->eid(); ?> .slide-down{
				position: absolute;
				left: 50%; bottom: 15px;
				transform: translate(-50%, 0);
				font-size: 24px;
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slide-down:hover{
				color: #03a57b;
			}
			@media (max-width: 940px) {
				.<?php $this->eid(); ?> .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .mml-form {
					margin: 40px auto 0;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function ($) {
	$(document).ready(function () {
		$('.<?php $this->eid(); ?> .slide-down').on('click', function(){
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
					<div class="mml-text">
						<?php if ($this->has_content('subtitle')) { ?>
							<b class="pre-heading"><?php $this->eco('subtitle'); ?></b>
						<?php } ?>
						<?php if ($this->has_content('title')) { ?>
							<h1><?php $this->eco('title'); ?></h1>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p><?php $this->eco('desc'); ?></p>
						<?php } ?>
					</div>
					<div class="mml-form">
						<?php echo do_shortcode($this->content['form_shortcode']); ?>
					</div>
				</div>
				<a class="slide-down"><i class="fas fa-chevron-down"></i></a>
			</div>
		<?php
	}
}
