<?php

/*
	<?php
	?>
*/

class V2_Feature_013_1  extends MML_Section_Base {
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
					slidesToScroll:3,
					autoplay: false,
					dots:true,
					responsive: [{
						breakpoint: 600,
						settings: { slidesToShow: 1 }
					}]
				});
			});
		
		})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="mml-bigRow">
					<div class="col-left">
						<span>Beluga in Figures</span>
						<h2>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. </h2>
						<div class="slick-btn">
							<button type="button" class="slick-prev slick-arrow slick-hidden" aria-disabled="true" tabindex="-1"><i class="fas fa-chevron-left"></i></button>
							<button type="button" class="slick-next slick-arrow slick-hidden" aria-disabled="true" tabindex="-1"><i class="fas fa-chevron-right"></i></button>
						</div>
					</div>
					<div class="col-right">
						<ul class="slicker">
							<li>
								<a href="">
									<img src="http://via.placeholder.com/380x470" alt="">
								</a>
							</li>
							<li>
								<a href="">
									<img src="http://via.placeholder.com/380x470" alt="">
								</a>
							</li>
							<li>
								<a href="">
									<img src="http://via.placeholder.com/380x470" alt="">
								</a>
							</li>
							<li>
								<a href="">
									<img src="http://via.placeholder.com/380x470" alt="">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
