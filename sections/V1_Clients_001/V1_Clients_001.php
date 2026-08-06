<?php

/*
<?php mtf_section('V1_Clients_001', 'clients_001', [
	'arrow_color_hover' => '#00a978',
	'text_width' => '780px',
	'img_radius' => '5px',
	'button_color' => '#fff',
	'button_bgcolor' => '#00a978',
	'button_bgcolor_hover' => '#02bd8c',
	'btnplay_color' => '#fff',
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
	'button_text_1' => 'CTA Button 1',
	'button_link_1' => '#1',
	'button_text_2' => 'CTA Button 2',
	'button_link_2' => '#2',
	'title' => 'Title',
	'desc' => 'This is the description.',
	'items' => [
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
		[ 'src' => '', 'alt' => '' ],
	]
]); ?>
*/

class V1_Clients_001  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('arrow_color_hover', '#00a978');
		$this->set_default_style('text_width', '780px');
		$this->set_default_style('img_radius', '0px');
		$this->set_default_style('button_color', '#fff');
		$this->set_default_style('button_bgcolor', '#00a978');
		$this->set_default_style('button_bgcolor_hover', '#02bd8c');
		$this->set_default_style('btnplay_color', '#fff');

		$this->set_default_content('button_text_1', 'CTA Button 1');
		$this->set_default_content('button_link_1', '#1');
		$this->set_default_content('button_text_2', 'CTA Button 2');
		$this->set_default_content('button_link_2', '#2');

		if (!isset($this->content['items'])) {
			$this->content['items'] = [ [], [], [], [], [], [], [] ];
		}
		if (count($this->content['items']) > 0) {
			foreach ($this->content['items'] as $key => $value) {
				if (!isset($value['src'])) {
					$this->content['items'][$key]['src'] = 'https://via.placeholder.com/165x91/ccc/eaeaea?text=Image' . $key;
				}
				if (!isset($value['alt'])) {
					$this->content['items'][$key]['alt'] = 'Image Alt';
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
				text-align: center;
				color: <?php $this->est('desc_color'); ?>;
			}
			.<?php $this->eid(); ?> .container > h2 {
				color: <?php $this->est('title_color'); ?>;
			}
			.<?php $this->eid(); ?> .container > p{
				margin: 10px auto;
				max-width: <?php $this->est('text_width'); ?>;
			}
			.<?php $this->eid(); ?> .slicker {
				margin-top: 40px;
				padding: 0 20px;
			}
			.<?php $this->eid(); ?> .slick-slide {
				margin: 0 10px;
			}
			.<?php $this->eid(); ?> .slick-slide img {
				border-radius: <?php $this->est('img_radius'); ?>;
			}
			.<?php $this->eid(); ?> .slicker-arrow{
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .slicker-arrow:hover{
				color: <?php $this->est('arrow_color_hover'); ?>;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn{
				background: <?php $this->est('button_bgcolor'); ?>;
				color: <?php $this->est('button_color'); ?>;
				border: 2px solid <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background: transparent;
				color: <?php $this->est('button_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover{
				background: <?php $this->est('button_bgcolor_hover'); ?>;
				border-color: transparent;
				color: <?php $this->est('button_color'); ?>;
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .slicker').slick({
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>",
			slidesToShow: 6,
			autoplay: true,
			responsive: [{
				breakpoint: 1000,
				settings: { slidesToShow: 5 }
			}, {
				breakpoint: 840,
				settings: { slidesToShow: 4 }
			}, {
				breakpoint: 690,
				settings: { slidesToShow: 3 }
			}, {
				breakpoint: 540,
				settings: { slidesToShow: 2 }
			}]
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
									<?php $this->display_tag_img($value['src'], $value['alt']); ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
					<?php if ($this->has_content('button_text_1') || $this->has_content('button_text_2')) { ?>
						<div class="btns">
							<?php if ($this->has_content('button_text_1')) { ?>
								<a href="<?php $this->eco('button_link_1'); ?>" class="btn"><?php $this->eco('button_text_1'); ?></a>
							<?php } ?>
							<?php if ($this->has_content('button_text_2')) { ?>
								<a href="<?php $this->eco('button_link_2'); ?>" class="btn btn-reverse"><?php $this->eco('button_text_2'); ?></a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
