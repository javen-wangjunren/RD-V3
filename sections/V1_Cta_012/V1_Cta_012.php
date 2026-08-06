<?php

/*
	<?php
	?>
*/

class V1_Cta_012  extends MML_Section_Base {
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
				padding:40px 10px;
						}
			.<?php $this->eid(); ?> {
			position: relative;
			}

			.<?php $this->eid(); ?>:after {
			content: '';
			display: block;
			width: 50%;
			position: absolute;
			height: 100%;
			background-color: #03a67b;
			right: 0px;
			top: 0px;
			z-index: -1;
			}

			.<?php $this->eid(); ?> .container {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: justify;
			-webkit-justify-content: space-between;
				-ms-flex-pack: justify;
					justify-content: space-between;
			}

			.<?php $this->eid(); ?> .col-title {
			width: 45%;
			}

			.<?php $this->eid(); ?> .col-text {
			width: 45%;
			}

			.<?php $this->eid(); ?> .col-text h2 {
			color: #fff;
			}

			.<?php $this->eid(); ?> .col-text p {
			color: #fff;
			}

			.<?php $this->eid(); ?> a.links {
			display: inline-block;
			color: #fff;
			margin-top: 40px;
			border-bottom: 1px solid #fff;
			}

			.<?php $this->eid(); ?> a.links i {
			margin-left: 8px;
			}

			.<?php $this->eid(); ?> a.btn {
			margin: 0px;
			}

			.<?php $this->eid(); ?> h2 {
			color: #333;
			}

			.<?php $this->eid(); ?> p {
			color: #999;
			}

			.<?php $this->eid(); ?> a.btn {
			background-color: #03a67b;
			color: #fff;
			margin-top: 40px;
			}

			@media (max-width: 768px) {
			.<?php $this->eid(); ?>:after {
				display: none;
			}
			.<?php $this->eid(); ?> .container {
				-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
						flex-wrap: wrap;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
			}
			.<?php $this->eid(); ?> .col-text {
				width: 100%;
				margin-top: 30px;
			}
			.<?php $this->eid(); ?> .col-text h2 {
				color: #333;
			}
			.<?php $this->eid(); ?> .col-text p {
				color: #999;
			}
			.<?php $this->eid(); ?> a.links {
				color: #333;
			}
			.<?php $this->eid(); ?> .col-title {
				width: 100%;
			}
			.<?php $this->eid(); ?> h2 {
				font-size: 32px;
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
					<div class="col-title">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>
						<a href="" class="btn">Contact Us</a>
					</div>
					<div class="col-text">
						<h2>Need More Support?</h2>
						<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>
						<a href="" class="links">Ask for help<i class="fas fa-long-arrow-alt-right" ></i></a>
					</div>
				</div>
			</div>
		<?php
	}
}
