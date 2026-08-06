<?php
/**
 * 导出 Save CF7 插件保存的数据。
 * 默认不启用本功能。因为该插件已被 Flamingo 插件取代。
 * 需要启用时，只需要在 functions.php 中 require/include 本文件即可。
 * 仅支持 mml-theme 。菜单在 Theme Settings 下。
 *
 * 初始化代码在本文件的最后一行。
 */

class MML_Savecf7_Export {
	function __construct () {
		add_action( 'admin_menu', [ $this, 'on_admin_menu' ], 11, 0 );
		add_action( 'wp_ajax_on_export', [ $this, 'on_export' ]);
	}

	public function on_admin_menu () {
		// $parent_slug = 'mml-theme-setting';
		$parent_slug = 'save_contact_form_7'; // save_contact_form_7
		$capability = 'edit_theme_options';
		add_submenu_page(
			$parent_slug,
			'辅助功能 - SaveCF7 - MML Theme', // Page title
			'辅助功能', // menu_title,
			$capability, // capability,
			'mml-theme-setting-savecf7', // slug
			[ $this, 'on_page'] // function
		);
	}

	public function on_page () {
		global $wpdb;
		$results = $wpdb->get_results( "SELECT lookup_id,lookup_id,CFDBA_tbl_name,CF7_created_title,CF7_form_id FROM SaveContactForm7_lookup order by CF7_form_id");
		// var_dump($wpdb->get_results( "SELECT * FROM SaveContactForm7_lookup"));
		foreach ($results as $key => $value) {
			$results[$key]->count = $wpdb->get_var("Select Count(*) FROM " . $value->CFDBA_tbl_name);
			$results[$key]->data = $wpdb->get_results("Select * FROM " . $value->CFDBA_tbl_name . ' ORDER BY created_on DESC');
		}
		$is_writable = is_writable(wp_upload_dir()['basedir']);

		?>
		<div class="wrap">
			<style>
				.tab {}
				.tab .title {}
				.tab .content {}
				.tab .tab_content { display: none; }
				.tab .tab_content.active { display: block; }
				.tab .table-1 { border-color: #333; }
				.tab .table-2 { border-color: #cf9; }
				.tab td { word-wrap: break-word; word-break: break-all; }
				.tab .m-th { min-width: 80px; }
				.tab .hide { display: none; }
				.tab .show { display: block; }
			</style>
			<h1>Save CF7 插件辅助功能</h1>
			<div class="tab">
				<div class="title">
					<div class="tab_title tab_title_1 button" data-index="1">查看列表</div>
					<!-- <div class="tab_title tab_title_2 button" data-index="2">查看详情</div> -->
					<div class="tab_title tab_title_3 button" data-index="3">导出</div>
				</div>

				<div class="content">
					<!-- Tab: 查看列表 ================================ -->
					<div class="tab_content tab_content_1">
						<h2>查看列表</h2>
						<div>
							<table border="1" cellspacing="0" cellpadding="3" class="table-1">
								<tr>
									<th width="50">记录ID</th>
									<th width="50">表单ID</th>
									<th>表单名</th>
									<th>表名</th>
									<th>数据量</th>
								</tr>
								<?php foreach ($results as $key => $value) { ?>
									<tr style="background-color: #9cf;">
										<td><?php echo $value->lookup_id; ?></td>
										<td><?php echo $value->CF7_form_id; ?></td>
										<td style="color: #c33; font-weight: bold;"><?php echo $value->CF7_created_title; ?></td>
										<td><?php echo $value->CFDBA_tbl_name; ?></td>
										<td><?php echo $value->count; ?></td>
										<!-- <td>
											<?php if ($is_writable) { ?>

											<?php } ?>
										</td>
										<td class="J_tdDownload_<?php echo $value->lookup_id; ?>">
										</td> -->
									</tr>
									<tr>
										<td colspan="2">&nbsp;</td>
										<td colspan="3">
											<input type="button" class="J_btnShow button button-primary" value="展示 / 隐藏"
												data-id="<?php echo $value->lookup_id; ?>"
											>
											<div class="hide list-<?php echo $value->lookup_id; ?>">
												<?php if (count($value->data) > 0) { ?>
													<table border="1" cellspacing="0" cellpadding="3" class="table-2">
														<tr>
															<?php foreach ($value->data[0] as $k => $v) {
																if ($k === 'id') {
																	echo "<th width=\"50\">$k</th>";
																} else if ($k === 'created_on') {
																	echo "<th class=\"m-th\">$k</th>";
																} else {
																	echo "<th>$k</th>";
																}
															} ?>
														</tr>
														<?php foreach ($value->data as $k => $v) {
															echo "<tr>";
															foreach ($v as $k2 => $v2) {
																$v2 = esc_html($v2);
																$v2 = str_replace("\n", "<br />", $v2);
																echo "<td>" . $v2 . "</td>";
															}
															echo "</tr>";
														} ?>
													</table>
												<?php } else { ?>
													没有数据
												<?php } ?>
											</div>
										</td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>

					<!-- Tab: 查看详情 ================================ -->
					<div class="tab_content tab_content_2">
						<h2>查看详情</h2>
						<div class="info"></div>
						<div class="inqueries"></div>
					</div>

					<!-- Tab: 导出 ================================ -->
					<div class="tab_content tab_content_3">
						<h2>导出</h2>
						<?php
							if (!$is_writable) {
								echo '<div class="notice notice-error">没有权限，无法导出</div>';
							}
						?>
						<table border="1" cellspacing="0" cellpadding="3">
							<tr>
								<th>表单ID</th>
								<th>表单</th>
								<th>表</th>
								<th>数据量</th>
								<th>操作</th>
								<th>下载链接</th>
							</tr>
							<?php foreach ($results as $key => $value) { ?>
								<tr>
									<td><?php echo $value->CF7_form_id; ?></td>
									<td><?php echo $value->CF7_created_title; ?></td>
									<td><?php echo $value->CFDBA_tbl_name; ?></td>
									<td><?php echo $value->count; ?></td>
									<td>
										<?php if ($is_writable) { ?>
											<input type="button" class="J_btnExport button button-primary" value="导出"
												data-id="<?php echo $value->lookup_id; ?>"
												data-name="<?php echo $value->CFDBA_tbl_name; ?>"
												data-formid="<?php echo $value->CF7_form_id; ?>"
												data-formname="<?php echo $value->CF7_created_title; ?>"
											>
										<?php } ?>
									</td>
									<td class="J_tdDownload_<?php echo $value->lookup_id; ?>">
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
			<script>
				($ => {
					const AJAX_URL = '<?php echo admin_url('admin-ajax.php'); ?>';
					let $tabTitles, $tabContents
					let $btnShow
					$(document).ready(() => {
						$tabTitles = $('.tab_title')
						$tabContents = $('.tab_content')
						$btnShow = $('.J_btnShow')
						let isLoading = false
						$btnExport = $('.J_btnExport')
						$btnExport.click(function () {
							$this = $(this)
							let param = $this.data()
							param.action = 'on_export'
							console.log(param)
							if (isLoading) {
								return
							}
							$btnExport.addClass('disabled')
							isLoading = true
							$.post(AJAX_URL, param).done(ret => {
								console.log(ret)
								if (ret.success) {
									let arr = ret.data.replace(/\\/g, '/').split('/')
									if (arr.length > 1) {
										let name = arr[arr.length - 1]
										$('.J_tdDownload_' + param.id).html(`<a href="${ret.data}" download="${name}">${name}</a>`)
									} else {
										alert('出错了')
									}
								} else {
									alert('出错了!\n' + ret.data)
								}
							}).fail(err => {
								alert(err.message)
							}).always(() => {
								isLoading = false
								$btnExport.removeClass('disabled')
							})
						})

						$tabTitles.click(onTabTitleClicked)
						$btnShow.click(onShow)

						$($tabTitles.get(0)).click()
					})

					function onTabTitleClicked () {
						let $this = $(this)
						$tabTitles.removeClass('button-primary')
						$this.addClass('button-primary')

						$tabContents.removeClass('active')
						$('.tab_content_' + $this.data().index).addClass('active')
					}

					function onShow () {
						let $this = $(this)
						let id = $this.data().id
						let div = $('.list-' + id)
						if (div.hasClass('hide')) {
							div.removeClass('hide')
							div.addClass('show')
						} else {
							div.removeClass('show')
							div.addClass('hide')
						}
					}
				})(jQuery)
			</script>
		</div>
		<?php
	}

	public function on_export () {
		global $wpdb;
		$name = $_POST['name'];
		$formid = $_POST['formid'];
		$formname = $_POST['formname'];
		// 检查表名
		$exist = $wpdb->get_row($wpdb->prepare("SELECT * FROM SaveContactForm7_lookup WHERE CFDBA_tbl_name = %s", $name));
		if (!$exist) {
			wp_send_json_error('参数错误');
			return;
		}
		$results = $wpdb->get_results( "SELECT * FROM $name ORDER BY created_on" );
		$filename = date('Ymd-His') . '-' . $formname . '.csv';
		$upload_dir = wp_upload_dir();
		$file = $upload_dir['basedir'] . '/' . $filename;
		$pre = '"Form ID:","'.$formid.'","Form Name:","'.$formname.'"' . "\n";
		if (is_writable($upload_dir['basedir'])) {
			file_put_contents($file, $pre . $this->object_array_to_csv($results));
			wp_send_json_success($upload_dir['baseurl'] . '/' . $filename);
		} else {
			wp_send_json_error('没有写入权限');
		}
	}

	private function object_array_to_csv ($array) {
		$keys = '';
		if (count($array) > 0) {
			foreach ($array[0] as $key => $value) {
				$keys .= '"' . $key . '",';
			}
		}
		$values = '';
		foreach ($array as $key => $value) {
			$vs = '';
			foreach ($value as $k => $v) {
				$v = str_replace('"', "'", $v);
				$v = str_replace("\r", '', $v);
				$v = str_replace("\n", "  ", $v);
				$vs .= '"' . $v . '",';
			}
			$values .= $vs . "\n";
		}
		return "$keys\n$values";
	}
}

new MML_Savecf7_Export();
