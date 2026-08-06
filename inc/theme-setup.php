<?php

function mml_theme_setup() {
	load_theme_textdomain( 'mml-theme', get_template_directory() . '/languages' );
	load_theme_textdomain( 'mml', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	register_nav_menu('mml-menu-1', __( 'MML Menu 1' ));
	register_nav_menu('mml-menu-2', __( 'MML Menu 2' ));

	register_sidebar(array('name' => __('Footer 1'), 'id' => 'footer1'));
	register_sidebar(array('name' => __('Footer 2'), 'id' => 'footer2'));
	register_sidebar(array('name' => __('Footer 3'), 'id' => 'footer3'));
	register_sidebar(array('name' => __('Footer 4'), 'id' => 'footer4'));
}

function mml_theme_fn_add_supports () {
	add_post_type_support( 'page', 'excerpt' );
}

function mml_theme_fn_add_admin_menu () {
	$parent_slug = 'mml-theme-setting';
	$capability = 'edit_theme_options';
	add_menu_page(
		'MML Theme Settings', // page title
		'Theme Settings', // menu title
		$capability, // capability
		$parent_slug, // slug
		'mml_theme_fn_theme_setting_page',
		'dashicons-admin-generic'
	);
	add_submenu_page(
		$parent_slug,
		'MML Theme Options', // Page title
		'Options', // menu_title,
		$capability, // capability,
		'mml-theme-setting-option',
		'mml_theme_fn_theme_setting_page' // function
	);
	add_submenu_page(
		$parent_slug,
		'Data - MML Theme', // Page title
		'Data', // menu_title,
		$capability, // capability,
		'mml-theme-setting-data',
		'mml_theme_fn_theme_data_page' // function
	);
	remove_submenu_page( $parent_slug, $parent_slug );
}

function mml_theme_fn_theme_setting_page () {
	get_template_part('include/page/theme-setting');
}

function mml_theme_fn_theme_data_page () {
	get_template_part('include/page/theme-data');
}

function mml_theme_fn_save_settings () {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mml_theme_post_form'])) {
		$form = $_POST['mml_theme_post_form'];
		if ($form === 'options'
			|| $form === 'blog'
			|| $form === 'contact'
			|| $form === 'code'
			|| $form === 'faq'
			|| $form === 'mail'
			|| $form === 'example') {
			mml_theme_fn_save_setting_common($form);
		}
	}
}

function mml_theme_fn_save_setting_common ($name) {
	if (wp_verify_nonce( $_POST['_wpnonce'], $name )) {
		$options = wp_parse_args([], $_POST);
		unset($options['mml_theme_post_form']);
		unset($options['_wpnonce']);
		unset($options['_wp_http_referer']);
		foreach ($options as $key => $value) {
			if (is_string($value)) {
				$options[$key] = stripslashes($value);
			}
		}
		update_option('mml-theme-opt-' . $name, $options);
	}
}

function mml_theme_fn_output_code_in_header () {
	$option_code = get_option('mml-theme-opt-code');
	if ($option_code) {
		echo isset($option_code['in_header']) ? stripslashes($option_code['in_header']) : '';
	}
}

function mml_theme_fn_output_code_after_body_opening () {
	$option_code = get_option('mml-theme-opt-code');
	if ($option_code) {
		echo isset($option_code['after_body_opening']) ? stripslashes($option_code['after_body_opening']) : '';
	}
}

function mml_theme_fn_output_code_before_body_closing () {
	$option_code = get_option('mml-theme-opt-code');
	if ($option_code) {
		echo isset($option_code['before_body_closing']) ? stripslashes($option_code['before_body_closing']) : '';
	}
}

function mml_theme_fn_output_sticky () {
	$options = get_option('mml-theme-opt-options', []);
	$opt_sticky = isset($options['sticky']) ? $options['sticky'] : '';
	$value = 'false';
	if ($opt_sticky === '1') {
		$value = 'true';
	}
	echo "<script>var isSticky = $value</script>\n";
}

function mml_theme_fn_output_favicon () {
	$options = get_option('mml-theme-opt-options', []);
	$opt_favicon = isset($options['favicon']) ? $options['favicon'] : '';
	if ($opt_favicon) {
		echo '<link rel="shortcut icon" href="' . $opt_favicon . '" />';
	}
}

function mml_theme_fn_output_typekit () {
	if (!mml_theme_fn_is_mobile()) {
		$options = get_option('mml-theme-opt-options', []);
		$opt_typekit = isset($options['typekit']) ? $options['typekit'] : '';
		if ($opt_typekit) {
			echo '<link rel="stylesheet" href="' . $opt_typekit . '">';
		}
	}
}

function mml_theme_fn_output_post_error_js () {
	$options = get_option('mml-theme-opt-options', []);
	$opt_post_js_error = isset($options['post_js_error']) ? $options['post_js_error'] : '';
	if ($opt_post_js_error !== 'y') {
		return;
	}
	$cache_dir = WP_CONTENT_DIR . '/cache';
	$cache_theme = $cache_dir . '/mml_theme';
	$cache_file = $cache_theme . '/post_error-' . date('Ymd') . '.js';
	if (!file_exists($cache_dir)) {
		mkdir($cache_dir, 0775, true);
		chmod($cache_dir, 0775);
	}
	if (!file_exists($cache_file)) {
		if (file_exists($cache_theme)) {
			rmdir($cache_theme);
		}
		mkdir($cache_theme, 0775, true);
		chmod($cache_theme, 0775);
		// jsConsole('get');
		$response = wp_remote_get('https://front.mmldigi.com/frontmsg/post_error.js');
		if ( is_array( $response ) && ! is_wp_error( $response ) ) {
			file_put_contents($cache_file, wp_remote_retrieve_body($response));
		}
	}
	if (!file_exists($cache_file)) {
		echo '<script>';
		echo 'console.warn("post_error.js error")';
		echo '</script>';
	} else {
		echo '<script>';
		echo file_get_contents($cache_file);
		echo '</script>';
	}
}

function mml_theme_on_phpmailer_init () {
	global $phpmailer;
	if ( ! is_null( $phpmailer )) {
		$mail_settings = get_option('mml-theme-opt-mail', []);
		if (isset($mail_settings['enable']) && $mail_settings['enable'] === 'y') {
			$phpmailer->IsSMTP();
			$phpmailer->SMTPAuth = true; // 启用 SMTPAuth 服务
			$phpmailer->Port = $mail_settings['Port']; // MTP 邮件发送端口，这个和下面的 SSL 验证对应，如果这里填写 25，则下面参数为空
			$phpmailer->SMTPSecure = isset($mail_settings['SMTPSecure']) ? $mail_settings['SMTPSecure'] : ''; // 是否验证 ssl，与 MTP 邮件发送端口对应，如果不填写，则上面的端口须为 25
			$phpmailer->Host = $mail_settings['Host']; // 邮箱的 SMTP 服务器地址，目前 smtp.exmail.qq.com 为 QQ 邮箱和腾讯企业邮箱 SMTP
			$phpmailer->Username = $mail_settings['Username']; // 你的邮箱地址
			$phpmailer->Password = $mail_settings['Password']; // 你的邮箱登录密码
		}
	}
}

function mml_theme_on_wp_mail_from ($from) {
	$mail_settings = $blog_settings = get_option('mml-theme-opt-mail', []);
	if (isset($mail_settings['enable']) && $mail_settings['enable'] === 'y' && isset($mail_settings['Username'])) {
		return $mail_settings['Username'];
	}
	return $from;
}
function mml_theme_on_wp_mail_from_name ($name) {
	$mail_settings = $blog_settings = get_option('mml-theme-opt-mail', []);
	if (isset($mail_settings['enable']) && $mail_settings['enable'] === 'y') {
		return $_SERVER['SERVER_NAME'];
	}
	return $name;
}

/**
 * 自定义菜单，在设置页面输出文本框
 */
function mml_theme_fn_custom_menu_field ($id, $item, $depth, $args) {
	// wp 和 插件ACF 都执行这个 action: wp_nav_menu_item_custom_fields
	// 导致输出2次，所以做个判断，如果已经输出，则不重复输出。
	global $mml_menu_cf_output;
	if (empty($mml_menu_cf_output)) {
		$mml_menu_cf_output = [];
	}
	if ($mml_menu_cf_output[$id] === true) {
		return;
	}
	$mml_menu_cf_output[$id] = true;

	if ($depth > 0) {
		echo '<p class="description description-wide">';
		echo '<label>自定义菜单的代码';
		echo '<textarea class="widefat" id="edit-menu-item-code-' . $id . '" name="menu-item-code[' . $id . ']" placeholder="如果不是自定义菜单，请留空">';
		$value = get_post_meta($id, 'mml_theme_menu_code', true);
		if ($value) {
			echo $value;
		}
		echo '</textarea></label>';
		echo '<span class="description">当前菜单会被这个自定义菜单代替。这个菜单的所有子菜单将被忽略。</span>';
		echo '</p>';
	}
}

/**
 * 自定义菜单，保存设置的代码
 */
function mml_theme_fn_custom_menu_field_save ($menu_id, $menu_item_db_id, $menu_item_args) {
    if ( isset($_POST['menu-item-code']) && is_array( $_POST['menu-item-code']) && isset($_POST['menu-item-code'][$menu_item_db_id]) ) {
        $code = $_POST['menu-item-code'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'mml_theme_menu_code', $code );
    }
}

/**
 * 自定义菜单，在读取菜单时，加入自定义属性
 */
function mml_theme_fn_custom_menu_setup_code( $menu_item ) {
    $menu_item->custom_menu_code = get_post_meta( $menu_item->ID, 'mml_theme_menu_code', true );
    return $menu_item;
}

/**
 * 把菜单标记为激活状态，用于输出激活样式。
 *
 * @param Array $items 全部菜单项
 * @param String $url  当前链接，对应的是 $_SERVER['REQUEST_URI']
 */
function mml_theme_fn_mark_menu_active ($items, $url) {
	if (!$items || !is_array($items) || !$url || !is_string($url)) {
		return;
	}
	$current = false;
	$host_url = get_option('siteurl') . $url;
	foreach ($items as $index => $item) {
		if ($item->url == $host_url || explode('?', $item->url)[0] == $host_url) {
			$current = $item;
			break;
		}
	}
	if (!$current) {
		return;
	}
	$current->active = true;
	$parent = (int)$current->menu_item_parent;
	$count = 0;
	while ($parent !== 0 && $count < 100) {
		$count++;
		foreach ($items as $key => $item) {
			if ($item->ID === $parent) {
				$item->active_ancestor = true;
				$parent = (int)$item->menu_item_parent;
			}
			if ($item->ID === (int)$current->menu_item_parent) {
				$item->active_parent = true;
			}
		}
	}
}

/**
 * 输出菜单。此方法不对外公开。开发人员请调用 mml_theme_fn_nav_menu 或 mtf_menu 方法。
 *
 * @param Array $items 全部菜单项。
 * @param Object $parent 父级菜单。对于一级菜单，这里传递 $menu/$term 对象。对于二级及以上菜单，这里传父级 $menu_item 对象。
 * @param Int $level 菜单层级。1 表示一级菜单，2 表示二级菜单。以此类推。
 * @return None 没有返回值，全部直接输出。
 */
function mml_theme_fn_display_menu ($items, $parent, $level = 1) {
	if (!is_array($items) || count($items) < 1) {
		return;
	}
	if (!$parent) {
		return;
	}

	$parent_id = '0';
	if ($level > 1) {
		$parent_id = (string)$parent->ID;
	}
	$sub_items = [];
	foreach ($items as $key => $item) {
		if ($item->menu_item_parent === $parent_id) {
			$sub_items[] = $item;
		}
	}
	if (count($sub_items) < 1) {
		return;
	}

	// UL
	echo '<ul';
	$class_level = 'menu-level-' . $level;
	if ($level < 2) {
		echo ' id="menu-' . $parent->slug . '"';
		echo ' class="menu ' . $class_level . '"';
	} else {
		echo ' class="sub-menu menu-level-' . $level . '"';
	}
	echo '>'; // end ul
	foreach ($sub_items as $key => $value) {
		$has_children = false;
		foreach ($items as $item) {
			if ($item->menu_item_parent === '' . $value->ID) {
				$has_children = true;
				break;
			}
		}
		// LI
		// $value->xfn     li rel=""
		echo '<li id="menu-item-' . $value->ID . '" class="menu-item menu-item-' . $value->ID
			. ' menu-type-' . $value->type;
		if ($value->classes && count($value->classes) > 0) {
			foreach ($value->classes as $c) {
				if ($c) {
					echo ' ' . $c;
				}
			}
		}
		$is_template = false;
		if ($level > 1 && $value->description) {
			$is_template = true;
		}
		if ($has_children && !$is_template) {
			echo ' menu-item-has-children';
		}
		if ($value->active) {
			echo ' current-menu-item';
		}
		if ($value->active_ancestor) {
			echo ' current-menu-ancestor';
		}
		if ($value->active_parent) {
			echo ' current-menu-parent';
		}
		echo '">'; // end class and li
		if ($level > 1 && $value->custom_menu_code) {
			echo '<script type="text/templates" id="menu-item-' . $value->ID . '-template">';
			// echo apply_filters('the_content', $value->custom_menu_code);
			echo do_shortcode($value->custom_menu_code);
			echo '</script>';
		} else {
			// A
			echo '<a';
			if ($value->url !== '##') {
				echo ' href="' . $value->url . '"';
			}
			if ($value->attr_title) {
				echo ' title="' . $value->attr_title . '"';
			}
			if ($value->target) {
				echo ' target="' . $value->target . '"';
			}
			echo '>'; // end a
			echo $value->title;
			if ($has_children) {
				echo '<i class="menu-arrow fas fa-chevron-down"></i>';
			}
			echo '</a>';
			mml_theme_fn_display_menu($items, $value, $level + 1);
		} // end else $value->description
		echo '</li>';
	}

	if ($level === 1) {
		$wp_nav_menu_items = apply_filters( 'wp_nav_menu_items', '', (object)[ 'theme_location' => 'mml-menu-1' ] );
		if ($wp_nav_menu_items) {
			echo $wp_nav_menu_items;
		}
	}

	echo '</ul>';
}

/**
 * 输出导航菜单。
 *
 * @param String $theme_location 菜单所在位置。
 * @param Array $args 参数
 * @param String      $args['class'] CSS 类，多个可用空格隔开
 */
function mml_theme_fn_nav_menu ($theme_location, $args = []) {
	if (!$theme_location || !is_string($theme_location)) {
		return;
	}
	$menu_id = get_nav_menu_locations()[$theme_location]; // term_id
	if (!$menu_id) { // NULL
		return;
	}
	$menu = wp_get_nav_menu_object($menu_id); // term
	if (!$menu) { // false
		return;
	}
	$items = wp_get_nav_menu_items($menu);
	if (!$items) { // false
		return;
	}
	mml_theme_fn_mark_menu_active($items, $_SERVER['REQUEST_URI']);
	$has_template = false;
	foreach ($items as $index => $item) {
		if ($item->custom_menu_code) {
			$has_template = true;
			break;
		}
	}
	echo '<div class="menu-container menu-' . $menu->slug . '-container';
	if ($has_template) {
		echo ' has-template';
	}
	if ($args['class']) {
		echo ' ' . $args['class'];
	}
	echo '">';
	mml_theme_fn_display_menu($items, $menu);
	echo '</div>';
}

function mml_theme_fn_powered_by () {
	echo '<meta name="powered-by" content="Powered By MML Digital Marketing. View https://www.mmldigi.com." />' . "\n";
}


/**
 * Force update script versions for caching
 */
add_action('wp_enqueue_scripts', function() {
    global $wp_scripts;
    $timestamp = time(); // Use current time to bust cache immediately

    // Update mml-menu.js version
    if (isset($wp_scripts->registered['mml-js-menu'])) {
        $wp_scripts->registered['mml-js-menu']->ver = $timestamp;
    }

    // Update rapiddirect.min.js version
    if (isset($wp_scripts->registered['mml-js-rapiddirect'])) {
        $wp_scripts->registered['mml-js-rapiddirect']->ver = $timestamp;
    }
}, 100);