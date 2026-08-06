<?php

/*
	<?php
	?>
*/

class V1_Feature_061_1  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> section {
				max-width: 980px;
				margin: 0 auto;
			}

			.<?php $this->eid(); ?> h2 {
				color: #333;
			}

			.<?php $this->eid(); ?> p {
				color: #999;
			}

			.<?php $this->eid(); ?> li {
				background-color: #ffffff;
				-webkit-box-shadow: 0px 4px 16px 0px rgba(0, 0, 0, 0.16);
						box-shadow: 0px 4px 16px 0px rgba(0, 0, 0, 0.16);
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				padding: 60px;
				position: relative;
			}

			.<?php $this->eid(); ?> li:hover h4 {
				color: #03a67b;
			}

			.<?php $this->eid(); ?> li:hover a.links {
				background-color: #03a67b;
				color: #fff;
			}

			.<?php $this->eid(); ?> a.links {
				display: block;
				position: absolute;
				left: 0px;
				bottom: 0px;
				width: 100%;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				padding: 10px;
				color: #b3b3b3;
				background-color: #e6e6e6;
				-webkit-box-shadow: 0px 4px 16px 0px rgba(0, 0, 0, 0.16);
						box-shadow: 0px 4px 16px 0px rgba(0, 0, 0, 0.16);
				-webkit-transition: all .3s;
				-o-transition: all .3s;
				transition: all .3s;
			}

			.<?php $this->eid(); ?> a.links i {
				margin-left: 8px;
			}

			.<?php $this->eid(); ?> h4 {
				color: #333;
				font-size: 20px;
			}

			.<?php $this->eid(); ?> ul.list {
				margin-top: 40px;
			}

			@media (max-width: 540px) {
				.<?php $this->eid(); ?> li {
					padding: 60px 20px;
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
					<section>
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
						<ul class="list mml-cols-2">
							<li>
								<h4>Heading 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euistmod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="" class="links">View More<i class="fas fa-arrow-right"></i></a>
							</li>
							<li>
								<h4>Heading 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euistmod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="" class="links">View More<i class="fas fa-arrow-right"></i></a>
							</li>
						</ul>
					</section>
				</div>
			</div>
		<?php
	}
}
