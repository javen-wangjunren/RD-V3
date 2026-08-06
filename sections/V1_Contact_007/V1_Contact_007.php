<?php

/*
	<?php
	?>
*/

class V1_Contact_007  extends MML_Section_Base {
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
				color: #1a1a1a;
   				text-align: left;

			}
			.<?php $this->eid(); ?> .container >p{
				max-width:980px;
				color: #808080;
    			text-align: left;

			}
			.<?php $this->eid(); ?> .mml-form{
				background-color: #03a67b;
			}
			.<?php $this->eid(); ?> .mml-form h3{
				color: #ffffff;
				text-align:center;
			}
			.<?php $this->eid(); ?> .mml-form label{
				color: #027d5c;
			}

			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]){
				border-color:rgba(2,125,92,0.5);
				background-color: #03a67b;
				color:#028662;
				height: 50px;
			}
			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]):placeholder{
				color:#028662;
			}
			.<?php $this->eid(); ?> .mml-form textarea{
				border-color:rgba(2,125,92,0.5);
				background-color: #03a67b;
				color:#028662;
				height: 120px;
			}
			.<?php $this->eid(); ?> .mml-form textarea:placeholder{
				color:#028662;
			}
			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]):focus{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			
			.<?php $this->eid(); ?> .mml-form input:not([type="submit"]):active{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			.<?php $this->eid(); ?> .mml-form textarea:focus{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			.<?php $this->eid(); ?> .mml-form textarea:active{
				border-color:#05f0b1;
				color:#05f0b1;
				outline: 1px solid #05f0b1;

			}
			.<?php $this->eid(); ?> .mml-form .mml-formtip{
				color: #ffffff;
				text-align:left;
				margin: 10px 0 50px;
			}
			.<?php $this->eid(); ?> .mml-form input[type="submit"]{
				background-color: #ffffff;
				color: #03a67b;
			}
			.<?php $this->eid(); ?> .mml-faq-item .mml-faq-item-hd .title{
				color: #333333;
			}
			.<?php $this->eid(); ?> .faq-wrap .mml-faq-item .mml-faq-item-bd{
				color: #808080;
			}
			/* insert style end */
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .mml-form input:not([type="submit"])').on('focus',function(){
			$(this).parents('label').addClass('focus')
		}).on('blur',function(){
			$(this).parents('label').removeClass('focus')
		});

		$('.<?php $this->eid(); ?> .mml-form textarea').on('focus',function(){
			$(this).parents('label').addClass('focus')
		}).on('blur',function(){
			$(this).parents('label').removeClass('focus')
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<h2>We Bring Impactful Digital Solutions</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
					<div class="mml-box">
						<div class="mml-form">
							<h3>Get In Touch</h3>
							<?php echo do_shortcode('[contact-form-7 id="7" title="Contact 005"]');?>
						</div>
						<div class="faq-wrap">
							<h2>FAQ</h2>
							<p>We bring impactful digital solutions.</p>
							<?php echo get_template_part('templates/m-faq');?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
