<?php

/*
<?php mtf_section('V1_Cta_002', 'p01-s01-cta-002', [
	'class' => 'no-margin',
	'title_color' => '#333',
	'content_color' => '#808080',
	'content_font' => 'Poppins',
	'button_color' => '#fff',
	'button_bgcolor' => '#03a67b',
	'form_bgcolor' => '#03a57b',
	'form_color' => '#fff',
	'form_tip_color' => '#05e6aa',
	'form_btn_color' => '#03a57b',
	'form_btn_bgcolor' => '#fff',
	'bg_image' => 'http://placehold.it/1920x500/',
], [
	'title' => 'Title',
	'desc' => 'This is the description',
	'button_text' => 'Contact Us',
	'button_link' => '#',
	'form_shortcode' => '[contact-form-7 id="279" title="CTA 001"]',
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

class V1_Cta_002  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
		$this->set_default_style('title_color', '#333');
		$this->set_default_style('content_color', '#808080');
		$this->set_default_style('content_font', 'Poppins');
		$this->set_default_style('button_color', '#fff');
		$this->set_default_style('button_bgcolor', '#03a67b');
		$this->set_default_style('form_bgcolor', '#03a57b');
		$this->set_default_style('form_color', '#fff');
		$this->set_default_style('form_tip_color', '#05e6aa');
		$this->set_default_style('form_btn_color', '#03a57b');
		$this->set_default_style('form_btn_bgcolor', '#fff');
		$this->set_default_style('bg_image', 'http://placehold.it/1920x500/');
		$this->set_default_content('title', 'We Bring Impactful Digital Solutions');
		$this->set_default_content('desc', 'Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.');
		$this->set_default_content('button_text', 'Contact Us');
		$this->set_default_content('button_link', '#');
		$this->set_default_content('form_shortcode', '');
	}

	public function style () {
		?>
			.<?php $this->eid(); ?> {
				padding: 60px 0 0;
			}
			.<?php $this->eid(); ?> .mml-cta {
				background-repeat: no-repeat;
				background-position: center;
				-webkit-background-size: cover;
								background-size: cover;
			}

			.<?php $this->eid(); ?> .mml-cta .container {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-align: center;
				-webkit-align-items: center;
						-ms-flex-align: center;
								align-items: center;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
						-ms-flex-pack: justify;
								justify-content: space-between;
				height: 100%;
				min-height: 500px;
				text-align: left;
			}

			.<?php $this->eid(); ?> .mml-cta .container .mml-cta-l {
				-webkit-box-flex: 1;
				-webkit-flex: 1;
						-ms-flex: 1;
								flex: 1;
			}

			.<?php $this->eid(); ?> .mml-cta .container .section-tit {
				max-width: 370px;
				color: <?php $this->est('title_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .container .section-cont-box {
				max-width: 565px;
			}

			.<?php $this->eid(); ?> .mml-cta .container .section-cont-box .section-cont {
				padding: 10px 0;
				color: <?php $this->est('content_color'); ?>;
				font-family: <?php $this->est('content_font'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .container .mml-btn {
				background-color: <?php $this->est('button_bgcolor'); ?>;
				color: <?php $this->est('button_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-cta-form {
				margin-top: -110px;
				padding: 50px;
				max-width: 480px;
				background-color: <?php $this->est('form_bgcolor'); ?>;
				-webkit-border-radius: 4px;
								border-radius: 4px;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd h3 {
				margin-bottom: 20px;
				color: <?php $this->est('form_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row {
				width: 100%;
				padding: 0;
				margin-bottom: 20px;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row.mml-form-tip {
				margin-top: -20px;
				border: none;
				color: <?php $this->est('form_tip_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row input.wpcf7-text, .<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row input.wpcf7-text, .<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row textarea {
				width: 100%;
				border: 0;
				padding: 16px 10px;
				background-color: transparent;
				border: solid 2px <?php $this->est('form_color'); ?>;
				-webkit-border-radius: 6px;
								border-radius: 6px;
				color: <?php $this->est('form_color'); ?>;
    		box-sizing: border-box;
				outline: none;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row textarea {
				max-height: 100px;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row.mml-form-btn {
    		position: relative;
				border: 0;
				margin-bottom:0;
			}
			
			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row.mml-form-btn .ajax-loader{
    		position: absolute;
				right: 10px;
				top: 50%;
				margin-top:-8px;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row input[type=submit] {
				width: 100%;
				padding: 15px 0;
				margin:0;
				border-radius: 5px;
				color: <?php $this->est('form_btn_color'); ?>;
				background-color: <?php $this->est('form_btn_bgcolor'); ?>;
			}
			
			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row input[type=submit]:hover {
				opacity: .95;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row ::-webkit-input-placeholder {
				/* Chrome/Opera/Safari */
				color: <?php $this->est('form_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row ::-moz-placeholder {
				/* Firefox 19+ */
				color: <?php $this->est('form_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row :-ms-input-placeholder {
				/* IE 10+ */
				color: <?php $this->est('form_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-form-bd .mml-row :-moz-placeholder {
				/* Firefox 18- */
				color: <?php $this->est('form_color'); ?>;
			}

			@media only screen and (max-width: 680px) {
				.<?php $this->eid(); ?> .mml-cta .container {
					-webkit-flex-wrap: wrap;
							-ms-flex-wrap: wrap;
									flex-wrap: wrap;
				}
				.<?php $this->eid(); ?> .mml-cta .container .mml-cta-r {
					width: 100%;
				}
				.<?php $this->eid(); ?> .mml-cta .container .mml-cta-form {
					margin-top: 20px;
					padding: 20px;
					max-width: 100%;
				}
			}

		<?php
	}

	public function script () {
		?>

		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>" >
				<section class="mml-cta" style="background-image: url('<?php $this->est('bg_image') ?>')">
					<div class="container">
						<div class="mml-cta-l">
							<?php if ($this->has_content('title')) { ?>
								<h2 class="section-tit"><?php $this->eco('title') ?></h2>
							<?php } ?>
							<?php if ($this->has_content('desc')) { ?>
								<div class="section-cont-box">
									<p class="section-cont"><?php $this->eco('desc') ?></p>
								</div>
							<?php } ?>
							<?php if ($this->has_content('button_text')) { ?>
								<div class="mml-btn-box">
									<a href="<?php $this->eco('button_link'); ?>" class="mml-btn"><?php $this->eco('button_text'); ?></a>
								</div>
							<?php } ?>
						</div>
						<div class="mml-cta-r">
							<?php if ($this->has_content('form_shortcode')) { ?>
								<div class="mml-cta-form">
									<div class="mml-form-bd mml-form">
										<?php echo do_shortcode($this->content['form_shortcode']); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
		<?php
	}
}
