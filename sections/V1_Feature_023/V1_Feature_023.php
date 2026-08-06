<?php

/*
<?php mtf_section('V1_Feature_023', 'feature_023', [
	'item_bgcolor' => '#fff',
	'item_title_color' => '#333',
	'item_text_color' => '#666',
	'item_feature_color' => '#666',
	'btn_color' => '#fff',
	'btn_bgcolor' => '#096',
	'btn_bgcolor_hover' => '#3c9',
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
	'button_text_1' => 'CTA Button 1',
	'button_link_1' => '#1',
	'button_text_2' => 'CTA Button 2',
	'button_link_2' => '#2',
	'title' => 'Title',
	'desc' => 'This is the description.',
	'items' => [
		[
			'heading' => '',
			'text' => '',
			'features' => [
				[
					'html' => '',
					'src' => '',
					'alt' => '',
					'text' => '',
				],
			],
		],
	],
]); ?>
*/

class V1_Feature_023  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_bgcolor', '#fff');
		$this->set_default_style('item_title_color', '#333');
		$this->set_default_style('item_text_color', '#666');
		$this->set_default_style('item_feature_color', '#666');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#096');
		$this->set_default_style('btn_bgcolor_hover', '#3c9');
		$this->set_style_columns(3); // 默认 3 列。

		$this->set_default_content('button_text_1', 'CTA Button 1');
		$this->set_default_content('button_link_1', '#1');
		$this->set_default_content('button_text_2', 'CTA Button 2');
		$this->set_default_content('button_link_2', '#2');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['heading'])) {
					$this->content['items'][$key]['heading'] = 'Heading';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Text';
				}
				if (!isset($value['features'])) {
					$this->content['items'][$key]['features'] = [
						[
							'html' => '<i class="fas fa-globe"></i>',
							'src' => 'https://via.placeholder.com/20x20/096/fff?text=I',
							'alt' => 'alt',
							'text' => 'Description text.',
						],
						[
							'html' => '',
							'src' => 'https://via.placeholder.com/20x20/096/fff?text=I',
							'alt' => 'alt',
							'text' => 'Description text.',
						],
					];
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
			.<?php $this->eid(); ?> h3 {
				<?php $this->css_attr_color('item_title_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin-top: 30px;
				justify-content: center;
				text-align: left;
			}
			.<?php $this->eid(); ?> .list > li {
				padding: 20px;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
				<?php $this->css_attr('background-color', 'item_bgcolor'); ?>
				<?php $this->css_attr_color('item_text_color'); ?>
			}
			.<?php $this->eid(); ?> .details {
				margin: 30px 0 10px;
				<?php $this->css_attr_color('item_feature_color'); ?>
			}
			.<?php $this->eid(); ?> .details > li {
				margin: 10px 0;
				display: flex;
				align-items: flex-start;
				<?php $this->css_attr_color('item_feature_color'); ?>
			}
			.<?php $this->eid(); ?> .details img{
				margin: 4px 10px 0 0;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				<?php $this->css_attr('background-color', 'btn_bgcolor'); ?>
				<?php $this->css_attr_color('btn_color'); ?>
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				<?php $this->css_attr_color('btn_bgcolor'); ?>
				<?php $this->css_attr('border-color', 'btn_bgcolor'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover {
				<?php $this->css_attr('background-color', 'btn_bgcolor_hover'); ?>
				<?php $this->css_attr_color('btn_color'); ?>
				border-color: transparent;
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
									<h3><?php _e($value['heading']); ?></h3>
									<p><?php _e($value['text']); ?></p>
									<?php if (count($value['features']) > 0) { ?>
										<ul class="details">
											<?php foreach ($value['features'] as $k => $feature) { ?>
												<li>
													<?php if (isset($feature['html']) && $feature['html']) {
														echo $feature['html'];
													} else { ?>
														<?php $this->display_tag_img($feature['src'], $feature['alt']); ?>
													<?php } ?>
													<span><?php _e($feature['text']); ?></span>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
					<?php if ($this->has_content('button_text_1') || $this->has_content('button_text_2')) { ?>
						<div class="btns">
							<?php if ($this->has_content('button_text_1')) { ?>
								<a href="<?php $this->eco('button_link_1'); ?>" class="btn"><?php $this->eco('button_text_1'); ?></a>
							<?php } ?>
							<?php if ($this->has_content('button_text_2')) { ?>
								<a href="<?php $this->eco('button_link_2'); ?>" class="btn btn-reverse"><?php $this->eco('button_text_2'); ?></a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
