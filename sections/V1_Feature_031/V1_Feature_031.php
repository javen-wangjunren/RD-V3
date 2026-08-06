<?php

/*
<?php mtf_section('V1_Feature_031', 'feature-031', [
	'class'						=> '',
	'bg_color' 					=> '#fff',
	'bg_image' 					=> '',
	'margin_top' 				=> '',
	'padding_top' 				=> '',
	'padding_bottom' 			=> '',
	'margin_bottom' 			=> '',
	'custom_css' 				=> '',
	'desc_color'				=> '#808080',
	'title_color'				=> '#000',
	'vplay_color'				=> '#fff',
	'btn_bg_color'				=> '#00a978',
	'btn_color'					=> '#fff',
	'btn:hover_bg_color' 		=> '#02bd8c',
	'btn:hover_color'			=> '#fff',
	'btn:hover_border_color' 	=> 'transparent'
], [
	'title' => 'Title',
	'desc' => 'description',
	'video'	=> [
		'link'	=> '',
		'image'	=> ['src' => '', 'alt' => '']
	],
	'items' => [
		[
			'image' 	=> ['src' => '', 'alt' => ''],
			'title'		=> '',
			'content'	=> ''
		],
		[
			'image' 	=> ['src' => '', 'alt' => ''],
			'title'		=> '',
			'content'	=> ''
		]
	],
	'button_1' => [
		'link'	=> '',
		'text'	=> ''
	],
	'button_2' => [
		'link'	=> '',
		'text'	=> ''
	]
]); ?>
*/

class V1_Feature_031  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style( [
			'desc_color'				=> '#808080',
			'title_color'				=> '#000',
			'vplay_color'				=> '#fff',
			'btn_bg_color'				=> '#00a978',
			'btn_color'					=> '#fff',
			'btn:hover_bg_color' 		=> '#02bd8c',
			'btn:hover_color'			=> '#fff',
			'btn:hover_border_color' 	=> 'transparent'
		] );

		$this->init_content( [
			'video'	=> [
				'link'	=> '#video',
				'image'	=> ['src' => 'https://via.placeholder.com/571x351/096/f1f1f1?text=video', 'alt' => 'Image Alt']
			],
			'items' => [
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/63x63/096/fff?text=Image1', 'alt' => 'Image'],
					'title'		=> 'Heading 1',
					'content'	=> 'Content 1'
				],
				[
					'image' 	=> ['src' => 'https://via.placeholder.com/63x63/096/fff?text=Image2', 'alt' => 'Image'],
					'title'		=> 'Heading 2',
					'content'	=> 'Content 2'
				]
			],
			'button_1' => [
				'link'	=> '#1',
				'text'	=> 'CTA Button 1'
			],
			'button_2' => [
				'link'	=> '#2',
				'text'	=> 'CTA Button 2'
			]
		] );

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
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .mml-box {
				margin-top: 40px;
				display: flex;
				justify-content: space-between;
				align-items: flex-start;
				text-align: left;
			}
			.<?php $this->eid(); ?> .mml-text{
				flex: 1 1 0;
				margin-left: 20px;
			}
			.<?php $this->eid(); ?> .slicker{
				position: relative;
				width: 50%;
				max-width: 571px;
			}
			.<?php $this->eid(); ?> .vp-a {
				<?php $this->css_attr_color('vplay_color'); ?>
			}
			.<?php $this->eid(); ?> .list > li {
				box-sizing: border-box;
				margin-bottom: 30px;
				display: flex;
				align-items: flex-start;
			}
			.<?php $this->eid(); ?> h4 {
				<?php $this->css_attr_color('title_color'); ?>
			}
			.<?php $this->eid(); ?> .btn {
				<?php $this->css_attr('background','btn_bg_color'); ?>
				<?php $this->css_attr_color('btn_color'); ?>
			}
			.<?php $this->eid(); ?> .btn-reverse {
				<?php $this->css_attr('background','btn_color'); ?>
				<?php $this->css_attr_color('btn_bg_color'); ?>
				<?php $this->css_attr('border-color','btn_bg_color'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover {
				<?php $this->css_attr('background','btn:hover_bg_color'); ?>
				<?php $this->css_attr_color('btn:hover_color'); ?>
				<?php $this->css_attr('border-color','btn:hover_border_color'); ?>
			}
			@media (max-width: 840px) {
				.<?php $this->eid(); ?> .mml-box {
					display: block;
				}
				.<?php $this->eid(); ?> .slicker {
					width: 100%;
					margin: 0 auto 30px;
				}
				.<?php $this->eid(); ?> .mml-box > .mml-text {
					margin-left: 0;
				}
				.<?php $this->eid(); ?> .btns {
					justify-content: center;
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
				<div class="container">

					<?php if( $this->has_content( 'title' ) ) { ?>
						<h2><?php $this->eco( 'title' ); ?></h2>
					<?php } ?>
					<?php if( $this->has_content( 'desc' ) ) { ?>
						<p><?php $this->eco( 'desc' ); ?></p>
					<?php } ?>

					<div class="mml-box">
						<ul class="slicker">
							<li class="slick-item">
								<img src="https://via.placeholder.com/571x351/096/f1f1f1?text=video" alt="">
								<a href="video-src" class="vp-a"><i class="far fa-play-circle"></i></a>
							</li>
							<li class="slick-item">
								<img src="https://via.placeholder.com/571x351/096/f1f1f1?text=video" alt="">
							</li>
						</ul>
						<div class="mml-text">

							<?php if( !empty( $this->content['items'] ) ) { ?>
								<ul class="list">

									<?php foreach( $this->content['items'] as $item ) { ?>
										<li>
											<div class="mml-image"><?php $this->display_tag_img( $item['image']['src'], $item['image']['alt'] ); ?></div>
											<div class="mml-text">
												<h4><?php echo __( $item['title'] ); ?></h4>
												<p><?php echo __( $item['content'] ); ?></p>
											</div>
										</li>
									<?php } ?>

								</ul>
							<?php } ?>

							<?php if( !empty( $this->content['button_1']['text'] ) || !empty( $this->content['button_2']['text'] ) ) { ?>
								<div class="btns">
									<?php if( !empty( $this->content['button_1']['text'] ) ) { ?>
										<a href="<?php echo esc_attr( $this->content['button_1']['link'] ); ?>" class="btn"><?php echo __( $this->content['button_1']['text'] ); ?></a>
									<?php } ?>

									<?php if( !empty( $this->content['button_2']['text'] ) ) { ?>
										<a href="<?php echo esc_attr( $this->content['button_2']['link'] ); ?>" class="btn btn-reverse"><?php echo __( $this->content['button_2']['text'] ); ?></a>
									<?php } ?>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		<?php
	}
}
