<?php

/*
	<?php
	?>
*/

class V2_Banner_nav_006  extends MML_Section_Base {
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
				padding:0px;
				background-image:url('http://via.placeholder.com/1920x620');
				background-repeat: no-repeat;
				background-position: top center;
			}
			.<?php $this->eid(); ?> .container{
				padding:0px 10px;
			}

			.<?php $this->eid(); ?> .banner-text{
				display: flex;
				align-items: center;
				justify-content: center;
				height:620px ;
			}
			.<?php $this->eid(); ?> .text{

			}

			.<?php $this->eid(); ?> h1{
				color: #333;
				margin-bottom: 10px;
				font-size: 48px;
			}
			.<?php $this->eid(); ?> h2{
				color: #333;
				margin-bottom: 25px;
				font-size: 36px;
			}

			.<?php $this->eid(); ?> p{
				color: #333;
			}

			.<?php $this->eid(); ?> .banner-list ul{
				display: flex;
				flex-wrap:wrap;
			}

			.<?php $this->eid(); ?> li{
				width: 25%;
				position: relative;
			}

			.<?php $this->eid(); ?> .b_content{
				position: absolute;
				width: 100%;
				left: 0%;
				top: 50%;
				transform: translate(0%,-50%);
				box-sizing: border-box;
				padding: 0px 10px;
			}

			.<?php $this->eid(); ?> h4{
				color:#fff;
				font-size: 24px;
				margin-bottom: 50px;
			}

			.<?php $this->eid(); ?> .mml-btn{
				box-sizing: border-box;
				padding: 16px 20px;
				max-width:226px;
				width: 100%;
				border:1px solid  #fff;
				border-radius: 50px;
				color: #fff;
				margin-top: 0px;
				display: inline-block;
				font-size: 16px;
				color: #fff;
				transition: all .6s;
			}

			.<?php $this->eid(); ?> .mml-btn:hover{
				opacity: .8;
			}

			@media(max-width:960px){
				.<?php $this->eid(); ?> .banner-list li{
					width:50%;
				}
				.<?php $this->eid(); ?> h4{
					margin-bottom: 20px;
				}
			}

			@media(max-width:540px){
				.<?php $this->eid(); ?> h4{
					font-size:20px;
					margin-bottom:15px;
				}
			}

			@media(max-width:480px){
				.<?php $this->eid(); ?> .banner-list li{
					width:100%;
					margin:10px auto;
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
						<div class="text">
							<h1>Water Bottles</h1>
							<h2>By thousands Of Buyers on Amazon</h2>
							<div class="content">
								<p>Beluga is a professional water bottle manufacturer and supplier in China, supplying all types of water bottles for various applications.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-list">
						<ul>
							<li>
								<img src="http://via.placeholder.com/480x480/5f6776" alt="">
								<div class="b_content">
									<h4>Buyers on Amazon</h4>
									<a href="" class="mml-btn">Get Free Sample</a>
								</div>
							</li>
							<li>
								<img src="http://via.placeholder.com/480x480/5f6776" alt="">
								<div class="b_content">
									<h4>Buyers on Amazon</h4>
									<a href="" class="mml-btn">Get Free Sample</a>
								</div>
							</li>
							<li>
								<img src="http://via.placeholder.com/480x480/5f6776" alt="">
								<div class="b_content">
									<h4>Buyers on Amazon</h4>
									<a href="" class="mml-btn">Get Free Sample</a>
								</div>
							</li>
							<li>
								<img src="http://via.placeholder.com/480x480/5f6776" alt="">								
								<div class="b_content">
									<h4>Buyers on Amazon</h4>
									<a href="" class="mml-btn">Get Free Sample</a>
								</div>
							</li>
						</ul>
					</div>
			</div>
		<?php
	}
}
