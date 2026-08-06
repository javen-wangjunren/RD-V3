<?php

/*
<?php mtf_section('V1_Feature_030', 'feature_030', [
	'item_heading_color' => '#333',
	'item_text_color' => '#666',
	'dot_color' => '#00a978',
	'dot_color_active' => '#c7c7c7',
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
	'title' => 'Title here',
	'desc' => 'Description here',
	'images' => [
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
	],
	'items' => [
		[ 'src' => '', 'alt' => '', 'heading' => '', 'content' => '' ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'content' => '' ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'content' => '' ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'content' => '' ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'content' => '' ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'content' => '' ],
	]
]); ?>
*/

class V1_Feature_030 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_heading_color', '#333');
		$this->set_default_style('item_text_color', '#666');
		$this->set_default_style('dot_color', '#00a978');
		$this->set_default_style('dot_color_active', '#c7c7c7');

		if (!isset($this->content['images'])) {
			$this->content['images'] = [ [], [], [] ];
		}
		if (count($this->content['images']) > 0) {
			foreach ($this->content['images'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['images'][$key]['src'] = 'https://via.placeholder.com/400x295/096/fff?text=Image' . $key;
				}
				if (!isset($value['alt'])) {
					$this->content['images'][$key]['alt'] = 'Image Alt ' . $key;
				}
			}
		}

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/63x63/096/fff?text=Image' . $key;
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['heading'])) {
					$this->content['items'][$key]['heading'] = 'Heading ' . $key;
				}
				if (!isset($value['content'])) {
					$this->content['items'][$key]['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing ' . $key;
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
		.<?php $this->eid(); ?> .mml-box{
			margin-top: 40px;
			display: flex;
			justify-content: space-between;
		}
		.<?php $this->eid(); ?> .slicker{
			margin-right: 40px;
			width: 400px;
			max-width: 100%;
		}
		.<?php $this->eid(); ?> .list {
			flex: 1 1 0;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: flex-start;
			text-align: left;
			<?php $this->css_attr_color('item_text_color'); ?>
		}
		.<?php $this->eid(); ?> h4 {
			<?php $this->css_attr_color('item_heading_color'); ?>
		}
		.<?php $this->eid(); ?> .list > li {
			display: flex;
			align-items: flex-start;
			box-sizing: border-box;
			margin-bottom: 20px;
			padding-left: 40px;
			width: 50%;
		}
		.<?php $this->eid(); ?> .list img {
			margin: 0 20px 0 0;
		}
		.<?php $this->eid(); ?> .list p {
			margin: 0;
		}
		.<?php $this->eid(); ?> .slick-dots {
			margin-top: 10px;
			display: flex;
		}
		.<?php $this->eid(); ?> .slick-dots > .slick-active button{
			background: <?php $this->est('dot_color'); ?>;
			width: 30px;
		}
		.<?php $this->eid(); ?> .slick-dots button {
			margin: 5px;
			height: 8px; width: 8px;
			border-radius: 8px;
			background: <?php $this->est('dot_color_active'); ?>;
			color: transparent;
			transition: all .24s;
			outline: none;
		}
		@media (max-width: 1120px) {
			.<?php $this->eid(); ?> .mml-box {
				display: block;
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 0 auto 40px;
			}
		}
		@media (max-width: 767px) {
			.<?php $this->eid(); ?> .list > li {
				padding-left: 20px;
				width: 100%;
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
				<div class="container">
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if (count($this->content['images']) > 0 || count($this->content['items']) > 0) { ?>
						<div class="mml-box">
							<?php if (count($this->content['images']) > 0) { ?>
								<ul class="slicker">
									<?php foreach ($this->content['images'] as $key => $value) { ?>
										<li class="slick-item">
											<?php $this->display_tag_img($value['src'], $value['alt']); ?>
											<a href="video-src" class="vp-a"><i class="far fa-play-circle"></i></a>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
							<?php if (count($this->content['items']) > 0) { ?>
								<ul class="list">
									<?php foreach ($this->content['items'] as $key => $value) { ?>
										<li>
											<?php $this->display_tag_img($value['src'], $value['alt']); ?>
											<div class="mml-text">
												<h4><?php echo $value['heading']; ?></h4>
												<p><?php echo $value['content']; ?></p>
											</div>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
