<?php

/*
<?php mtf_section('V1_Feature_002', 'feature_002', [
	'item_color' => '#333',
	'columns' => '7', // 列数
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'title' => 'Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => '', 'alt' => '', 'text' => '' ],
	],
]); ?>
*/

class V1_Feature_002  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_color', '#333');
		$this->set_style_columns(7); // 默认 7 列。

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/1024x600/ccc/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Heading';
				}
			}
		}
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
				margin-top: 10px;
				<?php $this->css_attr_color('item_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin-top: 10px;
				justify-content: center;
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
					<?php if ($this->has_content('desc')) { ?>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="list <?php $this->echo_columns_class(); ?>">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<?php $this->display_tag_img($value['src'], $value['alt']); ?>
									<h4><?php _e($value['text']); ?></h4>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
