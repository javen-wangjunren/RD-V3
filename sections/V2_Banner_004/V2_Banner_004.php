<?php

/*
	<?php
	?>
*/

class V2_Banner_004  extends MML_Section_Base {
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
			.<?php $this->eid(); ?>.mml-section {
				padding: 0;
			}
			.<?php $this->eid(); ?> .banner-box{
				height: 805px;
				max-height: 805px;
				background: url('https://via.placeholder.com/1920x805/333333') no-repeat;
           	 	background-position: center;
				height:805px;
			}
			.<?php $this->eid(); ?> .banner-box .container{
				padding: 0 10px;
				display: flex;
				height: 100%;
				align-items: center
			}
			.<?php $this->eid(); ?> .banner-box .mml-text{
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .banner-box .mml-text h1{
				max-width: 440px;
				font-size: 58px;
				margin-bottom: 25px
			}
			.<?php $this->eid(); ?> .banner-box .mml-text p{
				max-width: 570px;
			}
			.<?php $this->eid(); ?> .banner-box .mml-text .btn{
				width: 190px;
				height: 50px;
				border-radius: 5px;
				border: solid 1px #dfd7b8;
				margin-top: 50px;
			}

			.<?php $this->eid(); ?> .banner-text{
			}
			.<?php $this->eid(); ?> .banner-text .container{
				padding: 0 10px;
				display: flex;
				justify-content: space-between
			}
			.<?php $this->eid(); ?> .banner-text .mml-text{
				position: relative;
				padding-top: 20px;
				/* display: flex;
				flex-direction: column; */
				/* justify-content: center; */
			}
			.<?php $this->eid(); ?> .banner-text p{
				color: #333333;
				max-width: 387px;
				margin-bottom: 30px;
			}
			.<?php $this->eid(); ?> .banner-text h3{
				font-size: 20px;
				color: #333333;
			}
			.<?php $this->eid(); ?> .banner-text hr{
				position: absolute;
				width: 50px;
				height: 1px;
				background-color: #333333;
				bottom: 35%;
			}
			.<?php $this->eid(); ?> .banner-text .mml-video{
				transform: translateY(-35%);
			}
			i{
				color: #fff;
			}
			@media screen and (max-width:960px) {
				.<?php $this->eid(); ?> .banner-text{
					padding: 20px 0;
				}
				.<?php $this->eid(); ?> .banner-text .mml-video{
					transform: none;
				}
				.<?php $this->eid(); ?> .banner-text hr{
					bottom: 0;
				}
			}
			@media screen and (max-width:768px) {
				.<?php $this->eid(); ?> .banner-text .container{
					flex-direction: column;
				}
				.<?php $this->eid(); ?> .banner-text .mml-text{
					margin-bottom: 20px;
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
				<!-- insert html start -->
				
				<div class="banner-box">
					<div class="container">
						<div class="mml-text">
							<h1>Your diligent supplier</h1>
							<p>Duis dignissim mi ut laoreet mollis. Nunc id tellus finibus, eleifend mi vel, maximus justo laoreet</p>
							<a class="btn" href="/">CTA Button</a>
						</div>
					</div>
				</div>
				<div class="banner-text">
					<div class="container">
						<div class="mml-text">
							<p>Each time, we aim to fine-tune eachdetail to perfection so that your  wedding party is perfect.</p>
							<h3>MICHAEL WILLIAMS, CEO</h3>
							<hr/>
						</div>
						<div class="mml-video">
							<img src="https://via.placeholder.com/680x355/4e4e4e" alt="">
							<a href="/" class="vp-a">
								<i class="fa fa-play-circle"></i>
							</a>
						</div>
					</div>
				</div>
				
				<!-- insert html end -->
			</div>
		<?php
	}
}
