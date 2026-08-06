<?php

/*
	<?php
	?>
*/

class Clients_004  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2 {
				color:  #000;
			}
			.<?php $this->eid(); ?> > .container > p {
				margin: 10px auto;
				max-width: 780px;
			}
			.<?php $this->eid(); ?> .mml-box {
				margin-top: 40px;
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 50%;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .gallery {
				width: 50%;
				margin: 0 0 0 20px;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slicker img {
				margin-bottom: 20px;
			}
			.<?php $this->eid(); ?> .slick-arrow{
				top: 100%;
				transform: none;
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover{
				color: #212121;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto;
				right: 40px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: 10px;
			}
			.<?php $this->eid(); ?> .btns {
				margin: 40px 0 0;
			}
			.<?php $this->eid(); ?> .btn {
				background: #5d6777;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				border-color: #5d6777;
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #585f6b;
				color: #fff;
				border-color: transparent;
			}
			@media (max-width: 880px){
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .gallery {
					width: unset;
					max-width: unset;
					margin: 30px 0 0;
				}
				.<?php $this->eid(); ?> .btns {
					justify-content: center;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			slidesToShow: 3,
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			autoplay: true
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
					<div class="mml-box">
						<div class="mml-image"><img src="https://via.placeholder.com/580x411/e9eef4/5d6777?text=I" alt=""></div>
						<div class="gallery">
							<ul class="slicker">
								<li>
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
								</li>
								<li>
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
									<img src="https://via.placeholder.com/180x120/e9eef4/5d6777?text=I" alt="">
								</li>
							</ul>
							<div class="btns">
								<a href="javascript:;" class="btn">BUTTON 1</a>
								<a href="javascript:;" class="btn btn-reverse">BUTTON 2</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
