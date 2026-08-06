<?php

/*
<?php mtf_section('V1_Feature_017', 'feature_017', [
	'item_bgcolor' => '#fff',
	'item_title_color' => '#333',
	'item_text_color' => '#666',
	'item_img_radius' => '0px',
	'detail_left_color' => '#369',
	'detail_right_color' => '#c96',
	'item_btn_color' => '#fff',
	'item_btn_bgcolor' => '#096',
	'item_btn_bgcolor_hover' => '#3c9',
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
		[
			'title' => '',
			'text' => '',
			'src' => '',
			'alt' => '',
			'button_text' => '',
			'button_link' => '',
			'details' => [
				[ '', '' ], // 第二个内容如果为空字符串则不输出。
				[ '', '' ],
				[ '', '' ],
			],
		]
	],
]); ?>
*/

class V1_Feature_017  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_bgcolor', '#fff');
		$this->set_default_style('item_title_color', '#333');
		$this->set_default_style('item_text_color', '#666');
		$this->set_default_style('item_img_radius', '0px');
		$this->set_default_style('detail_left_color', '#333');
		$this->set_default_style('detail_right_color', '#666');
		$this->set_default_style('item_btn_color', '#fff');
		$this->set_default_style('item_btn_bgcolor', '#096');
		$this->set_default_style('item_btn_bgcolor_hover', '#3c9');
		$this->set_style_columns(3); // 默认 3 列。

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['title'])) {
					$this->content['items'][$key]['title'] = 'Title';
				}
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/340x206/096/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Heading';
				}
				if (!isset($value['details'])) {
					$this->content['items'][$key]['details'] = [
						[ 'key', 'value' ],
						[ 'key', 'value' ],
						[ 'key', 'value' ],
					];
				}
				if (!isset($value['button_text'])) {
					$this->content['items'][$key]['button_text'] = 'View Details';
				}
				if (!isset($value['button_link'])) {
					$this->content['items'][$key]['button_link'] = '#';
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
			.<?php $this->eid(); ?> h3 {
				<?php $this->css_attr_color('item_title_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin: 30px -10px 0;
				justify-content: center;
				text-align: left;
				<?php $this->css_attr_color('item_text_color'); ?>
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				margin: 10px;
				padding: 20px;
				display: flex;
				flex-direction: column;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
				<?php $this->css_attr('background', 'item_bgcolor'); ?>
			}
			.<?php $this->eid(); ?> img {
				margin: 10px 0 0;
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .details {
				margin: 10px 0 auto;
			}
			.<?php $this->eid(); ?> .details > li {
				margin: 10px 0;
				display: flex;
				justify-content: space-between;
				align-items: baseline;
				<?php $this->css_attr_color('detail_right_color'); ?>
			}
			.<?php $this->eid(); ?> .details span:first-child {
				flex: 1 1 0;
				margin-right: 20px;
				<?php $this->css_attr_color('detail_left_color'); ?>
			}
			.<?php $this->eid(); ?> .btn {
				margin: 40px 0 0;
				<?php $this->css_attr('background', 'item_btn_bgcolor'); ?>
				<?php $this->css_attr_color('item_btn_color'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover{
				<?php $this->css_attr('background', 'item_btn_bgcolor_hover'); ?>
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
									<h3><?php _e($value['title']); ?></h3>
									<p><?php _e($value['text']); ?></p>
									<?php $this->display_tag_img($value['src'], $value['alt']); ?>
									<ul class="details">
										<?php foreach ($value['details'] as $k => $v) { ?>
											<li>
												<span><?php _e($v[0]); ?></span>
												<?php if ($v[1]) { ?>
													<span><?php _e($v[1]); ?></span>
												<?php } ?>
											</li>
										<?php } ?>
									</ul>
									<a href="<?php _e($value['button_link']); ?>" class="btn"><?php _e($value['button_text']); ?></a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
