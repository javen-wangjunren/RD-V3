<?php

/*
	<?php
	?>
*/

class V1_Feature_063  extends MML_Section_Base {
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
				padding-bottom:120px;
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> h2 {
				color:#333;
			}
			.<?php $this->eid(); ?> h3 {
				color:#333;
			}
			.<?php $this->eid(); ?>  p{
				color:#333;
			}
			.<?php $this->eid(); ?> .list {
				margin:0px -10px;
				margin-top:40px;
				justify-content: center;
				text-align: left;
				color:#333;
			}
			.<?php $this->eid(); ?> .list .slick-slide {
				box-sizing: border-box;
				margin: 10px;
				padding: 20px;
				display: flex;
				flex-direction: column;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
				background-color:#fff;
				
			}
			.<?php $this->eid(); ?> img {
				margin: 10px 0 0;
				
			}
			.<?php $this->eid(); ?> .details {
				margin: 10px 0 auto;
			}
			.<?php $this->eid(); ?> .details > li {
				margin: 10px 0;
				display: flex;
				justify-content: space-between;
				align-items: baseline;
				
			}
			.<?php $this->eid(); ?> .details span:first-child {
				flex: 1 1 0;
				margin-right: 20px;
				<?php $this->css_attr_color('detail_left_color'); ?>
			}
			.<?php $this->eid(); ?> .btn {
				margin: 40px 0 0;
				<?php $this->css_attr('background', 'item_btn_bgcolor'); ?>
				<?php $this->css_attr_color('item_btn_color'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover{
				<?php $this->css_attr('background', 'item_btn_bgcolor_hover'); ?>
			}

			.<?php $this->eid(); ?>.slick-arrow {
				top: unset;
				bottom: -90px;
				width: 50px;
				height: 50px;
				background-color: #000;
				opacity: .2;
				-webkit-border-radius: 5px;
						border-radius: 5px;
				line-height: 50px;
				text-align: center;
				-webkit-transition: all .3s;
				-o-transition: all .3s;
				transition: all .3s;
				cursor: pointer;
				}

				.<?php $this->eid(); ?>.slick-arrow i {
				color: #fff;
				}

				.<?php $this->eid(); ?>.slick-arrow.arrow-prev {
				left: 45%;
				}

				.<?php $this->eid(); ?>.slick-arrow.arrow-next {
				right: 45%;
				}

				.<?php $this->eid(); ?>.slick-arrow:hover {
				opacity: 1;
				}

				@media (max-width: 1000px) {
				.<?php $this->eid(); ?>.slick-arrow.arrow-prev {
					left: 42%;
				}
				.<?php $this->eid(); ?>.slick-arrow.arrow-next {
					right: 42%;
				}
				}

				@media (max-width: 680px) {
				.<?php $this->eid(); ?>.slick-arrow.arrow-prev {
					left: 40%;
				}
				.<?php $this->eid(); ?>.slick-arrow.arrow-next {
					right: 40%;
				}
				}

				@media (max-width: 540px) {
				.<?php $this->eid(); ?>ul.list {
					max-width: 380px;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?>.slick-arrow.arrow-prev {
					left: 30%;
				}
				.<?php $this->eid(); ?>.slick-arrow.arrow-next {
					right: 30%;
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
				$('.<?php $this->eid(); ?> .list').slick({
					prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
					nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
					slidesToShow: 3,
					slidesToScroll: 3,
					responsive: [ {
						breakpoint: 768,
						settings: { slidesToShow: 2, slidesToScroll: 2 }
					}, {
						breakpoint: 540,
						settings: { slidesToShow: 1, slidesToScroll: 1 }
					}]
				});
			});
		})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<h2>We Bring Impactful Digital Solutions</h2>
					<div class="desc">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
						<ul class="list">
							<li>
								<h3>Digital Branding</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								<img src="http://via.placeholder.com/340x205" alt="">
								<ul class="details">
									<li><span>Lead time</span><span>2-3 Weeks</span></li>
									<li><span>Monthly Capacity</span><span>100,000+</span></li>
									<li><span>Full dimensional report</span><span>Included</span></li>
									<li><span>Inspection report</span><span>Included</span></li>
									<li><span>Product assembly</span><span>Available</span></li>
								</ul>
							</li>
							<li>
								<h3>Digital Branding</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								<img src="http://via.placeholder.com/340x205" alt="">
								<ul class="details">
									<li><span>Lead time</span><span>2-3 Weeks</span></li>
									<li><span>Monthly Capacity</span><span>100,000+</span></li>
									<li><span>Full dimensional report</span><span>Included</span></li>
									<li><span>Inspection report</span><span>Included</span></li>
									<li><span>Product assembly</span><span>Available</span></li>
								</ul>
							</li>
							<li>
								<h3>Digital Branding</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								<img src="http://via.placeholder.com/340x205" alt="">
								<ul class="details">
									<li><span>Lead time</span><span>2-3 Weeks</span></li>
									<li><span>Monthly Capacity</span><span>100,000+</span></li>
									<li><span>Full dimensional report</span><span>Included</span></li>
									<li><span>Inspection report</span><span>Included</span></li>
									<li><span>Product assembly</span><span>Available</span></li>
								</ul>
							</li>
							<li>
								<h3>Digital Branding</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								<img src="http://via.placeholder.com/340x205" alt="">
								<ul class="details">
									<li><span>Lead time</span><span>2-3 Weeks</span></li>
									<li><span>Monthly Capacity</span><span>100,000+</span></li>
									<li><span>Full dimensional report</span><span>Included</span></li>
									<li><span>Inspection report</span><span>Included</span></li>
									<li><span>Product assembly</span><span>Available</span></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
