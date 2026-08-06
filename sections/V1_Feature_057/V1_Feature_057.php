<?php

/*
<?php mtf_section('V1_Feature_057', 'feature-057', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'h2_color'			=> '#222',
	'h4_color'			=> '#333',
	'dots_color'		=> ['bg:active' => '#585f6b']
], [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		]
	]
]); ?>
*/

class V1_Feature_057 extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'class'				=> '',
			'bg_color' 			=> '',
			'bg_image' 			=> '',
			'margin_top' 		=> '',
			'padding_top' 		=> '',
			'padding_bottom' 	=> '',
			'margin_bottom' 	=> '',
			'custom_css' 		=> '',
			'desc_color'		=> '#808080',
			'h2_color'			=> '#222',
			'h4_color'			=> '#333',
			'dots_color'		=> ['bg:active' => '#585f6b']
		]);
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
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 480px;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> > .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				width: 50%;
				max-width: 540px;
				text-align: center;
			}
			.<?php $this->eid(); ?> .slicker h4 {
				margin-top: 15px;
				color: <?php $this->est('h4_color'); ?>;
			}
			.<?php $this->eid(); ?> .slick-item {
				display: inline-flex !important;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .slick-item > li {
				box-sizing: border-box;
				margin: 0 10px 50px;
				width: calc(50% - 20px);
			}
			.<?php $this->eid(); ?> .slick-dots {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .slick-dots .slick-active button {
				background: <?php $this->est('dots_color.bg:active'); ?>;
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> > .container .mml-text {
					max-width: unset;
					margin: 0 0 40px;
				}
				.<?php $this->eid(); ?> .slicker {
					margin: 0 auto;
					width: unset;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			arrows: false,
			dots: true
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<div class="mml-text">
						<?php if ($this->has_content('title')) { ?>
							<h2><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<?php $this->eco('desc'); ?>
						<?php } ?>
					</div>
					<?php if ($this->has_content('items')) { ?>
						<div class="slicker">
							<?php $items = array_chunk($this->gco('items'), 4); ?>
							<?php foreach ($items as $ul) { ?>
								<ul class="slick-item">
									<?php foreach ($ul as $item) { ?>
										<li>
											<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
											<?php if (!empty($item['title'])) { ?>
												<h4><?php _e($item['title']); ?></h4>
											<?php } ?>
											<?php if (!empty($item['desc'])) { ?>
												<?php _e($item['desc']); ?>
											<?php } ?>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
