<?php

namespace MML\Elementor;

use \Elementor\Repeater;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Icons_Manager;
use \Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class MML_Category_Widget extends Widget_Base {

	public function get_name() { return 'mml-category'; }

	public function get_title() { return 'MML Category'; }

	public function get_icon() { return 'far fa-list-alt'; }

	public function get_categories() { return [ 'basic' ]; }

	protected function _register_controls() {

		// ================================ Content ================================

		$this->start_controls_section(
			'session_content',
			[
				'label' => 'Content',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => '标题',
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Categories',
			]
		);

		$taxonomies = get_taxonomies([], 'objects');
		$tax_arr = [];
		if ( $taxonomies ) {
			foreach ( $taxonomies as $key => $taxonomy ) {
				$tax_arr[$key] = $taxonomy->label . '  (' . $key . ')';
			}
		}

		$this->add_control(
			'taxonomy',
			array(
				'label' => 'Taxonomy',
				'type' => Controls_Manager::SELECT,
				'options' => $tax_arr,
			)
		);

		$this->end_controls_section();

		// ================================ Style ================================

		// -------- 容器 --------

		$this->start_controls_section(
			'session_container',
			[
				'label' => '最外层容器',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wrap_background',
				'label' => '背景',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wrap',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wrap_border',
				'label' => '边框',
				'selector' => '{{WRAPPER}} .wrap',
			]
		);

		$this->add_control(
			'wrap_border_radius',
			[
				'label' => '圆角',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wrap_box_shadow',
				'label' => '阴影',
				'selector' => '{{WRAPPER}} .wrap',
			]
		);

		$this->end_controls_section();

		// -------- 标题 --------

		$this->start_controls_section(
			'session_title',
			[
				'label' => '标题',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_font',
				'label' => '字体',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => '颜色',
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => '文字阴影',
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_background',
				'label' => '背景',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => '边框',
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->add_control(
			'title_border_radius',
			[
				'label' => '圆角',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_box_shadow',
				'label' => '阴影',
				'selector' => '{{WRAPPER}} .title',
			]
		);

		$this->add_control(
			'title_margin',
			[
				'label' => '外边距',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_padding',
			[
				'label' => '内边距',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// --------- 分类 ---------

		$this->start_controls_section(
			'section_style_category',
			[
				'label' => '分类',
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'category_align',
			[
				'label' => '对齐方式',
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => '左对齐（各级分类缩进）',
					'center' => '居中对齐',
				],
			]
		);

		$this->add_control(
			'width',
			[
				'label' => '缩进',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} li' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => array(
					'category_align' => 'left',
				),
			]
		);

		$this->end_controls_section();

	}

	protected function render () {
		$settings = $this->get_settings_for_display();

		$obj = get_queried_object();

		// 当前版本，仅处理 page
		// if ( ! $obj instanceof WP_Post ) {
		// 	return;
		// }
		// if ( $obj->post_type !== 'page' ) {
		// 	return;
		// }
		// 不知道为什么 instanceof 判断一直出问题。
		if ( isset( $obj->post_type ) && $obj->post_type === 'page' ) {
			//
		} else {
			return;
		}

		if ( empty( $settings['taxonomy'] ) ) {
			return;
		}

		$terms = get_terms( array(
			'taxonomy' => $settings['taxonomy'],
			'hide_empty' => false,
			'parent' => 0,
		) );

		// is_wp_error 如果 taxonomy 是无效的
		// empty array if there is no terms
		if ( is_wp_error( $terms ) ) {
			return;
		}

		?><div class="wrap taxonomy-<?php echo esc_attr($settings['taxonomy']); ?>">
			<div class="title"><?php echo esc_html($settings['title']); ?></div>
			<?php if ( ! empty( $terms ) ) { ?>
				<div class="categories">
					<?php $this->render_sub_category($settings['taxonomy'], 0, 1); ?>
				</div>
			<?php } ?>
		</div><?php
	}

	private function render_sub_category ($taxonomy, $parent_id, $level) {
		$terms = get_terms( array(
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
			'parent' => $parent_id,
		) );
		if ( empty( $terms ) ) {
			return;
		}
		?><ul class="ul-level-<?php echo $level; ?>">
			<?php foreach ($terms as $index => $term) { ?>
				<li class="li-level-<?php echo $level; ?> li-term-id-<?php echo $term->term_id; ?>">
					<div class="category-name category-name-<?php echo $term->term_id; ?>">
						<?php echo esc_html( $term->name ); ?>
					</div>
					<?php $this->render_sub_category($taxonomy, $term->term_id, $level + 1); ?>
				</li>
			<?php } ?>
		</ul><?php
	}

}
