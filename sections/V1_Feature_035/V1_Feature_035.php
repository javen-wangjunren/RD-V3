<?php

/*
<?php mtf_section('V1_Feature_035', 'feature-035', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'reverse'			=> '',	//'mml-reverse'
	'quote_color'		=> ['_' => '#353535', 'bd' => '#5d6777', 'name' => '#212121'],
	'subtitle_color'	=> '#000',
	'title_color'		=> '#000',
	'btn_color'			=> [
		'obverse'	=> ['_' => '#fff', 'bg' => '#5d6777'],
		'reverse'	=> ['_' => '#5d6777', 'bg' => 'transparent', 'bd' => '#5d6777'],
		':hover'	=> ['_' => '#fff', 'bg' => '#585f6b', 'bd' => 'transparent']
	]
], [
	'person'	=> [
		'image'		=> ['src' => 'https://via.placeholder.com/500x387/e9eef4/5d6777?text=I', 'alt' => ''],
		'name'		=> 'Ben',
		'slogan'	=> '<p>“We help Saas companies find their voice, grow the ARR monster and scale internationally.”</p>'
	],
	'subtitle'	=> 'MML DIGITAL',
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
	'btns'		=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON2']
	]
]); ?>
*/

class V1_Feature_035  extends MML_Section_Base {
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
			'reverse'			=> '',	//'mml-reverse'
			'quote_color'		=> ['_' => '#353535', 'bd' => '#5d6777', 'name' => '#212121'],
			'subtitle_color'	=> '#000',
			'title_color'		=> '#000',
			'btn_color'			=> [
				'obverse'	=> ['_' => '#fff', 'bg' => '#5d6777'],
				'reverse'	=> ['_' => '#5d6777', 'bg' => 'transparent', 'bd' => '#5d6777'],
				':hover'	=> ['_' => '#fff', 'bg' => '#585f6b', 'bd' => 'transparent']
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
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 50%;
				max-width: 500px;
				border: 1px solid #5d6777;
				background: #e9eef4;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				margin: 0 0 0 20px;
				max-width: 600px;
			}
			.<?php $this->eid(); ?> > .mml-reverse > .mml-text {
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> .quote {
				padding: 20px 40px;
				border-top: 1px solid <?php $this->est('quote_color.bd'); ?>;
				font-size: 20px;
				color: <?php $this->est('quote_color._'); ?>;
			}
			.<?php $this->eid(); ?> h3 {
				color: <?php $this->est('quote_color.name'); ?>;
			}
			.<?php $this->eid(); ?> .pre-heading {
				color: <?php $this->est('subtitle_color'); ?>;
				font-size: 20px;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('title_color'); ?>;
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

			@media (max-width: 860px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-image {
					margin: 0 auto;
					width: unset;
				}
				.<?php $this->eid(); ?> .container > .mml-text {
					margin: 30px 0 0;
					max-width: unset;
				}
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .quote {
					padding: 20px;
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
					<div class="mml-image">
						<?php if ($this->has_content('person.image')) { ?>
							<?php $this->display_tag_img($this->gco('person.image.src'), $this->gco('person.image.alt')); ?>
						<?php } ?>
						<div class="quote">
							<?php if ($this->has_content('person.name')) { ?>
								<h3><?php $this->eco('person.name'); ?></h3>
							<?php } ?>
							<?php if ($this->has_content('person.slogan')) { ?>
								<?php $this->eco('person.slogan'); ?>
							<?php } ?>
						</div>
					</div>

					<div class="mml-text">
						<?php if ($this->has_content('subtitle')) { ?>
							<b class="pre-heading"><?php $this->eco('subtitle'); ?></b>
						<?php } ?>
						<?php if ($this->has_content('title')) { ?>
							<h2><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<?php $this->eco('desc'); ?>
						<?php } ?>
						<?php if ($this->has_content('btns')) { ?>
							<div class="btns">
								<?php if ($this->has_content('btns.obverse.text')) { ?>
									<a href="<?php $this->eco('btns.obverse.link'); ?>" class="btn"><?php $this->eco('btns.obverse.text'); ?></a>
								<?php } ?>
								<?php if ($this->has_content('btns.reverse.text')) { ?>
									<a href="<?php $this->eco('btns.reverse.link'); ?>" class="btn btn-reverse"><?php $this->eco('btns.reverse.text'); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php
	}
}
