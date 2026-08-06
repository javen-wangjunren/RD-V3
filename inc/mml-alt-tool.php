<?php
/**
 * 用于在 Media 里面设置 alt 文本的工具
 */

defined('ABSPATH') || die;

class MML_Alt_Tool {

	public static $parent_slug = 'upload.php';
	public static $capability = 'edit_theme_options';

	public static function init () {
		add_action( 'admin_menu', [ self::class, 'add_menu_page' ] );
		add_action( 'wp_ajax_mml_alt_save', [ self::class, 'save_alt_value' ] );
	}

	public static function page () {
		$list = self::get_list();
		?><div>
			<style>
				#mml_alt_table { background-color: white; }
				.mml-alt-text { color: #333; background-color: #ccc; }
			</style>
			<h1>MML Alt Tool</h1>
			<p class="description">加载过程可能有点慢，请稍等。</p>
			<p class="description">图片是缩略图（已裁切），可点击，在新窗口打开查看原图。</p>
			<table border="1" cellspacing="0" cellpadding="3" id="mml_alt_table">
				<thead>
					<tr>
						<th>ID</th>
						<th>图片</th>
						<th>信息</th>
						<th>ALT</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<script type="text/template" name="mml-alt-data"><?php echo json_encode($list); ?></script>
			<script type="text/template" name="mml-alt-template">
				<tr>
					<td>__id__</td>
					<td>
						<a href="__url__" target="_blank">
							<img style="max-width: 100px;" src="__thumbnail__" />
						</a>
					</td>
					<td>
						文件: __file__<br />
						类型: __mime_type__<br />
						title: <span class="mml-alt-text">__title__</span> &nbsp; <a href="javascript:void(0);" class="mml-alt-use" data-id="__id__" data-key="title">填到 alt 编辑框</a><br />
						caption: <span class="mml-alt-text">__caption__</span> &nbsp; <a href="javascript:void(0);" class="mml-alt-use" data-id="__id__" data-key="caption">填到 alt 编辑框</a><br />
						description: <span class="mml-alt-text">__description__</span> &nbsp; <a href="javascript:void(0);" class="mml-alt-use" data-id="__id__" data-key="description">填到 alt 编辑框</a><br />
						原 alt : <span class="mml-alt-text">__alt__</span> &nbsp; <a href="javascript:void(0);" class="mml-alt-use" data-id="__id__" data-key="alt">填到 alt 编辑框</a><br />
						自动生成: <span class="mml-alt-text">__default_alt__</span> &nbsp; <a href="javascript:void(0);" class="mml-alt-use" data-id="__id__" data-key="default_alt">填到 alt 编辑框</a><br />
					</td>
					<td width="350">
						<div>
							<input type="text" class="mml-alt-input" value="" data-id="__id__" />
							<!-- <input type="button" class="mml-alt-btn-save" value="保存" data-id="__id__" /> -->
						</div>
						<div class="mml-alt-tip">
							<span class="mml-alt-msg" data-id="__id__"></span>
						</div>
					</td>
				</tr>
			</script>
			<script>
				;(function ($) {
					var AJAX_URL = '<?php echo admin_url('admin-ajax.php'); ?>'
					var list

					var getItemById = function (id) {
						var found
						for (let i = 0; i < list.length; i++) {
							var item = list[i];
							if (item.id === id) {
								found = item
								break
							}
						}
						return found
					}

					var generateOneTemplate = function (item, template = '') {
						var html = template || $('script[name="mml-alt-template"]').html()
						Object.keys(item).forEach(function (key) {
							var regexp = new RegExp('__' + key + '__', 'g')
							html = html.replace(regexp, item[key])
						})
						return html
					}

					var setValues = function () {
						$('.mml-alt-input').each(function (index, input) {
							var $input = $(input)
							for (let i = 0; i < list.length; i++) {
								var item = list[i]
								if (item.id === $input.data().id) {
									$input.val(item.alt)
									input.oldValue = input.value
								}
							}
						})
						// $('.mml-alt-btn-save').hide()
					}

					var showList = function () {
						var html = ''
						list.forEach(function (item) {
							html += generateOneTemplate(item)
						})
						$('#mml_alt_table tbody').html(html)
					}

					$(document).ready(function () {
						list = JSON.parse($('script[name="mml-alt-data"]').html())

						showList()
						setValues()

						$('.mml-alt-input').blur(function () {
							var _this = this
							var $this = $(_this)
							$msg = $('span.mml-alt-msg[data-id="'+$this.data().id+'"]')
							if (_this.value !== _this.oldValue) {
								// $('input.mml-alt-btn-save[data-id='+$(this).data().id+']').show()
								$this.attr('disabled', true)
								$msg.html('正在保存...').css('color', 'gray')
								$.post(AJAX_URL, {
									action: 'mml_alt_save',
									id: $this.data().id,
									value: $this.val()
								}).done(function (ret) {
									console.log(ret)
									if (ret.success) {
										$msg.html('已保存<br />' + new Date().toString()).css('color', 'green')
										_this.oldValue = ret.data
										$this.val(ret.data)
									} else {
										$msg.html('保存失败，请重试: ' + (ret.data || '')).css('color', 'red')
									}
								}).fail(function (jqXhr) {
									$msg.html('请求失败，请重试').css('color', 'red')
								}).always(function () {
									$this.attr('disabled', false)
								})
							}
						})
						$('.mml-alt-btn-save').click(function () {})
						$('.mml-alt-use').click(function () {
							var _this = this
							var $this = $(_this)
							var data = $this.data()
							var id = data.id
							var key = data.key
							var selector = '.mml-alt-input[data-id="'+id+'"]'
							var $input = $(selector)
							var item = getItemById(id)
							$input.val(item[key])
							$input.focus()
						})
					})
				})(jQuery);
			</script>
		</div><?php
	}

	public static function add_menu_page () {
		// add_options_page('Page Title','Menu Title','manage_options','my_menu_page', 'my_menu_page_func');
		add_submenu_page(
			self::$parent_slug,
			'MML Alt Tool', // Page title
			'MML Alt Tool', // menu_title,
			self::$capability, // capability,
			'mml-alt-tool',
			[ self::class, 'page' ] // function
		);
	}

	private static function get_list () {
		$result = [];
		$posts = get_posts([
			'post_type' => 'attachment',
			'posts_per_page' => -1,
		]);
		foreach ($posts as $key => $value) {
			// wp_get_attachment_metadata($value->ID);
			// get_post_meta($value->ID)['_wp_attachment_metadata'];
			if ( strpos($value->post_mime_type, 'image/') !== 0 ) {
				continue;
			}

			$url = wp_get_attachment_url($value->ID);

			$fileName = pathinfo($url)['filename'];
			$alt = preg_replace(['/_/','/-/'], ' ', $fileName);
			$alt = preg_replace(['/\d+\w\d+$/'], '', $alt);

			$result[] = [
				'id' => $value->ID,
				'file' => get_post_meta($value->ID, '_wp_attached_file', true),
				'url' => $url,
				'thumbnail' => wp_get_attachment_image_url($value->ID),
				'mime_type' => $value->post_mime_type,
				'title' => $value->post_title,
				'caption' => $value->post_excerpt,
				'description' => $value->post_content,
				'alt' => get_post_meta($value->ID, '_wp_attachment_image_alt', true),
				'default_alt' => $alt, // getImageAlt($url),
				// 'wp_get_attachment_url' => wp_get_attachment_url($value->ID),
				// 'wp_get_original_image_url' => wp_get_original_image_url($value->ID),
				// 'wp_get_attachment_image_src' => wp_get_attachment_image_src($value->ID),
				// 'wp_get_attachment_image' => wp_get_attachment_image($value->ID),
				// 'wp_get_attachment_image_url' => wp_get_attachment_image_url($value->ID),
			];
		}
		// var_dump($result);
		// return $posts;
		return $result;
	}

	public static function save_alt_value () {
		if ( ! isset( $_POST['id'] ) ) {
			wp_send_json_error('id required');
			return;
		}
		if ( ! isset( $_POST['value'] ) ) {
			wp_send_json_error('value required');
			return;
		}
		$id = $_POST['id'];
		$value = $_POST['value'];
		$check = get_post($id);
		if ( $check === NULL ) {
			wp_send_json_error('id error');
			return;
		}

		update_post_meta($id, '_wp_attachment_image_alt', $value);
		wp_send_json_success(get_post_meta($id, '_wp_attachment_image_alt', true));
	}
}

MML_Alt_Tool::init();
