<?php

/*
<?php mtf_section('V1_Cta_003', 'cta_003', [
	'min_height' => '320px',
	'bg_color_left' => '#fff',
	'bg_color_right' => '#03a57b',
	'bg_color_percentage' => '50%',
	'btn_color' => '#fff',
	'btn_bgcolor' => '#03a67b',
	'right_title_color' => '#fff',
	'right_text_color' => '#fff',
	'right_link_wrap_width' => '360px',
	'right_link_item_width' => '50%',
	'class' => '',
	'bg_color' => '#fff',
	'bg_image' => '',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'title_color' => '#333',
	'subtitle_color' => '#666',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'button_text' => 'Contact Us',
	'button_link' => '#',
	'right_title' => 'Title on the right',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'text' => '', 'link' => '' ],
		[ 'text' => '', 'link' => '' ],
	],
]); ?>
*/

class V1_Cta_003  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('min_height', '320px');
		$this->set_default_style('bg_color_left', '#fff');
		$this->set_default_style('bg_color_right', '#03a57b');
		$this->set_default_style('bg_color_percentage', '50%');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#03a67b');
		$this->set_default_style('right_title_color', '#fff');
		$this->set_default_style('right_text_color', '#fff');
		$this->set_default_style('right_link_wrap_width', '360px');
		$this->set_default_style('right_link_item_width', '50%');

		$this->set_default_content('button_text', 'Contact Us');
		$this->set_default_content('button_link', '#');
		$this->set_default_content('right_title', 'Title on the right');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Digital Solutions';
				}
				if (!isset($value['link'])) {
					$this->content['items'][$key]['link'] = '#';
				}
			}
		}
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
				color: <?php $this->est('desc_color'); ?>;
				min-height: <?php $this->est('min_height'); ?>;
				background-image: -webkit-gradient(linear, left top, right top, color-stop(<?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_left'); ?>), color-stop(<?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?>));
				background-image: -webkit-linear-gradient(left, <?php $this->est('bg_color_left'); ?> <?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?> <?php $this->est('bg_color_percentage'); ?>);
				background-image: -o-linear-gradient(left, <?php $this->est('bg_color_left'); ?> <?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?> <?php $this->est('bg_color_percentage'); ?>);
				background-image: linear-gradient(to right, <?php $this->est('bg_color_left'); ?> <?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?> <?php $this->est('bg_color_percentage'); ?>);
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> .container {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			}

			.<?php $this->eid(); ?> .section-tit {
			  color: <?php $this->est('title_color'); ?>;
			}

			.<?php $this->eid(); ?> .mml-btn {
			  background-color: <?php $this->est('btn_bgcolor'); ?>;
			  color: <?php $this->est('btn_color'); ?>;
			}

			.<?php $this->eid(); ?> .cta-item {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			  padding-right: 20px;
			  -webkit-box-sizing: border-box;
			          box-sizing: border-box;
			  max-width: 590px;
			}

			.<?php $this->eid(); ?> .cta-r {
			  padding-left: 60px;
			  max-width: 580px;
			  color: <?php $this->est('right_text_color'); ?>;
			}

			.<?php $this->eid(); ?> .cta-r .section-tit {
			  color: <?php $this->est('right_title_color'); ?>;
			}

			.<?php $this->eid(); ?> .cta-links {
			  max-width: <?php $this->est('right_link_wrap_width'); ?>;
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-flex-wrap: wrap;
			      -ms-flex-wrap: wrap;
			          flex-wrap: wrap;
			  margin-top: 10px;
			}

			.<?php $this->eid(); ?> .cta-links .cta-link-item {
			  width: <?php $this->est('right_link_item_width'); ?>;
			  display: block;
			  margin-bottom: 20px;
			}

			.<?php $this->eid(); ?> .cta-links .cta-link-item:hover span {
			  text-decoration: underline;
			}

			.<?php $this->eid(); ?> .cta-links .cta-link-item i {
			  display: inline-block;
			  width: 8px;
			  height: 8px;
			  margin-top: -2px;
			  margin-right: 10px;
			  -webkit-border-radius: 100%;
			          border-radius: 100%;
			  vertical-align: middle;
			  background-color: <?php $this->est('right_text_color'); ?>;
			}

			@media only screen and (max-width: 680px) {
			  .<?php $this->eid(); ?> {
			    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(<?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_left'); ?>), color-stop(<?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?>));
			    background-image: -webkit-linear-gradient(top, <?php $this->est('bg_color_left'); ?> <?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?> <?php $this->est('bg_color_percentage'); ?>);
			    background-image: -o-linear-gradient(top, <?php $this->est('bg_color_left'); ?> <?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?> <?php $this->est('bg_color_percentage'); ?>);
			    background-image: linear-gradient(to bottom, <?php $this->est('bg_color_left'); ?> <?php $this->est('bg_color_percentage'); ?>, <?php $this->est('bg_color_right'); ?> <?php $this->est('bg_color_percentage'); ?>);
			  }
			  .<?php $this->eid(); ?> .container {
			    -webkit-flex-wrap: wrap;
			        -ms-flex-wrap: wrap;
			            flex-wrap: wrap;
			  }
			  .<?php $this->eid(); ?> .cta-item {
			    width: 100%;
			    -webkit-box-flex: 0;
			    -webkit-flex: none;
			        -ms-flex: none;
			            flex: none;
			  }
			  .<?php $this->eid(); ?> .cta-l {
			    padding-bottom: 80px;
			  }
			  .<?php $this->eid(); ?> .cta-r {
			    padding-left: 0;
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
					<div class="cta-item cta-l">
						<?php if ($this->has_content('title')) { ?>
							<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p class="section-cont"><?php $this->eco('desc'); ?></p>
						<?php } ?>
						<?php if ($this->has_content('button_text')) { ?>
							<div class="mml-btn-box">
								<a href="<?php $this->eco('button_link'); ?>" class="mml-btn"><?php $this->eco('button_text'); ?></a>
							</div>
						<?php } ?>
					</div>
					<div class="cta-item cta-r">
						<?php if ($this->has_content('right_title')) { ?>
							<h2 class="section-tit"><?php $this->eco('right_title'); ?></h2>
						<?php } ?>
						<?php if (count($this->content['items']) > 0) { ?>
							<div class="cta-links">
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<a href="<?php _e($value['link']); ?>" class="cta-link-item"><i></i><span><?php _e($value['text']); ?></span></a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php
	}
}
