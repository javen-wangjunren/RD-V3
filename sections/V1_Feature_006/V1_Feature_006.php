<?php

/*
	<?php
	?>
*/

class V1_Feature_006  extends MML_Section_Base {
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
			$(document).ready(function() {
				$('.v1_feature_006 .slicker').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					dots:true,
					arrows:false
				});
			})
		})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start -->
				<div class="container">
					<div class="left-wrap">
						<span>MML Digital</span>
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						<div class="icon-wrap">
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-check-circle"></i>
						</div>
					</div>
					<div class="right-wrap">
						<ul class="slicker">
							<li>
								<img src="https://dummyimage.com/480x354" alt="">
							</li>
							<li>
								<img src="https://dummyimage.com/480x354" alt="">
							</li>
							<li>
								<img src="https://dummyimage.com/480x354" alt="">
							</li>
						</ul>


					</div>
				</div>
				<!-- insert html end -->
			</div>
		<?php
	}
}
