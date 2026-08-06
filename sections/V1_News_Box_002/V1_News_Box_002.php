<?php

/*
	<?php
	?>
*/

class V1_News_Box_002  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> p{
				color: #808080;
			}
			.<?php $this->eid(); ?> .btn{
				background-color: #03a67b;
				color: #ffffff;
			}
			.<?php $this->eid(); ?> .item h4{
				color: #333333;

			}
			.<?php $this->eid(); ?> .desc h5{
				color: #333333;
			}
			.<?php $this->eid(); ?> .desc .time{
				color: #b3b3b3;
			}
			.<?php $this->eid(); ?> .desc .link{
				color: #03a67b;
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
					<div class="tit-wrap">
						<div class="tit">
							<h2>We Bring Impactful Digital Solutions</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
						</div>
						<a href="" class="btn">View All News</a>
					</div>
					<div class="list mml-cols-2">
						<div class="item">
							<h4>Industry News</h4>
							<ul>
								<li>
									<div class="news-pic">
										<img src="https://via.placeholder.com/250x180" alt="">
									</div>
									<div class="desc">
										<h5>Lorem Ipsum Dolor Sit Amet</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<div class="data">
											<span class="time">02.02.2020</span>
											<a href="" class="link">Read More<i class="fas fa-chevron-right"></i></a>
										</div>
									</div>
								</li>
								<li>
									<div class="news-pic">
										<img src="https://via.placeholder.com/250x180" alt="">
									</div>
									<div class="desc">
										<h5>Lorem Ipsum Dolor Sit Amet</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<div class="data">
											<span class="time">02.02.2020</span>
											<a href="" class="link">Read More<i class="fas fa-chevron-right"></i></a>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="item">
							<h4>Exhibitions</h4>
							<ul>
								<li>
									<div class="news-pic">
										<img src="https://via.placeholder.com/250x180" alt="">
									</div>
									<div class="desc">
										<h5>Lorem Ipsum Dolor Sit Amet</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<div class="data">
											<span class="time">02.02.2020</span>
											<a href="" class="link">Read More<i class="fas fa-chevron-right"></i></a>
										</div>
									</div>
								</li>
								<li>
									<div class="news-pic">
										<img src="https://via.placeholder.com/250x180" alt="">
									</div>
									<div class="desc">
										<h5>Lorem Ipsum Dolor Sit Amet</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<div class="data">
											<span class="time">02.02.2020</span>
											<a href="" class="link">Read More<i class="fas fa-chevron-right"></i></a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
