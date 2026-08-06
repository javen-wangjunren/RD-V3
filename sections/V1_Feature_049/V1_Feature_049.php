<?php

/*
<?php mtf_section('V1_Feature_049', 'feature_049', [
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
	'download_color'	=> ['_' => '#fff', 'bg' => '#000'],
	'columns'			=> 3
], [
	'title'	=> 'We Bring Impactful<br>Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
			'download'	=> 'javascript:;',
			'title'		=> 'Heading 4',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
			'download'	=> 'javascript:;',
			'title'		=> 'Heading 4',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
			'download'	=> 'javascript:;',
			'title'		=> 'Heading 4',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		]
	]
]); ?>
*/

class V1_Feature_049  extends MML_Section_Base {
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
			'download_color'	=> ['_' => '#fff', 'bg' => '#000'],
			'columns'			=> 3
		]);
		
		$this->init_content([
			'title'	=> 'We Bring Impactful<br>Digital Solutions',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
			'items'	=> [
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
					'download'	=> 'javascript:;',
					'title'		=> 'Heading 4',
					'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				],
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
					'download'	=> 'javascript:;',
					'title'		=> 'Heading 4',
					'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				],
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
					'download'	=> 'javascript:;',
					'title'		=> 'Heading 4',
					'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				]
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
			.<?php $this->eid(); ?> .mml-box {
				margin-bottom: 30px;
				display: flex;
				justify-content: space-between;
			}
			.<?php $this->eid(); ?> h2 {
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> .mml-text {
				flex: 1 1 0;
				margin: 0 0 0 20px;
				max-width: 700px;
			}
			.<?php $this->eid(); ?> .mml-image {
				position: relative;
				overflow: hidden;
				margin-bottom: 10px;
			}
			.<?php $this->eid(); ?> .download {
				position: absolute;
				bottom: 0;
				left: 0; right: 0;
				padding: 10px;
				text-align: center;
				transition: all .24s;
				transform: translate(0, 100%);
				background: <?php $this->est('download_color.bg'); ?>;
				color: <?php $this->est('download_color._'); ?>;
			}
			.<?php $this->eid(); ?> h4 {
				color: <?php $this->est('h4_color'); ?>;
			}
			.<?php $this->eid(); ?> a:hover .download {
				transform: translate(0, 0);
			}
			@media (max-width: 767px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
					margin: 20px 0 0;
				}
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
					<div class="mml-box">
						<?php if ($this->has_content('title')) { ?>
							<h2><?php $this->eco('title'); ?></h2>
						<?php } ?>
						<?php if ($this->has_content('desc')) { ?>
							<div class="mml-text">
								<?php $this->eco('desc'); ?>
							</div>
						<?php } ?>
					</div>
					<?php if ($this->has_content('items')) { ?>
						<ul class="<?php $this->echo_columns_class(); ?>">
							<?php foreach ($this->gco('items') as $item) { ?>
								<li>
									<a href="<?php echo $item['download']; ?>">
										<div class="mml-image">
											<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
											<div class="download"><i class="fas fa-download"></i></div>
										</div>
									</a>
									<h4><?php _e($item['title']); ?></h4>
									<?php _e($item['desc']); ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		<?php
	}
}
