<?php

/*
<?php mtf_section('V1_Feature_032', 'feature-032', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'title_color' 		=> '#000',
	'item_top_color' 	=> '#00a978',
	'item_buttom_color' => '#000',
	'button_color' 		=> '#fff',
	'button_bgcolor' 	=> '#00a978',
	'button_bgcolor_hover' => '#02bd8c'
], [
	'title' => 'Title',
	'desc' => 'description',
	'button_text_1' => 'CTA 1',
	'button_link_1' => '#1',
	'button_text_2' => 'CTA 2',
	'button_link_2' => '#2',
	'items' => [
		[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
		[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
		[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
		[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
		[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ]
	]
]); ?>
*/

class V1_Feature_032  extends MML_Section_Base {
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
			'title_color' 		=> '#000',
			'item_top_color' 	=> '#00a978',
			'item_buttom_color' => '#000',
			'button_color' 		=> '#fff',
			'button_bgcolor' 	=> '#00a978',
			'button_bgcolor_hover' => '#02bd8c'
		]);

		$this->init_content([
			'title' => 'Title',
			'desc' => 'description',
			'button_text_1' => 'CTA 1',
			'button_link_1' => '#1',
			'button_text_2' => 'CTA 2',
			'button_link_2' => '#2',
			'items' => [
				[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
				[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
				[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
				[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ],
				[ 'count' => '60', 'unit' => 'pcs', 'text' => 'Heading' ]
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
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				width: 25%;
				padding: 10px;
				margin-top: 30px;
				<?php $this->css_attr_color('item_buttom_color'); ?>
			}
			.<?php $this->eid(); ?> .list b {
				display: block;
				margin-bottom: 10px;
				color: <?php $this->est('item_top_color'); ?>;
				font-size: 36px;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
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
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .list > li {
					width: 50%;
				}
			}
			@media (max-width: 540px) {
				.<?php $this->eid(); ?> .list > li {
					width: 100%;
				}
				.<?php $this->eid(); ?> .list b {
					margin-bottom: 0;
					font-size: 24px;
				}
			}
		<?php
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
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="list">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<b><?php echo $value['count']; ?><?php echo $value['unit']; ?></b>
									<div><?php echo $value['text']; ?></div>
								</li>
							<?php } ?>
						</ul>
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
			</div>
		<?php
	}
}
