<?php

/*
<?php mtf_section('V1_Team_005', 'team-005', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'title_color'		=> '#000'
], [
	'title'	=> 'title',
	'items'	=> [
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
			'name'		=> 'Name',
			'position'	=> 'Position'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
			'name'		=> 'Name',
			'position'	=> 'Position'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
			'name'		=> 'Name',
			'position'	=> 'Position'
		]
	]
]); ?>
*/

class V1_Team_005  extends MML_Section_Base {
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
			'title_color'		=> '#000'
		]);

		$this->init_content([
			'title'	=> 'title',
			'items'	=> [
				[
					'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
					'name'		=> 'Name',
					'position'	=> 'Position'
				],
				[
					'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
					'name'		=> 'Name',
					'position'	=> 'Position'
				],
				[
					'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image', 'alt' => ''],
					'name'		=> 'Name',
					'position'	=> 'Position'
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
			.<?php $this->eid(); ?> .list {
				margin: 30px -10px 0;
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> li {
				box-sizing: border-box;
				padding: 10px 10px 30px;
				width: 33.3333%;
			}
			.<?php $this->eid(); ?> h4 {
				margin: 30px 0 0;
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .position{
				display: block;
			}
			@media (max-width: 860px) {
				.<?php $this->eid(); ?> li {
					width: 50%;
				}
			}
			@media (max-width: 500px) {
				.<?php $this->eid(); ?> li {
					width: 100%;
				}
				.<?php $this->eid(); ?> h4 {
					margin: 10px 0 0;
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

					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>

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
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

				</div>
			</div>
		<?php
	}
}
