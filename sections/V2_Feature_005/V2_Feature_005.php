<?php

/*
	<?php
	?>
*/

class V2_Feature_005  extends MML_Section_Base {
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
				position: relative;
				margin: 80px 0;
				padding: 50px 0 80px 0;
			}
			.<?php $this->eid(); ?>.mml-section::before{
				z-index: 1;
				content: "";
				display: block;
				width: 25%;
				max-width: 450px;
				height: 100%;
				background-color: #5d6777;
				position: absolute;
				left: 0;
				top: 0;
				bottom: 0;
				margin: auto;
			}
			.<?php $this->eid(); ?> .content{
				z-index: 2;
				width:72%;
				max-width: 1355px;
				margin:0 auto;
				margin-right: 0;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .header{
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
				align-items: center;
				margin-bottom: 70px;
			}
			.<?php $this->eid(); ?> .header .mml-text{
				max-width: 530px;
				margin: 0 auto;
				margin-left: 0;
			}
			.<?php $this->eid(); ?> .header .mml-text h2{
				color: #353535;
				font-size: 48px;
			}
			.<?php $this->eid(); ?> .header .arrows{
				display: flex;
				justify-content: center;
				margin:20px auto 20px 0;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				cursor: pointer;
				width: 60px;
				height: 60px;
				background-color: #ffffff;
				box-shadow: 0px 3px 24px 0px rgba(162, 178, 198, 0.39);
				color: #5f6775;
				border-radius: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				margin: 0 30px;
			}

			
			.<?php $this->eid(); ?> .slicker-list{
				margin-right: -230px;
				margin-left: -10px;
			}
			.<?php $this->eid(); ?> .slicker-list .slick-slide{
				max-width: 780px;
				margin: 0 10px;
			}
			@media screen and (max-width:1200px){
				.<?php $this->eid(); ?>.mml-section {
					margin: 40px 0;
					padding:25px 0 40px 0;
				}
				.<?php $this->eid(); ?> .header .mml-text{
					margin: auto;
				}
				.<?php $this->eid(); ?> .header .arrows{
					margin: auto;
				}
			}
			@media screen and (max-width:768px){
				.<?php $this->eid(); ?> .slicker-list{
					margin: 0 0 0 -10px;
				}
			}
			@media screen and (max-width:540px){
				.<?php $this->eid(); ?>.mml-section::before{
					display: none;
				}
				.<?php $this->eid(); ?> .header .mml-text{
					text-align: center;
				}
				.<?php $this->eid(); ?> .content{
					width: 100%;
				}
				.<?php $this->eid(); ?> .slicker-list{
					margin: 0 auto;
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
					$('.<?php $this->eid(); ?> .slicker-list').slick({
						appendArrows: '.<?php $this->eid(); ?> .header .arrows',
						prevArrow:'<i class="slick-arrow fa fa-chevron-left prev"></i>',
						nextArrow:'<i class="slick-arrow fa fa-chevron-right next"></i>',
						slidesToShow: 2,
						slidesToScroll:1,
						responsive: [{
							breakpoint: 768,
							settings: { 
								slidesToShow:1,
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
				<div class="content">
					<div class="header">
						<div class="mml-text">
							<h2>Services Beyond Your Expectation</h2>
						</div>
						<div class="arrows">
						</div>
					</div>
					<ul class="slicker-list">
						<li><img src="https://via.placeholder.com/780x520/e9eef4" alt=""></li>
						<li><img src="https://via.placeholder.com/780x520/e9eef4" alt=""></li>
						<li><img src="https://via.placeholder.com/780x520/e9eef4" alt=""></li>
					</ul>
				</div>
				<!-- insert html end -->
			</div>
		<?php
	}
}
