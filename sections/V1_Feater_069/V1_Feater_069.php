<?php

/*
	<?php
	?>
*/

class V1_Feater_069  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> section {
				max-width: 780px;
				margin: 0 auto;
				}

				.<?php $this->eid(); ?> h2 {
				font-size: 36px;
				color: #333;
				margin-bottom: 20px;
				}

				.<?php $this->eid(); ?> b {
				font-size: 20px;
				color: #333;
				}

				@media (max-width: 768px) {
				.<?php $this->eid(); ?> h2 {
					font-size: 32px;
				}
				}

				@media (max-width: 540px) {
				.<?php $this->eid(); ?> h2 {
					font-size: 28px;
				}
				.<?php $this->eid(); ?> b {
					font-size: 18px;
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
					<section>
						<h2>“We help Saas companies find their voice, grow the ARR monster and scale internationally.”</h2>
						<b>- Ben Tompson, CEO of Company A</b>
					</section>
				</div>
			</div>
		<?php
	}
}
