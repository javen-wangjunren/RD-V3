<?php

/*
	<?php
	?>
*/

class V2_Blog_001  extends MML_Section_Base {
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

			.<?php $this->eid(); ?> h2 {
				color: #353535;
				font-size: 48px;
			}
			.<?php $this->eid(); ?> .desc {
				background-color: #5f6776;

			}
			.<?php $this->eid(); ?> .desc h4{
				color: #ffffff;
				margin-bottom: 15px;

			}
			.<?php $this->eid(); ?> .desc p{
				color: #ffffff;

			}
			.<?php $this->eid(); ?> .link{
				color: #5f6776;
				font-size: 20px;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>

		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h2>Our Recent Blog</h2>
					<div class="blog-wrap">
						<ul class="list mml-cols-2">
							<li class="item">
								<a href="">
									<div class="img">
										<img src="https://via.placeholder.com/580x380" alt="">
									</div>
									<div class="desc">
										<h4>Raw material Preparation</h4>
										<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
									</div>
								</a>
							</li>
							<li class="item">
								<a href="">
									<div class="img">
										<img src="https://via.placeholder.com/580x380" alt="">
									</div>
									<div class="desc">
										<h4>Raw material Preparation</h4>
										<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
									</div>
								</a>
							</li>
						</ul>
						<a href="" class="link">View More Blog >></a>

					</div>
					
				</div>
			</div>
		<?php
	}
}
