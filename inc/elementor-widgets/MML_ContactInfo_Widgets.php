<?php

namespace MML\Elementor;

use \Elementor\Repeater;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

abstract class MML_ContactInfo_Widget_Base extends Widget_Base {

	abstract public function get_name();

	protected function mml_register_controls($config) {

		$this->start_controls_section(
			'section_content_icon',
			[
				'label' => 'Icon',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'base_icon',
			[
				'label' => 'Icon',
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

		$this->add_control(
			'space',
			[
				'label' => 'Space',
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wrap' => 'display: flex; align-items: center;',
					'{{WRAPPER}} .wrap .text' => 'flex: 1; padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Style - Text ======================================================

		$this->start_controls_section(
			'section_style_text',
			[
				'label' => 'Text',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_font_size',
			[
				'label' => 'Font Size',
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
					'{{WRAPPER}} .text' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => 'Text Color',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function mml_render ($key) {
		$value = mtf_get_option('contact', $key);
		if ( ! $value || empty( $value ) ) {
			return;
		}
		$settings = $this->get_settings_for_display();
		?>
			<div class="wrap">
				<div class="icon">
					<?php Icons_Manager::render_icon( $settings['base_icon'] ); ?>
				</div>
				<div class="text"><?php
					if ( $key === 'email1' || $key === 'email2' ) {
						$with_link = mtf_get_option('options', 'enable_email_link') === 'y';
						echo '<a';
						if ($with_link) {
							echo ' href="mailto:' . antispambot($value) . '"';
						}
						echo '>';
						echo antispambot($value);
						echo '</a>';
					} else {
						echo $value;
					}
				?></div>
			</div>
		<?php
	}

}

class MML_ContactInfo_Widget_Email1 extends MML_ContactInfo_Widget_Base {

	public static $slug = 'mml-contactinfo-widget-email-1';

	public function get_name() { return self::$slug; }

	public function get_title() { return 'MML Email 1'; }

	public function get_icon() { return 'far fa-envelope'; }

	public function get_categories() { return [ 'basic' ]; }

	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'far fa-envelope',
		]);
	}

	protected function render () {
		parent::mml_render('email1');
	}

}

class MML_ContactInfo_Widget_Email2 extends MML_ContactInfo_Widget_Base {

	public static $slug = 'mml-contactinfo-widget-email-2';

	public function get_name() { return self::$slug; }

	public function get_title() { return 'MML Email 2'; }

	public function get_icon() { return 'far fa-envelope'; }

	public function get_categories() { return [ 'basic' ]; }

	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'far fa-envelope',
		]);
	}

	protected function render () {
		parent::mml_render('email2');
	}

}

class MML_ContactInfo_Widget_Mobile1 extends MML_ContactInfo_Widget_Base {

	public static $slug = 'mml-contactinfo-widget-mobile-1';

	public function get_name() { return self::$slug; }

	public function get_title() { return 'MML Mobile 1'; }

	public function get_icon() { return 'fas fa-mobile-alt'; }

	public function get_categories() { return [ 'basic' ]; }

	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fas fa-mobile-alt',
		]);
	}

	protected function render () {
		parent::mml_render('mobile1');
	}

}

class MML_ContactInfo_Widget_Mobile2 extends MML_ContactInfo_Widget_Base {

	public static $slug = 'mml-contactinfo-widget-mobile-2';

	public function get_name() { return self::$slug; }

	public function get_title() { return 'MML Mobile 2'; }

	public function get_icon() { return 'fas fa-mobile-alt'; }

	public function get_categories() { return [ 'basic' ]; }

	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fas fa-mobile-alt',
		]);
	}

	protected function render () {
		parent::mml_render('mobile2');
	}

}

class MML_ContactInfo_Widget_Phone1 extends MML_ContactInfo_Widget_Base {
	public static $slug = 'mml-contactinfo-widget-phone-1';
	public function get_name() { return self::$slug; }
	public function get_title() { return 'MML Telephone 1'; }
	public function get_icon() { return 'fas fa-phone'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fas fa-phone',
		]);
	}
	protected function render () {
		parent::mml_render('tel1');
	}
}
class MML_ContactInfo_Widget_Phone2 extends MML_ContactInfo_Widget_Base {
	public static $slug = 'mml-contactinfo-widget-phone-2';
	public function get_name() { return self::$slug; }
	public function get_title() { return 'MML Telephone 2'; }
	public function get_icon() { return 'fas fa-phone'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fas fa-phone',
		]);
	}
	protected function render () {
		parent::mml_render('tel2');
	}
}

class MML_ContactInfo_Widget_Fax1 extends MML_ContactInfo_Widget_Base {
	public static $slug = 'mml-contactinfo-widget-fax-1';
	public function get_name() { return self::$slug; }
	public function get_title() { return 'MML Fax 1'; }
	public function get_icon() { return 'fas fa-fax'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fas fa-fax',
		]);
	}
	protected function render () {
		parent::mml_render('fax1');
	}
}
class MML_ContactInfo_Widget_Fax2 extends MML_ContactInfo_Widget_Base {
	public static $slug = 'mml-contactinfo-widget-fax-2';
	public function get_name() { return self::$slug; }
	public function get_title() { return 'MML Fax 2'; }
	public function get_icon() { return 'fas fa-fax'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fas fa-fax',
		]);
	}
	protected function render () {
		parent::mml_render('fax2');
	}
}

class MML_ContactInfo_Widget_Whatsapp extends MML_ContactInfo_Widget_Base {
	public static $slug = 'mml-contactinfo-widget-whatsapp';
	public function get_name() { return self::$slug; }
	public function get_title() { return 'MML Whatsapp'; }
	public function get_icon() { return 'fab fa-whatsapp'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fab fa-whatsapp',
		]);
	}
	protected function render () {
		parent::mml_render('whatsapp');
	}
}

class MML_ContactInfo_Widget_Address extends MML_ContactInfo_Widget_Base {
	public static $slug = 'mml-contactinfo-widget-address';
	public function get_name() { return self::$slug; }
	public function get_title() { return 'MML Address'; }
	public function get_icon() { return 'fas fa-map-marked-alt'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'fas fa-map-marked-alt',
		]);
	}
	protected function render () {
		parent::mml_render('address');
	}
}

class MML_ContactInfo_Widget_Copyright extends MML_ContactInfo_Widget_Base {
	public static $slug = 'mml-contactinfo-widget-copyright';
	public function get_name() { return self::$slug; }
	public function get_title() { return 'MML Copyright'; }
	public function get_icon() { return 'far fa-copyright'; }
	public function get_categories() { return [ 'basic' ]; }
	protected function _register_controls() {
		parent::mml_register_controls([
			'default_icon' => 'far fa-copyright',
		]);
	}
	protected function render () {
		parent::mml_render('copyright');
	}
}
