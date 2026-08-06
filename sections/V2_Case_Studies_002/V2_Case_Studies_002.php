<?php

/*
	<?php
	?>
*/

class V2_Case_Studies_002  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .mml-list{
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> li{
				width: 49%;
				max-width: 580px;
				margin-bottom: 80px;
			}
			.<?php $this->eid(); ?> img{
				z-index: 1;
			}
			.<?php $this->eid(); ?> .mml-text{
				z-index: 2;
				margin: 0 auto;
				margin-top: -60px;
				transform: translateY(0);
				padding: 30px 80px 65px 80px;
				box-sizing: border-box;
				max-width: 540px;
				text-align: left;
				background: #5f6776;
				color: #fff;
			}
			@media screen and (max-width:960px){
				.<?php $this->eid(); ?> .mml-text{
					padding: 15px 40px 32px 40px;
				}
			}
			@media screen and (max-width:830px){
				.<?php $this->eid(); ?> .mml-list{
					justify-content: center;
				}
				.<?php $this->eid(); ?> li{
					width:100%;
				}
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
				<!-- insert html start -->
				
				<div class="container">
					<ul class="mml-list">
						<li>
							<img src="https://via.placeholder.com/580x520/e9eef4" alt="">
							<div class="mml-text">
								<h3>Raw material Preparation</h3>
								<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
							</div>
						</li>
						<li>
							<img src="https://via.placeholder.com/580x520/e9eef4" alt="">
							<div class="mml-text">
								<h3>Raw material Preparation</h3>
								<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
							</div>
						</li>
					</ul>
				</div>
				
				<!-- insert html end -->
			</div>
		<?php
	}
}
