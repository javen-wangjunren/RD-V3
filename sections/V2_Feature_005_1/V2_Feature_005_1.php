<?php

/*
	<?php
	?>
*/

class V2_Feature_005_1  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .tab-nav ul {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				}

				.<?php $this->eid(); ?> .tab-nav li {
				-webkit-box-flex: 1;
				-webkit-flex: 1;
					-ms-flex: 1;
						flex: 1;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				padding: 0px 10px;
				text-align: center;
				cursor: pointer;
				color: #666;
				}

				.<?php $this->eid(); ?> .tab-nav li.mml-active span, .<?php $this->eid(); ?> .tab-nav li:hover span {
				color: #c72e2e;
				border-bottom: 2px solid #c72e2e;
				}

				.<?php $this->eid(); ?> .tab-nav span {
				display: inline-block;
				padding-bottom: 10px;
				border-bottom: 2px solid transparent;
				-webkit-transition: all .4s;
				-o-transition: all .4s;
				transition: all .4s;
				}

				.<?php $this->eid(); ?> .tab-main .icons {
				position: relative;
				margin-left: 35px;
				padding-left: 20px;
				border-left: 1px solid #777;
				margin-top: 45px;
				}

				.<?php $this->eid(); ?> .tab-main .icons i {
				position: absolute;
				left: -30px;
				top: 5px;
				font-size: 16px;
				}

				.<?php $this->eid(); ?> .tab-main .icons p {
				margin: 0px;
				text-align: left;
				line-height: 1.2;
				}

				.<?php $this->eid(); ?> .pic p {
				margin: 0px;
				margin-top: 15px;
				}

				.<?php $this->eid(); ?> .pic img {
				-webkit-border-radius: 50%;
						border-radius: 50%;
				}

				.<?php $this->eid(); ?> .pic li {
				margin-top: 40px;
				}

				@media (max-width: 540px) {
				.<?php $this->eid(); ?> .tab-nav ul {
					-webkit-flex-wrap: wrap;
						-ms-flex-wrap: wrap;
							flex-wrap: wrap;
				}
				.<?php $this->eid(); ?> .tab-nav li {
					-webkit-box-flex: unset;
					-webkit-flex: unset;
						-ms-flex: unset;
							flex: unset;
					width: 33%;
					margin-top: 10px;
					padding: 0px 5px;
					font-size: 14px;
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
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<div class="tab-nav">
						<ul>
							<li class="mml-active"><span>Color Availability</span></li>
							<li><span>Size Chart</span></li>
							<li><span>Specifications</span></li>
							<li><span>Design Philosophy</span></li>
							<li><span>Maintenance Notes</span></li>
							<li><span>RDS Practice</span></li>
						</ul>
					</div>
					<div class="tab-main">
						<div class="mml-text">
							<div class="icons">
								<i class="far fa-lightbulb"></i>
								<p>Here are our regular colors for your options. Apart from that, we can have you fully covered on any custom colors. You are mostly welcome to send your pantone number or fabric samples for effective bespoke manufacturing.</p>
							</div>
							<div class="pic">
								<ul class="mml-cols-5">
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>Black</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>Grey</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>White</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>Black</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>Grey</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>White</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>Black</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>Grey</p>
									</li>
									<li>
										<img src="http://via.placeholder.com/80x80" alt="">
										<p>White</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
