<?php

/*
<?php mtf_section('V1_Cta_005', 'cta_005', [
	'min_height' => '460px',
	'title_width' => '360px',
	'desc_width' => '470px',
	'border_color' => '#ebebeb',
	'item_icon_color' => '#03a67b',
	'item_icon_size' => '40px',
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
	'image' => 'http://placehold.it/960x460/',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'icon' => '<i class="fas fa-globe"></i>', 'text' => 'Content<br />Content 2nd line.' ],
		[ 'icon' => '', 'text' => '' ],
	],
]); ?>
*/

class V1_Cta_005  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('min_height', '460px');
		$this->set_default_style('title_width', '360px');
		$this->set_default_style('desc_width', '470px');
		$this->set_default_style('border_color', '#ebebeb');
		$this->set_default_style('item_icon_color', '#03a67b');
		$this->set_default_style('item_icon_size', '40px');
		// $this->set_default_style('item_text_color', '#ebebeb');

		$this->set_default_content('image', 'http://placehold.it/960x460/');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['icon'])) {
					$this->content['items'][$key]['icon'] = '<i class="fas fa-globe"></i>';
				}
				if (!isset($value['text'])) {
					$this->content['items'][$key]['text'] = 'Content<br />Content 2nd line.';
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
			}
			.<?php $this->eid(); ?>.mml-section {
				padding: 0;
			}

			.<?php $this->eid(); ?> .container {
			  width: 100%;
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  <?php $this->css_attr('min-height', 'min_height'); ?>
			}

			.<?php $this->eid(); ?> .cta-l {
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

			.<?php $this->eid(); ?> .section-tit {
				<?php $this->css_attr_color('title_color'); ?>
				<?php $this->css_attr('max-width', 'title_width'); ?>
			}

			.<?php $this->eid(); ?> .section-cont {
			  <?php $this->css_attr('max-width', 'desc_width'); ?>
			}

			.<?php $this->eid(); ?> .cta-l {
			  background-image: url(<?php $this->eco('image'); ?>);
			  background-position: center;
			  -webkit-background-size: cover;
			          background-size: cover;
			  background-repeat: no-repeat;
			}

			.<?php $this->eid(); ?> .cta-r {
			  padding: 40px 10px 40px 60px;
			  <?php $this->css_attr('background-color', 'bg_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-item-ft {
			  border-top: 1px solid <?php $this->est('border_color'); ?>;
			  margin-top: 20px;
			  padding-top: 20px;
			  max-width: 540px;
			}

			.<?php $this->eid(); ?> .cta-item-ft .cta-item-ft-item {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-box-align: center;
			  -webkit-align-items: center;
			      -ms-flex-align: center;
			          align-items: center;
			  max-width: 420px;
			  margin-bottom: 30px;
			}

			.<?php $this->eid(); ?> .cta-item-ft .cta-item-ft-item i {
			  display: inline-block;
			  margin-right: 10px;
			  <?php $this->css_attr('font-size', 'item_icon_size'); ?>
			  <?php $this->css_attr_color('item_icon_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-item-ft .cta-item-ft-item .bd p {
			  margin: 5px 0;
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
			  .<?php $this->eid(); ?> .cta-r {
			    padding: 40px 10px;
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
					<div class="cta-item cta-l"></div>
					<div class="cta-item cta-r">
						<?php if ($this->has_content('title')) { ?>
							<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p class="section-cont"><?php $this->eco('desc'); ?></p>
						<?php } ?>
						<?php if (count($this->content['items']) > 0) { ?>
							<div class="cta-item-ft">
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<div class="cta-item-ft-item">
										<?php _e($value['icon']); ?>
										<div class="bd">
											<?php _e($value['text']); ?>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php
	}
}
