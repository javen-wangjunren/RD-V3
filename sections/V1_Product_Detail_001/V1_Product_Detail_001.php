<?php

/*
<?php mtf_section('V1_Product_Detail_001', 'product-detail-001', [
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
	'list_color'		=> '#212121',
	'dot_color'			=> '#03a67b',
	'vpa_color'			=> ['_' => '#666', ':hover' => '#03a67b'],
	'arrow_color'		=> ['_' => '#fff', 'bg' => '#c2c2c2', 'bg:hover' => '#03a67b'],
	'btn_color'			=> ['_' => '#fff', 'bg' => '#00a978', ':hover' => '#fff', 'bg:hover' => '#02bd8c', 'bd:hover' => 'transparent'],
	'btn_reverse_color'	=> ['_' => '#00a978', 'bg' => 'transparent', 'bd' => '#00a978']
], [
	'title' 	=> 'title',
	'desc'		=> 'desc',
	'slider' 	=> [
		[
			'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=Image', 'alt' => ''],
			'video' => ''
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=Image', 'alt' => ''],
			'video' => ''
		]
	],
	'items'		=> [
		'title' => 'xxxx',
		'list'	=> '<ul>
						<li>xxx</li>
						<li>xxx</li>
						<li>xxx</li>
					</ul>',
		'icons'	=> [
			['src' => 'https://via.placeholder.com/30x30/03a67b/f1f1f1?text=Image', 'alt' => ''],
			['src' => 'https://via.placeholder.com/30x30/03a67b/f1f1f1?text=Image', 'alt' => ''],
		]
	],
	'btn'		=> [
		'reverse' => ['link' => 'javascript:;', 'text' => 'Request A Quote'],
		'obverse' => ['link' => 'javascript:;', 'text' => 'Download Datasheet']
	]
]); ?>
*/

class V1_Product_Detail_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值
		$this->target = '';
		$items = $this->gco('items');
		if (isset($items['title']) || isset($items['list']) || isset($items['icons'])) {
			$this->target = 'detail_001';
		} else if (isset($items['q&a'])) {
			$this->target = 'detail_002';
		}

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
			'list_color'		=> '#212121',
			'dot_color'			=> '#03a67b',
			'vpa_color'			=> ['_' => '#666', ':hover' => '#03a67b'],
			'arrow_color'		=> ['_' => '#fff', 'bg' => '#c2c2c2', 'bg:hover' => '#03a67b'],
			'btn_color'			=> ['_' => '#fff', 'bg' => '#00a978', ':hover' => '#fff', 'bg:hover' => '#02bd8c', 'bd:hover' => 'transparent'],
			'btn_reverse_color'	=> ['_' => '#00a978', 'bg' => 'transparent', 'bd' => '#00a978']
		]);

		$this->init_content([
			'title' 	=> 'title',
			'desc'		=> 'desc',
			'slider' 	=> [
				[
					'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=Image', 'alt' => ''],
					'video' => ''
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=Image', 'alt' => ''],
					'video' => ''
				]
			],
			'items'		=> []
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
			.<?php $this->eid(); ?> h3 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .container {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .slickers {
				width: 50%;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .vp-a{
				color: <?php $this->est('vpa_color._'); ?>;
			}
			.<?php $this->eid(); ?> .vp-a:hover {
				color: <?php $this->est('vpa_color.:hover'); ?>;
			}
			.<?php $this->eid(); ?> .slick-arrow {
				line-height: 44px; width: 44px;
				background: <?php $this->est('arrow_color.bg'); ?>;
				color: <?php $this->est('arrow_color._'); ?>;
				border-radius: 100px;
				text-align: center;
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: <?php $this->est('arrow_color.bg:hover'); ?>;
			}
			.<?php $this->eid(); ?> .slicker-thumb {
				margin: 10px -10px;
			}
			.<?php $this->eid(); ?> .slicker-thumb .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .details {
				flex: 1 1 0;
				max-width: 480px;
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> h4 {
				margin-top: 30px;
				<?php $this->css_attr_color('title_color'); ?>
			}

			<?php if ($this->target == 'detail_001') {	//V1_Product_Detail_001 ?>
				.<?php $this->eid(); ?> .list {
					margin: 10px 0;
					<?php $this->css_attr_color('list_color'); ?>
				}
				.<?php $this->eid(); ?> .list ul > li {
					display: flex;
					align-items: flex-start;
				}
				.<?php $this->eid(); ?> .list ul > li:before {
					content: '\20';
					flex-shrink: 0;
					margin: 10px 10px 0 0;
					width: 6px; height: 6px;
					border-radius: 6px;
					background: <?php $this->est('dot_color'); ?>;
				}
				.<?php $this->eid(); ?> .icons {
					margin-top: 10px;
					display: flex;
					flex-wrap: wrap;
				}
				.<?php $this->eid(); ?> .icons > li {
					margin: 20px 40px 0 0;
				}
			<?php } ?>

			<?php if ($this->target == 'detail_002') {	//Product_Detail_002 ?>
				.<?php $this->eid(); ?> .mml-slider {
					margin: 20px 0;
					background: transparent;
				}
				.<?php $this->eid(); ?> .question {
					display: flex;
					justify-content: space-between;
					align-items: center;
					padding: 10px 20px;
					<?php $this->css_attr_color('title_color'); ?>
					cursor: pointer;
				}
				.<?php $this->eid(); ?> .answer {
					height: 0;
					padding: 0 20px;
					overflow: hidden;
					transition: all .24s;
				}
				.<?php $this->eid(); ?> .mml-active .answer {
					height: unset;
					padding: 0 20px 10px;
				}
				.<?php $this->eid(); ?> .mml-slider .fa-minus {
					display: none;
				}
				.<?php $this->eid(); ?> .mml-active .fa-plus {
					display: none;
				}
				.<?php $this->eid(); ?> .mml-active .fa-minus {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-slider + .btns {
					margin-top: 0;
				}
			<?php } ?>

			.<?php $this->eid(); ?> .btns {
				margin: 40px 0 0;
				flex-direction: column;
				max-width: 266px;
			}
			.<?php $this->eid(); ?> .btn {
				margin: 5px 0;
				background: <?php $this->est('btn_color.bg'); ?>;
				color: <?php $this->est('btn_color._'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: <?php $this->est('btn_reverse_color.bg'); ?>;
				color: <?php $this->est('btn_reverse_color._'); ?>;
				border-color: <?php $this->est('btn_reverse_color.bd'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: <?php $this->est('btn_color.bg:hover'); ?>;
				color: <?php $this->est('btn_color.:hover'); ?>;
				border-color: <?php $this->est('btn_color.bd:hover'); ?>;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> .container {
					display: block;
				}
				.<?php $this->eid(); ?> .slickers {
					width: unset;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .container .details {
					margin: 30px auto 0;
					max-width: 580px;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker-main').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			asNavFor: '.<?php $this->eid(); ?> .slicker-thumb'
		});
		$('.<?php $this->eid(); ?> .slicker-thumb').slick({
			arrows: false,
			slidesToShow: 3,
			focusOnSelect: true,
			asNavFor: '.<?php $this->eid(); ?> .slicker-main',
			responsive: [{
				breakpoint: 400,
				settings: { slidesToShow: 2 }
			}]
		});

		<?php if ($this->target == 'detail_002') {	//Product_Detail_002 ?>
			var $slider = $('.<?php $this->eid(); ?> .mml-slider');
			$slider.on('click', '.question', function(){
				var $li = this.parentNode;
				if($li.classList.contains('mml-active')) {
					$li.classList.remove('mml-active');
				} else {
					$slider.find('.mml-active').removeClass('mml-active');
					$li.classList.add('mml-active');
				}
			});
		<?php } ?>
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="slickers">

						<?php $slider = $this->gco('slider'); ?>

						<?php if ($slider) { ?>
							<ul class="slicker-main">

								<?php foreach ($slider as $v) { ?>
									<li>
										<?php if ($v['video']) { ?>
											<div class="mml-video">
												<?php $this->display_tag_img($v['image']['src'], $v['image']['alt']); ?>
												<a href="<?php echo $v['video']; ?>" class="vp-a"><i class="far fa-play-circle"></i></a>
											</div>
										<?php } else { ?>
											<?php $this->display_tag_img($v['image']['src'], $v['image']['alt']); ?>
										<?php } ?>
									</li>
								<?php } ?>
								
							</ul>
							<ul class="slicker-thumb">

								<?php foreach ($slider as $v) { ?>
									<li><?php $this->display_tag_img($v['image']['src'], $v['image']['alt']); ?></li>
								<?php } ?>

							</ul>
						<?php } ?>

					</div>
					<div class="details">

						<?php if ($this->has_content('title')) { ?>
							<h3><?php $this->eco('title'); ?></h3>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p><?php $this->eco('desc'); ?></p>
						<?php } ?>

						<?php $items = $this->gco('items'); ?>
						<?php if ($this->target == 'detail_001') {	//V1_Product_Detail_001	?>
	
							<?php if (isset($items['title'])) { ?>
								<h4><?php _e($items['title']); ?></h4>
							<?php } ?>
							<?php if (isset($items['list'])) { ?>
								<div class="list">
									<?php _e($items['list']); ?>
								</div>
							<?php } ?>
							<?php if (isset($items['icons'])) { ?>
								<ul class="icons">
									<?php foreach ($items['icons'] as $icon) { ?>
										<li><?php $this->display_tag_img($icon['src'], $icon['alt']); ?></li>
									<?php } ?>
								</ul>
							<?php } ?>

						<?php } ?>

						<?php if ($this->target == 'detail_002') {	//Product_Detail_002 ?>

							<ul class="mml-slider">
								<?php foreach ($items['q&a'] as $k => $item) { ?>
									<li <?php echo $k == 0 ? 'class="mml-active"' : ''; ?>>
										<h5 class="question">
											<span><?php _e($item['question']); ?></span>
											<i class="fas fa-plus"></i>
											<i class="fas fa-minus"></i>
										</h5>
										<div class="answer"><?php _e($item['answer']); ?></div>
									</li>
								<?php } ?>
							</ul>

						<?php } ?>

						<div class="btns">

							<?php if ($this->has_content('btn.reverse.text')) { ?>
								<a href="<?php $this->eco('btn.reverse.link'); ?>" class="btn btn-reverse"><?php $this->eco('btn.reverse.text'); ?></a>
							<?php } ?>
							<?php if ($this->has_content('btn.obverse.text')) { ?>
								<a href="<?php $this->eco('btn.obverse.link'); ?>" class="btn"><?php $this->eco('btn.obverse.text'); ?></a>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
