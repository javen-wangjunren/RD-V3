<?php

/*
	<?php
	?>
*/

class V2_Feature_009  extends MML_Section_Base {
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
			/* insert style end */
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('h2_color'); ?>
				margin-bottom:40px;
			}
			.<?php $this->eid(); ?> .slider {
				position: relative;
			}
			.<?php $this->eid(); ?> .slick-arrow {
				position: absolute;
				z-index: 2;
				top: 40%;
				transform: translate(0, -50%);
				width: 70px;
				line-height: 70px;
				background-color: #000;
				color:#fff;
			}
			
			.<?php $this->eid(); ?> .slick-arrow:hover{
				opacity: .5;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: 65px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: 65px;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover {
				background: <?php $this->est('arrow_color.bg:hover'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				position: relative;
				margin: 30px 100px 20px;
			}
			.<?php $this->eid(); ?> .slicker > li {
				position: absolute;
				left: 0; top: 0; bottom: 0; right: 0;
				transform: scale(.7917) translate(0, 0);
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .slicker > .prev {
				transform: scale(.7917) translate(-26.0645%, 0);
				z-index: 1;
			}
			.<?php $this->eid(); ?> .slicker > .next {
				transform: scale(.7917) translate(26.0645%, 0);
			}
			.<?php $this->eid(); ?> .slicker > .active {
				position: relative;
				transform: none;
				z-index: 2;
			}
			.<?php $this->eid(); ?> .slicker > .active .text{
					opacity: 1;
				}

			.<?php $this->eid(); ?> .slicker > .active  img{
					transform: translateY(30px);
				}
			.<?php $this->eid(); ?> .mml-text {
				text-align: left;
			}

			
			.<?php $this->eid(); ?> h3 {
				margin-top: 20px;
				<?php $this->css_attr_color('h3_color'); ?>
			}
			.<?php $this->eid(); ?> .text{
				text-align: center;
				opacity: 0;
				transition: all .6s;
				margin-top: 65px;
				p{
					margin-bottom: 10px;
				}
			}
			@media(max-width:960px){
				.<?php $this->eid(); ?>	h2{
					margin-bottom: 30px;
				}
				.<?php $this->eid(); ?>	.slicker > .active img{
					
						transform: translateY(25px);
					
				}
				.<?php $this->eid(); ?> .slick-arrow{
					width: 40px;
					height: 40px;
					line-height: 40px;
				}
			}

			@media(max-width:768px){
				.<?php $this->eid(); ?> .slicker{
					margin: 30px 60px 20px;
				}
				.<?php $this->eid(); ?> .slick-arrow{
					transform: translateY(-80px);
				}
			}
			@media (max-width: 540px) {
				
				.<?php $this->eid(); ?> .slick-arrow{
					top: 110px;
					transform: translateY(0px);
				}
				.<?php $this->eid(); ?> .slick-arrow {
					width: 40px;
					line-height: 40px;

				}
				.<?php $this->eid(); ?> .slicker > .active img{
					
						transform: translateY(55px);
					
				}

			}

			@media(max-width:420px){
				.<?php $this->eid(); ?> h2{
					margin-bottom: 0px;
				}
				.<?php $this->eid(); ?> .slicker{
					margin: 0px 30px 20px;
				}
				.<?php $this->eid(); ?> .slicker > .active img{
					
						transform: translateY(48px);
					
				}
			}
			@media (max-width: 630px) {
				.<?php $this->eid(); ?> .slicker{
					margin: 30px 50px 20px;
				}
				.<?php $this->eid(); ?> .slick-arrow {
					width: 40px;
					line-height: 40px;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $sliders = $('.<?php $this->eid(); ?> .slicker > li');
		var cursor = 0;
		var l = $sliders.length;

		$('.<?php $this->eid(); ?> .arrow-prev').click(function(){
			slide( false );
		});
		$('.<?php $this->eid(); ?> .arrow-next').click(function(){
			slide( true );
		});
		function slide( dir ){
			if( l > 1 ){
				var prev, current, next;
				if( dir ){
					prev = cursor - 1 === -1? (l-1): (cursor-1);
					$sliders[prev].classList.remove('prev');
					$sliders[cursor].className = 'prev';
					current = cursor + 1 === l? 0: (cursor + 1);
					$sliders[current].className = 'active';
					next = current + 1 === l? 0: (current + 1);
					$sliders[next].className = 'next';
				} else {
					prev = cursor + 1 === l? 0: (cursor+1);
					$sliders[prev].classList.remove('next');
					$sliders[cursor].className = 'next';
					current = cursor - 1 === -1? (l-1): (cursor - 1);
					$sliders[current].className = 'active';
					next = current - 1 === -1? (l-1): (current - 1);
					$sliders[next].className = 'prev';
				}
				cursor = current;
			} else {
				$sliders[ cursor ].className = 'next';
				cursor = 1 - cursor;
				$sliders[ cursor ].className = 'active';
			}
		}
			setTimeout(function click_swiper() {
				$('.arrow-next').click();
				$('.arrow-prev').click();
			},1000)
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
				<h2>Lean Manufacturing for Top-Rated Greenhouse</h2>
				<div class="slider">
					<ul class="slicker">
						<li class="active">
							<img src="https://via.placeholder.com/980x480/444/e9eef4?text=1" alt="">
							<div class="text">
								<h4>Notable Advantages</h4>
								<p>Eden Agri has been taken manufacturing as the priority since establishment. Because the quality of our greenhouse impacts on the growing environment of the plants and crops. Dedicated to pursuing quality during production, our ISO9001 and BV certified factory delivers the premium greenhouse materials by capitalizing facilities and advancing technology. Developed from small workshop to full production line, Eden Agri focuses on sustainable production process to provide custom greenhouse solution.</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/980x480/444/e9eef4?text=2" alt="">
							<div class="text">
								<h4>Notable Advantages</h4>
								<p>Eden Agri has been taken manufacturing as the priority since establishment. Because the quality of our greenhouse impacts on the growing environment of the plants and crops. Dedicated to pursuing quality during production, our ISO9001 and BV certified factory delivers the premium greenhouse materials by capitalizing facilities and advancing technology. Developed from small workshop to full production line, Eden Agri focuses on sustainable production process to provide custom greenhouse solution.</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/980x480/444/e9eef4?text=3" alt="">
							<div class="text">
								<h4>Notable Advantages</h4>
								<p>Eden Agri has been taken manufacturing as the priority since establishment. Because the quality of our greenhouse impacts on the growing environment of the plants and crops. Dedicated to pursuing quality during production, our ISO9001 and BV certified factory delivers the premium greenhouse materials by capitalizing facilities and advancing technology. Developed from small workshop to full production line, Eden Agri focuses on sustainable production process to provide custom greenhouse solution.</p>
							</div>
						</li>
					</ul>
					<a class="slick-arrow arrow-prev" href="javascript:;"><i class='fas fa-chevron-left'></i></a>
					<a class="slick-arrow arrow-next" href="javascript:;"><i class='fas fa-chevron-right'></i></a>
				</div>
			</div>
			</div>
		<?php
	}
}
