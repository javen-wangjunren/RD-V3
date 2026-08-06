<?php

/*
<?php mtf_section('V1_Cta_004', 'cta_004', [
	'min_height' => '145px',
	'title_width' => '665px',
	'desc_width' => '565px',
	'btn_color' => '#fff',
	'btn_bgcolor' => '#003a78',
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
	'btn_text' => 'Contact Us',
	'btn_link' => '#',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
]); ?>
*/

class V1_Cta_004  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('min_height', '145px');
		$this->set_default_style('title_width', '665px');
		$this->set_default_style('desc_width', '565px');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#00a978');

		$this->set_default_content('btn_text', 'Contact Us');
		$this->set_default_content('btn_link', '#');
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
			}
			.<?php $this->eid(); ?> .container {
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-box-align: center;
			  -webkit-align-items: center;
			      -ms-flex-align: center;
			          align-items: center;
			  <?php $this->css_attr('min-height', 'min_height'); ?>
			}

			.<?php $this->eid(); ?> .container .cta-item {
			  -webkit-box-flex: 1;
			  -webkit-flex: 1;
			      -ms-flex: 1;
			          flex: 1;
			  margin-right: 20px;
			}

			.<?php $this->eid(); ?> .container .section-tit {
			  <?php $this->css_attr_color('title_color'); ?>
			  <?php $this->css_attr('max-width', 'title_width'); ?>
			}

			.<?php $this->eid(); ?> .container .section-cont {
				<?php $this->css_attr('max-width', 'desc_width'); ?>
			}

			.<?php $this->eid(); ?> .container .mml-btn {
			  <?php $this->css_attr('background-color', 'btn_bgcolor'); ?>
			  <?php $this->css_attr_color('btn_color'); ?>
			}

			@media only screen and (max-width: 680px) {
			  .<?php $this->eid(); ?> .container {
			    -webkit-flex-wrap: wrap;
			        -ms-flex-wrap: wrap;
			            flex-wrap: wrap;
			  }
			  .<?php $this->eid(); ?> .container .cta-item {
			    -webkit-box-flex: 0;
			    -webkit-flex: none;
			        -ms-flex: none;
			            flex: none;
			    width: 100%;
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
				<div class="container">
					<div class="cta-item">
						<?php if ($this->has_content('title')) { ?>
							<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p class="section-cont"><?php $this->eco('desc'); ?></p>
						<?php } ?>
					</div>
					<?php if ($this->has_content('btn_text')) { ?>
						<div class="mml-btn-box">
							<a href="<?php $this->eco('btn_link'); ?>" class="mml-btn"><?php $this->eco('btn_text'); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
