<?php

/*
	<?php
	?>
*/

class V1_Team_007  extends MML_Section_Base
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
		$('.v1_team_007 .slicker1').slick({
		slidesToShow: 1,
		/* autoplay: true, */
		slidesToScroll: 1,
		dots:true,
		prevArrow: ".v1_team_007 .fa-chevron-left",
		nextArrow: ".v1_team_007 .fa-chevron-right",
		responsive: [

		]
		});

		$('.v1_team_007 .slicker2').slick({
			slidesToShow: 4,
			/* autoplay: true, */
			slidesToScroll: 1,
			dots:false, 
			prevArrow: ".v1_team_007 .fa-chevron-left",
			nextArrow: ".v1_team_007 .fa-chevron-right",
			responsive: [
				{
					breakpoint: 800,
					settings: {
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 460,
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

	public function html()
	{
	?>
		<div class="<?php $this->echo_default_classes(); ?>">
			<!-- insert html start -->
			<div class="container">
				<div class="top-container">
					<h2>Leadership</h2>
					<ul class="slicker1">
						<li>
							<div>
								<div class="wrapper">
									<div class="wrap-item">
										<img src="https://dummyimage.com/200x363" alt="">
										<div class="text-wrap">
											<p>"Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable."</p>
											<h3>Tommy, CEO</h3>
											<span>Follow Tommy by:</span>
											<ul class="icon-wrap">
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
											</ul>
										</div>
									</div>
									<div class="wrap-item">
										<img src="https://dummyimage.com/200x363" alt="">
										<div class="text-wrap">
											<p>"Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable."</p>
											<h3>Tommy, CEO</h3>
											<span>Follow Tommy by:</span>
											<ul class="icon-wrap">
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</li>
						<li>
							<div>
								<div class="wrapper">
									<div class="wrap-item">
										<img src="https://dummyimage.com/200x363" alt="">
										<div class="text-wrap">
											<p>"Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable."</p>
											<h3>Tommy, CEO</h3>
											<span>Follow Tommy by:</span>
											<ul class="icon-wrap">
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
											</ul>
										</div>
									</div>
									<div class="wrap-item">
										<img src="https://dummyimage.com/200x363" alt="">
										<div class="text-wrap">
											<p>"Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable."</p>
											<h3>Tommy, CEO</h3>
											<span>Follow Tommy by:</span>
											<ul class="icon-wrap">
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
												<li>
													<i class="fas fa-check-circle"></i>
												</li>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</li>
					</ul>
				</div>


				<div class="bottom-container">
					<h3>Key Team Members-</h3>
					<div class="slicker2-wrapper">
						<ul class="slicker2">
							<li>
								<img src="https://dummyimage.com/200x266" alt="">
								<div class="name">Name</div>
								<div class="position">-Position-</div>
							</li>
							<li>
								<img src="https://dummyimage.com/200x266" alt="">
								<div class="name">Name</div>
								<div class="position">-Position-</div>
							</li>
							<li>
								<img src="https://dummyimage.com/200x266" alt="">
								<div class="name">Name</div>
								<div class="position">-Position-</div>
							</li>
							<li>
								<img src="https://dummyimage.com/200x266" alt="">
								<div class="name">Name</div>
								<div class="position">-Position-</div>
							</li>
							<li>
								<img src="https://dummyimage.com/200x266" alt="">
								<div class="name">Name</div>
								<div class="position">-Position-</div>
							</li>
						</ul>
						<i class="fas fa-chevron-left"></i>
						<i class="fas fa-chevron-right"></i>
					</div>

				</div>
			</div>
			<!-- insert html end -->
		</div>
<?php
	}
}
