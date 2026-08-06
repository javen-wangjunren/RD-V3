<?php

/*
	<?php
	?>
*/

class V2_Feature_004  extends MML_Section_Base {
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
			.<?php $this->eid(); ?> .left-nav h4{
				background-color: #03a679;
            	color: #ffffff;
			}
			.<?php $this->eid(); ?> .left-nav ul li{
				color: #777777;
			}
			.<?php $this->eid(); ?> .left-nav ul li.current{
				color: #03a679;
				border-color: #03a679;
			}
			.<?php $this->eid(); ?> .select{
				border-color:#37ebb8;
				background-color: #03a679;
			}
			.<?php $this->eid(); ?> .list h4{
				color: #1a1a1a;
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
					<div class="left-nav">
						<h4>PRODUCT COLLECTIONS<i class="fas fa-chevron-down"></i></h4>
						<ul>
							<li class="current">Product name</li>
							<li>Product name</li>
							<li>Product name</li>
							<li>Product name</li>
						</ul>
					</div>
					<div class="right-opt">
						<div class="select">
							<h4 class="tit">Your Selections</h4>
							<ul>
								<li>Hoodie<i class="far fa-times-circle"></i></li>
								<li>Parka<i class="far fa-times-circle"></i></li>
								<li>Clear All<i class="far fa-times-circle"></i></li>
							</ul>
							<h4 class="res">29 Results</h4>
						</div>                 

						<ul class="list mml-cols-3">
							<li>
								<a href="">
									<img src="https://via.placeholder.com/443x500" alt="">
									<h4>Product Name</h4>
								</a>
							</li>
							<li>
								<a href="">
									<img src="https://via.placeholder.com/443x500" alt="">
									<h4>Product Name</h4>
								</a>
							</li>
							<li>
								<a href="">
									<img src="https://via.placeholder.com/443x500" alt="">
									<h4>Product Name</h4>
								</a>
							</li>
							<li>
								<a href="">
									<img src="https://via.placeholder.com/443x500" alt="">
									<h4>Product Name</h4>
								</a>
							</li>

						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
