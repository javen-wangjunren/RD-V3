<?php

/*
	<?php
	?>
*/

class V2_History_001  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .mml-text{
				margin-bottom: 80px;
			}
			.<?php $this->eid(); ?> h2{
				color: #353535;
				font-size: 48px;
			}
			.<?php $this->eid(); ?> .slicker-nav{
				margin: 0 auto;
				max-width: 1020px;
				position: relative;
				margin-bottom: 70px;
				padding: 0 60px;
			}
			.<?php $this->eid(); ?> .slicker-nav .slick-list::before{
				position: absolute;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
				content: "";
				display:block;
				width: 100%;
				max-width: 875px;
				height: 5px;
				background-color: #f3f3f3;
			}
			.<?php $this->eid(); ?> .slicker-nav li{
				cursor: pointer;
				z-index: 2;
				margin: 25px auto;
				display: flex !important;
				justify-content: center;
				align-items: center;
				width: 60px !important;
				height: 60px;
				background-color: #ffffff;
				box-shadow: 0px 3px 24px 0px rgba(162, 178, 198, 0.39);
				border-radius: 100%;
			}
			.<?php $this->eid(); ?> .slicker-nav .slick-current li{
				background-color: #5f6776;
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .slicker-nav .slick-arrow{
				cursor: pointer;
				z-index: 3;
				display: flex;
				justify-content: center;
				align-items: center;
				position: absolute;
				top: 0;
				bottom: 0;
				margin: auto;
				width: 60px;
				height: 60px;
				background-color: #ffffff;
				color: #5f6775;
				box-shadow: 0px 3px 24px 0px rgba(162, 178, 198, 0.39);
				border-radius: 100%;
			}
			.<?php $this->eid(); ?> .slicker-nav .prev{
				left: 0;
			}
			.<?php $this->eid(); ?> .slicker-nav .next{
				right: 0;
			}
			.<?php $this->eid(); ?> .slicker-content{
				padding: 65px 95px;
				background-color: #ffffff;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
			}
			.<?php $this->eid(); ?> .slicker-content h3{
				color: #353535;
				font-size: 20px;
				margin-bottom: 30px
			}
			.<?php $this->eid(); ?> .slicker-content p{
				margin: 0 auto;
				max-width: 985px;
				color: #353535;
			}
			@media screen and (max-width:1200px) {
				.<?php $this->eid(); ?> .slicker-content{
					padding: 50px 40px;
				}
			}
			@media screen and (max-width:678px) {
				.<?php $this->eid(); ?> .slicker-content{
					padding:30px 20px;
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
					$('.<?php $this->eid(); ?> .slicker-nav').slick({
						asNavFor: '.<?php $this->eid(); ?> .slicker-content',
						prevArrow:'<i class="slick-arrow fa fa-chevron-left prev"></i>',
						nextArrow:'<i class="slick-arrow fa fa-chevron-right next"></i>',
						slidesToShow: 3,
						slidesToScroll:1,
						centerMode: true,
						focusOnSelect:true,
						responsive: [{
							breakpoint: 678,
							settings: { 
								slidesToShow: 2,
								slidesToScroll:1,
							 }
						}, {
							breakpoint: 540,
							settings: {
								 slidesToShow: 1,
								 slidesToScroll:1,
							}
						}]
					});
					$('.<?php $this->eid(); ?> .slicker-content').slick({
						asNavFor: '.<?php $this->eid(); ?> .slicker-nav',
						arrows:false,
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
					<div class="mml-text">
						<h2>All Products</h2>
					</div>
					<div class="content">
						<ul class="slicker-nav">
							<li>2012</li>
							<li>2013</li>
							<li>2014</li>
							<li>2015</li>
						</ul>
						<ul class="slicker-content">
							<li>
								<h3>2012</h3>
								<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
							</li>
							<li>
								<h3>2013</h3>
								<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
							</li>
							<li>
								<h3>2014</h3>
								<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
							</li>
							<li>
								<h3>2015</h3>
								<p>Supported by a talented design team, Beluga will bring your creative ideas into reality. For any ideas, we are able to provide design sketch or 3D drawing in 3 days, and prepare 3D printing model or sample for you in 5 days with our unparalleled capability​.</p>
							</li>
						</ul>
					</div>
				</div>
				
				<!-- insert html end -->
			</div>
		<?php
	}
}
