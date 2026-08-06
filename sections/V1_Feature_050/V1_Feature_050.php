<?php

/*
<?php mtf_section('V1_Feature_050', 'feature_050', [
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
	'question_color'	=> ['_' => '#000', 'active' => '#00a978'],
	'btn_color'			=> [
		'obverse'	=> ['_' => '#fff', 'bg' => '#5d6777', '_:hover' => '#fff', 'bg:hover' => '#585f6b', 'bd:hover' => 'transparent'],
		'reverse'	=> ['_' => '#5d6777', 'bg' => 'transparent', 'bd' => '#5d6777']
	]
], [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		['title' => 'Digital Branding', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>'],
		['title' => 'Social Media Marketing', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>']
	],
	'image'	=> ['src' => 'https://via.placeholder.com/580x435/585f6b/e9eef4?text=I', 'alt' => ''],
	'btns'	=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON 1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON 2']
	]
]); ?>
*/

class V1_Feature_050  extends MML_Section_Base {
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
			'question_color'	=> ['_' => '#000', 'active' => '#00a978'],
			'btn_color'			=> [
				'obverse'	=> ['_' => '#fff', 'bg' => '#5d6777', '_:hover' => '#fff', 'bg:hover' => '#585f6b', 'bd:hover' => 'transparent'],
				'reverse'	=> ['_' => '#5d6777', 'bg' => 'transparent', 'bd' => '#5d6777']
			]
		]);

		$this->init_content([
			'title'	=> 'We Bring Impactful Digital Solutions',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
			'items'	=> [
				['title' => 'Digital Branding', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>'],
				['title' => 'Social Media Marketing', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>']
			],
			'image'	=> ['src' => 'https://via.placeholder.com/580x435/585f6b/e9eef4?text=I', 'alt' => ''],
			'btns'	=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON 1'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON 2']
			]
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
			}
			.<?php $this->eid(); ?> .mml-text {
				max-width: 500px;
				flex: 1 1 0;
				margin: 0 20px 0 0;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> .question {
				color: <?php $this->est('question_color._'); ?>
				padding: 10px 0;
				transition: all .24s;
				cursor: pointer;
			}
			.<?php $this->eid(); ?> .answer {
				height: 0;
				border-bottom: 1px solid #eaeaea;
				transition: all .24s;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> .mml-active {
				color: <?php $this->est('question_color.active'); ?>;
				padding: 10px 0 0;
			}
			.<?php $this->eid(); ?> .icon {
				margin-left: 6px;
				transition: transform .24s;
				font-size: .8em;
			}
			.<?php $this->eid(); ?> .mml-active > .icon {
				transform: rotate(90deg);
			}
			.<?php $this->eid(); ?> .mml-active + .answer {
				padding: 10px 0;
				height: unset;
			}
			.<?php $this->eid(); ?> .btn {
				background: <?php $this->est('btn_color.obverse.bg'); ?>;
				color: <?php $this->est('btn_color.obverse._'); ?>;
			}
			.<?php $this->eid(); ?> .btn-reverse {
				background: <?php $this->est('btn_color.reverse.bg'); ?>;
				border-color: <?php $this->est('btn_color.reverse.bd'); ?>;
				color: <?php $this->est('btn_color.reverse._'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: <?php $this->est('btn_color.obverse.bg:hover'); ?>;
				color: <?php $this->est('btn_color.obverse._:hover'); ?>;
				border-color: <?php $this->est('btn_color.obverse.bd:hover'); ?>;
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 50%;
				max-width: 580px;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			@media (max-width: 860px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
					margin: 0 auto 30px;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
					max-width: unset;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		$('.<?php $this->eid(); ?> .question').click(function(){
			var css = this.classList;
			if( css.contains('mml-active') ){
				css.remove('mml-active');
			} else {
				$('.<?php $this->eid(); ?> .mml-active').removeClass('mml-active');
				css.add('mml-active');
			}
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
						<?php if ($this->has_content('items')) { ?>
							<?php foreach ($this->gco('items') as $k => $item) { ?>
								<h4 class="question <?php echo $k == 0 ? 'mml-active' : ''; ?>"><?php _e($item['title']); ?> <i class="icon fas fa-chevron-right"></i></h4>
								<div class="answer"><?php _e($item['content']); ?></div>
							<?php } ?>
						<?php } ?>
					</div>
					<?php if ($this->has_content('image')) { ?>
						<div class="mml-image">
							<?php $this->display_tag_img($this->gco('image.src'), $this->gco('image.alt')); ?>
							<div class="btns">
								<?php if ($this->has_content('btns.obverse.text')) { ?>
									<a href="<?php $this->eco('btns.obverse.link'); ?>" class="btn"><?php $this->eco('btns.obverse.text'); ?></a>
								<?php } ?>
								<?php if ($this->has_content('btns.reverse.text')) { ?>
									<a href="<?php $this->eco('btns.reverse.link'); ?>" class="btn btn-reverse"><?php $this->eco('btns.reverse.text'); ?></a>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
