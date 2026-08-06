<?php

/*
<?php mtf_section('V1_History_001', 'history-001', [
	'class' 			=> '',
	'bg_color' 			=> '',
	'bg_image'			=> '',
	'margin_top' 		=> '',
	'padding_top'		=> '',
	'padding_bottom'	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'title_color'		=> '#000',
	'line_color'		=> '#00a978'
], [
	'title'		=> 'title',
	'subtitle'	=> 'subtitle',
	'features'	=> [
		['title' => 'year', 'content' => 'content'],
		['title' => 'year', 'content' => 'content'],
		['title' => 'year', 'content' => 'content']
	]
]); ?>
*/

class V1_History_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'class' 			=> '',
			'bg_color' 			=> '',
			'bg_image'			=> '',
			'margin_top' 		=> '',
			'padding_top'		=> '',
			'padding_bottom'	=> '',
			'margin_bottom' 	=> '',
			'custom_css' 		=> '',
			'desc_color'		=> '#808080',
			'title_color'		=> '#000',
			'line_color'		=> '#00a978'
		]);

		$this->init_content([
			'title'		=> 'title',
			'subtitle'	=> 'subtitle',
			'features'	=> [
				['title' => 'year', 'content' => 'content'],
				['title' => 'year', 'content' => 'content'],
				['title' => 'year', 'content' => 'content']
			]
		]);
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> h4 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin: 40px auto -20px;
				max-width: 820px;
			}
			.<?php $this->eid(); ?> .list > li {
				position: relative;
				text-align: left;
				padding: 0 0 20px 30px;
			}
			.<?php $this->eid(); ?> .list > li:before {
				content: '\20';
				position: absolute;
				left: 0; top: 10px;
				height: 10px; width: 10px;
				border-radius: 10px;
				background: <?php $this->est('line_color'); ?>;
			}
			.<?php $this->eid(); ?> .list > li:not(:last-child):after {
				content: '\20';
				position: absolute;
				left: 4px; top: 20px; bottom: -10px;
				width: 1.5px;
				background: <?php $this->est('line_color'); ?>;
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
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('subtitle')) { ?>
						<p><?php $this->eco('subtitle'); ?></p>
					<?php } ?>
					<?php if ($this->has_content('features')) { ?>
						<ul class="list">
							<?php foreach ($this->gco('features') as $feature) { ?>
								<li>
									<h4><?php _e($feature['title']); ?></h4>
									<p><?php _e($feature['content']); ?></p>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

				</div>
			</div>
		<?php
	}
}
