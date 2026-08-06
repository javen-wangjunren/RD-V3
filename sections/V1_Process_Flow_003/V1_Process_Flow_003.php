<?php

/*
	<?php
	?>
*/

class V1_Process_Flow_003  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2 {
				color: #222;
			}
			.<?php $this->eid(); ?> > .container > p {
				max-width: 860px;
			}
			.<?php $this->eid(); ?> .items {
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .item {
				margin: 40px 20px 0 0;
				padding: 12px 30px;
				display: flex;
				align-items: center;
				background-color: #e5ebf2;
				color: #333;
				border-radius: 100px;
			}
			.<?php $this->eid(); ?> .item span {
				margin-right: 12px;
				font-size: 20px;
				font-weight: 600;
			}
			@media (max-width: 640px) {
				.<?php $this->eid(); ?> .item {
					padding: 8px 16px;
					margin: 12px 8px 0 0;
				}
				.<?php $this->eid(); ?> .item > span {
					font-size: 16px;
				}
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<div class="items">
						<a class="item">
							<span>Lorem ipsum dolor</span>
							<!-- 有icon输出icon，无则输出img -->
							<!-- <i class="fas fa-caret-right"></i> -->
							<img src="https://via.placeholder.com/10x10/585f6b/585f6b?text=I" alt="">
						</a>
						<a class="item">
							<span>Lorem ipsum dolor sit amet</span>
							<img src="https://via.placeholder.com/10x10/585f6b/585f6b?text=I" alt="">
						</a>
						<a class="item">
							<span>Lorem ipsum dolor</span>
							<img src="https://via.placeholder.com/10x10/585f6b/585f6b?text=I" alt="">
						</a>
						<a class="item">
							<span>Lorem ipsum dolor sit amet</span>
							<img src="https://via.placeholder.com/10x10/585f6b/585f6b?text=I" alt="">
						</a>
						<a class="item">
							<span>Lorem ipsum dolor</span>
							<img src="https://via.placeholder.com/10x10/585f6b/585f6b?text=I" alt="">
						</a>
					</div>
				</div>
			</div>
		<?php
	}
}
