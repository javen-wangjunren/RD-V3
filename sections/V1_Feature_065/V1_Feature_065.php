<?php

/*
	<?php
	?>
*/

class V1_Feature_065  extends MML_Section_Base {
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

			.<?php echo $this->id; ?> h2 {
				color: #000;
				margin-bottom: 50px;
				}

				.<?php echo $this->id; ?> h3 {
				color: #5f6776;
				}

				.<?php echo $this->id; ?> p {
				color: #000;
				}

				.<?php echo $this->id; ?> span {
				color: #000;
				}

				

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

			@media (max-width: 540px) {
				.<?php echo $this->id; ?> h2 {
					margin-bottom: 20px;
				}
				.<?php echo $this->id; ?> .btns {
					margin: 20px auto 0px;
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
				<div class="container">
					<h2>We Bring Impactful Digital Solutions</h2>
					<ul class="mml-cols-4">
						<li>
							<span>Heading 3</span>
							<h3>60million</h3>
							<p>Digital Branding</p>
						</li>
						<li>
							<span>Heading 3</span>
							<h3>860㎡</h3>
							<p>Social Media Marketing</p>
						</li>
						<li>
							<span>Heading 3</span>
							<h3>6500pcs</h3>
							<p>Search Engine Optimization</p>
						</li>
						<li>
							<span>Heading 3</span>
							<h3>750+</h3>
							<p>Digital Marketing</p>
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
