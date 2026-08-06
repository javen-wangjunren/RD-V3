<?php

/*
<?php mtf_section('V1_Case_Studies_001', 'v1_case_studies_001', [
	'item_arrow_color' => '#396',
	'item_arrow_color_hover' => '#369',
	'item_heading_color' => '#333',
	'item_heading_color_hover' => '#666',
	'item_content_color' => '#666',
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
	'custom_css' => '',
], [
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 1 - Location',
			'content' => 'something here',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 2 - Location',
			'content' => 'something here',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 3 - Location',
			'content' => 'something here',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 4 - Location',
			'content' => 'something here',
			'link' => '#',
		],
	],
]); ?>
*/

class V1_Case_Studies_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'item_arrow_color' => '#396',
			'item_arrow_color_hover' => '#369',
			'item_heading_color' => '#333',
			'item_heading_color_hover' => '#666',
			'item_content_color' => '#666',
		]);
		$this->init_content([
			'items' => [
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
					'heading' => 'Case 1 - Location',
					'content' => 'something here',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
					'heading' => 'Case 2 - Location',
					'content' => 'something here',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
					'heading' => 'Case 3 - Location',
					'content' => 'something here',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
					'heading' => 'Case 4 - Location',
					'content' => 'something here',
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> h4 {
				margin: 20px 0;
			}
			.<?php $this->eid(); ?> .slicker {
				margin-top: 40px;
				padding: 0 20px;
				text-align: left;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slicker-arrow {
				<?php $this->css_attr_color('item_arrow_color'); ?>
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover{
				<?php $this->css_attr_color('item_arrow_color_hover'); ?>
				cursor: pointer;
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
			.<?php $this->eid(); ?> .content {
				margin: 10px 0;
				<?php $this->css_attr_color('item_content_color'); ?>
			}
			.<?php $this->eid(); ?> .list > li {
				display: flex;
				align-items: flex-start;
				margin: 10px 0;
			}
			.<?php $this->eid(); ?> .list > li:before {
				content: '\20';
				flex-shrink: 0;
				margin: 10px 10px 0 0;
				width: 6px; height: 6px;
				border-radius: 6px;
				background: #03a67b;
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
			slidesToShow: 3,
			responsive: [{
				breakpoint: 840,
				settings: { slidesToShow: 2 }
			}, {
				breakpoint: 480,
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
					<?php if ($this->has_content('subtitle')) { ?>
						<p><?php $this->eco('subtitle'); ?></p>
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
									<div class="content">
										<?php _e($value['content']); ?>
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
