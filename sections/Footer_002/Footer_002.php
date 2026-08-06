<?php

/*
	<?php
	?>
*/

class Footer_002  extends MML_Section_Base {
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
				padding: 80px 0 0;
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> .mml-footer .container {
			  width: 1200px;
			  padding: 0 10px;
			}

			.<?php $this->eid(); ?> .mml-footer .mml-footer-hd {
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
			  color: #262626;
			}

			.<?php $this->eid(); ?> .mml-footer .footer-item a, .<?php $this->eid(); ?> .mml-footer .footer-item .menu-item a {
			  display: inline-block;
			  margin-bottom: 10px;
			  color: #808080;
			}

			.<?php $this->eid(); ?> .mml-footer .footer-item a:hover, .<?php $this->eid(); ?> .mml-footer .footer-item .menu-item a:hover {
			  color: #03a67b;
			}

			.<?php $this->eid(); ?> .mml-footer .footer-item .widget_nav_menu .sub-menu {
			  margin-left: 20px;
			}

			.<?php $this->eid(); ?> .mml-footer .mml-footer-bd {
			  margin-bottom: 40px;
			}

			.<?php $this->eid(); ?> .mml-footer .mml-footer-bd .footer-item {
			  max-width: 100%;
			}

			.<?php $this->eid(); ?> .mml-footer .footer-item-icons {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-flex-wrap: wrap;
			      -ms-flex-wrap: wrap;
			          flex-wrap: wrap;
			  -webkit-box-pack: justify;
			  -webkit-justify-content: space-between;
			      -ms-flex-pack: justify;
			          justify-content: space-between;
			}

			.<?php $this->eid(); ?> .mml-footer .footer-item-icons li {
			  max-width: 380px;
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  margin-bottom: 10px;
			}

			.<?php $this->eid(); ?> .mml-footer .footer-item-icons li i {
			  display: inline-block;
			  margin-right: 10px;
			  font-size: 25px;
			}

			.<?php $this->eid(); ?> .mml-footer-copyright {
			  padding: 20px 0;
			  /* 变量 */
			  background-color: #e9e9e9;
			  /* 变量 */
			  text-align: center;
			  /* 变量 */
			  color: #b3b3b3;
			}

			.<?php $this->eid(); ?> .mml-footer-copyright .container {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-box-align: center;
			  -webkit-align-items: center;
			      -ms-flex-align: center;
			          align-items: center;
			  -webkit-flex-wrap: wrap;
			      -ms-flex-wrap: wrap;
			          flex-wrap: wrap;
			  padding: 0 10px;
			}

			.<?php $this->eid(); ?> .mml-footer-copyright .container .footer-share {
			  display: inline-block;
			  text-align: center;
			  color: #396ec6;
			  /* 变量 */
			  font-size: 30px;
			}

			.<?php $this->eid(); ?> .mml-footer-copyright .container .footer-copyright {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			  min-width: 300px;
			  text-align: center;
			}

			@media only screen and (max-width: 768px) {
			  .<?php $this->eid(); ?> .mml-footer .container {
			    -webkit-flex-wrap: wrap;
			        -ms-flex-wrap: wrap;
			            flex-wrap: wrap;
			  }
			  .<?php $this->eid(); ?> .mml-footer .container .mml-footer-hd {
			    -webkit-flex-wrap: wrap;
			        -ms-flex-wrap: wrap;
			            flex-wrap: wrap;
			  }
			  .<?php $this->eid(); ?> .mml-footer .container .mml-footer-hd .footer-item {
			    max-width: none;
			    width: calc(50% - 10px);
			    margin-bottom: 20px;
			    margin-right: 0;
			  }
			  .<?php $this->eid(); ?> .mml-footer .container .mml-footer-bd .footer-item-icons li {
			    min-width: 300px;
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
						<div class="mml-footer-hd">
							<div class="footer-item">
								<h4 class="footer-item-tit">
									Products
								</h4>
								<ul class="footer-item-links">
									<li>
										<a href="#">Products 1</a>
									</li>
									<li>
										<a href="#">Products 1</a>
									</li>
									<li>
										<a href="#">Products 1</a>
									</li>
								</ul>
							</div>
							<div class="footer-item">
								<h4 class="footer-item-tit">
									Capability
								</h4>
								<ul class="footer-item-links">
									<li>
										<a href="#">Service</a>
									</li>
									<li>
										<a href="#">Quality</a>
									</li>
								</ul>
							</div>
							<div class="footer-item">
								<h4 class="footer-item-tit">
									Capability
								</h4>
								<ul>
									<li id="nav_menu-2" class="widget widget_nav_menu">
										<div class="menu-footer-menu-container">
											<ul id="menu-footer-menu" class="menu">
												<li id="menu-item-256" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-59 current_page_item menu-item-has-children menu-item-256">
													<a href="http://init.mml.local/" aria-current="page">Home</a>
													<ul class="sub-menu">
														<li id="menu-item-259" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-259">
															<a href="http://www.baidu.com">a</a>
														</li>
													</ul>
												</li>
												<li id="menu-item-257" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-257">
													<a href="http://init.mml.local/category/category-a/category-a-01/">Category A 01</a>
													<ul class="sub-menu">
														<li id="menu-item-258" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-258">
															<a href="http://init.mml.local/hello-world/">Hello world!</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
							<div class="footer-item">
								<h4 class="footer-item-tit">
									Capability
								</h4>
								<ul>
									<li id="nav_menu-2" class="widget widget_nav_menu">
										<div class="menu-footer-menu-container">
											<ul id="menu-footer-menu" class="menu">
												<li id="menu-item-256" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-59 current_page_item menu-item-has-children menu-item-256">
													<a href="http://init.mml.local/" aria-current="page">Home</a>
													<ul class="sub-menu">
														<li id="menu-item-259" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-259">
															<a href="http://www.baidu.com">a</a>
														</li>
													</ul>
												</li>
												<li id="menu-item-257" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-257">
													<a href="http://init.mml.local/category/category-a/category-a-01/">Category A 01</a>
													<ul class="sub-menu">
														<li id="menu-item-258" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-258">
															<a href="http://init.mml.local/hello-world/">Hello world!</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="mml-footer-bd">
							<div class="footer-item">
								<h4 class="footer-item-tit">
									Contact Information
								</h4>
								<ul class="footer-item-icons">
									<li>
										<i class="fab fa-telegram-plane"></i>1904 Creative Industrial Park, Osaka Warehouse, Haizhu District, Guangzhou.
									</li>
									<li>
										<i class="fas fa-phone"></i> +86-20-81534532
									</li>
									<li><i class="fas fa-envelope"></i>info@mmldigi.com</li>
									<!-- <li><i class="fas fa-envelope"></i>info@mmldigi.com</li> -->
								</ul>
							</div>
						</div>
					</div>
				</section>
				<section class="mml-footer-copyright">
					<div class="container">
						<div class="footer-share">
							<i class="fab fa-facebook"></i>
							<i class="fab fa-facebook"></i>
							<i class="fab fa-facebook"></i>
						</div>
						<div class="footer-copyright">
							Copyright © 2019, MML. All rights reserved.
						</div>
					</div>
				</section>
			</div>
		<?php
	}
}
