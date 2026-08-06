<?php

/*
	<?php
	?>
*/

class V2_Feature_013  extends MML_Section_Base {
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
				color: #333333;
			}
			.<?php $this->eid(); ?> .item h4{
				color: #515a5e;
			}
			.<?php $this->eid(); ?> .item p{
				color: #889194;
			}
			.<?php $this->eid(); ?> .slick-dots button{
				background-color: #dde1e3;
			}
			.<?php $this->eid(); ?> .slick-dots .slick-active button{
				background-color: #03a679;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			arrows:false,
			slidesToShow: 3,
			slidesToScroll: 3,
			dots:true,
			responsive: [{
				breakpoint: 750,
				settings: { 
					slidesToShow: 2,
					slidesToScroll: 2,

				}
			},
			{
				breakpoint: 400,
				settings: { 
					slidesToShow: 1,
					slidesToScroll: 1,

				}
			}]
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h2>Tow-Max's Complete Service From Start to Finish</h2>
					<div class="slicker">
						<div class="item">
							<div class="icon">
								<!-- <i class="fas fa-check"></i> --> <!-- 有icon输出icon -->
								<img src="https://via.placeholder.com/80x80" alt=""> <!--无icon输出img-->
							</div>
							<h4>Sourcing</h4>
							<p>Using our network of multiple optimum factories, we’ll find suitable trailer parts at a competitive price.</p>
						</div>
						<div class="item">
							<div class="icon">
								<!-- <i class="fas fa-check"></i> --> <!--有icon输出icon-->
								<img src="https://via.placeholder.com/80x80" alt=""> <!--无icon输出img-->
							</div>
							<h4>ODM/OEM</h4>
							<p>The close relationships with competent manufacturers helps us innovate our trailer parts and suit your specific needs.</p>
						</div>
						<div class="item">
							<div class="icon">
								<!-- <i class="fas fa-check"></i> --> <!--有icon输出icon-->
								<img src="https://via.placeholder.com/80x80" alt=""> <!--无icon输出img-->
							</div>
							<h4>Sourcing</h4>
							<p>Using our network of multiple optimum factories, we’ll find suitable trailer parts at a competitive price.</p>
						</div>
						<div class="item">
							<div class="icon">
								<!-- <i class="fas fa-check"></i> --> <!--有icon输出icon-->
								<img src="https://via.placeholder.com/80x80" alt=""> <!--无icon输出img-->
							</div>
							<h4>ODM/OEM</h4>
							<p>The close relationships with competent manufacturers helps us innovate our trailer parts and suit your specific needs.</p>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
