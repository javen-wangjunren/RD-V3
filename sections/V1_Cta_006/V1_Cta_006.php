<?php

/*


<?php mtf_section('V1_Cta_006', 'cta_006', [
	'min_height' => '315px',
	'left_bg_image' => 'http://placehold.it/960x315/',
	'right_bg_color' => '#fff',
	'split_color' => '#ebebeb',
	'item_icon_color' => '#03a67b',
	'item_text_color' => '#808080',
	'link_color' => '#666',
	'link_color_hover' => '#03a67b',
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
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'icon' => '<i class="fas fa-globe"></i>', 'text' => 'text' ],
		[ 'icon' => '', 'text' => '' ],
	],
	'links' => [
		[ 'link' => '', 'text' => '' ],
		[ 'link' => '', 'text' => '' ],
	],
]); ?>
*/

class V1_Cta_006  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('min_height', '315px');
		$this->set_default_style('left_bg_image', 'http://placehold.it/960x315/');
		$this->set_default_style('right_bg_color', '#fff');
		$this->set_default_style('split_color', '#ebebeb');
		$this->set_default_style('item_icon_color', '#03a67b');
		$this->set_default_style('item_text_color', '#808080');
		$this->set_default_style('link_color', '#666');
		$this->set_default_style('link_color_hover', '#03a67b');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['icon'])) {
					$this->content['items'][$key]['icon'] = '<i class="fas fa-globe"></i>';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Content';
				}
			}
		}

		if (!isset($this->content['links'])) {
			$this->content['links'] = [ [], [], [], [], [], [], [] ];
		}
		if (count($this->content['links']) > 0) {
			foreach ($this->content['links'] as $key => $value) {
				if (!isset($value['text'])) {
					$this->content['links'][$key]['text'] = 'Link';
				}
				if (!isset($value['link'])) {
					$this->content['links'][$key]['link'] = '#';
				}
			}
		}
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
				padding: 0;
			}
			.<?php $this->eid(); ?>.mml-section {
				/* 这里的样式可以覆盖 .<?php $this->eid(); ?> 的样式 */
			}
			.<?php $this->eid(); ?> .container {
			  width: 100%;
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
				<?php $this->css_attr('min-height', 'min_height'); ?>
			}

			.<?php $this->eid(); ?> .cta-item {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			  -webkit-box-sizing: border-box;
			          box-sizing: border-box;
			}

			.<?php $this->eid(); ?> .cta-item .cta-bd {
			  max-width: 590px;
			  -webkit-box-sizing: border-box;
			          box-sizing: border-box;
			}

			.<?php $this->eid(); ?> .cta-l {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-box-align: center;
			  -webkit-align-items: center;
			      -ms-flex-align: center;
			          align-items: center;
			  -webkit-box-pack: end;
			  -webkit-justify-content: flex-end;
			      -ms-flex-pack: end;
			          justify-content: flex-end;
			  background-image: url(<?php $this->est('left_bg_image'); ?>);
			  background-position: center;
			  -webkit-background-size: cover;
			          background-size: cover;
			  background-repeat: no-repeat;
			  min-height: 315px;
			}

			.<?php $this->eid(); ?> .cta-l .cta-bd {
			  padding: 0 10px;
			}

			.<?php $this->eid(); ?> .section-tit {
				<?php $this->css_attr_color('title_color'); ?>
			}

			.<?php $this->eid(); ?> .section-tip-tit {
				<?php $this->css_attr_color('subtitle_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-r {
			  padding: 40px 0;
			  <?php $this->css_attr('background-color', 'right_bg_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-r .cta-bd {
			  padding-left: 60px;
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			}

			.<?php $this->eid(); ?> .cta-r-item {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			}

			.<?php $this->eid(); ?> .cta-r-item:last-child {
			  border-left: 1px solid <?php $this->est('split_color'); ?>;
			  margin-left: 10px;
			  max-width: 205px;
			}

			.<?php $this->eid(); ?> .cta-r-item:last-child a {
			  display: block;
			  margin-bottom: 20px;
			  <?php $this->css_attr_color('link_color'); ?>
			  text-align: center;
			}

			.<?php $this->eid(); ?> .cta-r-item:last-child a:last-child {
			  margin-bottom: 0;
			}

			.<?php $this->eid(); ?> .cta-r-item:last-child a:hover {
			  <?php $this->css_attr_color('link_color_hover'); ?>
			  text-decoration: underline;
			}

			.<?php $this->eid(); ?> .cta-r-item-ft {
			  margin-top: 30px;
			}

			.<?php $this->eid(); ?> .cta-r-item-ft i {
			  margin-top: 10px;
			  margin-right: 10px;
			  display: inline-block;
			  <?php $this->css_attr_color('item_icon_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-r-item-bd {
			  max-width: 290px;
			  <?php $this->css_attr_color('item_text_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-r-item-ft-item {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-box-align: center;
			  -webkit-align-items: center;
			      -ms-flex-align: center;
			          align-items: center;
			}

			@media only screen and (max-width: 680px) {
			  .<?php $this->eid(); ?> .container {
			    -webkit-flex-wrap: wrap;
			        -ms-flex-wrap: wrap;
			            flex-wrap: wrap;
			  }
			  .<?php $this->eid(); ?> .cta-item {
			    -webkit-box-flex: 0;
			    -webkit-flex: none;
			        -ms-flex: none;
			            flex: none;
			    width: 100%;
			  }
			  .<?php $this->eid(); ?> .cta-item .cta-bd {
			    max-width: 100%;
			  }
			  .<?php $this->eid(); ?> .cta-r {
			    padding: 40px 10px;
			  }
			  .<?php $this->eid(); ?> .cta-r .cta-bd {
			    padding-left: 0;
			  }
			  .<?php $this->eid(); ?> .cta-r .cta-bd .cta-r-item {
			    max-width: 100%;
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
						<?php if ($this->has_content('title') || $this->has_content('subtitle')) { ?>
							<div class="cta-bd">
								<?php if ($this->has_content('subtitle')) { ?>
									<h4 class="section-tip-tit"><?php $this->eco('subtitle'); ?></h4>
								<?php } ?>
								<?php if ($this->has_content('title')) { ?>
									<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<div class="cta-item cta-r">
						<div class="cta-bd">
							<div class="cta-r-item">
								<?php if ($this->has_content('desc')) { ?>
									<p class="cta-r-item-bd"><?php $this->eco('desc'); ?></p>
								<?php } ?>
								<?php if (count($this->content['items']) > 0) { ?>
									<div class="cta-r-item-ft">
										<?php foreach ($this->content['items'] as $key => $value) { ?>
											<div class="cta-r-item-ft-item">
												<?php _e($value['icon']); ?>
												<p><?php _e($value['text']); ?></p>
											</div>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
							<?php if (count($this->content['links']) > 0) { ?>
								<div class="cta-r-item">
									<?php foreach ($this->content['links'] as $key => $value) { ?>
										<a href="<?php _e($value['link']); ?>"><?php _e($value['text']); ?></a>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
