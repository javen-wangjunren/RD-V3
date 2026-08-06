<?php

/*
<?php mtf_section('V1_Case_Detail_002', 'v1_case_detail_002', [
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
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
]); ?>
*/

class V1_Case_Detail_002  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		// $this->set_default_style('class', '');
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
			.<?php $this->eid(); ?> .mml-article {
				max-width: 880px;
			}
			.<?php $this->eid(); ?> .case-title {
				font-size: 36px;
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .case-subtitle {
				<?php $this->css_attr_color('subtitle_color'); ?>
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
					<?php if ($this->has_content('title')) { ?>
						<h1 class="case-title"><?php $this->eco('title'); ?></h1>
					<?php } ?>
					<?php if ($this->has_content('subtitle')) { ?>
						<p class="case-subtitle"><?php $this->eco('subtitle'); ?></p>
					<?php } ?>
					<div class="mml-article">
						<?php $this->eco('desc'); ?>
					</div>
				</div>
			</div>
		<?php
	}
}
