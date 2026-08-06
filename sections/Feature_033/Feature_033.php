<?php

/*
	<?php
	?>
*/

class Feature_033  extends MML_Section_Base {
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				color: #000;
			}
			.<?php $this->eid(); ?> .list {
				margin: 0 auto;
				max-width: 760px;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .list > li {
				margin-top: 20px;
			}
			.<?php $this->eid(); ?> h4 {
				margin-top: 10px;
				color: #212121;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				background: #5d6777;
				color: #fff;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: transparent;
				border-color: #5d6777;
				color: #5d6777;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: #585f6b;
				color: #fff;
				border-color: transparent;
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
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
					
					<ul class="list mml-cols-4">
						<li>
							<img src="https://via.placeholder.com/64x64/e9eef4/5d6777?text=I" alt="">
							<h4>Heading</h4>
						</li>
						<li>
							<img src="https://via.placeholder.com/64x64/e9eef4/5d6777?text=I" alt="">
							<h4>Heading</h4>
						</li>
						<li>
							<img src="https://via.placeholder.com/64x64/e9eef4/5d6777?text=I" alt="">
							<h4>Heading</h4>
						</li>
						<li>
							<img src="https://via.placeholder.com/64x64/e9eef4/5d6777?text=I" alt="">
							<h4>Heading</h4>
						</li>
						<li>
							<img src="https://via.placeholder.com/64x64/e9eef4/5d6777?text=I" alt="">
							<h4>Heading</h4>
						</li>
					</ul>

					<div class="btns">
						<a href="javascript:;" class="btn">BUTTON 1</a>
						<a href="javascript:;" class="btn btn-reverse">BUTTON 2</a>
					</div>
				</div>
			</div>
		<?php
	}
}
