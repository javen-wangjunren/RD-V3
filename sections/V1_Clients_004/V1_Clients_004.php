<?php

/*
	<?php
	?>
*/

class V1_Clients_004  extends MML_Section_Base {
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
				color: #252525;
			}
			.<?php $this->eid(); ?> .container > p{
				max-width:780px;
				margin:10px auto;
			}
			.<?php $this->eid(); ?> .btn{
				background-color: #5d6777;
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background-color: transparent;
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				color:#5d6777;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker-for').slick({
			infinite:true,
            slidesToShow: 1,
            slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow:'.<?php $this->eid(); ?> .btn-l',
			nextArrow:'.<?php $this->eid(); ?> .btn-r',
            asNavFor: '.<?php $this->eid(); ?> .slicker-nav',
			focusOnSelect: true,
		});
		$('.<?php $this->eid(); ?> .slicker-nav').slick({
			infinite:true,
			slidesPerRow:3,
			rows:2,			
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			arrows: false,
            asNavFor: '.<?php $this->eid(); ?> .slicker-for',
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<div class="sliders">
						<ul class="slicker-for">
							<li>
								<img src="https://via.placeholder.com/580x410?text=1" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/580x410?text=2" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/580x410?text=3" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/580x410?text=4" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/580x410?text=5" alt="">
							</li>
							<li>
								<img src="https://via.placeholder.com/580x410?text=6" alt="">
							</li>
						</ul>
						<div class="s-right">
							<ul class="slicker-nav">
								<li>
									<img src="https://via.placeholder.com/580x410?text=1" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/580x410?text=2" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/580x410?text=3" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/580x410?text=4" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/580x410?text=5" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/580x410?text=6" alt="">
								</li>
							</ul>
							<div class="arrs">
								<i class="fas fa-chevron-left btn-l"></i>
								<i class="fas fa-chevron-right btn-r"></i>
							</div>
							<div class="btns">
								<a href="" class="btn">CTA Button</a>
								<a href="" class="btn btn-reverse">CTA Button</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
