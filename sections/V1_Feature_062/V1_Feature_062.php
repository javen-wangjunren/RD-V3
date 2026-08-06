<?php

/*
	<?php
	?>
*/

class V1_Feature_062  extends MML_Section_Base {
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

			.<?php $this->eid(); ?> h2 {
				color: #333;
				margin-bottom: 30px;
				}

				.<?php $this->eid(); ?> .tab {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				}

				.<?php $this->eid(); ?> .tab li {
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				margin: 10px;
				cursor: pointer;
				color: #252525;
				font-size: 20px;
				padding-bottom: 10px;
				border-bottom: 4px solid transparent;
				-webkit-transition: all .3s;
				-o-transition: all .3s;
				transition: all .3s;
				}

				.<?php $this->eid(); ?> .tab li:hover, .<?php $this->eid(); ?> .tab li.mml-active {
				color: #5f6776;
				border-bottom: 4px solid #5f6776;
				}

				.<?php $this->eid(); ?> section {
				margin-top: 30px;
				display: none;
				}

				.<?php $this->eid(); ?> section.mml-current {
				display: block;
				}

				.<?php $this->eid(); ?> h3 {
				font-size: 36px;
				color: #252525;
				margin-bottom: 15px;
				}

				.<?php $this->eid(); ?> p {
				font-size: 16px;
				color: #808080;
				max-width: 1000px;
				margin: 0 auto;
				}

				.<?php $this->eid(); ?> .mml-cols-6 {
				margin-top: 30px;
				}

				.<?php $this->eid(); ?> h4 {
				margin: 0px;
				margin-top: 12px;
				color: #000;
				font-size: 20px;
				}

				@media (max-width: 767px) {
				.<?php $this->eid(); ?> .tab {
					-webkit-flex-wrap: wrap;
						-ms-flex-wrap: wrap;
							flex-wrap: wrap;
				}
				.<?php $this->eid(); ?> .tab li {
					font-size: 16px;
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
				$('.<?php $this->eid(); ?> .tab-btn ul li').click(function(e) {      
					$('.tab-btn ul li').removeClass('mml-active');
					$(this).addClass('mml-active');
					var clickIndex = $(this).index();
					$('.tab-content section').removeClass('mml-current');
					$('.tab-content section').eq(clickIndex).addClass('mml-current');        
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
					<div class="tab-btn">
						<ul class="tab">
							<li class="mml-active">Tab Category 1</li>
							<li>Tab Category 2</li>
							<li>Tab Category 3</li>
							<li>Tab Category 4</li>
							<li>Tab Category 5</li>
							<li>Tab Category 5</li>
						</ul>
					</div>
					<div class="tab-content">
						<section class="mml-current">
							<h3>Tab Category 1</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<ul class="mml-cols-6">
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
							</ul>
						</section>
						<section>
							<h3>Tab Category 1</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<ul class="mml-cols-6">
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 4</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
							</ul>
						</section>
						<section>
							<h3>Tab Category 1</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<ul class="mml-cols-6">
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 5</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
							</ul>
						</section>
						<section>
							<h3>Tab Category 1</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<ul class="mml-cols-6">
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
								<li>
									<a href="">
										<img src="http://via.placeholder.com/180x230" alt="">
										<h4>Heading 3</h4>
									</a>
								</li>
							</ul>
						</section>
					</div>
				</div>
			</div>
		<?php
	}
}
