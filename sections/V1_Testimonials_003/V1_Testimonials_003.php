<?php

/*
<?php mtf_section('V1_Testimonials_003', 'testimonials_003', [
	'item_name_color' => '#333',
	'item_title_color' => '#999',
	'item_desc_color' => '#666',
	'arrow_color_hover' => '#00a978',
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
], [
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => '', 'alt' => '', 'name' => '', 'title' => '', 'desc' => '' ]
	]
]); ?>
*/

class V1_Testimonials_003  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_name_color', '#333');
		$this->set_default_style('item_title_color', '#999');
		$this->set_default_style('item_desc_color', '#666');
		$this->set_default_style('arrow_color_hover', '#00a978');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/80x80/00a978/ccc?text=Image%20' . $key;
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'pcs';
				}
				if (!isset($value['name'])) {
					$this->content['items'][$key]['name'] = 'Name ' . $key;
				}
				if (!isset($value['title'])) {
					$this->content['items'][$key]['title'] = 'CEO ' . $key;
				}
				if (!isset($value['desc'])) {
					$this->content['items'][$key]['desc'] = 'Description ' . $key;
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
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('title_color'); ?>;
				text-align: center;
			}
			.<?php $this->eid(); ?> .til {
				font-weight: 700;
				color: <?php $this->est('item_name_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				margin-top: 10px;
				padding: 0 22px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 20px 10px;
				padding: 20px;
				background: #fff;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover{
				color: <?php $this->est('arrow_color_hover'); ?>;
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .mml-box{
				display: flex;
				align-items: center;
				margin-top: 20px;
			}
			.<?php $this->eid(); ?> .mml-box img {
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> .mml-box .position {
				color: <?php $this->est('item_title_color'); ?>;
			}
			.<?php $this->eid(); ?> .item-desc {
				color: <?php $this->est('item_desc_color'); ?>;
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
			slidesToShow: 2,
			autoplay: true,
			responsive: [{
				breakpoint: 600,
				settings: { slidesToShow: 1 }
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
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<p class="item-desc"><?php echo $value['desc'] ?></p>
									<div class="mml-box">
										<?php $this->display_tag_img($value['src'], $value['alt']); ?>
										<div class="mml-text">
											<div class="til"><?php echo $value['name'] ?></div>
											<span class="position"><?php echo $value['title'] ?></span>
										</div>
									</div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
