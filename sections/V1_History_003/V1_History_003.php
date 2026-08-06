<?php

/*
<?php mtf_section('V1_History_003', 'history-003', [
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
	'item_color'		=> '#666',
	'line_color'		=> ['_' => '#5d6777', 'bd' => '#e9eef4']
], [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>',
	'items'	=> [
		[
			'title'	=> '2019-2020',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
		],
		[
			'title'	=> '2019-2020',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
		],
		[
			'title'	=> '2019-2020',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
		]
	]
]); ?>
*/

class V1_History_003  extends MML_Section_Base {
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
			'h4_color'			=> '#212121',
			'item_color'		=> '#666',
			'line_color'		=> ['_' => '#5d6777', 'bd' => '#e9eef4']
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
			.<?php $this->eid(); ?> .history {
				margin: 40px 0 0;
				text-align: right;
				color: <?php $this->est('item_color'); ?>;
			}
			.<?php $this->eid(); ?> .history > li {
				display: flex;
				justify-content: space-around;
			}
			.<?php $this->eid(); ?> .history > li:nth-child( odd ) {
				/* odd、even 可以用作参数控制方向 */
				flex-direction: row-reverse;
				text-align: left;
			}
			.<?php $this->eid(); ?> .half {
				flex: 1 1 0;
				margin: 0 20px;
				padding-bottom: 20px;
				max-width: 500px;
			}
			.<?php $this->eid(); ?> .line {
				position: relative;
				top: .4em;
				width: 3px;
				background: <?php $this->est('line_color._'); ?>;
			}
			.<?php $this->eid(); ?> .line:before {
				content: '\20';
				position: absolute;
				top: 0;
				left: -7px;
				width: 9px;
				height: 9px;
				border: 4px solid <?php $this->est('line_color.bd'); ?>;
				border-radius: 50%;
				background: <?php $this->est('line_color._'); ?>;
			}
			.<?php $this->eid(); ?> h4 {
				color: <?php $this->est('h4_color'); ?>;
			}
			@media (max-width: 720px) {
				.<?php $this->eid(); ?> .history > li {
					display: block;
				}
				.<?php $this->eid(); ?> .line {
					display: none;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
					margin: 20px 0 0;
					padding-bottom: 0;
					text-align: left !important;
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
						<?php $this->eco('desc'); ?>
					<?php } ?>
					<?php if ($this->has_content('items')) { ?>
						<ul class="history">
							<?php foreach ($this->gco('items') as $item) { ?>
								<li>
									<div class="mml-text half">
										<?php if (!empty($item['title'])) { ?>
											<h4><?php _e($item['title']); ?></h4>
										<?php } ?>
										<?php if (!empty($item['desc'])) { ?>
											<?php _e($item['desc']); ?>
										<?php } ?>
									</div>
									<div class="line"></div>
									<div class="half"></div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
