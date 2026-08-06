<?php

/*
<?php mtf_section('V1_Feature_048', 'feature-048', [
	'class' 			=> '',
	'bg_color' 			=> '',
	'bg_image'			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'reverse'			=> '',	//'mml-reverse'
	'table_class' 		=> 'striped',	//striped, bordered
	'striped'			=> ['bg_color' => '#f3f8ff', 'bg_color:nth-child(even)' => '#5d6777'],
	'bordered'			=> ['border_color' => '#5d6777'],
	'h2_color'			=> '#000',
	'table_color'		=> '#212121',
	'table_color:nth-child(even)' => '#fff'
], [
	'title' 			=> 'Title',
	'desc'  			=> 'desc',
	'table' 			=> '<table>
								<tr><td>1</td><td>2</td><td>3</td></tr>
								<tr><td>1</td><td>2</td><td>3</td></tr>
								<tr><td>1</td><td>2</td><td>3</td></tr>
							</table>'
]); ?>
*/

class V1_Feature_048  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'class' 			=> '',
			'bg_color' 			=> '',
			'bg_image'			=> '',
			'margin_top' 		=> '',
			'padding_top' 		=> '',
			'padding_bottom' 	=> '',
			'margin_bottom' 	=> '',
			'custom_css' 		=> '',
			'desc_color'		=> '#808080',
			'reverse'			=> '',	//'mml-reverse'
			'table_class' 		=> 'striped',	//striped, bordered
			'striped'			=> ['bg_color' => '#f3f8ff', 'bg_color:nth-child(even)' => '#5d6777'],
			'bordered'			=> ['border_color' => '#5d6777'],
			'h2_color'			=> '#000',
			'table_color'		=> '#212121',
			'table_color:nth-child(even)' => '#fff'
		]);

		$this->init_content([
			'title'	=> 'Title',
			'desc'	=> 'desc',
			'table'	=> '<table>
							<tr><td>1</td><td>2</td><td>3</td></tr>
							<tr><td>1</td><td>2</td><td>3</td></tr>
							<tr><td>1</td><td>2</td><td>3</td></tr>
						</table>'
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
			.<?php $this->eid(); ?> > .container {
				display: flex;
				jusify-content: space-between;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				<?php if ($this->gst('reverse') == 'mml-reverse') { ?>
					margin: 0 0 0 20px;
				<?php } else { ?>
					margin: 0 20px 0 0;
				<?php } ?>
				max-width: 480px;
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('h2_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-table {
				width: 60%;
				max-width: 680px;
				overflow: auto;
			}
			.<?php $this->eid(); ?> .mml-table table {
				width: 100%;
				min-width: 680px;
				<?php $this->css_attr_color('table_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-table th,
			.<?php $this->eid(); ?> .mml-table td{
				padding: 15px 20px 15px 0;
			}
			.<?php $this->eid(); ?> .bordered tr {
				border-top: 1px solid <?php $this->est('bordered.border_color'); ?>;
			}
			.<?php $this->eid(); ?> .bordered tr:last-child {
				border-bottom: 1px solid <?php $this->est('bordered.border_color'); ?>;
			}
			.<?php $this->eid(); ?> .striped tr{
				background: <?php $this->est('striped.bg_color'); ?>;
			}
			.<?php $this->eid(); ?> .striped th,
			.<?php $this->eid(); ?> .striped td{
				padding: 15px;
			}
			.<?php $this->eid(); ?> .striped tr:nth-child(even){
				background: <?php $this->est('striped.bg_color:nth-child(even)'); ?>;
				<?php $this->css_attr_color('table_color:nth-child(even)'); ?>
			}
			@media (max-width: 960px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					margin: 0 0 30px;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .mml-table {
					width: unset;
					max-width: unset;
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

					<?php if ($this->has_content('title') || $this->has_content('desc')) { ?>
						<div class="mml-text">
							<?php if ($this->has_content('title')) { ?>
								<h2><?php $this->eco('title'); ?></h2>
							<?php } ?>
							<?php if ($this->has_content('desc')) { ?>
								<p><?php $this->eco('desc'); ?></p>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if ($this->has_content('table')) { ?>
						<div class="mml-table">
							<div class="<?php $this->est('table_class'); ?>">
								<?php $this->eco('table'); ?>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		<?php
	}
}
