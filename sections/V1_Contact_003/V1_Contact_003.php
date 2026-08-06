<?php

/*
	<?php
	?>
*/

class V1_Contact_003  extends MML_Section_Base
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
(function($){
		$(document).ready(function(){
			//form表单聚焦颜色改变事件
			~ function() {
				$('.v1_contact_003 .wpcf7-form-control').on('click', function() {
					$('.v1_contact_003 .my-form-wrap').find('h5').css('color', '#ada6bf')
					$('.v1_contact_003 .wpcf7-form-control').css('border', 'solid 1px #ffffff');
					$(this).css('border', 'solid 2px #ffffff')
					$(this).parent().parent().parent().find('h5').css('color', '#ffffff')
				})
			}()
		});
	})(jQuery);
	<?php
	}

	public function html()
	{
	?>
		<div class="<?php $this->echo_default_classes(); ?>">
			<!-- insert html start -->
			<div class="container top">
				<div class="left-wrap">
					<h2>We Manufacture Timing Belts And Pulleys</h2>
					<p class="desc">GH is a manufacturer focusing on low-volume orders and can easily accommodate changes in your order. We help you stand out from the crowd by offering quick delivery, quality material, and custom power transmission products.</p>
					<ul>
						<li>
							<h4>Lorem ipsum: </h4>
							<p>dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you heard of.</p>
						</li>
						<li>
							<h4>Lorem ipsum: </h4>
							<p>dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you heard of.</p>
						</li>
						<li>
							<h4>Lorem ipsum: </h4>
							<p>dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you heard of.</p>
						</li>
						<li>
							<h4>Lorem ipsum: </h4>
							<p>dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you heard of.</p>
						</li>
						<li>
							<h4>Lorem ipsum: </h4>
							<p>dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you heard of.</p>
						</li>
						<li>
							<h4>Lorem ipsum: </h4>
							<p>dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you heard of.</p>
						</li>
					</ul>
				</div>
				<div class="right-wrap my-form-wrap">
					<div class="mml-form">
						<h2>Get In Touch</h2>
						<div role="form" class="wpcf7" id="wpcf7-f145-o1" lang="en-US" dir="ltr">
							<div class="screen-reader-response"></div>
							<form action="/contact/#wpcf7-f145-o1" method="post" class="wpcf7-form" novalidate="novalidate">
								<div style="display: none;">
									<input type="hidden" name="_wpcf7" value="145" autocomplete="off">
									<input type="hidden" name="_wpcf7_version" value="5.1.6" autocomplete="off">
									<input type="hidden" name="_wpcf7_locale" value="en_US" autocomplete="off">
									<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f145-o1" autocomplete="off">
									<input type="hidden" name="_wpcf7_container_post" value="0" autocomplete="off">
								</div>
								<div class="form-wrap">
									<div class="input-row">
										<label>
											<p></p>
											<h5>Name<b>*</b></h5>
											<p><span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" autocomplete="off"></span><br>

											</p>
										</label></div>
									<div class="input-row">
										<label>
											<p></p>
											<h5>E-mail Address<b>*</b></h5>
											<p><span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" autocomplete="off"></span>
											</p>
										</label></div>
									<div class="input-row">
										<label><br>
											<h5>Message</h5>
											<p><span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="What we can help?*"></textarea></span>
											</p>
										</label></div>
									<p class="tip">*We respect your confidentiality and all information are protected.</p>
									<div class="input-submit"><input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit" autocomplete="off"><span class="ajax-loader"></span></div>
								</div>
								<div class="wpcf7-response-output wpcf7-display-none"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom">
				<div class="bg"></div>
				<div class="container ">
					<h2>Warranty & Guarantee</h2>
					<ul>
						<li>
							<i class="fas fa-check-circle"></i>
							Mustache retro semiotics palo santo wolf crucifix green juice. We bring impactful digital solutions.
						</li>
						<li>
							<i class="fas fa-check-circle"></i>
							Mustache retro semiotics palo santo wolf crucifix green juice. We bring impactful digital solutions.
						</li>
						<li>
							<i class="fas fa-check-circle"></i>
							Mustache retro semiotics palo santo wolf crucifix green juice. We bring impactful digital solutions.
						</li>
						<li>
							<i class="fas fa-check-circle"></i>
							Mustache retro semiotics palo santo wolf crucifix green juice. We bring impactful digital solutions.
						</li>
					</ul>
				</div>
			</div>

			<!-- insert html end -->
		</div>
<?php
	}
}
