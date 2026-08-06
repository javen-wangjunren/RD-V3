<?php

/*
	<?php
	?>
*/

class V1_Feature_071  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .info h4{
				color: #000000;
				margin-top:40px;

			}
			.<?php $this->eid(); ?> .info h2{
				color: #000000;
				margin-bottom:50px;
			}
			.<?php $this->eid(); ?> .info p{
				color: #000000;
			}
			.<?php $this->eid(); ?> .btn{
				color: #ffffff;
				background-color: #5f6776;
			}
			.<?php $this->eid(); ?> .btn.btn-reverse{
				color: #5f6776;
				background-color: transparent;

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
					<div class="mml-img">
						<img src="https://via.placeholder.com/492x700" alt="">
					</div>
					<div class="info">
						<h4>MML Digital</h4>
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
						<div class="btns">
							<a href="" class="btn">CTA Button</a>
							<a href="" class="btn btn-reverse">CTA Button</a>
						</div>
					</div>
					<div class="thumb">
						<img src="https://via.placeholder.com/200x200" alt="">
					</div>
				</div>
			</div>
		<?php
	}
}
