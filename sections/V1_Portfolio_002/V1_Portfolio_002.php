<?php

/*
<?php mtf_section('V1_Portfolio_002', 'portfolio-002', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
], [
	'title' => 'title',
	'desc' 	=> 'desc',
	'items' => [
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
			'title' => 'item title',
			'desc'	=> 'item desc',
			'link'	=> 'javascript:;'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
			'title' => 'item title',
			'desc'	=> 'item desc',
			'link'	=> 'javascript:;'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
			'title' => 'item title',
			'desc'	=> 'item desc',
			'link'	=> 'javascript:;'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
			'title' => 'item title',
			'desc'	=> 'item desc',
			'link'	=> 'javascript:;'
		]
	]
]); ?>
*/

class V1_Portfolio_002  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'class'				=> '',
			'bg_color' 			=> '',
			'bg_image' 			=> '',
			'margin_top' 		=> '',
			'padding_top' 		=> '',
			'padding_bottom' 	=> '',
			'margin_bottom' 	=> '',
			'custom_css' 		=> '',
			'desc_color'		=> '#808080',
			'title_color'		=> '#000',
			'arrow_color'		=> '#000',
			'arrow_color:hover'	=> '#03a57b'
		]);

		$this->init_content([
			'title' => 'title',
			'desc' 	=> 'desc',
			'items' => [
				[
					'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
					'title' => 'item title',
					'desc'	=> 'item desc',
					'link'	=> 'javascript:;'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
					'title' => 'item title',
					'desc'	=> 'item desc',
					'link'	=> 'javascript:;'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
					'title' => 'item title',
					'desc'	=> 'item desc',
					'link'	=> 'javascript:;'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=Image', 'alt' => ''],
					'title' => 'item title',
					'desc'	=> 'item desc',
					'link'	=> 'javascript:;'
				]
			]
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .slicker {
				margin-top: 30px;
				padding: 0 20px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				<?php $this->css_attr_color('arrow_color'); ?>
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				<?php $this->css_attr_color('arrow_color:hover'); ?>
			}
			.<?php $this->eid(); ?> h4 {
				margin: 20px 0 0;
				<?php $this->css_attr_color('title_color'); ?>
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
				breakpoint: 720,
				settings: { slidesToShow: 2 }
			}, {
				breakpoint: 400,
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
					<?php if ($this->has_content('desc')) { ?>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if ($this->has_content('items')) { ?>
						<ul class="slicker">
							<?php foreach ($this->gco('items') as $item) { ?>
								<li>
									<a href="<?php esc_attr_e($item['link']); ?>">
										<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
										<h4><?php _e($item['title']); ?></h4>
										<p><?php _e($item['desc']); ?></p>
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
