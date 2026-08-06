<?php

/*
<?php mtf_section('V1_Team_009', 'team_009', [
	'class'				=> '',
	'bg_color' 			=> '',
	'bg_image' 			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#808080',
	'h2_color'			=> '#212121',
	'h4_color'			=> '#000',
	'box_color'			=> [':bg' => '#fff'],
	'position_color'	=> '#aaa',
	'slick_color'		=> [':active' => '#212121']
], [
	'title'	=> 'A Team of High Professionalism and Devotion',
	'desc'	=> "<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice.</p>",
	'items'	=> [
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x296/585f6b/e9eef4?text=I', 'alt' => ''],
			'name'		=> 'Seven Xia',
			'position'	=> 'CEO & Founder',
			'desc'		=> "<p>Trust is the cornerstone to all customer experiences. That's what I believe, and what I insist in business.</p>"
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x296/585f6b/e9eef4?text=I', 'alt' => ''],
			'name'		=> 'Seven Xia',
			'position'	=> 'CEO & Founder',
			'desc'		=> "<p>Trust is the cornerstone to all customer experiences. That's what I believe, and what I insist in business.</p>"
		]
	]
]); ?>
*/

class V1_Team_009  extends MML_Section_Base {
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
			'h2_color'			=> '#212121',
			'h4_color'			=> '#000',
			'box_color'			=> [':bg' => '#fff'],
			'position_color'	=> '#aaa',
			'slick_color'		=> [':active' => '#212121']
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
				text-align: center;
			}
			.<?php $this->eid(); ?> > .container > p {
				margin: 10px auto;
				max-width: 1000px;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				margin: 20px auto 0;
				text-align: left;
			}
			.<?php $this->eid(); ?> .mml-box {
				display: flex !important;
				align-items: center;
				background: <?php $this->est('box_color.:bg'); ?>;
				transition: all .24s;
			}
			.<?php $this->eid(); ?> .slick-list {
				padding: 20px 200px 20px 0;
			}
			.<?php $this->eid(); ?> .slick-current .mml-box{
				box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.1);
			}
			.<?php $this->eid(); ?> .mml-text {
				max-width: 360px;
				margin: 0 auto;
			}
			.<?php $this->eid(); ?> h4 {
				color: <?php $this->est('h4_color'); ?>;
			}
			.<?php $this->eid(); ?> .position {
				color: <?php $this->est('position_color'); ?>;
			}
			.<?php $this->eid(); ?> .mml-image {
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> .slick-dots {
				margin-top: 30px;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .slick-active button {
				background: <?php $this->est('slick_color.:active'); ?>;
			}
			@media (max-width: 980px) {
				.<?php $this->eid(); ?> .slick-list {
					padding: 20px 0;
				}
			}
			@media (max-width: 650px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block !important;
					padding: 20px;
				}
				.<?php $this->eid(); ?> .mml-image {
					margin: 0 auto 20px;
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
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<?php $this->eco('desc'); ?>
					<?php } ?>
					<?php if ($this->has_content('items')) { ?>
						<ul class="slicker">
							<?php foreach ($this->gco('items') as $item) { ?>
								<li class="mml-box">
									<?php if (!empty($item['image']['src'])) { ?>
										<div class="mml-image"><?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?></div>
									<?php } ?>
									<div class="mml-text">
										<?php if (!empty($item['name'])) { ?>
											<h4><?php _e($item['name']); ?></h4>
										<?php } ?>
										<?php if (!empty($item['position'])) { ?>
											<span class="position"><?php _e($item['position']); ?></span>
										<?php } ?>
										<?php if (!empty($item['desc'])) { ?>
											<?php _e($item['desc']); ?>
										<?php } ?>
									</div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
