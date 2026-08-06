<?php

/*
	<?php
	?>
*/

class V2_Gallery_004  extends MML_Section_Base {
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
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}

			.<?php $this->eid(); ?> h2 {
				margin-bottom: 5px;
				color: #333;
				}

				.<?php $this->eid(); ?> h4 {
				font-size: 22px;
				color: #444444;
				margin-top: 25px;
				}

				.<?php $this->eid(); ?> .sec-title {
				margin-bottom: 50px;
				}

				.<?php $this->eid(); ?> section {
				width: 90%;
				max-width: 1000px;
				}

				.<?php $this->eid(); ?> .mml-row {
				position: relative;
				}

				.<?php $this->eid(); ?> .slick-dots {
				position: absolute;
				right: 10px;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
					-ms-flex-direction: column;
						flex-direction: column;
				top: 50%;
				-webkit-transform: translateY(-50%);
					-ms-transform: translateY(-50%);
						transform: translateY(-50%);
				}

				.<?php $this->eid(); ?> .slick-dots button {
				width: 12px;
				height: 12px;
				-webkit-border-radius: 50%;
						border-radius: 50%;
				background-color: #999;
				margin: 0px;
				}

				.<?php $this->eid(); ?> .slick-dots li {
				margin: 8px 0px;
				}

				.<?php $this->eid(); ?> .slick-dots li.slick-active {
				-webkit-border-radius: 50px;
						border-radius: 50px;
				border: 9px solid #999;
				margin-left: -8px;
				}

				.<?php $this->eid(); ?> .slick-dots li.slick-active button {
				width: 12px;
				background-color: #fff;
				}

				.<?php $this->eid(); ?> .slick-slider {
				position: unset;
				}

				.<?php $this->eid(); ?> .btn-wrap {
				text-align: right;
				}

				.<?php $this->eid(); ?> a.btn {
				background-color: #333;
				-webkit-border-radius: 5px;
						border-radius: 5px;
				color: #fff;
				margin: 0px;
				margin-top: 40px;
				border: unset;
				padding: 13px 28px;
				-webkit-box-shadow: 0px 15px 30px 0px  #dce0e9;
						box-shadow: 0px 15px 30px 0px  #dce0e9;
				}

				.<?php $this->eid(); ?> a.btn:hover {
				-webkit-box-shadow: unset;
						box-shadow: unset;
				}

				@media (max-width: 768px) {
				.<?php $this->eid(); ?> .slick-dots li {
					margin: 3px 0px;
				}
				}

				@media (max-width: 540px) {
				.<?php $this->eid(); ?> .slick-dots {
					margin-top: 0px;
					-webkit-transform: translateY(-40px);
						-ms-transform: translateY(-40px);
							transform: translateY(-40px);
				}
				.<?php $this->eid(); ?> .slick-dots li {
					margin: 3px 0px;
				}
				.<?php $this->eid(); ?> .slick-dots button {
					width: 6px;
					height: 6px;
				}
				.<?php $this->eid(); ?> .slick-dots li.slick-active {
					border: unset;
					margin-left: -5px;
					border: 5px solid #999;
				}
				.<?php $this->eid(); ?> .slick-dots li.slick-active button {
					width: 6px;
					height: 6px;
				}
				}

			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
		(function(doc, win){
			var $ = jQuery;
			$(doc).ready(function(){
				$('.<?php $this->eid(); ?> .slider').slick({
					arrows:false,
					infinite: true,
					dots:true,
					autoplay:2000 
					});
			});
		})(document, window);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<!-- insert html start --><!-- insert html end -->
				<div class="mml-row">
					<div class="sec-title">
						<h2>Portfolios/Gallery </h2>
						<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>
					</div>
					<section>
							<ul class="slider">
								<li>
									<img src="http://via.placeholder.com/1000x560" alt="">
									<h4>111111</h4>
								</li>
								<li>
									<img src="http://via.placeholder.com/1000x560" alt="">
									<h4>111111</h4>
								</li>
								<li>
									<img src="http://via.placeholder.com/1000x560" alt="">
									<h4>111111</h4>
								</li>
							</ul>
						<div class="btn-wrap">
							<a href="" class="btn">Conatct Our Expert</a>
						</div>
					</section>
				</div>
			</div>
		<?php
	}
}
