<?php

/*
<?php mtf_section('V1_Team_004', 'team-004', [
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
	'position_color'	=> '#828282'
], [
	'title'	=> 'title',
	'desc'	=> 'desc',
	'image'	=> ['src' => 'https://via.placeholder.com/580x368/00a978/f1f1f1?text=Image', 'alt' => ''],
	'items'	=> [
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
			'name' 		=> 'Name',
			'position'	=> 'Position',
			'desc' 		=> 'Desc'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
			'name' 		=> 'Name',
			'position'	=> 'Position',
			'desc' 		=> 'Desc'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
			'name' 		=> 'Name',
			'position'	=> 'Position',
			'desc' 		=> 'Desc'
		]
	]
]); ?>
*/

class V1_Team_004  extends MML_Section_Base {
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
			'position_color'	=> '#828282'
		]);

		$this->init_content([
			'title'	=> 'title',
			'desc'	=> 'desc',
			'image'	=> ['src' => 'https://via.placeholder.com/580x368/00a978/f1f1f1?text=Image', 'alt' => ''],
			'items'	=> [
				[
					'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
					'name' 		=> 'Name',
					'position'	=> 'Position',
					'desc' 		=> 'Desc'
				],
				[
					'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
					'name' 		=> 'Name',
					'position'	=> 'Position',
					'desc' 		=> 'Desc'
				],
				[
					'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
					'name' 		=> 'Name',
					'position'	=> 'Position',
					'desc' 		=> 'Desc'
				]
			]
		]);
	}

	public function style () {
		?>
			/* insert style start */
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
			.<?php $this->eid(); ?> .mml-box {
				margin: 10px;
				display: flex;
				align-items: center;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin: 0 20px 0 0;
				flex: 1 1 0;
				padding: 30px 0;
			}
			.<?php $this->eid(); ?> .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 50%;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .list {
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> li {
				box-sizing: border-box;
				padding: 10px;
				width: 33.3333%;
			}
			.<?php $this->eid(); ?> h4 {
				margin: 30px 0 0;
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .position{
				display: block;
				color: <?php $this->est('position_color'); ?>;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .mml-box .mml-text {
					margin: 0;
					padding: 0 0 30px;
				}
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> li {
					margin: 0 auto;
					width: 100%;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>

		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="mml-box <?php $this->est('reverse'); ?>">
						<div class="mml-text">

							<?php if ($this->has_content('title')) { ?>
								<h2><?php $this->eco('title'); ?></h2>
							<?php } ?>
							<?php if ($this->has_content('desc')) { ?>
								<p><?php $this->eco('desc'); ?></p>
							<?php } ?>
						</div>

						<?php if ($this->has_content('image')) { ?>
							<div class="mml-image"><?php $this->display_tag_img($this->gco('image.src'), $this->gco('image.alt')); ?></div>
						<?php } ?>

					</div>

					<?php if ($this->has_content('items')) { ?>
						<ul class="list">
							<?php foreach ($this->gco('items') as $item) { ?>
								<li>
									<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
									<?php if ($item['name']) { ?>
										<h4><?php _e($item['name']); ?></h4>
									<?php } ?>
									<?php if ($item['position']) { ?>
										<span class="position"><?php _e($item['position']); ?></span>
									<?php } ?>
									<?php if ($item['desc']) { ?>
										<p><?php _e($item['desc']); ?></p>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

				</div>
			</div>
		<?php
	}
}
