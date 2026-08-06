<?php

/*
<?php mtf_section('V1_Testimonials_002', 'testimonials_002', [
	'item_name_color' => '#333',
	'item_title_color' => '#999',
	'dot_color' => '#c7c7c7',
	'dot_color_active' => '#00a978',
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
], [
	'title' => 'Title',
	'subtitle' => 'Sub Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => '', 'alt' => '', 'name' => '', 'title' => '', 'desc' => '' ]
	],
]); ?>
*/

class V1_Testimonials_002  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_name_color', '#333');
		$this->set_default_style('item_title_color', '#999');
		$this->set_default_style('dot_color', '#c7c7c7');
		$this->set_default_style('dot_color_active', '#00a978');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/120x120/03a57b/f1f1f1?text=Image';
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image';
				}
				if (!isset($value['name'])) {
					$this->content['items'][$key]['name'] = 'Name ' . $key;
				}
				if (!isset($value['title'])) {
					$this->content['items'][$key]['title'] = 'CEO ' . $key;
				}
				if (!isset($value['desc'])) {
					$this->content['items'][$key]['desc'] = 'Description ' . $key;
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('title_color'); ?>;
			}
			.<?php $this->eid(); ?> .til {
				font-weight: 700;
				color: <?php $this->est('item_name_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				max-width: 960px;
				margin: 30px auto 0;
			}
			.<?php $this->eid(); ?> .slicker img {
				margin: 20px auto;
				border-radius: 120px;
			}
			.<?php $this->eid(); ?> .slicker .position {
				color: <?php $this->est('item_title_color'); ?>;
			}
			.<?php $this->eid(); ?> .slick-dots{
				margin-top: 40px;
				justify-content: center;
			}
			.<?php $this->eid(); ?> .slick-dots > .slick-active button{
				background: <?php $this->est('dot_color_active'); ?>;
			}
			.<?php $this->eid(); ?> .slick-dots button {
				background: <?php $this->est('dot_color'); ?>;
			}
		<?php
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			arrows: false,
			dots: true,
			autoplay: true
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
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<p><?php _e($value['desc']); ?></p>
									<?php $this->display_tag_img($value['src'], $value['alt']); ?>
									<div class="til"><?php _e($value['name']); ?></div>
									<span class="position"><?php _e($value['title']); ?></span>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
