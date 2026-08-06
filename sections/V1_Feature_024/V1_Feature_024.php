<?php

/*
<?php mtf_section('V1_Feature_024', 'feature_024', [
	'img_radius' => '0px',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'items' => [
		[ 'html' => '', 'src' => '', 'alt' => '', 'text' => '' ], // 有 html 就显示 html ，无 html 就显示 src 和 alt .
		[ 'html' => '', 'src' => '', 'alt' => '', 'text' => '' ], // html 举例: <i class="fas fa-globe"></i>
		[ 'html' => '', 'src' => '', 'alt' => '', 'text' => '' ],
		[ 'html' => '', 'src' => '', 'alt' => '', 'text' => '' ],
	],
]); ?>
*/

class V1_Feature_024  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('img_radius', '0px');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['html'])) {
					$this->content['items'][$key]['html'] = '<i class="fas fa-globe"></i>';
					// $this->content['items'][$key]['html'] = '';
				}
				if (!isset($value['src'])) {
					// $this->content['items'][$key]['src'] = 'https://via.placeholder.com/46x46/097/f1f1f1?text=Image';
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
			/* insert style start */
			.<?php $this->eid(); ?> {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin: -10px 0;
				display: flex;
				flex-wrap: wrap;
				justify-content: space-around;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				padding: 10px;
				display: flex;
				align-items: center;
			}
			.<?php $this->eid(); ?> .list img {
				margin: 0 15px 0 0;
				<?php $this->css_attr('border-radius', 'img_radius'); ?>
			}
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .list > li {
					width: 50%;
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
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="list">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<?php if (isset($value['html']) && $value['html']) { ?>
										<?php _e($value['html']); ?>
									<?php } else { ?>
										<?php $this->display_tag_img($value['src'], $value['alt']); ?>
									<?php } ?>
									<b><?php _e($value['text']); ?></b>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
