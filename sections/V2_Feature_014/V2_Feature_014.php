<?php

/*
	<?php
	?>
*/

class V2_Feature_014  extends MML_Section_Base {
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
			.v2_feature_014 .mml-text {
				margin-bottom: 50px;
			}

			.v2_feature_014 .mml-text h2 {
				font-size: 36px;
				color: #202020;
			}

			.v2_feature_014 .mml-nav {
				margin-bottom: 50px;
			}

			.v2_feature_014 .mml-nav .slick-dots {
				margin: 0 auto;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
			}

			.v2_feature_014 .mml-nav .slick-dots li {
				position: relative;
				-webkit-box-flex: 1;
				-webkit-flex: 1;
					-ms-flex: 1;
						flex: 1;
			}

			.v2_feature_014 .mml-nav .slick-dots li button {
				cursor: pointer;
				width: 40px;
				height: 40px;
				background-color: #ffffff;
				border: solid 2px #dddddd;
				-webkit-border-radius: 100%;
						border-radius: 100%;
				font-size: 14px;
				color: #202020;
				background: none;
			}

			.v2_feature_014 .mml-nav .slick-dots li::before {
				content: "";
				display: block;
				width: 70%;
				height: 11px;
				background-color: #f4f6f8;
				position: absolute;
				left: 0;
				top: 50%;
				-webkit-transform: translate(-50%, -50%);
					-ms-transform: translate(-50%, -50%);
						transform: translate(-50%, -50%);
			}

			.v2_feature_014 .mml-nav .slick-dots li:first-child::before {
				display: none;
			}

			.v2_feature_014 .mml-nav .slick-dots .slick-active button {
				border-color: #03a679;
				background-color: #03a679;
				color: #fff;
			}

			.v2_feature_014 .mml-nav .slick-dots .slick-active::before {
				background-color: #03a679;
			}

			.v2_feature_014 .slicker-list {
				background-color: #ffffff;
				-webkit-box-shadow: 38px 50px 120px 0px rgba(0, 0, 0, 0.1);
						box-shadow: 38px 50px 120px 0px rgba(0, 0, 0, 0.1);
				-webkit-border-radius: 6px;
						border-radius: 6px;
				padding: 50px 0 75px 0;
			}

			.v2_feature_014 .slicker-list h3 {
				color: #202020;
				font-size: 20px;
				margin-bottom: 20px;
			}

			.v2_feature_014 .slicker-list p {
				margin: 0 auto;
				max-width: 446px;
				color: #aaaaaa;
			}

			@media screen and (max-width: 960px) {
				.v2_feature_014 .mml-nav .slick-dots li::before {
					width: 50%;
				}
			}

			@media screen and (max-width: 540px) {
				.v2_feature_014 .mml-nav .slick-dots li::before {
					display: none;
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
						dots:true,
						arrows:false,
						appendDots:'.<?php $this->eid(); ?> .mml-nav',
						slidesToShow:1,
						slidesToScroll:1,
						focusOnSelect:true,
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
						<h2>4 Steps to Get Boosted Signal</h2>
					</div>
					<div class="content">
						<div class="mml-nav"></div>
						<ul class="slicker-list">
							<li>
								<h3>Amplify Signal</h3>
								<p>Link the outdoor antenna to the booster with an outdoor cable and power on the booster</p>
							</li>
							<li>
								<h3>Amplify Signal</h3>
								<p>Link the outdoor antenna to the booster with an outdoor cable and power on the booster</p>
							</li>
							<li>
								<h3>Amplify Signal</h3>
								<p>Link the outdoor antenna to the booster with an outdoor cable and power on the booster</p>
							</li>
							<li>
								<h3>Amplify Signal</h3>
								<p>Link the outdoor antenna to the booster with an outdoor cable and power on the booster</p>
							</li>
							<li>
								<h3>Amplify Signal</h3>
								<p>Link the outdoor antenna to the booster with an outdoor cable and power on the booster</p>
							</li>
						</ul>
					</div>
				</div>
				
				<!-- insert html end -->
			</div>
		<?php
	}
}
