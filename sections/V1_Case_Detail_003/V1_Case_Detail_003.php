<?php

/*
	<?php
	?>
*/

class V1_Case_Detail_003  extends MML_Section_Base {
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
				<!-- insert html start -->
				<div class="container">
					<h2>Case Title 1</h2>
					<div class="top-wrap">
						<div class="wrap-item">
							<h4>Demands:</h4>
							<ul>
								<li>Messenger bag deep v quinoa air plant bicycle rights.</li>
								<li>Messenger bag deep v quinoa air plant bicycle rights.</li>
							</ul>
						</div>
						<div class="wrap-item">
							<h4>Demands:</h4>
							<p>Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella.</p>
						</div>
					</div>
					<div class="middle-wrap">
						<h4>Feedback:</h4>
						<p>Mustache retro semiotics palo santo wolf crucifix green juice cloud bread ethical. Bespoke kombucha tilde wolf. Tousled cornhole godard four dollar ttoast viral flexitarian subway tile leggings. Seitan kombucha raclette snackwave narwhal tacos beard.</p>
					</div>
					<div class="bottom-wrap">
						<h4>
							Wonderful!  Share this Case:
							<div class="icon-wrap">
								<a href="javascript:;"><i class="fab fa-facebook-square"></i></a>
								<a href="javascript:;"><i class="fab fa-twitter-square"></i></a>
								<a href="javascript:;"><i class="fab fa-linkedin"></i></a>
							</div>
						</h4>
						<p>This is What I Need, <a href="/contact">Contact</a> to Customize.</p>
					</div>
				</div>
				<!-- insert html end -->
			</div>
		<?php
	}
}
