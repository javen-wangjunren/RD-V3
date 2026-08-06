<?php

/*
<?php mtf_section('Footer_001', 'footer_001', [
	'link_color' => '#333',
	'link_color_hover' => '#666',
	'copyright_color' => '#096',
	'copyright_bgcolor' => '#063',
	'copyright_align' => 'center',
	'menu_title_color' => '#333',
	'contact_info_color' => '#333',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'logo_src' => 'http://placehold.it/120x120/096/fff/',
	'content' => 'The only overseas digital marketing company recognized by Mr. Hua in foreign trade.',
	'title1' => 'Products',
	'title2' => 'Capability',
	'title3' => 'Quick Link',
	'title4' => 'Contact Information',
]); ?>
*/

class footer_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('link_color', '#333');
		$this->set_default_style('link_color_hover', '#666');
		$this->set_default_style('copyright_color', '#096');
		$this->set_default_style('copyright_bgcolor', '#063');
		$this->set_default_style('copyright_align', 'center');
		$this->set_default_style('menu_title_color', '#333');
		$this->set_default_style('contact_info_color', '#333');

		$this->set_default_content('logo_src', 'http://placehold.it/120x120/096/fff/');
		$this->set_default_content('content', 'The only overseas digital marketing company recognized by Mr. Hua in foreign trade.');
		$this->set_default_content('title1', 'Products');
		$this->set_default_content('title2', 'Capability');
		$this->set_default_content('title3', 'Quick Link');
		$this->set_default_content('title4', 'Contact Information');
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
	padding:60px 0 0;
}
.<?php $this->eid(); ?> .mml-footer {
	padding: 80px 0;
	background-color: <?php $this->est('foot_bgcolor'); ?>;
	<?php $this->css_attr_color('desc_color'); ?>
}

.<?php $this->eid(); ?> .mml-footer .container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.<?php $this->eid(); ?> .mml-footer .footer-item {
  text-align: left;
  margin-right: 20px;
}

.<?php $this->eid(); ?> .mml-footer .footer-item:first-child {
  max-width: 200px;
}

.<?php $this->eid(); ?> .mml-footer .footer-item:first-child img {
  display: inline-block;
  max-width: 100%;
}

.<?php $this->eid(); ?> .mml-footer .footer-item:last-child {
  margin-right: 0;
  max-width: 250px;
}

.<?php $this->eid(); ?> .mml-footer .footer-item .footer-item-tit {
	margin-bottom: 5px;
	<?php $this->css_attr_color('menu_title_color'); ?>
}

.<?php $this->eid(); ?> .mml-footer .footer-item a, .<?php $this->eid(); ?> .mml-footer .footer-item .menu-item a {
	display: inline-block;
	margin-bottom: 10px;
	<?php $this->css_attr_color('link_color'); ?>
}

.<?php $this->eid(); ?> .mml-footer .footer-item a:hover, .<?php $this->eid(); ?> .mml-footer .footer-item .menu-item a:hover {
	<?php $this->css_attr_color('link_color_hover'); ?>
}

.<?php $this->eid(); ?> .mml-footer .footer-item .widget_nav_menu .sub-menu {
  margin-left: 20px;
}

.<?php $this->eid(); ?> .mml-footer .footer-item-icons li {
	display: -webkit-box;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	margin-bottom: 10px;
	<?php $this->css_attr_color('contact_info_color'); ?>
}

.<?php $this->eid(); ?> .mml-footer .footer-item-icons li i {
  display: inline-block;
  margin-right: 10px;
  font-size: 25px;
}

.mml-footer-copyright {
  padding: 20px 0;
  background-color: <?php $this->est('copyright_bgcolor'); ?>;
  text-align: <?php $this->est('copyright_align'); ?>;
  <?php $this->css_attr_color('copyright_color'); ?>
}

@media only screen and (max-width: 680px) {
  .<?php $this->eid(); ?> .mml-footer .container {
    -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
            flex-wrap: wrap;
  }
  .<?php $this->eid(); ?> .mml-footer .container .footer-item {
    width: calc(50% - 20px);
    margin-bottom: 20px;
    margin-right: 0;
  }
  .<?php $this->eid(); ?> .mml-footer .container .footer-item:first-child, .<?php $this->eid(); ?> .mml-footer .container .footer-item:last-child {
    max-width: none;
  }
  .<?php $this->eid(); ?> .mml-footer .container .footer-item:nth-child(odd) {
    margin-right: 20px;
  }
}

@media only screen and (max-width: 680px) and (max-width: 414px) {
  .<?php $this->eid(); ?> .mml-footer .container .footer-item {
    width: 100%;
    margin-right: 0;
  }
  .<?php $this->eid(); ?> .mml-footer .container .footer-item:nth-child(odd) {
    margin-right: 0;
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
				<section class="mml-footer">
					<div class="container">
						<div class="footer-item">
							<h3><?php $this->display_tag_img($this->content['logo_src'], get_option( 'blogname' )); ?></h3>
							<p><?php $this->eco('content'); ?></p>
						</div>
						<div class="footer-item">
							<h4 class="footer-item-tit">
								<?php $this->eco('title1'); ?>
							</h4>
							<ul class="footer-item-links">
								<?php dynamic_sidebar( 'footer1' ); ?>
							</ul>
						</div>
						<div class="footer-item">
							<h4 class="footer-item-tit">
								<?php $this->eco('title2'); ?>
							</h4>
							<ul class="footer-item-links">
								<?php dynamic_sidebar( 'footer2' ); ?>
							</ul>
						</div>
						<div class="footer-item">
							<h4 class="footer-item-tit">
								<?php $this->eco('title3'); ?>
							</h4>
							<ul>
								<?php dynamic_sidebar( 'footer3' ); ?>
							</ul>
						</div>
						<div class="footer-item">
							<h4 class="footer-item-tit">
								<?php $this->eco('title4'); ?>
							</h4>
							<ul class="footer-item-icons">
								<li>
									<i class="fab fa-telegram-plane"></i><?php echo mtf_get_address(); ?>
								</li>
								<li>
									<i class="fas fa-phone"></i><?php echo mtf_get_telephone1(); ?>
								</li>
								<li>
									<i class="fas fa-envelope"></i><?php echo antispambot(mtf_get_email1()); ?>
								</li>
							</ul>
						</div>
					</div>
				</section>
				<section class="mml-footer-copyright">
					<div class="container">
						Copyright © <?php echo mtf_get_copyright(); ?>
					</div>
				</section>
			</div>
		<?php
	}
}
