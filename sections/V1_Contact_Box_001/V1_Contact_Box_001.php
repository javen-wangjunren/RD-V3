<?php

/*
	<?php
	?>
*/

class V1_Contact_Box_001  extends MML_Section_Base {
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
			
			.<?php $this->eid(); ?> .mml-form h2 {
				text-align: center;
			}
			
			.<?php $this->eid(); ?>  .container {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			}

			.<?php $this->eid(); ?>  h2 {
			color: #333;
			}

			.<?php $this->eid(); ?>  p {
			color: #999;
			}

			.<?php $this->eid(); ?>  h4 {
			color: #333;
			margin-bottom: 10px;
			}

			.<?php $this->eid(); ?>  .contact-text {
			width: 46%;
			max-width: 480px;
			}

			.<?php $this->eid(); ?>  .contact-text ul {
			margin-top: 40px;
			}

			.<?php $this->eid(); ?>  .contact-text li {
			position: relative;
			-webkit-box-sizing: border-box;
					box-sizing: border-box;
			padding-left: 35px;
			margin-top: 15px;
			}

			.<?php $this->eid(); ?>  .contact-text img {
			position: absolute;
			left: 0px;
			top: 5px;
			-webkit-border-radius: 50%;
					border-radius: 50%;
			}

			.<?php $this->eid(); ?>  .mml-form {
			width: 52%;
			max-width: 600px;
			margin: 0 auto;
			margin-right: 0px;
			-webkit-box-sizing: border-box;
					box-sizing: border-box;
			padding: 40px 50px;
			background: #e9eef4;
			color: #9d9d9d;
			}

			.<?php $this->eid(); ?>  h3 {
			color: #333;
			font-size: 36px;
			}

			.<?php $this->eid(); ?>  input, .<?php $this->eid(); ?>  textarea {
			background: #fff;
			color: #9d9d9d;
			border: 2px solid #fff;
			}

			.<?php $this->eid(); ?>  input::-webkit-input-placeholder, .<?php $this->eid(); ?>  textarea::-webkit-input-placeholder {
			color: #9d9d9d;
			}

			.<?php $this->eid(); ?>  input::-moz-placeholder, .<?php $this->eid(); ?>  textarea::-moz-placeholder {
			color: #9d9d9d;
			}

			.<?php $this->eid(); ?>  input:-ms-input-placeholder, .<?php $this->eid(); ?>  textarea:-ms-input-placeholder {
			color: #9d9d9d;
			}

			.<?php $this->eid(); ?>  input::-ms-input-placeholder, .<?php $this->eid(); ?>  textarea::-ms-input-placeholder {
			color: #9d9d9d;
			}

			.<?php $this->eid(); ?>  input::placeholder, .<?php $this->eid(); ?>  textarea::placeholder {
			color: #9d9d9d;
			}

			.<?php $this->eid(); ?>  .wpcf7-submit {
			width: 100%;
			background: #5d6777;
			height: 60px;
			color: #fff;
			margin: 0px;
			margin-left: 10px;
			max-width: 500px;
			}

			.<?php $this->eid(); ?>  .ajax-loader {
			display: none !important;
			}

			@media (max-width: 768px) {
			.<?php $this->eid(); ?>  .container {
				-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
						flex-wrap: wrap;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
			}
			.<?php $this->eid(); ?>  .contact-text {
				width: 100%;
				max-width: 600px;
			}
			.<?php $this->eid(); ?>  .mml-form {
				width: 100%;
				margin: 0 auto;
				margin-top: 30px;
			}
			}

			@media (max-width: 540px) {
			.<?php $this->eid(); ?>  .mml-form {
				padding: 40px 20px;
			}
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
					<div class="contact-text">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism.</p>
						<ul>
							<li>
								<img src="http://via.placeholder.com/20x20" alt="">
								<h4>Lorem ipsum dolor amet locavore</h4>
								<p>Farm-to-table organic humblebrag pork belly man.</p>
							</li>
							<li>
								<img src="http://via.placeholder.com/20x20" alt="">
								<h4>Vape lomo jianbing</h4>
								<p>Farm-to-table organic humblebrag pork belly man.</p>
							</li>
							<li>
								<img src="http://via.placeholder.com/20x20" alt="">
								<h4>Butcher 3 wolf</h4>
								<p>Farm-to-table organic humblebrag pork belly man.</p>
							</li>
							<li>
								<img src="http://via.placeholder.com/20x20" alt="">
								<h4>Pop-up cardigan</h4>
								<p>Farm-to-table organic humblebrag pork belly man.</p>
							</li>
							
						</ul>
					</div>
					<div class="mml-form">
						<h3>Get In Touch</h3>
						<?php echo do_shortcode('[contact-form-7 id="14" title="Banner 005"]'); ?>
					</div>
				</div>
			</div>
		<?php
	}
}
