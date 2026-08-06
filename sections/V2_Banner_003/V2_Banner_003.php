<?php

/*
	<?php
	?>
*/

class V2_Banner_003  extends MML_Section_Base
{
	function __construct($id, $style, $content)
	{
		parent::__construct($id, $style, $content);
	}

	public function set_default_value()
	{
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('class', '');
	}

	public function style()
	{
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

	public function script()
	{
	?>

	<?php
	}

	public function html()
	{
	?>
		<div class="<?php $this->echo_default_classes(); ?>">
			<!-- insert html start -->
			<div class="section-top">
				<div class="banner-container">
					<div class="text-wrap">
						<h1>We Bring Impactful Digital Solutions</h1>
						<p>We are a pioneer company of commercial outdoor LED lighting in China, specializing in the innovative manufacturing of LED street light, solar street light, LED wall washer, and more exterior LED lighting for over 16 years</p>
						<p>Our mature ODM/OEM services and proficient R&D capabilities are bound to help you promote more government and commercial projects!</p>
						<a href="#" class="btn">CTA Button</a>
					</div>

				</div>
			</div>

			<div class="section-bottom" >
				<ul class="icon-container">
					<li>
						<i class="fas fa-check-circle"></i>
						<span>Heading</span>
					</li>
					<li>
						<i class="fas fa-check-circle"></i>
						<span>Heading</span>
					</li>
					<li>
						<i class="fas fa-check-circle"></i>
						<span>Heading</span>
					</li>
					<li>
						<i class="fas fa-check-circle"></i>
						<span>Heading</span>
					</li>
				</ul>
			</div>

			<!-- insert html end -->
		</div>
<?php
	}
}
