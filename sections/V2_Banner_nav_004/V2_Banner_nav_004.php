<?php

/*
	<?php
	?>
*/

class V2_Banner_nav_004  extends MML_Section_Base {
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
				
				background-image:url('http://via.placeholder.com/1920x500') ;
				background-position:top center;
				padding: 0px 10px;
				background-repeat: no-repeat;
			}

			.<?php $this->eid(); ?> .container{
				<!-- display:flex;
				align-items: center;
				/* height: 500px; */
				position: relative; -->
			}

			.<?php $this->eid(); ?>  .banner-text{
				max-width:580px;
				height: 500px;
				padding-top:100px;
				box-sizing: border-box;
			}
			.<?php $this->eid(); ?> h1,.<?php $this->eid(); ?> h2{
				color: #333;
				margin-bottom: 40px;
				font-size: 48px;
			}

			.<?php $this->eid(); ?> .banner-text ul{
				margin-top:40px;
			}

			.<?php $this->eid(); ?> .banner-text li{
				margin:10px 0px;
				position: relative;
				box-sizing: border-box;
				padding-left: 15px;
				font-size:16px;
				color:#808080;
			}

			.<?php $this->eid(); ?> .banner-text li:before{
				content:'';
				display: block;
				width: 8px;
				height: 8px;
				background-color: #333;
				border-radius: 50%;
				position: absolute;
				top:8px;
				left: 0px;
			}
			.<?php $this->eid(); ?> p{
				color: #353535;
			}

			.<?php $this->eid(); ?> .mml-col{
				display:flex;
				align-items: flex-end;
				margin-top:-120px;
			}

			.<?php $this->eid(); ?> .mml-col h2{
				margin-bottom: 0px;
				max-width: 480px;
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

			.<?php $this->eid(); ?> h3{
				font-size: 36px;
				color: #333;
			}

			.<?php $this->eid(); ?> .col-left{
				padding-bottom: 50px;
				width:56%;
				max-width:680px;
			}

			.<?php $this->eid(); ?> .col-left p{
				max-width:530px;
			}

			.<?php $this->eid(); ?> .col-right{
				width:42%;
				max-width: 480px;
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
			}

			.<?php $this->eid(); ?> button.slick-prev{
				left: -90px;
			}

			.<?php $this->eid(); ?> button:hover{
				background-color: #fff;
			}

			.<?php $this->eid(); ?> button:hover i{
				color: #5d6777;
			}

			.<?php $this->eid(); ?> .slicker i{
				color: #fff;
			}


			@media(max-width:960px){
				.<?php $this->eid(); ?> h1,h2{
					font-size:36px;
					margin-bottom:20px;
				}
				.<?php $this->eid(); ?> h3{
					font-size:32px;
					margin-bottom:20px;
				}
			}

			@media(max-width:768px){
				.<?php $this->eid(); ?> .mml-col{
					flex-wrap:wrap;
					margin-top:20px;
					justify-content:center;
				}
				.<?php $this->eid(); ?> .col-left{
					width:100%;
				}
				.<?php $this->eid(); ?> .col-right{
					width:100%;
					margin:0 auto;
				}
				.<?php $this->eid(); ?> button{
					bottom:unset;
					top:50%;
					transform: translateY(-50%);
					
				}

				.<?php $this->eid(); ?> button.slick-prev{
					left:-10px;
				}
				.<?php $this->eid(); ?> button.slick-next{
					right:-10px;
				}

			}

			@media(max-width:540px){
				
				.<?php $this->eid(); ?> h1,h2{
					font-size:32px;
				}
				.<?php $this->eid(); ?> h3{
					font-size:26px;
				}

				.<?php $this->eid(); ?> button.slick-prev{
					left:0px;
				}
				.<?php $this->eid(); ?> button.slick-next{
					right:0px;
				}

				.<?php $this->eid(); ?> button{
					width:40px;
					height: 40px;
					line-height: 40px;
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
				<div class="container">
					<div class="banner-text">
						<div class="text">
							<h1>Water Bottles</h1>
							<div class="content">
								<p>Beluga is a professional water bottle manufacturer and supplier in China, supplying all types of water bottles for various applications.</p>
							</div>
							<ul>
								<li>Low MOQ to support your business</li>
								<li>15%-25% lower wholesale prices from our water bottle factory</li>
							</ul>
						</div>
					</div>
					<div class="mml-col">
						<div class="col-left">
							<h2>Proven Best-Selling  Faucet</h2>
							<h3>By thousands Of Buyers on Amazon</h3>
							<p>Beluga is a professional water bottle manufacturer and supplier in China, supplying all types of water bottles for various applications.</p>
							<a href="" class="mml-btn">View More</a>
						</div>
						<div class="col-right">
							<ul class="slicker" >
								<li>
									<img src="http://via.placeholder.com/480x600" alt="">
								</li>
								<li>
									<img src="http://via.placeholder.com/480x600" alt="">
								</li>
								<li>
									<img src="http://via.placeholder.com/480x600" alt="">
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
