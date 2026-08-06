<?php

/*
	<?php
	?>
*/

class V1_Feature_067  extends MML_Section_Base {
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

			.<?php $this->eid(); ?> h2 {
				text-align: center;
				color: #333;
				}

				.<?php $this->eid(); ?> li {
				position: relative;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				padding-left: 100px;
				margin-top: 60px;
				}

				.<?php $this->eid(); ?> li > img {
				position: absolute;
				left: 0px;
				top: 0px;
				-webkit-border-radius: 50%;
						border-radius: 50%;
				min-height: 80px;
				}

				.<?php $this->eid(); ?> h4 {
				color: #000;
				}

				.<?php $this->eid(); ?> p {
				color: #999;
				}

				@media (max-width: 540px) {
				.<?php $this->eid(); ?> h2 {
					margin-bottom: 0px;
					padding-bottom: 0px;
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<ul class="mml-cols-2">
						<li>
							<img src="http://via.placeholder.com/80x80" alt="">
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
						</li>
						<li>
							<img src="http://via.placeholder.com/80x80" alt="">
							<h4>111</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
						</li>
						<li>
							<img src="http://via.placeholder.com/80x80" alt="">
							<h4>111</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
						</li>
						<li>
							<img src="http://via.placeholder.com/80x80" alt="">
							<h4>111</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
						</li>
						<li>
							<img src="http://via.placeholder.com/80x80" alt="">
							<h4>111</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
