<?php

/*
<?php mtf_section('V1_Feature_027', 'p01-s01-feature-027', [
	'item_heading_color' => '#369',
	'item_text_color' => '#693',
	'item_img_radius' => '5px',
	'item_link_color' => '#963',
	'item_link_color_hover' => '#c96',
	'dot_bgcolor' => '#c7c7c7',
	'dot_bgcolor_active' => '#00a978',
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
	'desc' => 'description',
	'items' => [
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ], // more 为空字符串时不展示
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
	]
]); ?>
*/

class V1_Feature_027 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_heading_color', '#333');
		$this->set_default_style('item_text_color', '#666');
		// $this->set_default_style('item_img_radius', '0px');
		$this->set_default_style('item_link_color', '#096');
		$this->set_default_style('item_link_color_hover', '#3c9');
		$this->set_default_style('dot_bgcolor', '#c7c7c7');
		$this->set_default_style('dot_bgcolor_active', '#00a978');

		$this->set_default_content('title', 'We Bring Impactful Digital Solutions');
		$this->set_default_content('desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/63x63/00a978/ddd?text=63x63';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
				}
				if (!isset($value['heading'])) {
					$this->content['items'][$key]['heading'] = 'Heading';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
				}
				if (!isset($value['link'])) {
					$this->content['items'][$key]['link'] = '#';
				}
				if (!isset($value['more'])) {
					$this->content['items'][$key]['more'] = 'Learn More';
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
			.<?php $this->eid(); ?> .slicker {
				margin-top: 40px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
				padding: 10px;
				<?php $this->css_attr_color('item_text_color'); ?>
			}
			.<?php $this->eid(); ?> .slick-dots {
				margin-top: 20px;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .slick-dots > .slick-active button{
				background: <?php $this->est('dot_bgcolor_active'); ?>;
			}
			.<?php $this->eid(); ?> .slick-dots button {
				background: <?php $this->est('dot_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> h4 {
				margin: 15px 0 10px;
				<?php $this->css_attr_color('item_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .learnmore{
				display: inline-block;
				margin-top: 10px;
				<?php $this->css_attr_color('item_link_color'); ?>
				outline: none;
			}
			.<?php $this->eid(); ?> .learnmore:hover{
				<?php $this->css_attr_color('item_link_color_hover'); ?>
			}
		<?php
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			dots: true,
			slidesToShow: 4,
			slidesToScroll: 4,
			arrows: false,
			responsive: [{
				breakpoint: 900,
				settings: { slidesToShow: 3, slidesToScroll: 3 }
			}, {
				breakpoint: 640,
				settings: { slidesToShow: 2, slidesToScroll: 2 }
			}, {
				breakpoint: 350,
				settings: { slidesToShow: 1, slidesToScroll: 1 }
			}]
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
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<?php $this->display_tag_img($value['src'], $value['alt']); ?>
									<h4><?php echo $value['heading']; ?></h4>
									<p><?php echo $value['text']; ?></p>
									<?php if (!empty($value['more'])) { ?>
										<a href="<?php echo $value['link']; ?>" class="learnmore"><?php echo $value['more']; ?></a>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
