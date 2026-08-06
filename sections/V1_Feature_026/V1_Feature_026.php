<?php

/*
<?php mtf_section('V1_Feature_026', 'feature_026', [
	'item_heading_color' => '#333',
	'item_text_color' => '#666',
	'item_img_radius' => '0px',
	'columns' => '3', // 列数
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
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'html' => '', 'src' => '', 'alt' => '', 'heading' => '', 'text' => '' ], // 有 html 则输出 html ，无则输出 src 和 alt
		[ 'html' => '', 'src' => '', 'alt' => '', 'heading' => '', 'text' => '' ], // html 示例: <i class="fas fa-globe"></i>
		[ 'html' => '', 'src' => '', 'alt' => '', 'heading' => '', 'text' => '' ],
	],
]); ?>
*/

class V1_Feature_026  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_heading_color', '#333');
		$this->set_default_style('item_text_color', '#666');
		$this->set_default_style('item_img_radius', '0px');
		$this->set_style_columns(3); // 默认 3 列。

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['html'])) {
					// $this->content['items'][$key]['html'] = '<i class="fas fa-globe"></i>';
					$this->content['items'][$key]['html'] = '';
				}
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/63x63/096/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['heading'])) {
					$this->content['items'][$key]['heading'] = 'Heading';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'text';
				}
			}
		}
	}

	public function style () {
		?>
			/* insert style start */
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
				<?php $this->css_attr_color('item_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin: 20px -10px -10px;
				display: flex;
				flex-wrap: wrap;
				text-align: left;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				padding: 10px;
				display: flex;
				align-items: flex-start;
				<?php $this->css_attr_color('item_text_color'); ?>
			}
			.<?php $this->eid(); ?> .list img {
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .mml-text {
				margin-left: 15px;
				flex: 1 1 0;
			}
			@media (max-width: 980px) {
				.<?php $this->eid(); ?> .list > li {
					width: 50%;
				}
			}
			@media (max-width: 630px) {
				.<?php $this->eid(); ?> .list > li {
					width: 100%;
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
									<div class="mml-image">
										<?php if (isset($value['html']) && $value['html']) {
											echo $value['html'];
										} else { ?>
											<?php $this->display_tag_img($value['src'], $value['alt']); ?>
										<?php } ?>
									</div>
									<div class="mml-text">
										<h4><?php _e($value['heading']); ?></h4>
										<p><?php _e($value['text']); ?></p>
									</div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
