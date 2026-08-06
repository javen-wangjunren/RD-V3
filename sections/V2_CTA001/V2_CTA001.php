<?php

/*
	<?php
	?>
*/

class V2_CTA001  extends MML_Section_Base {
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

			.<?php $this->eid(); ?> {
			background-image: url("http://via.placeholder.com/1920x650");
			background-position: center;
			background-repeat: no-repeat;
			}

			.<?php $this->eid(); ?> h2 {
			margin-bottom: 10px;
			margin-top: 45px;
			}

			.<?php $this->eid(); ?> p {
			color: #5f6776;
			}

			.<?php $this->eid(); ?> a.btn {
			background-color: #5f6776;
			-webkit-border-radius: 0px;
					border-radius: 0px;
			color: #fff;
			margin: 0px;
			margin-top: 40px;
			padding: 15px 80px;
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
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<img src="http://via.placeholder.com/100x50/fff/" alt="">
					<h2>Aluminum Extrusion | CNC Machining | </h2>
					<p>We Serve You All Solutions</p>
					<a href="" class="btn">Contact Fine Metal</a>
				</div>
			</div>
		<?php
	}
}
