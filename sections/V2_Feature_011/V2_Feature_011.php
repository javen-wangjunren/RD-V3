<?php

/*
	<?php
	?>
*/

class V2_Feature_011  extends MML_Section_Base {
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
			}
			.v2_feature_011 {
				display: -webkit-box !important;
				display: -webkit-flex !important;
				display: -ms-flexbox !important;
				display: flex !important;
				-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
						flex-wrap: wrap;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				padding: 80px;
				overflow: hidden;
				}

				.v2_feature_011 > .mml-text {
				width: 100%;
				margin-bottom: 45px;
				}

				.v2_feature_011 > .mml-text h2 {
				font-size: 36px;
				color: #333333;
				}

				.v2_feature_011 .left {
				width: 49%;
				max-width: 690px;
				margin-bottom: 20px;
				}

				.v2_feature_011 .left img {
				margin: 0;
				}

				.v2_feature_011 .right {
				width: 49%;
				}

				.v2_feature_011 .slicker-list .slick-slide {
				margin: 0 5px;
				}

				.v2_feature_011 .slicker-list li {
				display: -webkit-box !important;
				display: -webkit-flex !important;
				display: -ms-flexbox !important;
				display: flex !important;
				}

				.v2_feature_011 .slicker-list li img {
				z-index: 3;
				margin: 0;
				max-width: 280px;
				max-height: 210px;
				}

				.v2_feature_011 .slicker-list li .mml-text {
				z-index: 2;
				color: #333333;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				padding: 0 20px 0 220px;
				width: 100%;
				max-width: 644px;
				height: 221px;
				background-color: #ffffff;
				border: 1px solid rgba(0, 0, 0, 0.05);
				margin: 40px 0 0 -200px;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				-webkit-box-pack: end;
				-webkit-justify-content: flex-end;
					-ms-flex-pack: end;
						justify-content: flex-end;
				}

				.v2_feature_011 .slicker-list li .mml-text p {
				max-width: 350px;
				}

				.v2_feature_011 .mml-nav {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				position: relative;
				margin-bottom: 55px;
				}

				.v2_feature_011 .mml-nav .slick-dots {
				margin: 0;
				padding-right: 100px;
				}

				.v2_feature_011 .mml-nav .slick-dots button {
				cursor: pointer;
				width: 50px;
				height: 50px;
				-webkit-border-radius: 100%;
						border-radius: 100%;
				font-size: 14px;
				color: #333333;
				background: none;
				}

				.v2_feature_011 .mml-nav .slick-dots li {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				}

				.v2_feature_011 .mml-nav .slick-dots li:first-child::before {
				display: none;
				}

				.v2_feature_011 .mml-nav .slick-dots li::before {
				content: "";
				display: block;
				width: 40px;
				height: 3px;
				background-color: #dcdcdc;
				margin-right: 5px;
				}

				.v2_feature_011 .mml-nav .slick-dots .slick-active button {
				background-color: #03a679;
				color: #fff;
				}

				.v2_feature_011 .mml-nav .slick-dots .slick-active::before {
				background-color: #03a679;
				}

				.v2_feature_011 .mml-nav .next {
				cursor: pointer;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				position: static;
				margin-left: -100px;
				}

				.v2_feature_011 .mml-nav .next i {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				width: 50px;
				height: 50px;
				-webkit-border-radius: 100%;
						border-radius: 100%;
				font-size: 14px;
				background-color: #03a679;
				color: #fff;
				}

				.v2_feature_011 .mml-nav .next::before {
				content: "";
				display: block;
				width: 40px;
				height: 3px;
				background-color: #dcdcdc;
				margin-right: 10px;
				}

				@media screen and (max-width: 1600px) {
				.v2_feature_011 {
					padding: 80px 20px;
				}
				}

				@media screen and (max-width: 1450px) {
				.v2_feature_011 .mml-nav .slick-dots li::before {
					display: none;
				}
				.v2_feature_011 .mml-nav .next::before {
					display: none;
				}
				}

				@media screen and (max-width: 1200px) {
				.v2_feature_011 {
					-webkit-box-orient: vertical;
					-webkit-box-direction: normal;
					-webkit-flex-direction: column;
						-ms-flex-direction: column;
							flex-direction: column;
					-webkit-box-align: center;
					-webkit-align-items: center;
						-ms-flex-align: center;
							align-items: center;
				}
				.v2_feature_011 > .mml-text h2 {
					text-align: center;
				}
				.v2_feature_011 .left {
					width: 100%;
				}
				.v2_feature_011 .right {
					width: 100%;
				}
				}

			@media screen and (max-width: 600px) {
				.v2_feature_011 .slicker-list li {
					-webkit-box-orient: vertical;
					-webkit-box-direction: normal;
					-webkit-flex-direction: column;
						-ms-flex-direction: column;
							flex-direction: column;
				}
				.v2_feature_011 .slicker-list li img {
					width: 100%;
					margin: 0 auto;
					margin-bottom: 20px;
				}
				.v2_feature_011 .slicker-list li .mml-text {
					height: auto;
					-webkit-box-pack: center;
					-webkit-justify-content: center;
						-ms-flex-pack: center;
							justify-content: center;
					padding: 10px;
					margin: 0;
					-webkit-transform: none;
						-ms-transform: none;
							transform: none;
				}
				.v2_feature_011 .mml-nav .slick-dots {
					padding-right: 60px;
				}
				.v2_feature_011 .mml-nav .next {
					margin-left: -50px;
				}
			}

			@media screen and (max-width: 450px) {
				.v2_feature_011 {
					padding: 80px 10px;
			}
			.v2_feature_011 .mml-nav .slick-dots {
					-webkit-flex-wrap: wrap;
						-ms-flex-wrap: wrap;
							flex-wrap: wrap;
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
						prevArrow:'',
						nextArrow:'<div class="next"><i class="slick-arrow fa fa-chevron-right"></i></div>',
						appendArrows:'.<?php $this->eid(); ?> .mml-nav',
						appendDots:'.<?php $this->eid(); ?> .slikcerDots',
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
				<div class="mml-text">
						<h2>We Bring Impactful</h2>
				</div>
				<div class="left">
					<img src="https://dummyimage.com/690x400/cfcfcf" alt="">
				</div>
				<div class="right">
					<div class="mml-nav">
						<div  class="slikcerDots"></div>
					</div>
					<ul class="slicker-list">
						<li>
							<img src="https://dummyimage.com/280x210/cfcfcf" alt="">
							<div class="mml-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum Aenean laoreet.</p>
							</div>
						</li>
						<li>
							<img src="https://dummyimage.com/280x210/cfcfcf" alt="">
							<div class="mml-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum Aenean laoreet.</p>
							</div>
						</li>
						<li>
							<img src="https://dummyimage.com/280x210/cfcfcf" alt="">
							<div class="mml-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum Aenean laoreet.</p>
							</div>
						</li>
						<li>
							<img src="https://dummyimage.com/280x210/cfcfcf" alt="">
							<div class="mml-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum Aenean laoreet.</p>
							</div>
						</li>
						<li>
							<img src="https://dummyimage.com/280x210/cfcfcf" alt="">
							<div class="mml-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum Aenean laoreet.</p>
							</div>
						</li>
						<li>
							<img src="https://dummyimage.com/280x210/cfcfcf" alt="">
							<div class="mml-text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum Aenean laoreet.</p>
							</div>
						</li>
					</ul>
				</div>

				<!-- insert html end -->
			</div>
		<?php
	}
}
