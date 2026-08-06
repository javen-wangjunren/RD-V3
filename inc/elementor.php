<?php
/*
 * 用于 Elementor 的代码
 *
 * 用法:
 *   只要包含代码即可。
 */

if ( ! defined ( 'ABSPATH' ) ) {
	// header('HTTP/1.1 403 Forbidden');
	// exit('Forbidden');
	header('HTTP/1.1 404 Not Found');
	exit('Not Found');
}

require_once('ip-info.php');

function mml_theme_elementor_init () {
	global $mml_theme_elementor_instance;
	$mml_theme_elementor_instance = new MML_Theme_Elementor();
}
mml_theme_elementor_init();

class MML_Theme_Elementor {
	function __construct () {
		$this->init();
	}

	private function init () {
		if ( is_plugin_active( 'elementor/elementor.php' ) && is_plugin_active( 'elementor-pro/elementor-pro.php' ) ) {
			add_filter('elementor_pro/forms/wp_mail_message', [$this, 'form_mail_akismet']);
			add_filter('elementor_pro/forms/wp_mail_message', [$this, 'form_mail_ip_info']);
		}
	}

	public function form_mail_akismet ($email_content) {
		// 插件没激活，直接跳过
		if ( ! is_plugin_active( 'akismet/akismet.php' ) ) {
			return $email_content;
		}

		// 没设置 api key ，跳过
		$api_key = get_option('wordpress_api_key');
		if ( empty ($api_key) ) {
			return $email_content;
		}

		$ip_info_instance = new MML_Ip_Info();
		$data = [
			'blog' => get_option('siteurl'),
			'user_ip' => $ip_info_instance->get_ip_addr(),
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			// 'permalink' => $_SERVER['REQUEST_URI']
			'comment_type' => 'contact-form',
			'comment_content' => $email_content,
		];
		if ( ! empty ( $_SERVER['HTTP_REFERER'] ) ) {
			$data['referrer'] = $_SERVER['HTTP_REFERER'];
			$data['blog'] = $_SERVER['HTTP_REFERER'];
		}
		$akismet_url = 'https://' . $api_key . '.rest.akismet.com/1.1/comment-check';
		$this->log(json_encode([
			'url' => $akismet_url,
			'data' => $data
		]));
		$response = wp_remote_post( $akismet_url, [ 'timeout' => 60, 'body' => http_build_query($data) ] );
		if ( is_wp_error( $response ) ) {
			$this->log(json_encode([
				'result' => 'is_wp_error',
				'message' => $response->get_error_message()
			]));
			return $email_content;
		} else if ( is_array ( $response ) ) {
			$this->log(json_encode([
				'result' => 'OK',
				'x-akismet-debug-help' => $response['headers']['x-akismet-debug-help'],
				'body' => $response['body']
			]));
			if ($response['body'] === 'true') {
				return '';
			} else {
				return $email_content;
			}
		} else {
			$this->log(json_encode([
				'result' => 'others',
				'response' => $response,
			]));
			return $email_content;
		}
	}

	public function form_mail_ip_info ($email_content) {
		$ip_info_instance = new MML_Ip_Info();
		$ip_info = $ip_info_instance->get_ip_info($ip_info_instance->get_ip_addr());
		$email_content = str_replace('[mml-ip-info]', $ip_info, $email_content);
		return $email_content;
	}

	private function log ($msg) {
		$caller = '';
		$array = debug_backtrace();
		if (count($array) > 1) {
			$caller = $array[1]['function'];
		}
		file_put_contents(
			wp_upload_dir()['basedir'] . '/mml-elementor.log',
			'[' . date('Ymd-His') . '] ' . $caller . ' - ' . $msg . "\n",
			FILE_APPEND);
	}
}
