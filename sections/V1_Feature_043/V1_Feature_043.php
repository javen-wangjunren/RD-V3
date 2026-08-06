<?php

/*
<?php mtf_section('V1_Feature_043', 'feature_043', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'h2_color'			=> '#000',
	'h4_color'			=> '#212121',
	'slide_color'		=> ['bg' => '#fff'],
	'dots_color'		=> ['bg:active' => '#5d6777'],
	'btn_color'			=> [
		'obverse'	=> ['_' => '#fff', 'bg' => '#5d6777'],
		'reverse'	=> ['_' => '#5d6777', 'bg' => 'transparent', 'bd' => '#5d6777'],
		':hover'	=> ['_' => '#fff', 'bg' => '#585f6b', 'bd' => 'transparent']
	]
], [
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
	'items'		=> [
		'class'		=> 'slicker',
		'content'	=> [
			[
				'image'	=> ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => ''],
				'title'	=> 'Heading'
			],
			[
				'image'	=> ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => ''],
				'title'	=> 'Heading'
			]
		]
	],
	'btns'		=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON2']
	]
]); ?>
*/

class V1_Feature_043  extends MML_Section_Base {
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
			'h2_color'			=> '#000',
			'h3_color'			=> '#212121',
			'h4_color'			=> '#212121',
			'slide_color'		=> ['bg' => '#fff'],
			'dots_color'		=> ['bg:active' => '#5d6777'],
			'table_color'		=> [
				'_' 		=> '#212121',
				'bordered'	=> ['bd' => '#5d6777'],
				'striped'	=> ['bg' => '#f3f8ff', 'bg:nth-child(even)' => '#5d6777', '_:nth-child(even)' => '#fff']
			],
			'btn_color'			=> [
				'obverse'	=> ['_' => '#fff', 'bg' => '#5d6777'],
				'reverse'	=> ['_' => '#5d6777', 'bg' => 'transparent', 'bd' => '#5d6777'],
				':hover'	=> ['_' => '#fff', 'bg' => '#585f6b', 'bd' => 'transparent']
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
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> h4 {
				margin-top: 10px;
				color: <?php $this->est('h4_color'); ?>;
			}
			.<?php $this->eid(); ?> .slick-list {
				padding: 40px 0;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
				padding: 40px 10px;
				background: <?php $this->est('slide_color.bg'); ?>;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
			}
			.<?php $this->eid(); ?> .slick-dots {
				margin-top: 0;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .slick-dots .slick-active button {
				background: <?php $this->est('dots_color.bg:active'); ?>;
			}
			.<?php $this->eid(); ?> .mml-table {
				margin-top: 40px;
				overflow: auto;
			}
			.<?php $this->eid(); ?> .mml-table table {
				width: 100%;
				min-width: 767px;
				text-align: left;
				color: <?php $this->est('table_color._'); ?>;
			}
			.<?php $this->eid(); ?> .mml-table th,
			.<?php $this->eid(); ?> .mml-table td{
				padding: 15px 20px 15px 0;
			}
			.<?php $this->eid(); ?> .bordered tr {
				border-top: 1px solid <?php $this->est('table_color.bordered.bd'); ?>;
			}
			.<?php $this->eid(); ?> .bordered tr:last-child {
				border-bottom: 1px solid <?php $this->est('table_color.bordered.bd'); ?>;
			}
			.<?php $this->eid(); ?> .striped tr{
				background: <?php $this->est('table_color.striped.bg'); ?>;
			}
			.<?php $this->eid(); ?> .striped th,
			.<?php $this->eid(); ?> .striped td{
				padding: 15px;
			}
			.<?php $this->eid(); ?> .striped tr:nth-child(even){
				background: <?php $this->est('table_color.striped.bg:nth-child(even)'); ?>;
				color: <?php $this->est('table_color.striped._:nth-child(even)'); ?>;
			}
			.<?php $this->eid(); ?> .prafs {
				margin-top: 40px;
				text-align: left;
			}
			.<?php $this->eid(); ?> .prafs h3 {
				color: <?php $this->est('h3_color'); ?>;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				background: <?php $this->est('btn_color.obverse.bg'); ?>;
				color: <?php $this->est('btn_color.obverse._'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: <?php $this->est('btn_color.reverse.bg'); ?>;
				border-color: <?php $this->est('btn_color.reverse.bd'); ?>;
				color: <?php $this->est('btn_color.reverse._'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: <?php $this->est('btn_color.:hover.bg'); ?>;
				color: <?php $this->est('btn_color.:hover._'); ?>;
				border-color: <?php $this->est('btn_color.:hover.bd'); ?>;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		
		$('.<?php $this->eid(); ?> .slicker').slick({
			arrows: false,
			dots: true,
			slidesToShow: 4,
			responsive: [{
				breakpoint: 900,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 600,
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
				<div class="container">
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<?php $this->eco('desc'); ?>
					<?php } ?>
					
					<?php if ($this->has_content('table')) { ?>
						<div class="mml-table">
							<div class="<?php $this->eco('table.class'); ?>">
								<?php $this->eco('table.content'); ?>
							</div>
						</div>
					<?php } ?>

					<?php if ($this->gco('items.class') == 'slicker') { ?>
						<ul class="slicker">
							<?php foreach ($this->gco('items.content') as $item) { ?>
								<li>
									<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
									<?php if (!empty($item['title'])) { ?>
										<h4><?php _e($item['title']); ?></h4>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

					<?php if (preg_match('/^mml-cols/', $this->gco('items.class'))) { ?>
						<ul class="prafs <?php $this->eco('items.class'); ?>">
							<?php foreach ($this->gco('items.content') as $item) { ?>
								<li>
									<h3><?php _e($item['title']); ?></h3>
									<?php if (!empty($item['desc'])) { ?>
										<?php _e($item['desc']); ?>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

					<?php if ($this->has_content('btns')) { ?>
						<div class="btns">
							<?php if ($this->has_content('btns.obverse.text')) { ?>
								<a href="<?php $this->eco('btns.obverse.link') ?>" class="btn"><?php $this->eco('btns.obverse.text'); ?></a>
							<?php } ?>
							<?php if ($this->has_content('btns.reverse.text')) { ?>
								<a href="<?php $this->eco('btns.reverse.link') ?>" class="btn btn-reverse"><?php $this->eco('btns.reverse.text'); ?></a>
							<?php } ?>
						</div>
					<?php } ?>

				</div>
			</div>
		<?php
	}
}
