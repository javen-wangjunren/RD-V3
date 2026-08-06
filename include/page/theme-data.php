<?php
global $wp_version;

$theme_uri = get_stylesheet_directory_uri();
$form_contact = 'contact';
$form_code = 'code';
$form_faq = 'faq';
$option_prefix = 'mml-theme-opt-';

$option_contact = get_option($option_prefix . $form_contact, []);
$mobile1 = isset($option_contact['mobile1']) ? $option_contact['mobile1'] : '';
$mobile2 = isset($option_contact['mobile2']) ? $option_contact['mobile2'] : '';
$tel1 = isset($option_contact['tel1']) ? $option_contact['tel1'] : '';
$tel2 = isset($option_contact['tel2']) ? $option_contact['tel2'] : '';
$fax1 = isset($option_contact['fax1']) ? $option_contact['fax1'] : '';
$fax2 = isset($option_contact['fax2']) ? $option_contact['fax2'] : '';
$email1 = isset($option_contact['email1']) ? $option_contact['email1'] : '';
$email2 = isset($option_contact['email2']) ? $option_contact['email2'] : '';
$address = isset($option_contact['address']) ? $option_contact['address'] : '';
$copyright = isset($option_contact['copyright']) ? $option_contact['copyright'] : '';
$facebook = isset($option_contact['facebook']) ? $option_contact['facebook'] : '';
$twitter = isset($option_contact['twitter']) ? $option_contact['twitter'] : '';
$linkedin = isset($option_contact['linkedin']) ? $option_contact['linkedin'] : '';
$youtube = isset($option_contact['youtube']) ? $option_contact['youtube'] : '';
$whatsapp = isset($option_contact['whatsapp']) ? $option_contact['whatsapp'] : '';
$instagram = isset($option_contact['instagram']) ? $option_contact['instagram'] : '';
$pinterest = isset($option_contact['pinterest']) ? $option_contact['pinterest'] : '';

$option_code = get_option($option_prefix . $form_code, []);
$code_in_header = isset($option_code['in_header']) ? $option_code['in_header'] : '';
$code_after_body_opening = isset($option_code['after_body_opening']) ? $option_code['after_body_opening'] : '';
$code_before_body_closing = isset($option_code['before_body_closing']) ? $option_code['before_body_closing'] : '';

$option_faq = get_option($option_prefix . $form_faq, [ 'list' => [] ]);
if (!isset($option_faq['list']) || !is_array($option_faq['list'])) {
	$option_faq['list'] = [];
}

$last_form = isset($_POST['mml_theme_post_form']) ? $_POST['mml_theme_post_form'] : '';

?>

<link href="<?php echo $theme_uri; ?>/include/css/jquery-ui-v1.12.1.min.css" rel="stylesheet">

<style>
	.faq {}
	.faq .container {
		border: 1px solid #aaa;
		padding: 10px;
	}
	.faq .container .item {
		border: 1px solid #ddd;
		padding: 10px;
		margin-bottom: 10px;
		background-color: #eee;
	}
	.faq .btns {
		padding: 10px 0;
	}
</style>

<div class="">
	<h1>Data</h1>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Contact</a></li>
			<li><a href="#tabs-2">Code</a></li>
			<li><a href="#tabs-3">FAQ</a></li>
		</ul>
		<div id="tabs-1">
			<form action="" method="post">
				<table class="form-table">
					<tr>
						<td colspan="2">
							<h2>Contact</h2>
						</td>
					</tr>
					<tr>
						<th>Mobile 1</th>
						<td><input type="text" class="regular-text" maxlength="30" name="mobile1" value="<?php echo esc_attr($mobile1); ?>"></td>
						<th>Mobile 2</th>
						<td><input type="text" class="regular-text" maxlength="30" name="mobile2" value="<?php echo esc_attr($mobile2); ?>"></td>
					</tr>
					<tr>
						<th>Telephone 1</th>
						<td><input type="text" class="regular-text" maxlength="30" name="tel1" value="<?php echo esc_attr($tel1); ?>"></td>
						<th>Telephone 2</th>
						<td><input type="text" class="regular-text" maxlength="30" name="tel2" value="<?php echo esc_attr($tel2); ?>"></td>
					</tr>
					<tr>
						<th>Email 1</th>
						<td><input type="text" class="regular-text" maxlength="100" name="email1" value="<?php echo esc_attr($email1); ?>"></td>
						<th>Email 2</th>
						<td><input type="text" class="regular-text" maxlength="100" name="email2" value="<?php echo esc_attr($email2); ?>"></td>
					</tr>
					<tr>
						<th>Fax 1</th>
						<td><input type="text" class="regular-text" maxlength="30" name="fax1" value="<?php echo esc_attr($fax1); ?>"></td>
						<th>Fax 2</th>
						<td><input type="text" class="regular-text" maxlength="30" name="fax2" value="<?php echo esc_attr($fax2); ?>"></td>
					</tr>
					<tr>
						<th>Whatsapp</th>
						<td><input type="text" class="regular-text" maxlength="50" name="whatsapp" value="<?php echo esc_attr($whatsapp); ?>"></td>
					</tr>
					<tr>
						<th>Address</th>
						<td><input type="text" class="regular-text" maxlength="500" name="address" value="<?php echo esc_attr($address); ?>"></td>
					</tr>
					<tr>
						<th>Copy Right</th>
						<td><input type="text" class="regular-text" maxlength="500" name="copyright" value="<?php echo esc_attr($copyright); ?>"></td>
					</tr>
					<tr>
						<td colspan="2">
							<h2>Social</h2>
						</td>
					</tr>
					<tr>
						<th>Facebook</th>
						<td><input type="text" class="regular-text" maxlength="200" name="facebook" value="<?php echo esc_attr($facebook); ?>"></td>
					</tr>
					<tr>
						<th>Twitter</th>
						<td><input type="text" class="regular-text" maxlength="200" name="twitter" value="<?php echo esc_attr($twitter); ?>"></td>
					</tr>
					<tr>
						<th>Linkedin</th>
						<td><input type="text" class="regular-text" maxlength="200" name="linkedin" value="<?php echo esc_attr($linkedin); ?>"></td>
					</tr>
					<tr>
						<th>Youtube</th>
						<td><input type="text" class="regular-text" maxlength="200" name="youtube" value="<?php echo esc_attr($youtube); ?>"></td>
					</tr>
					<tr>
                        <th>Instagram</th>
                        <td><input type="text" class="regular-text" maxlength="200" name="instagram" value="<?php echo esc_attr($instagram); ?>"></td>
                    </tr>
                    <tr>
                        <th>Pinterest</th>
                        <td><input type="text" class="regular-text" maxlength="200" name="pinterest" value="<?php echo esc_attr($pinterest); ?>"></td>
                    </tr>
					<tr>
						<td colspan="2">
							<?php wp_nonce_field( $form_contact); ?>
							<input type="hidden" name="mml_theme_post_form" value="<?php echo $form_contact; ?>">
							<input type="submit" value="Save" class="button button-primary">
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="tabs-2">
			<form action="" method="post">
				<table class="form-table">
					<tr>
						<td colspan="2">
							<h2>Code</h2>
						</td>
					</tr>
					<tr>
						<th>Between<br />"&lt;head&gt;" and "&lt;/head&gt;"</th>
						<td><textarea class="" id="" cols="80" rows="5" name="in_header"><?php echo esc_textarea(stripslashes($code_in_header)); ?></textarea></td>
					</tr>
					<tr>
						<th>After "&lt;body&gt;"</th>
						<td><textarea class="" id="" cols="80" rows="5" name="after_body_opening"><?php echo esc_textarea(stripslashes($code_after_body_opening)); ?></textarea></td>
					</tr>
					<tr>
						<th>Before "&lt;/body&gt;"</th>
						<td><textarea class="" id="" cols="80" rows="5" name="before_body_closing"><?php echo esc_textarea(stripslashes($code_before_body_closing)); ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
							<?php wp_nonce_field( $form_code ); ?>
							<input type="hidden" name="mml_theme_post_form" value="<?php echo $form_code; ?>">
							<input type="submit" class="button button-primary" value="Save" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="tabs-3" class="faq">
			<div>
				<h2>FAQ</h2>
			</div>
			<div class="container J_faq_ctn">
				<div class="J_faq_list"></div>
				<input type="button" class="button button-secondary J_faq_btn_add" value="Add One FAQ Record">
			</div>
			<div class="btns">
				<input type="button" class="button button-primary J_faq_save" value="Save">
				<form action="" method="post" class="J_faq_form" enctype="application/x-www-form-urlencoded" style="display: none;">
					<!-- <input type="hidden" class="J_faq_form_list" name="list" value=""> -->
					<?php wp_nonce_field( $form_faq ); ?>
					<input type="hidden" name="mml_theme_post_form" value="<?php echo $form_faq; ?>">
					<input type="submit" class="J_faq_form_submit" value="Submit" />
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo $theme_uri; ?>/include/js/jquery-ui-v1.12.1.min.js"></script>

<script>
	var last_form = '<?php echo $last_form; ?>';
	var list = <?php echo json_encode($option_faq['list']); ?>;
	list.forEach(item => {
		item.q = item.q
			.replace(/\\\\/g, '\\')
			.replace(/\\'/g, '\'')
			.replace(/\\"/g, '"')
		item.a = item.a
			.replace(/\\\\/g, '\\')
			.replace(/\\'/g, '\'')
			.replace(/\\"/g, '"')
	})
	var template = '<div class="item">'
		+ '<div class="question">'
		+ 'Question:<br /><input type="text" class="regular-text J_question" value="">'
		+ '</div>'
		+ '<div class="answer">'
		+ 'Answer:<br /><textarea class="J_answer" rows="3" cols="100"></textarea>'
		+ '</div>'
		+ '<div class="">'
		+ '<input type="button" class="button button-link button-link-delete" value="Delete" onclick="del(this)" />'
		+ '</div>'
		+ '</div>';
	(function (doc, win, $) {
		win.del = function (obj) {
			if (confirm('Are you sure to delete this Q&A ?')) {
				$(obj).parents('.item').remove()
			}
		}
		$(doc).ready(function () {
			var active = 0
			if (last_form === '<?php echo $form_code; ?>') {
				active = 1
			} else if (last_form === '<?php echo $form_faq; ?>') {
				active = 2
			}
			$('#tabs').tabs({
				active: active,
				create: function( event, ui ) {
					if (list) {
						for (let i = 0; i < list.length; i++) {
							const item = list[i];
							let dom = $(template);
							$('.J_question', dom).val(item.q)
							$('.J_answer', dom).val(item.a)
							dom.appendTo('.J_faq_list')
						}
					}
				}
			})

			$('.J_faq_btn_add').click(function () {
				// $('.J_faq_table .J_btn').before(template)
				$(template).appendTo('.J_faq_list')
			})
			$('.J_faq_save').click(function () {
				let arr = []
				let $items = $('.faq .item')
				$items.each(function (index, item) {
					// arr.push({
					// 	q: $('.J_question', item).val(),
					// 	a: $('.J_answer', item).val()
					// })
					let $qinput = $('<input type="hidden" name="list['+index+'][q]" />')
					$qinput.val($('.J_question', item).val())
					let $ainput = $('<input type="hidden" name="list['+index+'][a]" />')
					$ainput.val($('.J_answer', item).val())
					$qinput.appendTo('.J_faq_form')
					$ainput.appendTo('.J_faq_form')
				})
				// $('.J_faq_form_list').val(JSON.stringify(arr))
				$('.J_faq_form_submit').click()
			})
		})
	})(document, window, jQuery)
</script>

<?php
