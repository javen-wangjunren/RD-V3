<?php

/*
	<?php
	?>
*/

class V1_Faq_006  extends MML_Section_Base {
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
			/* insert style end */
			.<?php $this->eid(); ?> .container {
				  display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				}

				.<?php $this->eid(); ?> .faq-anchor {
				width: 25%;
				max-width: 280px;
				height: 100%;
				border: solid 1px #d6d6d6;
				}

				.<?php $this->eid(); ?> .faq-anchor li {
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				padding: 18px;
				padding-right: 30px;
				cursor: pointer;
				-webkit-transition: all .3s;
				-o-transition: all .3s;
				transition: all .3s;
				position: relative;
				}

				.<?php $this->eid(); ?> .faq-anchor li.mml-active, .<?php $this->eid(); ?> .faq-anchor li:hover {
				background-color: #f5f5f5;
				color: #03a57b;
				}

				.<?php $this->eid(); ?> .faq-anchor i {
				position: absolute;
				top: 50%;
				-webkit-transform: translateY(-50%);
					-ms-transform: translateY(-50%);
						transform: translateY(-50%);
				right: 18px;
				}

				.<?php $this->eid(); ?> .faq-content {
				width: 72%;
				max-width: 800px;
				margin: 0 auto;
				margin-right: 0px;
				}

				.<?php $this->eid(); ?> section {
				padding: 25px 0px;
				border-top: 1px solid #ebebeb;
				}

				.<?php $this->eid(); ?> section:first-child {
				padding-top: 0px;
				border: unset;
				}

				.<?php $this->eid(); ?> section li {
				margin-top: 20px;
				}

				.<?php $this->eid(); ?> h2 {
				color: #333;
				}

				.<?php $this->eid(); ?> .question {
				color: #333;
				font-weight: 400;
				font-size: 20px;
				margin-bottom: 15px;
				}

				@media (max-width: 768px) {
				.<?php $this->eid(); ?> .container {
					-webkit-flex-wrap: wrap;
						-ms-flex-wrap: wrap;
							flex-wrap: wrap;
					-webkit-box-pack: center;
					-webkit-justify-content: center;
						-ms-flex-pack: center;
							justify-content: center;
				}
				.<?php $this->eid(); ?> .faq-anchor {
					width: 100%;
					max-width: 400px;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .faq-content {
					width: 100%;
					margin: 0 auto;
					margin-top: 30px;
				}
				}`

		<?php
		$this->css_custom();
	}

	public function script () {
		?>
			var $ = jQuery;
			$(document).ready(function(){
				$('.<?php $this->eid(); ?> .faq-anchor li a').click(function(e) {   
					$('.faq-anchor  li ').removeClass('mml-active');
					$(this).parent().addClass('mml-active');    
					$('html,body').animate({scrollTop:$($(this).attr("href")).offset().top-110+ "px"}, 500);
							
				});
			});

			
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<div class="faq-anchor">
						<ul>
							<li class="mml-active" ><a href="#s1">General</a><i class="fas fa-chevron-right"></i></li>
							<li><a href="#s2">Products</a><i class="fas fa-chevron-right"></i></li>
							<li><a href="#s3">Customization</a><i class="fas fa-chevron-right"></i></li>
							<li><a href="#s4">Service</a><i class="fas fa-chevron-right"></i></li>
							<li><a href="#s5">Payment</a><i class="fas fa-chevron-right"></i></li>
							<li><a href="#s6">Shipping</a><i class="fas fa-chevron-right"></i></li>
							<li><a href="#s7">Category</a> 7<i class="fas fa-chevron-right"></i></li>
						</ul>
					</div>
					<div class="faq-content">
						<section id="s1">
							<h2>General</h2>
							<ul>
								<li>
									<div class="question">Beard coloring book DIY forage?</div>
									<div class="answer"><p>Messenger bag deep v quinoa air plant bicycle rights iPhone pabst YOLO hexagon. Beard coloring book DIY forage jianbing drinking vinegar.</p></div>
								</li>
								<li>
									<div class="question">Mustache retro semiotics palo?</div>
									<div class="answer">
										<p>1) Authentic gochujang iPhone cliche pitchfork;</p>
										<p>2) Shaman yr flexitarian occupy.</p>
									</div>
								</li>
							</ul>
						</section>
						<section id="s2">
							<h2>General</h2>
							<ul>
								<li>
									<div class="question">Beard coloring book DIY forage?</div>
									<div class="answer"><p>Messenger bag deep v quinoa air plant bicycle rights iPhone pabst YOLO hexagon. Beard coloring book DIY forage jianbing drinking vinegar.</p></div>
								</li>
								<li>
									<div class="question">Mustache retro semiotics palo?</div>
									<div class="answer">
										<p>1) Authentic gochujang iPhone cliche pitchfork;</p>
										<p>2) Shaman yr flexitarian occupy.</p>
									</div>
								</li>
							</ul>
						</section>
						<section id="s3">
							<h2>General</h2>
							<ul>
								<li>
									<div class="question">Beard coloring book DIY forage?</div>
									<div class="answer"><p>Messenger bag deep v quinoa air plant bicycle rights iPhone pabst YOLO hexagon. Beard coloring book DIY forage jianbing drinking vinegar.</p></div>
								</li>
								<li>
									<div class="question">Mustache retro semiotics palo?</div>
									<div class="answer">
										<p>1) Authentic gochujang iPhone cliche pitchfork;</p>
										<p>2) Shaman yr flexitarian occupy.</p>
									</div>
								</li>
							</ul>
						</section>
						<section id="s4">
							<h2>General</h2>
							<ul>
								<li>
									<div class="question">Beard coloring book DIY forage?</div>
									<div class="answer"><p>Messenger bag deep v quinoa air plant bicycle rights iPhone pabst YOLO hexagon. Beard coloring book DIY forage jianbing drinking vinegar.</p></div>
								</li>
								<li>
									<div class="question">Mustache retro semiotics palo?</div>
									<div class="answer">
										<p>1) Authentic gochujang iPhone cliche pitchfork;</p>
										<p>2) Shaman yr flexitarian occupy.</p>
									</div>
								</li>
							</ul>
						</section>
					</div>
				</div>
			</div>
		<?php
	}
}
