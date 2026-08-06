<?php

/*
<?php mtf_section('V1_Feature_051', 'feature_051', [
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
	'h3_color'			=> '#111',
	'naver_color'		=> ['_' => '#212121', '_:active' => '#00a978', 'bd:active' => '#00a978'],
	'btn_color'			=> ['_' => '#fff', '_:hover' => '#fff', 'bg' => '#5d6777', 'bg:hover' => '#585f6b', 'bd:hover' => 'transparent']
], [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		[
			'tab'		=> 'Tab 1',
			'content'	=> '<h3>Tab 1</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar.</p>',
			'image'		=> ['src' => 'https://via.placeholder.com/580x400/585f6b/e9eef4?text=I', 'alt' => ''],
			'list'		=> [
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				]
			],
			'btn'		=> ['link' => 'javascript:;', 'text' => 'BUTTON 1']
		],
		[
			'tab'		=> 'Tab 2',
			'content'	=> '<h3>Tab 2</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar.</p>',
			'image'		=> ['src' => 'https://via.placeholder.com/580x400/585f6b/e9eef4?text=I', 'alt' => ''],
			'list'		=> [
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				]
			],
			'btn'		=> ['link' => 'javascript:;', 'text' => 'BUTTON 1']
		]
	]
]); ?>
*/

class V1_Feature_051  extends MML_Section_Base {
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
			'h3_color'			=> '#111',
			'naver_color'		=> ['_' => '#212121', '_:active' => '#00a978', 'bd:active' => '#00a978'],
			'btn_color'			=> ['_' => '#fff', '_:hover' => '#fff', 'bg' => '#5d6777', 'bg:hover' => '#585f6b', 'bd:hover' => 'transparent']
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
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
				padding: 20px 0 0;
				overflow: hidden;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> .naver {
				order: 2;
				margin: 10px 25px;
				border-bottom: 3px solid transparent;
				font-size: 20px;
				font-weight: 600;
				color: <?php $this->est('naver_color._'); ?>;
			}
			.<?php $this->eid(); ?> .naver.mml-active {
				color: <?php $this->est('naver_color._:active'); ?>;
				border-color: <?php $this->est('naver_color.bd:active'); ?>;
			}
			.<?php $this->eid(); ?> .split {
				order: 3;
				width: 100%;
				margin-bottom: 20px;
			}
			.<?php $this->eid(); ?> .taber {
				display: none;
				box-sizing: border-box;
				flex: 1 1 0;
				order: 5;
				padding: 50px 60px 80px 0;
				background: #f2f2f2;
			}
			.<?php $this->eid(); ?> .mml-active + .taber {
				display: flex;
			}
			.<?php $this->eid(); ?> .text {
				order: 4;
				box-sizing: border-box;
				padding: 20px 50px 30px 80px;
				width: 30%;
				max-width: 570px;
			}
			.<?php $this->eid(); ?> .mml-image {
				width: 50%;
				max-width: 580px;
				margin: 0 60px;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				max-width: 520px;
			}
			.<?php $this->eid(); ?> h3 {
				color: <?php $this->est('h3_color'); ?>;
			}
			.<?php $this->eid(); ?> .list {
				margin: 20px 0 0;
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px 0;
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> .list img {
				margin: 0 10px 0 0;
			}
			.<?php $this->eid(); ?> .btn {
				background: <?php $this->est('btn_color.bg'); ?>;
				color: <?php $this->est('btn_color._'); ?>;
			}
			.<?php $this->eid(); ?> .btn:hover {
				background: <?php $this->est('btn_color.bg:hover'); ?>;
				color: <?php $this->est('btn_color._:hover'); ?>;
				border-color: <?php $this->est('btn_color.bd:hover'); ?>;
			}
			@media (max-width: 1440px) {
				.<?php $this->eid(); ?> .text {
					width: 100%;
					max-width: unset;
					order: 1;
				}
			}
			@media (max-width: 1200px) {
				.<?php $this->eid(); ?> .taber {
					padding: 40px 20px;
				}
				.<?php $this->eid(); ?> .mml-image {
					margin: 0 20px 0 0;
				}
			}
			@media (max-width: 880px) {
				.<?php $this->eid(); ?> .mml-active + .taber {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-image {
					margin: 0 auto 30px;
					width: unset;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
				}
				.<?php $this->eid(); ?> .btns {
					justify-content: center;
				}
			}
			@media (max-width: 600px) {
				.<?php $this->eid(); ?> .naver {
					margin: 10px 20px;
					width: calc(100% - 40px);
					order: 5;
				}
				.<?php $this->eid(); ?> .text {
					padding: 20px;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $section = $('.<?php $this->eid(); ?>');
		$section.on('click', '.naver', function(){
			if( this.classList.contains('mml-active') ) return;
			$section.find('.mml-active').removeClass('mml-active');
			this.classList.add('mml-active');
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="text">
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<?php $this->eco('desc'); ?>
					<?php } ?>
				</div>

				<?php if ($this->has_content('items')) { ?>
					<div class="split"></div>
	
					<?php foreach ($this->gco('items') as $k => $item) { ?>
						<a class="naver <?php echo $k == 0 ? 'mml-active' : ''; ?>"><?php _e($item['tab']); ?></a>
						<div class="taber">
							<?php if (!empty($item['image']['src'])) { ?>
								<div class="mml-image"><?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?></div>
							<?php } ?>
							<div class="mml-text">
								<?php if (!empty($item['content'])) { ?>
									<?php _e($item['content']); ?>
								<?php } ?>
								
								<?php if (!empty($item['list'])) { ?>
									<ul class="list">
										<?php foreach ($item['list'] as $list) { ?>
											<li>
												<?php if (!empty($list['icon'])) { ?>
													<?php _e($list['icon']); ?>
												<?php } else { ?>
													<?php $this->display_tag_img($list['image']['src'], $list['image']['alt']); ?>
												<?php } ?>
												<span><?php _e($list['title']); ?></span>
											</li>
										<?php } ?>
									</ul>
								<?php } ?>
								<?php if (!empty($item['btn']['text'])) { ?>
									<div class="btns">
										<a href="<?php echo $item['btn']['link']; ?>" class="btn"><?php _e($item['btn']['text']); ?></a>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
				
			</div>
		<?php
	}
}
