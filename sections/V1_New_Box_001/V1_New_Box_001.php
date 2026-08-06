<?php

/*
	<?php
	?>
*/

class V1_New_Box_001  extends MML_Section_Base {
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

			.v1_new_box_001 .container {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-align: end;
				-webkit-align-items: flex-end;
					-ms-flex-align: end;
						align-items: flex-end;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
			}

			.v1_new_box_001 .left {
				width: 49%;
				max-width: 530px;
			}

			.v1_new_box_001 .left .mml-text {
				margin-bottom: 50px;
			}

			.v1_new_box_001 .left .mml-text h2 {
				font-size: 36px;
				color: #333333;
			}

			.v1_new_box_001 .left .mml-text p {
				color: #808080;
				max-width: 530px;
			}

			.v1_new_box_001 .left .tab-nav .header {
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
				margin-bottom: 40px;
				padding: 20px 0;
				border-bottom: 2px solid #4d4d4d;
			}

			.v1_new_box_001 .left .tab-nav .header p {
				font-size: 20px;
				color: #333333;
				margin-bottom: 0;
			}

			.v1_new_box_001 .left .tab-nav .header a {
				color: #333333;
				border-bottom: 1px solid transparent;
			}

			.v1_new_box_001 .left .tab-nav .header a i {
				color: #333333;
			}

			.v1_new_box_001 .left .tab-nav .header a:hover {
				color: #03a67b;
				border-bottom: 1px solid #03a67b;
			}

			.v1_new_box_001 .left .tab-nav .header a:hover i {
				color: #03a67b;
			}

			.v1_new_box_001 .left .slicker-nav li {
				cursor: pointer;
				display: -webkit-box !important;
				display: -webkit-flex !important;
				display: -ms-flexbox !important;
				display: flex !important;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				margin: 10px 0;
			}

			.v1_new_box_001 .left .slicker-nav li p {
				color: #808080;
				margin: 0;
			}

			.v1_new_box_001 .left .slicker-nav li span {
				color: #b3b3b3;
			}

			.v1_new_box_001 .left .slicker-nav .slick-current li p {
				color: #03a67b;
			}

			.v1_new_box_001 .right {
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				width: 49%;
				max-width: 460px;
				background-color: #ffffff;
				-webkit-box-shadow: 0px 2px 13px 0px rgba(0, 0, 0, 0.06);
						box-shadow: 0px 2px 13px 0px rgba(0, 0, 0, 0.06);
				-webkit-border-radius: 5px;
						border-radius: 5px;
				padding: 20px 20px 30px 20px;
			}

			.v1_new_box_001 .right .more {
				cursor: pointer;
				display: block;
				text-align: right;
				color: #808080;
			}

			.v1_new_box_001 .right .more i {
				color: #808080;
			}

			.v1_new_box_001 .right .more:hover {
				color: #03a67b;
			}

			.v1_new_box_001 .right .more:hover i {
				color: #03a67b;
			}

			.v1_new_box_001 .right .slicker-content li {
				max-width: 460px;
			}

			.v1_new_box_001 .right .slicker-content li img {
				margin: 0;
				margin-bottom: 30px;
			}

			.v1_new_box_001 .right .slicker-content li h3 {
				color: #333333;
				font-size: 18px;
				margin-bottom: 15px;
			}

			.v1_new_box_001 .right .slicker-content li p {
				color: #808080;
				margin-bottom: 30px;
			}

			@media screen and (max-width: 1024px) {
				.v1_new_box_001 .container {
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
				.v1_new_box_001 .left {
					width: 100%;
					margin-bottom: 20px;
				}
				.v1_new_box_001 .right {
					width: 100%;
				}
			}

			@media screen and (max-width: 540px) {
				.v1_new_box_001 .slicker-nav li {
					-webkit-box-orient: vertical;
					-webkit-box-direction: normal;
					-webkit-flex-direction: column;
						-ms-flex-direction: column;
							flex-direction: column;
					-webkit-box-align: start !important;
					-webkit-align-items: flex-start !important;
						-ms-flex-align: start !important;
							align-items: flex-start !important;
				}
				.v1_new_box_001 .slicker-nav li span {
					margin: 0 auto;
					margin-right: 0;
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
						arrows:false,
						slidesToShow: 6,
						slidesToScroll:1,
						focusOnSelect:true,
						vertical:true,
						responsive: []
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
					<div class="left">
						<div class="mml-text">
							<h2>We Bring Impactful Digital Solutions</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
						</div>
						<div class="tab-nav">
							<div class="header">
								<p>Heading 3</p>
								<a href="#">View All  <i class="fa fa-arrow-right"></i></a>
							</div>
							<ul class="slicker-nav">
								<li>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<span class="time">2020-02-02</span>
								</li>
								<li>
									<p>Aenean euismod bibendum laoreet.</p>
									<span class="time">2020-02-02</span>
								</li>
								<li>
									<p>Proin gravida dolor sit amet lacus accumsan et.</p>
									<span class="time">2020-02-02</span>
								</li>
								<li>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<span class="time">2020-02-02</span>
								</li>
								<li>
									<p>Aenean euismod bibendum laoreet.</p>
									<span class="time">2020-02-02</span>
								</li>
								<li>
									<p>Proin gravida dolor sit amet lacus accumsan et.</p>
									<span class="time">2020-02-02</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="right">
						<ul class="slicker-content">
							<li>
								<img src="https://via.placeholder.com/460x260/8e8e8e?text=I" alt="">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="#" class="more">Read More  <i class="fa fa-chevron-right"></i></a>
							</li>
							<li>
								<img src="https://via.placeholder.com/460x260/8e8e8e?text=II" alt="">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="#" class="more">Read More  <i class="fa fa-chevron-right"></i></a>
							</li>
							<li>
								<img src="https://via.placeholder.com/460x260/8e8e8e?text=III" alt="">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="#" class="more">Read More  <i class="fa fa-chevron-right"></i></a>
							</li>
							<li>
								<img src="https://via.placeholder.com/460x260/8e8e8e?text=IV" alt="">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="#" class="more">Read More  <i class="fa fa-chevron-right"></i></a>
							</li>
							<li>
								<img src="https://via.placeholder.com/460x260/8e8e8e?text=V" alt="">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="#" class="more">Read More  <i class="fa fa-chevron-right"></i></a>
							</li>
							<li>
								<img src="https://via.placeholder.com/460x260/8e8e8e?text=VI" alt="">
								<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<a href="#" class="more">Read More  <i class="fa fa-chevron-right"></i></a>
							</li>
						</ul>
					</div>
				</div>

				<!-- insert html end -->
			</div>
		<?php
	}
}
