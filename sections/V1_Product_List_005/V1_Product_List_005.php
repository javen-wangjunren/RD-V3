<?php

/*
	<?php
	?>
*/

class V1_Product_List_005  extends MML_Section_Base
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
				//初始化分页器
				! function() {
					myPageInit({
						pages: 8, //总页码由后端赋值
						currentPage: 1,
						element: '.v1_product_list_005 .my-page',
						callback: function(page) {
							if(8 == 0) {
								$('.my-pages').hide()
							}

							//page参数为当前页码
							console.log(page);
						}
					});
				}()

				//tab点击
				! function() {
					$('.v1_product_list_005 .tab-controller li').on('click',function() {
						let index = $(this).index();
						$('.v1_product_list_005 .tab-controller li').removeClass('active');
						$('.v1_product_list_005 .tab-controller li').eq(index).addClass('active');
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
				<div class="header">
					<h3>Tab Heading</h3>
					<ul class="tab-controller">
						<li>Tab Category</li>
						<li class="active">Tab Category</li>
						<li>Tab Category</li>
						<li>Tab Category</li>
						<li>Tab Category</li>
						<li>Tab Category</li>
						<li>Tab Category</li>
						<li>Tab Category</li>
						<li>Tab Category</li>
					</ul>
				</div>

				<ul class="tab-content">
					<li>
						<div class="img-wrap">
							<img src="https://dummyimage.com/380x285" alt="">
						</div>
						<div class="text-wrap">
							<h4>Product Name</h4>
							<div class="item">
								<span class="title">Data1:</span>
								<p class="desc">ipsum dolor sit amet</p>
							</div>
							<div class="item">
								<span class="title">Data1:</span>
								<p class="desc">ipsum dolor sit amet</p>
							</div>
						</div>
					</li>
					<li>
						<div class="img-wrap">
							<img src="https://dummyimage.com/380x285" alt="">
						</div>
						<div class="text-wrap">
							<h4>Product Name</h4>
							<div class="item">
								<span class="title">Data1:</span>
								<p class="desc">ipsum dolor sit amet</p>
							</div>
						</div>
					</li>
					<li>
						<div class="img-wrap">
							<img src="https://dummyimage.com/380x285" alt="">
						</div>
						<div class="text-wrap">
							<h4>Product Name</h4>
							<div class="item">
								<span class="title">Data1:</span>
								<p class="desc">ipsum dolor sit amet</p>
							</div>
						</div>
					</li>
					<li>
						<div class="img-wrap">
							<img src="https://dummyimage.com/380x285" alt="">
						</div>
						<div class="text-wrap">
							<h4>Product Name</h4>
							<div class="item">
								<span class="title">Data1:</span>
								<p class="desc">ipsum dolor sit amet</p>
							</div>
						</div>
					</li>
					<li>
						<div class="img-wrap">
							<img src="https://dummyimage.com/380x285" alt="">
						</div>
						<div class="text-wrap">
							<h4>Product Name</h4>
							<div class="item">
								<span class="title">Data1:</span>
								<p class="desc">ipsum dolor sit amet</p>
							</div>
						</div>
					</li>
					<li>
						<div class="img-wrap">
							<img src="https://dummyimage.com/380x285" alt="">
						</div>
						<div class="text-wrap">
							<h4>Product Name</h4>
							<div class="item">
								<span class="title">Data1:</span>
								<p class="desc">ipsum dolor sit amet</p>
							</div>
						</div>
					</li>
				</ul>

				<!-- 分页器 -->
				<div class="my-page"></div>
			</div>
			<!-- insert html end -->
		</div>
<?php
	}
}
