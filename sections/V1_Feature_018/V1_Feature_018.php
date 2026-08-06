<?php

/*
<?php mtf_section('V1_Feature_018', 'feature_018', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'columns' 			=> '4', // 列数
	'title_color'		=> '#333',
	'item_bgcolor'		=> '#fff',
	'item_img_radius'	=> '0px',
	'item_title_color'	=> '#333',
	'item_desc_color'	=> '#666',
	'item_btn_color'	=> '#fff',
	'item_btn_bgcolor'	=> '#009a78',
	'item_btn_bgcolor_hover' => '#0c9',
	'download_bgcolor'	=> 'rgba(0,0,0,.5)',
	'download_color'	=> '#fff',
	'arrow_bgcolor'		=> 'rgba(0,0,0,.2)',
	'arrow_color'		=> '#fff',
	'arrow_bgcolor:hover' => '#03a67b'
], [
	'slider' => [
		[
			'title' => 'We Bring Impactful Digital Solutions',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>',
			'items' => [
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				]
			]
		],
		[
			'title' => 'We Bring Impactful Digital Solutions',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>',
			'items' => [
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				]
			]
		]
	]
]); ?>
*/

class V1_Feature_018  extends MML_Section_Base {
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
			'columns' 			=> '4', // 列数
			'title_color'		=> '#333',
			'item_bgcolor'		=> '#fff',
			'item_img_radius'	=> '0px',
			'item_title_color'	=> '#333',
			'item_desc_color'	=> '#666',
			'item_btn_color'	=> '#fff',
			'item_btn_bgcolor'	=> '#009a78',
			'item_btn_bgcolor_hover' => '#0c9',
			'download_bgcolor'	=> 'rgba(0,0,0,.5)',
			'download_color'	=> '#fff',
			'arrow_bgcolor'		=> 'rgba(0,0,0,.2)',
			'arrow_color'		=> '#fff',
			'arrow_bgcolor:hover' => '#03a67b'
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
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> h4 {
				margin: 10px 0;
				<?php $this->css_attr_color('item_title_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-text {
				max-width: 680px;
				padding-right: 140px;
			}
			.<?php $this->eid(); ?> .list {
				margin-top: 30px;
				<?php $this->css_attr_color('item_desc_color'); ?>
				text-align: center;
			}
			.<?php $this->eid(); ?> .list > li {
				<?php $this->css_attr('background', 'item_bgcolor'); ?>
			}
			.<?php $this->eid(); ?> .mml-image {
				position: relative;
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .download {
				position: absolute;
				bottom: 0;
				left: 0; right: 0;
				padding: 8px 0;
				background: <?php $this->est('download_bgcolor'); ?>;
				color: <?php $this->est('download_color'); ?>;
				transition: all .24s;
				transform: translate(0,100%);
			}
			.<?php $this->eid(); ?> .list a:hover .download {
				transform: none;
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 0 -10px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-arrow {
				top: 20px;
				width: 58px;
				line-height: 50px;
				background: <?php $this->est('arrow_bgcolor'); ?>;
				color: <?php $this->est('arrow_color'); ?>;
				border-radius: 5px;
				text-align: center;
				transform: translate(0, 0);
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: <?php $this->est('arrow_bgcolor:hover'); ?>;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto;
				right: 80px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: 10px;
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .slick-arrow {
					width: 40px;
					line-height: 40px;
					top: 50%;
					transform: translate(0, -50%);
				}
				.<?php $this->eid(); ?> .mml-text {
					padding-right: unset;
				}
				.<?php $this->eid(); ?> .arrow-prev {
					left: 10px; right: auto;
				}
				.<?php $this->eid(); ?> .arrow-next {
					right: 10px;
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
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>"
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">

					<ul class="slicker">

						<?php if ($this->has_content('slider')) { ?>
							<?php foreach ($this->gco('slider') as $slider) { ?>
								<li>
									<div class="mml-text">
										<?php if (!empty($slider['title'])) { ?>
											<h2><?php _e($slider['title']); ?></h2>
										<?php } ?>
										<?php if (!empty($slider['desc'])) { ?>
											<?php _e($slider['desc']); ?>
										<?php } ?>
									</div>
									<?php if (!empty($slider['items'])) { ?>
										<ul class="list <?php $this->echo_columns_class(); ?>">
											<?php foreach ($slider['items'] as $item) { ?>
												<li>
													<a href="<?php echo !empty($item['link']) ? $item['link'] : 'javascript:;'; ?>">
														<div class="mml-image">
															<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
															<div class="download"><i class="fas fa-download"></i></div>
														</div>
														<?php if (!empty($item['title'])) { ?>
															<h4><?php _e($item['title']); ?></h4>
														<?php } ?>
													</a>
													<?php if (!empty($item['desc'])) { ?>
														<?php _e($item['desc']); ?>
													<?php } ?>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
								</li>
							<?php } ?>
						<?php } ?>
						
					</ul>

				</div>
			</div>
		<?php
	}
}
