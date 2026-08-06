<?php

/*
	<?php
	?>
*/

class V1_Contact_006  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .list h4{
				color: #333333;
			}
			.<?php $this->eid(); ?> .list p{
				color: #808080;
			}
			.<?php $this->eid(); ?> .list .item ul li{
				color: #363636;
			}
			.<?php $this->eid(); ?> .list .item ul i{
				color: #03a67b;
			}
			.<?php $this->eid(); ?> .list .item .link{
				background-color: #e6e6e6;
			}
			.<?php $this->eid(); ?> .list .item .link i{
				color: #bfbfbf;
			}
			.<?php $this->eid(); ?> .list .item:hover h4{
				color: #03a67b;
			}

			.<?php $this->eid(); ?> .list .item:hover .link{
				background-color: #03a67b;
			}
			.<?php $this->eid(); ?> .list .item:hover .link i{
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .mml-form{
				background-color: #03a67b;
			}
			.<?php $this->eid(); ?> .mml-form h3{
				color: #ffffff;
				text-align:left;
			}
			.<?php $this->eid(); ?> .mml-form label{
				color: #027d5c;
			}

			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]){
				border-color:rgba(2,125,92,0.5);
				background-color: #03a67b;
				color:#028662;
				height: 50px;
			}
			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]):placeholder{
				color:#028662;
			}
			.<?php $this->eid(); ?> .mml-form textarea{
				border-color:rgba(2,125,92,0.5);
				background-color: #03a67b;
				color:#028662;
				height: 120px;
			}
			.<?php $this->eid(); ?> .mml-form textarea:placeholder{
				color:#028662;
			}
			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]):focus{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			
			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]):active{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			.<?php $this->eid(); ?> .mml-form textarea:focus{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			.<?php $this->eid(); ?> .mml-form textarea:active{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			.<?php $this->eid(); ?> .mml-form .mml-formtip{
				color: #ffffff;
				text-align:left;
				margin: 10px 0 50px;
			}
			.<?php $this->eid(); ?> .mml-form input[type="submit"]{
				background-color: #ffffff;
				color: #03a67b;
			}
			.<?php $this->eid(); ?> .info h2{
				color: #333333;
			}
			.<?php $this->eid(); ?> .info p{
				color: #808080;
			}
			.<?php $this->eid(); ?> .mml-adv h2{
				color: #1a1a1a;
			}
			.<?php $this->eid(); ?> .mml-adv p{
				color: #808080;
				max-width:860px;
			}
			.<?php $this->eid(); ?> .mml-adv h4{
				color: #333333;
			}
			.<?php $this->eid(); ?> .mml-adv li{
				color: #808080;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .mml-form input:not([type="submit"])').on('focus',function(){
			$(this).parents('label').addClass('focus')
		}).on('blur',function(){
			$(this).parents('label').removeClass('focus')
		});

		$('.<?php $this->eid(); ?> .mml-form textarea').on('focus',function(){
			$(this).parents('label').addClass('focus')
		}).on('blur',function(){
			$(this).parents('label').removeClass('focus')
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<ul class="list mml-cols-3">
						<li class="item">
							<div class="desc">
								<h4>Service 1</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<ul>
									<li>
										<i class="fas fa-check"></i>Digital Branding
									</li>
									<li>
										<i class="fas fa-check"></i>Social Media Marketing
									</li>
									<li>
										<i class="fas fa-check"></i>Search Engine Optimization
									</li>
									<li>
										<i class="fas fa-check"></i>Web Design & Web Development
									</li>
								</ul>
							</div>
							<a href="" class="link"><i class="fas fa-arrow-right"></i></a>
						</li>
						<li class="item">
							<div class="desc">
								<h4>Service 1</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<ul>
									<li>
										<i class="fas fa-check"></i>Digital Branding
									</li>
									<li>
										<i class="fas fa-check"></i>Social Media Marketing
									</li>
									<li>
										<i class="fas fa-check"></i>Search Engine Optimization
									</li>
									<li>
										<i class="fas fa-check"></i>Web Design & Web Development
									</li>
								</ul>
							</div>
							<a href="" class="link"><i class="fas fa-arrow-right"></i></a>
						</li>
						<li class="item">
							<div class="desc">
								<h4>Service 1</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
								<ul>
									<li>
										<i class="fas fa-check"></i>Digital Branding
									</li>
									<li>
										<i class="fas fa-check"></i>Social Media Marketing
									</li>
									<li>
										<i class="fas fa-check"></i>Search Engine Optimization
									</li>
									<li>
										<i class="fas fa-check"></i>Web Design & Web Development
									</li>
								</ul>
							</div>
							<a href="" class="link"><i class="fas fa-arrow-right"></i></a>
						</li>

					</ul>

					<div class="mml-box">
						<div class="info">
							<h2>Contact Your Personal Manager</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<div class="ppl">
								<div class="img">
									<img src="https://via.placeholder.com/127x146" alt="">
									<h5>Ben Tompson</h5>
								</div>
								<h4>“We help Saas companies find their voice, grow the ARR monster and scale internationally.”</h4>
							</div>
						</div>
						<div class="mml-form">
							<h3>Get In Touch</h3>
							<?php echo do_shortcode('[contact-form-7 id="7" title="Contact 005"]');?>
						</div>
					</div>

					<div class="mml-adv">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
						<ul class="adv mml-cols-4">
							<li>
								<div class="icon">
									<!-- <i class="fas fa-crown"></i> -->
									<img src="https://via.placeholder.com/80x80" alt="">
								</div>
								<h4>Heading 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>
							</li>
							<li>
								<div class="icon">
									<!-- <i class="fas fa-crown"></i> -->
									<img src="https://via.placeholder.com/80x80" alt="">
								</div>
								<h4>Heading 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>
							</li>
							<li>
								<div class="icon">
									<!-- <i class="fas fa-crown"></i> -->
									<img src="https://via.placeholder.com/80x80" alt="">
								</div>
								<h4>Heading 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>
							</li>
							<li>
								<div class="icon">
									<!-- <i class="fas fa-crown"></i> -->
									<img src="https://via.placeholder.com/80x80" alt="">
								</div>
								<h4>Heading 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
