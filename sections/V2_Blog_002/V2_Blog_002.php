<?php

/*
	<?php
	?>
*/

class V2_Blog_002  extends MML_Section_Base {
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
				margin-bottom: 50px;
			}
			.<?php $this->eid(); ?> h4{
				color: #353535;
				font-size: 20px;

			}
			.<?php $this->eid(); ?> .main p{
				color: #181818;
			}
			.<?php $this->eid(); ?> .list p{
				color: #b6b6b6;
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
						<div class="main">
							<div class="img">
								<img src="https://via.placeholder.com/580x420" alt="">
							</div>
							<div class="info">
								<h4>Raw material<span class="time">Aug 26 2018</span></h4>
								<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
								<a href="" class="link">Read More >></a>
							</div>
						</div>
						<ul class="list">
							<li>
								<div class="thumb">
									<img src="https://via.placeholder.com/200x145" alt="">
								</div>
								<div class="desc">
									<h4>Raw material</h4>
									<h4>Aug 26 2018</h4>
									<p>We will prepare all raw materials before hand to ensure ...</p>
									<a href="" class="link">Read More >></a>
								</div>
							</li>
							<li>
								<div class="thumb">
									<img src="https://via.placeholder.com/200x145" alt="">
								</div>
								<div class="desc">
									<h4>Raw material</h4>
									<h4>Aug 26 2018</h4>
									<p>We will prepare all raw materials before hand to ensure ...</p>
									<a href="" class="link">Read More >></a>
								</div>
							</li>
							<li>
								<div class="thumb">
									<img src="https://via.placeholder.com/200x145" alt="">
								</div>
								<div class="desc">
									<h4>Raw material</h4>
									<h4>Aug 26 2018</h4>
									<p>We will prepare all raw materials before hand to ensure ...</p>
									<a href="" class="link">Read More >></a>
								</div>
							</li>
						</ul>
					</div>
					
				</div>
			</div>
		<?php
	}
}
