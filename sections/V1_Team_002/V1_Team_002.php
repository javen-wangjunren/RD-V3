<?php

/*
<?php mtf_section('V1_Team_002', 'team-002', [
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
	'dot_color'			=> '#03a57b'
], [
	'title'	=> 'title',
	'desc'	=> 'desc',
	'image'	=> ['src' => 'https://via.placeholder.com/1180x442/00a978/f1f1f1?text=Image', 'alt' => ''],
	'team'	=> [
		['title' => 'team', 'content' => 'content'],
		['title' => 'team', 'content' => 'content']
	]
]); ?>
*/

class V1_Team_002  extends MML_Section_Base {
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
			'dot_color'			=> '#03a57b'
		]);

		$this->init_content([
			'title'	=> 'title',
			'desc'	=> 'desc',
			'image'	=> ['src' => 'https://via.placeholder.com/1180x442/00a978/f1f1f1?text=Image', 'alt' => ''],
			'team'	=> [
				['title' => 'team', 'content' => 'content'],
				['title' => 'team', 'content' => 'content']
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> h4 {
				<?php $this->css_attr_color('title_color'); ?>
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .container > p {
				max-width: 990px;
				margin: 10px auto;
			}
			.<?php $this->eid(); ?> .mml-image {
				margin: 30px auto;
			}
			.<?php $this->eid(); ?> .list {
				margin: 0 0 -20px;
				display: flex;
				jsutify-content: space-between;
				text-align: left;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				width: 50%;
				padding: 0 40px 20px 0;
			}
			.<?php $this->eid(); ?> h4:before {
				content: '\20';
				margin: 12px 10px 0 0;
				width: 6px; height: 6px;
				border-radius: 6px;
				background: <?php $this->est('dot_color'); ?>;
			}
			@media (max-width: 640px) {
				.<?php $this->eid(); ?> .list {
					display: block;
				}
				.<?php $this->eid(); ?> .list > li {
					width: unset;
					padding: 0 0 20px;
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
					<?php if ($this->has_content('desc')) { ?>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if ($this->has_content('image')) { ?>
						<div class="mml-image"><?php $this->display_tag_img($this->gco('image.src'), $this->gco('image.alt')); ?></div>
					<?php } ?>
					<?php if ($this->has_content('team')) { ?>
						<ul class="list">
							<?php foreach ($this->gco('team') as $team) { ?>
								<li>
									<h4><?php _e($team['title']); ?></h4>
									<p><?php _e($team['content']); ?></p>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

				</div>
			</div>
		<?php
	}
}
