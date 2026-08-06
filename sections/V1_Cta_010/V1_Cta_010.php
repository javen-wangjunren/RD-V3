<?php

/*
	<?php
	?>
*/

class V1_Cta_010  extends MML_Section_Base {
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
				<?php $this->css_attr_color('desc_color'); ?>、
			}
			.<?php $this->eid(); ?> > .container > p {
				max-width: 480px;
			}
			.<?php $this->eid(); ?> .list {
				margin-top: 40px;
				color: #000;
				align-items: center;
			}
			.<?php $this->eid(); ?> .list > li {
				display: flex;
				align-items: center;
				padding: 10px 20px 10px 0;
			}
			.<?php $this->eid(); ?> .list img,
			.<?php $this->eid(); ?> .list i {
				margin: 10px 20px 0 0;
			}
			.<?php $this->eid(); ?> h2 {
				color: #222;
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
					<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>
					<ul class="list mml-cols-3">
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<span>MML is a reliable digital solution provider and expert. Contact us to upgrade your weapon.</span>
						</li>
						<li>
							<img src="https://via.placeholder.com/63x63/585f6b/e9eef4?text=I" alt="">
							<span>+86-20-81534532<br>info@mmldigi.com</span>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
