<?php

/*
	<?php
	?>
*/

class V2_Clients_002  extends MML_Section_Base {
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

			.v2_clients_002 {
				position: relative;
			}

			.v2_clients_002::before {
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
			.v2_clients_002 h1 {
				color: #ffffff;
				max-width: 430px;
				text-align: left;
				margin-top: 80px;
			}

			.v2_clients_002 .wrap {
				display: flex;
				align-items: center;
				background-color: #ffffff;
				box-shadow: 0px 4px 21px 0px 
					rgba(0, 0, 0, 0.07);
				padding: 80px 40px;
				margin-top: 60px;
				position: relative;
			}
			.v2_clients_002 p {
				max-width: 440px;
				width: 38%;
				color: #353535;
				text-align: left;
			}
			.v2_clients_002 .img-slicker {
				max-width:580px;
				width: 53%;
				margin-left: auto;
			}
			.v2_clients_002 .slick-slide {
				margin: 0 5px;
			}
			.v2_clients_002 .btns-wrap {
				position: absolute;
				display: flex;
				align-items: center;
				justify-content: center;
				bottom: 0;
				right: 40px;
				transform: translateY(50%);
			}
			.v2_clients_002 .arrow-btn {
				width: 60px;
				height: 60px;
				background-color: #ffffff;
				box-shadow: 0px 3px 24px 0px 
					rgba(162, 178, 198, 0.39);
				display: flex;
				align-items: center;
				justify-content: center;
				color: #5f6775;
				border-radius: 50%;
				cursor: pointer;
			}
			.v2_clients_002 .arrow-prev {
				margin-right: 60px;
			}

			@media (max-width:768px) {
				.v2_clients_002::before {
					width: 100%;
					max-width:100%;
				}
				.v2_clients_002 h1 {
					margin-top: 40px;
					width: 100%;
					max-width: 100%;
					text-align: center;
				}
				.v2_clients_002 .wrap {
					display: block;
					padding: 40px 20px;
					margin-top: 40px;
				}
				.v2_clients_002 p {
					width: 100%;
					max-width:100%;
				}
				.v2_clients_002 .img-slicker {
					margin: 30px auto 0;
					width: 100%;
					max-width:100%;
				}
				.v2_clients_002 .btns-wrap {
					right: 50%;
					transform: translateX(50%) translateY(50%);
				}
				.v2_clients_002 .arrow-btn {
					width: 40px;
					height: 40px;
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
				$('.v2_clients_002 .img-slicker').slick({
					slidesToShow: 3,
					autoplay: true,
					slidesToScroll: 3,
					prevArrow: ".v2_clients_002 .arrow-prev",
					nextArrow: ".v2_clients_002 .arrow-next",
					responsive: [
						{
							breakpoint: 800,
							settings: {
								slidesToShow: 4,
								slidesToScroll: 4,
							}
						},
						{
							breakpoint: 600,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 3,
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
					<div class="wrap">
						<p>
						Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.
						</p>
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
						<div class="btns-wrap">
							<div class="arrow-btn arrow-prev ">
								<i class="fas fa-chevron-left"></i>
							</div>
							<div class="arrow-btn arrow-next">
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>
				
				</div>
				<!-- insert html end -->
			</div>
		<?php
	}
}
