<?php

/*
<?php mtf_section('V1_Feature_010', 'feature_010', [
	'item_color' => '#333',
	'item_img_radius' => '0px',
	'button_color' => '#fff',
	'button_bgcolor' => '#00a978',
	'button_bgcolor_hover' => '#02bd8c',
	'slider_dot_color_active' => '#00a978',
	'slider_img_radius' => '0px',
	'reverse' => '', // 如果需要变左图右文，请赋值 mml-reverse
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
	'items'	=> [
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital'
				]
			],
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> 'xx'
		],
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital'
				]
			],
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> ''
		]
	]
]); ?>
*/

class V1_Feature_010  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_color', '#333');
		$this->set_default_style('item_img_radius', '0px');
		$this->set_default_style('button_color', '#fff');
		$this->set_default_style('button_bgcolor', '#00a978');
		$this->set_default_style('button_bgcolor_hover', '#02bd8c');
		$this->set_default_style('slider_dot_color_active', '#00a978');
		$this->set_default_style('slider_img_radius', '0px');
		$this->set_default_style('reverse', '');

	}

	public function style () {
		?>
			.<?php $this->eid(); ?> > {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .pre-heading {
				<?php $this->css_attr_color('subtitle_color'); ?>
				font-weight: 700;
				font-size: 20px;
			}
			.<?php $this->eid(); ?> .mml-box {
				display: flex !important;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin: 0 20px 0 0;
				max-width: 660px;
				width: 60%;
			}
			.<?php $this->eid(); ?> .list {
				margin: 30px -10px 0;
				max-width: 500px;
				display: flex;
				flex-wrap: wrap;
				<?php $this->css_attr_color('item_color'); ?>
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px;
				box-sizing: border-box;
				width: calc(50% - 20px);
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .list img,
			.<?php $this->eid(); ?> .list i {
				margin: 0 10px 0 0;
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 0 -10px;
				padding-bottom: 80px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-arrow {
				top: 100%;
				width: 58px;
				background: rgba(0,0,0,.2);
				color: #fff;
				border-radius: 5px;
				text-align: center;
				transform: translate(0, -100%);
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: #03a67b;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto;
				right: 50%;
				margin-right: 5px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: auto;
				left: 50%;
				margin-left: 5px;
			}
			.<?php $this->eid(); ?> .btn{
				background: <?php $this->est('button_bgcolor'); ?>;
				color: <?php $this->est('button_color'); ?>;
				border: 2px solid <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background: transparent;
				color: <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover{
				background: <?php $this->est('button_bgcolor_hover'); ?>;
				border-color: transparent;
				color: <?php $this->est('button_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker img {
				<?php $this->css_attr('border-radius', 'slider_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .mml-video{
				width: 480px;
				max-width: 100%;
			}
			.<?php $this->eid(); ?> .vp-a {
				position: absolute;
				left: 0; right: 0; bottom: 0; top: 0;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				font-size: 60px;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn{
				background: <?php $this->est('button_bgcolor'); ?>;
				color: <?php $this->est('button_color'); ?>;
				border: 2px solid <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background: transparent;
				color: <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover{
				background: <?php $this->est('button_bgcolor_hover'); ?>;
				border-color: transparent;
				color: <?php $this->est('button_color'); ?>;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block !important;
				}
				.<?php $this->eid(); ?> .mml-box .mml-text {
					margin: 0 0 30px;
					width: unset;
					max-width: unset;
				}
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
			adaptiveHeight: true
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container <?php $this->est('reverse'); ?>">

					<ul class="slicker">

						<?php if ($this->has_content('items')) { ?>
							<?php foreach ($this->gco('items') as $item) { ?>
								<li class="mml-box">
									<div class="mml-text">
										<?php if (!empty($item['subtitle'])) { ?>
											<b class="pre-heading"><?php _e($item['subtitle']); ?></b>
										<?php } ?>
										<?php if (!empty($item['title'])) { ?>
											<h2><?php _e($item['title']); ?></h2>
										<?php } ?>
										<?php if (!empty($item['desc'])) { ?>
											<?php _e($item['desc']); ?>
										<?php } ?>
										<?php if (!empty($item['list'])) { ?>
											<ul class="list">
												<?php foreach ($item['list'] as $list) { ?>
													<li>
														<?php if (!empty($list['icon'])) { ?>
															<?php _e($list['icon']); ?>
														<?php } else { ?>
															<?php $this->display_tag_img($list['image']['src'], $list['image']['alt']); ?>
														<?php } ?>
														<span><?php _e($list['title']); ?></span>
													</li>
												<?php } ?>
											</ul>
										<?php } ?>
										<?php if (!empty($item['btns']['obverse']['text']) || !empty($item['btns']['reverse']['text'])) { ?>
											<div class="btns">
												<?php if (!empty($item['btns']['obverse']['text'])) { ?>
													<a href="<?php echo $item['btns']['obverse']['link']; ?>" class="btn"><?php _e($item['btns']['obverse']['text']); ?></a>
												<?php } ?>
												<?php if (!empty($item['btns']['reverse']['text'])) { ?>
													<a href="<?php echo $item['btns']['reverse']['link']; ?>" class="btn btn-reverse"><?php _e($item['btns']['reverse']['text']); ?></a>
												<?php } ?>
											</div>
										<?php } ?>
									</div>
									<?php if (!empty($item['image']['src'])) { ?>
										<div class="mml-video">
											<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
											<?php if (!empty($item['video'])) { ?>
												<a href="<?php echo $item['video']; ?>" class="vp-a"><i class="far fa-play-circle"></i></a>
											<?php } ?>
										</div>
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
