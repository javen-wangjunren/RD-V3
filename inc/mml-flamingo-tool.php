<?php

/**
 * Flamingo 辅助工具
 */

include_once('ip-info.php');

class MML_Flamingo_Tool {
	public static function setup() {
		add_action( 'admin_menu', [ self::class, 'add_admin_menu' ], 11, 0 );
		add_action( 'wp_ajax_mml_flamingo_generate_export_file', [ self::class, 'generate_export_file' ]);
	}

	public static function add_admin_menu() {
		// $parent_slug = 'mml-theme-setting';
		$parent_slug = 'flamingo';
		$capability = 'edit_theme_options';
		add_submenu_page(
			$parent_slug,
			'辅助工具 - Flamingo - MML Theme', // Page title
			'辅助工具', // menu_title,
			$capability, // capability,
			'mml-theme-flamingo-tool', // slug
			[ self::class, 'page'] // function
		);
	}

	public static function page() {
		?><div class="wrap">
			<h1>MML Flamingo 辅助工具</h1>
			<div>
				<a class="J_generate" href="javascript:void(0);">生成导出文件</a>
			</div>
			<div>请点击以下链接进行下载</div>
			<div class="J_file_list"></div>
			<div>&nbsp;</div>
			<div>版本号: v1.1.0 - 2021-10-20</div>
			<script>
				;(function ($) {
					var AJAX_URL = '<?php echo admin_url('admin-ajax.php'); ?>';
					var isLoading = false;
					$(document).ready(function () {
						$('.J_generate').click(function () {
							if (isLoading) {
								return;
							}
							isLoading = true;
							$.post(AJAX_URL, { action: 'mml_flamingo_generate_export_file' }).done(function (ret) {
								console.log(ret)
								if (ret.success) {
									var html = '<a href="'+ret.data.url+'" download="'+ret.data.name+'">'+ret.data.name+'</a>';
									console.log(html)
									// $(html).appendTo('.J_file_list');
									$('.J_file_list').html(html)
								} else {
									alert(ret.data)
								}
							}).fail(function (e) {
								alert(e.message)
							}).always(function () {
								isLoading = false;
							});
						});

					});
				})(jQuery);
			</script>
		</div><?php
	}

	public static function generate_export_file() {
		global $wpdb;
		$upload_dir = wp_upload_dir()['basedir']; // 结尾不是 /
		$export_dir = $upload_dir . '/mml-flamingo-export';
		$uri_prefix = wp_upload_dir()['baseurl'] . '/mml-flamingo-export';
		if ( ! is_writable( $upload_dir ) ) {
			wp_send_json_error('没有写入权限');
			return;
		}
		if ( file_exists( $export_dir ) && ! is_dir( $export_dir ) ) {
			wp_send_json_error('存在同名文件，无法创建文件夹 ' . $export_dir);
			return;
		}
		if ( ! is_dir( $export_dir ) && ! mkdir( $export_dir, 0755 ) ) {
			wp_send_json_error('创建文件夹失败 ' . $export_dir);
		}
		if ( ! is_writable( $export_dir ) ) {
			wp_send_json_error('没有写入权限');
			return;
		}
		// global $wp_filesystem;
		// if(!$wp_filesystem->is_dir($export_dir))
		// {
		// 	/* directory didn't exist, so let's create it */
		// 	$wp_filesystem->mkdir($export_dir);
		// }

		$fields = [];
		$values = [];
		$meta_keys = [];
		$meta_values = [];

		$inbounds = get_posts([
			'post_type' => 'flamingo_inbound',
			'post_status' => 'publish',
			// 'nopaging' => true,
			'posts_per_page' => -1,
		]);
		if (count($inbounds) > 0) {
			foreach ($inbounds as $key => $value) {
				$inbounds[$key]->metas = get_post_meta($value->ID);
				// var_dump($inbounds[$key]->metas);
				$fields      = self::collect_fields( $fields,                  $inbounds[$key] );
				$values      = self::collect_values( $values,                  $inbounds[$key] );
				$tmp         = self::collect_metas(  $meta_keys, $meta_values, $inbounds[$key] );
				$meta_keys   = $tmp[0];
				$meta_values = $tmp[1];
			}
		}

		$datetime = self::get_date_string('Ymd-His');
		$file_name = "$datetime.csv";
		$file_path = $export_dir . '/' . $file_name;
		$file_url = $uri_prefix . '/' . $file_name;
		// wp_send_json_success($upload_dir); //
		file_put_contents($file_path, self::generate_csv_content($fields, $values, $meta_keys, $meta_values));
		// wp_send_json_success([ $file_path, $file_url ]);
		wp_send_json_success([
			'name' => $file_name,
			'url' => $file_url,
		]);
		// wp_send_json_success([
		// 	$inbounds,
		// 	$fields,
		// 	$values,
		// 	$meta_keys,
		// 	$meta_values,

		// ]);
	}

	// ================================ private functions ================================

	private static function collect_fields($arr_fields, $post_object) {
		$fields = unserialize($post_object->metas['_fields'][0]);
		if ( is_array( $fields ) && count( $fields ) > 0 ) {
			foreach ($fields as $key => $value) {
				if ( ! in_array($key, $arr_fields) ) {
					$arr_fields[] = $key;
				}
			}
		}
		// var_dump($arr_fields);
		return $arr_fields;
	}

	private static function collect_values($arr_values, $post_object) {
		$item = [];
		$metas = $post_object->metas;
		foreach ($metas as $key => $value) {
			if ( strpos( $key, '_field_' ) === 0 ) {
				$field_name = substr($key, 7);
				$item[$field_name] = $value[0]; // 考虑一下 file
			}
		}
		// var_dump($item);
		$arr_values[] = $item;
		return $arr_values;
	}

	private static function collect_metas($meta_keys, $meta_values, $post_object) {
		$item = [];
		$fields = unserialize($post_object->metas['_meta'][0]);
		if ( is_array( $fields ) && count( $fields ) > 0 ) {
			foreach ($fields as $key => $value) {
				if ( ! in_array( $key, $meta_keys ) ) {
					$meta_keys[] = $key;
					if ( $key === 'remote_ip' ) {
						$meta_keys[] = 'geolocation';
					}
				}
				$item[$key] = $value;
				if ( $key === 'remote_ip' ) {
					$item['geolocation'] = self::get_ip_info($value);
				}
			}
		}
		$meta_values[] = $item;
		return [ $meta_keys, $meta_values ];
	}

	private static function generate_csv_content( $fields, $values, $meta_keys, $meta_values ) {
		$txt = '';

		// ======== header ========
		foreach ($fields as $k => $v) {
			$txt .= '"' . self::replace_for_csv($v) . '",';
		}
		foreach ($meta_keys as $k => $v) {
			$txt .= '"' . self::replace_for_csv($v) . '",';
		}
		$txt .= "\n";

		// ======== body ========

		foreach ($values as $index => $item) {
			// body - fields
			foreach ($fields as $field) {
				if ( isset( $item[$field] ) ) {
					$txt .= '"' . self::replace_for_csv($item[$field]) . '",';
				} else {
					$txt .= '"",';
				}
			}

			// body - metas
			$meta_item = isset( $meta_values[$index] ) ? $meta_values[$index] : [];
			foreach ($meta_keys as $meta_key) {
				if ( isset( $meta_item[$meta_key] ) ) {
					$txt .= '"' . self::replace_for_csv($meta_item[$meta_key]) . '",';
				} else {
					$txt .= '"",';
				}
			}

			$txt .= "\n";
		}

		return $txt;
	}

	private static function get_ip_info($ip) {
		$cls = new MML_Ip_Info();
		return $cls->get_ip_info($ip);
	}

	private static function replace_for_csv($value) {
		if ( ! is_string( $value ) ) {
			// $value = gettype($value);
			$value = strval($value);
		}
		$value = str_replace('"', "'", $value);
		$value = str_replace("\r", '', $value);
		$value = str_replace("\n", "  ", $value);
		return $value;
		// return gettype($value);
	}

	private static function get_date_string( $date_format ) {
		$result = '';
		$timezone = date_default_timezone_get();
		date_default_timezone_set( 'PRC' );
		// file_put_contents(wp_upload_dir()['basedir'] . '/mml-mu-plugin-' . date($date_format) . '.log', '[' . date('Y-m-d H:i:s') . '] ' . $msg . "\n", FILE_APPEND);
		$result = date($date_format);
		date_default_timezone_set( $timezone );
		return $result;
	}
}

MML_Flamingo_Tool::setup();
