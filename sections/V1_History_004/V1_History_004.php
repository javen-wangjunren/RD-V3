<?php

/*
	<?php
	?>
*/

class V1_History_004  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .history {
				margin: 40px 0 0;
				text-align: left;
				color: #666;
			}
			.<?php $this->eid(); ?> .history > li {
				display: flex;
			}
			.<?php $this->eid(); ?> .history > li:nth-child( even ) {
				/* odd、even 可以用作参数控制方向 */
				flex-direction: row-reverse;
				text-align: right;
			}
			.<?php $this->eid(); ?> .mml-image {
				padding: 10px;
				width: 40%;
				max-width: 400px;
			}
			.<?php $this->eid(); ?> .mml-text {
				padding: 10px;
				flex: 1 1 0;
			}
			.<?php $this->eid(); ?> h4 {
				color: #212121;
			}
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .history > li {
					display: block;
					text-align: left !important;
				}
				.<?php $this->eid(); ?> .history > li + li {
					margin-top: 20px;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
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
					<ul class="history">
						<li>
							<div class="mml-image"><img src="https://via.placeholder.com/400x240/585f6b/e9eef4?text=I" alt=""></div>
							<div class="mml-text">
								<h4>2019-2020</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							</div>
						</li>
						<li>
							<div class="mml-image"><img src="https://via.placeholder.com/400x240/585f6b/e9eef4?text=I" alt=""></div>
							<div class="mml-text">
								<h4>2019-2020</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							</div>
						</li>
						<li>
							<div class="mml-image"><img src="https://via.placeholder.com/400x240/585f6b/e9eef4?text=I" alt=""></div>
							<div class="mml-text">
								<h4>2019-2020</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
