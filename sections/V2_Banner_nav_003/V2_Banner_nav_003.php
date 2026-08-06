<?php

/*
	<?php
	?>
*/

class V2_Banner_nav_003  extends MML_Section_Base {
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
				width: 1920px;
				max-width: 100%;
				overflow: hidden;
			}

			.<?php $this->eid(); ?> .container{
				position: relative;
			}

			.<?php $this->eid(); ?> .banner-text{
				max-width:580px;
				padding-top:60px;
			}

			.<?php $this->eid(); ?> h1{
				color: #333;
				margin-bottom: 40px;
			}

			.<?php $this->eid(); ?> p{
				color: #353535;
			}

			.<?php $this->eid(); ?> .mml-btn{
				box-sizing: border-box;
				padding: 16px 50px;
				background-color: #5d6777;
				border-radius: 50px;
				color: #fff;
				margin-top: 120px;
				display: inline-block;
				font-size: 16px;
				color: #fff;
				transition: all .6s;
			}

			.<?php $this->eid(); ?> .mml-btn:hover{
				opacity: .8;
			}

			.<?php $this->eid(); ?> .img-wrap{
				position: absolute;
				top: 0px;
				right: -370px;
				z-index: -1;
			}

			.<?php $this->eid(); ?> ul.list{
				display: flex;
				justify-content: space-between;
				box-sizing: border-box;
				background-color: #ffffff;
				box-shadow: 0px 4px 46px 0px 
					rgba(0, 0, 0, 0.13);
				border-radius: 5px;
				text-align: center;
				margin-top:60px;
			}

			.<?php $this->eid(); ?> li{
				box-sizing: border-box;
				padding: 40px 30px;
			}

			.<?php $this->eid(); ?> b{
				font-size:48px;
				color: #333;
			}

			@media(max-width:960px){
				.<?php $this->eid(); ?> li{
					box-sizing: border-box;
					padding: 40px 10px;
				}

				.<?php $this->eid(); ?> .mml-btn{
					margin-top:60px;
				}

				.<?php $this->eid(); ?> b{
					font-size: 36px;
				}
				.<?php $this->eid(); ?> h1{
					font-size:36px;
					
				}

			}

			@media(max-width:768px){
				.<?php $this->eid(); ?> ul.list{
					flex-wrap:wrap;
				}
				.<?php $this->eid(); ?> li {
					width:48%;
				}
			}

			@media(max-width:480px){
				.<?php $this->eid(); ?> h1{
					font-size:32px;
					margin-bottom:15px;
				}
				.<?php $this->eid(); ?> .mml-btn{
					margin-top:30px;
				}
				.<?php $this->eid(); ?> li {
					width: 100%;
					padding: 15px 20px;
				}
				.<?php $this->eid(); ?> b{
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
					<div class="banner-text">
						<h1>Water Bottles</h1>
						<div class="content">
							<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
						</div>
						<a href="" class="mml-btn">Get Free Sample</a>
					</div>
					<div class="banner-list">
						<ul class="list">
							<li>
								<b>18+</b>
								<p>Beluga is a professional water bottle manufacturer </p>
							</li>
							<li>
								<b>5000</b>
								<p>Beluga is a professional water bottle manufacturer </p>
							</li>
							<li>
								<b>60000</b>
								<p>Beluga is a professional water bottle manufacturer </p>
							</li>
							<li>
								<b>200+</b>
								<p>Beluga is a professional water bottle manufacturer </p>
							</li>
						</ul>
					</div>
					<div class="img-wrap">
						<img src="http://via.placeholder.com/1175x600" alt="">
					</div>
				</div>
			</div>
		<?php
	}
}
