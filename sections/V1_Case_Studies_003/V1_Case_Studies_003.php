<?php

/*
<?php mtf_section('V1_Case_Studies_003', 'v1_case_studies_003', [
	'item_heading_color' => '#333',
	'item_heading_color_hover' => '#333',
	'item_arrow_color' => '#096',
	'item_arrow_border' => '2px solid #03a67b',
	'item_arrow_background' => '',
	'item_arrow_color_hover' => '#fff',
	'item_arrow_border_hover' => '',
	'item_arrow_background_hover' => '#03a67b',
	'class' => '',
	'bg_color' => '',
	'bg_image' => '',
	'background_attachment' => '', // 如果需要视差效果，请赋值 fixed
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'subtitle_color' => '#666',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
			'heading' => 'Project Name',
			'link' => '#',
		],
	],
]); ?>
*/

class V1_Case_Studies_003  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'item_heading_color' => '#333',
			'item_heading_color_hover' => '#333',
			// 'item_image_radius' => '10px',
			'item_arrow_color' => '#096',
			'item_arrow_border' => '2px solid #03a67b',
			'item_arrow_background' => '',
			'item_arrow_color_hover' => '#fff',
			'item_arrow_border_hover' => '',
			'item_arrow_background_hover' => '#03a67b',
		]);
		$this->init_content([
			'items' => [
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
					'heading' => 'Project Name',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
					'heading' => 'Project Name 2',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
					'heading' => 'Project Name 3',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
					'heading' => 'Project Name 4',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
					'heading' => 'Project Name 5',
					'link' => '#',
				],
			],
		]);
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
			.<?php $this->eid(); ?> .pre-heading {
				<?php $this->css_attr_color('subtitle_color'); ?>
				font-size: 20px;
			}
			.<?php $this->eid(); ?> h2 {
				padding-right: 120px;
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .slick-arrow {
				top: auto;
				bottom: 100%;
				transform: translate(0, -40px);
				width: 42px; line-height: 42px;
				text-align: center;
				cursor: pointer;
				<?php $this->css_attr('border', 'item_arrow_border'); ?>
				border-radius: 4px;
				<?php $this->css_attr_color('item_arrow_color'); ?>
				<?php $this->css_attr('background', 'item_arrow_background'); ?>
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto;
				right: 72px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: 10px;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: #03a67b;
				<?php $this->css_attr('background', 'item_arrow_background_hover'); ?>
				<?php $this->css_attr_color('item_arrow_color_hover'); ?>
				<?php $this->css_attr('border', 'item_arrow_border_hover'); ?>
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 30px -10px 0;
				text-align: center;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-slide a {
				<?php $this->css_attr_color('item_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .slick-slide a:hover {
				<?php $this->css_attr_color('item_heading_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .slick-slide a:hover img {
				filter: brightness(.5);
			}
			.<?php $this->eid(); ?> h4 {
				margin: 20px 0 0;
			}
			@media (max-width: 480px) {
				.<?php $this->eid(); ?> h2 {
					padding: 0 0 60px;
				}
				.<?php $this->eid(); ?> .slick-arrow {
					transform: translate(0, -20px);
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
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			slidesToShow: 4,
			responsive: [{
				breakpoint: 900,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 620,
				settings: { slidesToShow: 2 }
			}, {
				breakpoint: 420,
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
					<?php if ($this->has_content('subtitle')) { ?>
						<b class="pre-heading"><?php $this->eco('subtitle'); ?></b>
					<?php } ?>
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<a href="<?php echo $value['link']; ?>">
										<div class="mml-image">
											<?php $this->display_tag_img($value['image']['src'], $value['image']['alt']); ?>
										</div>
										<h4><?php _e($value['heading']); ?></h4>
									</a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
