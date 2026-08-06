<?php
/**
 * 根据 IP 获取地区信息
 *
 * 用法:
 *     $instance = new MML_Ip_Info();
 *     $instance->get_ip_addr(); // 获取客户端 IP 。 数据来源: $_SERVER['REMOTE_ADDR']
 *     $instance->get_ip_info($ip); // 根据 IP 获取地区信息。 里面调用了下面几个方法: （如果所有方法同时失败，就当作是天意吧。）
 *     $instance->get_ip_info_geoipdetect($ip); // 使用 "Geolocation IP Detection" 插件来获取地区信息
 *     $instance->get_ip_info_mmlgeo($ip); // 使用 MML GEOLocation 服务来获取地区信息
 *     $instance->get_ip_info_maxmind_api($ip); // 使用 Maxmind API 来获取地区信息
 *     $instance->get_ip_info_ipapi($ip); // 使用 IP API 来获取地区信息
 *     $instance->get_ip_info_taobao($ip); // 使用淘宝IP库来获取地区信息
 *
 * @author MML Step
 * @version 1.1.1
 *
 * V1.1.0 (20220824): 增加 mml geo 接口
 * V1.1.1 (20220824): maxmind 接口支持返回 OBJECT 。
 */

if ( ! defined ( 'ABSPATH' ) ) {
	header('HTTP/1.1 404 Not Found');
	exit('Not Found');
}

class MML_Ip_Info {
	function __construct () {
	}

	public function get_ip_addr () {
		$ip_addr = '';

		if ( isset( $_SERVER['REMOTE_ADDR'] )
		and WP_Http::is_ip_address( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip_addr = $_SERVER['REMOTE_ADDR'];
		}

		return $ip_addr;
	}

	public function get_client_ip() {
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

	public function get_ip_info ($ip) {
		$info = [];
		$info = $this->get_ip_info_geoipdetect($ip);
		if ( empty( $info ) ) {
			$info = $this->get_ip_info_mmlgeo( $ip );
		}
		if ( empty( $info ) ) {
			$info = $this->get_ip_info_maxmind_api($ip);
		}
		if ( empty( $info ) ) {
			$info = $this->get_ip_info_ipapi($ip);
		}
		if ( empty( $info ) ) {
			$info = $this->get_ip_info_taobao($ip);
		}
		return implode(' - ', $info);
	}

	public function get_ip_info_geoipdetect ($ip) {
		$result = [];
		if ( function_exists( 'geoip_detect_get_info_from_ip' ) ) {
			$ip_info = geoip_detect_get_info_from_ip($ip);
			if ($ip_info->country_name) {
				$result[] = $this->concact_info($ip_info->country_name, $ip_info->country_code, $ip_info->continent_code);
			}
			if (!empty($ip_info->region_name)) {
				$result[] = $this->concact_info($ip_info->region_name, $ip_info->region);
			}
			if (!empty($ip_info->city)) {
				$result[] = $this->concact_info($ip_info->city, $ip_info->postal_code);
			}
		}
		return $result;
	}

	/**
	 * 从慢慢来的 GEOLocation 获取IP对应的地区信息
	 *
	 * @param String $ip 要查询的 IP
	 * @param String $return_type 返回类型。 默认为字符串数组。可填入 'OBJECT' 或者 'STRING' 或者 'STRING_ARRAY' 。
	 * @return Mix 根据第二个参数，返回对象、字符串或者字符串数组
	 */
	public function get_ip_info_mmlgeo ( $ip, $return_type = 'STRING_ARRAY' ) {
		$result = [];
		$url = "http://geo.mmler.cn/ip?ip=$ip&info=all";
		$response = wp_remote_get($url);
		if ( is_wp_error( $response ) ) return $result;
		if ( ! is_array($response) ) return $result;
		if ( wp_remote_retrieve_response_code( $response ) !== 200 ) return $result;

		// If depth is outside the allowed range, a ValueError is thrown as of PHP 8.0.0, while previously, an error of level E_WARNING was raised.
		$ret = json_decode($response['body']); // 不会报错。如果无法解码，返回 NULL

		if ( ! $ret ) return $result; // NULL
		if ( ! isset( $ret->success ) ) return $result;
		if ( $ret->success !== true ) return $result;

		$ip_info = $ret->data;

		if ( $return_type === 'OBJECT' ) {
			return $ip_info;
		}

		if ( $ip_info->continent ) {
			$result[] = $this->concact_info($ip_info->continent->name, $ip_info->continent->code);
		}
		if ( $ip_info->country ) {
			$result[] = $this->concact_info($ip_info->country->name, $ip_info->country->code);
		}
		if ( $ip_info->city ) {
			$result[] = $this->concact_info($ip_info->city->name, $ip_info->city->code);
		}

		if ( $return_type === 'STRING' ) {
			return implode(' - ', $result);
		}

		// default STRING_ARRAY
		return $result;
	}

	/**
	 * 从慢慢来的 maxmind 获取IP对应的地区信息
	 *
	 * @param String $ip 要查询的 IP
	 * @param String $return_type 返回类型。 默认为字符串数组。可填入 'OBJECT' 或者 'STRING_ARRAY' 。
	 * @return Mix 根据第二个参数，返回对象或者字符串数组
	 */
	public function get_ip_info_maxmind_api ( $ip, $return_type = 'STRING_ARRAY' ) {
		$result = [];
		try {
			$url = "https://geolite.info/geoip/v2.1/city/$ip?pretty";
			// Authorization: Basic MTY2ODgwOnhvTjFSVkh0NGNHdnRkVUU=
			$response = wp_remote_get($url, [ 'headers' => [ 'Authorization' => 'Basic ' . base64_encode('166880:xoN1RVHt4cGvtdUE') ] ]);
			if (is_array($response)) {
				$ip_info = json_decode($response['body']);
				if ( $return_type === 'OBJECT' ) return $ip_info;
				if ( isset( $ip_info->country ) ) {
					if ( isset( $ip_info->continent ) ) {
						$result[] = $this->concact_info($ip_info->country->names->en, $ip_info->country->iso_code, $ip_info->continent->code);
					} else {
						$result[] = $this->concact_info($ip_info->country->names->en, $ip_info->country->iso_code);
					}
				}
				if ( isset( $ip_info->subdivisions ) && count( $ip_info->subdivisions ) > 0 ) {
					$result[] = $this->concact_info($ip_info->subdivisions[0]->names->en, $ip_info->subdivisions[0]->iso_code);
				}
				if ( isset( $ip_info->city ) ) {
					$result[] = $this->concact_info($ip_info->city->names->en, isset( $ip_info ) ? $ip_info->postal->code : '' );
				}
			}
		} catch (Exception $ex) {
		}
		return $result;
	}

	public function get_ip_info_taobao ($ip) {
		$result = [];
		try {
			$url = "http://ip.taobao.com/service/getIpInfo.php?ip=$ip&accessKey=alibaba-inc"; // 不能用 https
			$response = wp_remote_get($url);
			if (is_array($response)) {
				$ip_info = json_decode($response['body']);
				if ($ip_info->code == 0) {
					if ( ! empty ( $ip_info->data->country ) ) {
						$result[] = $this->concact_info($ip_info->data->country, $ip_info->data->country_id);
					}
					if ( ! empty ( $ip_info->data->area ) ) {
						$result[] = $this->concact_info($ip_info->data->area, $ip_info->data->area_id);
					}
					if ( ! empty ( $ip_info->data->region ) ) {
						$result[] = $this->concact_info($ip_info->data->region, $ip_info->data->region_id);
					}
					if ( ! empty ( $ip_info->data->city ) ) {
						$result[] = $this->concact_info($ip_info->data->city, $ip_info->data->city_id);
					}
				}
			}
		} catch (Exception $ex) {
		}
		return $result;
	}

	public function get_ip_info_ipapi ($ip) {
		$result = [];
		try {
			$url = "http://ip-api.com/json/${ip}"; // ?lang=zh-CN // 不能用 https
			$response = wp_remote_get($url);
			if (is_array($response)) {
				$ip_info = json_decode($response['body']);
				if ($ip_info->status == 'success') {
					if ( ! empty( $ip_info->country ) ) {
						$result[] = $this->concact_info($ip_info->country, $ip_info->countryCode, $ip_info->continentCode);
					}
					if ( ! empty( $ip_info->regionName ) ) {
						$result[] = $this->concact_info($ip_info->regionName, $ip_info->region);
					}
					if ( ! empty( $ip_info->city ) ) {
						$result[] = $this->concact_info($ip_info->city, $ip_info->zip);
					}
				}
			}
		} catch (Exception $ex) {
		}
		return $result;
	}

	private function concact_info ($info1, $info2 = '', $info3 = '') {
		$result = '';
		if ( ! empty ( $info1 ) ) {
			$result = $info1;
			if ( ! empty ( $info2 ) || ! empty ( $info3 ) ) {
				$result .= '(';
				if ($info2) {
					$result .= $info2;
				}
				if ($info3) {
					if ($info2) {
						$result .= '-';
					}
					$result .= $info3;
				}
				$result .= ')';
			}
		}
		return $result;
	}
}
