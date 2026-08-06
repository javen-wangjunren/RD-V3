<?php

/*
<?php mtf_section('V1_Video_001', 'video_001', [
	'heading_color' => '#333',
	'text_color' => '#666',
	'columns' => '3', // 列数
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
		[ 'src' => '', 'alt' => '', 'video_url' => '', 'heading' => '', 'text' => '', ],
		[ 'src' => '', 'alt' => '', 'video_url' => '', 'heading' => '', 'text' => '', ],
	],
]); ?>
*/

class V1_Video_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('heading_color', '#333');
		$this->set_default_style('text_color', '#666');
		$this->set_default_style('column_class', '');
		$this->set_style_columns(3); // 默认 3 列。

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/1180x640/096/693?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'alt';
				}
				if (!isset($value['video_url'])) {
					$this->content['items'][$key]['video_url'] = '';
				}
				if (!isset($value['heading'])) {
					$this->content['items'][$key]['heading'] = 'Heading';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Text';
				}
			}
		}

		if (count($this->content['items']) < 2) {
			$this->style['column_class'] = 'cols-1';
		} else if (count($this->content['items']) === 2) {
			$this->style['column_class'] = 'cols-2';
		} else if (count($this->content['items']) > 2) {
			$this->style['column_class'] = 'cols-3';
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
				<?php $this->css_attr_color('heading_color'); ?>
			}
			.<?php $this->eid(); ?> .w960 {
				max-width: 960px;
				margin: 10px auto;
			}
			.<?php $this->eid(); ?> .list {
				margin: 30px -10px 0;
			}
			.<?php $this->eid(); ?> .list > li {
				<?php $this->css_attr_color('text_color'); ?>
			}
			.<?php $this->eid(); ?> .cols-1 > li { width: 100%; }
			.<?php $this->eid(); ?> .cols-2 > li { width: calc(50% - 20px); }
			.<?php $this->eid(); ?> .cols-3 > li { width: calc(33.3333% - 20px); }
			.<?php $this->eid(); ?> .mml-video{
				position: relative;
				margin-bottom: 20px;
			}
			.<?php $this->eid(); ?> .vp-a {
				position: absolute;
				left: 0; right: 0; bottom: 0; top: 0;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				font-size: 60px;
				color: #fff;
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
						<p class="w960"><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if (count($this->content['items']) > 0) { ?>
						<?php // Video 001、002、003 用列数来区分：(cols-1、cols-2、cols-3) ?>
						<ul class="list <?php $this->echo_columns_class(); ?>">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<div class="mml-video">
										<?php $this->display_tag_img($value['src'], $value['alt']); ?>
										<?php if ($value['video_url']) { ?>
											<a href="<?php echo $value['video_url']; ?>" class="vp-a"><i class="far fa-play-circle"></i></a>
										<?php } ?>
									</div>
									<h3><?php _e($value['heading']); ?></h3>
									<p><?php _e($value['text']); ?></p>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
