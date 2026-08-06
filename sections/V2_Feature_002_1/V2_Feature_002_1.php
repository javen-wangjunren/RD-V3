<?php

/*
	<?php
	?>
*/

class V2_Feature_002_1  extends MML_Section_Base
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
				$('.v2_feature_002_1 .tab-controller li').on('click', function() {
					let index = $(this).index();
					$('.v2_feature_002_1 .tab-controller li').add($('.v2_feature_002_1 .tab-content>li')).removeClass('active');
						$('.v2_feature_002_1 .tab-controller li').eq(index).add($('.v2_feature_002_1 .tab-content>li').eq(index)).addClass('active');
					})
			});
		})(jQuery);
	<?php
	}

	public function html()
	{
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
					<div class="left-wrap">
						<h2>Choose by Applications</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
				<li>
					<div class="left-wrap">
						<h2>Choose by Applications2</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
				<li>
					<div class="left-wrap">
						<h2>Choose by Applications3</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
				<li>
					<div class="left-wrap">
						<h2>Choose by Applications</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
				<li>
					<div class="left-wrap">
						<h2>Choose by Applications</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
				<li>
					<div class="left-wrap">
						<h2>Choose by Applications</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
				<li>
					<div class="left-wrap">
						<h2>Choose by Applications</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
				<li>
					<div class="left-wrap">
						<h2>Choose by Applications</h2>
						<div class="btn-wrap">
							<a href="##" class="btn">button</a>
							<div class="icon-wrap">
								<i class="fas fa-arrow-up"></i>
							</div>
						</div>
					</div>
					<div class="right-wrap">
						<div class="img-wrap">
							<img src="https://dummyimage.com/600x450" alt="">
							<div class="text-wrap">
								Stair Nosing
							</div>
						</div>
						<span>APPLICATION 1/8</span>
					</div>
				</li>
			</ul>

			<!-- insert html end -->
		</div>
<?php
	}
}
