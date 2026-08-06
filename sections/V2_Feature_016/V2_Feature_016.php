<?php

/*
	<?php
	?>
*/

class V2_Feature_016  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2{
				color: #333333;
				margin-bottom:30px;
			}
			.<?php $this->eid(); ?> .list > li{
				background-color: #f5f7f7;

			}
			.<?php $this->eid(); ?> .list > li:hover{
				background-color: #fff;
                box-shadow: 42px 42px 120px 0px rgba(105, 111, 114, 0.1);
			}
			.<?php $this->eid(); ?> .list h4{
				color: #4d4d4d;
				font-size: 20px;
			}
			.<?php $this->eid(); ?> .list p{
				color: #808080;
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
					<h2>Why Choose Yoon</h2>
					<ul class="list mml-cols-4">
						<li>
							<h4>Next-day Delivery</h4>
							<p>We supply you with various product packaging options to suit your customs.</p>
							<div class="icon">
								<img src="https://via.placeholder.com/60x60" alt="">
							</div>
						</li>
						<li>
							<h4>Packaging on Demand</h4>
							<p>We supply you with various product packaging options to suit your customs.</p>
							<div class="icon">
								<img src="https://via.placeholder.com/60x60" alt="">
							</div>
						</li>
						<li>
							<h4>Quality Manufacturing</h4>
							<p>We supply you with various product packaging options to suit your customs.</p>
							<div class="icon">
								<img src="https://via.placeholder.com/60x60" alt="">
							</div>
						</li>
						<li>
							<h4>Worldwide Shipping</h4>
							<p>We supply you with various product packaging options to suit your customs.</p>
							<div class="icon">
								<img src="https://via.placeholder.com/60x60" alt="">
							</div>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
