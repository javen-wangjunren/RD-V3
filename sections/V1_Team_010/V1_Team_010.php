<?php

/*
	<?php
	?>
*/

class V1_Team_010  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .bio {
				box-sizing: border-box;
				min-height: 368px;
				margin-bottom: 10px;
				padding: 40px 20px;
				display: flex;
				flex-direction: column;
				justify-content: center;
				text-align: center;
				background: #e9eef4 url('https://via.placeholder.com/1180x368/e9eef4/585f6b?text=I') center no-repeat;
				background-size: cover;
			}
			.<?php $this->eid(); ?> h2 {
				color: #212121;
			}
			.<?php $this->eid(); ?> .bio > p {
				max-width: 900px;
				margin: 10px auto;
			}
			.<?php $this->eid(); ?> h4 {
				margin-top: 20px;
				color: #000;
			}
			.<?php $this->eid(); ?> .position {
				color: #aaa;
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
					<div class="bio">
						<h2>A Proactive Team</h2>
						<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable.</p>
					</div>
					<ul class="mml-cols-3">
						<li>
							<img src="https://via.placeholder.com/380x388/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
							<p>Trust is the cornerstone to all customer experiences. That's what I believe, and what I insist in business.</p>
						</li>
						<li>
							<img src="https://via.placeholder.com/380x388/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
							<p>Trust is the cornerstone to all customer experiences. That's what I believe, and what I insist in business.</p>
						</li>
						<li>
							<img src="https://via.placeholder.com/380x388/585f6b/e9eef4?text=I" alt="">
							<h4>Seven Xia</h4>
							<span class="position">CEO & Founder</span>
							<p>Trust is the cornerstone to all customer experiences. That's what I believe, and what I insist in business.</p>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
