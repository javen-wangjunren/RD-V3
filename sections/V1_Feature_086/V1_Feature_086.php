<?php

/*
	<?php
	?>
*/

class V1_Feature_086  extends MML_Section_Base
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
				//tab点击
				! function() {
					$('.v1_feature_086 .tab-controller li').on('click',function() {
						let index = $(this).index();
						$('.v1_feature_086 .tab-controller li').removeClass('active');
						$('.v1_feature_086 .tab-content>li').removeClass('active');

						$('.v1_feature_086 .tab-controller li').eq(index).addClass('active');
						$('.v1_feature_086 .tab-content>li').eq(index).addClass('active');
					})
				}()
			});
		})(jQuery);
	<?php
	}

	public function html()
	{
	?>
		<div class="<?php $this->echo_default_classes(); ?>">
			<!-- insert html start -->
			<div class="container">
				<h2>We Bring Impactful Digital Solutions</h2>
				<p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
				<ul class="tab-controller">
					<li class="active">Tab1</li>
					<li>Tab2</li>
					<li>Tab3</li>
					<li>Tab4</li>
					<li>Tab5</li>
					<li>Tab6</li>
				</ul>
				<ul class="tab-content">
					<li class="active">
						<ul class="content-wrap">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
						</ul>
					</li>
					<li >
						<ul class="content-wrap">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading2</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
						</ul>
					</li>
					<li>
						<ul class="content-wrap">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading3</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
						</ul>
					</li>
					<li >
						<ul class="content-wrap">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading4</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
						</ul>
					</li>
					<li>
						<ul class="content-wrap">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading5</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
						</ul>
					</li>
					<li>
						<ul class="content-wrap">
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading6</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
							<li>
								<div class="img-wrap">
									<img src="https://dummyimage.com/280x184" alt="">
									<div class="text-wrap">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, om consectetur adipiscing elit. Aenean euismod bibendum laoreet roin gravid.</p>
									</div>
								</div>
								<h5>Heading</h5>
							</li>
						</ul>
					</li>
				</ul>
				<div class="btns">
					<a href="#" class="btn">CTA Button</a>
					<a href="#" class="btn">CTA Button</a>
				</div>
			</div>
			<!-- insert html end -->
		</div>
<?php
	}
}
