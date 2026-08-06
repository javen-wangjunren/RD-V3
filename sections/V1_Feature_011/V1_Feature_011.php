<?php

/*
<?php mtf_section('V1_Feature_011', 'feature_011', [
	'item_color' => '#333',
	'item_img_radius' => '0px',
	'button_color' => '#fff',
	'button_bgcolor' => '#00a978',
	'button_bgcolor_hover' => '#02bd8c',
	'slider_dot_color_active' => '#00a978',
	'slider_img_radius' => '0px',
	'reverse' => '', // 如果需要变左图右文，请赋值 mml-reverse
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
	'image' => 'https://via.placeholder.com/480x354/00a978/f1f1f1?text=Image', // 如果需要显示 图片和视频，请把 images 设为空数组。
	'alt' => 'alt',
	'video' => '#',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => '', 'alt' => '', 'text' => '' ],
		[ 'src' => '', 'alt' => '', 'text' => '' ],
		[ 'src' => '', 'alt' => '', 'text' => '' ],
		[ 'src' => '', 'alt' => '', 'text' => '' ],
	],
	'images' => [
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
	],
]); ?>
*/

class V1_Feature_011  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_color', '#333');
		$this->set_default_style('item_img_radius', '0px');
		$this->set_default_style('button_color', '#fff');
		$this->set_default_style('button_bgcolor', '#00a978');
		$this->set_default_style('button_bgcolor_hover', '#02bd8c');
		$this->set_default_style('slider_dot_color_active', '#00a978');
		$this->set_default_style('slider_img_radius', '0px');
		$this->set_default_style('reverse', '');

		$this->set_default_content('button_text_1', 'CTA Button 1');
		$this->set_default_content('button_link_1', '#1');
		$this->set_default_content('button_text_2', 'CTA Button 2');
		$this->set_default_content('button_link_2', '#2');
		$this->set_default_content('image', 'https://via.placeholder.com/480x354/00a978/f1f1f1?text=Image');
		$this->set_default_content('alt', 'alt');
		$this->set_default_content('video', '#');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['html'])) {
					// $this->content['items'][$key]['html'] = '<i class="fas fa-globe"></i>';
					$this->content['items'][$key]['html'] = '';
				}
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/20x20/00a978/fafafa?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Heading';
				}
			}
		}

		if (!isset($this->content['images'])) {
			$this->content['images'] = [ [], [], [] ];
		}
		if (count($this->content['images']) > 0) {
			foreach ($this->content['images'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['images'][$key]['src'] = 'https://via.placeholder.com/480x354/009a78/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['images'][$key]['alt'] = 'Image Alt ';
				}
			}
		}

	}

	public function style () {
		?>
			.<?php $this->eid(); ?> > {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> > .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> .pre-heading {
				font-size: 24px;
				<?php $this->css_attr_color('subtitle_color'); ?>
			}
			.<?php $this->eid(); ?> .h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-text {
				margin-right: 20px;
				flex: 1 1 0;
				max-width: 650px;
			}
			.<?php $this->eid(); ?> .mml-text > p {
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .mml-text > ul {
				display: flex;
				flex-wrap: wrap;
				margin: 0 -10px;
			}
			.<?php $this->eid(); ?> .mml-text li {
				display: flex;
				align-items: center;
				margin: 10px;
				<?php $this->css_attr_color('item_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-text img,
			.<?php $this->eid(); ?> .mml-text i {
				margin: 0 10px 0 0;
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .btn{
				background: <?php $this->est('button_bgcolor'); ?>;
				color: <?php $this->est('button_color'); ?>;
				border: 2px solid <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background: transparent;
				color: <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover{
				background: <?php $this->est('button_bgcolor_hover'); ?>;
				border-color: transparent;
				color: <?php $this->est('button_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker img {
				<?php $this->css_attr('border-radius', 'slider_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .slicker{
				width: 480px;
				max-width: 100%;
			}
			.<?php $this->eid(); ?> .slick-dots {
				margin-top: 10px;
				display: flex;
			}
			.<?php $this->eid(); ?> .slick-dots > .slick-active button{
				<?php $this->css_attr('background-color', 'slider_dot_color_active'); ?>
				width: 30px;
			}
			.<?php $this->eid(); ?> .slick-dots button {
				color: transparent;
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
				.<?php $this->eid(); ?> .mml-text{
					margin: 0 auto 40px;
					max-width: 100%;
				}
				.<?php $this->eid(); ?> .slicker{
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .mml-video{
					margin: 0 auto;
				}
			}
		<?php
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			dots: true,
			arrows: false
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
							<h2 class="h2"><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p><?php $this->eco('desc'); ?></p>
						<?php } ?>
						<?php if (count($this->content['items']) > 0) { ?>
							<ul>
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<li>
										<?php $this->display_tag_img($value['src'], $value['alt']); ?>
										<span><?php echo $value['text']; ?></span>
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
