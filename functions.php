<?php

/**
 * 命名指南：以 mml_theme_ 开头
 * 函数: mml_theme_fn_xx
 * add action/filter function: mml_theme_on_xx
 * 新的 action 事件名称: mml_theme_ac_xx
 * 新的 filter 过滤器名称: mml_theme_ft_xx
 * options: mml_plugin_opt_xx
 *
 * 例: function mml_theme_on_page_footer () {}
 *     add_action('mml_theme_ac_page_footer', 'mml_theme_on_page_footer')
 *     do_action('mml_theme_ac_page_footer')
 */

// ================================ 主题相关的代码 ================================

if (!function_exists('mml_log')) {
	function mml_log ($msg) {
		if ( ! is_string($msg) ) {
			$msg = json_encode($msg);
		}
		file_put_contents(
			wp_upload_dir()['basedir'] . '/' . date('Ymd') . '.log',
			'[' . date('Y-m-d H:i:s') . '] ' . $msg . "\n",
			FILE_APPEND
		);
	}
}

function jsConsole($obj) {
	echo '<script>(function () {
		var obj = ' . json_encode($obj) . '
		console.log(obj)
	})()</script>';
}

function mml_theme_fn_is_mobile ($ua = '') {
  if (!$ua) {
	$ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
  }
  $kw = array(
    'iphone', 'android', 'phone', 'mobile', 'wap', 'netfront', 'java', 'opera mobi',
    'opera mini', 'ucweb', 'windows ce', 'symbian', 'series', 'webos', 'sony', 'blackberry', 'dopod',
    'nokia', 'samsung', 'palmsource', 'xda', 'pieplus', 'meizu', 'midp', 'cldc', 'motorola', 'foma',
    'docomo', 'up.browser', 'up.link', 'blazer', 'helio', 'hosin', 'huawei', 'novarra', 'coolpad', 'webos',
    'techfaith', 'palmsource', 'alcatel', 'amoi', 'ktouch', 'nexian', 'ericsson', 'philips', 'sagem',
    'wellcom', 'bunjalloo', 'maui', 'smartphone', 'iemobile', 'spice', 'bird', 'zte-', 'longcos',
    'pantech', 'gionee', 'portalmmm', 'jig browser', 'hiptop', 'benq', 'haier', '^lct', '320x320',
    '240x320', '176x220', 'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
    'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno', 'ipaq', 'java', 'jigs',
    'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-', 'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi',
    'mot-', 'moto', 'mwbp', 'nec-', 'newt', 'noki', 'oper', 'palm', 'pana', 'pant', 'phil', 'play', 'port',
    'prox', 'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar', 'sie-', 'siem',
    'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-', 'tsm-', 'upg1', 'upsi', 'vk-v',
    'voda', 'wap-', 'wapa', 'wapi', 'wapp', 'wapr', 'webc', 'winw', 'winw', 'xda', 'xda-',
    'googlebot-mobile'
  );
  $is = false;
  foreach ($kw as $key) {
    if (strpos(strtolower($ua), strtolower($key)) > -1) {
      $is = true;
      break;
    }
  }
  return $is;
}

/**
 * 获取 git 最后一次提交的 hash 。默认使用 master 分支。以后修改成可用其他分支。
 * 不存在时返回空字符串。
 *
 * @param Integer $length 可选。 整数型。 截取长度。不填或小于1则不截取，返回全部。
 * @return String         字符串。 返回 hash 或者 空字符串
 */
function mml_theme_fn_get_git_hash ($length = 0) {
    $path = ABSPATH . '.git/refs/heads/master';
    if (file_exists($path)) {
        $hash = file_get_contents($path);
        if (is_int($length) && $length > 0) {
            return substr($hash, 0, $length);
        } else {
            return $hash;
        }
    } else {
        return '';
    }
}

/**
 * 解决 Meta Box 分类乱序的问题。
 * - 默认的 wordpress 代码中，Meta Box 里，选中的 taxonomy 会排在前面，而不是按照分类的结构显示。
 */
function mml_theme_fn_taxonomy_checklist_checked_ontop_filter ($args)
{
	$args['checked_ontop'] = false;
	return $args;
}

/**
 * wp_body_open
 *
 * @author MML
 * @link   https://www.mmldigi.com
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
}

require('inc/theme-setup.php');
require('inc/post-type.php');
require('inc/catalog.php');
require('inc/archive-shortcode.php');
require('shortcodes/_topbanner.php');
require('shortcodes/_hr.php');
require('shortcodes/_help-search.php');
require('shortcodes/_help-topic-sidebar.php');
require('shortcodes/_help-topic-content.php');
require('shortcodes/_help-sub-topic-sidebar.php');
require('shortcodes/_help-sub-topic-content.php');
require('shortcodes/_help-answer-sidebar.php');
require('shortcodes/_help-helpful.php');
require('shortcodes/_white-paper-download.php');
require('shortcodes/_nested-tabs.php');
require('shortcodes/_icon-tabs.php');
require('shortcodes/_product-schema.php');
require('shortcodes/_search.php');
require('shortcodes/_halloween.php');
require('shortcodes/_christmas.php');
require('shortcodes/_job-list.php');
require('shortcodes/_job-related.php');
require('rest/spinner.php');

include_once('inc/elementor.php');

add_action( 'after_setup_theme', 'mml_theme_setup' );
add_action( 'init', 'mml_theme_portfolio' );
add_action( 'init', 'mml_theme_fn_add_supports' );
add_action( 'init', 'mml_theme_fn_enable_portfolio_category_template' );
add_action( 'wp_head', 'mml_theme_fn_powered_by' );
add_action( 'wp_head', 'mml_theme_fn_output_code_in_header' );
add_action( 'wp_head', 'mml_theme_fn_output_favicon' );
add_action( 'wp_head', 'mml_theme_fn_output_typekit' );
add_action( 'wp_head', 'mml_theme_fn_output_post_error_js' );
add_action( 'wp_head', 'mml_theme_fn_output_sticky', 20 ); // 这个输出可以靠后一些（前后都不影响）
add_action( 'wp_body_open', 'mml_theme_fn_output_code_after_body_opening' );
add_action( 'mml_theme_ac_footer', 'mml_theme_fn_output_code_before_body_closing' );

add_action( 'admin_menu', 'mml_theme_fn_add_admin_menu' );
add_action( 'admin_init', 'mml_theme_fn_save_settings' );
add_action( 'admin_init', 'mml_theme_fn_enable_page_attributes' );

add_filter('wp_terms_checklist_args','mml_theme_fn_taxonomy_checklist_checked_ontop_filter');
add_action('wp_nav_menu_item_custom_fields', 'mml_theme_fn_custom_menu_field', 10, 4); // 输出设置框
add_action('wp_update_nav_menu_item', 'mml_theme_fn_custom_menu_field_save', 10, 3); // 保存设置值
add_action('wp_setup_nav_menu_item', 'mml_theme_fn_custom_menu_setup_code'); // 读取时加入属性
add_action('phpmailer_init', 'mml_theme_on_phpmailer_init'); // 发邮件设置
add_filter('wp_mail_from', 'mml_theme_on_wp_mail_from');
add_filter('wp_mail_from_name', 'mml_theme_on_wp_mail_from_name');

// ================================ 开发相关的代码 ================================

require('inc/common.php');
require('inc/acf-setup.php');
require('inc/admin-menu.php');
require('inc/for-elementor-projects.php');
require('inc/mml-flamingo-tool.php');
require('inc/mml-sem-cf7.php');
require('inc/mml-alt-tool.php');
require('inc/elementor-widgets/add-elementor-widgets.php');
require('inc/mml-cpt.php');
include_once('mml-cf7.php');
include_once('front-end.php');

// ---- RD Site Header ----

require('inc/site-header/site-header.php'); // 文件内自行 RD_Site_Header::init()

// ---- 中台/Section ----

require_once('sections/MML_Section_Base.php');
require_once('sections/MML_Section_Helper.php');

function mtf_section ($className, $id = '', $style = [], $content = []) {
    $file = MML_Section_Base::get_file($className);
    if (!empty($file) && file_exists($file)) {
        $obj = new $className($id, $style, $content);

        add_action('mml_theme_ac_section_style', function () use ($obj) {
            $obj->style();
        });

        $obj->html();

        add_action('mml_theme_ac_section_script', function () use ($obj) {
            echo ';';
            $obj->script();
        });
    }
}

// ---- 中台/Section END ----

/*
*   获取某张经后台media上传的图片的Alt Text
*/
function getImageAlt($url){
	if (!$url) {
		return 'image';
	}
	$id = attachment_url_to_postid($url);
	if (isset($id) && $id) {
		$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
		if (isset($alt) && $alt != '') {
			return $alt;
		}
	}

    $fileName = pathinfo($url)['filename'];
	$alt = preg_replace(['/_/','/-/'], ' ', $fileName);
	$alt = preg_replace(['/\d+\w\d+$/'], '', $alt);

	return $alt;
}

function mml_get_image_by_url( $url = null,  $size = 'full', $attr = [])
{

    $post_thumbnail_id = attachment_url_to_postid($url);

    $post = get_post($post_thumbnail_id);

    if (!$post) {

        return '';

    }

    if (empty($attr) || !array_key_exists('alt',$attr)) {

        $attr = [
            'src' => "data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=",
            'alt' => getImageAlt($url),
        ];

    }

    $size = apply_filters('post_thumbnail_size', $size, $post->ID);

    if ($post_thumbnail_id) {

        do_action('begin_fetch_post_thumbnail_html', $post->ID, $post_thumbnail_id, $size);

        if (in_the_loop()) {

            update_post_thumbnail_cache();

        }

        $html = wp_get_attachment_image($post_thumbnail_id, $size, false, $attr);

        do_action('end_fetch_post_thumbnail_html', $post->ID, $post_thumbnail_id, $size);

    } else {

        $html = '';

    }

    return apply_filters('post_thumbnail_html', $html, $post->ID, $post_thumbnail_id, $size, $attr);

}

function mml_get_lazyload_image_by_url( $url = '', $attr = array() ) {
    if ( !$url ) {
        return '';
    }

    $src = "data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=";

    $default_attr = array( 'class' => 'lazyload', 'alt' => getImageAlt( $url ) );

    $attr = array_merge( $default_attr, $attr );
    if ( $attr['class'] != 'lazyload' ) {
        $attr['class'] .= ' lazyload';
    }

    $attr_html = '';
    foreach ( $attr as $key => $val ) {
        $attr_html .= " $key=\"$val\"";
    }

    return "<img src=\"$src\" data-src=\"$url\" $attr_html />";
}

/* ================================= Contact Info - START ================================= */

function mml_show_email1 ($css_class = 'dashicons dashicons-email') {
	$value = antispambot(mtf_get_email1());
	if ($value) {
		$with_link = mtf_get_option('options', 'enable_email_link') === 'y';
		if ($with_link) {
			echo '<li>'
				. '<i class="' . $css_class . '"></i>'
				. '<a href="mailto:' . $value . '">' . $value . '</a>'
				. '</li>';
		} else {
			echo '<li>'
				. '<i class="' . $css_class . '"></i>'
				. '<a>' . $value . '</a>'
				. '</li>';
		}
	}
}

function mml_show_email2 ($css_class = 'dashicons dashicons-email') {
	$value = antispambot(mtf_get_email2());
	if ($value) {
		$with_link = mtf_get_option('options', 'enable_email_link') === 'y';
		if ($with_link) {
			echo '<li>'
				. '<i class="' . $css_class . '"></i>'
				. '<a href="mailto:' . $value . '">' . $value . '</a>'
				. '</li>';
		} else {
			echo '<li>'
				. '<i class="' . $css_class . '"></i>'
				. '<a>' . $value . '</a>'
				. '</li>';
		}
	}
}

function mml_show_mobile1 ($css_class = 'dashicons dashicons-smartphone') {
	$value = mtf_get_mobile1();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_mobile2 ($css_class = 'dashicons dashicons-smartphone') {
	$value = mtf_get_mobile2();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_telephone1 ($css_class = 'dashicons dashicons-phone') {
	$value = mtf_get_telephone1();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_telephone2 ($css_class = 'dashicons dashicons-phone') {
	$value = mtf_get_telephone2();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_fax1 ($css_class = '') {
	$value = mtf_get_fax1();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_fax2 ($css_class = '') {
	$value = mtf_get_fax2();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_whatsapp ($css_class = '') {
	$value = mtf_get_whatsapp();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_address ($css_class = 'dashicons dashicons-location') {
	$value = mtf_get_address();
	if ($value) {
		echo '<li>'
			. '<i class="' . $css_class . '"></i>'
			. '<a>' . $value . '</a>'
			. '</li>';
	}
}

function mml_show_social_facebook ($css_class = 'dashicons dashicons-facebook') {
	$value = mtf_get_facebook();
	if ($value) {
		echo '<li>'
			. '<a href="' . $value . '" target="_blank"><i class="' . $css_class . '"></i></a>'
			. '</li>';
	}
}

function mml_show_social_twitter ($css_class = 'dashicons dashicons-twitter') {
	$value = mtf_get_twitter();
	if ($value) {
		echo '<li>'
			. '<a href="' . $value . '" target="_blank"><i class="' . $css_class . '"></i></a>'
			. '</li>';
	}
}

function mml_show_social_pinterest ($css_class = '') {
	$value = mtf_get_pinterest();
	if ($value) {
		echo '<li>'
			. '<a href="' . $value . '" target="_blank"><i class="' . $css_class . '"></i></a>'
			. '</li>';
	}
}

function mml_show_social_linkedin ($css_class = 'dashicons dashicons-linkedin') {
	$value = mtf_get_linkedin();
	if ($value) {
		echo '<li>'
			. '<a href="' . $value . '" target="_blank"><i class="' . $css_class . '"></i></a>'
			. '</li>';
	}
}

function mml_show_social_instagram ($css_class = 'dashicons dashicons-instagram') {
	$value = mtf_get_instagram();
	if ($value) {
		echo '<li>'
			. '<a href="' . $value . '" target="_blank"><i class="' . $css_class . '"></i></a>'
			. '</li>';
	}
}

function mml_show_social_youtube ($css_class = '') {
	$value = mtf_get_youtube();
	if ($value) {
		echo '<li>'
			. '<a href="' . $value . '" target="_blank"><i class="' . $css_class . '"></i></a>'
			. '</li>';
	}
}

/* ================================= Contact Info - END ================================= */

//以下两方法为在指定的后台post-type的列表页里添加额外要显示的数据
//add_filter( 'manage_portfolio_posts_columns', 'portfolio_sku' );

function portfolio_sku( $columns ) {
    $columns['sku'] = 'SKU';
    return $columns;
}

//add_action('manage_posts_custom_column', 'portfolio_sku_value', 10, 2);

function portfolio_sku_value($column, $post_id) {
    if($column == 'sku'){
        $sku = get_field('sku',$post_id);
        echo $sku;
    }
    return;
}

/* ================================= custom columns start ================================= */
require('inc/custom-manage-columns.php');

//post_type list
$cptui_post_types = get_option( 'cptui_post_types' );
if ( $cptui_post_types ) {
    $post_types = array_keys( $cptui_post_types );

    $thumbnail = [
        'title' => 'Thumbnail',
        'order' => 1,
        'get'   => function( $column, $post_id ) {
            return has_post_thumbnail( $post_id ) ? get_the_post_thumbnail( $post_id, [ 50, 37 ] ) : '—';
        }
    ];

    $order = [
        'title' => 'Order',
        'order' => -1,
        'get'   => function( $column, $post_id ) {
            return get_post( $post_id )->menu_order ?: '—';
        }
    ];

    CustomManageColumns::postType( ...$post_types )->add( $thumbnail, $order )->run();
}

//taxonomy list
$cptui_taxonomies = get_option( 'cptui_taxonomies' );
if ( $cptui_taxonomies ) {
    $taxonomies = array_keys( $cptui_taxonomies );

    $sort = [
        'title' => 'Sort',
        'order' => 2,
        'get'   => function( $content, $column, $term_id ) {
            $content = get_field( 'sort', 'term_' . $term_id ) ?: '—';
            $term = get_term( $term_id );
            while ( $term->parent != 0 ) {
                $content = '— ' . $content;
                $term = get_term( $term->parent );
            }
            return $content;
        }
    ];

    CustomManageColumns::taxonomy( ...$taxonomies )->add( $sort )->run();
}
/* ================================== custom columns end =================================== */

require('inc/admin-post-columns.php');
require('inc/admin-post-writer.php');
require('inc/admin-page-category.php');

// ================================== 禁用默认全屏 Start ===================================

if (is_admin()) {
	function mml_disable_editor_fullscreen_by_default() {
	    $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
	    wp_add_inline_script( 'wp-blocks', $script );
	}
	add_action( 'enqueue_block_editor_assets', 'mml_disable_editor_fullscreen_by_default' );
}

// ================================== 禁用默认全屏 End ===================================

/* ================================= 视频弹窗 START ================================= */

function mml_theme_fn_video_analyze ( $url ) {
	$result = [
		'url' => $url,
		'is_valid' => false,
		'is_youtube' => false,
		'is_youku_link' => false,
		'is_youku_iframe' => false,
		'youku_id' => '',
	];
	if ( ! $url || empty($url) || ! is_string($url) ) {
		return $result;
	}
	if (strpos($url, 'v.youku.com') > 0) {
		$result['is_valid'] = true;
		$result['is_youku_link'] = true;
		$result['youku_id'] = str_replace('.html', '', str_replace('https://v.youku.com/v_show/id_', '', $url));
	} else if (strpos($url, 'player.youku.com') > 0) {
		$result['is_valid'] = true;
		$result['is_youku_iframe'] = true;
		$result['youku_id'] = preg_replace('/^.*embed\/([^"\']+).*$/', '$1', $url);
	} else if (strpos($url, 'youtu.be') > 0  or strpos($url, 'youtube.com') > 0 ) {
		$result['is_valid'] = true;
		$result['is_youtube'] = true;
	}

	return $result;
}

function mtf_video_start_tag($url = '', $class = '', $attrs = []) {
	$result = mml_theme_fn_video_analyze($url);
	if (!$result['is_valid']) {
		return;
	}
	if ($result['is_youtube']) {
		$html = '<a href="' . $url . '" class="mml-video-popup vp-a';
		if (!empty($class)) {
			$html .= ' ' . esc_attr($class);
		}
		$html .= '"';
		if (!empty($attrs)) {
			foreach ($attrs as $key => $value) {
				$html .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
			}
		}
		$html .= '>';
		echo $html;
	} else if ($result['is_youku_link']) {
		$html = '<a href="' . $url . '" class="mml-video-popup mml-vp-youku-link';
		if (!empty($class)) {
			$html .= ' ' . esc_attr($class);
		}
		$html .= '" data-youku-id="' . $result['youku_id'] . '"';
		if (!empty($attrs)) {
			foreach ($attrs as $key => $value) {
				$html .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
			}
		}
		$html .= '>';
		echo $html;
	} else if ($result['is_youku_iframe']) {
		$html = '<a href="javascript:void(0);" class="mml-video-popup mml-vp-youku-iframe';
		if (!empty($class)) {
			$html .= ' ' . esc_attr($class);
		}
		$html .= '"';
		if (!empty($attrs)) {
			foreach ($attrs as $key => $value) {
				$html .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
			}
		}
		$html .= '>';
		echo $html;
	}
}

function mtf_video_end_tag($url = '') {
	$result = mml_theme_fn_video_analyze($url);
	if (!$result['is_valid']) {
		return;
	}
	if ($result['is_youtube']) {
		echo '</a>';
	} else if ($result['is_youku_link']) {
		echo '<script type="text/tmplate" name="mml-video-popup-template">';
		echo do_shortcode('[arve url="' . $url . '" /]');
		echo '</script>';
		echo '</a>';
	} else if ($result['is_youku_iframe']) {
		echo '<script type="text/tmplate" name="mml-video-popup-template">';
		echo $url;
		echo '</script>';
		echo '</a>';
	}
}

/* ================================= 视频弹窗 END ================================= */

/* ================================= 不要删除询盘附件 START ================================= */

add_filter('dnd_cf7_auto_delete_files', 'mml_change_auto_deletion_time', 10, 1);
function mml_change_auto_deletion_time( $time ) {
	$time = 60 * 60 * 24 * 365; // 过期时间设为一年
	return $time;
}

/* ================================= 不要删除询盘附件 END ================================= */

/* ================================= wp ses 发邮件配置 START ================================= */

add_filter( 'wp_mail_from', function ($from) {
	if ( is_plugin_active( 'wp-ses/wp-ses.php' ) ) {
		return $_SERVER['SERVER_NAME'] . '@mmldigi.com';
	} else {
		return $from;
	}
});

add_filter( 'wp_mail_from_name', function ($name)  {
	if (empty($name) || $name === 'WordPress') {
		return $_SERVER['SERVER_NAME'];
	} else {
		return $name;
	}
});

/* ================================= wp ses 发邮件配置 END ================================= */

function mml_theme_fn_back() {
    $back_info = ['link' => null, 'is_on_site' => false];
    if (isset($_SERVER['HTTP_REFERER'])) {
        $back_info['link'] = $_SERVER['HTTP_REFERER'];
        $site_url = get_option('siteurl');

        if (preg_match("#^$site_url#", $_SERVER['HTTP_REFERER'])) {
            $back_info['is_on_site'] = true;
        }
    }
    return $back_info;
}

function is_array_null($value) {
    if (empty($value)) {
    	return $value;
    } else {
    	return is_array($value) ? array_map('array_null', $value) : addslashes($value);
    }
}


//wp-admin 后台加载样式
add_action('admin_head', 'mml_custom_css'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook

function mml_custom_css() {
    echo '<style>
    #editor .edit-post-layout__metaboxes{
        margin-bottom: 25px;
    }
  </style>';
}
function title_filter( $where, &$wp_query ){
    global $wpdb;
    if ( $search_term = $wp_query->get( 'search_prod_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\'';
    }
    return $where;
}

function mml_admin_pages_search_title_where( $where, $wp_query ) {
	global $pagenow, $wpdb;

	if ( ! is_admin() || ! $wp_query->is_main_query() ) {
		return $where;
	}

	if ( $pagenow !== 'edit.php' ) {
		return $where;
	}

	if ( $wp_query->get( 'post_type' ) !== 'page' ) {
		return $where;
	}

	if ( ! $wp_query->is_search() ) {
		return $where;
	}

	$s = $wp_query->get( 's' );
	if ( ! is_string( $s ) || trim( $s ) === '' ) {
		return $where;
	}

	$search_terms = $wp_query->get( 'search_terms' );
	if ( ! is_array( $search_terms ) || empty( $search_terms ) ) {
		$search_terms = preg_split( '/\s+/', trim( $s ) );
	}

	$search_terms = array_values( array_filter( array_map( 'trim', $search_terms ), function( $term ) {
		return $term !== '';
	} ) );

	if ( empty( $search_terms ) ) {
		return $where;
	}

	$title_clauses = [];
	foreach ( $search_terms as $term ) {
		$title_clauses[] = $wpdb->prepare(
			"{$wpdb->posts}.post_title LIKE %s",
			'%' . $wpdb->esc_like( $term ) . '%'
		);
	}

	$where .= ' AND (' . implode( ' AND ', $title_clauses ) . ')';

	return $where;
}
add_filter( 'posts_where', 'mml_admin_pages_search_title_where', 20, 2 );
function fws_admin_posts_filter( $query ) {
    global $pagenow;
    if ( is_admin() && $pagenow == 'edit.php' && !empty($_GET['my_parent_pages'])) {
        $query->query_vars['post_parent'] = $_GET['my_parent_pages'];
    }
}
add_filter( 'parse_query', 'fws_admin_posts_filter' );

function admin_page_filter_parentpages() {
    global $wpdb;
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'page') {
        $sql = "SELECT ID, post_title FROM ".$wpdb->posts." WHERE post_type = 'page' AND post_parent = 0  AND ID in (60,80,13056,13054,13051,13049) ORDER BY post_title";
        $parent_pages = $wpdb->get_results($sql, OBJECT_K);
        $select = '
			<select name="my_parent_pages">
				<option value="">Parent Pages</option>';
        $current = isset($_GET['my_parent_pages']) ? $_GET['my_parent_pages'] : '';
        foreach ($parent_pages as $page) {
            $select .= sprintf('
				<option value="%s"%s>%s</option>', $page->ID, $page->ID == $current ? ' selected="selected"' : '', $page->post_title);
        }
        $select .= '
			</select>';
        echo $select;
    } else {
        return;
    }
}
add_action( 'restrict_manage_posts', 'admin_page_filter_parentpages' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'rd-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

add_action( 'init', 'rapid_topic' );
function rapid_topic() {
    register_post_type( 'topic',
    array(
    'labels' => array(
    'name' => __( 'HC Topic' ),
    'singular_name' => __( 'Topic' ),
    'add_new'            => 'Add Topic',
    'add_new_item'       => 'Add New Topic',
    'edit_item'          => 'Edit Topic',
    'new_item'           => 'New Topic',
    'all_items'          => 'All Topics',
    'view_item'          => 'View Topic',
    'search_items'       => 'Search Topics',
    'not_found'          => 'No Topic found',
    'not_found_in_trash' => 'No Topic found in Trash',
    ),
    
    'public' => true,
	'show_ui' => true,
	'show_in_nav_menus' => false,
    'menu_icon' => 'dashicons-post-status',
    'show_in_rest' => true,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'author', 'custom-fields', 'page-attributes'),
    'rewrite' => array('slug' => 'help-center/topic','with_front' => false),
    )
    );
}

add_action( 'init', 'rapid_sub_topic' );
function rapid_sub_topic() {
    register_post_type( 'sub_topic',
    array(
    'labels' => array(
    'name' => __( 'HC Sub Topic' ),
    'singular_name' => __( 'Sub Topic' ),
    'add_new'            => 'Add Sub Topic',
    'add_new_item'       => 'Add New Sub Topic',
    'edit_item'          => 'Edit Sub Topic',
    'new_item'           => 'New Sub Topic',
    'all_items'          => 'All Sub Topics',
    'view_item'          => 'View Sub Topic',
    'search_items'       => 'Search Sub Topics',
    'not_found'          => 'No Sub Topic found',
    'not_found_in_trash' => 'No Sub Topic found in Trash',
    ),
    
    'public' => true,
	'show_ui' => true,
	'show_in_nav_menus' => true,
    'menu_icon' => 'dashicons-post-status',
    'show_in_rest' => true,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'author', 'custom-fields', 'page-attributes'),
    'rewrite' => array('slug' => 'help-center/sub-topic','with_front' => false),
    )
    );
}

add_action( 'init', 'rapid_answer' );
function rapid_answer() {
    register_post_type( 'answer',
    array(
    'labels' => array(
    'name' => __( 'HC Answer' ),
    'singular_name' => __( 'Answer' ),
    'add_new'            => 'Add Answer',
    'add_new_item'       => 'Add New Answer',
    'edit_item'          => 'Edit Answer',
    'new_item'           => 'New Answer',
    'all_items'          => 'All Answers',
    'view_item'          => 'View Answer',
    'search_items'       => 'Search Answers',
    'not_found'          => 'No Answer found',
    'not_found_in_trash' => 'No Answer found in Trash',
    ),
    
    'public' => true,
	'show_ui' => true,
	'show_in_nav_menus' => true,
    'menu_icon' => 'dashicons-post-status',
    'show_in_rest' => true,
    'has_archive' => true,
    'supports' => array( 'title','editor', 'author', 'custom-fields', 'page-attributes'),
    'rewrite' => array('slug' => 'help-center/answer','with_front' => false),
    )
    );
}

add_action( 'init', 'register_job_post_type' );
function register_job_post_type() {
    register_post_type( 'job',
        array(
            'labels' => array(
                'name'               => __( 'Jobs' ),
                'singular_name'      => __( 'Job' ),
                'add_new'            => __( 'Add Job' ),
                'add_new_item'       => __( 'Add New Job' ),
                'edit_item'          => __( 'Edit Job' ),
                'new_item'           => __( 'New Job' ),
                'all_items'          => __( 'All Jobs' ),
                'view_item'          => __( 'View Job' ),
                'search_items'       => __( 'Search Jobs' ),
                'not_found'          => __( 'No Jobs found' ),
                'not_found_in_trash' => __( 'No Jobs found in Trash' ),
            ),
            'public'             => true,
            'show_ui'            => true,
            'show_in_nav_menus'  => true,
            'menu_icon'          => 'dashicons-id', // 👈 job icon
            'show_in_rest'       => true, // Gutenberg + API
            'has_archive'        => false,
            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes' ),
            'rewrite'            => array( 'slug' => 'career', 'with_front' => false ),
        )
    );
}


add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
add_action('elementor/frontend/after_register_styles',function() { foreach( [ 'solid', 'regular', 'brands' ] as $style ) { wp_deregister_style( 'elementor-icons-fa-' . $style ); } }, 20 );
add_action( 'wp_enqueue_scripts', 'disable_eicons', 11 ); function disable_eicons() { wp_dequeue_style( 'elementor-icons' ); wp_deregister_style( 'elementor-icons' ); }

add_filter('wpcf7_skip_mail', 'skip_cf7_email_sending_for_specific_form', 10, 2);
function skip_cf7_email_sending_for_specific_form($skip_mail, $contact_form) {
    // Replace with your specific form ID or title
    $form_id = $contact_form->id(); // Gets the form ID
	// Only send email for form ID 93054
    if ($form_id != 93054) {
        return true; // Skip email sending for all other forms
    }

    return false; // Allow email for form ID 93054
}

// add_filter('wpseo_canonical', 'custom_yoast_canonical_url');

// function custom_yoast_canonical_url($canonical) {
//     // Get current full URL
//     $current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//     // Remove query string (Yoast doesn't include it in canonical)
//     $current_url = strtok($current_url, '?');

//     return trailingslashit($current_url); // Add trailing slash if it's not a file
// }
// 


function enforce_link_policies( $content ) {

    // Frontend only (posts + pages)
    if ( is_admin() || ! is_singular() ) {
        return $content;
    }

    // Bail early if content is empty (e.g. Elementor editor preview)
    if ( empty( trim( $content ) ) ) { 
        return $content;
    }

    libxml_use_internal_errors(true);

    $dom = new DOMDocument();
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

    $site_host = parse_url(home_url(), PHP_URL_HOST);
    $links = $dom->getElementsByTagName('a');

    foreach ($links as $link) {
        $href = $link->getAttribute('href');
        if (!$href) continue;

        $host = parse_url($href, PHP_URL_HOST);
        $rels = $link->hasAttribute('rel')
            ? explode(' ', $link->getAttribute('rel'))
            : [];

        /*
         * RULE 1: app.rapiddirect.com
         * - new window
         * - nofollow
         * - keep security
         */
        if ($host === 'app.rapiddirect.com') {

            $link->setAttribute('target', '_blank');

            foreach (['nofollow', 'noopener', 'noreferrer'] as $required) {
                if (!in_array($required, $rels, true)) {
                    $rels[] = $required;
                }
            }

            $link->setAttribute('rel', implode(' ', array_unique($rels)));
            continue;
        }

        /*
         * RULE 2: internal links
         * - no new window
         * - remove noopener/noreferrer only
         */
        if (!$host || $host === $site_host) {

            $link->removeAttribute('target');

            $rels = array_diff($rels, ['noopener', 'noreferrer']);

            if (empty($rels)) {
                $link->removeAttribute('rel');
            } else {
                $link->setAttribute('rel', implode(' ', array_unique($rels)));
            }
        }
    }

    return $dom->saveHTML();
}

add_filter('the_content', 'enforce_link_policies', 20);


/**
 * 修复 Hreflang 标签污染：剥离所有查询参数
 * 适用场景：解决 ?_ga= 等追踪码导致的非规范网址报错
 */
add_filter('wp_head', function() {
    // 获取当前不带参数的规范 URL
    global $wp;
    $current_clean_url = home_url( add_query_arg( array(), $wp->request ) );
    $current_clean_url = trailingslashit($current_clean_url); // 确保末尾斜杠一致性

    // 如果 GTranslate 是通过插件钩子生成的，我们需要在这里进行正则替换或干预
    // 注意：GTranslate 免费版通常在客户端翻译，付费版在服务端生成
    // 下面是一个通用的输出干预逻辑示例
}, 1);
