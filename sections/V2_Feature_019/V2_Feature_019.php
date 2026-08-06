<?php

/*
	<?php
	?>
*/

class V2_Feature_019  extends MML_Section_Base {
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
				text-align:left;
				color: #333333;
				margin-bottom:25px;
			}
			.<?php $this->eid(); ?> .desc p{
				color: #808080;
			}
			.<?php $this->eid(); ?> .desc .icon{
				color: #03a679;
				font-size: 20px;
				background-color: #f5f5f5;

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
					<h2>We Bring Impactful Digital Solutions</h2>
					<div class="box">
						<div class="img">
							<img src="https://via.placeholder.com/380x237" alt="">
						</div>
						<div class="desc">
							<p>The ultimate care, natural warmth, and positive impact are the things we pursue, while the focus, professionalism, and social responsibility remain our values. We define the new down clothing brand.The ultimate care, natural warmth.</p>
							<ul class="list">
								<li>
									<div class="icon"><i class="fas fa-gem"></i></div>
									<!-- <img src="https://via.placeholder.com/380x237" alt=""> -->
								</li>
								<li>
									<div class="icon"><i class="fas fa-gem"></i></div>
									<!-- <img src="https://via.placeholder.com/380x237" alt=""> -->
								</li>
								<li>
									<div class="icon"><i class="fas fa-gem"></i></div>
									<!-- <img src="https://via.placeholder.com/380x237" alt=""> -->
								</li>
								<li>
									<div class="icon"><i class="fas fa-gem"></i></div>
									<!-- <img src="https://via.placeholder.com/380x237" alt=""> -->
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
