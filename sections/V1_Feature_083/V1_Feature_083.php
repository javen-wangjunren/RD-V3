<?php

/*
	<?php
	?>
*/

class V1_Feature_083  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> h2{
				color: #2a3344;
				text-align:left;
			}
			.<?php $this->eid(); ?> .container > p{
				max-width:780px;
			}
			.<?php $this->eid(); ?> p{
				color: #808080;
				text-align:left;

			}
			.<?php $this->eid(); ?> .tit h4{
				color: #2a3344;
			}
			.<?php $this->eid(); ?> .list h5{
				color: #2a3344;
			}
			.<?php $this->eid(); ?> .list i{
				color: #2d72da;
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
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<div class="mml-box ">
						<div class="tit mml-cols-2">
							<h4>Your Potential Challenges</h4>
							<h4>Our Specific Solutions</h4>
						</div>
						<ul class="list">
							<li class="mml-cols-2">
								<div class="item">
									<h5>Challenge Category 1</h5>
									<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh.</p>
								</div>
								<i class="fas fa-long-arrow-alt-right"></i> 
								<div class="item">
									<h5>Solution Category 1</h5>
									<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh.</p>
								</div>
							</li>
							<li class="mml-cols-2">
								<div class="item">
									<h5>Challenge Category 2</h5>
									<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh.</p>
								</div>
								<i class="fas fa-long-arrow-alt-right"></i> 
								<div class="item">
									<h5>Solution Category 2</h5>
									<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh.</p>
								</div>
							</li>
						</ul>
						
					</div>
				</div>

			</div>
		<?php
	}
}
