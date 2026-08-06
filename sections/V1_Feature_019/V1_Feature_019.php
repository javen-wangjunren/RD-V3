<?php

/*
<?php mtf_section('V1_Feature_019', 'feature_019', [
	'item_title_color' => '#333',
	'item_desc_color' => '#666',
	'img_radius' => '0px',
	'btn_color' => '#fff',
	'btn_bgcolor' => '#097',
	'btn_bgcolor_hover' => '#0a8',
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
		[ 'question' => 'Question', 'answer' => '', 'image' => ['src' => '', 'alt' => ''], 'video' => '' ],
		[ 'question' => 'Question', 'answer' => '', 'image' => ['src' => '', 'alt' => ''], 'video' => '' ],
		[ 'question' => 'Question', 'answer' => '', 'image' => ['src' => '', 'alt' => ''], 'video' => '' ]
	],
]); ?>
*/

class V1_Feature_019  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->set_default_style('item_title_color', '#333');
		$this->set_default_style('item_desc_color', '#666');
		$this->set_default_style('img_radius', '0px');
		$this->set_default_style('btn_color', '#fff');
		$this->set_default_style('btn_bgcolor', '#097');
		$this->set_default_style('btn_bgcolor_hover', '#0a8');
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
			.<?php $this->eid(); ?> h2 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-box {
				margin: 40px 0;
				display: flex;
				justify-content: space-between;
				text-align: left;
			}
			.<?php $this->eid(); ?> .mml-slider {
				width: 50%;
				max-width: 572px;
				margin-right: 20px;
			}
			.<?php $this->eid(); ?> .mml-slider > li {
				border-bottom: 1px solid #eaeaea;
			}
			.<?php $this->eid(); ?> .question {
				padding: 10px 0;
				<?php $this->css_attr_color('item_title_color'); ?>
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .answer {
				height: 0;
				padding: 0;
				overflow: hidden;
				transition: all .24s;
				<?php $this->css_attr_color('item_desc_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-active .answer {
				height: unset;
				padding: 0 0 10px;
			}
			.<?php $this->eid(); ?> .slicker {
				margin-left: auto;
				flex: 1 1 0;
				max-width: 492px;
			}
			.<?php $this->eid(); ?> .slicker img {
				<?php $this->css_attr('border-radius', 'img_radius'); ?>
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn{
				background: <?php $this->est('btn_bgcolor'); ?>;
				color: <?php $this->est('btn_color'); ?>;
				border: 2px solid <?php $this->est('btn_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse{
				background: transparent;
				color: <?php $this->est('btn_bgcolor'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover{
				background: <?php $this->est('btn_bgcolor_hover'); ?>;
				border-color: transparent;
				color: <?php $this->est('btn_color'); ?>;
			}
			@media (max-width: 850px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-slider {
					margin: 0 0 40px;
					width: unset;
					max-width: unset;
				}
				.<?php $this->eid(); ?> .slicker {
					margin: 0 auto;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $slider = $('.<?php $this->eid(); ?> .mml-slider');
		$slider.on('click', '.question', function(){
			$slider.find('.mml-active').removeClass('mml-active');
			var $li = this.parentNode;
			$li.classList.add('mml-active');
		});

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
						<p><?php $this->eco('desc'); ?></p>
					<?php } ?>
					<?php if (count($this->content['items']) > 0) { ?>
						<div class="mml-box">
							<ul class="mml-slider">
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<li class="<?php echo $key === 0 ? 'mml-active' : ''; ?>">
										<h4 class="question"><?php _e($value['question']); ?>&nbsp;<i class='fas fa-chevron-right'></i></h4>
										<div class="answer"><?php _e($value['answer']); ?></div>
									</li>
								<?php } ?>
							</ul>
							<ul class="slicker">
								<?php foreach ($this->content['items'] as $key => $value) { ?>
									<?php if (!empty($value['image']['src'])) { ?>
										<li class="slick-item <?php echo $key === 0 ? 'mml-active' : ''; ?>">
											<?php $this->display_tag_img($value['image']['src'], $value['image']['alt']); ?>
											<?php if (!empty($value['video'])) { ?>
												<a href="<?php echo $value['video']; ?>" class="vp-a"><i class="far fa-play-circle"></i></a>
											<?php } ?>
										</li>
									<?php } ?>
								<?php } ?>
							</ul>
						</div>
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
