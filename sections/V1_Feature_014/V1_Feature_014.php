<?php

/*
<?php mtf_section('V1_Feature_014', 'feature_014', [
	'item_img_radius' => '5px',
	'item_title_color' => '#333',
	'item_desc_color' => '#666',
	'item_link_color' => '#009a78',
	'item_link_color_hover' => '#00a978',
	'button_bgcolor' => '#03a67b',
	'button_color' => '#fff',
	'button_bordercolor' => '#03a67b',
	'button2_color' => '#03a67b',
	'button_color_hover' => '#fff',
	'button_bgcolor_hover' => '#02bd8c',
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
	'button_text_1' => 'CTA Button 1',
	'button_link_1' => '#1',
	'button_text_2' => 'CTA Button 2',
	'button_link_2' => '#2',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'more' => '', 'link' => '' ], // more 为空字符串时不展示
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'more' => '', 'link' => '' ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'more' => '', 'link' => '' ],
	],
]); ?>
*/

class V1_Feature_014 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_img_radius', '0px');
		$this->set_default_style('item_title_color', '#333');
		$this->set_default_style('item_desc_color', '#666');
		$this->set_default_style('item_link_color', '#009a78');
		$this->set_default_style('item_link_color_hover', '#00a978');
		$this->set_default_style('button_bgcolor', '#03a67b');
		$this->set_default_style('button_color', '#fff');
		$this->set_default_style('button_bordercolor', '#03a67b');
		$this->set_default_style('button2_color', '#03a67b');
		$this->set_default_style('button_color_hover', '#fff');
		$this->set_default_style('button_bgcolor_hover', '#02bd8c');
		$this->set_style_columns(3);

		$this->set_default_content('button_text_1', 'CTA Button 1');
		$this->set_default_content('button_link_1', '#1');
		$this->set_default_content('button_text_2', 'CTA Button 2');
		$this->set_default_content('button_link_2', '#2');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $item) {
				if (!isset($item['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/380x230/096/dd2';
				}
				if (!isset($item['alt'])) {
					$this->content['items'][$key]['alt'] = 'image ' . $key;
				}
				if (!isset($item['heading'])) {
					$this->content['items'][$key]['heading'] = 'Heading ' . $key;
				}
				if (!isset($item['text'])) {
					$this->content['items'][$key]['text'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor. ' . $key;
				}
				if (!isset($item['more'])) {
					$this->content['items'][$key]['more'] = 'Learn More';
				}
				if (!isset($item['link'])) {
					$this->content['items'][$key]['link'] = '#';
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
		.<?php $this->eid(); ?> > .container > p {
			margin: 10px auto;
			max-width: 829px;
		}
		.<?php $this->eid(); ?> h2 {
			<?php $this->css_attr_color('title_color'); ?>
		}
		.<?php $this->eid(); ?> .items {
			margin: 30px -10px 0;
		}
		.<?php $this->eid(); ?> h4 {
			margin: 10px 0;
			<?php $this->css_attr_color('item_title_color'); ?>
		}
		.<?php $this->eid(); ?> .items img {
			<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
		}
		.<?php $this->eid(); ?> .items p {
			<?php $this->css_attr_color('item_desc_color'); ?>
		}
		.<?php $this->eid(); ?> .learnmore {
			margin-top: 10px;
			font-size: 18px;
			font-weight: 700;
			<?php $this->css_attr_color('item_link_color'); ?>
		}
		.<?php $this->eid(); ?> .learnmore:hover {
			<?php $this->css_attr_color('item_link_color_hover'); ?>
			text-decoration: underline;
		}
		.<?php $this->eid(); ?> .btns {
			justify-content: center;
		}
		.<?php $this->eid(); ?> .btn{
			<?php $this->css_attr('background', 'button_bgcolor'); ?>
			<?php $this->css_attr_color('button_color'); ?>
			border: 2px solid <?php $this->est('button_bordercolor'); ?>;
		}
		.<?php $this->eid(); ?> .btn-reverse{
			background: transparent;
			<?php $this->css_attr_color('button2_color'); ?>
		}
		.<?php $this->eid(); ?> .btn:hover{
			<?php $this->css_attr('background', 'button_bgcolor_hover'); ?>
			border-color: transparent;
			<?php $this->css_attr_color('button_color_hover'); ?>
		}
		<?php
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
						<ul class="items <?php $this->echo_columns_class(); ?>">
							<?php foreach ($this->content['items'] as $key => $item) { ?>
								<li>
									<a href="<?php echo esc_attr($item['link']); ?>">
										<div class="mml-image"><?php $this->display_tag_img($item['src'], $item['alt']); ?></div>
										<h4><?php echo $item['heading']; ?></h4>
									</a>
									<p><?php echo $item['text']; ?></p>
									<?php if (!empty($item['more'])) { ?>
										<a href="<?php echo esc_attr($item['link']); ?>" class="learnmore"><?php _e($item['more']); ?></a>
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
