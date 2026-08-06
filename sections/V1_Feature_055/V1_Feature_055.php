<?php

/*
	<?php
	?>
*/

class V1_Feature_055  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> {
				<?php $this->css_margin_top(); ?>
				<?php $this->css_padding_top(); ?>
				<?php $this->css_padding_bottom(); ?>
				<?php $this->css_margin_bottom(); ?>
				<?php $this->css_bg_color(); ?>
				<?php $this->css_bg_image(); ?>
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> > .container {
				width: 880px;
			}
			.<?php $this->eid(); ?> .list {
				display: flex;
				flex-wrap: wrap;
				color: #000;
				font-weight: 600;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				width: 50%;
				margin: 10px 0;
				padding-right: 20px;
				display: flex;
				align-items: center;
			}
			.<?php $this->eid(); ?> .list img,
			.<?php $this->eid(); ?> .list i {
				margin: 0 10px 0 0;
			}
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
					<ul class="list">
						<li>
							<img src="https://via.placeholder.com/46x46/585f6b/e9eef4?text=I" alt="">
							<span>Digital Branding</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/46x46/585f6b/e9eef4?text=I" alt="">
							<span>Digital Branding</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/46x46/585f6b/e9eef4?text=I" alt="">
							<span>Digital Branding</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/46x46/585f6b/e9eef4?text=I" alt="">
							<span>Digital Branding</span>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
