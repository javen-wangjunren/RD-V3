<?php

/*
<?php mtf_section('V1_Cta_007', 'cta_007', [
	'bg_image' => 'http://placehold.it/1920x350/',
	'min_height' => '175px',
	'item_color' => '#03a67b',
	'btn_color' => '#fff',
	'btn_bgcolor' => '#03a67b',
	'class' => '',
	'bg_color' => '#fff',
	'margin_top' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'margin_bottom' => '',
	'columns' => '3', // 列数
	'title_color' => '#333',
	'subtitle_color' => '#666',
	'desc_color' => '#808080',
	'custom_css' => '',
], [
	'button_text' => 'Contact Us',
	'button_link' => '#',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'icon' => '<i class="fas fa-globe"></i>', 'text' => 'content' ],
		[ 'icon' => '', 'text' => '' ],
	],
]); ?>
*/

class V1_Cta_007  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('bg_image', 'http://placehold.it/1920x350/');
		$this->set_default_style('min_height', '175px');
		$this->set_default_style('item_color', '#03a67b');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#03a67b');
		$this->set_style_columns(3); // 默认 3 列。

		$this->set_default_content('button_text', 'Contact Us');
		$this->set_default_content('button_link', '#');

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
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
			}
			.<?php $this->eid(); ?>.mml-section {
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

			.<?php $this->eid(); ?> .container .cta-bd {
			  width: 100%;
			}

			.<?php $this->eid(); ?> .section-tit {
			  <?php $this->css_attr_color('title_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-icons {
			  margin-top: 10px;
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-flex-wrap: wrap;
			      -ms-flex-wrap: wrap;
			          flex-wrap: wrap;
			  -webkit-box-pack: center;
			  -webkit-justify-content: center;
			      -ms-flex-pack: center;
			          justify-content: center;
				<?php $this->css_attr_color('item_color'); ?>
			}

			.<?php $this->eid(); ?> .cta-icons li {
			  /* 变量 100%宽度除以li的个数 */
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  -webkit-box-align: center;
			  -webkit-align-items: center;
			      -ms-flex-align: center;
			          align-items: center;
			  text-align: center;
			}

			.<?php $this->eid(); ?> .cta-icons li i {
			  margin-right: 10px;
			  margin-top: 10px;
			}

			.<?php $this->eid(); ?> .mml-btn {
			  margin-bottom: 0;
				<?php $this->css_attr_color('btn_color'); ?>
				<?php $this->css_attr('background-color', 'btn_bgcolor'); ?>
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
					<div class="cta-bd">
						<?php if ($this->has_content('title')) { ?>
							<h2 class="section-tit"><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if (count($this->content['items']) > 0) { ?>
							<ul class="cta-icons <?php $this->echo_columns_class(); ?>">
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<li>
										<?php _e($value['icon']); ?>
										<p><?php _e($value['text']); ?></p>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
						<?php if ($this->has_content('button_text')) { ?>
							<div class="mml-btn-box">
								<a href="<?php $this->eco('button_link'); ?>" class="mml-btn"><?php $this->eco('button_text'); ?></a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php
	}
}
