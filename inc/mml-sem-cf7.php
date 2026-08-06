<?php

/**
 * 给 SEM 用的。当有询盘时，提交数据到 GA
 */
/*
object(WP_Screen)#2779 (18) {
  ["action"]=>
  string(0) ""
  ["base"]=>
  string(4) "post"
  ["columns":"WP_Screen":private]=>
  int(0)
  ["id"]=>
  string(4) "page"
  ["in_admin":protected]=>
  string(4) "site"
  ["is_network"]=>
  bool(false)
  ["is_user"]=>
  bool(false)
  ["parent_base"]=>
  NULL
  ["parent_file"]=>
  NULL
  ["post_type"]=>
  string(4) "page"
  ["taxonomy"]=>
  string(0) ""
  ["_help_tabs":"WP_Screen":private]=>
  array(0) {
  }
  ["_help_sidebar":"WP_Screen":private]=>
  string(0) ""
  ["_screen_reader_content":"WP_Screen":private]=>
  array(0) {
  }
  ["_options":"WP_Screen":private]=>
  array(0) {
  }
  ["_show_screen_options":"WP_Screen":private]=>
  NULL
  ["_screen_settings":"WP_Screen":private]=>
  NULL
  ["is_block_editor"]=>
  bool(true)
}
*/
// window.ga = { getAll: () => { return [ { send: function () { console.log('send', arguments) } } ]}}

defined('ABSPATH') || exit;

class MML_SEM_CF7 {
	private static $timeout_list = [
		'100' => '立即',
		'2000' => '2秒后',
	];

	public static function init () {
		add_action('add_meta_boxes', [ self::class, 'mml_add_meta_box' ]);
		add_action('save_post', [ self::class, 'mml_save_postdata' ]);
		add_action('wp_footer', [ self::class, 'mml_footer' ]);
	}

	public static function mml_show_ldp_meta_box ($post) {
		$isldp = get_post_meta( $post->ID, 'mml_sem_ldp_isldp', true );
		if ( $isldp !== 'y' && $isldp !== 'n' ) {
			$isldp = 'n';
		}
		$jump = get_post_meta( $post->ID, 'mml_sem_ldp_jump', true );
		if ( $jump !== 'y' && $jump !== 'n' ) {
			$jump = 'n';
		}
		$jumptimeout = get_post_meta( $post->ID, 'mml_sem_ldp_jumptimeout', true );
		if ( $jumptimeout === false ) {
			$jumptimeout = '100';
		}
		if ( ! isset( self::$timeout_list[$jumptimeout] ) ) {
			$jumptimeout = self::$timeout_list[0];
		}
		?><div>
			<div>
				<label for="">当前页面是否 LDP:
					<select name="mml_sem_ldp_isldp" id="">
						<option value="y" <?php echo $isldp === 'y' ? 'selected' : ''; ?>>是</option>
						<option value="n" <?php echo $isldp === 'n' ? 'selected' : ''; ?>>否</option>
					</select>
				</label>
			</div>
			<div>
				<label for="">是否在提交表单后跳转到首页:
					<select name="mml_sem_ldp_jump" id="">
						<option value="y" <?php echo $jump === 'y' ? 'selected' : ''; ?>>是</option>
						<option value="n" <?php echo $jump === 'n' ? 'selected' : ''; ?>>否</option>
					</select>（即使是 contact 页面， 这个选项也能生效。）
				</label>
			</div>
			<div>
				<label for="">表单发送成功后
					<select name="mml_sem_ldp_jumptimeout" id="">
						<?php /*<option value="100" <?php echo $jumptimeout === '100' ? 'selected' : ''; ?>>立即</option>
						<option value="2000" <?php echo $jumptimeout === '2000' ? 'selected' : ''; ?>>2秒后</option>*/?>
						<?php
						foreach (self::$timeout_list as $key => $value) {
							echo '<option value="' . $key . '"';
							if ( intval( $jumptimeout ) === $key ) {
								echo ' selected';
							}
							echo '>' . $value . '</option>';
						}
						?>
					</select>
					跳转到首页。（如果上一项选否，本选项将不生效。）
				</label>
			</div>
		</div><?php
	}

	public static function mml_add_meta_box () {
		$screen = get_current_screen();
		if ( ! $screen || ! isset( $screen->post_type ) || $screen->post_type !== 'page' ) {
			return;
		}
		add_meta_box('mml_sem_ldp', 'Landing Page ( for contact form 7 ) - MML', [ self::class, 'mml_show_ldp_meta_box' ]);
	}

	// 保存数据
	public static function mml_save_postdata($post_id)
	{
		if (array_key_exists('mml_sem_ldp_isldp', $_POST)) {
			if ( $_POST['mml_sem_ldp_isldp'] === 'y' || $_POST['mml_sem_ldp_isldp'] === 'n' ) {
				update_post_meta(
					$post_id,
					'mml_sem_ldp_isldp',
					$_POST['mml_sem_ldp_isldp']
				);
			}
		}
		if (array_key_exists('mml_sem_ldp_jump', $_POST)) {
			if ( $_POST['mml_sem_ldp_jump'] === 'y' || $_POST['mml_sem_ldp_jump'] === 'n' ) {
				update_post_meta(
					$post_id,
					'mml_sem_ldp_jump',
					$_POST['mml_sem_ldp_jump']
				);
			}
		}
		if (array_key_exists('mml_sem_ldp_jumptimeout', $_POST)) {
			if ( isset( self::$timeout_list[$_POST['mml_sem_ldp_jumptimeout']] ) ) {
				update_post_meta(
					$post_id,
					'mml_sem_ldp_jumptimeout',
					$_POST['mml_sem_ldp_jumptimeout']
				);
			}
		}
	}

	public static function mml_footer () {
		$object = get_queried_object();
		if ( ! $object instanceof WP_Post ) {
			return;
		}
		if ( $object->post_type !== 'page' ) {
			return;
		}
		$isldp = get_post_meta( $object->ID, 'mml_sem_ldp_isldp', true );
		$jump = get_post_meta( $object->ID, 'mml_sem_ldp_jump', true );
		$jumptimeout = get_post_meta( $object->ID, 'mml_sem_ldp_jumptimeout', true );
		?><script>
;(function ($, opt) {
	$(document).ready(function () {
		if (window.setUpContact7) {
			return;
		}
		window.setUpContact7 = true;

		document.addEventListener('wpcf7mailsent', function(event) {
			console.log('[MML - SEM] 表单提交');
			if (!window.ga || !window.ga.getAll || typeof window.ga.getAll !== 'function') {
				console.log('[MML - SEM] 没找到 GA');
				console.log(window.ga);
				return;
			}
			var all = window.ga.getAll();
			if (!all || !all.length || all.length < 1) {
				console.log('[MML - SEM] ga.getAll() 不正确');
				console.log(all);
				return;
			}
			var tracker = all[0];
			if (!tracker || !tracker.send || typeof tracker.send !== 'function') {
				console.log('[MML - SEM] tracker 不正确');
				console.log(tracker);
				return;
			}
			if (opt.isLdp) {
				tracker.send('event', 'ldp', 'ldp', 'ldp');
			} else {
				tracker.send('event', 'leads', 'leads', 'leads');
			}
			if (opt.jump) {
				setTimeout(function () {
					window.location.href = opt.jump
				}, opt.jumpTimeout);
			}
		}, false);

		console.log('[MML - SEM] setUpContact7 ready. ' + JSON.stringify(opt))
	});
})(jQuery, {
	isLdp: <?php echo $isldp === 'y' ? 'true' : 'false'; ?>,
	jump: '<?php echo $jump === 'y' ? '/' : ''; // 如果要跳转，这里赋值目标URL ?>',
	jumpTimeout: <?php echo is_numeric($jumptimeout) ? $jumptimeout : '100'; ?>,
});
		</script><?php
	}
}

MML_SEM_CF7::init();
