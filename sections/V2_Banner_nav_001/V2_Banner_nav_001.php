<?php

/*
	<?php
	?>
*/

class V2_Banner_nav_001  extends MML_Section_Base {
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
				height:800px;
				background-image:url('http://via.placeholder.com/1920x800');
				background-position:center;
			}

			.<?php $this->eid(); ?> .container{
				display:flex;
				align-items: center;
				height: 100%;
			}

			.<?php $this->eid(); ?>  .banner-text{
				max-width:680px;
			}
			.<?php $this->eid(); ?> h1{
				color: #333;
				margin-bottom: 80px;
				font-size: 48px;
			}

			.<?php $this->eid(); ?> li{
				margin:10px 0px;
				position: relative;
				box-sizing: border-box;
				padding-left: 15px;
				font-size:16px;
				color:#808080;
			}

			.<?php $this->eid(); ?> li:before{
				content:'';
				display: block;
				width: 8px;
				height: 8px;
				background-color: #333;
				border-radius: 50%;
				position: absolute;
				top:8px;
				left: 0px;
			}

			.<?php $this->eid(); ?> .mml-btn{
				box-sizing: border-box;
				padding: 16px 50px;
				background-color: #5d6777;
				border-radius: 50px;
				color: #fff;
				margin-top: 60px;
				display: inline-block;
				font-size: 16px;
				color: #fff;
				transition: all .6s;
			}

			.<?php $this->eid(); ?> .mml-btn:hover{
				opacity: .8;
			}

			@media(max-width:960px){
				.<?php $this->eid(); ?> h1{
					font-size:36px;
					margin-bottom:60px;
					
				}
			}

			@media(max-width:540px){
				.<?php $this->eid(); ?>.mml-section {
					height:600px;
				}
				.<?php $this->eid(); ?> h1{
					font-size:32px;
					margin-bottom:30px;
				}

				.<?php $this->eid(); ?>  .mml-btn{
					margin-top:30px;
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
					<div class="banner-text">
						<h1>Professional OEM & ODM Water Bottle Manufacturer</h1>
						<ul>
							<li>Low MOQ to support your business</li>
							<li>15%-25% lower wholesale prices from our water bottle factory</li>
							<li>Customized water bottle, logo and packaging.</li>
							<li>In-stock products deliver in 5 days.</li>
							<li>Custom orders deliver within 15 days.</li>
						</ul>
						<a href="" class="mml-btn">Get Free Sample</a>
					</div>

				</div>
			</div>
		<?php
	}
}
