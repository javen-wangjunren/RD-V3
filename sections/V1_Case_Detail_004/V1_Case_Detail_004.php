<?php

/*
	<?php
	?>
*/

class V1_Case_Detail_004  extends MML_Section_Base
{
	function __construct($id, $style, $content)
	{
		parent::__construct($id, $style, $content);
	}

	public function set_default_value()
	{
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
	}

	public function style()
	{
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
	<?php
		$this->css_custom();
	}

	public function script()
	{
	?>
	(function($){
		$(document).ready(function(){
			$('.v1_case_detail_004 .slicker').slick({
				slidesToShow: 1,
				/* autoplay: true, */
				slidesToScroll: 1,
				prevArrow: ".v1_case_detail_004 .fa-chevron-left",
				nextArrow: ".v1_case_detail_004 .fa-chevron-right",
			});

			$('.v1_case_detail_004 .slicker').on('afterChange',function() {
				let currentIndex = $('.v1_case_detail_004 .slicker').slick('slickCurrentSlide');
				$('.v1_case_detail_004 .wrap li').removeClass('active');
				$('.v1_case_detail_004 .wrap li').eq(currentIndex).addClass('active');
			})

			$('.v1_case_detail_004 .wrap li').on('click',function(){
				let index = $(this).index();
				$('.v1_case_detail_004 .slicker').slick('slickGoTo',index,false);
			})
		})
	})(jQuery);
	<?php
	}

	public function html()
	{
	?>
		<div class="<?php $this->echo_default_classes(); ?>">
			<!-- insert html start -->
			<div class="container">

				<ul class="content-wrap slicker">
					<li>
						<p>Lorem ipsum dolor sit amet augue. Sed eu sem urna elit, non odio. Aenean lacus tellus quis ante. Fusce enim. Aliquam ultricies porta. Aenean ac eros sed arcu. Mauris nunc posuere cubilia Curae, Nullam et ipsum. Aliquam quis elit.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
					</li>
					<li>
						<p>Lorem ipsum dolor sit amet augue. Sed eu sem urna elit, non odio. Aenean lacus tellus quis ante. Fusce enim. Aliquam ultricies porta. Aenean ac eros sed arcu. Mauris nunc posuere cubilia Curae, Nullam et ipsum. Aliquam quis elit.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
					</li>
					<li>
						<p>Lorem ipsum dolor sit amet augue. Sed eu sem urna elit, non odio. Aenean lacus tellus quis ante. Fusce enim. Aliquam ultricies porta. Aenean ac eros sed arcu. Mauris nunc posuere cubilia Curae, Nullam et ipsum. Aliquam quis elit.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
					</li>
					<li>
						<p>Lorem ipsum dolor sit amet augue. Sed eu sem urna elit, non odio. Aenean lacus tellus quis ante. Fusce enim. Aliquam ultricies porta. Aenean ac eros sed arcu. Mauris nunc posuere cubilia Curae, Nullam et ipsum. Aliquam quis elit.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nam adipisci id aliquid enim nesciunt voluptatum architecto voluptatem iste sapiente, ipsum optio, non saepe quidem itaque perferendis dolores officiis ad.</p>
					</li>
				</ul>
				<div class="bottom-wrap">
					<h4>Project Navigation</h4>
					<div class="wrap">
						<ul>
							<li class="active">
								<div class="circle"></div>
								<span>Project Title 1 July 22, 2020</span>
							</li>
							<li>
								<div class="circle"></div>
								<span>Project Title 1 July 22, 2020</span>
							</li>
							<li>
								<div class="circle"></div>
								<span>Project Title 1 July 22, 2020</span>
							</li>
							<li>
								<div class="circle"></div>
								<span>Project Title 1 July 22, 2020</span>
							</li>
						</ul>
						<i class="fas fa-chevron-left"></i>
						<i class="fas fa-chevron-right"></i>
					</div>
				</div>
				<div class="share">
					<span>Wonderful! Share this Case:</span>
					<div class="icon-wrap">
						<a href="javascript:;"><i class="fab fa-facebook-square"></i></a>
						<a href="javascript:;"><i class="fab fa-twitter-square"></i></a>
						<a href="javascript:;"><i class="fab fa-linkedin"></i></a>
					</div>
				</div>
			</div>
			<!-- insert html end -->
		</div>
<?php
	}
}
