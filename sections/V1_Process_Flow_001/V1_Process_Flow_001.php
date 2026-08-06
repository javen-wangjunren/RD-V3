<?php

/*
<?php mtf_section('V1_Process_Flow_001', 'process-flow-001', [
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
	'h4_color'			=> '#444',
	'item_color'		=> [':bg' => '#e5ebf2', ':bd' => '#535c6c'],
	'index_color'		=> ['_' => '#fff', ':bg' => '#535c6c']
], [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>',
	'items'	=> [
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'icon'	=> '<i class="fas fa-check"></i>',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'icon'	=> '<i class="fas fa-check"></i>',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
	]
]); ?>
*/

class V1_Process_Flow_001  extends MML_Section_Base {
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
			'h4_color'			=> '#444',
			'item_color'		=> [':bg' => '#e5ebf2', ':bd' => '#535c6c'],
			'index_color'		=> ['_' => '#fff', ':bg' => '#535c6c']
		]);
	}

	public function style () {
		?>
			/* insert style start */
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
				color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> .items > li {
				margin: 40px 10px 0;
				position: relative;
			}
			.<?php $this->eid(); ?> .items > li:after {
				position: absolute;
				top: 40px;
				right: 90%;
				width: 30%;
				border-top: 2px dashed #9f9f9f;
			}
			.<?php $this->eid(); ?> .mml-image {
				position: relative;
				box-sizing: border-box;
				display: flex;
				margin: 0 auto 10px;
				width: 80px;
				height: 80px;
				border-radius: 80px;
				border: 1px solid <?php $this->est('item_color.:bd'); ?>;
				background: <?php $this->est('item_color.:bg'); ?>;
			}
			.<?php $this->eid(); ?> .mml-image i {
				margin: auto;
			}
			.<?php $this->eid(); ?> .mml-image:after {
				content: attr(data-index);
				position: absolute;
				right: 0;
				top: 0;
				padding: 2px 4px;
				min-width: 14px;
				border-radius: 20px;
				font-size: 12px;
				background: <?php $this->est('index_color.:bg'); ?>;
				color: <?php $this->est('index_color._'); ?>;
				text-align: center;
			}
			.<?php $this->eid(); ?> h4 {
				color: <?php $this->est('h4_color'); ?>;
			}
			@media (min-width: 890px){
				.<?php $this->eid(); ?> .items > li:not(:nth-child(4n + 1)):after {
					content: '\20';
				}
			}
			@media (max-width: 890px) and (min-width: 768px) {
				.<?php $this->eid(); ?> .items > li:not(:nth-child(3n + 1)):after {
					content: '\20';
				}
			}
			@media (max-width: 768px) and (min-width: 400px) {
				.<?php $this->eid(); ?> .items > li:not(:nth-child(2n + 1)):after {
					content: '\20';
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
					<?php if ($this->has_content('title')) { ?>
						<h2><?php $this->eco('title'); ?></h2>
					<?php } ?>
					<?php if ($this->has_content('desc')) { ?>
						<?php $this->eco('desc'); ?>
					<?php } ?>
					<?php if ($this->has_content('items')) { ?>
						<ul class="items mml-cols-4">
							<?php foreach ($this->gco('items') as $item) { ?>
								<li>
									<div class="mml-image" data-index="<?php echo $item['index']; ?>">
										<?php if (!empty($item['image'])) { ?>
											<?php $this->display_tag_img($item['image']['src'], $item['image']['alt']); ?>
										<?php } else { ?>
											<?php _e($item['icon']); ?>
										<?php }?>
									</div>
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
			</div>
		<?php
	}
}
