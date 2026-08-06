<?php

/*
	<?php
	?>
*/

class V2_Feature_008  extends MML_Section_Base {
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
			.v2_feature_008 .container {
				text-align: left;
				width: 1580px;
				position: relative;
				padding-bottom: 86px;
			}
			.v2_feature_008 .container::before {
				display: block;
				content: '';
				max-width: 1150px;
				width: 73%;
				height: 100%;
				background-color: #e9eef4;
				position: absolute;
				right: 40px;
				z-index: -1;
			}
			.v2_feature_008 h1 {
				padding-top: 80px;
				color: #353535;
			}
			.v2_feature_008 .wrap {
				display: flex;
				margin-top: 40px;
			}
			.v2_feature_008 .left-slicker {
				max-width: 580px;
				width: 37%;
			}
			.v2_feature_008 .left-slicker li {
				padding: 66px 80px 112px;
				position: relative;
				display: flex;
				flex-direction: column;
				color: #ffffff;
				min-height: 757px;
				background-color: #5d6777;
				box-sizing: border-box;
			}
			.v2_feature_008 .left-slicker img {
				margin: 0;
				margin-left: auto;
			}
			.v2_feature_008 .left-slicker h2 {
				margin-top: 50px;
			}
			.v2_feature_008 .left-slicker p {
				margin-top: 60px;
				max-width: 360px;
			}
			.v2_feature_008 .btn-wrap {
				width: 226px;
				max-width: 100%;
				max-height: 58px;
				overflow: hidden;
				display: flex;
				justify-content: center;
				align-items: center;
				position: absolute;
				bottom: 110px;
				border-radius: 29px;
			}
			.v2_feature_008 .btn-wrap a {
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: #e9eef4;
				color: #5d6777;
				border-radius: 29px;
				padding: 20px 46px;
				white-space: nowrap;
			}
			.v2_feature_008 .right-wrap {
				max-width: 980px;
				width: 63%;
				margin-left: auto;
				color: #ffffff;
				position: relative;
			}
			.v2_feature_008 .right-slicker .slick-slide {
				padding: 70px 80px 80px;
				background-color: #5d6777;
				min-height: 627px;
				box-sizing: border-box;
				margin: 0 10px;
			}
			.v2_feature_008 .right-slicker img {
				margin-top: 145px;
			}
			.v2_feature_008 .right-slicker .btn-wrap {
				bottom: 82px;
			}
			.v2_feature_008 .arrow-wrap {
				position: absolute;
				bottom: 0;
				max-width:180px;
				height: 88px;
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: #FFF;
				padding: 34px;
				box-sizing: border-box;
				font-size: 18px;
				color: #5f6775;
				margin-left: 10px;
			}
			.v2_feature_008 .fas {
				cursor: pointer;
			}
			.v2_feature_008 .line {
				width: 1px;
				height: 43px;
				margin: 0 40px;
				background-color: #cbcbcb;
			}

			@media (max-width:1366px) {
				.v2_feature_008 .right-slicker .slick-slide {
					padding: 70px 40px 80px;
				}
			}

			@media (max-width:1024px) {
				.v2_feature_008 .container::before {
					right: 10px;
				}
				.v2_feature_008 .left-slicker li {
					padding: 40px 20px;
					min-height: unset;
				}
			
				.v2_feature_008 .right-slicker .slick-slide {
					padding: 40px 20px;
					min-height: unset
				}
				.v2_feature_008 .btn-wrap {
					position: unset;
					margin-top: 40px;
				}
				.v2_feature_008 .right-slicker img {
					margin-top: 90px;
					margin-bottom: 80px;
				}
			}

			@media (max-width:768px) {
				.v2_feature_008 .wrap {
					display: block;
					padding: 40px 0;
				}
				.v2_feature_008 .left-slicker,
				.v2_feature_008 .right-wrap {
					width: 100%;
					margin: 0 auto;
				}
				.v2_feature_008 .right-wrap {
					margin-top: 40px;
				}
				.v2_feature_008 .arrow-wrap {
					position: relative;
					margin: 40px auto 0;
					height: 60px;
				}
				.v2_feature_008 .wrap {
					background-color: #e9eef4;
				}
				.v2_feature_008 .container::before {
					display: none;
				}
			}

			@media (max-width:540px) {
				.v2_feature_008 .left-slicker .slick-slide {
					margin: 0 10px;
				}
				.v2_feature_008 .btn-wrap a {
					padding: 20px;
					font-size: 12px;
				}
				.v2_feature_008 .right-wrap h2 {
					font-size: 28px;
					word-break: break-all;
					text-align: center;
				}
				.v2_feature_008 .right-slicker .slick-slide {
					padding: 20px 5px;
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
				$('.v2_feature_008 .left-slicker').slick({
					slidesToShow: 1,
					/* autoplay: true, */
					slidesToScroll: 1,
					asNavFor: '.v2_feature_008 .right-slicker',
					prevArrow: ".v2_feature_008 .fa-chevron-left",
					nextArrow: ".v2_feature_008 .fa-chevron-right",
					responsive: [
						
					]
					});
				$('.v2_feature_008 .right-slicker').slick({
					slidesToShow: 2,
					/* autoplay: true, */
					arrows: false,
					slidesToScroll: 1,
					asNavFor: '.v2_feature_008 .left-slicker',
					responsive: [
						
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
					<h1>Beluga in Figures</h1>
					<div class="wrap">
						<ul class="left-slicker">
							<li>
								<img src="https://dummyimage.com/86x62" alt="">
								<h2>Machines</h2>
								<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. Now our stylish water bottles are widely welcome in over 50 countries, especially in the USA and European.</p>
								<div class="btn-wrap">
									<a href="#">Get Free Sample</a>
								</div>
							</li>
							<li>
								<img src="https://dummyimage.com/86x62" alt="">
								<h2>Machines</h2>
								<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. Now our stylish water bottles are widely welcome in over 50 countries, especially in the USA and European.</p>
								<div class="btn-wrap">
									<a href="#">Get Free Sample</a>
								</div>
							</li>
							<li>
								<img src="https://dummyimage.com/86x62" alt="">
								<h2>Machines</h2>
								<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. Now our stylish water bottles are widely welcome in over 50 countries, especially in the USA and European.</p>
								<div class="btn-wrap">
									<a href="#">Get Free Sample</a>
								</div>
							</li>
						</ul>
						<div class="right-wrap">
							<ul class="right-slicker">
								<li>
									<h2>Machines</h2>
									<img src="https://dummyimage.com/86x62" alt="">
									<div class="btn-wrap">
										<a href="#">Get Free Sample</a>
									</div>
								</li>
								<li>
									<h2>Machines</h2>
									<img src="https://dummyimage.com/86x62" alt="">
									<div class="btn-wrap">
										<a href="#">Get Free Sample</a>
									</div>
								</li>
								<li>
									<h2>Machines</h2>
									<img src="https://dummyimage.com/86x62" alt="">
									<div class="btn-wrap">
										<a href="#">Get Free Sample</a>
									</div>
								</li>
							</ul>

							<div class="arrow-wrap">
								<i class="fas fa-chevron-left"></i>
								<div class="line"></div>
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
