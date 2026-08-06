<?php

/*
<?php mtf_section('V1_Case_Detail_001', 'case_detail_001', [
	'sidebar_bgcolor' => '#ccc',
	'sidebar_title_color' => '#333',
	'sidebar_link_color' => '#333',
	'sidebar_link_color_hover' => '#666',
	'sidebar_share_size' => '40px',
	'sidebar_share_color' => '#333',
	'sidebar_share_color_hover' => '#666',
	'class' => '',
	'bg_color' => '',
	'bg_image' => '',
	'background_attachment' => '', // 如果需要视差效果，请赋值 fixed
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'sidebar_title' => 'Wonderful',
	'sidebar_text' => 'Contact Us',
	'title' => 'Title',
	'desc' => 'This is the description.',
]); ?>
*/

class V1_Case_Detail_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('sidebar_bgcolor', '#ccc');
		$this->set_default_style('sidebar_title_color', '#333');
		$this->set_default_style('sidebar_link_color', '#333');
		$this->set_default_style('sidebar_link_color_hover', '#666');
		$this->set_default_style('sidebar_share_size', '40px');
		$this->set_default_style('sidebar_share_color', '#333');
		$this->set_default_style('sidebar_share_color_hover', '#666');

		$this->set_default_content('sidebar_title', 'Wonderful');
		$this->set_default_content('sidebar_text', 'Contact Us');
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
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-box {
				display: flex;
				justify-content: space-between;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .case-title {
				<?php $this->css_attr_color('title_color'); ?>
				font-size: 36px;
			}
			.<?php $this->eid(); ?> .mml-article {
				flex: 1 1 0;
				max-width: 520px;
			}
			.<?php $this->eid(); ?> .case-sidebar {
				box-sizing: border-box;
				margin: 0 0 0 20px;
				padding: 50px 50px 70px;
				width: 40%;
				max-width: 480px;
				<?php $this->css_attr('background', 'sidebar_bgcolor'); ?>
			}
			.<?php $this->eid(); ?> .case-sidebar h3 {
				<?php $this->css_attr_color('sidebar_title_color'); ?>
			}
			.<?php $this->eid(); ?> .case-sidebar a {
				<?php $this->css_attr_color('sidebar_link_color'); ?>
			}
			.<?php $this->eid(); ?> .case-sidebar a:hover {
				<?php $this->css_attr_color('sidebar_link_color_hover'); ?>
			}
			.<?php $this->eid(); ?> .mml-shares {
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .mml-shares a{
				margin: 10px 10px 0 0;
				<?php $this->css_attr('font-size', 'sidebar_share_size'); ?>
				line-height: 1;
				<?php $this->css_attr_color('sidebar_share_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-shares a:hover {
				<?php $this->css_attr_color('sidebar_share_color_hover'); ?>
			}
			@media (max-width: 780px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .case-sidebar {
					margin: 30px 0 0 0;
					width: unset;
				}
			}
			@media (max-width: 540px) {
				.<?php $this->eid(); ?> .case-sidebar {
					padding: 30px 20px
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
				<div class="container">
					<h1 class="case-title"><?php $this->eco('title'); ?></h1>
					<div class="mml-box">
						<div class="mml-article">
							<?php $this->eco('desc'); ?>
						</div>
						<div class="case-sidebar">
							<h3><?php $this->eco('sidebar_title'); ?></h3>
							<div class="mml-shares">
								<a href="https://www.facebook.com/sharer/sharer.php?u=THISPAGEURL.'&src=sdkpreparse';" class="fb-xfbml-parse-ignore" target="_blank"><i class="fab fa-facebook-square"></i></a>
								<a href="https://twitter.com/share?url=THISPAGEURL" target="_blank"><i class="fab fa-twitter-square"></i></a>
								<a href="https://www.pinterest.com/pin/create/button?url=THISPAGEURL" target="_blank"><i class="fab fa-pinterest-square"></i></a>
								<a href="http://www.linkedin.com/shareArticle?mini=true&url=THISPAGEURL" target="_blank"><i class="fab fa-linkedin"></i></a>
							</div>
							<div><?php $this->eco('sidebar_text'); ?></div>
						</div>
					</div>
				</div>

				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_CN/sdk.js#xfbml=1&version=v3.3"></script>

			</div>
		<?php
	}
}
