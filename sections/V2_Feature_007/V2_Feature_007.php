<?php

/*
	<?php
	?>
*/

class V2_Feature_007  extends MML_Section_Base {
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
		
			.v2_feature_007 .container {
				display: flex;
				min-height: 634px;
				text-align: left;
			}
			.v2_feature_007 .left-wrap {
				display: flex;
				flex-direction: column;
				justify-content: center;
				max-width: 500px;
				width: 43%;
				background-color: #5d6777;
				padding: 0 45px;
				color: #ffffff;
				box-sizing: border-box;
			}
			.v2_feature_007 .left-wrap p {
				margin-top: 50px;
			}
			.v2_feature_007 .right-wrap {
				max-width: 582px;
				margin-left: auto;
				width: 50%;
				color: #5d6777;
			}
			.v2_feature_007 .right-wrap li {
				border-bottom: 1px solid #dedede;
				margin-bottom: 26px;
			}
			.v2_feature_007 .right-wrap li:nth-last-of-type(1) {
				margin-bottom: 0;
				border-bottom: none;
			}
			.v2_feature_007 .right-wrap li:nth-last-of-type(1) p {
				margin-bottom: 0;
			}
			.v2_feature_007 .right-wrap h4 {
			}
			.v2_feature_007 .right-wrap p {
				margin: 0;
				margin-top: 10px;
				margin-bottom: 20px;
			}

			@media (max-width:700px) {
				.v2_feature_007 .container {
					display: block;
				}
				.v2_feature_007 .left-wrap {
					max-width: 100%;
					width: 100%;
					padding: 40px;
				}
				.v2_feature_007 .left-wrap p {
					margin-top: 40px;
				}
				.v2_feature_007 .right-wrap {
					margin: 40px auto 0;
					max-width: 100%;
					width: 100%;
				}
				.v2_feature_007 h4 {
					text-align: center;
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
					<div class="left-wrap">
						<h1>Machines</h1>
						<p>Moreover, we also will create about 20 new designs of water bottles every year to enrich our product catalog to lead the latest trend in your market. Now our stylish water bottles are widely welcome in over 50 countries, especially in the USA and European.</p>
					</div>
					<ul class="right-wrap">
						<li>
							<h4>Raw material Preparation</h4>
							<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
						</li>
						<li>
							<h4>Raw material Preparation</h4>
							<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
						</li>
						<li>
							<h4>Raw material Preparation</h4>
							<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
						</li>
						<li>
							<h4>Raw material Preparation</h4>
							<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
						</li>
						<li>
							<h4>Raw material Preparation</h4>
							<p>We will prepare all raw materials before hand to ensure mass production goes on wheels.</p>
						</li>
					</ul>
				</div>
				<!-- insert html end -->
			</div>
		<?php
	}
}
