<?php

/*
	<?php
	?>
*/

class V2_Cta_001  extends MML_Section_Base {
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
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> h4{
				color: #353535;
				font-size: 36px;
				margin-bottom:30px;
			}
			.<?php $this->eid(); ?> h2{
				color: #353535;
				font-size: 48px;
			}
			.<?php $this->eid(); ?> p{
				color: #5f6776;
			}
			.<?php $this->eid(); ?> .btn{
				background-color: #5f6776;
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .btn:hover{
				background-color: #5f6776;
			}
			/* insert style end */
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
					<h4>LOGO</h4>
					<h2>Aluminum Extrusion | CNC Machining | In-House Assemblies</h2>
					<p>We Serve You All Solutions</p>
					<div class="mml-btn">
						<a href="" class="btn">Contact Fine Metal</a>
					</div>
				</div>
			</div>
		<?php
	}
}
