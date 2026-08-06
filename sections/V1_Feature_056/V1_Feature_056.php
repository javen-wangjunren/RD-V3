<?php

/*
	<?php
	?>
*/

class V1_Feature_056  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 480px;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> > .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #222;
			}
			.<?php $this->eid(); ?> .icons {
				width: 50%;
				max-width: 540px;
				display: flex;
				flex-wrap: wrap;
				margin: -20px 0;
				text-align: center;
				color: #000;
				font-weight: 600;
			}
			.<?php $this->eid(); ?> .icons img {
				margin-bottom: 15px;
			}
			.<?php $this->eid(); ?> .icons:before {
				content: '\20';
				width: 33.3333%;
			}
			.<?php $this->eid(); ?> .icons > li {
				box-sizing: border-box;
				padding: 20px 10px;
				width: 33.3333%;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> > .container .mml-text {
					max-width: unset;
					margin: 0 0 30px;
				}
				.<?php $this->eid(); ?> .icons {
					margin: -20px auto;
					width: unset;
				}
			}
			@media (max-width: 460px) {
				.<?php $this->eid(); ?> .icons:before {
					display: none;
				}
				.<?php $this->eid(); ?> .icons > li {
					width: 50%;
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
					<div class="mml-text">
						<h2>We Bring Impactful Digital Solutions</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
					</div>
					<ul class="icons">
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<span>Digital Branding</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<span>Digital Branding</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<span>Digital Branding</span>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
