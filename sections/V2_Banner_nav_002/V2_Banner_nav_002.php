<?php

/*
	<?php
	?>
*/

class V2_Banner_nav_002  extends MML_Section_Base {
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
				height:400px;
				background-image:url('http://via.placeholder.com/1920x400');
				background-position:center;
				padding: 0px 10px;
			}

			.<?php $this->eid(); ?> .container{
				display:flex;
				align-items: center;
				height: 400px;
				position: relative;
			}

			.<?php $this->eid(); ?>  .banner-text{
				max-width:580px;
			}
			.<?php $this->eid(); ?> h1{
				color: #333;
				margin-bottom: 40px;
				font-size: 48px;
			}

			.<?php $this->eid(); ?> .mml-bre{
				position: absolute;
				left: 10px;
				bottom: 25px;
				max-width: 100%;
			}

			.<?php $this->eid(); ?>  .mml-bre li{
				display: inline-block;
				color: #353535;
			}

			.<?php $this->eid(); ?>  .mml-bre a{
				color: #353535;
			}

			.<?php $this->eid(); ?> p{
				color: #353535;
			}

			@media(max-width:960px){
				.<?php $this->eid(); ?> h1{
					font-size:36px;
					margin-bottom:20px;
				}
			}

			@media(max-width:540px){
				
				.<?php $this->eid(); ?> h1{
					font-size:32px;
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
						<h1>Water Bottles</h1>
						<div class="content">
							<p>Beluga is a professional water bottle manufacturer and supplier in China, supplying all types of water bottles for various applications.</p>
						</div>
					</div>
					<ul class="mml-bre">
						<li><a href="/">Home</a>&nbsp;&gt;&nbsp;</li>
						<li><a href="/">Home</a>&nbsp;&gt;&nbsp;</li>
						<li>Product</li>
					</ul>
				</div>
			</div>
		<?php
	}
}
