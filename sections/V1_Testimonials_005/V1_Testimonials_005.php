<?php

/*
<?php mtf_section('V1_Testimonials_005', 'testimonial_005', [
    'class'				=> '',
    'bg_color' 			=> '',
    'bg_image' 			=> '',
    'margin_top' 		=> '',
    'padding_top' 		=> '',
    'padding_bottom' 	=> '',
    'margin_bottom' 	=> '',
    'custom_css' 		=> '',
    'desc_color'		=> '#808080',
    'h2_color'          => '#000',
    'h4_color'          => '#212121',
    'arrow_color'       => ['_' => '#5d6777', '_:hover' => '#212121']
], [
    'items' => [
        [
            'title' => "Our Client's Testimonials",
            'desc'  => '<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>',
            'meta'  => 'Keith Cadwallader, Contracts Manager'
        ],
        [
            'title' => "Our Client's Testimonials",
            'desc'  => '<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>',
            'meta'  => 'Keith Cadwallader, Contracts Manager'
        ]
    ]
]); ?>
*/

class V1_Testimonials_005  extends MML_Section_Base {
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
            'h2_color'          => '#000',
            'h4_color'          => '#212121',
            'arrow_color'       => ['_' => '#5d6777', '_:hover' => '#212121']
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
			.<?php $this->eid(); ?> .slicker {
				padding: 30px 80px 30px 0;
				margin-right: 120px;
				border-right: 1px solid #dcdcdc;
			}
			.<?php $this->eid(); ?> h2{
                color: <?php $this->est('h2_color'); ?>;
			}
			.<?php $this->eid(); ?> h4 {
                color: <?php $this->est('h4_color'); ?>;
			}
			.<?php $this->eid(); ?> .slick-arrow{
                color: <?php $this->est('arrow_color._'); ?>;
			}
			.<?php $this->eid(); ?> .slick-arrow:hover{
                color: <?php $this->est('arrow_color._:hover'); ?>;
			}
			.<?php $this->eid(); ?> .arrow-prev {
				left: auto;
				right: -80px;
			}
			.<?php $this->eid(); ?> .arrow-next {
				right: -120px;
			}
			@media (max-width: 860px) {
				.<?php $this->eid(); ?> .slicker {
					margin-right: 60px;
					padding: 20px 20px 20px 0;
				}
				.<?php $this->eid(); ?> .arrow-prev{
					right: -30px;
				}
				.<?php $this->eid(); ?> .arrow-next {
					right: -60px;
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
			prevArrow: "<a class='slicker-arrow arrow-prev'><i class='fas fa-chevron-left'></i></a>",
			nextArrow: "<a class='slicker-arrow arrow-next'><i class='fas fa-chevron-right'></i></a>"
		});
	});
})(jQuery);
		<?php
	}

	public function html () {
		?>
			<div class="<?php $this->echo_default_classes(); ?>">
				<div class="container">
					<ul class="slicker">

                        <?php if ($this->has_content('items')) { ?>
                            <?php foreach ($this->gco('items') as $item) { ?>
                                <li>
                                    <?php if (!empty($item['title'])) { ?>
                                        <h2><?php _e($item['title']); ?></h2>
                                    <?php } ?>
                                    <?php if (!empty($item['desc'])) { ?>
                                        <?php _e($item['desc']); ?>
                                    <?php } ?>
                                    <?php if (!empty($item['meta'])) { ?>
                                        <h4><?php _e($item['meta']); ?></h4>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
						
					</ul>
				</div>
			</div>
		<?php
	}
}
