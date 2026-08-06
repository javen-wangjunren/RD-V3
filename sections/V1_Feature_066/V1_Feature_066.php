<?php

/*
	<?php
	?>
*/

class V1_Feature_066  extends MML_Section_Base {
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
			
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			/* insert style end */
			.<?php $this->eid(); ?> .container {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
						flex-wrap: wrap;
				}

				.<?php $this->eid(); ?> .container.mml-reverse .mml-text {
				-webkit-box-ordinal-group: 3;
				-webkit-order: 2;
					-ms-flex-order: 2;
						order: 2;
				margin: 0 auto;
				margin-right: 0px;
				}

				.<?php $this->eid(); ?> .container.mml-reverse .mml-pic {
				margin: 0 auto;
				margin-left: 0px;
				}

				.<?php $this->eid(); ?> .mml-text {
				width: 57%;
				max-width: 680px;
				padding-top: 25px;
				}

				.<?php $this->eid(); ?> .mml-pic {
				width: 41%;
				max-width: 480px;
				margin: 0 auto;
				margin-right: 0px;
				position: relative;
				height: 100%;
				}

				.<?php $this->eid(); ?> b {
				color: #000;
				}

				.<?php $this->eid(); ?> h2 {
				color: #000;
				font-size: 36px;
				}

				.<?php $this->eid(); ?> p {
				color: #000;
				margin-top: 20px;
				}

				.<?php $this->eid(); ?> a.download {
				display: inline-block;
				position: absolute;
				width: 90%;
				max-width: 280px;
				background-color: #eaeef3;
				-webkit-border-radius: 5px;
						border-radius: 5px;
				bottom: -30px;
				left: 50%;
				-webkit-transform: translateX(-50%);
					-ms-transform: translateX(-50%);
						transform: translateX(-50%);
				color: #5f6776;
				}

				.<?php $this->eid(); ?> a.btn {
				margin: 0px;
				}

				@media (max-width: 960px) {
				.<?php $this->eid(); ?> .mml-text {
					padding-top: 0px;
				}
				}

				@media (max-width: 768px) {
				.<?php $this->eid(); ?> .container {
					-webkit-flex-wrap: wrap;
						-ms-flex-wrap: wrap;
							flex-wrap: wrap;
					-webkit-box-pack: center;
					-webkit-justify-content: center;
						-ms-flex-pack: center;
							justify-content: center;
				}
				.<?php $this->eid(); ?> .container.mml-reverse .mml-pic {
					margin: 0 auto;
					margin-bottom: 60px;
				}
				.<?php $this->eid(); ?> .mml-pic {
					width: 100%;
					margin: 0 auto;
					margin-top: 30px;
				}
				.<?php $this->eid(); ?> .mml-text {
					width: 100%;
					margin: 0 auto;
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
				<!-- insert html start --><!-- insert html end -->
				<div class="container mml-reverse">
					<div class="mml-text">
						<b>MML Digital</b>
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					</div>
					<div class="mml-pic">
						<img src="http://via.placeholder.com/480x350" alt="">
						<a href="" class="download btn" download="download">Download Brochure</a>
					</div>
				</div>
			</div>
		<?php
	}
}
