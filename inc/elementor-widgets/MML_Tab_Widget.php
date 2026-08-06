<?php

namespace MML\Elementor;

use \Elementor\Repeater;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Icons_Manager;
// use \Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class MML_Tab_Widget extends Widget_Base {

	public function get_name() { return 'mml-ele-tab-title'; }

	public function get_title() { return 'MML Tab Title'; }

	public function get_icon() { return 'ppicon-tabs'; }

	public function get_categories() { return [ 'basic' ]; }

	protected function _register_controls() {
		$this->mml_register_controls_content();
		$this->mml_register_controls_style();
	}

	protected function mml_register_controls_content() {

		$this->start_controls_section(
			'section_content_tab_title',
			[
				'label' => '标签标题',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => '标题',
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Tab Title',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => '图标',
				'type' => \Elementor\Controls_Manager::ICONS,
				// 'default' => [
				// 	'value' => 'fas fa-star',
				// 	'library' => 'solid',
				// ],
			]
		);

		$this->add_control(
			'title_list',
			[
				'label' => '',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => 'Title 1',
					],
					[
						'title' => 'Title 2',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function mml_register_controls_style() {
		$this->mml_register_controls_style_container();
		$this->mml_register_controls_style_tab_title();
		// $this->mml_register_controls_style_icon();
	}

	protected function mml_register_controls_style_container() {
		$this->start_controls_section(
			'section_style_container',
			[
				'label' => '容器',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'style_container_direction',
			[
				'label' => '标签排列方式',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'horizon',
				'options' => [
					'horizon'  => '水平排列',
					'vertical' => '竖直排列',
				],
				// 'prefix_class' => 'a%s-',
			]
		);

		$this->add_control(
			'style_container_align',
			[
				'label' => '对齐方式',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'flex-start'  => '左对齐',
					'center' => '居中对齐',
					'flex-end' => '右对齐',
					'space-between' => '分散对齐',
					// 'space-around' => '分散对齐',
				],
			]
		);

		$this->add_control(
			'style_container_padding',
			[
				'label' => '内边距',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mml-ele-tab-title-ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control( 'hr_style_container_background', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'style_container_background',
				'label' => '背景',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-ul',
			]
		);

		$this->add_control( 'hr_style_container_border', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'style_container_border',
				'label' => '边框',
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-ul',
			]
		);

		$this->end_controls_section();
	}

	protected function mml_register_controls_style_tab_title() {
		$this->start_controls_section(
			'section_style_tab',
			[
				'label' => '标签',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style_normal_typography',
				'label' => '字体',
				// 'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-li',
			]
		);

		$this->add_control(
			'style_normal_margin',
			[
				'label' => '外边距',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mml-ele-tab-title-li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'style_normal_padding',
			[
				'label' => '内边距',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mml-ele-tab-title-li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'style_normal_border_radius',
			[
				'label' => '圆角',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mml-ele-tab-title-li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_tab_normal',
			[
				'label' => '常规标签',
			]
		);

		$this->mml_register_controls_style_tab_normal();

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_tab_hover',
			[
				'label' => '鼠标移过',
			]
		);

		$this->mml_register_controls_style_tab_hover();

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_tab_active',
			[
				'label' => '激活的标签',
			]
		);

		$this->mml_register_controls_style_tab_active();

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'hr_style_tab_icon_size',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'style_tab_icon_size',
			[
				'label' => '图标大小',
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
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-wrap' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'style_tab_icon_spacing',
			[
				'label' => '图标距离',
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
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-wrap' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function mml_register_controls_style_tab_normal() {
		$this->add_control(
			'style_normal_color',
			[
				'label' => '文字颜色',
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'scheme' => [
				// 	'type' => \Elementor\Scheme_Color::get_type(),
				// 	'value' => \Elementor\Scheme_Color::COLOR_1,
				// ],
				'selectors' => [
					'{{WRAPPER}} .mml-ele-tab-title-li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'style_normal_background',
				'label' => '背景',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-li',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'style_normal_border',
				'label' => '边框',
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-li',
			]
		);
	}

	protected function mml_register_controls_style_tab_hover() {
		$this->add_control(
			'style_hover_color',
			[
				'label' => '文字颜色',
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'scheme' => [
				// 	'type' => \Elementor\Scheme_Color::get_type(),
				// 	'value' => \Elementor\Scheme_Color::COLOR_1,
				// ],
				'selectors' => [
					'{{WRAPPER}} .mml-ele-tab-title-li:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'style_hover_background',
				'label' => '背景',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-li:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'style_hover_border',
				'label' => '边框',
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-li:hover',
			]
		);
	}

	protected function mml_register_controls_style_tab_active() {
		$this->add_control(
			'style_active_color',
			[
				'label' => '文字颜色',
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'scheme' => [
				// 	'type' => \Elementor\Scheme_Color::get_type(),
				// 	'value' => \Elementor\Scheme_Color::COLOR_1,
				// ],
				'selectors' => [
					'{{WRAPPER}} .mml-ele-tab-title-li.active' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'style_active_background',
				'label' => '背景',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-li.active',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'style_active_border',
				'label' => '边框',
				'selector' => '{{WRAPPER}} .mml-ele-tab-title-li.active',
			]
		);
	}

	protected function render () {
		$settings = $this->get_settings_for_display();
		$id = $this->get_data('id'); // elementor-element-63c976b 与 custom class name 同级

		$ul_class = 'mml-ele-tab-title-ul mml-ele-tab-title-ul-' . $id;
		if ($settings['style_container_direction'] === 'horizon') {
			$ul_class .= ' horizon';
			echo '<style>';
			echo '.elementor-element-' . $id . ' .mml-ele-tab-title-ul { justify-content: ' . $settings['style_container_align'] . ' }';
			echo '</style>';
		}
		?><div style="display: none;" data-id="abcdef"><?php var_dump($settings); ?></div><ul class="<?php echo $ul_class; ?>">
			<?php foreach($settings['title_list'] as $k => $v) { ?>
				<li class="mml-ele-tab-title-li mml-ele-tab-title-li-<?php echo $k; ?> mml-ele-tab-title-li-<?php echo $v['_id']; ?> <?php echo $k === 0 ? 'active' : ''; ?>" data-index="<?php echo $k; ?>">
					<span class="icon-wrap"><?php \Elementor\Icons_Manager::render_icon( $v['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
					<span class="title-wrap"><?php echo $v['title']; ?></span>
				</li>
			<?php } ?>
		</ul><?php
	}

}
