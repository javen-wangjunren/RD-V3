<?php

/*
	<?php
	?>
*/

class V2_Feature_017  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .tit h2{
				color: #ffffff;
            	max-width: 500px;
			}
			.<?php $this->eid(); ?> .tit .line{
				background-color: #bbbbbb;

			}
			.<?php $this->eid(); ?> .list >li{
				background-color: #eef7f0;
			}
			.<?php $this->eid(); ?> .list >li:hover{
				background-color: #fff;

			}
			.<?php $this->eid(); ?> .list h4{
				color: #34592f;
				margin-top:10px;
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
					<div class="tit">
						<h2>Quick Support to Turn-Key Solution</h2>
						<div class="line"></div>
					</div>
					<ul class="list mml-cols-2">
						<li>
							<img src="https://via.placeholder.com/120x120" alt="">
							<h4>Heading 5</h4>
						</li>
						<li>
							<img src="https://via.placeholder.com/120x120" alt="">
							<h4>Heading 5</h4>
						</li>
						<li>
							<img src="https://via.placeholder.com/120x120" alt="">
							<h4>Heading 5</h4>
						</li>
						<li>
							<img src="https://via.placeholder.com/120x120" alt="">
							<h4>Heading 5</h4>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
