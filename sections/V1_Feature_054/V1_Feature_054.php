<?php

/*
	<?php
	?>
*/

class V1_Feature_054  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2 {
				color: #222;
			}
			.<?php $this->eid(); ?> h3 {
				color: #333;
			}
			.<?php $this->eid(); ?> .panels {
				margin: 30px 0 0;
			}
			.<?php $this->eid(); ?> .panels > li {
				box-sizing: border-box;
				margin: 10px 0;
				padding: 20px 30px;
				background: #fff;
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.07);
			}
			.<?php $this->eid(); ?> .list {
				margin: 20px 0 0;
				color: #444;
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				padding: 4px 20px 4px 0;
				display: flex;
				align-items: center;
				width: 50%;
				max-width: 480px;
			}
			.<?php $this->eid(); ?> .list i,
			.<?php $this->eid(); ?> .list img {
				margin: 0 8px 0 0;
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
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .list > li {
					max-width: unset;
					width: 100%;
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
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
					<ul class="panels">
						<li>
							<h3>Heading 3</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							<ul class="list">
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
							</ul>
						</li>
						<li>
							<h3>Heading 3</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							<ul class="list">
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
								<li>
									<img src="https://via.placeholder.com/20x20/585f6b/e9eef4?text=I" alt="">
									<span>Digital Branding</span>
								</li>
							</ul>
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
