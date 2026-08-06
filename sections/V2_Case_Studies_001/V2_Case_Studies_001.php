<?php

/*
	<?php
	?>
*/

class V2_Case_Studies_001  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2{
				font-size: 48px;
				color: #353535;
				margin-bottom: 70px
			}
			.<?php $this->eid(); ?> .slick-track ,.<?php $this->eid(); ?> .slick-slide{
				display: flex
			}
			.<?php $this->eid(); ?> .slick-slide{
				margin:0 10px;
				height: auto;
			}
			.<?php $this->eid(); ?> .item{
				height: 100%;
				box-sizing: border-box;
				max-width: 380px;
				padding: 45px 20px 0px 20px;
				background-color: #e9eef4;
				display: flex !important;
				flex-direction: column;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .item .mml-text{
				text-align: left;
				margin-bottom: 50px
			}
			.<?php $this->eid(); ?> .slikcerBtn{
				display:flex;
				justify-content: center;
				align-items: center;
				margin-top: 90px;
			}
			.<?php $this->eid(); ?> .slikcerBtn .slicker-arrow{
				position: static;
				transform: none;
			}
			.<?php $this->eid(); ?> .slikcerBtn .slicker-arrow{
				margin: 0
			}
			.<?php $this->eid(); ?> .slikcerBtn .slikcerDots{
				margin: 0 40px;
			}
			.<?php $this->eid(); ?> .slikcerBtn .slikcerDots .slick-dots{
				margin: 0;
			}
			.<?php $this->eid(); ?> .slikcerBtn .slikcerDots .slick-dots li button{
				width: 60px;
				height: 60px;
				background-color: #ffffff;
				box-shadow: 0px 3px 24px 0px rgba(162, 178, 198, 0.39);
				font-size: 20px;
				color: #5d6777;
				border-radius: 100%;
			}
			.<?php $this->eid(); ?> .slikcerBtn .slikcerDots .slick-dots .slick-active button{
				color: #03a67b;
			}
			@media screen and (max-width:620px) {
				.<?php $this->eid(); ?> .slick-slide{
					margin:0;
				}
				.<?php $this->eid(); ?> .slick-slide>div{
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .slikcerBtn{
					position: relative;
					padding-bottom: 15px;
					margin-top: 20px
				}
				.<?php $this->eid(); ?> .slikcerBtn .slicker-arrow{
					position: absolute;
					top: unset;
					bottom: 0;
				}
				.<?php $this->eid(); ?> .slikcerBtn .prev{
					left: 0;
				}
				.<?php $this->eid(); ?> .slikcerBtn .next{
					right: 0;
				}
				.<?php $this->eid(); ?> .slikcerBtn .slikcerDots{
					margin: 0;
					width: 100%;
				}
				.<?php $this->eid(); ?> .slikcerBtn .slikcerDots .slick-dots{
					justify-content: center;
				}
				.<?php $this->eid(); ?> .slikcerBtn .slikcerDots .slick-dots li button{
					font-size: 12px;
					width: 20px;
					height: 20px;
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
					dots:true,
					appendArrows:'.<?php $this->eid(); ?> .slikcerBtn',
					appendDots:'.<?php $this->eid(); ?> .slikcerBtn .slikcerDots',
					prevArrow: "<img class='slicker-arrow prev' src='https://via.placeholder.com/70x8/000' alt=''>",
					nextArrow: "<img class='slicker-arrow next' src='https://via.placeholder.com/70x8/000' alt=''>",
					slidesToShow: 3,
					slidesToScroll:3,
					responsive: [{
						breakpoint: 960,
						settings: { 
							slidesToShow: 2,
							slidesToScroll:2,
						 }
					}, {
						breakpoint: 620,
						settings: {
							 slidesToShow: 1,
							 slidesToScroll:1,
						}
					}]
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
					<div class="slicker">
						<a href="/" class="item">
							<div class="mml-text">
								<h3>Raw material Preparation</h3>
								<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
							</div>
							<div class="mml-image">
								<img src="https://via.placeholder.com/340x230/5f6776" alt="">
							</div>
						</a>
						<a href="/" class="item">
							<div class="mml-text">
								<h3>Raw material Preparation</h3>
								<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
							</div>
							<div class="mml-image">
								<img src="https://via.placeholder.com/340x230/5f6776" alt="">
							</div>
						</a>
						<a href="/" class="item">
							<div class="mml-text">
								<h3>Raw material Preparation</h3>
								<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
							</div>
							<div class="mml-image">
								<img src="https://via.placeholder.com/340x230/5f6776" alt="">
							</div>
						</a>
						<a href="/" class="item">
							<div class="mml-text">
								<h3>Raw material Preparation</h3>
								<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
							</div>
							<div class="mml-image">
								<img src="https://via.placeholder.com/340x230/5f6776" alt="">
							</div>
						</a>
					</div>
					<div class="slikcerBtn">
						<div class="slikcerDots"></div>
					</div>
				</div>
				
				<!-- insert html end -->
			</div>
		<?php
	}
}
