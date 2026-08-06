<?php

/*
	<?php
	?>
*/

class V1_Process_Flow_006  extends MML_Section_Base {
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
				color: #222;
			}
			.<?php $this->eid(); ?> .container > p{
				max-width:1120px;
				margin:10px auto;
			}
			.<?php $this->eid(); ?> .mml-box {
				margin: 40px auto 0;
				padding-top: 40px;
				max-width: 1000px;
				display: flex;
				align-items: flex-start;
				justify-content: space-between;
				text-align: left;
			}
			.<?php $this->eid(); ?> .items {
				position: relative;
			}
			.<?php $this->eid(); ?> .items:before{
				content: '\20';
				position: absolute;
				top: 40px; bottom: 0;
				width: 1px;
				background: #5f6977;
				transform: translate(0, -40px);
			}
			.<?php $this->eid(); ?> .items:before {
				left: 24px; 
			}
			.<?php $this->eid(); ?> .items > li {
				position: relative;
				z-index: 1;
				padding: 20px 10px;
				display: flex;
				align-items: baseline;
			}
			.<?php $this->eid(); ?> .number {
				box-sizing: border-box;
				min-width: 28px;
				padding: 0 4px;
				line-height: 28px;
				text-align: center;
				background: #5f6977;
				color: #fff;
				border-radius: 100px;
				flex-shrink: 0;
			}
			.<?php $this->eid(); ?> .line {
				margin: 0 12px;
				height: 1px;
				width: 40px;
				background: #5f6977;
				flex-shrink: 0;
				transform: translate(0, -6px);
			}
			.<?php $this->eid(); ?> .mml-text p{
				max-width: 350px;
				color: #000000;
			}
			.<?php $this->eid(); ?> h4 {
				color: #5f6977;
			}
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .items:before {
					top: 0;
					transform: none;
				}
			}
			@media (max-width: 540px) {
				.<?php $this->eid(); ?> .line {
					display: none;
				}
				.<?php $this->eid(); ?> .number {
					margin-right: 12px;
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
					<div class="mml-box">
						<ul class="items">
							<li>
								<div class="number">1</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
							<li>
								<div class="number">2</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
							<li>
								<div class="number">3</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
							<li>
								<div class="number">4</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
						</ul>
						<ul class="items">
							
							<li>
								<div class="number">5</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
							<li>
								<div class="number">6</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
							<li>
								<div class="number">7</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
							<li>
								<div class="number">8</div>
								<div class="line"></div>
								<div class="mml-text">
									<h4>Process Content Title</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
}
