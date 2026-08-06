<?php

/*
<?php mtf_section('V1_Feature_013', 'feature_013', [
	'slider_dot_color_active' => '#009a78',
	'slider_img_radius' => '0px',
	'client_name_color' => '#333',
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
	'reverse' => '', // 如果需要左图右文，请赋值 mml-reverse
], [
	'client_word' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus in maiores pariatur tempora laboriosam facere id qui corrupti? Molestiae minus maxime repellat quaerat. Magnam culpa ad impedit, quos hic ipsam.',
	'client_name' => 'Angela Jensen, Procurement Manager',
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'images' => [
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
	],
]); ?>
*/

class V1_Feature_013  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('slider_dot_color_active', '#009a78');
		$this->set_default_style('slider_img_radius', '0px');
		// $this->set_default_style('client_word_color', '#345');
		$this->set_default_style('client_name_color', '#333');
		$this->set_default_style('reverse', ''); // mml-reverse

		$this->set_default_content('client_word', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus in maiores pariatur tempora laboriosam facere id qui corrupti? Molestiae minus maxime repellat quaerat. Magnam culpa ad impedit, quos hic ipsam.');
		$this->set_default_content('client_name', 'Angela Jensen, Procurement Manager');

		if (!isset($this->content['images'])) {
			$this->content['images'] = [ [], [], [] ];
		}
		if (count($this->content['images']) > 0) {
			foreach ($this->content['images'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['images'][$key]['src'] = 'https://via.placeholder.com/480x354/009a78/fff?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['images'][$key]['alt'] = 'Image Alt ';
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
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .pre-heading {
				<?php $this->css_attr_color('subtitle_color'); ?>
				font-weight: 700;
				font-size: 20px;
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> > .mml-reverse .mml-text {
				margin: 0 0 0 20px;
			}
			.<?php $this->eid(); ?> .mml-text {
				margin: 0 20px 0 0;
				max-width: 660px;
				width: 60%;
			}
			.<?php $this->eid(); ?> .mml-split {
				height: 1px;
				background: #d3d3d3;
			}
			.<?php $this->eid(); ?> h4 {
				<?php $this->css_attr_color('client_name_color'); ?>
			}
			.<?php $this->eid(); ?> .slicker {
				flex: 1 1 0;
				max-width: 480px;
			}
			.<?php $this->eid(); ?> .slicker img {
				<?php $this->css_attr('border-radius', 'slider_img_radius'); ?>
			}
			.<?php $this->eid(); ?> .slick-dots .slick-active button{
				<?php $this->css_attr('background', 'slider_dot_color_active'); ?>
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> >.container .mml-text {
					margin: 0;
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .slicker {
					margin: 40px auto 0;
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
				<div class="container <?php $this->est('reverse'); ?>">
					<div class="mml-text">
						<?php if ($this->has_content('subtitle')) { ?>
							<b class="pre-heading"><?php $this->eco('subtitle'); ?></b>
						<?php } ?>
						<?php if ($this->has_content('title')) { ?>
							<h2><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<p><?php $this->eco('desc'); ?></p>
						<?php } ?>
						<div class="mml-split"></div>
						<?php if ($this->has_content('client_word')) { ?>
							<p><?php $this->eco('client_word'); ?></p>
						<?php } ?>
						<?php if ($this->has_content('client_name')) { ?>
							<h4><?php $this->eco('client_name'); ?></h4>
						<?php } ?>
					</div>
					<?php if (count($this->content['images']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['images'] as $key => $value) { ?>
								<li><?php $this->display_tag_img($value['src'], $value['alt']); ?></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
