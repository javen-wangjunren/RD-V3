<?php

/*
<?php mtf_section('V1_Breadcrumbs_001', 'breadcrumbs_001', [
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
	'items' => [
		[ 'text' => 'Page', 'link' => '#' ]
	],
]); ?>
*/

class V1_Breadcrumbs_001 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('link_color', '#333');
		$this->set_default_style('link_color_hover', '#000');

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
		.<?php echo $this->id; ?> {
			<?php $this->css_margin_top(); ?>
			<?php $this->css_padding_top(); ?>
			<?php $this->css_padding_bottom(); ?>
			<?php $this->css_margin_bottom(); ?>
			<?php $this->css_bg_color(); ?>
			<?php $this->css_bg_image(); ?>
			<?php $this->css_attr_color('desc_color'); ?>
			padding: 15px 10px;
		}
		.<?php echo $this->id; ?> > .container {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
		}
		.<?php echo $this->id; ?> .gt {
			margin: 0 5px;
		}
		.<?php echo $this->id; ?> a{
			color: <?php $this->est('link_color'); ?>;
		}
		.<?php echo $this->id; ?> a:hover{
			color: <?php $this->est('link_color_hover'); ?>;
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
