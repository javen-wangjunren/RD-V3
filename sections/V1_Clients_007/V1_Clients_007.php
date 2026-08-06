<?php

/*
	<?php
	?>
*/

class V1_Clients_007  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .container >p{
				color: #808080;
				max-width:780px;
				margin:10px auto;
			}
			.<?php $this->eid(); ?> .slick-dots button{
				background-color: #c7c7c7;
			}
			.<?php $this->eid(); ?> .slick-dots .slick-active button{
				background-color: #5d6777;
			}
			.<?php $this->eid(); ?> .slicker .slick-slide i{
				color:rgba(95,103,118,1);
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
			infinite:true,
            slidesToShow: 6,
            slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow:'<i class="fas fa-chevron-left btn-l"></i>',
			nextArrow:'<i class="fas fa-chevron-right btn-r"></i>',
			responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 5,
                    }
                },
				{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 4,
                    }
				},
				{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                    }
				},
				{
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 2,
                    }
                },
			]
		});

		$('.<?php $this->eid(); ?> .slicker').slick({
			infinite:true,
            slidesToShow: 2,
            slidesToScroll: 1,
			dots: true,
			autoplay:true,
			arrows: false,
			responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                    }
				},
			]
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
					<ul class="list">
						<li>
							<img src="https://via.placeholder.com/180x128" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/180x128" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/180x128" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/180x128" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/180x128" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/180x128" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/180x128" alt="">
						</li>
					</ul>
					<ul class="slicker">
						<li>
							<a href="" class="vp-a">
								<img src="https://via.placeholder.com/580x357" alt="">
								<i class="fas fa-play-circle"></i>
							</a>
						</li>
						<li>
							<img src="https://via.placeholder.com/580x357" alt="">
						</li>
						<li>
							<img src="https://via.placeholder.com/580x357" alt="">
						</li>
						
					</ul>
				</div>
			</div>
		<?php
	}
}
