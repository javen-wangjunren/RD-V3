<?php

namespace MML\Elementor;

use \Elementor\Repeater;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

abstract class MML_Social_Widget_Base extends Widget_Base {

	abstract public function get_name();

	protected function mml_register_controls($config) {

		$this->start_controls_section(
			'section_content_icon',
			[
				'label' => 'Icon',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// $this->add_control(
		// 	'note',
		// 	[
		// 		'label' => 'Note',
		// 		'type' => \Elementor\Controls_Manager::RAW_HTML,
		// 		'raw' => '这是社媒链接。不是联系方式，也不是分享链接。',
		// 		'content_classes' => 'your-class',
		// 	]
		// );

		$this->add_control(
			'base_icon',
			[
				'label' => Icon,
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => isset( $config['default_icon'] )
						? $config['default_icon']
						: 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);

		$this->end_controls_section();

		// Style - Icon ========================================

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => 'Icon',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => 'Icon Size',
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 24,
				],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon svg' => 'width: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}} .fa, {{WRAPPER}} .fab, {{WRAPPER}} .fad, {{WRAPPER}} .fal, {{WRAPPER}} .far, {{WRAPPER}} .fas' => 'line-height: 1.6;',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => 'Icon Color',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function mml_render ($link) {
		if ( ! $link || empty( $link ) ) {
			return;
		}
		$settings = $this->get_settings_for_display();
		?>
			<a href="<?php echo esc_attr($link); ?>" target="_blank"><?php
				Icons_Manager::render_icon( $settings['base_icon'] );
			?></a>
		<?php
	}

}

class MML_ContactInfo_Widget_Facebook extends MML_Social_Widget_Base {
	public function get_name() { return 'mml-social-facebook'; }
	public function get_title() { return 'MML Facebook'; }
	public function get_icon() { return 'fab fa-facebook-square'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fab fa-facebook-square',
		]);
	}
	protected function render () {
		parent::mml_render(mtf_get_facebook());
	}
}
class MML_ContactInfo_Widget_Twitter extends MML_Social_Widget_Base {
	public function get_name() { return 'mml-social-twitter'; }
	public function get_title() { return 'MML Twitter'; }
	public function get_icon() { return 'fab fa-twitter-square'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fab fa-twitter-square',
		]);
	}
	protected function render () {
		parent::mml_render(mtf_get_twitter());
	}
}
