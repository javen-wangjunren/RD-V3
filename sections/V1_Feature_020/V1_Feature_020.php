<?php

/*
<?php mtf_section('V1_Feature_020', 'feature_020', [
	'tab_label_color' => '#333',
	'tab_label_color_active' => '#096',
	'tab_label_bordercolor_active' => '#096',
	'tab_title_color' => '#333',
	'tab_text_color' => '#666',
	'tab_feature_color' => '#999',
	'tab_btn_color' => '#fff',
	'tab_btn_bgcolor' => '#096',
	'tab_btn_bgcolor_hover' => '#3a9',
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
	'tabs' => [
		[
			'label' => '', // tab 标签
			'src' => '',
			'alt' => '',
			'title' => '',
			'text' => '',
			'button_text' => '',
			'button_link' => '',
			'features' => [
				[ 'html' => '', 'src' => '', 'alt' => '', 'text' => '' ], // 有 html 则显示 html ，无则显示 src 和 alt
				[ 'html' => '', 'src' => '', 'alt' => '', 'text' => '' ], // html 举例: <i class="fas fa-globe"></i>
			],
		],
	],
]); ?>
*/

class V1_Feature_020  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('tab_label_color', '#333');
		$this->set_default_style('tab_label_color_active', '#096');
		$this->set_default_style('tab_label_bordercolor_active', '#096');
		$this->set_default_style('tab_title_color', '#333');
		$this->set_default_style('tab_text_color', '#666');
		$this->set_default_style('tab_feature_color', '#999');
		$this->set_default_style('tab_btn_color', '#fff');
		$this->set_default_style('tab_btn_bgcolor', '#096');
		$this->set_default_style('tab_btn_bgcolor_hover', '#3a9');

		if (!isset($this->content['tabs'])) {
			$this->content['tabs'] = [ [], [] ];
		}
		if (count($this->content['tabs']) > 0) {
			foreach ($this->content['tabs'] as $key => $value) {
				if (!isset($value['label'])) {
					$this->content['tabs'][$key]['label'] = 'Tab';
				}
				if (!isset($value['src'])) {
					$this->content['tabs'][$key]['src'] = 'https://via.placeholder.com/570x369/096/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['tabs'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['title'])) {
					$this->content['tabs'][$key]['title'] = 'Title';
				}
				if (!isset($value['text'])) {
					$this->content['tabs'][$key]['text'] = 'Text';
				}
				if (!isset($value['features'])) {
					$this->content['tabs'][$key]['features'] = [
						[ 'html' => '<i class="fas fa-globe"></i>', 'src' => '', 'alt' => '', 'text' => 'Feature' ],
						[ 'html' => '', 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'alt', 'text' => 'Feature' ],
					];
				}
				if (!isset($value['button_text'])) {
					$this->content['tabs'][$key]['button_text'] = 'CTA Button';
				}
				if (!isset($value['button_link'])) {
					$this->content['tabs'][$key]['button_link'] = '#';
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
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .naver:hover {
				<?php $this->css_attr_color('tab_label_color_active'); ?>
			}
			.<?php $this->eid(); ?> .naver.mml-active {
				<?php $this->css_attr_color('tab_label_color_active'); ?>
				<?php $this->css_attr('border-color', 'tab_label_bordercolor_active'); ?>
			}
			.<?php $this->eid(); ?> .taber {
				order: 2;
				margin: 30px 0 0;
				width: 100%;
				display: none;
				<?php $this->css_attr_color('tab_text_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-active + .taber {
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 50%;
				max-width: 570px;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin-left: 20px;
				flex: 1 1 0;
				max-width: 520px;
			}
			.<?php $this->eid(); ?> h3 {
				<?php $this->css_attr_color('tab_title_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin: 30px 0 0;
				<?php $this->css_attr_color('tab_feature_color'); ?>
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px 0;
				display: flex;
				align-items: center;
			}
			.<?php $this->eid(); ?> .list img,
			.<?php $this->eid(); ?> .list i {
				margin: 0 10px 0 0;
			}
			.<?php $this->eid(); ?> .btn {
				margin: 40px 0 0;
				<?php $this->css_attr('background-color', 'tab_btn_bgcolor'); ?>
				<?php $this->css_attr_color('tab_btn_color'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover {
				<?php $this->css_attr('background-color', 'tab_btn_bgcolor_hover'); ?>
			}
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .mml-active + .taber {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .mml-text {
					margin: 20px 0;
				}
			}
			@media (max-width: 540px) {
				.<?php $this->eid(); ?> .naver {
					width: 100%;
					margin: 10px 0;
				}
				.<?php $this->eid(); ?> .taber {
					order: unset;
					margin: 10px 0 0;
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
								<div class="taber">
									<div class="mml-image"><?php $this->display_tag_img($value['src'], $value['alt']); ?></div>
									<div class="mml-text">
										<?php if (isset($value['title']) && $value['title']) { ?>
											<h3><?php _e($value['title']); ?></h3>
										<?php } ?>
										<?php if (isset($value['text']) && $value['text']) { ?>
											<p><?php _e($value['text']); ?></p>
										<?php } ?>
										<?php if (isset($value['features']) && count($value['features']) > 0) { ?>
											<ul class="list">
												<?php foreach ($value['features'] as $k => $feature) { ?>
													<li>
														<?php if (isset($feature['html']) && $feature['html']) { ?>
															<?php _e($feature['html']); ?>
														<?php } else { ?>
															<?php $this->display_tag_img($feature['src'], $feature['alt']); ?>
														<?php } ?>
														<span><?php _e($feature['text']); ?></span>
													</li>
												<?php } ?>
											</ul>
										<?php } ?>
										<?php if (isset($value['button_text']) && $value['button_text']) { ?>
											<a href="<?php _e($value['button_link']); ?>" class="btn"><?php _e($value['button_text']); ?></a>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
