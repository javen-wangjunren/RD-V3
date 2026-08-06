
<?php
global $wp_version;

$theme_uri = get_stylesheet_directory_uri();
$form_options = 'options';
$form_blog = 'blog';

$options = get_option('mml-theme-opt-' . $form_options, []);
$opt_page_layout = isset($options['page_layout']) ? $options['page_layout'] : '';
$opt_header_layout = isset($options['header_layout']) ? $options['header_layout'] : '';
$opt_sticky = isset($options['sticky']) ? $options['sticky'] : '';
$opt_show_btt = isset($options['show_btt']) ? $options['show_btt'] : '';
$opt_logo = isset($options['logo']) ? $options['logo'] : '';
$opt_favicon = isset($options['favicon']) ? $options['favicon'] : '';
$opt_typekit = isset($options['typekit']) ? $options['typekit'] : '';
$opt_google_map_key = isset($options['google_map_key']) ? $options['google_map_key'] : '';
$opt_portfolio_category_template = isset($options['portfolio_category_template']) ? $options['portfolio_category_template'] : '';
$opt_post_js_error = isset($options['post_js_error']) ? $options['post_js_error'] : '';
$enable_email_link = isset($options['enable_email_link']) ? $options['enable_email_link'] : '';
$opt_hide_side_recent_blog = isset($options['hide_side_recent_blog']) ? $options['hide_side_recent_blog'] : '';

$blog_settings = get_option('mml-theme-opt-' . $form_blog, []);
$blog_layout = isset($blog_settings['layout']) ? $blog_settings['layout'] : '';
$blog_column = isset($blog_settings['column']) ? $blog_settings['column'] : '';
$blog_page_size = isset($blog_settings['page_size']) ? $blog_settings['page_size'] : '';

$last_form = isset($_POST['mml_theme_post_form']) ? $_POST['mml_theme_post_form'] : '';
?>

<link href="<?php echo $theme_uri; ?>/include/css/jquery-ui-v1.12.1.min.css" rel="stylesheet">

<style>
	.img-tr td {
		text-align: center;
	}
</style>

<div class="">
	<h1>MML Theme Settings</h1>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Basic Options</a></li>
			<li><a href="#tabs-2">Blog Settings</a></li>
			<li><a href="#tabs-3">Mail</a></li>
			<li><a href="#tabs-9">System Info</a></li>
		</ul>
		<div id="tabs-1">
			<form action="" method="post" enctype="application/x-www-form-urlencoded">
				<table class="form-table">
					<tr>
						<th>Page Layout</th>
						<td>
							<table>
								<tr class="img-tr">
									<td>
										<label>
											<img src="<?php echo $theme_uri; ?>/include/img/full-width.png" alt="full width">
											<br />
											<input type="radio" name="page_layout" value="full-width" <?php echo $opt_page_layout === 'full-width' ? 'checked' : '' ; ?> /> Full Width
										</label>
									</td>
									<td>
										<label>
											<img src="<?php echo $theme_uri; ?>/include/img/boxed.png" alt="boxed">
											<br />
											<input type="radio" name="page_layout" value="boxed" <?php echo $opt_page_layout === 'boxed' ? 'checked' : '' ; ?> /> Boxed
										</label>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>Header Layout</th>
						<td>
							<table>
								<tr class="img-tr">
									<td>
										<label>
											<img src="<?php echo $theme_uri; ?>/include/img/menu-layout-classic.png" alt="classic">
											<br />
											<input type="radio" name="header_layout" value="classic" <?php echo $opt_header_layout === 'classic' ? 'checked' : '' ; ?> /> Classic
										</label>
									</td>
									<td>
										<label>
											<img src="<?php echo $theme_uri; ?>/include/img/menu-layout-stack.png" alt="stack">
											<br />
											<input type="radio" name="header_layout" value="stack" <?php echo $opt_header_layout === 'stack' ? 'checked' : '' ; ?> /> Stack
										</label>
									</td>
									<td>
										<label>
											<img src="<?php echo $theme_uri; ?>/include/img/menu-layout-split.png" alt="split menu">
											<br />
											<input type="radio" name="header_layout" value="split-menu clearfix" <?php echo $opt_header_layout === 'split-menu clearfix' ? 'checked' : '' ; ?> /> Split Menu
										</label>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>Sticky Menu</th>
						<td>
							<fieldset>
								<label>
									<input type="radio" name="sticky" value="1" <?php echo $opt_sticky === '1' ? 'checked' : '' ; ?>>&nbsp;Yes
								</label>
								&nbsp;
								<label>
									<input type="radio" name="sticky" value="0" <?php echo $opt_sticky !== '1' ? 'checked' : '' ; ?>>&nbsp;No
								</label>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th>Back to top</th>
						<td>
							<fieldset>
								<label>
									<input type="radio" name="show_btt" value="y" <?php echo $opt_show_btt === 'y' ? 'checked' : '' ; ?>>&nbsp;Show
								</label>
								&nbsp;
								<label>
									<input type="radio" name="show_btt" value="n" <?php echo $opt_show_btt !== 'y' ? 'checked' : '' ; ?>>&nbsp;Hide
								</label>
							</fieldset>
							<p class="description">是否输出 "back to top" 的 HTML 和 JS 到 footer</p>
						</td>
					</tr>
					<tr>
						<th>Logo</th>
						<td>
							<?php
								if ($opt_logo) {
									echo '<p><img src="' . $opt_logo . '" /></p>';
								}
							?>
							<input type="text" class="regular-text" name="logo" value="<?php echo esc_attr($opt_logo); ?>">
							<p class="description">举例: /wp-content/themes/betheme-child/dist/img/nav/logo.png</p>
						</td>
					</tr>
					<tr>
						<th>Favicon</th>
						<td>
							<?php
								if ($opt_favicon) {
									echo '<p><img src="' . $opt_favicon . '" /></p>';
								}
							?>
							<input type="text" class="regular-text" name="favicon" value="<?php echo esc_attr($opt_favicon); ?>">
							<p class="description">举例: /wp-content/themes/betheme-child/dist/img/nav/favicon.ico</p>
						</td>
					</tr>
					<tr>
						<th>Typekit</th>
						<td>
							<input type="text" class="regular-text" name="typekit" value="<?php echo esc_attr($opt_typekit); ?>">
							<p class="description">手机端不输出。举例：https://use.typekit.net/nka2dfa.css</p>
						</td>
					</tr>
					<tr>
						<th>Google Map API Key</th>
						<td>
							<input type="text" class="regular-text" name="google_map_key" value="<?php echo esc_attr($opt_google_map_key); ?>">
						</td>
					</tr>
					<tr>
						<th>Enable Portfolio Category Template</th>
						<td>
							<input type="checkbox" class="" name="portfolio_category_template" value="y" <?php echo $opt_portfolio_category_template === 'y' ? 'checked' : '' ; ?>>
							<p class="description">在 Portfolio Category 页面增加 Template 字段。<br />
							使用 mtf_get_portfolio_category_template ($term_id) 来获取选中的模板。<br />
							（参考 inc/common.php）</p>
						</td>
					</tr>
					<tr>
						<th>Enable email link</th>
						<td>
							<input type="checkbox" class="" name="enable_email_link" value="y" <?php echo $enable_email_link === 'y' ? 'checked' : '' ; ?>>
							<p class="description">Display email with link.</p>
						</td>
					</tr>
					<tr>
						<th>Post JS Error</th>
						<td>
							<input type="checkbox" class="" name="post_js_error" value="y" <?php echo $opt_post_js_error === 'y' ? 'checked' : '' ; ?>>
						</td>
					</tr>
					<tr>
						<th>Hide recent blog on the side</th>
						<td>
							<input type="checkbox" class="" name="hide_side_recent_blog" value="y" <?php echo $opt_hide_side_recent_blog === 'y' ? 'checked' : '' ; ?>>
							<p class="description">隐藏博客详情页的侧边栏"Recent Blog"</p>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php wp_nonce_field( $form_options ); ?>
							<input type="hidden" name="mml_theme_post_form" value="<?php echo $form_options; ?>" />
							<input type="submit" value="Save" class="button button-primary" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="tabs-2">
			<form action="" method="post" enctype="application/x-www-form-urlencoded">
				<table class="form-table">
					<tr>
						<th>Layout</th>
						<td>
							<table>
								<tr class="img-tr">
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=0" alt="0">
											<br />
											<input type="radio" name="layout" value="0" <?php echo $blog_layout === '0' ? 'checked' : '' ; ?> /> 0
										</label>
									</td>
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=1" alt="1">
											<br />
											<input type="radio" name="layout" value="1" <?php echo $blog_layout === '1' ? 'checked' : '' ; ?> /> 1
										</label>
									</td>
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=2" alt="2">
											<br />
											<input type="radio" name="layout" value="2" <?php echo $blog_layout === '2' ? 'checked' : '' ; ?> /> 2
										</label>
									</td>
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=3" alt="3">
											<br />
											<input type="radio" name="layout" value="3" <?php echo $blog_layout === '3' ? 'checked' : '' ; ?> /> 3
										</label>
									</td>
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=4" alt="4">
											<br />
											<input type="radio" name="layout" value="4" <?php echo $blog_layout === '4' ? 'checked' : '' ; ?> /> 4
										</label>
									</td>
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=5" alt="5">
											<br />
											<input type="radio" name="layout" value="5" <?php echo $blog_layout === '5' ? 'checked' : '' ; ?> /> 5
										</label>
									</td>
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=6" alt="6">
											<br />
											<input type="radio" name="layout" value="6" <?php echo $blog_layout === '6' ? 'checked' : '' ; ?> /> 6
										</label>
									</td>
									<td>
										<label>
											<img src="http://iph.href.lu/64x64?text=7" alt="7">
											<br />
											<input type="radio" name="layout" value="7" <?php echo $blog_layout === '7' ? 'checked' : '' ; ?> /> 7
										</label>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>Columns</th>
						<td>
							<label>
								<input type="radio" name="column" value="1" <?php echo $blog_column === '1' ? 'checked' : '' ; ?> /> 1 &nbsp;&nbsp;
							</label>
							<label>
								<input type="radio" name="column" value="2" <?php echo $blog_column === '2' ? 'checked' : '' ; ?> /> 2 &nbsp;&nbsp;
							</label>
							<label>
								<input type="radio" name="column" value="3" <?php echo $blog_column === '3' ? 'checked' : '' ; ?> /> 3 &nbsp;&nbsp;
							</label>
						</td>
					</tr>
					<tr>
						<th>Page Size</th>
						<td>
							<input type="text" class="regular-text" name="page_size" value="<?php echo esc_attr($blog_page_size); ?>">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php wp_nonce_field( $form_blog ); ?>
							<input type="hidden" name="mml_theme_post_form" value="<?php echo $form_blog; ?>" />
							<input type="submit" value="Save" class="button button-primary" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="tabs-3">
			<?php
				$form_mail = 'mail';
				$mail_settings = $blog_settings = get_option('mml-theme-opt-' . $form_mail, []);
				$mail_setting_enable = isset($mail_settings['enable']) ? $mail_settings['enable'] : '';
				$mail_setting_provider = isset($mail_settings['provider']) ? $mail_settings['provider'] : 'custom';
				// $mail_setting_SMTPAuth = isset($mail_settings['SMTPAuth']) ? $mail_settings['SMTPAuth'] : '';
				$mail_setting_Port = isset($mail_settings['Port']) ? $mail_settings['Port'] : '';
				$mail_setting_SMTPSecure = isset($mail_settings['SMTPSecure']) ? $mail_settings['SMTPSecure'] : '';
				$mail_setting_Host = isset($mail_settings['Host']) ? $mail_settings['Host'] : '';
				$mail_setting_Username = isset($mail_settings['Username']) ? $mail_settings['Username'] : '';
				$mail_setting_Password = isset($mail_settings['Password']) ? $mail_settings['Password'] : '';
			?>
			<h2>Mail Settings</h2>
			<form action="" method="post" enctype="application/x-www-form-urlencoded">
				<table class="form-table">
					<tr>
						<th>是否启用</th>
						<td>
							<input type="checkbox" name="enable" value="y" <?php echo $mail_setting_enable === 'y' ? 'checked' : ''; ?> >
							<p class="description">如果不勾选，这里的配置将不生效。但仍可以保存。</p>
						</td>
					</tr>
					<tr>
						<th>邮件服务商</th>
						<td>
							<select name="provider">
								<option value="custom" <?php echo $mail_setting_provider === 'custom' ? 'selected' : ''; ?> >自定义</option>
								<option value="tencent" <?php echo $mail_setting_provider === 'tencent' ? 'selected' : ''; ?> >腾讯企业邮箱</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>邮箱地址（发件箱）</th>
						<td>
							<input type="text" class="regular-text" name="Username" value="<?php echo esc_attr($mail_setting_Username); ?>" />
						</td>
					</tr>
					<tr>
						<th>邮箱密码</th>
						<td>
							<input type="password" class="regular-text" name="Password" value="<?php echo esc_attr($mail_setting_Password); ?>" />
						</td>
					</tr>
					<tr>
						<th>SMTP 服务器</th>
						<td>
							<input type="text" class="regular-text" name="Host" value="<?php echo esc_attr($mail_setting_Host); ?>" />
						</td>
					</tr>
					<tr>
						<th>端口</th>
						<td>
							<input type="text" class="regular-text" name="Port" value="<?php echo esc_attr($mail_setting_Port); ?>" />
						</td>
					</tr>
					<tr>
						<th>开启 SSL</th>
						<td>
							<input type="checkbox" name="SMTPSecure" value="ssl" <?php echo $mail_setting_SMTPSecure === 'ssl' ? 'checked' : ''; ?> >
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php wp_nonce_field( $form_mail ); ?>
							<input type="hidden" name="mml_theme_post_form" value="<?php echo $form_mail; ?>" />
							<input type="submit" value="Save" class="button button-primary" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="tabs-9">
			<table>
				<tr>
					<td>Wordpress Version: </td>
					<td><?php echo $wp_version; ?></td>
				</tr>
				<tr>
					<td>PHP 版本: </td>
					<td><?php echo PHP_VERSION; ?></td>
				</tr>
				<tr>
					<td>服务器操作系统: </td>
					<td><?php echo PHP_OS; ?></td>
				</tr>
				<tr>
					<td>服务器端信息: </td>
					<td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
				</tr>
				<tr>
					<td>最大上传限制: </td>
					<td><?php echo get_cfg_var("upload_max_filesize") ? get_cfg_var("upload_max_filesize") : "不允许上传附件"; ?></td>
				</tr>
				<tr>
					<td>最大执行时间: </td>
					<td><?php echo get_cfg_var("max_execution_time") . "秒 "; ?></td>
				</tr>
				<tr>
					<td>脚本运行占用最大内存: </td>
					<td><?php echo get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无"; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<script src="<?php echo $theme_uri; ?>/include/js/jquery-ui-v1.12.1.min.js"></script>

<script>
	var last_form = '<?php echo $last_form; ?>';
	(function (doc, win, $) {
		$(doc).ready(function () {
			var active = 0
			var hash_id  = 0

			// 先由 hash 决定显示的 tab
			var hash = window.location.hash
			if (hash) {
				hash_id = parseInt(hash.replace('#tab_', ''))
				if (!isNaN(hash_id)) {
					if (hash_id !== 9) {
						active = hash_id - 1
					}
				}
			}

			// last form 可以覆盖要显示的 tab
			if (last_form === '<?php echo $form_blog; ?>') {
				active = 1
			} else if (last_form === '<?php echo $form_mail; ?>') {
				active = 2
			}

			$('#tabs').tabs({
				active: active,
				activate: function (e, ui) {
					// console.log(ui.newPanel[0])
					var domId = ui.newPanel.attr('id')
					var id = domId.replace('tabs-', '')
					window.location.hash =  '#tab_' + id
				}
			})
		})
	})(document, window, jQuery);

	// Mail
	(function ($) {
		var $container, $provider, $host, $port, $secure
		var settings = {
			custom: { username: '', password: '', host: '', port: 465, secure: true },
			tencent: { username: '', password: '', host: 'hwsmtp.exmail.qq.com', port: 465, secure: true },
			ali: {}
		}
		$(document).ready(function () {
			$container = $('#tabs-3')
			$provider = $('select[name=provider]', $container)
			$host = $('input[name=Host]', $container)
			$port = $('input[name=Port]', $container)
			$secure = $('input[name=SMTPSecure]', $container)

			$provider.change(onMailProviderChange)

			if ($provider.val() === 'custom') {
				settings.custom.host = $('input[name=Host]').val()
				settings.custom.port = $('input[name=Port]').val()
				settings.custom.secure = $('input[name=SMTPSecure]').is(':checked')
			}

			$provider.change()
		})

		function onMailProviderChange () {
			var provider = $provider.val()
			setValues(settings[provider])
		}

		function setValues(setting) {
			$host.val(setting.host)
			$port.val(setting.port.toString())
			var chkSMTPSecure = $secure[0]
			if (setting.secure && !chkSMTPSecure.checked) {
				chkSMTPSecure.checked = true
			}
			if (!setting.secure && chkSMTPSecure.checked) {
				chkSMTPSecure.checked = false
			}
		}
	})(jQuery);
</script>

<?php
