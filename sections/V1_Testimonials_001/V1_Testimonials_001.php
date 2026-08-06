<?php

/*
<?php mtf_section('V1_Testimonials_001', 'testimonials_001', [
	'name_color' => '#333',
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
		[ 'name' => '', 'title' => '', 'desc' => '' ],
	],
]); ?>
*/

class V1_Testimonials_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('name_color', '#333');
		$this->set_default_style('arrow_color_hover', '#00a978');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
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
			.<?php $this->eid(); ?>.mml-section {
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('title_color'); ?>;
			}
			.<?php $this->eid(); ?> .til {
				font-weight: 700;
				color: <?php $this->est('name_color'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				max-width: 1080px;
				margin: 20px auto 0;
				padding: 0 22px;
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover{
				color: <?php $this->est('arrow_color_hover'); ?>;
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slicker p{
				margin: 0 auto 10px;
				max-width: 980px;
			}
		<?php
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
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
					<?php if ($this->has_content('desc')) { ?>
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if (count($this->content['items']) > 0) { ?>
						<ul class="slicker">
							<?php foreach ($this->content['items'] as $key => $value) { ?>
								<li>
									<p><?php _e($value['desc']); ?></p>
									<div class="til"><?php _e($value['name']); ?>, <?php _e($value['title']); ?></div>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
