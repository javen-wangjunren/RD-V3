<?php

/*
	<?php
	?>
*/

class V2_Banner_nav_007  extends MML_Section_Base {
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
			/* insert style end */
			.<?php $this->eid(); ?> .container{
				width: 1400px;
			}
			.<?php $this->eid(); ?> .banner-text{
				display:flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .title-wrap{
				width:54%;
				max-width: 680px;
			}
			.<?php $this->eid(); ?> .des-wrap{
				width: 44%;
				max-width: 480px;
				margin: 0 auto;
				margin-right: 0px;
				align-items: center;
			}

			.<?php $this->eid(); ?> h1{
				color: #333;
				margin-bottom: 10px;
				font-size: 48px;
			}
			.<?php $this->eid(); ?> h2{
				color: #333;
				margin-bottom: 0px;
				font-size: 36px;
			}

			.<?php $this->eid(); ?> p{
				color: #333;
			}

			.<?php $this->eid(); ?> .line{
				width: 208px;
				height: 7px;
				background-color: #5f6776;
				margin-top: 90px;
			}

			.<?php $this->eid(); ?> .banner-pic{
				margin-top:40px;
				display: flex;
			}

			.<?php $this->eid(); ?> .leftpic{
				width: 38%;
				max-width:520px;
			}
			.<?php $this->eid(); ?> .rightpic{
				width: 58%;
				max-width:800px;
				margin: 0 auto;
				margin-right: 0px;
			}

			@media(max-width:680px){
				.<?php $this->eid(); ?> .banner-text, .<?php $this->eid(); ?> .banner-pic{
					flex-wrap:wrap;
					justify-content:center;
				}
				.<?php $this->eid(); ?> .title-wrap,.<?php $this->eid(); ?> .des-wrap{
					width:100%;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .title-wrap .line{
					display: none;
				}
				.<?php $this->eid(); ?> .des-wrap{
					margin-top:20px;
				}
				.<?php $this->eid(); ?> .leftpic , .<?php $this->eid(); ?> .rightpic{
					width: 100%;
				}
				.<?php $this->eid(); ?> .rightpic{
					margin-top:20px;
				}
				.<?php $this->eid(); ?>  h1{
					font-size: 32px;
				}
				.<?php $this->eid(); ?>  h2{
					font-size: 28px;
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
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<div class="banner-text">
						<div class="title-wrap">
							<h1>Water Bottles</h1>
							<h2>By thousands Of Buyers on Amazon</h2>
							<div class="line"></div>
						</div>
						<div class="des-wrap">
							<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
							<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. Now our stylish water </p>
						</div>
					</div>
					<div class="banner-pic">
						<div class="leftpic">
							<img src="http://via.placeholder.com/520x210" alt="">
						</div>
						<div class="rightpic">
							<img src="http://via.placeholder.com/800x210" alt="">
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
