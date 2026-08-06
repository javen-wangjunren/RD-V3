<?php

/*
	<?php
	?>
*/

class V2_History_004  extends MML_Section_Base {
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
				<!-- text-align: center; -->
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> h2 {
			text-align: center;
			color: #333;
			margin-bottom: 15px;
			padding-bottom: 0px;
			}

			.<?php $this->eid(); ?> p {
			color: #808080;
			font-size: 16px;
			max-width: 1100px;
			margin: 0 auto;
			text-align: center;
			}

			.<?php $this->eid(); ?> .history-list {
			margin-top: 20px;
			}

			.<?php $this->eid(); ?> .history-list li {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: justify;
			-webkit-justify-content: space-between;
				-ms-flex-pack: justify;
					justify-content: space-between;
			margin-top: 20px;
			}

			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .pic {
			-webkit-box-ordinal-group: 3;
			-webkit-order: 2;
				-ms-flex-order: 2;
					order: 2;
			}

			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .content {
			-webkit-box-ordinal-group: 2;
			-webkit-order: 1;
				-ms-flex-order: 1;
					order: 1;
			}

			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .content h4 {
			text-align: right;
			}

			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .content p {
			text-align: right;
			}

			.<?php $this->eid(); ?> .history-list h4 {
			color: #000;
			}

			.<?php $this->eid(); ?> .history-list .pic {
			width: 35%;
			max-width: 400px;
			}

			.history-list .content {
			width: 63%;
			}

			.<?php $this->eid(); ?> .history-list .content p {
			text-align: left;
			color: #000;
			}

			@media (max-width: 768px) {
				.<?php $this->eid(); ?> .history-list li {
				-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
						flex-wrap: wrap;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
					-ms-flex-pack: center;
						justify-content: center;
			}
			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .pic {
				-webkit-box-ordinal-group: 2;
				-webkit-order: 1;
					-ms-flex-order: 1;
						order: 1;
			}
			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .content {
				-webkit-box-ordinal-group: 3;
				-webkit-order: 2;
					-ms-flex-order: 2;
						order: 2;
			}
			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .content h4 {
				text-align: center;
			}
			.<?php $this->eid(); ?> .history-list li:nth-child(2n) .content p {
				text-align: center;
			}
			.<?php $this->eid(); ?> .history-list .pic {
				width: 100%;
			}
			.<?php $this->eid(); ?> .history-list .content {
				width: 100%;
				margin-top: 30px;
				text-align: center;
			}
			.<?php $this->eid(); ?> .history-list .content p {
				text-align: center;
			}
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
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
					<ul class="history-list">
						<li>
							<div class="pic">
								<img src="http://via.placeholder.com/400x240" alt="">
							</div>
							<div class="content">
								<h4>2018-2014</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							</div>
						</li>
						<li>
							<div class="pic">
								<img src="http://via.placeholder.com/400x240" alt="">
							</div>
							<div class="content">
								<h4>2018-2014</h4>
								<p>Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
							</div>
							
						</li>
						<li>
							<div class="pic">
								<img src="http://via.placeholder.com/400x240" alt="">
							</div>
							<div class="content">
								<h4>2018-2014</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							</div>
						</li>
						<li>
							
							<div class="pic">
								<img src="http://via.placeholder.com/400x240" alt="">
							</div>
							<div class="content">
								<h4>2018-2014</h4>
								<p>Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
