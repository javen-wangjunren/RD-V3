<?php
$options = get_option('mml-theme-opt-options', []);
$opt_show_btt = isset($options['show_btt']) ? $options['show_btt'] : '';
?>

<?php
if ($opt_show_btt === 'y') {
	get_template_part('templates/back-to-top');
}
?>

<!-- Contact Info，没则不输出 -->
<ul>
	<?php
		// HTML 结构可以在 functions.php 里进行修改。 搜索对应的方法名即可找到。
		// 参数是图标的 css class 。 参数可省略，不会报错。 开发过程中注意修改这里。
		// 已进行判断，如果没有值，则不输出。
		mml_show_email1('fas fa-envelope');
		mml_show_email2('fas fa-envelope');
		mml_show_mobile1('fas fa-phone');
		mml_show_mobile2('fas fa-phone');
		mml_show_telephone1('fas fa-tel');
		mml_show_telephone2('fas fa-tel');
		mml_show_fax1('fas fa-fax');
		mml_show_fax2('fas fa-fax');
		mml_show_whatsapp('fas fa-whatsapp');
		mml_show_address('fas fa-location-arrow');
	?>
</ul>

<!-- 社媒有则输出，没则不输出 -->
<ul>
	<?php
		// HTML 结构可以在 functions.php 里进行修改。 搜索对应的方法名即可找到。
		// 参数是图标的 css class 。 参数可省略，不会报错。 开发过程中注意修改这里。
		// 已进行判断，如果没有值，则不输出。
		mml_show_social_facebook('fab fa-facebook-square');
		mml_show_social_twitter('fab fa-twitter-square');
		mml_show_social_pinterest('fab fa-pinterest-square');
		mml_show_social_linkedin('fab fa-linkedin');
		mml_show_social_instagram('fab fa-instagram');
		mml_show_social_youtube('fab fa-youtube');
	?>
</ul>

<!-- （以下）示例内容，供参考，可删除 --------
<div>Copy Right: <?php echo mtf_get_copyright(); ?></div>
-------- （以上）示例内容结束 -->

<?php
// Footer 的链接可以用以下方式输出
// if ( is_active_sidebar( 'footer1' ) ) { dynamic_sidebar( 'footer1' ); }
// if ( is_active_sidebar( 'footer2' ) ) { dynamic_sidebar( 'footer2' ); }
// if ( is_active_sidebar( 'footer3' ) ) { dynamic_sidebar( 'footer3' ); }
// if ( is_active_sidebar( 'footer4' ) ) { dynamic_sidebar( 'footer4' ); }

// 先建立菜单
// 然后在 Appearance -> Widgets 菜单中，用 Navigation Menu 挂件，把菜单添加到对应的 Sidebar 。
// 最后在 footer 中输出

// 注意:
// 默认的标题使用的是 h2 ，如果不想用 h2 ，就自己写标题，把它默认的标题隐藏掉。
// 它们的最外层是 li ，所以开发人员要自己在外面包一层 ul .
?>

<!-- ian: mml-modal -->
<div id="modal-quote" class="mml-mask">
	<div class="mml-modal">
		<header class="mml-modal-header">
			<a class="mml-modal-close"><i class="fas fa-times"></i></a>
		</header>
		<div class="mml-modal-content mml-form">
			<h2>HELLO MML TECH</h2>
			<p>打开： 含有.mml-quote的按钮加上data-quote="#modal-quote"属性</p>
			<p>关闭： $('.mml-mask').removeClass('mml-show') </p>
		</div>
	</div>
</div>
<!-- mml-modal end -->

<style><?php do_action('mml_theme_ac_section_style'); ?></style>

<?php get_sidebar(); ?>
<?php wp_footer(); ?>

<script>
;(function($){
	$(document).ready(function(){
		$('.mml-quote').on('click', function(){ $(this.dataset.quote).addClass('mml-show'); });
		$('.mml-modal-close').on('click', function(){ $(this).closest('.mml-mask').removeClass('mml-show'); });
		$('input').attr('autocomplete', 'off');
	});
})(jQuery);
</script>
<script>
	jQuery(document).ready(function(){
		jQuery('#help-center-search-form form').attr('action', '/help-center/');
	});
</script>
<script><?php do_action('mml_theme_ac_section_script'); ?></script>
<?php do_action('mml_theme_ac_footer'); ?>
</body>
</html>
