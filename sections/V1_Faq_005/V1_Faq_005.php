<?php

/*
	<?php
	?>
*/

class V1_Faq_005  extends MML_Section_Base {
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
				margin-bottom: 20px;
				padding-bottom: 0px;
				}

				.<?php $this->eid(); ?> .title-des {
				text-align: center;
				}

				.<?php $this->eid(); ?> .title-des p {
				color: #999;
				}

				.<?php $this->eid(); ?> ul {
				margin-top: 60px;
				}

				.<?php $this->eid(); ?> ul li {
				max-width: 780px;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				margin: 0 auto;
				padding-left: 40px;
				padding-top: 25px;
				padding-bottom: 25px;
				margin-bottom: 20px;
				background-color: #ffffff;
				-webkit-box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.09);
						box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.09);
				-webkit-border-radius: 5px;
						border-radius: 5px;
				border: solid 1px #e5e5e5;
				-webkit-transition: all .3s;
				-o-transition: all .3s;
				transition: all .3s;
				cursor: pointer;
				}

				.<?php $this->eid(); ?> .title {
				position: relative;
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-align: center;
				-webkit-align-items: center;
					-ms-flex-align: center;
						align-items: center;
				}

				.<?php $this->eid(); ?> h4 {
				color: #372072;
				}

				.<?php $this->eid(); ?> .icon-close {
				position: absolute;
				width: 36px;
				height: 36px;
				color: #fff;
				background-color: #ada6bf;
				right: 50px;
				top: 0;
				-webkit-border-radius: 50%;
						border-radius: 50%;
				text-align: center;
				font-size: 18px;
				cursor: pointer;
				display: none;
				line-height: 34px;
				}

				.<?php $this->eid(); ?> .fas {
				color: #ada6bf;
				-webkit-transform: rotate(90deg);
					-ms-transform: rotate(90deg);
						transform: rotate(90deg);
				position: absolute;
				right: 58px;
				font-size: 14px;
				cursor: pointer;
				}

				.<?php $this->eid(); ?> .desc {
				display: none;
				max-width: 515px;
				color: #808080;
				}

				.<?php $this->eid(); ?> .desc ul {
				width: 100%;
				}

				.<?php $this->eid(); ?> li.active {
				position: relative;
				overflow: hidden;
				background: url("../img/p05-2/s02-bg.jpg") no-repeat;
				-webkit-background-size: 100% 100%;
						background-size: 100% 100%;
				min-height: 160px;
				}

				.<?php $this->eid(); ?> li.active .title {
				position: relative;
				margin-bottom: 20px;
				z-index: 1;
				}

				.<?php $this->eid(); ?> li.active .desc {
				position: relative;
				display: block;
				z-index: 1;
				}

				.<?php $this->eid(); ?> li.active .icon-close {
				display: block;
				}

				.<?php $this->eid(); ?> li.active .fas {
				display: none;
				}

				.<?php $this->eid(); ?> .inner-ul {
				margin-top: 10px;
				}

				.<?php $this->eid(); ?> .inner-ul li {
				margin-bottom: 10px;
				}

				@media (max-width: 660px) {
				.<?php $this->eid(); ?> h4 {
					max-width: 405px;
				}
				.<?php $this->eid(); ?> .icon-close {
					right: 20px;
				}
				.<?php $this->eid(); ?> .fas {
					right: 28px;
				}
				}

				@media (max-width: 524px) {
				.<?php $this->eid(); ?> .out-ul > li {
					padding: 10px;
				}
				.<?php $this->eid(); ?> h4 {
					max-width: 400px;
					width: 85%;
				}
				.<?php $this->eid(); ?> .icon-close {
					right: 0;
				}
				.<?php $this->eid(); ?> .fas {
					right: 8px;
				}
				}

				@media (max-width: 320px) {
				.<?php $this->eid(); ?> h4 {
					max-width: 240px;
				}
				}

			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
			var $ = jQuery;
			$(document).ready(function() {
				//展开关闭卡片事件
				~ function() {
					

					$('.<?php $this->eid(); ?> .out-ul li').toggle(function(){
						$(this).removeClass('active');
					},function(){
						$(this).addClass('active');
					})
				}()
			})
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="container">
					<h2>FAQ</h2>
					<div class="title-des">
						<p>We bring impactful digital solutions.</p>
					</div>
					<ul class="out-ul">
						<li class="active">
							<div class="title">
								<h4>Lorem ipsum dolor amet locavore prism?</h4>
								<span class="icon-close">x</span>
								<i class="fas fa-chevron-right"></i>
							</div>
							<div class="desc"><p>Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice.</p></div>
						</li>
						<li>
							<div class="title">
								<h4>Lorem ipsum dolor amet locavore prism?</h4>
								<span class="icon-close">x</span>
								<i class="fas fa-chevron-right"></i>
							</div>
							<div class="desc"><p>Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice.</p></div>
						</li>
						<li>
							<div class="title">
								<h4>Lorem ipsum dolor amet locavore prism?</h4>
								<span class="icon-close">x</span>
								<i class="fas fa-chevron-right"></i>
							</div>
							<div class="desc"><p>Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice.</p></div>
						</li>
						
					</ul>
				</div>
			</div>
		<?php
	}
}
