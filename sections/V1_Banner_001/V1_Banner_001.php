<?php

/*
<?php mtf_section('V1_Banner_001', 'banner_001', [
	'slide_down_hover_color' => '#03a67b',
	'item_color' => '#333',
	'button1_color' => '#fff',
	'button1_backcolor' => '#037aff',
	'button1_bordercolor' => '#037aff',
	'button1_color_hover' => '#fff',
	'button1_backcolor_hover' => '#037aff',
	'button2_color' => '#037aff',
	'columns' => '2', // 列数
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
	'slide_down_display' => true
], [
	'button1_text' => 'CTA Button 1',
	'button1_link' => '#',
	'button2_text' => 'CTA Button 2',
	'button2_link' => '#',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items'	=> [
		[
			'icon' => '', // 有 icon 则输出 icon ，无 icon 则输出 image
			'image'	=> [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=Image', 'alt' => 'image' ],
			'title'	=> 'title'
		],
		[
			'icon' => '',
			'image'	=> [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=Image', 'alt' => 'image' ],
			'title'	=> 'title'
		],
	]
]); ?>
*/

class V1_Banner_001 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处
		$this->init_style([
			'slide_down_hover_color' => '#03a67b',
			'item_color' => '#333',
			'button1_color' => '#fff',
			'button1_backcolor' => '#037aff',
			'button1_bordercolor' => '#037aff',
			'button1_color_hover' => '#fff',
			'button1_backcolor_hover' => '#037aff',
			'button2_color' => '#037aff',
			'columns' => '2', // 列数
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
			'slide_down_display' => true
		]);

		$this->init_content([
			'button1_text' => 'CTA Button 1',
			'button1_link' => '#',
			'button2_text' => 'CTA Button 2',
			'button2_link' => '#',
			'title' => 'Title',
			'subtitle' => 'Sub Title',
			'desc' => 'This is the description.',
			'items'	=> [
				[
					'icon' => '', // 有 icon 则输出 icon ，无 icon 则输出 image
					'image'	=> [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=Image', 'alt' => 'image' ],
					'title'	=> 'title'
				],
				[
					'icon' => '',
					'image'	=> [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=Image', 'alt' => 'image' ],
					'title'	=> 'title'
				],
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
			position: relative;
			display: flex;
			flex-direction: column;
			justify-content: center;
			min-height: 700px;
		}
		.<?php $this->eid(); ?> h1 {
			<?php $this->css_attr_color('title_color'); ?>
		}
		.<?php $this->eid(); ?> .pre-heading{
			<?php $this->css_attr_color('subtitle_color'); ?>
			font-size: 24px;
		}
		.<?php $this->eid(); ?> p{
			max-width: 570px;
		}
		.<?php $this->eid(); ?> .slide-down{
			position: absolute;
			left: 50%; bottom: 15px;
			transform: translate(-50%, 0);
			font-size: 24px;
			cursor: pointer;
		}
		.<?php $this->eid(); ?> .slide-down:hover{
			<?php $this->css_attr_color('slide_down_hover_color'); ?>
		}
		.<?php $this->eid(); ?> .list {
			display: flex;
			flex-wrap: wrap;
			max-width: 600px;
			margin: 20px -10px 0;
		}
		.<?php $this->eid(); ?> .list > li {
			display: flex;
			align-items: center;
			margin: 12px 10px;
			<?php $this->css_attr_color('item_color'); ?>
		}
		.<?php $this->eid(); ?> .list img,
		.<?php $this->eid(); ?> .list i {
			margin: 0 10px 0 0;
			<?php $this->css_attr_color('item_icon_color'); ?>
			<?php $this->css_attr('font-size', 'item_icon_size'); ?>
		}
		.<?php echo $this->id; ?> .btns{
			margin: 40px -5px 0;
		}
		.<?php echo $this->id; ?> .btn{
			margin: 5px;
			<?php $this->css_attr('background', 'button1_backcolor'); ?>
			<?php $this->css_attr_color('button1_color'); ?>
			<?php $this->css_attr('border-color', 'button1_bordercolor'); ?>
		}
		.<?php echo $this->id; ?> .btn-reverse{
			background: transparent;
			<?php $this->css_attr_color('button2_color'); ?>
		}
		.<?php echo $this->id; ?> .btn:hover{
			<?php $this->css_attr('background', 'button1_backcolor_hover'); ?>
			border-color: transparent;
			<?php $this->css_attr_color('button1_color_hover'); ?>
		}
		@media (max-width: 768px) {
			.<?php $this->eid(); ?> {
				min-height: 420px;
			}
		}
		<?php
	}

	public function script () {
		?>
;(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slide-down').click(function() {
			var $banner = $('.<?php $this->eid(); ?>')[0];
			document.documentElement.scrollTo(0, $banner.offsetHeight + $banner.offsetTop);
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
						<h1><?php $this->eco('title'); ?></h1>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>

					<?php if( !empty( $this->content['items'] ) ) { ?>
						<ul class="list <?php $this->echo_columns_class(); ?>">
							<?php if( $this->content['items'] ) { ?>
								<?php foreach( $this->content['items'] as $item ) { ?>
									<li>
										<?php if (empty($item['icon'])) { ?>
											<?php $this->display_tag_img( $item['image']['src'], $item['image']['alt'] ); ?>
										<?php } else {
											echo $item['icon'];
										} ?>
										<span><?php echo __( $item['title'] ); ?></span>
									</li>
								<?php } ?>
							<?php } ?>
						</ul>
					<?php } ?>

					<?php if ($this->has_content('button1_text') || $this->has_content('button2_text')) { ?>
						<div class="btns">
							<?php if ($this->has_content('button1_text')) { ?>
								<a href="javascript:;" class="btn"><?php $this->eco('button1_text'); ?></a>
							<?php } ?>
							<?php if ($this->has_content('button2_text')) { ?>
								<a href="javascript:;" class="btn btn-reverse"><?php $this->eco('button2_text'); ?></a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>

				<?php if ($this->gst('slide_down_display')) { ?>
					<a class="slide-down"><i class="fas fa-chevron-down"></i></a>
				<?php } ?>
				
			</div>
		<?php
	}
}
