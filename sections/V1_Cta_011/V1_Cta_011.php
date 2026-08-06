<?php

/*
	<?php
	?>
*/

class V1_Cta_011  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> .mml-text > p {
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .pre-heading {
				color: #03a67b;
				font-size: 20px;
				font-weight: 600;
			}
			.<?php $this->eid(); ?> h2 {
				color: #222;
			}
			.<?php $this->eid(); ?> .list {
				display: flex;
				flex-wrap: wrap;
				color: #000;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				display: flex;
				align-items: center;
				width: 33.3333%;
				padding: 10px 20px 10px 0;
			}
			.<?php $this->eid(); ?> .list img,
			.<?php $this->eid(); ?> .list i {
				margin: 0 10px 0 0;
				color: #03a67b;
			}
			.<?php $this->eid(); ?> .list span {
				flex: 1 1 0;
			}
			.<?php $this->eid(); ?> .links {
				width: 33%;
				max-width: 380px;
				box-sizing: border-box;
				padding: 0 10px 0 80px;
				border-left: 1px solid #ebebeb;
			}
			.<?php $this->eid(); ?> .links > li {
				margin: 15px 0;
			}
			.<?php $this->eid(); ?> .links a{
				border-bottom: 1px solid transparent;
			}
			.<?php $this->eid(); ?> .links a:hover {
				color: #03a67b;
				border-color: #03a67b;
			}
			@media (max-width: 940px) {
				.<?php $this->eid(); ?> .links {
					padding: 0 20px;
					width: 20%;
				}
			}
			@media (max-width: 720px) {
				.<?php $this->eid(); ?> .list > li {
					width: 50%;
				}
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					margin: 0 0 30px;
				}
				.<?php $this->eid(); ?> .links {
					width: unset;
					max-width: unset;
					border: none;
				}
				.<?php $this->eid(); ?> .links > li {
					margin: 5px 0;
					text-align: center;
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
				<div class="container">
					<div class="mml-text">
						<b class="pre-heading">The Digital Marketing Expert</b>
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Room A3-01, 1904 Creative Industrial Park, Osaka Warehouse, 36 Xinmin Eighth Street, Xinhua Road, Haizhu District, Guangzhou</p>
						<ul class="list">
							<li>
								<img src="https://via.placeholder.com/18x18/585f6b/e9eef4?text=I" alt="">
								<span>+86-20-81534532</span>
							</li>
							<li>
								<img src="https://via.placeholder.com/18x18/585f6b/e9eef4?text=I" alt="">
								<span>info@mmldigi.com</span>
							</li>
						</ul>
					</div>

					<ul class="links">
						<li><a href="javascript:;">About Us</a></li>
						<li><a href="javascript:;">Products</a></li>
						<li><a href="javascript:;">Contact Us</a></li>
						<li><a href="javascript:;">Customization</a></li>
						<li><a href="javascript:;">Support</a></li>
						<li><a href="javascript:;">Solutions</a></li>
					</ul>

				</div>
			</div>
		<?php
	}
}
