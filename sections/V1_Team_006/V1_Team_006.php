<?php

/*
<?php mtf_section('V1_Team_006', 'team-006', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#000',
	'reverse'			=> '',	//mml-reverse
	'title_color'		=> '#000',
	'dot_color'			=> '#03a57b'
], [
	'title'	=> 'title',
	'desc'	=> '<p>desc:</p><ul><li>desc</li><li>desc</li></ul>',
	'items'	=> [
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
			'name'	=> 'Name'
		],
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
			'name'	=> 'Name'
		],
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
			'name'	=> 'Name'
		],
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
			'name'	=> 'Name'
		]
	]
]); ?>
*/

class V1_Team_006  extends MML_Section_Base {
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
			'desc_color'		=> '#000',
			'reverse'			=> '',	//mml-reverse
			'title_color'		=> '#000',
			'dot_color'			=> '#03a57b'
		]);

		$this->init_content([
			'title'	=> 'title',
			'desc'	=> '<p>desc:</p><ul><li>desc</li><li>desc</li></ul>',
			'items'	=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
					'name'	=> 'Name'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
					'name'	=> 'Name'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
					'name'	=> 'Name'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=Image', 'alt' => ''],
					'name'	=> 'Name'
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
			}
			.<?php $this->eid(); ?> .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .container {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 420px;
				<?php if ($this->gst('reverse') == 'mml-reverse') { ?>
					margin: 0 0 0 20px;
				<?php } else { ?>
					margin: 0 20px 0 0;
				<?php }?>
			}
			.<?php $this->eid(); ?> .mml-text ul > li {
				margin: 10px 0;
				display: flex;
				align-items: flex-start;
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-text ul > li:before{
				content: '\20';
				flex-shrink: 0;
				margin: .6em 10px 0 0;
				width: 6px; height: 6px;
				border-radius: 6px;
				background: <?php $this->est('dot_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				box-sizing: border-box;
				width: 70%;
				max-width: 700px;
				padding: 0 20px;
				text-align: center;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slicker-arrow {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover{
				color: <?php $this->est('dot_color'); ?>;
				cursor: pointer;
			}
			.<?php $this->eid(); ?> h4 {
				margin-top: 10px;
				<?php $this->css_attr_color('title_color'); ?>
			}
			@media (max-width: 1080px) {
				.<?php $this->eid(); ?> .container {
					display: block;
				}
				.<?php $this->eid(); ?> .container .mml-text {
					margin: 0;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .slicker {
					margin: 30px auto 0;
					width: 100%;
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
			slidesToShow: 3,
			autoplay: true,
			responsive: [{
				breakpoint: 500,
				settings: { slidesToShow: 2 }
			}]
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

						<?php if ($this->has_content('title')) { ?>
							<h2><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<?php $this->eco('desc'); ?>
						<?php } ?>
						
					</div>

					<?php if ($this->gco('items')) { ?>
						<ul class="slicker">
							<?php foreach ($this->gco('items') as $item) { ?>
								<li>
									<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
									<h4><?php _e($item['name']); ?></h4>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
					
				</div>
			</div>
		<?php
	}
}
