<?php
/**
 * 发送不含敏感信息的询盘邮件给 MML 运营人员
 *
 * @author MML Step
 * @version 1.1.1
 *
 * v1.1.0 (20220530)
 * v1.1.1 (20220909): 支持 HTML 格式换行
 */

if ( ! defined ( 'ABSPATH' ) ) {
	// header('HTTP/1.1 403 Forbidden');
	// exit('Forbidden');
	header('HTTP/1.1 404 Not Found');
	exit('Not Found');
}

if ( ! function_exists('is_plugin_active')) {
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}

// 此处从代码的角度控制该功能是否开启。
define('MML_CF7', 1); // 1 表示开启， 0 表示关闭

function mml_cf7_init () {
	if ( ! MML_CF7 ) {
		return;
	}
	add_action( 'admin_menu', 'mml_cf7_add_admin_menu' );
	add_filter( 'admin_init' , 'mml_cf7_register_setting' );
	add_action('init', 'mml_cf7_on_wp_init');
	$opt = get_option('mml-cf7');
	if ($opt && isset($opt['enabled']) && $opt['enabled'] === '1') {
		add_action('wpcf7_mail_sent', 'mml_cf7_send');
	}
}

mml_cf7_init();

// ================================ 初始化到此结束，以下是所用到的函数 ================================

function mml_cf7_register_setting() {
	register_setting( 'general', 'mml_cf7_setting_link' );
	add_settings_field( 'mml_cf7_setting_link', '<label for="">运营人员</label>', 'mml_cf7_setting_link', 'general' );
}

function mml_cf7_setting_link () {
	// echo '<a href="/mml-cf7/">MML 运营人员查看此链接</a>';
	echo '<a href="/wp-admin/admin.php?page=mml-cf7">MML 运营人员查看此链接</a>';
}

function mml_cf7_add_admin_menu () {
	add_submenu_page(
		'mml-theme-setting-option', // 父级是二级菜单，当前菜单是三级菜单，不显示，达到隐藏的目的。Settings -> General 页面上的链接是唯一入口。
		'MML CF7', // Page title
		'MML CF7', // menu_title,
		'manage_options', // capability,
		'mml-cf7', // /wp-admin/admin.php?page=mml-cf7
		'mml_cf7_page' // function
	);
}

function mml_cf7_on_wp_init () {
	$request_uri = $_SERVER['REQUEST_URI'];
	$request_method = $_SERVER['REQUEST_METHOD'];
	if ($request_method === 'POST'
		&& isset($_GET['page'])
		&& $_GET['page'] === 'mml-cf7'
		&& wp_verify_nonce( $_POST['_wpnonce'], 'mml-cf7' )
		) {
		mml_cf7_save();
		add_action('mml_cf7_notice', function () {
			echo '<div class="form-item success dashicons-before dashicons-yes-alt">保存成功</div>';
		});
	}
}

function mml_cf7_page () {
	// get_header();
	$opt = get_option('mml-cf7');
	if (!$opt) {
		$opt = [
			'enabled' => '',
			'mails' => '',
			'fields' => '',
		];
	}
	?>
	<div class="mml-cf7">
		<style>
			.mml-cf7 {
				margin: 10px;
				padding: 20px;
				border: 1px solid #39c;
				border-radius: 20px;
				color: #333;
				background-color: lightblue;
			}
			.mml-cf7 .form-item {
				padding: 10px;
				margin-bottom: 10px;
				border-radius: 5px;
				background-color: white;
			}
			.mml-cf7 .form-item.success {
				color: green;
			}
			.mml-cf7 .tip-msg {
				color: #999;
			}
			.mml-cf7 .err-msg {
				color: red;
			}
			.mml-cf7 .input-text {
				border: 1px solid #ddd;
				box-sizing: border-box;
				padding: 3px;
				width: 100%;
			}
			.mml-cf7 .input-submit {
				border: 1px solid #39c;
				background-color: white;
				padding: 5px;
				border-radius: 5px;
				cursor: pointer;
			}
			.mml-cf7 .input-submit:hover {
				background-color: #69c;
				color: white;
			}
			.mml-cf7 .input-submit:active {
				background-color: #6cf;
				color: white;
			}
		</style>
		<?php
			if ( ! is_plugin_active( 'geoip-detect/geoip-detect.php' ) ) {
				echo '<span class="err-msg">插件 GeoIP Detection 没有安装或激活，根据IP获取位置信息的功能将不可用。</span><br />';
			}
			if ( $opt['enabled'] !== '1' ) {
				add_action('mml_cf7_notice', function () {
					echo '<div class="form-item err-msg dashicons-before dashicons-warning">当前配置不会发送邮件。如果需要发送，请勾"是否发送"总开关并保存。</div>';
				});
			}
		?>
		<p>配置：是否发送不含敏感信息的询盘内容给 MML 运营人员 <span class="err-msg">【请注意：使用此功能前，必须取得客户同意。】</span></p>
		<p>&nbsp;</p>
		<?php do_action('mml_cf7_notice'); ?>
		<form action="" method="post" enctype="application/x-www-form-urlencoded">
			<div class="form-item">
				<label>
					是否发送:
					<input type="checkbox" name="enabled" value="1" <?php echo $opt['enabled'] === '1' ? 'checked' : ''; ?> />
					<br /><span class="tip-msg">这是总开关。如果关了，则不会发送，但下面的配置仍然能保存。</span>
				</label>
			</div>
			<div class="form-item">
				<label>
					收件箱: <br />
					<input type="text" class="input-text" name="mails" value="<?php echo $opt['mails'] ?>" />
					<br /><span class="tip-msg">如有多个，用英文逗号分隔</span>
				</label>
			</div>
			<div class="form-item">
				<label>
					发送的字段: <br />
					<input type="text" class="input-text" name="fields" value="<?php echo $opt['fields'] ?>" />
					<br /><span class="tip-msg">如有多个，用英文逗号分隔。如 your-message,your-country。<br />没有列出来的字段将发送字段名（例如，收到的邮件看到的就是"[your-name]"这样一个字符串，不会看到用户填写的信息）。</span>
				</label>
			</div>
			<div class="form-item">
				<ul>
					<li>日志文件保存在: {uploads文件夹}/mml-cf7.log</li>
				</ul>
			</div>
			<?php wp_nonce_field( 'mml-cf7' ); ?>
			<input type="submit" class="input-submit" value="保存">&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/wp-admin/options-general.php">返回</a>
		</form>
		<p>v1.1.1 - 2022-09-09</p>
	</div><?php
	// get_footer();
}

function mml_cf7_save () {
	// POST 才会调用此方法，所以不需要检查是否 POST
	update_option('mml-cf7', [
		'enabled' => isset($_POST['enabled']) ? '1' : '0',
		'mails' => $_POST['mails'],
		'fields' => $_POST['fields'],
	]);
	// echo '<div>保存成功</div>';
}

function mml_cf7_send () {
	$host = $_SERVER['HTTP_HOST'];
	$opt = get_option('mml-cf7');
	$to = [];
	$mails = explode(',', $opt['mails']);
	foreach ($mails as $index => $mail_addr) {
		$to[] = [ 'email' => trim($mail_addr) ];
	}
	$ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? substr( $_SERVER['HTTP_USER_AGENT'], 0, 254 ) : '';
	$referer = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : '';
	$cf7_form = WPCF7_ContactForm::get_current();
	$submission = WPCF7_Submission::get_instance();
	$mail = $cf7_form->prop('mail');
	$data = $submission->get_posted_data();
	$mail_body = $mail['body'];
	$fields = explode(',', $opt['fields']);
	$mail_body = str_replace("[_url]", $referer, $mail_body);
	$mail_body = str_replace("[_ip]", getenv('REMOTE_ADDR'), $mail_body);
	$mail_body = str_replace("[_remote_ip]", mml_cf7_get_remote_ip_addr(), $mail_body);
	$mail_body = str_replace("[_user_agent]", $ua, $mail_body);
	$mail_body = str_replace("[tracking-info]", mml_cf7_get_tracking_info(), $mail_body);
	if ( class_exists( 'MML_Tracking' ) ) {
		$temp_array = MML_Tracking::before_send_mail( [ 'body' => $mail_body ], false, false );
		$mail_body = $temp_array['body'];
	}
	foreach ($fields as $index => $field) {
		$field = trim($field);
		if ($field) {
			if (isset($data[$field])) {
				$mail_body = str_replace("[$field]", $data[$field], $mail_body);
			} else {
				$mail_body = str_replace("[$field]", '', $mail_body);
			}
		}
	}
	$body = apply_filters('the_content', $mail_body);
	add_filter('wp_mail_from_name', 'mml_cf7_wp_mail_from_name');
	mml_cf7_log(json_encode([
		'result'  => wp_mail($mails, $mail['subject'], $body, 'content-type: text/html'),
		'to' => $mails,
		'subject' => $mail['subject'],
		'body' => $body,
	]));
	remove_filter('wp_mail_from_name', 'mml_cf7_wp_mail_from_name');
	// $request_options = array(
	// 	'method' => 'POST',
	// 	'timeout' => 45,
	// 	'redirection' => 5,
	// 	'httpversion' => '1.1',
	// 	'blocking' => true,
	// 	'headers' => [
	// 		"Authorization" => "Bearer $api_key",
	// 		'Content-Type' => 'application/json'
	// 	],
	// 	'body' => json_encode([
	// 		"personalizations" => array( // 数组
	// 			array( // 对象，数组元素
	// 				"to" => $to,
	// 			)
	// 		),
	// 		"from" => array(
	// 			"email" => "MML@$host",
	// 			"name" => $host
	// 		),
	// 		"subject" => $mail['subject'],
	// 		"content" => array(
	// 			array(
	// 				"type" => "text/html",
	// 				"value" => apply_filters('the_content', $mail_body)
	// 			)
	// 		)
	// 	]),
	// 	'cookies' => array()
	// );
	// mml_cf7_log(json_encode($request_options));
	// $response = wp_remote_post( 'http://api.sendgrid.com/v3/mail/send', $request_options);
	// $msg = '';

	// if ( is_wp_error( $response ) ) {
	// 	$error_message = $response->get_error_message();
	// 	$msg = "Something went wrong: $error_message";
	// } else {
	// 	$msg = wp_remote_retrieve_body($response);
	// }
	// mml_cf7_log($msg);
}

// function mml_cf7_get_tracking_info () {
// 	if ( is_plugin_active( 'geoip-detect/geoip-detect.php' ) ) {
//         $trackingCountry = geoip_detect_get_info_from_current_ip();
//         $trackingInfo .= 'Country: ' . $trackingCountry->country_name . ' (' . $trackingCountry->country_code . ' - ' . $trackingCountry->continent_code . ')';
//         if (!empty($trackingCountry->region_name)) {
//             $trackingInfo .= ' - Region: ' . $trackingCountry->region_name . '(' . $trackingCountry->region . ')';
//         }
//         if (!empty($trackingCountry->city)) {
//             $trackingInfo .= ' - Postal Code + City: ' . $trackingCountry->postal_code . ' ' . $trackingCountry->city;
//         }
// 		return $trackingInfo;
// 		// return json_encode($trackingCountry);
//     } else {
// 		return '';
// 	}
// }

function mml_cf7_get_tracking_info () {
	// wp-content/plugins/contact-form-7-lead-info-with-country/wpshore_cf7_lead_tracking.php
	try {
		$lineBreak = "\n";
		$trackingInfo = '';
		$trackingInfo .= $lineBreak . '-- Tracking Info --' . $lineBreak;
		$trackingInfo .= 'The user filled the form on:' . ' ' . $_SERVER['HTTP_REFERER'] . $lineBreak;
		if (isset ($_SESSION['OriginalRef']) )
			$trackingInfo .= 'The user came to your website from:' . ' ' . $_SESSION['OriginalRef'] . $lineBreak;
		if (isset ($_SESSION['LandingPage']) )
			$trackingInfo .= 'Landing page on your website:' . ' ' . $_SESSION['LandingPage'] . $lineBreak;
		$trackingInfoNoIp = $trackingInfo;
		if ( isset ($_SERVER["REMOTE_ADDR"]) )
			$trackingInfo .= 'IP:' . ' ' . $_SERVER["REMOTE_ADDR"] . $lineBreak;
		if ( is_plugin_active( 'geoip-detect/geoip-detect.php' ) ) {
			$trackingCountry = geoip_detect_get_info_from_current_ip();
			$trackingInfo .= 'Country:' . ' ' . $trackingCountry->country_name . ' (' . $trackingCountry->country_code . ' - ' . $trackingCountry->continent_code . ')';
			$trackingInfoNoIp .= 'Country:' . ' ' . $trackingCountry->country_name . ' (' . $trackingCountry->country_code . ' - ' . $trackingCountry->continent_code . ')';
			if (!empty($trackingCountry->region_name)) {
				$trackingInfo .= ' - ' . 'Region:' . ' ' . $trackingCountry->region_name . '(' . $trackingCountry->region . ')';
				$trackingInfoNoIp .= ' - ' . 'Region:' . ' ' . $trackingCountry->region_name . '(' . $trackingCountry->region . ')';
			}
			if (!empty($trackingCountry->city)) {
				$trackingInfo .= ' - ' . 'Postal Code + City:' . ' ' . $trackingCountry->postal_code . ' ' . $trackingCountry->city;
				$trackingInfoNoIp .= ' - ' . 'Postal Code + City:' . ' ' . $trackingCountry->postal_code . ' ' . $trackingCountry->city;
			}
			$trackingInfo .= $lineBreak;
			$trackingInfoNoIp .= $lineBreak;
		}
		if ( isset ($_SERVER["HTTP_X_FORWARDED_FOR"]) ) {
			$trackingInfo .= 'Proxy Server IP:' . ' ' . $_SERVER["HTTP_X_FORWARDED_FOR"] . $lineBreak;
			if ( is_plugin_active( 'geoip-detect/geoip-detect.php' ) ) {
				$trackingcountryproxy = geoip_detect_get_info_from_ip($_SERVER["HTTP_X_FORWARDED_FOR"]);
				$trackingInfo .= 'Country:' . ' ' . $trackingcountryproxy->country_name . ' (' . $trackingcountryproxy->country_code . ' - ' . $trackingcountryproxy->continent_code . ')';
				$trackingInfoNoIp .= 'Country:' . ' ' . $trackingcountryproxy->country_name . ' (' . $trackingcountryproxy->country_code . ' - ' . $trackingcountryproxy->continent_code . ')';
				if (!empty($trackingcountryproxy->region_name)) {
					$trackingInfo .= ' - ' . 'Region:' . ' ' . $trackingcountryproxy->region_name . '(' . $trackingcountryproxy->region . ')';
					$trackingInfoNoIp .= ' - ' . 'Region:' . ' ' . $trackingcountryproxy->region_name . '(' . $trackingcountryproxy->region . ')';
				}
				if (!empty($trackingcountryproxy->city)) {
					$trackingInfo .= ' - ' . 'Postal Code + City:' . ' ' . $trackingcountryproxy->postal_code . ' ' . $trackingcountryproxy->city;
					$trackingInfoNoIp .= ' - ' . 'Postal Code + City:' . ' ' . $trackingcountryproxy->postal_code . ' ' . $trackingcountryproxy->city;
				}
				$trackingInfo .= $lineBreak;
				$trackingInfoNoIp .= $lineBreak;
			}
		}
		if ( isset ($_SERVER["HTTP_USER_AGENT"]) )
			$trackingInfo .= 'Browser is:' . ' ' . $_SERVER["HTTP_USER_AGENT"] . $lineBreak;
			$trackingInfoNoIp .= 'Browser is:' . ' ' . $_SERVER["HTTP_USER_AGENT"] . $lineBreak;
		return $trackingInfo;
	} catch (Exception $e) {
		mml_cf7_log($e->getMessage());
		return '';
	}
}

function mml_cf7_get_remote_ip_addr() {
	$ip_addr = '';

	if ( isset( $_SERVER['REMOTE_ADDR'] )
	and WP_Http::is_ip_address( $_SERVER['REMOTE_ADDR'] ) ) {
		$ip_addr = $_SERVER['REMOTE_ADDR'];
	}

	// return apply_filters( 'wpcf7_remote_ip_addr', $ip_addr );
	return $ip_addr;
}

function mml_cf7_wp_mail_from_name ($name)  {
	// return '张三';
	// return $_SERVER['SERVER_NAME'];
	if (empty($name) || $name === 'WordPress') {
		return $_SERVER['SERVER_NAME'];
	} else {
		return $name;
	}
}

function mml_cf7_log ($msg) {
	file_put_contents(wp_upload_dir()['basedir'] . '/mml-cf7-' . date('Ymd') . '.log', '[' . date('Ymd-His') . '] ' . $msg . "\n", FILE_APPEND);
}
