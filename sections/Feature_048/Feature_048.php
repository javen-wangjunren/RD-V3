<?php

/*
	<?php
	?>
*/

class Feature_048  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
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
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				margin: 0 20px 0 0;
				max-width: 480px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #000;
			}
			.<?php $this->eid(); ?> .mml-table {
				width: 60%;
				max-width: 680px;
				overflow: auto;
			}
			.<?php $this->eid(); ?> .mml-table table {
				width: 100%;
				min-width: 680px;
				color: #212121;
			}
			.<?php $this->eid(); ?> .mml-table th,
			.<?php $this->eid(); ?> .mml-table td{
				padding: 15px 20px 15px 0;
			}
			.<?php $this->eid(); ?> .bordered tr {
				border-top: 1px solid #5d6777;
			}
			.<?php $this->eid(); ?> .bordered tr:last-child {
				border-bottom: 1px solid #5d6777;
			}
			.<?php $this->eid(); ?> .striped tr{
				background: #f3f8ff;
			}
			.<?php $this->eid(); ?> .striped th,
			.<?php $this->eid(); ?> .striped td{
				padding: 15px;
			}
			.<?php $this->eid(); ?> .striped tr:nth-child(even){
				background: #5d6777;
				color: #fff;
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
				<div class="container">
					<div class="mml-text">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
					</div>

					<div class="mml-table">
						<!-- .bordered / .striped -->
						<table class="striped">
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
						</table>
					</div>

				</div>
			</div>
		<?php
	}
}
