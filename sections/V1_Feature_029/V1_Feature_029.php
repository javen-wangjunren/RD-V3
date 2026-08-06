<?php

/*
<?php mtf_section('Feature_028', 'p01-s01-feature-028', [
	'class' => '',
	'color' => '#000',
	'dot_bgcolor' => '#c7c7c7',
	'dot_bgcolor_active' => '#00a978',
	'link_color' => '#00a978',
	'link_color_hover' => '#02bd8c',
], [
	'title' => 'Title',
	'desc' => 'description',
	'items' => [
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
		[ 'src' => '', 'alt' => '', 'heading' => '', 'text' => '', 'link' => '', 'more' => 'Learn More', ],
	]
]); ?>
*/

class V1_Feature_029  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_heading_color', '#333');
		$this->set_default_style('item_text_color', '#666');
		$this->set_default_style('dot_bgcolor', '#c7c7c7');
		$this->set_default_style('dot_bgcolor_active', '#00a978');
		$this->set_default_style('arrow_color', '');
		$this->set_default_style('arrow_color_hover', '#096');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#096');
		$this->set_default_style('btn_bgcolor_hover', '#3c9');

		$this->set_default_content('button_text_1', 'CTA Button 1');
		$this->set_default_content('button_link_1', '#1');
		$this->set_default_content('button_text_2', 'CTA Button 2');
		$this->set_default_content('button_link_2', '#2');

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
					$this->content['items'][$key]['link'] = '/';
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
				margin-top: 30px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
				padding: 10px;
				<?php $this->css_attr_color('item_text_color'); ?>
			}
			.<?php $this->eid(); ?> h4 {
				margin: 15px 0 0;
				<?php $this->css_attr_color('item_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .slicker-arrow {
				<?php $this->css_attr_color('arrow_color'); ?>
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover {
				<?php $this->css_attr_color('arrow_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				<?php $this->css_attr('background-color', 'btn_bgcolor'); ?>
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
		<?php
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			slidesToShow: 4,
			slidesToScroll: 4,
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
			</div>
		<?php
	}
}
