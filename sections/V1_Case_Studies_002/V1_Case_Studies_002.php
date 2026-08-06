<?php

/*
<?php mtf_section('V1_Case_Studies_002', 'v1_case_studies_002', [
	'item_bgcolor' => '#096',
	'item_heading_color' => '#fff',
	'item_heading_color_hover' => '#eee',
	'item_text_color' => '#fff',
	'item_arrow_color' => '#fff',
	'item_arrow_color_hover' => '#ccc',
	'item_image_radius' => '0px',
	'button_color' => '#fff',
	'button_bgcolor' => '#096',
	'button_color_hover' => '#ccc',
	'button_bgcolor_hover' => '#3c9',
	'class' => '',
	'bg_color' => '',
	'bg_image' => '',
	'background_attachment' => '', // 如果需要视差效果，请赋值 fixed
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'title' => 'Title',
	'desc' => 'This is the description.',
	'button' => [ 'text' => 'Button', 'link' => '#', ],
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/580x271/', 'alt' => 'image' ],
			'heading' => 'Heading',
			'content' => 'Content',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/580x271/', 'alt' => 'image' ],
			'heading' => 'Heading 1',
			'content' => 'Content 1',
			'link' => '#',
		],
	],
]); ?>
*/

class V1_Case_Studies_002  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'item_bgcolor' => '#096',
			'item_heading_color' => '#fff',
			'item_heading_color_hover' => '#eee',
			'item_text_color' => '#fff',
			'item_arrow_color' => '#fff',
			'item_arrow_color_hover' => '#ccc',
			'item_image_radius' => '0px',
			'button_color' => '#fff',
			'button_bgcolor' => '#096',
			// 'button_bordercolor' => '',
			'button_color_hover' => '#ccc',
			'button_bgcolor_hover' => '#3c9',
			// 'button_bordercolor_hover' => '',
		]);
		$this->init_content([
			'button' => [ 'text' => 'Button', 'link' => '#', ],
			'items' => [
				[
					'image' => [ 'src' => 'https://via.placeholder.com/580x271/', 'alt' => 'image' ],
					'heading' => 'Heading',
					'content' => 'Content',
					'link' => '#',
				],
				[
					'image' => [ 'src' => 'https://via.placeholder.com/580x271/', 'alt' => 'image' ],
					'heading' => 'Heading 1',
					'content' => 'Content 1',
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
			.<?php $this->eid(); ?> .container {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .slicker {
				width: 60%;
				max-width: 680px;
			}
			.<?php $this->eid(); ?> .description{
				flex: 1 1 0;
				max-width: 380px;
				margin: 80px 0 0 20px;
			}
			.<?php $this->eid(); ?> .mml-image img {
				margin: 0 0 -60px;
				position: relative;
				z-index: 1;
				<?php $this->css_attr('border-radius', 'item_image_radius'); ?>
			}
			.<?php $this->eid(); ?> .mml-text {
				padding: 100px 20px 20px;
				<?php $this->css_attr('background', 'item_bgcolor'); ?>
				<?php $this->css_attr_color('item_text_color'); ?>
				text-align: center;
			}
			.<?php $this->eid(); ?> .mml-text h4 {
				<?php $this->css_attr_color('item_heading_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-text a:hover h4 {
				<?php $this->css_attr_color('item_heading_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .mml-text p {
				max-width: 468px;
				margin: 10px auto;
			}
			.<?php $this->eid(); ?> .slicker-arrow {
				padding: 0 10px;
				top: auto;
				bottom: 80px;
				<?php $this->css_attr_color('item_arrow_color'); ?>
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover{
				<?php $this->css_attr_color('item_arrow_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .description h4 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .btn {
				margin: 40px 0 0;
				<?php $this->css_attr('background', 'button_bgcolor'); ?>
				<?php $this->css_attr_color('button_color'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover {
				<?php $this->css_attr('background', 'button_bgcolor_hover'); ?>
				<?php $this->css_attr_color('button_color_hover'); ?>
				border-color: transparent;
			}
			@media (max-width: 860px) {
				.<?php $this->eid(); ?> .container {
					display: block;
				}
				.<?php $this->eid(); ?> .slicker {
					width: unset;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .container .description {
					margin: 30px auto 0;
					max-width: 680px;
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
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<div class="mml-image">
										<?php $this->display_tag_img($value['image']['src'], $value['image']['alt']); ?>
									</div>
									<div class="mml-text">
										<a href="<?php echo esc_attr($value['link']); ?>">
											<h4><?php _e($value['heading']); ?></h4>
										</a>
										<p><?php _e($value['content']); ?></p>
									</div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

					<div class="description">
						<?php if ($this->has_content('title')) { ?>
							<h4><?php $this->eco('title'); ?></h4>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<div><?php $this->eco('desc'); ?></div>
						<?php } ?>
						<?php if (!empty($this->content['button']) && !empty($this->content['button']['text'])) { ?>
							<a href="<?php echo $this->content['button']['link']; ?>" class="btn"><?php echo $this->content['button']['text']; ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php
	}
}
