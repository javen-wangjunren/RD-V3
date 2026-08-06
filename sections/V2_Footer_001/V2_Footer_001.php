<?php

/*
	<?php
	?>
*/

class V2_Footer_001  extends MML_Section_Base {
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
			.<?php $this->eid(); ?>::before{
				background-color: #5f6776;
			}
			.<?php $this->eid(); ?>::after{
				background-color: #e9eef4;
			}
			.<?php $this->eid(); ?> .f-left {
				color: #fefefe;
			}
			.<?php $this->eid(); ?> .f-right {
				color: #5f6776;
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
					<div class="f-left">
						<img src="https://via.placeholder.com/120x80?text=logo" alt="">
						<div class="footer-item">
							<h4 class="footer-tit">Contact Info</h4>
							<ul class="footer-contact">
								<li>
									<i class="fas fa-map-marker-alt"></i>Xinnan Industial Park, Guanyao Village, Shishan Town, Nanhai District, Foshan City,Guangdong Province,China
								</li>
								<li>
									<i class="fas fa-phone"></i>+8618925997599 / +861376095235
								</li>
								<li>
									<i class="fas fa-fax"></i>+86-757-85862900
								</li>
								<li>
									<i class="far fa-envelope"></i>shenbing@fnmetal.com / yoyo@fnmetal.com
								</li>
							</ul>
						</div>
						<div class="footer-item">
							<h4 class="footer-tit">Contact Info</h4>
							<ul class="footer-link">
								<li>
									<a href="">About Seven</a>
								</li>
								<li>
									<a href="">Blog</a>
								</li>
								<li>
									<a href="">Contact</a>
								</li>
							</ul>
						</div>
						<p class="cpr">©2019 FINE Aluminum Co.,Ltd All Rights Reserved.</p>
					</div>

					<div class="f-right">
						<div class="footer-item">
							<h4 class="footer-tit">Products</h4>
							<ul class="footer-link">
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
							</ul>
						</div>
						<div class="footer-item">
							<h4 class="footer-tit">Capabilities</h4>
							<ul class="footer-link">
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
							</ul>
						</div>
						<div class="footer-item">
							<h4 class="footer-tit">Industries</h4>
							<ul class="footer-link">
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
							</ul>
						</div>
						<div class="footer-item">
							<h4 class="footer-tit">Industries</h4>
							<ul class="footer-link">
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
								<li>
									<a href="">Industrial Profile</a>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		<?php
	}
}
