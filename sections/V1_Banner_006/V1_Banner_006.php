<?php

/*
<?php mtf_section('V1_Banner_006', 'banner-006', [
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
	'btn_bg_color'				=> '#03a67b',
	'btn_reverse_bg_color'		=> 'transparent',
	'btn_color'					=> '#fff',
	'btn:hover_bg_color' 		=> '#18c89a',
	'btn:hover_color'			=> '#fff',
	'btn:hover_border_color' 	=> 'transparent'
], [
	'title' 	=> 'Title',
	'desc' 		=> 'description',
	'button_1' 	=> [
		'link'		=> '#1',
		'text'		=> 'Button 1'
	],
	'button_2' 	=> [
		'link'		=> '#2',
		'text'		=> 'Button 2'
	]
]); ?>
*/

class V1_Banner_006  extends MML_Section_Base {
	function __construct($id, $style, $content) {
		parent::__construct($id, $style, $content);
	}

	public function set_default_value () {
		// 未定义，空值

		// 默认参数处理
		$this->init_style([
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
			'btn_bg_color'				=> '#03a67b',
			'btn_reverse_bg_color'		=> 'transparent',
			'btn_color'					=> '#fff',
			'btn:hover_bg_color' 		=> '#18c89a',
			'btn:hover_color'			=> '#fff',
			'btn:hover_border_color' 	=> 'transparent'
		]);

		$this->init_content([
			'title' 	=> 'Title',
			'desc' 		=> 'description',
			'button_1' 	=> [
				'link'		=> '#1',
				'text'		=> 'Button 1'
			],
			'button_2' 	=> [
				'link'		=> '#2',
				'text'		=> 'Button 2'
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
				text-align: center;
			}
			.<?php $this->eid(); ?> h1 {
				<?php $this->css_attr('color','title_color'); ?>
			}
			.<?php $this->eid(); ?> p {
				margin: 10px auto;
				max-width: 770px;
			}
			.<?php $this->eid(); ?> .btns {
				justify-content: center;
			}
			.<?php $this->eid(); ?> .btn {
				<?php $this->css_attr('background','btn_bg_color'); ?>
				<?php $this->css_attr('color','btn_color'); ?>
			}
			.<?php $this->eid(); ?> .btn-reverse {
				<?php $this->css_attr('background','btn_reverse_bg_color'); ?>
				<?php $this->css_attr('color','btn_bg_color'); ?>
				<?php $this->css_attr('border-color','btn_bg_color'); ?>
			}
			.<?php $this->eid(); ?> .btn:hover {
				<?php $this->css_attr('background','btn:hover_bg_color'); ?>
				<?php $this->css_attr('color','btn:hover_color'); ?>
				<?php $this->css_attr('border-color','btn:hover_border_color'); ?>
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

					<?php if( $this->has_content( 'title' ) ) { ?>
						<h1><?php $this->eco( 'title' ); ?></h1>
					<?php } ?>
					<?php if( $this->has_content( 'desc' ) ) { ?>
						<p><?php $this->eco( 'desc' ); ?></p>
					<?php } ?>

					<?php if( $this->has_content('button_1.text') || $this->has_content('button_2.text') ) { ?>
						<div class="btns">
							
							<?php if( $this->has_content('button_1.text') ) { ?>
								<a href="<?php echo esc_attr( $this->gco('button_1.link') ); ?>" class="btn"><?php _e( $this->gco('button_1.text') ); ?></a>
							<?php } ?>

							<?php if( $this->has_content('button_2.text') ) { ?>
								<a href="<?php echo esc_attr( $this->gco('button_2.link') ); ?>" class="btn btn-reverse"><?php _e( $this->gco('button_2.text') ); ?></a>
							<?php } ?>

						</div>
					<?php } ?>

				</div>
			</div>
		<?php
	}
}
