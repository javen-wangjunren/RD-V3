<?php

/*
<?php mtf_section('V1_Feature_021', 'feature_021', [
	'tab_label_color' => '#333',
	'tab_label_color_active' => '#096',
	'tab_label_border_color' => '#096',
	'img_radius' => '0px',
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
	'tabs' => [
		[
			'label' => '',
			'images' => [
				[ 'src' => '', 'alt' => '' ],
			],
		],
	],
]); ?>
*/

class V1_Feature_021 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('tab_label_color', '#333');
		$this->set_default_style('tab_label_color_active', '#096');
		$this->set_default_style('tab_label_border_color', '#096');
		$this->set_default_style('img_radius', '0px');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#096');
		$this->set_default_style('btn_bgcolor_hover', '#3c9');
		$this->set_style_columns(3); // 默认 3 列。

		$this->set_default_content('button_text_1', 'CTA Button 1');
		$this->set_default_content('button_link_1', '#1');
		$this->set_default_content('button_text_2', 'CTA Button 2');
		$this->set_default_content('button_link_2', '#2');

		if (!isset($this->content['tabs'])) {
			$this->content['tabs'] = [ [], [] ];
		}
		if (count($this->content['tabs']) > 0) {
			foreach ($this->content['tabs'] as $key => $value) {
				if (!isset($value['label'])) {
					$this->content['tabs'][$key]['label'] = 'Tab';
				}
				if (!isset($value['images'])) {
					$this->content['tabs'][$key]['images'] = [
						[ 'src' => 'https://via.placeholder.com/380x250/096/fff?text=Image', 'alt' => 'image alt' ],
						[ 'src' => 'https://via.placeholder.com/380x250/096/fff?text=Image', 'alt' => 'image alt' ],
						[ 'src' => 'https://via.placeholder.com/380x250/096/fff?text=Image', 'alt' => 'image alt' ],
						[ 'src' => 'https://via.placeholder.com/380x250/096/fff?text=Image', 'alt' => 'image alt' ],
						[ 'src' => 'https://via.placeholder.com/380x250/096/fff?text=Image', 'alt' => 'image alt' ],
						[ 'src' => 'https://via.placeholder.com/380x250/096/fff?text=Image', 'alt' => 'image alt' ],
					];
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
			.<?php $this->eid(); ?> .mml-tabs {
				margin: 30px 0 0;
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
				text-align: left;
			}
			.<?php $this->eid(); ?> .naver {
				margin: 10px 15px;
				border-bottom: 3px solid transparent;
				font-size: 20px;
				font-weight: 700;
				<?php $this->css_attr_color('tab_label_color'); ?>
			}
			.<?php $this->eid(); ?> .naver:hover {
				<?php $this->css_attr_color('tab_label_color_active'); ?>
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .naver.mml-active {
				<?php $this->css_attr_color('tab_label_color_active'); ?>
				<?php $this->css_attr('border-color', 'tab_label_border_color'); ?>
			}
			.<?php $this->eid(); ?> .taber {
				order: 2;
				margin: 20px -10px 0;
				width: 100%;
				display: none;
				color: #000;
				text-align: center;
			}
			.<?php $this->eid(); ?> .taber h4 {
				margin: 10px 0;
				color: #444;
			}
			.<?php $this->eid(); ?> .mml-active + .taber {
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .mml-image img {
				<?php $this->css_attr('border-radius', 'img_radius'); ?>
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				<?php $this->css_attr('background', 'btn_bgcolor'); ?>
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
			@media (max-width: 540px) {
				.<?php $this->eid(); ?> .naver {
					width: 100%;
					margin: 10px 0;
				}
				.<?php $this->eid(); ?> .taber {
					order: unset;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $tabs = $('.<?php $this->eid(); ?> .mml-tabs');
		$tabs.on('click', '.naver', function(){
			if( this.classList.contains('mml-active') ) return;
			$tabs.find('.mml-active').removeClass('mml-active');
			this.classList.add('mml-active');
		});
	});
})(jQuery);
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
					<?php if (count($this->content['tabs']) > 0) { ?>
						<div class="mml-tabs">
							<?php foreach ($this->content['tabs'] as $key => $value) { ?>
								<a class="naver <?php echo $key === 0 ? 'mml-active' : ''; ?>"><?php _e($value['label']); ?></a>
								<ul class="taber <?php $this->echo_columns_class(); ?>">
									<?php foreach ($value['images'] as $k => $v) { ?>
										<li>
											<?php $this->display_tag_img($v['src'], $v['alt']); ?>
											<h4>Heading</h4>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
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
