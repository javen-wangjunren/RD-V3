<?php

/*
	<?php
	?>
*/

class V2_Banner_nav_005  extends MML_Section_Base {
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
				padding: 0px;
			}

			.<?php $this->eid(); ?> .home-banner{
				display: flex;
				align-items: flex-end;
				box-sizing: border-box;
				padding-left: 150px;
			}

			.<?php $this->eid(); ?> .banner-text{
				width: 38%;
				max-width: 650px;;
				padding-bottom: 60px;
				/* padding-right: 20px; */
			}
			.<?php $this->eid(); ?> .banner-img{
				width: 56%;
				max-width: 970px;
				margin: 0 auto;
				margin-right: 0px;
			}

			.<?php $this->eid(); ?> button{
				transform: translate(0);
				border: unset;
				cursor: pointer;
				width: 90px;
				height: 88px;
				line-height: 88px;
				background-color: #5d6777;
				bottom: 7px;
				position: absolute;
				transition: all .3s;
				z-index: 5;
				top: 50%;
				transform: translateY(-50%);
			}
			.<?php $this->eid(); ?> button i{
				color: #fff;
			}
			.<?php $this->eid(); ?> button.slick-prev{
				left:-90px;
			}
			.<?php $this->eid(); ?> button.slick-next{
				left:0px;
			}

			.<?php $this->eid(); ?> h2{
				color: #333;
				margin-bottom: 20px;
				font-size: 36px;
			}
			.<?php $this->eid(); ?> h1{
				color: #333;
				margin-bottom: 20px;
				font-size: 48px;
			}

			.<?php $this->eid(); ?> button:hover{
				background-color: #fff;
			}

			.<?php $this->eid(); ?> button:hover i{
				color: #5d6777;
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
				margin-top: 50px;
				display: inline-block;
				font-size: 16px;
				color: #fff;
				transition: all .6s;
			}

			.<?php $this->eid(); ?> .mml-btn:hover{
				opacity: .8;
			}

			@media(max-width:1600px){
				.<?php $this->eid(); ?> .home-banner{
					padding-left:50px;
				}
				.<?php $this->eid(); ?> .banner-text{
					width: 36%;
				}
			}
			@media(max-width:1366px){
				.<?php $this->eid(); ?> .banner-text{
					width: 36%;
					padding-bottom:0px;
				}
			}

			@media(max-width:1200px){
				.<?php $this->eid(); ?>.mml-section{
					padding:80px 10px 0px;
					
				}
				.<?php $this->eid(); ?> .home-banner{
					align-items:center;
					padding-left:0px;
				}
				.<?php $this->eid(); ?> .banner-text{
					
				}
				.<?php $this->eid(); ?> button{
					width:40px;
					height: 40px;
					line-height: 40px;
				}

				.<?php $this->eid(); ?> button.slick-prev{
					left:-40px;
				}
			}

			@media(max-width:960px){
				.<?php $this->eid(); ?> .home-banner{
					flex-wrap:wrap;
				}

				.<?php $this->eid(); ?> .banner-text{
					width: 100%;
				}
				.<?php $this->eid(); ?> .banner-img{
					width: 100%;
					margin-top:30px;
				}
				.<?php $this->eid(); ?> button.slick-prev{
					left:-10px;
				}
				.<?php $this->eid(); ?> button.slick-next{
					right:-10px;

				}
				.<?php $this->eid(); ?>  h1{
					font-size: 36px;
				}
				.<?php $this->eid(); ?>  h2{
					font-size: 32px;
				}
			}

			@media(max-width:540px){
				.<?php $this->eid(); ?>  h1{
					font-size: 32px;
				}
				.<?php $this->eid(); ?>  h2{
					font-size: 28px;
				}
				.<?php $this->eid(); ?> button.slick-prev{
					left:0px;
				}
				.<?php $this->eid(); ?> button.slick-next{
					right:0px;

				}
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
		(function($){
			$(document).ready(function(){
				$('.<?php $this->eid(); ?> .slicker').slick({
					arrows:true,
					infinite: true,
					prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
					nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            		dots:false 
				});
			});
		
		})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="home-banner">
					<div class="banner-text">
						<h1>Water Bottles</h1>
						<h2>By thousands Of Buyers on Amazon</h2>
						<div class="content">
							<p>Beluga is a professional water bottle manufacturer and supplier in China, supplying all types of water bottles for various applications.</p>
							<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
							<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. Now our stylish water bottles are widely welcome in over 50 countries, especially in the USA and European.</p>
						</div>
						<a href="" class="mml-btn">Get Free Sample</a>
					</div>
					<div class="banner-img">
						<ul class="slicker">
							<li>
								<img src="http://via.placeholder.com/970x850" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/970x850" alt="">
							</li>
							<li>
								<img src="http://via.placeholder.com/970x850" alt="">
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
