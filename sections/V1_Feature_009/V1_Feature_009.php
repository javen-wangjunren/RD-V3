<?php

/*
<?php mtf_section('V1_Feature_009', 'feature_009', [
	'item_color' => '#333',
	'item_img_radius' => '0px',
	'slider_dot_color_active' => '#00a978',
	'slider_img_radius' => '0px',
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
	'reverse' => '', // 如果需要变左图右文，请赋值 mml-reverse
], [
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'image' => '', // 如果要展示 图片和视频，就把 images 设为空数组。
	'alt' => '',
	'video' => '',
	'items' => [
		[ 'html' => '<i class="fas fa-globe"></i>', 'src' => 'https://via.placeholder.com/20x20/aaa/fff?text=Image', 'alt' => '', 'text' => '' ], // 有 html 则显示 html ，无 html 则显示 src 和 alt
		[ 'html' => '', 'src' => '', 'alt' => '', 'text' => '' ],
	],
	'images' => [
		[ 'src' => '', '' => 'alt' ]
	],
]); ?>
*/

class V1_Feature_009 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_color', '#333');
		$this->set_default_style('item_img_radius', '0px');
		$this->set_default_style('slider_dot_color_active', '#00a978');
		$this->set_default_style('slider_img_radius', '0px');
		$this->set_default_style('reverse', '');

		$this->set_default_content('image', 'https://via.placeholder.com/480x354/00a978/f1f1f1?text=Image');
		$this->set_default_content('alt', 'alt');
		$this->set_default_content('video', '#');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['html'])) {
					// $this->content['items'][$key]['html'] = '<i class="fas fa-globe"></i>';
					$this->content['items'][$key]['html'] = '';
				}
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/20x20/aaa/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Item Text';
				}
			}
		}

		if (!isset($this->content['images'])) {
			$this->content['images'] = [ [], [], [] ];
		}
		if (count($this->content['images']) > 0) {
			foreach ($this->content['images'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['images'][$key]['src'] = 'https://via.placeholder.com/480x354/ccc/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['images'][$key]['alt'] = 'Image Alt';
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
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .pre-heading {
				<?php $this->css_attr_color('subtitle_color'); ?>
				font-weight: 700;
				font-size: 20px;
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> > .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin: 0 20px 0 0;
				max-width: 660px;
				width: 60%;
			}
			.<?php $this->eid(); ?> .list {
				margin: 30px 0 0;
				<?php $this->css_attr_color('item_color'); ?>
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px 0;
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .list img {
				margin: 0 10px 0 0;
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .slicker {
				flex: 1 1 0;
				max-width: 480px;
			}
			.<?php $this->eid(); ?> .slicker img {
				<?php $this->css_attr('border-radius', 'slider_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .slick-dots .slick-active button{
				<?php $this->css_attr('background-color', 'slider_dot_color_active'); ?>
			}
			.<?php $this->eid(); ?> .mml-video{
				position: relative;
				width: 480px;
				max-width: 100%;
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
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> >.container .mml-text {
					margin: 0;
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .slicker {
					margin: 40px auto 0;
				}
				.<?php $this->eid(); ?> .mml-video{
					margin: 0 auto;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			arrows: false,
			dots: true
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container <?php $this->est('reverse'); ?>">
					<div class="mml-text">
						<?php if ($this->has_content('subtitle')) { ?>
							<b class="pre-heading"><?php $this->eco('subtitle'); ?></b>
						<?php } ?>
						<?php if ($this->has_content('title')) { ?>
							<h2><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p><?php $this->eco('desc'); ?></p>
						<?php } ?>
						<?php if (count($this->content['items']) > 0) { ?>
							<ul class="list">
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<li>
										<?php if (isset($value['html']) && $value['html']) { ?>
											<?php _e($value['html']); ?>
										<?php } else { ?>
											<?php $this->display_tag_img($value['src'], $value['alt']); ?>
										<?php } ?>
										<span><?php _e($value['text']); ?></span>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
					<?php if (count($this->content['images']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['images'] as $key => $value) { ?>
								<li><?php $this->display_tag_img($value['src'], $value['alt']); ?></li>
							<?php } ?>
						</ul>
					<?php } else if ($this->has_content('image')) { ?>
						<div class="mml-video">
							<?php $this->display_tag_img($this->content['image'], $this->content['alt']); ?>
							<?php if ($this->has_content('video')) { ?>
								<a href="<?php $this->eco('video'); ?>" class="vp-a"><i class="far fa-play-circle"></i></a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
