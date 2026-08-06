<?php

/*
<?php mtf_section('V1_Clients_003', 'clients_003', [
	'text_width' => '780px',
	'item_name_color' => '#333',
	'item_desc_color' => '#333',
	'item_text_width' => '1020px',
	'img_radius' => '0px',
	'img_color_active' => '#003a78',
	'arrow_color_hover' => '#00a978',
	'button_color' => '#fff',
	'button_bgcolor' => '#00a978',
	'button_bgcolor_hover' => '#02bd8c',
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
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'imgs' => [
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
	],
	'items' => [
		[ 'name' => '', 'title' => '', 'desc' => '' ],
		[ 'name' => '', 'title' => '', 'desc' => '' ],
	],
]); ?>
*/

class V1_Clients_003  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('text_width', '780px');
		$this->set_default_style('item_name_color', '#333');
		$this->set_default_style('item_desc_color', '#333');
		$this->set_default_style('item_text_width', '1020px');
		$this->set_default_style('img_radius', '0px');
		$this->set_default_style('img_color_active', '#003a78');
		$this->set_default_style('arrow_color_hover', '#00a978');
		$this->set_default_style('button_color', '#fff');
		$this->set_default_style('button_bgcolor', '#00a978');
		$this->set_default_style('button_bgcolor_hover', '#02bd8c');

		$this->set_default_content('button_text_1', 'CTA Button 1');
		$this->set_default_content('button_link_1', '#1');
		$this->set_default_content('button_text_2', 'CTA Button 2');
		$this->set_default_content('button_link_2', '#2');

		if (!isset($this->content['imgs'])) {
			$this->content['imgs'] = [ [], [], [], [], [], [] ];
		}
		if (count($this->content['imgs']) > 0) {
			foreach ($this->content['imgs'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['imgs'][$key]['src'] = 'https://via.placeholder.com/187x103/03a57b/f1f1f1?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['imgs'][$key]['alt'] = 'Image Alt';
				}
			}
		}

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['name'])) {
					$this->content['items'][$key]['name'] = 'Name';
				}
				if (!isset($value['title'])) {
					$this->content['items'][$key]['title'] = 'Title';
				}
				if (!isset($value['desc'])) {
					$this->content['items'][$key]['desc'] = 'Description';
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
				color: <?php $this->est('desc_color'); ?>;
				text-align: center;
			}
			.<?php $this->eid(); ?>.mml-section {
				<!-- 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 -->
			}
			.<?php $this->eid(); ?> > .container {
				width: 1080px;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('title_color'); ?>;
			}
			.<?php $this->eid(); ?> > .container > p {
				margin: 10px auto;
				max-width: <?php $this->est('text_width'); ?>;
			}
			.<?php $this->eid(); ?> .slicker-arrow {
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover{
				color: <?php $this->est('arrow_color_hover'); ?>;
			}
			.<?php $this->eid(); ?> .slicker-images {
				margin: 40px 20px;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .slicker-images img {
				border-radius: <?php $this->est('img_radius'); ?>;
			}
			.<?php $this->eid(); ?> .slicker-images .slick-list {
				margin: 0 -40px;
			}
			.<?php $this->eid(); ?> .slicker-images .slick-slide {
				position: relative;
				margin: 0 10px;
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .slicker-images .slick-slide:after {
				content: '\20';
				position: absolute;
				bottom: 0; left: 0; right: 0;
				height: 4px;
				background: transparent;
				transition: background .24s;
			}
			.<?php $this->eid(); ?> .slicker-images .slick-current:after {
				background-color: <?php $this->est('img_color_active'); ?>;
			}
			.<?php $this->eid(); ?> .slicker-quotes{
				margin: 0 auto;
				max-width: <?php $this->est('item_text_width'); ?>;
				color: <?php $this->est('item_desc_color'); ?>;
			}
			.<?php $this->eid(); ?> .til{
				font-weight: 700;
				color: <?php $this->est('item_name_color'); ?>;
			}
			.<?php $this->eid(); ?> .btns{
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				background: <?php $this->est('button_bgcolor'); ?>;
				color: <?php $this->est('button_color'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				color: <?php $this->est('button_bgcolor'); ?>;
				border-color: <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: <?php $this->est('button_bgcolor_hover'); ?>;
				color: <?php $this->est('button_color'); ?>;
				border-color: transparent;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker-images').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			slidesToShow: 5,
			focusOnSelect: true,
			centerMode: true,
			asNavFor: '.<?php $this->eid(); ?> .slicker-quotes',
			responsive: [{
				breakpoint: 860,
				settings: { slidesToShow: 4 }
			}, {
				breakpoint: 630,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 480,
				settings: { slidesToShow: 2 }
			}]
		});

		$('.<?php $this->eid(); ?> .slicker-quotes').slick({
			arrows: false,
			asNavFor: '.<?php $this->eid(); ?> .slicker-images'
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
					<?php if (count($this->content['imgs']) > 0) { ?>
						<div class="slicker-images">
							<?php foreach ($this->content['imgs'] as $key => $value) { ?>
								<div class="slick-item"><?php $this->display_tag_img($value['src'], $value['alt']); ?></div>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="slicker-quotes">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<p><?php _e($value['desc']); ?></p>
									<div class="til"><?php _e($value['name']); ?>, <?php _e($value['title']); ?></div>
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
