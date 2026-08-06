<?php

/*
<?php mtf_section('V1_Cta_001', 'cta_001', [
	'text_width' => '1000px',
	'min_height' => '380px',
	'btn_color' => '#fff',
	'btn_bgcolor' => '#03a67b',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'subtitle_color' => '#666',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'button_text' => 'CTA',
	'button_link' => '/',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
]); ?>
*/

class V1_Cta_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('text_width', '1000px');
		$this->set_default_style('min_height', '380px');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#03a67b');

		$this->set_default_content('button_text', 'CTA');
		$this->set_default_content('button_link', '/');
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
				color: <?php $this->est('desc_color'); ?>;
			}
			.<?php $this->eid(); ?>.mml-section {
				padding:0 0;
			}
			.<?php $this->eid(); ?> .mml-cta {
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
				min-height: <?php $this->est('min_height'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .section-bd {
				max-width: <?php $this->est('text_width'); ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .section-tit {
				margin-bottom: 5px;
				color: <?php $this->est('title_color');  ?>;
			}

			.<?php $this->eid(); ?> .mml-cta .mml-btn {
				background-color: <?php $this->est('btn_bgcolor'); ?>;
				color: <?php $this->est('btn_color'); ?>;
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
				<div class="mml-cta">
					<div class="container">
						<div class="section-bd">
							<?php if ($this->has_content('title')) { ?>
								<h2 class="section-tit"><?php $this->eco('title') ?></h2>
							<?php } ?>
							<?php if ($this->has_content('desc')) { ?>
								<p class="section-cont"><?php $this->eco('desc') ?></p>
							<?php } ?>
							<?php if ($this->has_content('button_text')) { ?>
								<div class="mml-btn-box">
									<a href="<?php $this->eco('button_link'); ?>" class="mml-btn"><?php $this->eco('button_text'); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
