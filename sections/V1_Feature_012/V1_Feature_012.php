<?php

/*
<?php mtf_section('V1_Feature_012', 'feature_012', [
	'button_color' => '#fff',
	'button_bgcolor' => '#00a978',
	'button_bgcolor_hover' => '#02bd8c',
	'item_color' => '#333',
	'item_img_radius' => '0px',
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
	'item_bg' => '#fff',
	'item_radius' => '0px',
	'box_shadow' => '0px 4px 21px 0px rgba(0, 0, 0, 0.07)'
], [
	'button_text_1' => 'CTA Button 1',
	'button_link_1' => '#1',
	'button_text_2' => 'CTA Button 2',
	'button_link_2' => '#2',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
		[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
		[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
		[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
		[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
		[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ]
	]
]); ?>
*/

class V1_Feature_012 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'button_color' => '#fff',
			'button_bgcolor' => '#00a978',
			'button_bgcolor_hover' => '#02bd8c',
			'item_color' => '#333',
			'item_img_radius' => '0px',
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
			'item_bg' => '#fff',
			'item_radius' => '0px',
			'box_shadow' => '0px 4px 21px 0px rgba(0, 0, 0, 0.07)'
		]);

		$this->init_content([
			'button_text_1' => 'CTA Button 1',
			'button_link_1' => '#1',
			'button_text_2' => 'CTA Button 2',
			'button_link_2' => '#2',
			'title' => 'Title',
			'subtitle' => 'Sub Title',
			'desc' => 'This is the description.',
			'items' => [
				[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
				[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
				[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
				[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
				[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ],
				[ 'src' => 'https://via.placeholder.com/64x64/00a978/f1f1f1', 'alt' => 'Image Alt', 'text' => 'Heading' ]
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
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .pre-heading {
				<?php $this->css_attr_color('subtitle_color'); ?>
				font-weight: 700;
				font-size: 20px;
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> > .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin: 0 20px 0 0;
				max-width: 660px;
				width: 60%;
			}
			.<?php $this->eid(); ?> .btn {
				<?php $this->css_attr_color('button_color'); ?>
				<?php $this->css_attr('background', 'button_bgcolor'); ?>
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				<?php $this->css_attr_color('button_bgcolor'); ?>
				<?php $this->css_attr('border-color', 'button_bgcolor'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover {
				<?php $this->css_attr('background', 'button_bgcolor_hover'); ?>
				<?php $this->css_attr_color('button_color'); ?>
				border-color: transparent;
			}
			.<?php $this->eid(); ?> .list {
				flex: 1 1 0;
				display: flex;
				flex-wrap: wrap;
				text-align: center;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				margin: 0 10px 20px;
				width: calc(33.3333% - 20px);
				padding: 20px;
				border-radius: <?php $this->est('item_radius'); ?>;
				background: <?php $this->est('item_bg'); ?>;
				box-shadow: <?php $this->est('box_shadow'); ?>;
			}
			.<?php $this->eid(); ?> .list img {
				<?php $this->css_attr('border-radius', 'item_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .til{
				margin-top: 10px;
				<?php $this->css_attr_color('item_color'); ?>
				font-size: 18px;
				font-weight: 700;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> >.container .mml-text {
					margin: 0;
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .list{
					margin: 30px auto 0;
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
				<div class="container <?php $this->est('reverse'); ?>">
					<div class="mml-text">
						<?php if ($this->has_content('subtitle')) { ?>
							<b class="pre-heading"><?php $this->eco('subtitle'); ?></b>
						<?php } ?>
						<?php if ($this->has_content('title')) { ?>
							<h2><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p><?php $this->eco('desc'); ?></p>
						<?php } ?>
						<?php if ($this->has_content('button_text_1') || $this->has_content('button_text_2')) { ?>
							<div class="btns">
								<?php if ($this->has_content('button_text_1')) { ?>
									<a href="<?php $this->eco('button_link_1'); ?>" class="btn"><?php $this->eco('button_text_1'); ?></a>
								<?php } ?>
								<?php if ($this->has_content('button_text_2')) { ?>
									<a href="<?php $this->eco('button_link_2'); ?>" class="btn btn-reverse"><?php $this->eco('button_text_2'); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="list">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<?php $this->display_tag_img($value['src'], $value['alt']); ?>
									<div class="til"><?php _e($value['text']); ?></div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
