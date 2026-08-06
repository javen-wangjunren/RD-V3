<?php

/*
	<?php
	?>
*/

class V1_Feature_081  extends MML_Section_Base {
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
				color: #2a3344;
			}
			.<?php $this->eid(); ?> p{
				color: #808080;
			}
			.<?php $this->eid(); ?> .question{
				color: #2a3344;
			}
			.<?php $this->eid(); ?> .question i{
				color: #2a3344;
			}
			.<?php $this->eid(); ?> .mml-slider .mml-active .question{
				color: #2d72da;
			}
			.<?php $this->eid(); ?> .mml-slider .mml-active .question i{
				color: #2d72da;
			}
			.<?php $this->eid(); ?> .slicker .slick-arrow{
				color: #2a3344;
			}
			.<?php $this->eid(); ?> .btn{
				color: #fff;
				background-color: #2d72da;
				border-color: #2d72da;
			}
			.<?php $this->eid(); ?> .btn.btn-reverse{
				color: #2a3344;
				background-color: transparent;
				border-color: #2a3344;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $slider = $('.<?php $this->eid(); ?> .mml-slider');
		$slider.on('click', '.question', function(){
			$slider.find('.mml-active').removeClass('mml-active');
			var $li = this.parentNode;
			$li.classList.add('mml-active');
		});

		var $imgs = $('.<?php $this->eid(); ?> .slicker').slick({
			arrows: true,
			prevArrow:'<i class="fas fa-chevron-left btn-l"></i>',
            nextArrow:'<i class="fas fa-chevron-right btn-r"></i>',
			dots: false,
		});

		if($('.<?php $this->eid(); ?> .slicker .slick-item').length > 1){
			$slider.on('click', '.question', function(){
				var curTab=$slider.find('.mml-active').index();
				$imgs.slick('slickGoTo',curTab);

			})
			$imgs.on('afterChange',function(){
				var curIndex=$(this).slick('slickCurrentSlide');
				$(".<?php $this->eid(); ?> .mml-slider li").eq(curIndex).addClass("mml-active").siblings().removeClass("mml-active");
			});
		}
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="tit">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					</div>
					<div class="mml-box">
						<ul class="mml-slider">
							<li class="mml-active">
								<h4 class="question">Digital Branding<i class="fas fa-plus"></i><i class="fas fa-minus"></i></h4>
								<div class="answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</div>
							</li>
							<li>
								<h4 class="question">Social Media Marketing<i class="fas fa-plus"></i><i class="fas fa-minus"></i></h4>
								<div class="answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</div>
							</li>
							<li>
								<h4 class="question">Web Design & Web Development<i class="fas fa-plus"></i><i class="fas fa-minus"></i></h4>
								<div class="answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</div>
							</li>
						</ul>
						<ul class="slicker">
							<li class="slick-item mml-active">
								<img src="https://via.placeholder.com/500x340?text=1" alt="">
							</li>
							<li class="slick-item">
								<img src="https://via.placeholder.com/500x340?text=2" alt="">
							</li>
							<li class="slick-item">
								<img src="https://via.placeholder.com/500x340?text=3" alt="">
							</li>
						</ul>
					</div>
					<div class="btns">
						<a href="" class="btn">CTA Button</a>
						<a href="" class="btn btn-reverse">CTA Button</a>
					</div>
				</div>
			</div>
		<?php
	}
}
