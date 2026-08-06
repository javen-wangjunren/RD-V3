<?php

/*
	<?php
	?>
*/

class V2_Feature_015  extends MML_Section_Base {
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
				color: #252118;
				text-align:center;
			}
			.<?php $this->eid(); ?> .list > li{
				background-color: #fafafa;
			}
			.<?php $this->eid(); ?> .list > li:hover{
				background-color: #ffffff;
				border-color:#03a679;
				box-shadow: 0px 30px 60px 0px 
					rgba(118, 128, 147, 0.1);
			}
			.<?php $this->eid(); ?> .list h4{
				color: #333333;
			}
			.<?php $this->eid(); ?> .list p{
				color: #bbb;
			}
			.<?php $this->eid(); ?> .list > li:hover p{
				color: #777777;
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
					<h2>Why Choose Hisea Dock</h2>
					<ul class="list mml-cols-3">
						<li>
							<div class="icon">
								<img src="https://via.placeholder.com/150x150" alt="">
							</div>
							<h4>Full Specifications</h4>
							<p>Hisea Dock has a full line of float specifications that can fit in well with different constructions, and can accommodate all kinds of waterfront activities.</p>
						</li>
						<li>
							<div class="icon">
								<img src="https://via.placeholder.com/150x150" alt="">
							</div>
							<h4>Time-Tested Quality</h4>
							<p>The superior plastic (HDPE) we use allows our plastic pontoons to enjoy a 20%-30% longer lifespan than most of our competitors’ pontoons.</p>
						</li>
						<li>
							<div class="icon">
								<img src="https://via.placeholder.com/150x150" alt="">
							</div>
							<h4>A 5-Year Warranty</h4>
							<p>If you buy our products, you can replace it free of charge within 5 years. And we also offer 24/7 after-sales service to guarantee customer satisfaction.</p>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
