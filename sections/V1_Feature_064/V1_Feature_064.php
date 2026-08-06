<?php

/*
	<?php
	?>
*/

class V1_Feature_064  extends MML_Section_Base {
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
			
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
				
			}
			.<?php $this->eid(); ?> .mml-col {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
					-ms-flex-pack: justify;
						justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				margin-bottom: 60px;
				}

				.<?php $this->eid(); ?> .mml-col:last-child {
				margin-bottom: 0px;
				}

				.<?php $this->eid(); ?> .mml-col.mml-reverse {
				-webkit-box-orient: horizontal;
				-webkit-box-direction: reverse;
				-webkit-flex-direction: row-reverse;
					-ms-flex-direction: row-reverse;
						flex-direction: row-reverse;
				}

				.<?php $this->eid(); ?> .mml-pic {
				width: 51%;
				max-width: 600px;
				}

				.<?php $this->eid(); ?> .mml-download {
				width: 46%;
				}

				.<?php $this->eid(); ?> h2 {
				color: #333;
				margin-bottom: 0px;
				padding-bottom: 0px;
				}

				.<?php $this->eid(); ?> span {
				display: block;
				color: #999;
				margin-top: 15px;
				font-size: 24px;
				}

				.<?php $this->eid(); ?> a.btn {
				display: inline-block;
				background-color: #5f6776;
				color: #fff;
				margin: 0;
				margin-top: 60px;
				}

				@media (max-width: 768px) {
				.<?php $this->eid(); ?> .mml-col {
					-webkit-flex-wrap: wrap;
						-ms-flex-wrap: wrap;
							flex-wrap: wrap;
					-webkit-box-pack: center;
					-webkit-justify-content: center;
						-ms-flex-pack: center;
							justify-content: center;
				}
				.<?php $this->eid(); ?> .mml-pic {
					-webkit-box-ordinal-group: 2;
					-webkit-order: 1;
						-ms-flex-order: 1;
							order: 1;
					width: 100%;
				}
				.<?php $this->eid(); ?> .mml-download {
					-webkit-box-ordinal-group: 3;
					-webkit-order: 2;
						-ms-flex-order: 2;
							order: 2;
					width: 100%;
					max-width: 600px;
					margin-top: 30px;
				}
				.<?php $this->eid(); ?> a.btn {
					margin-top: 30px;
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
				<div class="container " >
					<div class="mml-col mml-reverse">
						<div class="mml-pic">
							<img src="http://via.placeholder.com/600x410" alt="">
						</div>
						<div class="mml-download">
							<h2>Resource File Title</h2>
							<span>(Download File Info)</span>
							<a href="" class="btn" download="download">CTA Button</a>
						</div>
					</div>
					<div class="mml-col">
						<div class="mml-pic">
							<img src="http://via.placeholder.com/600x410" alt="">
						</div>
						<div class="mml-download">
							<h2>Resource File Title</h2>
							<span>(Download File Info)</span>
							<a href="" class="btn" download="download">CTA Button</a>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
