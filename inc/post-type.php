<?php

function mml_theme_portfolio() {

	register_post_type( "portfolio", array(
		"label" => __( "Portfolio", "mml-theme" ),
		"labels" => array(
			"name" => __( "Portfolio", "mml-theme" ),
			"singular_name" => __( "Portfolio", "mml-theme" ),
			// 'add_new' => 'New Portfolio',
			'all_items' => 'All',
			'menu_name' => 'Portfolio'
		),
		'show_ui' => 1,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'public' => true,
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"capability_type" => "post",
		"rewrite" => array( "slug" => "product-item", "with_front" => true ),
		"query_var" => true,
		'menu_icon' => 'dashicons-products',
		"supports" => array( "title", "editor", "thumbnail", 'page-attributes', 'custom-fields', 'excerpt' ),
	) );

	register_taxonomy( "portfolio-types", array( "portfolio" ), array(
		"label" => __( "Portfolio Category", "mml-theme" ),
		"labels" => array(
			"name" => __( "Portfolio Category", "mml-theme" ),
			"singular_name" => __( "Portfolio Category", "mml-theme" ),
		),
		'hierarchical' => true,
		"show_in_rest" => true,
		'show_admin_column' => true,
		"rewrite" => array( 'slug' => 'product-category', 'with_front' => true, ),
	) );
}

function mml_theme_fn_enable_portfolio_category_template () {
	$opt = get_option('mml-theme-opt-options');
	$enabled = isset($opt['portfolio_category_template']) ? $opt['portfolio_category_template'] : '';
	if ($enabled === 'y') {
		add_action('portfolio-types_add_form_fields', 'mml_theme_fn_add_portfolio_category_template_field');
		add_action('portfolio-types_edit_form', 'mml_theme_fn_edit_portfolio_category_template_field');
		add_action('edited_portfolio-types', 'mml_theme_fn_edited_portfolio_category_template');
		add_action('created_portfolio-types', 'mml_theme_fn_created_portfolio_category_template');
	}
}

/**
 * 内部函数
 * 获取当前主题所有的 template 的列表。仅查找 templates 文件夹。
 */
function mml_theme_fn_get_templates () {
	// echo TEMPLATEPATH;
	// echo STYLESHEETPATH;
	$dir = 'templates';
	$names = scandir(TEMPLATEPATH . "/$dir");
	$result = [];
	foreach ($names as $index => $name) {
		if (strpos($name, '.') === 0 || strlen($name) < 4 || substr($name, strlen($name) - 4) !== '.php') { // 隐藏文件, 非 .php 文件
			continue;
		}
		$path = "$dir/$name";
		$content = file_get_contents(TEMPLATEPATH . "/$path");
		$lines = explode("\n", $content);
		foreach ($lines as $index => $line) {
			if (strpos($line, 'Template' . ' Name: ') >= -1) {
				$regexp = '/Template' . ' Name: (.*)$/';
				$matches = [];
				$matched = preg_match($regexp, $line, $matches);
				if ($matched) {
					$name = $matches[1];
					$result[] = [
						'path' => $path,
						'name' => $name
					];
					continue;
				}
			}
		}
	}
	return $result;
}

/**
 * 输出模板选择器
 *
 * @param Array $templates 必填。 模板数组。 每个元素都是 array ，属性有 path 和 name 。
 * @param Array $option    选填。 选项。
 *                  $class    CSS 类, 默认值 postform
 *                  $name     select 的 name 属性
 *                  $id       select 的 id 属性
 *                  $selected 选中的 option 的 value
 * @return 直接输出，没有返回值。
 */
function mml_theme_fn_display_template_select ($templates, $option = []) {
	$css_class = isset($option['class']) ? $option['class'] : 'postform';
	$name = isset($option['name']) ? $option['name'] : '';
	$id = isset($option['id']) ? $option['id'] : '';
	$selected = isset($option['selected']) ? $option['selected'] : '';
	echo '<select class="' . $css_class . '" name="' . $name . '" id="' . $id . '">';
	echo '	<option value="">( None )</option>';
	foreach ($templates as $index => $template) {
		echo '	<option value="' . $template['path'] . '"';
		if ($template['path'] === $selected) {
			echo ' selected';
		}
		echo '>' . $template['name'] . '</option>';
	}
	echo '</select>';
}

/**
 * 新增 Portfolio Category 时，增加 Template 字段
 */
function mml_theme_fn_add_portfolio_category_template_field () {
	$templates = mml_theme_fn_get_templates();
	echo '<div class="form-field term-template-wrap">';
	echo '	<label for="term_template">Template</label>';
	mml_theme_fn_display_template_select($templates, [
		'name' => 'term-template',
		'id' => 'term_template'
	]);
	echo '	<p>Choose a template for Portfolio Category</p>';
	echo '</div>';
}

/**
 * 编辑 Portfolio Category 时，编辑 Template 字段
 */
function mml_theme_fn_edit_portfolio_category_template_field ($term) {
	$selected = get_term_meta($term->term_id, 'term-template', true);
	$templates = mml_theme_fn_get_templates();
	echo '<table class="form-table">';
	echo '<tbody>';
	echo '	<tr class="form-field">';
	echo '		<th scope="row"><label for="term_template">Template</label></th>';
	echo '		<td>';
	mml_theme_fn_display_template_select($templates, [
		'selected' => $selected,
		'name' => 'term-template',
		'id' => 'term_template'
	]);
	echo '			<p class="description">Choose a template for Portfolio Category</p>';
	echo '		</td>';
	echo '	</tr>';
	echo '</tbody>';
	echo '</table>';
}

/**
 * 新增 Portfolio Category 时，保存 Template 字段
 */
function mml_theme_fn_created_portfolio_category_template ($term_id) {
	$template = isset($_POST['term-template']) ? $_POST['term-template'] : '';
	update_term_meta($term_id, 'term-template', $template);
}

/**
 * 编辑 Portfolio Category 时，保存 Template 字段
 */
function mml_theme_fn_edited_portfolio_category_template ($term_id) {
	$template = isset($_POST['term-template']) ? $_POST['term-template'] : '';
	update_term_meta($term_id, 'term-template', $template);
}

function mml_theme_fn_enable_page_attributes () {
    add_post_type_support( 'post', 'page-attributes' );
}
