<?php

/*
	<?php
	?>
*/

class V2_Banner_002  extends MML_Section_Base {
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
			.v2_banner_002 {
				overflow: hidden;
			}

			.v2_banner_002 .content {
				height: 755px;
				background-position: center center !important;
			}

			.v2_banner_002 .content .container {
				height: 100%;
				padding-top: 140px;
				position: relative;
			}

			.v2_banner_002 .content .mml-text {
				margin-bottom: 50px;
			}

			.v2_banner_002 .content .mml-text .pre-heading {
				color: #03a57b;
				font-size: 20px;
				margin-bottom: 20px;
			}

			.v2_banner_002 .content .mml-text h1 {
				color: #262626;
				font-size: 48px;
			}

			.v2_banner_002 .content .mml-btn .btn {
				width: 201px;
				height: 52px;
				background-color: #03a67b;
				-webkit-border-radius: 26px;
						border-radius: 26px;
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
				color: #ffffff;
				margin: 0 auto;
			}

			.v2_banner_002 .content .hr {
				width: 6px;
				height: 170px;
				background-color: #03a67b;
				margin: 0 auto;
			}

			.v2_banner_002 .content .des-text {
				max-width: 770px;
				z-index: 3;
				position: absolute;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
				margin-bottom: 30px;
			}

			.v2_banner_002 .bottom {
				padding: 110px 0 80px 0;
				background: #ebebeb;
			}

			.v2_banner_002 .bottom .header {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
						flex-wrap: wrap;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				margin-bottom: 60px;
			}

			.v2_banner_002 .bottom .header h2 {
				text-align: left;
				max-width: 507px;
				font-size: 36px;
				color: #262626;
			}

			.v2_banner_002 .bottom .header .btn {
				width: 201px;
				height: 52px;
				background-color: #03a67b;
				-webkit-border-radius: 26px;
						border-radius: 26px;
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
				color: #ffffff;
			}

			.v2_banner_002 .bottom .slicker-list {
				margin: 0 -10px;
			}

			.v2_banner_002 .bottom .slicker-list .slick-slide {
				margin: 0 10px;
			}

			.v2_banner_002 .bottom .slicker-list .slick-dots {
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
				margin-top: 60px;
			}

			.v2_banner_002 .bottom .slicker-list .slick-dots li button {
				width: 16px;
				height: 10px;
				background-color: #b5b5b5;
				-webkit-border-radius: 5px;
						border-radius: 5px;
			}

			.v2_banner_002 .bottom .slicker-list .slick-dots .slick-active button {
				width: 60px;
				height: 10px;
				background-color: #03a67b;
				-webkit-border-radius: 5px;
						border-radius: 5px;
			}

			.v2_banner_002 .bottom .slicker-list li {
				cursor: pointer;
				max-width: 370px;
				position: relative;
			}

			.v2_banner_002 .bottom .slicker-list li .hover {
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
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
					-ms-flex-direction: column;
						flex-direction: column;
				width: 100%;
				height: 66px;
				position: absolute;
				left: 0;
				bottom: 0;
				color: #ffffff;
				background-color: #000000;
				opacity: 0.5;
			}

			.v2_banner_002 .bottom .slicker-list li .hover h3 {
				width: 100%;
				max-width: 276px;
				font-size: 18px;
			}

			.v2_banner_002 .bottom .slicker-list li .hover p {
				text-align: left;
				max-width: 276px;
				display: none;
			}

			.v2_banner_002 .bottom .slicker-list li:hover .hover {
				height: 100%;
			}

			.v2_banner_002 .bottom .slicker-list li:hover .hover h3 {
			text-align: left;
			}

			.v2_banner_002 .bottom .slicker-list li:hover .hover p {
				display: block;
			}

			@media screen and (max-width: 960px) {
				.v2_banner_002 .content .hr {
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
							arrows:false,
							slidesToShow: 5,
							slidesToScroll:1,
							dots:true,
							responsive: [
								{
									breakpoint: 1600,
									settings: { 
										slidesToShow: 4,
									}
								},
								{
									breakpoint: 1300,
									settings: { 
										slidesToShow: 3,
									}
								},
								{
									breakpoint: 1000,
									settings: { 
										slidesToShow: 2,
									}
								},
								{
									breakpoint:630,
									settings: { 
										slidesToShow: 1,
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
				<div class="content" style="background: url('https://via.placeholder.com/1920x755/eee') no-repeat;">
					<div class="container">
						<div class="mml-text">
							<p class="pre-heading">MML Rocks</p>
							<h1>We Bring Impactful Digital Solutions</h1>
						</div>
						<div class="mml-btn">
							<a class="btn" href="">CTA Button</a>
						</div>
						<div class="des-text">
							<hr class="hr" />
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
						</div>
					</div>
				</div>
				<div class="bottom">
					<div class="container header">
						<h2>We Bring Impactful Digital Solutions</h2>
						<a class="btn" href="">CTA Button</a>
					</div>
					<ul class="slicker-list">
						<li>
							<img src="https://via.placeholder.com/370x275/03a67b" alt="">
							<a class="hover">
								<h3>Heading 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
							</a>
						</li>
						<li>
							<img src="https://via.placeholder.com/370x275/03a67b" alt="">
							<a class="hover">
								<h3>Heading 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
							</a>
						</li>
						<li>
							<img src="https://via.placeholder.com/370x275/03a67b" alt="">
							<a class="hover">
								<h3>Heading 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
							</a>
						</li>
						<li>
							<img src="https://via.placeholder.com/370x275/03a67b" alt="">
							<a class="hover">
								<h3>Heading 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
							</a>
						</li>
						<li>
							<img src="https://via.placeholder.com/370x275/03a67b" alt="">
							<a class="hover">
								<h3>Heading 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
							</a>
						</li>
						<li>
							<img src="https://via.placeholder.com/370x275/03a67b" alt="">
							<a class="hover">
								<h3>Heading 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
							</a>
						</li>
					</ul>
				</div>
				<!-- insert html end -->
			</div>
		<?php
	}
}
