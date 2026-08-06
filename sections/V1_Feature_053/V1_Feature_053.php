<?php

/*
	<?php
	?>
*/

class V1_Feature_053  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h3 {
				color: #333;
			}
			.<?php $this->eid(); ?> h4 {
				color: #444;
			}
			.<?php $this->eid(); ?> .panels {
				margin-top: 30px;
			}
			.<?php $this->eid(); ?> .panels > li {
				padding: 30px 40px 40px;
				background: #fff;
				box-shadow: 0px 0px 21px 0px rgba(34, 34, 34, 0.09);
			}
			.<?php $this->eid(); ?> .list > li {
				display: flex;
				align-items: flex-start;
				margin: 30px 0;
			}
			.<?php $this->eid(); ?> .list > li > img {
				margin: 0 20px 0 0;
				width: 30%;
				max-width: 70px;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
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
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .list > li {
					display: block;
				}
				.<?php $this->eid(); ?> .list > li > img {
					margin: 0 0 20px;
					width: unset;
					max-width: 100%;
				}
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .panels > li {
					padding: 20px;
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
					<ul class="panels mml-cols-2">
						<li>
							<h3>Heading 3</h3>
							<ul class="list">
								<li>
									<img src="https://via.placeholder.com/70x70/585f6b/e9eef4?text=I" alt="">
									<div class="mml-text">
										<h4>Heading 4</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. </p>
									</div>
								</li>
								<li>
									<img src="https://via.placeholder.com/70x70/585f6b/e9eef4?text=I" alt="">
									<div class="mml-text">
										<h4>Heading 4</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. </p>
									</div>
								</li>
							</ul>
							<div class="btns">
								<a href="javascript:;" class="btn">BUTTON 1</a>
							</div>
						</li>
						<li>
							<h3>Heading 3</h3>
							<ul class="list">
								<li>
									<img src="https://via.placeholder.com/70x70/585f6b/e9eef4?text=I" alt="">
									<div class="mml-text">
										<h4>Heading 4</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. </p>
									</div>
								</li>
								<li>
									<img src="https://via.placeholder.com/70x70/585f6b/e9eef4?text=I" alt="">
									<div class="mml-text">
										<h4>Heading 4</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. </p>
									</div>
								</li>
							</ul>
							<div class="btns">
								<a href="javascript:;" class="btn">BUTTON 1</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
