<?php

class MML_Section_Helper {
	function __construct () {
		$this->ajax_init();
		$this->editor_init();
	}

	// ================================ AJAX ================================

	public function ajax_init () {
		add_action('wp_ajax_mml_section_list', [ $this, 'ajax_get_section_list' ]);
		add_action('wp_ajax_mml_section_get_code', [ $this, 'ajax_get_section_code' ]);
	}

	public function ajax_get_section_list () {
		$dir = MML_Section_Base::get_dir();
		$names = scandir($dir);
		$result = [];
		foreach ($names as $key => $name) {
			$file = $dir . $name . '/' . $name . '.php';
			if (file_exists($file)) {
				require_once($file);
				$instance = new $name();
				$result[] = [
					"name" => $name,
					"style" => $instance->get_style_args(),
					"content" => $name::get_content_args(),
				];
			}
		}
		wp_send_json_success($result);
	}

	public function ajax_get_section_code () {
		if (!isset($_POST['name'])) {
			wp_send_json_error('name is required');
			return;
		}
		if (!isset($_POST['id'])) {
			wp_send_json_error('id is required');
			return;
		}
		if (!isset($_POST['style'])) {
			wp_send_json_error('style is required');
			return;
		}
		if (!isset($_POST['content'])) {
			wp_send_json_error('content is required');
			return;
		}
		$name = $_POST['name'];
		$id = $_POST['id'];
		$style = stripslashes($_POST['style']);
		$content = stripslashes($_POST['content']);
		$file = MML_Section_Base::get_dir() . $name . '/' . $name . '.php';
		if (file_exists($file)) {
			require_once($file);
		} else {
			wp_send_json_error($name . ' does not exist');
			return;
		}
		$instance = new $name($id, (array)json_decode($style), (array)json_decode($content));

		$result = [];

		ob_start();
		$instance->style();
		$result['style'] = ob_get_contents();
		ob_end_clean();

		ob_start();
		$instance->html();
		$result['html'] = ob_get_contents();
		ob_end_clean();

		ob_start();
		$instance->script();
		$result['script'] = ob_get_contents();
		ob_end_clean();

		wp_send_json_success($result);
	}

	// ================================ AJAX END ================================

	// ================================ Editor ================================

	public function editor_init () {
		add_action( 'admin_menu', [ $this, 'editor_add_menu' ] );
	}

	public function editor_add_menu () {
		$parent_slug = 'mml-theme-setting';
		$capability = 'edit_theme_options';
		add_submenu_page(
			$parent_slug,
			'Section Editor - MML Theme', // Page title
			'Section Editor', // menu_title,
			$capability, // capability,
			'section-editor', // slug
			[ $this, 'editor_page' ] // function
		);
	}

	public static function editor_page ($a) {
		$dir = MML_Section_Base::get_dir();
		$p1_names = scandir($dir);
		$p1_names2 = [];
		foreach ($p1_names as $index => $name) {
			if (strpos($name, '.') === 0) {
				continue;
			}
			$file = $dir . $name . '/' . $name . '.php';
			if (!file_exists($file)) {
				continue;
			}
			require_once($file);
			$p1_names2[] = str_replace('.php', '', $name);
		}
		$p1_selected = '';
		$p2_show = false;
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'Select Section') {
			$p1_selected = $_POST['section_name'];
			$p2_show = true;
		} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'Preview') {
			$p1_selected = $_POST['section_name'];
			$p2_show = true;
		}

		$p3_show = false;
		if ($p2_show) {
			$p2_instance = new $p1_selected($p1_selected, [], []);
			$p2_style_fields = $p2_instance->get_style_args();
			$p2_content_fields = $p2_instance->get_content_args();
			if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'Preview') {
				$p3_show = true;
				$p3_instance = new $p1_selected($_POST['id'], $_POST['style'], $_POST['content']);
			}
		}
		?>
			<div class="wrap">
				<style>
					.mml-table {}
					.mml-table .mml-tr {
					}
					.mml-table .mml-td {
						color: #fff;
						background-color: #aaa;
						border-bottom: 1px solid #ddd;
					}
				</style>
				<form action="" method="post">
					<select name="section_name" id="" class="a">
						<?php foreach ($p1_names2 as $index => $name) { ?>
							<option value="<?php echo $name; ?>" class="a" <?php echo $p1_selected === $name ? 'selected' : ''; ?>><?php echo $name; ?></option>
						<?php } ?>
					</select>
					<input type="submit" class="button button-primary" name="form_name" value="Select Section" />
				</form>
				<hr />
				<?php if ($p2_show) { ?>
					<form action="" method="post">
						<table class="wp-list-table widefat fixed mml-table">
							<tr class="mml-tr">
								<th class="mml-td">ID</th>
								<td colspan="3" class="mml-td">
									<input type="text" name="id" value="<?php echo $p3_show ? $_POST['id']: strtolower($p1_selected); ?>" />
								</td>
							</tr>
							<tr class="mml-tr">
								<th class="mml-td">样式</th>
								<th class="mml-td">Key</th>
								<th class="mml-td">Value</th>
								<th class="mml-td">Description</th>
							</tr>
							<?php foreach ($p2_style_fields as $index => $field) { ?>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $field['key']; ?></td>
									<td>
										<?php if ($field['type'] === 'text') { ?>
											<input type="text" name="style[<?php echo $field['key']; ?>]" value="<?php echo $this->get_field_value($field, 'style', $field['key']); ?>">
										<?php } else { ?>
										<?php } ?>
									</td>
									<td><?php echo $field['desc']; ?></td>
								</tr>
							<?php } ?>
							<tr class="mml-tr">
								<th class="mml-td">内容</th>
								<th class="mml-td">Key</th>
								<th class="mml-td">Value</th>
								<th class="mml-td">Description</th>
							</tr>
							<?php foreach ($p2_content_fields as $index => $field) { ?>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $field['key']; ?></td>
									<td>
										<?php if ($field['type'] === 'text') { ?>
											<input type="text" name="content[<?php echo $field['key']; ?>]" value="<?php echo $this->get_field_value($field, 'content', $field['key']); ?>">
										<?php } else if ($field['type'] === 'array') { ?>
											<?php foreach ($field['items'] as $key => $value) {
												echo $value['key'];
												echo '&nbsp;:&nbsp;';
												echo $value['default_value'];
												echo '<br />';
											} ?>
										<?php } else { ?>
										<?php } ?>
									</td>
									<td><?php echo $field['desc']; ?></td>
								</tr>
							<?php } ?>
						</table>
						<div>
							<div>&nbsp;</div>
							<input type="hidden" name="section_name" value="<?php echo $p1_selected; ?>">
							<input type="submit" class="button button-primary" name="form_name" value="Preview" />
						</div>
					</form>
				<?php } ?>
				<hr />
				<?php if ($p3_show) { ?>
					<div>
						<style>
							<?php $p3_instance->style(); ?>
						</style>
						<?php $p3_instance->html(); ?>
						<script>
							<?php $p3_instance->script(); ?>
						</script>
					</div>
					<hr />

					<?php
						echo '<pre>';
						echo "&lt;?php mtf_section('$p1_selected', '" . $_POST['id'] . "', [\n";
						foreach ($_POST['style'] as $key => $value) {
							$comment = '';
							if ($key === 'background_attachment') {
								$comment = '如果需要视差效果，请赋值 fixed';
							} else if ($key === 'columns') {
								$comment = '列数';
							}
							echo "\t'$key' => '$value',";
							if (!empty($comment)) {
								echo " // $comment";
							}
							echo "\n";
						}
						echo "], [\n";

						foreach ($_POST['content'] as $key => $value) {
							echo "\t'$key' => '$value',";
							echo "\n";
						}
						echo "]); ?&gt;";
						echo "</pre>";
					?>
					<hr />
				<?php } ?>
				<div>
					<?php var_dump($_POST); ?>
				</div>
			</div>
		<?php
	}

	private function get_post_data ($key, $sub_key) {
		$result = '';
		if (!$_POST) {
			return $result;
		}
		if (!isset($_POST[$key])) {
			return $result;
		}
		if (!isset($_POST[$key][$sub_key])) {
			return $result;
		}
		return $_POST[$key][$sub_key];
	}

	private function get_field_value ($field, $key1, $key2) {
		$value = $this->get_post_data($key1, $key2);
		if (!$value && isset($field['default_value'])) {
			$value = $field['default_value'];
		}
		if (!$value || !is_string($value)) {
			$value = '';
		}
		return $value;
	}

	// ================================ Editor END ================================
}

$mml_section_helper = new MML_Section_Helper();
