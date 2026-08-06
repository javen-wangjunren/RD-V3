<?php

/*
	<?php
	?>
*/

class V1_Team_008  extends MML_Section_Base {
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
				padding: 0;
				text-align: center;
			}
			.<?php $this->eid(); ?> .layer {
				padding: 150px 10px;
				transition: all .5s;
				background: transparent url('https://via.placeholder.com/1920x442/e9eef4/ccc?text=BACKGROUND') center no-repeat;
				background-size: cover;
			}
			.<?php $this->eid(); ?> .layer:hover {
				background-position: 40% 30%;
			}
			.<?php $this->eid(); ?> > .layer > .container {
				width: 1000px;
			}
			.<?php $this->eid(); ?> h2 {
				color: #212121;
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				padding: 0 10px 80px;
				color: #666;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin: 40px 10px 0;
				text-align: left;
			}
			.<?php $this->eid(); ?> h4 {
				display: flex;
				align-items: flex-start;
				color: #000;
			}
			.<?php $this->eid(); ?> h4:before {
				content: '\20';
				margin: .6em 8px 0 0;
				width: 6px;
				height: 6px;
				border-radius: 6px;
				background: #5d6777;
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .layer {
					padding: 80px 10px;
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
				<div class="layer">
					<div class="container">
						<h2>A Passionate and Inspirational Team</h2>
						<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism.</p>
					</div>
				</div>
				<div class="container">
					<ul class="mml-cols-2">
						<li class="mml-text">
							<h4>Design Team</h4>
							<p>Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress.</p>
						</li>
						<li class="mml-text">
							<h4>Design Team</h4>
							<p>Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress.</p>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
