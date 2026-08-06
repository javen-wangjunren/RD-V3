<?php

/*
	<?php
	?>
*/

class V1_Feature_068  extends MML_Section_Base {
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

			.<?php $this->eid(); ?> .mml-col {
 				 display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
						flex-wrap: wrap;
				}

				.<?php $this->eid(); ?> li {
				width: 48%;
				max-width: 480px;
				margin: 0px;
				margin-top: 20px;
				}

				.<?php $this->eid(); ?> h2 {
				text-align: center;
				color: #333;
				margin-bottom: 30px;
				}

				.<?php $this->eid(); ?> h4 {
				color: #000;
				font-size: 20px;
				}

				.<?php $this->eid(); ?> p {
				color: #000;
				}

				@media (max-width: 680px) {
				.<?php $this->eid(); ?> .mml-col {
					-webkit-box-pack: center;
					-webkit-justify-content: center;
						-ms-flex-pack: center;
							justify-content: center;
				}
				.<?php $this->eid(); ?> li {
					width: 100%;
					max-width: 580px;
				}
				}

			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			/* insert style end */
			.<?php echo $this->id; ?> .btns{
				margin: 60px auto 0px;
				justify-content:center;
			}
			.<?php echo $this->id; ?> .btn{
				margin: 5px;
				background-color:#5f6776;
				color:#fff;
				border:1px solid #5f6776;
			}
			.<?php echo $this->id; ?> .btn-reverse{
				background: transparent;
				color:#5f6776;
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<ul class="mml-col">
						<li>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis part.</p>
						</li>
						<li>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis part.</p>
						</li>
						<li>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis part.</p>
						</li>
						<li>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis part.</p>
						</li>
						<li>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis part.</p>
						</li>
						<li>
							<h4>We Bring Impactful Digital Solutions</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis part.</p>
						</li>
					</ul>

					<div class="btns">
						<a href="/" class="btn">CTA Button</a>
						<a href="/" class="btn btn-reverse">CTA Button</a>
					</div>
				</div>
			</div>
		<?php
	}
}
