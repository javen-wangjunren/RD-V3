<?php

/*
	<?php
	?>
*/

class V1_Contact_Box_002  extends MML_Section_Base {
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
			/* insert style end */
			.<?php $this->eid(); ?> section {
				height: 385px;
				background-image: url("http://via.placeholder.com/1180x355");
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				}

				.<?php $this->eid(); ?> .contact-text {
				width: 90%;
				max-width: 450px;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				padding: 40px 10px;
				background-color: #000;
				}

				.<?php $this->eid(); ?> h4 {
				color: #fff;
				margin-bottom: 10px;
				}

				.<?php $this->eid(); ?> p {
				margin: 0px;
				margin-top: 3px;
				color: #fff;
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
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<section>
						<div class="contact-text">
							<h4>Our Offices</h4>
							<p class="address">address</p>
							<p class="email">email</p>
							<p class="tel">tel</p>
						</div>
					</section>
				</div>
			</div>
		<?php
	}
}
