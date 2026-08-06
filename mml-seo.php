<?php
/**
 * 用于开发 SEO 需求的辅助功能
 * 目前仅用于 Portfolio 以及 Portfolio Category ，如果需要用于其他地方，请联系 Step
 *
 * 约定：
 *     仅读取 "templates" 目录下的文件（可在第 56 行中修改）
 *     仅显示 "seo-" 开头的 PHP 文件（可在第 57 行中修改）
 *
 * 在 functions.php 中，复制粘贴以下代码到最底部
 *     include_once('mml-seo.php');
 *
 * 在页面上需要使用的地方，复制粘贴以下代码
 *     <?php $mml_theme_seo_global->show(); ?>
 *
 * 如果需要 Page 也使用此功能，
 *   把第 55 行的
 *     $this->post_types = [ 'portfolio' ];
 *   修改成
 *     $this->post_types = [ 'portfolio', 'page' ];
 */

if ( ! defined ( 'ABSPATH' ) ) {
	// header('HTTP/1.1 403 Forbidden');
	// exit('Forbidden');
	header('HTTP/1.1 404 Not Found');
	exit('Not Found');
}

function mml_theme_seo_fn_init () {
	global $mml_theme_seo_global;
	$mml_theme_seo_global = new MML_Theme_SEO();
}
add_action('init', 'mml_theme_seo_fn_init');

class MML_Theme_SEO {

	// 哪些 post_type 可以使用这个功能
	private $post_types;

	// 文件夹名，默认是 templates
	private $dir;

	// 文件名前缀，默认是 seo-
	private $pre;

	// 哪些 taxonomy 可以使用此功能
	private $taxonomies;

	private $field_name;

	// ================================ 初始化 ================================

	function __construct () {
		$this->post_types = [ 'portfolio' ];
		$this->dir = 'templates';
		$this->pre = 'seo-';
		$this->taxonomies = [ 'portfolio-types' ];
		$this->field_name = 'mml_theme_seo_field_file';
		add_action('add_meta_boxes', [$this, 'post_add_meta_box'], 10, 2);
		add_action('save_post', [$this, 'post_save_field'], 10, 2);

		foreach ($this->taxonomies as $index => $taxonomy) {
			add_action($taxonomy . '_add_form_fields', [ $this, 'term_display_field' ]);
			add_action($taxonomy . '_edit_form', [ $this, 'term_display_field' ]);
			add_action('edited_' . $taxonomy, [ $this, 'term_save_field' ]);
			add_action('created_' . $taxonomy, [ $this, 'term_save_field' ]);
		}
	}

	// ================================ post ================================

	function post_show_meta_box ($post) {
		$selected_file = get_post_meta($post->ID, $this->field_name, true);
		$this->show_select($selected_file);
	}

	function post_add_meta_box ($post_type, $post) {
		if (in_array($post_type, $this->post_types)) {
			add_meta_box('mml_theme_seo_meta_box', 'MML SEO File', [$this, 'post_show_meta_box']);
		}
	}

	// 保存数据
	function post_save_field($post_id)
	{
		if (array_key_exists($this->field_name, $_POST)) {
			update_post_meta(
				$post_id,
				$this->field_name,
				$_POST[$this->field_name]
			);
		}
	}

	// ================================ term ================================

	function term_display_field ($term) {
		if ($term) {
			$selected_file = get_term_meta($term->term_id, $this->field_name, true);
		} else {
			$selected_file = '';
		}
		echo '<div class="form-field">';
		echo '	<label for="' . $this->field_name . '">MML SEO File</label>';
		$this->show_select($selected_file);
		echo '</div>';
	}

	function term_save_field ($term_id) {
		$selected_file = isset($_POST[$this->field_name]) ? $_POST[$this->field_name] : '';
		update_term_meta($term_id, $this->field_name, $selected_file);
	}

	// ================================ common functions ================================

	private function get_files () {
		$names = scandir(TEMPLATEPATH . '/' . $this->dir);
		$result = [];
		foreach ($names as $index => $name) {
			if (strpos($name, $this->pre) === 0 && substr($name, strlen($name) - 4) === '.php') {
				$result[] = $name;
			}
		}
		return $result;
	}

	function show_select ($selected_file) {
		$files = $this->get_files();
		echo '<select name="' . $this->field_name . '">';
		echo '<option value="">( None )</option>';
		foreach ($files as $index => $file) {
			$selected = $selected_file === $file ? ' selected' : '';
			echo "<option value=\"$file\" $selected>$file</option>";
		}
		echo '</select><p>非开发人员请勿使用此功能</p>';
	}

	public function show () {
		$the_object = get_queried_object();
		$selected_file = false;
		if ($the_object instanceof WP_Post) {
			if (in_array($the_object->post_type, $this->post_types)) {
				$selected_file = get_post_meta($the_object->ID, $this->field_name, true);
			}
		} else if ($the_object instanceof WP_Term) {
			if (in_array($the_object->taxonomy, $this->taxonomies)) {
				$selected_file = get_term_meta($the_object->term_id, $this->field_name, true);
			}
		} else {
			//
		}
		if ($selected_file) {
			$full_path = TEMPLATEPATH . '/' . $this->dir . '/' . $selected_file;
			if (file_exists($full_path)) {
				// include($full_path);
				$file = substr($selected_file, 0, strlen($selected_file) - 4);
				get_template_part($this->dir . '/' . $file);
			}
		}
	}

}
