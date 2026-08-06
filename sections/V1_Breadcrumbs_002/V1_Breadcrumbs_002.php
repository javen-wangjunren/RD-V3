<?php

/*
<?php mtf_section('V1_Breadcrumbs_002', 'breadcrumbs_002', [
	'link_color' => '#333',
	'link_color_hover' => '#000',
	'class' => '',
	'bg_color' => '',
	'bg_image' => '',
	'background_attachment' => '', // 如果需要视差效果，请赋值 fixed
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'desc_color' => '#808080', // 无链接的文字的颜色
	'custom_css' => '',
], [
	'back_link' => '/', // 如果为空字符串，将不输出
	'items' => [
		[ 'text' => 'Page1', 'link' => '#' ],
		[ 'text' => 'Page2', 'link' => '#' ],
	],
]); ?>
*/

class V1_Breadcrumbs_002 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('link_color', '#333');
		$this->set_default_style('link_color_hover', '#000');

		$this->set_default_content('back_link', '#');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'page';
				}
				if (!isset($value['link'])) {
					$this->content['items'][$key]['link'] = '/';
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
				padding: 15px 0;
			}
			.<?php $this->eid(); ?> .container {
				display: flex;
				align-items: center;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .gt {
				margin: 0 5px;
			}
			.<?php $this->eid(); ?> .spliter {
				margin: 0 15px;
				height: 1.4em;
				width: 2px;
				background: #333;
			}
			.<?php $this->eid(); ?> a {
				<?php $this->css_attr_color('link_color'); ?>
			}
			.<?php $this->eid(); ?> a:hover {
				<?php $this->css_attr_color('link_color_hover'); ?>
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

					<?php if ($this->has_content('back_link')) { ?>
						<a href="javascript:;"><i class="fas fa-arrow-left"></i></a>
						<span class="spliter"></span>
					<?php } ?>
					<a href="/">Home</a>
					<?php if (count($this->content['items']) > 0) { ?>
						<?php foreach ($this->content['items'] as $key => $value) { ?>
							<?php if ($key < count($this->content['items']) - 1) { ?>
								<span class="gt">&gt;</span>
								<a href="<?php echo esc_attr($value['link']); ?>"><?php echo esc_html_e($value['text']); ?></a>
							<?php } else { ?>
								<span class="gt">&gt;</span>
								<span><?php echo esc_html_e($value['text']); ?></span>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
