<?php

/*
	<?php
	?>
*/

class V2_Feature_001_1  extends MML_Section_Base {
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
		$('.v2_feature_001_1 .tab-controller li').on('click', function() {
		let index = $(this).index();
		$('.v2_feature_001_1 .tab-controller li').add($('.v2_feature_001_1 .tab-content>li')).removeClass('active');
		$('.v2_feature_001_1 .tab-controller li').eq(index).add($('.v2_feature_001_1 .tab-content>li').eq(index)).addClass('active');
		})
		});
		})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start -->
				<div class="fixed-wrap">
					<ul class="tab-controller">
						<li class="active">
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
						<li>
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
						<li>
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
						<li>
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
						<li>
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
						<li>
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
						<li>
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
						<li>
							<img src="https://dummyimage.com/167x85" alt="">
							<span>BROADCAST</span>
						</li>
					</ul>
				</div>
				<ul class="tab-content container">
					<li class="active">
						<div class="wrapper1">
							<h2>Choose by Applications</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="wrapper1">
							<h2>Choose by Applications2</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="wrapper1">
							<h2>Choose by Applications3</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="wrapper1">
							<h2>Choose by Applications4</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="wrapper1">
							<h2>Choose by Applications5</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="wrapper1">
							<h2>Choose by Applications6</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="wrapper1">
							<h2>Choose by Applications7</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="wrapper1">
							<h2>Choose by Applications8</h2>
							<div class="img-wrap">
								<img src="https://dummyimage.com/780x370" alt="">
								<div class="icon-wrap">
									<i class="fas fa-arrow-up"></i>
								</div>
							</div>
						</div>
						<div class="wrapper2">
							<span>APPLICATION 1/8</span>
							<div class="text-wrap">
								<h4>Stair Nosing</h4>
								<p>Visibility of the stage area and footage broadcast is important, as you want all audience member’s to see everything clearly. The Viewpointec <a href="##">broadcast LED screens</a> have a big impact on the viewers at home, as the enormity and clarity will leave the viewers in awe of the spectacle on the small screen.</p>
							</div>
						</div>
					</li>
				</ul>
				<!-- insert html end -->
			</div>
		<?php
	}
}
