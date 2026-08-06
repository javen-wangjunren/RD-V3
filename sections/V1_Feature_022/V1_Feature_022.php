<?php

/*
<?php mtf_section('V1_Feature_022', 'feature_022', [
	'item_title_color' => '#333',
	'item_heading_color' => '#333',
	'item_text_color' => '#666',
	'item_img_radius' => '0px',
	'item_btn_color' => '#fff',
	'item_btn_bgcolor' => '#096',
	'item_btn_bgcolor_hover' => '#3c9',
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
			'button_text' => '',
			'button_link' => '',
			'features' => [
				[
					'src' => '',
					'alt' => '',
					'heading' => '',
					'text' => '',
				],
				[
					'src' => '',
					'alt' => '',
					'heading' => '',
					'text' => '',
				],
			],
		],
	],
]); ?>
*/

class V1_Feature_022  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_title_color', '#333');
		$this->set_default_style('item_heading_color', '#333');
		$this->set_default_style('item_text_color', '#666');
		$this->set_default_style('item_img_radius', '0px');
		$this->set_default_style('item_btn_color', '#fff');
		$this->set_default_style('item_btn_bgcolor', '#096');
		$this->set_default_style('item_btn_bgcolor_hover', '#3c9');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['title'])) {
					$this->content['items'][$key]['title'] = 'Title';
				}
				if (!isset($value['button_text'])) {
					$this->content['items'][$key]['button_text'] = 'Button';
				}
				if (!isset($value['button_link'])) {
					$this->content['items'][$key]['button_link'] = '#';
				}
				if (!isset($value['features'])) {
					$this->content['items'][$key]['features'] = [
						[
							'src' => 'https://via.placeholder.com/70x70/096/fff?text=I',
							'alt' => 'alt',
							'heading' => 'Heading',
							'text' => 'Description text.',
						],
						[
							'src' => 'https://via.placeholder.com/70x70/096/fff?text=I',
							'alt' => 'alt',
							'heading' => 'Heading',
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
			.<?php $this->eid(); ?> h4 {
				<?php $this->css_attr_color('item_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-box {
				display: flex;
				justify-content: space-between;
				margin: 30px -10px 0;
				text-align: left;
			}
			.<?php $this->eid(); ?> .mml-half {
				margin: 10px;
				width: 50%;
				max-width: 500px;
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 20px 0;
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .mml-image img {
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .mml-text {
				margin-left: 20px;
				flex: 1 1 0;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				<?php $this->css_attr('background', 'item_btn_bgcolor'); ?>
				<?php $this->css_attr_color('item_btn_color'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #02bd8c;
				<?php $this->css_attr('background', 'item_btn_bgcolor_hover'); ?>
			}
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
					margin: 20px 0 0;
				}
				.<?php $this->eid(); ?> .mml-half {
					width: unset;
					max-width: unset;
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
						<div class="mml-box">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<div class="mml-half">
									<h3><?php _e($value['title']); ?></h3>
									<?php if (count($value['features']) > 0) { ?>
										<ul class="list">
											<?php foreach ($value['features'] as $k => $feature) { ?>
												<li>
													<div class="mml-image">
														<?php $this->display_tag_img($feature['src'], $feature['alt']); ?>
													</div>
													<div class="mml-text">
														<h4><?php _e($feature['heading']); ?></h4>
														<p><?php _e($feature['text']); ?></p>
													</div>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
									<?php if (isset($value['button_text']) && $value['button_text']) { ?>
										<div class="btns">
											<a href="<?php _e($value['button_link']); ?>" class="btn"><?php _e($value['button_text']); ?></a>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
