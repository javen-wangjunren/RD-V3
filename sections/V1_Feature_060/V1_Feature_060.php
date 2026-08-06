<?php

/*
	<?php
	?>
*/

class V1_Feature_060  extends MML_Section_Base {
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

			.<?php $this->eid(); ?> h2 {
				color: #333;
			}

			.<?php $this->eid(); ?> p {
				color: #000;
				max-width: 960px;
				margin: 0 auto;
			}

			.<?php $this->eid(); ?> h4 {
				margin-bottom: 0px;
				margin-top: 18px;
				color: #000;
			}

			.<?php $this->eid(); ?> img {
				-webkit-border-radius: 50%;
				border-radius: 50%;
			}

			.<?php $this->eid(); ?> .list {
				margin-top: 50px;
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
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. </p>
					<ul class="list mml-cols-4">
						<li>
							<img src="http://via.placeholder.com/200x200" alt="">
							<h4>Heading 3</h4>
						</li>
						<li>
							<img src="http://via.placeholder.com/200x200" alt="">
							<h4>Heading 3</h4>
						</li>
						<li>
							<img src="http://via.placeholder.com/200x200" alt="">
							<h4>Heading 3</h4>
						</li>
						<li>
							<img src="http://via.placeholder.com/200x200" alt="">
							<h4>Heading 3</h4>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
