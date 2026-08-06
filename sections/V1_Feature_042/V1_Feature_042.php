<?php

/*
	<?php
	?>
*/

class V1_Feature_042  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h4{
				color: #000000;
			}
			.<?php $this->eid(); ?> h2{
				color: #000000;
			}
			.<?php $this->eid(); ?> p{
				color: #808080;
			}
			.<?php $this->eid(); ?> li{
				color: #000;
			}
			.<?php $this->eid(); ?> .btn{
				background-color: #5d6777;
				border-color: #5d6777;
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .btn.btn-reverse{
				background-color: transparent;
				border-color: #5d6777;
				color: #5d6777;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $sfor = $('.<?php $this->eid(); ?> .slicker-for').slick({
			arrows: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			asNavFor: $snav,
			focusOnSelect: true,
			 responsive: [
                {
                    breakpoint: 801,
                    settings: {
						dots:true,
                    }
                },

			]

		});
		var $snav = $('.<?php $this->eid(); ?> .slicker-nav').slick({
			arrows: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			asNavFor: $sfor,
            focusOnSelect: true,
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<ul class="slicker-for">
						<li>
							<div class="item">
								<div class="info">
									<h4>MML Digital</h4>
									<h2>We Bring Impactful Digital Solutions</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
									<ul class="list">
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
									</ul>
									<div class="btns">
										<a href="" class="btn">CTA Button</a>
										<a href="" class="btn btn-reverse">CTA Button</a>
									</div>
								</div>
								<div class="mml-img">
									<img src="https://via.placeholder.com/480x354?text=1" alt="">
								</div>
							</div>
						</li>
						<li>
							<div class="item">
								<div class="info">
									<h4>MML Digital</h4>
									<h2>We Bring Impactful Digital Solutions</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
									<ul class="list">
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
									</ul>
									<div class="btns">
										<a href="" class="btn">CTA Button</a>
										<a href="" class="btn btn-reverse">CTA Button</a>
									</div>
								</div>
								<div class="mml-img">
									<img src="https://via.placeholder.com/480x354?text=2" alt="">
								</div>
							</div>
						</li>
						<li>
							<div class="item">
								<div class="info">
									<h4>MML Digital</h4>
									<h2>We Bring Impactful Digital Solutions</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
									<ul class="list">
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
									</ul>
									<div class="btns">
										<a href="" class="btn">CTA Button</a>
										<a href="" class="btn btn-reverse">CTA Button</a>
									</div>
								</div>
								<div class="mml-img">
									<img src="https://via.placeholder.com/480x354?text=3" alt="">
								</div>
							</div>
						</li>
						<li>
							<div class="item">
								<div class="info">
									<h4>MML Digital</h4>
									<h2>We Bring Impactful Digital Solutions</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
									<ul class="list">
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Digital Branding</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
										<li><i class="fas fa-check-circle"></i>Social Media Marketing</li>
									</ul>
									<div class="btns">
										<a href="" class="btn">CTA Button</a>
										<a href="" class="btn btn-reverse">CTA Button</a>
									</div>
								</div>
								<div class="mml-img">
									<img src="https://via.placeholder.com/480x354?text=4" alt="">
								</div>
							</div>
						</li>
					</ul>
					<ul class="slicker-nav">
						<li>
							<img src="https://via.placeholder.com/480x354?text=1" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/480x354?text=2" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/480x354?text=3" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/480x354?text=4" alt="">
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
