<?php
/**
 * 给开发用的代码
 *
 * 为简化代码，方法以 mtf_ 开头。(MML Theme Function)
 * 如有命名冲突，可修改名称。
 * 注意：主题内不要使用这些方法，保持这里的方法的灵活性（开发人员可随意修改）。
 * @author MML Step
 */

/**
 * 判断客户端浏览器是否手机端
 *
 * @return Boolean 返回 true 或者 false
 */
function mtf_is_mobile() {
	return mml_theme_fn_is_mobile();
}

/**
 * Get MML Theme option
 *
 * @param String $form 选项分类，值为 contact, seo, faq, options 其中之一
 * @param String $key 键名
 * @return String 返回值或者空字符串（未设置的情况下）
 */
function mtf_get_option ($name, $key) {
	$opt = get_option('mml-theme-opt-' . $name);
	if ($opt && isset($opt[$key])) {
		return $opt[$key];
	}
	return '';
}

function mtf_get_logo () {
	$logo = mtf_get_option('options', 'logo');
	if (!$logo) {
		$logo = '/wp-content/themes/mml-theme/include/img/default-logo.png';
	}
	return $logo;
}

function mtf_get_mobile1 () {
	return mtf_get_option('contact', 'mobile1');
}

function mtf_get_mobile2 () {
	return mtf_get_option('contact', 'mobile2');
}

function mtf_get_telephone1 () {
	return mtf_get_option('contact', 'tel1');
}

function mtf_get_telephone2 () {
	return mtf_get_option('contact', 'tel2');
}

function mtf_get_email1 () {
	return mtf_get_option('contact', 'email1');
}

function mtf_get_email2 () {
	return mtf_get_option('contact', 'email2');
}

function mtf_get_fax1 () {
	return mtf_get_option('contact', 'fax1');
}

function mtf_get_fax2 () {
	return mtf_get_option('contact', 'fax2');
}

function mtf_get_address () {
	return mtf_get_option('contact', 'address');
}

function mtf_get_copyright () {
	return mtf_get_option('contact', 'copyright');
}

function mtf_get_facebook () {
	return mtf_get_option('contact', 'facebook');
}

function mtf_get_twitter () {
	return mtf_get_option('contact', 'twitter');
}

function mtf_get_linkedin () {
	return mtf_get_option('contact', 'linkedin');
}

function mtf_get_youtube () {
	return mtf_get_option('contact', 'youtube');
}

function mtf_get_whatsapp () {
	return mtf_get_option('contact', 'whatsapp');
}

function mtf_get_instagram () {
    return mtf_get_option('contact', 'instagram');
}

function mtf_get_pinterest() {
    return mtf_get_option('contact', 'pinterest');
}

function mtf_get_google_map_key () {
	return mtf_get_option('options', 'google_map_key');
}

function mtf_get_page_layout () {
	return mtf_get_option('options', 'page_layout');
}

function mtf_get_blog_layout () {
	$layout = mtf_get_option('blog', 'layout');
	if (!$layout) {
		$layout = 0;
	}
	return $layout;
}

function mtf_get_blog_column () {
	$col = mtf_get_option('blog', 'column');
	if (!$col) {
		$col = 3;
	}
	return $col;
}

function mtf_get_blog_page_size () {
	$page_size = mtf_get_option('blog', 'page_size');
	if (!$page_size) {
		$page_size = 9;
	}
	return $page_size;
}

/**
 * 输出菜单
 * 只要有自定义内容，就作为下一级菜单的内容输出。（不管是否有下一级菜单）
 * 只要有自定义内容，定义好的下一级菜单不再输出。
 *
 * @param String $menu_location 必填。菜单位置
 * @param String $class 可选。CSS 类。可用空格分隔。
 * @return None 无返回值。直接输出。
 */
function mtf_menu ($menu_location, $class = '') {
	if (!$menu_location || !is_string($menu_location)) {
		return;
	}
	if (has_nav_menu($menu_location)) {
		mml_theme_fn_nav_menu($menu_location, [ 'class' => $class ]);
	}
}

/**
 * 获取 Portfolio Category 的模板
 */
function mtf_get_portfolio_category_template ($term_id) {
	$opt = get_option('mml-theme-opt-options');
	$enabled = isset($opt['portfolio_category_template']) ? $opt['portfolio_category_template'] : '';
	if ($enabled === 'y') {
		return get_term_meta($term_id, 'term-template', true);
	}
	return '';
}
