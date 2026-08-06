<?php
/**
 * 产品手册管理
 * 目前仅支持全站唯一的产品手册。如果有多个文件的，暂时未实现，需要另外开发。
 */

// ================================ 入口/初始化 ================================

if ( ! defined ( 'ABSPATH' ) ) {
	header('HTTP/1.1 404 Not Found');
	exit('Not Found');
}

mml_theme_catalog_fn_init();

// ================================ 函数/方法 ================================

/**
 * 初始化
 */
function mml_theme_catalog_fn_init () {
	add_action( 'admin_menu', 'mml_theme_catalog_fn_register_menu' );
	add_action( 'admin_init', 'mml_theme_catalog_fn_save' );
}

/**
 * 注册管理后台菜单
 */
function mml_theme_catalog_fn_register_menu () {
	$capability = 'edit_theme_options';
	add_menu_page(
		'Catalog', // page title
		'Catalog', // menu title
		$capability, // capability
		'mml_theme_catelog', // slug
		'mml_theme_catalog_fn_admin_page',
		'dashicons-download'
	);
}

/**
 * 保存数据
 */
function mml_theme_catalog_fn_save () {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'mml_theme_catalog')) {
		$options = wp_parse_args([], $_POST);
		unset($options['_wpnonce']);
		unset($options['_wp_http_referer']);
		update_option('mml_theme_catalog', $options);
	}
}

/**
 * 获取文件链接
 */
function mml_theme_catalog_fn_get_file_link () {
	$opt = get_option('mml_theme_catalog', []);
	$file_link = isset($opt['file_link']) ? $opt['file_link'] : '';
	return $file_link;
}

/**
 * 获取显示的名称
 */
function mml_theme_catalog_fn_get_display_name () {
	$opt = get_option('mml_theme_catalog', []);
	$display_name = isset($opt['display_name']) ? $opt['display_name'] : '';
	return $display_name;
}

// -------- 跟 HTML 有关的，放到最后 --------

/**
 * 管理页面
 */
function mml_theme_catalog_fn_admin_page () {
	wp_enqueue_media();
	$opt = get_option('mml_theme_catalog', []);
	$file_link = isset($opt['file_link']) ? $opt['file_link'] : '';
	$display_name = isset($opt['display_name']) ? $opt['display_name'] : '';
	?>
	<div class="wrap">
		<!-- <h1>General Settings</h1> -->
		<form action="" method="post">
			<table class="form-table">
				<tr>
					<th>File</th>
					<td>
						<input type="text" class="regular-text J_file_link" name="file_link" value="<?php echo $file_link; ?>" />
						<input type="button" class="button button-default J_btnSelect" value="Select" />
						<p class="description">Input or Select</p>
					</td>
				</tr>
				<tr>
					<th>Title&nbsp;/&nbsp;Name</th>
					<td>
						<input type="text" class="regular-text" name="display_name" value="<?php echo $display_name; ?>" />
						<p class="description">Do NOT use any quotation mark</p>
					</td>
				</tr>
			</table>
			<p class="submit">
				<?php wp_nonce_field('mml_theme_catalog'); ?>
				<input type="submit" class="button button-primary" value="Save" />
			</p>
		</form>
		<div>
			<span>给开发人员:</span>
			<br />
			<span>使用 mml_theme_catalog_fn_get_file_link(); 和 mml_theme_catalog_fn_get_display_name(); 来获取数据</span>
		</div>
	</div>
	<script>
		(function (win, doc, $, undefined) {
			$(doc).ready(function () {
				var upload_frame;
				$('.J_btnSelect').click(function () {
					open(function (link) {
						$('.J_file_link').val(link)
					})
				})
				function open (cb) {
					if( upload_frame ){
						upload_frame.open();
						return;
					}
					upload_frame = wp.media({
						title: 'Select File',
						button: {
							text: 'Select',
						},
						multiple: false
					});
					upload_frame.on('select',function(){
						cb && cb(upload_frame.state().get('selection').first().toJSON().url)
					});
					upload_frame.on( 'close', function() {
						// console.log('close')
					} );
					upload_frame.open();
				}
			})
		})(window, document, jQuery);
	</script>
	<?php
}
