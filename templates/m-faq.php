<?php
/**
 * FAQ 组件。在需要的地方 get_template_part('templates/m-faq') 即可。
 * 注意: 如果使用 require 或者 include ，会存在变量污染的问题。
 */

$option_faq = get_option('mml-theme-opt-faq', [ 'list' => [] ]);
$list = $option_faq['list'];
?>

<div class="mml-faq">
	<div class="container">
		<ul class="mml-faq-list">
			<?php foreach($list as $index => $faq) { ?>
				<li class="mml-faq-item">
					<div class="mml-faq-item-hd">
						<span class="number"><?php echo $index + 1; ?></span>
						<h3 class="title"><?php echo $faq['q']; ?></h3>
						<i class="fas fa-chevron-down"></i>
					</div>
					<div class="mml-faq-item-bd">
						<?php echo apply_filters('the_content', esc_html(stripslashes($faq['a']))); ?>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>

<?php
