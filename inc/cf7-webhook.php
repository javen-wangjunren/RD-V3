<?php

/**
 * Contact form 7 发送 webhook 请求
 *
 * 使用前记得要配置 webhook URL 。（目前写死在代码里，以后做成配置。）
 */

if ( ! defined ( 'ABSPATH' ) ) {
	// header('HTTP/1.1 403 Forbidden');
	// exit('Forbidden');
	header('HTTP/1.1 404 Not Found');
	exit('Not Found');
}

class ContactForm7WebHook {
	public static $is_init;
	public static $web_hook_url =
		'';
	public static function init () {
		if ( self::$is_init === true ) {
			return;
		}
		if ( empty( self::$web_hook_url ) ) {
			return;
		}
		self::$is_init = true;
		add_action( 'wpcf7_before_send_mail', [ self::class, 'send_to_web_hook' ] );
	}

	public static function send_to_web_hook($contact_form) {
		$cf7_form = WPCF7_ContactForm::get_current();
		$submission = WPCF7_Submission::get_instance();
		$data = [];
		if ( $submission ) {
			$data = $submission->get_posted_data();
		}
		$data['date'] = current_time('Y-m-d H:i:s');
		if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
			$data['url'] = $_SERVER["HTTP_REFERER"];
		} else {
			$data['url'] = '';
		}
		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$data['user_agent'] = $_SERVER["HTTP_USER_AGENT"];
		} else {
			$data['user_agent'] = '';
		}
		if ( class_exists( 'MML_Ip_Info' ) ) {
			$instance = new MML_Ip_Info();
			$data['ip'] = $instance->get_client_ip();
			$data['location'] = $instance->get_ip_info($data['ip']);
		} else {
			$data['ip'] = '';
			$data['location'] = '';
		}
		wp_remote_post( $web_hook_url, array(
				'method'      => 'POST',
				'blocking'    => false,
				'body'        => $data,
			)
		);
	}
}

ContactForm7WebHook::init();
