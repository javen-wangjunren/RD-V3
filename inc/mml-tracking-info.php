<?php
/**
 * MML Tracking Info
 *
 * 使用说明:
 * 1. 复制本文件
 * 2. 在 functions.php 中引用本文件
 * 3. 在 contact form 7 添加  [mml-tracking-info]
 * 4. 更新 mml-cf7.php
 *
 * @author MML Step
 * @version 1.0.8
 *
 * TODO: 删除过期文件
 *
 * v1.0.3 (20220605): 只记录 get ； 邮件中发送 tracking id
 * v1.0.4 (20220606): 记录 ip
 * v1.0.5 (20220608): 记录 $_SERVER
 * v1.0.6 (20220609): 记录 platform, mobile, real ip, forward for, remote addr
 * v1.0.7 (20220612): 排除 duckduckgo, dataprovider.com, adsbot-google
 * v1.0.8 (20220909): 支持 html 换行。减少多余的一次记录。
 */

defined( 'ABSPATH' ) || die;

class MML_Tracking {
	private static $KEY = 'mml_tracking_cookie';

	public static function process () {
		// 为 post 的情况下，只有 cf7 mail 会记录和读取。
		add_filter('wpcf7_mail_components', [ self::class, 'before_send_mail' ], 10, 3);

		// 为 get, 且不是爬虫，才记录。
		if ( $_SERVER['REQUEST_METHOD'] === 'GET' ) {
			$user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '';
			$user_agent = strtolower( $user_agent );
			if (strpos($user_agent, 'googlebot') !== false) return; // Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)
			if (strpos($user_agent, 'adsbot-google') !== false) return; // AdsBot-Google (+http:\/\/www.google.com\/adsbot.html)
			if (strpos($user_agent, 'ahrefsbot') !== false) return; // Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)
			if (strpos($user_agent, 'babbar.tech') !== false) return; // Mozilla/5.0 (compatible; Barkrowler/0.9; +https://babbar.tech/crawler)
			if (strpos($user_agent, 'zoominfobot') !== false) return; // ZoominfoBot (zoominfobot at zoominfo dot com)
			if (strpos($user_agent, 'duckduckgo.com') !== false) return; // Mozilla/5.0 (compatible; DuckDuckGo-Favicons-Bot/1.0; +http://duckduckgo.com)
			if (strpos($user_agent, 'dataprovider.com') !== false) return; // Mozilla/5.0 (compatible; Dataprovider.com)
			self::init_record();
		}
	}

	public static function get_tracking_info () {
		$record = self::init_record();
		$trackingInfo = [];
		if ( isset( $record->id ) ) {
			$trackingInfo[] = 'MML Tracking ID: ' . $record->id;
		}
		foreach ($record->history as $index => $history) {
			if ( $index !== 0 ) $trackingInfo[] = '--------';
			$trackingInfo[] = '访问时间: ' . $history->time;
			$trackingInfo[] = '访问页面: ' . $history->uri;
			$trackingInfo[] = '访问来源: ' . $history->referer;
			$trackingInfo[] = '访问设备: ' . $history->device;
			// $trackingInfo[] = '用户IP: ' . $history->ip;
			$trackingInfo[] = 'HTTP_SEC_CH_UA_PLATFORM: ' . $history->HTTP_SEC_CH_UA_PLATFORM;
			$trackingInfo[] = 'HTTP_SEC_CH_UA_MOBILE: ' . $history->HTTP_SEC_CH_UA_MOBILE;
			$trackingInfo[] = 'HTTP_X_REAL_IP: ' . $history->HTTP_X_REAL_IP;
			$trackingInfo[] = 'HTTP_X_FORWARDED_FOR: ' . $history->HTTP_X_FORWARDED_FOR;
			$trackingInfo[] = 'REMOTE_ADDR: ' . $history->REMOTE_ADDR;
		}
		return $trackingInfo;
	}

	public static function before_send_mail($array, $number, $instance) {
		$line_break = "\n";
		if(
			strpos( $array['body'], '<!doctype html>' ) !== false
			|| strpos( $array['body'], '<p>' ) !== false
			|| strpos( $array['body'], '<br />' ) !== false
			|| strpos( $array['body'], '<br>' ) !== false
			|| strpos( $array['body'], '<br/>' ) !== false
		) { // Check if email sent is HTML or plain text
			$line_break = "<br />\n";
		}

		$array['body'] = str_replace('[mml-tracking-info]', implode( $line_break, self::get_tracking_info() ), $array['body']);

		return $array;
	}

	private static function mkdir () {
		$upload_dir = wp_upload_dir()['basedir']; // 结尾不是 /
		$temp_dir = $upload_dir . '/tracking-data';
		$temp_dir_date = $temp_dir . '/' . self::mml_date('Ymd');
		// $uri_prefix = wp_upload_dir()['baseurl'] . '/mml-flamingo-export';
		if ( ! is_writable( $upload_dir ) ) {
			// wp_send_json_error('没有写入权限');
			return $temp_dir;
		}
		if ( file_exists( $temp_dir ) && ! is_dir( $temp_dir ) ) {
			// wp_send_json_error('存在同名文件，无法创建文件夹 ' . $temp_dir);
			return $temp_dir;
		}
		if ( ! is_dir( $temp_dir ) && ! mkdir( $temp_dir, 0755 ) ) {
			// wp_send_json_error('创建文件夹失败 ' . $temp_dir);
			return $temp_dir;
		}
		if ( ! is_dir( $temp_dir_date ) && ! mkdir( $temp_dir_date, 0755 ) ) {
			// wp_send_json_error('创建文件夹失败 ' . $temp_dir_date);
			return $temp_dir_date;
		}
		if ( ! is_writable( $temp_dir_date ) ) {
			// wp_send_json_error('没有写入权限');
			return $temp_dir_date;
		}
		return $temp_dir_date;
	}

	private static function get_one_record () {
		return [
			'time' => self::mml_date('Y-m-d H:i:s'),
			'ip' => self::get_client_ip(),
			'uri' => $_SERVER['REQUEST_URI'],
			'referer' => isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : '',
			'device' => isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '',
			'HTTP_SEC_CH_UA_PLATFORM' => isset( $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ) ? $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] : '',
			'HTTP_SEC_CH_UA_MOBILE' => isset( $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ) ? $_SERVER['HTTP_SEC_CH_UA_MOBILE'] : '',
			'HTTP_SEC_CH_UA' => isset( $_SERVER['HTTP_SEC_CH_UA'] ) ? $_SERVER['HTTP_SEC_CH_UA'] : '',
			'HTTP_X_REAL_IP' => isset( $_SERVER['HTTP_X_REAL_IP'] ) ? $_SERVER['HTTP_X_REAL_IP'] : '',
			'HTTP_X_FORWARDED_FOR' => isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '',
			'REMOTE_ADDR' => isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '',
			'server' => $_SERVER
		];
	}

	private static function init_record () {
		if ( ! isset( $_COOKIE[self::$KEY] ) ) {
			$id = md5(uniqid(mt_rand(), true));
		} else {
			$id = $_COOKIE[self::$KEY];
		}
		$is_new = false;
		$file = self::mkdir() . "/$id.json";
		if ( ! file_exists( $file ) ) {
			$is_new = true;
			$record = [
				'id' => $id,
				'create_time' => time(),
				'history' => [ self::get_one_record() ],
			];
			file_put_contents( $file, json_encode( $record ) );
		}
		setcookie(
			self::$KEY, // name
			$id, // value
			0, // expires
			'/', // path
			$_SERVER['HTTP_HOST'], // domain
			false, // secure
			false // http only
		);
		$record = json_decode( file_get_contents( $file ) );
		if ( ! $is_new && isset( $_GET['keyword'] ) ) {
			$record->history[] = self::get_one_record();
			file_put_contents( $file, json_encode( $record ) );
		}
		return $record;
	}

	private static function mml_date ( $date_format, $time = null ) {
		if ( $time === null ) {
			$time = time();
		}
		$timezone = date_default_timezone_get();
		date_default_timezone_set( 'PRC' );
		$result = date($date_format, $time);
		date_default_timezone_set( $timezone );
		return $result;
	}

	private static function get_client_ip() {
		$server_ip_keys = [
			'HTTP_CLIENT_IP',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_X_CLUSTER_CLIENT_IP',
			'HTTP_FORWARDED_FOR',
			'HTTP_FORWARDED',
			'REMOTE_ADDR',
		];

		foreach ( $server_ip_keys as $key ) {
			if ( isset( $_SERVER[ $key ] ) && filter_var( $_SERVER[ $key ], FILTER_VALIDATE_IP ) ) {
				return $_SERVER[ $key ];
			}
		}

		// Fallback local ip.
		return '127.0.0.1';
	}
}

MML_Tracking::process();
