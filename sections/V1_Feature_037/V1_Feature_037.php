<?php

/*
<?php mtf_section('V1_Feature_037', 'feature-037', [
	'class' 			=> '',
	'bg_color' 			=> '',
	'bg_image'			=> '',
	'margin_top' 		=> '',
	'padding_top' 		=> '',
	'padding_bottom' 	=> '',
	'margin_bottom' 	=> '',
	'custom_css' 		=> '',
	'desc_color'		=> '#fff',
	'reverse'			=> '',	//'mml-reverse'
	'list_class'		=> '',	//'inline'
	'text_bg_color'		=> '#5d6777',
	'subtitle'			=> '#f1f1f1'
], [
	'subtitle' 			=> 'subtitle',
	'title' 			=> 'title',
	'desc'  			=> 'desc',
	'list'				=> [
		[
			'icon' 		=> '',
			'image'		=> ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => 'image' ],
			'title'		=> 'title'
		],
		[
			'icon' 		=> '',
			'image'		=> ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => 'image' ],
			'title'		=> 'title'
		]
	],
	'slider'			=> [
		[
			'video'		=> '',
			'image'		=> ['src' => 'https://via.placeholder.com/600x576/e9eef4/5d6777?text=A', 'alt' => '']
		],
		[
			'video'		=> '',
			'image'		=> ['src' => 'https://via.placeholder.com/600x576/e9eef4/5d6777?text=B', 'alt' => '']
		]
	]
]); ?>
*/

class V1_Feature_037  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
			'class' 			=> '',
			'bg_color' 			=> '',
			'bg_image'			=> '',
			'margin_top' 		=> '',
			'padding_top' 		=> '',
			'padding_bottom' 	=> '',
			'margin_bottom' 	=> '',
			'custom_css' 		=> '',
			'desc_color'		=> '#fff',
			'reverse'			=> '',	//'mml-reverse'
			'list_class'		=> '',	//'inline'
			'text_bg_color'		=> '#5d6777',
			'subtitle'			=> '#f1f1f1'
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
			}
			.<?php $this->eid(); ?> > .container {
				display: flex;
				align-items: flex-end;
			}
			.<?php $this->eid(); ?> > .mml-reverse {
				flex-direction: row-reverse;
			}
			.<?php $this->eid(); ?> .mml-image {
				position: relative;
				box-sizing: border-box;
				width: 56%;
				max-width: 600px;
			}
			.<?php $this->eid(); ?> .mml-image:before {
				content: '\20';
				position:absolute;
				right: 0;
				bottom: 0;
				width: 50%;
				height: 100%;
				background: <?php $this->est('text_bg_color'); ?>;
			}
			.<?php $this->eid(); ?> .slick-dots {
				margin-top: 120px;
			}
			.<?php $this->eid(); ?> .single {
				margin-bottom: 120px;
			}
			.<?php $this->eid(); ?> .slick-active button {
				background: <?php $this->est('text_bg_color'); ?>;
			}
			.<?php $this->eid(); ?> .slick-next {
				display: none;
				position: absolute;
				z-index: 10;
				right: 0;
				bottom: 0;
				max-width: 50%;
			}
			.<?php $this->eid(); ?> .vp-a {
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-text {
				position: relative;
				box-sizing: border-box;
				flex: 1 1 0;
				max-width: 580px;
				padding: 100px 80px;
				background: <?php $this->est('text_bg_color'); ?>;
				<?php $this->css_attr_color('desc_color'); ?>
			}
			.<?php $this->eid(); ?> .pre-heading {
				font-size: 20px;
				<?php $this->css_attr_color('subtitle_color'); ?>
			}
			.<?php $this->eid(); ?> .list {
				margin-top: 30px;
			}
			.<?php $this->eid(); ?> .list.inline {
				display: flex;
				flex-wrap: wrap;
			}
			.<?php $this->eid(); ?> .list > li {
				margin: 10px 30px 0 0;
				display: flex;
				align-items: center;
			}
			.<?php $this->eid(); ?> .list img {
				margin: 0 10px 0 0;
			}
			@media (max-width: 1180px) {
				.<?php $this->eid(); ?> .mml-text {
					padding: 40px;
				}
			}
			@media (max-width: 960px) {
				.<?php $this->eid(); ?> > .container {
					display: block;
				}
				.<?php $this->eid(); ?> .mml-image {
					width: unset;
					margin: 0 auto;
				}
				.<?php $this->eid(); ?> .mml-image:before{
					display: none;
				}
				.<?php $this->eid(); ?> .single {
					margin-bottom: 0;
				}
				.<?php $this->eid(); ?> .mml-text {
					max-width: unset;
					margin: 40px 0 0;
				}
			}
		<?php
		$this->css_custom();
	}

	public function script () {
		?>
(function($){
	$(document).ready(function(){
		var $slicker = $('.<?php $this->eid(); ?> .slicker');
		var $imgs = $slicker.find('img');
		var $btn = $('.<?php $this->eid(); ?> .slick-next');
		var $img = $btn.children();
		var imgs = [];
		$imgs.each(function(i, img){
			imgs.push( img.dataset.src );
		});
		
		$slicker.slick({
			arrows: false,
			dots: true,
			fade: true
		});
		if( imgs.length > 1 ){
			$btn.show().click(function(){
				$slicker.slick('slickNext');
			});
			$slicker.on('afterChange', function(a, b, c){
				var k = c + 1;
				$img.attr('src', imgs[k === imgs.length? 0: k]);
			});
		} else {
			$slicker.addClass('single');
		}
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container <?php $this->est('reverse'); ?>">
					<?php $slider = $this->gco('slider'); ?>

					<div class="mml-image">
						<ul class="slicker">

							<?php if ($slider) { ?>
								<?php foreach ($slider as $s) { ?>
									<li>
										<div class="mml-video">
											<?php if (!empty($s['image'])) { ?>
												<?php $this->display_tag_img($s['image']['src'], $s['image']['alt']); ?>
											<?php } ?>
											<?php if (!empty($s['video'])) { ?>
												<a href="<?php esc_attr_e($s['video']); ?>" class="vp-a">
													<i class="far fa-play-circle"></i>
												</a>
											<?php } ?>
										</div>
									</li>
								<?php } ?>
							<?php } ?>
							
						</ul>

						<?php if (count($slider) >= 2) { ?>
							<a href="javascript:;" class="slick-next">
								<?php $this->display_tag_img($slider[1]['image']['src'], $slider[1]['image']['alt']); ?>
							</a>
						<?php } ?>

					</div>
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
						
						<?php if ($this->has_content('list')) { ?>
							<ul class="list <?php $this->est('list_class'); ?>">
								<?php foreach ($this->gco('list') as $li) { ?>
									<li>
										<?php if (!empty($li['icon'])) { ?>
											<?php echo $li['icon']; ?>
										<?php } else if (!empty($li['image'])) { ?>
											<?php $this->display_tag_img($li['image']['src'], $li['image']['alt']); ?>
										<?php } ?>
										<?php if ( !empty($li['title']) ) { ?>
											<span><?php _e($li['title']); ?></span>
										<?php } ?>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
						
				</div>
			</div>
		<?php
	}
}
