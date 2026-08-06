<?php

defined('ABSPATH') || die;

class MmlArchiveShortcode {
	public static function init () {
		$taxonomies = [
			'portfolio-types',
			'category',
		];

		foreach ($taxonomies as $i => $tax) {
			add_action($tax . '_add_form_fields', [ MmlArchiveShortcode::class, 'add_shortcode_field' ]);
			add_action($tax . '_edit_form', [ MmlArchiveShortcode::class, 'edit_shortcode_field' ]);
			add_action('edited_' . $tax, [ MmlArchiveShortcode::class, 'save_shortcode' ]);
			add_action('created_' . $tax, [ MmlArchiveShortcode::class, 'save_shortcode' ]);
		}
	}

	public static function add_shortcode_field () {
		echo '<div class="form-field term-shortcode-wrap">';
		echo '	<label for="term_shortcode">Shortcode</label>';
		echo '<input name="term_shortcode" id="term_shortcode" type="text" value="">';
		// echo '	<p>Choose a template for Portfolio Category</p>';
		echo '</div>';
	}

	public static function edit_shortcode_field ($term) {
		$value = get_term_meta($term->term_id, 'term_shortcode', true);
		echo '<table class="form-table">';
		echo '<tbody>';
		echo '	<tr class="form-field">';
		echo '		<th scope="row"><label for="term_shortcode">Shortcode</label></th>';
		echo '		<td>';
		echo '			<input name="term_shortcode" id="term_shortcode" type="text" value="' . esc_attr($value) . '">';
		// echo '			<p class="description">Choose a template for Portfolio Category</p>';
		echo '		</td>';
		echo '	</tr>';
		echo '</tbody>';
		echo '</table>';
	}

	public static function save_shortcode ($term_id) {
		$template = isset($_POST['term_shortcode']) ? $_POST['term_shortcode'] : '';
		update_term_meta($term_id, 'term_shortcode', $template);
	}
}

add_action('init', [ MmlArchiveShortcode::class, 'init' ]);
