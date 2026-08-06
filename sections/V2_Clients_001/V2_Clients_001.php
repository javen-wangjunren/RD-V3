<?php

/*
	<?php
	?>
*/

class V2_Clients_001  extends MML_Section_Base
{
	function __construct($id, $style, $content)
	{
		parent::__construct($id, $style, $content);
	}

	public function set_default_value()
	{
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
	}

	public function style()
	{
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
		.v2_clients_001 .line {
			text-align: left;
			width: 180px;
			height: 2px;
			background-color: #5d6777;
		}
		.v2_clients_001 .top-wrap {
			display: flex;
			margin-top: 80px;
		}
		.v2_clients_001 .text-slicker {
			width: 660px;
			max-width: 56%;
			
		}
		.v2_clients_001 .right-wrap {
			display: flex;
			margin-left: auto;
		}
		.v2_clients_001 h1 {
			text-align: left;
			color: #353535;
		}
		.v2_clients_001 p {
			text-align: left;
			color: #353535;
			margin-top: 20px;
		}
		.v2_clients_001 span {
			display: block;
			margin-top: 10px;
			color: #353535;
			text-align: left;
			font-weight: 600;
		}
		.v2_clients_001 .right-wrap {
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.v2_clients_001 .arrow-btn {
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
		.v2_clients_001 .arrow-prev {
			margin-right: 60px;
		}
		.v2_clients_001 .img-slicker {
			margin-top: 80px;
		}
		.v2_clients_001 .slick-dots {
			margin-top: 30px;
		}
		.v2_clients_001 .slick-dots button {
			width: 8px;
			height: 8px;
			background-color: #c7c7c7;
		}
		.v2_clients_001 .slick-active button{
			width: 35px;
			background-color: #5f6776;
		}

		@media (max-width:540px) {
			.v2_clients_001 .top-wrap {
				display: block;
				margin-top: 40px;
			}
			.v2_clients_001 .text-slicker {
				width: 100%;
				max-width:100%;
			}
			.v2_clients_001 .right-wrap {
				width: 100%;
				max-width:100%;
				margin: 30px auto 0;
			}
			.v2_clients_001 .arrow-btn {
				width: 40px;
				height: 40px;
			}
			.v2_clients_001 .img-slicker {
				margin-top: 40px;
			}
			.v2_clients_001 .img-slicker .slick-slide {
				margin: 0 5px;
			}
		}
		/* insert style end */
	<?php
		$this->css_custom();
	}

	public function script()
	{
	?>
		(function($){
			$(document).ready(function(){
				$('.v2_clients_001 .text-slicker').slick({
				slidesToShow: 1,
				prevArrow: ".v2_clients_001 .arrow-prev",
				nextArrow: ".v2_clients_001 .arrow-next",
				autoplay: true
			});

			$('.v2_clients_001 .img-slicker').slick({
				slidesToShow: 6,
				autoplay: true,
				dots: true,
				arrows: false,
				slidesToScroll: 6,
				responsive: [
					{
						breakpoint: 1100,
						settings: {
							slidesToShow: 5,
							slidesToScroll: 5,
						}
					},
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
							slidesToScroll: 3
						}
					},
					{
						breakpoint: 450,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					}
					
				]
				});
			});
		})(jQuery);
	<?php
	}

	public function html()
	{
	?>
		<div class="<?php $this->echo_default_classes(); ?>">
			<!-- insert html start -->
			<div class="container">
				<div class="wrap">
					<div class="line"></div>
					<div class="top-wrap">
						<ul class="text-slicker">
							<li>
								<h1>Trusted By Global Brands</h1>
								<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
								<span>Wholesaler，America</span>
							</li>
							<li>
								<h1>Trusted By Global Brands</h1>
								<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
								<span>Wholesaler，America</span>
							</li>
							<li>
								<h1>Trusted By Global Brands</h1>
								<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
								<span>Wholesaler，America</span>
							</li>
						</ul>
						<div class="right-wrap">
							<div class="arrow-btn arrow-prev ">
								<i class="fas fa-chevron-left"></i>
							</div>
							<div class="arrow-btn arrow-next">
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>
					

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
			<!-- insert html end -->
		</div>
<?php
	}
}
