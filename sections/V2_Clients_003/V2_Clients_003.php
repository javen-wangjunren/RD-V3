<?php

/*
	<?php
	?>
*/

class V2_Clients_003  extends MML_Section_Base {
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

			.v2_clients_003 {
				position: relative;
			}

			.v2_clients_003::before {
				display: block;
				content: '';
				width: 60%;
				height: 402px;
				background-color: #5d6777;
				max-width: 1150px;
				position: absolute;
				left: 0;
				z-index: -1;
			}
			.v2_clients_003 h1 {
				color: #ffffff;
				max-width: 430px;
				text-align: left;
				margin-top: 80px;
			}
			.v2_clients_003 .top-wrap {
				display: flex;
				align-items: center;
				background-color: #ffffff;
				box-shadow: 0px 4px 21px 0px 
					rgba(0, 0, 0, 0.07);
				padding: 80px;
				margin-top: 60px;
				position: relative;
				justify-content: space-between;
			}
			.v2_clients_003 .top-wrap p {
				max-width: 478px;
				width: 47%;
				color: #353535;
				text-align: left;
				margin: 0;
			}
			.v2_clients_003 .bottom-wrap {
				margin-top: 70px;
			}
			.v2_clients_003 .header {
				display: flex;
				align-items: center;
			}
			.v2_clients_003 h2 {
				font-size: 48px;
				color: #5d6777;
			}
			.v2_clients_003 .my-dots {
				margin-left: auto;
			}
			.v2_clients_003 .slick-dots button {
				width: 8px;
				height: 8px;
				background-color: #c7c7c7;
			}
			.v2_clients_003 .slick-active button{
				width: 35px;
				background-color: #5f6776;
			}
			.v2_clients_003 .content-wrap {
				display: flex;
				margin-top: 10px;
			}
			.v2_clients_003 .content-wrap p{
				max-width: 440px;
				width: 43%;
				color: #353535;
				text-align: left;
				margin: 0;
			}
			.v2_clients_003 .img-slicker {
				margin-left: auto;
				max-width: 580px;
				width: 50%;
			}
			.v2_clients_003 .slick-slide {
				margin: 0 5px;
			}

			@media (max-width:768px) {
				.v2_clients_003::before {
					width: 100%;
					max-width:100%;
				}
				.v2_clients_003 h1 {
					margin-top: 40px;
					width: 100%;
					max-width: 100%;
					text-align: center;
				}
				.v2_clients_003 .top-wrap {
					margin-top: 40px;
					padding: 40px 20px;
				}
			}
			@media (max-width:540px) {
				.v2_clients_003 .top-wrap {
					display: block;
				}
				.v2_clients_003 .top-wrap p {
					width: 100%;
					max-width: 100%;
				}
				.v2_clients_003 .top-wrap p:nth-of-type(2) {
					margin-top: 20px;
				}
				.v2_clients_003 .content-wrap {
					display: block;
				}
				.v2_clients_003 .bottom-wrap {
					margin-top:40px;
				}
				.v2_clients_003 .bottom-wrap p {
					max-width: 100%;
					width: 100%;
				}
				.v2_clients_003 .img-slicker {
					margin: 30px auto 0;
					max-width: 100%;
					width: 100%;
				}
			}

			@media (max-width:380px) {
				.v2_clients_003 .slick-active button{
					width: 20px;
					background-color: #5f6776;
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
				$('.v2_clients_003 .img-slicker').slick({
					slidesToShow: 3,
					autoplay: true,
					slidesToScroll: 3,
					arrows:false,
					dots:true,
					appendDots:'.v2_clients_003 .header .my-dots',
					responsive: [
						{
							breakpoint: 600,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 3
							}
						},
						{
							breakpoint: 450,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2,
							}
						}
						
					]
					});
			});
		})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start -->
				<div class="container">
					<h1>Trusted By Global Brands</h1>
					<div class="top-wrap">
						<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
						<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
					</div>
					<div class="bottom-wrap">
						<div class="header">
							<h2>Our Clients</h2>
							<div class="my-dots"></div>
						</div>
						<div class="content-wrap">
							<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days</p>
							<ul class="img-slicker">
								<li>
									<img src="https://dummyimage.com/180x105" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/180x105" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/180x105" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/180x105" alt="">
								</li>
								<li>
									<img src="https://dummyimage.com/180x105" alt="">
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- insert html end -->
			</div>
		<?php
	}
}
